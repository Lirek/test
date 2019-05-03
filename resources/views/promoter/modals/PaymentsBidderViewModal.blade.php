  <div id="myModal" class="modal">
    <div class="modal-content center blue-text">
      <div class=" blue"><br>
        <h4 class="center white-text" ><i class="small material-icons"></i>Pago del Aliado</h4>
        <br>
      </div>
      <br>
      <div class="col s12">
        <div id="" class="col s12 center">
          <form method="POST" id="FormStatus">
            {{ csrf_field() }}
            <div class="row">
              <div class="col s6">
                <label for="option-1">
                  <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Pagado">
                  <span>Pagar</span>
                </label>
              </div>
              <div class="col s6">
                <label for="option-2">
                  <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                  <span>Revertir</span>
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
            <button class="btn curvaBoton waves-effect waves-light green" type="submit">
              aceptar
            </button>
          </form>
          <div class="modal-footer">
              <a href="#" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="ModalBidder" class="modal">
    <div class="modal-content center blue-text">
      <div class=" blue"><br>
        <h4 class="center white-text" ><i class="small material-icons"></i>Detalles del usuario aliado</h4>
        <br>
      </div>
      <br>
      <div class="col s12">
        <div id="" class="col s12 center">
          <div class="row">
            <div class="col s6">
              <img class='materialboxed' src='' id="logoBidder" width="120" height="120" alt='Logo aliado'>
              <br>
              <label for="exampleInputFile" class="control-label">Logo: </label>
            </div>
            <div class="col s6">
              <img class='materialboxed' src='' id="imgRucBidder" width="120" height="120" alt='RUC aliado'>
              <br>
              <label for="exampleInputFile" class="control-label">Imagen del RUC: </label>
            </div>
          </div>
        </div>
        <div id="" class="col s12 center">
          <div class="row">
            <div class="col s6 ">
              {{--Correo del aliado--}}
              <label for="exampleInputFile" class="control-label">Correo: </label>
              <div id="correoBidder"></div>
            </div>
            <div class="col s6">
              {{--puntos del aliado--}}
              <label for="exampleInputPassword1" class="control-label">Teléfono: </label>
              <div id="telefonoBidder"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
      </div>
    </div>
  </div>

<div id="negado" class="modal">
    <div class="modal-content center">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Historial de negaciones</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
            <div id="" class="col s12 center">
                <div class="row">
                  <div class="form-group">
                    <h5 class="text-center" id="totalNegaciones"></h5>
                  </div>
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
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
        </div>
    </div>
</div>
