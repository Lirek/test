<?php $__env->startSection('content'); ?>

<div class="row" style="margin-left: 30px">
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Seguidores</span>
              <span class="info-box-number"><?php echo e($followers); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Contenido Creado</span>
              <span class="info-box-number"><?php echo e($total_content); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Contenido Publicado</span>
              <span class="info-box-number"><?php echo e($aproved_content); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
</div>

<div class="row" style="margin-left: 30px">
        
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                        <h3>0</h3>

                        <p>Ventas</p>
                </div>
                    <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                    </div>
                     <a href="#" class="small-box-footer">
                     Sumario <i class="fa fa-arrow-circle-right"></i>
                    </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0</h3>

              <p>Balance en tickets</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
               <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Solicitudes Administrador</p>
            </div>
            <div class="icon">
              <i class="fa fa-commenting"></i>
            </div>
            <a href="#" class="small-box-footer">
               <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>