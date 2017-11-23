@extends('layouts.app')

@section('content')
   <div class="container">
        <div class="row">
            <p class="text-right"><button class="btn btn-default text-right" onclick="window.print();">Imprimir</button></p>            
            <h3>Pedido: {{$order->id}}</h3>
                <h4>Dados do Cliente</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Celular</th>
                        </tr>             
                    </thead>
                    @if(isset($order->client))
                    <tbody>
                        <tr>
                            <td>{{$order->client->id}}</td>
                            <td>{{$order->client->nome}}</td>
                            <td>{{$order->client->email}}</td>
                            <td>{{$order->client->endereco . ' '. $order->client->complemento . ' N.'. $order->client->numero. ' '. $order->client->bairro . ' '. $order->client->cidade.'/'.$order->client->estado. ' CEP:'. $order->client->cep}}</td>
                            <td>{{$order->client->telefone}}</td>
                            <td><a href="https://api.whatsapp.com/send?phone=55{{str_replace("-", "", str_replace(")", "", str_replace("(", "", $order->client->celular)))}}" target="_blank">{{$order->client->celular}}</a></td>
                        </tr>
                    </tbody>
                    @endif
                </table>
                <h4>Detalhes da entrega</h4>
                <p class="text-center">
                    @if($order->status == 'Pendente' || $order->status == 'Aguardando Pagamento')
                        <img src="{{asset('images/pendente.fw.png')}}"> 
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif  
                </p>            
                <table class="table">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Entrega</th>
                            <th>Total Produtos</th>
                            <th>Frete</th>
                            <th>Desconto</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td
                            @if($order->status == 'Cancelado')
                                class="bg-danger"
                            @endif
                            >{{$order->status}}</td>
                            <td class="bg-warning">{{$order->endereco . ' N.'. $order->numero . ' '. $order->complemento . ' '. $order->bairro . ' '. $order->cidade .'/'. $order->estado .' CEP: '. $order->cep}}</td>
                            <td>{{number_format($order->total_produtos, 2, ',', '.')}}</td>
                            <td>{{number_format($order->frete, 2, ',', '.')}}</td>
                            <td>{{number_format($order->desconto, 2, ',', '.')}}</td>
                            <td>{{number_format($order->total, 2, ',', '.')}}</td>
                        </tr>
                    </tbody>
                </table>
                <h4>Produtos</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($items))
                        @foreach($items as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="{{asset('images/produtos/'. $item->product->img)}}" width="60px" />
                                {{$item->product->title}}
                            </td>
                            <td>{{$item->qtde}}</td>
                            <td>R$ {{number_format($item->preco, 2, ',', '.')}}</td>
                            <td>R$ {{number_format($item->total, 2, ',', '.')}}</td> 
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
        </div>
    </div>
@endsection