@extends('layouts.app')
@section('css')

@endsection

@section('main')

    <!--
                    <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
                        <ul class="tabs">
                            <li class="tab col s4"><a  href="#test1" class="active"><i class="material-icons" style="vertical-align: middle;">timeline</i>&nbsp;<b>Mi Balance</b></a></li>
                            <li class="tab col s4"><a  href="#test2"><i class="material-icons" style="vertical-align: middle;">add_circle_outline</i>&nbsp;<b>Detalles</b></a></li>
                        </ul>
                    </div>
    -->

                    <h4 class="titelgeneral"><i class="material-icons small">timeline</i> Mi Balance</h4>

                    <div id="test1" class="col s12 m12 l12">
                            <div class="row">
                                @if(Auth::user()->points || Auth::user()->pending_points)

                                <div class="col s12 m6 l6">
                                    <br><br>
                                    <canvas id="myChart" height="300" width="400"></canvas>
                                </div>
                                @else
                                    <div class="col s12 m6 l6">
                                        <br><br>
                                        <blockquote >
                                            <i class="material-icons fixed-width large grey-text">sentiment_very_dissatisfied</i><br><h5 blue-text text-darken-2>No posee Puntos</h5>
                                        </blockquote>
                                    </div>
                                @endif
                                <div class="col col s12 m6 l6">
                                    <br>
                                    <ul class="collapsible popout">
                                        <li>
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd;"><h6 class="grey-text">Total de puntos:</h6></div>
                                        @if(Auth::user()->points)
                                            <div class="collapsible-body"> <a class="btn-floating btn-large blue lighten-2 "> <b>{{Auth::user()->points}}</b></a><br><br></div>
                                        @else
                                            <div class="collapsible-body"> <a class="btn-floating btn-large blue lighten-2 "> <b>0</b></a><br><br></div>
                                        @endif
                                        </li>
                                        <li class="active">
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Total de tickets:</h6></div>
                                            <div class="collapsible-body"><a class="btn-floating btn-large amber lighten-2"><b>{{Auth::user()->credito}}</b></a><br><br></div>
                                        </li>
                                        <li>
                                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Total de puntos pendientes:</h6></div>
                                            @if(Auth::user()->pending_points)
                                                <div class="collapsible-body">  <a class="btn-floating btn-large  deep-orange lighten-2"> <b> {{Auth::user()->pending_points}}</b></a><br><br></div>
                                            @else
                                                <div class="collapsible-body">  <a class="btn-floating btn-large  deep-orange lighten-2"> <b>0</b></a><br><br></div>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>


    <br><br> <br><br>
    <h5 class="left grey-text" ><i class="material-icons small">add_circle_outline</i> Detalles</h5>



    <div id="test2" class="col s12">
                        <br>
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th><i class="material-icons ">date_range</i> Fecha</th>
                                <th><i class="material-icons"></i>Concepto</th>
                                <th><i class="material-icons">add_circle</i></th>
                                <th><i class="material-icons">do_not_disturb_on</i></th>
                                <th><i class="material-icons"></i>Metodo</th>
                                <th><i class="material-icons"></i></i>Factura</th>

                            </tr>
                            </thead>

                            <tbody>

                            @foreach ($Balance as $balance)
                                @if($balance != 0)
                                    <tr>
                                        <td>{{$balance['Date']}}</td>
                                        <td>{{$balance['Transaction']}}</td>
                                        @if($balance['Type']==1)
                                            <td></td>
                                            <td>{{$balance['Cant']}}</td>
                                            <td>No aplica</td>
                                            <td>No aplica</td>
                                        @else
                                            <td>{{$balance['Cant']}}</td>
                                            <td></td>
                                            <td>{{$balance['Method']}}</td>
                                            @if($balance['Method'] != 'Puntos')
                                                <td>
                                                    @if($balance['Factura']!=NULL)
                                                        <a href="https://app.datil.co/ver/{{$balance['Factura']}}/ride" target="_blank" class="btn-floating btn-small waves-effect waves-light green"><i class="material-icons">print</i></a>
                                                    @else
                                                        <a class="btn-floating btn-small waves-effect waves-light  green" onclick="generarFactura({!!$balance['id_payments']!!})"><i class="material-icons">print</i></a>
                                                    @endif
                                                </td>
                                            @else
                                                <td>No Aplica</td>
                                            @endif
                                        @endif
                                    </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>

                        <div class="row center">
                            <div class="col s12 m12">
                                <!--  Paginacion material -->
                                <?php /*Nuevo*/ $Balance->setPath('') ?>
                                {!!$Balance->appends(Input::except('page'))->render() !!}
                            </div>
                        </div>

                    </div>


@endsection
@section('js')

    <script>

        $(document).ready(function(){

                // grafica de disponibilidad
                $.ajax({
                    url:"{{url('BalanceUserGraph')}}",
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
            var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
                        var ruta = "{{ url('/generarFactura/') }}"+parametros;
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





@endsection