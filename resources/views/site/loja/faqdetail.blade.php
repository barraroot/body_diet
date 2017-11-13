@extends('layouts.site')

@section('content')
<div id="inside-page">
	<div class="container">
		<h3 class="text-center">{{$faq->title}}</h3>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card" style="padding: 10px;">
					<textarea rows="30" cols="102" readonly="readonly">{{$faq->long_description}}</textarea>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>	
	</div>
</div>
@endsection