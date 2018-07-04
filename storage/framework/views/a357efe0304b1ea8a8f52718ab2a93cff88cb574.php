<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Tv
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h3 class="box-title">Canales</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="active text-center "> Codigo </th>
                                <th class="active text-center "> Nombre </th>
                                <th class="active text-center "> Accion </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::guard('web_seller')->user()->id === $tv->seller_id): ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($tv->id); ?></td>
                                        <td class="text-center"><?php echo e($tv->name_r); ?></td>
                                        <td class="text-center ">
                                            
                                            
                                            
                                            
                                            
                                            <a href="<?php echo e(route('tvs.destroy',$tv->id)); ?>"
                                               onclick="return confirm('¿ Desea eliminar el Canal  <?php echo e($tv->name_r); ?>?')"
                                               class="btn btn-danger active ">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </a>
                                            &nbsp;
                                            <a href="<?php echo e(route('tvs.edit', $tv->id)); ?>" class="btn btn-warning active">
                                                <span class="glyphicon glyphicon-wrench"></span>
                                            </a>
                                            &nbsp;
                                            <a href="<?php echo e(route('tvs.show', $tv->id)); ?>" class="btn btn-info active">
                                                <span class="fa fa-play-circle" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="active text-center "> Codigo </th>
                                <th class="active text-center "> Nombre </th>
                                <th class="active text-center "> Accion </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>

        <div class="col-md-offset-10">
            <a href="<?php echo e(route('tvs.create')); ?>" class="btn btn-info">
                <span class="glyphicon glyphicon-plus-sign">
                    <b>
                        <i> tv </i>
                    </b>
                </span>
            </a>
        </div>

        <div class="text-center">
            <?php echo $tvs->render(); ?>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

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