<?php $__env->startSection('main'); ?>     
          <div class="row">
              <!-- TWITTER PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-suitcase fa-4x"></i>
                  <p><?php echo e($content_total); ?></p>
                  <p class="user">Contenido Por Aprobar</p>
                </div>
              </div><!-- /col-md-4 -->
              
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="twitter-panel pn">
                  <i class="fa fa-user-tie fa-4x"></i>
                  <p><?php echo e($sellers); ?></p>
                  <p class="user">Proveedores por Validar</p>
                </div>
              </div><!-- /col-md-4 -->
            
              <div class="col-lg-4 col-md-4 col-sm-4 mb">                
                <div class="twitter-panel pn">
                  <i class="fas fa-archive fa-4x"></i>
                  <p><?php echo e($aplyss); ?></p>
                  <p class="user">Cuentas Proveedor Por Revisar</p>
                </div>
              </div><!-- /col-md-4 -->
          </div
<?php $__env->stopSection(); ?>

<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>