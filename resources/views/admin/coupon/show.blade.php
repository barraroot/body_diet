@extends('layouts.app')

@section('content')
    @php
        $totalPedidos = 0;
        $totalDescontos = 0;
    @endphp
   <div class="container">
        <div class="row">
            <h3>Resultado do Cupom</h3>
            <a href="{{route('admincoupons.edit', $result->id)}}" class="btn btn-primary">Editar</a> 
            <a href="#" onclick="formDelete.submit()" class="btn btn-danger">Apagar</a> 
            {!!Form::model($result, ['url' => route('admincoupons.destroy', $result->id), 'method' => 'delete', 'id' => 'formDelete']) !!}
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
                    <td>{{$result->name}}</td>
                </tr>
                <tr>
                    <th scope="row">Criado em</th>
                    <td>{{date_format($result->created_at, 'd/m/Y')}}</td>
                </tr>
                <tr>
                    <th scope="row">Valido áté</th>
                    <td>{{date('d/m/Y', strtotime($result->validade))}}</td>
                </tr>
                <tr>
                    <th scope="row">Desconto</th>
                    <td>{{number_format($result->desconto, 2, ',', '.')}}</td>
                </tr>                
                </tbody>
            </table>
            <hr />
            <h3>Pedidos</h3>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Forma Pagamento</th>
                    <th>Atualizado em</th>
                    <th>Cliente</th>
                    <th>Contatos</th>
                    <th>Entrega</th>
                    <th>Frete</th>
                    <th>Desconto</th>
                    <th>Total</th>
                </tr>
                @foreach($result->orders as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td
                        @if($item->status == 'Pendente')
                        class="bg-warning text-primary"
                        @elseif($item->status == 'Cancelado')
                        class="bg-danger text-danger"
                        @endif
                    >{{$item->status}}</td>
                    <td>{{$item->forma_pagamento}}</td>
                    <td>{{date_format($item->updated_at, 'd/m/Y')}}</td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->email}}<br /><a href="https://api.whatsapp.com/send?phone=55{{str_replace("-", "", str_replace(")", "", str_replace("(", "", $item->telefone)))}}" target="_blank">{{$item->telefone}}</a></td>
                    <td>{{$item->cidade .'/'. $item->estado}}</td>
                    <td>{{number_format($item->frete, 2, ",", ".")}}</td>
                    <td>{{number_format($item->desconto, 2, ",", ".")}}</td>
                    <td>{{number_format($item->total, 2, ",", ".")}}</td>
                </tr>
                @php
                    $totalPedidos += $item->total;
                    $totalDescontos += $item->desconto;
                @endphp                
                @endforeach
            </table>
            <p class="text-right">Total R$ {{number_format($totalPedidos, 2, ',', '.')}}</p>          
            <p class="text-right">Total de Desconto R$ {{number_format($totalDescontos, 2, ',', '.')}}</p>          
        </div>
    </div>
@endsection