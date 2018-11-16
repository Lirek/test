@extends('layouts.app')
@section('css')


<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css'>

<style class="">
    .gly-spin {
        -webkit-animation: spin 0.8s infinite linear;
        -moz-animation: spin 0.8s infinite linear;
        -o-animation: spin 0.8s infinite linear;
        animation: spin 0.8s infinite linear;
    }

    .justify {
      text-align: justify;
    }


.swiper-container {
        width: 90%;
        height: 90%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      /*width:90%;*/ 
    }

</style>
@endsection

@section('main')     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      @include('flash::message')
      <input type="hidden" name="id" id="id" value="{{Auth::user()->created_at}}">
      <input type="hidden" name="verificacion" id="verificacion" value="{{Auth::user()->verify}}">
              
                
                  
                    <div class="row mtbox" id="principal" style="margin-top: -8px">
                      
                    <!-- <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1" style="margin-left: 5%">
                          <span class="li_video"></span>
                          <h3>{{$TransactionsMovies}}</h3>
                        </div>
                        
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_music"></span>
                          <h3>{{$TransactionsMusic}}</h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_vallet"></span>
                          <h3>{{$TransacctionsLecture}}</h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_sound"></span>
                          <h3>{{$TransactionsRadio}}</h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_tv"></span>
                          <h3>{{$TransactionsTv}}</h3>
                        </div>
                        
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <h3>Total</h3>
                          <br>
                          <h3>{{$TransactionsMovies + $TransactionsMusic + $TransacctionsLecture + $TransactionsRadio + $TransactionsTv}}</h3>
                        </div>
                      
                      </div>
                    </div> -->
                    </div>  
                    
                    <div class="row mt">
                    @if(Auth::user()->name==NULL || Auth::user()->last_name==NULL || Auth::user()->email==NULL || Auth::user()->num_doc==NULL || Auth::user()->fech_nac==NULL || Auth::user()->alias==NULL || Auth::user()->direccion==NULL)
                      <!-- COMPLETAR PERFIL PANELS -->
                      <div class="col-md-11 col-sm-11 mb" style="margin-left: 2%">
                        <div class="white-panel panRf pe donut-chart">
                          <div class="white-header">
                             <h5>Complete Su Registro</h5>
                          </div>
                          <div class="row">
                             <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                                <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                                <div class="paragraph">
                                  <p class="center ">Le recordamos que aun faltan documentos que adjuntar para disfrutar de todo lo que puede ofrecer nuestra plataforma, le invitamos completar su perfil.</p>
                                    <p><a href="{{url('EditProfile')}}" class="buttonCenter">Completar Registro</a></p>

                                    {{--
                                    <!--MODAL-->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                       <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Complete sus datos</h4>
                                            </div>
                                            <div class="modal-body">
                                              <form class="form-horizontal" method="POST" action="{{url('CompleteProfile')}}" enctype="multipart/form-data">{{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                    <label for="lastname" class="col-md-4 control-label">Apellido</label>
                                                    <div id="apellidoMen"></div>
                                                    <div class="col-md-6">
                                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required="required" onkeypress="return controltagLet(event)">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('nDocument') ? ' has-error' : '' }}">
                                                    <label for="nDocument" class="col-md-4 control-label">N° Documento</label>
                                                    <div id="documentoMen"></div>
                                                    <div class="col-md-6">
                                                        <input id="nDocument" type="text" class="form-control" name="nDocument" value="{{ old('nDocument') }}" required="required" onkeypress="return controltagNum(event)">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('img_doc') ? ' has-error' : '' }}">
                                                    <label class="col-md-4 control-label">Imagen del documento</label>
                                                    <div class="col-md-6">
                                                        <input id="img_doc" type="file" accept=".jpg"class="form-control" name="img_doc" value="" required="required"/>
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('dateN') ? ' has-error' : '' }}">
                                                    <label for="dateN" class="col-md-4 control-label">Fecha de nacimiento</label>
                                                    <div id="dateMen"></div>
                                                    <div class="col-md-6">
                                                        <input id="dateN" type="date" max="{{@date('Y-m-d')}}" class="form-control" name="dateN" value="{{ old('dateN') }}" required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('img_perf') ? ' has-error' : '' }}">
                                                    <label for="img_perf" class="col-md-4 control-label">Imagen de Perfil</label>
                                                    <div class="col-md-6">
                                                        <input id="img_perf" type="file" accept=".jpg"class="form-control" name="img_perf" value="{{ old('img_perf') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('alias') ? ' has-error' : '' }}">
                                                    <label for="alias" class="col-md-4 control-label">Alias</label>
                                                    <div id="aliasMen"></div>
                                                    <div class="col-md-6">
                                                        <input id="alias" type="text" class="form-control" name="alias" value="{{ old('alias') }}"required="required">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                  <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary" id="registro">Registrar datos</button>
                                                  </div>
                                                </div>
                                                </form>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!--FIN DEL MODAL-->
                                    --}}

                                </div><!--paragraph-->
                             </div><!--golleft-->

                          </div><!--row-->
                        </div><!--/grey-panel -->
                      </div><!-- /col-md-12-->

                    @endif

                    <!--REFERIR-->
                    <!-- @if(Auth::user()->UserRefered()->count()==0) 
                    <div class="col-md-11 col-sm-11 mb" id="referir" style="margin-left: 2%">
                      <div class="white-panel panRf refe donut-chart">
                        <div class="white-header">
                            <h5>Agregar codigo de patrocinador</h5>
                        </div>
                          <div class="row">
                            <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                              <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                              <div class="paragraph">
                                <p class="center " id="mensaje"></p>
                                 <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModalRefe">Agregar</a></p>

                             
                                  <div id="myModalRefe" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ingrese el codigo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="{{url('Referals')}}" enctype="multipart/form-data" id="patrocinador">{{ csrf_field() }}

                                              <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                                      <label for="codigo" class="col-md-4 control-label">Codigo</label>
                                                      <div class="col-md-6">
                                                          <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" required="required">
                                                          <div id="codigoMen"></div>
                                                      </div>

                                              </div>
                                               <div class="form-group">
                                                  <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary" id='ingresar'>Ingresar</button>
                                                  </div>
                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  

                              </div> 
                           </div>
                          </div>
                        </div>
                      </div>
                      @endif
 -->

        <!--CONTENIDO RECIENTE ALBUM
          @if($Albums)
          <div class="swiper-container">
            <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                <div class="white">
                    <h3><span class="card-title">
                          <u>
                            <em>Cartelera de radio</em>
                          </u>
                        </span>
                    </h3>      
                </div>
            </div>  
              <div class="swiper-wrapper">
                @foreach($Albums as $albums)
                  <div class="swiper-slide">
                    <img src="{{ asset($albums->cover) }}" style="max-height: 100%; height: 60%; width: 60% " >
                  </div>
                @endforeach
              </div>
              <!-- Add Pagination -->
              <!--<div class="swiper-pagination"></div>
          </div>
          @endif-->

        <!--CONTENIDO RECIENTE DE TV-->
          @if($Tv)
            <div class="swiper-container">
              <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                  <div class="white">
                      <h3><span class="card-title">
                            <u>
                              <em>Cartelera de televisión</em>
                            </u>
                          </span>
                      </h3>      
                  </div>
                </div> 
              <div class="swiper-container">
                  <div class="swiper-wrapper">
                    @foreach($Tv as $tv)
                      <div class="swiper-slide">
                        <img src="{{ asset($tv->logo) }}" style="max-height: 100%; height: 60%; width: 60% ">
                      </div>
                    @endforeach
                  </div>
                  <!-- Add Pagination -->
                  <div class="swiper-pagination"></div>
              </div>
            </div>
          @endif

        <!--CONTENIDO RECIENTE BOOK
          @if($Book)
          <div class="swiper-container">
            <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                <div class="white">
                    <h3><span class="card-title">
                          <u>
                            <em>Cartelera de libros</em>
                          </u>
                        </span>
                    </h3>      
                </div>
            </div>  
              <div class="swiper-wrapper">
                @foreach($Book as $book)
                  <div class="swiper-slide">
                    <img src="{{ asset($book->cover) }}" style="max-height: 100%; height: 60%; width: 60% " >
                  </div>
                @endforeach
              </div>
              <!-- Add Pagination -->
              <!--<div class="swiper-pagination"></div>
          </div>
          @endif-->

        <!--CONTENIDO RECIENTE REVISTAS
        @if($Megazines)
          <div class="swiper-container">
            <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                <div class="white">
                    <h3><span class="card-title">
                          <u>
                            <em>Cartelera de revistas</em>
                          </u>
                        </span>
                    </h3>      
                </div>
            </div>  
              <div class="swiper-wrapper">
                @foreach($Megazines as $megazines)
                  <div class="swiper-slide">
                    <img src="{{ asset($megazines->cover) }}" style="max-height: 100%; height: 60%; width: 60% " >
                  </div>
                @endforeach
              </div>
              <!-- Add Pagination -->
              <!--<div class="swiper-pagination"></div>
          </div>
          @endif-->

        <!--CONTENIDO RECIENTE RADIO-->
          @if($Radio)
          <div class="swiper-container">
            <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                <div class="white">
                    <h3><span class="card-title">
                          <u>
                            <em>Cartelera de radio</em>
                          </u>
                        </span>
                    </h3>      
                </div>
            </div>  
              <div class="swiper-wrapper">
                @foreach($Radio as $radio)
                  <div class="swiper-slide">
                    <img src="{{ asset($radio->logo) }}" style="max-height: 100%; height: 60%; width: 60% " >
                  </div>
                @endforeach
              </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
          </div>
          @endif

        <!--CONTENIDO RECIENTE PELICULAS
        @if($Movies)
          <div class="swiper-container">
            <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                <div class="white">
                    <h3><span class="card-title">
                          <u>
                            <em>Cartelera de peliculas</em>
                          </u>
                        </span>
                    </h3>      
                </div>
            </div>  
              <div class="swiper-wrapper">
                @foreach($Movies as $movies)
                  <div class="swiper-slide">
                    <img src="{{ asset($movies->img_poster) }}" style="max-height: 100%; height: 60%; width: 60% " >
                  </div>
                @endforeach
              </div>
              <!-- Add Pagination -->
              <!--<div class="swiper-pagination"></div>
          </div>
          @endif-->

          <div id="modal-confirmation"></div> 

          @endsection

@section('js')
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'>
  
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js'></script>
<script >
  var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'coverflow',
        grabCursor: true,
        centeredSlides: true,
  spaceBetween: 0,
        //loop: true,
autoplay: 2500,
        autoplayDisableOnInteraction: false,
        slidesPerView: 4,
        coverflow: {
            rotate: 30,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
        }
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
  $(document).ready(function(){
  var f1 = document.getElementById('id').value;
  var f = new Date();
  var f2=f.getDate() + "/" +(f.getMonth()+1 )+ "/" + f.getFullYear();

  var tiempo=restaFechas(f1,f2);
  if (tiempo > 15){
    document.getElementById('referir').style.display='none';  
  }else{
    var total=14-tiempo;
    console.log(tiempo);
    document.getElementById('mensaje').innerHTML='Usted cuenta con '+total +' dias para agregar un patrocinador';
  }

});
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