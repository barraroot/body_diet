@if(Request::is('*/edit'))
	{!! Form::model($result, ['autocomplete' => 'false', 'method' => 'put', 'url' => route('adminusers.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['autocomplete' => 'false','method' => 'post', 'url' => route('adminusers.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('name', 'Nome') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Nome']) !!}	
</div>
<div class="form-group">
	{!! Form::label('email', 'E-mail') !!}
	{!! Form::input('email', 'email', null, ['class' => 'form-control', '', 'placeholder' => 'Email de acesso']) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Senha') !!}
	{!! Form::input('password', 'password', '', ['class' => 'form-control', '', 'placeholder' => 'Senha']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}