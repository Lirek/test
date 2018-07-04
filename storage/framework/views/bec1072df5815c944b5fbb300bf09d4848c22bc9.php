<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>
                            Panel de Contenido Musical
                        </h3>
                    </div>
                    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis Albunes</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Álbum</th>
                                            <th>Artista</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Duración</th>
                                            <th>Costo</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <th><?php echo e($album->name_alb); ?></th>
                                                <th><?php echo e($album->autors->name); ?></th>
                                                <th><?php echo e($album->created_at); ?></th>
                                                <th><?php echo e($album->duration); ?></th>
                                                <th><?php echo e($album->cost); ?></th>
                                                <th><?php echo e($album->status); ?></th>
                                                <th>
                                                    <a href="<?php echo e(url('/delete_album/'.$album->id)); ?>" onclick="return confirm('¿ Desea eliminar la emisora  <?php echo e($album->name_alb); ?> ?')" class="btn btn-danger active ">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?php echo e(url('/modify_album/'.$album->id)); ?>" class="btn btn-warning active">
                                                        <span class="glyphicon glyphicon-wrench"></span>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?php echo e(url('/show_album/'.$album->id)); ?>" class="btn btn-info active">
                                                        <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <?php echo $albums->render(); ?>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis Canciones</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la Canción</th>
                                            <th>Artista</th>
                                            <th>Duración</th>
                                            <th>Costo</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Estatus</th>
                                            <th>Audio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <?php $__currentLoopData = $singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tbody>
                                            <tr>
                                                <th><?php echo e($song->song_name); ?></th>
                                                <th><?php echo e($song->autors->name); ?></th>
                                                <th><?php echo e($song->duration); ?></th>
                                                <th><?php echo e($song->cost); ?></th>
                                                <th><?php echo e($song->created_at); ?></th>
                                                <th><?php echo e($song->status); ?></th>
                                                <th>
                                                    <audio controls="" src="<?php echo e($song->song_file); ?>">
                                                        <source src="<?php echo e($song->song_file); ?>" type="audio/mpeg">
                                                    </audio>
                                                </th>
                                                <th>
                                                    <a href="<?php echo e(url('/delete_song/'.$song->id)); ?>" onclick="return confirm('¿ Desea eliminar el single  <?php echo e($song->song_name); ?> ?')" class="btn btn-danger active ">
                                                        <span class="glyphicon glyphicon-remove-circle"></span>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?php echo e(url('/modify_single/'.$song->id)); ?>" class="btn btn-warning active">
                                                        <span class="glyphicon glyphicon-wrench"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                            <?php echo $singles->render(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>