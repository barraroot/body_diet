@if(Request::is('*/edit'))
	{!! Form::model($result, ['autocomplete' => 'false', 'method' => 'put', 'url' => route('admincategories.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['autocomplete' => 'false','method' => 'post', 'url' => route('admincategories.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('category', 'Categoria') !!}
	{!! Form::input('text', 'category', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome da categoria']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}