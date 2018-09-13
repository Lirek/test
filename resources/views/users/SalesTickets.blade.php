@extends('layouts.app')
@section('css')
<style>
    .gly-spin {
        -webkit-animation: spin 0.8s infinite linear;
        -moz-animation: spin 0.8s infinite linear;
        -o-animation: spin 0.8s infinite linear;
        animation: spin 0.8s infinite linear;
    }
</style>
@endsection
@section('main') 

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

                    @foreach($package as $ticket)
                    <div class="col-md-4 col-sm-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="white-panel">
                                    <div class="white-header" style="padding: 45px">
                                        <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1>{{$ticket->name}}</h1></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-10 col-xs-10 col-md-10">
                                            <h4 style="margin-left: 20%; color: #000;">
                                                <b>Costo:</b> ${{$ticket->cost}} <br> (Incluido IVA)
                                            </h4>
                                            <br>
                                            <div class="paragraph">
                                                <p class="center" id="mensaje"></p>
                                                @if(Auth::user()->name!=NULL && Auth::user()->last_name!=NULL && Auth::user()->email!=NULL && Auth::user()->num_doc!=NULL && Auth::user()->fech_nac!=NULL)
                                                    <a href="#" class="buttonCenter btn btn-info" role="button" data-toggle="modal" data-target="#myModal-{{$ticket->id}}" onclick="total({!!$ticket->id!!},{!!$ticket->cost!!},{!!$ticket->amount!!})">
                                                        <h5><i class="fa fa-ticket"></i> Comprar</h5>
                                                    </a>
                                                @else
                                                    <a href="#" class="buttonCenter btn btn-info" id="completar-{{$ticket->id}}" onclick="completar({!!$ticket->id!!})">
                                                        <h5><i class="fa fa-ticket"></i> Comprar</h5>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                    <!--MODAL-->
                            <div id="myModal-{{$ticket->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" align="center"><i class="fa fa-ticket"></i> {{$ticket->name}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="{{url('BuyPlan')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="ticket_id" value="{{$ticket->id }}">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <img src="{{asset('assets/img/tickets.png')}}" class="img-responsive center-block">
                                                </div>
                                                <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                                    <label for="codigo" class="col-md-4 col-sm-4 col-xs-12 control-label" style="margin-left:25% "><h5><b>Cantidad de paquetes:</b></h5>
                                                    </label>
                                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top: 1%">
                                                        <input type="number" min="1" max="20" value="1" class="form-control input-sm" name="Cantidad" id="Cantidad-{{$ticket->id}}" value="{{ old('Cantidad') }}" onkeypress="return controltagNum(event)">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%">
                                                    <input type="hidden" name="cost" id="cost" value="{{$ticket->cost}}">
                                                    <h5 align="center"><b>Costo: </b>{{$ticket->cost}}$</h5>
                                                    <div id="cantidadTickets-{{$ticket->id}}"></div>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12" id="total-{{$ticket->id}}"></div>
                                                <h5 align="center"><b>Método de pago</b></h5>
                                                <div class="radio" align="center">
                                                    <input type="hidden" name="id" id="id" value="{{$ticket->id}}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>
                                                                <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="Deposito" required onclick="tipo({!!$ticket->id!!})">
                                                                <i class="fa fa-money"> Depósito </i>
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h4>
                                                                <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="payphone" required onclick="tipo({!!$ticket->id!!})">
                                                                <i class="fa fa-money"> PayPhone </i>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="display:none;" id="deposito-{{$ticket->id}}" align="center">
                                                    <div class="col-md-12">
                                                        <label class="control-label"><b>Número de depósito:</b>
                                                            <input type="text" name="references" id="references-{{$ticket->id}}" class="form-control col-md-12" value="{{ old('references') }}" placeholder="Ingrese el número de depósito" size="28" onkeypress="return controltagNum(event)">
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="control-label"><b>Recibo:</b>
                                                            <input id="voucher-{{$ticket->id}}" type="file" accept=".jpg" class="form-control" name="voucher" value="{{ old('voucher') }}" >
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="payphone" id="payphone-{{$ticket->id}}" style="display:none;">
                                                    <div class="col-md-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon" id="codCountry-{{$ticket->id}}"></span>
                                                            <select name="pais" id="pais-{{$ticket->id}}" class="form-control pais">
                                                            </select>
                                                        </div>
                                                        <input type="number" id="numero-{{$ticket->id}}" min="1" name="numero" class="form-control" placeholder="Número de teléfono" onkeypress="return controltagNumForm(event,{!!$ticket->id!!},{!!$ticket->cost!!},{!!$ticket->amount!!})">
                                                    </div>
                                                    <div id="mensajeValidacion-{{$ticket->id}}" class="col-md-12" align="center" style="margin-top: 2%; color: red;">
                                                    </div>
                                                    <div id="mensajePayPhone-{{$ticket->id}}" class="col-md-12" align="center" style="margin-top: 2%">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <a class="btn btn-default" id="ingresarFalso-{{$ticket->id}}" onclick="comprar({!!$ticket->id!!},{!!$ticket->cost!!},{!!$ticket->amount!!})">Comprar</a>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <button type="submit" class="btn btn-default" id="ingresar-{{$ticket->id}}">Comprar</button>
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
                    @endforeach
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
                            <h4><b>Total de tickets:</b> {{Auth::user()->credito}}</h4>
                        </div>
                        <div class="col-sm-6">
                            @if(Auth::user()->points)
                                <h4><b>Total de puntos:</b> {{Auth::user()->points}}</h4>
                            @else
                                <h4><b>Total de puntos:</b> 0 </h4>
                            @endif
                        </div>
                    </div>
                    <table class="table table-striped table-advance table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th><i class="fa fa-calendar" style="color: #23B5E6"></i> Fecha</th>
                                <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Concepto</th>
                                <th><i class="fa fa-money" style="color: #23B5E6"></i> + </th>
                                <th><i class="fa fa-money" style="color: #23B5E6"></i> - </th>
                                <th><i class="fa fa-file-pdf-o" style="color: #23B5E6"></i> Factura</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Balance as $balance)
                                @if($balance != 0)
                                    <tr class="letters">
                                        <td>{{$balance['Date']}}</td>
                                        <td>{{$balance['Transaction']}}</td>
                                        @if($balance['Type']==1)
                                            <td></td>
                                            <td>{{$balance['Cant']}}</td>
                                            <td></td>
                                        @else
                                            <td>{{$balance['Cant']}}</td>
                                            <td></td>
                                            <td>
                                                <a href="https://app.datil.co/ver/{{$balance['Factura']}}/ride" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-external-link"></i> Ver </a>
                                            </td>
                                       @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
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

    function total(id,costo,cant){

        $("#ingresarFalso-"+id).hide();

        var documento = $('#Cantidad-'+id).val();
        var total=parseFloat(costo*documento);
        var  ticket=parseFloat(cant*documento);

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
            $('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
            $('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');

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
            });

        $('#cantidadTickets-'+id).html('<h5 align="center"><b>Cantidad de tickets:</b> ' + ticket +'</h5>');
        $('#total-'+id).html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
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
            $("#ingresarFalso-"+id).hide();
            $("#deposito-"+id).show();
            $("#payphone-"+id).hide();
            $('#voucher-'+id).attr('required','required');
            $('#references-'+id).attr('required','required');
            $('#references-'+id).focus();
            $('#pais-'+id).removeAttr('required');
            $('#numero-'+id).removeAttr('required');
        }else{
            $("#ingresarFalso-"+id).show();
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

    function completar(id) {
        swal({
            title: "Complete su información personal por favor",
            text: "Antes de realizar cualquier pago debe completar su información personal",
            icon: "warning",
            buttons: {
                accept: {
                    text: "OK",
                    value: true
                }
            }
        })
        .then((completar) => {
            var ruta = "{{url('EditProfile')}}";
            $(location).attr('href',ruta);
        });
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script id="jsbin-javascript">

    function bdd(id,cost,callback){
        var value = $('#Cantidad-'+id).val();
        var parametros = "/"+id+"/"+cost+"/"+value;
        var ruta = "{{ url('/BuyPayphone/') }}"+parametros;
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
        var ruta = "{{ url('/TransactionCanceled/') }}"+parametros;
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
        var ruta = "{{ url('/TransactionApproved/') }}"+parametros;
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
        var ruta = "{{ url('/TransactionPending/') }}"+parametros;
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
            var url = "{{ url('/factura/') }}"+parametros;

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
        var numberPhone = $('#numero-'+id).val();
        var countryPrefix = $('#pais-'+id).val();
        var cantidadPaquetes = $('#Cantidad-'+id).val();
        var tickets = parseFloat(cantidadTickets*cantidadPaquetes);

        if (numberPhone=="" || countryPrefix=="") {
            $('#mensajePayPhone-'+id).hide();
            $('#mensajeValidacion-'+id).show();
            $('#mensajeValidacion-'+id).html("<h4> <i class='glyphicon glyphicon-warning-sign'></i> <span>Los datos introducidos son erróneos</span> </h4>");
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
                                $('#mensajePayPhone-'+id).show();
                                $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
                                console.log("id: "+id+" cost: "+cost);
                                bdd(id,cost,function(idTicketSales) {
                                    console.log("idTicketSales: "+idTicketSales);
                                    postSalePayPhone(numberPhone,countryPrefix,total,idTicketSales).then(function(response) {
                                        var gif = "{{ asset('/sistem_images/Loading.gif') }}";
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
                                                                                value: true
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
                                                                        value: true
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
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            });
                        }
                    });
                }
            }, function(error) {
                swal({
                    title: "¡Error de conexión!",
                    text: "Verifique su conexión de Internet e intentelo de nuevo, por favor.",
                    icon: "error",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                $('#mensajePayPhone-'+id).hide();
            });
        }
        return false;
    }
</script>
@endsection
