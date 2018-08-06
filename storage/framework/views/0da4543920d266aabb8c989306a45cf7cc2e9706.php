<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="description" content="Circular Content Carousel with jQuery"/>
    <meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3"/>
    <meta name="author" content="Codrops"/>
    
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Leipel')); ?></title>

    <!-- Styles -->
    
    

    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/login3.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/slick-team-slider.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/style.css')); ?>">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/carusel/css/demo.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/carusel/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/carusel/css/jquery.jscrollpane.css')); ?>" media="all">

    <style>
        /*@import  url(//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);*/

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
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>
<body>
<!--HEADER START NavBar-->
<div class="main-navigation">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo e(Request::url()); ?>">
                    <img src="<?php echo e(asset('plugins/img/Logo-Leipel.png')); ?>" width="150" height="50" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo e(Request::url()); ?>">Inicio</a></li>
                    <li><a href="#portfolio">Destacados</a></li>
                    <li><a href="#about">Proveedores</a></li>
                    
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Iniciar Sesi&oacute;n
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo e(url('/login')); ?>">Usuario</a></li>
                            <li><a href="<?php echo e(url('/seller_login')); ?>">Proveedor</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<!--HEADER END-->


<div class="main-navigation">
    <!--BANNER START-->
    <div id="banner" class="section-padding">
        <div class="container-fluid">
            <div class="jumbotron">
                <div class="text-center">
                    <h1 class="small">
                        Distracci&oacuten <br/>
                        Al <br/>
                        M&aacute;ximo
                    </h1>
                    <a href="<?php echo e(url('/register')); ?>" class="btn btn-banner ">
                        Registrate Gratis<i class="fa fa-send"></i>
                    </a>
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
                        padding: 25px;
                        background-color: transparent;
                        transition: transform .2s;
                        width: 200px;
                        height: 200px;
                    }

                    .zoom:hover {
                        -ms-transform: scale(1.5); /* IE 9 */
                        -webkit-transform: scale(1.5); /* Safari 3-8 */
                        transform: scale(1.5);
                    }
                </style>
                <center>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-2.png')); ?>" width="150"
                                                        height="100" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-4.png')); ?>" width="150"
                                                        height="100" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon.png')); ?>" width="150"
                                                        height="100" alt=""></a></div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-5.png')); ?>" width="150"
                                                        height="100" alt=""></a>
                    </div>
                    <div class="col-md-4 zoom">
                        <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-3.png')); ?>" width="150"
                                                        height="100" alt=""></a>
                    </div>
                </center>
            </div>
        </div>
    </div>
    <!--CTA1 END-->
</div>

<!--CTA2 STAR portafolio de destacados-->









































































































































































































































































































































































































































































<!--CTA2 END portafolio de destacados-->

<!--TEAM START Proveedores-->
<div id="about" class="section-padding" style="background-color:#f4f4f4">
    <div class="container">
        <div class="row">
            <div class="page-title text-center">
                <h1>Nuestros Proveedores</h1>
                <hr class="pg-titl-bdr-btm"></hr>
            </div>
            <div class="autoplay">

                
                <?php $__currentLoopData = $seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($s->id < 5 ): ?>
                        <div class="col-md-6">
                            <div class="team-info">
                                <div class="img-sec">
                                    <img src="<?php echo e(asset('images/producer/logo/'. $s->logo)); ?>" class="img-responsive"
                                         style="width:256px;height:256px">
                                </div>
                                <div class="fig-caption">
                                    <h3><?php echo e($s->name); ?></h3>
                                    <p class="marb-20"><?php echo e($s->descs_s); ?></p>
                                    <p>Follow me:</p>
                                    <ul class="team-social">
                                        <li class="bgblue-dark ">
                                            <a href="#">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="bgblue-dark ">
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="bgblue-dark ">
                                            <a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
            
            <a href="<?php echo e(url('/applys')); ?>" class="btn btn-default">Registrate Como Proveedor</a>
        </div>
    </div>
</div>
<!--CTA2 END-->

<!--CONTACT START Comentario-->
<div id="contact" class="section-padding" style="background-color:#f4f4f4">
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
                               placeholder="Nombre" data-rule="minlen:4"
                               data-msg="Please enter at least 4 chars"/>
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

                        <button class="button-medium" id="contact-submit" type="submit" name="contact">
                            Enviar Ahora
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
                        <li>
                            <a class="f_twitter" href="#">
                                <i class="fa fa-youtube fa-2x "></i>
                            </a>
                        </li>
                        <li>
                            <a class="f_facebook" href="#">
                                <i class="fa fa-facebook fa-2x"></i>
                            </a>
                        </li>
                        <li>
                            <a class="f_google" href="#">
                                <i class="fa fa-instagram fa-2x"></i>
                            </a>
                        </li>
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


<!-- Scripts -->

<script src="<?php echo e(asset('plugins/jquery/js/jquery-3.2.1.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrapV3.3/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/js/jquery.easing.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/js/slick.min.js')); ?>"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="<?php echo e(asset('plugins/carusel/js/jquery.easing.1.3.js')); ?>"></script>
<!-- the jScrollPane script -->
<script src="<?php echo e(asset('plugins/carusel/js/jquery.mousewheel.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/carusel/js/jquery.contentcarousel.js')); ?>"></script>
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
        sliderEasing: 'easeOutExpo',
        // speed for the item animation (open / close)
        itemSpeed: 500,
        // easing for the item animation (open / close)
        itemEasing: 'easeOutExpo',
        // number of items to scroll at a time
        scroll: 1
    });
    $('#ca-containerR').contentcarousel({
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
    $('#ca-containerM').contentcarousel({
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
    $('#ca-containerRe').contentcarousel({
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
    $('#ca-containerP').contentcarousel({
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
</script>
</body>
</html>