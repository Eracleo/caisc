<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel de Administración | Instituto de Sistemas Cusco</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/admin.css') }}

        {{ HTML::script('assets/js/jquery.min.js') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="navbar navbar-fixed-top header" role="navigation">
    <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/') }}">Admin - <b>ISC</b></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="#contact">Ayuda</a></li>
            <li class="active"><a href="#about">About</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Carga Academica<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{ HTML::link('/crearCargaCt','Carga Academica CT') }}</i></li>
                <li>{{ HTML::link('/crearCargaCl','Carga Academica CL') }}</li>
                <li>{{ HTML::link('/MostrarOpcionesDocente','Horario Por Docente') }}</li>
                <li>{{ HTML::link('/MostrarOpcionesPorCurso','Horario Por Curso') }}</li>
                <li>{{ HTML::link('/MostrarOpcionesPorAula','Horario Por Aula') }}</li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conguraciones<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{HTML::linkAction('DiaController@index', 'Dia')}}</li>
                <li>{{HTML::linkAction('GrupoController@index', 'Grupo')}}</li>
                <li>{{HTML::linkAction('ModuloController@index', 'Modulo')}}</li>
                <li>{{HTML::linkAction('SemestreController@index', 'Semestre')}}</li>
                <li>{{HTML::linkAction('TurnoController@index', 'Turno')}}</li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Facturación<b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li> {{ HTML::link('/pagos/create','Realizar Pago') }}</li>
                 <li> {{ HTML::link('/pagos/search_pagos','Buscar') }}</li>
                 <li> {{ HTML::link('/pagos/search_detail_pagos','Buscar Detalles') }}</li>
                 <li> {{ HTML::link('/pagos/search_pagos_alumno','Buscar Boletas por Alumno') }}</li>
                 <li> {{ HTML::link('/pagos','Listar') }}</li>
                 <li class="divider"></li>
                 <li class="dropdown-header">Modalidad de Pago</li>
                 <li> {{ HTML::link('/modalidad/create','Agregar') }}</li>
                 <li> {{ HTML::link('/modalidad','Listar') }}</li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="productos.html" class="dropdown-toggle" data-toggle="dropdown">Personas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Alumnos</li>
                <li>{{ HTML::link('alumno/add.html','Agregar') }}</li>
                <li>{{ HTML::link('alumnos','Listar Alumnos') }}</li>
                <li class="divider"></li>
                <li class="dropdown-header">Docentes</li>
                <li>{{ HTML::link('docente/add.html','Agregar') }}</li>
                <li>{{ HTML::link('docentes','Listar Docentes') }}</li>
                <li class="divider"></li>
                <li class="dropdown-header">Personal</li>
                <li>{{ HTML::link('personal/add.html','Agregar') }}</li>
                <li>{{ HTML::link('personal','Listar Personal') }}</li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->email}}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Miembro desde {{ date("d F Y",strtotime(Auth::user()->created_at)) }}</li>
                <li>{{ HTML::link('personal/admin.html','Perfil') }}</li>
                <li>{{ HTML::link('personal/admin.html','Cambiar Contraseña') }}</li>
                <li class="divider"></li>
                <li><a href="{{url('salir')}}"><span class="glyphicon glyphicon-off"> </span> Cerrar sesión</a></li>
              </ul>
            </li>
            <!--li><a href="{{url('salir')}}"><span class="glyphicon glyphicon-off"> </span> Cerrar sesión</a></li-->
          </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container" role="main">
  <div class="head-content">
    <h1>@section('title') PANEL CONTROL<small>Instituto Sistima Cusco </small>@show</h1>
    <ul class="tabs primary">
        @section('options')
        <li><a href="#">Opciones</a></li>
        @show
    </ul>
  </div>
    @if (Session::get('mensaje'))
    <div class="alert alert-success">{{ Session::get('mensaje')}}</div>
    @endif
    @yield('content')
</div>
<div class="container">
    <div class="footer">
        <p><b>© Instituto de Sistemas Cusco</b> - 2014 | Todos los derechos reservados</p>
    </div>
</div>
{{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>
