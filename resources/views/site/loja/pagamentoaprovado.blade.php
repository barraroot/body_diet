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
				<div class="col-md-6">
					<p class="text-center alert alert-success">
						Pagamento Aprovado
					</p>
					<img src="{{asset('images/pago.fw.png')}}" alt="Pedido Pago" />
				</div>
				<div class="col-md-2"></div>
			</div>	
		</div>
	</div>
</div>
@endsection