<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
        
        <div class="row mtbox" style="margin-top: 2%">
          <!--PRIMER NIVEL DE REFERIDOS-->
          <!-- <div class="col-md-12 col-sm-12 mb">
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
        </div> -->

          <!--SEGUNDO NIVEL DE REFERIDOS-->
            <!-- <div class="col-md-6 mb">
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
            </div> -->

            <!--TERCER NIVEL DE REFERIDOS-->
           <!--  <div class="col-md-6 mb">
              <div class="white-panel pn3">
                <div class="white-header">
                  <h5><i class="fa fa-user"></i>Tercer nivel de referidos:</h5>
                </div>
                <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="<?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?>">
                      <?php echo e($referals3); ?>

                    </a></h2>
                  </p>
                </div>
                </div>
              </div>
            </div> -->

        <div class="col-md-12 col-sm-12 mb" style="margin-left: ">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Total de referidos:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="#">
                      <?php echo e($referals1+$referals2+$referals3); ?>

                    </a></h2>
                    <h6>Este es el total de referidos de tres generaciones de personas que llegaron a Leipel gracias a ti. Te lo agredecemos!</h6>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->
        <?php if($refered != null): ?>
        <h5 style="margin-left: 3%">Mis referidos directos:</h5>
        <div class="col-md-12 col-sm-12" style="margin-left: 1%; margin-top: 1%">
          
          <?php $__currentLoopData = $refered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refereds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-sm-2 col-xs-3 col-md-1">
                <?php if($refereds->img_perf): ?>
                  <img src="<?php echo e(asset($refereds->img_perf)); ?>" class="img-circle" width="60"></a>
                <?php else: ?>
                   <img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" class="img-circle" width="60">
                <?php endif; ?>
              </div>
              <div class="col-sm-3 col-xs-3 col-md-3" style="margin-top: 1%">
                <?php echo e($refereds->name); ?>

              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
       
                      
        </div><!-- /row --> 
           

          <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>