@if(Request::is('*/edit'))
	{!! Form::model($result, ['files' => true, 'method' => 'put', 'url' => route('adminmidia.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['files' => true, 'method' => 'post', 'url' => route('adminmidia.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Titulo']) !!}	
</div>
<div class="form-group">
	{!! Form::label('link', 'Link') !!}
	{!! Form::input('text', 'link', null, ['class' => 'form-control', '', 'placeholder' => 'http://']) !!}
</div>
<div class="form-group">
	{!! Form::label('type', 'Tipo') !!}
	{!! Form::select('type', ['Midia' => 'Midia','Banner' => 'Banner'], null, ['class' => 'form-control', '', 'required' => true]) !!}
</div>
<div class="form-group">
	{!! Form::file('img', array('class' => 'form-control')) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}