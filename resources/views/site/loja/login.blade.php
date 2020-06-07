@extends('layouts.site')

@section('content')
@php
    $nome = "";
    $email = "";
    $telefone = "";
    $cep = "";
    $endereco = "";
    $numero = "";
    $complemento = "";
    $bairro = "";
    $cidade = "";
    $estado = "";
    if($cart !== null)
    {
        $nome = $cart['nome'];
        $email = $cart['email'];
        $telefone = $cart['telefone'];
        $cep = $cart['cep'];
        $endereco = $cart['endereco'];
        $numero = $cart['numero'];
        $complemento = $cart['complemento'];
        $bairro = $cart['bairro'];
        $cidade = $cart['cidade'];
        $estado = $cart['estado']; 
    }
@endphp
<div id="inside-page" class="carrinho">
	<div class="container">
		<div class="row">
			<h1>Identificação</h1>
            <br />            
			<dev class="col-md-2"></dev>
			<dev class="col-md-4">
                <button style="height: 60px; font-size: 120%;" id="btnLogin" class="btn btn-success btn-block">Já tenho cadastro</button>
            </dev>
			<dev class="col-md-4">
                <button  style="height: 60px; font-size: 120%;"  id="btnNovoLogin" class="btn btn-warning btn-block">Sou novo por aqui</button>
			</dev>
			<dev class="col-md-2"></dev>
		</div>
        <br />
        <br />
        <div class="row" style="display:none;" id="dvCadastro">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                {!! Form::open(['url' => route('loja.novo.login'), 'method' => 'post', 'id' => 'frmNovoLogin']) !!}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail') !!}
                            {!! Form::email('email', $email, ['class' => 'form-control cademail', 'autofocus', 'placeholder' => 'seu-nome@dominio.com', 'required' => true, 'id' => 'txtEmail']) !!}
                            <p id="msgEmail" class="text-danger" style="display: none;">E-mail já cadastrado</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('cpf', 'CPF') !!}
                            {!! Form::text('cpf', null, ['class' => 'form-control', '','placeholder' => '000.000.000-00', 'required' => true, 'id' => 'txtCPF']) !!}
                        </div>
                    </div>  

                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('nome', 'Nome') !!}
                            {!! Form::text('nome', $nome, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNome']) !!}
                        </div>
                    </div>

                     <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('nascimento', 'Nascimento') !!}
                            {!! Form::text('nascimento', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNascimento','placeholder' => 'dd/mm/aaaa', 'id' => 'txtNascimento']) !!}
                        </div>
                    </div>                   

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('senha', 'Senha') !!}
                            {!! Form::password('senha', ['class' => 'form-control', '', 'required' => true, 'id' => 'txtSenha']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('confirma-senha', 'Confirme a senha') !!}
                            {!! Form::password('confirma-senha', ['class' => 'form-control', '', 'required' => true, 'id' => 'txtReSenha']) !!}
                        </div>
                    </div>                  
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('cep', 'CEP') !!}
                            {!! Form::text('cep', $cep, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCEP']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('endereco', 'Endereço') !!}
                            {!! Form::text('endereco', $endereco, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEndereco']) !!}
                        </div>
                    </div>     
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('numero', 'Número') !!}
                            {!! Form::text('numero', $numero, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNumero']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('bairro', 'Bairro') !!}
                            {!! Form::text('bairro', $bairro, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtBairro']) !!}
                        </div>
                    </div>     
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('complemento', 'Complemento') !!}
                            {!! Form::text('complemento', $complemento, ['class' => 'form-control', '', 'required' => false, 'id' => 'txtComplemento']) !!}
                        </div>
                    </div>  

                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('cidade', 'Cidade') !!}
                            {!! Form::text('cidade', $cidade, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCidade']) !!}
                        </div>
                    </div>                        

                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('estado', 'Estado') !!}
                            {!! Form::text('estado', $estado, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEstado']) !!}
                        </div>
                    </div>  

                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('telefone', 'Telefone') !!}
                            {!! Form::text('telefone', $telefone, ['class' => 'form-control', '', 'placeholder' => '(00)0000-0000','required' => false, 'id' => 'txtTelefone']) !!}
                        </div>
                    </div>  

                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('celular', 'Celular') !!}
                            {!! Form::text('celular', null, ['class' => 'form-control', '', 'placeholder' => '(00)00000-0000','required' => false, 'id' => 'txtCelular']) !!}
                        </div>
                    </div>  

                    <div class="col-md-12">
                        {!! Form::submit('Cadastrar-me', ['class' => 'btn btn-success btn-block', 'id' => 'btnCadastrar']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row"
            @if (!session('status')) 
                style="display:none;" 
            @endif
            id="dvLogin">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                {!! Form::open(['url' => route('loja.login'), 'method' => 'post', 'id' => 'frmLogin']) !!}
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('email', 'E-mail') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'seu-nome@dominio.com', 'required' => true, 'id' => 'txtLoginEmail']) !!}
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('senha', 'Senha') !!}
                            {!! Form::password('senha', ['class' => 'form-control', '', 'required' => true, 'id' => 'txtLoginSenha']) !!}
                            <br />
                            <p><a href="/recuperar-senha">Não lembro minha senha.</a></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                    @if (session('status'))
                        <div class="bg-danger alert alert-alert">
                            {{ session('status') }}
                        </div>
                    @endif                          
                    </div>  
                    <div class="col-md-12">
                        {!! Form::submit('Entrar', ['class' => 'btn btn-success btn-block']) !!}
                    </div>                    
                {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>  	
	</div>
</div>
@endsection

@section('script')

    $('#txtCEP').focusout(function(){
        let cep = $(this).val();
        cep = cep.replace("-", "").replace(".", "").replace(",", "").trim();
        if(cep.length == 8) {
            $.get('https://viacep.com.br/ws/' + cep + '/json/')
                .then(function(res) {
                    if(res.erro !== true) {
                        $('#txtEndereco').val(res.logradouro);
                        $('#txtEstado').val(res.uf);
                        $('#txtCidade').val(res.localidade);
                        $('#txtBairro').val(res.bairro);
                    }
            });         
        }
    });

    $('#txtCEP').mask('00000-000');
    $('#txtTelefone').mask('(00)00000-0000');
    $('#txtCelular').mask('(00)00000-0000');
    $('#txtCPF').mask('000.000.000-00');
    $('#txtNascimento').mask('00/00/0000');

    $('#btnLogin').on('click', function() {
        $('#dvLogin').css('display', 'block');
        $('#dvCadastro').css('display', 'none');
    });

    $('#btnNovoLogin').on('click', function() {
        $('#dvLogin').css('display', 'none');
        $('#dvCadastro').css('display', 'block');
    });    

    $('.cademail').on('focusout', function(){
        $.get('/loja/veremail/' + $(this).val(), function(data){
            if(data.status !== 'OK') {
                $('#btnCadastrar').addClass('disabled');
                $('#btnCadastrar').addClass('disable');
                $('#msgEmail').css('display', 'block');
                $(this).focus();
            } else {
                $('#btnCadastrar').removeClass('disabled');
                $('#btnCadastrar').removeClass('disable');
                $('#msgEmail').css('display', 'none');
            }

        });
    });

@endsection