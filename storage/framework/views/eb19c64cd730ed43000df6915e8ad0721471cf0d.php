    <div class="modal fade" id="NewClient" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nuevo Cliente Externo</h4>
                </div>
                <div class="modal-body text-center row">
                    <form method="POST" id="NewExternalClient">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="client_name"><b>Nombre Del Cliente</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="client_name" id="client_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="admin_email"><b>Email de Contacto</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="admin_email" id="admin_email">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="url_host"><b>Url de La Pagina</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="url_host" id="url_host">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="petition_url"><b>Url de la Peticion</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="petition_url" id="petition_url">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4" for="callback_url"><b>Url Del Callback</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="callback_url" id="callback_url">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-primary" type="submit">
                                Agregar
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

    <div class="modal fade" id="UpdateClient" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Cliente Externo</h4>
                </div>
                <div class="modal-body text-center row">
                    <form method="POST" id="UpdateExternalClient">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="client_name_u"><b>Nombre Del Cliente</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="client_name_u" id="client_name_u">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="admin_email_u"><b>Email de Contacto</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="admin_email_u" id="admin_email_u">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="url_host_u"><b>Url de La Pagina</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="url_host_u" id="url_host_u">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="petition_url_u"><b>Url de la Peticion</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="petition_url_u" id="petition_url_u">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4" for="callback_url_u"><b>Url Del Callback</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="callback_url_u" id="callback_url_u">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-primary" type="submit">
                                Agregar
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

    <div class="modal fade" id="DeleteClient" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modificar Cliente Externo</h4>
                </div>
                <div class="modal-body text-center row">
                    <form method="POST" id="DeleteExternalClient">
                        <?php echo e(csrf_field()); ?>



                        <p>El Cliente Sera eliminado de la platafoma y no podra efectuar mas transacciones 

                        ¿esta seguro?</p>
                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-danger" type="submit">
                                Eliminar
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