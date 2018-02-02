@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
    <div class="container">
        <h3>Recuperação de senha</h3>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="hidden-print">
                    <div class="alert alert-success" role="alert">
                        <strong>Sucesso.</strong> Foi enviado um e-mail para mudança da senha. Este e-mail tem validade de 60 minutos.
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
@endsection