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
                            <h4><b>Total de puntos:</b> 0 </h4>
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
            });

</script>
@endsection