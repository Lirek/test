@extends('layouts.app')

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
                    <div class="col-md-4 col-sm-4 " id="referir" >
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
                                                <label>
                                                    <input type="hidden" name="id" id="id" value="{{$ticket->id}}">
                                                    <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="Deposito" required onclick="tipo({!!$ticket->id!!})"><i class="fa fa-money"> Deposito </i>
                                                    <br>
                                                    <input type="radio" name="pago" id="pago-{{$ticket->id}}" value="payphone" required onclick="tipo({!!$ticket->id!!})"><i class="fa fa-money"> PayPhone </i>
                                                </label>
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
                                                        <select name="pais" id="pais-{{$ticket->id}}" class="form-control">
                                                            <option value="">Seleccione su país</option>
                                                            <option value="54">Argentina</option>
                                                            <option value="56">Chile</option>
                                                            <option value="593">Ecuador</option>
                                                            <option value="503">El Salvador</option>
                                                            <option value="34">España</option>
                                                            <option value="1">Estados Unidos</option>
                                                            <option value="505">Nicaragua</option>
                                                            <option value="507">Panamá</option>
                                                        </select>
                                                    </div>
                                                    <input type="number" id="numero-{{$ticket->id}}" min="1" name="numero" class="form-control" placeholder="Número de teléfono" onkeypress="return controltagNum(event)">
                                                </div>
                                                <div id="mensajePayPhone-{{$ticket->id}}" class="col-md-12" align="center" style="margin-top: 2%">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12" align="center" style="margin-top: 2%">
                                                        <a class="btn btn-primary" id='ingresarFalso' onclick="comprobar({!!$ticket->id!!},{!!$ticket->cost!!})">Comprar</a>
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
function total(id,costo,cant){
           
            var documento = $('#Cantidad-'+id).val();
            var total=parseFloat(costo*documento);
            var  ticket=parseFloat(cant*documento);
            
            console.log(costo);
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
            $('#codCountry-'+id).text("---");
            $('#pais-'+id).on('change',function(){
                if (this.value=='') {
                    $('#codCountry-'+id).text("---");
                }
                else if (this.value=='54') { // Argentina
                    var v = "+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='56') { // Chile
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='593') { // Ecuador
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='503') { // El Salvador
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='34') { // España
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='1') { // Estados Unidos
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='505') { // Nicaragua
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
                else if (this.value=='507') { // Panama
                    var v ="+"+this.value;
                    $('#codCountry-'+id).text(v);
                }
            });
        }
};
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script id="jsbin-javascript">
//---------------------------------------------------------------------------------------------------
// Utilizacion de Promises
    function get(url) {

        return new Promise(function(resolve, reject) {

            var req = new XMLHttpRequest();
            req.open('GET', url);

            var TOKEN = "q8jIk_bqgpYLlYzB2G4REjao6S-JXJXqhV0MwhD8Mc7MJ2-u_OglDLHFCPON6XJ90kTHUaVw2kunvL6u4J2D7Y9L47OGDD7SYpYcknPrPq4jHO13JKVTFuJFoO5PoDIapk851dJp6YS_D2PfR3_Fh_eL5t8IyeWt9q6yzewSkpNN-VLyrJPbzApKcdqdjh7ca3HeEGHYlIFxaNQ8Qmy7nZ5ZqlxmEmiSYqt-7HdWUxzX2CPJnSITnEuwMPrp174opTpYtE4AKABOLAlwJRwh4CzzPaElqDA-mTDH14yVDNNz4blIo4FY2vrjdgczX2iJs3Mxhg";
            var headers    = "Bearer "+TOKEN;

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

    function comprobar(id,cost){

        var numberPhone = $('#numero-'+id).val();
        var countryPrefix = $('#pais-'+id).val();
        var url = "https://pay.payphonetodoesposible.com/api/Users/"+numberPhone+"/region/"+countryPrefix;

        $('#mensajePayPhone-'+id).show();
        $('#mensajePayPhone-'+id).html("<i class='glyphicon glyphicon-refresh'></i> <span>Conectando con PayPhone...</span>");
        get(url).then(function(response) {
            var res = JSON.parse(response);
            if (res.message !== undefined) {
                console.log(res.message);
                // buscar la manera  para que se vea el mesanje
                $('#mensajePayPhone-'+id).html("<i class='glyphicon glyphicon-refresh'></i> <span>El usuario no existe en PayPhone</span>");
            } else {
                // confirmacion por parte del usuario, mostrando los datos correspondientes a la consulta con PayPhone
                // si la respuesta es positiva
                bdd(id,cost);
                // sino, ver que se puede hacer
            }

        $('#mensajePayPhone-'+id).hide();
        }, function(error) {
            return error;
            $('#mensajePayPhone-'+id).hide();
        });
    }

    function bdd(id,cost){
        var value = $('#Cantidad-'+id).val();
        var parametros = "/"+id+"/"+cost+"/"+value;
        var ruta = "{{ url('/BuyPayphone/') }}"+parametros;
        /*
        console.log(ruta);
        */
        $.ajax({
            url     : ruta,
            type    : "GET",
            dataType: "json",
            success: function (data) {
                console.log(data.id);
                // llamo al metodo sale de PayPhone por medio de Promise
                // mostrar mensaje de compra exitosa
                // swal('Cancion comprada con exito','','success');
            }
        });
    }

// Utilizacion de Promises
//---------------------------------------------------------------------------------------------------
</script>
@endsection
