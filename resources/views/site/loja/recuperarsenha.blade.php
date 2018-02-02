@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
    <div class="container">
        <h3>Recuperação de senha</h3>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                @if(Session::has('status'))
                    <div class="hidden-print">
                        {!! Alert::warning(Session::get('status'))->close() !!}
                    </div>
                @endif            
                <form action="{{route('postrecuperarsenha')}}" class="form" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Informe seu email</label>
                        <input type="text" class="form-control" name="email" placeholder="seu-nome@dominio.com" />
                    </div>
                    <div class="form-group">
                        <button class="form-control btn-success">Recuperar Senha</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection