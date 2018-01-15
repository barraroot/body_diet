@extends('layouts.site')

@section('content')
<div id="inside-page" class="contato">
	<h2 class="text-center">Franquia</h2>
	<div class="container">
		<h3 class="text-center">Abra um franquia body diet.</h3>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-8 pull-right">
								<form action="{{route('loja.contato')}}" class="form" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<input type="text" class="form-control text-right" name="nome" id="nome" placeholder="Nome">
									</div>
									<div class="form-group">
										<input type="text" class="form-control text-right" name="email" id="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input type="text" class="form-control text-right" name="telefone" id="phone" placeholder="Telefone">
									</div>
									<div class="form-group">
										<input type="text" class="form-control text-right" name="cidade" id="cidade" placeholder="Cidade">
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control text-right" name="assunto" id="assunto" value="Abertura de Franquia">
									</div>
									<div class="form-group">
										<label>Disponibilidade de investimento</label>
										<select class="form-control" name="valor">
											<option>De R$0,00 á R$ 50.000,00</option>
											<option>De R$50.000,00 á R$ 100.000,00</option>
											<option>De R$100.000,00 á R$ 150.000,00</option>
										</select>
									</div>
									<div class="form-group">
										<label>Irá operar a loja em parceria de outra pessoa? (sócio, etc)</label>
										<select class="form-control" name="socio">
											<option>Não</option>
											<option>Sim</option>
										</select>
									</div>
									<div class="form-group">
										<label>Tem alguma experiência como empresário ou com o comércio?</label>
										<select class="form-control" name="experiencia">
											<option>Não</option>
											<option>Sim</option>
										</select>
									</div>
									<div class="form-group">
										<textarea name="mensagem" id="msg" cols="30" rows="10" class="form-control" style="resize:none;" placeholder="Deixe aqui sua sugestão, dúvida ou mensagem."></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-success pull-right">Enviar</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-8">
							<p class="text-left">
								<i class="fa fa-map"></i> Rua 6, Nº 426, Entre a Av. 13 e 15, <br />
								Jd. Dona Angela - Centro, Rio Claro - SP <br /><br />
								<i class="fa fa-phone"></i> (19) 3532.2814 <br />
								<i class="fa fa-mobile"></i> (19)99715-8129
							</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
