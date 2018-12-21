@extends('layouts.app')
@section('css')


<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>

@endsection

@section('main')     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      @include('flash::message')
      <input type="hidden" name="id" id="id" value="{{Auth::user()->created_at}}">
      <input type="hidden" name="verificacion" id="verificacion" value="{{Auth::user()->verify}}">


                    <div class="row">
                    @if(Auth::user()->name==NULL || Auth::user()->last_name==NULL || Auth::user()->email==NULL || Auth::user()->num_doc==NULL || Auth::user()->fech_nac==NULL || Auth::user()->alias==NULL || Auth::user()->direccion==NULL)
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
                                    <a class="waves-effect waves-light btn curvaBoton green" href="{{url('EditProfile')}}"><i class="material-icons right">create</i>Completar Registro</a>
                                </div>
                            </div>
                        </div>
                    @endif

                        <h4 class="titelgeneral"><i class="material-icons small">apps</i> Cartelera</h4>
                        <br>



                        <!--CONTENIDO RECIENTE cine-->
                        @if(count($Movies)> 0 || count($Series)> 0)
                            <div class="card">
                                <!--CONTENIDO RECIENTE pelicula-->
                                @if(count($Movies)> 0)
                                    <div class="row">
                                        <div class="col s12 ">
                                            <h5 class="grey-text left"><i class="small material-icons" >movie</i> Pelicula</h5>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="owl-carousel">
                                                @foreach($Movies as $m)
                                                    <div>
                                                        <img src="{{asset('movie/poster')}}/{{$m->img_poster}}" height="250px" width="100px" >
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            <!--CONTENIDO RECIENTE serie-->
                                @if(count($Series) > 0)
                                    <div class="row">
                                        <div class="col s12 ">
                                            <h5 class="grey-text left"><i class="mdi mdi-movie-roll"></i>Serie</h5>
                                        </div>
                                        <div class="col s12 ">
                                            <div class="owl-carousel">
                                                @foreach($Series as $s)
                                                    <div>
                                                        <img src="{{ asset($m->cover)}}" height="250px" width="100px">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    <!--End  RECIENTE cine-->


        <!--CONTENIDO RECIENTE Lecturas-->
        @if(count($Book)> 0 || count($Megazines)> 0)
        <div class="card">
            @if(count($Book)> 0)
            <div class="row">
                <div class="col s12 ">
                    <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Libros</h5>
                </div>
                <div class="col s12 ">
                    <div class="owl-carousel">
                        @foreach($Book as $b)
                            <div>
                                <img src="{{ asset('images/bookcover/') }}/{{$b->cover }}" height="250px" width="100px" onclick="masInfo('libro',{!!$b->id!!})">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if(count($Megazines)> 0)
            <div class="row">
            <div class="col s12 ">
             <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Revista</h5>
            </div>
                <div class="col s12 ">
                  <div class="owl-carousel">
                      @foreach($Megazines as $m)
                          <div>
                           <img src="{{ asset($m->cover)}}" height="250px" width="100px">
                          </div>
                      @endforeach
                      @foreach($Megazines as $m)
                              <div>
                              <img src="{{ asset($m->cover)}}" height="250px" width="100px">
                              </div>
                        @endforeach
                  </div>
                </div>
            </div>
            @endif
        </div>
        @endif
     <!--End  RECIENTE Lecturas-->





                        <!--CONTENIDO RECIENTE Radio-->
                        @if(count($Radio)>0)
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5>
                                    </div>
                                    <div class="col s12 ">
                                        <div class="owl-carousel">
                                            @foreach($Radio as $r)
                                                <div>
                                                    <img src="{{asset($r->logo)}}" height="150px" width="150px"  onclick="masInfo('radio')">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    <!--End  RECIENTE radio-->


                        <!--CONTENIDO RECIENTE Tv-->
                        @if(count($Tv)>0)
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5>
                                    </div>
                                    <div class="col s12 ">
                                        <div class="owl-carousel">
                                            @foreach($Tv as $tv)
                                                <div>
                                                    <img src="{{ asset('/images/tv/') }}/{{ $tv->logo }}"  height="150px" width="150px" >
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    <!--End  RECIENTE tv-->

          <div id="modal-confirmation"></div> 

          @endsection

@section('js')
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
        loop:true,
        nav:true,
        margin:10,
        responsiveClass:true,
        //autoplay:true,
        //autoplayTimeout:3000,
        //autoplayHoverPause:true,
        //stagePadding: 50, centra los contenidos
        //lazyLoad:true, varia los tamaños de las imagenes
        responsive:{
            0:{
                items:2,
                nav:true
            },
            500:{
                items:3,
                nav:true
            },
            600:{
                items:4,
                nav:false
            },

            1000:{
                items:5,
                nav:true,
                loop:false
            },
        }
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
      var ruta = "{{url('EditProfile')}}";
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
@endsection