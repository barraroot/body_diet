<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <title>BodyDiet - Alimentação Saudável</title>
        <meta name="theme-color" content="#E8680D"> <!-- COR DO CHROME -->
        <meta name="keywords" content="" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="icon" type="image/png" href="{{asset('images/favicon.ico')}}">
        <link href="{{asset('css/screen.css')}}" media="screen, projection" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/print.css')}}" media="print" rel="stylesheet" type="text/css" />
        <!--[if IE]>
          <link href="{{asset('/css/ie.css')}}" media="screen, projection" rel="stylesheet" type=
        "text/css" />
        <![endif]-->
        <link href="{{asset('lib/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/jquery-prettyPhoto/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('css/master.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="topbar">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('loja.minhaconta')}}">Minha Conta</a></li>
                    <li><a href="{{route('loja.regioes')}}">Cidades atendidas</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://api.whatsapp.com/send?phone=5519997158129" target="_blank"><i class="fa fa-whatsapp"></i></a></li>                    
                    <li><a href="https://www.facebook.com/bodydietrc" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/bodydiet_/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('loja.produtos')}}"><img src="{{asset('images/logo.png')}}" width="200" height="auto" alt="" class="img-responsive"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{route('loja.faqs')}}">Como funciona</a></li>
                        <li><a href="{{route('site.midia')}}">Mídia</a></li>
                        <li><a href="{{route('site.contato')}}">Fale Conosco</a></li>
                        <!--
                        @if(session('login'))
                            <li><a href="{{route('loja.minhaconta')}}">Minha conta</a></li>
                        @endif
                        -->
                        <!-- <li><a href="{{route('loja.carrinho')}}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;Meu Carrinho</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>        
        @yield('content')    
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h2>Institucional</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <ul>
                                    <li><a href="{{route('loja.produtos')}}">Inicio</a></li>
                                    <li><a href="{{route('loja.minhaconta')}}">Minha Conta</a></li>
                                    <li><a href="{{route('loja.regioes')}}">Cidades atendidas</a></li>
                                    <li><a href="{{route('loja.faqs')}}">Como Funciona</a></li>
                                    <li><a href="{{route('site.midia')}}">Mídia</a></li>
                                    <li><a href="{{route('site.contato')}}">Fale Conosco</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2>Localização</h2>
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7378.110827286726!2d-47.564247525063834!3d-22.389268341109574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c7dba5ac20d36b%3A0x2cc1c9421c1e4659!2sVila+Martins%2C+Rio+Claro+-+SP!5e0!3m2!1spt-BR!2sbr!4v1471960398027" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        <p>
                            Rua 6, Nº 426, Entre a Av. 13 e 15, Jd. Dona Angela - Centro, Rio Claro - SP <br>
                            (19) 3532.2814 <br>
                            (19)99715-8129
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h2>Facebook</h2>
                        <div class="fb-page" data-href="https://www.facebook.com/bodydietbr" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-width="500"><blockquote cite="https://www.facebook.com/bodydietbr" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/bodydietbr">Body Diet</a></blockquote></div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="container">
                    © Copyright 2016 - Todos os direitos reservados a <a href="/">Body Diet</a>.
                    <p class="pull-right">Desenvolvido por <a href="http://www.microcenterrc.com.br" target="_blank">Micro Center</a></p>
                </div>
            </div>
    </footer>
    
    <script type="text/javascript" src="{{asset('lib/jquery/dist/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.mask.min.js')}}"></script>   
    <script type="text/javascript" src="{{asset('lib/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!--<script type="text/javascript" src="{{asset('lib/instafeed.js/instafeed.js')}}"></script> -->
    <script type="text/javascript" src="{{asset('lib/jquery-prettyPhoto/js/jquery.prettyPhoto.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto({
                social_tools: false
            });
            setTimeout(function(){
                $("#instacar .item").first().addClass('active');
            }, 1000);
            var initialPos = $(window).scrollTop();
            if(initialPos <= 0) {
                $('.navbar-fixed-top').css('top', '30px');
            }else {
                $('.navbar-fixed-top').css('top', '0'); 
            }
            $(window).on("scroll", function(){
                var scrollPos = $(window).scrollTop();
                if(scrollPos <= 0){
                    $('.topbar').fadeIn();
                    $('.navbar-fixed-top').css('top', '30px');
                }else{
                    $('.topbar').fadeOut();
                    $('.navbar-fixed-top').css('top', '0');
                }
            });

            @yield('script')
        });
    </script>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>