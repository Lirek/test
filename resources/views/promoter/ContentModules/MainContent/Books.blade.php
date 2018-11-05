@extends('promoter.layouts.app')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('main')
	<div class="row mt">
		<h2><i class="fa fa-angle-right"></i>Libros</h2>
	</div>

	<div class="container">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" id="opcion1"><h4>Libros pendientes</h4></a></li>
			<li><a data-toggle="tab" id="opcion2"><h4>Libros aprobados</h4></a></li>
			<li><a data-toggle="tab" id="opcion3"><h4>Libros rechazados</h4></a></li>
			{{--<li><a data-toggle="tab" href="#menu1" id="pubTab"><h4>Saga, Trilogia u Otro</h4></a></li>--}}
		</ul>

		<div class="tab-content text-center">
			<div id="pendientes" class="tab-pane fade in active">
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
									<th class="non-numeric">Saga,Trilogia u Otro</th>
									<th class="non-numeric">Costo</th>
									<th class="non-numeric">Archivo</th>
									<th class="non-numeric">Estatus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			{{--
			<div id="menu1" class="tab-pane fade">
				<div class="col-lg-12">
					<div class="content-panel">
						<h4>Saga,Trilogia u Otro</h4>
						<br>
						<table class="display responsive no-wrap datatable_wrapper" width="100%" id="PubChain">
							<thead>
								<tr>
									<th class="non-numeric">Nombre</th>
									<th class="non-numeric">Imagen</th>
									<th class="non-numeric">Restriccion</th>
									<th class="non-numeric">Proveedor</th>
									<th class="non-numeric">Descripcion</th>
									<th class="non-numeric">Estatus</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			--}}
		</div>
	</div>
	@include('promoter.modals.BookViewModal')

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>

	$(document).ready(function(){

		var libros = $('#libros').DataTable({
		    processing: true,
		    serverSide: true,
		    responsive: true,
		    destroy: true,

		    ajax: '{!! url('BooksData/En Revision') !!}',
		    columns: [
		        {data: 'title', name: 'title'},
		        {data: 'cover', name: 'cover'},
		        {data: 'rating_id', name: 'rating_id'},
		        {data: 'seller_id', name: 'seller_id'},
		        {data: 'sinopsis', name: 'sinopsis'},
		        {data: 'saga_id', name: 'saga_id'},
		        {data: 'cost', name: 'cost'},
		        {data: 'books_file', name: 'books_file'},
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
		// listar libros pendientes
		$(document).on('click','#opcion1', function() {
			var librosPendientes = $('#libros').DataTable({
			    processing: true,
			    serverSide: true,
			    responsive: true,
			    bDestroy: true,

			    ajax: '{!! url('BooksData/En Revision') !!}',
			    columns: [
			        {data: 'title', name: 'title'},
			        {data: 'cover', name: 'cover'},
			        {data: 'rating_id', name: 'rating_id'},
			        {data: 'seller_id', name: 'seller_id'},
			        {data: 'sinopsis', name: 'sinopsis'},
			        {data: 'saga_id', name: 'saga_id'},
			        {data: 'cost', name: 'cost'},
			        {data: 'books_file', name: 'books_file'},
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
		});
		// listar libros pendientes

		// listar libros aprobados
		$(document).on('click','#opcion2', function() {
			var liborsAprobados = $('#libros').DataTable({
			    processing: true,
			    serverSide: true,
			    responsive: true,
			    destroy: true,

			    ajax: '{!! url('BooksData/Aprobado') !!}',
			    columns: [
			        {data: 'title', name: 'title'},
			        {data: 'cover', name: 'cover'},
			        {data: 'rating_id', name: 'rating_id'},
			        {data: 'seller_id', name: 'seller_id'},
			        {data: 'sinopsis', name: 'sinopsis'},
			        {data: 'saga_id', name: 'saga_id'},
			        {data: 'cost', name: 'cost'},
			        {data: 'books_file', name: 'books_file'},
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
		});
		// listar libros aprobados

		// listar libros denegados
		$(document).on('click','#opcion3', function() {
			var liborsDenegados = $('#libros').DataTable({
			    processing: true,
			    serverSide: true,
			    responsive: true,
			    destroy: true,

			    ajax: '{!! url('BooksData/Denegado') !!}',
			    columns: [
			        {data: 'title', name: 'title'},
			        {data: 'cover', name: 'cover'},
			        {data: 'rating_id', name: 'rating_id'},
			        {data: 'seller_id', name: 'seller_id'},
			        {data: 'sinopsis', name: 'sinopsis'},
			        {data: 'saga_id', name: 'saga_id'},
			        {data: 'cost', name: 'cost'},
			        {data: 'books_file', name: 'books_file'},
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
		});
		// listar libros denegados

		// modificar el estaus del libro
		$(document).on('click', '#status', function() {
			var x = $(this).val();
			$("#formStatus").on('submit', function(e){
				var s =$("input[type='radio'][name=status]:checked").val();
				var url = "{{ url('books_status/') }}/"+x;
				var message = $('#razon').val();
				e.preventDefault();
				console.log(x,s,url,message);
				var gif = "{{ asset('/sistem_images/loading.gif') }}";
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

    	// Listar las negaciones
		$(document).on('click', '#denegado', function() {
			var id = $(this).val(); // id de la pelicula
			console.log(id);
			var modulo = "Books";
			var url = "{!! url('viewRejection/"+id+"/"+modulo+"') !!}";
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

    	/*
    	$(document).on('click', '#Status', function() {
    		var x = $(this).val();

    		 $( "#formStatus" ).on( 'submit', function(e){
                
                var s=$("input[type='radio'][name=status_p]:checked").val();
                var url = 'admin_chain/'+x;
                var message=$('#razon').val();

                    e.preventDefault();
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
                                                        alert("Se ha "+s+" con exito");
                                                        $('#saga'+x).fadeOut();
                                                        

                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
    	});
    	*/

    	// Validacion de maximo de caracteres para la razon
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
    	// Validacion de maximo de caracteres para la razon
    	/*
    	var PubChain = $('#PubChain').DataTable({
			processing: true,
			serverSide: true,
			responsive: true,
			destroy: true,

			ajax: '{!! url('BSagasDataTable') !!}',
			columns: [
				{data: 'sag_name', name: 'sag_name'},
				{data: 'img_saga', name: 'img_saga'},
				{data: 'rating_id', name: 'rating_id'},
				{data: 'seller_id', name: 'seller_id'},
				{data: 'sag_description', name: 'sag_description'},
				{data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
			]
		});
		*/
	});
</script>
@endsection