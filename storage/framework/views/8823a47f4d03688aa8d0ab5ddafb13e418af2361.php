<?php $__env->startSection('main'); ?>

<div class="container">
	<div class="row">
		<div class="col s5">
			<div class="card-panel">
				<div class="center-align">
					<img src="<?php echo e(asset($Artist->photo)); ?>" class="responsive-img circle center-align">
				</div>
				<div class="divider"></div>
				<h5 class="center"><?php echo e($Artist->name); ?></h5>
				<div class="center">
				<span class="flag-icon flag-icon-<?php echo e(strtolower($Artist->country)); ?>"></span>
				</div>
				<p><?php echo e($Artist->descripcion); ?></p>
				<div class="divider"></div>
				<br>
				  <div class="center">

					<a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($Artist->facebook); ?>" target="blank">
					<i class="fab fa-facebook"></i>
					</a>

					<a class="waves-effect waves-light btn red" href="<?php echo e($Artist->google); ?>" target="blank"> 
					<i class="fab fa-youtube"></i>
					</a>

					<a class="waves-effect waves-light btn pink" href="<?php echo e($Artist->instagram); ?>" target="blank">
					<i class="fab fa-instagram"></i>
					</a>

					<a class="waves-effect waves-light btn blue" href="<?php echo e($Artist->twitter); ?>" target="blank">
					<i class="fab fa-twitter"></i>
					</a>

				  </div>
			</div>
		</div>

		<div class="col s7">
			<div class="card-panel">
				<div class="center"><h3>Discografia</h3></div>
				
				<div class="divider"></div>
				
					<?php if($Singles!=NULL): ?>
					 
					 <ul class="collection with-header">
        				
        				<li class="collection-header"><h5>Singles</h5></li>
        					<?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
 							<li class="collection-item">
 								<div>
 									<?php echo e($Single->song_name); ?>

 									<a href="#!" class="secondary-content tooltipped" data-position="right" data-tooltip="Costo <?php echo e($Single->cost); ?>">
 								<i class="fas fa-shopping-cart"></i>
 							</a></div>
 							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        		        </li>
        
      				 </ul>
	
						
							
					<?php endif; ?>
					<div class="divider"></div>
					<h5>Albumes</h5>
				<?php if($Albums != NULL): ?>
				  <ul class="collapsible">

					<?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<div class="collapsible-header"><?php echo e($Album->name_alb); ?></div>
						<div class="collapsible-body">
							<div class="center">
							<img src="<?php echo e(asset($Album->cover)); ?>" width="300" height="300" class="responsive-img circle">
							</div>
							<table>
								<thead>
									<td>Nombre</td>
									<td>Duracion</td>
								</thead>
								<tbody>
									<?php $__currentLoopData = $Album->songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $songs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
									 <td><?php echo e($songs->song_name); ?></td>
									 <td><?php echo e($songs->duration); ?></td>
									</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</tbody>
							</table>
						</div>
					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  </ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>