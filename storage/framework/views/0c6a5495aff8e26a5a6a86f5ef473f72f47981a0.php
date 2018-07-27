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
                                  <th>Logo</th>
                                  <th>Streaming</th>
                                  <th>Proveedor</th>
                                  <th>Redes Sociales</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $__currentLoopData = $TVS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="tv<?php echo e($tv->id); ?>">
                                      <td><?php echo e($tv->id); ?></td>
                                      <td><?php echo e($tv->r_name); ?></td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="<?php echo e($tv->logo); ?>"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td>
                                        <audio controls="" src="<?php echo e($tv->streaming); ?>">
                                           <source src="<?php echo e($tv->streaming); ?>" type="video/quicktime">
                                      </audio>
                              </td>
                                      
                                      <td></td>
                                      <td>
                                       
                                        <a target="_blank" href="<?php echo e($tv->facebook); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-facebook"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="<?php echo e($tv->google); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-youtube"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="<?php echo e($tv->instagram); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-instagram"></i>
                                       </button>
                                       </a>

                                       <a target="_blank" href="<?php echo e($tv->twitter); ?>">
                                       <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
                                          <i class="fa fa-twitter"></i>
                                       </button>
                                       </a>

                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="<?php echo e($tv->id); ?>" data-toggle="modal" data-target="#myModal">
                                                        <?php echo e($tv->status); ?>

                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                       </table>
                       <?php echo $TVS->render(); ?>          
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
         <p>Modifique el estatus de la TV</p>
        

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
                    var url = 'admin_tv/'+x;
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
                                                        $('#tv'+x).fadeOut();
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