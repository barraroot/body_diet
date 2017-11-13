@extends('layouts.site')

@section('content')
@include('layouts._site._slidebar')
<section id="topfive">
            <div class="container">
                <h2 class="text-center">Mais pedidos!</h2>
                <div class="row">
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/salmao.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Salmão com Molho <br />de Maracujá</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/patinhoarroz.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Patinho com Arroz Integral <br />e Legumes</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/nhoquebatata.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Nhoque de <br />Batata Doce</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/frangogrel.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Frango Grelhado <br />com Legumes</a></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/filemignon.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Filé Mignon Grelhado <br />com Legumes</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/filesaintpepper.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Filé de Saint Petter <br />ao Leite de Coco</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/frangodesf.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Frango Desfiado <br />com Batata Doce</a></h4>
                    </div>
                    <div class="col-md-3">
                        <a href="?page=produtos"><img src="images/pratos/macarraoint.png" alt="" class="img-responsive" /></a>
                        <h4 class="text-center"><a href="?page=produtos">Macarrão Integral <br />com Carne Desfiada</a></h4>
                    </div>
                </div>
            </div>
        </section>

        <section id="newsletter">
            <div class="bg-overlay"></div>
            <div class="container">
                <h2 class="text-center">Receba nossas novidades!</h2>
                <div class="newform">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Insira seu e-mail..">
                        <span class="input-group-btn">
                            <button class="btn btn-success" type="button">Cadastrar</button>
                        </span>
                    </div>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/bodydietrc" target="_blank">
                        <i class="fa fa-facebook-official fa-3x"></i>
                    </a>
                    <a href="https://www.instagram.com/bodydiet_/" target="_blank">
                        <i class="fa fa-instagram fa-3x"></i>
                    </a>
                </div>
            </div>
        </section>

        <section id="info">
            <div class="container">
                <div class="row">
                    <div class="col-md-8"><img src="images/bottom.jpg" alt="" class="img-responsive"></div>
                    <div class="col-md-4">
                        <div id="instacar" class="carousel slide" data-ride="carousel">
                            <div id="instafeed" class="carousel-inner" role="listbox">
                            </div>
                            <a class="left carousel-control" href="#instacar" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#instacar" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>          

@endsection