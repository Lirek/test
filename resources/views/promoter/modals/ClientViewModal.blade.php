  <div class="modal" id="myModal">
    <div class="modal-content">
      <div class="col s12  pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar estado al proveedor</h4>
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
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado" required="required">
                <span>Recharzar</span>
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
          {{--
            <div class="radio-inline">
              <label for="option-1">
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </div>

            <div class="radio-inline">
              <label for="option-2">
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                <span>Negar</span>
              </label>
            </div>

            <div style="display:none" id="if_no">
              <label for="razon">Explique la razón</label>
              <textarea name="message" class="form-control" type="text" id="razon"></textarea>
              <div id="mensajeMaximoRazon"></div>
            </div>
            <br>

            <button class="btn btn-primary" type="submit">
              Enviar
            </button>
            --}}
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="ModalUser">
    <div class="modal-content">
      <div class="col s12 pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 10px">Detalles del usuario</h4>
      </div>
      <div class="row">
        <div class="col s5 offset-s1">
          <img class='materialboxed' src='' id="perfilUsuario" width="200" height="200" alt='Perfil usuario'>
          <label class="control-label" style="padding-right: 25%;">Imagen de perfil: </label>
        </div>
        <div class="col s5 offset-s1">
          <img class='materialboxed' src='' id="imgRucUsuario" width="200" height="200" alt='RUC usuario'>
          <label class="control-label" style="padding-right: 25%;">Imagen del RUC: </label>
          <div id="mensajeimgRucUsuario"></div>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col s6">
          {{--RUC del usuario--}}
          <label for="exampleInputFile" class="control-label">RUC: </label>
          <div id="rucUsuario"></div>
          <br>
          {{--Nombre del usuario--}}
          <label for="exampleInputFile" class="control-label">Nombre: </label>
          <div id="nombreUsuario"></div>
          <br>
          {{--Correo del usuario--}}
          <label for="exampleInputFile" class="control-label">Correo: </label>
          <div id="correoUsuario"></div>
          <br>
        </div>
        <div class="col s6">
          {{--Descripcion del usuario--}}
          <label for="exampleInputFile" class="control-label">Código: </label>
          <div id="codigoUsuario"></div>
          <br>
          {{--Telefono del usuario--}}
          <label for="exampleInputPassword1" class="control-label">Teléfono: </label>
          <div id="telefonoUsuario"></div>
          <br>
          {{--Tickets del usuario--}}
          <label for="exampleInputPassword1" class="control-label">Tickets: </label>
          <div id="ticketsUsuario"></div>
          <br>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="ciModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Imagen del documento</h4>
        </div>
        <div class="modal-body text-center">
          <img src="" id="ci_photo" data-big="" data-overlay="" data-big2x="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal" id="webModal">
    <div class="modal-content">
      <div class="col s12 pink darken-3 text-center">
        <h4 class="white-text" style="padding: 25px 10px">Redes</h4>
      </div>
      <table class="table table-bordered table-striped table-condensed" id="WebsTable">
        <thead>
          <tr>
            <th><i class="material-icons"></i>Nombre</th>
            <th><i class="material-icons"></i>Correo</th>
            <th><i class="material-icons"></i>Nivel</th>
          </tr>
        </thead>
        <tbody id="redes">
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal" id="PayModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="col s12 light-blue lighten-1 text-center">
          <h4 class="white-text" style="padding: 25px 10px">Validar Depósito</h4>
        </div>
        <form method="POST" id="formPayment">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="opt-1" name="status_p" value="Aprobado" required="required">
                <span>Aprobar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="opt-2" name="status_p" value="Rechazado" required="required">
                <span>Recharzar</span>
              </label>
            </p>
          </div>
          <div class="input-field col s8 offset-s2" style="display:none" id="if_no2">
            <textarea name="message" class="materialize-textarea" type="text" id="razon2"></textarea>
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