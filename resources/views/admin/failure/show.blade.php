@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver categoria</h3>
            <a href="{{route('admincategories.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('admincities.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
            {!! Form::close() !!}
            <br/><br/>
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{$result->id}}</td>
                </tr>
                <tr>
                    <th scope="row">Nome</th>
                    <td>{{$result->city}}</td>
                </tr>
                <tr>
                    <th scope="row">Exibir?</th>
                    <td>{{number_format($result->frete, 2, ',', '.')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection