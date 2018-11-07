  <div class="modal fade" id="file" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Libro</h4>
        </div>
        <div class="modal-body">
          <embed id="book_file" data="" src="" width="500" height="375" style="width:100%;height:600px;" type='application/pdf'>
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
          <h5>Modifique el estatus del libro</h5>
          <form method="POST" id="formStatus">
            {{ csrf_field() }}
            <div class="radio-inline">
              <label for="option-1">
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </div>

            <div class="radio-inline">
              <label for="option-2">
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                <span>Rechazar</span>
              </label>
            </div>

            <div style="display:none" id="if_no">
              <label for="razon">Explique la razón</label>
              <textarea name="message" class="form-control" type="text" id="razon"></textarea>
              <div id="mensajeMaximoRazon"></div>
            </div>
            <br>

            <button class="btn btn-primary" type="submit" id="rechazo">
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

  <div class="modal fade" id="negado" role="dialog">
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
                <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="historialRechazo">
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