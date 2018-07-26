<?php $__env->startSection('main'); ?>
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Singles</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="display responsive no-wrap" width="100%" id="Album">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre Del Album</th>
		          <th class="non-numeric">Autor</th>
		          <th class="non-numeric">Duracion</th>
				  <th class="non-numeric">Proveedor</th>
				  <th class="non-numeric">Portada</th>
		          <th class="non-numeric">Costo en Tickets</th>
		          <th class="non-numeric">Numero de Canciones</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
  </div>

  <div class="row mt">
  	<div class="col-md-10">
		<div class="content-panel">
                <table id="song_table" class="table table-bordered table-striped table-condensed">            
                        <thead>
                                <tr>
                                  
                                  <th>Nombre</th>
                                  <th>Duracion</th>
                                  <th>Archivo</th>
                                </tr>
                            </thead>
                            <tbody id="body_s">
                                
                            </tbody>
                </table>
		</div>
	</div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('promoter.modals.AlbumsViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
	$(document).ready(function(){

		var MusicianTable = $('#Album').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '<?php echo url('AlbumDataTable'); ?>',
	        columns: [
	            {data: 'name_alb', name: 'name_alb'},
	            {data: 'autors_id', name: 'autors_id'},
	            {data: 'duration', name: 'duration'},
	            {data: 'Autors_name', name: 'Autors_name'},
	            {data: 'cover', name: 'cover'},
	            {data: 'cost', name: 'cost'},
	            {data: 'songs', name: 'songs'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });

	 $(document).on('click', '#Status', function() {   
        
        var x = $(this).val();


       $( "#formStatus" ).on( 'submit', function(e)
            {
	            var s=$("input[type='radio'][name=status]:checked").val();
	            var url = 'admin_album/'+x;
	            console.log(s);
	            e.preventDefault();
	            $.ajax({
	                    url: url,
	                    type: 'post',
	                    data: {
	                            _token: $('input[name=_token]').val(),
	                            status: s,
	                          }, 
	                    success: function (result) {

	                                                $('#myModal').toggle();
	                                                $('.modal-backdrop').remove();
	                                                alert("Se ha "+s+" con exito");
	                                                $('#album'+x).fadeOut();
	                                                },

	                    error: function (result) {
	                    alert('Existe un Error en su Solicitud');
	                    console.log(result);
	                    }
	                    });  
                                    });

       });
		

	 $(document).on('click', '#songs', function() {    
        var x = $(this).val();
        
            $.ajax({ 
                type    : "get",
                url     : "admin_songs/"+x,
                dataType: "json",
                
                success: function (data) 
                {
                    
                    var table = document.getElementById("song_table");
                    
                    $("#song_table").find("tr:gt(0)").remove();

                    
                    $.each(data, function( index, value ) 
                    {

                        var row = table.insertRow();
                        var name = row.insertCell();
                        var dur = row.insertCell();
                        var ar = row.insertCell();
                        name.innerHTML = value['song_name'];
                        dur.innerHTML = value['duration'];
                        ar.innerHTML = '<audio controls="" src="'+value['song_file']+'"><source src="'+value['song_file']+'" type="audio/mpeg"></audio>';

                    });

                    
                    
                      //console.log(data);          
                } 
                });

            });

	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>