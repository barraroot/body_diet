@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<h3>Minha Conta</h3>
		<br />
		<p><div class="text-right"><a href="{{route('loja.produtos')}}" class="btn btn-success">Continuar Comprando</a></div></p>
		<hr />
		<div class="row">
			<div class="col-md-3">
				<h4>Menu do usuário</h4>
				<ul>
					<li><a href="{{route('loja.minhaconta')}}">Meus Pedidos</a></li>
					<li><a href="{{route('loja.minhaconta.dados')}}">Alterar meus dados</a></li>
					<li><a href="{{route('loja.minhaconta.altersenha')}}">Alterar Senha</a></li>
					<li><a href="{{route('loja.logout')}}">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<h4>Meus Pedidos</h4>
				<table class="table">
					<thead>
						<tr>
							<td>Nº Pedido</td>
							<td>Dia</td>
							<td>Status</td>
							<td>Entrega</td>
							<td>Valor dos Produtos</td>
							<td>Frete</td>
							<td>Total</td>
							<td>Detalhes</td>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{date_format($order->created_at, 'd/m/Y')}}</td>
							<td>{{$order->status}}</td>
							<td>{{$order->endereco}}</td>
							<td>{{number_format($order->total_produtos, 2, ',', '.')}}</td>
							<td>{{number_format($order->frete, 2, ',', '.')}}</td>
							<td>{{number_format($order->total, 2, ',', '.')}}</td>
							<td><a href="{{route('loja.verpedido', $order->id)}}">Ver Pedido</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@if(count($orders) <= 0)
					<h3 class="text-center">Nenhum pedido localizado</h3>
				@endif
			</div>
		</div>	
	</div>
</div>
@endsection