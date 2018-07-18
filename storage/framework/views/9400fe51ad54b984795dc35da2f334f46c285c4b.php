<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leipel</title>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bubbles/movingbubbles.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/AdminLTE.min.css')); ?>">    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.css')); ?>">
          
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('plugins/bubbles/movingbubbles.js')); ?>" type="text/javascript"></script>
</head>

<body>
<?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="margin-top: 30px">
        <div class="thumbnail">
            <img src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>" alt="242x200">
                <div class="caption">
                    <h2  align="center">Ingresar</h2>
                    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
 <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form role="form" method="POST" action="<?php echo e(url('/seller_login')); ?>">
                    <?php echo e(csrf_field()); ?>

                        
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="control-label">Correo</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="control-label">Contraseña</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div align="center">
                                <button type="submit" class="btn btn-success">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="<?php echo e(url('/seller_password/reset')); ?>">
                                    Olvido su Contraseña                                </a>
                            </div>
                        </div>

                    </form>
                
                </div>
        </div>
    </div>
</div>
<div align="center">
<a href="<?php echo e(url('/applys')); ?>" >
<button class="btn btn-info">
                                    Solicitar Cuenta 
                                            de
                                        Proveedor
</button>
</a>
</body>
</html>
