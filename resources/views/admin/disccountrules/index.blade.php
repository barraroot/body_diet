@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta regras para desconto</h3>
            {!! Button::primary(Icon::create('plus').' Nova Regra')->asLinkTo(route('admindiccountrules.create')) !!}
            <hr />
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Titulo</td>
                        <td>Valido até</td>
                        <td>Criado em</td>
                        <td>Valor igual ou maior que</td>
                        <td>Desconto Frete (%)</td>
                        <td>Desconto Pedido (%)</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{date("d/m/Y", strtotime($item->valido))}}</td>
                        <td>{{date_format($item->created_at, 'd/m/Y')}}</td>
                        <td>{{number_format($item->valor, 2, ',', '.')}}</td>
                        <td>{{number_format($item->diccount_frete, 2, ',', '.')}}</td>
                        <td>{{number_format($item->diccount_order, 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('admindiccountrules.show', $item->id)}}" class="btn btn-link">
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