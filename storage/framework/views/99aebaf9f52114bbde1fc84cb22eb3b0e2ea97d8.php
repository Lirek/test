<?php $__env->startSection('main'); ?>

 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Tickets Vendidos</h2>
 </div>

<div class="row mt">
	    <div class="col-lg-12">
		<div class="content-panel">
			<table class="display responsive no-wrap" width="100%" id="Tickets">            
				<thead>
		        <tr>
		          <th class="non-numeric">Id</th>
		          <th class="non-numeric">Usuario</th>
		          <th class="non-numeric">Monto</th>
		          <th class="non-numeric">Cantidad</th>
				  <th class="non-numeric">Metodo</th>
		          <th class="non-numeric">Paquete</th>
		          <th class="non-numeric">Fecha</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">

	$(document).ready(function(){

		var Tickets = $('#Tickets').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '<?php echo url('TicketsSalesDataTable'); ?>',
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'user_id', name: 'user_id'},
	            {data: 'cost', name: 'cost'},
	            {data: 'value', name: 'value'},
	            {data: 'voucher', name: 'voucher'},
	            {data: 'package_id', name: 'package_id'},
	            {data: 'created_at', name: 'created_at'},
	        ]
	    });

	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>