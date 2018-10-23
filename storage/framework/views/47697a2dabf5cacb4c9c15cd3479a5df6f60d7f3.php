<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="box box-widget widget-user ">
                    <div class="col-md-12"> 
                        <h4><b>Película:</b> "<?php echo e($movie->title); ?>" (<?php echo e($movie->release_year); ?>) </h4>
                    </div>
                    <div class="col-md-6">
                        <div class="widget-user-header bg-black">
                            <div class="widget-user-image">
                                <img class="img-responsive av" src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($movie->img_poster); ?>" style="width:450px;height:550px; border-radius:2%;" alt="User Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer no-padding">
                        <div class="col-md-6">
                            <h4><b>Costo: </b> <?php echo e($movie->cost); ?> tickets</h4>
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4>
                                        <b>Titulo original:</b>
                                        <span class="">
                                            "<?php echo e($movie->original_title); ?>"
                                        </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4><b>Sinopsis: </b>
                                        <span class="pull-right "></span>
                                    </h4>
                                    <h3 class="text-justify">    
                                        <?php echo e($movie->based_on); ?>

                                    </h3>
                                </li>
                                <li>
                                    <h5> <b>Genero:</b> 
                                        <?php $__currentLoopData = $movie->tags_movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span>| <?php echo e($t->tags_name); ?> |</span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </h5>
                                </li>
                                
                                <li>
                                    <?php if($movie->trailer_url!=null): ?>
                                        <li>
                                            <h4>
                                                <a href="<?php echo e($movie->trailer_url); ?>" target="_blank">
                                                    <span class="glyphicon glyphicon-link"></span>
                                                    <b> Ver trailer </b>
                                                </a>
                                            </h4>
                                        </li>
                                    <?php else: ?>
                                        <h2>No tiene trailer</h2>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12" style="margin-top: 2%">
                        <div class="box-footer padding bg-gray">
                            <div class="text-center">
                                <video style="" poster="<?php echo e(asset('movie/poster')); ?>/<?php echo e($movie->img_poster); ?>" id="player" controls>
                                    <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($movie->duration); ?>" type="video/mp4">
                                    <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($movie->duration); ?>" type="video/webm">
                                </video>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="center">
                        <a href="<?php echo e(url('/movies')); ?>" class="btn btn-danger">Atrás</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
    <script type="text/javascript">
        const player = new Plyr('#player');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>