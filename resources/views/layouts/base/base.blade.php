<!DOCTYPE html>
<html lang="es-CO">
@routes

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Programa de Beneficios Waffcake ¡Gana descuentos especiales por tus compras y por recomendar nuestro sabor wafflero, tu nuestra razón de ser!" />
    <meta name="author" content="Geostigma Media SAS" />
    <title> Área de Clientes WaffCake - La wafflería del sabor </title>
    <script src="https://kit.fontawesome.com/7e8f963e2a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('js/morrisjs/morris.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/style.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/login.css')}}" rel="stylesheet" />
    <link href="{{ asset('css/pages/dashboard1.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/waffCake.css')}}" rel="stylesheet" />
    <!-- Chrome, Firefox OS, Opera and Vivaldi -->
    <meta name="theme-color" content="#51271D">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#51271D">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#51271D">
    <!-- Favicons -->
    <link href="https://www.waffcake.com/favicon.png" rel="icon">
    <link href="https://www.waffcake.com/apple-touch-icon-precomposed.png" rel="apple-touch-icon">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2689368-112"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-2689368-112');
    </script>
</head>

<body class="skin-default fixed-layout">
    <div id="main-wrapper"> @include('layouts.base.nav')
        <div class="page-wrapper"> @yield('content')
            <a class="wapp" href="//api.whatsapp.com/send?phone=573128907331" target="_blank"> <i class="fa fa-whatsapp"
                    aria-hidden="true"></i> </a> </div>

        <footer class="footer"> ©
            <script>document.write(new Date().getFullYear());</script>
            WaffCake - La wafflería del sabor
            <a href="https://www.facebook.com/waffcake" class="facebook" target="_blank" class="ml-2">
                <i class="fa fa-facebook facebook" style="font-size: 20px"></i>
            </a>
            <a href="https://www.instagram.com/waffcake1/" class="instagram" target="_blank" class="ml-2">
                <i class="fa fa-instagram instagram" style="font-size: 20px"></i>
            </a>
            <a data-toggle="tooltip" class="float-right" data-placement="top" href="https://www.geostigmamedia.com"
                title="Diseño y Desarrollo Web: Geostigma Media" target="_blank"><img
                    src="https://www.waffcake.com/img/geostigma-media.png" alt="geostigmamedia" /></a></footer>
    </div>
    <script src="{{ asset ('js/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset ('js/popper/popper.min.js')}}"></script>
    <script src="{{ asset ('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset ('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset ('js/waves.js')}}"></script>
    <script src="{{ asset ('js/sidebarmenu.js')}}"></script>
    <script src="{{ asset ('js/custom.min.js')}}"></script>
    <script src="{{ asset ('js/raphael/raphael-min.js')}}"></script>
    <script src="{{ asset ('js/morrisjs/morris.min.js')}}"></script>
    <script src="{{ asset ('js/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset ('js/main.js')}}"></script>
    <!-- Scripts propios -->
    @yield('scripts')
</body>

</html>