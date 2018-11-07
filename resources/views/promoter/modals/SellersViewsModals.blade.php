  <div class="modal fade" id="ModalModules" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Asignar módulos</h4>
        </div>
        <div class="modal-body text-center">
          <h5>Asignar módulo al proveedor</h5>
          <form method="POST" id="AddModules">
            {{ csrf_field() }}
            <div class="form-group">
              <div class="col-md-4">
                <label for="sel1">Módulos:</label>
              </div>
              <div class="col-md-8">
                <select class="form-control" id="sel1" name="acces">
                  @foreach($acces_modules as $acces) 
                    <option value="{{$acces->id}}">{{$acces->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <br><br>
            <br>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">
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

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Modificar estatus</h4>
        </div>
        <div class="modal-body text-center">
          <h5>Modifique el estatus de la productora</h5>
          <form method="POST" id="FormStatusSeller">
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
                <span>Recharzar</span>
              </label>
            </div>

            <div style="display:none" id="if_no">
              <label for="razon">Explique la razón</label>
              <textarea name="message" class="form-control" type="text"id="razon"></textarea>
            </div>
            <br>

            <button class="btn btn-primary" type="submit">
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
