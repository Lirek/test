  <div class="modal fade" id="NewUser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear Usuario de Backend</h4>
        </div>
        <div class="modal-body">
         <p>Datos de Usuario</p>
        

             <form method="POST" id="PromotersForm">
                              {{ csrf_field() }}

              <div class="form-group">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" name="name_c" id="name_c">
                   <label class="mdl-textfield__label" for="name_c">Nombre Completo</label>
                  </div>
              </div>

              <div class="form-group">
                   <label  for="phone_s">Telefono de Contacto</label>
                    <input class="form-control" type="tel" name="phone_s" id="phone_s">
              </div> 

              <div class="form-group">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="email" name="email_c" id="email_c">
                   <label class="mdl-textfield__label" for="email_c">Correo Electronico</label>
                  </div>
              </div> 

              <div class="form-group">
                  <select name="priority" id="priority">
                  @foreach($priority as $p)

                    @if($p->priority > Auth::guard('Promoter')->user()->priority)
                      <option value="{{$p->id}}">{{$p->name}}</option>
                    @endif

                  @endforeach
                  </select>
                <label class="mdl-textfield__label" for="priority">Tipo de Usuario</label>
                  </div>
              </div>
               
              <div class="form-group">
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

   <div class="modal fade" id="NewSalesman" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear Usuario de Backend</h4>
        </div>
        <div class="modal-body">
         <p>Datos de Usuario</p>
        

             <form method="POST" id="PromotersForm">
                              {{ csrf_field() }}

              <div class="form-group">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" name="name_c" id="name_c">
                   <label class="mdl-textfield__label" for="name_c">Nombre Completo</label>
                  </div>
              </div>

              <div class="form-group">
                   <label  for="phone_s">Telefono de Contacto</label>
                    <input class="form-control" type="tel" name="phone_s" id="phone_s">
              </div> 

              <div class="form-group">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="email" name="email_c" id="email_c">
                   <label class="mdl-textfield__label" for="email_c">Correo Electronico</label>
                  </div>
              </div> 

              <div class="form-group">
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                   <input class="mdl-textfield__input" type="text" name="adress" id="adress">
                   <label class="mdl-textfield__label" for="adress">Direccion</label>
              </div>
              
              </div> 
              
               
              <div class="form-group">
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