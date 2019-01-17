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
       <!--  <ul class="right hide-on-med-and-down">
            <li><a class="blue-text" href="{{route('queEsLeipel')}}"><b>¿Qué es leipel?</b></a></li>
            @if(Auth::guard('web_seller')->user())
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
            <li><a class="blue-text" href="#"><b>¿Qué es Leipel<leipelsad></leipelsad>?</b></a></li>
            @if(Auth::guard('web_seller')->user())
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
        </ul> -->
        <!-- <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="blue-text material-icons">menu</i></a> -->
    </div>
</nav>
<!--Fin Menu-->
<!-- Contenido  -->
<br><br>

<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card curva">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m12 center">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('SellerRegister') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <h5 class="center">
                                <b class="blue-text">Completar registro</b>
                            </h5><br>
                            <input type="hidden" id="modulo" name="modulo">
                            <input type="hidden" id="submodulo" name="submodulo">
                           
                            
                            <div class="input-field col m6  {{ $errors->has('name') ? ' has-error' : '' }}">
                                <i class="material-icons prefix blue-text">person</i>
                                <label for="name" class="">Nombre del contacto de la empresa</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
   
                            <div class=" input-field col m6  {{ $errors->has('email') ? ' has-error' : '' }}">
                                <i class="material-icons prefix blue-text">email</i>
                                 <label for="email" id="labeEmail">Correo electrónico del contacto</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="required">
                               
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="input-field col m6  {{ $errors->has('tlf') ? ' has-error' : '' }}">
                                <i class="material-icons prefix blue-text">phone</i>
                                <label for="tlf" class="" id="labeTlf">Teléfono del contacto</label>
                                <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}" required="required">

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="input-field col m6 ">
                                <i class="material-icons prefix blue-text">assignment</i>
                                <label for="desc" class="" id="labeDesc">Breve descripción de la empresa</label>
                                <textarea name="dsc" id="dcs" class="form-control materialize-textarea" required="required"></textarea>
                            </div>
                            
                            <div class="input-field col m6  {{ $errors->has('address') ? ' has-error' : '' }}">
                                 <i class="material-icons prefix blue-text">location_on</i>  
                                <label for="address" class="col-md-4 control-label">Dirección de la empresa</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required="required">
                                <div id="mensajeDireccion"></div>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="input-field col m6 ">
                                <i class="material-icons prefix blue-text">edit</i>  
                                <label for="ruc" class="">Registro Único de Contribuyente</label>
                                <input id="ruc" type="number" class="form-control" name="ruc" required="required" onkeypress="return controltagNum(event)" min="1" pattern="[0-9]+">
                                <div id="mensajeDoc" style="display: none;"></div>
                                @if ($errors->has('ruc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ruc') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <img id="preview_adj_ruc" src="" name='ci'/>
                                <object id="pdfruc"  class="text-center"  type="application/pdf" align="center" width="380" height="180" style="display: none;"></object>
                            <div class="file-field input-field col m6 offset-m3">
                                <label for="adj_ruc" class="">Imagen del RUC</label>
                                <br><br>

                                <div class="btn blue">
                                    <span><i class="material-icons">photo_camera</i></span>
                                    <input type="file" class="form-control" name="adj_ruc" id="adj_ruc" accept="image/*,.pdf" required="required">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <div id="mensajeImgDoc" style="display: none;"></div>

                            </div>
                            
                            <div class="input-field col m6  {{ $errors->has('password') ? ' has-error' : '' }}">
                                <i class="material-icons prefix blue-text">vpn_key</i>
                                <label for="password" class="col-md-4 control-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required="required">
                                <div id="passwordMenRU" style="margin-top: 1%; display: none;"></div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col m6 ">
                                <i class="material-icons prefix blue-text">vpn_key</i>
                                 <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="required">
                                <div id="passwordConfirmMenRU" style="margin-top: 1%; display: none;"></div>
                            </div>
                            <div class="col m6 offset-m3">
                                <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="completar">
                                    Completar
                                <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                <strong class="red-text">{{ $errors->first('name') }}</strong>
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
                                        <strong class="red-text">{{ $errors->first('email') }}</strong>
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
                                        <strong class="red-text">{{ $errors->first('password') }}</strong>
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
                                <strong class="red-text">{{ $errors->first('password_confirm') }}</strong>
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
                                <strong class="red-text">{{ $errors->first('com_name') }}</strong>
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


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
<script src="{{asset('js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>
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
</script>
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    //---------------------------------------------------------------------------------------------------
    // Validacion de registro previo
    $(document).ready(function () {
        var valSeller = "{{$valSeller}}";
        if (valSeller==1) {
            $('#completar').attr('disabled',true);
            swal({
                title: "¡Ha ocurrido un error!",
                text: "Ya usted completó el registro, debe iniciar sesión.",
                icon: "warning",
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
        }
    });
    // Validacion de registro previo
    //---------------------------------------------------------------------------------------------------
    // Validacion para el url y llenado de datos automaticamente
    $(document).ready(function () {
        var url = window.location.pathname;
        var cadena = url.split('/');
        var token = cadena[cadena.length-1];
        var id = cadena[cadena.length-2];
        //console.log(cadena,cadena.length,token,id);
        var parametros = '/'+id+'/'+token;
        var url = "{{ url('/getDataSeller/') }}"+parametros;
        $.ajax({
            url: url,
            type: 'get',
            dataType: "json",
            success: function (result) {
                console.log(result);
                if (result.id!=undefined) {
                    $('#name').attr('readonly','readonly');
                    $('#name').val(result.contact_s);
                    $('#email').attr('readonly','readonly');
                    $('#email').val(result.email);
                    $('#labeEmail').addClass('active');
                    //$('#tlf').attr('readonly','readonly');
                    $('#tlf').val(result.phone_s);
                    $('#labeTlf').addClass('active');
                    //$('textarea#dcs').attr('readonly','readonly');
                    $('textarea#dcs').text(result.dsc);
                    $('#labeDesc').addClass('active');
                    $('#modulo').val(result.desired_m);
                    $('#submodulo').val(result.sub_desired_m);
                    $('#address').focus();
                }
                else if (result==0){
                    //console.log('no existe ese id de la persona');
                    $('#completar').attr('disabled',true);
                    swal({
                        title: "¡Ha ocurrido un error!",
                        text: "El enlace procesado no corresponde a nuestros registros.",
                        icon: "error",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                }
                else if (result==1) {
                    //console.log('es otro token');
                    $('#completar').attr('disabled',true);
                    swal({
                        title: "¡Ha ocurrido un error!",
                        text: "El enlace procesado no corresponde a nuestros registros.",
                        icon: "error",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                }
            },
            error: function (result) {
                console.log(result);
                swal({
                    title: "¡Ha ocurrido un error!",
                    icon: "error",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((recarga) => {
                    location.reload();
                });
            }
        });
    });
    // Validacion para el url y llenado de datos automaticamente
    //---------------------------------------------------------------------------------------------------
    // Validacion de solo numeros
    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        if (te=='0' || te=='1' || te=='2' || te=='3' || te=='4' || te=='5' || te=='6' || te=='7' || te=='8' || te=='9') {
            $('#mensajeDoc').hide();
        } else {
            $('#mensajeDoc').show();
            $('#mensajeDoc').text('Solo números');
            $('#mensajeDoc').css('color','red');
        }
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
            $('#completar').attr('disabled',true);
        } else {
            $('#completar').attr('disabled',false);
        }
        return patron.test(te);
    }
    // Validacion de solo numeros
    //---------------------------------------------------------------------------------------------------
    // Para que se vea la imagen que se esta cargando
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgId= '#preview_'+$(input).attr('id');
                
                if(input.files[0].type != 'application/pdf')
                {
                $('#pdfruc').hide();
                $(imgId).attr('src', e.target.result);
                $(imgId).width('250');
                $(imgId).height('200');
                }
                else{
                    $(imgId).width('0');
                    $(imgId).height('0');
                    $('#pdfruc').show();
                    $('#pdfruc').attr('data', e.target.result);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#adj_ruc").change(function () {
        readURL(this);
        var adj_ruc = $('#adj_ruc').val();
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        var extension = adj_ruc.substring(adj_ruc.lastIndexOf("."));
        if (extension==".png" || extension==".jpg" || extension==".jpeg" || extension==".pdf") {
            $('#completar').attr('disabled',false);
            $('#mensajeImgDoc').hide();
            $('#preview_adj_ruc').show();
        } else {
            $('#completar').attr('disabled',true);
            $('#mensajeImgDoc').show();
            $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg, png o pdf');
            $('#mensajeImgDoc').css('color','red');
            $('#preview_adj_ruc').hide();
        }
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
            $('#completar').attr('disabled',true);
        } else {
            $('#completar').attr('disabled',false);
        }
    });
    // Para que se vea la imagen que se esta cargando
    //---------------------------------------------------------------------------------------------------
    // Validacion de contraseñas
    $(document).ready(function(){
        $('#password').keyup(function(evento){
            var password = ($('#password').val()).trim();
            if (password.length==0) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('El campo no debe estar vacio');
                $('#passwordMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            else {
                $('#passwordMenRU').hide();
                var password1 = ($('#password-confirm').val()).trim();
                if (password1.length!=0){
                    $('#completar').attr('disabled',false);
                }
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
        $('#password-confirm').keyup(function(evento){
            var passwordConfirm = ($('#password-confirm').val()).trim();
            if (passwordConfirm.length==0) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('El campo no debe estar vacio');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            if (passwordConfirm.length < 5) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            else {
                $('#passwordConfirmMenRU').hide();
                var password1 = ($('#password-confirm').val()).trim();
                console.log(password1.length !=0);
                if (password1.length !=0){
                    $('#completar').attr('disabled',false);
                }
            }

            var password1 = $('#password').val();
            var password = $('#password-confirm').val();

            if (password != password1) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('Ambas contraseña deben coincidir');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            } else {
                $('#passwordConfirmMenRU').hide();
                if (password1.length !=0 && password.length !=0){
                    $('#completar').attr('disabled',false);
                }
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
    });
    // Validacion de contraseñas
    //---------------------------------------------------------------------------------------------------
    // Función que nos va a contar el número de caracteres
    // Para la direccion
    $(document).ready(function(){
        var cantidadMaxima = 191;
        $('#address').keyup(function(evento){
            var address = $('#address').val();
            numeroPalabras = address.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeDireccion').show();
                $('#mensajeDireccion').text('Ha excedido la cantidad máxima de caracteres permitidos');
                $('#mensajeDireccion').css('color','red');
                $('#completar').attr('disabled',true);
            } else {
                $('#mensajeDireccion').hide();
                $('#completar').attr('disabled',false);
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
    });
    // Para la direccion
    // Función que nos va a contar el número de caracteres
    //---------------------------------------------------------------------------------------------------
    $(document).ready(function (e){
        if ($("#phone2").val() !=''){
            var phone = $("#phone2").val();
            $("#phone_s").intlTelInput();
            $("#phone_s").intlTelInput("setNumber",phone );
            $("#phone_s").val(phone);
        } else {
            $("#phone_s").intlTelInput({
                defaultCountry: "auto",
                preferredCountries: ["ec"]
            });
        }
        $("Form").submit(function() {
            $("#phone2").val($("#phone_s").intlTelInput("getNumber"));
        });
    });
</script>