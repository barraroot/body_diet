@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Cupons</h3>
            {!! Button::primary(Icon::create('plus').' Novo Cupom')->asLinkTo(route('admincoupons.create')) !!}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Criando em</td>
                        <td>Valido Até</td>
                        <td>Desconto (%)</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{date_format($item->created_at, 'd/m/Y')}}</td>
                        <td>{{date('d/m/Y', strtotime($item->validade))}}</td>
                        <td>{{number_format($item->desconto, 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('admincoupons.edit', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                            &nbsp;|&nbsp;
                            <a href="{{route('admincoupons.show', $item->id)}}" class="btn btn-link">
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