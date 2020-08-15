<!DOCTYPE html>
<html lang="es-CO">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Tell the browser to be responsive to screen width -->
<meta name="description" content="Programa de Beneficios Waffcake ¡Gana descuentos especiales por tus compras y por recomendar nuestro sabor wafflero, tu nuestra razón de ser!" />
<meta name="author" content="Geostigma Media SAS" />
<title> Área de Clientes WaffCake - La wafflería del sabor </title>
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
<title>Inicio de Sesion</title>
<link href="{{ asset('css/pages/login-register-lock.css')}}" rel="stylesheet">
<link href="{{ asset('css/style.min.css')}}" rel="stylesheet" />
<link href="{{ asset('css/waffCake.css')}}" rel="stylesheet"/>
</head>

<body style="background-image: url({{ asset('img/register.png') }})">
<div id="app" > @yield('content') </div>
<script src="{{ asset ('js/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset ('js/popper/popper.min.js')}}"></script>
<script src="{{ asset ('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>
</html>
