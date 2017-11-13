@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta FAQs</h3>
            {!! Button::primary(Icon::create('plus').' Nova FAQ')->asLinkTo(route('adminfaq.create')) !!}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Conteudo</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{strlen($item->description) > 50 ? substr($item->description, 0, 50) .'...' : $item->description}}</td>
                        <td>
                            <a href="{{route('adminfaq.edit', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                            &nbsp;|&nbsp;
                            <a href="{{route('adminfaq.show', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Exibir
                            </a>                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{$result->links()}}
            </div>
        </div>
    </div>
@endsection