  <?php $__env->startSection('main'); ?>

    <span class="card-title grey-text"><h3>Contenido por aprobar</h3></span>
    <div class="row">
      <div class="col s12 m6 l3">
        <div class="card pink darken-3 darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Contenido por aprobar</span>
            <i class="large material-icons">view_carousel</i>
            <h4>
              <p><?php echo e($content_total); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="<?php echo e(url('AdminContent')); ?>" class="btn btn-primary indigo">Revisar</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l3">
        <div class="card pink darken-3 darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Proveedores por validar</span>
            <i class="large material-icons">group</i>
            <h4>
              <p><?php echo e($sellers); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="<?php echo e(url('admin_sellers')); ?>" class="btn btn-primary indigo">Revisar</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l3">
        <div class="card pink darken-3 darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Solicitudes de proveedores</span>
            <i class="large material-icons">group_add</i>
            <h4>
              <p><?php echo e($aplyss); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="<?php echo e(url('admin_applys')); ?>" class="btn btn-primary indigo">Revisar</a>
          </div>
        </div>
      </div>
    <?php if(Auth::guard('Promoter')->user()->priority == 1): ?>
      <div class="row">
        <div class="col s12 m6 l3">
          <div class="card pink darken-3 darken-3 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Errores</span>
              <i class="large material-icons">error</i>
            </div>
            <br>
            <br>
            <br>
            <div class="card-action">
              <a href="<?php echo e(route('log-viewer::dashboard')); ?>" target="_blank" class="btn btn-primary indigo">Ver errores</a>
            </div>
          </div>
        </div>
      </div>
    </div>
      <span class="card-title grey-text"><h3>Paquetes de tickets</h3></span>
      <a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Nuevo paquete de tickets" href="#NewPack">
        <i class="material-icons">add</i>
      </a>
      <div class="row">
        <?php $__currentLoopData = $TicketsPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col s12 m6 l4">
            <div class="card hoverable">
              <div class="card-panel card-title pink darken-3 darken-3">
                <div class="white-text">
                  <?php echo e($Package->name); ?>

                  <br><br>
                  <i class="large material-icons center">local_offer</i>
                  <h4 class="white-text">
                    <?php echo e($Package->amount); ?> Tiquets
                  </h4>
                </div>
              </div>
              <div class="card-content">
                <span class="green-text"><i class="material-icons waves-effect waves-blue">check</i></span>
                <b>Costo:</b> $<?php echo e($Package->cost); ?> <small>(incluye IVA)</small>
                <br>
                <span class="green-text"><i class="material-icons waves-effect waves-blue">check</i></span>
                <b>Cantidad de tickets:</b> <?php echo e($Package->amount); ?>

                <br>
                <span class="green-text"><i class="material-icons waves-effect waves-blue">check</i></span>
                <b>Cantidad de puntos:</b> <?php echo e($Package->points); ?>

                <br>
              </div>
              <div class="card-action">
                <button type="button" class="btn orange" id="edit" value="<?php echo e($Package->id); ?>">Editar</button>
                <button type="button" class="btn red" id="delete" value="<?php echo e($Package->id); ?>">Borrar</button>
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
    
    
<?php echo $__env->make('promoter.modals.HomeViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>           
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script>
    $(document).ready(function(){
      $('.tooltipped').tooltip();
      $('.modal').modal();
    });

    $(document).on('click', '#edit', function() {
      var x = $(this).val();
      var url = "<?php echo e(url('GetPackage/')); ?>/"+x;
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
      });
      $.ajax({
        url: url,
        type:'get',
        dataType:"json",
        success: function(data) {
          swal.close();
          console.log(data);
          $('#updatePack').modal('open');
          $("#nameM").val(data.name);
          $("#costM").val(data.cost);
          $("#ammountM").val(data.amount);
          $("#pointsM").val(data.points);
          $("#points_costM").val(data.points_cost);
          $("#p_id").val(data.id);
        },
        error: function(data) {
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $(document).on('click', '#delete', function() {
      var x = $(this).val();
      swal({
        title: "Eliminar paquete de tiquets",
        text: "¿Está seguro de que quiere eliminar este paquete de tickets?",
        icon: 'warning',
        buttons: {
          cancel: "No",
          accept: {
            text: "Si",
            value: true
          }
        },
        closeOnEsc: false,
        closeOnClickOutside: false
      })
      .then((confirmacion) => {
        if(confirmacion) {
          $.ajax({
            url: "<?php echo e(url('DeletePackage/')); ?>/"+x,
            type:'get',
            dataType:'json',
            success: function (result) {
              swal('Paquete eliminado con éxito','','success')
              .then((recarga) => {
                location.reload();
              });
            },
            error: function (result) {
              console.log(result);
              swal('Existe un error en su solicitud','','error')
              .then((recarga) => {
                location.reload();
              });
            }
         });
        }
      });
    });

    $("#UPackForm").on('submit', function(e){
      var name = $('#nameM').val();
      var cost = $('#costM').val();
      var ammount = $('#ammountM').val();
      var id = $('#p_id').val();
      var pointsCost = $('#points_costM').val();
      var points = $('#pointsM').val();
      e.preventDefault();
      console.log(name,cost,ammount,id,pointsCost,points);
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
      });
      $.ajax({
        url: "<?php echo e(url('UpdatePackage/')); ?>/"+id,
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name: name,
          cost: cost,
          ammount: ammount,
          pointsCost:pointsCost,
          points:points
        },
        success: function (result) {
          console.log(result);
          $('#updatePack').modal('close');
          swal('Paquete modificado con éxito','','success')
          .then((recarga) => {
            location.reload();
          });
        },
        error: function (result) {
          console.log(result);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $("#NewPackForm").on('submit', function(e){
      console.log('paso');
      var name = $('#name_c').val();
      var cost =  $('#cost').val();
      var ammount = $('#ammount').val();
      var pointsCost = $('#points_cost').val();
      var points = $('#points').val();
      console.log(name,cost,ammount,pointsCost,points);
      e.preventDefault();
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
      });
      $.ajax({
        url: "<?php echo e(('Save_Package')); ?>",
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name: name,
          cost: cost,
          ammount: ammount,
          pointsCost: pointsCost,
          points:points
        }, 
        success: function (result) {
          console.log(result);
          $('#NewPack').modal('close');
          swal('Paquete registrado con éxito','','success')
          .then((recarga) => {
            location.reload();
          });
        },
        error: function (result) {
          console.log(result);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>