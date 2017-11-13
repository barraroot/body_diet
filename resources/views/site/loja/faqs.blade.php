@extends('layouts.site')

@section('content')
<div id="inside-page">
	<div class="container">
		<h3 class="text-center">Separe alguns minutos do seu dia e garanta refeições saudáveis para sua semana.</h3>
		<div class="row">
			@foreach($faqs as $faq)
			<div class="col-md-4">
				<div class="card" style="height: 350px;padding:5px">
					@if(strlen($faq->long_description) > 0)
					<a href="{{route('loja.faqdetails', $faq->id)}}">
					@endif
					<h3 class="text-center">{{$faq->title}}</h3>
					@if(strlen($faq->long_description) > 0)
					</a>
					@endif
					<p>{{$faq->description}}</p>
					@if(strlen($faq->long_description) > 0)			
					<a href="{{route('loja.faqdetails', $faq->id)}}" class="btn btn-link text-right">Saiba mais...</a>
					@endif
				</div>
			</div>
			@endforeach
		</div>	
	</div>
</div>
@endsection