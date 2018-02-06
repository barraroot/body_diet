@if(Request::is('*/edit'))
	{!! Form::model($result, ['files' => true, 'autocomplete' => 'false', 'method' => 'put', 'url' => route('adminproducts.update', $result->id)]) !!}
@else
	{!! Form::model(null, ['files' => true, 'autocomplete' => 'false','method' => 'post', 'url' => route('adminproducts.store')]) !!}
@endif
<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			{!! Form::label('title', 'Titulo') !!}
			{!! Form::input('text', 'title', null, ['class' => 'form-control', 'autofocus', 'required', 'placeholder' => 'Titulo do produto']) !!}
		</div>		
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{!! Form::label('price', 'Preço') !!}
			{!! Form::input('text', 'price', null, ['class' => 'form-control', 'required', '', 'placeholder' => 'Preço do produto']) !!}
		</div>		
	</div>
	<div class="col-md-3">
		<div class="form-group">
			{!! Form::label('pontos', 'Pontos') !!}
			{!! Form::input('text', 'pontos', null, ['class' => 'form-control', 'required', '', 'placeholder' => 'Pontos que o produto gera']) !!}
		</div>		
	</div>
	<div class="col-md-2">
		<div class="form-group">
			{!! Form::label('sku', 'Cód. Barras') !!}
			{!! Form::input('text', 'sku', null, ['class' => 'form-control', 'required', '', 'placeholder' => 'Código de Barras']) !!}
		</div>		
	</div>	
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label('description', 'Descrição') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control', 'required', '', 'placeholder' => 'Pontos que o produto gera']) !!}
		</div>			
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('vd', 'V.D.') !!}
			{!! Form::input('text', 'vd', null, ['class' => 'form-control', 'required', '', 'placeholder' => 'VD do produto']) !!}
		</div>	
		<div class="form-group">
			{!! Form::label('category_id', 'Categoria') !!}
			{!! Form::select('category_id', $itens['category'], null, ['class' => 'form-control', 'required', '', 'placeholder' => 'Categoria do produto']) !!}
		</div>	
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('emagrecimento', 'Emagrecimento ?') !!}
						{!! Form::checkbox('emagrecimento') !!}
					</div>				
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('gluten', 'Não c/ glúten ?') !!}
						{!! Form::checkbox('gluten') !!}
					</div>				
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('lactose', 'Não c/ lactose ?') !!}
						{!! Form::checkbox('lactose') !!}
					</div>				
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('kcal', 'Kcal') !!}
					{!! Form::input('text', 'kcal', null, ['class' => 'form-control', 'required', '']) !!}
				</div>				
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('kcal_grama', 'Kcal %') !!}
					{!! Form::input('text', 'kcal_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('carboidrato', 'Carboidrato') !!}
					{!! Form::input('text', 'carboidrato', null, ['class' => 'form-control', 'required', '']) !!}
				</div>				
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('carboidrato_grama', 'Carboidrato %') !!}
					{!! Form::input('text', 'carboidrato_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>

			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('proteina', 'Proteína') !!}
					{!! Form::input('text', 'proteina', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('proteina_grama', 'Proteína %') !!}
					{!! Form::input('text', 'proteina_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>

			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('gorduras', 'Gorduras Totais') !!}
					{!! Form::input('text', 'gorduras', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('gorduras_grama', 'Gorduras Totais %') !!}
					{!! Form::input('text', 'gorduras_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>

			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('liquido', 'Lipídio') !!}
					{!! Form::input('text', 'liquido', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('liquido_grama', 'Lipídio %') !!}
					{!! Form::input('text', 'liquido_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>

			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('sodio', 'Sódio') !!}
					{!! Form::input('text', 'sodio', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
			<div class="col-md-3">
				<div class="form-group">
					{!! Form::label('sodio_grama', 'Sódio %') !!}
					{!! Form::input('text', 'sodio_grama', null, ['class' => 'form-control', 'required', '']) !!}
				</div>			
			</div>
		</div>			
	</div>
	<div class="row">
		<div class="form-group">
			{!! Form::label('foto', 'Foto') !!}
			{!! Form::file('foto', array('class' => 'form-control')) !!}
		</div>			
	</div>
</div>

<div class="form-group">
	{!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}