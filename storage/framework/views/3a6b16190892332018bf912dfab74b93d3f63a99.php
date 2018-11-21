
    <div class="modal fade" id="NewPack" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear nuevo paquete de tiquets</h4>
                </div>
                <div class="modal-body text-center row">
                    <form method="POST" id="NewPackForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name_c"><b>Nombre:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name_c" id="name_c" required min="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cost"><b>Precio en $:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="cost" id="cost" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ammount"><b>Cantidad de tiquets:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="ammount" id="ammount" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4" for="points_cost"><b>Costo en puntos:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="points_cost" id="points_cost" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4" for="points"><b>Puntos por paquete:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="points" id="points" required min="0">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-primary" type="submit">
                                Crear
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

    <div class="modal fade" id="updatePack" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Modificar el paquete de tiquets</h4>
                </div>
                <div class="modal-body text-center row">
                    <form method="POST" id="UPackForm">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="p_id" id="p_id">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name_c"><b>Nombre:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name_c" id="nameM" required min="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="cost"><b>Precio en $:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="cost" id="costM" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ammount"><b>Cantidad de tiquets:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="ammount" id="ammountM" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4" for="points_cost"><b>Costo en puntos:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="points_cost" id="points_costM" required min="0">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4" for="points"><b>Puntos por paquete:</b></label>
                            <div class="col-md-6">
                                <input class="form-control" type="number" name="points" id="pointsM" required min="0">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <br>
                            <button class="btn btn-primary" type="submit">
                                Modificar
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

