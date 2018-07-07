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
                                  <th>Nombre Del Single</th>
                                  <th>Autor</th>
                                  <th>Duracion</th>
                                  <th>Proveedor</th>
                                  <th>Resticcion de Edad</th>
                                  <th>Costo en Tickets</th>
                                  <th>Cancion</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $__currentLoopData = $single; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $name=$song->autors()->first(); ?>
                                    <tr id="song<?php echo e($song->id); ?>">
                                      <td><?php echo e($song->id); ?></td>
                                      <td><?php echo e($song->song_name); ?></td>
                                      <td><?php echo e($name['name']); ?></td>
                                      <td><?php echo e($song->duration); ?></td>
                                      <td><?php echo e($song->Seller()->first()->name); ?></td>
                                      <td><?php echo e($song->Rating()->first()->r_name); ?></td>
                                      <td><?php echo e($song->cost); ?></td>
                                      <td>    <audio controls="" src="<?php echo e($song->song_file); ?>">
                                <source src="<?php echo e($song->song_file); ?>" type="audio/mpeg">
                                </audio>   </td>
                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="<?php echo e($song->id); ?>" data-toggle="modal" data-target="#myModal">
                                                        <?php echo e($song->status); ?>

                                        </button>
                                          
                                    </button>


                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                       </table>
                       <?php echo $single->render(); ?>          
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
         <p>Modifique el estatus del Single</p>
        

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
                    var url = 'admin_single/'+x;
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
                                                        $('#song'+x).fadeOut();
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