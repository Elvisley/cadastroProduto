<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/font-awesome-4.7.0_2/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/plugins/loading/jquery.loading.min.css') }}">

    <script src="{{ asset('/js/jquery-3.2.1.min.js') }}" type="application/javascript"></script>
    <script src="{{ asset('/js/jquery.maskMoney.min.js') }}" type="application/javascript"></script>
    <script src="{{ asset('/js/bootstrap.js') }}" type="application/javascript"></script>
    <script src="{{ asset('/plugins/loading/jquery.loading.min.js') }}" type="application/javascript"></script>

    <title>Cadastrando Produtos</title>

</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Projeto Modelo</a>
        </div>
    </div>
</nav>

<div>
    <div class="container">
        @yield('content')
    </div>
</div>


</body>
</html>
