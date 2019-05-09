
    <div class="modal" id="NewPack">
        <div class="modal-content">
            <div class="col s12 light-blue lighten-1 text-center">
                <h4 class="white-text" style="padding: 25px 0px">Crear nuevo paquete de tiquets</h4>
            </div>
            <div class="text-center row">
                <div class="col l12 m6">
                    <form method="POST" id="NewPackForm">
                        <?php echo e(csrf_field()); ?>

                        <div class="input-field col s6">
                            <input type="text" name="name_c" id="name_c" class="validate" required="required" min="0">
                            <label for="name_c">Nombre:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="cost" id="cost" class="validate" required="required" min="0">
                            <label for="cost">Precio en $:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="ammount" id="ammount" class="validate" required="required" min="0">
                            <label for="ammount">Cantidad de tickets:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="points_cost" id="points_cost" class="validate" required="required" min="0">
                            <label for="points_cost">Costo en puntos:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="points" id="points" class="validate" required="required" min="0">
                            <label for="points">Puntos por paquete:</label>
                        </div>
                        <div class="col s12">
                            <button class="btn btn-primary" type="submit">
                                Crear
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="updatePack">
        <div class="modal-content">
            <div class="col s12 light-blue lighten-1 text-center">
                <h4 class="white-text" style="padding: 25px 0px">Modificar el paquete de tiquets</h4>
            </div>
            <div class="text-center row">
                <div class="col l12 m6">
                    <form method="POST" id="UPackForm">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="p_id" id="p_id">
                        <div class="input-field col s6">
                            <input type="text" name="name_c" id="nameM" class="validate" required="required" min="0" placeholder="">
                            <label for="nameM">Nombre:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="cost" id="costM" class="validate" required="required" min="0" placeholder="">
                            <label for="costM">Precio en $:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="ammount" id="ammountM" class="validate" required="required" min="0" placeholder="">
                            <label for="ammountM">Cantidad de tickets:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="points_cost" id="points_costM" class="validate" required="required" min="0" placeholder="">
                            <label for="points_costM">Costo en puntos:</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="points" id="pointsM" class="validate" required="required" min="0" placeholder="">
                            <label for="pointsM">Puntos por paquete:</label>
                        </div>
                        <div class="col s12">
                            <button class="btn btn-primary" type="submit">
                                Modificar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

