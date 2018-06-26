<?php $__env->startSection('main'); ?>

<h3><i class="fa fa-angle-right"></i>Proveedores Registrados</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Proveedores</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>Estatus</th>
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Ruc</th>
                                  <th>Descripcion</th>
                                  <th>Modulos</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr id="seller<?php echo e($seller->id); ?>">
                                                                      <td>                          
                                       <button id="ModifySellers" value="<?php echo e($seller->id); ?>" data-toggle="modal" data-target="#myModal">
                                          <?php echo e($seller->estatus); ?>

                                        </button>
                                      </td>
                                      <td><?php echo e($seller->name); ?></td>
                                      <td><?php echo e($seller->email); ?></td>
                                      <td><?php echo e($seller->ruc); ?></td>
                                      <td><?php echo e($seller->descs_s); ?></td>
                                      <td id="modules_td<?php echo e($seller->id); ?>"><?php $__currentLoopData = $seller->roles()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                  <span id="m_<?php echo e($modules->id); ?>_<?php echo e($seller->id); ?>">
                                  <span id="modules"><?php echo e($modules->name); ?></span>
                                  <button type="button" 
                                  value1="<?php echo e($modules->id); ?>" value2="<?php echo e($seller->id); ?>" name="module" id="x"><i class="material-icons">cancel</i>
                                  </button>
                                  </span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <button class="" data-toggle="modal" data-target="#ModalModules" value="<?php echo e($seller->id); ?>" id="add_module" <?php if($seller->estatus!= 'Aprobado'): ?> disabled <?php endif; ?>>
                                    <i class="material-icons">add</i>
                                    </button>
                                     </td>
                                  
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->

            <h3><i class="fa fa-angle-right"></i> Modulos de Contenido</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Modulos</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php $__currentLoopData = $acces_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($modules->id); ?></td>
                                        <td><?php echo e($modules->name); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->


<?php $__env->stopSection(); ?>
<script>

$(document).on('click', '#x', function() {
  
  var module = $(this).attr('value1'); ;
  var seller = $(this).attr('value2');;
  var url = 'delete_mod/'+seller+'/'+module;
       $.ajax({
         url: url,
         type:'get',
         data:"json",

         success: function(data)
         {
           alert("Se Ha Retirado el Permiso del Modulo con exito");
           $("#m_"+module+"_"+seller).fadeOut();
         },

         error: function(data)
         {
           alert("NO Permitido Por Favor Recargue la Pagina");
         },

       });
});


$(document).on('click', '#add_module', function() {    

          var x = $(this).val();

    $(document).ready(function (e){

        $( "#AddModules" ).on( 'submit', function(e){
          
          var module = $("#sel1").val();
          var url = 'add_module/'+x;
          
          var name = $( "#sel1 option:selected" ).text();
          var row = $("#modules_td"+x);
          var add = '<span class="mdl-chip mdl-chip--deletable" id="m_'+module+'_'+x+'">  <span class="mdl-chip__text" id="modules">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+module+'" value2="'+x+'" name="module" id="x"> <i class="material-icons">cancel</i> </button></span>';
          e.preventDefault();
            
            $.ajax({

              url: url,
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    acces: module,
                    }, 

                    success: function (result) {
                      alert('Acceso Concedido Con Exito');
                     
                     row.prepend(add);   
                    },

                    error: function (result) 
                    {
                      alert('Error en Su solicitud Por Favor Recargue la Pagina');
                      console.log(result);
                    }

            });
          
        });
    });
});

$(document).on('click','#ModifySellers', function() {
  
  var x = $(this).val();
   console.log(x);
   $( "#FormStatusSeller" ).on( 'submit', function(e){

        var s=$("input[type='radio'][name=status]:checked").val();
        var message=$('#razon').val();
        var url = 'update_status_seller/'+x;

        e.preventDefault(); 
        
                            $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                    message: message,
                                  }, 
                            success: function (result) {

                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        location.reload();
                                                        swal("Se ha "+s+" con exito","","success");
                                                        },

                            error: function (result) {
                            swal('Existe un Error en su Solicitud','','error');
                            
                            },
                            });  
                              
                
   });  


});

</script>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>