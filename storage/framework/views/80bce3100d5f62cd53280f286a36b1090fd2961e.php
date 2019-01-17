<?php $__env->startSection('main'); ?>
 <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Singles</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="display responsive no-wrap" width="100%" id="Single">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
		          <th class="non-numeric">Autor</th>
		          <th class="non-numeric">Duracion</th>
				  <th class="non-numeric">Proveedor</th>
		          <th class="non-numeric">Costo en Tickets</th>
		          <th class="non-numeric">Cancion</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('promoter.modals.SinglesViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
	$(document).ready(function(){

		var MusicianTable = $('#Single').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '<?php echo url('SingleData'); ?>',
	        columns: [
	            {data: 'song_name', name: 'song_name'},
	            {data: 'autors_id', name: 'autors_id'},
	            {data: 'duration', name: 'duration'},
	            {data: 'Autors_name', name: 'Autors_name'},
	            {data: 'cost', name: 'cost'},
	            {data: 'song_file', name: 'song_file'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });

	 $(document).on('click', '#Status', function() {   
        
        var x = $(this).val();


        $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'admin_single/'+x;
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
                                                        MusicianTable.ajax.reload();
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>