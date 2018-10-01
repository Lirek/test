
<div class="modal fade" id="NewPack" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear Nuevo Paquete de Tiquets</h4>
        </div>
        <div class="modal-body">
         <p>Datos Del Paquete</p>
        

        <form method="POST" id="NewPackForm">

                            {{ csrf_field() }}
            
            <div class="form-group">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="text" name="name_c" id="name_c" required min="0">
                 <label class="mdl-textfield__label" for="name_c">Nombre</label>
                </div>
            </div>

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="cost" id="cost" required min="0">
                 <label class="mdl-textfield__label" for="cost">Precio en $</label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="ammount" id="ammount" required min="0">
                 <label class="mdl-textfield__label" for="ammount">Cantidad De Tiquets  </label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="points_cost" id="points_cost" required min="0">
                 <label class="mdl-textfield__label" for="points_cost">Costo en Puntos </label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="points" id="pointst" required min="0">
                 <label class="mdl-textfield__label" for="points">Puntos Por Paquete </label>
                </div>
            </div> 

             <div class="radio-inline">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
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
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Paquete de Tiquets</h4>
        </div>
        <div class="modal-body">
         <p>Modifique el Paquete de Tiquets</p>
        

             <form method="POST" id="UPackForm">
                            {{ csrf_field() }}
                <input type="text" name="p_id" id="name_u" hidden >
                            
             <div class="form-group">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="text" name="name_u" id="name_u" required min="0">
                 <label class="mdl-textfield__label" for="name_u">Nombre</label>
                </div>
            </div>

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="cost_u" id="cost_u" required min="0">
                 <label class="mdl-textfield__label" for="cost_u">Precio en $</label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="ammount_u" id="ammount_u" required min="0">
                 <label class="mdl-textfield__label" for="ammount_u">Cantidad De Tiquets  </label>
                </div>
            </div> 
           
            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="points_cost_u" id="points_cost_u" required min="0">
                 <label class="mdl-textfield__label" for="points_cost_u">Costo en Puntos </label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="number" name="points_u" id="pointst_u" required min="0">
                 <label class="mdl-textfield__label" for="points_u">Puntos Por Paquete </label>
                </div>
            </div> 
            
             <div class="radio-inline">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
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