<?php $__env->startSection('main'); ?>
	<span class="card-title grey-text"><h3>Pagos de los usuarios</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="denegado"><a class="active" href="#test1">Pagos denegados</a></li>
		<li class="tab" id="revision"><a href="#test2">Pagos en revisión</a></li>
		<li class="tab" id="aprobado"><a href="#test3">Pagos aprobados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Cliente</th>
				<th><i class="material-icons"></i>Paquete</th>
				<th><i class="material-icons"></i>Cantidad</th>
				<th><i class="material-icons"></i>Costo</th>
				<th><i class="material-icons"></i>Recibo</th>
				<th><i class="material-icons"></i>N° de referencia</th>
				<th><i class="material-icons"></i>Factura</th>
				<th><i class="material-icons"></i>Método</th>
				<th><i class="material-icons"></i>Fecha</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<script>
		function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "<?php echo e(url('paymentsClients')); ?>"+"/"+parametros;
			var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
			swal({
				title: "Procesando la información",
				text: "Espere mientras se procesa la información.",
				icon: gif,
				buttons: false,
				closeOnEsc: false,
				closeOnClickOutside: false
			});
			$.ajax({
				url: ruta,
				type:'GET',
				dataType: "json",
				success: function (data) {
					swal.close();
					console.log(data);
					$.each(data,function(i,info) {
						if (info.factura_id!=null) {
							var factura = 
							"<a href='https://app.datil.co/ver/"+info.factura_id+"/ride' target='_blank' class='btn btn-floating btn-small waves-effect waves-light green tooltipped' data-position='right' data-tooltip='Ver factura'>"+
								"<i class='small material-icons right'>remove_red_eye</i>"+
							"</a>"
						} else if (info.factura_id==null && info.method!="Puntos"){
							var factura = 
							"<a class='btn btn-floating btn-small waves-effect waves-light green tooltipped' onclick='generarFactura("+info.id+")' data-position='right' data-tooltip='Generar factura'>"+
								"<i class='material-icons'>add</i>"+
								"Crear"+
							"</a>";
						} else {
							var factura = "No aplica ";
						}
						if (info.reference!=0) {
							var reference = info.reference;
						} else {
							var reference = "No aplica ";
						}
						if (info.voucher==0 && info.method!="Depósito") {
							var voucher = "No aplica";
						} else {
							var voucher = 
							"<img class='materialboxed' width='150' height='120' src='<?php echo asset('"+info.voucher+"'); ?>'";
						}
						var filas = "<tr><td>"+
						info.tickets_user.name+" "+info.tickets_user.last_name+"</td><td>"+
						info.tickets.name+"</td><td>"+
						info.value+"</td><td>"+
						info.cost+"</td><td>"+
						voucher+"</td><td>"+
						reference+"</td><td>"+
						factura+"</td><td>"+
						info.method+"</td><td>"+
						info.created_at+"</td></tr>";
						$("#table").append(filas);
					})
					$('.materialboxed').materialbox();
					$('.tooltipped').tooltip();
				},
				error:function(data) {
					swal('Existe un error en su solicitud','','error')
					.then((recarga) => {
						location.reload();
					});
					console.log(data);
				}
			});
		}
		$(document).ready(function(){
			listado("Denegado");
		});
		$(document).on('click','#denegado', function() {
			listado("Denegado");
		});
		$(document).on('click','#revision', function() {
			listado("En Revision");
		});
		$(document).on('click','#aprobado', function() {
			listado("Aprobado");
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>