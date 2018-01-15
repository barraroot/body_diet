@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Consulta produto</h3>
            {!! Button::primary(Icon::create('plus').' Novo produto')->asLinkTo(route('adminproducts.create')) !!}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Imagem Principal</td>
                        <td>Categoria</td>
                        <td>Titulo/Descrição</td>        
                        <td>Pontos</td>     
                        <td>Preço</td>        
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td><img class="img-responsive img-rounded" src="{{asset('images/produtos/' . $item->img_mini)}}"></img></td>    
                        <td>{{$item->category->category}}</td>
                        <td>
                            <b>{{$item->title}}</b>
                            <p><small>{{$item->description}}</small></p>
                        </td>
                        <td>{{$item->pontos}}</td>
                        <td>{{number_format($item->price, 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('adminproducts.edit', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                Editar
                            </a>
                            |
                            <a href="{{route('adminproducts.show', $item->id)}}" class="btn btn-link">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                                Exibir
                            </a>
                            |
                            <a href="{{route('adminproducts.status', [$item->id, $item->ativo])}}" class="btn btn-link">
                                @if($item->ativo == 1)
                                <span class="glyphicon glyphicon glyphicon-stop" aria-hidden="true"></span>
                                @else
                                <span class="glyphicon glyphicon glyphicon-play" aria-hidden="true"></span>
                                @endif
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