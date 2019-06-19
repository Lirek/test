
	<div class="modal" id="NewModule">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Agregar nueva categoría</h4>
			</div>
			<br>
			<div style="margin-top: 15%; margin-bottom: 35%">
				<form method="POST" id="AddModule">
					{{ csrf_field() }}
					<div class="input-field col s8 offset-s2">
						<input type="text" name="categoria" id="categoria" class="autocomplete" required="required">
						<label for="categoria">Nueva categoría</label>
					</div>
					<div class="input-field col s8 offset-s2">
						<select name="access" id="sel1">
							<option value="">Categorías actuales</option>
							@foreach($modules as $module)
								<option value="{{ $module->id }}">{{ $module->name }}</option>
							@endforeach
						</select>
						<label for="sel1">Categorías:</label>
					</div>
					<br><br>
					<br>
					<div class="col s12">
						<button class="btn btn-primary curvaBoton" type="submit">
							Enviar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="modal" id="updateModule">
		<div class="modal-content">
			<div class="col s12 pink darken-3 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Actualizar categoría</h4>
			</div>
			<br>
			<div style="margin-top: 15%; margin-bottom: 35%">
				<form method="POST" id="updateModuleBidder">
					{{ csrf_field() }}
					<input type="hidden" name="idUpdate" id="idUpdate" value="">
					<div class="input-field col s8 offset-s2">
						<input type="text" name="categoria_u" id="categoria_u" value="" class="autocomplete" required="required" placeholder="">
						<label for="categoria_u">Categoría</label>
					</div>
					<div class="input-field col s8 offset-s2">
						<select name="access" id="sel1">
							<option value="">Categorías actuales</option>
							@foreach($modules as $module)
								<option value="{{ $module->id }}">{{ $module->name }}</option>
							@endforeach
						</select>
						<label for="sel1">Categorías:</label>
					</div>
					<br><br>
					<br>
					<div class="col s12">
						<button class="btn btn-primary curvaBoton" type="submit">
							Enviar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>