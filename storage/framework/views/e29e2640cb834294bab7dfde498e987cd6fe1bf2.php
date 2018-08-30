<?php $__env->startSection('main'); ?>

 <h3><i class="fa fa-angle-right"></i>Balance de la Plataforma</h3>

<div class="row mt">
  	<div class="col-md-4 col-sm-4 mb">
  		<div class="grey-panel pn donut-chart">
  			<div class="grey-header">
	  			<h5>Tickets Vendidos</h5>
  			</div>
			
			<div class="row">
				<div class="col-sm-6 col-xs-6 goleft">
					<p>Total<br/></p>
				</div>
				 
				<div class="col-sm-6 col-xs-6 gocenter">								 	
					<h2><?php echo e($Balance->tickets_solds); ?> <i class="fa fa-ticket" style="font-size: 50px"></i></h2>
				</div>			 	
				 
				 <div class="col-sm-6 col-xs-6 gocenter">
				 	<a href="<?php echo e(url('TicketsDetail')); ?>"><button type="button" class="btn btn-theme">Ver Mas</button></a>
				 </div>
				 
      		</div>
      	</div>
  	</div>
  	

  	<div class="col-md-4 col-sm-4 mb">
  		<div class="darkblue-panel pn">
  			<div class="darkblue-header">
	  			<h5>Puntos Asignados</h5>
  			</div>
			<p>Total</p>
			
			<div class="center">
				<img src="<?php echo e(asset('sistem_images/Leipel Logo-02.png')); ?>" width="110px">
			</div>
			
			<div class="center">
					<h2><?php echo e($Balance->points_solds); ?></h2>
			</div>
			
			<div class="center">
			
			<a href="<?php echo e(url('PointsDetails')); ?>"><button type="button" class="btn btn-theme">Ver Mas
  			</button></a>
  			
  			</div>
  			
  			</div>
  	</div>

  	<div class="col-md-4 col-sm-4 mb">
  		<div class="green-panel pn">
  			<div class="green-header">
	  			<h5><img src="<?php echo e(asset('sistem_images/Leipel Logo1-01.png')); ?>" width="110px"></h5>
  			</div>
  			<div class="center">
  				<h3>Puntos de Leipel</h3>
  			</div>
  			  <div class="center">
  			  	<h3><?php echo e($Balance->my_points); ?></h3>
  			  </div>
  		</div>
  	</div>

</div>	


<h3><i class="fa fa-angle-right"></i>Usuarios Destacados</h3>


<div class="row-mt">

	 	<div class="col-md-8 col-sm-8 mb">
  		<div class="green-panel pn">
  			<div class="green-header">
	  			<h5>Usuarios</h5>
  			</div>
			<p></p>
			
			<div class="center">
				<img src="<?php echo e(asset('sistem_images/Leipel Logo-02.png')); ?>" width="110px">
			</div>
			
			<div class="center">
					 <table class="table table-bordered table-striped table-condensed cf">            
                        <thead class="cf">
                                <tr>
                                  <th class="non-numeric">Nombre</th>
                                  <th class="non-numeric">Email</th>
                                  <th class="non-numeric">Puntos</th>
                                  <th class="non-numeric">Puntos Pendientes</th>
                                  <th class="non-numeric">Limite de Puntos</th>
                                  <th class="non-numeric">Ultima Recarga</th>
                                </tr>
                            </thead>
                                <tbody>
                                  <?php $__currentLoopData = $Users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $User): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <td class="non-numeric"><?php echo e($User->name); ?></td>
                                   <td class="non-numeric"><?php echo e($User->email); ?></td>
                                   <td class="non-numeric"><?php echo e($User->points); ?></td>
                                   <td class="non-numeric"><?php echo e($User->pending_points); ?></td>
                                   <td class="non-numeric"><?php echo e($User->limit_points); ?></td>
                                   <td class="non-numeric"><?php echo e($User->Payments()->first()->created_at); ?></td>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                               </tbody>
                       </table>
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