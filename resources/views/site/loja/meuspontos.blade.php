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
					<li><a href="{{route('loja.minhaconta.pontos')}}">Meus Pontos</a></li>
					<li><a href="{{route('loja.minhaconta.dados')}}">Alterar meus dados</a></li>
					<li><a href="{{route('loja.minhaconta.altersenha')}}">Alterar Senha</a></li>
					<li><a href="{{route('loja.logout')}}">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<h4>Meus pontos</h4>
				<table class="table">
					<thead>
						<th>
							<td>#</td>
							<td>Dia</td>
							<td>Quantidade de Itens</td>
							<td>Total em pontos</td>
							<td>Detalhes</td>
						</th>
					</thead>
					<tbody>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<h3 class="text-center">Nenhum pedido localizado</h3>
			</div>
		</div>	
	</div>
</div>
@endsection