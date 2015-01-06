<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alumnos | Instituto de Sistemas Cusco</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/alumno.css') }}
        {{ HTML::script('assets/js/jquery.min.js') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
    <div class="site-wrapper">
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Alumnos - <b>ISC</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @section('menuPerfil')
                    <li><a href="{{url('alumnoB/perfil')}}">Perfil</a></li>
                    @show
                    @section('misCursos')
                    <li><a href="iniciocursosmatriculados">Mis Cursos</a></li>
                    @show
                    @section('misNotas')
                    <li><a href="inicionotascursos">Mis Notas</a></li>
                    @show
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Matriculas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--{{ HTML::link('ingresonotas/inicioCT','Ingreso De Notas Carrera Tecnica') }}-->
                                <a href = "{{url('alumnoB/registroCT')}}">
                                <span class = "glyphicon glyphicon-pencil"></span>
                                Registrar Matrícula</a>
                            </li>
                            <li>
                                <!--{{ HTML::link('ingresonotas/inicioCT','Ingreso De Notas Carrera Tecnica') }}-->
                                <a href = "{{url('alumnoB/solicita_semestre')}}">
                                <span class = "glyphicon glyphicon-pencil"></span>
                                Constancia de Matrícula</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->nroId}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Miembro desde {{ date("d F Y",strtotime(Auth::user()->created_at)) }}</li>
                            <li>{{ HTML::link('persona','Perfil') }}</li>
                            <li class="divider"></li>
                            <li><a href="{{url('salir')}}"><span class="glyphicon glyphicon-off"> </span> Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container" role="main">
              <div class="head-content">
                <h1>@section('title') PANEL CONTROL <small>Instituto de Sistemas Cusco </small>@show</h1>
                <ul class="tabs primary">
                    @section('options')
                    <li><a href="#">Opciones</a></li>
                    @show
                </ul>
              </div>
                @if (Session::get('mensaje'))
                <div class="alert alert-success">{{ Session::get('mensaje')}}</div>
                @endif

                @if (Session::get('message-success'))
                <div class="alert alert-success">{{ Session::get('message-success')}}</div>
                @endif
                @if (Session::get('message-warning'))
                <div class="alert alert-warning">{{ Session::get('message-warning')}}</div>
                @endif
                @if (Session::get('message-danger'))
                <div class="alert alert-danger">{{ Session::get('message-danger')}}</div>
                @endif
              <div class="body-content">
                @yield('content')
              </div>
        </div>
    <div class="mastfoot">
        <div class="inner">
          <p><a href="#"><b>Instituto de Sistimeas Cusco</b></a>, by <a href="#">@sofwareStudient</a>.</p>
        </div>
    </div>
</div>
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    </body>
</html>
