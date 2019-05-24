  <div class="modal" id="status">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus del pago</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
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
            <button class="btn btn-primary curvaBoton" type="submit">
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