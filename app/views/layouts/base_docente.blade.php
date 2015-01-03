<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Docente | Instituto de Sistemas Cusco</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        <!-- Theme style -->
        {{ HTML::style('assets/css/docente.css') }}
        {{ HTML::script('assets/js/jquery.min.js') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="panel-usuario">
      
    <div class="header logeado clearfix">
        <div class="logo-header-wrap">
            <h1><a href="{{url('docente/perfil')}}" title="Adondevivir.com" class="logo-header nombre">Docentes - <b>ISC</b></a></h1>
        </div>
        <div class="pull-left">
        </div>
        <div class="pull-right text-right">
            <div class="btn-group">
                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                    {{ Auth::user()->email}}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" style="right: 0;left: auto;">
                    <li><span class="datos"><small>Miembro desde {{ date("d F Y",strtotime(Auth::user()->created_at)) }}</small></span></li>
                    <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
                    <li><a href="{{url('docente')}}"><span class="glyphicon glyphicon-cog"></span> Perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{url('salir')}}"><span class="glyphicon glyphicon-off"> </span> Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content mensajes">
        <div class="panel_nav" id="dmenu">
            <ul>
                <li><a href="{{url('docente')}}" class="active"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-book"></span> Mis Cursos</a></li>
                <li><a href=""><span class="glyphicon glyphicon-bookmark"></span> Ingresar Notas</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-list"></span> Alertas</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Configuración</a></li>
                <li><a href="{{url('ListarCursos')}}"><span class="glyphicon"></span> Mis Cursos Libres</a>
                
                <li><a href="{{url('ListarCursosCarreras')}}"><span class="glyphicon"></span> Mis Cursos de Carrera</a>
                <li><a href="#"><span class="glyphicon"></span> Ingreso De Notas Curso Libre</a>
                <li><a href="#"><span class="glyphicon"></span> Ver Notas Curso Libre</a>
                <li><a href="#"><span class="glyphicon"></span> Ingreso De Notas Carrera Tecnica</a>
                <li><a href="#"><span class="glyphicon"></span> Ver Notas Carrera Tecnica</a>

            </ul>
        </div>
        <div class="panel_container limit-width">
            <div class="panel_content">
                <div>
                    <h3>@section('title') PANEL CONTROL<small>Instituto de Sistemas Cusco </small>@show</h3>
                    <ul class="tabs primary">
                        @section('options')
                        <li><a href="#">Opciones</a></li>
                        @show
                    </ul>
                </div>
                @if (Session::get('message-success'))
                <div class="alert alert-success">{{ Session::get('message-success')}}</div>
                @endif
                @if (Session::get('message-warning'))
                <div class="alert alert-warning">{{ Session::get('message-warning')}}</div>
                @endif
                @if (Session::get('message-danger'))
                <div class="alert alert-danger">{{ Session::get('message-danger')}}</div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
    <!-- add new calendar event modal -->
    {{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>
