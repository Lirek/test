  <?php $__env->startSection('main'); ?>     

    <div class="row mt">
      <h2><i class="fa fa-angle-right"></i>Contenido Por Aprobar</h2>
    </div>

    <div class="row mt">
      <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="twitter-panel pn">
          <i class="fa fa-suitcase fa-6x"></i>
          <h3>
            <p class="user">Contenido por aprobar</p>
            <p><?php echo e($content_total); ?></p>
            <a href="<?php echo e(url('AdminContent')); ?>" class="btn btn-primary">Revisar</a>
          </h3>
        </div>
      </div><!-- /col-md-3 -->
      
      <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="twitter-panel pn">
          <i class="fa fa-user fa-6x"></i>
          <h3>
            <p class="user">Proveedores por validar</p>
            <p><?php echo e($sellers); ?></p>
            <a href="<?php echo e(url('admin_sellers')); ?>" class="btn btn-primary">Revisar</a>
          </h3>
        </div>
      </div><!-- /col-md-3 -->

        <div class="col-lg-3 col-md-3 col-sm-3 mb">
          <div class="twitter-panel pn">
            <i class="fas fa-archive fa-6x"></i>
            <h3>
              <p class="user">Solicitudes de proveedores por revisar</p>
              <p><?php echo e($aplyss); ?></p>
              <a href="<?php echo e(url('admin_applys')); ?>" class="btn btn-primary">Revisar</a>
            </h3>
          </div>
        </div><!-- /col-md-3 -->

      <?php if(Auth::guard('Promoter')->user()->priority == 1): ?>
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
          <div class="twitter-panel pn">
            <i class="fa fa-suitcase fa-6x"></i>
            <h3>
              <p>Errores</p>
              <a href="<?php echo e(route('log-viewer::dashboard')); ?>" target="_blank" class="btn btn-primary">Ver errores</a>
            </h3>
          </div>
        </div><!-- /col-md-3 -->
      </div>

      <div class="row mt">
        <h2><i class="fa fa-angle-right"></i>Paquetes de Tiquets</h2>
      </div>
      
      <?php $__currentLoopData = $TicketsPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="white-panel">
                <div class="white-header" style="padding: 10px">
                  <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1><?php echo e($Package->name); ?></h1></span>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-md-12">
                    <h4 style="color: #000;">
                      <b>Costo:</b> $<?php echo e($Package->cost); ?> <br>
                      <b>Cantidad de tickets:</b> <?php echo e($Package->amount); ?> <br>
                      <b>Costo en puntos: </b> <?php echo e($Package->points_cost); ?> <br>
                      <b>Puntos por paquete:</b> <?php echo e($Package->points); ?>

                    </h4>
                    <br>
                    <div class="center">
                      <button type="button" class="btn btn-warning" id="edit" value="<?php echo e($Package->id); ?>">Editar</button>
                      <button type="button" class="btn btn-danger" id="delete" value="<?php echo e($Package->id); ?>">Borrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewPack">
        <div style="padding: 0px 20px">
          <h1>+</h1>
        </div>
      </button>

      
      <?php else: ?>
        </div>
      <?php endif; ?>
<?php echo $__env->make('promoter.modals.HomeViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>           
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script>

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
          $('#updatePack').modal('show');
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
          //alert('Paquete Mddificado con exito');
          console.log(result);
          $('#updatePack').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
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
          /*
          alert('Paquete Registrado con exito');
          location.reload();
          $('#NewPack').modal('hide');
          */
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
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