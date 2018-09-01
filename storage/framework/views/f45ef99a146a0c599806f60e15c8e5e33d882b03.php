<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row" style="">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
                            <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3><span class="card-title"><i class="fa fa-angle-right"> <?php echo e($radios->name_r); ?></i></span></h3>
                            <div class="col-sm-12 col-xs-12 col-md-12">
                                <div class="col-sm-4 col-xs-12 col-md-4">
                                    <a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($radios->facebook); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-facebook" ></i>
                                    </a>
                                    <a class="waves-effect waves-light btn blue" href="<?php echo e($radios->twitter); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xs-12 col-md-4"  >
                                    <img src="<?php echo e(asset($radios->logo)); ?>" class="img-responsive" width="70%" style="margin-top: 15%;">
                                </div>
                                <div class="col-sm-4 col-xs-12 col-md-4">
                                    <a class="waves-effect waves-light btn red" href="<?php echo e($radios->google); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%"> 
                                        <i class="fa fa-youtube"></i>
                                    </a>    
                                    <a class="waves-effect waves-light btn pink" href="<?php echo e($radios->instagram); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 2%">
                                <audio  id="player">
                                    <source src="<?php echo e(asset($radios->streaming)); ?>" type="audio/mp3">
                                </audio>
                            </div>
            				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top: 2%">
                                <div class="form-group">
                                    <a href="<?php echo e(url('ShowRadio')); ?>">Atrás</a>
                                </div>
                            </div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>