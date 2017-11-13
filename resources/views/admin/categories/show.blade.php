@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver categoria</h3>
            @php
                $linkEdit = route('admincategories.edit',['category' => $category->id]);
                $linkDelete = route('admincategories.destroy',['category' => $category->id]);
            @endphp
            {!! Button::primary(Icon::pencil().' Editar')->asLinkTo($linkEdit) !!}
            {!!
            Button::danger(Icon::remove().' Excluir')->asLinkTo($linkDelete)
                ->addAttributes([
                    'onclick' => "event.preventDefault();document.getElementById(\"form-delete\").submit();"
                ])
            !!}
            @php
                $formDelete = FormBuilder::plain([
                    'id' => 'form-delete',
                    'url' => $linkDelete,
                    'method' => 'DELETE',
                    'style' => 'display:none'
                ])
            @endphp
            {!! form($formDelete) !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$category->category}}</td>
                </tr>
                <tr>
                    <th scope="row">Exibir?</th>
                    <td>{{$category->showbool == 1 ? "Sim" : "Não"}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection