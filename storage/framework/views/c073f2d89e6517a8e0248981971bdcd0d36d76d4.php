<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Leipel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/login3.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/slick-team-slider.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/css/style.css')); ?>">
        <link href="<?php echo e(asset('views/css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    </head>
<body>
 <!--HEADER START-->
  <div class="main-navigation navbar-fixed-top">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('plugins/img/Logo-Leipel.png')); ?>" width="150" height="50" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo e(url('/')); ?>">Inicio</a></li>
            <li><a href="<?php echo e(url('/login')); ?>">Iniciar Sesion</a></li>
            <li><a href="<?php echo e(url('/register')); ?>">Registrarse</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                                </form>
                            </div>
                            </div>
                            <div class="row">
                                <a href="login/facebook" class="btn btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                    Inicio de Sesion con Facebook
                                </a>

                                <a href="login/twitter" class="btn btn-twitter">
                                     <i class="fa fa-twitter"></i>
                                        Inicio de Sesion con Twitter
                                </a>

                                <a href="login/google" class="btn btn-google">
                                    <i class="fa fa-google-plus"></i>
                                        Inicio de Sesion con Google
                                </a>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel-footer text-center">
                    <a href="login/facebook" class="btn btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Login con Facebook
                    </a>

                    <a href="login/twitter" class="btn btn-twitter">
                        <i class="fa fa-twitter"></i>
                        Login con Twitter
                    </a>

                    <a href="login/google" class="btn btn-google">
                        <i class="fa fa-google-plus"></i>
                        Login con Google
                    </a>

                    
                        
                        
                        
                        
                    
                </div>


<!--Seccion de Scripts-->
       <script src="<?php echo e(asset('plugins/js/bootstrap.min.js')); ?>"></script>
       <script src="<?php echo e(asset('plugins/js/custom.js')); ?>"></script>
       <script src="<?php echo e(asset('plugins/js/jquery.easing.min.js')); ?>"></script>
       <script src="<?php echo e(asset('plugins/js/jquery.min.js')); ?>"></script>
       <script src="<?php echo e(asset('plugins/js/slick.min.js')); ?>"></script>
       <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>


