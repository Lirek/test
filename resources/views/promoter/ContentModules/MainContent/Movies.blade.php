@extends('promoter.layouts.app')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">

    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('main')
	<div class="row mt">
		<h2><i class="fa fa-angle-right"></i>Películas</h2>
	</div>
	<div class="container">

		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#pendientes" id="opcion1"><h4>Películas pendientes</h4></a></li>
			<li><a data-toggle="tab" href="#aprobadas" id="opcion2"><h4>Películas aprobadas</h4></a></li>
			<li><a data-toggle="tab" href="#rechazadas" id="opcion3"><h4>Películas rechazadas</h4></a></li>
		</ul>

		<div class="tab-content text-center">
			<div id="pendientes" class="tab-pane fade in active">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="peliculas">
							<thead>
								<tr>
						        	<th class="non-numeric">Autor</th>
						        	<th class="non-numeric">Portada</th>
									<th class="non-numeric">Nombre</th>
									<th class="non-numeric">Sinopsis</th>
									<th class="non-numeric">Categoría</th>
									<th class="non-numeric">Géneros</th>
									<th class="non-numeric">Fecha de registro</th>
									<th class="non-numeric">Costo en Tickets</th>
									<th class="non-numeric" id="estatus">Estatus</th>
						        </tr>
					    	</thead>
					    </table>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
@include('promoter.modals.MoviesViewModal')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script>
	$(document).ready(function(){

		// modificar el estaus de la pelicula
		$(document).on('click','#status', function() {
			var idMovie = $(this).val();
			console.log(idMovie);
			$("#formStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
	            var url = "{{ url('/admin_movie/') }}/"+idMovie;
	            var message = $('#razon').val();
	            console.log(status,url,message);
	            e.preventDefault();
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
						status: status,
						message: message
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
		// modificar el estaus de la pelicula

		// ver mas detalles de la pelicula
		$(document).on('click','#viewMovie', function() {
			const player = new Plyr('#player');
			var idMovie = $(this).val();
			console.log(idMovie);
			var url = "{{ url('/viewMovie/') }}/"+idMovie;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					var rutaPelicula = "{{ asset('/') }}movie/film/"+result.duration;
					var rutaPoster = "{{ asset('/') }}movie/poster/"+result.img_poster;
					$("video").attr('poster',rutaPoster);
					$("video").attr('src',rutaPelicula);
					$("#nombrePelicula").text(result.title);
					$("#nombreOriginalPelicula").text(result.original_title);
					$("#sinopsisPelicula").text(result.based_on);
					$("#añoPublicacion").text(result.release_year);
					$("#trailer").attr('href',result.trailer_url);
					$("#trailer").text(result.trailer_url);
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
		// ver mas detalles de la pelicula

		var Movies = $('#peliculas').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,
            bDestroy: true,

	        ajax: '{!! url('MoviesDataTable/En Proceso') !!}',
	        columns: [
	        	{data: 'autor', name: 'autor'},
	            {data: 'img_poster', name: 'img_poster'},
	            {data: 'title', name: 'title'},
	            {data: 'sinopsis', name: 'sinopsis'},
	            {data: 'categoria', name: 'categoria'},
	            {data: 'genero', name: 'genero'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'cost', name: 'cost'},
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
		// listar las peliculas pendientes

		$(document).on('click','#opcion1', function() {
			$("#estatus").text("Estatus");
			var peliculasPendientes = $('#peliculas').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('MoviesDataTable/En Proceso') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'sinopsis', name: 'sinopsis'},
		            {data: 'categoria', name: 'categoria'},
		            {data: 'genero', name: 'genero'},
		            {data: 'created_at', name: 'created_at'},
		            {data: 'cost', name: 'cost'},
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
		// listar las peliculas pendientes

		// listar las peliculas aprobadas
		$(document).on('click','#opcion2', function() {
			$("#estatus").text("Estatus");
			var peliculasAprobadas = $('#peliculas').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('MoviesDataTable/Aprobado') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'sinopsis', name: 'sinopsis'},
		            {data: 'categoria', name: 'categoria'},
		            {data: 'genero', name: 'genero'},
		            {data: 'created_at', name: 'created_at'},
		            {data: 'cost', name: 'cost'},
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
		// listar las peliculas aprobadas

		// listar las peliculas denegadas
		$(document).on('click','#opcion3', function() {
			$("#estatus").text("Negaciones");
			var peliculasRechazadas = $('#peliculas').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('MoviesDataTable/Denegado') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'sinopsis', name: 'sinopsis'},
		            {data: 'categoria', name: 'categoria'},
		            {data: 'genero', name: 'genero'},
		            {data: 'created_at', name: 'created_at'},
		            {data: 'cost', name: 'cost'},
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
		// listar las peliculas denegadas

		// Listar las negaciones
		$(document).on('click', '#denegado', function() {
			var id = $(this).val(); // id de la pelicula
			console.log(id);
			var modulo = "Movies";
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
	});
</script>
@endsection