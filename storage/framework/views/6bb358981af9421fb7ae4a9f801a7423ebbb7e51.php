<?php $__env->startSection('css'); ?>

    <style>
        #image-preview {
            width: 400px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registro
        </h1>
        
        
        
        
    </section>

    <!-- Main content -->
    <section class="content">

        <?php if(count($errors)>0): ?>
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li> <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-primary ">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Canal o Tv</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo Form::open(['route'=>'tvs.store', 'method'=>'POST','files' => 'true' ]); ?>

                    
                    <?php echo e(Form::token()); ?>


                    <div class="box-body ">

                        
                        <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Tv Logo o Foto </label>
                            <?php echo Form::file('logo',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']); ?>


                        </div>

                        <div class="form-group col-md-4">
                            
                            <label for="exampleInputFile" class="control-label">Nombre del canal</label>
                            <?php echo Form::text('name_r',null,['class'=>'form-control autofocus','placeholder'=>'nombre del canal'],['id'=>'exampleInputFile']); ?>


                            
                            <label for="exampleInputPassword1" class="control-label">Url del canal</label>
                            <?php echo Form::text('streaming',null,['class'=>'form-control','placeholder'=>'https://www.youtube.com/embed/IUWOk1fxD-Y'],['id'=>'exampleInputFile']); ?>


                            
                            <label for="exampleInputEmail1">Correo electronico</label>
                            <input type="email" name="email_c" class="form-control" id="exampleInputEmail1"
                                   placeholder="example@gmail.com">
                        </div>
                        <br/>

                        
                        <div class="form-group col-sm-3">

                            
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                <?php echo Form::text('google',null,['class'=>'form-control','placeholder'=>'Google+'],['id'=>'exampleInputFile']); ?>

                            </div>
                            
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                <?php echo Form::text('instagram',null,['class'=>'form-control','placeholder'=>'Instagram'],['id'=>'exampleInputFile']); ?>

                            </div>
                            
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                                <?php echo Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook']); ?>

                            </div>

                            
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                <?php echo Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Twitter'],['id'=>'twitter']); ?>

                            </div>

                        </div>
                        

                    </div>
                    <!-- /.box-body -->

                </div>
                <div class="text-center">
                    
                    <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary active']); ?>

                </div>
                <?php echo Form::close(); ?>


            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>