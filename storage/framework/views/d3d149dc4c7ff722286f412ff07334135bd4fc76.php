<?php $__env->startSection('content'); ?>

<div class="container">
	
	<div class="row">
		<h1>Comprar Single <?php echo e($Single->song_n); ?></h1>
		<h2>Con Un Costo de <?php echo e($Single->cost); ?></h2>

		<form action="<?php echo e(url('SaveSong')); ?>" method="POST">
			
			<input type="text" name="Single" value="<?php echo e($Single->id); ?>" hidden>

			<button type="submit" class="btn btn-primary">
                                    Registrar
            </button>

		</form>
	</div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>