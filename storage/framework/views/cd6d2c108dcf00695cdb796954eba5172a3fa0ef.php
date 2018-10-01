<?php $__env->startSection('css'); ?>
<style>
.lista {
  height: 30em;
  overflow-y: scroll;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>     
  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <input type="hidden" name="id" id="id" value="<?php echo e(Auth::user()->created_at); ?>">
  <div class="row mtbox" style="margin-top: 2%">
    <div class="col-sm-6 col-md-6">
      <div class="col-md-12 col-sm-12 mb" style="margin-left: ">
        <div class="white-panel refe">
          <div class="white-header">
            <h5><i class="fa fa-users"></i>Total de referidos:</h5>
          </div>
          <div class="row white-size">
            <div class="col-sm-6 col-xs-6 gocenterRed ">
              <p>
                <h2>
                  <a> <?php echo e($referals1+$referals2+$referals3); ?> </a>
                </h2>
                <h6>Este es el total de referidos de tres generaciones de personas que llegaron a Leipel gracias a ti. Te lo agredecemos!</h6>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!--REFERIR-->
      <?php if(Auth::user()->UserRefered()->count()==0): ?> 
        <div class="col-md-12 col-sm-12 mb" id="referir">
          <div class="white-panel panRf refe donut-chart">
            <div class="white-header">
              <h5>Agregar codigo de patrocinador</h5>
            </div>
            <div class="row">
              <div class="col-sm-12 col-xs-12 col-md-12 goleft">
                <div class="paragraph">
                  <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                  <p class="center" id="mensaje"></p>
                  <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModalRefe">Agregar</a></p>
                </div> 
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php if($refered != null): ?>
        <h5 style="margin-left: 3%">Mis referidos directos: (<?php echo e($referals1); ?>)</h5>
        <div class="col-md-12 col-sm-12" style="margin-left: 1%; margin-top: 1%">
          <?php if($referals1>12): ?> 
          <div class="row lista">
          <?php else: ?>
            <div class="row">
          <?php endif; ?>
            <?php $__currentLoopData = $refered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refereds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="col-xs-3 col-sm-3 col-lg-3">
                  <a href="#" data-toggle="modal" data-target="#myModal-<?php echo e($refereds->id); ?>">
                        <?php if($refereds->img_perf): ?>
                          <img src="<?php echo e(asset($refereds->img_perf)); ?>" class="img-circle" width="60" height="60">
                        <?php else: ?>
                          <img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" class="img-circle" width="60">
                        <?php endif; ?>
                      </div>
                      <div class="col-sm-6 col-lg-6" style="margin-top: 1%; overflow:hidden; white-space:nowrap; text-overflow: ellipsis;">
                      <?php echo e($refereds->name); ?> <?php echo e($refereds->last_name); ?>

                  </a>
                </div>
              </div>
                <!--MODAL DATOS-->
                <div id="myModal-<?php echo e($refereds->id); ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Mi referido:</h4>
                      </div>
                      <div class="modal-body">
                          <?php if($refereds->img_perf): ?>
                            <center><img src="<?php echo e(asset($refereds->img_perf)); ?>" class="img-circle" width="60" height="60"></center>
                          <?php else: ?>
                            <center><img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" class="img-circle" width="80"></center>
                          <?php endif; ?>
                          <center>
                              <h5 style="margin-top: 2%"><b>Nombre: </b> <?php echo e($refereds->name); ?> <?php echo e($refereds->last_name); ?></h5>
                          </center>
                          <center>
                              <h5 style="margin-top: 2%"><b>Email: </b> <?php echo e($refereds->email); ?></h5>
                          </center>
                          <center>
                            <?php if($refereds->phone): ?>
                              <h5 style="margin-top: 2%"><b>Telefono: </b> <?php echo e($refereds->phone); ?></h5>
                            <?php else: ?>
                              <h5 style="margin-top: 2%"><b>Telefono: </b> No posee teléfono registrado</h5>
                            <?php endif; ?>
                          </center>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--FIN DEL MODAL-->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="col-md-12 col-sm-12 mb">
        <div class="white-panel refe">
          <div class="white-header">
            <h5> Total de puntos:</h5>
          </div>
          <div class="row white-size">
            <div class="col-sm-6 col-xs-6 gocenterRed ">
              <p>
                <h2>
                  <?php if(Auth::user()->points!=NULL): ?>
                    <a> <?php echo e(Auth::user()->points); ?> </a>
                  <?php else: ?> 
                    <a> 0 </a>
                  <?php endif; ?>
                </h2>
                <h6>Estos son los puntos que se han generado de tus referidos directos e indirectos</h6>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12 text-center" style="margin-left: 1%; margin-top: 1%">
        <img src="<?php echo e(asset('promociones/PromocionGalapagosImg.jpg')); ?>" style="width: 80%;">
        <a style="margin-top: 3%;" target="_blank" href="<?php echo e(asset('promociones/PromocionGalapagosInfo.pdf')); ?>" class="btn btn-primary">Detalles del viaje (Descargar en PDF)</a>
      </div>
    </div>

    <!--MODAL-->
    <div id="myModalRefe" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ingrese el codigo</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?php echo e(url('Referals')); ?>" enctype="multipart/form-data" id="patrocinador"><?php echo e(csrf_field()); ?>


                <div class="form-group<?php echo e($errors->has('codigo') ? ' has-error' : ''); ?>">
                        <label for="codigo" class="col-md-4 control-label">Codigo</label>
                        <div class="col-md-6">
                            <input id="codigo" type="text" class="form-control" name="codigo" value="<?php echo e(old('codigo')); ?>" required="required">
                            <div id="codigoMen"></div>
                        </div>

                </div>
                 <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary" id='ingresar'>Ingresar</button>
                    </div>
                  </div>
              </form>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!--FIN DEL MODAL-->

     

  </div><!-- /row --> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
document.querySelector('#patrocinador').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting
  var cod=$('#codigo').val();

  $.ajax({
    url:'sponsor/'+cod,
    type: 'get',
    dataType: "json",
    beforeSend: function() {
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
          title: "¡Listo! Estamos validando su información...",
          text: "Espere un momento por favot, mientras validamos el código de patrocinador.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
      });
    },
    success: function (result) {
      console.log(result);
      if(result == 2) {
        swal({
          title: "Ingrese otro código por favor",
          text: "El código que introdujo le pertecene a algún miembro de su propia red, por favor ingrese otro.",
          icon: 'info',
          buttons: {
            accept: 'Aceptar'
          }
        });
      } else {
        if(result == 1) {
          swal({
            title: "Ingrese otro código por favor",
            text: "Disculpe, pero no puede ingresar su propio código",
            icon: 'info',
            buttons: {
              accept: 'Aceptar'
            },
            closeOnEsc: false,
            closeOnClickOutside: false
          });
          $('#patrocinador')[0].reset();
        } else if (result.id != undefined) {
          if (result.last_name != undefined) {
            var nombre = result.name+" "+result.last_name;
          } else {
            var nombre = result.name;
          }
          swal({
            text: "¿Esta ingresando como patrocinador a "+nombre+"?",
            icon: 'info',
            buttons: {
              accept: 'Aceptar',
              cancel: 'Cancelar'
            },
            dangerMode: true,
            closeOnEsc: false,
            closeOnClickOutside: false
          }).then(function(isConfirm) {
            if (isConfirm) {
              form.submit();
            } else {
              $('#patrocinador')[0].reset();
            }
          });
        }
        else if(result == 0) {
          swal.close();
          $('#codigoMen').show();
          $('#codigoMen').text('El codigo es incorrecto');
          $('#codigoMen').css('color','red');
        }
      }
    }
  });
});

</script>
<script type="text/javascript">
  $(document).ready(function(){
  var f1 = document.getElementById('id').value;
  var f = new Date();
  var f2=f.getDate() + "/" +(f.getMonth()+1 )+ "/" + f.getFullYear();

  var tiempo=restaFechas(f1,f2);
  if (tiempo > 15){
    document.getElementById('referir').style.display='none';  
  }else{
    var total=14-tiempo;
    console.log(tiempo);
    document.getElementById('mensaje').innerHTML='Usted cuenta con '+total +' dias para agregar un patrocinador';
  }

});
restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('-');
 var dFecha= aFecha1[2].split(' ');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,dFecha[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>