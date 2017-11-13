@extends('layouts.site')

@section('content')
<div id="inside-page" class="midia">
	<h2 class="text-center">Mídia</h2>
	<div class="container">
		<h3 class="text-center">
			Acesse aqui todo nosso conteúdo de mídia relacionada a nossa marca, fique por dentro das tendências e das novidades!
		</h3>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img src="images/midia/image1.jpg" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">Empresa pioneira em pratos congelados saudáveis ganha mercado em Rio claro e região!</h3>
						<center><a href="http://www.gigatem.com.br/noticia/154/empresa-pioneira-em-pratos-congelados-saudaveis-ganha-mercado-em-rio-claro-e-regiao.html" class="btn btn-success btn-block" target="_blank">Ver mais...</a></center>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="images/midia/image2.jpg" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">Body Diet, Uma nova Opção para se Comer Bem!</h3>
						<center><a href="https://www.youtube.com/watch?v=NDoz2leElQ0" class="btn btn-success btn-block" target="_blank">Ver mais...</a></center>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection