<div class="modal fade" id="ModalSaga">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1 class="modal-title text-center">Detalles de la saga:</h1>
            </div>
            <div class="modal-body" style="margin: 0px; padding: 0px;">

                <div class="col-md-6">
                    {{--Imagen--}}
                    <img class='img-responsive av' src='' id="portadaSaga" width="700" height="700" alt='Portada Saga'>
                </div>

                <div class="col-md-6">

                    {{--Nombre de la saga--}}
                    <label for="exampleInputFile" class="control-label">Nombre: </label>
                    <div id="nombreSaga"></div>
                    <br>

                    {{--seleccion de rating--}}
                    <label for="exampleInputFile" class="control-label">Categoría: </label>
                    <div id="categoriaSaga"></div>
                    <br>

                    {{--Estatus de  la saga--}}
                    <label for="exampleInputPassword1" class="control-label">Estatus de la saga: </label>
                    <div id="statusSaga"></div>
                    <br>

                    {{--tipo de saga--}}
                    <label for="exampleInputFile" class="control-label">Tipo de saga: </label>
                    <div id="tipoSaga"></div>
                    <br>

                    {{--Descripcion de  la saga--}}
                    <label for="exampleInputPassword1" class="control-label">Descripción: </label>
                    <div id="descripcionSaga"></div>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>