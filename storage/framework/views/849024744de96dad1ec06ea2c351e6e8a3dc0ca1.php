<?php $__env->startSection('content'); ?>
  <!--main content start-->
  <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  
<style type="text/css">

</style>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content white-text">
          <span class="card-title grey-text"><h3><i class="material-icons">apps</i> Cartelera</h3></span>

          <br>

          
          <?php if($Movies!=null): ?>
            <span class="card-title grey-text"><h4><i class="material-icons">local_movies</i> Peliculas</h4></span>
            <div class="row">
              <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($m->img_poster); ?>" height="300px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          
          <?php if(!$Albums): ?>
            <span class="card-title grey-text"><h4><i class="material-icons">music_note</i> Música</h4></span>
            <div class="row">
              <?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset($a->cover)); ?>" height="300px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          
          <?php if($Book!=null): ?>
            <span class="card-title grey-text"><h4><i class="material-icons">book</i> Lectura</h4></span>
            <span class="card-title grey-text"><h5><i class="material-icons">bookmark</i> Libro</h5></span>
            <div class="row">
              <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($b->cover); ?>" height="300px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          
          <?php if($Megazines!=null): ?>
            <span class="card-title grey-text"><h5><i class="material-icons">bookmark_border</i> Revista</h5></span>
            <div class="row">
              <?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset($m->cover)); ?>" height="300px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          
          <?php if(!$Radio!=null): ?>
            <span class="card-title grey-text"><h4><i class="material-icons">radio</i> Radio</h4></span>
            <div class="row">
              <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset($r->logo)); ?>" height="100px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>

          
          <?php if(!$Tv!=null): ?>
            <span class="card-title grey-text"><h4><i class="material-icons">tv</i> Tv</h4></span>
            <div class="row">
              <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="<?php echo e(asset('/images/tv/')); ?>/<?php echo e($tv->logo); ?>"  height="100px">
                    </div>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>