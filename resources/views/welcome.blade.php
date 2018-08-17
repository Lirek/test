<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/bootstrap') }}">
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
    <link rel="stylesheet" href="{{ asset('plugins/index/css/index.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">

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
<nav class="navbar ">
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
                <li><a href="#modal-default" data-toggle="modal" data-target="#modal-default">INICIAR SESION</a></li>
                <li><a href="{{ url('/register') }}">REGRISTRATE</a></li>
            </ul>
        </div>
    </div>
</nav>
{{--</div>--}}

<!-- NAVBAR END-->

<!-- SLIDER STAR-->
<div class=" col-md-12" id="banner">

    <div id="containerS">
        <ul id="slides">
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/forest-left.jpg"/>
                </div>
                <div class="slide-partial slide-right">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/forest-right.jpg"/>
                </div>
                <h1 class="title">
                    <span class="title-text">Forest</span>
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/mountain-left.jpg"/>
                </div>
                <div class="slide-partial slide-right">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/mountain-right.jpg"/>
                </div>
                <h1 class="title">
                    <span class="title-text">Mountain</span>
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/ocean-left.jpg"/>
                </div>
                <div class="slide-partial slide-right">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/ocean-right.jpg"/>
                </div>
                <h1 class="title">
                    <span class="title-text">Ocean</span>
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/canyon-left.jpg"/>
                </div>
                <div class="slide-partial slide-right">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/canyon-right.jpg"/>
                </div>
                <h1 class="title">
                    <span class="title-text">Canyon</span>
                </h1>
            </li>
            <li class="slide">
                <div class="slide-partial slide-left"><img
                            src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/lake-left.jpg"/></div>
                <div class="slide-partial slide-right"><img
                            src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/544318/lake-right.jpg"/></div>
                <h1 class="title"><span class="title-text">Lake</span></h1>
            </li>
        </ul>
        <ul id="slide-select">
            <li class="btn prev"><</li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="selector"></li>
            <li class="btn next">></li>
        </ul>
    </div>

</div>


<!-- SLIDER STAR-->

<!--FOOTER STAR -->

<footer class="footer container">
    <div class="row col-md-12" id="leipel">
        <div class="col-md-3">
            <h1>
                <img src="{{asset('plugins/img/Logo-Leipel.png')}}" id="logo">
            </h1>
            <p class="text-left">
                It is a long established fact that a reader will be distracted by
                the readable content of page when lookong at its layout. The point
                of using Lorem Ipsum is that it has a more-or-less normal
                distribution of letters
            </p>
            <br/>
            <ul id="list">
                <li class="lista">
                    <i class="fa fa-map-marker text-info "></i>
                    &nbsp;&nbsp;&nbsp;Quito, Ecuador
                </li>
                <li class="lista">
                    <i class="fa fa-phone text-info "></i>
                    &nbsp;&nbsp;+123 4567 987
                </li>
                <li class="lista">
                    <i class="fa fa-envelope-o text-info"></i>
                    leipel@gmail.com
                </li>
            </ul>
        </div>
        <div class="col-md-2 " id="sobre">
            <h1>Sobre</h1>
            <ul class="pages">
                <li><a href="#">¿Que es Leipel?</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Sing up</a></li>
                <li><a href="#">Politica de Privacidad</a></li>
                <li><a href="#">Leipel Plataforma</a></li>
                <li><a href="#">Terminos de Servicios</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Contacto</a></li>
                <li><a href="#">Preguntas Frecuente</a></li>
            </ul>
        </div>
        <div class="col-md-2" id="descubrir">
            <h1> Descubrir</h1>
            <ul class="list">
                <li><a href="#">Activar Dispositivos</a></li>
                <li><a href="#">Series</a></li>
                <li><a href="#">Peliculas</a></li>
                <li><a href="#">F.A.Q</a></li>
            </ul>
        </div>
        <div class="col-md-2" id="social">
            <h1>Social</h1>
            <ul id=>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Youtube</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Google+</a></li>
            </ul>
        </div>
        <div class="col-md-3 " id="opinion">
            <h1>Deja tu opini&oacute;n</h1>
            <form action="" method="post" role="form" class="form-horizontal" id="formOp">
                <div class="col-md-12 form-group">
                    <input type="text" name="name" class="form-control " id="name" placeholder="Nombre"
                           data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                    <div class="validation"></div>
                </div>
                <div class="col-md-12 form-group">
                    <input type="email" class="form-control " name="email" id="email" placeholder="Correo"
                           data-rule="email" data-msg="Please enter a valid email"/>
                    <div class="validation"></div>
                </div>
                <div class="col-md-12 form-group">
                    <input type="text" class="form-control " name="subject" id="subject"
                           placeholder="Asunto" data-rule="minlen:4"
                           data-msg="Please enter at least 8 chars of subject"/>
                    <div class="validation"></div>
                </div>
                <div class="col-md-12 form-group">
                    <textarea class="form-control " name="message" rows="5" data-rule="required"
                              data-msg="Please write something for us" placeholder="Mensaje">
                    </textarea>
                </div>
                <div class="col-md-offset-7">
                    <a class="btn btn-info active" name="contact" style="background: #21a4de">Enviar</a>
                </div>

            </form>
        </div>
    </div>
</footer>
<hr/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div> <!-- end .row -->
</div>

<!--FOOTER END -->

<!-- Scripts -->

<!-- /.LOGIN STAR -->
<div class="modal fade login-register-form row" id="modal-default">
    <div class="modal-dialog modal-sm">
        {{--<div class="col-md-8 align-center">--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Inicia sesi&oacute;n</h4>
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

                                <div class="col-md-11">
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

                                <div class="col-md-11">
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
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
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

                                <a href="login/google" class="btn btn-google">
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

                                <div class="col-md-11">
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

                                <div class="col-md-11">
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
                                <div class="col-md-11">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
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


{{--<script src="/js/app.js"></script>--}}
<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.js') }}"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    var curpage = 1;
    var sliding = false;
    var click = true;
    var left = document.getElementById("left");
    var right = document.getElementById("right");
    var pagePrefix = "slide";
    var pageShift = 500;
    var transitionPrefix = "circle";
    var svg = true;

    function leftSlide() {
        if (click) {
            if (curpage == 1) curpage = 5;
            console.log("woek");
            sliding = true;
            curpage--;
            svg = true;
            click = false;
            for (k = 1; k <= 4; k++) {
                var a1 = document.getElementById(pagePrefix + k);
                a1.className += " tran";
            }
            setTimeout(() => {
                move();
            }, 200);
            setTimeout(() => {
                for (k = 1; k <= 4; k++) {
                    var a1 = document.getElementById(pagePrefix + k);
                    a1.classList.remove("tran");
                }
            }, 1400);
        }
    }

    function rightSlide() {
        if (click) {
            if (curpage == 4) curpage = 0;
            console.log("woek");
            sliding = true;
            curpage++;
            svg = false;
            click = false;
            for (k = 1; k <= 4; k++) {
                var a1 = document.getElementById(pagePrefix + k);
                a1.className += " tran";
            }
            setTimeout(() => {
                move();
            }, 200);
            setTimeout(() => {
                for (k = 1; k <= 4; k++) {
                    var a1 = document.getElementById(pagePrefix + k);
                    a1.classList.remove("tran");
                }
            }, 1400);
        }
    }

    function move() {
        if (sliding) {
            sliding = false;
            if (svg) {
                for (j = 1; j <= 9; j++) {
                    var c = document.getElementById(transitionPrefix + j);
                    c.classList.remove("steap");
                    c.setAttribute("class", transitionPrefix + j + " streak");
                    console.log("streak");
                }
            } else {
                for (j = 10; j <= 18; j++) {
                    var c = document.getElementById(transitionPrefix + j);
                    c.classList.remove("steap");
                    c.setAttribute("class", transitionPrefix + j + " streak");
                    console.log("streak");
                }
            }

            // for(k=1;k<=4;k++){
            //   var a1 = document.getElementById(pagePrefix + k);
            //   a1.className += ' tran';
            // }

            setTimeout(() => {
                for (i = 1; i <= 4; i++) {
                    if (i == curpage) {
                        var a = document.getElementById(pagePrefix + i);
                        a.className += " up1";
                    } else {
                        var b = document.getElementById(pagePrefix + i);
                        b.classList.remove("up1");
                    }
                }
                sliding = true;
            }, 600);
            setTimeout(() => {
                click = true;
            }, 1700);

            setTimeout(() => {
                if (svg) {
                    for (j = 1; j <= 9; j++) {
                        var c = document.getElementById(transitionPrefix + j);
                        c.classList.remove("streak");
                        c.setAttribute("class", transitionPrefix + j + " steap");
                    }
                } else {
                    for (j = 10; j <= 18; j++) {
                        var c = document.getElementById(transitionPrefix + j);
                        c.classList.remove("streak");
                        c.setAttribute("class", transitionPrefix + j + " steap");
                    }
                    sliding = true;
                }
            }, 850);
            setTimeout(() => {
                click = true;
            }, 1700);
        }
    }

    left.onmousedown = () => {
        leftSlide();
    };

    right.onmousedown = () => {
        rightSlide();
    };

    document.onkeydown = e => {
        if (e.keyCode == 37) {
            leftSlide();
        } else if (e.keyCode == 39) {
            rightSlide();
        }
    };

    //for codepen header
    setTimeout(() => {
        rightSlide();
    }, 500);

</script>


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


</body>
</html>