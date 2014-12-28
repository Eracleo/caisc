<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sessón | Instituto Sistemas Cusco</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        {{ HTML::style('assets/css/bootstrap.min.css') }}
        <style type="text/css">
        form#login-box {
        width: 350px;
        margin: 0px auto;
        padding: 20px;
        }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <form class="form-box" id="login-box" action="check" method="POST" >

            <div class="header"><h2>Iniciar Sessìon</h2> </div>

                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Correo electrónico"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Mantener la sesion iniciada
                    </div>
                    @if (Session::get('mensaje'))
                    <div style="color:red" text-align: rigth; >{{ Session::get('mensaje')}}</div>
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
                </div>
                <div class="footer">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
                </div>


            <div class="margin text-center">

            </div>
        </form>
        {{ HTML::script('assets/js/jquery.min.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
    </body>
</html>