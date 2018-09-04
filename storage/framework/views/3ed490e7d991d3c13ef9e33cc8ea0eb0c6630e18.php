<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
            				<h3><span class="card-title"><i class="fa fa-angle-right"> Radio</i></span></h3>
            				<div class="col-md-12  control-label">
         						<form method="POST"  id="SaveSong" action="<?php echo e(url('SearchListenRadio')); ?>"><?php echo e(csrf_field()); ?>

                    				<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    				<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>	
       							</form>
       						</div>
       						<?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       						<div class="col-lg-3 col-md-3 col-sm-3 mb" style="margin-top: 2%">
                    			<div class="content-panel pn-music">
                        			<div id="profile-01" style="">
                        				<img src="<?php echo e(asset($radios->logo)); ?>" width="100%" >
                        			</div>
                        			<div class="profile-01 centered">
                            			<p><a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>" style="color: #ffff"><i class="fa fa-play-circle"> Escuchar</i></p></a>
                        			</div>
                        		</div>
                        	</div>
                        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        	<div  class="col-sm-12 col-xs-12 col-md-12">
       						<?php echo e($Radio->links()); ?>

       						</div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">

$(document).ready(function(){
	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchRadio",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Radio no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>