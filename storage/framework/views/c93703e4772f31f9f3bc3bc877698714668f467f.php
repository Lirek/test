<?php $__env->startSection('main'); ?>
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Usuarios Pendientes de Aprobacion</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered table-striped table-condensed" id="Musician">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
		          <th class="non-numeric">Apellido</th>
		          <th class="non-numeric">Tipo Doc</th>
				  <th class="non-numeric">Numero Doc</th>
		          <th class="non-numeric">Imagen del Documento</th>
		          <th class="non-numeric">Fecha de Nacimiento</th>
		          <th class="non-numeric">Genero</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>