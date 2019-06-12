  <div class="modal" id="myModal">
    <div class="modal-content">
      <div class="col s12 pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus de la solicitud</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Pre-aprobar</span>
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

  <div class="modal fade" id="AssingPromoter">
    <div class="modal-content">
      <div class="col s12 pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Asignar un vendedor</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="AssingPromoterForm">
          {{ csrf_field() }}
          <div class="input-field col s12">
            <select id="sel1" name="promoter_n">
              <option value="" disabled selected>Seleccione una opción</option>
              @foreach($salesmans as $salesman) 
                <option value="{{$salesman->id}}">{{$salesman->name}}</option>  
              @endforeach
            </select>
            <label>Vendedores:</label>
          </div>
          <div class="col s12">
            <button class="btn btn-primary curvaBoton" type="submit">
              Enviar
            </button>
          </div>
          <br><br>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="negado">
    <div class="modal-content">
      <div class="col s12 pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Historial de negaciones</h4>
      </div>
      <br>
      <div class="col s12">
        <table class="responsive-table" id="historialRechazo">
          <h5 id="total"></h5>
          <thead>
            <tr>
              <th><i class="material-icons"></i>Razón del rechazo</th>
              <th><i class="material-icons"></i>Fecha del rechazo</th>
            </tr>
          </thead>
          <tbody id="historial">
          </tbody>
        </table>
      </div>
    </div>
  </div>