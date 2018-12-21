<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>



    <div class="row">
    <div class="card col s12 m12" style="padding: 10px 10px 10px 10px;">

		<h4 class="titelgeneral"><i class="material-icons small">tv</i> Televisión</h4>
		<div class="row">
			<div class="input-field col s12 m6 offset-m3">
				<form method="POST"  id="SaveSong" action="<?php echo e(url('SearchPlayTv')); ?>">
					<?php echo e(csrf_field()); ?>

					<i class="material-icons prefix blue-text">search</i>
					<input type="text" id="seach" name="seach" class="validate">
					<input type="hidden" name="type" id="type">

					<br>
					<button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
				</form>
			</div>
		</div>

            <div class="row">
            <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s6 m3">
                        <div class="card">
                            <div class="card-image">
                                <a href="<?php echo e(url('PlayTv/'.$tv->id)); ?>"><img src="<?php echo e(asset($tv->logo)); ?>" width="100%" height="170px"></a>
                                <a  href="<?php echo e(url('PlayTv/'.$tv->id)); ?>" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">live_tv</i></a>
                            </div>
                            <div class="card-content">
                                <h6 class="truncate grey-text"><?php echo e($tv->name_r); ?></h6>
                            </div>
                        </div>
                    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
		</div>
    </div>






<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

	<script type="text/javascript">

			$(document).ready(function(){
				$('#seach').keyup(function(evento){
					$('#buscar').attr('disabled',true);
				});
				$('#buscar').attr('disabled',true);
				  $('#seach').autocomplete({
					source: "SearchTv",
					minLength: 2,
					select: function(event, ui){
						$('#seach').val(ui.item.value);
						var valor = ui.item.value;
					  	console.log(valor);
						if (valor=='No se encuentra...'){
							$('#buscar').attr('disabled',true);
							swal('Tv no se encuentra regitrada','','error');
						}else{
							$('#buscar').attr('disabled',false);
						}
					}

			   });
			  });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>