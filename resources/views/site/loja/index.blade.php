@extends('layouts.site')

@section('content')
	<div id="inside-page" class="produtos">
		<div class="container">
			<h1>Banners</h1>
			<div id="topslider" class="carousel slide" data-ride="carousel">
			    <div class="carousel-inner" role="listbox">
			        <div class="item active">
			            <img src="{{asset('images/slider/slide.jpg')}}" alt="" class="img-responsive">
			        </div>
			        <div class="item">
			            <img src="{{asset('images/slider/slide2.jpg')}}" alt="" class="img-responsive">
			        </div>
			        <div class="item">
			            <img src="{{asset('images/slider/slide3.jpg')}}" alt="" class="img-responsive">
			        </div>
			        <div class="item">
			            <img src="{{asset('images/slider/slide4.jpg')}}" alt="" class="img-responsive">
			        </div>
			    </div>
			    <a class="left carousel-control" href="#topslider" role="button" data-slide="prev">
			        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			        <span class="sr-only">Previous</span>
			    </a>
			    <a class="right carousel-control" href="#topslider" role="button" data-slide="next">
			        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			        <span class="sr-only">Next</span>
			    </a>
			</div>
			@foreach ($data as $category)
				@if(count($category->products) > 0)
				<h3>{{$category->category}}</h3>
					<div class="row">
					@foreach($category->products as $product)
						<div class="col-md-3">
							<div class="panel panel-info">
								<div class="panel-body">
									<img src="{{asset('images/produtos/'.$product->id.'.png')}}" class="img-responsive" alt="{{$product->title}}" />
									<h4 class="text-center"><b>{{$product->title}}</b></h4>
									<p class="text-right"><b>R$&nbsp;</b>{{$product->price}}
									<div class="text-center">
										@php
											$nomeProduto = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$product->title);
											
											$nomeProduto = strtolower(str_replace(" ", "-", $nomeProduto));								
										@endphp
										<a href="{{route('loja.itemadd', [$product->id, $nomeProduto])}}" class="btn btn-success">Comprar</a>
									</div>
								</div>
							</div>	
						</div>
					@endforeach
					</div>
					@endif
			@endforeach
		</div>	
	</div>
@endsection