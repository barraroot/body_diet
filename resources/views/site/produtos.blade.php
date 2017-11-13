@extends('layouts.site')

@section('content')
<div id="inside-page" class="produtos">
	<h2 class="text-center">Produtos</h2>
	<div class="container">
		<h3 class="text-center">Escolha um dos produtos a baixo e entre em contato!</h3><br />
		<h3>Linha Premium</h3>
		<div id="linhapremium" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="item">
					<div class="row">
						@php
						$image_row = 3;
						foreach($premium as $i => $res){
								if($i > 0 && $i % $image_row === 0){
								echo '</div></div><div class="item"><div class="row">';
							}
					@endphp
					<div class="col-md-4">
					<div class="card">
						<div class="card-img" style="background-image:url('images/pratos/full-res/<?php echo $res['image'] ?>');">
							<center><a href="javascript:void(0);" onclick="openModal(@php echo $res['id']; @endphp)"><img src="images/pratos/full-res/<?php echo $res['image'] ?>" class="img-responsive" width="80%" alt="" style="opacity: 0;"></a></center>
						</div>
						<div class="caption">
							<h3><a href="javascript:void(0);" onclick="openModal(@php echo $res['id']; @endphp)">@php echo $res['titulo'] @endphp <em><@php echo $res['price'] @endphp</em></a></h3>
							<p class="text-center">
								<a href="javascript:void(0);" onclick="openModal(@php echo $res['id']; @endphp)" class="btn btn-success">Mais detalhes</a>
							</p>
						</div>
					</div>
					</div>
					@php  }; @endphp
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#linhapremium" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#linhapremium" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<h3>Linha Fitness</h3>
		<div id="linhafitness" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="item">
					<div class="row">
						@php
						$image_row = 4;
						foreach($fitness as $i => $res){
								if($i > 0 && $i % $image_row === 0){
								echo '</div></div><div class="item"><div class="row">';
							}
					@endphp
					<div class="col-md-3">
					<div class="card">
					<div class="card-img" style="background-image:url('images/pratos/full-res/<?php echo $res['image'] ?>');">
						<center><a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)"><img src="images/pratos/full-res/<?php echo $res['image'] ?>" class="img-responsive" width="80%" alt="" style="opacity: 0;"></a></center>
					</div>
						<div class="caption">
							<h3><a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)"><?php echo $res['titulo'] ?> <em><?php echo $res['price'] ?></em></a></h3>
							<p class="text-center">
								<a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)" class="btn btn-success">Mais detalhes</a>
							</p>
						</div>
					</div>
					</div>
					<?php  }; ?>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#linhafitness" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#linhafitness" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
		<h3>Caldos</h3>
		<div id="caldos" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<div class="item">
							<div class="row">
								<?php
								$image_row = 4;
								foreach($caldos as $i => $res){
										if($i > 0 && $i % $image_row === 0){
										echo '</div></div><div class="item"><div class="row">';
									}
							?>
							<div class="col-md-3">
							<div class="card">
							<div class="card-img" style="background-image:url('images/pratos/full-res/<?php echo $res['image'] ?>');">
								<center><a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)"><img src="images/pratos/full-res/<?php echo $res['image'] ?>" class="img-responsive" width="80%" alt="" style="opacity: 0;"></a></center>
							</div>
								<div class="caption">
									<h3><a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)"><?php echo $res['titulo'] ?> <em><?php echo $res['price'] ?></em></a></h3>
									<p class="text-center">
										<a href="javascript:void(0);" onclick="openModal(<?php echo $res['id']; ?>)" class="btn btn-success">Mais detalhes</a>
									</p>
								</div>
							</div>
							</div>
							<?php  }; ?>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#caldos" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#caldos" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ModalProdutos">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-5">
							<div class="img-overflow">
							</div>
						</div>
						<div class="col-md-7">
							<p class="description"></p>
							<br />
							<span class="label label-success">Emagrecimento</span>
							<span class="label label-warning gluten"></span>
							<span class="label label-info lactose"></span>
							<h5>Tabela nutricional:</h5>
							<div class="row nutricional">
								<div class="col-md-6">
									<ul>
										<li>
											<div class="row">
												<div class="col-md-3"><div class="frowa"></div></div>
												<div class="col-md-6"><div class="frowb"></div> </div>
												<div class="col-md-3"><span class="pull-right"><div class="frowc"></div></span></div>
											</div>
											<li>
												<div class="row">
													<div class="col-md-3"><div class="srowa"></div></div>
													<div class="col-md-6"><div class="srowb"></div></div>
													<div class="col-md-3"><span class="pull-right"><div class="srowc"></div></span></div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-md-3"><div class="trowa"></div></div>
													<div class="col-md-6"><div class="trowb"></div></div>
													<div class="col-md-3"><span class="pull-right"><div class="trowc"></div></span></div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-md-3"><div class="fhrowa"></div></div>
													<div class="col-md-6"><div class="fhrowb"></div></div>
													<div class="col-md-3"><span class="pull-right"><div class="fhrowc"></div></span></div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-md-3"><div class="fvrowa"></div></div>
													<div class="col-md-6"><div class="fvrowb"></div></div>
													<div class="col-md-3"><span class="pull-right"><div class="fvrowc"></div></span></div>
												</div>
											</li>
											<li>
												<div class="row">
													<div class="col-md-3"><div class="sxrowa"></div></div>
													<div class="col-md-6"><div class="sxrowb"></div></div>
													<div class="col-md-3"><span class="pull-right"><div class="sxrowc"></div></span></div>
												</div>
											</li>
										</ul>
									</div>
									<div class="col-md-6">
										<p class="preco"></p>
									</div>
								</div>
								<p class="description-fixed">
									*% Valores Diários com base em uma dieta de 2.000 kcal
									ou 8400KJ. <br>Seus valores diários podem ser maiores ou menores
									dependendo de  suas necessidades energéticas. <br>
									**Não contém quantidade significativa de gorduras trans.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		var jarray = <?php echo json_encode($caldos); ?>;
		jarray = jarray.concat(<?php echo json_encode($premium); ?>);
		jarray = jarray.concat(<?php echo json_encode($fitness); ?>);
		function openModal(id){
		$(document).ready(function(){
			$('.modal').on('shown.bs.modal', function(e){
				$('.carousel').carousel('pause');
			});
			$('.modal').on('hidden.bs.modal', function(e){
				$('.carousel').carousel('cycle');
			});

		$.each(jarray, function(index, value){
		console.log(value['image']);
		if(value['id'] == id){
		var title = value['titulo'];
		var imgUrl = value['image'];
		var frowa = value['frowa'];
		var frowb = value['frowb'];
		var frowc = value['frowc'];
		var srowa = value['srowa'];
		var srowb = value['srowb'];
		var srowc = value['srowc'];
		var trowa = value['trowa'];
		var trowb = value['trowb'];
		var trowc = value['trowc'];
		var fhrowa = value['fhrowa'];
		var fhrowb = value['fhrowb'];
		var fhrowc = value['fhrowc'];
		var fvrowa = value['fvrowa'];
		var fvrowb = value['fvrowb'];
		var fvrowc = value['fvrowc'];
		var sxrowa = value['sxrowa'];
		var sxrowb = value['sxrowb'];
		var sxrowc = value['sxrowc'];
		var preco = value['price'];
		var gluten = value['gluten'];
		var lactose = value['lactose'];
		if(gluten == 'false') {
			gluten = "Não contém glúten";
		}else {
			gluten = "Contém glúten";
		}
		if(lactose == 'false') {
			lactose = "Não contém lactose";
		}else {
			lactose = "Contém lactose";
		}
		var description = value['description'];
		title = title.replace('<br />', '');
		$('.bs-modal-lg .modal-title').html(title);
		$('.bs-modal-lg .img-overflow').css('background-image', 'url("	images/pratos/'+imgUrl+'")');
		$('.bs-modal-lg .description').html(description);
		$('.bs-modal-lg .frowa').html(frowa);
		$('.bs-modal-lg .frowb').html(frowb);
		$('.bs-modal-lg .frowc').html(frowc);
		$('.bs-modal-lg .srowa').html(srowa);
		$('.bs-modal-lg .srowb').html(srowb);
		$('.bs-modal-lg .srowc').html(srowc);
		$('.bs-modal-lg .trowa').html(trowa);
		$('.bs-modal-lg .trowb').html(trowb);
		$('.bs-modal-lg .trowc').html(trowc);
		$('.bs-modal-lg .fhrowa').html(fhrowa);
		$('.bs-modal-lg .fhrowb').html(fhrowb);
		$('.bs-modal-lg .fhrowc').html(fhrowc);
		$('.bs-modal-lg .fvrowa').html(fvrowa);
		$('.bs-modal-lg .fvrowb').html(fvrowb);
		$('.bs-modal-lg .fvrowc').html(fvrowc);
		$('.bs-modal-lg .sxrowa').html(sxrowa);
		$('.bs-modal-lg .sxrowb').html(sxrowb);
		$('.bs-modal-lg .sxrowc').html(sxrowc);
		$('.bs-modal-lg .preco').html(preco);
		$('.bs-modal-lg .gluten').html(gluten);
		$('.bs-modal-lg .lactose').html(lactose);
		$('.bs-modal-lg').modal('show');
		}
		});
		});
		}
		$(document).ready(function(){
			$('#linhapremium .item').first().addClass('active');
			$('#linhafitness .item').first().addClass('active');
			$('#caldos .item').first().addClass('active');
		});
		</script>
@endsection