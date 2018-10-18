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
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="table-responsive">
			<table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="Series">
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
						<th class="non-numeric">Estatus</th>
			        </tr>
		    	</thead>
		    </table>
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

		$('#Series').addClass('text-center');
		var Series = $('#Series').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('SeriesDataTable') !!}',
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

		$(document).on('click','#status', function() {
			var idSerie = $(this).val();
			console.log(idSerie);
			$("#formStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
	            var url = "{{ url('/admin_movie/') }}/"+idSerie;
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
					var rutaPortada = "{{ asset('/') }}images/sagas/"+result.img_saga;
					$("#portadaSaga").attr('src',rutaPortada);
					$("#nombreSaga").text(result.sag_name);
					$("#categoriaSaga").text(result.rating.r_descr);
					$("#status").text(result.status);
					$("#tipoSaga").text(result.type_saga);
					$("#descripcionSaga").text(result.sag_description);
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
</script>
@endsection