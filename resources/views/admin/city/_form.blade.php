@if(Request::is('*/edit'))
	{!! Form::model($result, ['method' => 'put', 'url' => route('admincities.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['method' => 'post', 'url' => route('admincities.store')]) !!}
@endif
<div class="form-group">
	{!! Form::label('city', 'Cidade') !!}
	{!! Form::input('text', 'city', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Cidade']) !!}	
</div>
<div class="form-group">
	{!! Form::label('frete', 'Frete R$') !!}
	{!! Form::input('text', 'frete', null, ['class' => 'form-control text-right', '', 'placeholder' => 'Valor Frete R$']) !!}
</div>
<div class="form-group">
	{!! Form::label('valor_minimo', 'Valor Minimo') !!}
	{!! Form::input('text', 'valor_minimo', null, ['class' => 'form-control text-right', '', 'placeholder' => 'Valor Frete R$']) !!}
</div>
<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}