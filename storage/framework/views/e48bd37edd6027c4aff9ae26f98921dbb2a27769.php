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
                                  <th>Promotor</th>
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
                                        <?php if($seller->promoter_id==NULL or $seller->promoter_id==0): ?>
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" data-toggle="modal" data-target="#ModalPromoter" value="<?php echo e($seller->id); ?>" id="add_promoter">
                                    <i class="material-icons">add</i>
                                    </button>
                                        <?php else: ?>
                                  <span class="mdl-chip mdl-chip--deletable" id="p_<?php echo e($seller->Promoter->id); ?>_<?php echo e($seller->id); ?>">
                                  <span class="mdl-chip__text" id="seller_promoter"><?php echo e($seller->Promoter->name_c); ?></span>
                                  <button type="button" class="mdl-chip__action" 
                                  value1="<?php echo e($seller->Promoter->id); ?>" value2="<?php echo e($seller->id); ?>" name="seller_promoter" id="remove_promoter"><i class="material-icons">cancel</i>
                                  </button>
                                  </span>                                        
                                        <?php endif; ?>
                                  </td>

                                      <td>                                          

                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="ModifyApplys" value="<?php echo e($seller->id); ?>" data-toggle="modal" data-target="#myModal">
                                          <?php echo e($seller->estatus); ?>

                                        </button>

                                      </td>
                                      <td><?php echo e($seller->name); ?></td>
                                      <td><?php echo e($seller->email); ?></td>
                                      <td><?php echo e($seller->ruc); ?></td>
                                      <td><?php echo e($seller->descs_s); ?></td>
                                      <td id="modules_td<?php echo e($seller->id); ?>"><?php $__currentLoopData = $seller->roles()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                  <span class="mdl-chip mdl-chip--deletable" id="m_<?php echo e($modules->id); ?>_<?php echo e($seller->id); ?>">
                                  <span class="mdl-chip__text" id="modules"><?php echo e($modules->name); ?></span>
                                  <button type="button" class="mdl-chip__action" 
                                  value1="<?php echo e($modules->id); ?>" value2="<?php echo e($seller->id); ?>" name="module" id="x"><i class="material-icons">cancel</i>
                                  </button>
                                  </span>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" data-toggle="modal" data-target="#ModalModules" value="<?php echo e($seller->id); ?>" id="add_module" <?php if($seller->estatus!= 'Aprobado' or $seller->promoter_id==NULL): ?> disabled <?php endif; ?>>
                                    <i class="material-icons">add</i>
                                    </button>
                                     </td>
                                      </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </tbody>
                       </table>
                       <?php echo $sellers->render(); ?>          
            </div>

        
    </div>
</div>
</main>
 <div class="modal fade" id="ModalModules" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique el estatus de la Revista</p>
        

             <form method="POST" id="AddModules">
                              <?php echo e(csrf_field()); ?>


               <div class="form-group">

                <label for="sel1">Modulos:</label>
               <select class="form-control" id="sel1" name="acces">
                  <?php $__currentLoopData = $acces_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acces): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($acces->id); ?>"><?php echo e($acces->name); ?></option>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
               </select>
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

   <div class="modal fade" id="ModalPromoter" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar Promotor</h4>
        </div>
        <div class="modal-body">
         <p>Designe un Promotor que se encargara del contenido y diversas solicitudes del Proveedor</p>
        

             <form method="POST" id="AddPromoter">
                              <?php echo e(csrf_field()); ?>


               <div class="form-group">

                <label for="promoter">Promotores:</label>
               <select class="form-control" id="promoter" name="promoter_id">
                  <?php $__currentLoopData = $promoters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <option value="<?php echo e($promoter->id); ?>"><?php echo e($promoter->name_c); ?></option>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
               </select>
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
  

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique El Estatus De La Productora</p>
        

             <form method="POST"  id="formStatus">
                              <?php echo e(csrf_field()); ?>


             <div class="radio-inline">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button"  onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span class="mdl-radio__label">Aprobar</span>
                </label>
             </div>

             <div class="radio-inline">
             <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                <span class="mdl-radio__label">Negar</span>
             </label>

             </div>

             <div class="radio-inline" style="display:none" id="if_no">
              <div class="mdl-textfield mdl-js-textfield">
               <textarea name="message" class="mdl-textfield__input" type="text" rows= "6" id="razon" ></textarea>
               <label class="mdl-textfield__label" for="razon">Explique La Razon</label>
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

            <div class="mdl-tooltip" data-mdl-for="add_promoter">
                    <strong>Agregar Promotor</strong>
            </div>

            <div class="mdl-tooltip" data-mdl-for="add_module">
                    <strong>Agruegar Modulos</strong>
            </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

$(document).on('click', '#x', function() {
  
  var module = $(this).attr('value1'); ;
  var seller = $(this).attr('value2');;
  var url = 'admin_modules/'+seller+'/'+module;

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
          var url = 'admin_add_module/'+x;
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


$(document).on('click', '#add_promoter',function() {
  
  var seller = $(this).val();
  
  var url = 'SellerAddPromoter/'+seller;
     
     $(document).ready(function (e){

        $( "#AddPromoter" ).on( 'submit', function(e){
            
            var promoter_id = $("#promoter").val();
            e.preventDefault();

            $.ajax({
                
              url: url,
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    promoter_id: promoter_id,
                    }, 

                    success: function (result) {
                      alert('Promotor Asignado Con Exito');
                      location.reload();
                       
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


$(document).on('click', '#remove_promoter', function() {

  var promoter = $(this).attr('value1'); ;
  var seller = $(this).attr('value2');;
  var url = 'RemovePromoterFromSeller/'+seller+'/'+promoter;

         $.ajax({
         url: url,
         type:'get',
         data:"json",

         success: function(data)
         {
           
           alert("Se Ha Retirado el Permiso del Modulo con exito");
           location.reload();
         },

         error: function(data)
         {
           alert("NO Permitido Por Favor Recargue la Pagina");
         },

       });

});

$(document).on('click', '#ModifyApplys', function() {    
        var x = $(this).val();

            $(document).ready(function (e){
            $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var message=$('#razon').val();
                    var url = 'AproveOrDenialSeller/'+x;
                    console.log(s);
                    e.preventDefault();
                    $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                    message: message,
                                  }, 
                            success: function (result) {
                                                        console.log(result);                            
                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        swal("Se ha "+s+" con exito","","success");
                                                        $('#seller'+x).fadeOut();
                                                        },

                            error: function (result) {
                            swal('Existe un Error en su Solicitud','','error');
                            console.log(result);
                            }
                            });  
                                            });
                });

});
</script>

<?php $__env->stopSection(); ?>
                            
                                
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>