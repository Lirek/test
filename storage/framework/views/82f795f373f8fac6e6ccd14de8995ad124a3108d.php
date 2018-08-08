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
                            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="text" name="name_c" id="name_c" required>
                 <label class="mdl-textfield__label" for="name_c">Nombre Completo</label>
                </div>
            </div>

            <div class="form-group">
                 <label  for="phone_s">Telefono de Contacto</label>
                  <input class="form-control" type="tel" name="phone_s" id="phone_s" required>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="email" name="email_c" id="email_c" required>
                 <label class="mdl-textfield__label" for="email_c">Correo Electronico</label>
                </div>
            </div> 

            <div class="form-group">
                <select name="priority" id="priority">
                <?php $__currentLoopData = $priority; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <?php if($p->priority > Auth::guard('Promoter')->user()->priority): ?>
                    <option value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                  <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              <label class="mdl-textfield__label" for="priority">Tipo de Usuario</label>
                </div>
            </div>
             
            <div class="form-group">
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
              </button>
          </div>

      </form>

      
      
     
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
        <h4 class="modal-title">Registrar Vendedor</h4>
      </div>
      <div class="modal-body">
       <p>Datos del Vendedor</p>
      

           <form method="POST" id="SalesmanForm">
                            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="text" name="name" id="name" required>
                 <label class="mdl-textfield__label" for="name">Nombre Completo</label>
                </div>
            </div>

            <div class="form-group">
                 <label  for="phone_s">Telefono de Contacto</label>
                  <input class="form-control" type="tel" name="phone" id="phone" required>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input class="mdl-textfield__input" type="email" name="email" id="email" required>
                 <label class="mdl-textfield__label" for="email">Correo Electronico</label>
                </div>
            </div> 

            <div class="form-group">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea name="adress" id="adress">
                    
                  </textarea>
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

<div class="modal fade" id="USalesman" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" id="close_2" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modificar Vendedor</h4>
  </div>
  <div class="modal-body">
   <p>Datos del Vendedor</p>


       <form method="POST" id="SalesmanUForm">
                        <?php echo e(csrf_field()); ?>


        <input type="text" name="salesman_id" hidden>
        <div class="form-group">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="text" name="name_u" id="name_u" required>
             <label class="mdl-textfield__label" for="name_u">Nombre Completo</label>
            </div>
        </div>

        <div class="form-group">
             <label  for="phone_s_u">Telefono de Contacto</label>
              <input class="form-control" type="tel" name="phone_u" id="phone_u" required>
        </div> 

        <div class="form-group">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="email" name="email_u" id="email_u" required>
             <label class="mdl-textfield__label" for="email_u">Correo Electronico</label>
            </div>
        </div> 

        <div class="form-group">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <textarea name="adress_u" id="adress_u">
                
              </textarea>
             <label class="mdl-textfield__label" for="adress_u">Direccion</label>
        </div>
        
        </div> 
        
         
        <div class="form-group">
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
          </button>
      </div>

  </form>



  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" id="close_1" data-dismiss="modal">Cerrar</button>
  </div>
  </div>

  </div>
</div>