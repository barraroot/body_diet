@extends('layouts.site')

@section('content')
<div id="inside-page" class="carrinho">
	<div class="container">
		<div class="row">
			<h3>Pagamento</h3>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<ul class="nav nav-tabs">
						  <li><a data-toggle="tab" href="#home" id="tabCC">Cartão de crédito</a></li>
						  <!--<li><a data-toggle="tab" href="#menu1" id="tabDC">Débito em conta</a></li>-->
						  <li><a data-toggle="tab" href="#menu2" id="tabDB">Depósito bancario</a></li>
						</ul>
						<br />
						<div class="tab-content">
						  <div id="home" class="tab-pane fade">
						  	<div class="row">
						  		<div class="col-md-12">
						  			<div id="payment_methods" class="text-center"></div>
						  		</div>
						  		<div id="erroPagamento" class="col-md-12 alert alert-danger" style="display: none;"></div>
						  	</div>
						  	<hr />
							<!-- Informações para cartão de crédito -->
							{!! Form::open(['url' => route('loja.payment.credit'), 'method' => 'post', 'id' => 'frmCartao']) !!}
				            <input type="hidden" name="creditCardToken" id="creditCardToken" />
				            <input type="hidden" name="installmentValue" id="installmentValue" />
				            <input type="hidden" name="senderHash" id="senderHash" />
							<div class="row">
								<h4>Dados do Cartão</h4>
			                    <div class="col-md-4">
			                        <div class="form-group">
			                            {!! Form::label('cardNumber', 'Número do cartão') !!}
			                            {!! Form::text('cardNumber', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '0000 0000 0000 0000', 'required' => true, 'id' => 'cardNumber','maxlength' => 16]); !!}
			                        </div>
			                    </div>	
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('ccv', 'CVV') !!}
			                            {!! Form::text('ccv', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '000', 'required' => true, 'id' => 'cvv', 'maxlength' => 3]) !!}
			                        </div>
			                    </div>	
			                    <div class="col-md-3">
			                        <div class="form-group">
			                            {!! Form::label('mounth', 'Mês de Vencimento') !!}
			                            {!! Form::text('mes', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '00', 'required' => true, 'id' => 'expirationMounth', 'maxlength' => 2]) !!}
			                        </div>
			                    </div>	
			                    <div class="col-md-3">
			                        <div class="form-group">
			                            {!! Form::label('year', 'Ano de Vencimento') !!}
			                            {!! Form::text('ano', null, ['class' => 'form-control', 'autofocus', 'placeholder' => '0000', 'required' => true, 'id' => 'expirationYear', 'maxlength' => 4]) !!}
			                        </div>
			                    </div>	
			                    <div class="col-md-12">
			                        <div class="form-group">
			                        	<label for="parcela">Parcelamento</label>
			                        	<select class="form-control" id="installmentQuantity" name="installmentQuantity">
			                        		<option disabled="disabled" selected="selected">Parcelamento</option>
			                        	</select>
			                        </div>
			                    </div>
			                    <h4>Dados do dono do Cartão</h4>
			                    <div class="col-md-5">
			                        <div class="form-group">
			                            {!! Form::label('creditCardHolderName', 'Nome impresso no cartão') !!}
			                            {!! Form::text('creditCardHolderName', session()->get('login')['nome'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNome']) !!}
			                        </div>
			                    </div>

			                    <div class="col-md-3">
			                        <div class="form-group">
			                            {!! Form::label('creditCardHolderCPF', 'CPF') !!}
			                            {!! Form::text('creditCardHolderCPF', session()->get('login')['cpf'], ['class' => 'form-control', '','placeholder' => '000.000.000-00', 'required' => true, 'id' => 'txtCPF']) !!}
			                        </div>
			                    </div>
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('creditCardHolderPhone', 'Telefone') !!}
			                            {!! Form::text('creditCardHolderPhone', session()->get('login')['telefone'], ['class' => 'form-control', 'autofocus', 'placeholder' => '00-0000000', 'required' => true, 'id' => 'nascimento']) !!}	                        	
			                        </div>
			                    </div>	
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('creditCardHolderBirthDate', 'Nascimento') !!}
			                            {!! Form::text('creditCardHolderBirthDate', session()->get('login')['nascimento'], ['class' => 'form-control', 'autofocus', 'placeholder' => '00/00/0000', 'required' => true, 'id' => 'nascimento']) !!}	                        	
			                        </div>
			                    </div>				                    		                    		                    
			                    <h4>Endereço da Fatura</h4>
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressPostalCode', 'CEP') !!}
			                            {!! Form::text('billingAddressPostalCode', session()->get('login')['cep'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCEP']) !!}
			                        </div>
			                    </div>
			                    <div class="col-md-4">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressStreet', 'Endereço') !!}
			                            {!! Form::text('billingAddressStreet', session()->get('login')['endereco'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEndereco']) !!}
			                        </div>
			                    </div>     
			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressNumber', 'Número') !!}
			                            {!! Form::text('billingAddressNumber', session()->get('login')['numero'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtNumero']) !!}
			                        </div>
			                    </div>

			                    <div class="col-md-4">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressDistrict', 'Bairro') !!}
			                            {!! Form::text('billingAddressDistrict', session()->get('login')['bairro'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtBairro']) !!}
			                        </div>
			                    </div>     
			                    <div class="col-md-5">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressComplement', 'Complemento') !!}
			                            {!! Form::text('billingAddressComplement', session()->get('login')['complemento'], ['class' => 'form-control', '', 'required' => false, 'id' => 'txtComplemento']) !!}
			                        </div>
			                    </div>  

			                    <div class="col-md-5">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressCity', 'Cidade') !!}
			                            {!! Form::text('billingAddressCity', session()->get('login')['cidade'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtCidade']) !!}
			                        </div>
			                    </div>                        

			                    <div class="col-md-2">
			                        <div class="form-group">
			                            {!! Form::label('billingAddressState', 'Estado') !!}
			                            {!! Form::text('billingAddressState', session()->get('login')['estado'], ['class' => 'form-control', '', 'required' => true, 'id' => 'txtEstado']) !!}
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                    	{!! Form::submit('PAGAR', ['class' => 'btn btn-success btn-block', 'id' => 'btnPagarCC']) !!}
			                    </div>	                    
							</div>
							{!! Form::close() !!}
							<!--FIM Informações para cartão de crédito -->
						  </div>
						  <!--
						  <div id="menu1" class="tab-pane fade">
						  	<div class="row">
						  		<div class="col-md-12">
						  			<div id="payment_methods_debit" class="text-center"></div>
						  		</div>
						  	</div>
						  	<hr />
						    <p>Account unsupported, contact suuport.</p>
						  </div>
						-->
						  <div id="menu2" class="tab-pane fade">
						    <h4>Banco do Brasil</h4>
						    <div class="well">
						    	<p>
						    		<b>Razão Social:&nbsp;</b>Romero e Ratky LTDA ME<br />
						    		<b>CNPJ:&nbsp;</b>21.025.230/0001-85<br />
						    		<b>Agência:&nbsp;</b>6507-2<br />
						    		<b>Conta Corrente:&nbsp;</b>11946-6<br />
						    		<b>Enviar Comprante para:&nbsp;</b><a href="mailto:pedidos@bodydiet.com.br">pedidos@bodydiet.com.br</a>
						    	</p>
						    </div>
						  </div>						  
						</div>						
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-6">
						<h4 class="text-right"><b>Total Produtos:</b> R$ {{number_format($carrinho['total_produtos'], 2, ',', '.')}}</h4>
						<h4 class="text-right"><b>Frete:</b> <span id="valFRETE">R$ {{number_format($carrinho['frete'], 2, ',', '.')}}</span></h4>
						<h4 class="text-right"><b>Desconto:</b> <span id="valFRETE">R$ {{number_format($carrinho['desconto'], 2, ',', '.')}}</span></h4>
						<h4 class="text-right"><b>Total:</b> R$ {{number_format($carrinho['total'], 2, ',', '.')}}</h4>							
					</div>
					<div class="col-md-2"></div>
				</div>	
			</div>
		</div>	
</div>
<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script type="text/javascript" src="{{asset('js/pagseguro.js')}}"></script>
@endsection

@section('script')

	$('#cardNumber').mask('0000000000000000');


	const paymentData = {
		brand: '',
		amount: {{number_format($carrinho->total, 2, ".", "")}}
	};

	PagSeguroDirectPayment.setSessionId('{!! $session !!}');

	$('#tabDB').on('click', function() {

		$.get('{{route('loja.formapagamento', 'Depósito Bancario')}}');
	});

	$('#tabCC').on('click', function() {

		$.get('{{route('loja.formapagamento', 'Cardão de Crédito')}}');

		pagSeguro.getPaymentMethods(paymentData.amount)
			.then(function(urls) {
				let html = '';
				urls.forEach(function(item){
					html += '<img src="'+ item +'" />';
				});
				$('#payment_methods').html(html);
			});
	});

	$('#tabDC').on('click', function() {

		$.get('{{route('loja.formapagamento', 'Débito em conta')}}');

		pagSeguro.getPaymentMethodsDebit(paymentData.amount)
			.then(function(urls) {
				let html = '';

				urls.forEach(function(item){
					html += '<img src="'+ item +'" />';
				});
				$('#payment_methods_debit').html(html);
			});
	});	

	$('#cardNumber').on('keyup', function(){
		if($(this).val().length >= 6) {
			let bin = $(this).val();
			pagSeguro.getBrand(bin).then(function(res) {
				paymentData.brand = res.result.brand.name;
				return pagSeguro.getInstallments(paymentData.amount, res.result.brand.name);
			}).then(function(install) {
				let html = '';
				install.forEach(function(item){
					html += '<option value="'+ item.quantity +'">'+ item.quantity + ' x ' + item.installmentAmount +' Total de R$ '+ item.totalAmount + '</option>';
				});
				console.log(install);
				$('#installmentQuantity').html(html);
				$('#installmentValue').val(install[0].installmentAmount);
				$('#installmentQuantity').on('change', function() {
					$('#installmentValue').val(install[$(this).val()-1].installmentAmount);
				});

				pagSeguro.getSenderHash().then(function(hash) {
					$('#senderHash').val(hash);
				});

			});
		}
	});

	$('#frmCartao').on('submit', function(e){
		e.preventDefault();

		$('#btnPagarCC').val('Processando Pagamento...');
		$('#btnPagarCC').addClass('disabled');
		$('#btnPagarCC').addClass('disable');

		let params = {
			cardNumber: $('#cardNumber').val(),
			cvv: $('#cvv').val(),
			expirationMonth: $('#expirationMounth').val(),
			expirationYear: $('#expirationYear').val(),
			brand: paymentData.brand,
		}

		pagSeguro.createCardToken(params).then(function(token) {
				$('#creditCardToken').val(token);

				let url = $('#frmCartao').attr('action');
				let data = $('#frmCartao').serialize();

				$.post(url, data).done(function(data) {
					if(data.status == 'Ok') {
						window.location.href = "{{route('loja.pedido.pago')}}";
						console.log(data);
					} else {
						$('#erroPagamento').html(data.erro);
						$('#erroPagamento').css('display', 'block');
						$('#btnPagarCC').val('PAGAR');
						$('#btnPagarCC').removeClass('disabled');
						$('#btnPagarCC').removeClass('disable');						
					}

				});
		});		
	});

@endsection