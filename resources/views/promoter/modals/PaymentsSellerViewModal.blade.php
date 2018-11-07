<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Pago del proveedor</h4>
      </div>
      <div class="modal-body text-center">
        <h5>Realizar o revertir el pago al proveedor</h5>
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
          <div class="radio-inline">
            <label for="option-1">
              <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Pagado">
              <span>Pagar</span>
            </label>
          </div>

          <div class="radio-inline">
            <label for="option-2">
              <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
              <span>Revertir</span>
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

<div class="modal fade" id="facturaModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Imagen de la factura</h4>
      </div>
      <div class="modal-body text-center">
        <img src="" id="photo_factura" data-big="" data-overlay="" data-big2x="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalSeller">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h1 class="modal-title text-center">Detalles del proveedor</h1>
      </div>
      <div class="modal-body" style="margin: 0px; padding: 0px;">

        <div class="col-md-6">
          {{--Logo--}}
          <img class='img-responsive av' src='' id="logoProveedor" width="700" height="700" alt='Logo proveedor'>
          <label for="exampleInputFile" class="control-label" style="padding-left: 25%;">Logo de la empresa: </label>
        </div>

        <div class="col-md-6">
          <img class='img-responsive av' src='' id="imgRucProveedor" width="700" height="700" alt='RUC proveedor'>
          <label for="exampleInputFile" class="control-label" style="padding-left: 25%;">Imagen del RUC: </label>
          <div id="mensajeImgRucProveedor"></div>
        </div>

        <hr>

        <div class="col-md-6">
          {{--RUC del proveedor--}}
          <label for="exampleInputFile" class="control-label">RUC: </label>
          <div id="rucProveedor"></div>
          <br>
          {{--Nombre del proveedor--}}
          <label for="exampleInputFile" class="control-label">Nombre: </label>
          <div id="nombreProveedor"></div>
          <br>
        </div>
        
        <div class="col-md-6">
          {{--Correo del proveedor--}}
          <label for="exampleInputFile" class="control-label">Correo: </label>
          <div id="correoProveedor"></div>
          <br>

          {{--Telefono del proveedor--}}
          <label for="exampleInputPassword1" class="control-label">Teléfono: </label>
          <div id="telefonoProveedor"></div>
          <br>
        </div>
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