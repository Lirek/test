<?php $__env->startSection('css'); ?>
<style>
    .gly-spin {
        -webkit-animation: spin 0.8s infinite linear;
        -moz-animation: spin 0.8s infinite linear;
        -o-animation: spin 0.8s infinite linear;
        animation: spin 0.8s infinite linear;
    }
    .btn-swal-center {
        /*
        width: 5em;
        background-color: red;
        display: flex;
        justify-content: center;
        position:absolute;
        width:100%; left:0;
        text-align:center;
        margin-left: auto;
        margin-right: auto;
        display: block;
        */
        margin-right: 13em;
        /*margin-left: 30em;*/
    }
    @media  only screen and (max-width: 425px) {
        .btn-swal-center {
            margin-right: 10.5em;
        }
    }
    @media  only screen and (max-width: 375px) {
        .btn-swal-center {
            margin-right: 9em;
        }
    }
    @media  only screen and (max-width: 320px) {
        .btn-swal-center {
            margin-right: 7em;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?> 

<div class="row" style="margin-bottom: -20%">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="white-header"><br>
                                <h2>
                                    <span class="card-title">
                                        <center><i class="fa fa-ticket"></i> Compra de tickets</center>
                                    </span>
                                </h2>
                                <br>
                            </div>

                    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="white-panel">
                                    <div class="white-header" style="padding: 45px">
                                        <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1><?php echo e($ticket->name); ?></h1></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-xs-10 col-md-10">
                                            <h4 style="margin-left: 20%; color: #000;">
                                                <b>Costo:</b> $<?php echo e($ticket->cost); ?> <br> (Incluido IVA)
                                            </h4>
                                            <br>
                                            <div class="paragraph">
                                                <p class="center" id="mensaje"></p>
                                                <?php if(Auth::user()->name!=NULL && Auth::user()->last_name!=NULL && Auth::user()->email!=NULL && Auth::user()->num_doc!=NULL && Auth::user()->fech_nac!=NULL): ?>
                                                    <?php if(Auth::user()->verify==0): ?>
                                                        <a href="#" class="buttonCenter btn btn-info" id="esperarAprobacion-<?php echo e($ticket->id); ?>" onclick="esperarAprobacion()">
                                                            <h5><i class="fa fa-ticket"></i> Comprar</h5>
                                                        </a>
                                                    <?php else: ?>
                                                        <a href="#" class="buttonCenter btn btn-info" role="button" data-toggle="modal" data-target="#myModal-<?php echo e($ticket->id); ?>" onclick="total(<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>,<?php echo $ticket->points_cost; ?>)">
                                                            <h5><i class="fa fa-ticket"></i> Comprar</h5>
                                                        </a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="#" class="buttonCenter btn btn-info" id="completar-<?php echo e($ticket->id); ?>" onclick="completar()">
                                                        <h5><i class="fa fa-ticket"></i> Comprar</h5>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                    <!--MODAL-->
                            <div id="myModal-<?php echo e($ticket->id); ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center"><i class="fa fa-ticket"></i> <?php echo e($ticket->name); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="<?php echo e(url('BuyPlan')); ?>" enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <img src="<?php echo e(asset('assets/img/tickets.png')); ?>" class="img-responsive center-block">
                                                </div>
                                                <div class="form-group<?php echo e($errors->has('codigo') ? ' has-error' : ''); ?>">
                                                    <label for="codigo" class="col-md-4 col-sm-4 col-xs-12 control-label" style="margin-left:25% "><h5><b>Cantidad de paquetes:</b></h5>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top: 1%">
                                                        <input type="number" min="1" max="20" value="1" class="form-control input-sm" name="Cantidad" id="Cantidad-<?php echo e($ticket->id); ?>" value="<?php echo e(old('Cantidad')); ?>" onkeypress="return controltagNum(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%">
                                                    <input type="hidden" name="cost" id="cost" value="<?php echo e($ticket->cost); ?>">
                                                    <input type="hidden" name="points" id="points" value="<?php echo e($ticket->points_cost); ?>">
                                                    <h5 align="center"><b>Costo: </b><?php echo e($ticket->cost); ?>$</h5>
                                                    <div id="cantidadTickets-<?php echo e($ticket->id); ?>"></div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" id="total-<?php echo e($ticket->id); ?>"></div>
                                                <h5 align="center"><b>Método de pago</b></h5>
                                                <div class="radio" align="center">
                                                    <input type="hidden" name="id" id="id" value="<?php echo e($ticket->id); ?>">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h4>
                                                                <input type="radio" name="pago" id="pago-<?php echo e($ticket->id); ?>" value="Deposito" required onclick="tipo(<?php echo $ticket->id; ?>)">
                                                                <i class="fa fa-money"> Depósito </i>
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>
                                                                <input type="radio" name="pago" id="pago-<?php echo e($ticket->id); ?>" value="payphone" required onclick="tipo(<?php echo $ticket->id; ?>)">
                                                                <i class="fa fa-money"> PayPhone </i>
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h4>
                                                                <input type="radio" name="pago" id="pago-<?php echo e($ticket->id); ?>" value="puntos" required onclick="tipo(<?php echo $ticket->id; ?>)">
                                                                <i class="fa fa-money"> Puntos </i>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="display:none;" id="puntos-<?php echo e($ticket->id); ?>" align="center">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><h5><b>Sus puntos: </b>
                                                            <?php if(Auth::user()->points): ?>
                                                                <?php echo e(Auth::user()->points); ?>

                                                            <?php else: ?>
                                                                 0
                                                            <?php endif; ?>
                                                            </h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="control-label"><h5><b>Costo por paquete: </b> <?php echo e($ticket->points_cost); ?> puntos</h5>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12" id="totalP-<?php echo e($ticket->id); ?>"></div>
                                                </div>
                                                <div class="col-md-12" style="display:none;" id="deposito-<?php echo e($ticket->id); ?>" align="center">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><b>Número de depósito:</b>
                                                            <input type="text" name="references" id="references-<?php echo e($ticket->id); ?>" class="form-control col-md-12" value="<?php echo e(old('references')); ?>" placeholder="Ingrese el número de depósito" size="28" onkeypress="return controltagNum(event)">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="control-label"><b>Recibo:</b>
                                                            <input id="voucher-<?php echo e($ticket->id); ?>" type="file" accept=".jpg" class="form-control" name="voucher" value="<?php echo e(old('voucher')); ?>" >
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="payphone" id="payphone-<?php echo e($ticket->id); ?>" style="display:none;">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="codCountry-<?php echo e($ticket->id); ?>"></span>
                                                            <select name="pais" id="pais-<?php echo e($ticket->id); ?>" class="form-control pais">
                                                            </select>
                                                        </div>
                                                        <input type="number" id="numero-<?php echo e($ticket->id); ?>" min="1" name="numero" class="form-control" placeholder="Número de teléfono" onkeypress="return controltagNumForm(event,<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>)">
                                                    </div>
                                                    <div id="mensajeValidacion-<?php echo e($ticket->id); ?>" class="col-md-12" align="center" style="margin-top: 2%; color: red;">
                                                    </div>
                                                    <div id="mensajePayPhone-<?php echo e($ticket->id); ?>" class="col-md-12" align="center" style="margin-top: 2%">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <a class="btn btn-default" id="ingresarPayPhone-<?php echo e($ticket->id); ?>" onclick="comprar(<?php echo $ticket->id; ?>,<?php echo $ticket->cost; ?>,<?php echo $ticket->amount; ?>)">Comprar</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <button type="submit" class="btn btn-default" id="ingresar-<?php echo e($ticket->id); ?>">Comprar</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: -5%">
                                                        <a class="btn btn-default" id="ingresarPunto-<?php echo e($ticket->id); ?>" onclick="callback(<?php echo $ticket->id; ?>)">Comprar</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--FIN DEL MODAL-->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
<script type="text/javascript" id="jsbin-javascript">
    /*
    // para bloquear el click izquierdo
    function izquierda(e) {
        if (navigator.appName == 'Netscape' && (e.which == 1 || e.which == 2)) {
            alert('Botón izquierdo inhabilitado');
            return false;
        } else if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 1)){
            alert('Botón izquierdo inhabilitado');
            return false;
        }
    }
    document.onmousedown=izquierda
    */
    $(document).ready(function(){

        var ruta = "https://pay.payphonetodoesposible.com/api/Regions";
        var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
        var headers    = "Bearer "+TOKEN;

        $.ajax({
            url     : ruta,
            headers : {
                'Authorization' : headers
            },
            type    : "GET",
            dataType: "json",
            success : function (data) {
                var optionDefault = "<option value=''>Seleccione un país...</option>";
                var select = $(".pais");
                select.append(optionDefault);
                $.each(data,function(i) {
                    var options = "<option value='"+data[i].prefixNumber+"'>"+data[i].name+"</option>";
                    select.append(options);
                    select.val("593");
                });
            }
        });
    });

    function callback(id) {
        var gif = "<?php echo e(asset('/sistem_images/Loading.gif')); ?>";
        swal({
            title: "Procesando",
            text: "Estamos procesando su pago, por favor espere un momento.",
            icon: gif,
            buttons: false,
            closeOnEsc: false,
            closeOnClickOutside: false,
            onOpen: () => {
                swal.showLoading()
            }
        });
        var costo = $('#cost').val();
        var puntos = $('#points').val();
        var tickets = id;
        var cant = $('#Cantidad-'+id).val();
        console.log(puntos);
        var ruta = "<?php echo e(url('/BuyPuntos/')); ?>";
        $.ajax({
            url: ruta,
            type: "post",
            data: {
                _token: $('input[name=_token]').val(),
                cost: costo,
                points: puntos,
                ticket_id: tickets,
                Cantidad: cant
            },
            success: function (result) {
                console.log(result);
                if (result==1) {
                    swal({
                        title: "Puntos insuficientes",
                        text: "Sus puntos no son suficientes para realizar esta compra, le invitamos a cambiar la cantidad de paquetes o a elegir otra forma de pago.",
                        icon: "warning",
                        buttons: {
                            accept: {
                                text: "OK",
                                value: true,
                                className: "btn-swal-center"
                            }
                        },
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                } else {
                    var idUser=<?php echo Auth::user()->id; ?>;
                    $.ajax({
                        url     : 'MyTickets/'+idUser,
                        type    : 'GET',
                        dataType: "json",
                        success: function (respuesta){
                            console.log(respuesta);
                            swal({
                                title: "¡Pago exitoso!",
                                icon: "success",
                                buttons: {
                                    accept: {
                                        text: "OK",
                                        value: true,
                                        className: "btn-swal-center"
                                    }
                                },
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            })
                            .then((ok) => {
                                location.reload();
                            });
                        },
                    });
                }
            }
        });
    }


    function total(id,costo,cant,points){

        $("#ingresarPayPhone-"+id).hide();
        $("#ingresarPunto-"+id).hide();

        var documento = $('#Cantidad-'+id).val();
        var total=parseFloat(costo*documento);
        var  ticket=parseFloat(cant*documento);
        var totalP=parseFloat(documento*points);
        var Mypoints = <?php echo Auth::user()->points; ?>


        $("#Cantidad-"+id).change(function(){
            documento=parseFloat($('#Cantidad').val());
            total=parseFloat(costo*documento);
        });

        $("#Cantidad-"+id).keyup(function(){
            documento=parseFloat($('#Cantidad-'+id).val());
            total=parseFloat(costo*documento);
            if (isNaN(total)) {
                total = 0;
            }
            ticket=parseFloat(cant*documento);
            if (isNaN(ticket)) {
                ticket = 0;
            }
            totalP=parseFloat(documento*points)
            if (isNaN(totalP)) {
                totalP = 0;
            }
            $('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
            $('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
            $('#totalP-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
            if(totalP > Mypoints){
                $('#ingresarPunto-'+id).attr('disabled',true);
            }else{
                $('#ingresarPunto-'+id).attr('disabled',false);
            }
        });

        $(':input[type="number"]').click(function (){
            documento=parseFloat($('#Cantidad-'+id).val());
            total=parseFloat(costo*documento);
            if (isNaN(total)) {
                total = 0;
            }
            ticket=parseFloat(cant*documento);
            if (isNaN(ticket)) {
                ticket = 0;
            }
            $('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
            $('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
            $('#totalP-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
            if(totalP > Mypoints){
                $('#ingresarPunto-'+id).attr('disabled',true);
            }else{
                $('#ingresarPunto-'+id).attr('disabled',false);
            }
        });

        $('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
        $('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
        $('#totalP-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +totalP+ ' puntos</h5>');
        if(totalP > Mypoints){
            $('#ingresarPunto-'+id).attr('disabled',true);
        }else{
            $('#ingresarPunto-'+id).attr('disabled',false);
        }
    }

    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }

    function controltagNumForm(e,id,cost,cantidadTickets) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==13) {
            comprar(id,cost,cantidadTickets);
            return false;
        }
        patron =/[0-9]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }

    function tipo(id){

        var valor = $("input:radio[id=pago-"+id+"]:checked").val();
        if(valor == 'Deposito'){
            $("#ingresar-"+id).show();
            $("#ingresarPayPhone-"+id).hide();
            $("#ingresarPunto-"+id).hide();
            $("#deposito-"+id).show();
            $("#payphone-"+id).hide();
            $('#voucher-'+id).attr('required','required');
            $('#references-'+id).attr('required','required');
            $('#references-'+id).focus();
            $('#pais-'+id).removeAttr('required');
            $('#numero-'+id).removeAttr('required');
        }else if(valor == 'puntos'){
            $("#ingresarPunto-"+id).show();
            $("#ingresar-"+id).hide();
            $("#payphone-"+id).hide();
            $("#ingresarPayPhone-"+id).hide();
            $('#pais-'+id).removeAttr('required');
            $('#numero-'+id).removeAttr('required');
            $("#deposito-"+id).hide();
            $('#voucher-'+id).removeAttr('required','required');
            $('#references-'+id).removeAttr('required','required');
            $("#puntos-"+id).show();
        }else{
            $("#ingresarPayPhone-"+id).show();
            $("#ingresarPunto-"+id).hide();
            $("#ingresar-"+id).hide();
            $("#payphone-"+id).show();
            $("#deposito-"+id).hide();
            $('#voucher-'+id).removeAttr('required','required');
            $('#references-'+id).removeAttr('required','required');
            $('#pais-'+id).attr('required','required');
            $('#numero-'+id).focus();
            $('#numero-'+id).attr('required','required');
            $('#codCountry-'+id).text("+593");
            $('#pais-'+id).on('change',function(){
                $('#pais-'+id).each(function(){
                    if (this.value=="") {
                        $('#codCountry-'+id).text("---");
                    } else {
                        var v = "+"+this.value;
                        $('#codCountry-'+id).text(v);
                    }
                });
            });
        }
    }

    function completar() {
        swal({
            title: "Complete su información personal por favor",
            text: "Antes de realizar cualquier pago debe completar su información personal",
            icon: "warning",
            buttons: {
                accept: {
                    text: "OK",
                    value: true,
                    className: "btn-swal-center"
                }
            }
        })
        .then((completar) => {
            var ruta = "<?php echo e(url('EditProfile')); ?>";
            $(location).attr('href',ruta);
        });
    }
    function esperarAprobacion() {
        swal({
            title: "Verificando su información",
            text: "Disculpe pero en estos momentos nos encontramos verificando su información, en breves momentos terminaremos con la verificación.",
            icon: "warning",
            buttons: {
                accept: {
                    text: "OK",
                    value: true,
                    className: "btn-swal-center"
                }
            }
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script id="jsbin-javascript">

    function bdd(id,cost,callback){
        var value = $('#Cantidad-'+id).val();
        var parametros = "/"+id+"/"+cost+"/"+value;
        var ruta = "<?php echo e(url('/BuyPayphone/')); ?>"+parametros;
        var id = 0;

        $.ajax({
            url     : ruta,
            type    : "GET",
            dataType: "json",
            success: function (data) {
                var id = data;
                callback(id);
            }
        });
        return id;
    }

    function transactionCanceled(reference,id,callback) {
        var parametros = "/"+id+"/"+reference;
        var ruta = "<?php echo e(url('/TransactionCanceled/')); ?>"+parametros;
        var cancelar = true;

        $.ajax({
            url     : ruta,
            type    : "GET",
            dataType: "json",
            success : function (data) {
                var cancelar = data;
                callback(cancelar);
            }
        });
        return cancelar;
    }

    function transactionApproved(id,reference,ticket,idFactura,callback) {
        var parametros = "/"+id+"/"+reference+"/"+ticket+"/"+idFactura;
        var ruta = "<?php echo e(url('/TransactionApproved/')); ?>"+parametros;
        var aprobar = true;

        $.ajax({
            url     : ruta,
            type    : "GET",
            dataType: "json",
            success : function (data) {
                var aprobar = data;
                callback(aprobar);
            }
        });
        return aprobar;
    }
    /*
    function transactionPending(reference,id,callback) {
        var parametros = "/"+id+"/"+reference;
        var ruta = "<?php echo e(url('/TransactionPending/')); ?>"+parametros;
        var pendiente = true;

        $.ajax({
            url     : ruta,
            type    : "GET",
            dataType: "json",
            success : function (data) {
                var pendiente = data;
                callback(pendiente);
            }
        });
        return pendiente;
    }
    */

    function getUserPayPhone(numberPhone,countryPrefix) {

        return new Promise(function(resolve, reject) {

            var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
            var headers    = "Bearer "+TOKEN;
            var url = "https://pay.payphonetodoesposible.com/api/Users/"+numberPhone+"/region/"+countryPrefix;

            var req = new XMLHttpRequest();
            req.open('GET', url);
            req.setRequestHeader("Authorization",headers);
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

    function getSalePayPhone(transactionId) {

        return new Promise(function(resolve, reject) {

            var url = "https://pay.payphonetodoesposible.com/api/Sale/"+transactionId;
            var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
            var headers    = "Bearer "+TOKEN;

            var req = new XMLHttpRequest();
            req.open('GET', url);
            req.setRequestHeader("Authorization",headers);
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

    function postSalePayPhone(numberPhone,countryPrefix,total,id) {

        return new Promise(function(resolve, reject) {
            var url = "https://pay.payphonetodoesposible.com/api/Sale";
            var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
            var headers    = "Bearer "+TOKEN;
            var totalInt = (total*100); // Para transformarlo de decimales a enteros
            var data = { phoneNumber: numberPhone, countryCode: countryPrefix, amount: totalInt, amountWithTax: 0, amountWithoutTax: 0, tax: 0, service : totalInt, tip: 0, clientTransactionId: id };
            var datos = JSON.stringify(data);

            var req = new XMLHttpRequest();
            req.open('POST',url,true);
            req.setRequestHeader("Authorization",headers);
            req.setRequestHeader("Content-Type","application/json;charset=UTF-8");
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
            req.send(datos);
        });
    }

    function postReverse(transactionId) {
        return new Promise(function(resolve,reject) {
            var url = "https://pay.payphonetodoesposible.com/api/Reverse";
            var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
            var headers    = "Bearer "+TOKEN;
            var data = { id: transactionId };
            var datos = JSON.stringify(data);

            var req = new XMLHttpRequest();
            req.open('POST',url,true);
            req.setRequestHeader("Authorization",headers);
            req.setRequestHeader("Content-Type","application/json;charset=UTF-8");
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
            req.send(datos);
        });
    }

    function comprobarEstatusPagoPayPhone(id,callback) {
        var msn = "";
        getSalePayPhone(id).then(function(response) {
            var res = JSON.parse(response);
            msn = res;
        }, function(error) {
            msn = error;
        });
        setTimeout(function() {
            callback(msn);
        },1000);
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
        },2000);
    }

    function comprar(id,cost,cantidadTickets) {

        $('#ingresarPayPhone-'+id).attr("disabled", true);
        var numberPhone = $('#numero-'+id).val();
        var countryPrefix = $('#pais-'+id).val();
        var cantidadPaquetes = $('#Cantidad-'+id).val();
        var tickets = parseFloat(cantidadTickets*cantidadPaquetes);

        if (numberPhone=="" || countryPrefix=="") {
            $('#mensajePayPhone-'+id).hide();
            $('#mensajeValidacion-'+id).show();
            $('#mensajeValidacion-'+id).html("<h4> <i class='glyphicon glyphicon-warning-sign'></i> <span>Los datos introducidos son erróneos</span> </h4>");
            $('#ingresarPayPhone-'+id).removeAttr("disabled");
        }
        else {
            $('#mensajeValidacion-'+id).hide();
            $('#mensajePayPhone-'+id).show();
            $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
            
            getUserPayPhone(numberPhone,countryPrefix).then(function(userPayPhone) {
                $('#mensajePayPhone-'+id).hide();
                var clientePayPhone = JSON.parse(userPayPhone);
                if (clientePayPhone.name==undefined) {
                    swal({
                        title: "El usuario no existe en PayPhone",
                        text: "El número telefónico que introdujo no se encuentra registrado en PayPhone, verifique los datos e intentelo de nuevo, por favor.",
                        icon: "warning",
                        buttons: {
                            accept: {
                                text: "OK",
                                value: true,
                                className: "btn-swal-center"
                            }
                        },
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                } else {
                    var nombre = clientePayPhone.name+" "+clientePayPhone.lastName;
                    swal({
                        title: "Confirmación de usuario",
                        text: "El número introducido, corresponde a "+nombre+", ¿es usted?",
                        icon: "warning",
                        buttons: {
                            cancel: "No",
                            accept: {
                                text: "Si, soy yo",
                                value: true
                            }
                        },
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    })
                    .then((confirmacion) => {
                        if(confirmacion) {
                            var total = cantidadPaquetes*cost;
                            swal({
                                title: "Confirmación de pago a "+nombre,
                                text: "Se le aplicará el cobro por la compra de "+cantidadPaquetes+" paquete(s) de "+cost+"$ cada uno, para un total de "+total+"$.",
                                icon: "warning",
                                buttons: {
                                    cancel: "Cancelar",
                                    accept: {
                                        text: "Aceptar",
                                        value: true
                                    }
                                },
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            })
                            .then((pagar) => {
                                $('#ingresarPayPhone-'+id).attr("disabled", true);
                                $('#mensajePayPhone-'+id).show();
                                $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
                                console.log("id: "+id+" cost: "+cost);
                                bdd(id,cost,function(idTicketSales) {
                                    console.log("idTicketSales: "+idTicketSales);
                                    postSalePayPhone(numberPhone,countryPrefix,total,idTicketSales).then(function(response) {
                                        var gif = "<?php echo e(asset('/sistem_images/Loading.gif')); ?>";
                                        swal({
                                            title: "¡Listo! Estamos esperando su confirmación...",
                                            text: "Verifique su teléfono y seleccione una opción.",
                                            icon: gif,
                                            buttons: false,
                                            closeOnEsc: false,
                                            closeOnClickOutside: false
                                        });
                                        var intento = 0;
                                        var maxIntento = 90; // 1min y 1/2 de espera
                                        var transaction = JSON.parse(response);
                                        console.log(transaction);
                                        console.log(transaction.transactionId);
                                        comprobarEstatusPagoPayPhone(transaction.transactionId,function callback(transactionInfo) {
                                            $('#mensajePayPhone-'+id).show();
                                            $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
                                            if (intento <= maxIntento) {
                                                console.log(transactionInfo);
                                                if (transactionInfo!=" ") {
                                                    console.log(transactionInfo);
                                                    var status = transactionInfo.transactionStatus;
                                                    console.log(status);
                                                    if (status=="Pending") {
                                                        console.log("intento "+intento+": "+status);
                                                        comprobarEstatusPagoPayPhone(transaction.transactionId,callback);
                                                        intento++;
                                                    }
                                                    else if (status=="Approved") {
                                                        swal({
                                                            title: "¡Ya casi terminamos!",
                                                            text: "Estamos procesando su información...",
                                                            icon: gif,
                                                            buttons: false,
                                                            closeOnEsc: false,
                                                            closeOnClickOutside: false
                                                        });
                                                        console.log("intento "+intento+": "+status);
                                                        console.log(transaction.transactionId);
                                                        var medio = "dinero_electronico_ec";
                                                        getDatilAgain(idTicketSales,medio,function callback(infoFactura) {
                                                            console.log(infoFactura);
                                                            var idFactura = infoFactura.id;
                                                            console.log(idFactura);
                                                            if (idFactura!=undefined) {
                                                                var idTicket = idTicketSales.split("|")[0];
                                                                console.log(idTicket);
                                                                transactionApproved(idTicket,transaction.transactionId,tickets,idFactura,function(aprobar) {
                                                                    console.log("todo bien? "+aprobar);
                                                                    swal({
                                                                        title: "¡Pago exitoso!",
                                                                        text: "No. de Transacción: #"+transaction.transactionId+". Disfrutalos con todo el entretenimiento que te ofrece LEIPEL",
                                                                        icon: "success",
                                                                        buttons: {
                                                                            accept: {
                                                                                text: "OK",
                                                                                value: true,
                                                                                className: "btn-swal-center"
                                                                            }
                                                                        },
                                                                        closeOnEsc: false,
                                                                        closeOnClickOutside: false
                                                                    })
                                                                    .then((recarga) => {
                                                                        location.reload();
                                                                    });
                                                                });
                                                            } else {
                                                                getDatilAgain(idTicketSales,medio,callback);
                                                            }
                                                        });
                                                    }
                                                    else if (status=="Canceled") {
                                                        swal({
                                                            title: "¡Ya casi terminamos!",
                                                            text: "Estamos procesando su información...",
                                                            icon: gif,
                                                            buttons: false,
                                                            closeOnEsc: false,
                                                            closeOnClickOutside: false
                                                        });
                                                        console.log("intento "+intento+": "+status);
                                                        console.log(transaction.transactionId);
                                                        transactionCanceled(transaction.transactionId,idTicketSales,function(cancelar) {
                                                            swal({
                                                                title: "¡Pago cancelado!",
                                                                text: "Su pago fue cancelado.",
                                                                icon: "error",
                                                                buttons: {
                                                                    accept: {
                                                                        text: "OK",
                                                                        value: true,
                                                                        className: "btn-swal-center"
                                                                    }
                                                                },
                                                                closeOnEsc: false,
                                                                closeOnClickOutside: false
                                                            })
                                                            .then((recarga) => {
                                                                location.reload();
                                                            });
                                                        });
                                                    }
                                                    else if (status==undefined) {
                                                        console.log("intento desde == undefined "+intento+": "+status);
                                                        comprobarEstatusPagoPayPhone(transaction.transactionId,callback);
                                                        intento++;
                                                    }
                                                }
                                            } else {
                                                console.log("intento "+intento+" expiró el tiempo");
                                                console.log(transaction.transactionId);
                                                postReverse(transaction.transactionId).then(function(response) {
                                                    transactionCanceled(transaction.transactionId,idTicketSales,function(pendiente) {
                                                        swal({
                                                            title: "¡Ha expirado el tiempo de espera!",
                                                            text: "No se pudo procesar el pago por exceder el límite del tiempo permitido.",
                                                            icon: "warning",
                                                            buttons: false
                                                        })
                                                        .then((recarga) => {
                                                            location.reload();
                                                        });
                                                    });
                                                });
                                            }
                                        }, function(error) {
                                            swal({
                                                title: "¡Error de conexión!",
                                                text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
                                                icon: "error",
                                                buttons: {
                                                    accept: {
                                                        text: "OK",
                                                        value: true,
                                                        className: "btn-swal-center"
                                                    }
                                                },
                                                closeOnEsc: false,
                                                closeOnClickOutside: false
                                            });
                                            $('#mensajePayPhone-'+id).hide();
                                        });
                                    }, function(error) {
                                        swal({
                                            title: "¡Error de conexión!",
                                            text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
                                            icon: "error",
                                            buttons: {
                                                accept: {
                                                    text: "OK",
                                                    value: true,
                                                    className: "btn-swal-center"
                                                }
                                            },
                                            closeOnEsc: false,
                                            closeOnClickOutside: false
                                        });
                                        $('#mensajePayPhone-'+id).hide();
                                    });
                                });
                            });
                        }  else {
                            swal({
                                title: "Tranquilo no pasó nada",
                                text: "Verifique el número e intentelo de nuevo, por favor",
                                icon: "warning",
                                buttons: {
                                    accept: {
                                        text: "OK",
                                        value: true,
                                        className: "btn-swal-center"
                                    }
                                },
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            });
                        }
                    });
                    $('#ingresarPayPhone-'+id).removeAttr("disabled");
                }
            }, function(error) {
                swal({
                    title: "¡Error de conexión!",
                    text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
                    icon: "error",
                    buttons: {
                        accept: {
                            text: "OK",
                            value: true,
                            className: "btn-swal-center"
                        }
                    },
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                $('#mensajePayPhone-'+id).hide();
            });
        }
        return false;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>