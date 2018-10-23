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
                        <h3 class="box-title">Libros registrados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Portada</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center" width="80">Generos</th>
                                <th class="text-center">Año de lanzamiento</th>
                                <th class="text-center">Estatus</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::guard('web_seller')->user()->id === $b->seller_id): ?>
                                    <tr>
                                        <td class="text-center"> <?php echo e($b->title); ?> </td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('tbook.show', $b->id)); ?>">
                                                <img class="img-rounded img-responsive text-center" src="<?php echo e(asset('/images/bookcover')); ?>/<?php echo e($b->cover); ?>" style="width:70px;height:70px;margin-left:5%;" alt="Portada">
                                            </a>
                                        </td>
                                        <td class="text-center"> <?php echo e($b->author->full_name); ?> </td>
                                        
                                        <td class="text-center"> <?php echo e($b->rating->r_name); ?> </td>
                                        <td class="text-center">
                                            <?php 
                                                $tags = $b->tags_book;
                                             ?>
                                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($t->tags_name); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="text-center"> <?php echo e($b->release_year); ?> </td>
                                        
                                        <td class="text-center"> <?php echo e($b->status); ?> </td>
                                        <td class="text-center ">
                                            <a href="<?php echo e(route('tbook.show', $b->id)); ?>"
                                               class="btn btn-info btn-xs">
                                                <span class="fa fa-eye" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo e(route('tbook.edit', $b->id)); ?>"
                                               class="btn btn-warning btn-xs">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="<?php echo e(route('tbook.destroy',$b->id)); ?>"
                                               onclick="return confirm('¿Desea eliminar el libro <?php echo e($b->title); ?>?')" class="btn btn-danger btn-xs ">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Título</th>
                                <th class="text-center">Portada</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center" width="80">Generos</th>
                                <th class="text-center">Año de lanzamiento</th>
                                <th class="text-center">Estatus</th>
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
            <a href="<?php echo e(route('tbook.create')); ?>" class="btn btn-info">
                <b class="box-header with-border bg bg-black-gradient">
                    <div class="box-title">
                        <i class="fa fa-book"></i>
                        <span>
                            Agregar más libros
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
                }
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