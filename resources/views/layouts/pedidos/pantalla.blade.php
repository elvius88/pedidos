<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="theme-color" content="#fff"/>
    <meta http-equiv="Cache-control" content="public">

    <title>Pedidos</title>
    <meta content="Pantalla de pedidos de comidas" name="description">
    <meta content="" name="keywords">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700&display=swap" rel="stylesheet" media="(min-width: 0em)">

    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="(min-width: 0em)">
    <link href="{{ asset('plugins/fontawesome-5.15.1/css/all.min.css') }}" rel="stylesheet" media="(min-width: 0em)">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="(min-width: 0em)">

</head>
<body class="container-fluid bg-info">
    <div id="pedidos">

    </div>

    <!-- Plugins JS Files -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js') }}" async></script>

</body>
</html>
