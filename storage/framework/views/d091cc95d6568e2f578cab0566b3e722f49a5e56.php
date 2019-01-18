<?php $__env->startSection('main'); ?>

    <span class="card-title grey-text"><h3>Balance de la Plataforma</h3></span>
    <div class="row">
      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Tickets Vendidos</span>
            <i class="large material-icons">confirmation_number</i>
            <h4>
              <p><?php echo e($Balance->tickets_solds); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="<?php echo e(url('TicketsDetail')); ?>" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Puntos Asignados</span>
            <i class="large material-icons">cached</i>
            <h4>
              <p><?php echo e($Balance->points_solds); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="<?php echo e(url('PointsDetails')); ?>" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Puntos de Leipel</span>
            <img src="<?php echo e(asset('sistem_images/Leipel Logo-02.png')); ?>" width="128px">
            <h4>
              <p><?php echo e($Balance->my_points); ?></p>
            </h4>
          </div>
          <div class="card-action">
            <a href="" class="btn-flat disabled "></a>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
  <span class="card-title grey-text"><h3>Usuarios</h3></span>
  <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
    <li class="tab" id="Destacados"><a class="active" href="#test1">Usuarios Destacados</a></li>
    <li class="tab" id="Libres"><a href="#test2">Usuarios Libres</a></li>
  </ul>
  <div id="test1" class="col s12">
    <table class="responsive-table">
    <thead>
      <tr>
        <th><i class="material-icons"></i>Nombre</th>
        <th><i class="material-icons"></i>Email</th>
        <th><i class="material-icons"></i>Puntos</th>
        <th><i class="material-icons"></i>Puntos Pendientes</th>
        <th><i class="material-icons"></i>Limite de Puntos</th>
        <th><i class="material-icons"></i>Ultima Recarga</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
       <td class="non-numeric"><?php echo e($User->name); ?></td>
       <td class="non-numeric"><?php echo e($User->email); ?></td>
       <td class="non-numeric"><?php echo e($User->points); ?></td>
       <td class="non-numeric"><?php echo e($User->pending_points); ?></td>
       <td class="non-numeric"><?php echo e($User->limit_points); ?></td>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php $__currentLoopData = $Payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <td class="non-numeric"><?php echo e($pay->first()->created_at->format('d/m/Y')); ?></td>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tr>
       
    </tbody>
  </table>
  </div>
  <div id="test2" class="col s12">
    <table class="responsive-table">
    <thead>
        <tr>
          <th><i class="material-icons"></i>Nombre</th>
          <th><i class="material-icons"></i>Email</th>
          <th><i class="material-icons"></i>Puntos</th>
          <th><i class="material-icons"></i>Fecha de Registro</th>
          <th><i class="material-icons"></i>Estatus</th>
        </tr>
    </thead>
      <tbody>
        <?php $__currentLoopData = $UnRefereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $UnRefered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
         <td class="non-numeric"><?php echo e($UnRefered->name); ?></td>
         <td class="non-numeric"><?php echo e($UnRefered->email); ?></td>
         <td class="non-numeric"><?php echo e($UnRefered->points); ?></td>
         <td class="non-numeric"><?php echo e($UnRefered->created_at); ?></td>
         <?php if($UnRefered->verify==0): ?>
         <td class="non-numeric">No Verificado</td>
         <?php else: ?>
         <td class="non-numeric">Verificado</td>
         <?php endif; ?>
         </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
     </tbody>
    </table>
  </div>
  </div>











	
              
			
			<div class="center">
				<a href="<?php echo e(url('UserDetails')); ?>"><button type="button" class="btn btn-theme">Ver Mas
  			</button></a>
			</div>
  		</div>
  	</div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>