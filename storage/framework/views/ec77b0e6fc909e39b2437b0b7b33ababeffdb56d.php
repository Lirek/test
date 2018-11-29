<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
            <ul class="tabs">
                <li class="tab col s4"><a  href="#test1"><i class="material-icons" style="vertical-align: middle;">timeline</i>&nbsp;<b>Mi Balance</b></a></li>
                <li  class="tab col s4"><a href="#test2"><i class="material-icons" style="vertical-align: middle;">add_circle_outline</i>&nbsp;<b>Detalles</b></a></li>
            </ul>
        </div>

        <div id="test1" class="col s12 m12 l12">
            <br>
            <div class="row">

                <div class="col s12 m6 l6">
                    <br><br>
                    <canvas id="myChart" height="300" width="400"></canvas>
                </div>

                <div class="col col s12 m6 l6">
                    <br>
                    <ul class="collapsible popout">
                        <li class="active">
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Disponible</h6></div>
                            <div class="collapsible-body"><a class="btn-floating btn-large  blue lighten-2"><b><?php echo e(Auth::guard('web_seller')->user()->credito); ?></b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Diferidos</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  amber lighten-2"> <b><?php echo e($diferido); ?></b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd;"><h6 class="grey-text">Tickets Pendientes</h6></div>
                            <div class="collapsible-body"> <a class="btn-floating btn-large deep-orange lighten-2 "> <b><?php echo e(Auth::guard('web_seller')->user()->credito_pendiente); ?></b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Pagados</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  green  lighten-2"> <b><?php echo e($pagado); ?></b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Rechazados</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  red lighten-2"> <b><?php echo e($rechazado); ?></b></a><br><br></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="test2" class="col s12">
            <br>
            <table class="responsive-table">
                <thead>
                <tr>
                    <th><i class="material-icons ">date_range</i> Fecha</th>
                    <th> Concepto</th>
                    <th> Tipo</th>
                    <th> Estatus</th>
                    <th> <i class="material-icons ">add_circle</i></th>
                    <th><i class="material-icons ">do_not_disturb_on</i></th>
                </tr>
                </thead>

                <tbody>
                <?php $__currentLoopData = $Balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($balance != 0): ?>
                        <tr>
                            <td><?php echo e($balance['Date']); ?></td>
                            <?php if($balance['Type']==1): ?>
                                <td>Compra de <?php echo e($balance['Transaction']); ?> por <?php echo e($balance['User']); ?></td>
                                <td><?php echo e($balance['Content']); ?></td>
                                <td>No aplica</td>
                            <?php else: ?>
                                <td>Solicitud de retiro de fondos</td>
                                <td><?php echo e($balance['Transaction']); ?></td>
                                <td><?php echo e($balance['Content']); ?></td>
                            <?php endif; ?>
                            <?php if($balance['Type']==1): ?>
                                <td><?php echo e($balance['Cant']); ?></td>
                                <td></td>
                            <?php else: ?>
                                <td></td>
                                <td><?php echo e($balance['Cant']); ?></td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <br>
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active blue"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>

        </div>

    </div>




<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>

    $(document).ready(function(){

        // grafica de disponibilidad
        $.ajax({
            url:"<?php echo e(url('BalanceSellerGraph')); ?>",
            type:'GET',
            success:function(info) {
                console.log(info);
                var ctx = $("#myChart");
                var data = {
                    datasets: [{
                        data: info,
                        backgroundColor: [

                            '#64B5F6',
                            '#ff8a65',
                            '#ffd54f'
                        ],
                        borderColor: [
                            '#fff'
                        ],
                        borderWidth: 5
                    }],
                    labels:
                   ["Disponibles", "Pendientes", "Diferidos"],
                };

                var myPieChart = new Chart(ctx,{
                    type: 'doughnut',
                    data: data,
                    options: {

                        legend: {
                            position: 'bottom'
                        },
                    }
                });
            },
            error:function(info) {
                console.log(info);
            }

        });
        // grafica de doughnut disponibilidad seller



    });
</script>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>