<?php $__env->startSection('css'); ?>
<style>
	.gly-spin {
		animation-name: spin;
		animation-duration: 1000ms;
		animation-iteration-count: infinite;
		animation-timing-function: linear;
    }
    @keyframes  spin {
    	from {
    		transform:rotate(0deg);
    	}
    	to {
    		transform:rotate(360deg);
    	}
    }
    .btn-swal-center {
        margin-right: 13em;
    }
    @media  only screen and (max-width: 425px) {
        .btn-swal-center {
            margin-right: 10.5em;
        }
    }
    @media  only screen and (max-width: 375px) {
        .btn-swal-center {
            margin-right: 9em;
        }
    }
    @media  only screen and (max-width: 320px) {
        .btn-swal-center {
            margin-right: 7em;
        }
    }
	/*
    label {
	    position: relative;
	    cursor: pointer;
	    color: #666;
	    font-size: 100%;
	}
	*/
	.curvaBoton{border-radius: 20px;}
	.modal { margin-top: -5%; max-height: 98%;}
	.gradient-45deg-light-blue-cyan.gradient-shadow {
            box-shadow: 0 6px 20px 0 rgba(38, 198, 218, 0.5);
        }
    .gradient-45deg-light-blue-cyan {
        background: #0288d1;
        background: -webkit-linear-gradient(45deg, #0288d1 0%, #26c6da 100%);
        background: linear-gradient(45deg, #0288d1 0%, #26c6da 100%);
    }
    .min-height-100 {
        min-height: 100px !important;
    }
    .background-round {
        background-color: rgba(0, 0, 0, 0.18);
        padding: 15px;
        border-radius: 50%;
    }
    .gradient-45deg-green-teal.gradient-shadow {
        box-shadow: 0 6px 20px 0 rgba(77, 182, 172, 0.5);
    } 
    .gradient-45deg-green-teal {
        background: #43A047;
        background: -webkit-linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
        background: linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
    }  
    .gradient-45deg-red-pink.gradient-shadow {
        box-shadow: 0 6px 20px 0 rgba(244, 143, 177, 0.5);
    }
    .gradient-45deg-red-pink {
        background: #FF5252;
        background: -webkit-linear-gradient(45deg, #FF5252 0%, #f48fb1 100%);
        background: linear-gradient(45deg, #FF5252 0%, #f48fb1 100%);
    }
</style>
	<!--DataTables-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/r-2.2.2/datatables.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
	<div class="card-panel curva">
        <div class="row">
            <div class="col s12 m4">
                <div class="card gradient-45deg-light-blue-cyan gradient-shadow" style="height: 150px">
                    <div class="padding-4" style="padding: 4%"> 
                        <div class="col m4">
                            <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">local_activity</i>
                        </div>
                        <div class="col m7">
                            <h5 style="color: white"><b>Tickets disponible:</b> <?php echo e(Auth::user()->credito); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card gradient-45deg-green-teal gradient-shadow" style="height: 150px">
                    <div class="padding-4" style="padding: 4%"> 
                        <div class="col m4">
                            <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">check</i>
                        </div>
                        <div class="col m7">
                        	<h5 style="color: white"><b>Puntos disponibles:</b>
                           		<?php if(Auth::user()->points!=NULL): ?>
                           			<?php echo e(Auth::user()->points); ?>

                       			<?php else: ?>
                       				0
                   				<?php endif; ?>
                           	</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card gradient-45deg-red-pink gradient-shadow" style="height: 150px">
                    <div class="padding-4" style="padding: 4%"> 
                        <div class="col m4">
                            <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">priority_high</i>
                        </div>
                        <div class="col m6">
                           <h5 style="color: white"><b>Puntos pendientes:</b> <?php echo e(Auth::user()->pending_points); ?></h5>
                        </div>
                        <?php if(Auth::user()->pending_points!=0): ?>
	                        <div class="col m12">
	                        	<small style="color: white">Si no recarga este mes podría perder estos puntos</small>
	                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
		<div class="col s12 m6 l4">
			<div class="card hoverable">
				<div class="card-content">
					<h4 class="titelgeneral">Compra de tickets</h4>
					<?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="card hoverable">
							<div class="card-panel card-title light-blue lighten-1">
								<div class="white-text">
									Paquete
									<br><br>
									<i class="large material-icons center">local_offer</i>
									<h4 class="white-text">
										<?php echo e($ticket->amount); ?> Tickets
									</h4>
								</div>
							</div>
							<div class="card-content">
								<span class="green-text"><i class="material-icons waves-effect waves-blue">check</i></span>
								<b>Costo:</b> $<?php echo e($ticket->cost); ?> <small>(incluye IVA)</small>
								<br>
								<span class="green-text"><i class="material-icons waves-effect waves-blue">check</i></span>
								<b>Cantidad de tickets:</b> <?php echo e($ticket->amount); ?>

								<br>
							</div>
							<div class="card-action center-align">
								<?php if(Auth::user()->name!=NULL && Auth::user()->last_name!=NULL && Auth::user()->email!=NULL && Auth::user()->num_doc!=NULL && Auth::user()->fech_nac!=NULL && Auth::user()->direccion!=NULL && Auth::user()->phone!=NULL): ?>
									<?php if(Auth::user()->verify==0): ?>
										<button class="waves-effect waves-light btn curvaBoton green" onclick="esperarAprobacion()">Comprar</button>
									<?php elseif(Auth::user()->verify==2): ?>
										<button class="waves-effect waves-light btn curvaBoton green" onclick="rechazo()">Comprar</button>
									<?php else: ?>
										<a class="waves-effect waves-light btn curvaBoton green modal-trigger" href="#modalPago-<?php echo $ticket->id; ?>" onclick="total(<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>,<?php echo $ticket->points_cost; ?>,<?php echo Auth::user()->points; ?>)">Comprar</a>
									<?php endif; ?>
								<?php else: ?>
									<button class="waves-effect waves-light btn curvaBoton green" onclick="completar()">Comprar</button>
								<?php endif; ?>
							</div>
						</div>

						<div id="modalPago-<?php echo $ticket->id; ?>" class="modal">
							<div class="modal-content">
								<div class="col s12 light-blue lighten-1">
									<h4 class="center white-text"><?php echo e($ticket->name); ?></h4>
								</div>
								<div class="col s12 white">
									<form class="form-horizontal" id="formPago" method="POST" action="<?php echo e(url('BuyPlan')); ?>" enctype="multipart/form-data">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
										<div class="col s12">
											
											<i class="large material-icons center blue-text text-lighten-1">local_offer</i>
										</div>
										<div class="input-field col s6 offset-s3">
											<?php echo e($errors->has('codigo') ? ' has-error' : ''); ?>

											<input type="number" class="validate" min="1" max="20" value="1" name="Cantidad" id="Cantidad-<?php echo e($ticket->id); ?>" required="required" onkeypress="return controltagNum(event)">
											<label for="Cantidad-<?php echo e($ticket->id); ?>">Cantidad de paquetes:</label>
										</div>
										<div class="input-field col s6 offset-s3">
											<input type="hidden" name="cost" id="cost" value="<?php echo e($ticket->cost); ?>">
											<input type="hidden" name="points" id="points" value="<?php echo e($ticket->points_cost); ?>">
											<ul class="collection">
												<li class="collection-item">
													<h5>
														<i class="green-text material-icons">check</i>
														<b>Costo:</b> <?php echo e($ticket->cost); ?>$
													</h5>
												</li>
												<li class="collection-item" id="cantidadTickets-<?php echo e($ticket->id); ?>"></li>
												<li class="collection-item" id="total-<?php echo e($ticket->id); ?>"></li>
											</ul>
										</div>
										<div class="col s12">
											<h5 align="center"><b>Métodos de pago:</b></h5>
										</div>
										<input type="hidden" name="id" id="id" value="<?php echo e($ticket->id); ?>">
										<div class="col s12 m4">
											<p>
												<label>
													<input name="pago" type="radio" id="pago-<?php echo e($ticket->id); ?>" value="Deposito" required="required" onclick="tipo(<?php echo $ticket->id; ?>)">
													<span>Depósito</span>
												</label>
												
											</p>
										</div>
										<div class="col s12 m4">
											<p>
												<label>
													<input name="pago" type="radio" id="pago-<?php echo e($ticket->id); ?>" value="payphone" required="required" onclick="tipo(<?php echo $ticket->id; ?>)">
													<span>PayPhone</span>
												</label>
												
											</p>
										</div>
										<div class="col s12 m4">
											<p>
												<label>
													<input name="pago" type="radio" id="pago-<?php echo e($ticket->id); ?>" value="puntos" required="required" onclick="tipo(<?php echo $ticket->id; ?>)">
													<span>Puntos</span>
												</label>
												
											</p>
										</div>
										<div class="col s12" style="display: none;" id="deposito-<?php echo e($ticket->id); ?>">
											<h5 style="color: black">
												<b>
													Depósito a Cta.Cte PRODUBANCO #02 72 800 11 32 <br> INFORMERET S.A.
												</b>
											</h5>
											<div class="input-field col s12">
												<input id="references-<?php echo e($ticket->id); ?>" type="text" class="validate" name="references" size="28" onkeypress="return controltagNum(event)">
												<label for="references-<?php echo e($ticket->id); ?>">Número de depósito:</label>
											</div>
											<div class="file-field input-field col s12">
												<div class="btn">
													<i class="tiny material-icons">image</i>
													<span>Recibo:</span>
													<input id="voucher-<?php echo e($ticket->id); ?>" type="file" class="validate" accept="image/*" onchange="validarVoucher(<?php echo $ticket->id; ?>)" name="voucher">
												</div>
												<div class="file-path-wrapper">
													<input class="file-path validate" type="text">
												</div>
												<div id="mensajeImgVoucher-<?php echo e($ticket->id); ?>"></div>
											</div>
										</div>
										<div class="col s10 offset-s2" style="display: none;" id="payphone-<?php echo e($ticket->id); ?>">
											<div class="input-field col s10">
												<select name="pais" id="pais-<?php echo e($ticket->id); ?>" class="pais">
												</select>
												<label>Seleccione el país</label>
											</div>
											<div class="col s10">
												<div class="input-field col m4 s12">
													<input disabled value="" id="prefixNumber-<?php echo e($ticket->id); ?>" class="prefixNumber" type="text">
												</div>
												<div class="input-field col m8 s12">
													<input class="validate" type="number" id="numero-<?php echo e($ticket->id); ?>" min="1" name="numero" onkeypress="return controltagNumForm(event,<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>)">
													<label for="numero-<?php echo e($ticket->id); ?>">Número de teléfono</label>
												</div>
												<div id="mensajeValidacion-<?php echo e($ticket->id); ?>" class="col-md-12" align="center" style="margin-top: 2%; color: red;">
												</div>
												<div id="mensajePayPhone-<?php echo e($ticket->id); ?>" class="col-md-12" align="center" style="margin-top: 2%">
												</div>
											</div>
										</div>
										<div class="col s12" style="display: none;" id="puntos-<?php echo e($ticket->id); ?>">
											<h5>
												<b>Sus puntos: </b>
												<?php if(Auth::user()->points): ?>
													<?php echo e(Auth::user()->points); ?>

												<?php else: ?>
													0
												<?php endif; ?>
											</h5>
											<h5><b>Costo por paquete: </b> <?php echo e($ticket->points_cost); ?> puntos</h5>
											<div class="col s12" id="totalP-<?php echo e($ticket->id); ?>"></div>
											<div id="mensajeValidacionPuntos-<?php echo e($ticket->id); ?>" class="col s12" align="center" style="margin-top: 2%; color: red;"></div>
										</div>
										<div class="col s12">
											<div id="mensajeTerminosCondiciones-<?php echo e($ticket->id); ?>" align="center" style="margin-top: 2%; color: red;">
											</div>
											<p>
												<label>
													<input type="checkbox" name="checkTerminosCondiciones" checked="checked" required="required" id="terminosCondiciones-<?php echo e($ticket->id); ?>">
													<span onclick="terminosCondiciones(<?php echo $ticket->id; ?>)">Al comprar estas aceptando nuestros</span>
												</label>
												<a href="<?php echo e(route('terminosCondiciones')); ?>" target="_blank">Términos</a> y <a href="<?php echo e(route('terminosCondiciones')); ?>" target="_blank">Condiciones</a>.
											</p>
										</div>
										<div class="col s12">
											<button class="btn curvaBoton waves-effect waves-light green" id="ingresar-<?php echo e($ticket->id); ?>" type="submit">
												Comprar
												
											</button>
										</div>
										<div class="col s12">
											<a class="btn curvaBoton waves-effect waves-light green" id="ingresarPayPhone-<?php echo e($ticket->id); ?>" onclick="comprar(<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>)">
												Comprar
											</a>
										</div>
										<div class="col s12">
											<a class="btn curvaBoton waves-effect waves-light green" id="ingresarPunto-<?php echo e($ticket->id); ?>" onclick="callback(<?php echo $ticket->id; ?>)">
												Comprar
											</a>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
		<div class="col s12 m6 l8">
			<div class="col s12">
				<h4 class="titelgeneral"><i class="material-icons small">show_chart</i> Mis Balances:</h4>
			</div>
			<div class="col s12">
				<div class="divider"></div>
				<div class="divider"></div>
				<br>
				<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
					<li class="tab" id="denegado"><a class="active" href="#test1">• Compras (Tickets y Puntos En efectivo)</a></li>
					<li class="tab" id="revision"><a href="#test2">• Compra (Tickets Con puntos)</a></li>
					<li class="tab" id="revision"><a href="#test3">• Puntos ganados/perdidos</a></li>
				</ul>
				<div id="test1" class="col s12">
					<?php if(count($Balance)!=0): ?>
						<table class="highlight centered responsive-table" id="tablaFactura" style="width:100%">
							<thead>
								<tr>
									<th><i class="material-icons right">date_range</i> Fecha</th>
									<th><i class="material-icons right">create</i> Concepto</th>
									<th><i class="material-icons">add</i></th>
									<th><i class="material-icons">remove</i></th>
									<th><i class="material-icons right">create</i> Método</th>
									<th><i class="material-icons right">picture_as_pdf</i> Factura</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $Balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="letters">
										<td><?php echo e($balance['Date']); ?></td>
										<td><?php echo e($balance['Transaction']); ?></td>
										<?php if($balance['Type']==1): ?>
											<td></td>
											<td><?php echo e($balance['Cant']); ?></td>
											<td></td>
											<td></td>
										<?php else: ?>
											<td><?php echo e($balance['Cant']); ?></td>
											<td></td>
											<td><?php echo e($balance['Method']); ?></td>
											<?php if($balance['Method'] != 'Puntos'): ?>
												<td>
													<?php if($balance['Factura']!=NULL): ?>
														<a href="https://app.datil.co/ver/<?php echo e($balance['Factura']); ?>/ride" target="_blank" class="waves-effect green waves-light btn-small curvaBoton">
															
															<i class="small material-icons right">remove_red_eye</i> Ver
														</a>
													<?php else: ?>
														<a onclick="generarFactura(<?php echo $balance['id_payments']; ?>)" class="waves-effect waves-light btn-small green curvaBoton">
															<i class="small material-icons right">add</i> Crear
														</a>
													<?php endif; ?>
												</td>
											<?php else: ?>
												<td>No Aplica</td>
											<?php endif; ?>
										<?php endif; ?>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					<?php else: ?>
						<h4 class="titelgeneral">No tiene pagos</h4>
					<?php endif; ?>
				</div>
				<div id="test2" class="col s12">
					<?php if(count($BalancePuntos)!=0): ?>
						<table class="highlight centered responsive-table" id="tablePuntos" style="width:100%">
							<thead>
								<tr>
									<th><i class="material-icons right">date_range</i> Fecha</th>
									<th><i class="material-icons right">create</i> Concepto</th>
									<th><i class="material-icons">add</i></th>
									<th><i class="material-icons">remove</i></th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $BalancePuntos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="letters">
										<td><?php echo e($balance['Date']); ?></td>
										<td><?php echo e($balance['Transaction']); ?></td>
										<?php if($balance['Type']==1): ?>
											<td></td>
											<td><?php echo e($balance['Cant']); ?></td>
											<td></td>
											<td></td>
										<?php else: ?>
											<td><?php echo e($balance['Cant']); ?></td>
											<td></td>
										<?php endif; ?>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					<?php else: ?>
						<h4 class="titelgeneral">No tiene pagos</h4>
					<?php endif; ?>
				</div>
				<div id="test3" class="col s12">
					<?php if($pointsLoser->count()!=0): ?>
						<table class="highlight centered responsive-table" id="tablePuntos" style="width:100%">
							<thead>
								<tr>
									<th><i class="material-icons right">date_range</i> Fecha</th>
									<th><i class="material-icons right">create</i> Motivo</th>
									<th><i class="material-icons right">add</i> Puntos</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $pointsLoser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puntos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="letters">
										<td><?php echo e($puntos->created_at->format('d/m/Y')); ?></td>
										<td><?php echo e($puntos->reason); ?></td>
										<td><?php echo e($puntos->points); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					<?php else: ?>
						<h4 class="titelgeneral">¡Felicidades! No tiene puntos perdidos</h4>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
		
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	
	<!--Import jQuery before materialize.js-->
	<script src="<?php echo e(asset('plugins/materialize_adm/js/materialize.js')); ?>"></script>
	<script src="<?php echo e(asset('plugins/materialize_adm/js/init.js')); ?>"></script>
	<script type="text/javascript" id="jsbin-javascript">
		function completar() {
			swal({
				title: "Complete su información personal por favor",
				text: "Antes de realizar cualquier pago debe completar su información personal",
				icon: "warning",
				buttons: {
					accept: {
						text: "OK",
						value: true,
						className: "btn-swal-center"
					}
				}
			})
			.then((completar) => {
				var ruta = "<?php echo e(url('EditProfile')); ?>";
				$(location).attr('href',ruta);
			});
		}

		function esperarAprobacion() {
			swal({
				title: "Verificando su información",
				text: "Disculpe pero en estos momentos nos encontramos verificando su información, en breves momentos terminaremos con la verificación.",
				icon: "warning",
				buttons: {
					accept: {
						text: "OK",
						value: true,
						className: "btn-swal-center"
					}
				}
			});
		}

		function rechazo() {
			swal({
				className: "justify",
				title: "Verificación rechazada",
				text: "Le informamos que su verificación fue rechazada, por favor revise su bandeja de correos (incluida la de spam) para ampliar la información del rechazo y modifique su perfil para posterior revisión.",
				icon: "info",
				buttons: {
					accept: {
						text: "OK",
						value: true,
						className: "btn-swal-center"
					}
				}
			})
			.then((completar) => {
				var ruta = "<?php echo e(url('EditProfile')); ?>";
				$(location).attr('href',ruta);
			});
		}

		function controltagNum(e) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==8) return true; // para la tecla de retroseso
			else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
			else if (tecla==13) return true;
			patron =/[0-9]/;// -> solo numeros
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}

		function controltagNumForm(e,id,cost,cantidadTickets) {
			tecla = (document.all) ? e.keyCode : e.which;
			if (tecla==13) {
				comprar(id,cost,cantidadTickets);
				return false;
			}
			patron =/[0-9]/;
			te = String.fromCharCode(tecla);
			return patron.test(te);
		}

		function total(id,costo,cant,points,Mypoints){
			$("#ingresarPayPhone-"+id).hide();
			$("#ingresarPunto-"+id).hide();

			var documento = $('#Cantidad-'+id).val();
			var total = parseFloat(costo*documento);
			var ticket = parseFloat(cant*documento);
			var totalP = parseFloat(documento*points);
			if ( Mypoints != null ){
				var Mypoints = Mypoints;
			} else {
				var Mypoints = 0;
			}

			$("#Cantidad-"+id).change(function(){
				documento = parseFloat($('#Cantidad').val());
				total = parseFloat(costo*documento);
			});

			$("#Cantidad-"+id).keyup(function(){
				documento = parseFloat($('#Cantidad-'+id).val());
				total = parseFloat(costo*documento);
				if (isNaN(total)) {
					total = 0;
				}
				ticket = parseFloat(cant*documento);
				if (isNaN(ticket)) {
					ticket = 0;
				}
				totalP = parseFloat(documento*points)
				if (isNaN(totalP)) {
					totalP = 0;
				}

				$('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5>');
				$('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
				$('#totalP-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
				if(totalP > Mypoints){
					$('#ingresarPunto-'+id).attr('disabled',true);
					$("#ingresar-"+id).attr('disabled',true);
					$('#mensajeValidacionPuntos-'+id).show();
					$('#mensajeValidacionPuntos-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>No posee esa cantidad</span> </h6>");
				}else{
					$('#mensajeValidacionPuntos-'+id).hide();
					$('#ingresarPunto-'+id).attr('disabled',false);
				}
			});

			$(':input[type="number"]').click(function (){
				documento = parseFloat($('#Cantidad-'+id).val());
				total = parseFloat(costo*documento);
				if (isNaN(total)) {
					total = 0;
				}
				ticket = parseFloat(cant*documento);
				if (isNaN(ticket)) {
					ticket = 0;
				}
				$('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5>');
				$('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
				$('#totalP-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
				if(totalP > Mypoints){
					$('#ingresarPunto-'+id).attr('disabled',true);
					$("#ingresar-"+id).attr('disabled',true);
				}else{
					$('#ingresarPunto-'+id).attr('disabled',false);
				}
			});

			$('#cantidadTickets-'+id).html('<h5><i class="green-text material-icons">check</i><b> Cantidad de tickets: </b>' + ticket + '</h5>');
			$('#total-'+id).html('<h5><i class="green-text material-icons">check</i><b> Total a pagar:</b>' +total+ '$</h5>');
			$('#totalP-'+id).html('<h5><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
			if(totalP > Mypoints){
				$('#ingresarPunto-'+id).attr('disabled',true);
				$("#ingresar-"+id).attr('disabled',true);
				$('#Cantidad-'+id).focus();
				$('#mensajeValidacionPuntos-'+id).show();
					$('#mensajeValidacionPuntos-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>No posee esa cantidad</span> </h6>");
			}else{
				$('#mensajeValidacionPuntos-'+id).hide();
				$('#ingresarPunto-'+id).attr('disabled',false);
			}
		}

		function tipo(id){
			var valor = $("input:radio[id=pago-"+id+"]:checked").val();
			if(valor == 'Deposito'){
				$("#ingresar-"+id).attr('disabled',false);
				$("#deposito-"+id).show();
				$("#ingresar-"+id).show();
				$("#ingresarPayPhone-"+id).hide();
				$("#ingresarPunto-"+id).hide();
				$("#puntos-"+id).hide();
				$("#payphone-"+id).hide();
				$('#voucher-'+id).attr('required','required');
				$('#references-'+id).attr('required','required');
				$('#references-'+id).focus();
				$('#pais-'+id).removeAttr('required');
				$('#numero-'+id).removeAttr('required');
			}else if(valor == 'puntos'){
				$("#ingresarPunto-"+id).show();
				$("#puntos-"+id).show();
				$("#payphone-"+id).hide();
				$("#deposito-"+id).hide();
				$("#ingresar-"+id).hide();
				$("#ingresarPayPhone-"+id).hide();
				$("#ingresar-"+id).attr('disabled',true);
				$('#pais-'+id).removeAttr('required');
				$('#numero-'+id).removeAttr('required');
				$('#voucher-'+id).removeAttr('required','required');
				$('#references-'+id).removeAttr('required','required');
			}else{
				$("#ingresarPayPhone-"+id).show();
				$("#payphone-"+id).show();
				$("#puntos-"+id).hide();
				$("#ingresarPunto-"+id).hide();
				$("#ingresar-"+id).hide();
				$("#deposito-"+id).hide();
				$("#ingresar-"+id).attr('disabled',true);
				$('#voucher-'+id).removeAttr('required','required');
				$('#references-'+id).removeAttr('required','required');
				$('#pais-'+id).attr('required','required');
				$('#numero-'+id).focus();
				$('#numero-'+id).attr('required','required');
				$('#codCountry-'+id).text("+593");
				$('#pais-'+id).on('change',function(){
					$('#pais-'+id).each(function(){
						if (this.value=="") {
							$('#prefixNumber-'+id).val("---");
						} else {
							var v = "+"+this.value;
							$('#prefixNumber-'+id).val(v);
						}
					});
				});
			}
		}

		function callback(id) {
			var cant = $('#Cantidad-'+id).val();
			console.log(cant);
			if (cant=="" || cant==0) {
				$('#mensajeValidacionPuntos-'+id).show();
				$('#mensajeValidacionPuntos-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>Debe indicar la cantidad</span> </h6>");
				$('#Cantidad-'+id).focus();
			} else {
				$('#mensajeValidacionPuntos-'+id).hide();
				var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
				swal({
					title: "Procesando",
					text: "Estamos procesando su pago, por favor espere un momento.",
					icon: gif,
					buttons: false,
					closeOnEsc: false,
					closeOnClickOutside: false,
					onOpen: () => {
						swal.showLoading();
					}
				});
				var costo = $('#cost').val();
				var puntos = $('#points').val();
				var tickets = id;
				console.log(puntos);
				var ruta = "<?php echo e(url('BuyPuntos/')); ?>";
				$.ajax({
					url: ruta,
					type: "post",
					data: {
						_token: $('input[name=_token]').val(),
						cost: costo,
						points: puntos,
						ticket_id: tickets,
						Cantidad: cant
					},
					success: function (result) {
						console.log(result);
						if (result==1) {
							swal({
								title: "Puntos insuficientes",
								text: "Sus puntos no son suficientes para realizar esta compra, le invitamos a cambiar la cantidad de paquetes o a elegir otra forma de pago.",
								icon: "warning",
								buttons: {
									accept: {
										text: "OK",
										value: true,
										className: "btn-swal-center"
									}
								},
								closeOnEsc: false,
								closeOnClickOutside: false
							});
						} else {
							var idUser=<?php echo Auth::user()->id; ?>;
							console.log(idUser);
							$.ajax({
								url     : "<?php echo e(url('MyTickets')); ?>/"+idUser,
								type    : 'GET',
								dataType: "json",
								success: function (respuesta){
									console.log(respuesta);
									swal({
										title: "¡Pago exitoso!",
										icon: "success",
										buttons: {
											accept: {
												text: "OK",
												value: true,
												className: "btn-swal-center"
											}
										},
										closeOnEsc: false,
										closeOnClickOutside: false
									})
									.then((ok) => {
										location.reload();
									});
								},
							});
						}
					}
				});
			}
		}

		function terminosCondiciones(id) {
			if (!($('input[name="checkTerminosCondiciones"]').is(':checked'))) {
				$('#mensajeTerminosCondiciones-'+id).hide();
				$("#ingresar-"+id).attr('disabled',false);
				$("#ingresarPunto-"+id).attr('disabled',false);
				$("#ingresarPayPhone-"+id).attr('disabled',false);
			} else {
				$("#ingresar-"+id).attr('disabled',true);
				$("#ingresarPunto-"+id).attr('disabled',true);
				$("#ingresarPayPhone-"+id).attr('disabled',true);
				$('#mensajeTerminosCondiciones-'+id).show();
				$('#mensajeTerminosCondiciones-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>Por favor marque la casilla de 'Términos y Condiciones' antes de realizar la compra</span> </h6>");
			}
		}

		//---------------------------------------------------------------------------------------------------
		// Validar formato del voucher
		function validarVoucher(id) {
			var img_voucher = $('#voucher-'+id).val();
			console.log(img_voucher);
			var extension = img_voucher.substring(img_voucher.lastIndexOf("."));
			console.log(extension);
			if (extension==".png" || extension==".jpg" || extension==".jpeg") {
				$('#ingresar-'+id).attr('disabled',false);
				$('#mensajeImgVoucher-'+id).hide();
			} else {
				$('#ingresar-'+id).attr('disabled',true);
				$('#mensajeImgVoucher-'+id).show();
				$('#mensajeImgVoucher-'+id).text('El recibo debe estar en formato jpeg, jpg o png');
				$('#mensajeImgVoucher-'+id).css('color','red');
			}
		}
		// Validar formato del voucher
		//---------------------------------------------------------------------------------------------------

		$(document).ready(function(){
			//$('select').formSelect();

			var ruta = "https://pay.payphonetodoesposible.com/api/Regions";
			var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
			var headers    = "Bearer "+TOKEN;
			$('.prefixNumber').val('+593');
			$.ajax({
				url     : ruta,
				headers : {
					'Authorization' : headers
				},
				type    : "GET",
				dataType: "json",
				success : function (data) {
					console.log(data);
					var optionDefault = "<option value=''>Seleccione un país...</option>";
					var select = $(".pais");
					select.append(optionDefault);
					$.each(data,function(i) {
						var options = "<option value='"+data[i].prefixNumber+"'>"+data[i].name+"</option>";
						select.append(options);
						select.val("593");
					});
					$('select').formSelect();
				}
			});

			$("#formPago").on('submit', function(e){
				var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
				swal({
					title: "Procesando la información",
					text: "Espere mientras se procesa la información.",
					icon: gif,
					buttons: false,
					closeOnEsc: false,
					closeOnClickOutside: false
				});
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
	<script id="jsbin-javascript">
		function generarFactura(id_payments) {
			console.log(id_payments);
			var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
			swal({
				title: "¡Generando factura!",
				text: "Estamos generando su factura...",
				icon: gif,
				buttons: false,
				closeOnEsc: false,
				closeOnClickOutside: false
			});
			var intento = 0;
			var maxIntento = 5; // 30seg de espera // 10
			var medio = "deposito_cuenta_bancaria";
			getDatilAgain(id_payments,medio,function callback(infoFactura) {
				console.log(infoFactura);
				var idFactura = infoFactura.id;
				console.log(idFactura);
				if (intento <= maxIntento) {
					if (idFactura!=undefined) {
						var parametros = "/"+idFactura+"/"+id_payments;
						var ruta = "<?php echo e(url('/generarFactura/')); ?>"+parametros;
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
						intento++;
					} else {
						console.log('intento: '+intento);
						getDatilAgain(id_payments,medio,callback);
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

		function bdd(id,cost,callback){
			var value = $('#Cantidad-'+id).val();
			var parametros = "/"+id+"/"+cost+"/"+value;
			var ruta = "<?php echo e(url('/BuyPayphone/')); ?>"+parametros;
			var id = 0;
			$.ajax({
				url     : ruta,
				type    : "GET",
				dataType: "json",
				success: function (data) {
					var id = data;
					callback(id);
				}
			});
			return id;
		}

		function transactionCanceled(reference,id,callback) {
			var parametros = "/"+id+"/"+reference;
			var ruta = "<?php echo e(url('/TransactionCanceled/')); ?>"+parametros;
			var cancelar = true;
			$.ajax({
				url     : ruta,
				type    : "GET",
				dataType: "json",
				success : function (data) {
					var cancelar = data;
					callback(cancelar);
				}
			});
			return cancelar;
		}

		function transactionApproved(id,reference,ticket,idFactura,callback) {
			var parametros = "/"+id+"/"+reference+"/"+ticket+"/"+idFactura;
			var ruta = "<?php echo e(url('/TransactionApproved/')); ?>"+parametros;
			var aprobar = true;
			$.ajax({
				url     : ruta,
				type    : "GET",
				dataType: "json",
				success : function (data) {
					var aprobar = data;
					callback(aprobar);
				}
			});
			return aprobar;
		}
		/*
		function transactionPending(reference,id,callback) {
			var parametros = "/"+id+"/"+reference;
			var ruta = "<?php echo e(url('/TransactionPending/')); ?>"+parametros;
			var pendiente = true;
			$.ajax({
				url     : ruta,
				type    : "GET",
				dataType: "json",
				success : function (data) {
					var pendiente = data;
					callback(pendiente);
				}
			});
			return pendiente;
		}
		*/

		function getUserPayPhone(numberPhone,countryPrefix) {
			return new Promise(function(resolve, reject) {
				var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
				var headers    = "Bearer "+TOKEN;
				var url = "https://pay.payphonetodoesposible.com/api/Users/"+numberPhone+"/region/"+countryPrefix;
				var req = new XMLHttpRequest();
				req.open('GET', url);
				req.setRequestHeader("Authorization",headers);
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

		function getDatil(idTicketSales,medio) {
			return new Promise(function(resolve,reject) {
				var parametros = "/"+idTicketSales+"/"+medio;
				var url = "<?php echo e(url('/factura/')); ?>"+parametros;
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

		function getSalePayPhone(transactionId) {
			return new Promise(function(resolve, reject) {
				var url = "https://pay.payphonetodoesposible.com/api/Sale/"+transactionId;
				var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
				var headers = "Bearer "+TOKEN;
				var req = new XMLHttpRequest();
				req.open('GET', url);
				req.setRequestHeader("Authorization",headers);
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

		function postSalePayPhone(numberPhone,countryPrefix,total,id) {
			return new Promise(function(resolve, reject) {
				var url = "https://pay.payphonetodoesposible.com/api/Sale";
				var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
				var headers = "Bearer "+TOKEN;
				var totalInt = (total*100); // Para transformarlo de decimales a enteros
				var data = { phoneNumber: numberPhone, countryCode: countryPrefix, amount: totalInt, amountWithTax: 0, amountWithoutTax: 0, tax: 0, service : totalInt, tip: 0, clientTransactionId: id };
				var datos = JSON.stringify(data);
				var req = new XMLHttpRequest();
				req.open('POST',url,true);
				req.setRequestHeader("Authorization",headers);
				req.setRequestHeader("Content-Type","application/json;charset=UTF-8");
				req.onload = function() {
					if (req.status == 200) {
						resolve(req.response);
					}
					else {
						resolve(req.response);
					}
				};
				req.onerror = function() {
					reject(Error("Network Error"));
				};
				req.send(datos);
			});
		}

		function postReverse(transactionId) {
			return new Promise(function(resolve,reject) {
				var url = "https://pay.payphonetodoesposible.com/api/Reverse";
				var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
				var headers = "Bearer "+TOKEN;
				var data = { id: transactionId };
				var datos = JSON.stringify(data);
				var req = new XMLHttpRequest();
				req.open('POST',url,true);
				req.setRequestHeader("Authorization",headers);
				req.setRequestHeader("Content-Type","application/json;charset=UTF-8");
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
				req.send(datos);
			});
		}

		function comprobarEstatusPagoPayPhone(id,callback) {
			var msn = "";
			getSalePayPhone(id).then(function(response) {
				var res = JSON.parse(response);
				msn = res;
			}, function(error) {
				msn = error;
			});
			setTimeout(function() {
				callback(msn);
			},1000);
		}

		function getDatilAgain(idTicketSales,medio,callback) {
			var msn = "";
			getDatil(idTicketSales,medio).then(function(response) {
				var res = JSON.parse(response);
				msn = res;
			}, function(error) {
				msn = error;
			});
			setTimeout(function() {
				callback(msn);
			},5000);
		}

		function comprar(id,cost,cantidadTickets) {
			$('#ingresarPayPhone-'+id).attr("disabled", true);
			var numberPhone = $('#numero-'+id).val();
			var countryPrefix = $('#pais-'+id).val();
			var cantidadPaquetes = $('#Cantidad-'+id).val();
			var tickets = parseFloat(cantidadTickets*cantidadPaquetes);
			console.log(cantidadPaquetes);

			if (numberPhone=="" || countryPrefix=="" || (cantidadPaquetes=="" || cantidadPaquetes==0) ) {
				if (cantidadPaquetes=="" || cantidadPaquetes==0) {
					$('#mensajePayPhone-'+id).hide();
					$('#mensajeValidacion-'+id).show();
					$('#mensajeValidacion-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>Debe indicar la cantidad</span> </h6>");
					$('#ingresarPayPhone-'+id).removeAttr("disabled");
					$('#Cantidad-'+id).focus();
				} else {
					$('#mensajePayPhone-'+id).hide();
					$('#mensajeValidacion-'+id).show();
					$('#mensajeValidacion-'+id).html("<h6> <i class='material-icons red-text'>warning</i> <span>Los datos introducidos son erróneos</span> </h6>");
					$('#ingresarPayPhone-'+id).removeAttr("disabled");
					$('#numero-'+id).focus();
				}
			} else {
				$('#mensajeValidacion-'+id).hide();
				$('#mensajePayPhone-'+id).show();
				$('#mensajePayPhone-'+id).html("<h6> <i class='material-icons gly-spin'>refresh</i><span> Conectando con PayPhone...</span></h6>");

				getUserPayPhone(numberPhone,countryPrefix).then(function(userPayPhone) {
					$('#mensajePayPhone-'+id).hide();
					var clientePayPhone = JSON.parse(userPayPhone);
					if (clientePayPhone.name==undefined) {
						swal({
							title: "El usuario no existe en PayPhone",
							text: "El número telefónico que introdujo no se encuentra registrado en PayPhone, verifique los datos e intentelo de nuevo, por favor.",
							icon: "warning",
							buttons: {
								accept: {
									text: "OK",
									value: true,
									className: "btn-swal-center"
								}
							},
							closeOnEsc: false,
							closeOnClickOutside: false
						});
						$('#ingresarPayPhone-'+id).removeAttr("disabled");
					} else {
						var nombre = clientePayPhone.name+" "+clientePayPhone.lastName;
						swal({
							title: "Confirmación de usuario",
							text: "El número introducido, corresponde a "+nombre+", ¿es usted?",
							icon: "warning",
							buttons: {
								cancel: "No",
								accept: {
									text: "Si, soy yo",
									value: true
								}
							},
							closeOnEsc: false,
							closeOnClickOutside: false
						})
						.then((confirmacion) => {
							if(confirmacion) {
								var total = cantidadPaquetes*cost;
								swal({
									title: "Confirmación de pago a "+nombre,
									text: "Se le aplicará el cobro por la compra de "+cantidadPaquetes+" paquete(s) de "+cost+"$ cada uno, para un total de "+total+"$.",
									icon: "warning",
									buttons: {
										cancel: "Cancelar",
										accept: {
											text: "Aceptar",
											value: true
										}
									},
									closeOnEsc: false,
									closeOnClickOutside: false
								})
								.then((pagar) => {
									$('#ingresarPayPhone-'+id).attr("disabled", true);
									$('#mensajePayPhone-'+id).show();
									$('#mensajePayPhone-'+id).html("<h6> <i class='material-icons gly-spin'>refresh</i> <span>Conectando con PayPhone...</span> </h6>");
									console.log("id: "+id+" cost: "+cost);
									var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
									swal({
										title: "¡Procesando información!",
										text: "Estamos procesando su información...",
										icon: gif,
										buttons: false,
										closeOnEsc: false,
										closeOnClickOutside: false
									});
									bdd(id,cost,function(idTicketSales) {
										console.log("idTicketSales: "+idTicketSales);
										swal({
											title: "¡Listo! Estamos esperando su confirmación...",
											text: "Verifique su teléfono y seleccione una opción.",
											icon: gif,
											buttons: false,
											closeOnEsc: false,
											closeOnClickOutside: false
										});
										postSalePayPhone(numberPhone,countryPrefix,total,idTicketSales).then(function(response) {
											var intento = 0;
											var maxIntento = 90; // 1min y 1/2 de espera
											var transaction = JSON.parse(response);
											console.log(transaction);
											console.log(transaction.transactionId);
											comprobarEstatusPagoPayPhone(transaction.transactionId,function callback(transactionInfo) {
												$('#mensajePayPhone-'+id).show();
												$('#mensajePayPhone-'+id).html("<h6> <i class='material-icons gly-spin'>refresh</i> <span>Conectando con PayPhone...</span> </h6>");
												if (intento <= maxIntento) {
													console.log(transactionInfo);
													if (transactionInfo!=" ") {
														console.log(transactionInfo);
														var status = transactionInfo.transactionStatus;
														console.log(status);
														if (status=="Pending") {
															console.log("intento "+intento+": "+status);
															comprobarEstatusPagoPayPhone(transaction.transactionId,callback);
															intento++;
														}
														else if (status=="Approved") {
															swal({
																title: "¡Ya casi terminamos!",
																text: "Estamos procesando su información...",
																icon: gif,
																buttons: false,
																closeOnEsc: false,
																closeOnClickOutside: false
															});
															console.log("intento "+intento+": "+status);
															console.log(transaction.transactionId);
															var medio = "dinero_electronico_ec";
															getDatilAgain(idTicketSales,medio,function callback(infoFactura) {
																console.log(infoFactura);
																var idFactura = infoFactura.id;
																console.log(idFactura);
																if (idFactura!=undefined) {
																	var idTicket = idTicketSales.split("|")[0];
																	console.log(idTicket);
																	transactionApproved(idTicket,transaction.transactionId,tickets,idFactura,function(aprobar) {
																		console.log("todo bien? "+aprobar);
																		swal({
																			title: "¡Pago exitoso!",
																			text: "No. de Transacción: #"+transaction.transactionId+". Disfrutalos con todo el entretenimiento que te ofrece LEIPEL",
																			icon: "success",
																			buttons: {
																				accept: {
																					text: "OK",
																					value: true,
																					className: "btn-swal-center"
																				}
																			},
																			closeOnEsc: false,
																			closeOnClickOutside: false
																		})
																		.then((recarga) => {
																			location.reload();
																		});
																	});
																} else {
																	getDatilAgain(idTicketSales,medio,callback);
																}
															});
														}
														else if (status=="Canceled") {
															swal({
																title: "¡Ya casi terminamos!",
																text: "Estamos procesando su información...",
																icon: gif,
																buttons: false,
																closeOnEsc: false,
																closeOnClickOutside: false
															});
															console.log("intento "+intento+": "+status);
															var idTicket = idTicketSales.split("|")[0];
															console.log(transaction.transactionId,idTicket);
															transactionCanceled(transaction.transactionId,idTicket,function(cancelar) {
																console.log(cancelar);
																swal({
																	title: "¡Pago cancelado!",
																	text: "Su pago fue cancelado.",
																	icon: "error",
																	buttons: {
																		accept: {
																			text: "OK",
																			value: true,
																			className: "btn-swal-center"
																		}
																	},
																	closeOnEsc: false,
																	closeOnClickOutside: false
																})
																.then((recarga) => {
																	location.reload();
																});
															});
														}
														else if (status==undefined) {
															console.log("intento desde == undefined "+intento+": "+status);
															comprobarEstatusPagoPayPhone(transaction.transactionId,callback);
															intento++;
														}
													}
												} else {
													console.log("intento "+intento+" expiró el tiempo");
													console.log(transaction.transactionId);
													postReverse(transaction.transactionId).then(function(response) {
														var idTicket = idTicketSales.split("|")[0];
														console.log(response,transaction.transactionId,idTicket);
														transactionCanceled(transaction.transactionId,idTicket,function(pendiente) {
															console.log(pendiente);
															swal({
																title: "¡Ha expirado el tiempo de espera!",
																text: "No se pudo procesar el pago por exceder el límite del tiempo permitido.",
																icon: "warning",
																buttons: false
															})
															.then((recarga) => {
																location.reload();
															});
														});
													});
												}
											}, function(error) {
												swal({
													title: "¡Error de conexión!",
													text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
													icon: "error",
													buttons: {
														accept: {
															text: "OK",
															value: true,
															className: "btn-swal-center"
														}
													},
													closeOnEsc: false,
													closeOnClickOutside: false
												});
												$('#mensajePayPhone-'+id).hide();
											});
										}, function(error) {
											swal({
												title: "¡Error de conexión!",
												text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
												icon: "error",
												buttons: {
													accept: {
														text: "OK",
														value: true,
														className: "btn-swal-center"
													}
												},
												closeOnEsc: false,
												closeOnClickOutside: false
											});
											$('#mensajePayPhone-'+id).hide();
										});
									});
								});
							}  else {
								swal({
									title: "Tranquilo no pasó nada",
									text: "Verifique el número e intentelo de nuevo, por favor",
									icon: "warning",
									buttons: {
										accept: {
											text: "OK",
											value: true,
											className: "btn-swal-center"
										}
									},
									closeOnEsc: false,
									closeOnClickOutside: false
								});
							}
						});
						$('#ingresarPayPhone-'+id).removeAttr("disabled");
					}
				}, function(error) {
					swal({
						title: "¡Error de conexión!",
						text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
						icon: "error",
						buttons: {
							accept: {
								text: "OK",
								value: true,
								className: "btn-swal-center"
							}
						},
						closeOnEsc: false,
						closeOnClickOutside: false
					});
					$('#mensajePayPhone-'+id).hide();
				});
			}
			return false;
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>