<!DOCTYPE html>
<html lang="es">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">

        <title>LEIPEL</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
        <!--external css-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo e(asset('plugins/telefono/intlTelInput.css')); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/css/zabuto_calendar.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/js/gritter/css/jquery.gritter.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/lineicons/style.css')); ?>">    
        
        <!-- Custom styles for this template -->
        <link href="<?php echo e(asset ('assets/css/style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('assets/css/style-responsive.css')); ?>" rel="stylesheet">

        <script src="<?php echo e(asset ('assets/js/chart-master/Chart.js')); ?>"></script>
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        
  </head>

  <body>
      
      <div id="login-page">
        <div class="container">
        
              <form class="form-login"method="POST" action="<?php echo e(url('/promoter_login')); ?>">
                <?php echo e(csrf_field()); ?>

                <h2 class="form-login-heading">Ingresar</h2>
                <div class="login-wrap">
                    
                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                        <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    
                    </div>
                    <br>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                        <input type="password" class="form-control" placeholder="Contraseña" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                    </div>
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" href="login.html#myModal">Olvido Su Contraseña</a>
        
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> Ingresar</button>
                    <hr>
                    

        
                </div>
        

              </form>       
        
        </div>
      </div>




    <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('plugins/telefono/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/telefono/utils.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo e(asset('assets/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollTo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.sparkline.js')); ?>"></script>


    <!--common script for all pages-->
    <script src="<?php echo e(asset('assets/js/common-scripts.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter/js/jquery.gritter.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter-conf.js')); ?>"></script>

    <!--script for this page-->
    <script src="<?php echo e(asset('assets/js/sparkline-chart.js')); ?>"></script>    
    <script src="<?php echo e(asset('assets/js/zabuto_calendar.js')); ?>"></script> 
    <script src="<?php echo e(asset('assets/js/jquery.backstretch.min.js')); ?>"></script> 
    <script>
        $.backstretch("sistem_images/promoter_assing.png", {speed: 500});
    </script>
  </body>

</html>