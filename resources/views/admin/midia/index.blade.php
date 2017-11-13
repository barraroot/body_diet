@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Midias</h3>
            {!! Button::primary(Icon::create('plus').' Nova midia')->asLinkTo(route('adminmidia.create')) !!}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Imagem</td>
                        <td>Tipo</td>
                        <td>Titulo</td>
                        <td>Link</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td><img class="img-responsive img-rounded" width="80px;" src="{{asset('images/midia/' . $item->img)}}"></img></td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->title}}</td>
                        <td><a href="http://{{$item->link}}" class="btn btn-link" target="_blank">Acessar</a></td>
                        <td>
                            <a href="{{route('adminmidia.edit', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                            &nbsp;|&nbsp;
                            <a href="{{route('adminmidia.show', $item->id)}}" class="btn btn-link">
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