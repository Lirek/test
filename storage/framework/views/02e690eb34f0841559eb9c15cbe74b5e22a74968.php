<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
    <div class="row mtbox">  
        <div class="col-md-5 col-sm-5 mb">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Mi Codigo de Referido:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenter ">
                  <p>
                    <h2><?php echo e(Auth::user()->codigo_ref); ?></h2>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->

        <div class="col-md-5 col-sm-5 mb">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-envelope-o"></i>Invitar por correo</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenter ">
                  <p>
                    <h3>
                      <a href="#myModal" data-toggle="modal" class="btn btn-info">
                        Enviar     
                      </a>
                    </h3>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->

        <div class="col-md-12 col-sm-12 mb">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Mi Enlace:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-12 col-xs-12 gocenterRef ">
                  <p>
                    <h6><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>"><?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?></a></h6>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->


        <div class="col-md-5 col-sm-5 mb">
            <!-- Qr PANEL -->
            <div class="white-panel  pn2">
          <div class="white-header">
              <h5><i class="fa fa-user"></i>Mi Codigo Qr:</h5>
          </div>
          <div class="Qr-panel">
            <div class="center">
              <?php echo QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref);; ?>

            </div>}
          </div>
          </div>
        </div><!-- /col-md-4 -->

</div>
<div id="myModal" class="modal fade" role="dialog">                                     
     <div class="modal-dialog">
    <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Complete sus datos</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form class="form-horizontal" method="POST" action="#"><?php echo e(csrf_field()); ?>


                                                <div class="form-group">
                                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                                    <div class="col-lg-10">
                                                      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                    </div>
                                                </div>

                                              <div class="form-group">
                                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Mensaje</label>
                                                <div class="col-lg-10">  
                                                  <textarea class="form-control" id="inputPassword4"> 
                                                  </textarea>    
                                                </div>
                                              </div>
                                              
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary">Registrar datos</button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>