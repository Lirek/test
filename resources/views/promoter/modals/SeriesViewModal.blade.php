<div id="myModal" class="modal">
    <div class="modal-content center blue-text">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Modifique el estatus de la serie</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
            <div id="" class="col s12 center">
                <form method="POST" id="FormStatus">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col s6">
                    <label class="" for="option-1">
                        <input type="radio" id="option-1" class="flat-red with-gap  " onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                        <span class="mdl-radio__label">Aprobar</span>
                    </label>
                  </div>
                  <div class="col s6">
                    <label class="" for="option-2">
                        <input type="radio" id="option-2" class="flat-red with-gap" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                        <span class="mdl-radio__label">Negar</span>
                    </label>
                  </div>
                  <div class="col s10 center" style="margin-left: 40px">
                    <div style="display:none" id="if_no">
                      <label for="razon">Explique la razón</label>
                      {!! Form::textarea('message',null,['class'=>'form-control materialize-textarea','rows'=>'3','cols'=>'2','placeholder'=>'Motivo del rechazo del pago','id'=>'razon','required'=>'required']) !!}
                      <div id="mensajeMaximoRazon"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <button class="btn curvaBoton waves-effect waves-light green" type="submit">
            aceptar
        </button>
        </form>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
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