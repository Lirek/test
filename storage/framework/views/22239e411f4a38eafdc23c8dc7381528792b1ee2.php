<?php $__env->startSection('main'); ?>

<h3><i class="fa fa-angle-right"></i>Usuarios Administrativos</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Usuarios Administratios Registrados</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed" id="promoters_table">
                              <thead>
                              <tr>
                                  <th>Nombre</th>
                                  
                                  <th>Correo</th>
                                  
                                  <th>Nivel</th>
                                  
                                  <?php if(Auth::guard('Promoter')->user()->priority == 1): ?>
                                  <th>Ultimo Inicio</th>
                                  <?php endif; ?>

                                  <th>Acciones</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php $__currentLoopData = $promoters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promoter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  
                                  <tr id="promoter<?php echo e($promoter->id); ?>">
                                    <td><?php echo e($promoter->name_c); ?></td>
                                    <td><?php echo e($promoter->email); ?></td>
                                    <td><?php echo e($promoter->Roles->first()->name); ?></td>
                                    
                                    <?php if(Auth::guard('Promoter')->user()->priority == 1): ?>
                  
                                            <?php if($promoter->Logins->count()==0): ?>

                                                     <td>No Ha Iniciado Sesion</td>
                                                 
                                                     <?php else: ?>
                                                 
                                                     <td><?php echo e($promoter->Logins->first()->created_at); ?></td>
                                                 
                                            <?php endif; ?>
                                    <?php endif; ?>
                                  
                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="<?php echo e($promoter->id); ?>">
                                            <i class="material-icons">cancel</i>
                                        </button>
                                        <button value="<?php echo e($promoter->id); ?>">
                                          <i class="material-icons">settings</i>
                                        </button>
                                      </td>
                                  </tr>
                                  
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                                  <button  id="tt3" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-toggle="modal" data-target="#NewUser">
        <i class="material-icons">add</i>
        </button>
                          </section>


                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->

            <h3><i class="fa fa-angle-right"></i> Vendedores Registrados</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i>Vendedores</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed" id="SalesmanTable">
                              <thead>
                              <tr>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Telefono</th>
                                 <th>Registrado Por</th>
                                 <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php if($salesmans->count()>0): ?>  
                                <?php $__currentLoopData = $salesmans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr id="salesman<?php echo e($salesman->id); ?>">
                                        <td><?php echo e($salesman->name); ?></td>
                                        <td><?php echo e($salesman->email); ?></td>
                                        <td><?php echo e($salesman->phone); ?></td>
                                        <td><?php echo e($salesman->CreatedBy->name_c); ?></td>
                                        <td>
                                         <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_salesman" value="<?php echo e($salesman->id); ?>">
                                            <i class="material-icons">cancel</i>
                                         </button>
                                        
                                         <button value="<?php echo e($salesman->id); ?>">
                                          <i class="material-icons">settings</i>
                                         </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                <h5>No existen Vendedores Registrados</h5>
                              <?php endif; ?>
                              </tbody>
                          </table>
                            <button  id="SalesmanAdd" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-toggle="modal" data-target="#NewSalesman">
                        <i class="material-icons">add</i>         
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
        <?php echo $__env->make('promoter.modals.BackendUsersViewsModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
  $("#phone").intlTelInput();
  $("#phone_s").intlTelInput();

  $(document).on('click', '#tt3', function() {    

    $(document).ready(function (e){

        $( "#PromotersForm" ).on( 'submit', function(e){
          
          var name_c = $('input[name=name_c]').val();
          var phone_s =  $("#phone_s").intlTelInput("getNumber");
          var email_c = $('input[name=email_c]').val();
          var priority =$('#priority').val();

          e.preventDefault();
            
            $.ajax({

              url: 'promoter_c',
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    name_c: name_c,
                    phone_s: phone_s,
                    email_c: email_c,
                    priority: priority,
                    }, 

                    success: function (result) 
                    {
                      alert('Usuario Registrado con exito');
                    
                      var table = document.getElementById("promoters_table");
                      var row = table.insertRow();
                      var name = row.insertCell();
                      var email = row.insertCell();
                      var priority =row.insertCell();
                      var logins = row.insertCell();
                      var buttonDelete = row.insertCell();
                      var buttonUpdate = row.insertCell();

                      row.id='promoter'+result['id'];

                      
                                            
                                           
                      name.innerHTML = result['name_c'];
                      email.innerHTML = result['email'];
                        
                        if (result['priority'] == 1) 
                          {
                          priority.innerHTML = 'SuperAdmin';
                          } 
                        if (result['priority'] == 2) 
                          {
                            priority.innerHTML = 'Admin';
                          }
                        
                        if (result['priority'] == 3)
                          {
                            priority.innerHTML = 'Operador';
                          }

                        logins.innerHTML = 'No ha Iniciado Sesion';

                        buttonDelete.innerHTML = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="'+result['id']+'"> <i class="material-icons">cancel</i> </button>';

                        buttonUpdate.innerHTML = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="'+result['id']+'"> <i class="material-icons">settings</i> </button>';
                      },

                    error: function (result) 
                    {
                      alert('Error en Su solicitud');
                      console.log(result);
                    }

            });
          
        });
    });
  
  });

  $(document).on('click', '#SalesmanAdd', function() {    

    $(document).ready(function (e){

        $( "#SalesmanForm" ).on( 'submit', function(e){
          
          var name = $('input[name=name]').val();
          var phone =  $("#phone").intlTelInput("getNumber");
          var email = $('input[name=email]').val();
          var adress = $('input[name=adress]').val();

          e.preventDefault();
            
            $.ajax({

              url: 'AddSalesman',
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    name: name,
                    phone: phone,
                    email: email,
                    adress: adress,
                    }, 

                    success: function (result) 
                    {
                      alert('Usuario Registrado con exito');
                    
                      var table = document.getElementById("SalesmanTable");
                      var row = table.insertRow();
                      var name = row.insertCell();
                      var email = row.insertCell();
                      var adress = row.insertCell();
                      var RegisterBy = row.insertCell();
                      var buttonDelete = row.insertCell();
                      var buttonUpdate = row.insertCell();

                      row.id='salesman'+result['id'];

                      

                      },

                    error: function (result) 
                    {
                      alert('Error en Su solicitud');
                      console.log(result);
                    }

            });
          
        });
    });
  
  });

  $(document).on('click', '#delete_salesman', function() {

    var salesman = $(this).val();
    var url = 'salesman_delete/'+salesman;
     
    console.log(url);
    $.ajax({
             url: url,
             type:'get',
             data:"json",

            success: function(data)
            {
              alert("Se Ha Eliminado el Vendedor con exito","","success");
              
              $("#salesman"+salesman).fadeOut();
            },

            error: function(data)
            {
             alert("NO Permitido Por Favor Recargue la Pagina","","error");
            },

       });

  });

  $(document).on('click', '#delete_promoter', function() {
    
    var promoter = $(this).val();
    var url = 'promoter_delete/'+promoter;
 

    $.ajax({
             url: url,
             type:'get',
             data:"json",

            success: function(data)
            {
              alert("Se Ha Eliminado el Promotor con exito");
              console.log(data);
              $("#promoter"+promoter).fadeOut();
            },

            error: function(data)
            {
             alert("NO Permitido Por Favor Recargue la Pagina");
            },

       });

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>