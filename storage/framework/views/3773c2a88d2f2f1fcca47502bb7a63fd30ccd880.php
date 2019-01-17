<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
	<div class="row mt">
		<h2><i class="fa fa-angle-right"></i>Revistas y publicaciones periódicas</h2>
	</div>

	<div class="container">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#tableRevista" id="revistas"><h4>Revistas</h4></a></li>
			<li><a data-toggle="tab" href="#tableCadena" id="pubPeriodicas"><h4>Publicaciones periódicas</h4></a></li>
		</ul>
	</div>

	<div class="tab-content text-center">
		<div id="tableRevista" class="tab-pane active">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" id="opcionR1"><h5>Revistas pendientes</h5></a></li>
				<li><a data-toggle="tab" id="opcionR2"><h5>Revistas aprobadas</h5></a></li>
				<li><a data-toggle="tab" id="opcionR3"><h5>Revistas rechazadas</h5></a></li>
			</ul>

			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="Megazine">
						<thead>
							<tr>
								<th class="non-numeric">Titulo</th>
								<th class="non-numeric">Portada</th>
								<th class="non-numeric">Restricción</th>
								<th class="non-numeric">Proveedor</th>
								<th class="non-numeric">Descripción</th>
								<th class="non-numeric">Publicación periódica</th>
								<th class="non-numeric">Costo</th>
								<th class="non-numeric">Opciones</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

		<div id="tableCadena" class="tab-pane">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" id="opcionP1"><h5>Publicaciones pendientes</h5></a></li>
				<li><a data-toggle="tab" id="opcionP2"><h5>Publicaciones aprobadas</h5></a></li>
				<li><a data-toggle="tab" id="opcionP3"><h5>Publicaciones rechazadas</h5></a></li>
			</ul>

			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="PubChain">
						<thead>
							<tr>
								<th class="non-numeric">Nombre</th>
								<th class="non-numeric">Imagen</th>
								<th class="non-numeric">Restricción</th>
								<th class="non-numeric">Proveedor</th>
								<th class="non-numeric">Descripción</th>
								<th class="non-numeric">Estatus</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<?php echo $__env->make('promoter.modals.MegazineViewModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	
	// desplegar el campo de razon al rechazar una revista
	function yesNoCheck() {
		if (document.getElementById('optionR2').checked) {
			$('#if_noR').show();
			$('#razonR').attr('required','required');
		} else {
            $('#if_noR').hide();
            $('#razonR').val('');
            $('#razonR').removeAttr('required');
        }
    }
    // desplegar el campo de razon al rechazar una revista

    // mostrar las revistas segun el estatus
    function megazine(status) {
    	var url = "<?php echo e(url('MegazineDataTable/')); ?>/"+status;
    	var Megazines = $('#Megazine').DataTable({
			processing: true,
		    serverSide: true,
		    responsive: true,
		    destroy: true,

		    ajax: url,
		    columns: [
		        {data: 'title', name: 'title'},
		        {data: 'cover', name: 'cover'},
		        {data: 'rating', name: 'rating'},
		        {data: 'seller', name: 'seller'},
		        {data: 'descripcion', name: 'descripcion'},
		        {data: 'saga', name: 'saga'},
		        {data: 'cost', name: 'cost'},
		        {data: 'opciones', name: 'Estatus', orderable: false, searchable: false}
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
	        }
		});
    }
    // mostrar las revistas segun el estatus

    // mostrar las publicaciones segun el estatus
    function publicaciones(status) {
    	var url = "<?php echo e(url('PubChainDataTable/')); ?>/"+status;
		var PubChain = $('#PubChain').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			destroy: true,

			ajax: url,
			columns: [
				{data: 'sag_name', name: 'sag_name'},
				{data: 'img_saga', name: 'img_saga'},
				{data: 'rating_id', name: 'rating_id'},
				{data: 'seller_id', name: 'seller_id'},
				{data: 'sag_description', name: 'sag_description'},
				{data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
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
	        }
		});
	}
	// mostrar las publicaciones segun el estatus

	$(document).ready(function(){
		/* ------------------------------ REVISTA ------------------------------ */
		megazine("En Revision");

		// al darle click a la opcion de revistas
		$(document).on('click', '#revistas', function() {
			megazine("En Revision");
			var opcionR1 = $('#opcionR1').parent();
			opcionR1.attr('class','active');
			var opcionR2 = $('#opcionR2').parent();
			opcionR2.removeAttr('class','active');
			var opcionR3 = $('#opcionR3').parent();
			opcionR3.removeAttr('class','active');
		});
		// al darle click a la opcion de revistas

		// al darle click a la opcion de revistas pendientes
		$(document).on('click', '#opcionR1', function() {
			megazine("En Revision");
		});
		// al darle click a la opcion de revistas pendientes

		// al darle click a la opcion de revistas aprobadas
		$(document).on('click', '#opcionR2', function() {
			megazine("Aprobado");
		});
		// al darle click a la opcion de revistas aprobadas

		// al darle click a la opcion de revistas rechazadas
		$(document).on('click', '#opcionR3', function() {
			megazine("Denegado");
		});
		// al darle click a la opcion de revistas rechazadas

		// Listar las negaciones de las revistas
		$(document).on('click', '#denegadoR', function() {
			var id = $(this).val();
			console.log(id);
			var modulo = "Megazines";
			var url = "<?php echo url('viewRejection/"+id+"/"+modulo+"'); ?>";
			var historialRechazo = $('#historialRechazoR').DataTable({
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
		// Listar las negaciones de las revistas

		// cambiar el estatus de la revista
		$(document).on('click', '#status', function() {
			var x = $(this).val();
			$("#formStatusMegazine").on('submit', function(e){
				var s = $("input[type='radio'][name=status]:checked").val();
				var url = "<?php echo e(url('admin_megazine/')); ?>/"+x;
				var message = $('#razonR').val();
				e.preventDefault();
				console.log(x,s,url,message);
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
						$('#myModal').toggle();
						$('.modal-backdrop').remove();
						//alert("Se ha "+s+" con éxito");
						//$('#megazine'+x).fadeOut();
						swal("Se ha "+s+" con éxito","","success")
						.then((recarga) => {
							location.reload();
						});
					},
					error: function (result) {
						console.log(result);
						//alert('Existe un Error en su Solicitud');
						swal('Existe un error en su solicitud','','error')
						.then((recarga) => {
							location.reload();
						});
					}
				});  
			});
		});
		// cambiar el estatus de la revista

		// ver revista
		$(document).on('click','#file_b', function() {
	       var x = $(this).val();
	       console.log(x);
	       $("#megazine_file").attr("src", x);
    	}); 
    	// ver revista

		/* ------------------------------ REVISTA ------------------------------ */

		/* --------------------------- PUBLICACIONES ---------------------------- */

		// al darle click a la opcion de publicaciones periodicas
		$(document).on('click', '#pubPeriodicas', function() {
			publicaciones("En Proceso");
			var opcionP1 = $('#opcionP1').parent();
			opcionP1.attr('class','active');
			var opcionP2 = $('#opcionP2').parent();
			opcionP2.removeAttr('class','active');
			var opcionP3 = $('#opcionP3').parent();
			opcionP3.removeAttr('class','active');
		});
		// al darle click a la opcion de publicaciones periodicas

		// al darle click a la opcion de publicaciones pendientes
		$(document).on('click', '#opcionP1', function() {
			publicaciones("En Proceso");
		});
		// al darle click a la opcion de publicaciones pendientes

		// al darle click a la opcion de publicaciones aprobadas
		$(document).on('click', '#opcionP2', function() {
			publicaciones("Aprobado");
		});
		// al darle click a la opcion de publicaciones aprobadas

		// al darle click a la opcion de publicaciones denegadas
		$(document).on('click', '#opcionP3', function() {
			publicaciones("Denegado");
		});
		// al darle click a la opcion de publicaciones denegadas

		// para cambiar el estatus de las publicaciones
    	$(document).on('click', '#Status', function() {
    		var x = $(this).val();
    		 $("#formStatus").on('submit', function(e){
    		 	var s = $("input[type='radio'][name=status_p]:checked").val();
    		 	var url = "<?php echo e(url('admin_chain/')); ?>/"+x;
                var message = $('#razon').val();
                console.log(x,s,url,message);
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
                		$('#myModal').toggle();
                		$('.modal-backdrop').remove();
                		//alert("Se ha "+s+" con exito");
                		//$('#saga'+x).fadeOut();
                		swal("Se ha "+s+" con éxito","","success")
						.then((recarga) => {
							location.reload();
						});
                	},
                	error: function (result) {
                		console.log(result);
                		//alert('Existe un Error en su Solicitud');
                		swal('Existe un error en su solicitud','','error')
						.then((recarga) => {
							location.reload();
						});
                	}
                });
            });
    	});
    	// para cambiar el estatus de las publicaciones

    	// Listar las negaciones de las publicaciones
		$(document).on('click', '#denegadoP', function() {
			var id = $(this).val();
			console.log(id);
			var modulo = "Publication Chain";
			var url = "<?php echo url('viewRejection/"+id+"/"+modulo+"'); ?>";
			var historialRechazo = $('#historialRechazoP').DataTable({
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
		// Listar las negaciones de denegadoP publicaciones

    	/* --------------------------- PUBLICACIONES ---------------------------- */

    	// Validacion de maximo de caracteres para la razon de la revista
        var cantidadMaxima = 191;
        $('#razonR').keyup(function(evento){
            var razon = $('#razonR').val();
            numeroPalabras = razon.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeMaximoRazonR').show();
                $('#mensajeMaximoRazonR').text('Ha excedido la cantidad máxima de caracteres');
                $('#mensajeMaximoRazonR').css('color','red');
                $('#rechazR').attr('disabled',true);
            } else {
                $('#mensajeMaximoRazonR').hide();
                $('#rechazR').attr('disabled',false);
            }
        });
    	// Validacion de maximo de caracteres para la razon de la revista

    	// Validacion de maximo de caracteres para la razon de las publicaciones periodicas
        var cantidadMaxima = 191;
        $('#razon').keyup(function(evento){
            var razon = $('#razon').val();
            numeroPalabras = razon.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeMaximoRazonP').show();
                $('#mensajeMaximoRazonP').text('Ha excedido la cantidad máxima de caracteres');
                $('#mensajeMaximoRazonP').css('color','red');
                $('#rechazoP').attr('disabled',true);
            } else {
                $('#mensajeMaximoRazonP').hide();
                $('#rechazoP').attr('disabled',false);
            }
        });
    	// Validacion de maximo de caracteres para la razon de las publicaciones periodicas
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>