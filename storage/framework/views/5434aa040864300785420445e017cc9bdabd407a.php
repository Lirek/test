

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

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="thumbnail">
            <img src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>" alt="242x200">
                <div class="caption">
                    <h2  align="center">Solicitud</h2>
                    
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('ApplysSubmit')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>



        <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
            <label for="tlf" class="col-md-6 control-label">Nombre Comercial</label>

            <div class="col-md-6">
                <input id="com_name" type="text" class="form-control" name="com_name" required autofocus>

                <?php if($errors->has('tlf')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('com_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
            <label for="tlf" class="col-md-6 control-label">Nombre del Contacto</label>

            <div class="col-md-6">
                <input id="tlf" type="text" class="form-control" name="contact_name" required autofocus>

                <?php if($errors->has('tlf')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('contact_name')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
            <label for="tlf" class="col-md-6 control-label">Telefono</label>

            <div class="col-md-6">
                <input id="tlf" type="text" class="form-control" name="tlf" value="<?php echo e(old('tlf')); ?>" required autofocus>

                <?php if($errors->has('tlf')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('tlf')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-6 control-label">Email</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" required>

                <?php if($errors->has('email')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('email')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <div align="center">
                <button type="submit" class="btn btn-primary">
                    Solicitar
                </button>
            </div>
        </div>
    </form>
                
                </div>
        </div>
    </div>
</div>

</body>
</html>