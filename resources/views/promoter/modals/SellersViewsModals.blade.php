  <div class="modal fade" id="ModalModules" role="dialog">
    <div class="modal-dialog">
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
                <select class="form-control" name="acces" id="sel1" required="required">
                  <option value="">Seleccione el tipo contenido</option>
                  <option value="Peliculas">Cine: Películas | Series</option>
                  <option value="Musica">Música</option>
                  <option value="Libros">Lectura: Libros | Revistas</option>
                  <option value="Radios">Radio</option>
                  <option value="TV">Televisora</option>
                </select>
                <div id="subMenuMusica">
                  <br>
                  <select name="sub_desired_musica" id="sub_desired1" class="form-control">
                    <option value="Artista">Artista</option>
                    <option value="Productora">Productora</option>
                  </select>
                </div>
                <div id="subMenuLibro">
                  <br>
                  <select name="sub_desired_libros" id="sub_desired2" class="form-control">
                    <option value="Escritor">Escritor</option>
                    <option value="Editorial">Editorial</option>
                  </select>
                </div>
                <br>
                {{--
                <select class="form-control" id="sel1" name="acces">
                  @foreach($acces_modules as $acces) 
                    <option value="{{$acces->id}}">{{$acces->name}}</option>
                  @endforeach
                </select>
                --}}
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
            {{--Correo del proveedor--}}
            <label for="exampleInputFile" class="control-label">Correo: </label>
            <div id="correoProveedor"></div>
            <br>
          </div>
          
          <div class="col-md-6">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>