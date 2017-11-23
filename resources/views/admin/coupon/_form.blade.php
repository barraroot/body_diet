@if(Request::is('*/edit'))
	{!! Form::model($result, ['autocomplete' => 'false', 'method' => 'put', 'url' => route('admincoupons.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['autocomplete' => 'false','method' => 'post', 'url' => route('admincoupons.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('name', 'Descrição') !!}
	{!! Form::input('text', 'name', null, ['class' => 'form-control', 'autofocus','required' => 'required', 'placeholder' => 'Exemplo DESC10']) !!}
</div>
<div class="form-group">
	{!! Form::label('validade', 'Validade') !!}
	{!! Form::input('date', 'validade', null, ['class' => 'form-control', 'required' => 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('desconto', 'Percentual (%)') !!}
	{!! Form::input('text', 'desconto', null, ['class' => 'form-control text-right','required' => 'required', 'autofocus', 'placeholder' => 'Exemplo: 10,00']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}