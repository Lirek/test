<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Panel de Contenido </div>
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="panel-body">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Mis Revistas</h3>
                </div>
            <div class="panel-body">
                  <table class="table table-hover">
                
                    <thead>   
                
                            <tr>
                            <th>Cadena de Publicacion</th>
                            <th>Numero Revistas</th>
                            <th>Fecha de Publicacion</th>
                            <th>Estatus</th>
                        </tr>
                
                    </thead>
                
                    <tbody>
                            <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pub_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <th><?php echo e($pub_c->sag_name); ?></th>
                            <th><?php echo e(count($pub_c->megazines())); ?></th>
                            <th><?php echo e($pub_c->created_at); ?></th>
                            <th><?php echo e($pub_c->status); ?></th>
                             <th>
                                
                                <a href="<?php echo e(url('/type_delete/'.$pub_c->id)); ?>"
                                   onclick="return confirm('¿ Desea eliminar la cadena de publicacion  <?php echo e($pub_c->sag_name); ?> ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="<?php echo e(url('/type_update/'.$pub_c->id)); ?>" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                                &nbsp;
                                <a href="<?php echo e(url('/show_pub/'.$pub_c->id)); ?>" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                            </th>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                  </table> 
                </div>
            <?php echo $collection->render(); ?>

            </div>


            <div class="panel panel-default">

            <div class="panel-heading">
                    <h3>Mis Revistas Independientes</h3>
            </div>

              <div class="col-md-8">

                  <table class="table table-hover">
                
                    <thead>   
                
                            <tr>
                            <th>Revista</th>
                            <th>Costo</th>
                            <th>Fecha de Publicacion</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                
                    </thead>
                
                     <?php $__currentLoopData = $single; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $megazine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <th><?php echo e($megazine->title); ?></th>
                            <th><?php echo e($megazine->cost); ?></th>
                            <th><?php echo e($megazine->created_at); ?></th>
                            <th><?php echo e($megazine->status); ?></th>

                            <th>
                                <a href="<?php echo e(url('/show_megazine/'.$megazine->id)); ?>" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                                </th>
                            <th>
                                <a href="<?php echo e(url('/delete_megazine/'.$megazine->id)); ?>"
                                   onclick="return confirm('¿ Desea eliminar la revista   <?php echo e($megazine->title); ?> ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="<?php echo e(url('/megazine_i_update/'.$megazine->id)); ?>" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                            </th>
                        </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                  </table> 
                </div>
            <?php echo $single->render(); ?>                  
                </div>
            </div>                
                
                
              </div>
            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>