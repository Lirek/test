  <div class="modal" id="ModalModules">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Asignar módulos al proveedor</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 35%">
        <form method="POST" id="AddModules">
          {{ csrf_field() }}
          <div class="input-field col s8 offset-s2">
            <select name="acces" id="sel1" required="required">
              <option value="">Seleccione el tipo contenido</option>
              <option value="Peliculas">Cine: Películas | Series</option>
              <option value="Musica">Música</option>
              <option value="Libros">Lectura: Libros | Revistas</option>
              <option value="Radios">Radio</option>
              <option value="TV">Televisora</option>
            </select>
            <label for="sel1">Módulos:</label>
          </div>
          <div id="subMenuMusica">
            <div class="input-field col s8 offset-s2">
              <select name="sub_desired_musica" id="sub_desired1">
                <option value="">Seleccione el sub contenido de música</option>
                <option value="Artista">Artista</option>
                <option value="Productora">Productora</option>
              </select>
              <label for="sub_desired1">Sub-Módulos de música:</label>
            </div>
          </div>
          <div id="subMenuLibro">
            <div class="input-field col s8 offset-s2">
              <select name="sub_desired_libros" id="sub_desired2">
                <option value="">Seleccione el sub contenido de lectura</option>
                <option value="Escritor">Escritor</option>
                <option value="Editorial">Editorial</option>
              </select>
              <label for="sub_desired1">Sub-Módulos de lectura:</label>
            </div>
          </div>
          <br><br>
          <br>
          <div class="col s12">
            <button class="btn btn-primary curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="myModal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus de la productora</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="FormStatusSeller">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Aprobar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                <span>Recharzar</span>
              </label>
            </p>
          </div>
          <div class="input-field col s8 offset-s2" style="display:none" id="if_no">
            <textarea name="message" class="materialize-textarea" type="text"id="razon"></textarea>
            <label for="razon">Explique la razón</label>
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

  <div class="modal fade" id="logoView" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Logo de la empresa</h4>
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
  
  <div class="modal" id="ModalSeller">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 10px">Detalles del proveedor</h4>
      </div>
      <div class="row">
        <div class="col s5 offset-s1">
          <img class='materialboxed' src='' id="logoProveedor" width="200" height="200" alt='Logo proveedor'>
          <label class="control-label" style="padding-right: 25%;">Logo de la empresa: </label>
        </div>
        <div class="col s5 offset-s1">
          <img class='materialboxed' src='' id="imgRucProveedor" width="200" height="200" alt='RUC proveedor'>
          <label id="labelImg" class="control-label" style="padding-right: 25%;">Imagen del RUC: </label>
          <br>
          <a class="waver-effect waves-light btn-large" id="pdfruc" href="" target="_blank">
            <i class="material-icons left">picture_as_pdf</i>
            Ver RUC
          </a>
          <div id="mensajeImgRucProveedor"></div>
        </div>
        <hr>
      </div>
      <div class="row">
        <div class="col s6">
          {{--RUC del proveedor--}}
          <label for="exampleInputFile" class="control-label">RUC: </label>
          <div id="rucProveedor"></div>
          <br>
          {{--Nombre del proveedor--}}
          <label for="exampleInputFile" class="control-label">Nombre: </label>
          <div id="nombreProveedor"></div>
          <br>
          {{--Correo del proveedor--}}
          <label for="exampleInputFile" class="control-label">Correo: </label>
          <div id="correoProveedor"></div>
          <br>
        </div>
        <div class="col s6">
          {{--Descripcion del proveedor--}}
          <label for="exampleInputFile" class="control-label">Descripción: </label>
          <div id="descripcionProveedor"></div>
          <br>
          {{--Telefono del proveedor--}}
          <label for="exampleInputPassword1" class="control-label">Teléfono: </label>
          <div id="telefonoProveedor"></div>
          <br>
          {{--Tickets del proveedor--}}
          <label for="exampleInputPassword1" class="control-label">Tickets: </label>
          <div id="ticketsProveedor"></div>
          <br>
        </div>
      </div>
    </div>
  </div>