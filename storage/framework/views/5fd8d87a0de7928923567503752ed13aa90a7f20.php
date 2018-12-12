<?php $__env->startSection('main'); ?>  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mi Música</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 <?php if($Singles != 0): ?>
                <!-- PROFILE 01 PANEL -->
                <?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            <?php if($Single->autors->photo): ?>
                                <img src="<?php echo e(asset($Single->autors->photo)); ?>?.<?php echo e(rand(1,1000)); ?>" width="100%" height="220" style="">
                            <?php else: ?>
                                <img src="#" width="100%" height="220" style="">
                            <?php endif; ?>
                        </div>
                        <div class="profile-01 centered">
                            <p><a href="<?php echo e(url('PlayList/' .$Single->id)); ?>" style="color: #ffff"> Añadir al Playlist</a></p>
                        </div>
                        <div class="centered">
                            <h3><?php echo e($Single->autors->name); ?></h3>
                            <h6><?php echo e($Single->song_name); ?></h6>
                            <audio  id="player">
                                <source src="<?php echo e(asset($Single->song_file)); ?>" type="audio/mp3">
                            </audio>
                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h1>No Posee Singles</h1>
                <?php endif; ?>
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