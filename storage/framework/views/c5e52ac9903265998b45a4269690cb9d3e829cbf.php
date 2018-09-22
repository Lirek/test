<?php $__env->startSection('main'); ?>  

<div class="row" style="margin-bottom: -20%">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h2><span class="card-title"><center><i class="fa fa-ticket"></i> Mi Balance</center></span></h2><br>          
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12 goleft table-responsive">
                	<div class="text-center">
                        <div class="col-sm-6">
                            <h4><b>Total de tickets:</b> <?php echo e(Auth::user()->credito); ?></h4>
                        </div>
                        <div class="col-sm-6">
                            <?php if(Auth::user()->points): ?>
                                <h4><b>Total de puntos:</b> <?php echo e(Auth::user()->points); ?></h4>
                            <?php else: ?>
                                <h4><b>Total de puntos:</b> 0 </h4>
                            <?php endif; ?>
                        </div>
                    </div>
                    <table class="table table-striped table-advance table-hover" id="myTable">
                        <thead>
                        	<tr>
	                          	<th><i class="fa fa-calendar" style="color: #23B5E6"></i> Fecha</th>
	                          	<th><i class="fa fa-pencil" style="color: #23B5E6"></i> Concepto</th>
	                          	<th><i class="fa fa-money" style="color: #23B5E6"></i> + </th>
	                          	<th><i class="fa fa-money" style="color: #23B5E6"></i> - </th>
                                <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Metodo</th>
                                <th><i class="fa fa-file-pdf-o" style="color: #23B5E6"></i> Factura</th>
                          	</tr>
                        </thead>
                        <tbody>
                        	<?php $__currentLoopData = $Balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($balance != 0): ?>
                                	<tr class="letters">
        		                        <td><?php echo e($balance['Date']); ?></td>
        	                          	<td><?php echo e($balance['Transaction']); ?></td>
                                        <?php if($balance['Type']==1): ?>
            	                         	<td></td>
            	                          	<td><?php echo e($balance['Cant']); ?></td>
                                            <td></td>
                                        <?php else: ?>
            	                         	<td><?php echo e($balance['Cant']); ?></td>
            	                         	<td></td>
                                            <td><?php echo e($balance['Method']); ?></td>
                                            <?php if($balance['Method'] != 'Puntos'): ?>
                                                <td>
                                                    <a href="https://app.datil.co/ver/<?php echo e($balance['Factura']); ?>/ride" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-external-link"></i> Ver </a>
                                                </td>
                                            <?php else: ?>
                                                <td>No Aplica</td>
                                            <?php endif; ?>
        	                           <?php endif; ?>
                                  	</tr>
                                <?php endif; ?>
                          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">
	            $('#myTable').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ ",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No Existen Conceptos Registrados",
                    "sInfo":           "Mostrando Conceptos del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando Conceptos del 0 al 0 de un total de 0 Singles",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ Singles)",
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
                "processing": true,
                "order": [[ 0, "desc" ]],
            });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>