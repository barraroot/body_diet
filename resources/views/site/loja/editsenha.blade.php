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
					<li><a href="{{route('loja.minhaconta.dados')}}">Alterar meus dados</a></li>
					<li><a href="{{route('loja.minhaconta.altersenha')}}">Alterar Senha</a></li>
					<li><a href="{{route('loja.logout')}}">Sair</a></li>
				</ul>
			</div>
			<div class="col-md-9">
	            <div class="col-md-1"></div>
	            <div class="col-md-10">
					@if (session('status'))
					    <div class="alert alert-{{ session('tipo') }}">
					        {{ session('status') }}
					    </div>
					@endif	            	
	                {!! Form::open(['url' => route('loja.minhaconta.editsenha'), 'method' => 'post', 'id' => 'frmEditConta']) !!}
	                {!! Form::input('hidden', 'id', session()->get('login')['id'], ['class' => 'form-control', 'autofocus', 'placeholder' => 'seu-nome@dominio.com']) !!}
	                <div class="row">
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            {!! Form::label('senha_atual', 'Senha Atual') !!}
								{!! Form::input('password', 'senha_atual', null, ['class' => 'form-control', 'autofocus', 'required' => true]) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            {!! Form::label('nova_senha', 'Nova Senha') !!}
								{!! Form::input('password', 'nova_senha', null, ['class' => 'form-control', '', 'required' => true]) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            {!! Form::label('re_nova_senha', 'Confirme a nova Senha') !!}
								{!! Form::input('password', 're_nova_senha', null, ['class' => 'form-control', '', 'required' => true]) !!}
	                        </div>
	                    </div>
	                    <div class="col-md-12">
	                        {!! Form::submit('Alterar', ['class' => 'btn btn-success btn-block']) !!}
	                    </div>	                    
	                {!! Form::close() !!}
	            	</div>
	            <div class="col-md-1"></div>
	        </div>
	    </div>
	</div>
</div>
@endsection