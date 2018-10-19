<?php $__env->startSection('css'); ?>
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("<?php echo e(asset($serie->img_poster)); ?>");
            margin-top: 5%;
            background-position: center center;
            width: 100%;
            min-height: 500px;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12"> 
                    <h4 class="widget-user-desc"><b>Serie:</b> "<?php echo e($serie->title); ?>" (<?php echo e($serie->release_year); ?>)</h4>
                </div>

                <div class="col-md-7" style="margin-top: 2%">
                    <ul class="nav nav-stacked">
                        <li>
                            <h4> 
                                <b><?php echo e($serie->cost); ?> tickets</b>
                            </h4>
                        </li>
                        <li>
                            <h4> <b>Estatus de transmisión:</b> 
                                <span class="pull-right "><?php echo e($serie->status_series); ?></span>
                            </h4>
                        </li>
                        <li>
                            <h4> <b>Historia:</b>
                                <br>
                                <h4><p class="text-justify"> <?php echo e($serie->story); ?> </p></h4>
                            </h4>
                        </li>
                        <li>
                            <?php if($serie->saga_id!=null): ?>
                                <h4> <b>Saga:</b> <span class="pull-right "> <?php echo e($serie->saga->sag_name); ?> </span></h4>
                                <div class="col-xs-5">
                                    <h4> <b>Antes:</b> <span class=""> <?php echo e($serie->before); ?> </span> </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4> <b>Después:</b> <span class=""> <?php echo e($serie->after); ?> </span> </h4>
                                    <br>
                                </div>
                            <?php else: ?>
                                <h4> <b>Saga:</b> <span class="pull-right ">No tiene saga</span></h4>
                            <?php endif; ?>
                        </li>
                        <li>
                            <h4> <b>Estatus de aprobación:</b> 
                                <span class="pull-right "><?php echo e($serie->status); ?></span>
                            </h4>
                        </li>
                        <li>
                            <h4>
                                <a href="<?php echo e($serie->trailer); ?>" target="_blank"><span class="glyphicon glyphicon-link"></span><b> Ver trailer</b></a>
                            </h4>
                        </li>
                    </ul>
                </div>

                <div class="col-md-5 col-xs-12">
                    <div id="panel" class="img-rounded img-responsive av text-center">
                        <div class="widget-user-header bg-black">
                            <div class="widget-user-image">
                                <img class="img-responsive av" src="<?php echo e(asset($serie->img_poster)); ?>" style="width:100%; height:500px; border-radius:2%;" alt="">
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-stacked">
                        <li>
                            <h6> <b>Categorias:</b> 
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span>| <?php echo e($t->tags_name); ?> |</span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </h6>
                        </li>
                    </ul>
                </div>

                
                <div class="box box-widget widget-user-2">
                    <div class="box-footer no-padding">
                        <div class="col-md-12 table-responsive">
                            <h2><b>Episodios:</b></h2>
                            <?php if($episodes!=null): ?>
                                <h4>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre del episodio</th>
                                                <th>Sinopsis</th>
                                                <th>Trailer</th>
                                                <th>Ver episodio</th>
                                                <th>Costo</th>
                                            </tr>
                                        </thead>
                                        <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td> <?php echo e($episode->episode_name); ?> </td>
                                                    <td class="text-justify"> <?php echo e($episode->sinopsis); ?> </td>
                                                    <td>
                                                        <a href="<?php echo e($episode->trailer_url); ?>" target="_blank">
                                                        <span class="glyphicon glyphicon-link"></span>
                                                        </a>
                                                    </td>
                                                    <td> 
                                                        <a href="<?php echo e(route('series.showEpisode',[$episode->id,$serie->id])); ?>" class="btn btn-info btn-xs">
                                                            <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                        </a>
                                                    </td>
                                                    <td> <?php echo e($episode->cost); ?> </td>
                                                </tr>
                                            </tbody>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                </h4>
                            <?php else: ?>
                                <span class="pull-right"> No tiene episodios </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div align="right">
                            <a href="<?php echo e(url('/series')); ?>" class="btn btn-danger">Atrás</a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div align="left">
                            <a href="<?php echo e(route('series.edit',$serie->id)); ?>" class="btn btn-primary">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>