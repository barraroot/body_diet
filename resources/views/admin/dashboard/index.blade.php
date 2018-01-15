@extends('layouts.app')

@section('content')
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4 text-center">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Pedidos Aguardando Entrega</h3>
							</div>
							<div class="panel-body">
								<h3>0</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Pedidos Aguardando Pagamento</h3>
							</div>
							<div class="panel-body">
								<h3>{{count($paymentOrders)}}</h3>
							</div>
						</div>
					</div>
					<div class="col-sm-4 text-center">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="panel-title">Pedidos Pendentes</h3>
							</div>
							<div class="panel-body">
								<h3>{{count($openOrders)}}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Ultimos Pedidos</h3>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Status</th>
											<th>Cliente</th>
											<th>Valor</th>
											<th class="hidden-xs">Ações</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orders as $order)
										<tr>
											<td>{{$order->id}}</td>
						                    <td
						                        @if($order->status == 'Pendente')
						                        class="bg-warning text-primary"
						                        @elseif($order->status == 'Cancelado')
						                        class="bg-danger text-danger"
						                        @endif
						                    >{{$order->status}}</td>
											<td>
												<a href="#">{{$order->nome}}</a>
											</td>
											<td>R$ {{number_format($order->total, 2, ",", ".")}}</td>
											<td class="hidden-xs">
												<a class="btn btn-xs btn-info" href="{{route('adminorders.show', $order->id)}}">Detalhes</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">Produtos mais vendidos</h3>
							</div>
							<div class="panel-body">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Código</th>
											<th>Produto</th>
											<th>Quantidade</th>
											<th>Preço</th>
											<th class="hidden-xs">Ações</th>
										</tr>
									</thead>
									<tbody>
										@foreach($maisVendidos as $item)
										<tr>
											<td>{{$item->product_id}}</td>
											<td>{{$item->title}}</td>
											<td>{{$item->quantidade}}</td>
											<td>{{number_format($item->price, 2, ',', '.')}}</td>
											<td>
												<a href="#"></a>
											</td>
											<td class="hidden-xs">
												<a class="btn btn-xs btn-warning" href="{{route('adminproducts.show', $item->product_id)}}">Visualizar</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection