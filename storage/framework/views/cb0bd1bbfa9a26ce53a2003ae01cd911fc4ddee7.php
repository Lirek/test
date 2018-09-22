<?php $__env->startSection('main'); ?>  
 <style>
        #image-preview {
            width: 180px;
            height: 180px;
            position: relative;
            overflow: hidden;
            color: #2b81af;
            padding: 0px 15px;
        }

        #image-preview input {

            position: absolute;
            opacity: 0;
            z-index: 10;
        }

</style>

<div class="row">
<div class="form-group"> 
    <div class="row-edit">
	<h4><i class="fa fa-angle-right"></i> Modificar Perfil</h4>
	<div class="col-md-12 col-sm-12 mb">
		<div class="form-group">
			<?php echo Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']); ?>

             <?php echo e(Form::token()); ?>


                
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <img src="<?php echo e(asset('plugins/img/estatica.jpg')); ?>" style="position: absolute;" name='perf' alt="your image" width="1105" height="310">
                            <label for="image-upload" 
                            style="background-color: #bdc3c7;             
                            position: absolute;
                            z-index: 3;
                            opacity: 0.8;
                            cursor: pointer;
                            width: 50%;
                            height: 30px;
                            margin-top: 3px;
                            font-size: 13px;
                            line-height: 50px;
                            text-transform: uppercase;
                            top: 0;
                            left: 0;
                            right: 30;
                            bottom: 0;
                            margin: auto;
                            text-align: center;" > Seleccione una imagen </label>
                        </div>
                        <?php echo Form::file('img_poster',['class'=>'form-control-file', 'control-label', 'id'=>'image-upload', 'accept'=>'image/*']); ?>

                        <?php echo Form::hidden('img_posterOld',$user->img_perf); ?>

                        <?php if($user->img_perf): ?>
                            <img id="image-preview" src="<?php echo e(asset($user->img_perf)); ?>" name='perf' alt="your image" >
                        <?php endif; ?>
                        <div class="col-md-10 control-label">
                            <input type='file' class="hidden" name="img_perf" id="image-preview" accept=".jpg" value="$user->img_perf" />
                        </div>
                    </div>


                 
                 <div class="form-group ">
                    <div class="col-md-4  control-label">
                      <?php echo Form::label('name','Nombres',['class'=>'control-label']); ?>

                    </div>
                     <div class="col-md-6  control-label">
                       <?php echo Form::text('name',$user->name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+' ]); ?>

                     </div>
                  </div>


                   <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('last_name','Apellidos',['class'=>'control-label']); ?>

                         </div>
                        <div class="col-md-6 control-label"> 
                            <?php echo Form::text('last_name',$user->last_name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+']); ?>

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
                            <?php if($user->num_doc): ?>
                            <?php echo Form::text('ci',$user->num_doc,['class'=>'form-control','readonly']); ?>

                            <?php else: ?>
                            <?php echo Form::text('ci',$user->num_doc,['class'=>'form-control', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']); ?>

                            <?php endif; ?>
                        </div>
                    </div>

                    

                     <div class="form-group ">
                         <div id="image-preview" class="col-md-4 control-label">
                             <label for="image-upload" id="image-label">Imagen de Documento</label>
                        </div>
                        <div  class="col-md-4">
                            <?php if($user->img_doc): ?>
    							<img id="preview_img_doc" src="<?php echo e(asset($user->img_doc)); ?>" name='ci' alt="your image" width="180" height="180" />
                            <?php endif; ?>
    							<div class="col-md-10 control-label">
    							     <input type='file' name="img_doc" id="img_doc" accept=".jpg" value="$user->img_doc"/>
    							</div>
                         </div>
                    </div>

                    
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('num_doc','Sexo',['class'=>'control-label']); ?>

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
                        <div class="col-md-4 control-label">
                            <?php echo Form::label('fech_nac','Fecha de nacimiento',['class'=>'control-label']); ?>

                        </div>
                        <div class="col-md-6 control-label">
                            <?php echo Form::date('fech_nac',$user->fech_nac,['class'=>'form-control', 'max' =>date('Y-m-d')]); ?>

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
</div>  

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script type="text/javascript">

//---------------------------------------------------------------------------------------------------
// Para que se vea la imagen en el formulario
    function archivo(evt) {
      var files = evt.target.files;
      for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
             document.getElementById("list").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);
        reader.readAsDataURL(f);
      }
  }
  document.getElementById('image-upload').addEventListener('change', archivo, false);
// Para que se vea la imagen en el formulario
//---------------------------------------------------------------------------------------------------

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId= '#preview_'+$(input).attr('id');
                $(imgId).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   
    $("form#edit input[type='file' ]").change(function () {
        readURL(this);
    });

    function controltagLet(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }

    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>