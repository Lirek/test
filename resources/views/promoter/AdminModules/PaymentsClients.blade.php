@extends('promoter.layouts.app')
@section('css')
    <style>
      .curvaBoton{border-radius: 20px;}
    </style>
@endsection
@section('main')
	<span class="card-title grey-text"><h3>Pagos de los usuarios</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="revision"><a class="active" href="#test2">Pagos en revisión</a></li>
		<li class="tab" id="denegado"><a href="#test1">Pagos denegados</a></li>
		<li class="tab" id="aprobado"><a href="#test3">Pagos aprobados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Cliente</th>
				<th><i class="material-icons"></i>Paquete</th>
				<th><i class="material-icons"></i>Cantidad</th>
				<th><i class="material-icons"></i>Costo</th>
				<th><i class="material-icons"></i>Recibo</th>
				<th><i class="material-icons"></i>N° de referencia</th>
				<th><i class="material-icons"></i>Factura</th>
				<th><i class="material-icons"></i>Método</th>
				<th><i class="material-icons"></i>Fecha</th>
				<th id="opc"><i class="material-icons"></i>Opción</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
	@include('promoter.modals.PaymentsUsersViewModal')
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>
		function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "{{url('paymentsClients')}}"+"/"+parametros;
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
						if (info.factura_id!=null) {
							var factura = 
							"<a href='https://app.datil.co/ver/"+info.factura_id+"/ride' target='_blank' class='btn btn-floating btn-small waves-effect waves-light green tooltipped' data-position='right' data-tooltip='Ver factura'>"+
								"<i class='small material-icons right'>remove_red_eye</i>"+
							"</a>"
						} else if (info.factura_id==null && info.method!="Puntos"){
							var desactivar = "";
							if (info.status=="En Revision" || info.status=="Denegado") {
								desactivar = "disabled";
							}
							var factura = 
							"<a class='btn btn-floating btn-small waves-effect waves-light green tooltipped "+desactivar+"' id=generarFactura value1="+info.id+" value2="+info.tickets_user.id+" value3="+info.method+" data-position='right' data-tooltip='Generar factura'>"+
								"<i class='material-icons'>add</i>"+
								"Crear"+
							"</a>";
						} else {
							var factura = "No aplica ";
						}
						if (info.reference!=0) {
							var reference = info.reference;
						} else {
							var reference = "No aplica ";
						}
						if (info.voucher==0 && info.method!="Depósito") {
							var voucher = "No aplica";
						} else {
							var voucher = 
							"<img class='materialboxed' width='150' height='120' src='{!!asset('"+info.voucher+"')!!}'";
						}
						if (info.tickets_user!=null) {
							var nombre = info.tickets_user.name+" "+info.tickets_user.last_name;
						} else {
							var nombre = "No tiene nombre registrado";
						}
						var fecha = moment(info.created_at).format('DD/MM/YYYY hh:mm:ss a');
						if (info.status=="En Revision") {
							var opcion = 
							"<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" value2="+info.tickets_user.id+" value3="+info.method+" href='#status' id='statusPayments'>Aceptar</a>"
						}
						if (info.status=="Denegado") {
							var opcion = 
							"<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectPayments'>Ver negaciones</a>";
						}
						var filas = "<tr><td>"+
						nombre+"</td><td>"+
						info.tickets.name+"</td><td>"+
						info.value+"</td><td>"+
						info.cost+" $"+"</td><td>"+
						voucher+"</td><td>"+
						reference+"</td><td>"+
						factura+"</td><td>"+
						info.method+"</td><td>";
						if (info.status=="En Revision" || info.status=="Denegado") {
							filas = filas+
							fecha+"</td><td>"+
							opcion+"</td></tr>";
						} else {
							filas = filas+
							fecha+"</td></tr>";
						}
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
			listado("En Revision");
		});
		$(document).on('click','#revision', function() {
			$("#opc").show();
			listado("En Revision");
		});
		$(document).on('click','#denegado', function() {
			$("#opc").show();
			listado("Denegado");
		});
		$(document).on('click','#aprobado', function() {
			$("#opc").hide();
			listado("Aprobado");
		});
		$(document).on('click', '#statusPayments', function() {
			var x = $(this).attr("value");
			var idUser = $(this).attr("value2");
			var medio = $(this).attr("value3");
			console.log(x,idUser,medio);
			$("#formStatus").on('submit', function(e) {
				var gif = "{{ asset('/sistem_images/loading.gif') }}";
				swal({
					title: "Procesando la información",
					text: "Espere mientras se procesa la información.",
					icon: gif,
					buttons: false,
					closeOnEsc: false,
					closeOnClickOutside: false
				});
				var s = $("input[type='radio'][name=status]:checked").val();
				var message = $('#razon').val();
				var url = "{{url('DepositStatus/')}}/"+x;
				console.log(s,message,url,x);
				e.preventDefault();
				$.ajax({
					url: url,
					type: 'post',
					data: {
						_token: $('input[name=_token]').val(),
						status_p: s,
						message: message
					}, 
					success: function (result) {
						swal("Se ha "+s+" con éxito","","success")
						.then((recarga) => {
							if (s=="Aprobado") {
								generarFactura(x,idUser,medio);
							} else {
								location.reload();
							}
						});
						console.log(result);
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
		$(document).on('click', '#rejectPayments', function(e) {
			var idPayments = $(this).attr("value");
			console.log(idPayments);
			var modulo = "Payments User";
			var url = "{!! url('viewRejection/') !!}/"+idPayments+"/"+modulo;
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
					$('#totalNegaciones').text('Tiene un total de rechazos de: '+datos.length);
					$.each(datos, function(i,info){
						var fila = '<tr><td>'+
						info.reason+'</td><td>'+
						moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+'</td></tr>';
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
		$(document).on('click', '#generarFactura', function() {
			var idPayments = $(this).attr("value1");
			var idUser = $(this).attr("value2");
			var medio = $(this).attr("value3");
			console.log(idPayments,idUser,medio);
			generarFactura(idPayments,idUser,medio);
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
	<script id="jsbin-javascript">
		function getDatilAgain(idTicketSales,medio,idUser,callback) {
			var msn = "";
			getDatil(idTicketSales,medio,idUser).then(function(response) {
				var res = JSON.parse(response);
				msn = res;
			}, function(error) {
				msn = error;
			});
			setTimeout(function() {
				callback(msn);
			},10000); //10segs de espera
		}
		function getDatil(idTicketSales,medio,idUser) {
			return new Promise(function(resolve,reject) {
				var parametros = "/"+idTicketSales+"/"+medio+"/"+idUser;
				var url = "{{ url('/facturaDeposito/') }}"+parametros;
				var req = new XMLHttpRequest();
				req.open("GET",url);
				req.onload = function() {
					if (req.status == 200) {
						resolve(req.response);
					} else {
						resolve(req.response);
					}
				};
				req.onerror = function() {
					reject(Error("Network Error"));
				};
				req.send();
			});
		}
		function generarFactura(id_payments,idUser,medio) {
			console.log(id_payments);
			var gif = "{{ asset('/sistem_images/loading.gif') }}";
			swal({
				title: "¡Generando factura!",
				text: "Estamos generando la factura...",
				icon: gif,
				buttons: false,
				closeOnEsc: false,
				closeOnClickOutside: false
			});
			var intento = 0;
			var maxIntento = 3; // 30seg de espera // 10
			if (medio=="Payphone") {
				var medio = "dinero_electronico_ec";
			} else {
				var medio = "deposito_cuenta_bancaria";
			}
			getDatilAgain(id_payments,medio,idUser,function callback(infoFactura) {
				console.log(infoFactura);
				var idFactura = infoFactura.id;
				console.log(idFactura);
				if (intento <= maxIntento) {
					if (idFactura!=undefined) {
						var parametros = "/"+id_payments+"/"+idFactura;
						var ruta = "{{ url('/setFactura/') }}"+parametros;
						$.ajax({
							url     : ruta,
							type    : "GET",
							dataType: "json",
							success: function (data) {
								var respuesta = data;
								console.log("lista la factura? "+respuesta);
							}
						});
						swal({
							title: "¡Factura Generada!",
							text: "Ya podrá ver la factura de su pago",
							icon: "success",
							closeOnEsc: false,
							closeOnClickOutside: false
						})
						.then((recarga) => {
							location.reload();
						});
					} else {
						intento++;
						console.log('intento: '+intento);
						getDatilAgain(id_payments,medio,idUser,callback);
					}
				} else {
					swal({
						title: "¡Ups!",
						text: "En estos momentos no podemos generar su factura, intente más tarde",
						icon: "info",
						closeOnEsc: false,
						closeOnClickOutside: false
					})
					.then((recarga) => {
						location.reload();
					});
				}
			});
		}
	</script>
@endsection