@extends('bidder.layouts')
	<style>
		.curva{border-radius: 10px;}
		.curvaBoton{border-radius: 20px;}
		.gradient-45deg-green-teal.gradient-shadow {
            box-shadow: 0 6px 20px 0 rgba(77, 182, 172, 0.5);
        }
        .gradient-45deg-green-teal {
            background: #43A047;
            background: -webkit-linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
            background: linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
        }
	</style>
@section('content')
	<!--<h4 class="titelgeneral"><i class="material-icons small">attach_money</i> Retiro</h4>-->
	
	<!-- /.modal  de Fondos  -->
	<div id="myModalRequest" class="modal">
		<div class="modal-content">
			<div class="green"><br>
				<h4 class="center white-text"><i class="small material-icons">local_activity</i> Datos para facturación por cobro de puntos</h4>
				<br>
			</div>
			<br>
			<div class="row">
				<div class="col s12">
					<div class="col s12 m12">
						<a class="btn tooltipped btn-floating green left" data-position="right" data-tooltip="Adjunte una foto de la factura con los siguientes datos"><i class="material-icons">info_outline</i></a>
					</div>  
					<div class="col m9 s12 offset-m2">
						<ul class="collection z-depth-1" >
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">event</i>
										<b class="left">Fecha: </b>
									</div>
									<div class="col s12 m7">
										{{date('d/m/Y')}}
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">assignment_ind</i>
										<b class="left">A nombre de: </b>
									</div>
									<div class="col s12 m7">
										INFORMERET S.A.
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">business_center</i>
										<b class="left">Ruc: </b>
									</div>
									<div class="col s12 m7">
										09928971710001
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">call</i>
										<b class="left">Teléfono: </b>
									</div>
									<div class="col s12 m7">
										0982042816
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">location_on</i>
										<b class="left">Dirección: </b>
									</div>
									<div class="col s12 m7">
										Torres de Mall del Sol, Torre B, Piso 4
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">create</i>
										<b class="left">Descripción: </b>
									</div>
									<div class="col s12 m7">
										Canje de puntos por venta de productos afiliados.
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">add_shopping_cart</i>
										<b class="left">Cantidad: </b>
									</div>
									<div class="col s12 m7" id="puntos">
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">monetization_on</i>
										<b class="left">Precio unitario: </b>
									</div>
									<div class="col s12 m7">
										{{ $valorPunto }}$
									</div>
								</div>
							</li>
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">monetization_on</i>
										<b class="left">Sub-total: </b>
									</div>
									<div class="col s12 m7" id="subtotal">
									</div>
								</div>
							</li>
							<!--
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">monetization_on</i>
										<b class="left">Iva 12%: </b>
									</div>
									<div class="col s12 m7" id="iva">
									</div>
								</div>
							</li>
							-->
							<li class="collection-item" style="padding: 10px">
								<div class="row">
									<div class="col s12 m5">
										<i class="material-icons circle left">monetization_on</i>
										<b class="left">Total: </b>
									</div>
									<div class="col s12 m7" id="dolar">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="col m12">
                        <form class="form-horizontal" action="{{url('retirar')}}" method="post" enctype="multipart/form-data">
                        	{{ csrf_field() }}
                            <div class="file-field input-field col m6 offset-m3">
                                <label for="file">Adjunte su factura</label>
                                <br><br>
                                <div class="btn green">
                                    <span><i class="material-icons">archive</i></span>
                                    <input type="file" name="factura" id="factura" accept=".jpg" required="required" class="" style="margin-top: 5px">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <div id="mensajeImgDoc"></div>
                                <input type="hidden" name="cantidad" id="cant">
                                <div class="col m6">
                                    <img id="preview_img_doc" src="" name='ci'>
                                </div>
                            </div>
                            <div class="col m12">
                                <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="soli">
                                    Solicitar retiro
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>   
        </div>
        <div class="modal-footer">
        	<a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
    </div>
    <!--- Modal de la informacion de los estatus -->
    <div id="statusPoints" class="modal">
		<div class="modal-content">
			<div class="green"><br>
				<h4 class="center white-text" id="titulo"></h4>
				<br>
			</div>
			<br>
			<div class="row">
				<div class="col s12">
					<table class="responsive-table" id="historialRechazo">
						<thead>
							<tr>
								<th>Puntos</th>
								<th>Factura</th>
								<th>Fecha de la cita</th>
								<th>Estatus</th>
							</tr>
						</thead>
						<tbody id="payments">
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="modal-footer">
        	<a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
	</div>
@endsection
@section('js')
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>-->
	<script type="text/javascript">
		$(document).ready(function(){
			console.log({!!$status!!});
			if ({!!$status!!}==1) {
				swal('Solicitud de retiro exitosa','Se le enviará un correo para retirar el pago','success')
				.then((recarga) => {
        			location.replace("{{url('retiro')}}");
        		});
			}
			$('#monto').val({!!Auth::guard('bidder')->user()->points!!});
			if ({!!Auth::guard('bidder')->user()->points!!} == 0) {
				$('#solicitar').attr('disabled',true);
			}
		});

		$("#monto").change(function(){
			var nombre = $("#monto").val().trim();
			var nombre2 = $("#monto").val();
			if (nombre.length < 1 ){
				$('#mensajeMonto').show();
				$('#mensajeMonto').text('El monto a retirar no debe estar vacio');
				$('#mensajeMonto').css('color','red');
				$('#solicitar').attr('disabled',true);
			} else if (nombre > {!!Auth::guard('bidder')->user()->points!!} ){
				$('#mensajeMonto').show();
				$('#mensajeMonto').text('Fondos insuficientes');
				$('#mensajeMonto').css('color','red');
				$('#solicitar').attr('disabled',true);
			} else if(nombre2 == 0){
				$('#mensajeMonto').show();
				$('#mensajeMonto').text('Monto debe ser mayor a 0');
				$('#mensajeMonto').css('color','red');
				$('#solicitar').attr('disabled',true);
			} else {
				$('#mensajeMonto').hide();
				$('#solicitar').attr('disabled',false);
			}
		});

		// Validacion de solo numeros
		function controltagNum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true; // para la tecla de retroseso
			else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[0-9]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }

        $("#solicitar").click(function(){
        	var puntos = $("#monto").val();
        	var subtotal=puntos*{!! $valorPunto !!};
        	//var iva = subtotal*0.12;
        	//var dolar = subtotal+iva;
        	var dolar = subtotal;
        	$('#cant').val(puntos);
        	$('#puntos').html(puntos);
        	$('#subtotal').html(subtotal.toFixed(4)+'$');
        	//$('#iva').html(iva.toFixed(4)+'$');
        	$('#dolar').html(dolar.toFixed(4)+'$');

        });

    	$('#factura').change(function(){
            var img_doc = $('#factura').val();
            var extension = img_doc.substring(img_doc.lastIndexOf("."));
            if (extension==".png" || extension==".jpg" || extension==".jpeg") {
                $('#soli').attr('disabled',false);
                $('#mensajeImgDoc').hide();
                $('#preview_img_doc').show();
            } else {
                $('#soli').attr('disabled',true);
                $('#mensajeImgDoc').show();
                $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg o png');
                $('#mensajeImgDoc').css('color','red');

            }
        });
        
        $(".status").click(function(e){
        	var status = $(this).attr("value");
        	console.log(status);
        	var url = "{!! url('viewPayments/') !!}/"+status;
        	console.log(url);
        	$("#payments").empty();
        	$("#titulo").empty();
        	e.preventDefault();
        	$.ajax({
        		url: url, 
        		type:'get', 
        		dataType:'json',
        		success: function(datos){
        			console.log(datos);
        			$('#titulo').show();
        			$('#titulo').text('Listado de puntos: '+status);
        			$.each(datos, function(i,info){
        				if (info.factura!=null ) {
							var factura = 
							"<img class='materialboxed' width='90' height='90' src='{!!asset('"+info.factura+"')!!}'";
						} else {
							var factura = "No aplica";
						}
        				if (info.fecha_cita!=null) {
				        	var cita = info.fecha_cita;
				        } else {
				        	var cita = "Cita no asignada";
				        }
				        if (info.points!=null) {
				        	var points = info.points;
				        } else {
				        	var points = "Sin puntos";
				        }
				        if (info.status!="Diferido") {
				        	var status = info.status;
				        } else {
				        	var status = "Listo para cobrar";
				        }
        				var fila = '<tr><td>'+
						points+"</td><td>"+
        				factura+"</td><td>"+
						cita+"</td><td>"+
						status+"</td></tr>";
						$("#payments").append(fila);
        			});
        			$('.materialboxed').materialbox();
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
</script>
@endsection