@extends('layouts.site')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<h3>Mensagem enviada com sucesso</h3>
			<p>Caro Sr(a). {{result->nome}}, infelizmente não atendemos sua sua mas esatremos estudando uma maneira de enviar-lhe nossos produtos e breve entraremos em contato pelo e-mail {{$result->email}} ou pelo telefone {{$result->telefone}}</p>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>	
@endsection