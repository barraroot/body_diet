@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver categoria</h3>
            <a href="{{route('admincategories.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('admincategories.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
            {!! Form::close() !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$result->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Descrição</th>
                    <td>{{$result->category}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection