@extends('layouts.app')

@section('css')
<link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style>

    .swal-button--confirm {
      background-color: #4caf50;
    }
      .swal-button--confirm {
      color: : white;
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
@endsection

@section('main')
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content white-text">
        <h4 class="titelgeneral"><i class="material-icons small">movie</i> Cine</h4>

        <div class="row">
                  <div class="input-field col s12 m6 offset-m3">
                    <form method="POST"  id="SaveSong" action="{{url('SearchMovieList')}}">
                      {{ csrf_field() }}
                      <i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                    </form>
                  </div>
                </div>
                <div class="row">
                  @if($Cine->count() != 0 )
                    @foreach($Cine as $cine)

                    <div class="col s12 m3">
                      <div class="card" style="height: 430px">
                        <div class="card-image">


                           @if($cine->type=='movie' )
                             <a href="#myModalMov-{{$cine->id}}" class="modal-trigger">
                             <img src="movie/poster/{{$cine->img_poster}}" width="100%" height="300px"></a>
                              <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$cine->id}}" onclick="fnOpenNormalDialog('{!!$cine->cost!!}','{!!$cine->title!!}','{!!$cine->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                            @else
                             <a href="#myModalSer-{{$cine->id}}" class="modal-trigger">
                            <img src="{{asset($cine->img_poster)}}" width="100%" height="300px"></a>
                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$cine->id}}" onclick="fnOpenNormalDialogSer('{!!$cine->cost!!}','{!!$cine->title!!}','{!!$cine->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                            @endif
                                      
                          <!-- <span class="card-title">Card Title</span> -->
                    
                        </div>
                        <div class="card-content">
                            <div class="col m12 s12">
                                <p class="grey-text">{{ $cine->title }}</p>
                            </div>
                            <div class="col m12 s12">
                                <p class="grey-text"><b>Costo: </b> {{$cine->cost}} tickets</p> 
                            </div>
                        </div>
                      </div>
                    </div>

                    <!--MODAL DETALLES DE LIBRO-->

    @if($cine->type=='movie' )
     <div id="myModalMov-{{$cine->id}}" class="modal">
    @else
    <div id="myModalSer-{{$cine->id}}" class="modal">
    @endif
                   
                <div class="modal-content">
                  <div class="blue"><br>
                     @if($cine->type=='movie' )
                        <h4 class="center white-text" ><i class="small material-icons">movie</i> {{ $cine->title }}</h4>
                        @else
                         <h4 class="center white-text" ><i class="small material-icons">movie</i> {{ $cine->title }}</h4>
                        @endif
                        <br>
                  </div>
                    <div class="col s12 m4 offset-m1">
                      <br>
                      @if($cine->type=='movie' )
                            <img src="movie/poster/{{$cine->img_poster}}" width="100%" height="300"  id="panel">
                            <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$cine->id}}"onclick="fnOpenNormalDialog('{!!$cine->cost!!}','{!!$cine->title!!}','{!!$cine->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                      @else
                            <img src="{{asset($cine->img_poster)}}" width="100%" height="300"  id="panel">
                            <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$cine->id}}" onclick="fnOpenNormalDialogSer('{!!$cine->cost!!}','{!!$cine->title!!}','{!!$cine->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                      @endif
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
                                        <b class="left">Título: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        {{ $cine->title }}
                                    </div>
                                </div>
                            </li>


                          @if($cine->type=='movie') 
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">star</i>
                                        <b class="left">Categoria: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        {{$cine->rating->r_name}}
                                    </div>
                                </div>
                            </li>
                        @else
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">turned_in</i>
                                    <b class="left">Géneros: </b>
                                </div>
                                <div class="col s12 m7">
                                    @foreach($cine->tags_serie as $t)
                                        <span> {{ $t->tags_name }} </span>
                                    @endforeach
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
                                    {{ $cine->status_series }}
                                </div>
                            </div>
                        </li>
                        @endif
                           
                           @if($cine->sagas!=null)
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">folder</i>
                                        <b class="left">Saga: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        {{ $cine->saga->sag_name }}
                                    </div>
                                </div>
                            </li>
                            @else
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
                            @endif
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                    <div class="col s12 m5">
                                        <i class="material-icons circle left">local_play</i>
                                        <b class="left">Costo: </b>
                                    </div>
                                    <div class="col s12 m7">
                                        {{ $cine->cost }} Tickets
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
                                        <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="{{ $cine->trailer_url }}" target="_blank">Reproducir</a>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
                   </div>
                      
                  


               @if($cine->type=='movie') 
                      <!-- 
                      <br>
                      <div class="col s12 m10 offset-m1" style="color: black">
                       <?php
                            //$url = $cine->trailer_url;
                           // preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                           // $id = $matches[1];
                           // $width = '800px';
                          //  $height = '450px';
                        ?>
                        <div class="embed-container">
                        <iframe  type="text/html" width="560" height="315"
                            src="https://www.youtube.com/embed/{{-- $id --}}"
                            frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe> 
                        </div>
                         -->
                        <div class="col s12 m12" style="color: black">
                        <div class="card-panel">
                          <b class="left">Historia:</b>
                          
                          <p>{{ $cine->based_on }}</p>
                        </div>
                      </div>
   
              @else
                      <!-- 
                      <div class="col s12 m10 offset-m1">
                       <?php
                          //  $url = $Series->trailer;
                          //  preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                          //  $id = $matches[1];
                          //  $width = '800px';
                          //  $height = '450px';
                        ?>
                      <div class="embed-container">
                        <iframe  type="text/html" width="560" height="315"
                            src="https://www.youtube.com/embed/{{-- $id --}}"
                            frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                      </div>
                      </div>
                    -->
                      <div class="col s12 m12" style="color: black">
                        <div class="card-panel">
                          <b class="left">Historia: </b>
                          
                          <p> {{ $cine->story }}</p>
                        </div>
                      </div>
              @endif
                       
                       
                          @if($cine->type=='serie') 
    <div class="col s12 m8 offset-m2" style="color: black">
                        <ul class="collapsible">
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons">movie</i>
                              Episodios:
                            </div>
                            @if($cine->Episode())
                                @foreach($cine->Episode as $episode)
                                  @if($episode->status =='Aprobado')
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s4">
                                            <p><a href="{{ $episode->trailer_url }}" class="" target="_blank">{{ $episode->episode_name }}</a></p>
                                            </div>
                                            <div class="col s6">
                                                {{ $episode->sinopsis }}
                                            </div>
                                            <div class="col s2">
                                                <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$cine->id}}" onclick="fnOpenNormalDialog2('{!!$episode->cost!!}','{!!$episode->episode_name!!}','{!!$episode->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                                            </div>
                                        </div>
                                    </div>
                                  @endif
                                @endforeach
                            @endif
                          </li>
                        </ul>
                    </div>
                 @endif



                      
                      <div class="col s12 m4 offset-m8">
                  <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                  </div>
              </div>
            </div>

                    @endforeach
                    <div class="col m12">
                     <!--  Paginacion material -->
                     <?php /*Nuevo*/ $Cine->setPath('') ?>
                     {!!$Cine->appends(Input::except('page'))->render()!!}
                    </div>
                  @else
                  <div class="col m12">
                <blockquote >
                    <i class="material-icons fixed-width large grey-text">movie</i><br><h5 class="grey-text">No hay peliculas disponibles</h5>
                </blockquote>
                <br>
                </div>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
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
                    var idUser={!!Auth::user()->id!!};
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
function fnOpenNormalDialogSer(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callbackSer(true,id);
           
          } else {
            callbackSer(false,id);
          }
        });
    };

function callbackSer(value,id) {
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
                    var idUser={!!Auth::user()->id!!};
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
                    var idUser={!!Auth::user()->id!!};
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
                    var idUser={!!Auth::user()->id!!};
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


<script src="{{asset('assets/js/jquery.js') }}"></script>
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
            $('#type').val(ui.item.type);
            $('#buscar').attr('disabled',false);
          }
        }

   });
  });
</script>
@endsection
