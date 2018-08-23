<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/AdminLTE.min.css')); ?>">


    
    <meta name="description" content="Circular Content Carousel with jQuery"/>
    <meta name="keywords" content="jquery, conent slider, content carousel, circular, expanding, sliding, css3"/>
    <meta name="author" content="Codrops"/>
    
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Leipel')); ?></title>

    <!-- Styles -->
    
    

    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/index/css/index.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/index/css/content1.css')); ?>">

    <link rel="stylesheet" type="text/css"
          href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>


</head>
<body>

<!-- NAVBAR STAR-->


<nav class="navbar ">
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
                <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">INICIAR SESION</a></li>
                <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register">REGRISTRATE</a></li>
            </ul>
        </div>
    </div>
</nav>


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

<!-- SLIDER END-->


<!--CONTENIDO STAR-->
<div class="col-md-12" id="contentRadio">
    <div class="row">
        <h1 class="text-center"> RADIOS RECIENTES </h1>

        
        <?php $__currentLoopData = $radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <figure class="snip1166 navy hover">
                    
                    
                    <img class="img-responsive" src="<?php echo e(asset($r->logo)); ?>" alt="sample73"/>
                    <figcaption>
                        <h3><?php echo e($r->name_r); ?></h3>
                        <div>
                            <p><?php echo e($r->email_c); ?></p>
                        </div>
                        <a href="#"></a>
                    </figcaption>
                </figure>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</div>
<!--CONTENIDO END-->

<!--FOOTER STAR -->

<footer class="footer container">
    <div class="row col-md-12" id="leipel">
        <div class="col-md-3">
            <h1>
                <img src="<?php echo e(asset('plugins/img/Logo-Leipel.png')); ?>" id="logo">
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
                    <textarea class="form-control " name="message" rows="4" data-rule="required"
                              data-msg="Please write something for us" placeholder="Mensaje"></textarea>
                </div>
                <div class="col-md-offset-7">
                    <a class="btn btn-info active" name="contact" style="background: #21a4de">Enviar</a>
                </div>

            </form>
        </div>
    </div>
</footer>
<hr/>
<div class="container-fluid text-warning">
    <div class="row col-md-12">
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
    </div>
</div>

<!--FOOTER END -->

<!-- Scripts -->

<!-- /.LOGIN USER STAR -->
<div class="modal fade login-register-form row" id="modal-login">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        
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

                                <a href="login/google" class="btn btn-google">
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
<!-- /.LOGIN USER END -->

<!-- /.LOGIN REGISTER STAR -->
<div class="modal fade login-register-form row" id="modal-register">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center"></h4>
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
<!-- /.LOGIN REGISTER END -->




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
    $("#formRP")({

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
        });
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

    )}
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