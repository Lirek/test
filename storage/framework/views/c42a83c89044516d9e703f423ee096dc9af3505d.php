<?php $__env->startSection('css'); ?>


<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>
<style>


    .owl-theme .owl-nav [class*='owl-'] {
        transition: all .3s ease;
    }
    .owl-theme .owl-nav [class*='owl-'].disabled:hover {
        background-color: #D6D6D6;
    }

    owl-theme {
        position: relative;
    }

.owl-theme .owl-next, .owl-theme .owl-prev {
        width: 22px;
        height: 22px;
        position: absolute;
        top: 50%;
        transform: translateY(-125%)
    }
 .owl-theme .owl-prev {
        left: 10px;
    }
   .owl-theme .owl-next {
        right: 10px;
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>



      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <input type="hidden" name="id" id="id" value="<?php echo e(Auth::user()->created_at); ?>">
      <input type="hidden" name="verificacion" id="verificacion" value="<?php echo e(Auth::user()->verify); ?>">


                    <div class="row">
                    <?php if(Auth::user()->name==NULL || Auth::user()->last_name==NULL || Auth::user()->email==NULL || Auth::user()->num_doc==NULL || Auth::user()->fech_nac==NULL || Auth::user()->alias==NULL || Auth::user()->direccion==NULL): ?>
                      <!-- COMPLETAR PERFIL PANELS -->
                        <div class="col s12 m12">
                            <div class="card">
                                <div class="card-content grey-text">
                                    <span class="card-title blue-text"><h5><b><i class="material-icons">create</i> Complete Su Registro</b></h5></span>
                                    <p>Le recordamos que aun faltan documentos que adjuntar para disfrutar
                                        de todo lo que puede ofrecer nuestra plataforma, le invitamos
                                        completar su perfil.</p>
                                </div>
                                <div class="card-action ">
                                    <a class="waves-effect waves-light btn curvaBoton green" href="<?php echo e(url('EditProfile')); ?>"><i class="material-icons right">create</i>Completar Registro</a>
                                </div>
                            </div>
                        </div>
                          <br> <br>
                    <?php endif; ?>

                        <h4 class="titelgeneral"><i class="material-icons small">view_carousel</i> Cartelera</h4>
                        <br>



                        <!--CONTENIDO RECIENTE cine-->
                        <?php if(count($Movies)> 0 || count($Series)> 0): ?>
                            <div class="card">
                                <!--CONTENIDO RECIENTE pelicula-->
                                <?php if(count($Movies) > 0): ?>
                                    <div class="row">
                                        <div class="col s12 ">
                                            <a href="<?php echo e(url('ShowMovies')); ?>" >
                                            <h5 class="grey-text left"><i class="small material-icons" >movie</i> Pelicula</h5></a>
                                        </div>
                                        <div class="col s12 ">
                                            <div  class="owl-carousel owl-theme">
                                                <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <img src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($m->img_poster); ?>" height="250px" width="100px" >
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                        <div class="col s12 ">
                                            <a href="<?php echo e(url('ShowMovies')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <!--CONTENIDO RECIENTE serie-->
                                <?php if(count($Series) > 0): ?>
                                    <div class="row">
                                        <div class="col s12 ">
                                            <a href="<?php echo e(url('ShowSeries')); ?>" >
                                            <h5 class="grey-text left"><i class="mdi mdi-movie-roll"></i>Serie</h5></a>

                                        </div>
                                        <div class="col s12 ">
                                            <div  class="owl-carousel owl-theme">
                                                <?php $__currentLoopData = $Series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div>
                                                        <img src="<?php echo e(asset($m->cover)); ?>" height="250px" width="100px">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>

                                        </div>
                                        <div class="col s12 ">
                                            <a href="<?php echo e(url('ShowSeries')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <!--End  RECIENTE cine-->


        <!--CONTENIDO RECIENTE Lecturas-->
        <?php if(count($Book)> 0 || count($Megazines)> 0): ?>
        <div class="card">
            <?php if(count($Book)> 0): ?>
            <div class="row">
                <div class="col s12 ">
                    <a href="<?php echo e(url('ReadingsBooks')); ?>"> <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Libros</h5></a>
                </div>
                <div class="col s12 ">
                    <div  class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <img src="<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($b->cover); ?>" height="250px" width="100px" onclick="masInfo('libro',<?php echo $b->id; ?>)">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col s12 ">
                    <a href="<?php echo e(url('ReadingsBooks')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                </div>
            </div>
            <?php endif; ?>

            <?php if(count($Megazines)> 0): ?>
            <div class="row">
            <div class="col s12 ">
                <a href="<?php echo e(url('ReadingsMegazines')); ?>">
             <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Revista</h5></a>
            </div>
                <div class="col s12 ">
                    <div  class="owl-carousel owl-theme">
                      <?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div>
                           <img src="<?php echo e(asset($m->cover)); ?>" height="250px" width="100px">
                          </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>

                </div>

                <div class="col s12 ">
                    <a href="<?php echo e(url('ReadingsMegazines')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
     <!--End  RECIENTE Lecturas-->





                        <!--CONTENIDO RECIENTE Radio-->
                        <?php if(count($Radio)>0): ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('ShowRadio')); ?>"><h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5></a>
                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <a href="<?php echo e(url('ListenRadio/'.$r->id)); ?>" class="waves-effect waves-light">
                                                    <img src="<?php echo e(asset($r->logo)); ?>" height="150px" width="150px"  onclick="masInfo('radio')">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="col s12 ">
                                            <a href="<?php echo e(url('ShowRadio')); ?>" class="btn btn-small waves-effect waves-light right teal " style="margin: 10px;">Más</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    <!--End  RECIENTE radio-->


                        <!--CONTENIDO RECIENTE Tv-->
                        <?php if(count($Tv)>0): ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('ShowTv')); ?>">
                                        <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5></a>

                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <a  href="<?php echo e(url('PlayTv/'.$tv->id)); ?>" class="waves-effect waves-light">
                                                    <img src="<?php echo e(asset('/images/Tv/')); ?>/<?php echo e($tv->logo); ?>"  height="150px" width="150px" ></a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('ShowTv')); ?>" class="btn btn-small waves-effect waves-light right teal " style="margin: 10px;">Más</a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <!--End  RECIENTE tv-->

          <div id="modal-confirmation"></div> 

          <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
<script >

    $(document).ready(function(){

    var owl = $('.owl-carousel');
    owl.owlCarousel({
        //mergeFit:false,
        //merge:false,
        //pullDrag:false,
        //touchDrag:false,
        nav: false,
        loop:true,
        margin:10,
        responsiveClass:true,
        dots: true,
        //autoplay:true,
        //autoplayTimeout:3000,
        //autoplayHoverPause:true,
        //stagePadding: 50, centra los contenidos
        //lazyLoad:true, varia los tamaños de las imagenes
        responsive:{
            0:{
                items:2,
                nav:false
            },
            500:{
                items:3,
                nav:false
            },
            600:{
                items:4,
                nav:true
            },

            1000:{
                items:5,
                nav:true,
                loop:false
            },
        },
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    });
    });


//# sourceURL=pen.js
</script>
<script type="text/javascript">
//---------------------------------------------------------------------------------------------------
// Validacion cuando el usuario esta rechazado
$(document).ready(function(){
  var verificacion = $(':hidden#verificacion').val();
  console.log(verificacion);
  if (verificacion==2) {
    swal({
      className: "justify",
      title: "Verificación rechazada",
      text: "Le informamos que su verificación fue rechazada, por favor revise su bandeja de correos (incluida la de spam) para ampliar la información del rechazo y modifique su perfil para posterior revisión.",
      icon: "info",
      buttons: {
          accept: {
              text: "OK",
              value: true,
              className: "btn-swal-center"
          }
      }
  })
  .then((completar) => {
      var ruta = "<?php echo e(url('EditProfile')); ?>";
      $(location).attr('href',ruta);
  });
  }
});
// Validacion cuando el usuario esta rechazado
//---------------------------------------------------------------------------------------------------
//   $(document).ready(function(){
//   var f1 = document.getElementById('id').value;
//   var f = new Date();
//   var f2=f.getDate() + "/" +(f.getMonth()+1 )+ "/" + f.getFullYear();

//   var tiempo=restaFechas(f1,f2);
//   if (tiempo > 15){
//     document.getElementById('referir').style.display='none';  
//   }else{
//     var total=14-tiempo;
//     console.log(tiempo);
//     document.getElementById('mensaje').innerHTML='Usted cuenta con '+total +' dias para agregar un patrocinador';
//   }

// });
restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('-');
 var dFecha= aFecha1[2].split(' ');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,dFecha[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }
</script>
<script type="text/javascript">
  //---------VALIDACION PARA QUE EL CAMPO CODIGO NO ESTE VACIO---------------
      $(document).ready(function(){
        $('#codigo').keyup(function(evento){
            var codigo = $('#codigo').val().trim();
            console.log(codigo.length);
            if (codigo.length==0) {
                $('#codigoMen').show();
                $('#codigoMen').text('El campo no debe estar vacio');
                $('#codigoMen').css('color','red');
                $('#ingresar').attr('disabled',true);
            } else {
                $('#codigoMen').hide();
                $('#ingresar').attr('disabled',false);
            }
        });
    });
  //---------VALIDACION PARA QUE EL CAMPO APELLIDO NO ESTE VACIO---------------
    $(document).ready(function(){
        $('#lastname').keyup(function(evento){
            var apellido = $('#lastname').val().trim();
            console.log(apellido.length);
            if (apellido.length==0) {
                $('#apellidoMen').show();
                $('#apellidoMen').text('El campo no debe estar vacio');
                $('#apellidoMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#apellidoMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
    });
  //---------VALIDACION PARA QUE EL CAMPO CI NO ESTE VACIO---------------
    $(document).ready(function(){
        $('#nDocument').keyup(function(evento){
            var documento = $('#nDocument').val().trim();
            console.log(documento.length);
            if (documento.length==0) {
                $('#documentoMen').show();
                $('#documentoMen').text('El campo no debe estar vacio');
                $('#documentoMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#documentoMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO FECHA DE NACIMIENTO NO ESTE VACIO---------------
       $(document).ready(function(){
        $('#dateN').keyup(function(evento){
            var nacimiento = $('#dateN').val().trim();
            console.log(nacimiento.length);
            if (nacimiento.length==0) {
                $('#dateMen').show();
                $('#dateMen').text('El campo no debe estar vacio');
                $('#dateMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#dateMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
      });
//---------VALIDACION PARA QUE EL CAMPO FECHA NACIMINTO SEA MAYOR DE EDAD---------------
        $(document).ready(function(){
          $('#dateN').keyup(function(evento){
            var fecha = $('#dateN').val().trim();
        var values=fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        
        var f = new Date();
        var diaAc=f.getDate();
        var mesAc=(f.getMonth()+1 );
        var anoAc=f.getFullYear();        
 
        // realizamos el calculo
        var edad = (anoAc + 1900) - ano;
        if ( mesAc < mes )
        {
            edad--;
        }
        if ((mes == mesAc) && (diaAc < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
          
        if (edad < 18){
        $('#dateMen').show();
                $('#dateMen').text('Debe ser mayor de edad');
                $('#dateMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#dateMen').hide();
                $('#registro').attr('disabled',false);
            }
    })
  })
//---------VALIDACION PARA QUE EL CAMPO ALIAS NO ESTE VACIO---------------
       $(document).ready(function(){
        $('#alias').keyup(function(evento){
            var nacimiento = $('#alias').val().trim();
            console.log(nacimiento.length);
            if (nacimiento.length==0) {
                $('#aliasMen').show();
                $('#aliasMen').text('El campo no debe estar vacio');
                $('#aliasMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#aliasMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
      });
  //---------VALIDACION PARA SOLO INTRODUCIR LETRAS---------------
    function controltagLet(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
  //---------VALIDACION PARA SOLO INTRODUCIR NUMEROS---------------
    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
</script>
  
<script>
  //-------------COMPRA DE SINGLES---------
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
                    else
                    { 
                      swal('Cancion comprada con exito','','success');
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
  //-----COMPRA DE ALBUMS-----------------
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
<script>
function fnOpenNormalDialog3(cost,name,id) {


     swal({
            title: "Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback3(true,id);
           
          } else {
            callback3(false,id);
          }
        });
    };

function callback3(value,id) {
    if (value) {
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
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('El libro ya forma parte de su colección','','error');
                    }
                    else
                    { 
                      swal('Libro comprada con exito','','success');
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