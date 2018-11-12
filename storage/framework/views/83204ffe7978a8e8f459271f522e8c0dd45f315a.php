<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Series registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Portada</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Año de lanzamiento</th>
                                    <th class="text-center">Episodios</th>
                                    <th class="text-center">Estatus</th>
                                    <th class="text-center" width="60">Género</th>
                                    <th class="text-center">Fecha de registro</th>
                                    <th class="text-center">N° de compras</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $serie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Auth::guard('web_seller')->user()->id === $s->seller_id): ?>
                                        <tr>
                                            <td class="text-center"> <?php echo e($s->title); ?> </td>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('series.show', $s->id)); ?>">
                                                    <img class="img-rounded img-responsive text-center" src="<?php echo e(asset($s->img_poster)); ?>" style="width:70px;height:70px;margin:8%;" alt="Portada">
                                                </a>
                                            </td>
                                            <td class="text-center"> <?php echo e($s->status_series); ?> </td>
                                            <td class="text-center"> <?php echo e($s->cost); ?> </td>
                                            <td class="text-center"> <?php echo e($s->release_year); ?> </td>
                                            <td class="text-center"> <?php echo e(count($s->episode)); ?> </td>
                                            <td class="text-center"> <?php echo e($s->status); ?> </td>
                                            <td class="text-center">
                                                <?php 
                                                    $tags = $s->tags_serie;
                                                 ?>
                                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($t->tags_name); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="text-center"> <?php echo e($s->created_at); ?> </td>
                                             <td class="text-center"> <?php echo e($s->Transactions->count()); ?> </td>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('series.show',$s->id)); ?>" class="btn btn-info btn-xs">
                                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                </a>
                                                <a href="<?php echo e(route('series.edit',$s->id)); ?>" class="btn btn-warning btn-xs">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                <!-- <a href="<?php echo e(route('seriesDestroy', $s->id)); ?>" onclick="return confirm('¿Desea eliminar la serie <?php echo e($s->title); ?>?')" class="btn btn-danger btn-xs">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </a> -->
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Portada</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Año de lanzamiento</th>
                                    <th class="text-center">Episodios</th>
                                    <th class="text-center">Estatus</th>
                                    <th class="text-center">Género</th>
                                    <th class="text-center">Fecha de registro</th>
                                    <th class="text-center">N° de compras</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="col-md-offset-9">
            <a href="<?php echo e(route('series.create')); ?>" class="btn btn-info">
                <b class="box-header with-border bg bg-black-gradient">
                    <div class="box-title">
                        <i class="li_video"></i>
                        <span>
                            Agregar más series
                        </span>
                    </div>
                </b>
            </a>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "order": [[ 8, "desc" ]],
            });
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>