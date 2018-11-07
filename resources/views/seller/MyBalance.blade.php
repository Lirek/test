@extends('seller.layouts')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('content')
<div class="row" style="margin-bottom: -2%">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12">
                <div class="control-label">
                <div class="white-header">
                     <h2><span class="card-title"><center><i class="fa fa-ticket"></i> Mi Balance</center></span></h2><br>          
                </div>
                <div class="col-sm-12 col-xs-12 col-md-12 goleft table-responsive">
                	<div class="text-center">
                        <div class="col-sm-4">
                            <h4><b>Tickets disponible:</b> {{Auth::guard('web_seller')->user()->credito}}</h4>
                        </div>
                        <div class="col-sm-4">
                            <h4><b>Tickets Pendientes:</b> {{Auth::guard('web_seller')->user()->credito_pendiente}}</h4>
                        </div>
                        <div class="col-sm-4">
                            <h4><b>Tickets Diferidos:</b> {{ $diferido}}</h4>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 2%"></div>
                    <br>
                    <table class="table table-striped table-advance table-hover" id="myTable">
                        <thead>
                        	<tr>
	                          	<th><i class="fa fa-calendar" style="color: #23B5E6"></i> Fecha</th>
	                          	<th><i class="fa fa-pencil" style="color: #23B5E6"></i> Concepto</th>
                                <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Tipo</th>
                                <th><i class="fa fa-pencil" style="color: #23B5E6"></i> Estatus</th>
	                          	<th><i class="fa fa-money" style="color: #23B5E6"></i> + </th>
	                          	<th><i class="fa fa-money" style="color: #23B5E6"></i> - </th>
                          	</tr>
                        </thead>
                        <tbody>
                        	@foreach ($Balance as $balance)
                                @if($balance != 0)
                                	<tr class="letters">
        		                        <td>{{$balance['Date']}}</td>
                                        @if($balance['Type']==1)
        	                          	    <td>Compra de {{$balance['Transaction']}} por {{$balance['User']}}</td>
                                            <td>{{$balance['Content']}}</td>
                                            <td>No aplica</td>
                                        @else
                                            <td>Solicitud de retiro de fondos</td>
                                            <td>{{$balance['Transaction']}}</td>
                                            <td>{{$balance['Content']}}</td>
                                        @endif
                                        @if($balance['Type']==1)
            	                         	<td>{{$balance['Cant']}}</td>
            	                          	<td></td>
                                        @else
                                            <td></td>
                                            <td>{{$balance['Cant']}}</td>
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
@endsection