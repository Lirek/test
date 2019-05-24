@extends('promoter.layouts.app')
@section('css')
    <style>
      .curvaBoton{border-radius: 20px;}
    </style>
@endsection
@section('main')
	<span class="card-title grey-text"><h3>Puntos asignados</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="activo"><a class="active" href="#test1">Puntos activos</a></li>
		<li class="tab" id="desecho"><a href="#test2">Puntos desechos</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th class="non-numeric">Id de Asignacion</th>
				<th class="non-numeric">Emisor</th>
				<th class="non-numeric">Receptor</th>
				<th class="non-numeric">Cantidad</th>
				<th class="non-numeric">Fecha de Asignacion</th>
				<th class="non-numeric" id="opciones">Opción</th>
			</tr>
		</thead>
		<tbody id="points">
		</tbody>
	</table>
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script type="text/javascript">
		function puntos(status) {
			$("#points").empty();
			var ruta = "{{url('PointsSalesDataTable')}}/"+status;
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
						var to = "Leipel";
						var from = "Leipel";
						var opciones = "";
						if (info.to!=0) {
							to = info.trace_points_to.name+" "+info.trace_points_to.last_name;
						}
						if (info.from!=0) {
							from = info.trace_points_from.name+" "+info.trace_points_from.last_name;
						}
						var fecha = moment(info.created_at).format('DD/MM/YYYY hh:mm:ss a');
						if (info.status=="Activo") {
							opciones =
							"<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value='"+info.id+"' href='#myModal' id='status'>Deshacer</a>";
						}
						var filas = "<tr><td>"+
						info.id+"</td><td>"+
						to+"</td><td>"+
						from+"</td><td>"+
						info.amount+"</td><td>"+
						fecha+"</td><td>"+
						opciones+"</td></tr>";
						$("#points").append(filas);
					});
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
		puntos("Activo");
	});
	$(document).on('click','#activo', function() {
		$("#opciones").show();
		puntos("Activo");
	});
	$(document).on('click','#desecho', function() {
		$("#opciones").hide();
		puntos("Negado");
	});
	$(document).on('click','#status', function() {
		var idPoint = $(this).attr("value");
		console.log(idPoint);
		swal({
            title: "¿Desea realmente deshacer esta asignación de punto?",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancelar", "Si"]
        }).then((confir) => {
            if (confir) {
            	var ruta = "{{url('PointsRollBack')}}/"+idPoint;
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
            			console.log(data);
            			swal('Se ha desecho la asignación del punto','','success')
            			.then((recarga) => {
            				location.reload();
            			});
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
        });
	});

</script>
@endsection