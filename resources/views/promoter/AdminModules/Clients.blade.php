@extends('promoter.layouts.app')

@section('main')
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Usuarios Pendientes de Aprobacion</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered table-striped table-condensed" id="Clients">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
				  <th class="non-numeric">Numero Doc</th>
		          <th class="non-numeric">Imagen del Documento</th>
		          <th class="non-numeric">Fecha de Nacimiento</th>
		          <th class="non-numeric">Genero</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
  </div>
@include('promoter.modals.ClientViewModal')
@endsection

@section('js')
<script>
	$(document).ready(function(){

		var ClientsDataTable = $('#Clients').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('ClientsDataTable') !!}',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'num_doc', name: 'num_doc'},
	            {data: 'img_doc', name: 'img_doc'},
	            {data: 'fech_nac', name: 'fech_nac'},
	            {data: 'type', name: 'type'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });

		$(document).on('click', '#Status', function() {    
              var x = $(this).val();
              
              $( "#formStatus" ).on( 'submit', function(e)
                      {
                          var s=$("input[type='radio'][name=status]:checked").val();
                          var message=$('#razon').val();
                          var url = 'ValidateUser/'+x;
                          console.log(s);
                          e.preventDefault();
                          $.ajax({
                                  url: url,
                                  type: 'post',
                                  data: {
                                          _token: $('input[name=_token]').val(),
                                          status: s,
                                          message: message,
                                        }, 
                                  success: function (result) {

                                                              $('#myModal').toggle();
                                                              $('.modal-backdrop').remove();
                                                              swal("Se ha "+s+" con exito","","success");
                                                              ClientsDataTable.ajax.reload();
                                                              },

                                  error: function (result) {
                                  swal('Existe un Error en su Solicitud','','error');
                                  console.log(result);
                                  }
                                  });  
                                                  });
         });

    $(document).on('click', '#file_b', function() {
    
     var x = $(this).val();
     console.log(x);
     var file =$("#photo"+x).attr("src");
     $("#ci_photo").attr("src", file);
    
     });
	});
</script>
@endsection