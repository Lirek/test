  <div class="modal fade" id="PubModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-center">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body text-center">
          <p>Modifique el estatus de la Publicacion periódica</p>
          <form method="POST" id="formStatus">
            {{ csrf_field() }}
            <div class="radio-inline">
              <label for="option-1">
                <input type="radio" id="option-1"  onclick="javascript:yesnoCheck();" name="status_p" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </div>

            <div class="radio-inline">
              <label for="option-2">
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status_p" value="Denegado">
                <span>Negar</span>
              </label>
            </div>

            <div style="display:none" id="if_no">
                <label class="mdl-textfield__label" for="razon">Explique La Razon</label>
                <textarea name="message_p" class="form-control" type="text" id="razon"></textarea>
                <div id="mensajeMaximoRazonP"></div>
            </div>
            <br>

            <div class="radio-inline">
              <button class="btn btn-primary" type="submit" id="rechazoP">
                Enviar
              </button>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="file" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revista</h4>
        </div>
        <div class="modal-body">
          <embed id="megazine_file" src="" width="500" height="375" type='application/pdf'>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div> 


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Modificar estatus</h4>
        </div>
        <div class="modal-body text-center">
          <p>Modifique el estatus de la revista</p>
          <form method="POST" id="formStatusMegazine">
            {{ csrf_field() }}
            <div class="radio-inline">
              <label for="option-1">
                <input type="radio" id="optionR1" onclick="javascript:yesNoCheck();" name="status" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </div>

            <div class="radio-inline">
              <label for="option-2">
                <input type="radio" id="optionR2" onclick="javascript:yesNoCheck();" name="status" value="Rechazado">
                <span>Rechazar</span>
              </label>
            </div>

            <div style="display:none" id="if_noR">
              <label for="razon">Explique la razón</label>
              <textarea name="message" class="form-control" type="text" id="razonR"></textarea>
              <div id="mensajeMaximoRazonR"></div>
            </div>
            <br>

            <button class="btn btn-primary" type="submit" id="rechazoR">
              Enviar
            </button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="negacionesR" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Historial de negaciones</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <h5 class="text-center" id="totalNegaciones"></h5>
          </div>
          <div class="tab-content text-center">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="historialRechazoR">
                  <thead>
                    <tr>
                      <th class="non-numeric">Razón del rechazo</th>
                      <th class="non-numeric">Fecha del rechazo</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="negacionesP" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Historial de negaciones</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <h5 class="text-center" id="totalNegaciones"></h5>
          </div>
          <div class="tab-content text-center">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="historialRechazoP">
                  <thead>
                    <tr>
                      <th class="non-numeric">Razón del rechazo</th>
                      <th class="non-numeric">Fecha del rechazo</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>