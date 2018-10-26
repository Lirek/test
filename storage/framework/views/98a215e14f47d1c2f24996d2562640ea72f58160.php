<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
                        <div class="form-group col-md-6">
                          
                        <img src="<?php echo e(asset($type->img_saga)); ?>" class=".img-thumbnail" style="width:200px;height:200px;  " >

                        </div>
                        
                                                <table class="table table-hover">

                    <thead>

                            <tr>
                            <th>Revista</th>
                            <th>Costo</th>
                        </tr>

                    </thead>

                     <?php $__currentLoopData = $type->megazines()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $megazines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                            <th>
                                <?php echo e($megazines->title); ?>

                            </th>

                            <th>
                                <?php echo e($megazines->cost); ?>

                            </th>

                            <th>
                            <!-- <a href="<?php echo e(url('/delete_megazine/'.$megazines->id)); ?>"
                            onclick="return confirm('多 Desea eliminar la revista  <?php echo e($megazines->title); ?> ?')"
                            class="btn btn-danger active ">
                             <span class="glyphicon glyphicon-remove-circle"></span>
                         </a>
                         &nbsp; -->
                         <a href="<?php echo e(url('/megazine_i_update/'.$megazines->id)); ?>" class="btn btn-warning active">
                             <span class="glyphicon glyphicon-wrench"></span>
                         </a>
                         &nbsp;
                         <a href="<?php echo e(url('/show_megazine/'.$megazines->id)); ?>" class="btn btn-info active">
                             <span class="fa fa-play-circle" aria-hidden="true"></span>
                         </a>                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>