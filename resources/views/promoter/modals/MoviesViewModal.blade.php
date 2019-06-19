<div id="myModal" class="modal">
    <div class="modal-content center blue-text">
        <div class="pink darken-3"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Modifique el estatus de la película</h4>
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

<div id="movieView" class="modal">
    <div class="modal-content center blue-text">
        <div class="pink darken-3"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Ver película</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
            <div class="row">
              <div class="col s6">
                    <video style="width: 100%; height: 100%;" id="play" controls>
                      <source src="" type="video/mp4">
                      <source src="" type="video/webm">
                    </video>
              </div>
                  <div class="col s6 ">
                    <label for="exampleInputFile" class="control-label">Nombre: </label>
                    <div id="nombrePelicula"></div>
                    <br>
                    <label for="exampleInputFile" class="control-label">Nombre original: </label>
                    <div id="nombreOriginalPelicula"></div>
                    <br>
                    <label for="exampleInputFile" class="control-label">Año de publicación: </label>
                    <div id="añoPublicacion"></div>
                    <br>
                    <label for="exampleInputFile" class="control-label">Trailer: </label><br>
                    <a id="trailer" target="_black"></a>
                    <br>
                  </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
        </div>
    </div>
</div>

<div id="negado" class="modal">
    <div class="modal-content center">
        <div class="pink darken-3"><br>
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
