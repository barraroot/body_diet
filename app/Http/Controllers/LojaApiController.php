<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

class LojaApiController extends Controller
{
    public function novocarrinho(Request $request)
    {

        $cliente = \App\Client::where('email', '=', $request->all()['email'])->get();

        if(count($cliente) > 0)
            return response()->json(['status' => 'error', 'msg' => 'E-mail já cadastrado, faça o login para continuar comprando.']);

        $data = $request->all();
        $data['total_produtos'] = 0;
        $data['frete'] = 0;
        $data['total'] = 0;
        $data['pontos'] = 0;

        $cart = Order::create($data);

        $cart->notify(new OrderCreated());
        
        return response()->json(['status' => 'ok', 'pedido' => $cart->id]);
    }

    public function novocarrinhologado(Request $request, $usuario)
    {
        if($usuario <= 0)
            return response()->json(['status' => 'erro', 'msg' => 'Problemas no login, refaça o login para continuar comprando']);
        else
        {
        	$user = \App\Client::findOrFail($usuario);
            $data['endereco'] = $user['endereco'];
            $data['bairro'] = $user['bairro'];
            $data['cidade'] = $user['cidade'];
            $data['estado'] = $user['estado'];
            $data['cep'] = $user['cep'];
            $data['nome'] = $user['nome'];
            $data['email'] = $user['email'];
            $data['telefone'] = $user['telefone'];
            $data['client_id'] = $user['id'];
            $data['total_produtos'] = 0;
            $data['frete'] = 0;
            $data['total'] = 0;
            $data['pontos'] = 0;

            $cart = Order::create($data);
            $cart->notify(new OrderCreated());

            return response()->json(['status' => 'sucesso', 'pedido' => $cart->id]);
        }
    }

    public function formitemadd(Request $request, $carrinho)
    {
        $produto = Product::find($request->all()["produto_id"]);

        //Verificar se tem carrinho aberto
        $cart = null;

        if($request->all()['qtde'] <= 0)
            return response()->json(['status' => 'erro', 'msg' => 'Para comprar um item informe uma quantidade maior que 0.']);

        $cart = Order::find($carrinho);

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

        $this->atualizaCarrinho($carrinho);

        return response()->json(['status' => 'ok', 'msg' => 'Item adcionardo ao carrinho com sucesso.']);
    } 

    private function atualizaCarrinho($carrinho, $status = 'Pendente')
    {
        $cart = Order::findOrFail($carrinho);

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
            $data['nome'] = $client->nome;
        }

        $cidade = \App\Cities::where('city', '=', $cart->cidade)->get();
        if(count($cidade) > 0)
        {
            $frete = $cidade[0]->frete;
            $data['frete'] = $frete;
            $totalPedido = ($total_final + $frete);
            $desconto = ($total_produtos * ($cart->desconto_p / 100));
            $data['desconto'] = $desconto;
            $data['total'] =  $totalPedido - $desconto;
        }

        //Regras para desconto
        $regras = \App\DisccountRule::where([['valido', '>=', date('Y-m-d')],['valor', '<=', number_format($data['total_produtos'], 2, '.', '')]])->get();
        $desconto_frete = 0;
        $desconto_valor = 0;
        foreach ($regras as $item) {
            $desconto_frete += $item['diccount_frete'];
            $desconto_valor += $item['diccount_order'];
        }
        if(!isset($data['desconto']))
            $data['desconto'] = 0;
        if(!isset($data['frete']))
            $data['frete'] = 0;            
        $data['frete'] -= ($data['frete'] * ($desconto_frete/100));
        $data['total'] = (($data['total_produtos'] + $data['frete']) - $data['desconto']) - ($data['total_produtos'] * ($desconto_valor/100));
        $cart->update($data);
    } 

    public function calculaCarrinho($carrinho)
    {
    	$items = OrderItem::where('order_id', '=', $carrinho)->get();
    	$pratos = 0;
    	$total = 0;
    	foreach ($items as $item) {
    		$pratos += $item->qtde;
    		$total += $item->total;
    	}

    	$total = number_format($total, 2, ',', '.');

    	return response()->json(['pratos' => $pratos, 'total' => $total]);
    }

    public function removeritem(Request $request, $carrinho, $item)
    {
        $item = OrderItem::where('product_id', '=', $item);

        $item->delete();

        atualizaCarrinho();

        return response()->json(['status' => 'ok']);
    }

}
