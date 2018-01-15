@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">	
			<h3 class="text-left">Carrinho</h3>
			<div class="text-right">
				<a href="{{route('loja.produtos')}}" class="btn btn-success btn-lg">Continuar Comprando</a>
			</div>
			<br />			
			<table class="table table-responsive">
				<thead>
					<tr>
						<th>Item</th>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Preço</th>
						<th>Total</th>
						<th>Remover</th>
					</tr>
				</thead>
				<tbody>
				@foreach($carrinho_itens as $key => $value)
				@php
					$nomeProduto = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$value->product->title);
					
					$nomeProduto = strtolower(str_replace("/", "", str_replace(" ", "-", $nomeProduto)));				
				@endphp				
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$value->product->title}}</td>
					<td>{{$value['qtde']}}</td>
					<td>{{number_format($value['preco'], 2, ',', '.')}}</td>
					<td>{{number_format(($value['total']), 2, ',', '.')}}</td>
					<td><a href="{{route('loja.remover', [$value['id'], $nomeProduto])}}" class="btn - btn-danger">Remover</a></td>
				</tr>
				@endforeach
				</tbody>
			</table>
			<hr />
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-4">
					@if (session('status'))
					    <div class="alert alert-danger">
					        {{ session('status') }}
					    </div>
					@endif	
				</div>
				<div class="col-md-5 text-right">
					<form class=" form form-inline" action="{{route('loja.descontopedido')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="carrinho" value="{{session()->get('carrinho')}}" />
						<div class="form-group">
							<input type="text" name="desconto" class="form-control">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Aplicar cupom</button>
						</div>						
					</form>	
				</div>
			</div>			
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<h4 class="text-right"><b>Subtotal:</b> R$ {{number_format($carrinho['total_produtos'], 2, ',', '.')}}</h4>
					<h4 class="text-right"><b>Frete:</b> <span id="valFRETE">R$ {{number_format($carrinho['frete'], 2, ',', '.')}}</span></h4>
					<h4 class="text-right"><b>Desconto:</b> <span id="valFRETE">R$ {{number_format($carrinho['desconto'], 2, ',', '.')}}</span></h4>
					<h4 class="text-right"><b>Total:</b> R$ {{number_format($carrinho['total'], 2, ',', '.')}}</h4>	
				</div>
			</div>
			<div class="row" id="msg">
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					@if($carrinho['total_produtos'] > 150)
					<a href="{{route('loja.fecharpedido')}}" id="btnFinalizar" class="btn btn-success btn-block btn-lg">Finalizar Compra</a>
					@else
					<p class="text-center text-alert">Pedido minimo de R$ 150,00</p>
					<a href="{{route('loja.produtos')}}" class="btn btn-success btn-block btn-lg">Continuar Comprando</a>
					@endif
				</div>
				<div class="col-md-4"></div>
			</div>
	</div>
</div>
@endsection

@section('script')
	


@endsection
