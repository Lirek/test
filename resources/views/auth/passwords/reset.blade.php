<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.theme.default.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics Breiddy Monterrey-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665289-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-126665289-1');

    </script>
</head>
<style type="text/css">
    div.error {
      color: red;
      padding: 0;
      font-size: 0.9em;
    }

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }

    /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }


    /*slider tv*/
    .card-image.img
    {
        height:150px; !important
    }

    .material-icons.md1::before{
        content:"search";
    }

    .material-icons.md1:hover::before{
        content:"navigate_next";
    }

    .carousel .carousel-item {
        width:300px !important;
    }
</style>
<!--Menu-->
<nav class="default_color" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img class= "img"src="https://leipel.com/plugins/img/Logo-Leipel.png" width="120px;" height="50px;" title="Logo de Leipel"></a>
        <ul class="right hide-on-med-and-down">
<!--             <li><a class="blue-text" href="{{route('queEsLeipel')}}"><b>¿Qué es leipel?</b></a></li>
 -->            @if(Auth::guard('web_seller')->user())
                @if (Auth::guard('web_seller')->user()->logo)
                    <li>
                        <a href="{{ url('/seller_home')}}" data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::guard('web_seller')->user()->logo)}}"  class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}"  data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif(Auth::user())

                @if(Auth::user()->img_perf)
                    <li>
                        <a href="{{ url('/home')}}"  data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::user()->img_perf)}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}" data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif (Auth::guest())
                <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
                <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="sidenav">
<!--             <li><a class="blue-text" href="#"><b>¿Qué es Leipel<leipelsad></leipelsad>?</b></a></li>
 -->            @if(Auth::guard('web_seller')->user())
                @if (Auth::guard('web_seller')->user()->logo)
                    <li>
                        <a href="{{ url('/seller_home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::guard('web_seller')->user()->logo)}}" class="img circle" width="40" height="40">
                            <b> Ingresar</b>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif(Auth::user())

                @if(Auth::user()->img_perf)
                    <li>
                        <a href="{{ url('/home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img  src="{{asset(Auth::user()->img_perf)}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}"  data-position="right"  class="tooltipped" data-tooltip="Ingresar" >
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif (Auth::guest())
                <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
                <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
            @endif
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="blue-text material-icons">menu</i></a>
    </div>
</nav>
<!--Fin Menu-->
<br><br>
<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card-panel curva">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        <h5 class="center">
            <b class="blue-text">Restaurar contraseña </b>
        </h5><br>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}" id="change">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12  {{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="material-icons prefix blue-text">email</i>
                    <input id="verEmail" type="email" class="form-control" name="email" value="{{ old('email', $email) }}" readonly="true" autofocus >
                    <label for="autocomplete-input">Correo</label>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-field col s12  {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="material-icons prefix blue-text">vpn_key</i>
                    <input id="password-valid" type="password" class="form-control" name="password" required>
                    <label for="autocomplete-input">Contraseña</label>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-field col s12  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <i class="material-icons prefix blue-text">vpn_key</i>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    <label for="autocomplete-input">Confirmar Contraseña</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-field col s12 center">
                    <button class="btn curvaBoton waves-effect waves-light green" type="submit" id="password-change" >Enviar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
{{--Pie de pagina--}}
<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l3 s12">
                <h5 class="white-text">Leipel</h5>
                <p class="grey-text text-lighten-4">Red social de entretenimiento: Cine, música, lectura, radio y tv</p>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">place</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        Guayaquil, Ecuador
                    </div>
                </div>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        info@leipel.com
                    </div>
                </div>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Sobre</h5>
                <ul>
                    <li><a class="white-text" href="{{route('queEsLeipel')}}">¿Qué es Leipel?</a></li>
                    <li><a class="white-text" href="{{route('terminosCondiciones')}}">Términos y Condiciones</a></li>
                    <li><a class="white-text modal-trigger" href="#modal2">Regístrate</a></li>
                    <!-- <li><a class="white-text" href="#!">Beneficios adicionales</a></li>
                    <li><a class="white-text" href="#!">Contactos</a></li> -->
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Descubrir</h5>
                <ul>
                    <li><a class="white-text modal-trigger" href="#modal1">Cine</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Música</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Lectura</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Radio</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">TV</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                    <li><a class="curvaBoton waves-effect waves-light btn red left" target="_blank" href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q">
                            <i class="fa fa-youtube"></i> &nbsp;YouTube&nbsp;&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    <li><a class="curvaBoton waves-effect waves-light btn   blue darken-4 left" target="_blank" href="https://www.facebook.com/LEIPELoficial/">
                            <i class="fa fa-facebook"></i> &nbsp;Facebook&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    {{--<li><a class="waves-effect waves-light btn purple darken-4 left">--}}
                    {{--<i class="fa fa-instagram"></i> &nbsp;Instagram</a><br>&nbsp;</li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2018 Todos lo derechos reservados
        </div>
    </div>
</footer>
<!--Modales para index -->
<!--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

<!-- Modal inicio de sesion -->
<div id="modal1" class="modal">
    <div class="modal-content center blue-text">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6">
                        <a href="#usuario"><i class="material-icons prefix">face</i><b> Usuario</b></a>
                    </li>
                    <li class="tab col s6">
                        <a href="#proveedor"><i class="material-icons prefix">store</i><b> Proveedor</b></a>
                    </li>

                </ul>
            </div>
        </div>

        {{--Modal innicio de sesion usuario--}}
        <div id="usuario" class="col s12 center">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="text" id="email" name="email" class="autocomplete" value="{{ old('email') }}" required autofocus>
                        <label  for="email">Correo</label>
                        <div id="emailMen" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong class="red-text">{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input id="password" type="password" name="password" class="autocomplete" value="{{ old('password') }}" required autofocus>
                        <label for="password">Contraseña</label>
                        <div id="passwordMen" ></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="input-field col s12">

                        <button class="btn curvaBoton waves-effect waves-light green" id="iniciar" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="{{ url('/password/reset') }}">
                            Olvide mi contraseña
                        </a>
                    </div>
                    <div class="input-field col s6">
                        <a class="curvaBoton waves-effect waves-light btn social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                        </a>
                    </div>
                    <div class="input-field col s6">
                        <a class="curvaBoton waves-effect waves-light btn blue darken-4 social facebook left" href="login/facebook">
                            <i class="fa fa-facebook"></i> Facebook</a><br>
                    </div>
                    <div class="col s12 center">Inicio de sesión con redes sociales</div>
                </div>
            </form>
        </div>
        {{--Modal inicio de sesion proveedor--}}
        <div id="proveedor" class="col s12 center">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="text" id="emailP" name="email" class="autocomplete" value="{{ old('email') }}" required autofocus>
                        <label for="emailP">Correo</label>
                        <div id="emailMenP" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block red-text" >
                                            <strong >{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" id="passwordP" class="autocomplete" name="password" required>
                        <label for="passwordP">Contraseña</label>
                        <div id="passwordMenP" style="margin-top: 1%" ></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                            <strong class="text-red">{{ $errors->first('password') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <button class="btn curvaBoton waves-effect waves-light green" id="iniciarP" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="#">Olvide mi contraseña </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!--Fin modal inicio de sesnion-->

<!-- Modal Registro -->
<div id="modal2" class="modal">
    <div class="modal-content center blue-text">
        <div class="row">
            <ul class="tabs">
                <li class="tab col s6"><a href="#usuario1" class="active"><i class="material-icons prefix">face</i><b> Usuario</b></a></li>
                <li class="tab col s6"><a href="#proveedor1"><i class="material-icons prefix">store</i><b> Proveedor</b></a></li>
            </ul>
        </div>
        {{--registro usuario--}}
        <div id="usuario1" class="col s12 center">
            <div class="row">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                    {{ csrf_field() }}
                    <input type="hidden" id="enlace" name="enlace">
                    <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">face</i>
                        <input type="text" class="autocomplete" name="name" id="name" value="{{ old('name') }}" required="required">
                        <label for="name">Nombre</label>
                        <div id="nameMen" style="margin-top: 1%"></div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRU" name="email" class="autocomplete" required="required">
                        <label for="emailRU">Correo</label>
                        <div id="emailMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password" id="passwordRU" class="autocomplete" required="required">
                        <label for="passwordRU">Contraseña</label>
                        <div id="passwordMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password_confirm" id="password_confirm" class="autocomplete" required="required">
                        <label for="password_confirm">Repetir Contraseña</label>
                        <div id="passwordCMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password_confirm'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="terminosCondiciones" checked="checked" required="required" id="terminosCondiciones">
                            <span>He leído y acepto los </span> <a href="{{route('terminosCondiciones')}}" target="_blank">Términos y Condiciones</a>.
                        </label>
                    </div>

                    <div class="input-field col s12">
                        <button class="btn curvaBoton waves-effect waves-light green" id="registroRU" type="submit" name="action">Registrarse
                            <i class="material-icons right">send</i>
                        </button><br>
                    </div>
                    <div class="input-field col s6">
                        <a class="curvaBoton waves-effect waves-light btn social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                    </div>
                    <div class="input-field col s6">
                        <a class="curvaBoton waves-effect waves-light btn blue darken-4 social facebook left" href="login/facebook">
                            <i class="fa fa-facebook"></i> Facebook</a><br>
                    </div>
                    <div class="col s12 center">Inicio de sesión con redes sociales</div>
                </form>
            </div>
        </div>
        {{--registro proveedor--}}
        <div id="proveedor1" class="col s12 center">
            <form class="form-horizontal" id="formRP">
                {{ csrf_field() }}
                @include('flash::message')
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">store</i>
                        <input name="com_name" id="com_name"type="text" id="autocomplete-input10" class="autocomplete" required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+">
                        <label for="com_name">Nombre comercial</label>
                        <div id="mensajeNombreComercial" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('com_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">person</i>
                        <input type="text" id="contact_name" class="autocomplete" name="contact_name"
                               required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+">
                        <label for="contact_name">Nombre de contacto</label>
                        <div id="mensajeNombreContacto" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">phone</i>
                        <input type="text"  id="tlf" name="tlf"  value="{{ old('tlf') }}" required="required" class="autocomplete" onkeypress="return controltagNum(event)" pattern="[0-9]+">
                        <label for="tlf">Teléfono</label>
                        <div id="mensajeTelefono" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('tlf') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('description') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">assignment</i>
                        <input type="text" id="description" name="description" required="required" class="autocomplete">
                        <label for="description-input14">Descripción</label>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRP" name="email" required="required" class="autocomplete" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        <label for="autocomplete-input9">Correo</label>
                        <div id="mensajeCorreo" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col s11 right">
                        <select name="content_type" id="content_type" required="required">
                            <option value="" disabled selected>Tipo de contenido</option>
                            <option value="Cine">Cine</option>
                            <option value="Musica">Música</option>
                            <option value="Libros">Lectura</option>
                            <option value="Radio">Radio</option>
                            <option value="Tv">Tv</option>
                        </select>
                    </div>
                    <div class="col s11 right" id="subMenuMusica">
                        <br>
                        <select name="sub_desired_musica" id="sub_desired1" class="form-control">
                            <option value="Artista">Artista</option>
                            <option value="Productora">Productora</option>
                        </select>
                    </div>
                    <div class="col s11 right" id="subMenuLibro">
                        <br>
                        <select name="sub_desired_libros" id="sub_desired2" class="form-control">
                            <option value="Escritor">Escritor</option>
                            <option value="Editorial">Editorial</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn curvaBoton waves-effect waves-light green" id="registroRP" type="submit" >Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<!--Fin modal inicio de registro-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
<script src="{{asset('js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function() {
                var pathname = window.location.pathname;
                separador = "/";
                urlSeparada = pathname.split(separador).pop();
                console.log(urlSeparada);
                $("#verEmail").val(urlSeparada);
                //console.log($("#verEmail"));
        });

    </script>
    <script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });


        /*==========  Featured Cars  ==========*/
        $('#featured-cars').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
        $('#featured').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        $('#featured-cars-three').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        $('#featured1').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        //Mostarar contenidos seleccionados
        $('#radio').css("background-color","#42a5f5");
        $('#Tvs').hide();
        $('#peliculas').hide();
        $('#libros').hide();

        $('#radio').click(function(){
            $('#radio').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#tv').css("background-color","#2196F3");
            $('#Tvs').hide();
            $('#libros').hide();
            $('#radios').show();
        });

        $('#tv').click(function(){
            $('#tv').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#radio').css("background-color","#2196F3");
            $('#radios').hide();
            $('#libros').hide();
            $('#Tvs').show();
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){

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

        var password = $('#password-valid').val();
        $("#change").validate({

            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password-valid"
                },
            },

            messages: {
                password: {
                    required: "Ingresar clave",
                    minlength: "Debe tener minimo 6 caracteres"
                },
                password_confirmation: {
                    required: "Ingresar contraseña",
                    minlength: "Debe tener minimo 6 caracteres",
                    equalTo: "Las contraseña deben coincidir"
                },
            },

            errorElement : 'div',
        errorPlacement: function(error, element) {
            console.log(error)
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
            $('#password-change').attr('disabled', true);
          }
        },
        success: function(element) {
            $('#password-change').attr('disabled', false);
        }

        })

    });
    </script>
<script type="text/javascript">

    // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });


        /*==========  Featured Cars  ==========*/
        $('#featured-cars').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
        $('#featured').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        $('#featured-cars-three').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        $('#featured1').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        //Mostarar contenidos seleccionados
        $('#radio').css("background-color","#42a5f5");
        $('#Tvs').hide();
        $('#peliculas').hide();
        $('#libros').hide();

        $('#radio').click(function(){
            $('#radio').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#tv').css("background-color","#2196F3");
            $('#Tvs').hide();
            $('#libros').hide();
            $('#radios').show();
        });

        $('#tv').click(function(){
            $('#tv').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#radio').css("background-color","#2196F3");
            $('#radios').hide();
            $('#libros').hide();
            $('#Tvs').show();
        });

//        $('#libro').click(function(){
//            $('#libro').css("background-color","#42a5f5");
//            $('#cine').css("background-color","#2196F3");
//            $('#musica').css("background-color","#2196F3");
//            $('#tv').css("background-color","#2196F3");
//            $('#radio').css("background-color","#2196F3");
//            $('#radios').hide();
//            $('#Tvs').hide();
//            $('#libros').show();
//        });


        jQuery.validator.addMethod("lettersonly", function(value, element, param) {
            return value.match(new RegExp("." + param + "$"));
        });

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


        $("#formR1").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 2,
                    lettersonly: "[a-zA-Z]+"
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "{{url ('RegisterEmail')}}",
                        type:"POST",
                        data:{
                            _token: $('input[name=_token]').val(),
                            'email': function(){ return $('#email').val();}
                        }

                    }
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirm: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
            },

            messages: {
                name: {
                    required: " Ingresar su nombre",
                    minlength: "Su nombre debe tener minimo 2 caracteres",
                    lettersonly:'Solo debe ingresar letras'
                },
                password: {
                    required: "Ingresar clave",
                    minlength: "Debe tener minimo 6 caracteres"
                },
                password_confirm: {
                    required: "Ingresar contraseña",
                    minlength: "Debe tener minimo 6 caracteres",
                    equalTo: "Las contraseña deben coincidir"
                },
                email: {
                    required: "Ingresar un correo valido",
                    email: "Formato de correo invalido",
                    remote: ("Email ya se encuentra registrado")
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
                    $("<span class='glyphicon glyphicon-remove form-control-feedback red-text'></span> ").insertAfter(element);
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

    //---------------------Validacion registros----------------------------------
    $("#emailRP").on('keyup change',function(){
        var email_data = $("#emailRP").val();
        $.ajax({
            url: 'RegisterEmailSeller',
            type: 'POST',
            data:{
                _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                if (result == 1)
                {
                    $('#mensajeCorreo').hide();
                    $('#registroRP').attr('disabled',false);
                    return true;
                }
                else
                {
                    $('#mensajeCorreo').show();
                    $('#mensajeCorreo').text('Este email ya se encuentra regitrado');
                    $('#mensajeCorreo').css('font-size','60%');
                    $('#mensajeCorreo').css('color','red');
                    $('#registroRP').attr('disabled',true);
                    console.log(result);
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
    $("#emailRU").on('keyup change',function(){
        var email_data = $("#emailRU").val();
        $.ajax({
            url: 'EmailValidate',
            type: 'POST',
            data:{
                _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                if (result == 1)
                {
                    $('#emailMenRU').hide();
                    $('#registroRU').attr('disabled',false);
                    return true;
                }
                else
                {
                    $('#emailMenRU').show();
                    $('#emailMenRU').text('Este email ya se encuentra regitrado');
                    $('#emailMenRU').css('font-size','60%');
                    $('#emailMenRU').css('color','red');
                    $('#registroRU').attr('disabled',true);
                    console.log(result);
                }
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
                var valCorreo = $('#emailMenRU').is(':hidden');
                console.log(email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo);
                if ( email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo ){
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
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo){
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
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0 && valCorreo){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
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
    //---------BLOQUEAR BOTON 1----------------------
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
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && password.length  != 0 && password1.length !=0 && valCorreo) {
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });


    //---------------------------------------------------------------------------------------------------


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
                $('#passwordMen').hide();
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
    //---------BLOQUEAR BOTON 2----------------------
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
</script>

@if (count($errors) > 0)
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
    <script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#modal1').modal('open');
        });
    </script>
    @endif

    </body>
</html>