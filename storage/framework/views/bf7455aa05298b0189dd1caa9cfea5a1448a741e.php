	<?php $__env->startSection('content'); ?>
	<div class="container">
		
		<div class="row">
			
		<?php $__currentLoopData = $Books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4">
			
			  <div class="card">
    		 	<img src="/images/bookcover/<?php echo e($Book->cover); ?>" alt="portada" style="width:100%">
        		<div class="container-card" style="background-color: gray">
          			<h4><b><?php echo e($Book->title); ?></b></h4> 
            			<p>·Costo<?php echo e($Book->cost); ?></p>
             			<p>·Autor <?php echo e($Book->author->full_name); ?></p>
             			<p>·Sinopsis: 
             				<?php echo e($Book->sinopsis); ?>

             			</p>
                  	<a href="<?php echo e(url('Read/'.$Book->id)); ?>"><button class="btn btn-primary btn-xs" id="book" style="background-color: #13ec58"><i class="fa fa-book"></i>   Leer
                  	</button></a>
            	</div>
       		 </div>

     	    </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>	
	<?php if($Megazines != 0): ?>		
		<div class="row">
			<?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Megazine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<div class="col-md-4">
			
			  <div class="card" style="margin-left: 12px; margin-top: 12px">
    		 	<img src="<?php echo e(asset($Megazine->cover)); ?>" alt="portada" style="width:100%">
        		<div class="container-card" style="background-color: gray">
          			<h4><b><?php echo e($Megazine->title); ?></b></h4> 
            			<p>·Costo<?php echo e($Megazine->cost); ?></p>
             			<p>·Proveedor <?php echo e($Megazine->Seller->name); ?></p>
             			<p>·Sinopsis: 
             				<?php echo e($Megazine->descripcion); ?>

             			</p>
                  	<button value1="<?php echo e($Megazine->id); ?>" value2="<?php echo e($Megazine->title); ?>" value3="<?php echo e($Megazine->cost); ?>" data-toggle="modal" data-target="#BuyBook" class="btn btn-primary btn-xs" id="book" style="background-color: #13ec58"><i class="fa fa-ticket"></i> <?php echo e($Megazine->cost); ?>  Comprar
                  	</button>
            	</div>
       		  </div>
     	    </div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

	</div>
  <?php endif; ?>
	<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>


		
</script>		

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>