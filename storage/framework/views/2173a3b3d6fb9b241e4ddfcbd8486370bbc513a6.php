<?php $__env->startSection('css'); ?>
 <style>
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

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
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="card-panel curva">
            <h4 class="titelgeneral"><i class="mdi mdi-filmstrip"></i> Películas registradas </h4>
            <?php if($movie->count() != 0 ): ?>
            <div class="row">
                <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Auth::guard('web_seller')->user()->id === $m->seller_id): ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                        <a href="<?php echo e(route('movies.show', $m->id)); ?>">
                      <img src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($m->img_poster); ?>" width="100%" height="300px">
                      </a>
                      <!-- <span class="card-title">Card Title</span> -->
                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(route('movies.edit',$m->id)); ?>"><i class="material-icons">create</i></a>
                    </div>
                    <div class="card-content">
                        <div class="col m12">
                            <p class=""> <?php echo e($m->title); ?></p>
                        </div>
                        <div class="col m12 ">
                            <small><b>Estatus:</b> <?php echo e($m->status); ?></small>
                        </div>
                        
                            <small><b>N° de compras</b> <?php echo e($m->transaction->count()); ?></small> 
                    </div>
                  </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($movie->links()); ?>

            <?php else: ?>
            <div class="col m12">
            <blockquote >
                <i class="material-icons fixed-width large grey-text">movie</i><br><h5>No Posee películas registradas</h5>
            </blockquote>
            <br>
            </div>
            <?php endif; ?>

            <a href="<?php echo e(route('movies.create')); ?>" class="btn curvaBoton waves-effect waves-light green">   
                <span>Agregar más películas</span>
            </a>       
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>