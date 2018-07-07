<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Películas Registradas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Titulo</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Portada</th>
                                    
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <?php if(Auth::guard('web_seller')->user()->id === $m->seller_id): ?>
                                        <tr>
                                            <td class="text-center"> <?php echo e($m->id); ?> </td>
                                            <td class="text-center"> <?php echo e($m->title); ?> </td>
                                            <td class="text-center"> <?php echo e($m->rating->r_name); ?> </td>
                                            
                                            
                                            <td class="text-center ">
                                                <a href="#">
                                                    <img class="img-circle " src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($m->img_poster); ?>" style="width:50px; height:50px;" alt="Portada">
                                                </a>
                                            </td>
                                            <td class="text-center ">
                                                <a href="<?php echo e(route('movies.destroy',$m->id)); ?>" onclick="return confirm('¿Realmente desea eliminar la película: <?php echo e($m->title); ?>?')" class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                                </a>
                                                &nbsp;
                                                <a href="<?php echo e(route('movies.edit', $m->id)); ?>" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-wrench"></span>
                                                </a>
                                                &nbsp;
                                                <a href="<?php echo e(route('movies.show', $m->id)); ?>" class="btn btn-info">
                                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Codigo</th>
                                    <th class="text-center">Titulo</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Portada</th>
                                    
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
            <a href="<?php echo e(route('movies.create')); ?>" class="btn btn-info">
                <b class="box-header with-border bg bg-black-gradient">
                    <div class="box-title">
                        <i class="fa fa-film"></i>
                        <span>
                            Agregar más Películas
                        </span>
                    </div>
                </b>
            </a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

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