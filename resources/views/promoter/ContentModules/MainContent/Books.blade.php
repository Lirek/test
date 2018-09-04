@extends('promoter.layouts.app')

@section('main')

 <div class="row mt">
	<h2>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Libros</a></li>
			<li><a data-toggle="tab" href="#menu1" id="pubTab">Saga,Trilogia u Otro</a></li>		
			</ul>
	</h2>
 </div>
  
  <div class="row mt">			

			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<div class="col-lg-12">
	  					<div class="content-panel">
						    <h4>Libros</h4>
						    <br>
						    <table class="display responsive no-wrap datatable_wrapper" width="100%" id="BooksData">            
									<thead>
							        	<tr>
								          <th class="non-numeric">Titulo</th>
								          <th class="non-numeric">Portada</th>
								          <th class="non-numeric">Restriccion</th>
										  <th class="non-numeric">Proveedor</th>
								          <th class="non-numeric">Descripcion</th>
								          <th class="non-numeric">Saga,Trilogia u Otro</th>
								          <th class="non-numeric">Costo</th>
								          <th class="non-numeric">Archivo</th>
								          
								          <th class="non-numeric">Estatus</th>
							       		</tr>
							    	</thead>
							</table>
						</div>
					</div>
				</div>

				<div id="menu1" class="tab-pane fade">
					<div class="col-lg-12">
	  					<div class="content-panel">
						    
						    <h4>Saga,Trilogia u Otro</h4>
						    <br>
						    <table class="display responsive no-wrap datatable_wrapper" width="100%" id="PubChain">            
									<thead>
							        	<tr>
								          <th class="non-numeric">Nombre</th>
								          <th class="non-numeric">Imagen</th>
								          <th class="non-numeric">Restriccion</th>
										  <th class="non-numeric">Proveedor</th>
								          <th class="non-numeric">Descripcion</th>
								          <th class="non-numeric">Estatus</th>
							       		</tr>
							    	</thead>
							</table>
						</div>
					</div>

				</div>
			</div>

  </div>
	@include('promoter.modals.MegazineViewModals')

@endsection

@section('js')
<script>

	$(document).ready(function(){
		
		

		var Megazines = $('#BooksData').DataTable({
		    processing: true,
		    serverSide: true,
		    responsive: true,

		    ajax: '{!! url('BooksData') !!}',
		    columns: [
		        {data: 'title', name: 'title'},
		        {data: 'cover', name: 'cover'},
		        {data: 'rating_id', name: 'rating_id'},
		        {data: 'seller_id', name: 'seller_id'},
		        {data: 'sinopsis', name: 'sinopsis'},
		        {data: 'saga_id', name: 'saga_id'},
		        {data: 'cost', name: 'cost'},
		        {data: 'books_file', name: 'books_file'},
		        {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
		    ]
		});

		var PubChain = $('#PubChain').DataTable({
					processing: true,
					serverSide: true,
					responsive: true,

					ajax: '{!! url('BSagasDataTable') !!}',
					columns: [
					{data: 'sag_name', name: 'sag_name'},
					{data: 'img_saga', name: 'img_saga'},
					{data: 'rating_id', name: 'rating_id'},
					{data: 'seller_id', name: 'seller_id'},
					{data: 'sag_description', name: 'sag_description'},
					{data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
					]
				});

		$(document).on('click', '#status', function() {
			
			var x = $(this).val();

			 $( "#formStatusMegazine" ).on( 'submit', function(e){
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'books_status/'+x;
                    
                    var message=$('#razon1').val();

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
                                                        alert("Se ha "+s+" con exito");
                                                        ;
                                                        

                                                        },

                            error: function (result) {
							                            alert('Existe un Error en su Solicitud');
							                            console.log(result);
                           							 }
                            });  
                });
				
		});

		$(document).on('click', '#file_b', function() {
	       var x = $(this).val();
	       console.log(x);
	       $("#book_file").attr("src", x);
    	}); 

    	$(document).on('click', '#Status', function() {
    		var x = $(this).val();

    		 $( "#formStatus" ).on( 'submit', function(e){
                
                var s=$("input[type='radio'][name=status_p]:checked").val();
                var url = 'admin_chain/'+x;
                var message=$('#razon').val();

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
                                                        alert("Se ha "+s+" con exito");
                                                        $('#saga'+x).fadeOut();
                                                        

                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });
    	});   
	});
</script>
@endsection