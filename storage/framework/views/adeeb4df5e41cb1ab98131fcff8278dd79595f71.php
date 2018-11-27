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
        height:430px;
    }
    
</style>
<link rel="stylesheet" href="https://unpkg.com/angular2-data-table/release/material.css">
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
        .gradient-45deg-light-blue-cyan.gradient-shadow {
            box-shadow: 0 6px 20px 0 rgba(38, 198, 218, 0.5);
        }
        .gradient-45deg-light-blue-cyan {
            background: #0288d1;
            background: -webkit-linear-gradient(45deg, #0288d1 0%, #26c6da 100%);
            background: linear-gradient(45deg, #0288d1 0%, #26c6da 100%);
        }
        .min-height-100 {
            min-height: 100px !important;
        }
        .background-round {
            background-color: rgba(0, 0, 0, 0.18);
            padding: 15px;
            border-radius: 50%;
        }
        .gradient-45deg-green-teal.gradient-shadow {
            box-shadow: 0 6px 20px 0 rgba(77, 182, 172, 0.5);
        } 
        .gradient-45deg-green-teal {
            background: #43A047;
            background: -webkit-linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
            background: linear-gradient(45deg, #43A047 0%, #1de9b6 100%);
        }  
        .gradient-45deg-red-pink.gradient-shadow {
            box-shadow: 0 6px 20px 0 rgba(244, 143, 177, 0.5);
        }
        .gradient-45deg-red-pink {
            background: #FF5252;
            background: -webkit-linear-gradient(45deg, #FF5252 0%, #f48fb1 100%);
            background: linear-gradient(45deg, #FF5252 0%, #f48fb1 100%);
        }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="card-panel curva">
            <div class="row">
                <div class="col s12 m4">
                    <div class="card gradient-45deg-light-blue-cyan gradient-shadow" style="height: 150px">
                        <div class="padding-4" style="padding: 4%"> 
                            <div class="col m4">
                                <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">local_activity</i>
                            </div>
                            <div class="col m7">
                                <h5 style="color: white"><b>Tickets disponible:</b> <?php echo e(Auth::guard('web_seller')->user()->credito); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card gradient-45deg-green-teal gradient-shadow" style="height: 150px">
                        <div class="padding-4" style="padding: 4%"> 
                            <div class="col m4">
                                <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">search</i>
                            </div>
                            <div class="col m7">
                               <h5 style="color: white"><b>Tickets Pendientes:</b> <?php echo e(Auth::guard('web_seller')->user()->credito_pendiente); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card gradient-45deg-red-pink gradient-shadow" style="height: 150px">
                        <div class="padding-4" style="padding: 4%"> 
                            <div class="col m4">
                                <i class="material-icons background-round mt-5" style="margin-top: 50%; color: white">monetization_on</i>
                            </div>
                            <div class="col m6">
                               <h5 style="color: white"><b>Tickets Diferidos:</b> <?php echo e($diferido); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <br>
                    <div class="card" style="height: 320px">
                        <br>
                         <h3><center>Solicitar retiro de fondos</center></h3>
                         <br> 
                         <div class="input-field col s12 m8 offset-m2">
                            <i class="material-icons prefix blue-text valign-wrapper">local_activity</i>
                            <label for="monto">Cantidad de tickets a retirar:</label>
                            <input type="number" min="1" max="<?php echo e(Auth::guard('web_seller')->user()->credito); ?>" value="" class="form-control input-xs" name="Cantidad" id="monto" required="required" value="<?php echo e(old('Cantidad')); ?>" onkeypress="return controltagNum(event)">
                            <div id="mensajeMonto"></div>

                           
                            <a href="#myModalRequest" class="btn curvaBoton waves-effect waves-light green modal-trigger" id="solicitar"> Retirar </a>
                         </div>   
                    </div>
                </div> 
                <div class="col s12 m6">
                    <br>
                    <div class="">
                        <br>
                        <h5><center><i class="fa fa-check"></i>Mis solicitudes</center></h5><br>
                        <div class="col s12 m12">
                            <div class="dataTables_wrapper">
                            <table class="table-responsive" id="myTable" >
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
</div>

<!-- /.modal  de Fondos  -->
<div id="myModalRequest" class="modal">
    <div class="modal-content">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">local_activity</i> Datos para facturación por cobro de tickets</h4>
            <br>
        </div>
        <br>
        <div class="row">
            <div class="col s12 m12">
            <div class="col s12 m12">
                 <!-- <a id="menu" class="waves-effect waves-light btn btn-floating left" ><i class="material-icons">menu</i></a> -->
                 <a class="btn tooltipped btn-floating blue left" data-position="right" data-tooltip="Adjunte una foto de la factura con los siguientes datos"><i class="material-icons">info_outline</i></a>
            </div>  
                <div class="col m9 s12 offset-m2">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">event</i>
                                    <b class="left">Fecha: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e(date('d/m/Y')); ?>

                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">assignment_ind</i>
                                    <b class="left">A nombre de: </b>
                                </div>
                                <div class="col s12 m7">
                                     INFORMERET S.A.
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">business_center</i>
                                    <b class="left">Ruc: </b>
                                </div>
                                <div class="col s12 m7">
                                    09928971710001
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">call</i>
                                    <b class="left">Teléfono: </b>
                                </div>
                                <div class="col s12 m7">
                                    0982042816
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">location_on</i>
                                    <b class="left">Dirección: </b>
                                </div>
                                <div class="col s12 m7">
                                    Torres de Mall del Sol, Torre B, Piso 4
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">create</i>
                                    <b class="left">Descripción: </b>
                                </div>
                                <div class="col s12 m7">
                                    Canje de tickets por venta de contenidos digitales.
                                </div>
                            </div>
                        </li>
                         <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">add_shopping_cart</i>
                                    <b class="left">Cantidad: </b>
                                </div>
                                <div class="col s12 m7" id="tickets">
                                   
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">monetization_on</i>
                                    <b class="left">Precio unitario: </b>
                                </div>
                                <div class="col s12 m7">
                                    $0,18 Ctvs
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">monetization_on</i>
                                    <b class="left">Sub-total: </b>
                                </div>
                                <div class="col s12 m7" id="subtotal">
                                   
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">monetization_on</i>
                                    <b class="left">Iva 12%: </b>
                                </div>
                                <div class="col s12 m7" id="iva">
                                   
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">monetization_on</i>
                                    <b class="left">Total:: </b>
                                </div>
                                <div class="col s12 m7" id="dolar">
                                   
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                    <div class="col m12">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('SellerFunds')); ?>" enctype="multipart/form-data"><?php echo e(csrf_field()); ?>

                            <div class="file-field input-field col m6 offset-m3">
                                <label for="file">Imagen de la factura</label>
                                <br><br>
                                <div class="btn blue">
                                    <span><i class="material-icons">archive</i></span>
                                    <input type="file" name="factura" id="factura" accept=".jpg" required="required" class="" style="margin-top: 5px">
                                    <div id="mensajeImgDoc"></div>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <input type="hidden" name="cant" id="cant">
                                <div class="col m6">
                                    <img id="preview_img_doc" src="" name='ci' />
                                </div>
                            </div>
                             <div class="col m12">
                                <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="soli">
                                    Solicitar retiro
                                </button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>   
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
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
        $('#tickets').html(tickets);
        $('#subtotal').html(subtotal.toFixed(2)+'$');
        $('#iva').html(iva.toFixed(2)+'$');
        $('#dolar').html(dolar.toFixed(2)+'$');

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
                "order": [[ 0, "asc" ]],
                "responsive": true,
                "pageLength": 5
            });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>