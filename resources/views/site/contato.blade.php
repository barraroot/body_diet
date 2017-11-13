@extends('layouts.site')

@section('content')
<div id="inside-page" class="contato">
	<h2 class="text-center">Contato</h2>
	<div class="container">
		<h3 class="text-center">Sugestões ou dúvidas?! Entre em contato conosco e iremos responder em breve!</h3>
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
										<input type="text" class="form-control text-right" name="assunto" id="assunto" placeholder="Assunto (Academia, Nutrição, Sugestão, Dúvida, etc...)">
									</div>
									<div class="form-group">
										<label for="curriculum" style="width: 100%;">Curriculum<small class="pull-right"> Disponível apenas para residentes de Rio Claro / SP.</small></label>
										<input type="file" class="form-control" id="curriculum" name="curriulum">
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
