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
                <h4 class="titelgeneral"><i class="material-icons small">book</i> Lectura</h4>
                <div class="row">
                    <div class="input-field col s12 m6 offset-m3">
                        <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchProfileAuthor')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar lectura</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php if($Lecturas->count() != 0 ): ?>
                        <?php $__currentLoopData = $Lecturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col s12 m3">
                          <div class="card" style="height: 430px">
                            <div class="card-image">
                              <?php if($lecturas->books_file): ?>
                              <a href="#myModal-<?php echo e($lecturas->id); ?>" class="modal-trigger">
                              <img src="<?php echo e(asset('/images/bookcover')); ?>/<?php echo e($lecturas->cover); ?>" width="100%" height="300px"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($lecturas->id); ?>" onclick="fnOpenNormalDialog('<?php echo $lecturas->cost; ?>','<?php echo $lecturas->title; ?>','<?php echo $lecturas->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                              <?php else: ?>
                              <a href="#myModalMeg-<?php echo e($lecturas->id); ?>" class="modal-trigger">
                              <img src="<?php echo e(asset($lecturas->cover)); ?>" width="100%" height="300px"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($lecturas->id); ?>" onclick="fnOpenNormalDialogMeg('<?php echo $lecturas->cost; ?>','<?php echo $lecturas->title; ?>','<?php echo $lecturas->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                              <?php endif; ?>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                  <p class="grey-text truncate"><?php echo e($lecturas->title); ?></p>
                                </div>
                                <div class="">
                                  <p class="grey-text"><b>Autor:</b>  <?php echo e($lecturas->seller->name); ?></p>
                                </div>
                                <div>
                                  <p class="grey-text"><b>Costo: </b> <?php echo e($lecturas->cost); ?> tickets</p>
                                </div>
                                <div class="col m12 s12">
                                <div class="grey-text">
                                  <?php if($lecturas->books_file): ?>
                                <p>Libro</p>
                                 <?php else: ?>
                                <p>Revista</p>
                                 <?php endif; ?>
                               </div>
                                </div> 
                            </div>
                          </div>
                        </div>

                        <!--MODAL DETALLE DE LIBRO-->
                             <?php if($lecturas->books_file): ?>
                                  <div id="myModal-<?php echo e($lecturas->id); ?>" class="modal">
                                  <?php else: ?>
                                  <div id="myModalMeg-<?php echo e($lecturas->id); ?>" class="modal">
                             <?php endif; ?>
                       
                            <div class="modal-content">
                                <div class="blue"><br>
                                    <h4 class="center white-text" ><i class="small material-icons">book</i> <?php echo e($lecturas->title); ?></h4>
                                    <br>
                                </div>
                                <div class="col s12 m4 offset-m1">
                             <br>

                              <?php if($lecturas->books_file): ?>
                              <a href="#myModal-<?php echo e($lecturas->id); ?>" class="modal-trigger">
                              <img src="<?php echo e(asset('/images/bookcover')); ?>/<?php echo e($lecturas->cover); ?>" width="100%" height="300"  id="panel"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a  class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($lecturas->id); ?>" onclick="fnOpenNormalDialog('<?php echo $lecturas->cost; ?>','<?php echo $lecturas->title; ?>','<?php echo $lecturas->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                              <?php else: ?>
                              <a href="#myModal-<?php echo e($lecturas->id); ?>" class="modal-trigger">
                              <img src="<?php echo e(asset($lecturas->cover)); ?>" width="100%" height="300"  id="panel"></a>
                              <!-- <span class="card-title">Card Title</span> -->
                              <a  class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.<?php echo e($lecturas->id); ?>" onclick="fnOpenNormalDialogMeg('<?php echo $lecturas->cost; ?>','<?php echo $lecturas->title; ?>','<?php echo $lecturas->id; ?>')"><i class="material-icons">add_shopping_cart</i></a>
                              <?php endif; ?>
                              <br><br>
                                </div>
                            </div>
                            <div class="col m7 s12">
                                <br>
                            <ul class="collection z-depth-1" style="color: black">
                                <!-- <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">create</i>
                                            <b class="left">Titulo original: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            <?php echo e($lecturas->original_title); ?>

                                        </div>
                                    </div>
                                </li> -->
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">turned_in</i>
                                            <b class="left">Géneros: </b>
                                        </div>
                                        <div class="col s12 m7">
                                             
                                             <?php if($lecturas->books_file): ?>
                                                <?php $__currentLoopData = $lecturas->tags_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class=""> <?php echo e($t->tags_name); ?> </span>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php else: ?>
                                               <?php $__currentLoopData = $lecturas->tags_megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class=""> <?php echo e($t->tags_name); ?> </span>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <?php endif; ?>


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
                                            <?php echo e($lecturas->rating->r_name); ?>

                                        </div>
                                    </div>
                                </li>

                           <?php if($lecturas->books_file): ?>
                                <?php if($lecturas->saga!=null): ?>
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">folder</i>
                                            <b class="left">Saga: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            <?php echo e($lecturas->saga->sag_name); ?>

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
                              <?php else: ?>
                                <?php if($lecturas->sagas!=null): ?>
                                <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">folder</i>
                                        <b class="left">Tipo de publicación: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        <?php echo e($lecturas->sagas->sag_name); ?>

                                    </div>
                                </div>
                            </li>
                            <?php else: ?>
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">folder</i>
                                        <b class="left">Tipo de publicación: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        Independiente
                                    </div>
                                </div>
                            </li>
                            <?php endif; ?>
                           <?php endif; ?>
                                <li class="collection-item" style="padding: 10px ">
                                    <div class="row">
                                        <div class="col s12 m5">
                                            <i class="material-icons circle left">local_play</i>
                                            <b class="left">Costo: </b>
                                        </div>
                                        <div class="col s12 m7">
                                            <?php echo e($lecturas->cost); ?> Tickets
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            </div>
                      <div class="col s12 m12" style="color: black">
                            <div class="card-panel">
                             
                              
                               <?php if($lecturas->books_file): ?>
                                <b class="left">Sinopsis:</b>
                                  <p><?php echo e($lecturas->sinopsis); ?></p>
                                  <?php else: ?>
                                   <b class="left">Descripción:</b>
                                  <p><?php echo e($lecturas->descripcion); ?></p>
                               <?php endif; ?>
                              
                            </div>
                      </div>
                            <div class="col s12 m12">
                                <div class="modal-footer">
                                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="row center">
                            <div class="col s12 m12">
                                <!--  Paginacion material -->
                                <?php /*Nuevo*/ $Lecturas->setPath('') ?>
                                <?php echo $Lecturas->appends(Input::except('page'))->render(); ?>

                            </div>
                        </div>
                        
                    <?php else: ?>
                    <div class="col m12">
                    <blockquote >
                        <i class="material-icons fixed-width large grey-text">book</i><br><h5 class="grey-text">No hay lecturas disponibles</h5>
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
<script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#seach').keyup(function(evento){
        $('#buscar').attr('disabled',true);
    });
    $('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
        source: "SearchAuthor",
        minLength: 2,
        select: function(event, ui){        
            $('#seach').val(ui.item.value);
            var valor = ui.item.value;
          console.log(ui.item.type);
            if (valor=='No se encuentra...'){
                $('#buscar').attr('disabled',true);
                swal('No se encuentra regitrado','','error');
            }else{
            $('#type').val(ui.item.type);
                $('#buscar').attr('disabled',false);
            }
        }

   });
  });
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
                    
            url:'BuyBook/'+id,
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
                      swal('El libro ya forma parte de su colección','','error');
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
                        swal('Libro comprado con exito','','success');
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
function fnOpenNormalDialogMeg(cost,name,id) {
  
   swal({
            title: "Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callbackMeg(true,id);
           
          } else {
            callbackMeg(false,id);
          }
        });
    };

function callbackMeg(value,id) {
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
                    
            url:'BuyMagazines/'+id,
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
                      swal('La revista ya forma parte de su colección','','error');
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
                      swal('Revista comprada con exito','','success');
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