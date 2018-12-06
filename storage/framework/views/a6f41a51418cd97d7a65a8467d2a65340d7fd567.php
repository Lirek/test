<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>


                    <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
                        <ul class="tabs">
                            <li class="tab col s4"><a  href="#test1" class="active"><i class="material-icons" style="vertical-align: middle;">timeline</i>&nbsp;<b>Mi Balance</b></a></li>
                            <li class="tab col s4"><a  href="#test2"><i class="material-icons" style="vertical-align: middle;">add_circle_outline</i>&nbsp;<b>Detalles</b></a></li>
                        </ul>
                    </div>

                    <div id="test1" class="col s12 m12 l12">
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <br><br>
                                    <canvas id="myChart" height="300" width="400"></canvas>
                                </div>
                                <div class="col col s12 m6 l6">
                                    <br>
                                    <ul class="collapsible popout">
                                        <li>
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd;"><h6 class="grey-text">Total de puntos:</h6></div>
                                        <?php if(Auth::user()->points): ?>
                                            <div class="collapsible-body"> <a class="btn-floating btn-large blue lighten-2 "> <b><?php echo e(Auth::user()->points); ?></b></a><br><br></div>
                                        <?php else: ?>
                                            <div class="collapsible-body"> <a class="btn-floating btn-large blue lighten-2 "> <b>0</b></a><br><br></div>
                                        <?php endif; ?>
                                        </li>
                                        <li class="active">
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Total de tickets:</h6></div>
                                            <div class="collapsible-body"><a class="btn-floating btn-large amber lighten-2"><b><?php echo e(Auth::user()->credito); ?></b></a><br><br></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Total de puntos pendientes:</h6></div>
                                            <?php if(Auth::user()->pending_points): ?>
                                                <div class="collapsible-body">  <a class="btn-floating btn-large  deep-orange lighten-2"> <b> <?php echo e(Auth::user()->pending_points); ?></b></a><br><br></div>
                                            <?php else: ?>
                                                <div class="collapsible-body">  <a class="btn-floating btn-large  deep-orange lighten-2"> <b>0</b></a><br><br></div>
                                            <?php endif; ?>
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
                                <th><i class="material-icons"></i>Concepto</th>
                                <th><i class="material-icons"></i>Metodo</th>
                                <th><i class="material-icons"></i></i>Factura</th>
                                <th><i class="material-icons">add_circle</i></th>
                                <th><i class="material-icons">do_not_disturb_on</i></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php $__currentLoopData = $Balance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($balance != 0): ?>
                                    <tr>
                                        <td><?php echo e($balance['Date']); ?></td>
                                        <td><?php echo e($balance['Transaction']); ?></td>
                                        <td><?php echo e($balance['Method']); ?></td>
                                        <?php if($balance['Method'] != 'Puntos'): ?>
                                            <td>
                                                    <?php if($balance['Factura']!=NULL): ?>
                                                        <a href="https://app.datil.co/ver/<?php echo e($balance['Factura']); ?>/ride" target="_blank" class="btn-floating btn-small waves-effect waves-light green"><i class="material-icons">print</i></a>
                                                    <?php else: ?>
                                                        <a class="btn-floating btn-large waves-effect waves-light  green" onclick="generarFactura(<?php echo $balance['id_payments']; ?>)"><i class="material-icons">print</i></a>
                                                    <?php endif; ?>
                                            </td>
                                        <?php else: ?>
                                            <td>No Aplica</td>
                                        <?php endif; ?>


                                 <?php if($balance['Type']==1): ?>
                                            <td><?php echo e($balance['Cant']); ?></td>
                                            <td></td>
                                        <?php else: ?>
                                            <td><?php echo e($balance['Cant']); ?></td>
                                            <td></td>
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


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

    <script>

        $(document).ready(function(){

                // grafica de disponibilidad
                $.ajax({
                    url:"<?php echo e(url('BalanceUserGraph')); ?>",
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
                                ],
                                borderColor: [
                                    '#fff'
                                ],
                                borderWidth: 5
                            }],
                            labels:
                                ["Puntos", "Puntos Pendientes"],
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
                // grafica de doughnut disponibilidad user



            });

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
    <script id="jsbin-javascript">

        function generarFactura(id_payments) {
            console.log(id_payments);
            var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
            swal({
                title: "¡Generando factura!",
                text: "Estamos generando su factura...",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
            var intento = 0;
            var maxIntento = 5; // 30seg de espera // 10
            var medio = "deposito_cuenta_bancaria";
            getDatilAgain(id_payments,medio,function callback(infoFactura) {
                console.log(infoFactura);
                var idFactura = infoFactura.id;
                console.log(idFactura);
                if (intento <= maxIntento) {
                    if (idFactura!=undefined) {
                        var parametros = "/"+idFactura+"/"+id_payments;
                        var ruta = "<?php echo e(url('/generarFactura/')); ?>"+parametros;
                        $.ajax({
                            url     : ruta,
                            type    : "GET",
                            dataType: "json",
                            success: function (data) {
                                var respuesta = data;
                                console.log("lista la factura? "+respuesta);
                            }
                        });
                        swal({
                            title: "¡Factura Generada!",
                            text: "Ya podrá ver la factura de su pago",
                            icon: "success",
                            closeOnEsc: false,
                            closeOnClickOutside: false
                        })
                            .then((recarga) => {
                                location.reload();
                            });
                        intento++;
                    } else {
                        console.log('intento: '+intento);
                        getDatilAgain(id_payments,medio,callback);
                    }
                } else {
                    swal({
                        title: "¡Ups!",
                        text: "En estos momentos no podemos generar su factura, intente más tarde",
                        icon: "info",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    })
                        .then((recarga) => {
                            location.reload();
                        });
                }
            });
        }

        function getDatil(idTicketSales,medio) {
            return new Promise(function(resolve,reject) {
                var parametros = "/"+idTicketSales+"/"+medio;
                var url = "<?php echo e(url('/factura/')); ?>"+parametros;

                var req = new XMLHttpRequest();
                req.open("GET",url);
                req.onload = function() {
                    if (req.status == 200) {
                        resolve(req.response);
                    }
                    else {
                        resolve(req.response);
                    }
                };
                req.onerror = function() {
                    reject(Error("Network Error"));
                };
                req.send();
            });
        }

        function getDatilAgain(idTicketSales,medio,callback) {
            var msn = "";
            getDatil(idTicketSales,medio).then(function(response) {
                var res = JSON.parse(response);
                msn = res;
            }, function(error) {
                msn = error;
            });
            setTimeout(function() {
                callback(msn);
            },6000);
        }
    </script>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>