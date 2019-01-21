<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
	<div class="row mt">
		<h2><i class="fa fa-angle-right"></i>Libros y Sagas de libros</h2>
	</div>

	<div class="container">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#tableLibro" id="libro"><h4>Libros</h4></a></li>
			<li><a data-toggle="tab" href="#tableSaga" id="saga"><h4>Sagas de Libros</h4></a></li>		
		</ul>
	</div>

	<div class="tab-content text-center">
		<div id="tableLibro" class="tab-pane fade in active">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" id="opcionL1"><h4>Libros pendientes</h4></a></li>
				<li><a data-toggle="tab" id="opcionL2"><h4>Libros aprobados</h4></a></li>
				<li><a data-toggle="tab" id="opcionL3"><h4>Libros rechazados</h4></a></li>
				
			</ul>

			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="libros">
						<thead>
							<tr>
								<th class="non-numeric">Titulo</th>
								<th class="non-numeric">Portada</th>
								<th class="non-numeric">Restricción</th>
								<th class="non-numeric">Proveedor</th>
								<th class="non-numeric">Descripción</th>
								<th class="non-numeric">Saga,Trilogia u otro</th>
								<th class="non-numeric">Costo</th>
								<th class="non-numeric">Opciones</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>

		<div id="tableSaga" class="tab-pane">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" id="opcionS1"><h4>Sagas pendientes</h4></a></li>
				<li><a data-toggle="tab" id="opcionS2"><h4>Sagas aprobadas</h4></a></li>
				<li><a data-toggle="tab" id="opcionS3"><h4>Sagas rechazadas</h4></a></li>
			</ul>

			<div class="col-lg-12">
				<div class="content-panel">
					<br>
					<table class="display responsive no-wrap datatable_wrapper" width="100%" id="sagas">
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
	<?php echo $__env->make('promoter.modals.BookViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>

	// desplegar el campo de razon al rechazar una revista
	function yesNoCheck() {
		if (document.getElementById('optionS2').checked) {
			$('#if_noS').show();
			$('#razonS').attr('required','required');
		} else {
            $('#if_noS').hide();
            $('#razonS').val('');
            $('#razonS').removeAttr('required');
        }
    }
    // desplegar el campo de razon al rechazar una revista

	function books(status) {
		var url = "<?php echo e(url('BooksData/')); ?>/"+status;
		var libros = $('#libros').DataTable({
		    processing: true,
		    serverSide: true,
		    responsive: true,
		    destroy: true,

		    ajax: url,
		    columns: [
		        {data: 'title', name: 'title'},
		        {data: 'cover', name: 'cover'},
		        {data: 'rating_id', name: 'rating_id'},
		        {data: 'seller_id', name: 'seller_id'},
		        {data: 'sinopsis', name: 'sinopsis'},
		        {data: 'saga_id', name: 'saga_id'},
		        {data: 'cost', name: 'cost'},
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
	        }
		});
	}

	function sagas(status) {
		var url = "<?php echo e(url('BSagasDataTable/')); ?>/"+status;
		var sagas = $('#sagas').DataTable({
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

	$(document).ready(function(){
		/* ------------------------------ LIBROS ------------------------------ */
		books("En Revision");

		// al darle click a la opcion de libro
		$(document).on('click', '#libro', function() {
			books("En Revision");
			var opcionL1 = $('#opcionL1').parent();
			opcionL1.attr('class','active');
			var opcionL2 = $('#opcionL2').parent();
			opcionL2.removeAttr('class','active');
			var opcionL3 = $('#opcionL3').parent();
			opcionL3.removeAttr('class','active');
		});
		// al darle click a la opcion de libro

		// listar libros pendientes
		$(document).on('click','#opcionL1', function() {
			books("En Revision");
		});
		// listar libros pendientes

		// listar libros aprobados
		$(document).on('click','#opcionL2', function() {
			books("Aprobado");
		});
		// listar libros aprobados

		// listar libros denegados
		$(document).on('click','#opcionL3', function() {
			books("Denegado");
		});
		// listar libros denegados

		// modificar el estaus del libro
		$(document).on('click', '#status', function() {
			var x = $(this).val();
			$("#formStatus").on('submit', function(e){
				var s =$("input[type='radio'][name=status]:checked").val();
				var url = "<?php echo e(url('books_status/')); ?>/"+x;
				var message = $('#razon').val();
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
						message: message
					}, 
					success: function (result) {
						console.log(result);
						$('#myModal').toggle();
						$('.modal-backdrop').remove();
						swal("Se ha "+s+" con éxito","","success")
						.then((recarga) => {
							location.reload();
						});
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
		});
		// modificar el estaus del libro

		// mostrar el libro
		$(document).on('click', '#file_b', function() {
	       var x = $(this).val();
	       console.log(x);
	       $("#book_file").attr("src", x);
	       $("#book_file").attr("data", x);
    	});
    	// mostrar el libro

    	// Listar las negaciones de los libros
		$(document).on('click', '#denegado', function() {
			var id = $(this).val();
			console.log(id);
			var modulo = "Books";
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
		// Listar las negaciones de los libros

		// Validacion de maximo de caracteres para la razon del libro
        var cantidadMaxima = 191;
        $('#razon').keyup(function(evento){
            var razon = $('#razon').val();
            numeroPalabras = razon.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeMaximoRazon').show();
                $('#mensajeMaximoRazon').text('Ha excedido la cantidad máxima de caracteres');
                $('#mensajeMaximoRazon').css('color','red');
                $('#rechazo').attr('disabled',true);
            } else {
                $('#mensajeMaximoRazon').hide();
                $('#rechazo').attr('disabled',false);
            }
        });
    	// Validacion de maximo de caracteres para la razon del libro

		/* ------------------------------ LIBROS ------------------------------ */

		/* ------------------------------- SAGAS ------------------------------- */

		// al darle click a la opcion de saga
		$(document).on('click', '#saga', function() {
			sagas("En Proceso");
			var opcionS1 = $('#opcionS1').parent();
			opcionS1.attr('class','active');
			var opcionS2 = $('#opcionS2').parent();
			opcionS2.removeAttr('class','active');
			var opcions3 = $('#opcions3').parent();
			opcions3.removeAttr('class','active');
		});
		// al darle click a la opcion de saga

		// listar sagas pendientes
		$(document).on('click','#opcionS1', function() {
			sagas("En Proceso");
		});
		// listar sagas pendientes

		// listar sagas aprobadas
		$(document).on('click','#opcionS2', function() {
			sagas("Aprobado");
		});
		// listar sagas aprobadas

		// listar sagas rechazadas
		$(document).on('click','#opcionS3', function() {
			sagas("Denegado");
		});
		// listar sagas rechazadas

		// cambiar el estatus de las sagas
    	$(document).on('click', '#Status', function() {
    		var x = $(this).val();
    		$("#formStatusS").on('submit', function(e){
    			var s = $("input[type='radio'][name=status_s]:checked").val();
    			var url = "<?php echo e(url('statusSaga/')); ?>/"+x;
                var message = $('#razonS').val();
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
                		message: message
                	}, 
                	success: function (result) {
                		console.log(result);
                		$('#myModal').toggle();
                		$('.modal-backdrop').remove();
                		swal("Se ha "+s+" con éxito","","success")
						.then((recarga) => {
							location.reload();
						});
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
    	});
    	// cambiar el estatus de las sagas

    	// Listar las negaciones de las sagas
		$(document).on('click', '#denegado', function() {
			var id = $(this).val();
			console.log(id);
			var modulo = "Saga Book";
			var url = "<?php echo url('viewRejection/"+id+"/"+modulo+"'); ?>";
			var historialRechazo = $('#historialRechazoS').DataTable({
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
		// Listar las negaciones de las sagas

    	// Validacion de maximo de caracteres para la razon de la saga
        var cantidadMaxima = 191;
        $('#razonS').keyup(function(evento){
            var razon = $('#razonS').val();
            numeroPalabras = razon.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeMaximoRazonS').show();
                $('#mensajeMaximoRazonS').text('Ha excedido la cantidad máxima de caracteres');
                $('#mensajeMaximoRazonS').css('color','red');
                $('#rechazoS').attr('disabled',true);
            } else {
                $('#mensajeMaximoRazonS').hide();
                $('#rechazoS').attr('disabled',false);
            }
        });
    	// Validacion de maximo de caracteres para la razon de la saga

    	/* ------------------------------- SAGAS ------------------------------- */
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>