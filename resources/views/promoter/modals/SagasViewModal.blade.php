<div id="ModalSaga" class="modal">
    <div class="modal-content center blue-text">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons"></i>Detalles de la saga</h4>
            <br>
        </div>
        <br>
            <div class="col s12">
                <div class="row center">
                  <div class="col s4"></div>
                  <div class="col s4">
                        <center>
                        <img class='materialboxed' src='' id="logoSaga" width="120" height="120" alt='Logo saga'>
                        </center>
                        <br>
                        <label class="center">imagen de la saga: </label>
                  </div>
                  <div class="col s4"></div>
                </div>
            </div>
            <div class="col s12 center">
                <div class="row">
                  <div class="col s6 ">
                  {{--Nombre de la saga--}}
                    <label for="exampleInputFile" class="control-label">Nombre: </label>
                    <div id="nombreSaga"></div>      
                  </div>
                  <div class="col s6">
                  {{--seleccion de rating--}}
                    <label for="exampleInputPassword1" class="control-label">Categoria: </label>
                    <div id="categoriaSaga"></div>
                  </div>
                </div>
            </div>

            <div class="col s12 center">
                <div class="row">
                  <div class="col s6 ">
                  {{--Estatus de  la saga--}}
                    <label for="exampleInputFile" class="control-label">Estatus de la saga: </label>
                    <div id="statusSaga"></div>      
                  </div>
                  <div class="col s6">
                  {{--tipo de saga--}}
                    <label for="exampleInputPassword1" class="control-label">Tipo de saga: </label>
                    <div id="tipoSaga"></div>
                  </div>
                </div>
            </div>

            <div class="col s12 center">
                <div class="row">
                  <div class="col s6">
                  {{--Descripcion de  la saga--}}
                    <label for="exampleInputPassword1" class="control-label">Descripción: </label>
                    <div id="descripcionSaga"></div>
                  </div>
                </div>
            </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" data-dismiss="modal">Salir</a>
        </div>
    </div>
</div>