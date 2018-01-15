<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @php
            $navbar = Navbar::withBrand(config('app.name') . ' 1.4', route('admindashboard'))->inverse();
            if(Auth::check())
            {
                $arrayLinks = [
                    ['link' => route('adminusers.index'), 'title' => 'Usuários'],
                    ['link' => route('admincategories.index'), 'title' => 'Categorias'],
                    ['link' => route('adminproducts.index'), 'title' => 'Produtos'],
                    ['link' => route('admindiccountrules.index'), 'title' => 'Regras para Desconto'],
                    ['link' => route('adminclients.index'), 'title' => 'Clientes'],
                    ['link' => route('adminorders.index'), 'title' => 'Pedidos'],
                    ['link' => route('admincoupons.index'), 'title' => 'Cupons'],
                ];
                $navbar->withContent(Navigation::links($arrayLinks));

                $arrayLinksRight = [
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => route('adminusers.edit', Auth::user()->id),
                                'title' => 'Alterar Senha'
                            ],
                            [
                                'link' => route('logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                    'onclick' => "event.preventDefault();document.getElementById(\"form-logout\").submit();"
                                ]
                            ]
                        ]
                    ]
                ];
                $navbar->withContent(Navigation::links($arrayLinksRight)->right());

               $formLogout = FormBuilder::plain([
                    'id' => 'form-logout',
                    'url' => route('logout'),
                    'method' => 'POST',
                    'style' => 'display:none'
                ]); 

                $subArray = [ 
                    [
                        'Submenu', [ 
                            ['link' => route('admincities.index'), 'title' => 'Cidades/Frete'],
                            ['link' => route('admincontacts.index'), 'title' => 'Contatos'],
                            ['link' => route('adminmidia.index'), 'title' => 'Midias/Banners'],
                            ['link' => route('adminfaq.index'), 'title' => 'FAQ'],
                            ['link' => route('adminproducts.index'), 'title' => 'E-mails'],
                            ['link' => route('adminfalhas.index'), 'title' => 'Clientes não atendidos'],
                        ]
                    ]
                ];

                $navbar->withContent(Navigation::links($subArray)->right());                
            }
        @endphp
    {!! $navbar !!}

    @if(Auth::check())
        {!! form($formLogout) !!}
    @endif

    @if(Session::has('message'))
        <div class="container hidden-print">
            {!! Alert::warning(Session::get('message'))->close() !!}
        </div>
    @endif
    @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
