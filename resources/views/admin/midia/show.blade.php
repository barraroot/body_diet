@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver midia</h3>
            <a href="{{route('adminmidia.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('adminmidia.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
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
                    <th scope="row">Link</th>
                    <td><a href="http://{{$result->link}}" class="btn btn-link" target="_blank">{{$result->link}}</a></td>
                </tr>
                <tr>
                    <th scope="row">Imagem</th>
                    <td><img class="img-responsive img-rounded" width="150px;" src="{{asset('images/midia/' . $result->img)}}"></img></td>
                </tr>                
                </tbody>
            </table>
        </div>
    </div>
@endsection