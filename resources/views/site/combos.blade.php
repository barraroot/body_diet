@extends('layouts.site')

@section('content')
<div id="inside-page" class="combos">
	<h2 class="text-center">Combos</h2>
	<div class="container">
		<h3 class="text-center">Todo mundo na hora de comprar sempre perguntra, "e tem um desconto?".</h3>
		<p class="text-center">
			Sim, sempre pensando nos nossos clientes temos uma política de desconto muito legal. <br />
			Quanto mais você comprar, maior será o desconto!<br />
			Funciona assim:
		</p>
		<br />
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img src="images/combo-03.png" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">Combo 12 pratos</h3>
						<p class="text-center">
							1 Caixa com <strong>12 pratos (Sortidos)</strong> <br /> <h3 class="text-center">5% de desconto</h3>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="images/combo-02.png" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">Combo 24 pratos</h3>
						<p class="text-center">
							1 Caixa com <strong>24 pratos (Sortidos)</strong> <br /> <h3 class="text-center">10% de desconto</h3>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img src="images/combo-01.png" class="img-responsive" width="100%" alt="">
					<div class="caption">
						<h3 class="text-center">Combo 36 pratos</h3>
						<p class="text-center">
							1 Caixa com <strong>36 pratos (Sortidos)</strong> <br /> <h3 class="text-center">20% de desconto</h3>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="card">
					<div class="caption">
						<h3>Perguntas frequentes!</h3>
						<p>1 - Mas não tenho onde armazenar 36 pratos!<br />
							<strong>R: Não tem problema, feche as 3 caixas, garanta seu desconto máximo e leve a quantidade que cabe em seu freezer, assim que estiver acabando suas refeições, entre em contato e reabasteceremos o seu estoque sem cobrar taxa de entrega!</strong>
						</p>			
						<br>
						<p>2 - Qual a durabilidade do produto no freezer?<br />
							<strong>R: Os produtos tem durabilidade de 3 meses congelados a -14°.</strong>
						</p>	
						<br>
						<p>3 - Posso variar os produtos para fechar minha caixa?<br />
							<strong>R: Sim, você que determina quais pratos você quer compor o seu combo, entre Linha Fitness, Linha Premium, caldos e sopas.</strong>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection