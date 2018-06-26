<?php $__env->startSection('content'); ?>
<div class="mdl-layout mdl-grid">
    <div class="mdl-grid">
        <main  class="mdl-layout__content">
            <div class="mdl-cell mdl-cell--4-col">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="mdl-data-table mdl-js-data-table ">            
                        <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Avatar</th>
                                  <th>Descripcion</th>
                                  <th>Proveedor</th>
                                  <th>Redes Sociales</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $__currentLoopData = $musician; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="author<?php echo e($author->id); ?>">
                                      <td><?php echo e($author->id); ?></td>
                                      <td><?php echo e($author->name); ?></td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="<?php echo e($author->photo); ?>"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td><p><?php echo e($author->descripcion); ?></p></td>
                                      
                                      <td><?php echo e($author->Seller()->first()->name); ?></td>
                                      <td>
                                       
                                        <a target="_blank" href="http://<?php echo e($author->facebook); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-facebook"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="http://<?php echo e($author->google); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-youtube"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="http://<?php echo e($author->instagram); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-instagram"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="http://<?php echo e($author->twitter); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-twitter"></i>
                                       </button>
                                       </a>

                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="<?php echo e($author->id); ?>" data-toggle="modal" data-target="#myModal">
                                                        <?php echo e($author->status); ?>

                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                       </table>
                       <?php echo $musician->render(); ?>          
            </div>
        </main>
    </div>
</div>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique el estatus del Musico</p>
        

             <form method="POST" id="formStatus">
                              <?php echo e(csrf_field()); ?>


             <div class="radio-inline">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="status" value="Aprobado">
                <span class="mdl-radio__label">Aprobar</span>
                </label>
             </div>

             <div class="radio-inline">
             <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="status" value="Denegado">
                <span class="mdl-radio__label">Negar</span>
             </label>

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
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
        

    $(document).on('click', '#status', function() {    
        var x = $(this).val();

            $(document).ready(function (e){
            $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'admin_musician/'+x;
                    e.preventDefault();
                    $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                  }, 
                            success: function (result) {

                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        alert("Se ha "+s+" con exito");
                                                        $('#author'+x).fadeOut();
                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
                });

});

</script>

<?php $__env->stopSection(); ?>
                            
                                
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>