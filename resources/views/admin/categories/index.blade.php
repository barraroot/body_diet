@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Categorias</h3>
            {!! Button::primary(Icon::create('plus').' Nova categoria')->asLinkTo(route('admincategories.create')) !!}
        </div>
        <div class="row">
            {!! Table::withContents($data->items())->striped()->callback('Ações', function($field, $model){
                return Button::link(Icon::create('pencil').'&nbsp;&nbsp;Editar')->asLinkTo(route('admincategories.edit', $model->id)) .' | '.
                       Button::link(Icon::create('folder-open').'&nbsp;&nbsp;Exibir')->asLinkTo(route('admincategories.show', $model->id));
            }) !!}
        </div>
    </div>
@endsection