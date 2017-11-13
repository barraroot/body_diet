@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Clientes não atendidos</h3>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>E-mail</td>
                        <td>Telefone</td>
                        <td>Status</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telefone}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="{{route('admincities.show', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Visualizado
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