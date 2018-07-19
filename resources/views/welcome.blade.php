<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/login3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/slick-team-slider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/style.css')}}">
    {{--para el carrusel--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/carusel/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/carusel/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/carusel/css/jquery.jscrollpane.css') }}" media="all">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Coustard:900' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'/>

    <style>
        @import url(//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);

        body {
            padding-top: 60px;
        }

        .nav.nav-justified > li > a {
            position: relative;
        }

        .nav.nav-justified > li > a:hover,
        .nav.nav-justified > li > a:focus {
            background-color: transparent;
        }

        .nav.nav-justified > li > a > .quote {
            position: absolute;
            left: 0px;
            top: 0;
            opacity: 0;
            width: 30px;
            height: 30px;
            padding: 5px;
            background-color: #426fac;
            border-radius: 15px;
            color: #fff;
        }

        .nav.nav-justified > li.active > a > .quote {
            opacity: 1;
        }

        .nav.nav-justified > li > a > img {
            box-shadow: 0 0 0 5px #426fac;
        }

        .nav.nav-justified > li > a > img {
            max-width: 100%;
            opacity: .3;
            -webkit-transform: scale(.8, .8);
            transform: scale(.8, .8);
            -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .nav.nav-justified > li.active > a > img,
        .nav.nav-justified > li:hover > a > img,
        .nav.nav-justified > li:focus > a > img {
            opacity: 1;
            -webkit-transform: none;
            transform: none;
            -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .tab-pane .tab-inner {
            padding: 45px 0 20px 10px;
        }

        @media (min-width: 768px) {
            .nav.nav-justified > li > a > .quote {
                left: auto;
                top: auto;
                right: 20px;
                bottom: 0px;
            }
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <!--HEADER START-->
    <div class="main-navigation">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{Request::url()}}"><img
                                src="{{asset('plugins/img/Logo-Leipel.png')}}" width="150" height="50" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{Request::url()}}">Inicio</a></li>
                        <li><a href="#portfolio">Destacados</a></li>
                        <li><a href="#about">Proveedores</a></li>
                        <li><a href="{{ url('/login') }}">Iniciar Sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--HEADER END-->

{{--contenido de la pagina de inicio --}}
<!--BANNER START-->
    <div id="banner" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="jumbotron">
                    <h1 class="small">Entretenimiento Al <span class="bold">M&aacute;ximo</span></h1>
                    <a href="{{ url('/register') }}" class="btn btn-banner">Registrate Gratis<i class="fa fa-send"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--BANNER END-->

    <!--CTA1 START-->
    <div class="cta-1">
        <div class="container">
            <div class="row">
                <style type="text/css">
                    * {
                        box-sizing: border-box;
                    }

                    .zoom {
                        padding: 50px;
                        background-color: transparent;
                        transition: transform .2s;
                        width: 200px;
                        height: 200px;
                        margin: 0 auto;
                    }

                    .zoom:hover {
                        -ms-transform: scale(1.5); /* IE 9 */
                        -webkit-transform: scale(1.5); /* Safari 3-8 */
                        transform: scale(1.5);
                    }
                </style>
                <center>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="{{asset('sistem_images/logo-icon-2.png')}}" width="200"
                                                        height="150" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="{{asset('sistem_images/logo-icon-4.png')}}" width="200"
                                                        height="150" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="{{asset('sistem_images/logo-icon.png')}}" width="200"
                                                        height="150" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="{{asset('sistem_images/logo-icon-5.png')}}" width="200"
                                                        height="150" alt=""></a>
                    </div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="{{asset('sistem_images/logo-icon-3.png')}}" width="200"
                                                        height="150" alt=""></a>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!--CTA1 END-->

    <div id="portfolio">
        <div class="container">
            <div class="page-title text-center">
                <h1>Destacados</h1>
                <hr class="pg-titl-bdr-btm"></hr>
            </div>
            {{--{{ dd($music) }}--}}
            {{--prueba de pestaña--}}

            <div class=" container text-center ">
                <div class=" row ">
                    <div class="  col-md-10  " role="tabpanel">
                        <div class="[ col-xs-12 col-sm-12 ]">
                            <!-- Nav tabs -->
                            <ul class="[ nav nav-justified ]" id="nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#libros" aria-controls="libros" role="tab" data-toggle="tab">
                                        <img class="img-circle"
                                             src="{{asset('plugins/carusel/images/biblioteca.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#tvs" aria-controls="tvs" role="tab" data-toggle="tab">
                                        <img class="img-circle"
                                             src="{{asset('plugins/carusel/images/controlar.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#radios" aria-controls="radios" role="tab" data-toggle="tab">
                                        <img class="img-circle"
                                             src="{{asset('plugins/carusel/images/microfono.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#musica" aria-controls="musica" role="tab" data-toggle="tab">
                                        <img class="img-circle" src="{{asset('plugins/carusel/images/musica.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#revistas" aria-controls="revistas" role="tab" data-toggle="tab">
                                        <img class="img-circle" src="{{asset('plugins/carusel/images/revista.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#series" aria-controls="series" role="tab" data-toggle="tab">
                                        <img class="img-circle" src="{{asset('plugins/carusel/images/tv.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#peliculas" aria-controls="peliculas" role="tab" data-toggle="tab">
                                        <img class="img-circle" src="{{asset('plugins/carusel/images/camara.png')}}"/>
                                        <span class="quote"><i class="fa fa-check-circle"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="[ col-xs-8 col-sm-12 ]">
                            <!-- Tab panes -->
                            <div class="tab-content" id="tabs-collapse">
                                <div role="tabpanel" class="tab-pane fade in active" id="libros">
                                    <div class="tab-inner" >
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerL" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $book as $b)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/bookcover/'. $b->cover) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $b->title }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $b->sinopsis }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $b->original_title }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $b->sinopsis }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $b->seller->name }}</a></li>
                                                                        <li><a href="#">{{ $b->author->full_name }}</a>
                                                                        </li>
                                                                        <li><a href="#">{{ $b->country }}</a></li>
                                                                        <li><a href="#">{{ $b->release_year }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="series">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerS" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $book as $b)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/bookcover/'. $b->cover) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $b->title }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $b->sinopsis }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $b->original_title }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $b->sinopsis }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $b->seller->name }}</a></li>
                                                                        <li><a href="#">{{ $b->author->full_name }}</a>
                                                                        </li>
                                                                        <li><a href="#">{{ $b->country }}</a></li>
                                                                        <li><a href="#">{{ $b->release_year }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tvs">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerT" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $tv as $t)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/tv/'. $t->logo) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $t->name_r }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $t->seller->name_r }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $t->name_r }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $t->seller->name }}
                                                                            {{ $t->descs_s }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $t->google }}</a></li>
                                                                        <li><a href="#">{{ $t->facebook }}</a></li>
                                                                        <li><a href="#">{{ $t->instagram }}</a></li>
                                                                        <li><a href="#">{{ $t->twitter }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="radios">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerR" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $radio as $r)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/radio/'. $r->logo) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $r->name_r }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $r->seller->name_r }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $r->name_r }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $r->seller->name }}
                                                                            {{ $r->descs_s }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $r->google }}</a></li>
                                                                        <li><a href="#">{{ $r->facebook }}</a></li>
                                                                        <li><a href="#">{{ $r->instagram }}</a></li>
                                                                        <li><a href="#">{{ $r->twitter }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="musica">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerM" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $book as $b)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/bookcover/'. $b->cover) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $b->title }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $b->sinopsis }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $b->original_title }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $b->sinopsis }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $b->seller->name }}</a></li>
                                                                        <li><a href="#">{{ $b->author->full_name }}</a>
                                                                        </li>
                                                                        <li><a href="#">{{ $b->country }}</a></li>
                                                                        <li><a href="#">{{ $b->release_year }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="revistas">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerRe" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $book as $b)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('images/bookcover/'. $b->cover) }}); background-size: cover "></div>
                                                                <br/>
                                                                <h3>{{ $b->title }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $b->sinopsis }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $b->original_title }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $b->sinopsis }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $b->seller->name }}</a></li>
                                                                        <li><a href="#">{{ $b->author->full_name }}</a>
                                                                        </li>
                                                                        <li><a href="#">{{ $b->country }}</a></li>
                                                                        <li><a href="#">{{ $b->release_year }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="peliculas">
                                    <div class="tab-inner">
                                        <div class="row" id="portfolio-wrapper">

                                            <div id="ca-containerP" class="ca-container">
                                                <div class="ca-wrapper">

                                                    @foreach( $movie as $m)
                                                        {{--imagen --}}
                                                        <div class="ca-item">
                                                            <div class="ca-item-main">
                                                                <div class="ca-icon"
                                                                     style="background-image: url({{ asset('movie/poster/'. $m->img_poster) }}); background-size: cover ">

                                                                </div>
                                                                <br/>
                                                                <h3>{{ $m->title }}</h3>
                                                                <h4>
                                                                    <span class="ca-quote">&ldquo;</span>
                                                                    <span>
                                                                        {{ $m->based_on }}
                                                                    </span>
                                                                </h4>
                                                                <a href="#" class="ca-more">mas...</a>
                                                            </div>
                                                            <div class="ca-content-wrapper">
                                                                <div class="ca-content">
                                                                    <h6>{{ $m->original_title }}</h6>
                                                                    <a href="#" class="ca-close">close</a>
                                                                    <div class="ca-content-text">
                                                                        <p>
                                                                            {{ $m->story }}
                                                                        </p>
                                                                    </div>
                                                                    <ul>
                                                                        <li><a href="#">{{ $m->seller->name }}</a></li>
                                                                        <li><a href="#">{{ $m->release_year }}</a></li>
                                                                        <li><a href="#">{{ $m->trailer_url }}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                            {{--prueba del carrusel --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--prueba de pestaña--}}
        </div>
    </div>

    <!--TEAM START Proveedores-->
    <div id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="page-title text-center">
                    <h1>Nuestros Proveedores</h1>
                    <hr class="pg-titl-bdr-btm"></hr>
                </div>
                <div class="autoplay">

                    {{--{{ dd($i) }}--}}
                    @foreach($seller as $s)
                        @if($s->id < 5 )
                            <div class="col-md-6">
                                <div class="team-info">
                                    <div class="img-sec">
                                        <img src="{{ asset('images/producer/logo/'. $s->logo) }}" class="img-responsive"
                                             style="width:255px;height:256px">
                                    </div>
                                    <div class="fig-caption">
                                        <h3>{{ $s->name }}</h3>
                                        <p class="marb-20">Sr. UI Developers</p>
                                        <p>Follow me:</p>
                                        <ul class="team-social">
                                            <li class="bgblue-dark"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="bgred"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="bgblue-light"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="bgblue-dark"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!--TEAM END-->

    <!--CTA2 START Ingresar proveedor-->
    <div class="cta2">
        <div class="container">
            <div class="row white text-center">
                <h3 class="wd75 fnt-24">多Quieres Vender Tus Obras?</h3>
                <p class="cta-sub-title"></p>
                <a href="{{ url('/seller_login') }}" class="btn btn-default">Registrate Como Proveedor</a>
            </div>
        </div>
    </div>
    <!--CTA2 END-->

    <!--CONTACT START Comentario-->
    <div id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="page-title text-center">
                    <h1>Comentarios, Consultas & Sugerencias</h1>
                    <hr class="pg-titl-bdr-btm"></hr>
                </div>
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="form-sec">
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="col-md-4 form-group">
                            <input type="text" name="name" class="form-control text-field-box" id="name"
                                   placeholder="Nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars"/>
                            <div class="validation"></div>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="email" class="form-control text-field-box" name="email" id="email"
                                   placeholder="Correo" data-rule="email" data-msg="Please enter a valid email"/>
                            <div class="validation"></div>
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="text" class="form-control text-field-box" name="subject" id="subject"
                                   placeholder="Asunto" data-rule="minlen:4"
                                   data-msg="Please enter at least 8 chars of subject"/>
                            <div class="validation"></div>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control text-field-box" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Mensaje"></textarea>
                            <div class="validation"></div>

                            <button class="button-medium" id="contact-submit" type="submit" name="contact">Enviar
                                Ahora
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--CONTACT END-->

    <!--FOOTER START-->
    <footer class="footer section-padding">
        <div class="container">
            <div class="row">
                <div style="visibility: visible; animation-name: zoomIn;" class="col-sm-12 text-center wow zoomIn">
                    <h3>Siguenos En</h3>
                    <div class="footer_social">
                        <ul>
                            <li><a class="f_facebook" href="https://www.facebook.com/LEIPELoficial"><i
                                            class="fa fa-facebook"></i></a></li>
                            <li><a class="f_twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="f_google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="f_linkedin" href="https://www.linkedin.com/company/informeret-s.a.-leipel"><i
                                            class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </footer>
    <!--FOOTER END-->
    <div class="footer-bottom">
        <div class="container">
            <div style="visibility: visible; animation-name: zoomIn;" class="col-md-12 text-center wow zoomIn">
                <div class="footer_copyright">
                    <p> Leipel &copy 2018. Todos los Derechos Reservados.</p>
                </div>
            </div>
        </div>
    </div>
    {{--contenido de la pagina de inicio --}}
</div>

<!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}
<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.js') }}"></script>
<script src="{{ asset('plugins/js/custom.js') }}"></script>
<script src="{{ asset('plugins/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/js/slick.min.js') }}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="{{ asset('plugins/carusel/js/jquery.easing.1.3.js') }}"></script>
<!-- the jScrollPane script -->
<script src="{{ asset('plugins/carusel/js/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/carusel/js/jquery.contentcarousel.js') }}"></script>
<script type="text/javascript">
    $('#ca-containerL').contentcarousel({
        // speed for the sliding animation
        sliderSpeed: 500,
        // easing for the sliding animation
        sliderEasing: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed: 500,
        // easing for the item animation (open / close)
        itemEasing: 'easeOutExpo',
        // number of items to scroll at a time
        scroll: 1
    });
    $('#ca-containerS').contentcarousel({
        // speed for the sliding animation
        sliderSpeed: 500,
        // easing for the sliding animation
        sliderEasing: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed: 500,
        // easing for the item animation (open / close)
        itemEasing: 'easeOutExpo',
        // number of items to scroll at a time
        scroll: 1
    });
    $('#ca-containerT').contentcarousel({
        // speed for the sliding animation
        sliderSpeed: 500,
        // easing for the sliding animation
        sliderEasing	: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed		: 500,
        // easing for the item animation (open / close)
        itemEasing		: 'easeOutExpo',
        // number of items to scroll at a time
        scroll			: 1
    });
    $('#ca-containerR').contentcarousel({
        // speed for the sliding animation
        sliderSpeed		: 500,
        // easing for the sliding animation
        sliderEasing	: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed		: 500,
        // easing for the item animation (open / close)
        itemEasing		: 'easeOutExpo',
        // number of items to scroll at a time
        scroll			: 1
    });
    $('#ca-containerM').contentcarousel({
        // speed for the sliding animation
        sliderSpeed		: 500,
        // easing for the sliding animation
        sliderEasing	: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed		: 500,
        // easing for the item animation (open / close)
        itemEasing		: 'easeOutExpo',
        // number of items to scroll at a time
        scroll			: 1
    });
    $('#ca-containerRe').contentcarousel({
        // speed for the sliding animation
        sliderSpeed		: 500,
        // easing for the sliding animation
        sliderEasing	: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed		: 500,
        // easing for the item animation (open / close)
        itemEasing		: 'easeOutExpo',
        // number of items to scroll at a time
        scroll			: 1
    });
    $('#ca-containerP').contentcarousel({
        // speed for the sliding animation
        sliderSpeed		: 500,
        // easing for the sliding animation
        sliderEasing	: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed		: 500,
        // easing for the item animation (open / close)
        itemEasing		: 'easeOutExpo',
        // number of items to scroll at a time
        scroll			: 1
    });
</script>
</body>
</html>