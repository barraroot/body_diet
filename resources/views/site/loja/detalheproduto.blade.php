@extends('layouts.site')

@section('content')
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
<br />
	<div class="page">
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading"><h4  class="modal-title">{{$product->title}}</h4></div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-5">
									<div class="img-overflow" style='background-image: url("{{asset('images/produtos/'.$product->id.'.png')}}");''>
									</div>
								</div>
								<div class="col-md-7">
									<p class="description">{{$product->description}}</p>
									<p class="description">Na compra deste prato você ganha:&nbsp;{{$product->pontos}} pontos</p>
									<br />
									<span class="label label-success">Emagrecimento</span>
									<span class="label label-warning gluten">Não contém glúten</span>
									<span class="label label-info lactose">Não contém lactose</span>
									<h5>Tabela nutricional:</h5>
									<div class="row nutricional">
										<div class="col-md-6">
											<ul>
												<li>
													<div class="row">
														<div class="col-md-3"><div class="frowa">{{$product->vd}}g</div></div>
														<div class="col-md-6"><div class="frowb"></div></div>
														<div class="col-md-3"><span class="pull-right"><div class="frowc">VD</div></span></div>
													</div>
													<li>
														<div class="row">
															<div class="col-md-3"><div class="srowa">{{$product->kcal}}</div></div>
															<div class="col-md-6"><div class="srowb">Kcal</div></div>
															<div class="col-md-3"><span class="pull-right"><div class="srowc">{{number_format($product->kcal_grama,2,',', '.')}}%</div></span></div>
														</div>
													</li>
													<li>
														<div class="row">
															<div class="col-md-3"><div class="trowa">{{$product->carboidrato}}g</div></div>
															<div class="col-md-6"><div class="trowb">Carboidrato</div></div>
															<div class="col-md-3"><span class="pull-right"><div class="trowc">{{number_format($product->carboidrato_grama,2,',', '.')}}%</div></span></div>
														</div>
													</li>
													<li>
														<div class="row">
															<div class="col-md-3"><div class="fhrowa">{{$product->proteina}}g</div></div>
															<div class="col-md-6"><div class="fhrowb">Proteína</div></div>
															<div class="col-md-3"><span class="pull-right"><div class="fhrowc">{{number_format($product->proteina_grama,2,',', '.')}}%</div></span></div>
														</div>
													</li>
													<li>
														<div class="row">
															<div class="col-md-3"><div class="fvrowa">{{$product->gorduras}}g</div></div>
															<div class="col-md-6"><div class="fvrowb">Gorduras Totais</div></div>
															<div class="col-md-3"><span class="pull-right"><div class="fvrowc">{{number_format($product->gorduras_grama,2,',', '.')}}%</div></span></div>
														</div>
													</li>
													<li>
														<div class="row">
															<div class="col-md-3"><div class="sxrowa">{{$product->sodio}}g</div></div>
															<div class="col-md-6"><div class="sxrowb">Sódio</div></div>
															<div class="col-md-3"><span class="pull-right"><div class="sxrowc">{{number_format($product->sodio_grama,2,',', '.')}}%</div></span></div>
														</div>
													</li>
												</ul>
											</div>
											<div class="col-md-6">
												<p class="preco">
													R$ {{number_format($product->price, 2, ',', '.')}}
												<form class="form-inline frmProduto" action="{{route('loja.formitemadd', [$product->id, $nomeProduto])}}" id="frmComprar" method="post">
													{{ csrf_field() }}
													<input type="hidden" name="produto_id" value="{{$product->id}}">
													<div class="form-group">
														<label for="qtde">Quantidade:</label>
														<input style="width: 50px;" type="number" class="form-control" id="qtde" value="{{$qtde}}" name="qtde">
													</div>
													<button type="submit" class="btn btn-success">Comprar</button>
												</form>																
												</p>
											</div>
										</div>
										<p class="description-fixed">
											*% Valores Diários com base em uma dieta de 2.000 kcal
											ou 8400KJ. <br>Seus valores diários podem ser maiores ou menores
											dependendo de  suas necessidades energéticas. <br>
											**Não contém quantidade significativa de gorduras trans.
										</p>
										<p class="text-center">
											<a href="{{route('loja.produtos')}}" class="btn btn-success btn-block">Continuar Comprando</a>
										</p>
									</div>
								</div>
						</div>
				</div>
				<div class="col-md-1"></div>
			</div>
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
					{!! Form::text('telefone', null, ['class' => 'form-control', '', 'placeholder' => 'Telefone', 'required' => true]) !!}
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