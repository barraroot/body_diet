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
                <h4>{{$user->nome}}, informe uma nova senha para seu cadastro.</h4>        
                <form action="{{route('loja.trocasenha')}}" class="form" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="user" value="{{$user->id}}" />
                    <div class="form-group">
                        <label for="senha">Informe uma nova senha</label>
                        <input type="password" class="form-control" name="senha" />
                    </div>
                    <div class="form-group">
                            <label for="re-senha">Confirme sua senha</label>
                            <input type="password" class="form-control" name="re-senha" />
                        </div>                    
                    <div class="form-group">
                        <button class="form-control btn-success">Alterar</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection