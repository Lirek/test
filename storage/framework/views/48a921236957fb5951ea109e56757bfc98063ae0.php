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
                <h4 class="titelgeneral"><i class="material-icons small">music_note</i> Música</h4>

                <div class="row">
          <div class="input-field col s12 m6 offset-m3">
              <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchProfileArtist')); ?>">
                <?php echo e(csrf_field()); ?>

                <i class="material-icons prefix blue-text">search</i>
                  <input type="text" id="seach" name="seach" class="validate">
                  <input type="hidden" name="type" id="type">
                  <label for="seach">Buscar música</label><br>
                  <br>
                  <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
              </form>
          </div>
        </div>
        <div class="row">
          <?php if($Albums->count() != 0): ?>
            <?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col s12 m3">
                <div class="card" style="height: 430px">
                    <div class="card-image">
                      
                        <?php if($Album->cover): ?>
                        <a href="#myModal-<?php echo e($Album->id); ?>" class="modal-trigger">
                          <img src="<?php echo e(asset($Album->cover)); ?>" width="100%" height="300px">
                        </a>
                        <?php else: ?>
                        <img src="<?php echo e(asset('plugins/img/DefaultMusic.png')); ?>" width="100%" height="300px">
                        <?php endif; ?>
                      <!-- <span class="card-title">Card Title</span> -->
                      <?php if($Album->name_alb): ?>
                        <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog2('<?php echo $Album->cost; ?>','<?php echo $Album->name_alb; ?>','<?php echo $Album->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                      <?php else: ?>
                        
                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog('<?php echo $Album->cost; ?>','<?php echo $Album->title; ?>','<?php echo $Album->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                      <?php endif; ?>
                    </div>
                    <div class="card-content">
                      <div class="col m12">
                        <?php if($Album->name_alb): ?>
                          <p class="grey-text"><?php echo e($Album->name_alb); ?></p>
                        <?php else: ?>
                          <p class="grey-text"><?php echo e($Album->song_name); ?></p>
                        <?php endif; ?>
                      </div>
                      <div class="">
                        <small class="grey-text"><b>Artistas: </b>
                          <?php echo e($Album->autors->name); ?>  
                        </small>
                      </div>
                      <div class="">
                        <small class="grey-text"><b>Costo: </b> <?php echo e($Album->cost); ?> tickets</small>
                      </div>
                        <?php if($Album->name_alb): ?>
                          <small class="grey-text">Album</small>
                        <?php else: ?>
                          <small class="grey-text">Sencillo</small>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>

            <!-- /.modal  de sagas  -->
            <div id="myModal-<?php echo e($Album->id); ?>" class="modal" >
                <div class="modal-content">
                    <div class=" blue"><br>
                        <h4 class="center white-text" ><i class="small material-icons">audiotrack</i>"<?php echo e($Album->name_alb); ?>"</h4>
                        <br>
                    </div>
                    <br>
                    <div class="col s12 m6">
                        <img src="<?php echo e(asset($Album->cover)); ?>" width="100%" height="300px">
                    </div>
                    <div class="col s12 m6">
                        <small>Canciones:</small>
                        <ul class="collection z-depth-1" id="Playlist" style="color: black">
                          <?php if($Album->Songs): ?>
                            <?php $__currentLoopData = $Album->Songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                  <div class="col s8">
                                   <?php echo e($song->song_name); ?>

                                  </div> 
                                  <div class="col s4">
                                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" onclick="fnOpenNormalDialog('<?php echo $song->cost; ?>','<?php echo $song->title; ?>','<?php echo $song->id; ?>')" ><i class="material-icons">add_shopping_cart</i></a>
                                  </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="modal-footer col s12">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <div class="col m12">
                <blockquote >
                    <i class="material-icons fixed-width large grey-text">audiotrack</i><br><h5 class="grey-text">No hay música disponible</h5>
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
<script>
function fnOpenNormalDialog(cost,name,id) {


     swal({
            title: "Estas seguro?",
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
                    
            url:'BuySong/'+id,
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
                    else if (result==2) 
                    {
                      swal('El album completo ya forma parte de colección','','error');
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
        source: "SearchArtist",
        minLength: 1,
        select: function(event, ui){    
          $('#seach').val(ui.item.value);
          var valor = ui.item.value;
          console.log(valor);
          if (valor=='No se encuentra...'){
            $('#buscar').attr('disabled',true);
            swal('Canción o Album no se encuentra regitrado','','error');
          }else{
            $('#buscar').attr('disabled',false);
          }
        }

   });
  });
</script>

<script>
function fnOpenNormalDialog2(cost,name,id) {

    
    swal({
            title: "Estas seguro?",
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
                    
            url:'BuyAlbum/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                    }
                    else if (result==1) 
                    {
                      swal('El album ya forma parte de su colección','','error');
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
                      swal('Album comprado con exito','','success');
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>