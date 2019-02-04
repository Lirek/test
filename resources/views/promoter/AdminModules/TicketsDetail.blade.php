@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Tickets Vendidos</h3></span>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Id</th>
				<th><i class="material-icons"></i>Usuario</th>
				<th><i class="material-icons"></i>Monto</th>
				<th><i class="material-icons"></i>Cantidad</th>
				<th><i class="material-icons"></i>Metodo</th>
				<th><i class="material-icons"></i>Paquete</th>
				<th><i class="material-icons"></i>Fecha</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

	function listado(status) {
			$("#table").empty();
			var ruta = "{{url('TicketsSalesDataTable')}}"
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
				url: ruta,
				type:'GET',
				dataType: "json",
				success: function (data) {
					swal.close();
					console.log(data);
					$.each(data,function(i,info) {
						
						var filas = "<tr><td>"+
						info.id+"</td><td>"+
						info.tickets_user.name+"</td><td>"+
						info.cost+' $'+"</td><td>"+
						info.value*info.tickets.amount+"</td><td>"+
						info.method+"</td><td>"+
						info.tickets.name+"</td><td>"+
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
			listado("Aprobado");
		});




	</script>
@endsection