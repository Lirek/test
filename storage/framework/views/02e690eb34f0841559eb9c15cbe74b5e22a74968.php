<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
<div class="col-lg-8 col-md-8" >
    <div class="row mtbox" style="margin-top: 20px">  

        <!-- <div class="col-md-12 col-sm-12">
          <div class="col-md-6 col-sm-6" >
            <center><h3 style="color: #23B5E6">Invitar por whatsApp</h3></center>
          </div>
          <div class="col-md-6 col-sm-6">
            <p>
              <img src="<?php echo e(asset('sistem_images/WhatsApp.png')); ?>" width="20%">
            </p>
          </div>
        </div> -->

        <div class="col-md-12 col-sm-12">
          <dir class="col-md-6 col-sm-6" >
            <div class="panel2">
              <center><h5><i class="fa fa-user"></i> Mi Código:</h5></center>
            </div>
          </dir>
          <div class="col-md-6 col-sm-6">
            <p>
              <h2><?php echo e(Auth::user()->codigo_ref); ?></h2>
            </p>
          </div>
        </div>

        <div class="col-md-12 col-sm-12" style="margin-top: 5%">
          <dir class="col-md-6 col-sm-6" >
            <div class="panel2">
              <center><h5><i class="fa fa-user"></i> Mi Enlace:</h5></center>
            </div>
          </dir>
          <div class="col-md-6 col-sm-6" style="margin-top: %">
            <p>Hola,Te invito a disfrutar juntos las maravillas de Leipel: Cine, música, lectura, radio, Tv y VIAJES GRATIS. Regístrate gratuitamente con el siguiente link.</p>
            <p>
              <h5><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>" style="font-size: 86%;"><?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?></a></h5>
            </p>
            <p>Atte código: <?php echo e(Auth::user()->codigo_ref); ?></p>
          </div>
        </div>

        <div class="col-md-12 col-sm-12" style="margin-top: 5%">
          <dir class="col-md-6 col-sm-6" >
            <div class="panel2">
              <center><h5><i class="fa fa-envelope-o"></i> Invitar por correo</h5></center>
            </div>
          </dir>
          <div class="col-md-6 col-sm-6" style="  ">
            <p>
              <h3>
                  <a href="#myModal" data-toggle="modal" class="btn btn-info">
                    Enviar     
                  </a>
              </h3>
            </p>
          </div>
        </div>

        <div class="col-md-12 col-sm-12" style="margin-top: 5%">
          <dir class="col-md-6 col-sm-6" style="">
            <div class="panel2">
              <center><h5><i class="fa fa-user"></i> Total de referidos:</h5></center>
            </div>
          </dir>
          <div class="col-md-6 col-sm-6" style="margin-top: -3%">
            <p>
              <h2><a href="#">
                      <center><?php echo e($referals1+$referals2+$referals3); ?></center>
                  </a>
              </h2>
              <h6>Este es el total de referidos de tres generaciones de personas que llegaron a Leipel gracias a ti. Te lo agredecemos!</h6>
            </p>
          </div>
        </div>

  </div>
</div>


<div class="col-md-4 col-sm-4" style="margin-top: 5%">
<dir class="col-md-12 col-sm-12" style="margin-top: 25%;">
  <div class="panel2" style="margin-bottom: -5%; ">
    <center> <h5><i class="fa fa-user"></i>Mi Código Qr:</h5></center>
  </div>
</dir>
<div class="col-md-12 col-sm-12 col-xs-12" style="  ">
    <p>
      <div class="center">
        <div style="margin-left: 3%"><?php echo QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref);; ?></div>
        <center><a href="data:image/png;base64,<?php echo base64_encode (QrCode::format('png')->size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref)); ?>" download="MiQr">Descargar</a></center>
      </div>
    </p>
  </div>
</div>
<!--ANTIGUA BARRA DE REFERIDOS-->
<!-- <?php if($refered != null): ?>
<div class="col-lg-3 col-md-3 ds" >
  <div class="panel panel-default">
    <h3>Mis referidos directos:</h3>
    <?php $__currentLoopData = $refered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refereds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="desc">
      <div class="thumb">
        <?php if($refereds->img_perf): ?>
          <img class="img-circle" src="<?php echo e(asset('assets/img/ui-divya.jpg')); ?>" width="35px" height="35px" align="">
        <?php else: ?>
          <img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" class="img-circle" width="35px" height="35px" align="">
        <?php endif; ?>
      </div>
    <div class="details" style="margin-top: 3%">
      <p><a href="#"><?php echo e($refereds->name); ?></a><br/></p>
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo e($refered->links()); ?>

</div>
</div>
<?php endif; ?> -->

<!--MODAL PARA ENVIAR REFERIDOS-->
<div id="myModal" class="modal fade" role="dialog">                                     
     <div class="modal-dialog">
    <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Introduzca el Correo que desea invitar</h4>
              </div>
              <div class="modal-body">
                  <form class="form-horizontal" method="POST" action="<?php echo e(url('Invite')); ?>"><?php echo e(csrf_field()); ?>


                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                        <div class="col-lg-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Email invalido">
                          <div id="emailMen"></div>
                        </div>
                    </div>
                                              
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-5">
                          <button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
  $("#email").on('keyup change',function(){
        var email_data = $("#email").val();
        $.ajax({
            url: 'EmailValidate',
            type: 'POST',
            data:{
                 _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                 if (result == 1) 
                 {
                  $('#emailMen').hide();
                  $('#enviar').attr('disabled',false);
                  return true;
                 }
                 else
                 {
                   $('#emailMen').show();
                   $('#emailMen').text('Este email ya se encuentra regitrado');
                   $('#emailMen').css('color','red');
                   $('#enviar').attr('disabled',true);
                   console.log(result);
                 }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>