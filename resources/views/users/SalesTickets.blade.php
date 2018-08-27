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

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12">
                <div class="control-label">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="white-header"><br>
                                <h2><span class="card-title"><center><i class="fa fa-ticket"></i> Compra de tickets</center></span></h2><br>
                            </div>

                    @foreach($package as $ticket)
                    <div class="col-md-4 col-sm-4" id="referir">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="white-panel panRf  donut-chart">
                                    <div class="white-header" style="padding: 45px">
                                        <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1>{{$ticket->name}}</h1></span>
                                    </div>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10 col-md-10">
                                              <h4 style="margin-left: 20%; color: #000; "><b>Costo:</b> ${{$ticket->cost}} <br>(Incluido IVA)</h4><br>
                                              <div class="paragraph">
                                                <p class="center " id="mensaje"></p>

                                                        <a href="#" class="buttonCenter btn btn-info" role="button" data-toggle="modal" data-target="#myModal-{{$ticket->id}}"  onclick="total({!!$ticket->id!!},{!!$ticket->cost!!},{!!$ticket->amount!!})"><h5><i class="fa fa-ticket"></i> Comprar</h5></a>


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
                                            <form class="form-horizontal" method="POST" action="{{url('BuyPlan')}}" enctype="multipart/form-data">{{ csrf_field() }}
                                            <input type="hidden" name="ticket_id" value="{{$ticket->id }}">
                                             <div class="col-md-12 col-sm-12 col-xs-12">
                                                <img src="{{asset('assets/img/tickets.png')}}" class="img-responsive center-block">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%">
                                                <input type="hidden" name="cost" id="cost" value="{{$ticket->cost}}">
                                                <h5 align="center"><b>Costo: </b>{{$ticket->cost}}$</h5>
                                                <div id="cantidadTickets-{{$ticket->id}}">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                                <label for="codigo" class="col-md-4 col-sm-4 col-xs-12 control-label" style="margin-left:25% "><h5><b>Cantidad de paquetes:</b></h5>
                                                </label>
                                                <div class="col-md-2 col-sm-2 col-xs-12" style="margin-top: 1%">
                                                    <input type="number" min="1" max="20" value="1" class="form-control input-sm" name="Cantidad" id="Cantidad-{{$ticket->id}}" value="{{ old('Cantidad') }}" onkeypress="return controltagNum(event)">
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12" id="total-{{$ticket->id}}">

                                            </div>
                                            <h5 align="center"><b>Método de pago</b></h5>
                                            <div class="radio" align="center">
                                            <input type="hidden" name="id" id="id" value="{{$ticket->id}}">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4>
                                                            <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="Deposito" required onclick="tipo({!!$ticket->id!!})"><i class="fa fa-money"> Depósito </i>
                                                        </h4>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h4>
                                                            <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="payphone" required onclick="tipo({!!$ticket->id!!})"><i class="fa fa-money"> PayPhone </i>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="display:none;" id="deposito-{{$ticket->id}}" align="center">
                                                <div class="col-md-12">
                                                    <label class="control-label"><b>Número de deposito:</b>
                                                        <input type="text" name="references" id="references-{{$ticket->id}}" class="form-control col-md-12" value="{{ old('references') }}" placeholder="Ingrese el número de deposito" size="28" onkeypress="return controltagNum(event)">
                                                    </label>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="control-label"><b>Recibo:</b>
                                                        <input id="voucher-{{$ticket->id}}" type="file" accept=".jpg" class="form-control" name="voucher" value="{{ old('voucher') }}" >
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <button type="submit" class="btn btn-primary" id='ingresar'>Comprar</button>
                                                    </div>
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
                                                    {{--
                                                        onpaste="return false"
                                                    --}}
                                                </div>
                                                <div id="mensajeValidacion-{{$ticket->id}}" class="col-md-12" align="center" style="margin-top: 2%; color: red;">
                                                </div>
                                                <div id="mensajePayPhone-{{$ticket->id}}" class="col-md-12" align="center" style="margin-top: 2%">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <a class="btn btn-primary" id='ingresarFalso' onclick="comprobar({!!$ticket->id!!},{!!$ticket->cost!!},{!!$ticket->amount!!})">Comprar</a>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            </div>
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
@endsection

@section('js')
<script type="text/javascript">

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
    };

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
            comprobar(id,cost,cantidadTickets);
            return false;
        }
        patron =/[0-9]/;
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }

    function tipo(id){ 

        var valor = $("input:radio[id=pago-"+id+"]:checked").val();
        if(valor == 'Deposito'){
            $("#deposito-"+id).show();
            $("#payphone-"+id).hide();
            $('#voucher-'+id).attr('required','required');
            $('#references-'+id).attr('required','required');
            $('#pais-'+id).removeAttr('required');
            $('#numero-'+id).removeAttr('required');
        }else{
            $("#payphone-"+id).show();
            $("#deposito-"+id).hide();
            $('#voucher-'+id).removeAttr('required','required');
            $('#references-'+id).removeAttr('required','required');
            $('#pais-'+id).attr('required','required');
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
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script id="jsbin-javascript">
//---------------------------------------------------------------------------------------------------
// Utilizacion de Promises
    
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
                var id = data.id;
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

    function transactionApproved(reference,id,ticket,callback) {
        var parametros = "/"+id+"/"+reference+"/"+ticket;
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

    function getSalePayPhone(transactionId, callback) {

        var url = "https://pay.payphonetodoesposible.com/api/Sale/"+transactionId;
        var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
        var headers    = "Bearer "+TOKEN;

        var req = new XMLHttpRequest();
        req.open('GET', url);
        req.setRequestHeader("Authorization",headers);
        req.onload = function() {
            if (req.status == 200) {
                callback(req.response);
            }
            else {
                resolve(req.response);
            }
        };
        req.onerror = function() {
            reject(Error("Network Error"));
        };
        req.send();
    }

    function comprobar(id,cost,cantidadTickets){

        var numberPhone = $('#numero-'+id).val();
        var countryPrefix = $('#pais-'+id).val();
        var cantidadPaquetes = $('#Cantidad-'+id).val();
        var ticket = parseFloat(cantidadTickets*cantidadPaquetes);
        if (numberPhone=="" || countryPrefix=="") {
            $('#mensajePayPhone-'+id).hide();
            $('#mensajeValidacion-'+id).show();
            $('#mensajeValidacion-'+id).html("<h4> <i class='glyphicon glyphicon-warning-sign'></i> <span>Los datos introducidos son erróneos</span> </h4>");
        }
        else {
            $('#mensajeValidacion-'+id).hide();
            $('#mensajePayPhone-'+id).show();
            $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
        }

        getUserPayPhone(numberPhone,countryPrefix).then(function(response) {
            var res = JSON.parse(response);
            if (res.message !== undefined) {
                swal({
                    title: "El usuario no existe en PayPhone",
                    text: "El número telefónico que introdujo no se encuentra registrado en PayPhone, verifique los datos e intentelo de nuevo, por favor.",
                    icon: "warning"
                });
            } else {
                var nombre = res.name+" "+res.lastName;
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
                    dangerMode: false
                })
                .then((confirmacion) => {
                    if(confirmacion){
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
                            dangerMode: false
                        })
                        .then((pagar) => {
                            if (pagar) {
                                $('#mensajePayPhone-'+id).show();
                                $('#mensajePayPhone-'+id).html("<h4> <i class='glyphicon glyphicon-refresh gly-spin'></i> <span>Conectando con PayPhone...</span> </h4>");
                                bdd(id,cost,function(id) {
                                    postSalePayPhone(numberPhone,countryPrefix,total,id).then(function(response) {
                                        swal({
                                            title: "¡Listo! Verifique su telefóno",
                                            text: "Eliga una opción y luego seleccione el botón 'Continuar'.",
                                            icon: "success",
                                            buttons: {
                                                accept: {
                                                    text: "Continuar",
                                                    value: true
                                                }
                                            },
                                            dangerMode: false
                                        })
                                        .then((validar) => {
                                            if (validar) {
                                                var transactionId = JSON.parse(response);
                                                getSalePayPhone(transactionId.transactionId,function(transaccionInfo) {
                                                    var transaction = JSON.parse(transaccionInfo);
                                                    var status = transaction.transactionStatus;
                                                    if (status=="Approved") {
                                                        transactionApproved(transaction.transactionId,id,ticket,function(aprobar) {
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
                                                                dangerMode: false
                                                            })
                                                            .then((recarga) => {
                                                                location.reload();
                                                            });
                                                        });
                                                    }
                                                    else if (status=="Canceled") {
                                                        transactionCanceled(transaction.transactionId,id,function(cancelar) {
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
                                                                dangerMode: false
                                                            })
                                                            .then((recarga) => {
                                                                location.reload();
                                                            });
                                                        });
                                                    }
                                                    else if (status=="Pending"){
                                                        postReverse(transactionId.transactionId).then(function(response) {
                                                            transactionPending(transactionId.transactionId,id,function(pendiente) {
                                                                swal({
                                                                    title: "¡Algo fue mal!",
                                                                    text: "Tranquilo, puede volver a intentarlo.",
                                                                    icon: "warning"
                                                                })
                                                                .then((recarga) => {
                                                                    location.reload();
                                                                });
                                                            });
                                                        });
                                                    }
                                                });
                                            }
                                        });
                                    }, function(error) {
                                        return error;
                                        $('#mensajePayPhone-'+id).hide();
                                    });

                                });
                            }
                        });
                    } else {
                        swal({
                            title: "Tranquilo no pasó nada",
                            text: "Verifique el número e intentelo de nuevo, por favor",
                            icon: "warning"
                        });
                    }
                });
            }
            $('#mensajePayPhone-'+id).hide();
        }, function(error) {
            return error;
            $('#mensajePayPhone-'+id).hide();
        });
    }

// Utilizacion de Promises
//---------------------------------------------------------------------------------------------------
</script>
@endsection
