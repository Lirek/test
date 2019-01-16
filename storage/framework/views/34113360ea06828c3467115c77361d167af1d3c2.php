<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
	<div class="row mt">
		<h2><i class="fa fa-angle-right"></i>Pagos de Proveedores</h2>
	</div>
	<div class="container">

		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#pendientes" id="opcion1"><h4>Por cobrar</h4></a></li>
			<li><a data-toggle="tab" href="#aprobadas" id="opcion2"><h4>Diferidos</h4></a></li>
			<li><a data-toggle="tab" href="#rechazadas" id="opcion3"><h4>Pagados</h4></a></li>
		</ul>

		<div class="tab-content text-center">
			<div id="pendientes" class="tab-pane fade in active">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="pagos">
							<thead>
								<tr>
						        	<th class="non-numeric">Información del proveedor</th>
						        	<th class="non-numeric">Imagen de factura</th>
									<th class="non-numeric">Fecha para el retiro</th>
									<th class="non-numeric">Tickets solicitados / Tickets disponibles</th>
									<th class="non-numeric">Opciones</th>
						        </tr>
					    	</thead>
					    </table>
					</div>
				</div>
			</div>
		</div>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('promoter.modals.PaymentsSellerViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/jquery.mlens-1.7.min.js')); ?>"></script>
<script>

	$(document).ready(function(){

		// listar los pagos por cobrar
		var pagos = $('#pagos').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,
            bDestroy: true,

	        ajax: '<?php echo url('PaymentsDataTable/Por cobrar'); ?>',
	        columns: [
	        	{data: 'proveedor', name: 'proveedor'},
	            {data: 'img_factura', name: 'img_factura'},
	            {data: 'cita', name: 'cita'},
	            {data: 'tickets', name: 'tickets'},
	            {data: 'opciones', name: 'opciones', orderable: false, searchable: false}
	        ],
	        language: {
	        	"processing": "Procesando...",
	            "lengthMenu" : "Mostrar _MENU_ registros",
	            "zeroRecords" : "No se encontraron resultados",
	            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
	        },
            "order": [[ 2, "desc" ]]
		});
		// listar los pagos por cobrar

		// listar los pagos por cobrar
		$(document).on('click','#opcion1', function() {
			var pagosPorCobrar = $('#pagos').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '<?php echo url('PaymentsDataTable/Por cobrar'); ?>',
		        columns: [
		        	{data: 'proveedor', name: 'proveedor'},
		            {data: 'img_factura', name: 'img_factura'},
		            {data: 'cita', name: 'cita'},
		            {data: 'tickets', name: 'tickets'},
		            {data: 'opciones', name: 'opciones', orderable: false, searchable: false}
		        ],
		        language: {
		        	"processing": "Procesando...",
		            "lengthMenu" : "Mostrar _MENU_ registros",
		            "zeroRecords" : "No se encontraron resultados",
		            "sEmptyTable":     "Ningún dato disponible en esta tabla",
	                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	                "sInfoPostFix":    "",
	                "sSearch":         "Buscar:",
	                "sUrl":            "",
	                "sInfoThousands":  ",",
	                "sLoadingRecords": "Cargando...",
	                "oPaginate": {
	                    "sFirst":    "Primero",
	                    "sLast":     "Último",
	                    "sNext":     "Siguiente",
	                    "sPrevious": "Anterior"
	                },
	                "oAria": {
	                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	                }
		        },
            	"order": [[ 2, "desc" ]]
			});
		});
		// listar los pagos pendientes

		// listar los pagos diferidos
		$(document).on('click','#opcion2', function() {
			var pagosDiferidos = $('#pagos').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '<?php echo url('PaymentsDataTable/Diferido'); ?>',
		        columns: [
		        	{data: 'proveedor', name: 'proveedor'},
		            {data: 'img_factura', name: 'img_factura'},
		            {data: 'cita', name: 'cita'},
		            {data: 'tickets', name: 'tickets'},
		            {data: 'opciones', name: 'opciones', orderable: false, searchable: false}
		        ],
		        language: {
		        	"processing": "Procesando...",
		            "lengthMenu" : "Mostrar _MENU_ registros",
		            "zeroRecords" : "No se encontraron resultados",
		            "sEmptyTable":     "Ningún dato disponible en esta tabla",
	                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	                "sInfoPostFix":    "",
	                "sSearch":         "Buscar:",
	                "sUrl":            "",
	                "sInfoThousands":  ",",
	                "sLoadingRecords": "Cargando...",
	                "oPaginate": {
	                    "sFirst":    "Primero",
	                    "sLast":     "Último",
	                    "sNext":     "Siguiente",
	                    "sPrevious": "Anterior"
	                },
	                "oAria": {
	                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	                }
		        },
            	"order": [[ 2, "desc" ]]
			});
		});
		// listar los pagos diferidos

		// listar los pagos realizados
		$(document).on('click','#opcion3', function() {
			var pagosDiferidos = $('#pagos').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '<?php echo url('PaymentsDataTable/Pagado'); ?>',
		        columns: [
		        	{data: 'proveedor', name: 'proveedor'},
		            {data: 'img_factura', name: 'img_factura'},
		            {data: 'cita', name: 'cita'},
		            {data: 'tickets', name: 'tickets'},
		            {data: 'opciones', name: 'opciones', orderable: false, searchable: false}
		        ],
		        language: {
		        	"processing": "Procesando...",
		            "lengthMenu" : "Mostrar _MENU_ registros",
		            "zeroRecords" : "No se encontraron resultados",
		            "sEmptyTable":     "Ningún dato disponible en esta tabla",
	                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	                "sInfoPostFix":    "",
	                "sSearch":         "Buscar:",
	                "sUrl":            "",
	                "sInfoThousands":  ",",
	                "sLoadingRecords": "Cargando...",
	                "oPaginate": {
	                    "sFirst":    "Primero",
	                    "sLast":     "Último",
	                    "sNext":     "Siguiente",
	                    "sPrevious": "Anterior"
	                },
	                "oAria": {
	                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	                }
		        },
            	"order": [[ 2, "desc" ]]
			});
		});
		// listar los pagos realizados

		// modificar el estaus del pago
		$(document).on('click','#status', function() {
			var idPago = $(this).val();
			console.log(idPago);
			var s = $(this).attr('value2');
			console.log(s);
			$("#formStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
				if (status=="Rechazado") {
					s = status;
				}
	            var url = "<?php echo e(url('/admin_payments/')); ?>/"+idPago;
	            var message = $('#razon').val();
	            console.log(status,url,message);
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
						$('#myModal').toggle();
						$('.modal-backdrop').remove();
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
		// modificar el estaus del pago

		// Modal de la imagen de la factura
		$(document).on('click', '#factura', function() {
			var x = $(this).val();
			var file = $("#factura"+x).attr("src");
			console.log(file);
			$("#photo_factura").attr("src", file);
			$("#photo_factura").attr("data-big", file);
			$("#photo_factura").mlens({
				imgSrc: $("#photo_factura").attr("data-big"),    // path of the hi-res version of the image
				imgSrc2x: $("#photo_factura").attr("data-big2x"),  // path of the hi-res @2x  version of the image
                                                  //for retina displays (optional)
                lensShape: "square",                // shape of the lens (circle/square)
                lensSize: ["50%","50%"],            // lens dimensions (in px or in % with respect to image dimensions)
                                        // can be different for X and Y dimension
                borderSize: 5,                  // size of the lens border (in px)
                borderColor: "#666",            // color of the lens border (#hex)
                borderRadius: 10,                // border radius (optional, only if the shape is square)
                imgOverlay: $("#photo_factura").attr("data-overlay"), // path of the overlay image (optional)
                overlayAdapt: true,    // true if the overlay image has to adapt to the lens size (boolean)
                zoomLevel: 5,          // zoom level multiplicator (number)
                responsive: true       // true if mlens has to be responsive (boolean)
            });
		});
		// Modal de la imagen de la factura
		
		// mostrar informacion del proveedor
		$(document).on('click', '#seller', function() {
			var idSeller = $(this).val();
			console.log(idSeller);
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
						var imgRucProveedor = "<?php echo e(asset('/')); ?>"+result.adj_ruc;
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

		// Listar las negaciones
		$(document).on('click', '#denegado', function() {
			var id = $(this).val(); // id de la pelicula
			console.log(id);
			var modulo = "Payments Seller";
			var url = "<?php echo url('viewRejection/"+id+"/"+modulo+"'); ?>";
			var historialRechazo = $('#historialRechazo').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				destroy: true,

				ajax: url,
				columns: [
					{data: 'razon', name: 'razon'},
					{data: 'created_at', name: 'created_at'}
				],
				language: {
					"processing": "Procesando...",
					"lengthMenu" : "Mostrar _MENU_ registros",
					"zeroRecords" : "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},
				order: [ 1, "desc" ],
				footerCallback: function(row, data, start, end, display){
					$("#totalNegaciones").text("Total de negaciones: "+end);
				}
			});
		});
		// Listar las negaciones
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>