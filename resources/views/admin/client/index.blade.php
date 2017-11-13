@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta clientes</h3>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Telefone</td>
                        <td>Celular</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telefone}}</td>
                        <td>{{$item->celular}}</td>
                        <td>{{$item->cidade . '/' . $item->estado}}</td>
                        <td>
                            <a href="{{route('adminclients.show', $item->id)}}" class="btn btn-link">
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