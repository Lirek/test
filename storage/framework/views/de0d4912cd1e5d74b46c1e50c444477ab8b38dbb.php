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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Cadena de Publicaciones</div>
                <div class="panel-body">
                    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/type')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="seller_id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>">


                        <div class="form-group">
                            <label for="art_name" class="col-md-4 control-label">Titulo De La Cadena de Publicacion</label>

                            <div class="col-md-6">
                                <input id="art_name" type="text" class="form-control" name="title" required autofocus>
                            </div>
                        </div>



                        <div class="form-group col-md-6">
                         
                         <label for="tags"> 
                         Generos
                         </label>
                         
                         <select name="tags[]" multiple="true"  class="form-control js-example-basic-multiple">
                             <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                             <option value="<?php echo e($genders->id); ?>"><?php echo e($genders->tags_name); ?></option>
                             
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </select>
                        
                            
                           <div id="image-preview">
                          <label for="image-upload" id="image-label">Caratula</label>
                          <input type="file" name="image" id="image-upload" class="form-control" />
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
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

 $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});



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