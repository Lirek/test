<?php $__env->startSection('title','Editar Usuario'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editando
                </div>

                <div class="panel-body">

                    <?php echo Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal']); ?>

                    <?php echo e(Form::token()); ?>


                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('name','Nombres',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::text('name',$user->name,['class'=>'form-control']); ?>

                        </div>
                    </div>

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('last_name','Apellidos',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::text('last_name',$user->last_name,['class'=>'form-control']); ?>

                        </div>
                    </div>

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('email','Correo',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::text('email',$user->email,['class'=>'form-control','readonly']); ?>

                        </div>
                    </div>


                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('ci','Cedula',['class'=>'control-label']); ?>

                        </div>

                        <div class="col-md-6 control-label">
                            <?php echo Form::text('ci',$user->ci,['class'=>'form-control']); ?>

                        </div>
                    </div>


                    
                    <div class="form-group ">
                    <div class="col-md-4 control-label">
                    <?php echo Form::label('img_doc','Imagen del Documento',['class'=>'control-label']); ?>

                    </div>
                    <div class="col-md-6 control-label">
                    <?php echo Form::file('img_doc',$user->img_doc,['class'=>'form-control-file','control-label']); ?>

                    </div>
                    </div>

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('num_doc','Genero',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::select('type',['M'=>'Masculino', 'F'=>'Femenino'],$user->type,['class'=>'form-control','placeholder'=>'seleccione una opcion','control-label']); ?>

                        </div>
                    </div>

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('alias','Alias',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::text('alias',$user->alias,['class'=>'form-control']); ?>

                        </div>
                    </div>

                    
                    <div class="form-group ">
                         <div id="image-preview" style="border:#000000 1px solid; background-image={{asset($user->img_perf})}; background-size:240px 240px;" class="col-md-6">
                             <label for="image-upload" id="image-label">Imagen de Perfil</label>
                             <input type="file" name="img_perf" id="image-upload" accept=".jpg" required>
                         </div>
                    </div>

                   

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('fech_nac','Fecha de nacimiento',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::date('fech_nac',$user->fech_nac,['class'=>'form-control']); ?>

                        </div>
                    </div>

                    
                    
                    
                    
                    
                    
                    
                    
                    

                    
                    <div class="form-group text-center">
                        <?php echo Form::submit('Editar', ['class' => 'btn btn-primary active']); ?>

                    </div>


                    <?php echo Form::close(); ?>


                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script type="text/javascript">

$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>