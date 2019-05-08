<?php $__env->startSection('css'); ?>


<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>
<style>
    .owl-carousel.owl-drag .owl-item {
        padding-left: 2px ;
        padding-right: 2px;
    }

    .owl-nav {
        padding: 0px;
    }

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
    <!-- ******************************************************************************************************************
    MAIN CONTENT
    ********************************************************************************************************************-->
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
                        <p>Le recordamos que aun faltan documentos que adjuntar para disfrutar de todo lo que puede ofrecer nuestra plataforma, le invitamos completar su perfil.</p>
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
        <?php if(count($cine)> 0): ?>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo e(url('ShowMovies')); ?>">
                        <h5 class="grey-text left"><i class="small material-icons">movie</i> Cine</h5>
                    </a>
                </div>
                <div class="col s12">
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $cine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                
                            
                            <div class="card">
                                <div class="card-image">
                                    <?php if($ci['type']=='Pelicula'): ?>
                                       <?php if($ci['adquirido']): ?>
                                       <a class="waves-effect waves-light " href="<?php echo e(url('PlayMovie/'.$ci['id'])); ?>">
                                       <img  src="<?php echo e(asset($ci['img_poster'])); ?>" id="img_cartelera_largo">
                                       </a>

                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="<?php echo e(url('PlayMovie/'.$ci['id'])); ?>">
                                            <i class="small material-icons">movie</i>
                                        </a>
                                        <?php else: ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('PlayMovie/'.$ci['id'])); ?>">
                                            <img  src="<?php echo e(asset($ci['img_poster'])); ?>" id="img_cartelera_largo" href="<?php echo e(url('PlayMovie/'.$ci['id'])); ?>">                                   
                                               </a>
                                        
                                       
                                       <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog5('<?php echo $ci['cost']; ?>','<?php echo $ci['title']; ?>','<?php echo $ci['id']; ?>')">
                                            <i class="small material-icons">movie</i>
                                        </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($ci['adquirido']): ?>
                                        <a class=" waves-effect waves-light " href="<?php echo e(url('PlaySerie/'.$ci['id'])); ?>">
                                         <img  src="<?php echo e(asset($ci['img_poster'])); ?>" id="img_cartelera_largo">
                                         </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="<?php echo e(url('PlaySerie/'.$ci['id'])); ?>">
                                            <i class="mdi mdi-movie-roll"></i>
                                        </a>
                                         <?php else: ?>
                                         <a class="waves-effect waves-light " href="<?php echo e(url('PlaySerie/'.$ci['id'])); ?>">
                                            <img  src="<?php echo e(asset($ci['img_poster'])); ?>" id="img_cartelera_largo">
                                        </a>
                                         <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog6('<?php echo $ci['cost']; ?>','<?php echo $ci['title']; ?>','<?php echo $ci['id']; ?>')">
                                            <i class="small material-icons">movie</i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="card-action">
                                    <b class="grey-text truncate"><?php echo e($ci['title']); ?></b>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End  RECIENTE cine-->

        <!--CONTENIDO RECIENTE musica-->
        <?php if(count($musica)> 0): ?>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo e(url('MusicContent')); ?>">
                        <h5 class="grey-text left">
                            <i class="small material-icons">music_note</i> Música
                        </h5>
                    </a>
                </div>
                <div class="col s12">
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $musica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-image">
                                    <?php if($m['type']=='Album'): ?>
                                        <?php if($m['adquirido']): ?>
                                        <a class="waves-effect waves-light  " href="<?php echo e(url('MyAlbums/'.$m['id'])); ?>">
                                        <img src="<?php echo e(asset($m['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green " href="<?php echo e(url('MyAlbums/'.$m['id'])); ?>">
                                            <i class="small material-icons">library_music</i>
                                        </a>
                                        <?php else: ?>
                                        <a class="waves-effect waves-light  " href="<?php echo e(url('MyAlbums/'.$m['id'])); ?>">
                                            <img src="<?php echo e(asset($m['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog1('<?php echo $m['cost']; ?>','<?php echo $m['title']; ?>','<?php echo $m['id']; ?>')">
                                            <i class="small material-icons">library_music</i>
                                        </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($m['adquirido']): ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('MySingles/'.$m['id'])); ?>">
                                            <img src="<?php echo e(asset($m['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="<?php echo e(url('MySingles/'.$m['id'])); ?>">
                                            <i class="small material-icons">music_note</i>
                                        </a>
                                        <?php else: ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('MySingles/'.$m['id'])); ?>">
                                            <img src="<?php echo e(asset($m['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                         <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($m['id']); ?>" onclick="fnOpenNormalDialog2('<?php echo $m['cost']; ?>','<?php echo $m['title']; ?>','<?php echo $m['id']; ?>')">
                                            <i class="small material-icons">music_note</i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="card-action">
                                    <b class="grey-text truncate"><?php echo e($m['title']); ?></b>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End RECIENTE musica-->

        <!--CONTENIDO RECIENTE Lecturas-->
        <?php if(count($lectura)> 0): ?>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo e(url('ReadingsBooks')); ?>">
                        <h5 class="grey-text left">
                            <i class="material-icons">bookmark_border</i>Lectura
                        </h5>
                    </a>
                </div>
                <div class="col s12">
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $lectura; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $le): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                
                            
                            <div class="card">
                                <div class="card-image">

                                    <?php if($le['type']=='Libro'): ?>
                                        <?php if($le['adquirido']): ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('ShowMyReadBook/'.$le['id'])); ?>" >
                                        <img src="<?php echo e(asset($le['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="<?php echo e(url('ShowMyReadBook/'.$le['id'])); ?>" >
                                            <i class="small material-icons">book</i>
                                        </a>
                                        <?php else: ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('ShowMyReadBook/'.$le['id'])); ?>" >
                                            <img src="<?php echo e(asset($le['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog3('<?php echo $le['cost']; ?>','<?php echo $le['title']; ?>','<?php echo $le['id']; ?>')">
                                            <i class="small material-icons">book</i>
                                        </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                         <?php if($le['adquirido']): ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('ShowMyReadMegazine/'.$le['id'])); ?>" >
                                        <img src="<?php echo e(asset($le['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="<?php echo e(url('ShowMyReadMegazine/'.$le['id'])); ?>" >
                                            <i class="mdi mdi-book-open-variant"></i>
                                        </a>
                                        <?php else: ?>
                                        <a class="waves-effect waves-light " href="<?php echo e(url('ShowMyReadMegazine/'.$le['id'])); ?>" >
                                            <img src="<?php echo e(asset($le['cover'])); ?>" id="img_cartelera_largo">
                                        </a>
                                        <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.<?php echo e($le['id']); ?>" onclick="fnOpenNormalDialog4('<?php echo $le['cost']; ?>','<?php echo $le['title']; ?>','<?php echo $le['id']; ?>')">
                                            <i class="mdi mdi-book-open-variant"></i>
                                        </a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="card-action">
                                    <b class="grey-text truncate"><?php echo e($le['title']); ?></b>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End  RECIENTE Lecturas-->

        <!--CONTENIDO RECIENTE Radio-->
        <?php if(count($radio)>0): ?>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo e(url('ShowRadio')); ?>">
                        <h5 class="grey-text left">
                            <i class="material-icons">radio</i> Radio
                        </h5>
                    </a>
                </div>
                <div class="col s12">
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-image">
                                    <a class="waves-effect waves-light " href="<?php echo e(url('ListenRadio/'.$r['id'])); ?>">
                                        <img src="<?php echo e(asset($r['logo'])); ?>" id="img_cartelera_cuadro" onclick="masInfo('radio')">
                                    </a>
                                    <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="<?php echo e(url('ListenRadio/'.$r['id'])); ?>">
                                        <i class="material-icons">radio</i>
                                    </a>
                                </div>
                                <div class="card-action">
                                    <b class="grey-text truncate"><?php echo e($r['name']); ?></b>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End  RECIENTE radio-->

        <!--CONTENIDO RECIENTE Tv-->
        <?php if(count($tv)>0): ?>
            <div class="row">
                <div class="col s12">
                    <a href="<?php echo e(url('ShowTv')); ?>">
                        <h5 class="grey-text left">
                            <i class="mdi mdi-television-classic"></i> Televisión
                        </h5>
                    </a>
                </div>
                <div class="col s12">
                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                
                                    
                            
                            <div class="card">
                                <div class="card-image">
                                    <a class="waves-effect waves-light" href="<?php echo e(url('PlayTv/'.$tv['id'])); ?>">
                                        <img src="<?php echo e(asset($tv['logo'])); ?>" id="img_cartelera_cuadro" onclick="masInfo('radio')">
                                    </a>
                                    <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="<?php echo e(url('PlayTv/'.$tv['id'])); ?>">
                                        <i class="mdi mdi-television-classic"></i>
                                    </a>
                                </div>
                                <div class="card-action">
                                    <b class="grey-text truncate"><?php echo e($tv['name']); ?></b>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--End  RECIENTE tv-->

        <div id="modal-confirmation"></div>
    </div>
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
        loop:false,
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
            800:{
                items:4,
                nav:true,
                loop:false
            },
            950:{
                items:4,
                nav:true,
                loop:false
            },
            1150:{
                items:5,
                nav:true,
                loop:false
            },
            1300:{
                items:6,
                nav:true,
                loop:false
            },
            1470:{
                items:8,
                nav:true,
                loop:false
           },
            1600:{
                items:9,
                nav:true,
                loop:false
           },

           2000:{
                items:11,
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
    //-------------COMPRA DE ALBUMS-----------------
    function fnOpenNormalDialog1(cost,name,id) {
        swal({
            title: "¿Está seguro?",
            text: '¿Desea comprar el álbum '+name+' con un valor de '+cost+' tickets?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                callback1(true,id);
            } else {
                callback1(false,id);
            }
        });
    };

    function callback1(value,id) {
        if (value) {
            $.ajax({
                url:"<?php echo e(url('BuyAlbum/')); ?>/"+id,
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function (result) {
                    if (result==0) {
                        swal('No posee suficientes creditos, por favor recargue','','error');
                    } else if (result==1) {
                        swal('El album ya forma parte de su colección','','error');
                    } else {
                        swal('Album comprado con exito','','success');
                        // console.log(result);
                        
                        setTimeout(function(){
                          location.href="<?php echo e(('MyAlbums')); ?>/"+id;  
                      },2000);
                    }
                },
                error: function (result) {
                    console.log(result);
                }
            });
        } else {
            return false;
        }
    }
    //-------------COMPRA DE ALBUMS-----------------
</script>
<script>
    //----------------COMPRA DE SINGLES---------------
    function fnOpenNormalDialog2(cost,name,id) {
        swal({
            title: "¿Está seguro?",
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
                url:"<?php echo e(url('BuySong/')); ?>/"+id,
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function (result) {
                    console.log(result);
                    if (result==0) {
                        swal('No posee suficientes creditos, por favor recargue','','error');
                    } else if (result==1) {
                        swal('La canción ya forma parte de su colección','','error');
                    } else {
                        swal('Cancion comprada con exito','','success');
                        setTimeout(function(){
                          location.href="<?php echo e(('MySingles')); ?>/"+id;  
                      },2000);
                    }
                },
                error: function (result) {
                    console.log(result);
                }
            });
        } else {
            return false;
        }
    }
    //----------------COMPRA DE SINGLES---------------
</script>

<script>
    //----------------COMPRA DE LIBROS---------------
    function fnOpenNormalDialog3(cost,name,id) {
        swal({
            title: "¿Está seguro?",
            text: '¿Desea comprar el libro '+name+' con un valor de '+cost+' tickets?',
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
                url:"<?php echo e(url('BuyBook/')); ?>/"+id,
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function (result) {
                    console.log(result);
                    if (result==0) {
                        swal('No posee suficientes creditos, por favor recargue','','error');
                    } else if (result==1) {
                        swal('El libro ya forma parte de su colección','','error');
                    } else {
                        swal('Libro comprada con exito','','success');
                        setTimeout(function(){
                          location.href="<?php echo e(('ShowMyReadBook')); ?>/"+id;  
                      },2000);
                    }
                },
                error: function (result) {
                    console.log(result);
                }
            });
        } else {
            return false;
        }
    }
    //----------------COMPRA DE LIBROS---------------

    //----------------COMPRA DE REVISTAS---------------
    function fnOpenNormalDialog4(cost,name,id) {
        swal({
            title: "¿Está seguro?",
            text: '¿Desea comprar la revista '+name+' con un valor de '+cost+' tickets?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                callback4(true,id);
            } else {
                callback4(false,id);
            }
        });
    };
    function callback4(value,id) {
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
                url:"<?php echo e(url('BuyMagazines/')); ?>/"+id,
                type: 'POST',
                data: {
                    _token: $('input[name=_token]').val()
                },
                success: function (result) {
                console.log(result);
                    if (result==0) {
                        swal('No posee suficientes tickets, por favor recargue','','error');
                    } else if (result==1) {
                        swal('La revista ya forma parte de su colección','','error');
                    } else {
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
                        setTimeout(function(){
                          location.href="<?php echo e(('ShowMyReadMegazine')); ?>/"+id;  
                      },2000);
                    }
                },
                error: function (result) {
                    console.log(result);
                }
            });
        } else {
            return false;
        }
    }
</script>

<!------------------COMPRA DE PELICULAS----------------->

<script>
function fnOpenNormalDialog5(cost,name,id) {

   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback5(true,id);

          } else {
            callback5(false,id);
          }
        });
    };

function callback5(value,id) {
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
                        setTimeout(function(){
                          location.href="<?php echo e(('PlayMovie')); ?>/"+id;  
                      },2000);
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

<!-- ----------------COMPRA DE PELICULAS----------------->

<script>
function fnOpenNormalDialog6(cost,name,id) {

   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback6(true,id);

          } else {
            callback6(false,id);
          }
        });
    };

function callback6(value,id) {
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
                        setTimeout(function(){
                          location.href="<?php echo e(('PlaySerie')); ?>/"+id;  
                      },2000);
                    
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