@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<div class="row">
			<h3>Pagamento</h3>
			<br />
			<br />
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">
					<img src="{{asset('images/vcard.png')}}" />
				</div>
				<div class="col-md-6 alert alert-success">
					<p>
						Seu pagamento esta sendo processado pelo PagSeguro, assim que aprovado, você deverá receber um e-mail de confirmação de pagamento. Os pagamento são processados automaticamente pelo pagseguro e atualizados em nosso sistema, caso haja algum problema com seu pagamento, nossa equipe irá entrar em contato.
					</p>
				</div>
				<div class="col-md-2"></div>
			</div>	
		</div>
	</div>
</div>
@endsection