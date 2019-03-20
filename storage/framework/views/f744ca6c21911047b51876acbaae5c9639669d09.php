<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

       <?php if($movie->count() != 0 ): ?>

       <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
          <div class="col s9">
            
          </div>
          <div class="col s3">
        
            <div class="col s12 m4 offset-m1">
              <br>
                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($m->id); ?>"onclick="fnOpenNormalDialog('<?php echo $m->cost; ?>','<?php echo $m->title; ?>','<?php echo $m->id; ?>')"><i class="material-icons">OBTENER</i></a>
                    <br><br>
                </div>
          </div>
          
        </div>
        
        <div class="row ">
          <div class="col s3">
            <img src="movie/poster/<?php echo e($m->img_poster); ?>" width="100%" height="300px"> 
          </div>
          
          <div class="col s9">
            
            <div class="row">
              <div class="col s12 m10 offset-m1" style="color: black">
          
               <?php
                    $url = $m->trailer_url;
                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                    $id = $matches[1];
                    $width = '800px';
                    $height = '450px';
                ?>
                <div class="embed-container">
                <iframe  type="text/html" width="700" height="420"
                    src="https://www.youtube.com/embed/<?php echo e($id); ?>"
                    frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe> 
                </div>
                
                
                    <div class="col m12 s12">
                      <br>
                            <ul class="collection z-depth-1" style="color: black">
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">create</i>
                                            <b class="left">Titulo original: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            <?php echo e($m->original_title); ?>

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
                                            <?php echo e($m->rating->r_name); ?>

                                        </div>
                                    </div>
                                </li>
                               <?php if($m->sagas!=null): ?>
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">folder</i>
                                            <b class="left">Saga: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            <?php echo e($m->saga->sag_name); ?>

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
                                            <?php echo e($m->cost); ?> Tickets
                                        </div>
                                    </div>
                                </li>
                               <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s3 ">
                                          <a class="btn btn-primary green curvaBoton  " href="#modal1">TRAILER</a>

                                        </div>
                                        <div class="col s3 ">
                                          <div class="btn blue curvaBoton">
                                            <i>SINOPSIS</i>
                                          </div>
                                        </div>
                                        <div class="col s3 ">
                                          
                                            <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($m->id); ?>"onclick="fnOpenNormalDialog('<?php echo $m->cost; ?>','<?php echo $m->title; ?>','<?php echo $m->id; ?>')"><i class="material-icons ">add_shopping_cart</i></a>
  
                                        </div>
                                        <div class="col s3 ">
                                    
                                               <a class="btn blue curvaBoton  " href="<?php echo e(url('ShowMovies')); ?>">ATRÁS</a>
                                        
                                        </div>
                                        
                                    </div>
                                </li> 
                            </ul>
                          </div> 
                
                
                
              </div>
            </div>
            
          
        
            
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php endif; ?>
     

     




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