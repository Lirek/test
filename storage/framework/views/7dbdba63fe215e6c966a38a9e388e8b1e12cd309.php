<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h4 class="titelgeneral"><i class="material-icons small">music_note</i> Artistas o grupos registrados</h4>
        <?php if($artists->count() != 0 ): ?>
            <div class="card-panel curva">
                <div class="row ">
                    <?php $__currentLoopData = $artists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(Auth::guard('web_seller')->user()->id === $a->seller_id): ?>
                            <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                
                              <img src="<?php echo e(asset($a->photo)); ?>" width="100%" height="300px">
                              
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(url('/editArtist', $a->id)); ?>"><i class="material-icons">create</i></a>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class=""><?php echo e($a->name); ?></p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Tipo:</b> <?php echo e($a->type_authors); ?></small>
                                </div>
                                <div class="col m12 ">  
                                    <?php if($a->instagram!=null): ?>
                                            <div class="col m4 "> 
                                                <a href="<?php echo e($a->instagram); ?>" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-instagram"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($a->facebook!=null): ?>
                                            <div class="col m4 "> 
                                                <a href="<?php echo e($a->facebook); ?>" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-facebook-square"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($a->google!=null): ?>
                                            <div class="col m4 "> 
                                                <a href="<?php echo e($a->google); ?>" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-youtube-square"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            <?php endif; ?> 
                                </div>                        
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>