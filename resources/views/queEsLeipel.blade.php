<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- CSS  -->
    <link href="{{ asset('css/queEsLeipel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.theme.default.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/welcome.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

<style >
/*Color letras tabs*/
.tabs .tab a{
    color:#00ACC1 !important;
}
/*Indicador del tabs*/
.tabs .indicator {
    display: none; 
}
.tabs .tab a.active {
    border-bottom: 2px solid #29B6F6 !important;
}



</style>

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

<!--Menu-->
<nav class="default_color" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/home')}}" class="brand-logo"><img class= "img"src="https://leipel.com/plugins/img/Logo-Leipel.png" width="120px;" height="50px;" title="Logo de Leipel"></a>
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
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="blue-text material-icons">menu</i></a>
    </div>
</nav>
<!--Fin Menu-->
<br>
<!-- tabs  -->
<div class="row" >
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s4"><a class="active" href="#test1"><b>¿Qué es Leipel?</b></a></li>
            <li class="tab col s4"><a href="#test2"><b>Viajes gratis y beneficios</b></a></li>
            <li class="tab col s4"><a href="#test3"><b>Marcas relacionadas</b></a></li>
        </ul>
    </div>

    <div id="test1" class="col s12 center">
            <br><br>

              <div style="text-align: center;">
              <iframe width="350" height="230" src="https://www.youtube.com/embed/iNijEmO4uG4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
              
              <h5><p>Descubre la magia de Leipel en este y otros vídeos en nuestro <br><a href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q" target="_blank">Canal de YouTube</a></p></h5>
    </div>

    <div id="test2" class="col s12 center">   
            <br><br><br>
                <div style="text-align: center;">
                <iframe width="350" height="230" src="https://www.youtube.com/embed/NgnsW2M3X1A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h5><p>Descubre la magia de Leipel en este y otros vídeos en nuestro <br><a href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q" target="_blank">Canal de YouTube</a></p></h5>
            <br>

    </div>

    <div id="test3" class="col s12 l12 center">

       
                <br>
                <div class="col l12 s12 m12">
                       <img src="{{asset('https://leipel.com\sistem_images\fundaciones.jpg') }}" width="350px" height="300px;" style="">
                        <h5>
                        <p style="text-align: center;">Ayudamos a las fundaciones a recaudar fondos a travéz de la venta de sus contenidos. <br>Ayúdanos a ayudar.</p>
                        </h5>
                </div>

    </div>

</div>
<!-- Fin tabs  -->
<div class="container">
<section class="timeline">
  <ul>
    <li>
      <div>
        <time>¿QUÉ ES LEIPEL?</time>
        Leipel es una red social de entretenimiento que abarca: Cine, mùsica, lectura, radio y Tv.
      </div>
    </li>
    <li>
      <div>
        <time>¿QUÉ SON LO TICKETS Y PARA QUE SIRVEN?</time>
        Los ticket son la moneda interna de Leipel, con ellos pordrás adquirir los contenidos que no sean gratis dentro de Leipel. Si se te acaban, siempre puedes comprar más.
      </div>
    </li>
    <li>
      <div>
        <time>¿QUÈ SON LOS PUNTOS Y PARA QUÉ SIRVEN?</time>
        En Leipel tenemos una manera de agradecerte por ayudarnos a llegar a más personas, a cambio de esto te regalamos puntos leipel, los cuales vas a poder canjear por viajes, más tickets y otros beneficios.
      </div>
    </li>
    <li>
      <div>
        <time>¿POR QUÉ POR EL PAGO NO TENGO TODO GRATIS?</time>
        Es fácil, nosotros colaboramos para que los autores ganen más dinero entre más se vende su obra. Actualmente en muchas páginas esto no pasa, simplemente les dan un valor pequeño se venda o no, con Leipel el autor depende de su gran talento para que su contenido se haga viral y así poder ganar como siempre han querido. Y como a fin de cuenta, los que compramos ya estamos mal acostumbrados a que nos regalen todo por internet, es por esto que Leipel da puntos para que te puedas llevar viajes y otros beneficios GRATIS.
      </div>
    </li>
    <li>
      <div>
        <time>¿CÓMO GANO PUNTOS?</time>
        Fácil, invita a todo los que puedas y diles que hagan lo mismo, ganarás un punto por cada cliente activo dentro del mes presente. 
        <br>
        <br>
        *Cliente activo es aquel usuario que compró mínimo un paquete de tickets.
        <br>
        <br> 
        *Se ganan tickets desde el primer hasta el tercer nivel de referidos. 
        <br>
        <br>
        *Se pueden ganar máximo 1000 puntos en el mes, y si, puedes acumularlos.
      </div>
    </li>
    <li>
      <div>
        <time>¿CON QUÉ CANJEO LOS PUNTOS?</time>
        Por lo general con viajes, sin embargo habràn màs sorpresas. Una vez hayas acumulado los puntos necesarios para lo que deseas, deberàs enviarnos un mail con título CANJE DE PUNTOS a info@leipel.com y en el mail nos escribes tu nombre de usuario y número de cédula, recueda indicarnos en qué vas a canjear los puntos.
      </div>
    </li>
  </ul>
</section>
</div>
<br>

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
                    <li><a class="white-text modal-trigger" onclick="masInfo('cine')">Cine</a></li>
                    <li><a class="white-text modal-trigger" onclick="masInfo('musica')">Música</a></li>
                    <li><a class="white-text modal-trigger" onclick="masInfo('lectura')">Lectura</a></li>
                    <li><a class="white-text modal-trigger" onclick="masInfo('radio')">Radio</a></li>
                    <li><a class="white-text modal-trigger" onclick="masInfo('tv')">TV</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                    <li><a class="waves-effect waves-light btn curvaBoton red left" target="_blank" href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q">
                            <i class="fa fa-youtube"></i> &nbsp;YouTube&nbsp;&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    <li><a class="waves-effect waves-light btn curvaBoton  blue darken-4 left" target="_blank" href="https://www.facebook.com/LEIPELoficial/">
                            <i class="fa fa-facebook"></i> &nbsp;Facebook&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    {{--<li><a class="waves-effect waves-light btn purple darken-4 left">--}}
                    {{--<i class="fa fa-instagram"></i> &nbsp;Instagram</a><br>&nbsp;</li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2019 Todos lo derechos reservados
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
                    <li class="tab col s4">
                        <a href="#usuario"><i class="material-icons prefix">face</i><b> Usuario</b></a>
                    </li>
                    <li class="tab col s4">
                        <a href="#proveedor"><i class="material-icons prefix">store</i><b> Proveedor</b></a>
                    </li>
                    <li class="tab col s4">

                      <a href="#aliado"><i class="material-icons prefix">store</i><b> Aliado</b></a>
                      </li>

                </ul>
            </div>
        </div>

        {{--Modal inicio de sesion usuario--}}
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

                        <button class="btn waves-effect curvaBoton waves-light green" id="iniciar" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="{{ url('/password/reset') }}">
                            Olvidé mi contraseña
                        </a>
                    </div>
                    <!--<div class="input-field col s6">
                        <a class="waves-effect waves-light btn curvaBoton social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                        </a>-->
                    </div>
                    <div class="input-field col s12 l12 m12">
                       <a class="waves-effect waves-light curvaBoton btn blue darken-4 social facebook center" href="login/facebook">
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
                        <button class="btn waves-effect curvaBoton waves-light green" id="iniciarP" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="{{ url('seller_password/reset') }}">Olvidé mi contraseña </a>
                    </div>
                </div>
            </form>
        </div>
        
        {{--Modal inicio de sesion aliado--}}
        <div id="aliado" class="col s12 center">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/bidder_login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="text" id="emailO" name="email" class="autocomplete" value="{{ old('email') }}" required autofocus>
                        <label for="emailO">Correo</label>
                        <div id="emailMenO" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block red-text" >
                                <strong >{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        @foreach (session('flash_notification', collect())->toArray() as $message)
                            <span class="help-block" style="color: red;">
                                <strong>{{ $message['message'] }}</strong>
                            </span>
                        @endforeach
                        {{ session()->forget('flash_notification') }}
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" id="passwordO" class="autocomplete" name="password" required>
                        <label for="passwordO">Contraseña</label>
                        <div id="passwordMenO" style="margin-top: 1%"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong class="text-red">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <button class="btn curvaBoton waves-effect waves-light green" id="iniciarO" type="submit" name="action">    Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        
                        <a class="blue-text" href="{{ url('bidder_password/reset') }}">Olvidé mi contraseña </a>
                        
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
                <li class="tab col s4"><a href="#usuario1" class="active"><i class="material-icons prefix">face</i><b> Usuario</b></a></li>
                <li class="tab col s4"><a href="#proveedor1"><i class="material-icons prefix">store</i><b> Proveedor</b></a></li>
                  <li class="tab col s4"><a href="#aliado1"><i class="material-icons prefix">store</i><b> Aliado</b></a></li>
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
                        <button class="btn waves-effect curvaBoton waves-light green" id="registroRU" type="submit" name="action">Registrarse
                            <i class="material-icons right">send</i>
                        </button><br>
                    </div>
                    <!--<div class="input-field col s6">
                        <a class="waves-effect waves-light curvaBoton btn social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                    </div>-->
                    <div class="input-field col s12 l12 m12">
                      <a class="waves-effect waves-light curvaBoton btn blue darken-4 social facebook center" href="login/facebook">
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
                        <button class="btn waves-effect curvaBoton waves-light green" id="registroRP" type="submit" >Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        {{--registro aliado--}}
        <div id="aliado1" class="col s12 center">
            <form class="form-horizontal" id="formRO">
                {{ csrf_field() }}
                @include('flash::message')
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">person</i>
                        <input type="text" id="nombreOfertante" class="autocomplete" name="nombreOfertante" required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" data-length="190">
                        <label for="nombreOfertante">Nombre</label>
                        <div id="mensajeNombreOfertante" style="margin-top: 1%"></div>
                        @if ($errors->has('nombreOfertante'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombreOfertante') }}</strong>
                           </span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRO" name="emailRO" required="required" class="autocomplete" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" data-length="190">
                        <label for="emailRO">Correo</label>
                        <div id="mensajeCorreoOfertante" style="margin-top: 1%"></div>
                        @if ($errors->has('emailRO'))
                            <span class="help-block">
                                <strong>{{ $errors->first('emailRO') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">phone</i>
                        <input type="text" id="tlfRO" name="tlfRO" required="required" class="autocomplete" onkeypress="return controltagNum(event)" pattern="[0-9]+" data-length="15">
                        <label for="tlfRO">Teléfono</label>
                        <div id="mensajeTelefonoOfertante" style="margin-top: 1%"></div>
                        @if ($errors->has('tlfRO'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tlf') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="input-field col s10 offset-s1">
                        <select name="categoria" id="categoria" class="autocomplete" required="required">
                            <option value="">Seleccione una categoría</option>
                            @foreach($modules as $module)
                                <option value="{{ $module->id }}">{{ $module->name }}</option>
                            @endforeach
                            <option value="otra">Otra...</option>
                        </select>
                        <label for="categoria">Indique la categoría del producto que desea canjear</label>
                    </div>
                    <div id="otraCat" class="col s12">
                        <label for="otraCategoria">Dé una breve descripción de la categoria del producto que desea canjear</label>
                        <div id="mensajeOtraCatOfertante" style="margin-top: 1%"></div>
                        <div class="input-field col s10 offset-s1">
                            <textarea name="otraCategoria" id="otraCategoria" class="materialize-textarea" data-length="190"></textarea>
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <button class="btn curvaBoton waves-effect waves-light green" id="registroRO" type="submit" >
                            Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<!--Fin modal inicio de registro-->


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
<script src="{{asset('js/owl.carousel.min.js') }}"></script>
<script src="{{asset('js/queEsLeipel.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
  function masInfo(tipo) {
        console.log(tipo);
        var usuarioActivo = "{{Auth::guest()}}";
        console.log(usuarioActivo);
        if (tipo=="radio") {
            var ruta = "{{ url('/ShowRadio') }}";
            var ruta_seller = "{{ url('/seller_home') }}";
            
            if ("{{Auth::guard('web_seller')->user()}}" != ""){
                location.href = ruta_seller;
            }
            else if ((usuarioActivo!=1) && ("{{Auth::guard('web_seller')->user()}}" == "")) {
                console.log("usuario logueado");
                location.href = ruta;
            } else {
                console.log("usuario invitado");
                swal({
                    title: "Ingrese al sistema",
                    text: "Para poder ver el contenido es necesario estar registrado e iniciar sesión",
                    icon: "info",
                    buttons: {
                        cancelar: "Cerrar",
                        iniciarSesion: {
                            text: "Iniciar sesión",
                            value: "iniciar"
                        },
                        registrar: {
                            text: "Registrate",
                            value: "registrar"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((confirmacion) => {
                    console.log(confirmacion);
                    if(confirmacion=="registrar") {
                        $('#modal2').modal();
                        $('#modal2').modal('open');
                    }else if(confirmacion=="iniciar") {
                        $('#modal1').modal();
                        $('#modal1').modal('open');}
                });
            }
        } else if (tipo=="tv") {
            var ruta = "{{ url('/ShowTv') }}";
            var ruta_seller = "{{ url('/seller_home') }}";
            if ("{{Auth::guard('web_seller')->user()}}" != ""){
                location.href = ruta_seller;
            }
            else if ((usuarioActivo!=1) && ("{{Auth::guard('web_seller')->user()}}" == "")) {
                console.log("usuario logueado");
                location.href = ruta;
            } else {
                console.log("usuario invitado");
            swal({
                    title: "Ingrese al sistema",
                    text: "Para poder ver el contenido es necesario estar registrado e iniciar sesión",
                    icon: "warning",
                    buttons: {
                        cancelar: "Cerrar",
                        iniciarSesion: {
                            text: "Iniciar sesión",
                            value: "iniciar"
                        },
                        registrar: {
                            text: "Registrate",
                            value: "registrar"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((confirmacion) => {
                    console.log(confirmacion);
                    if(confirmacion=="registrar") {
                        $('#modal2').modal();
                        $('#modal2').modal('open');
                    }else if(confirmacion=="iniciar") {
                        $('#modal1').modal();
                        $('#modal1').modal('open');}
                });
            }
        } else if (tipo=="lectura") {
            var ruta = "{{ url('/MyReads') }}";
            var ruta_seller = "{{ url('/seller_home') }}";
            
            if ("{{Auth::guard('web_seller')->user()}}" != ""){
                location.href = ruta_seller;
            }
            else if ((usuarioActivo!=1) && ("{{Auth::guard('web_seller')->user()}}" == "")) {
                console.log("usuario logueado");
                location.href = ruta;
            } else {
                console.log("usuario invitado");
            swal({
                    title: "Ingrese al sistema",
                    text: "Para poder ver el contenido es necesario estar registrado e iniciar sesión",
                    icon: "warning",
                    buttons: {
                        cancelar: "Cerrar",
                        iniciarSesion: {
                            text: "Iniciar sesión",
                            value: "iniciar"
                        },
                        registrar: {
                            text: "Registrate",
                            value: "registrar"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((confirmacion) => {
                    console.log(confirmacion);
                    if(confirmacion=="registrar") {
                        $('#modal2').modal();
                        $('#modal2').modal('open');
                    }else if(confirmacion=="iniciar") {
                        $('#modal1').modal();
                        $('#modal1').modal('open');}
                });
            }
        } else if (tipo=="musica") {
            var ruta = "{{ url('/MyMusic') }}";
            var ruta_seller = "{{ url('/seller_home') }}";
            
            if ("{{Auth::guard('web_seller')->user()}}" != ""){
                location.href = ruta_seller;
            }
            else if ((usuarioActivo!=1) && ("{{Auth::guard('web_seller')->user()}}" == "")) {
                console.log("usuario logueado");
                location.href = ruta;
            } else {
                console.log("usuario invitado");
            swal({
                    title: "Ingrese al sistema",
                    text: "Para poder ver el contenido es necesario estar registrado e iniciar sesión",
                    icon: "warning",
                    buttons: {
                        cancelar: "Cerrar",
                        iniciarSesion: {
                            text: "Iniciar sesión",
                            value: "iniciar"
                        },
                        registrar: {
                            text: "Registrate",
                            value: "registrar"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((confirmacion) => {
                    console.log(confirmacion);
                    if(confirmacion=="registrar") {
                        $('#modal2').modal();
                        $('#modal2').modal('open');
                    }else if(confirmacion=="iniciar") {
                        $('#modal1').modal();
                        $('#modal1').modal('open');}
                });
            }
        } else if (tipo=="cine") {
            var ruta = "{{ url('/MyMovies') }}";
            var ruta_seller = "{{ url('/seller_home') }}";
            
            if ("{{Auth::guard('web_seller')->user()}}" != ""){
                location.href = ruta_seller;
            }
            else if ((usuarioActivo!=1) && ("{{Auth::guard('web_seller')->user()}}" == "")) {
                console.log("usuario logueado");
                location.href = ruta;
            } else {
                console.log("usuario invitado");
            swal({
                    title: "Ingrese al sistema",
                    text: "Para poder ver el contenido es necesario estar registrado e iniciar sesión",
                    icon: "warning",
                    buttons: {
                        cancelar: "Cerrar",
                        iniciarSesion: {
                            text: "Iniciar sesión",
                            value: "iniciar"
                        },
                        registrar: {
                            text: "Registrate",
                            value: "registrar"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((confirmacion) => {
                    console.log(confirmacion);
                    if(confirmacion=="registrar") {
                        $('#modal2').modal();
                        $('#modal2').modal('open');
                    }else if(confirmacion=="iniciar") {
                        $('#modal1').modal();
                        $('#modal1').modal('open');}
                });
            }
        }
    }
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
