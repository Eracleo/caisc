<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Panel de administración | ISC</title>
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/error.css') }}
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="{{ HTML::style('js/ie8-responsive-file-warning.js') }}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wapper-error">
      <div class="titulo">ERROR <small>@section('title')404 @show </small>
      </div>
      <hr>
      <div class="content">
        @section('content')
        <p>Ups... link perdido. Intente más tarde</p>
        @show
        <p>Intente más tarde y/ó pongase en contacto con el administrador </p>
        <p><a href="{{url('/')}}" class="btn btn-primary btn-lg">VOLVER a INICIO</a></p>
      </div>
      <p align="center"><a href="{{url('/')}}"><b>© Instituto de Sistemas Cusco</b></a> - 2014 | Todos los derechos reservados</p>
    </div>
  </body>
</html>
