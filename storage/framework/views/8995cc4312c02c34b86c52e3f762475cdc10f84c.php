<?php $__env->startSection('main'); ?>
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Musicos y Agrupaciones Musicales</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered table-striped table-condensed" id="Musician">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
		          <th class="non-numeric">Avatar</th>
		          <th class="non-numeric">Tipo</th>
				  <th class="non-numeric">Pais</th>
		          <th class="non-numeric">Descripcion</th>
		          <th class="non-numeric">Proveedor</th>
		          <th class="non-numeric">Redes Sociales</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('promoter.modals.MusicianViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
	$(document).ready(function(){

		var MusicianTable = $('#Musician').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '<?php echo url('MusicianData'); ?>',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'photo', name: 'photo',  orderable: false, searchable: false},
	            {data: 'type_authors', name: 'type_authors'},
	            {data: 'country', name: 'country'},
	            {data: 'descripcion', name: 'descripcion'},
	            {data: 'seller.name', name: 'seller.name'},
	            {data: 'SocialMedia', name: 'SocialMedia',orderable: false, searchable: false},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>