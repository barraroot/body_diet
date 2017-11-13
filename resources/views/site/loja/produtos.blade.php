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
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-9">
							<table class="table">
								<tbody>
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
										<tr>
											<td class="text-right">
												<img src="{{asset('images/produtos/'.$product->id.'.png')}}" class="img-responsive" alt="{{$product->title}}" width="60px" />
											</td>
											<td class="text-left"><b><a href="{{route('loja.produto', [$nomeProduto,  $product->id])}}">{{$product->title}}</a></b></td>
											<td class="text-right">R$ {{number_format($product->price, 2, ',', '.')}}</td>
											<td class="text-right">
	
												<form class="form-inline frmProduto" action="{{route('loja.formitemadd', [$product->id, $nomeProduto])}}" id="frmComprar" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="produto_id" value="{{$product->id}}">
													<div class="form-group">
														<label for="qtde">Quant.:</label>
														<input style="width: 60px;" type="number" class="form-control" id="qtde" value="{{$qtde}}" name="qtde">
													</div>
													<button type="submit" class="btn btn-success">Comprar</button>
												</form>										
											</td>
										</tr>
										@endforeach
								</tbody>
							</table>
						</div>
						<div class="col-md-2"></div>
					</div>
					@endif
			@endforeach
		</div>	
	</div>
{!! Form::open(['url' => route('loja.abrircarrinho'), 'method' => 'post', 'id' => 'frmAbreCarrinho']) !!}
<input type="hidden" id="txtEndEndereco" name="endereco" value="" />
<input type="hidden" id="txtEndBairro" name="bairro" value="" />
<input type="hidden" id="txtEndCidade" name="cidade" value="" />
<input type="hidden" id="txtEndEstado" name="estado" value="" />
<div class="modal fade" tabindex="-1" id="cidadeNaoAtendida" role="dialog">
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
        {!! Form::submit('Enviar', ['class' => 'btn btn-success btn-block']) !!}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}
@endsection

@section('script')
	
	$('#txtCep').mask('00000-000');
	$('#txtPhone').mask('(00)00000-0000');

	let modalCarrinho = @php echo (empty($cart) ? "true" : "false"); @endphp;
	let validaEndereco = @php echo (empty($cart) ? "false" : "true"); @endphp;
	let usuarioLogado  = @php echo (session()->has('login') ? "true" : "false"); @endphp;

	$('.frmProduto').submit(function(e){
		if(modalCarrinho){
			if(!usuarioLogado) {
				$('#cidadeNaoAtendida').modal('show');
				return false;
			} else {
				$.get('{{route('loja.abrircarrinhologado')}}', function(data){ });
				return true;
			}
		} else {
			return true;
		}
	});

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

	$('#frmAbreCarrinho').on('submit', function() {

		if(!validaEndereco) {

			return false;
		}

	});

	$('#frmCalcFrete').submit(function(e){
		e.preventDefault();

		$('#myModal').modal('hide');

		let cep = $('#cep').val();
		if(cep.length == 8) {
			$.get('https://viacep.com.br/ws/' + cep + '/json/')
				.then(function(res) {
					if(res.erro == true) {
						alert('CEP não encontrado.');
					} else {
						console.log(cidadesAtendidas.indexOf(res.localidade));
						if(cidadesAtendidas.indexOf(res.localidade) < 0) {
							$('#cidadeNaoAtendida').modal('show');
						} else {
							localStorage.setItem("endereco", res.logradouro);
							localStorage.setItem("estado", res.uf);
							localStorage.setItem("cidade", res.localidade);
							localStorage.setItem("bairro", res.bairro);
							localStorage.setItem("cep", res.cep);
						}
						
						calcFrete = true;
					}
			});
		}
		return false;
	});

	$('#btnFinalizar').click(function(e){
		if(!calcFrete) {
			alert('calcule o frete antes de finalizar');
			return false;
		}
	});

@endsection