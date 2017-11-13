@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<h3>Minha Conta</h3>
		<br />
		<p><div class="text-right"><a href="{{route('loja.produtos')}}" class="btn btn-success">Continuar Comprando</a></div></p>
		<hr />
		<div class="row">
			<div class="col-md-3">
				<h4>Menu do usuário</h4>
				<ul>
					<li><a href="{{route('loja.minhaconta')}}">Meus Pedidos</a></li>
					<li><a href="{{route('loja.minhaconta.pontos')}}">Meus Pontos</a></li>
					<li><a href="{{route('loja.minhaconta.dados')}}">Alterar meus dados</a></li>
					<li><a href="{{route('loja.minhaconta.altersenha')}}">Alterar Senha</a></li>
					<li><a href="{{route('loja.logout')}}">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
	            <div class="col-md-1"></div>
	            <div class="col-md-10">
					@if (session('status'))
					    <div class="alert alert-success">
					        {{ session('status') }}
					    </div>
					@endif	            	
	                {!! Form::model($user, ['url' => route('minhaconta.savedados'), 'method' => 'post', 'id' => 'frmEditConta']) !!}
	                {!! Form::input('hidden', 'id', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'seu-nome@dominio.com']) !!}
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="form-group">
	                            {!! Form::label('email', 'E-mail') !!}
								{!! Form::input('email', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder' => 'seu-nome@dominio.com']) !!}
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
	                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNome']) !!}
	                        </div>
	                    </div>

	                     <div class="col-md-4">
	                        <div class="form-group">
	                            {!! Form::label('nascimento', 'Nascimento') !!}
	                            {!! Form::text('nascimento', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNascimento','placeholder' => 'dd/mm/aaaa', 'id' => 'txtNascimento']) !!}
	                        </div>
	                    </div>  

                
	                    <div class="col-md-2">
	                        <div class="form-group">
	                            {!! Form::label('cep', 'CEP') !!}
	                            {!! Form::text('cep', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCEP']) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-4">
	                        <div class="form-group">
	                            {!! Form::label('endereco', 'Endereço') !!}
	                            {!! Form::text('endereco', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEndereco']) !!}
	                        </div>
	                    </div>     
	                    <div class="col-md-2">
	                        <div class="form-group">
	                            {!! Form::label('numero', 'Número') !!}
	                            {!! Form::text('numero', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNumero']) !!}
	                        </div>
	                    </div>

	                    <div class="col-md-4">
	                        <div class="form-group">
	                            {!! Form::label('bairro', 'Bairro') !!}
	                            {!! Form::text('bairro', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtBairro']) !!}
	                        </div>
	                    </div>     
	                    <div class="col-md-5">
	                        <div class="form-group">
	                            {!! Form::label('complemento', 'Complemento') !!}
	                            {!! Form::text('complemento', null, ['class' => 'form-control', '', 'required' => false, 'id' => 'txtComplemento']) !!}
	                        </div>
	                    </div>  

	                    <div class="col-md-5">
	                        <div class="form-group">
	                            {!! Form::label('cidade', 'Cidade') !!}
	                            {!! Form::text('cidade', null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCidade']) !!}
	                        </div>
	                    </div>                        

	                    <div class="col-md-2">
	                        <div class="form-group">
	                            {!! Form::label('estado', 'Estado') !!}
	                            {!! Form::text('estado',null, ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEstado']) !!}
	                        </div>
	                    </div>  

	                    <div class="col-md-3">
	                        <div class="form-group">
	                            {!! Form::label('telefone', 'Telefone') !!}
	                            {!! Form::text('telefone', null, ['class' => 'form-control', '', 'placeholder' => '(00)0000-0000','required' => false, 'id' => 'txtTelefone']) !!}
	                        </div>
	                    </div>  

	                    <div class="col-md-3">
	                        <div class="form-group">
	                            {!! Form::label('celular', 'Celular') !!}
	                            {!! Form::text('celular', null, ['class' => 'form-control', '', 'placeholder' => '(00)00000-0000','required' => false, 'id' => 'txtCelular']) !!}
	                        </div>
	                    </div>  

	                    <div class="col-md-12">
	                        {!! Form::submit('Salvar', ['class' => 'btn btn-success btn-block']) !!}
	                    </div>
	                </div>
	                {!! Form::close() !!}
	            </div>
	            <div class="col-md-1"></div>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('script')
	$('#txtCEP').mask('00000-000');
	$('#txtTelefone').mask('(00)00000-0000');
	$('#txtCelular').mask('(00)00000-0000');
	$('#txtCPF').mask('000.000.000-00');
	$('#txtNascimento').mask('00/00/0000');
@endsection