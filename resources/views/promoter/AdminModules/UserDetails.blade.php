@extends('promoter.layouts.app')


@section('main')

<div class="row mt">
<h3><i class="fa fa-angle-right"></i>Usuarios Destacados</h3>
</div>

<div class="row mt">
	<div class="col-md-7">
		<div class="grey-panel pn donut-chart">
	  			<div class="grey-header">
		  			<h5>Usuarios Destacados</h5>
	  			</div>
	  	</div>
	</div>
</div>

<div class="row mt">
<h3><i class="fa fa-angle-right"></i>Usuarios Libres</h3>
</div>

<div class="row mt">
  
	<div class="col-md-7">
		<div class="green-panel pn">
	  			<div class="green-header">
		  			<h5>Usuarios Libres</h5>
	  			</div>

	  			<table class="table table-bordered table-striped " style="background-color: #fff;" id="PubChain">            
                        <thead class="cf">
                                <tr>
                                  <th class="non-numeric">Nombre</th>
                                  <th class="non-numeric">Email</th>
                                  <th class="non-numeric">Puntos</th>
                                  <th class="non-numeric">Fecha de Registro</th>
                                  <th class="non-numeric">Estatus</th>
                                  <th class="non-numeric">Asignar</th>                                  
                                </tr>
                            </thead>
                </table>
	  	</div>
	</div>  
</div>

@endsection

@section('js')
<script>
	$(document).ready(function(){
		
		var UnRefered = $('#PubChain').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('UnReferedUserDataTable') !!}',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'email', name: 'email'},
	            {data: 'points', name: 'points'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'verify', name: 'verify'},
	            {data: 'assing', name: 'assing', orderable: false, searchable: false}
	        ]
	    });
	})
</script>
@endsection