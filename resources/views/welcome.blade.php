<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">


    {{--carrusel--}}
    <meta name="description" content="Circular Content Carousel with jQuery"/>
    <meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3"/>
    <meta name="author" content="Codrops"/>
    {{--carrusel--}}
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/index/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/index/css/content1.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
    <style type="text/css">


    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>


</head>
<body>

<!-- NAVBAR STAR-->

{{--<div class="main-navigation navbar">--}}
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{Request::url()}}">
                <img id="logo" src="{{asset('plugins/img/Logo-Leipel.png')}}">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                {{--<li class="active"><a href="{{Request::url()}}">Inicio</a></li>--}}
                <li><a href="#leipel">¿QUE ES LEIPEL?</a></li>
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">INICIAR SESION</a></li>
                <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register">REGISTRATE</a></li>
            </ul>
        </div>
    </div>
</nav>


{{--</div>--}}

<!-- NAVBAR END-->

<!-- SLIDER STAR-->

<div class="col-xs-8 col-sm-7 col-md-8 col-lg-8" id="banner">
    <div id="containerS">
        <ul id="slides">
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img class="img-responsive"
                         src='plugins/img/slider1-D.jpg'/>
                </div>
                <div class="slide-partial slide-right">
                    <img class="img-responsive"
                         src='plugins/img/slider1-I.jpg'/>
                </div>
                <h1 class="title">
                    {{--<span class="title-text">Forest</span>--}}
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img class="img-responsive"
                         src='plugins/img/slider2-D.jpg'/>
                </div>
                <div class="slide-partial slide-right">
                    <img class="img-responsive"
                         src='plugins/img/slider2-I.jpg'/>
                </div>
                <h1 class="title">
                    {{--<span class="title-text">Mountain</span>--}}
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img class="img-responsive"
                         src='plugins/img/slider3-D.jpg'"/>
                </div>
                <div class="slide-partial slide-right">
                    <img class="img-responsive"
                         src='plugins/img/slider3-I.jpg'/>
                </div>
                <h1 class="title">
                    {{--<span class="title-text">Ocean</span>--}}
                </h1>
            </li>
        </ul>
        <ul id="slide-select">
            <li class="btn prev"><</li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="btn next">></li>
        </ul>
    </div>

</div>

<!-- SLIDER END-->


<!--CONTENIDO STAR-->
<div class="" id="barra" class="text-center">
        <center>
            <img height="60px" style="padding: 0% 5%" src="plugins/img/logo-icon-2.png">
            <img height="60px" style="padding: 0% 5%" src="plugins/img/logo-icon-4.png">
            <img height="60px" style="padding: 0% 5%" src="plugins/img/logo-icon.png">
            <img height="60px" style="padding: 0% 5%" src="plugins/img/logo-icon-5.png">
            <img height="60px" style="padding: 0% 5%" src="plugins/img/logo-icon-3.png">
        </center>
</div>



<div class="col-md-12" id="">
    <div class="row">
        {{--<div class="container">--}}

        @foreach($radio as $r)
            {{-- @if(< 2)--}}
            <div class="hidden-sm hidden-md hidden-xs col-lg-3" style="width: 265px; padding-left: 45px">
            <figure class="snip1166 navy" style="display: block; ">
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample73.jpg" alt="sample73"/>--}}
                {{--<img class="img-responsive" src="/images/radio/{{ $r->logo }}" alt="sample73"/>--}}
                <img class="img-responsive" src="{{ asset($r->logo) }} " style="width: 90%" />
                <figcaption style="width: 107%">
                    <h3>
                        <small style="color: #fff; font-size: 60%">{{ $r->name_r }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                        <div align="left">
                        <li class="fa fa-facebook-f"><a href="{{ $r->facebook }}"></a></li>
                        <li class="fa fa-instagram"><a href="{{ $r->instagram }}"></a></li>
                        <li class="fa fa-twitter"><a href="{{ $r->twitter }}"></a></li>
                        <li class="fa fa-google-plus-circle"><a href="{{ $r->google }}"></a></li>
                        </div>
                    </h3>
                    <div>
                        <p>{{ $r->email_c }}</p>
                    </div>
                    <a href="#"></a>
                </figcaption>
            </figure>
            </div>
            <div class="col-md-5 hidden-lg  hidden-xs" style="margin-left: 8%">
            <figure class="snip1166 navy" >
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample73.jpg" alt="sample73"/>--}}
                {{--<img class="img-responsive" src="/images/radio/{{ $r->logo }}" alt="sample73"/>--}}
                <img class="img-responsive" src="{{ asset($r->logo) }} " style="width: 70%" />
                <figcaption style="width: 75%">
                    <h3>
                        <small style="color: #fff; font-size: 60%">{{ $r->name_r }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                        <div align="left">
                        <li class="fa fa-facebook-f"><a href="{{ $r->facebook }}"></a></li>
                        <li class="fa fa-instagram"><a href="{{ $r->instagram }}"></a></li>
                        <li class="fa fa-twitter"><a href="{{ $r->twitter }}"></a></li>
                        <li class="fa fa-google-plus-circle"><a href="{{ $r->google }}"></a></li>
                        </div>
                    </h3>
                    <div>
                        <p>{{ $r->email_c }}</p>
                    </div>
                    <a href="#"></a>
                </figcaption>
            </figure>
            </div>
            <div class="col-xs-10 hidden-sm hidden-lg hidden-md" style="margin-left: 15%">
            <figure class="snip1166 navy" >
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample73.jpg" alt="sample73"/>--}}
                {{--<img class="img-responsive" src="/images/radio/{{ $r->logo }}" alt="sample73"/>--}}
                <img class="img-responsive" src="{{ asset($r->logo) }} " style="width: 70%" />
                <figcaption style="width: 90%">
                    <h3>
                        <small style="color: #fff; font-size: 50%">{{ $r->name_r }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                        <div align="left">
                        <li class="fa fa-facebook-f"><a href="{{ $r->facebook }}"></a></li>
                        <li class="fa fa-instagram"><a href="{{ $r->instagram }}"></a></li>
                        <li class="fa fa-twitter"><a href="{{ $r->twitter }}"></a></li>
                        <li class="fa fa-google-plus-circle"><a href="{{ $r->google }}"></a></li>
                        </div>
                    </h3>
                    <div>
                        <p>{{ $r->email_c }}</p>
                    </div>
                    <a href="#"></a>
                </figcaption>
            </figure>
            </div>
            {{--@endif--}}
        @endforeach

        {{--</div>--}}

    </div>
</div>
<!--CONTENIDO END-->

<!--FOOTER STAR -->

<footer class="footer">
    <div class="row col-md-12" id="leipel">
        <div class="col-md-3">
            <h1>
                <img src="{{asset('plugins/img/Logo-Leipel.png')}}" id="logo">
            </h1>
            <p class="text-left">
                Red social de entretenimiento: Cine, m&uacute;sica, lectura, radio y tv
            </p>
            <br/>
            <ul id="list">
                <li class="lista">
                    <i class="fa fa-map-marker text-info "></i>
                    &nbsp;&nbsp;&nbsp;Guayaquil, Ecuador
                </li>
                <li class="lista">
                    <i class="fa fa-phone text-info "></i>
                    &nbsp;&nbsp;+123 4567 987
                </li>
                <li class="lista">
                    <i class="fa fa-envelope-o text-info"></i>
                    info@leipel.com
                </li>
            </ul>
        </div>
        <div class="col-md-3" id="sobre">
            <h1>Sobre</h1>
            <ul class="pages">
                <li><a href="#">¿Que es Leipel?</a></li>
                <br>
                <li><a href="#">Terminos y condiciones</a></li>
                <br>
                <li><a href="#">Reg&iacute;strate</a></li>
                <br>
                <li><a href="#">Beneficios adicionales</a></li>
                <br>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="col-md-3" id="descubrir">
            <h1> Descubrir</h1>
            <ul class="list">
                <li><a href="#">Cine</a></li>
                <br>
                <li><a href="#">M&uacute;sica</a></li>
                <br>
                <li><a href="#">Lectura</a></li>
                <br>
                <li><a href="#">Radio</a></li>
                <br>
                <li><a href="#">Tv</a></li>
            </ul>
        </div>
        <div class="col-md-3" id="social">
            <h1>Social</h1>
            <ul id=>
                <li><a href="#">Youtube</a></li>
                <br>
                <li><a href="#">Facebook</a></li>
                <br>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>

    <div class="col-md-12 hidden-sm hidden-xs" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 40px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 105%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-4" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>
    <div class="col-sm-12 hidden-lg hidden-md hidden-xs" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 50px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 102%;
                                        margin-top: 1%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-6" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>
    <div class="col-xs-12 hidden-lg hidden-md hidden-sm" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 60px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 102%;
                                        margin-top: 5%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-6" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>


        {{--<div class="col-md-3 " id="opinion">--}}
            {{--<h1>Deja tu opini&oacute;n</h1>--}}
            {{--<form action="" method="post" role="form" class="form-horizontal" id="formOp">--}}
                {{--<div class="col-md-12 form-group">--}}
                    {{--<input type="text" name="name" class="form-control " id="name" placeholder="Nombre"--}}
                           {{--data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>--}}
                    {{--<div class="validation"></div>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 form-group">--}}
                    {{--<input type="email" class="form-control " name="email" id="email" placeholder="Correo"--}}
                           {{--data-rule="email" data-msg="Please enter a valid email"/>--}}
                    {{--<div class="validation"></div>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 form-group">--}}
                    {{--<input type="text" class="form-control " name="subject" id="subject"--}}
                           {{--placeholder="Asunto" data-rule="minlen:4"--}}
                           {{--data-msg="Please enter at least 8 chars of subject"/>--}}
                    {{--<div class="validation"></div>--}}
                {{--</div>--}}
                {{--<div class="col-md-12 form-group">--}}
                    {{--<textarea class="form-control " name="message" rows="4" data-rule="required"--}}
                              {{--data-msg="Please write something for us" placeholder="Mensaje"></textarea>--}}
                {{--</div>--}}
                {{--<div class="col-md-offset-7">--}}
                    {{--<a class="btn btn-info active" name="contact" style="background: #21a4de">Enviar</a>--}}
                {{--</div>--}}

            {{--</form>--}}
        {{--</div>--}}
    </div>
</footer>


<!--FOOTER END -->

<!-- Scripts -->

<!-- /.LOGIN STAR -->
<div class="modal fade login-register-form row" id="modal-login">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        {{--<div class="col-md-8 align-center">--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">&nbsp;</h4>
                <ul class="nav nav-tabs" id="tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#usuario">
                            Usuario
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#proveedor" i>
                            Proveedor
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">

                <div class="tab-content">

                    <div id="usuario" class="tab-pane fade in active">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Correo </label>--}}

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="{{ old('email') }}" required autofocus>
                                    <div id="emailMen" style="margin-top: 1%"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                     <div id="passwordMen" ></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="iniciar">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer" id="modal_footer">
                            <div class="text-center">
                                <a href="login/facebook" target="_blank" class="fa fa-facebook-square" style=" font-size: 32px"></a>
                                <a href="login/twitter" target="_blank" class="fa fa-twitter-square" style=" font-size: 32px"></a>
                                <a href="login/google" target="_blank" class="fa fa-google-plus-square" style=" font-size: 32px"></a>
                            </div>

                        </div>
                    </div>
                    <div id="proveedor" class="tab-pane fade">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                                {{--<label for="email" class="col-md-4 control-label">Correo </label>--}}

                                <div class="col-md-12">
                                    <input id="emailP" type="email" class="form-control" name="email"
                                           placeholder="correo" value="{{ old('email') }}" required autofocus>
                                    <div id="emailMenP" style="margin-top: 1%"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="passwordP" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                    <div id="passwordMenP" style="margin-top: 1%" ></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="iniciarP">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    {{--</div>--}}

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /.LOGIN END -->

<!-- /. REGISTRARSE STAR -->
<div class="modal fade login-register-form row" id="modal-register">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        {{--<div class="col-md-8 align-center">--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">&nbsp;</h4>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#new_usuario">
                            Usuario
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#new_proveedor">
                            Proveedor
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">

                <div class="tab-content">
                    {{--usuario--}}
                    <div id="new_usuario" class="tab-pane fade in active">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{--<label for="name" class="col-md-4 control-label">Nombre</label>--}}
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="Nombre" required="required" onkeypress="return controltagLet(event)">
                                    <div id="nameMen" style="margin-top: 1%"></div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Direccion de Correo</label>--}}

                                <div class="col-md-12">
                                    <input id="emailRU" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="Correo">
                                    <div id="emailMenRU" style="margin-top: 1%"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="passwordRU" type="password" class="form-control" name="password"
                                           placeholder="Contraseña">
                                    <div id="passwordMenRU" style="margin-top: 1%"></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="password_confirm" class="col-md-4 control-label">Confirmar--}}
                                {{--Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password_confirm" type="password" class="form-control"
                                           name="password_confirm" placeholder="Confirmar Contraseña">
                                    <div id="passwordCMenRU" style="margin-top: 1%"></div>
                                    @if ($errors->has('password_confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit"  class="btn btn-primary" id="registroRU">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Usuario--}}

                    {{--Solicitud de proveedor--}}
                    <div id="new_proveedor" class="tab-pane fade">
                        <form class="form-horizontal" method="POST" action="{{ url('ApplysSubmit') }}" id="formRP">
                            {{ csrf_field() }}
                            {{--@include('flash::message')--}}
                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-6 control-label">Nombre comercial:</label>--}}
                                <div class="col-md-12">

                                    <input id="com_name" type="text" class="form-control" name="com_name"
                                           required="required"
                                           placeholder="Nombre comercial" autofocus onkeypress="return controltagLet(event)">
                                    <div id="mensajeNombreComercial" style="margin-top: 1%"></div>
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('com_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-6 control-label">Nombre del contacto</label>--}}
                                <div class="col-md-12">
                                    <input id="contact_name" type="text" class="form-control" name="contact_name"
                                           required="required"
                                           placeholder="Nombre del contacto" onkeypress="return controltagLet(event)">
                                    <div id="mensajeNombreContacto" style="margin-top: 1%"></div>
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-12 control-label">Teléfono</label>--}}
                                <div class="col-md-12">

                                    <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}"
                                           required="required"
                                           placeholder="Teléfono" onkeypress="return controltagNum(event)">
                                    <div id="mensajeTelefono" style="margin-top: 1%"></div>
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tlf') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{--<label for="description" class="col-md-6 control-label">Descripción</label>--}}
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" id="description"
                                              required="required"
                                              placeholder="Descripción">
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="content_type" class="col-md-6 control-label">Tipo de contenido</label>--}}
                                <div class="col-md-12">
                                    <select class="form-control" name="content_type" id="content_type" required="required">
                                        <option value="">Seleccione el tipo contenido</option>
                                        <option value="Musica">Musica</option>
                                        <option value="Revistas">Revistas</option>
                                        <option value="Libros">Libros</option>
                                        <option value="Radios">Radios</option>
                                        <option value="TV">Televisoras</option>
                                        <option value="Peliculas">Peliculas</option>
                                        <option value="Series">Series</option>
                                    </select>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_type') }}</strong>
                                        </span>
                                    @endif
                                    <div id="subMenuMusica">
                                        <br>
                                        <select name="sub_desired" id="sub_desired1" class="form-control">
                                            <option value="Artista">Artista</option>
                                            <option value="Productora">Productora</option>
                                        </select>
                                    </div>
                                    <div id="subMenuLibro">
                                        <br>
                                        <select name="sub_desired" id="sub_desired2" class="form-control">
                                            <option value="Escritor">Escritor</option>
                                            <option value="Editorial">Editorial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="email" class="col-md-6 control-label">Correo</label>--}}
                                <div class="col-md-12">
                                    <input id="emailRP" type="email" class="form-control" name="email" required="required"
                                           placeholder="Correo">
                                    <div id="mensajeCorreo" style="margin-top: 1%"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" id="registroRP">
                                        Solicitar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Solicitud de proveedor--}}

                </div>

            </div>
            <div class="modal-footer" id="modal_footer">
                <div class="text-center">

                </div>

            </div>

        </div>
    {{--</div>--}}

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /. REGISTRARSE END -->


{{--<script src="/js/app.js"></script>--}}
<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.min.js') }}"></script>
{{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery-3.1.1.js') }}"></script>



<script type="text/javascript">
//---------------------------------------VALIDACIONES PARA REGISTRO DE USUARIO------------------------------------------
    //---------VALIDACION PARA SOLO INTRODUCIR LETRAS---------------
    function controltagLet(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
    //---------BLOQUEAR BOTON----------------------
    $(document).ready(function(){
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var password1 = $('#password_confirm').val().trim();

        if (email.length==0 || name.length ==0 || password.length == 0 || password1.length==0){
            $('#registroRU').attr('disabled',true);
        }
    });
    $(document).ready(function(){
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var password1 = $('#password_confirm').val().trim();

        if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0){
            $('#registroRU').attr('disabled',false);
        }
    });
    $(document).ready(function(){
        $('#name').keyup(function(evento){
            var name = $('#name').val().trim();
            console.log(name.length);
            if (name.length==0) {
                $('#nameMen').show();
                $('#nameMen').text('Campo obligatorio');
                $('#nameMen').css('color','red');
                $('#nameMen').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            if (name.length < 3) {
                $('#nameMen').show();
                $('#nameMen').text('Minimo 3 caracteres');
                $('#nameMen').css('color','red');
                $('#nameMen').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }else {
                $('#nameMen').hide();
                var email = $('#email').val().trim();
                var password = $('#password').val().trim();
                var password1 = $('#password_confirm').val().trim();
                if (email.length !=0 && password.length  != 0 && password1.length !=0)
                {
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    $(document).ready(function(){
        $('#emailRU').keyup(function(evento){
            var email = $('#emailRU').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#emailMenRU').show();
                $('#emailMenRU').text('Formato email incorrecto');
                $('#emailMenRU').css('color','red');
                $('#emailMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
                $('#registroRU').css('background-color','');

            }else{
                $('#emailMenRU').hide();
            }
        });
    });
     $(document).ready(function(){

        $('#passwordRU').keyup(function(evento){
            var password = $('#passwordRU').val().trim();

            if (password.length==0) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('El campo no debe estar vacio');
                $('#passwordMenRU').css('color','red');
                $('#passwordMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordMenRU').css('color','red');
                $('#passwordMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            else {
                $('#passwordMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var password1 = $('#password_confirm').val().trim();
                if (email.length !=0 && name.length  != 0 && password1.length !=0){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    $(document).ready(function(){

        $('#password_confirm').keyup(function(evento){
            var password = $('#password_confirm').val().trim();

            if (password.length==0) {
                $('#passwordCMenRU').show();
                $('#passwordCMenRU').text('El campo no debe estar vacio');
                $('#passwordCMenRU').css('color','red');
                $('#passwordCMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            } else {
                $('#passwordMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#emailRU').val().trim();
                var password1 = $('#passwordRU').val().trim();

                if (email.length !=0 && name.length  != 0 && password1.length !=0){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    $(document).ready(function(){

        $('#password_confirm').keyup(function(evento){
            var password1 = $('#passwordRU').val();
            var password = $('#password_confirm').val();

            if (password != password1) {
                 $('#passwordCMenRU').show();
                $('#passwordCMenRU').text('Ambas contraseña deben coincidir');
                $('#passwordCMenRU').css('color','red');
                $('#passwordCMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            } else {
                $('#passwordCMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#emailRU').val().trim();


                if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });

//------------------------------------------------------------------------------------------------------------
</script>

{{--registrar proveedor star--}}
{{--<script src="{{asset('assets/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/bubbles/movingbubbles.js') }}" type="text/javascript"></script>--}}
<script>
    //---------------------------------------------------------------------------------------------------

    // funcion para mostrar el submenu de los modulos de libro y de musica
    $(document).ready(function () {
        $('#subMenuMusica').hide();
        $('#subMenuLibro').hide();
        $('#content_type').on('change', function () {
            if (this.value == 'Musica') {
                $('#subMenuLibro').hide();
                $('#subMenuMusica').show();
                $('#subMenuMusica').attr('required','required');
            } else if (this.value == 'Libros') {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').show();
                $('#subMenuLibro').attr('required','required');
            } else {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').hide();
            }
        });
    })
    // funcion para mostrar el submenu de los modulos de libro y de musica
    //---------------------------------------------------------------------------------------------------
    // Función que nos va a contar el número de caracteres
    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#com_name').keyup(function (evento) {
            var nombreComercial = $('#com_name').val();
            numeroPalabras = nombreComercial.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeNombreComercial').show();
                $('#mensajeNombreComercial').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeNombreComercial').css('color', 'red');
                $('#mensajeNombreComercial').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            } if (numeroPalabras < 3){
                $('#mensajeNombreComercial').show();
                $('#mensajeNombreComercial').text('Minimo 3 caracteres');
                $('#mensajeNombreComercial').css('color', 'red');
                $('#mensajeNombreComercial').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            else {
                $('#mensajeNombreComercial').hide();
                var email = $('#emailRP').val().trim();
                var name = $('#contact_name').val().trim();
                var tlf = $('#tlf').val();
                if (email.length !=0 || name.length !=0 || tlf.length !=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });
    $(document).ready(function(){
        var nameC = $('#com_name').val().trim();
        var email = $('#emailRP').val().trim();
        var name = $('#contact_name').val().trim();
        var tlf = $('#tlf').val();

        if (email.length==0 || name.length ==0 || nameC.length == 0 || tlf.length==0){
            $('#registroRP').attr('disabled',true);
        }
    });
    $(document).ready(function(){
        var nameC = $('#com_name').val().trim();
        var email = $('#emailRP').val().trim();
        var name = $('#contact_name').val().trim();
        var tlf = $('#tlf').val();

        if (email.length !=0 && name.length  != 0 && nameC.length !=0 && tlf.length !=0){
            $('#registroRP').attr('disabled',false);
        }
    });
    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#contact_name').keyup(function (evento) {
            var nombreCotacto = $('#contact_name').val();
            numeroPalabras = nombreCotacto.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeNombreContacto').show();
                $('#mensajeNombreContacto').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeNombreContacto').css('color', 'red');
                $('#mensajeNombreContacto').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            if (numeroPalabras < 3) {
                $('#mensajeNombreContacto').show();
                $('#mensajeNombreContacto').text('Minimo 3 caracteres');
                $('#mensajeNombreContacto').css('color', 'red');
                $('#mensajeNombreContacto').css('font-size','60%');
                $('#registroRP').attr('disabled', true);

            } else {
                $('#mensajeNombreContacto').hide();
                var nameC = $('#com_name').val().trim();
                var email = $('#emailRP').val().trim();
                var tlf = $('#tlf').val();
                if (email.length!=0 && nameC.length !=0 && tlf.length!=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });

    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#tlf').keyup(function (evento) {
            var telefono = $('#tlf').val();
            numeroPalabras = telefono.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeTelefono').css('color', 'red');
                $('#mensajeTelefono').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            if (numeroPalabras < 9) {
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('Minimo 9 numeros');
                $('#mensajeTelefono').css('color', 'red');
                $('#mensajeTelefono').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            else {
                $('#mensajeTelefono').hide();
                var nameC = $('#com_name').val().trim();
                var email = $('#emailRP').val().trim();
                var name = $('#contact_name').val().trim();
                if (email.length!=0 || nameC.length !=0 || name.length!=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });
    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
$(document).ready(function(){
        $('#emailRP').keyup(function(evento){
            var email = $('#emailRP').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#mensajeCorreo').show();
                $('#mensajeCorreo').text('Formato email incorrecto');
                $('#mensajeCorreo').css('color','red');
                $('#mensajeCorreo').css('font-size','60%');
                $('#registroRP').attr('disabled',true);
                $('#registroRP').css('background-color','');

            }else{
                $('#mensajeCorreo').hide();
            }
        });
    });


    // Funcion para validar el correo
    //---------------------------------------------------------------------------------------------------

</script>
{{--registrar proveedor end--}}
{{--validaciones --}}

{{--CONFIG DEL SLIDER STAR--}}
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script>"use strict";

    var $slides = undefined,
        interval = undefined,
        $selectors = undefined,
        $btns = undefined,
        currentIndex = undefined,
        nextIndex = undefined;

    var cycle = function cycle(index) {
        var $currentSlide = undefined,
            $nextSlide = undefined,
            $currentSelector = undefined,
            $nextSelector = undefined;

        nextIndex = index !== undefined ? index : nextIndex;

        $currentSlide = $($slides.get(currentIndex));
        $currentSelector = $($selectors.get(currentIndex));

        $nextSlide = $($slides.get(nextIndex));
        $nextSelector = $($selectors.get(nextIndex));

        $currentSlide.removeClass("active").css("z-index", "0");

        $nextSlide.addClass("active").css("z-index", "1");

        $currentSelector.removeClass("current");
        $nextSelector.addClass("current");

        currentIndex = index !== undefined ? nextIndex : currentIndex < $slides.length - 1 ? currentIndex + 1 : 0;

        nextIndex = currentIndex + 1 < $slides.length ? currentIndex + 1 : 0;
    };

    $(function () {
        currentIndex = 0;
        nextIndex = 1;

        $slides = $(".slide");
        $selectors = $(".selector");
        $btns = $(".btn");

        $slides.first().addClass("active");
        $selectors.first().addClass("current");

        interval = window.setInterval(cycle, 6000);

        $selectors.on("click", function (e) {
            var target = $selectors.index(e.target);
            if (target !== currentIndex) {
                window.clearInterval(interval);
                cycle(target);
                interval = window.setInterval(cycle, 6000);
            }
        });

        $btns.on("click", function (e) {
            window.clearInterval(interval);
            if ($(e.target).hasClass("prev")) {
                var target = currentIndex > 0 ? currentIndex - 1 : $slides.length - 1;
                cycle(target);
            } else if ($(e.target).hasClass("next")) {
                cycle();
            }
            interval = window.setInterval(cycle, 6000);
        });
    });
    //# sourceURL=pen.js
</script>
{{--CONFIG DEL SLIDER END--}}


<script>

    /* Demo purposes only */

    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );

</script>

@if (count($errors) > 0)
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>

        $(document).ready(function(){

            //var usuario = $('#usuario').attr('href');

            $('#modal-login').modal('show');



            // $('[href="#'+id+'"]').tab('show');


            // #usuario
            // #proveedor


        });
    </script>
@endif
<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function(){

        // $('#proOculto').html('<input type="hidden" id="usuarioP" value="#proveedor">');
        // $('#usuOcul').html('<input type="hidden" id="usuarioU" value="" >');
        $('.nav-tabs a').on('show.bs.tab',function (e){
            localStorage.setItem('activeTab',$(e.target).attr('href'));
            console.log('hola');
        });
        var activeTab = localStorage.getItem('activeTab');
            console.log(activeTab);

    });

</script>


<script type="text/javascript">
//-------------------------------VALIDACIONES PARA EL LOGIN DE USUARIO---------------------------------
    //---------BLOQUEAR BOTON----------------------
    $(document).ready(function(){
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();

        if (email.length==0 || password.length ==0){
            $('#iniciar').attr('disabled',true);
        }
    });

    //---------VALIDACION PARA QUE EL CAMPO EMAIL NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#email').keyup(function(evento){
            var email = $('#email').val().trim();

            if (email.length==0) {
                $('#emailMen').show();
                $('#emailMen').text('El campo no debe estar vacio');
                $('#emailMen').css('color','red');
                $('#emailMen').css('font-size','60%');
                $('#iniciar').attr('disabled',true);
                $('#iniciar').css('background-color','')
                }else {
                $('#emailMen').hide();
                }
                var password = $('#password').val().trim();

                if (email.length !=0 && password.length !=0){
                    $('#iniciar').attr('disabled',false);
                }
        });
    });
    //---------VALIDACION DE FORMATO DE CORREO-----------------------------------
    $(document).ready(function(){
        $('#email').keyup(function(evento){
            var email = $('#email').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#emailMen').show();
                $('#emailMen').text('Formato email incorrecto');
                $('#emailMen').css('color','red');
                $('#emailMen').css('font-size','60%');
                $('#iniciar').attr('disabled',true);
                $('#iniciar').css('background-color','')

            }else{

                return true;
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#password').keyup(function(evento){
            var password = $('#password').val().trim();

            if (password.length==0) {
                $('#passwordMen').show();
                $('#passwordMen').text('El campo no debe estar vacio');
                $('#passwordMen').css('color','red');
                $('#passwordMen').css('font-size','60%');
                $('#iniciar').attr('disabled',true);
            } else {
                $('#emailMen').hide();
                $('#iniciar').attr('disabled',false);
            }
            var email = $('#email').val().trim();
            if (email.length !=0 && password.length !=0){
                $('#iniciar').attr('disabled',false);
            }
        });
    });
//------------------------------------------------------------------------------------------------------
//-------------------------------------VALICACIONES LOGIN PROMOTOR--------------------------------------
  //---------BLOQUEAR BOTON----------------------
    $(document).ready(function(){
        var email = $('#emailP').val().trim();
        var password = $('#passwordP').val().trim();

        if (email.length==0 || password.length ==0){
            $('#iniciarP').attr('disabled',true);
        }
    });

    //---------VALIDACION PARA QUE EL CAMPO EMAIL NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#emailP').keyup(function(evento){
            var email = $('#emailP').val().trim();

            if (email.length==0) {
                $('#emailMenP').show();
                $('#emailMenP').text('El campo no debe estar vacio');
                $('#emailMenP').css('color','red');
                $('#emailMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
                $('#iniciarP').css('background-color','')
                }else {
                $('#emailMenP').hide();
                }
                var password = $('#passwordP').val().trim();

                if (email.length !=0 && password.length !=0){
                    $('#iniciarP').attr('disabled',false);
                }
        });
    });
        //---------VALIDACION DE FORMATO DE CORREO-----------------------------------
    $(document).ready(function(){
        $('#emailP').keyup(function(evento){
            var email = $('#emailP').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#emailMenP').show();
                $('#emailMenP').text('Formato email incorrecto');
                $('#emailMenP').css('color','red');
                $('#emailMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
                $('#iniciarP').css('background-color','')

            }else{

                return true;
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#passwordP').keyup(function(evento){
            var password = $('#passwordP').val().trim();

            if (password.length==0) {
                $('#passwordMenP').show();
                $('#passwordMenP').text('El campo no debe estar vacio');
                $('#passwordMenP').css('color','red');
                $('#passwordMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
            } else {
                $('#emailMenP').hide();
                $('#iniciarP').attr('disabled',false);
            }
            var email = $('#emailP').val().trim();
            if (email.length !=0 && password.length !=0){
                $('#iniciarP').attr('disabled',false);
            }
        });
    });
//------------------------------------------------------------------------------------------------------
</script>
</body>
</html>