@extends('layouts.site')

@section('content')
	<div id="topslider" class="carousel slide" data-ride="carousel">
	    <div class="carousel-inner" role="listbox">
	        @foreach($siteBanners as $banner)
	        <div class="item
	            @if ($loop->first) 
	                active
	            @endif
	        ">
	        <a href="http://{{$banner->link}}" target="_blank">
	            <img src="{{asset('images/midia/'. $banner->img)}}" alt="" class="img-responsive">
	        </a>
	        </div>
	        @endforeach
	    </div>
	    <a class="left carousel-control" href="#topslider" role="button" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	        <span class="sr-only">Anterior</span>
	    </a>
	    <a class="right carousel-control" href="#topslider" role="button" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	        <span class="sr-only">Próximo</span>
	    </a>
	</div>
	<div id="inside-page" class="produtos">
		<div class="container">
			@if (session('status'))
			    <div class="alert alert-success">
			        {{ session('status') }}
			    </div>
			@endif			
			@foreach ($data as $category)
				@if(count($category->products) > 0)
				<h3>{{$category->category}}</h3>
						@foreach($category->products as $product)
						@php
								$nomeProduto = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$product->title);
								
								$nomeProduto = strtolower(str_replace("/", "", str_replace(" ", "-", $nomeProduto)));

								$qtde = 0;
								if($cart !== null)
								{
									foreach($cart->orderItems as $itemCart)
									{
										if($product->id == $itemCart->product_id)
											$qtde = $itemCart->qtde; 
									}
								}
						@endphp
						<div class="row">
							<div class="col-md-3 hidden-xs text-right">
								<img src="{{asset('images/produtos/'.$product->img)}}" class="img-rounded" alt="{{$product->title}}" width="30%" />
							</div>
							<div class="col-md-4 col-xs-7">
								<b><a href="{{route('loja.produto', [$nomeProduto,  $product->id])}}">{{$product->title}}</a></b>
								<br/>
								<small>{{$product->description}}</small>									
							</div>
							<div class="col-md-2 col-xs-2 text-right">R$ {{number_format($product->price, 2, ',', '.')}}</div>
							<div class="col-md-3 col-xs-3">
								<form class="form-inline frmProduto" action="{{route('loja.formitemadd', [$product->id, $nomeProduto])}}" id="frmComprar{{$product->id}}" method="post">
									{{ csrf_field() }}
									<input type="hidden" name="produto_id" value="{{$product->id}}" >
									<input type="hidden" id="preco{{$product->id}}" name="preco{{$product->id}}" value="{{$product->price}}" >													
									<div class="form-group">
										<input style="width: 60px;" type="number" class="form-control" id="qtde{{$product->id}}" value="{{$qtde}}" name="qtde" readonly="readonly">
									</div>
									<button type="submit" produto-id="{{$product->id}}" operacao="+" class="btn btn-success comprar" >+</button>
									<button type="submit" produto-id="{{$product->id}}" operacao="-" class="btn btn-success comprar">-</button>
								</form>
							</div>
						</div>
						<hr />					
						@endforeach
					@endif
			@endforeach
		</div>	
	</div>
{!! Form::open(['url' => route('loja.abrircarrinho'), 'method' => 'post', 'id' => 'frmAbreCarrinho']) !!}
<input type="hidden" id="txtEndEndereco" name="endereco" value="" />
<input type="hidden" id="txtEndBairro" name="bairro" value="" />
<input type="hidden" id="txtEndCidade" name="cidade" value="" />
<input type="hidden" id="txtEndEstado" name="estado" value="" />
<div class="modal fade" tabindex="-1" id="abreCarrinhoNaoLogado" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cidades Atendidas</h4>
      </div>
      <div class="modal-body">
        <p>Antes de começar a comprar por favor, informe seu cep para verificarmos disponibilidade de atendimento.Ou <a href="{{route('loja.fazlogin')}}" class="btn btn-link">Já possuiu cadastro</a></p>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('cep', 'Cep') !!}
					{!! Form::text('cep', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00000-000', 'required' => true, 'id' => 'txtCep']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('nome', 'Nome') !!}
					{!! Form::text('nome', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome', 'required' => true]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('email', 'E-mail') !!}
					{!! Form::email('email', null, ['class' => 'form-control', '', 'placeholder' => 'E-mail', 'required' => true]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('telefone', 'Telefone') !!}
					{!! Form::text('telefone', null, ['class' => 'form-control', '', 'placeholder' => 'Telefone', 'required' => true, 'id' => 'txtPhone']) !!}
				</div>
			</div>
		</div>
		<p class="bg-danger" id="erroFormEnd"></p>        
      </div>
      <div class="modal-footer">
        {!! Form::submit('Enviar', ['class' => 'btn btn-success btn-block bt-abre-carrinho']) !!}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}

    @php
        $itens = 0;
        $total = 0;
        if(Session::has('carrinho')) {
            if(!empty($cart->orderItems)) {
                foreach($cart->orderItems as $item) {
                    $itens += $item->qtde;
                    $total += $item->total;
                }
            }
        }
    @endphp

    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-1 hidden-xs"></div>
                    <div class="col-md-2 hidden-xs pd-bottom-bar">
                        <img src="{{asset('images/buy.png')}}" align="carrinho" class="img img-responsive" />
                    </div>
                    <div class="col-md-3 col-xs-3 pd-bottom-bar">
                        <span>PRATOS</span><br />
                        <input type="text" class="form-control text-center" value="{{$itens}}" id="carrinhoPratos">
                    </div>
                    <div class="col-md-4 col-xs-4 pd-bottom-bar">
                        <span>TOTAL</span><br />
                        <input type="text" class="form-control text-right" value="{{'R$ '.number_format($total, 2, ',', '.')}}" id="carrinhoTotal">
                    </div>
                    <div class="col-md-2 hidden-xs pd-btn-concluir">
                        <br />
                        <a class="btn btn-success btn-lg bt-fechar" href="/fechar-carrinho/">CONCLUIR COMPRA</a>
                    </div>
                    <div class="col-xs-5 hidden-md hidden-lg">
                        <br />
                        <a class="btn btn-success bt-fechar" href="/fechar-carrinho/">CONCLUIR</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </nav>

@endsection

@section('script')
	
	$('#txtCep').mask('00000-000');
	$('#txtPhone').mask('(00)00000-0000');
	$('#txtCep').focusout(function(){
		let cep = $(this).val();
		cep = cep.replace("-", "").replace(".", "").replace(",", "").trim();
		if(cep.length == 8) {
			$.get('https://viacep.com.br/ws/' + cep + '/json/')
				.then(function(res) {
					if(res.erro !== true) {
						$('#erroFormEnd').html("");
						$('#txtEndEndereco').val(res.logradouro);
						$('#txtEndEstado').val(res.uf);
						$('#txtEndCidade').val(res.localidade);
						$('#txtEndBairro').val(res.bairro);
						$('#txtEndCep').val(res.cep);
						validaEndereco = true;
					} else {
					$('#erroFormEnd').html("Não conseguimos localizar seu CEP, por favor tente novamente.");
					$('#txtCep').val('');
					$('#txtCep').focus();
				}
			});			
		}
	});


	let semCarrinho = @php echo (empty($cart) ? "true" : "false"); @endphp;
	let validaEndereco = @php echo (empty($cart) ? "false" : "true"); @endphp;
	let usuarioLogado  = @php echo (session()->has('login') ? session()->has('login') : "0"); @endphp;

	var formProduto = null;
	var carrinhoId = @php echo (empty($cart) ? 0 : $cart->id); @endphp;;
	var url = "{{url('/fechar-carrinho/')}}";

	if(carrinhoId > 0)
		atualizaCarrinho();


	$('.comprar').click(function(e){
		e.preventDefault();

		var produtoId = $(this).attr('produto-id');
		var qtdeAtual = $('#qtde' + produtoId).val();

		$(this).prop('disabled',true);

		if($(this).attr('operacao') == '+')
		{
			qtdeAtual++;
		}
		else
		{
			qtdeAtual--;
			if(qtdeAtual < 0)
				qtdeAtual = 0;
		}
		$('#qtde' + produtoId).val(qtdeAtual);

		formProduto = $('#frmComprar' + produtoId);

		if(semCarrinho)
		{
			if(usuarioLogado > 0)
			{
				$.get('/api/novo-carrinho-logado/' + usuarioLogado, function(data){ 
					console.log(data);
					if(data.status == 'sucesso')
					{
						carrinhoId = data.pedido;
						urlItem = "/api/add-item/" + carrinhoId;
						semCarrinho = false;
						$.post(urlItem, formProduto.serialize(), function(data){
							atualizaCarrinho();
						});
					}
					else
					{
						window.location.href = "{{route('loja.auxloginapi')}}";
					}
				});
			}
			else
			{
				$('#abreCarrinhoNaoLogado').modal('show');
			}
		}
		else
		{
			if(qtdeAtual <= 0)
			{
				urlItem = "/api/removeritem/" + carrinhoId +'/'+ $(this).attr('produto-id');
				$.get(urlItem, function(data){
					atualizaCarrinho();
				});	
			}
			else
			{
				urlItem = "/api/add-item/" + carrinhoId;
				$.post(urlItem, formProduto.serialize(), function(data){
					atualizaCarrinho();
				});			
			}
		}
		$(this).prop('disabled',false);
	});

	$('#frmAbreCarrinho').submit(function(e){
		e.preventDefault();
		
		var url = "/api/novo-carrinho";
		var dataEnv = {
			endereco: $('#txtEndEndereco').val(),
			bairro: $('#txtEndBairro').val(),
			cidade: $('#txtEndCidade').val(),
			estado: $('#txtEndEstado').val(),
			cep: $('#txtCep').val(),
			nome: $('#nome').val(),
			email: $('#email').val(),
			telefone: $('#txtPhone').val()
		};

		$('.bt-abre-carrinho').prop('disabled',true);
		$('.bt-abre-carrinho').val('Aguarde...');

		$.post(url, dataEnv, function(data, status, xhr){
			if(data.status == "error")
			{
				window.location.href = "{{route('loja.auxloginapi')}}";
			}
			else
			{
				carrinhoId = data.pedido;
				$('#abreCarrinhoNaoLogado').modal('toggle');
				urlItem = "/api/add-item/" + carrinhoId;
				semCarrinho = false;


				$.post(urlItem, formProduto.serialize(), function(data){
					atualizaCarrinho();
				});
			}
		}).fail(function(e){
			console.log(e);
		});


		return false;
	});

	function atualizaCarrinho()
	{
		if(carrinhoId >= 0)
		{
				$('#carrinhoPratos').val('...');
				$('#carrinhoTotal').val('...');			
			$.get('/api/calcula-carrinho/' + carrinhoId, function(data){
				$('#carrinhoPratos').val(data.pratos);
				$('#carrinhoTotal').val('R$ ' + data.total);
			});
			$('.bt-fechar').attr('href', url + '/' + carrinhoId);
		}
	}

@endsection