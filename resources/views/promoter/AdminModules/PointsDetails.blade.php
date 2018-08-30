@extends('promoter.layouts.app')


@section('main')

 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Puntos Asignados</h2>
 </div>

<div class="row mt">
	    <div class="col-lg-12">
		<div class="content-panel">
			<table class="display responsive no-wrap" width="100%" id="Points">            
				<thead>
		        <tr>
		          <th class="non-numeric">Id de Asignacion</th>
		          <th class="non-numeric">Emisor</th>
		          <th class="non-numeric">Receptor</th>
		          <th class="non-numeric">Cantidad</th>
				  <th class="non-numeric">Fecha de Asignacion</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
</div>

@endsection

@section('js')
<script type="text/javascript">

	$(document).ready(function(){

		var Points = $('#Points').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('PointsSalesDataTable') !!}',
	        columns: [
	            {data: 'id', name: 'id'},
	            {data: 'from', name: 'from'},
	            {data: 'to', name: 'to'},
	            {data: 'amount', name: 'amount'},
	            {data: 'created_at', name: 'created_at'},
	        ]
	    });

	});

</script>
@endsection