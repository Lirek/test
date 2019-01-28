<?php $__env->startSection('main'); ?>
<div class="row">
	<span class="card-title grey-text"><h3>Pagos de Proveedores</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="porCobrar"><a class="active" href="#test1">Pagos por cobrar</a></li>
		<li class="tab" id="diferido"><a href="#test2">Pagos diferidos</a></li>
		<li class="tab" id="pagado"><a href="#test3">Pagos pagados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Información del proveedor</th>
				<th><i class="material-icons"></i>Imagen de factura</th>
				<th><i class="material-icons"></i>Fecha para el retiro</th>
				<th><i class="material-icons"></i>Tickets solicitados / Tickets disponibles</th>
				<th><i class="material-icons"></i>Opciones</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
</div>
<?php echo $__env->make('promoter.modals.PaymentsSellerViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

		function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "<?php echo e(url('PaymentsDataTable')); ?>"+"/"+parametros;
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
						if (info.seller.name) {
							var inProveedor = 
							"<button href='#ModalSeller' class='modal-trigger' value='"+info.seller.id+"' id='seller' style='display:inline; text-decoration:underline; background:none; background:none;border:0; padding:0; margin:0;'>"+info.seller.name+
							"</button>"
						}
						if (info.factura_id!=0 ) {
							var factura = 
							"<img class='materialboxed' width='150' height='120' src='<?php echo asset('"+info.factura+"'); ?>'";
						} else {
							var factura = "No aplica ";
						}
						if (info.fecha_cita!=null) {
				        	var cita = moment(info.fecha_cita).format('DD/MM/YYYY');
				        } else {
				        	var cita = "cita no asignada ";
				        }
				        if (info.tickets!=null) {
				        	var ticket = info.tickets+" / "+info.credito;
				        } else {
				        	var ticket = "sin tickets disponibles ";
				        }
				        if (info.status=="Por cobrar") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='Por cobrar' href='#myModal' id='status'>Pagar o revertir</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='Por cobrar' href='#negado' id='denegado'>ver negaciones</button>"
				        }
				        if (info.status=="Diferido") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='Diferido' href='#myModal' id='status'>Pagar o revertir</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='Por cobrar' href='#negado' id='denegado'>ver negaciones</button>"
				        }
				        if (info.status=="Pagado") {
				        	var opcion = "<button class='btn curvaBoton green' value='"+info.id+"' value2=''  id='pagado'>Pagado</button>"
				        }
						var filas = "<tr><td>"+
						inProveedor+"</td><td>"+
						factura+"</td><td>"+
						cita+"</td><td>"+
						info.tickets+" / "+info.seller.credito+"</td><td>"+
						opcion+"</td></tr>";
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
				}
			});
		}
		$(document).ready(function(){
			listado("Por cobrar");
		});
		$(document).on('click','#porCobrar', function() {
			listado("Por cobrar");
		});
		$(document).on('click','#diferido', function() {
			listado("Diferido");
		});
		$(document).on('click','#pagado', function() {
			listado("Pagado");
		});

		// modificar el estatus del pago
		$(document).on('click','#status', function() {
			var idPago = $(this).attr("value");
			var s = $(this).attr('value2');
			$("#FormStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
				if (status=="Rechazado") {
					s = status;
				}
	            var url = "<?php echo e(url('/admin_payments/')); ?>/"+idPago;
	            var message = $('#razon').val();
	            e.preventDefault();
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
					url: url,
					type: 'post',
					data: {
						_token: $('input[name=_token]').val(),
						status: s,
						message: message,
					}, 
					success: function (result) {
						console.log(result);
						swal("Se ha "+status+" con éxito","","success")
						.then((recarga) => {
							location.reload();
						});
					},
					error: function (result) {
						swal('Existe un error en su solicitud','','error')
						.then((recarga) => {
							location.reload();
						});
						console.log(result);
					}
				}); 
			});
		});

		// Listar las negaciones
		$(document).on('click', '#denegado', function(e) {
			var id = $(this).attr("value");
			var modulo = "Payments Seller";
			var url = "<?php echo url('viewRejection/"+id+"/"+modulo+"'); ?>";
			console.log(url);
			$("#negaciones").empty();
				e.preventDefault();
				$.ajax({
					url: url, 
					type:'get', 
					dataType:'json',
					success: function(datos){
						console.log(datos);
						$('#totalNegaciones').show();
						$('#totalNegaciones').text('tiene un total de rechazos de: '+datos.length);
						$.each(datos, function(i,info){
							var fila = '<tr><td>'+
							info.reason+'</td><td>'+
							moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+
							'</td></tr>';
							$('#negaciones').append(fila);
						});
					},
					error: function (datos) {
					console.log(datos);
					swal('Existe un error en su solicitud','','error')
					.then((recarga) => {
						location.reload();
					});
				}
			});
		});
		// Listar las negaciones

		// mostrar informacion del proveedor
		$(document).on('click', '#seller', function() {
			var idSeller = $(this).val();
			var url = "<?php echo e(url('/infoSeller/')); ?>/"+idSeller;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					if (result.logo!=null) {	
						var logoProveedor = "<?php echo e(asset('/')); ?>/"+result.logo;
						$("#logoProveedor").attr('src',logoProveedor);
					} else {
						$("#logoProveedor").attr('src',"<?php echo e(asset('plugins/img/sinPerfil.png')); ?>");
					}
					$("#nombreProveedor").text(result.name);
					$("#correoProveedor").text(result.email);
					$("#telefonoProveedor").text(result.tlf);
					$("#rucProveedor").text(result.ruc_s);
					if (result.adj_ruc!=null) {	
						var imgRucProveedor = "<?php echo e(asset('/')); ?>/"+result.adj_ruc;
						$("#imgRucProveedor").attr('src',imgRucProveedor);
					} else {
						$("#imgRucProveedor").hide();
						$("#mensajeImgRucProveedor").text("No tiene su imagen de RUC registrada");
					}
				},
				error: function (result) {
					console.log(result);
					swal('Existe un error en su solicitud','','error')
					.then((recarga) => {
						location.reload();
					});
				}
			}); 
		});
		// mostrar informacion del proveedor


	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>