@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta Cidades</h3>
            {!! Button::primary(Icon::create('plus').' Nova cidade')->asLinkTo(route('admincities.create')) !!}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Cidade</td>
                        <td>Frete</td>
                        <td>Valor Minimo</td>
                        <td>Ações</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->city}}</td>
                        <td>{{number_format($item->frete, 2, ',', '.')}}</td>
                        <td>{{number_format($item->valor_minimo, 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('admincities.edit', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                            &nbsp;|&nbsp;
                            <a href="{{route('admincities.show', $item->id)}}" class="btn btn-link">
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