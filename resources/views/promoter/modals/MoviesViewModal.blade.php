<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Modificar estatus</h4>
      </div>
      <div class="modal-body text-center">
        <h5>Modifique el estatus de la película</h5>
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
              <span>Negar</span>
            </label>
          </div>

          <div style="display:none" id="if_no">
            <label for="razon">Explique la razón</label>
            <textarea name="message" class="form-control" type="text" id="razon"></textarea>
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

<div class="modal fade" id="movieView" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Ver película</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <video style="width: 100%; height: 100%;" id="play" controls>
              <source src="" type="video/mp4">
              <source src="" type="video/webm">
            </video>
          </div>

          <div class="col-md-6">
            <label for="exampleInputFile" class="control-label">Nombre: </label>
            <div id="nombrePelicula"></div>
            <br>
            <label for="exampleInputFile" class="control-label">Nombre original: </label>
            <div id="nombreOriginalPelicula"></div>
            <br>
            <label for="exampleInputFile" class="control-label">Sinopsis: </label>
            <div id="sinopsisPelicula"></div>
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>