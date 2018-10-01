<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    {{--    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('plugins/index/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/index/css/content1.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">

    <!-- Scripts
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script> -->


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
                @if (Auth::guest())
                    <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">INICIAR SESION</a></li>
                    <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register">REGRISTRATE</a></li>
                @endif              
            </ul>
        </div>
    </div>
</nav>


<div class="col-md-12 col-sm-12 ">
              <div  style="margin-left: 5%; margin-right: 5%" class="text-center ">
              
            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <br>
                    <h2><span style="color: #23b5e6" class="card-title">¿QUÉ ES LEIPEL?</span></h2>      
                </div>
                    <div class="row">
                        <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                            <div class="paragraph">
                                <br>
                                <p class="text-center text-justify">Leipel es una red socia de entretenimiento que abarca: Cine, mùsica, lectura, radio y Tv.</p>
                            </div>
                        </div>
                    </div> 
            </div> 
                        
            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <h4><span style="color: #23b5e6" class="card-title">¿QUÉ SON LO TICKETS Y PARA QUE SIRVEN?</span></h4>
                </div>
                <div class="row">
                    <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                        <div class="paragraph">
                            <br>
                            <p class="text-center text-justify">Los ticket son la moneda interna de Leipel, con ellos pordrás adquirir los contenidos que no sean gratis dentro de Leipel. Si se te acaban, siempre puedes comprar más.</p>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <h4><span style="color: #23b5e6" class="card-title">¿QUÈ SON LOS PUNTOS Y PARA QUÉ SIRVEN?</span></h4>     
                </div>
                <div class="row">
                    <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                        <div class="paragraph">
                            <br>
                            <p class="text-center text-justify">En Leipel tenemos una manera de agradecerte por ayudarnos a llegar a más personas, a cambio de esto te regalamos puntos leipel, los cuales vas a poder canjear por viajes, más tickets y otros beneficios.</p>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <h4><span style="color: #23b5e6" class="card-title">¿POR QUÈ POR EL PAGO NO TENGO TODO GRATIS?</span></h4>      
                </div>
                <div class="row">
                    <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                        <div class="paragraph">
                            <br>
                            <p class="text-center text-justify">Es fácil, nosotros colaboramos para que los autores ganen más dinero entre más se vende su obra. Actualmente en muchas páginas esto no pasa, simplemente les dan un valor pequeño se venda o no, con Leipel el autor depende de su gran talento para que su contenido se haga viral y así poder ganar como siempre han querido. Y como a fin de cuenta, los que compramos ya estamos mal acostumbrados a que nos regalen todo por internet, es por esto que Leipel da puntos para que te puedas llevar viajes y otros beneficios GRATIS.</p>
                        </div>
                    </div>
                </div>
            </div> 


            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <h4><span style="color: #23b5e6" class="card-title">¿CÓMO GANO PUNTOS?</span></h4>      
                </div>
                <div class="row">
                    <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                        <div class="paragraph">
                            <br>
                            <p class="text-center text-justify">Fácil, invita a todo los que puedas y diles que hagan lo mismo, ganarás un punto por cada cliente activo dentro del mes presente. 
                            <br>
                            *Cliente activo es aquel usuario que compró mínimo un paquete de tickets.
                            <br> 
                            *Se ganan tickets desde el primer hasta el tercer nivel de referidos. 
                            <br>
                            *Se pueden ganar máximo 1000 puntos en el mes, y si, puedes acumularlos.</p>
                        </div>
                    </div>
                </div>
            </div> 


            <div class="col-md-12 col-sm-12 mb" style="margin-left: 2%">
                <div class="white-panel">
                    <br>
                    <h4><span style="color: #23b5e6" class="card-title">¿CON QUÉ CANJEO LOS PUNTOS?</span></h4>      
                </div>
                <div class="row">
                    <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                        <div class="paragraph">
                            <br>
                            <p class="text-center text-justify">Por lo general con viajes, sin embargo habràn màs sorpresas. Una vez hayas acumulado los puntos necesarios para lo que deseas, deberàs enviarnos un mail con título CANJE DE PUNTOS a info@leipel.com y en el mail nos escribes tu nombre de usuario y número de cédula, recueda indicarnos en qué vas a canjear los puntos.</p>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>


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
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#usuario">
                            Usuario
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#proveedor">
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
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary form-control">
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

                                <a href="login/facebook" class="btn btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="login/twitter" class="btn btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="login/google" class="btn btn-google" style="font-size: 10px">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div id="proveedor" class="tab-pane fade">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Correo </label>--}}

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="{{ old('email') }}" required autofocus>
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
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary form-control">
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

s            </div>

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
                                           value="{{ old('name') }}" placeholder="Nombre">

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
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="Correo">

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
                                           placeholder="Contraseña">

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

                                    @if ($errors->has('password_confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" id="submit" class="btn btn-primary">
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
                                    <div id="mensajeNombreComercial"></div>
                                    <input id="com_name" type="text" class="form-control" name="com_name"
                                           required="required"
                                           placeholder="Nombre comercial" autofocus>
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
                                    <div id="mensajeNombreContacto"></div>
                                    <input id="contact_name" type="text" class="form-control" name="contact_name"
                                           required="required"
                                           placeholder="Nombre del contacto">
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
                                    <div id="mensajeTelefono"></div>
                                    <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}"
                                           required="required"
                                           placeholder="Teléfono">
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
                                    <select class="form-control" name="content_type" id="content_type">
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
                                        <select name="sub_desired" id="sub_desired" class="form-control">
                                            <option value="Artista">Artista</option>
                                            <option value="Productora">Productora</option>
                                        </select>
                                    </div>
                                    <div id="subMenuLibro">
                                        <br>
                                        <select name="sub_desired" id="sub_desired" class="form-control">
                                            <option value="Escritor">Escritor</option>
                                            <option value="Editorial">Editorial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="email" class="col-md-6 control-label">Correo</label>--}}
                                <div class="col-md-12">
                                    <div id="mensajeCorreo"></div>
                                    <input id="email" type="email" class="form-control" name="email" required="required"
                                           placeholder="Correo">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
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

{{--CONFIG DEL SLIDER STAR--}}

{{--validaciones --}}
{{--registrar usuario star--}}
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>
<script>
    $(document).ready(function () {

        $.mockjax({
            url: "emails.action",
            response: function (settings) {
                var email = settings.data.email, //original del archivo no cambiar
                    emails = ["glen@marketo.com", "george@bush.gov", "me@god.com", "aboutface@cooper.com", "steam@valve.com", "bill@gates.com"];
                // emails = mys;
                this.responseText = "true";
                if ($.inArray(email, emails) !== -1) {
                    this.responseText = "false";
                }
            },
            responseTime: 500
        });


        $("#formR").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                    remote: "emails.action"
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
            },

            messages: {
                name: {
                    required: " Ingresar su nombre",
                    minlength: "Su nombre debe tener minimo 2 caracteres"
                },
                password: {
                    required: "Ingresar clave",
                    minlength: "Debe tener minim 5 caracteres"
                },
                password_confirm: {
                    required: "Ingresar contraseña",
                    minlength: "Debe tener minimo 5 caracteres",
                    equalTo: "Ingrese la misma contraseña"
                },
                email: {
                    required: "Ingresar un correo valido",
                    minlength: "debe tener mas caracteres",
                    remote: ("Ya se ha registrado")
                }
            },

            errorElement: "em",
            errorPlacement: function (error, element) {
                error.addClass("help-block");

                element.parents(".col-md-6").addClass("has-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }

                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span> ").insertAfter(element);
                }
            },

            success: function (label, element) {
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                }
            },

            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-md-6").addClass("has-error").removeClass("has-success");
                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },

            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-md-6").addClass("has-success").removeClass("has-error");
                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            }

        })


    })
</script>
{{--registrar usuario end--}}

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
            } else if (this.value == 'Libros') {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').show();
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeNombreComercial').hide();
                $('#solicitar').attr('disabled', false);
            }
        });
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeNombreContacto').hide();
                $('#solicitar').attr('disabled', false);
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeTelefono').hide();
                $('#solicitar').attr('disabled', false);
            }
        });
    });
    // Función que nos va a contar el número de caracteres
    //---------------------------------------------------------------------------------------------------
    // Funcion de solo numero
    $(document).ready(function () {
        $("#tlf").keypress(function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('Solo números');
                $('#mensajeTelefono').css('color', 'red');
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeTelefono').hide();
                $('#solicitar').attr('disabled', false);
            }
        });
    });
    // Funcion de solo numero
    //---------------------------------------------------------------------------------------------------
    // Funcion para validar el correo
    $(document).ready(function () {
        $('#solicitar').click(function () {
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
            if (regex.test($('#email').val().trim())) {
                $("#form").submit();
            } else {
                $('#mensajeCorreo').show();
                $('#mensajeCorreo').text('El correo introducido no es valido');
                $('#mensajeCorreo').css('color', 'red');
                event.preventDefault();
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

</body>
</html>