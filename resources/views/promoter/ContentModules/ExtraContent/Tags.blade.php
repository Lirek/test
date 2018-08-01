@extends('promoter.layouts.app')

@section('main')
 
  <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Etiquetas</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered table-striped table-condensed" id="tags">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
		          <th class="non-numeric">Tipo</th>
		          <th class="non-numeric">Registrada Por</th>
		          <th class="non-numeric">Fecha de Registro</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>

  </div>

@endsection


@section('js')
@include('promoter.modals.TagsViewModal')
<script>
 $(document).ready(function(){

	var TagsTable = $('#tags').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{!! url('TagsData') !!}',
	        columns: [
	            {data: 'tags_name', name: 'tags_name'},
	            {data: 'type_tags', name: 'type_tags'},
	            {data: 'seller.name', name: 'seller.name'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });

	 $(document).on('click', '#Status', function() {
	 	
	 	var tag = $(this).val();
	 	



	 	$( "#formStatus" ).on( 'submit', function(e){
	 		
	 		var s=$("input[type='radio'][name=status]:checked").val();
            var message=$('#razon').val();
            var url = 'AprobalDenialTag/'+tag;

	 		e.preventDefault();

	 		$.ajax({
	 			url:url,
	 			type: 'post',
	 			data: {
	                      _token: $('input[name=_token]').val(),
	                      status: s,
	                      message: message,
                       },
                success: function (result) {

                							$('#StatusTags').modal('toggle');
                							alert(s+ 'con exito');
                							TagsTable.ajax.reload();
                						   },

                error:function (result) {
                							alert('Error');
                						}						   
	 				});
	 	});
	 });
 });
</script>
@endsection