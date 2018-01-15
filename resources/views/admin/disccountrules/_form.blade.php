@if(Request::is('*/edit'))
	{!! Form::model($result, ['autocomplete' => 'false', 'method' => 'put', 'url' => route('admindiccountrules.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['autocomplete' => 'false','method' => 'post', 'url' => route('admindiccountrules.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('title', 'Titulo') !!}
	{!! Form::input('text', 'title', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Titulo para identificar a regra', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('valido', 'Valido até') !!}
	{!! Form::input('date', 'valido', null, ['class' => 'form-control', 'placeholder' => 'dd/MM/aaaa', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('valor', 'Valor do pedido') !!}
	{!! Form::input('text', 'valor', null, ['class' => 'form-control text-right', 'placeholder' => 'R$ 0,00', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('diccount_frete', 'Desconto frete (%)') !!}
	{!! Form::input('text', 'diccount_frete', null, ['class' => 'form-control text-right', 'placeholder' => '0,00', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('diccount_order', 'Desconto pedido (%)') !!}
	{!! Form::input('text', 'diccount_order', null, ['class' => 'form-control text-right', 'placeholder' => '0,00', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}