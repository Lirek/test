<?php $__env->startSection('content'); ?>

<div class="container">
	
	<br>
 <div class="row">
 		
 	  <div class="col-md-6">

 		<h1>Artistas Y Agrupaciones</h1>  	

		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 300px; height: 300px">
			  <!-- Indicators -->
 				<ol class="carousel-indicators">
	 				<?php $__currentLoopData = $MusicAuthors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $MusicAuthor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				<li data-target="#myCarousel" data-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->first ? 'active' : ''); ?>"></li>
					 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 				</ol>

 				<div class="carousel-inner" style="height: 100%">
  				<!-- Wrapper for slides -->
  					<?php $__currentLoopData = $MusicAuthors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $MusicAuthor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		    	<div class="item <?php echo e($loop->first ? ' active' : ''); ?>" style="
    				background-size: cover;
  					background-position: 50% 50%;
					background-image: url('<?php echo e(asset($MusicAuthor->photo)); ?>');
  					width: 100%;
  					height: 100%;
					">
      	    		<div class="carousel-caption"><h3><?php echo e($MusicAuthor->name); ?></h3></div>
      			</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 				</div>

  				<!-- Left and right controls -->

  				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    			<span class="glyphicon glyphicon-chevron-left"></span>
    			<span class="sr-only">Siguente</span>
  				</a>
  			
  				<a class="right carousel-control" href="#myCarousel" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right"></span>
    			<span class="sr-only">Anterior</span>
  				</a>
		</div>

	  </div>
     
     <div class="col-md-6">

     	<h1>Los Singles Mas Sonados</h1>

	  <div id="Singles" class="carousel slide" data-ride="carousel" style="width: 300px; height: 300px">
			  <!-- Indicators -->
 				<ol class="carousel-indicators">
	 				<?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    				<li data-target="#Singles" data-slide-to="<?php echo e($loop->index); ?>" class="<?php echo e($loop->first ? 'active' : ''); ?>"></li>
					 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 				</ol>

 				<div class="carousel-inner" style="height: 100%">
  				<!-- Wrapper for slides -->
  					<?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		    	<div class="item <?php echo e($loop->first ? ' active' : ''); ?>" style="
    				background-size: cover;
  					background-position: 50% 50%;
					background-image: url('<?php echo e(asset($Single->autors->photo)); ?>');
  					width: 100%;
  					height: 100%;
					">
      	    		<div class="carousel-caption">
      	    			<h3><?php echo e($Single->autors->name); ?></h3>
      	    			<p><?php echo e($Single->song_name); ?></p>
      	    			<p>
      	    				<button value1="<?php echo e($Single->id); ?>" value2="<?php echo e($Single->song_name); ?>" value3="<?php echo e($Single->cost); ?>" data-toggle="modal" data-target="#BuySingle" class="btn btn-primary btn-xs" id="Single" style="background-color: #13ec58"><i class="fa fa-ticket"></i> <?php echo e($Single->cost); ?>  Comprar</button>
      	    			</p>
      	    		</div>
      			</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 				</div>

  				<!-- Left and right controls -->

  				<a class="left carousel-control" href="#Singles" data-slide="prev">
    			<span class="glyphicon glyphicon-chevron-left"></span>
    			<span class="sr-only">Siguente</span>
  				</a>
  			
  				<a class="right carousel-control" href="#Singles" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right"></span>
    			<span class="sr-only">Anterior</span>
  				</a>
		</div>

	 </div>

 </div>
<div class="col-md-1"></div>
<h1>Todos los Singles</h1>

 <div class="row">
  
  <?php $__currentLoopData = $Singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Single): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-3">   
   <div class="card">
    <img src="<?php echo e(asset($Single->autors->photo)); ?>" alt="Autor Single" style="width:100%">
        <div class="container-card" style="background-color: gray">
          <h4><b><?php echo e($Single->song_name); ?></b></h4> 
            <p>·Costo<?php echo e($Single->cost); ?></p>
             <p>·Artista <?php echo e($Single->autors->name); ?></p>
               <?php $__currentLoopData = $Single->tags()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>· <?php echo e($tags->tags_name); ?></p> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <button value1="<?php echo e($Single->id); ?>" value2="<?php echo e($Single->song_name); ?>" value3="<?php echo e($Single->cost); ?>" data-toggle="modal" data-target="#BuySingle" class="btn btn-primary btn-xs" id="Single" style="background-color: #13ec58"><i class="fa fa-ticket"></i> <?php echo e($Single->cost); ?>  Comprar</button>
            </div>
        </div>

      </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 </div>


</div>

<div class="modal modal-primary fade" id="BuySingle" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color: rgb(35,181,230,0.5);">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

         <p id="SingleName"></p>
        

             <form method="POST"  id="SaveSong">
                              <?php echo e(csrf_field()); ?>



			<button type="submit" class="btn btn-primary" style="background-color: rgb(19,236,88, 0.5)">
                   Comprar
            </button>

             
         

        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

	
	
		$(document).on('click', '#Single',function() {
		  
  		var SongId = $(this).attr('value1');
		  var SongName = $(this).attr('value2');
		  var SongCost = $(this).attr('value3');
		  var modal = $('#BuySingle').modal();
		  modal.find('.modal-title').text( 'Desea Comprar '+SongName+'¿Con Un Valor de '+SongCost+' tickets?');
			
			       $( "#SaveSong" ).on( 'submit', function(e){
			       	  e.preventDefault();
			       	  
			       	  $.ajax({
			       	  		
			       	  		url:'BuySong/'+SongId,
			       	  		type: 'POST',
			       	  		data: {
			       	  				_token: $('input[name=_token]').val()
			       	  				},
			       	  		
			       	  		success: function (result) 
			       	  		{
			       	  			swal('Cancion Comprada Con Exito','','success');

			       	  			if (result==0) 
			       	  				{	
			       	  					swal('No Posee Suficientes Creditos Por Favor Recargue','','error');	
			       	  				}
			       	  			if (result==1) 
			       	  			{
			       	  				swal('La Cancion Ya Forma Parte de Su Coleccion','','error');
			       	  			}
			       	  		},
			       	  		error: function (result) 
			       	  		{
			       	  			
			       	  		}

			       	  });


			       });
		
		});
	
	
	    
		
  			$("#myInput").on("keyup", function() {
    			var value = $(this).val().toLowerCase();
    				 $("#myDIV *").filter(function() {
     				 $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   					 });
 				 });
			

		
	



</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>