@extends('promoter.layouts.app')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('main')
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Películas</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="table-responsive">
			<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="Movies">
				<thead>
			        <tr>
			        	<th class="non-numeric">Autor</th>
			        	<th class="non-numeric">Portada</th>
						<th class="non-numeric">Nombre</th>
						<th class="non-numeric">Nombre original</th>
						<th class="non-numeric">Sinopsis</th>
						<th class="non-numeric">Categoría</th>
						<th class="non-numeric">Géneros</th>
						<th class="non-numeric">Año de publicación</th>
						<th class="non-numeric">Costo en Tickets</th>
						<th class="non-numeric">Estatus</th>
			        </tr>
		    	</thead>
		    </table>
		</div>
	</div>
  </div>

@endsection

@section('js')
@include('promoter.modals.MoviesViewModal')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function(){

		$('#Movies').addClass('text-center');
		var Movies = $('#Movies').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('MoviesDataTable') !!}',
	        columns: [
	        	{data: 'autor', name: 'autor'},
	            {data: 'img_poster', name: 'img_poster'},
	            {data: 'title', name: 'title'},
	            {data: 'original_title', name: 'original_title'},
	            {data: 'sinopsis', name: 'sinopsis'},
	            {data: 'categoria', name: 'categoria'},
	            {data: 'genero', name: 'genero'},
	            {data: 'release_year', name: 'release_year'},
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
						swal('Existe un Error en su Solicitud','','error')
						.then((recarga) => {
							location.reload();
						});
						console.log(result);
					}
				}); 
			});
		});
	});
</script>
@endsection