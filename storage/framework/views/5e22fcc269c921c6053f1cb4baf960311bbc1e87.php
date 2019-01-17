<?php $__env->startSection('css'); ?>
<link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style>

    .swal-button--confirm {
      background-color: #4caf50;
    }
      .swal-button--confirm {
      color: : white;
    }

  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
				<span class="grey-text"><h4><b><i class="material-icons small">book</i> Peliculas</b></h4></span>
                <div class="row">
                	<div class="input-field col s12 m6 offset-m3">
                		<form method="POST"  id="SaveSong" action="<?php echo e(url('SearchMovieList')); ?>">
                			<?php echo e(csrf_field()); ?>

                			<i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar Pelicula</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                		</form>
                	</div>
                </div>
                <div class="row">
                	<?php if($Movie->count() != 0 ): ?>
                		<?php $__currentLoopData = $Movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Movies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<div class="col s12 m3">
		                  <div class="card" style="height: 430px">
		                    <div class="card-image">
		                        <a href="#myModal-<?php echo e($Movies->id); ?>" class="modal-trigger">
		                      <img src="movie/poster/<?php echo e($Movies->img_poster); ?>" width="100%" height="300px">
		                      </a>
		                      <!-- <span class="card-title">Card Title</span> -->
		                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($Movies->id); ?>" onclick="fnOpenNormalDialog('<?php echo $Movies->cost; ?>','<?php echo $Movies->title; ?>','<?php echo $Movies->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
		                    </div>
		                    <div class="card-content">
		                        <div class="col m12 s12">
		                            <p class="grey-text"><?php echo e($Movies->title); ?></p>
		                        </div>
		                        <div class="col m12 s12">
		                            <p class="grey-text"><b>Costo: </b> <?php echo e($Movies->cost); ?> tickets</p> 
		                        </div>
		                    </div>
		                  </div>
		                </div>

		                <!--MODAL DETALLES DE LIBRO-->
		                <div id="myModal-<?php echo e($Movies->id); ?>" class="modal">
						    <div class="modal-content">
						     	<div class="blue"><br>
						            <h4 class="center white-text" ><i class="small material-icons">movie</i> <?php echo e($Movies->title); ?></h4>
						            <br>
						     	</div>
						      	<div class="col s12 m4 offset-m1">
						      		<br>
			                    	<img src="movie/poster/<?php echo e($Movies->img_poster); ?>" width="100%" height="300"  id="panel">
			                    	<a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($Movies->id); ?>"onclick="fnOpenNormalDialog('<?php echo $Movies->cost; ?>','<?php echo $Movies->title; ?>','<?php echo $Movies->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
			                    	<br><br>
			                 	</div>
						    </div>
						    <div class="col m7 s12">
						    	<br>
		                    <ul class="collection z-depth-1" style="color: black">
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">create</i>
		                                    <b class="left">Titulo original: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    <?php echo e($Movies->original_title); ?>

		                                </div>
		                            </div>
		                        </li>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">star</i>
		                                    <b class="left">Categoria: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    <?php echo e($Movies->rating->r_name); ?>

		                                </div>
		                            </div>
		                        </li>
		                       <?php if($Movies->sagas!=null): ?>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">folder</i>
		                                    <b class="left">Saga: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    <?php echo e($Movies->saga->sag_name); ?>

		                                </div>
		                            </div>
		                        </li>
		                        <?php else: ?>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">folder</i>
		                                    <b class="left">Saga: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    No pertenece a una saga
		                                </div>
		                            </div>
		                        </li>
		                        <?php endif; ?>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">local_play</i>
		                                    <b class="left">Costo: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    <?php echo e($Movies->cost); ?> Tickets
		                                </div>
		                            </div>
		                        </li>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">subscriptions</i>
		                                    <b class="left">Trailer: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="<?php echo e($Movies->trailer_url); ?>" target="_blank">Reproducir</a>
		                                </div>
		                            </div>
		                        </li>
		                    </ul>
		                	</div>
		                	<br>
		                	<div class="col s12 m12" style="color: black">
		                		<div class="card-panel">
			                		<b class="left">Historia:</b>
			                		
			                		<p><?php echo e($Movies->based_on); ?></p>
		                		</div>
		                	</div>
		                	<div class="col s12 m4 offset-m8">
							    <div class="modal-footer">
							      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
							    </div>
							</div>
						</div>

                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		<div class="col m12">
                		<?php echo e($Movie->links()); ?>

                		</div>
                	<?php else: ?>
                	<div class="col m12">
		            <blockquote >
		                <i class="material-icons fixed-width large grey-text">movie</i><br><h5 class="grey-text">No hay peliculas disponibles</h5>
		            </blockquote>
		            <br>
		            </div>
                	<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<!-- <script>
function fnOpenNormalDialog(cost,name,id) {


    $("#modal-confirmation").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

    // Define the Dialog and its properties.
    $("#modal-confirmation").dialog({
        resizable: false,
        modal: true,
        title: "Confirmar",
        height: 250,
        width: 400,
        position: {
        	my: "center top",
			at: "center top",
			of: $("#principal"),
			within: $("#principal")
        },
        buttons: {
            	"Si": function () {
                $(this).dialog('close');
                callback(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback(false,id);
            }
        }
    });
}


function callback(value,id) {
    if (value) {
      swal({
                title: 'Procesando..!',
                text: 'Por favor espere..',
                buttons: false,
                closeOnEsc: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
         $.ajax({
                    
            url:'BuyMovie/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('La canción ya forma parte de su colección','','error');
                 
                    }
                    else
                    {	
                    var idUser=<?php echo Auth::user()->id; ?>;
                    $.ajax({ 
                
                      url     : 'MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                      
                    swal('Cancion comprada con exito','','success');

                  	}	 
                },
              error: function (result) 
                {
                      
                }

            });
    } else {
        return false;
    }
}
</script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function fnOpenNormalDialog(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback(true,id);
           
          } else {
            callback(false,id);
          }
        });
    };

function callback(value,id) {
    if (value) {
      swal({
                title: 'Procesando..!',
                text: 'Por favor espere..',
                buttons: false,
                closeOnEsc: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
         $.ajax({
                    
            url:'BuyMovie/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes tickets, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('La pelicula ya forma parte de su colección','','error');
                    }
                    else
                    {	
                    var idUser=<?php echo Auth::user()->id; ?>;
                    $.ajax({ 
                
                      url     : 'MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                    	swal('Pelicula comprada con exito','','success');
                  		 console.log(result);
                  	}	 
                },
              error: function (result) 
                {
                      
                }

            });
    } else {
        return false;
    }
}
</script>
<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchMovie",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Pelicula no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>