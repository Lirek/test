<?php $__env->startSection('content'); ?>

<div class="container">
	
	<embed id="iframepdf" src="<?php echo e($pdf); ?>" width="500" height="375" type='application/pdf'> 	</embed>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>