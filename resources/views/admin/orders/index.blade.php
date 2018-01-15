@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Pedidos</h3>
            <hr />
        </div>
        <div class="row">
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
                    <th>Ações</th>
                </tr>
                @foreach($result as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td
                        @if($item->status == 'Pendente')
                        class="bg-warning text-warning"
                        @elseif($item->status == 'Cancelado')
                        class="bg-danger text-danger"
                        @elseif($item->status == 'Entregue')
                        class="bg-success text-success"
                        @elseif($item->status == 'Aguardando Entrega')
                        class="bg-primary text-primary"
                        @endif
                    >{{$item->status}}</td>
                    <td>{{$item->forma_pagamento}}</td>
                    <td>
                        @php
                        $date = $item->updated_at;
                        echo date('d/m/Y H:i', strtotime("$date - 2 hours"));
                        //date_format($item->updated_at, 'd/m/Y H:i')
                        @endphp
                    </td>
                    <td>{{$item->nome}}</td>
                    <td>{{$item->email}}<br /><a href="https://api.whatsapp.com/send?phone=55{{str_replace("-", "", str_replace(")", "", str_replace("(", "", $item->telefone)))}}" target="_blank">{{$item->telefone}}</a></td>
                    <td>{{$item->cidade .'/'. $item->estado}}</td>
                    <td>{{number_format($item->frete, 2, ",", ".")}}</td>
                    <td>{{number_format($item->desconto, 2, ",", ".")}}</td>
                    <td>{{number_format($item->total, 2, ",", ".")}}</td>
                    <td><a href="{{route('adminorders.show', $item->id)}}">Detalhe</a>&nbsp;|&nbsp;<a href="#" onclick="abreMoidal({{$item->id}}, '{{$item->status}}')">Alterar Status</a>&nbsp;|&nbsp;<a href="{{route('adminorders.excluir', $item->id)}}">Excluir</a></td>
                </tr>
                @endforeach
            </table>
            <div class="text-center">
                {{$result->links()}}
            </div>            
        </div>
    </div>
{!! Form::open(['url' => route('adminatualizaStatus'), 'method' => 'post', 'id' => 'frmAbreCarrinho']) !!}
<input type="hidden" name="id" id="txtId" value="">
<div class="modal fade" tabindex="-1" id="cidadeNaoAtendida" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Alterar Status</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <select name="status" id="txtStatus" class="form-control">
                <option value="Pendente">Pendente</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Aguardando Pagamento">Aguardando Pagamento</option>
                <option value="Aguardando Entrega">Aguardando Entrega</option>
                <option value="Despachado">Despachado</option>
                <option value="Entregue">Entregue</option>
            </select>              
        </div>
      </div>
      <div class="modal-footer">
        {!! Form::submit('Atualizar', ['class' => 'btn btn-success btn-block']) !!}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{!! Form::close() !!}    

<script type="text/javascript">
    function abreMoidal(id, status) {
        $('#txtId').val(id);
        $("#txtStatus").val( $('option:contains("'+ status +'")').val() );
        $('#cidadeNaoAtendida').modal('show');
    }
</script>

@endsection
