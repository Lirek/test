<style type="text/css">
#image-preview {
  width: 400px;
  height: 400px;
  position: relative;
  overflow: hidden;
  background-color: #ffffff;
  color: #ecf0f1;
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

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/single_registration')); ?>" enctype="multipart/form-data">
<input type="hidden" name="seller_id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>">
<?php echo e(csrf_field()); ?>


<div class="row" style="margin-left: 30px;">

    <div class="col-sm-7">
    
     <div class="box box-primary">
                <div class="box-header with-border">
                     <h3 class="box-title">Single</h3>
                </div>

        <div class="box-body">
     
          <input type="text" name="song_n" id="song_n" placeholder="Nombre de la Cancion" class="form-control" oninvalid="this.setCustomValidity('Ingrese un Nombre Valido')"
                          oninput="setCustomValidity('')" required>
          <input type="number" name="cost" id="name1" class="form-control" placeholder="Costo en Tickets" required  oninvalid="this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 100')"
                          oninput="setCustomValidity('')" pattern="{1-3}">
          
          <input type=button onClick=getFile.simulate() value="Adjuntar Cancion">
          <label id=selected></label><br>
          <input type="file" accept=".mp3" name="audio" style="visibility: hidden;" id=choose>

                        
                        <label for="tags"> 
                         Generos
                         </label>
                         
                         <select name="tags[]" multiple="true"  class="form-control js-example-basic-multiple" required>
                             <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php if($genders->type_tags=='Musica'): ?>
                             <option value="<?php echo e($genders->id); ?>"><?php echo e($genders->tags_name); ?></option>
                             <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
     
                         <label for="artist"> 
                         Artista
                         </label>
                        <select name="artist" class="form-control js-example-basic-single" required>
                        <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>

                         <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>   

        </div>
     
     
     </div>
    
    
    
    
    </div>


</div>



</form>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    
var getFile = new selectFile;
getFile.targets('choose','selected');

$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>