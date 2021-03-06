@extends('promoter.layouts.app')
@section('main')
<div class="row">
	<span class="card-title grey-text"><h3>Pagos de Proveedores</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="porCobrar"><a class="active" href="#test1">Pagos por cobrar</a></li>
		<li class="tab" id="Diferido"><a href="#test2">Pagos diferidos</a></li>
		<li class="tab" id="pagado"><a href="#test3">Pagos pagados</a></li>
		<li class="tab" id="Rechazado"><a href="#test4">Pagos rechazados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Información del proveedor</th>
				<th><i class="material-icons"></i>Imagen de factura</th>
				<th><i class="material-icons"></i>Fecha para el retiro</th>
				<th><i class="material-icons"></i>Tickets solicitados / Tickets disponibles</th>
				<th><i class="material-icons"></i>Opciones</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
</div>
@include('promoter.modals.PaymentsSellerViewModal')
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

		function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "{{url('PaymentsDataTable')}}"+"/"+parametros;
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
						if (info.seller.name) {
							var inProveedor = 
							"<button href='#ModalSeller' class='modal-trigger' value='"+info.seller.id+"' id='seller' style='display:inline; text-decoration:underline; background:none; background:none;border:0; padding:0; margin:0;'>"+info.seller.name+
							"</button>"
						}
						if (info.factura_id!=0 ) {
							var factura = 
							"<img class='materialboxed' width='150' height='120' src='{!!asset('"+info.factura+"')!!}'";
						} else {
							var factura = "No aplica ";
						}
						if (info.fecha_cita!=null) {
				        	var cita = moment(info.fecha_cita).format('DD/MM/YYYY');
				        } else {
				        	var cita = "cita no asignada ";
				        }
				        if (info.tickets!=null) {
				        	var ticket = info.tickets+" / "+info.credito;
				        } else {
				        	var ticket = "sin tickets disponibles ";
				        }
				        if (info.status=="Por cobrar") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='Por cobrar' href='#myModal' id='status'>Pagar o revertir</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='Por cobrar' href='#negado' id='denegado'>ver negaciones</button>"
				        }
				        if (info.status=="Diferido") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='Diferido' href='#myModal' id='status'>Pagar o revertir</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='Por cobrar' href='#negado' id='denegado'>ver negaciones</button>"
				        }
				        if (info.status=="Pagado") {
				        	var opcion = "<button class='btn curvaBoton green' value='"+info.id+"' value2=''  id='pagado'>Pagado</button>"
				        }
				        if (info.status=="Rechazado") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='Por cobrar' href='#myModal' id='status'>Pagar o revertir</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='Por cobrar' href='#negado' id='denegado'>ver negaciones</button>"
				        }
						var filas = "<tr><td>"+
						inProveedor+"</td><td>"+
						factura+"</td><td>"+
						cita+"</td><td>"+
						info.tickets+" / "+info.seller.credito+"</td><td>"+
						opcion+"</td></tr>";
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
				}
			});
		}
		$(document).ready(function(){
			listado("Por cobrar");
		});
		$(document).on('click','#porCobrar', function() {
			listado("Por cobrar");
		});
		$(document).on('click','#Rechazado', function() {
			listado("Rechazado");
		});
		$(document).on('click','#Diferido', function() {
			listado("Diferido");
		});
		$(document).on('click','#pagado', function() {
			listado("Pagado");
		});

		// modificar el estatus del pago
		$(document).on('click','#status', function() {
			var idPago = $(this).attr("value");
			var s = $(this).attr('value2');
			$("#FormStatus").on('submit', function(e) {
				var status = $("input[type='radio'][name=status]:checked").val();
				if (status=="Rechazado") {
					s = status;
				}
	            var url = "{{ url('/admin_payments/') }}/"+idPago;
	            var message = $('#razon').val();
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
						status: s,
						message: message,
					}, 
					success: function (result) {
						console.log(result);
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

		// Listar las negaciones
		$(document).on('click', '#denegado', function(e) {
			var id = $(this).attr("value");
			var modulo = "Payments Seller";
			var url = "{!! url('viewRejection/"+id+"/"+modulo+"') !!}";
			console.log(url);
			$("#negaciones").empty();
				e.preventDefault();
				$.ajax({
					url: url, 
					type:'get', 
					dataType:'json',
					success: function(datos){
						console.log(datos);
						$('#totalNegaciones').show();
						$('#totalNegaciones').text('tiene un total de rechazos de: '+datos.length);
						$.each(datos, function(i,info){
							var fila = '<tr><td>'+
							info.reason+'</td><td>'+
							moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+
							'</td></tr>';
							$('#negaciones').append(fila);
						});
					},
					error: function (datos) {
					console.log(datos);
					swal('Existe un error en su solicitud','','error')
					.then((recarga) => {
						location.reload();
					});
				}
			});
		});
		// Listar las negaciones

		// mostrar informacion del proveedor
		$(document).on('click', '#seller', function() {
			var idSeller = $(this).val();
			var url = "{{ url('/infoSeller/') }}/"+idSeller;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					if (result.logo!=null) {	
						var logoProveedor = "{{ asset('/') }}/"+result.logo;
						$("#logoProveedor").attr('src',logoProveedor);
					} else {
						$("#logoProveedor").attr('src',"{{asset('plugins/img/sinPerfil.png')}}");
					}
					$("#nombreProveedor").text(result.name);
					$("#correoProveedor").text(result.email);
					$("#telefonoProveedor").text(result.tlf);
					$("#rucProveedor").text(result.ruc_s);
					if (result.adj_ruc!=null) {	
						var imgRucProveedor = "{{ asset('/') }}/"+result.adj_ruc;
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


	</script>
@endsection