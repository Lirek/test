<?php $__env->startSection('css'); ?>
    <style>
        .default_color{background-color: #FFFFFF !important;}
        .img{margin-top: 7px;}
        .curva{border-radius: 10px;}
        .curvaBoton{border-radius: 20px;}
        /*Color letras tabs*/
        .tabs .tab a{
            color:#00ACC1;
        }
        /*Indicador del tabs*/
        .tabs .indicator {
            display: none;
        }
        .tabs .tab a.active {
            border-bottom: 2px solid #29B6F6;
        }
        /* label focus color */
        .input-field input:focus + label {
            color: #29B6F6 !important;
        }
        /* label underline focus color */
        .row .input-field input:focus {
            border-bottom: 1px solid #29B6F6 !important;
            box-shadow: 0 1px 0 0 #29B6F6 !important
        }
        .card{
            height:430px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col s12">
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> TV's registradas</h4>
                <div class="row">
                    <?php if($tvs->count() != 0 ): ?>
                        <?php $__currentLoopData = $tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Auth::guard('web_seller')->user()->id === $tv->seller_id): ?>
                                <div class="col s12 m4 l3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="<?php echo e(route('tvs.show', $tv->id)); ?>">
                                                <img src="<?php echo e(asset($tv->logo)); ?>" width="100%" height="300px">
                                            </a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(route('tvs.edit', $tv->id)); ?>">
                                                <i class="material-icons">create</i>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="col m12">
                                                <h6><?php echo e($tv->name_r); ?></h6>
                                            </div>
                                            <a href="<?php echo e($tv->facebook); ?>" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                                            <a  href="<?php echo e($tv->google); ?>" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                                            <a href="<?php echo e($tv->twitter); ?>" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                                            <a href="<?php echo e($tv->instagram); ?>" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
                                            <div class="col m12">
                                                <small><b>Estatus:</b> <?php echo e($tv->status); ?></small>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s12">
                            <?php echo e($tvs->links()); ?>

                        </div>
                    <?php else: ?>
                        <div class="col m12">
                            <blockquote>
                                <i class="material-icons fixed-width large grey-text">radio</i><br><h5>No posee TV's registradas</h5>
                            </blockquote>
                            <br>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(route('tvs.create')); ?>" class="btn curvaBoton waves-effect waves-light green">   
                    <span>Agregar más TV's</span>
                </a>       
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>