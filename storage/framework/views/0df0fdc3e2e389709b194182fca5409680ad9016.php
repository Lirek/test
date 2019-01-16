<?php $__env->startSection('css'); ?>
    <style type="text/css">


        .card .card-content {
         padding: 24px 8px 12px 8px;
        }
       .card .card-content .card-title {
           color: #000000;
           display: block;
           line-height: 14px;
           max-height: 14px;
           min-height: 12px;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
       }
       .card .card-title {
        line-height: 1.2;
           font-size: 16px;
       }

      #autor{
           color: #1e88e5 ;
           display: block;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
           font-size: 14px
       }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row">
    <span class="grey-text"><h4><b><i class="material-icons small">movie</i> Mis Peliculas</b></h4></span>
    
    <br>

        <div class="row">
                <?php if($Movies != 0): ?>
                    <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- PROFILE 01 PANEL -->
                        <div class="col s6 m3 ">
                            <div class="card">

                                    <a href="<?php echo e(url('ShowMyMovie/'.$Movie->id)); ?>">

                                        <?php if($Movie->img_poster): ?>
                                            <div class="card-image">
                                            <img src="movie/poster/<?php echo e($Movie->img_poster); ?>" width="100%" height="300"style="">
                                                <a href="<?php echo e(url('ShowMyMovie/'.$Movie->id)); ?>" class="btn-floating halfway-fab waves-effect waves-light blue btn tooltipped " data-position="bottom" data-tooltip="Detalles"><i class="material-icons">movie</i></a>

                                            </div>
                                        <?php else: ?>
                                            <div class="card-image grey lighten-2">
                                                <img  width="100%" height="300" style="">
                                                <a href="<?php echo e(url('ShowMyMovie/'.$Movie->id)); ?>" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 btn tooltipped" data-position="top" data-tooltip="Detalles"><i class="material-icons">book</i></a>
                                            </div>

                                        <?php endif; ?>
                                    </a>

                                <div class="card-content">
                                    <span class="card-title title"><b><?php echo e($Movie->title); ?></b></span>
                                    <!--
                                    <span> <a id='autor' href="ProfileBookAuthor/"></a></span>-->
                                    <!--   -->
                                </div>
                            </div>
                        </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                 <div class="col s6 offset-s3">
                     <br><br>
                    <blockquote >
                    <i class="material-icons fixed-width large grey-text">movie</i><br><h5 blue-text text-darken-2>No Posee Peliculas adquiridas</h5>
                    </blockquote>
                </div>
                </div><!--End div row -->
                <?php endif; ?>
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>