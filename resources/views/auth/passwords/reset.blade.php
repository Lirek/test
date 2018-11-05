<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Leipel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/login3.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/slick-team-slider.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/style.css')}}">
        <link href="{{ asset('views/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
<style type="">
    html {
        min-height: 100%;
        position: relative;
    }

    body {
      margin: 0;
      margin-bottom: 40px;
    }

    footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 40px;
    }

</style>
<body>
<!--HEADER START-->
<div id="wrapper" class="main-navigation ">

    <nav class="navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/') }}"><img src="{{asset('plugins/img/Logo-Leipel.png')}}"
                                                                   width="150" height="50" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/login') }}">Iniciar Sesi&oacute;n</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="img-responsive"></div>
    <img src="{{asset('plugins/img/piñas.jpg')}}" style="  background-size: cover; position: absolute; width: 100%; height: 100% ">

    <!--HEADER END-->

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <br>
                <div class="panel panel-default">
                <div class="panel-heading">Restaurar Contraseña</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="verEmail" type="email" class="form-control" name="email" value="{{ old('email', $email) }}" readonly="true" autofocus >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
<div class="col-lg-12" style="background-color: #21a4de" >
    <div class="text-center">
            <center>
                <img height="60px" style="padding: 0% 3%" src="{{asset('plugins/img/logo-icon-2.png')}}">
                <img height="60px" style="padding: 0% 3%" src="{{asset('plugins/img/logo-icon-4.png')}}">
                <img height="60px" style="padding: 0% 3%" src="{{asset('plugins/img/logo-icon.png')}}">
                <img height="60px" style="padding: 0% 3%" src="{{asset('plugins/img/logo-icon-5.png')}}">
                <img height="60px" style="padding: 0% 3%" src="{{asset('plugins/img/logo-icon-3.png')}}">
            </center>
    </div>
</div>
</footer>
  <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('plugins/js/custom.js') }}"></script>
       <script src="{{ asset('plugins/js/jquery.easing.min.js') }}"></script>
       <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
       <script src="{{ asset('plugins/js/slick.min.js') }}"></script>
       <script src="{{ asset('js/app.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
                var pathname = window.location.pathname;
                separador = "/";
                urlSeparada = pathname.split(separador);
                //console.log(urlSeparada[6]);
                $("#verEmail").val(urlSeparada[7]);
                console.log($("#verEmail"));
        });

    </script>
</body>
</html>