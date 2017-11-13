@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<h3>Cidade Atendidas</h3>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Cidade</th>
							<th>Frete</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cidades as $city)
						<tr>
							<td>{{$city->city}}</td>
							<td>{{number_format($city->frete, 2, ',', '.')}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col-md-3"></div>
		</div>	
	</div>
</div>
@endsection