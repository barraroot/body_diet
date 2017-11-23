<?php
use App\PagSeguro\PagSeguro;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'LojaController@index')->name('loja.produtos');
//Route::get('/como-funciona', 'SiteController@comofunciona')->name('site.comofunciona');
Route::get('/como-funciona/{id}', 'LojaController@faqdetails')->name('loja.faqdetails');
Route::get('/midia', 'LojaController@midia')->name('site.midia');
Route::get('/contato', 'SiteController@contato')->name('site.contato');
Route::post('/enviar-contato', 'LojaController@contato')->name('loja.contato');
/** Carrinho **/
Route::get('/carrinho', 'LojaController@carrinho')->name('loja.carrinho');
Route::get('/carrinho/adcionar/{id}/{title?}', 'LojaController@itemadd')->name('loja.itemadd');
Route::post('/carrinho/adcionar/{id}', 'LojaController@formitemadd')->name('loja.formitemadd');
Route::get('/carrinho/remover/{item}/{produto?}', 'LojaController@removeritem')->name('loja.remover');
Route::get('/cidades-atendidas', 'LojaController@regioes')->name('loja.regioes');
Route::get('/como-funciona', 'LojaController@faqs')->name('loja.faqs');
Route::get('/produto/{title}/{id}', 'LojaController@detalheproduto')->name('loja.produto');
Route::post('/cidade-nao-atendida', 'LojaController@cidadenaoatendida')->name('loja.cidadenaoatendida');
Route::get('/concluir-compra', 'LojaController@atualizafrete')->name('loja.concluircompra');
Route::get('/pedido-nao-atendido', 'LojaController@pedidoNaoAtendido')->name('loja.pedidonaoatendido');
Route::get('/retornar-carrinho/{id}', 'LojaController@retornaCarrinho')->name('loja.retornacarrinho');
Route::get('/fechar-carrinho/{id}', 'LojaController@fecharCarrinhoAjax')->name('loja.fecharcarrinhoajax');
Route::post('/desconto-pedido', 'LojaController@aplicaDesconto')->name('loja.descontopedido');
/** Checout **/
Route::get('/checkout', function(Request $request){
    if(request()->session()->has('login'))
    {
        if(!request()->session()->has('carrinho'))
            return redirect()->route('loja.produtos')->with('status', 'É preciso colocar itens no seu carrinho para poder finalizar a compra.');

        $carrinho = App\Order::findOrFail(request()->session()->get('carrinho'));
        if($carrinho->frete <= 0)
        {
            return redirect()->route('loja.pedidonaoatendido');
        }

        $data = [];
        $data['token'] = '4A2D219550EB40058D0A58B4C7817427';
        $data['email'] = 'contato@bodydiet.com.br';
        $response = (new PagSeguro)->request(PagSeguro::SESSION, $data);
        $session = new \SimpleXMLElement($response->getContents());
        $session = $session->id;

        $carrinho->update(['status' => 'Aguardando Pagamento']);

       return view('site.loja.checkout', compact('session', 'carrinho'));
    }
    else       
        return redirect()->route('loja.fazlogin');
})->name('loja.fecharpedido');

Route::get('/forma-pagamento/{forma}', function($forma){
    if(session()->has('carrinho'))
    {
        $cart = \App\Order::findOrFail(session()->get('carrinho'));
        $cart->update(['forma_pagamento' => $forma]);
        return response()->json(['result' => 'Atualizado com sucesso']);
    } 
    else 
    {
        return response()->json(['result' => 'Carrinho não encontrado']);
    }
})->name('loja.formapagamento');

Route::post('/checkout', function(Request $request){
    if(request()->session()->has('login'))
    {
        if(!request()->session()->has('carrinho'))
            return redirect()->route('loja.produtos')->with('status', 'É preciso colocar itens no seu carrinho para poder finalizar a compra.');

        $pedido = App\Order::with('client')->findOrFail(session()->get('carrinho'));

        $data = request()->all();
        unset($data['_token']);


        $data['creditCardHolderPhone'] = str_replace(" ", "", str_replace("-", "", str_replace(")", "", str_replace("(", "", $data['creditCardHolderPhone']))));

        $data['creditCardHolderAreaCode'] = substr($data['creditCardHolderPhone'], 0, 2);
        $data['creditCardHolderPhone'] = substr($data['creditCardHolderPhone'], 2, strlen($data['creditCardHolderPhone']));
        $data['billingAddressCountry'] = 'BR';

        $data['creditCardHolderCPF'] = trim(str_replace("-", "", str_replace(".", "", $data['creditCardHolderCPF'])));

        //Salvando o cartão do cliente
        $carding = \App\CreditCard::where('client_id', '=', request()->session()->get('login')['id'])
                                    ->where('cardNumber', '=', $data['cardNumber'])->get();
        if(!count($carding) > 0)
        {
            $data['client_id'] = request()->session()->get('login')['id'];
            $carding = \App\CreditCard::create($data);
            unset($data['client_id']);
        }
        else
        {
            $carding = $carding[0];
        }


        unset($data['cardNumber']);
        unset($data['ccv']);
        unset($data['mes']);
        unset($data['ano']);

        $data['reference'] = $pedido->id;
        $data['senderName'] = $pedido->client->nome;
        $data['senderCPF'] = trim(str_replace("-", "", str_replace(".", "", $pedido->client->cpf)));
        $senderPhone = str_replace(' ', '', str_replace('-', '', str_replace(')', '', str_replace('(', '', $pedido->client->telefone))));
        $data['senderAreaCode'] = substr($senderPhone, 0, 2);
        $data['senderPhone'] = substr($senderPhone, 2, strlen($senderPhone));
        $data['senderEmail'] = $pedido->client->email;

        //Dados de Entrega
        $data['shippingAddressStreet'] = $pedido->client->endereco;
        $data['shippingAddressNumber'] = $pedido->client->numero;
        $data['shippingAddressComplement'] = $pedido->client->complemento;
        $data['shippingAddressDistrict'] = $pedido->client->bairro;
        $data['shippingAddressPostalCode'] = $pedido->client->cep;
        $data['shippingAddressCity'] = $pedido->client->cidade;
        $data['shippingAddressState'] = $pedido->client->estado;
        $data['shippingAddressCountry'] = "BR";
        $data['shippingCost'] = number_format($pedido->frete, 2, '.', '');
        $data['shippingType'] = 3;
        //$data['extraAmount'] = 0.00;

        $itens = App\OrderItem::with('product')->where('order_id', '=', session()->get('carrinho'))->get();
        for ($i=0; $i < count($itens); $i++) 
        { 
            $data['itemId'. ($i+1)] = $itens[$i]->product_id;
            $data['itemDescription'. ($i+1)] = $itens[$i]->product->title;
            $data['itemAmount'. ($i+1)] = number_format($itens[$i]->preco, 2, '.', '');
            $data['itemQuantity'. ($i+1)] = number_format($itens[$i]->qtde, 0, '.', '');
        }




        //Dados do Vendedor
        $data['token'] = '4A2D219550EB40058D0A58B4C7817427';
        $data['email'] = 'contato@bodydiet.com.br';
        $data['receiverEmail'] = 'contato@bodydiet.com.br';
        $data['paymentMode'] = 'default';
        $data['paymentMethod'] = 'creditCard';
        $data['currency'] = 'BRL';

        $data['installmentValue'] = number_format($data['installmentValue'], 2, '.', '');

        //if($data['installmentQuantity'] > 1)
            //$data['noInterestInstallmentQuantity'] = 2;

        //print_r($data);
        //exit;

        try {

            $response = (new PagSeguro)->request(PagSeguro::CHECKOUT, $data);
            //return redirect()->route('loja.pedido.pago');
            $transacao = new \SimpleXMLElement($response->getContents());

            $pedido->update(['status' => 'Aguardando Entrega']);
            $carding->update(['status' => 'Aprovado']);

            return response()->json(['status' => 'Ok', 'sucesso' => $transacao]);

        } catch (\Exception $e) {
            return response()->json(['status' => 'Erro', 'erro' => 'Pagamento Reprovado - '. $e->getMessage()]);
        }

        return $data;

    }
    else       
        return redirect()->route('loja.fazlogin');
})->name('loja.payment.credit');
Route::get('/pagamento-aprovado', 'LojaController@pagamentoAprovado')->name('loja.pedido.pago');

Route::get('/loja/veremail/{email}', function(Request $request, $email){

    $cliente = \App\Client::where('email', '=', $email)->get();

    if(count($cliente) > 0)
        return response()->json(['status' => 'E-mail já cadastrado.']);  
    else
        return response()->json(['status' => 'OK']);    

})->name('loja.emailcad');

Route::post('/novo-carrinho', 'LojaController@novocarrinho')->name('loja.abrircarrinho');
Route::get('/novo-carrinho/logado', 'LojaController@novocarrinhologado')->name('loja.abrircarrinhologado');
Route::get('/destroy', 'LojaController@fecharconta')->name('loja.fecharconta');

Route::post('/pagamento', function(){   
    return view('site.loja.pagamento');
})->name('loja.payment');


/** Controle de Login Loja **/
Route::get('/loja/login', function(){
    $cart = null;

    if(request()->session()->has('carrinho'))
        $cart = \App\Order::with('orderItems')->findOrFail(request()->session()->get('carrinho'));    
    return view('site.loja.login', compact('cart'));
})->name('loja.fazlogin');
Route::get('/loja/logout', 'LojaController@logout')->name('loja.logout');
Route::post('/loja/novo-cadastro', 'LojaController@novocliente')->name('loja.novo.login');
Route::post('/loja/login', 'LojaController@login')->name('loja.login');


/** Dados do cliente **/
Route::get('/loja/minha-conta', function(){
    if(!request()->session()->has('login'))
       return redirect()->route('loja.fazlogin');
    else
    {
        $orders = \App\Order::orderBy('id', 'desc')->where('client_id', '=', request()->session()->get('login')['id'])->where('status', '!=', 'Cancelado')->paginate(10);

        return view('site.loja.minhaconta', compact('orders'));
    }
})->name('loja.minhaconta');

Route::get('/loja/pedido/{id}', function($id){
    if(!request()->session()->has('login'))
       return redirect()->route('loja.fazlogin');
    else
    {
        $order = \App\Order::with('client')->where('id', '=', $id)->get();

        $order = $order[0];

        $items = \App\OrderItem::with('product')->where('order_id', '=', $order->id)->get();

        return view('site.loja.verpedido', compact('order', 'items'));
    }
})->name('loja.verpedido');
Route::get('/minha-conta/continuar-comprando/{id}', function($id){

    request()->session()->put('carrinho', $id);
    return redirect()->route('loja.produtos')->with('status', 'Agora você pode continuar adicionando ou removendo itens ao seu pedido.');
})->name('loja.continuarcomprando');

Route::get('/minha-conta/cancelar-pedido/{id}', function($id){

    $order = \App\Order::findOrFail($id);
    $order->update(['status' => 'Cancelado']);

    return redirect()->route('loja.verpedido', $id)->with('status', 'Pedido Cancelado com sucesso.');
})->name('loja.cancelarpedido');

//
Route::get('/minha-conta/pagar-pedido/{id}', function($id){

    request()->session()->put('carrinho', $id);
    return redirect()->route('loja.fecharpedido');
})->name('loja.pagarpedido');



Route::get('/minha-conta/meus-pontos', function(Request $request){
    if(!session()->has('login'))
        return redirect()->route('loja.fazlogin');
    else
    {
        return view('site.loja.meuspontos');
    }
})->name('loja.minhaconta.pontos');

Route::get('/minha-conta/meus-dados', function(Request $request){
    if(!session()->has('login'))
        return redirect()->route('loja.fazlogin');
    else
    {
        $user = App\Client::findOrFail(request()->session()->get('login')['id']);

        return view('site.loja.editconta', compact('user'));
    }
})->name('loja.minhaconta.dados');

Route::post('/minha-conta/salvar-dados', function(Request $request){
    if(!session()->has('login'))
        return redirect()->route('loja.fazlogin');
    else
    {
        $user = App\Client::find(request()->all()['id']);
        $user->update(request()->all());
        return redirect()->route('loja.minhaconta.dados')->with('status', 'Seus dados foram salvos com sucesso.');
    }
})->name('minhaconta.savedados');

Route::get('/minha-conta/alterar-senha', function(Request $request){
    if(!session()->has('login'))
        return redirect()->route('loja.fazlogin');
    else
    {
        return view('site.loja.editsenha');
    }
})->name('loja.minhaconta.altersenha');

Route::post('/minha-conta/alterar-senha', function(Request $request){
    if(!session()->has('login'))
        return redirect()->route('loja.fazlogin');
    else
    {
        $data = request()->all();
        $user = App\Client::findOrFail($data['id']);
        if($user->senha !== $data['senha_atual'])
            return redirect()->route('loja.minhaconta.altersenha')->with('status', 'A senha atual não confere com o cadastro.')->with('tipo', 'danger');
        if($data['nova_senha'] !== $data['re_nova_senha'])
            return redirect()->route('loja.minhaconta.altersenha')->with('status', 'A nova senha não confere com a confirmação da nova senha, tente novamente')->with('tipo', 'danger');
        $user->update(['senha' => $data['nova_senha']]);
        return redirect()->route('loja.minhaconta.dados')->with('status', 'Sua senha foi alterada com sucesso.');
    }
})->name('loja.minhaconta.editsenha');


/** Aux para API **/
Route::get('/abrelogin', function(){
    return redirect()->route('loja.fazlogin')->with('status', 'E-mail já cadastrado, faça o login para continuar comprando.');
})->name('loja.auxloginapi');

/** Rotas Adm **/
Route::prefix('admin')->group(function() {

    Auth::routes();

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin',
        'middleware' => 'auth'
    ], function() {
        Route::name('dashboard')->get('/', 'DashboardController@index');
        Route::resource('users', 'UserController');
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('cities', 'CityController');
        Route::resource('faq', 'FaqController');
        Route::resource('clients', 'ClientsController');
        Route::resource('midia', 'MidiaController');
        Route::resource('falhas', 'FailureController');
        Route::resource('orders', 'OrderController');
        Route::resource('contacts', 'ContactController');
        Route::resource('coupons', 'CouponController');
        Route::get('/contacts/visto/{id}', 'ContactController@visto')->name('contacts.visto');
        Route::post('/orders/status', 'OrderController@atualizastatus')->name('atualizaStatus');
    });

});
