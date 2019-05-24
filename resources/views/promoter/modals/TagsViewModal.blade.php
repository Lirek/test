  <div class="modal" id="StatusTags">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus de la etiqueta</h4>
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

  <div id="reject" class="modal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
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

  <div id="NewTag" class="modal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar nueva etiqueta</h4>
      </div>
      <br>
      <div class="col s12 center" style="margin-top: 10%; margin-bottom: 10%">
        <form method="POST" id="newTag">
          {{ csrf_field() }}
          <div class="input-field col s6">
            <select name="tipo" id="tipo" required="required">
              <option value="" disabled selected>Seleccione una opción</option>
              @foreach($modulos as $m)
                <option value="{{$m->name}}">{{$m->name}}</option>
              @endforeach
            </select>
            <label>Tipo</label>
          </div>
          <div class="input-field col s6">
            <input id="nombre" name="nombre" type="text" class="validate" required="required">
            <label for="nombre">Nombre de la etiqueta</label>
          </div>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div id="updateTags" class="modal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar etiqueta</h4>
      </div>
      <br>
      <div class="col s12 center" style="margin-top: 10%; margin-bottom: 10%">
        <form method="POST" id="updateTag">
          {{ csrf_field() }}
          <input type="hidden" name="idTag" id="idTag" value="">
          <div class="input-field col s6">
            <select name="tipo_u" id="tipo_u">
              <option value="" id="modulo_a" selected></option>
              @foreach($modulos as $m)
                <option value="{{$m->name}}">{{$m->name}}</option>
              @endforeach
            </select>
            <label>Tipo</label>
          </div>
          <div class="input-field col s6">
            <input id="nombre_u" name="nombre_u" type="text" class="validate" required="required" value="" placeholder="">
            <label for="nombre_u">Nombre de la etiqueta</label>
          </div>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
