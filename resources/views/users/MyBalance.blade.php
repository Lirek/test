@extends('layouts.app')
@section('main')  

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
                                <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Metodo</th>
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
                                            <td>{{$balance['Method']}}</td>
                                            @if($balance['Method'] != 'Puntos')
                                                <td>
                                                    @if($balance['Factura']!=NULL)
                                                        <a href="https://app.datil.co/ver/{{$balance['Factura']}}/ride" target="_blank" class="btn btn-info btn-xs">
                                                            <i class="fa fa-external-link"></i> Ver 
                                                        </a>
                                                    @else
                                                        <a onclick="generarFactura({!!$balance['id_payments']!!})" class="btn btn-info btn-xs">
                                                            <i class="fa fa-external-link"></i> Generar 
                                                        </a>
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