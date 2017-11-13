@extends('layouts.site')

@section('content')
<div id="inside-page" class="midia">
	<h2 class="text-center">Mídia</h2>
	<div class="container">
		<h3 class="text-center">
			Acesse aqui todo nosso conteúdo de mídia relacionada a nossa marca, fique por dentro das tendências e das novidades!
		</h3>
		<div class="row">
			@foreach($midias as $midia)
			<div class="col-md-4">
				<div class="card">
					<img src="{{asset('images/midia/' . $midia->img)}}" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">{{$midia->title}}</h3>
						<center><a href="http://{{$midia->link}}" class="btn btn-success btn-block" target="_blank">Ver mais...</a></center>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection