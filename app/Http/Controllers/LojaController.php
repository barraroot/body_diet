<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Client;
use App\Cities;
use App\Faqs;
use App\Midia;
use App\Failures;
use App\Order;
use App\OrderItem;
use App\Notifications\OrderCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LojaController extends Controller
{
    private $banners;
    private $cities;

    public function __construct()
    {
        $this->banners = Midia::where('type', '=', 'Banner')->get();
        $this->cities = Cities::get();
    }

    public function index()
    {
    	$data = Category::where('show', 1)->with('products')->get();
        $siteBanners = $this->banners;
        $siteCities = $this->cities;

        $cart = null;
        if(request()->session()->has('carrinho'))
            $cart = Order::with('orderItems')->findOrFail(request()->session()->get('carrinho'));

    	return view('site.loja.produtos', compact('data', 'siteBanners', 'cart'));
    }

    public function novocarrinho(Request $request)
    {

        $cliente = \App\Client::where('email', '=', $request->all()['email'])->get();

        if(count($cliente) > 0)
            return redirect()->route('loja.fazlogin')->with('status', 'E-mail já cadastrado, faça o login para continuar comprando.');

        $data = $request->all();
        $data['total_produtos'] = 0;
        $data['frete'] = 0;
        $data['total'] = 0;
        $data['pontos'] = 0;

        $cart = Order::create($data);

        $cart->notify(new OrderCreated());

        $request->session()->put('carrinho', $cart->id);
        
        return redirect()->route('loja.produtos')->with('status', 'Pronto agora você pode montar seu carrinho como desejar, apenas adicionando os itens com as respectivas quantidades');
    }

    public function novocarrinhologado(Request $request)
    {
        if(!session()->has('login'))
            return response()->json(['erro' => 'Problemas no login, refaça o login para continuar comprando']);
        else
        {
            $data['endereco'] = session()->get('login')['endereco'];
            $data['bairro'] = session()->get('login')['bairro'];
            $data['cidade'] = session()->get('login')['cidade'];
            $data['estado'] = session()->get('login')['estado'];
            $data['cep'] = session()->get('login')['cep'];
            $data['nome'] = session()->get('login')['nome'];
            $data['email'] = session()->get('login')['email'];
            $data['telefone'] = session()->get('login')['telefone'];
            $data['client_id'] = session()->get('login')['id'];
            $data['total_produtos'] = 0;
            $data['frete'] = 0;
            $data['total'] = 0;
            $data['pontos'] = 0;

            $cart = Order::create($data);
            $cart->notify(new OrderCreated());

            $request->session()->put('carrinho', $cart->id);

            return response()->json(['sucesso' => 'Carrinho Aberto']);
        }
    }

    public function formitemadd(Request $request)
    {
        $produto = Product::find($request->all()["produto_id"]);

        //Verificar se tem carrinho aberto
        $cart = null;

        if($request->all()['qtde'] <= 0)
            return redirect()->route('loja.produtos')->with('status', 'Para comprar um item informe uma quantidade maior que 0.');

        if(!$request->session()->has('carrinho'))
        {
            $data['total_produtos'] = 0;
            $data['frete'] = 0;
            $data['total'] = 0;
            $data['pontos'] = 0;

            $cart = Order::create($data);
        }
        else
        {
            $cart = Order::find($request->session()->get('carrinho'));
        }

        if(count($cart->orderItems) !== 0)
        {
            $total = $request->all()["qtde"] * $produto->price;
            $totalPontos = $request->all()["qtde"] * $produto->pontos;
            $itemAdd['order_id'] = $cart->id;
            $itemAdd['product_id'] = $produto->id;
            $itemAdd['preco'] = $produto->price;
            $itemAdd['qtde'] = $request->all()["qtde"];
            $itemAdd['total'] = $total;
            $itemAdd['pontos'] = $totalPontos;           

            $atualiza = false;

            foreach ($cart->orderItems as $value) 
            {
                if($value->product_id == $produto->id)
                {
                    $itemAdd = [];
                    $total = $request->all()["qtde"] * $produto->price;
                    $totalPontos = $request->all()["qtde"] * $produto->pontos;
                    $itemAdd['qtde'] = ($request->all()["qtde"]);
                    $itemAdd['total'] = ($total);
                    $itemAdd['pontos'] = ($totalPontos); 
                    $value->update($itemAdd);
                    $atualiza = true;
                }
            }           
            if(!$atualiza)
                OrderItem::create($itemAdd);
        }
        else
        {
            $total = $request->all()["qtde"] * $produto->price;
            $totalPontos = $request->all()["qtde"] * $produto->pontos;
            $itemAdd['order_id'] = $cart->id;
            $itemAdd['product_id'] = $produto->id;
            $itemAdd['preco'] = $produto->price;
            $itemAdd['qtde'] = $request->all()["qtde"];
            $itemAdd['total'] = $total;
            $itemAdd['pontos'] = $totalPontos;

            OrderItem::create($itemAdd);
        }

        //Atualizar o carrinho

        $this->atualizaCarrinho();

        $request->session()->put('carrinho', $cart->id);

        return redirect()->route('loja.produtos')->with('status', 'Item adcionardo ao carrinho com sucesso.');
    }    

    private function atualizaCarrinho($status = 'Pendente')
    {
        if(!session()->has('carrinho'))
            return redirect()->route('loja.produtos')->with('status', 'Seu carrinho não foi encontrado.');
        $cart = Order::findOrFail(session()->get('carrinho'));

        $total_produtos = 0;
        $total_pontos = 0;       

        $items = \App\OrderItem::where('order_id', '=', $cart->id)->get();

        foreach ($items as $item) {
            $total_produtos += $item->total;
            $total_pontos += $item->pontos;
        }

        $total_final = $total_produtos;
        $data['total_produtos'] = $total_produtos; 
        $data['total'] =  $total_final;
        $data['pontos'] =  $total_pontos; 
        $data['status'] =  $status;

        if(session()->has('login'))
        {
            $client = \App\Client::findOrFail(session()->get('login')['id']);
            $data['cep'] = $client->cep;
            $data['endereco'] = $client->endereco;
            $data['numero'] = $client->numero;
            $data['complemento'] = $client->complemento;
            $data['bairro'] = $client->bairro;
            $data['cidade'] = $client->cidade;
            $data['estado'] = $client->estado;
            $data['email'] = $client->email;
            $data['client_id'] = $client->id;
            $data['telefone'] = $client->telefone;
        }

        $cidade = \App\Cities::where('city', '=', $cart->cidade)->get();
        if(count($cidade) > 0)
        {
            $frete = $cidade[0]->frete;
            $data['frete'] = $frete;
            $totalPedido = ($total_final + $frete);
            $desconto = ($totalPedido * ($cart->desconto_p / 100));
            $data['desconto'] = $desconto;
            $data['total'] =  $totalPedido - $desconto;
        }

        $cart->update($data);
    }

    public function removeritem(Request $request, $item, $produto)
    {
    	if($request->session()->has('carrinho'))
    	{
            $cart = Order::with('orderItems')->findOrFail(request()->session()->get('carrinho'));

            $total_produtos = 0;
            $total_final = 0;
            $total_pontos = 0;

            foreach ($cart->orderItems as $value) 
            {
                if($item == $value['id'])
                {
                    $value->delete();
                }
                else
                {
                    $total_produtos += $value['total'];
                    $total_pontos += $value['pontos'];
                    $total_final += $value['total'];
                }
            }

            $total_final = $cart['frete'] + $total_final;
    		$cart->update(['total_produtos' => $total_produtos, 'total' => $total_final, 'pontos' => $total_pontos]);
    	}
    	return redirect()->route('loja.carrinho');
    }

    public function atualizafrete(Request $request)
    {
        if(!$request->session()->has('carrinho')) {
            return redirect()->route('loja.produtos')->with('status', 'Carrinho não encontrado.');
        }
        else
        {
            $this->atualizaCarrinho('Pendente');
            return redirect()->route('loja.carrinho');
        }
    }

    public function carrinho(Request $request)
    {
    	$carrinho = Order::find(request()->session()->get('carrinho'));

        if(!empty($carrinho))
        {
            $carrinho_itens = OrderItem::with('product')->where('order_id', '=', $carrinho->id)->get();
        }
        else
        {
            return redirect()->route('loja.produtos')->with('status', 'Não foi possivel ecnotrar seu carrinho. Por favor incluia os itens que deseja antes de concluir a compra.');
        }

    	return view('site.loja.carrinho', compact('carrinho', 'carrinho_itens'));
    }

    public function novocliente(Request $request)
    {
        $user = Client::create($request->all());
        $request->session()->put('login', $user);

        if($request->session()->has('carrinho'))
        {
            $this->atualizaCarrinho('Aguardando Pagamento');
            $order = \App\Order::findOrFail(session()->get('carrinho'));
            return redirect()->route('loja.fecharpedido');
        }
        else
        {
            return redirect()->route('loja.minhaconta');
        }
    }

    public function login(Request $request) {
        $login = $request->all()['email'];
        $senha = $request->all()['senha'];
        $user = Client::where([
            ['email', '=', $login],
            ['senha', '=', $senha]
            ])->get();
        if(empty($user[0])) {
            return redirect()->route('loja.fazlogin')->with('status', 'Usuário ou senha invalidos');
        }
        else {
            $request->session()->put('login', $user[0]);
        if($request->session()->has('carrinho'))
            return redirect()->route('loja.fecharpedido');   
        else
            return redirect()->route('loja.minhaconta');
        }

    }

    public function fecharconta(Request $request)
    {
        $request->session()->forget('login');
        $request->session()->forget('carrinho');
        return redirect()->route('loja.produtos');        
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login');
        return redirect()->route('loja.produtos');
    }

    public function regioes()
    {
        $cidades = Cities::orderBy('city', 'asc')->get();
        return view('site.loja.regioes', compact('cidades'));
    }

    public function faqs()
    {
        $faqs = Faqs::get();
        return view('site.loja.faqs', compact('faqs'));
    }

    public function detalheproduto(Request $request, $title, $id)
    {
        $product = Product::findOrFail($id);

        $cart = null;
        if(request()->session()->has('carrinho'))
            $cart = Order::with('orderItems')->findOrFail(request()->session()->get('carrinho'));

        return view('site.loja.detalheproduto', compact('product', 'cart'));
    }   

    public function midia(Request $request)
    {
        $midias = Midia::where('type', '=', 'Midia')->orderBy('title', 'asc')->get();
        return view('site.loja.midia', compact('midias'));
    }       

    public function faqdetails(Request $request, $id)
    {
        $faq = Faqs::findOrFail($id);
        return view('site.loja.faqdetail', compact('faq'));        
    }
    public function cidadenaoatendida(Request $request)
    {
        $result = Failures::create($request->all());

        return view('site.loja.cidadenaoatendida', compact('result'));
    }

    public function pagamentoAprovado(Request $request)
    {
        $request->session()->forget('carrinho');
        return view('site.loja.pagamentoaprovado');
    }

    public function contato(Request $request)
    {
        $contato = \App\Contact::create($request->all());
        return view('site.contatosucesso');
    }

    public function pedidoNaoAtendido()
    {
        if(session()->has('carrinho'))
        {
            $pedido = \App\Order::findOrFail(session()->get('carrinho'));
            $pedido->update(['status' => 'Cidade não atendida']);
        }

        return view('site.loja.pedidonaoatendido');
    }

    public function retornaCarrinho($id)
    {
        $pedido = Order::findOrFail($id);

        session()->put('carrinho', $pedido->id);

        return redirect()->route('loja.produtos')->with('status', 'Seu pedido ja foi reaberto.');
    }

    public function fecharCarrinhoAjax($carrinho)
    {
        session()->put('carrinho', $carrinho);
        return redirect()->route('loja.concluircompra');
    }

    public function aplicaDesconto(Request $request)
    {
        $order = Order::findOrFail($request->all()['carrinho']);

        $cupom = \App\Coupon::where('name', '=', $request->all()['desconto'])->get();

        if(count($cupom) <= 0)
            return redirect()->route('loja.carrinho')->with('status', 'Cupom invliado.');
        else
            $cupom = $cupom[0];
        if(strtotime($cupom['validade']) <= strtotime(date('Y-m-d')))
            return redirect()->route('loja.carrinho')->with('status', 'A data de validade deste cupom expirou.');

        $order->update(['coupon_id' => $cupom['id'], 'desconto_p' => $cupom['desconto']]);      

        $this->atualizaCarrinho();

        return redirect()->route('loja.carrinho');        
    }
}
