@if(Request::is('*/edit'))
	{!! Form::model($result, ['autocomplete' => 'false', 'method' => 'put', 'url' => route('adminfaq.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['autocomplete' => 'false','method' => 'post', 'url' => route('adminfaq.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Titulo do FAQ']) !!}
</div>
<div class="form-group">
	{!! Form::label('description', 'Breve Descrição') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control', '', 'placeholder' => 'Descrição da FAQ']) !!}
</div>
<div class="form-group">
	{!! Form::label('long_description', 'Descrição Longa') !!}
	{!! Form::textarea('long_description', null, ['class' => 'form-control', '', 'placeholder' => 'Descrição da FAQ texto para pagina']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}