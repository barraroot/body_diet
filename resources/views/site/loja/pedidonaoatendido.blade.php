@extends('layouts.site')

@section('content')
<div id="inside-page">
	<div class="container">
		<h3 class="text-center">Cidade não atendida</h3>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card bg-warning" style="padding: 10px;">
					<img src="{{asset('images/alert.png')}}" align="left" />
					<p>Infelizmente não atendemos sua cidade no momento, mas não se preucupe que iremos entrar em contato para combinarmos a forma de entrega. Obrigado pela compreensão.
					<br /><br /><br /><br /><br /><br /><br />
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>	
	</div>
</div>
@endsection