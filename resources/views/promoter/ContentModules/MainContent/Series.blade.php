@extends('promoter.layouts.app')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('main')
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Series</h2>
  </div>

  <div class="container">
  	<ul class="nav nav-tabs nav-justified">
		<li class="active"><a data-toggle="tab" href="#pendientes" id="opcion1"><h4>Series pendientes</h4></a></li>
		<li><a data-toggle="tab" href="#aprobadas" id="opcion2"><h4>Series aprobadas</h4></a></li>
		<li><a data-toggle="tab" href="#rechazadas" id="opcion3"><h4>Series rechazadas</h4></a></li>
	</ul>

	<div class="tab-content text-center">
		<div id="pendientes" class="tab-pane fade in active">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="display responsive no-wrap table table-bordered table-striped text-center" width="100%" id="Series">
						<thead>
					        <tr>
					        	<th class="non-numeric">Autor</th>
					        	<th class="non-numeric">Portada</th>
								<th class="non-numeric">Nombre</th>
								<th class="non-numeric">Historia</th>
								<th class="non-numeric">Año de publicación</th>
								<th class="non-numeric">Trailer</th>
								<th class="non-numeric">Costo en Tickets</th>
								<th class="non-numeric">Saga</th>
								<th class="non-numeric">Estado de la serie</th>
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
@include('promoter.modals.SeriesViewModal')
@include('promoter.modals.SagasViewModal')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function(){

		var Series = $('#Series').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,
            destroy: true,

	        ajax: '{!! url('SeriesDataTable/En Proceso') !!}',
	        columns: [
	        	{data: 'autor', name: 'autor'},
	            {data: 'img_poster', name: 'img_poster'},
	            {data: 'title', name: 'title'},
	            {data: 'historia', name: 'historia'},
	            {data: 'release_year', name: 'release_year'},
	            {data: 'trailer', name: 'trailer'},
	            {data: 'cost', name: 'cost'},
	            {data: 'saga', name: 'saga'},
	            {data: 'estatusSerie', name: 'estatusSerie'},
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

		// lista de las series pendientes
		$(document).on('click','#opcion1', function() {
			$("#estatus").text("Estatus");
			var Series = $('#Series').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('SeriesDataTable/En Proceso') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'historia', name: 'historia'},
		            {data: 'release_year', name: 'release_year'},
		            {data: 'trailer', name: 'trailer'},
		            {data: 'cost', name: 'cost'},
		            {data: 'saga', name: 'saga'},
		            {data: 'estatusSerie', name: 'estatusSerie'},
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
		// lista de las series pendientes

		// lista de las series aprobadas
		$(document).on('click','#opcion2', function() {
			$("#estatus").text("Estatus");
			var Series = $('#Series').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('SeriesDataTable/Aprobado') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'historia', name: 'historia'},
		            {data: 'release_year', name: 'release_year'},
		            {data: 'trailer', name: 'trailer'},
		            {data: 'cost', name: 'cost'},
		            {data: 'saga', name: 'saga'},
		            {data: 'estatusSerie', name: 'estatusSerie'},
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
		// lista de las series aprobadas

		// lista de las series denegadas
		$(document).on('click','#opcion3', function() {
			$("#estatus").text("Negaciones");
			var Series = $('#Series').DataTable({
		        processing: true,
		        serverSide: true,
	            responsive: true,
	            destroy: true,

		        ajax: '{!! url('SeriesDataTable/Denegado') !!}',
		        columns: [
		        	{data: 'autor', name: 'autor'},
		            {data: 'img_poster', name: 'img_poster'},
		            {data: 'title', name: 'title'},
		            {data: 'historia', name: 'historia'},
		            {data: 'release_year', name: 'release_year'},
		            {data: 'trailer', name: 'trailer'},
		            {data: 'cost', name: 'cost'},
		            {data: 'saga', name: 'saga'},
		            {data: 'estatusSerie', name: 'estatusSerie'},
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
		// lista de las series denegadas

		// cambiar el estatus de la serie
		$(document).on('click','#status', function() {
			var idSerie = $(this).val();
			console.log(idSerie);
			$("#formStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
	            var url = "{{ url('/admin_serie/') }}/"+idSerie;
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
		// cambiar el estatus de la serie

		// ver mas informacion de la saga
		$(document).on('click','#saga', function() {
			var idSerie = $(this).val();
			console.log(idSerie);
			var url = "{{ url('/sagaSerie/') }}/"+idSerie;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					var rutaPortada = "{{ asset('/') }}images/sagas/"+result[0];
					$("#portadaSaga").attr('src',rutaPortada);
					$("#nombreSaga").text(result[1]);
					$("#categoriaSaga").text(result[2]);
					$("#statusSaga").text(result[3]);
					$("#tipoSaga").text(result[4]);
					$("#descripcionSaga").text(result[5]);
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
		// ver mas informacion de la saga

		// Listar las negaciones
		$(document).on('click', '#denegado', function() {
			var id = $(this).val(); // id de la serie
			console.log(id);
			var modulo = "Series";
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