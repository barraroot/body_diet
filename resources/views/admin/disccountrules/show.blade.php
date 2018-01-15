@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <h3>Ver regra para descontos</h3>
            <a href="{{route('admindiccountrules.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('admindiccountrules.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
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
                    <th scope="row">Valido até</th>
                    <td>{{$result->valido}}</td>
                </tr>
                <tr>
                    <th scope="row">Criado em</th>
                    <td>{{date_format($result->created_at, 'd/m/Y')}}</td>
                </tr>
                <tr>
                    <th scope="row">Valor igual ou maior que</th>
                    <td>{{number_format($result->valor, 2, ',', '.')}}</td>
                </tr>
                <tr>
                    <th scope="row">Desconto Frete (%)</th>
                    <td>{{number_format($result->diccount_frete, 2, ',', '.')}}</td>
                </tr>
                <tr>
                    <th scope="row">Desconto Pedido (%)</th>
                    <td>{{number_format($result->diccount_order, 2, ',', '.')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection