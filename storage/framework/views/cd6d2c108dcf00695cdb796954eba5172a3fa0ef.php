<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        
        <div class="row mtbox">
          <div class="col-md-12 col-sm-12 mb">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Primer nivel de referidos:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>">
                      <?php echo e($referals1); ?>

                    </a></h2>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->

              <div class="col-md-6 mb">
              <!-- WHITE PANEL - TOP USER -->
              <div class="white-panel pn3">
                <div class="white-header">
                  <h5><i class="fa fa-user"></i>Segundo nivel de referidos:</h5>
                </div>
                <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>">
                      <?php echo e($referals2); ?>

                    </a></h2>
                  </p>
                </div>
                </div>
              </div>
            </div><!-- /col-md-4 -->

            <div class="col-md-6 mb">
              <!-- WHITE PANEL - TOP USER -->
              <div class="white-panel pn3">
                <div class="white-header">
                  <h5><i class="fa fa-user"></i>Segundo nivel de referidos:</h5>
                </div>
                <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>">
                      <?php echo e($referals2); ?>

                    </a></h2>
                  </p>
                </div>
                </div>
              </div>
            </div><!-- /col-md-4 -->
                      
        </div><!-- /row --> 
           

          <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>