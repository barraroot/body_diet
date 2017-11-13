@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta contatos</h3>
            <hr />
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Dia</td>
                        <td>Status</td>
                        <td>Assunto</td>
                        <td>Nome</td>
                        <td>Mensagem</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{date_format($item->created_at, 'd/m/Y')}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->assunto}}</td>
                        <td>{{$item->nome}}</td>
                        <td>{{$item->mensagem}}</td>
                        <td>
                            <a href="{{route('admincontacts.show', $item->id)}}" class="btn btn-link">
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