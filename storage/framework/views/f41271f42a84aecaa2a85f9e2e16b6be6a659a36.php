<?php $__env->startSection('css'); ?>
    <style>
        .default_color{background-color: #FFFFFF !important;}
        .img{margin-top: 7px;}
        .curva{border-radius: 10px;}
        .curvaBoton{border-radius: 20px;}
        /*Color letras tabs*/
        .tabs .tab a{
            color:#00ACC1;
        }
        /*Indicador del tabs*/
        .tabs .indicator {
            display: none;
        }
        .tabs .tab a.active {
            border-bottom: 2px solid #29B6F6;
        }
        /* label focus color */
        .input-field input:focus + label {
            color: #29B6F6 !important;
        }
        /* label underline focus color */
        .row .input-field input:focus {
            border-bottom: 1px solid #29B6F6 !important;
            box-shadow: 0 1px 0 0 #29B6F6 !important
        }
        .card{
            height:480px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col s12">
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> Radios registradas</h4>
                <div class="row">
                    <?php if($radio->count() != 0 ): ?>
                        <?php $__currentLoopData = $radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Auth::guard('web_seller')->user()->id === $r->seller_id): ?>
                                <div class="col s12 m4 l3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="<?php echo e(route('radios.show', $r->id)); ?>">
                                                <img src="<?php echo e(asset($r->logo)); ?>" width="100%" height="300px">
                                            </a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(route('radios.edit', $r->id)); ?>">
                                                <i class="material-icons">create</i>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="col m12">
                                                <h6><?php echo e($r->name_r); ?></h6>
                                            </div>

                                            <?php if($r->web!=null): ?>
                                                <a href="<?php echo e($r->web); ?>" target="_blank" class="btn-floating grey"><i class="mdi mdi-earth"></i></a>
                                            <?php endif; ?>
                                            <?php if($r->facebook!=null): ?>
                                            <a href="<?php echo e($r->facebook); ?>" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                                            <?php endif; ?>
                                                <?php if($r->google!=null): ?>
                                                <a  href="<?php echo e($r->google); ?>" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                                            <?php endif; ?>
                                                <?php if($r->twitter!=null): ?>
                                                    <a href="<?php echo e($r->twitter); ?>" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                                            <?php endif; ?>
                                            <?php if($r->instagram!=null): ?>
                                            <a href="<?php echo e($r->instagram); ?>" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
                                            <?php endif; ?>

                                            <div class="col m12">
                                                <small><b>Estatus:</b> <?php echo e($r->status); ?></small>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s12">
                            <?php echo e($radio->links()); ?>

                        </div>
                    <?php else: ?>
                        <div class="col m12">
                            <blockquote>
                                <i class="material-icons fixed-width large grey-text">radio</i><br><h5>No posee radios registradas</h5>
                            </blockquote>
                            <br>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(route('radios.create')); ?>" class="btn curvaBoton waves-effect waves-light green">   
                    <span>Agregar más radios</span>
                </a>       
            </div>
        </div>
    </div>
    


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
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>