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

  </style>
@endsection

@section('main')
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
        <span class="grey-text"><h4 class="titelgenera"><b><i class="material-icons small">music_note</i> Música</b></h4></span>
        <div class="row">
          <div class="input-field col s12 m6 offset-m3">
              <form method="POST"  id="SaveSong" action="{{url('SearchProfileArtist')}}">
                {{ csrf_field() }}
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
          @if($Albums->count() != 0)
            @foreach($Albums as $Album)
              <div class="col s12 m3">
                <div class="card" style="height: 430px">
                    <div class="card-image">
                      
                        @if($Album->cover)
                        <a href="#myModal-{{$Album->id}}" class="modal-trigger">
                          <img src="{{ asset($Album->cover)}}" width="100%" height="300px">
                        </a>
                        @else
                        <img src="{{asset('plugins/img/DefaultMusic.png')}}" width="100%" height="300px">
                        @endif
                      <!-- <span class="card-title">Card Title</span> -->
                      @if($Album->name_alb)
                        <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog2('{!!$Album->cost!!}','{!!$Album->name_alb!!}','{!!$Album->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                      @else
                        
                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog('{!!$Album->cost!!}','{!!$Album->title!!}','{!!$Album->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
                      @endif
                    </div>
                    <div class="card-content">
                      <div class="col m12">
                        @if($Album->name_alb)
                          <p class="grey-text">{{$Album->name_alb}}</p>
                        @else
                          <p class="grey-text">{{$Album->song_name}}</p>
                        @endif
                      </div>
                      <div class="">
                        <small class="grey-text"><b>Artistas: </b>
                          {{$Album->autors->name}}  
                        </small>
                      </div>
                      <div class="">
                        <small class="grey-text"><b>Costo: </b> {{$Album->cost}} tickets</small>
                      </div>
                        @if($Album->name_alb)
                          <small class="grey-text">Album</small>
                        @else
                          <small class="grey-text">Sencillo</small>
                        @endif 
                    </div>
                </div>
            </div>

            <!-- /.modal  de sagas  -->
            <div id="myModal-{{$Album->id}}" class="modal" >
                <div class="modal-content">
                    <div class=" blue"><br>
                        <h4 class="center white-text" ><i class="small material-icons">audiotrack</i>"{{ $Album->name_alb }}"</h4>
                        <br>
                    </div>
                    <br>
                    <div class="col s12 m6">
                        <img src="{{ asset($Album->cover)}}" width="100%" height="300px">
                    </div>
                    <div class="col s12 m6">
                        <small>Canciones:</small>
                        <ul class="collection z-depth-1" id="Playlist" style="color: black">
                          @if($Album->Songs)
                            @foreach($Album->Songs as $song)
                            <li class="collection-item" style="padding: 10px ">
                                <div class="row">
                                  <div class="col s8">
                                   {{$song->song_name}}
                                  </div> 
                                  <div class="col s4">
                                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" onclick="fnOpenNormalDialog('{!!$song->cost!!}','{!!$song->title!!}','{!!$song->id!!}')" ><i class="material-icons">add_shopping_cart</i></a>
                                  </div>
                                </div>
                            </li>
                            @endforeach
                          @endif
                        </ul>
                    </div>
                </div>

                <div class="modal-footer col s12">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
                </div>
            </div>

            @endforeach
          @else
          <div class="col m12">
                <blockquote >
                    <i class="material-icons fixed-width large grey-text">audiotrack</i><br><h5 class="grey-text">No hay música disponible</h5>
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
@endsection