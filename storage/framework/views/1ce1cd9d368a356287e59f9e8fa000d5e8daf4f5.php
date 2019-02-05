<?php $__env->startSection('css'); ?>
<link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style>

    .swal-button--confirm {
      background-color: #4caf50;
    }
      .swal-button--confirm {
      color: white;
    }
    /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
                <h4 class="titelgeneral"><i class="mdi mdi-movie-roll"></i> Series</h4>
                <div class="row">
                	<div class="input-field col s12 m6 offset-m3">
                		<form method="POST"  id="SaveSong" action="<?php echo e(url('SearchSerieList')); ?>">
                			<?php echo e(csrf_field()); ?>

                			<i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar Serie</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                		</form>
                	</div>
                </div>
                <div class="row">
                	<?php if($Serie->count() != 0 ): ?>
                		<?php $__currentLoopData = $Serie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<div class="col s12 m3">
		                  <div class="card" style="height: 430px">
		                    <div class="card-image">
		                        <a href="#myModal-<?php echo e($Series->id); ?>" class="modal-trigger">
		                      <img src="<?php echo e(asset($Series->img_poster)); ?>" width="100%" height="300px">
		                      </a>
		                      <!-- <span class="card-title">Card Title</span> -->
		                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($Series->id); ?>" onclick="fnOpenNormalDialog('<?php echo $Series->cost; ?>','<?php echo $Series->title; ?>','<?php echo $Series->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
		                    </div>
		                    <div class="card-content">
		                        <div class="col m12 s12">
		                            <p class="grey-text"><?php echo e($Series->title); ?></p>
		                        </div>
		                        <div class="col m12 s12">
		                            <p class="grey-text"><b>Costo: </b> <?php echo e($Series->cost); ?> tickets</p> 
		                        </div>
		                    </div>
		                  </div>
		                </div>

		                <!--MODAL DETALLE DE Serie-->
		                <div id="myModal-<?php echo e($Series->id); ?>" class="modal">
						    <div class="modal-content">
						     	<div class="blue"><br>
						            <h4 class="center white-text" ><i class="small material-icons">movie</i> <?php echo e($Series->title); ?></h4>
						            <br>
						     	</div>
						      	<div class="col s12 m4 offset-m1">
						      		<br>
			                    	<img src="<?php echo e(asset($Series->img_poster)); ?>" width="100%" height="300"  id="panel">
			                    	<a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($Series->id); ?>" onclick="fnOpenNormalDialog('<?php echo $Series->cost; ?>','<?php echo $Series->title; ?>','<?php echo $Series->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
			                    	<br><br>
			                 	</div>
						    </div>
						    <div class="col m6 s12" style="color: black">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">turned_in</i>
                                    <b class="left">Géneros: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php $__currentLoopData = $Series->tags_serie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span> <?php echo e($t->tags_name); ?> </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">switch_video</i>
                                    <b class="left">Transmisión: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e($Series->status_series); ?>

                                </div>
                            </div>
                        </li>
                       <?php if($Series->saga_id!=null): ?>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">folder</i>
                                    <b class="left">Saga: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e($Series->saga->sag_name); ?>

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
                                    <?php echo e($Series->cost); ?> Tickets
                                </div>
                            </div>
                        </li>
                        <!-- <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">subscriptions</i>
                                    <b class="left">Trailer: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="<?php echo e($Series->trailer); ?>" target="_blank">Reproducir</a>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
                <div class="col s12 m10 offset-m1">
                  <?php
                            $url = $Series->trailer;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '800px';
                            $height = '450px';
                        ?>
                      <div class="embed-container">
                        <iframe  type="text/html" width="560" height="315"
                            src="https://www.youtube.com/embed/<?php echo e($id); ?>"
                            frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                      </div>
                </div>
                      <div class="col s12 m12" style="color: black">
                        <div class="card-panel">
                          <b class="left">Historia: </b>
                          
                          <p> <?php echo e($Series->story); ?></p>
                        </div>
                      </div>

                      <div class="col s12 m8 offset-m2" style="color: black">
                        <ul class="collapsible">
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons">movie</i>
                              Episodios:
                            </div>
                            <?php if($Series->Episode()): ?>
                                <?php $__currentLoopData = $Series->Episode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($episode->status =='Aprobado'): ?>
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s4">
                                            <p><a href="<?php echo e($episode->trailer_url); ?>" class="" target="_blank"><?php echo e($episode->episode_name); ?></a></p>
                                            </div>
                                            <div class="col s6">
                                                <?php echo e($episode->sinopsis); ?>

                                            </div>
                                            <div class="col s2">
                                                <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($Series->id); ?>" onclick="fnOpenNormalDialog2('<?php echo $episode->cost; ?>','<?php echo $episode->episode_name; ?>','<?php echo $episode->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                                            </div>
                                        </div>
                                    </div>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </li>
                        </ul>
                    </div>




		                	<div class="col s12 m12">
      							    <div class="modal-footer">
      							      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
      							    </div>
      							</div>
						</div>

                		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		<div class="col m12">
                		<?php echo e($Serie->links()); ?>

                		</div>
                	<?php else: ?>
                	<div class="col m12">
		            <blockquote >
		                <i class="material-icons fixed-width large grey-text">movie</i><br><h5 class="grey-text">No hay series disponibles</h5>
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
                    
            url:'BuySerie/'+id,
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
                      swal('La serie ya forma parte de su colección','','error');
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
                    	swal('Serie comprada con exito','','success');
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
<script>
function fnOpenNormalDialog2(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback2(true,id);
           
          } else {
            callback2(false,id);
          }
        });
    };

function callback2(value,id) {
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
                    
            url:'BuyEpisode/'+id,
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
                      swal('El episodio ya forma parte de su colección','','error');
                    }
                    else if (result==2) 
                    {
                      swal('La serie completa ya forma parte de colección','','error');
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
                      swal('Episodio comprado con exito','','success');
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
      	source: "SearchSerie",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Serie no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>