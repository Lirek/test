<?php $__env->startSection('main'); ?>

<div class="container">
  <div class="row">
    
    <div class="col s4">
      <div class="card-panel teal">
           
           <div class="center">
             <h3><spam class="white-text">Primer Nivel de Referidos</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
            <h3><spam class="white-text"><?php echo e($referals1); ?></spam></h3>  
           </div>

        </div>
    </div>  

    <div class="col s4">
      <div class="card-panel teal">
           
        <div class="center">
          <h4><spam class="white-text">Segundo Nivel de Referidos</spam></h4>
        </div>
                
           <div class="divider"></div>
           
        <div class="center">
          <h3><spam class="white-text"><?php echo e($referals2); ?></spam></h3>  
        </div>
           
        </div>
    </div>

      <div class="col s4">
        <div class="card-panel teal">
           
        <div class="center">
          <h3><spam class="white-text">Tercer Nivel de Referidos</spam></h3>
        </div>
                
           <div class="divider"></div>
           
        <div class="center">
          <h3><spam class="white-text"><?php echo e($referals3); ?></spam></h3>  
        </div>
           
        </div>
      </div>

    </div> 

  </div>

  


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>