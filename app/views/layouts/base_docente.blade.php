<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Panel de Administración | Instituto de Sistemas Cusco</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        <!--<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons -->
        {{ HTML::style('assets/css/ionicons.min.css') }}
        <!-- Morris chart -->
        {{ HTML::style('assets/css/morris/morris.css') }}
        <!-- jvectormap -->
        {{ HTML::style('assets/css/jvectormap/jquery-jvectormap-1.2.2.css') }}
        <!-- Date Picker -->
        {{ HTML::style('assets/css/datepicker/datepicker3.css') }}
        <!-- Daterange picker -->
        {{ HTML::style('assets/css/daterangepicker/daterangepicker-bs3.css') }}
        <!-- bootstrap wysihtml5 - text editor -->
        {{ HTML::style('assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
        <!-- Theme style -->
        {{ HTML::style('assets/css/AdminLTE.css') }}

        {{ HTML::script('assets/js/jquery.min.js') }}
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <header class="header">
            <a href="/" class="logo">ISC - Panel</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{Auth::user()->email}} <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <br><br>
                                    <p>{{Auth::user()->tipoUsuario }}
                                        <small>Miembro desde {{ date("d F Y",strtotime(Auth::user()->created_at)) }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        {{ HTML::link(Str::lower(Auth::user()->tipoUsuario).'/profile/'.Auth::user()->nroId,'Profile',array('class'=>'btn btn-default btn-flat')) }}
                                    </div>
                                    <div class="pull-right">
                                        {{ HTML::link('salir','Sign out', array('class'=>'btn btn-default btn-flat')) }}
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            Hola
                        </div>
                        <div class="pull-left info">
                            <p>{{Auth::user()->email}}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="docente">
                                <i class="fa fa-folder"></i> <span>Docentes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>{{ HTML::link('docente/password/2141','Cambiar Contraseña') }}</li>
                                <li>{{ HTML::link('/ListarCursos/','Mis Cursos Libres') }}</li>
                                <li>{{ HTML::link('/ListarCursosCarreras/','Mis Cursos de Carrera') }}</li>
                            </ul>
                        </li>

                        <!-- modulo Asistencias -->
                        <li class="treeview">
                            <a href="RegistroAsistencias">
                                <i class="fa fa-folder"></i> <span>Registro Asistencias</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>{{ HTML::link('asistencia/add_ct', 'Asistencia en Carrera Tecnica')}}</li>
                                <li>{{ HTML::link('asistencia/add_cl', 'Asistencia en Cursos Libre')}}</li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="ingresonotas">
                                <i class="fa fa-folder"></i> <span>Ingreso De Notas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>{{ HTML::link('ingresonotas/inicioCT','Ingreso De Notas Carrera Tecnica') }}</li>
                                <li>{{ HTML::link('ingresonotas/registroCT','Ver Notas Carrera Tecnica') }}</li>
                                <li>{{ HTML::link('ingresonotas/inicioCL','Ingreso De Notas Curso Libre') }}</li>
                                <li>{{ HTML::link('ingresonotas/registroCL','Ver Notas Curso Libre') }}</li>
                            </ul>
                        </li>
                    </ul>
                    <p align="center">Ing. Software - UNSAAC</p>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>@section('title') PANEL CONTROL<small>Instituto de Sistemas Cusco </small>@show</h1>
                    <ul class="tabs primary">
                        @section('breadcrumb')
                        <li><a href="#">Opciones</a></li>
                        @show
                    </ul>
                </section>
                <!-- Main content -->
                <section class="content">
                @if (Session::get('mensaje'))
                    <div class="alert alert-success">{{ Session::get('mensaje')}}</div>
                @endif
                @yield('content')
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- add new calendar event modal -->
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/jquery-ui.min.js') }}
        <!-- Morris.js charts -->
        {{ HTML::script('assets/js/raphael-min.js') }}
        {{ HTML::script('assets/js/plugins/morris/morris.min.js') }}
        <!-- Sparkline -->
        {{ HTML::script('assets/js/plugins/sparkline/jquery.sparkline.min.js') }}
        <!-- jvectormap -->
        {{ HTML::script('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
        {{ HTML::script('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}
        <!-- jQuery Knob Chart -->
        {{ HTML::script('assets/js/plugins/jqueryKnob/jquery.knob.js') }}
        <!-- daterangepicker -->
        {{ HTML::script('assets/js/plugins/daterangepicker/daterangepicker.js') }}
        <!-- datepicker -->
        {{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
        <!-- Bootstrap WYSIHTML5 -->
        {{ HTML::script('assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
        <!-- iCheck -->
        {{ HTML::script('assets/js/plugins/iCheck/icheck.min.js') }}
        <!-- AdminLTE App -->
        {{ HTML::script('assets/js/AdminLTE/app.js') }}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        {{ HTML::script('assets/js/AdminLTE/dashboard.js') }}
        <!-- AdminLTE for demo purposes -->
        {{ HTML::script('assets/js/AdminLTE/demo.js') }}

    </body>
</html>
