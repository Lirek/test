<?php $__env->startSection('content'); ?>
<main  class="mdl-layout__content">
<div class="mdl-layout mdl-grid">
    <div class="mdl-grid">
        
            <div class="mdl-cell mdl-cell--1-col">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="mdl-data-table mdl-js-data-table ">            
                        <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Titulo</th>
                                  <th>Portada</th>
                                  <th>Restriccion</th>
                                  <th>Proveedor</th>
                                  <th>Descripcion</th>
                                  <th>Cadena de Publicacion</th>
                                  <th>Archivo</th>
                                  <th>Estatus</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <?php $__currentLoopData = $megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $megazine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="megazine<?php echo e($megazine->id); ?>">
                                      <td><?php echo e($megazine->id); ?></td>
                                      <td><?php echo e($megazine->title); ?></td>

                                      <td>
                                        <img class="img-rounded img-responsive av" src="<?php echo e($megazine->cover); ?>"
                                 style="width:70px;height:70px;" alt="User Avatar">
                                      </td>

                                      <td><?php echo e($megazine->Rating->r_name); ?></td>
                                      
                                      <td><?php echo e($megazine->Seller->name); ?></td>
                                      
                                      <td><?php echo e($megazine->descripcion); ?></td>

                                      <td>
                                        <?php if($megazine->saga_id == 0 or $megazine->saga_id == 'NULL'): ?>
                                          <b>INDEPENDIENTE</b>

                                          <?php else: ?>

                                          <?php echo e($megazine->sagas->get()->sag_name); ?>


                                          <?php endif; ?>
                                      </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" data-toggle="modal" data-target="#file" value="<?php echo e($megazine->megazine_file); ?>" id="file_b">
                                        <i class="material-icons">insert_drive_file</i>
                                        </button>
                                    </td>

                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--primary" id="status" value="<?php echo e($megazine->id); ?>" data-toggle="modal" data-target="#myModal">
                                                        <?php echo e($megazine->status); ?>

                                        </button>
                                          
                                    


                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                       </table>
                       <?php echo $megazines->render(); ?>          
            </div>

        
    </div>
</div>
</main>
<div class="modal fade" id="file" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Revista</h4>
        </div>
        <div class="modal-body">
         
        <embed id="megazine_file" src="" width="500" height="375" type='application/pdf'>

        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
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
         <p>Modifique el estatus de la Revista</p>
        

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
                    var url = 'admin_megazine/'+x;

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
                                                        $('#megazine'+x).fadeOut();
                                                        

                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
                });

});

    $(document).on('click', '#file_b', function() {
       var x = $(this).val();
       console.log(x);
       $("#megazine_file").attr("src", x);
    });    



</script>

<?php $__env->stopSection(); ?>
                            
                                
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>