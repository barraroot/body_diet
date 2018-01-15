@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<div class="row">
			<h3>Detalhe do pedido Nº Pedido: {{$order->id}}</h3>
			<hr />			
			<div class="col-md-3">
				<h4>Menu do usuário</h4>
				<ul>
					<li><a href="{{route('loja.minhaconta')}}">Meus Pedidos</a></li>
					<li><a href="{{route('loja.minhaconta.pontos')}}">Meus Pontos</a></li>
					<li><a href="{{route('loja.minhaconta.dados')}}">Alterar meus dados</a></li>
					<li><a href="{{route('loja.minhaconta.altersenha')}}">Alterar Senha</a></li>
					<li><a href="{{route('loja.logout')}}">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<h4>Detalhes da entrega</h4>
				<p class="text-center">
					@if($order->status == 'Pendente' || $order->status == 'Aguardando Pagamento')
						<img src="{{asset('images/pendente.fw.png')}}">	
					@endif
					@if($order->status == 'Aguardando Entrega')
						<img src="{{asset('images/pago.fw.png')}}">	
					@endif
					@if (session('status'))
					    <div class="alert alert-success">
					        {{ session('status') }}
					    </div>
					@endif	
				</p>			
				<table class="table">
					<thead>
						<tr>
							<th>Status</th>
							<th>Entrega</th>
							<th>Total Produtos</th>
							<th>Frete</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td
							@if($order->status == 'Cancelado')
								class="bg-danger"
							@endif
							>{{$order->status}}</td>
							<td>{{$order->client->endereco . ' N.'. $order->client->numero . ' '. $order->complemento . ' '. $order->client->cidade .'/'. $order->client->estado .' CEP: '. $order->client->cep}}</td>
							<td>{{number_format($order->total_produtos, 2, ',', '.')}}</td>
							<td>{{number_format($order->frete, 2, ',', '.')}}</td>
							<td>{{number_format($order->total, 2, ',', '.')}}</td>
						</tr>
					</tbody>
				</table>
				<h4>Produtos</h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Item</th>
							<th>Quantidade</th>
							<th>Valor Unitário</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $key => $item)
						<tr>
							<td>{{$key+1}}</td>
							<td>
								<img src="{{asset('images/produtos/'. $item->product->img)}}" width="60px" />
								{{$item->product->title}}
							</td>
							<td>{{$item->qtde}}</td>
							<td>R$ {{number_format($item->preco, 2, ',', '.')}}</td>
							<td>R$ {{number_format($item->total, 2, ',', '.')}}</td> 
						</tr>
						@endforeach
					</tbody>
				</table>
				<p class="text-center">
					@if($order->status != 'Cancelado')
					<a href="{{route('loja.continuarcomprando', $order->id)}}" class="btn btn-success btn-lg">Continuar Comprando</a>
					@if($order->status == 'Aguardando Pagamento')
						<a href="{{route('loja.pagarpedido', $order->id)}}" class="btn btn-warning btn-lg">Efetuar Pagamento</a>
					@endif
					<a href="{{route('loja.cancelarpedido', $order->id)}}" class="btn btn-danger btn-lg">Cancelar Pedido</a>
					@endif
				</p>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

@endsection