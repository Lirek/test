	<div class="modal fade" id="NewProduct">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Agregue un producto</h4>
			</div>
			<div style="margin-top: -15px">
				<div class="text-center row">
					<form method="POST" id="NewRadioForm" action="{{url('storeProducts')}}" enctype="multipart/form-data" class="form-horizontal style-form" role="form">
						{{ csrf_field() }}
						<div class="col s12">
							<div class="col s6">
                                <div id="otro">
                                    <div class="agregar">
                                        <div class="file-field input-field">
                                            <div class="btn blue">
                                                <span>seleccione<i class="material-icons right">insert_photo</i></span>
                                                <input type="file" accept="image/*" class="validate" id="otraImagen" name="otraImagen[]">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <br>
                                    <br>
                                    </div>
                                    <a class="btn curvaBoton waves-effect waves-light green add_button" id="btnAdd" style="margin-top: 25%;">
                                        <i class="material-icons"></i>Agregar otra imagen
                                    </a>
                                </div>
                            </div>
							<div class="col s6">
								<div class="input-field">
									<input type="text" class="validate count" id="name" name="name" required="required" autofocus="autofocus" data-length="191">
									<label for="name">Nombre del producto</label>
								</div>
								<div class="input-field">
									<input type="text" class="validate count" id="description" name="description" required="required"  data-length="191">
									<label for="description">Descripción</label>
								</div>
								<div class="input-field">
									<input type="number" class="validate" id="cost" name="cost" required="required" min="0">
									<label for="cost">Costo</label>
								</div>
								<div class="input-field">
									<input type="number" class="validate" id="amount" name="amount" required="required" min="1">
									<label for="amount">Cantidad</label>
								</div>
								<div class="file-field input-field">
									<div class="btn blue">
										<span>seleccione<i class="material-icons right">picture_as_pdf</i></span>
										<input type="file" accept=".pdf" name="pdf_prod" id="pdf_prod" required="required" class="validate">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col s12">
							<button class="btn curvaBoton" type="submit" id="enviar">
								Enviar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<div id="misFotos" class="modal">
    <div class="modal-content center">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Fotos del producto</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
	        <table class="responsive-table">
	            <thead>
	                <tr>
	                    <th>fotos</th>
	                </tr>
	            </thead>
	            <tbody id="fotosproducto">
	            </tbody>
	        </table>
    	</div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
        </div>
    </div>
</div>

	<div class="modal" id="cambiarEstatus">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Modifique el estatus del producto</h4>
			</div>
			<br>
			<div style="margin-top: 15%; margin-bottom: 15%">
				<form method="POST" id="formStatus">
					{{ csrf_field() }}
					<div class="col s6">
						<p>
							<label>
								<input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado" required="required">
								<span>Aprobar</span>
							</label>
						</p>
					</div>
					<div class="col s6">
						<p>
							<label>
								<input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado" required="required">
								<span>Negar</span>
							</label>
						</p>
					</div>
					<div class="input-field col s8 offset-s2" style="display:none" id="if_no">
						<textarea name="message" class="materialize-textarea" type="text" id="razon"></textarea>
						<label for="razon">Explique la razón</label>
						<div id="mensajeMaximoRazon"></div>
					</div>
					<br>
					<div class="col s12">
						<button class="btn curvaBoton" type="submit">
							Enviar
						</button>
						<br><br><br>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal fade" id="updateProduct">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Modifique un producto</h4>
			</div>
			<div style="margin-top: -15px">
				<div class="text-center row">
					<form method="POST" id="NewRadioForm" action="{{url('updateProduct')}}" enctype="multipart/form-data" class="form-horizontal style-form" role="form">
						{{ csrf_field() }}
						<input type="hidden" id="idUpdate" value="" name="idUpdate">
						<div class="col s12">
							<div class="col s6">
								<table class="responsive-table">
	                                <thead>
	                                  <tr>
	                                    <th><i class="material-icons"></i>Foto</th>
	                                  </tr>
	                                </thead>
	                                <tbody id="fotostabla">
	                                </tbody>
	                            </table>
                                <div id="otro">
                                    <div class="agregar">
                                        <div class="file-field input-field">
                                            <div class="btn blue">
                                                <span>seleccione<i class="material-icons right">insert_photo</i></span>
                                                <input type="file" accept="image/*" class="validate" id="otraImagen" name="otraImagen[]">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <br>
                                    <br>
                                    </div>
                                    <a class="btn curvaBoton waves-effect waves-light green add_button" id="btnAdd" style="margin-top: 25%;">
                                        <i class="material-icons"></i>Agregar otra imagen
                                    </a>
                                </div>
                            </div>
							<div class="col s6">
								<div class="input-field">
									<input type="text" class="count" id="name_u" name="name" value="" required="required" autofocus="autofocus" data-length="191" placeholder="">
									<label for="name">Nombre del producto</label>
								</div>
								<div class="input-field">
									<input type="text" class="count" id="description_u" name="description" value="" required="required"  data-length="191" placeholder="">
									<label for="description">Descripción</label>
								</div>
								<div class="input-field">
									<input type="number" id="cost_u" name="cost" value="" required="required" min="0" placeholder="">
									<label for="cost">Costo</label>
								</div>
								<div class="input-field">
									<input type="number" id="amount_u" name="amount" value="" required="required" min="1" placeholder="">
									<label for="amount">Cantidad</label>
								</div>
								<a class='btn-large blue' id='pdf_prod_u' href='' target='_blank'>
									<i class='material-icons left'>picture_as_pdf</i>
									Ver PDF
								</a>
								<br>
								<small>Si no cambia el PDF se mantendrá el anterior</small>
								<div class="file-field input-field">
									<div class="btn blue">
										<span>seleccione<i class="material-icons right">picture_as_pdf</i></span>
										<input type="file" accept=".pdf" name="pdf_prod" id="pdf_prod" class="validate">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="col s12">
							<button class="btn curvaBoton" type="submit" id="enviar">
								Enviar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="reject" class="modal">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Historial de negaciones</h4>
			</div>
			<br>
			<div class="col s12 center">
				<h5 class="text-center" id="totalNegaciones"></h5>
				<table class="responsive-table" id="historialRechazo">
					<thead>
						<tr>
							<th><i class="material-icons"></i>Razón del rechazo</th>
							<th><i class="material-icons"></i>Fecha del rechazo</th>
						</tr>
					</thead>
					<tbody id="negaciones">
					</tbody>
				</table>
			</div>
		</div>
	</div>