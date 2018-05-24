<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="row">
    
    <div class="col-md-4">
      <div class="panel panel-succes">
        
        <div class="panel-heading">
                    Primer Nivel de Referidos
                </div>
                
           <div class="panel-body">

                <h2>Posee:</h2> <h3><?php echo e($referals1); ?></h3>  

        </div>
      </div>  
    </div> 

      <div class="col-md-4">
       <div class="panel panel-default">
        
        <div class="panel-heading">
                    Segundo Nivel de Referidos
                </div>
                
                <div class="panel-body">

                 <h2>Posee:</h2> <h3><?php echo e($referals2); ?></h3>  

                </div>
       </div>
    </div>

        <div class="col-md-4">
          <div class="panel panel-alert">
        
          <div class="panel-heading">
                    Tercer Nivel de Referidos
                </div>

                <div class="panel-body">

                 <h2>Posee:</h2> <h3><?php echo e($referals3); ?></h3>  
            

                </div>
           </div>
        </div>

  </div>

  <div class="row">
  
  </div>

  <div class="row">

  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>