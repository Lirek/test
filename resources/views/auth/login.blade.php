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
<body>
 <!--HEADER START-->
  <div class="main-navigation navbar-fixed-top">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('plugins/img/Logo-Leipel.png')}}" width="150" height="50" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
            <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
            <li><a href="{{ url('/register')}}">Registrarse</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                                </form>
                            </div>
                            </div>
                            <div class="row">
                                <a href="login/facebook" class="btn btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                    Inicio de Sesion con Facebook
                                </a>

                                <a href="login/twitter" class="btn btn-twitter">
                                     <i class="fa fa-twitter"></i>
                                        Inicio de Sesion con Twitter
                                </a>

                                <a href="login/google" class="btn btn-google">
                                    <i class="fa fa-google-plus"></i>
                                        Inicio de Sesion con Google
                                </a>


                            </div>
                        </div>
                    </div>
                </div>

                {{--footer para integrar las redes sociales--}}
<<<<<<< HEAD
                    
=======
                <div class="panel-footer text-center">
                    {{--<a href="login/facebook" class="btn btn-facebook">--}}
                        {{--<i class="fa fa-facebook"></i>--}}
                        {{--Login con Facebook--}}
                    {{--</a>--}}

                    <a href="login/twitter" class="btn btn-twitter">
                        <i class="fa fa-twitter"></i>
                        Login con Twitter
                    </a>

                    <a href="login/google" class="btn btn-google">
                        <i class="fa fa-google-plus"></i>
                        Login con Google
                    </a>

                    {{--<a href="login/github" class="btn btn-github">--}}
                        {{--<i class="fa fa-github"></i>--}}
                        {{--<i class="fa fa-github-alt"></i>--}}
                        {{--<i class="fa fa-github-square"></i>--}}
                        {{--Login con Github--}}
                    {{--</a>--}}
                </div>
>>>>>>> f78ccd04bdc4f55506397e1d1eca75905d4ad6e6
                {{--fin de footer--}}

            </div>
        </div>
    </div>
</div>

<!--Seccion de Scripts-->
       <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
       <script src="{{ asset('plugins/js/custom.js') }}"></script>
       <script src="{{ asset('plugins/js/jquery.easing.min.js') }}"></script>
       <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
       <script src="{{ asset('plugins/js/slick.min.js') }}"></script>
       <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>


