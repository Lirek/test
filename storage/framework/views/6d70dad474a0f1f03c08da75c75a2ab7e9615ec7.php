<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="box box-widget widget-user ">
                    
                    <h2><b>Película:</b> "<?php echo e($movie->title); ?>" (<?php echo e($movie->release_year); ?>) <b><?php echo e($movie->cost); ?> tickets</b></h2>
                    <div class="box-footer no-padding">
                        <div class="col-md-12">
                            <ul class="nav nav-stacked">
                                <li>
                                    <h2>
                                        <b>Titulo original:</b>
                                        <span class="">
                                            "<?php echo e($movie->original_title); ?>"
                                        </span>
                                    </h2>
                                </li>
                                <li>
                                    <h2><b>Sinopsis: </b>
                                        <span class="pull-right "></span>
                                    </h2>
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
                                            <h3>
                                                <a href="<?php echo e($movie->trailer_url); ?>" target="_blank">
                                                    <span class="glyphicon glyphicon-link"></span>
                                                    <b> Ver trailer </b>
                                                </a>
                                            </h3>
                                        </li>
                                    <?php else: ?>
                                        <h2>No tiene trailer</h2>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="box-footer padding bg-gray">
                        <div class="text-center">
                            <video style="width: 60%;" poster="<?php echo e(asset('movie/poster')); ?>/<?php echo e($movie->img_poster); ?>" id="player" controls>
                                <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($movie->duration); ?>" type="video/mp4">
                                <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($movie->duration); ?>" type="video/webm">
                            </video>
                        </div>
                        <br>
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