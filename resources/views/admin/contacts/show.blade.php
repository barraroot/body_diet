@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver Contato</h3>
            <a href="{{route('admincontacts.visto', $result->id)}}" class="btn btn-warning">Marcar como visto</a>
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$result->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{$result->status}}</td>
                </tr>                
                <tr>
                    <th scope="row">Assunto</th>
                    <td>{{$result->assunto}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$result->nome}}</td>
                </tr>
                <tr>
                    <th scope="row">E-mail</th>
                    <td>{{$result->email}}</td>
                </tr>
                <tr>
                    <th scope="row">Telefone</th>
                    <td>{{$result->telefone}}</td>
                </tr>
                <tr>
                    <th scope="row">Cidade</th>
                    <td>{{$result->cidade}}</td>
                </tr>
                <tr>
                    <th scope="row">Disponibilidade de investimento</th>
                    <td>{{$result->valor}}</td>
                </tr>
                <tr>
                    <th scope="row">Irá operar a loja em parceria de outra pessoa? (sócio, etc)</th>
                    <td>{{$result->socio}}</td>
                </tr>
                <tr>
                    <th scope="row">Tem alguma experiência como empresário ou com o comércio?</th>
                    <td>{{$result->experiencia}}</td>
                </tr>
                <tr>
                    <th scope="row">Mensagem</th>
                    <td>{{$result->mensagem}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection