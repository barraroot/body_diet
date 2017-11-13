@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver FAQ</h3>
            <a href="{{route('adminfaq.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('adminfaq.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
            {!! Form::close() !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$result->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Titulo</th>
                    <td>{{$result->title}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$result->description}}</td>
                </tr>                
                </tbody>
            </table>
        </div>
    </div>
@endsection