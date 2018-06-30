<?php $__env->startSection('content'); ?>

<div class="container">
	   <div class="row">
       <input id="myInput" type="text" placeholder="Buscar">
     </div>
  
<div class="row">
	<div id="myDIV" class="col-md-8">
			 
			 <?php if($Singles != 0): ?>

        <?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 	
              		<div class="col-md-3 <?php echo e($Single->song_name); ?>" style="border-color: black;border: 12px;" id="<?php echo e($Single->id); ?>">
              			<img src="<?php echo e(asset($Single->autors->photo)); ?>" style="width: 20%; height: 20%;">
              			<div class="container">
              				<h4><b><?php echo e($Single->song_name); ?></b></h4>
              				<p><?php echo e($Single->autors->name); ?></p>
              				<p><?php echo e($Single->duration); ?></p>
              				<p><button style="background-color: #13ec58"><i class="fa fa-plus" value="<?php echo e($Single->song_file); ?>"></i>Añadir al Playlist</button></p>

              			</div>
              		</div>
             	
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
          <h1>No Posee Singles</h1>
       <?php endif; ?>
        
       <?php if($Albums != 0): ?>
          
          <?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             	
        
             	
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          <?php else: ?>
          <h1>No Posee Albumes Comprados</h1>

       <?php endif; ?>

  </div>

</div>



</div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>