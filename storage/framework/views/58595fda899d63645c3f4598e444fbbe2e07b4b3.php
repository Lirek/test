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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('SellerRegister')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                            
                         <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        
                        <div class="form-group<?php echo e($errors->has('tlf') ? ' has-error' : ''); ?>">
                            <label for="tlf" class="col-md-4 control-label">Telefono</label>

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
                            <label for="desc" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="dsc" required>
                                    
                                </textarea>

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ruc" class="col-md-4 control-label">Registro Unico de Contribuyente</label>

                            <div class="col-md-6">
                                <input id="ruc" type="text" class="form-control" name="ruc" required>

                                <?php if($errors->has('ruc')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ruc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adj_ruc" class="col-md-4 control-label">Imagen del RUC</label>

                            <div class="col-md-6">
                                    <input type="file" name="adj_ruc"/>
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
                            <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Completar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

