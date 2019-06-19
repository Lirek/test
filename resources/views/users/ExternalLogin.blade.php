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
    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/login3.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/slick-team-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/style.css')}}">
    <link href="{{ asset('views/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<!--HEADER START-->
<div class="main-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar sesión</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/loginPayment') }}">
                            {{ csrf_field() }}

                            <input name="x1" value="{{ $payment }}" hidden>
                            <input name="x2" value="{{ $external }}" hidden>
                            <input name="x3" value="{{ $transaction }}" hidden>
                            <input name="x4" value="{{ $points }}" hidden>
                            <input name="x5" value="{{ $token }}" hidden>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Correo </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required autofocus>
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
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Olvide contraseña
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--footer para integrar las redes sociales--}}
                    <div class="panel-footer text-center">
                        <a href="login/facebook" class="btn btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Iniciar sesion con Facebook
                        </a>

                    </div>
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
</div>
</body>
</html>
