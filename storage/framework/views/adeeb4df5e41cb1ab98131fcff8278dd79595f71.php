<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<style type="text/css">
            #image-preview {
            width: 300px;
            height: 350px;
            position: relative;
            overflow: hidden;
            padding-top: 10px;
            padding-left: 55px;
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 70%;
            height: 30px;
            font-size: 15px;
            line-height: 50px;
            text-transform: uppercase;
            top: 70;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row" style="margin-bottom: 0%">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="text-center">
                        <div class="col-sm-4">
                            <h4><b>Tickets disponible:</b> <?php echo e(Auth::guard('web_seller')->user()->credito); ?></h4>
                        </div>
                        <div class="col-sm-4">
                            <h4><b>Tickets Pendientes:</b> <?php echo e(Auth::guard('web_seller')->user()->credito_pendiente); ?></h4>
                        </div>
                        <div class="col-sm-4">
                            <h4><b>Tickets Diferidos:</b> <?php echo e($diferido); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="control-label" style="margin-top: 5%">
                    <div class="col-sm-12 col-xs-12 col-md-12">
                        <div class="white-header">
                             <h3><span class="card-title"><center><i class="fa fa-ticket"></i> <u>Solicitar retiro de fondos</u></center></span></h3><br>          
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-6 col-sm-6">
                                
                                <label for="codigo" class="col-md-7 col-sm-7 col-xs-12 control-label" style=" "><h4><b><center>Cantidad de tickets a retirar:</center></b></h4>
                                </label>
                                <div class="col-md-4 col-sm-4 col-xs-12" style=" margin-bottom: 5%">
                                    <input type="number" min="1" max="<?php echo e(Auth::guard('web_seller')->user()->credito); ?>" value="" class="form-control input-xs" name="Cantidad" id="monto" required="required" value="<?php echo e(old('Cantidad')); ?>" onkeypress="return controltagNum(event)">
                                    <div id="mensajeMonto"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <center><button type="submit" class="btn btn-primary" id="solicitar" data-toggle="modal" data-target="#myModalRequest">
                                       Retirar
                                    </button></center>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 5%">
                        <div class="white-header">
                             <h3><span class="card-title"><center><i class="fa fa-check"></i> <u>Mis solicitudes</u></center></span></h3><br>          
                        </div>
                         <div class="col-sm-12 col-xs-12 col-md-12 goleft table-responsive">
                            
                            <table class="table table-striped table-advance table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-calendar" style="color: #23B5E6"></i> Fecha</th>
                                        <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Factura</th>
                                        <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Cantidad</th>
                                        <th><i class="fa fa-money" style="color: #23B5E6"></i> Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Payments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($Payments != null): ?>
                                            <tr class="letters">
                                                <td><?php echo e($Payments->created_at->format('d/m/Y')); ?></td>
                                                
                                                <td><a href="" data-toggle="modal" data-target="#myModal-<?php echo e($Payments->id); ?>"><img src="<?php echo e(asset($Payments->factura)); ?>" class="img-rounded img-responsive av" style="width:70px;height:70px;" alt="User Avatar" id="cover"></a></td>
                                                <td><?php echo e($Payments->tickets); ?></td>
                                                <td><?php echo e($Payments->status); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <!--MODAL Fatura-->
                                        <div id="myModal-<?php echo e($Payments->id); ?>" class="modal fade" role="dialog">                                     
                                             <div class="modal-dialog">
                                            <!-- Modal content-->
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                          <h4 class="modal-title">Factura </h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <center>
                                                          <img src="<?php echo e(asset($Payments->factura)); ?>" class="img-rounded img-responsive av" style="width:100%;height:100%;" alt="User Avatar" id="cover">
                                                        </center>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   <!--MODAL-->
<div id="myModalRequest" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title"><i class="fa fa-ticket"></i> Datos para facturación por cobro de tickets</h4></center>
      </div>
      <div class="modal-body">
            <div class="col-sm-12 col-xs-12 col-md-12" style="">            
                <div class="col-md-12">
                    <center><h5><b>A nombre de:</b> INFORMERET S.A.</h5></center>
                    <center><h5><b>Ruc:</b> 09928971710001</h5></center>
                    <center><h5><b>Teléfono:</b> 0982042816</h5></center>
                    <center><h5><b>Fecha:</b> <?php echo e(date('d/m/Y')); ?></h5></center>
                    <center><h5><b>Dirección:</b> Torres de Mall del Sol, Torre B, Piso 4</h5></center>
                    <div id="tickets"></div>
                    <center><h5><b>Descripción:</b> Canje de tickets por venta de contenidos digitales.</h5></center>
                    <center><h5><b>Precio unitario:</b> $0,18 Ctvs</h5></center>
                    <div id="subtotal"></div>
                    <div id="iva"></div>
                    <div id="dolar"></div>
                </div>
                <div class="col-md-12" style="margin-top: 2%">
                    <form class="form-horizontal" method="POST" action="<?php echo e(url('SellerFunds')); ?>" enctype="multipart/form-data"><?php echo e(csrf_field()); ?>

                    <div class="form-group" align="center">
                        <label for="file" class="col-md-4 col-xs-12 control-label"><b>Imagen de la factura</b></label>
                        <div class="col-md-6">
                            <input type="hidden" name="cant" id="cant">
                            <input type="file" name="factura" id="factura" accept=".jpg" required="required" class="" style="margin-top: 5px">
                             <div id="mensajeImgDoc"></div>
                        </div>
                        <div class="col-md-6" style="margin-top: %">
                            <img id="preview_img_doc" src="" name='ci' />
                        </div>
                    </div>
                </div>  
        </div>
        <div class="col-md-12" style="margin-top: 2%">
                <div class="text-center">
                    <center><button type="submit" class="btn btn-primary" id="soli">
                        Solicitar retiro
                    </button></center>
                </div>
                </form>
        </div>
          </div>
          <div class="modal-footer" style="border-top: 0px">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          </div>
        </div>
    </form>
  </div>
</div>
<!--FIN DEL MODAL-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
     $(document).ready(function(){
         $('#solicitar').attr('disabled',true);
     });
     $("#monto").change(function(){
        var nombre = $("#monto").val().trim();
        var nombre2 = $("#monto").val();
        if (nombre.length < 1 ){
            $('#mensajeMonto').show();
            $('#mensajeMonto').text('El Monto a retirar no debe estar vacio');
            $('#mensajeMonto').css('color','red');
            $('#solicitar').attr('disabled',true);
        }
        else if (nombre > <?php echo Auth::guard('web_seller')->user()->credito; ?> ){
            $('#mensajeMonto').show();
            $('#mensajeMonto').text('Fondos insuficientes');
            $('#mensajeMonto').css('color','red');
            $('#solicitar').attr('disabled',true);
        }
        else if(nombre2 == 0){
             $('#mensajeMonto').show();
            $('#mensajeMonto').text('Monto debe ser mayor a 0');
            $('#mensajeMonto').css('color','red');
            $('#solicitar').attr('disabled',true);
        }
        else {
            $('#mensajeMonto').hide();
            $('#solicitar').attr('disabled',false);
        
        }
    })
     
    // Validacion de solo numeros
        function controltagNum(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[0-9]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
</script>
<script type="text/javascript">
    $("#solicitar").click(function(){
        var tickets = $("#monto").val();
        var dolar = tickets*0.20;
        var iva = dolar*0.12;
        var subtotal=dolar-iva;
        $('#cant').val(tickets);
        $('#tickets').html('<center><h5><b>Cantidad:</b> '+ tickets+'</h5></center>');
        $('#subtotal').html('<center><h5><b>Sub-total:</b> $'+ subtotal.toFixed(2)+'</h5></center>');
        $('#iva').html('<center><h5><b>Iva 12%:</b> $'+ iva.toFixed(2)+' </h5></center>');
        $('#dolar').html('<center><h5><b>Total:</b>  $'+ dolar.toFixed(2)+' </h5></center>');

});
     $('#solicitar').click(function(){
            $('#factura').change(function(){
                var img_doc = $('#factura').val();
                var extension = img_doc.substring(img_doc.lastIndexOf("."));
                if (extension==".png" || extension==".jpg" || extension==".jpeg") {
                    $('#soli').attr('disabled',false);
                    $('#mensajeImgDoc').hide();
                    $('#preview_img_doc').show();
                } else {
                    $('#soli').attr('disabled',true);
                    $('#mensajeImgDoc').show();
                    $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg o png');
                    $('#mensajeImgDoc').css('color','red');

                }
            });
        });
    
           
</script>
<script type="text/javascript">
   
</script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
                $('#myTable').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ ",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No Existen Conceptos Registrados",
                    "sInfo":           "Mostrando Conceptos del _START_ al _END_ de un total de _TOTAL_",
                    "sInfoEmpty":      "Mostrando Conceptos del 0 al 0 de un total de 0 transacciones",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ transacciones)",
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
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>