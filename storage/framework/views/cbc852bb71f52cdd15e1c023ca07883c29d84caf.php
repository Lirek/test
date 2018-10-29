<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/AdminLTE.min.css')); ?>">

<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Leipel')); ?></title>

    <!-- Styles -->
    
    

    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/index/css/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/index/css/content1.css')); ?>">

    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- Scripts
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script> -->


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>


</head>
<style type="text/css">
    .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            background: #eee;
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #eee;
                border-right: 0 solid #eee;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #21a4de;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #21a4de !important;
}

.timeline-badge.success {
    background-color: #21a4de !important;
}

.timeline-badge.warning {
    background-color: #21a4de !important;
}

.timeline-badge.danger {
    background-color: #21a4de !important;
}

.timeline-badge.info {
    background-color: #21a4de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}
</style>
<body>

<!-- NAVBAR STAR-->


<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo e(Request::url()); ?>">
                <img id="logo" src="<?php echo e(asset('plugins/img/Logo-Leipel.png')); ?>">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                
                <li><a href="#leipel">¿QUE ES LEIPEL?</a></li>
                <?php if(Auth::guest()): ?>
                    <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">INICIAR SESION</a></li>
                    <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register">REGRISTRATE</a></li>
                <?php endif; ?>              
            </ul>
        </div>
    </div>
</nav>



<div class="container">
    <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-question-sign"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿QUÉ ES LEIPEL?</h4>
              <br>
            </div>
            <div class="timeline-body">
              <p>Leipel es una red social de entretenimiento que abarca: Cine, mùsica, lectura, radio y Tv.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="fa fa-ticket"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿QUÉ SON LO TICKETS Y PARA QUE SIRVEN?</h4>
              <br>
            </div>
            <div class="timeline-body">
              <p>Los ticket son la moneda interna de Leipel, con ellos pordrás adquirir los contenidos que no sean gratis dentro de Leipel. Si se te acaban, siempre puedes comprar más.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="glyphicon glyphicon-record"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿QUÈ SON LOS PUNTOS Y PARA QUÉ SIRVEN?</h4>
              <br>
            </div>
            <div class="timeline-body">
              <p>En Leipel tenemos una manera de agradecerte por ayudarnos a llegar a más personas, a cambio de esto te regalamos puntos leipel, los cuales vas a poder canjear por viajes, más tickets y otros beneficios.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-piggy-bank"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿POR QUÈ POR EL PAGO NO TENGO TODO GRATIS?</h4>
              <br>
            </div>
            <div class="timeline-body">
              <p>Es fácil, nosotros colaboramos para que los autores ganen más dinero entre más se vende su obra. Actualmente en muchas páginas esto no pasa, simplemente les dan un valor pequeño se venda o no, con Leipel el autor depende de su gran talento para que su contenido se haga viral y así poder ganar como siempre han querido. Y como a fin de cuenta, los que compramos ya estamos mal acostumbrados a que nos regalen todo por internet, es por esto que Leipel da puntos para que te puedas llevar viajes y otros beneficios GRATIS.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="fa fa-gift"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿CÓMO GANO PUNTOS?</h4>
            </div>
            <div class="timeline-body">
                <br>
                <p class="text-center text-justify">Fácil, invita a todo los que puedas y diles que hagan lo mismo, ganarás un punto por cada cliente activo dentro del mes presente. 
                <br>
                <br>
                *Cliente activo es aquel usuario que compró mínimo un paquete de tickets.
                <br>
                <br> 
                *Se ganan tickets desde el primer hasta el tercer nivel de referidos. 
                <br>
                <br>
                *Se pueden ganar máximo 1000 puntos en el mes, y si, puedes acumularlos.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge success"><i class="fa fa-handshake-o"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">¿CON QUÉ CANJEO LOS PUNTOS?</h4>
              <br>
            </div>
            <div class="timeline-body">
              <p>Por lo general con viajes, sin embargo habràn màs sorpresas. Una vez hayas acumulado los puntos necesarios para lo que deseas, deberàs enviarnos un mail con título CANJE DE PUNTOS a info@leipel.com y en el mail nos escribes tu nombre de usuario y número de cédula, recueda indicarnos en qué vas a canjear los puntos.</p>
            </div>
          </div>
        </li>
    </ul>
</div>
<!--FOOTER STAR -->


<footer class="footer">
    <div class="row col-md-12" id="leipel">
        <div class="col-md-3">
            <h1>
                <img src="<?php echo e(asset('plugins/img/Logo-Leipel.png')); ?>" id="logo">
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
                <!-- <li class="lista">
                    <i class="fa fa-phone text-info "></i>
                    &nbsp;&nbsp;+123 4567 987
                </li>
 -->                <li class="lista">
                    <i class="fa fa-envelope-o text-info"></i>
                    info@leipel.com
                </li>
                <li></li>
            </ul>
        </div>
        <div class="col-md-3" id="sobre">
            <h1>Sobre</h1>
            <ul class="pages">
                <li><a href="<?php echo e(route('queEsLeipel')); ?>" target="_blank">¿Que es Leipel?</a></li>
                <br>
                <li><a href="<?php echo e(route('terminosCondiciones')); ?>" target="_blank">Terminos y condiciones</a></li>
                <br>
                <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register" >Reg&iacute;strate</a></li>
                <br>
                <li><a href="#">Beneficios adicionales</a></li>
                <br>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="col-md-3" id="descubrir">
            <h1> Descubrir</h1>
            <ul class="list">
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">Cine</a></li>
                <br>
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">M&uacute;sica</a></li>
                <br>
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">Lectura</a></li>
                <br>
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">Radio</a></li>
                <br>
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">Tv</a></li>
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
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="<?php echo e(old('email')); ?>" required autofocus>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                                                   name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
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
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/seller_login')); ?>">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="<?php echo e(old('email')); ?>" required autofocus>
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                                                   name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
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
    

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /.LOGIN END -->

<!-- /. REGISTRARSE STAR -->
<div class="modal fade login-register-form row" id="modal-register">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        
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
                    
                    <div id="new_usuario" class="tab-pane fade in active">
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>" id="formR">
                            <?php echo e(csrf_field()); ?>


                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="<?php echo e(old('name')); ?>" placeholder="Nombre">

                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="<?php echo e(old('email')); ?>" placeholder="Correo">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Contraseña">

                                    <?php if($errors->has('password')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>

                                </div>
                            </div>

                            <div class="form-group">
                                
                                

                                <div class="col-md-12">
                                    <input id="password_confirm" type="password" class="form-control"
                                           name="password_confirm" placeholder="Confirmar Contraseña">

                                    <?php if($errors->has('password_confirm')): ?>
                                        <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirm')); ?></strong>
                                    </span>
                                    <?php endif; ?>
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
                    

                    
                    <div id="new_proveedor" class="tab-pane fade">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('ApplysSubmit')); ?>" id="formRP">
                            <?php echo e(csrf_field()); ?>

                            
                            <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
                                
                                <div class="col-md-12">
                                    <div id="mensajeNombreComercial"></div>
                                    <input id="com_name" type="text" class="form-control" name="com_name"
                                           required="required"
                                           placeholder="Nombre comercial" autofocus>
                                    <?php if($errors->has('tlf')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('com_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
                                
                                <div class="col-md-12">
                                    <div id="mensajeNombreContacto"></div>
                                    <input id="contact_name" type="text" class="form-control" name="contact_name"
                                           required="required"
                                           placeholder="Nombre del contacto">
                                    <?php if($errors->has('tlf')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('contact_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
                                
                                <div class="col-md-12">
                                    <div id="mensajeTelefono"></div>
                                    <input id="tlf" type="text" class="form-control" name="tlf" value="<?php echo e(old('tlf')); ?>"
                                           required="required"
                                           placeholder="Teléfono">
                                    <?php if($errors->has('tlf')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('tlf')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" id="description"
                                              required="required"
                                              placeholder="Descripción">
                                    </textarea>
                                    <?php if($errors->has('description')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('description')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                
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
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('content_type')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                                
                                <div class="col-md-12">
                                    <div id="mensajeCorreo"></div>
                                    <input id="email" type="email" class="form-control" name="email" required="required"
                                           placeholder="Correo">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
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
                    

                </div>

            </div>
            <div class="modal-footer" id="modal_footer">
                <div class="text-center">

                </div>

            </div>

        </div>
    

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /. REGISTRARSE END -->



<script src="<?php echo e(asset('plugins/jquery/js/jquery-3.2.1.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrapV3.3/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/jquery/jquery-validation/lib/jquery-3.1.1.js')); ?>"></script>





<script src="<?php echo e(asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/jquery/jquery-validation/dist/jquery.validate.js')); ?>"></script>
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