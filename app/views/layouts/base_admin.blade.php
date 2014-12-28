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
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class = "glyphicon glyphicon-file"></span>
              Notas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li class="dropdown-header">Cursos Libres</li>
                <li>                   
                    <!--{{ HTML::link('ingresonotas/inicioCL','Ingreso De Notas Curso Libre') }}-->
                    <a href = "{{url('ingresonotas/inicioCL')}}">
                    <span class = "glyphicon glyphicon-open"></span>
                    Ingreso De Notas Curso Libre</a>                     

                </li>
                <li>
                    <!--{{ HTML::link('ingresonotas/registroCL','Ver Notas Curso Libre') }}-->
                    <a href = "{{url('ingresonotas/registroCL')}}">
                    <span class = "glyphicon glyphicon-th-list"></span>
                    Ver Notas Curso Libre</a>                     
                    
                </li>
                 <li class="divider"></li>
                 <li class="dropdown-header">Carrera Tecnica</li>
                <li>
                    <!--{{ HTML::link('ingresonotas/inicioCT','Ingreso De Notas Carrera Tecnica') }}-->
                    <a href = "{{url('ingresonotas/inicioCT')}}">
                    <span class = "glyphicon glyphicon-open"></span>
                    Ingreso De Notas Carrera Tecnica</a> 
                </li>
                <li>
                    <!--{{ HTML::link('ingresonotas/registroCT','Ver Notas Carrera Tecnica') }}-->
                    <a href = "{{url('ingresonotas/registroCT')}}">
                    <span class = "glyphicon glyphicon-th-list"></span>
                    Ver Notas Carrera Tecnica</a>                     
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class = "glyphicon glyphicon-book"></span> Matriculas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li class="dropdown-header">Cursos Libres</li>
                <li>
                    <!--{{ HTML::link('matriculas_cl/lista_cursos','Cursos Disponibles') }}-->
                    <a href = "{{url('matriculas_cl/lista_cursos')}}">
                    <span class = "glyphicon glyphicon-th-list"></span>
                    Lista Cursos Disponibles</a> 
                </li>

                <li>
                    <!--{{ HTML::link('matriculas_cl/ingresar','Matriculas por Curso') }}-->
                    <a href = "{{url('matriculas_cl/ingresar')}}">
                    <span class = "glyphicon glyphicon-th-list"></span>
                    Lista Matriculas por Curso</a> 
                </li>
                 <li class="divider"></li>
                 <li class="dropdown-header">Carrera Tecnica</li>
                <li>
                    <!--{{ HTML::link('matriculas_ct/registro','Registrar Matricula') }}-->
                    <a href = "{{url('matriculas_ct/registro')}}">
                    <span class = "glyphicon glyphicon-pencil"></span>
                    Registrar Matricula</a> 
                </li>
                <li>
                    <!--{{ HTML::link('matriculas_ct/listaMatriculas','Listar Matriculas') }}-->
                    <a href = "{{url('matriculas_ct/listaMatriculas')}}">
                    <span class = "glyphicon glyphicon-th-list"></span>
                    Listar Matriculas</a> 
                </li>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              Carga Academica<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <!--{{ HTML::link('/crearCargaCt','Carga Academica CT') }}-->
                    <a href = "{{url('/crearCargaCt')}}">
                    <span class = "glyphicon glyphicon-pencil"></span>
                    Carga Academica CT</a> 
                </li>
                <li>    
                    <!--{{ HTML::link('/crearCargaCl','Carga Academica CL') }}-->
                    <a href = "{{url('/crearCargaCl')}}">
                    <span class = "glyphicon glyphicon-pencil"></span>
                    Carga Academica CL</a> 
                </li>
                <li>
                    {{ HTML::link('/MostrarOpcionesDocente','Horario Por Docente') }}
                    <a href = "{{url('/MostrarOpcionesDocente')}}">
                    <span class = "glyphicon glyphicon-calendar"></span>
                    Horario Por Docente</a> 
                </li>
                <li>
                    <!--{{ HTML::link('/MostrarOpcionesPorCurso','Horario Por Curso') }}-->
                    <a href = "{{url('/MostrarOpcionesPorCurso')}}">
                    <span class = "glyphicon glyphicon-calendar"></span>
                    Horario Por Curso</a> 
                </li>
                <li>
                    <!--{{ HTML::link('/MostrarOpcionesPorAula','Horario Por Aula') }}-->
                    <a href = "{{url('/MostrarOpcionesPorAula')}}">
                    <span class = "glyphicon glyphicon-calendar"></span>
                   Horario Por Aula</a> 
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class = "glyphicon glyphicon-cog"></span>
              Conguraciones<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>{{HTML::linkAction('DiaController@index', 'Dia')}}</li>
                <li>{{HTML::linkAction('GrupoController@index', 'Grupo')}}</li>
                <li>{{HTML::linkAction('ModuloController@index', 'Modulo')}}</li>
                <li>{{HTML::linkAction('SemestreController@index', 'Semestre')}}</li>
                <li>{{HTML::linkAction('TurnoController@index', 'Turno')}}</li>
                <li>
                  <!-- {{HTML::link('CarreraProfesional', 'Carrera Profesional')}} -->
                  <a href = "{{url('CarreraProfesional')}}">
                    <span class = "glyphicon glyphicon-home"></span>
                   Carreras Profesionales</a>
                </li>
                <li>
                  <!-- {{HTML::link('Aula', 'Aula')}} -->
                  <a href = "{{url('Aula')}}">
                    <span class = "glyphicon glyphicon-home"></span>
                   Aulas</a>
                </li>
                <li>
                  <!--{{HTML::link('personal/cargos', 'Cargo')}} -->
                  <a href = "{{url('personal/cargos')}}">
                    <span class = "glyphicon glyphicon-user"></span>
                   Cargo</a>
                </li>
                <li>
                  <!--{{HTML::link('modalidad', 'Modalidad Pago')}} -->
                  <a href = "{{url('modalidad')}}">
                    <span class = "glyphicon glyphicon-euro"></span>
                   Modalidad de Pago</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class = "glyphicon glyphicon-book"></span>
              Cursos<b class="caret"></b></a>
              <ul class="dropdown-menu">
                 <li class="dropdown-header">
                    <span class = "glyphicon glyphicon-book"></span>
                    Curso C. Tecnica
                 </li>
                 <li>
                      <!--{{ HTML::link('CursosTecnica/index.html','Ver Cursos de Carrera') }}-->
                       <a href = "{{url('CursosTecnica/index.html')}}">
                        <span class = "glyphicon glyphicon-search"></span>
                        Ver Cursos de Carrera</a> 
                 </li>
                  <li>
                      <!--{{ HTML::link('CursosTecnica/create.html','Agregar Curso') }}-->
                      <a href = "{{url('CursosTecnica/create.html')}}">
                      <span class = "glyphicon glyphicon-plus"></span>
                      Agregar Curso</a>
                  </li>
                  <li>
                      <!--{{ HTML::link('CursosTecnica/delete.html', 'Eliminar Curso')}}-->
                      <a href = "{{url('CursosTecnica/delete.html')}}">
                      <span class = "glyphicon glyphicon-remove"></span>
                      Eliminar Curso</a>                      
                  </li>
                 <li class="divider"></li>
                 <li class="dropdown-header">
                    <span class = "glyphicon glyphicon-book"></span>
                    Curso Libres
                 </li>
                 <li>
                      <!--{{HTML::link('CursosLibres/index.html','Ver Cursos Libres') }}-->
                      <a href = "{{url('CursosLibres/index.html')}}">
                        <span class = "glyphicon glyphicon-search"></span>
                        Ver Cursos Libres</a> 
                 </li>
                 <li>
                      <!--{{ HTML::link('CursosLibres/create.html','Agregar Curso') }}-->
                      <a href = "{{url('CursosLibres/create.html')}}">
                      <span class = "glyphicon glyphicon-plus"></span>
                      Agregar Curso</a>
                 </li>
                 <li>
                      <!--{{ HTML::link('CursosLibres/delete.html', 'Eliminar Curso')}}-->
                      <a href = "{{url('CursosLibres/delete.html')}}">
                      <span class = "glyphicon glyphicon-remove"></span>
                      Eliminar Curso</a>
                 </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="productos.html" class="dropdown-toggle" data-toggle="dropdown">
              <span class = "glyphicon glyphicon-user"></span>
              Personas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">
                <span class = "glyphicon glyphicon-user">                  
                </span>
                Alumnos</li>
                <li>                
                <!--{{ HTML::link('alumno/add.html', 'Agregar') }} -->                
                  <a href = "{{url('alumno/add.html')}}">
                  <span class = "glyphicon glyphicon-plus"></span>
                  Agregar</a>
                </li>
                <li>
                  <!--{{ HTML::link('alumnos','Listar Alumnos') }}-->
                  <a href = "{{url('alumnos')}}">
                  <span class = "glyphicon glyphicon-list-alt"></span>
                  Listar Alumnos</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">
                <span class = "glyphicon glyphicon-user"></span>
                Docentes</li>
                <li>                
                  <a href = "{{url('docente/add.html')}}">
                  <span class = "glyphicon glyphicon-plus"></span>
                  Agregar</a>
                </li>

                <li>                    
                    <a href = "{{url('docentes')}}">
                  <span class = "glyphicon glyphicon-list-alt"></span>
                  Listar Docentes</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-header">
                <span class = "glyphicon glyphicon-user"> </span>
                Personal</li>
                <li>
                  <!--{{ HTML::link('personal/add.html','Agregar') }}-->
                  <a href = "{{url('personal/add.html')}}">
                  <span class = "glyphicon glyphicon-plus"></span>
                  Agregar</a>
                  </li>
                <li>
                  <!--{{ HTML::link('personal','Listar Personal') }}-->
                  <a href = "{{url('personal')}}">
                  <span class = "glyphicon glyphicon-list-alt"></span>
                  Listar Personales</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="productos.html" class="dropdown-toggle" data-toggle="dropdown">
              <span class = "glyphicon glyphicon-tags"> </span>
              Facturas<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                    <!--{{ HTML::link('/pagos/create','Realizar Pago') }}-->
                    <a href = "{{url('/pagos/create')}}">
                    <span class = "glyphicon glyphicon-euro"></span>
                    Realizar Pago</a> 
                </li>
                <li>
                    <!--{{ HTML::link('/pagos/search_pagos','Buscar') }}-->
                    <a href = "{{url('/pagos/search_pagos')}}">
                    <span class = "glyphicon glyphicon-search"></span>
                    Buscar</a> 
                    
                </li>                
                <li>
                    <!--{{ HTML::link('/pagos/search_detail_pagos','Buscar Detalles') }}-->
                    <a href = "{{url('/pagos/search_detail_pagos')}}">
                    <span class = "glyphicon glyphicon-search"></span>
                    Buscar Detalles</a> 
                </li>
                <li>
                    <!--{{ HTML::link('/pagos/search_pagos_alumno','Buscar Boletas por Alumno') }}-->
                    <a href = "{{url('/pagos/search_pagos_alumno')}}">
                    <span class = "glyphicon glyphicon-search"></span>
                    Buscar Boletas por Alumno</a> 
                </li>
                <li>
                    <!--{{ HTML::link('/pagos','Listar') }}-->
                    <a href = "{{url('/pagos')}}">
                  <span class = "glyphicon glyphicon-list-alt"></span>
                  Listar</a>                    
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{Auth::user()->email}}<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">Miembro desde {{ date("d F Y",strtotime(Auth::user()->created_at)) }}</li>
                <li>{{ HTML::link('persona','Perfil') }}</li>
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
<div class="container">
    <div class="footer">
        <p><b>© Instituto de Sistemas Cusco</b> - 2014 | Todos los derechos reservados</p>
    </div>
</div>
{{ HTML::script('assets/js/bootstrap.min.js') }}
</body>
</html>
