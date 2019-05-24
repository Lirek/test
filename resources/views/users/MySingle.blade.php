@extends('layouts.app')
@section('css')
    <style type="text/css">
    img.animated-gif{
  width: 35px;
  height: auto;
}
    .card{
        height:380px;
    }
        .card .card-content {
         padding: 24px 8px 12px 8px;
        }
       .card .card-content .card-title {
           color: #000000;
           display: block;
           line-height: 14px;
           max-height: 14px;
           min-height: 12px;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
       }
       .card .card-title {
        line-height: 1.2;
           font-size: 16px;
       }

      #autor{
           color: #1e88e5 ;
           display: block;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
           font-size: 14px
       }
       .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle {
            position: absolute;
            width: 42px;
            height: 42px;
            overflow: hidden;
            left: 35px;
            display: inline-block;
            vertical-align: middle;
        }

        .aqua-gradient {
            background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
            background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
            background: linear-gradient(40deg,#2096ff, #9dffac)!important;
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
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection

@section('main')  

<div class="row">
    <span class="grey-text"><h4 class="titelgeneral"><b><i class="material-icons small">audiotrack</i> {{$Songs->song_name}}</b></h4></span>
    <br>

        <div class="row">
          
              
            <div id="">
                     <input type="hidden" name="id" id="id" value="{{$Songs->id}}">
                    <div class="col s12 m4 offset-m1">
                      <br>
                      @if($Songs->cover)
                        <img src="{{asset($Songs->cover)}}" width="100%" height="300"style="">
                      @else
                        <img src="{{asset($Songs->autors->photo)}}" width="100%" height="300"style="">
                      @endif
                      @if($adquirido)
                        <audio id="player" class="player">
                          <source src="{{asset($Songs->song_file)}}" type="audio/mp3" id="play"> 
                        </audio>
                      @endif
                      
                    </div>
                    <div class="col m6 s12">
                    <!-- <div class="card-content grey-text" >
                          <div class="col m12 s12">
                            <p class="grey-text truncate"><b>Artistas: </b>
                              {{$Songs->autors->name}}
                            </p>
                          </div>
                          <p><b>Costo: </b> {{$Songs->cost}} tickets</p>
                          @foreach($Songs->tags as $tag)
                          <p><b>Género: </b> {{$tag->tags_name}}</p>
                          @endforeach
                    </div> -->
                    <ul class="collection z-depth-1" >
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s12 m5 ">
                                    <i class="material-icons circle left blue-text">person</i>
                                    <b class="left grey-text truncate">Artista: </b>
                                </div>
                                <div class="col s12 m7 grey-text truncate">
                                   {{$Songs->autors->name}}
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s12 m5 ">
                                    <i class="material-icons circle left blue-text">local_play</i>
                                    <b class="left grey-text truncate">Costo: </b>
                                </div>
                                <div class="col s12 m7 grey-text truncate">
                                   {{$Songs->cost}} tickets
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s12 m5 ">
                                    <i class="material-icons circle left blue-text">turned_in</i>
                                    <b class="left grey-text truncate">Género: </b>
                                </div>
                                <div class="chip  aqua-gradient  white-text">
                                    @foreach($Songs->tags as $tag)
                                        {{$tag->tags_name}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                       @if($adquirido)
                        <a href="{{ url('MyMusic') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                       @else
                         <a class="btn curvaBoton waves-effect waves-light green" href="#" id="buyBook" onclick="fnOpenNormalDialog('{!!$Songs->cost!!}','{!!$Songs->song_name!!}','{!!$Songs->id!!}')"><i class="material-icons left   ">add_shopping_cart</i>Adquirir</a>
                         <a href="{{ url('MusicContent') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                       @endif
                    </div>
                   
                </div>
                
            </div>
     </div><!--End div row -->
</div>



@endsection


@section('js')

<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = new Plyr('#player', {
            
        });

        players.play(
            event => {
                   $('.play').attr('src','{{asset('plugins/materialize_adm/img/radio/ecualizador1.gif')}}');
                }
        ); //inicia radio al abrir pagina
        players.volume = 0.5; // Sets volume at 50%

        players.on('playing', event => {
            if(players.playing){
                $('.play').attr('src','{{asset('plugins/materialize_adm/img/radio/ecualizador1.gif')}}');
            }
        });
         players.on('pause', event => {
           $('.play').attr('src','{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}');
         });  

         players.on('ended', event => {
           $('.play').attr('src','{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}');
         });  

</script>
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


<!--Album-->
<!-- LECTURA DE JSON Y REPRODUCTOR DE LISTAS PARA EL PLAYER -->
<script>
  
    $(document).ready(function(){
        var id = $('#id').val();
        console.log(id);
        $.ajax({ 
                
                url     : '../MySongsAlbums/'+id,
                type    : 'GET',
                dataType: 'json',
                
                success: function (data) 
                {

                    var audio=document.getElementById('player'); 
                    var pista=0;
                    
                     $.each(data, function(i,song) {
                        // $('#Playlist').append('<li class="collection-item" id="'+i+'" style="padding: 10px "><a href="#">'+song.song_name+'</a></li>');
                        $('#Playlist').append(' <li class="collection-item" id="'+i+'"><div><a href="#!">'+song.song_name+'</a> <a href="#!" class="secondary-content" ><img class="img-play animated-gif" src="{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}" id="song_'+i+'" ></a></div></li>');
                        playSong(0);
                        audio.pause();
                        
                    });

                    $('#Playlist li').click(function(){
                        var selectedsong = $(this).attr('id');
                        if(selectedsong){
                            //Remover clase que indica cual se reproduce
                              $('.play').attr('src','{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}');
                              var s = document.getElementsByClassName('play')[0];
                              console.log(s);
                              s.classList.remove("play");
                              //s.style.display='none';
                        playSong(selectedsong);
                        }
                    }); 

                    function playSong(id){
                        var long=data;
                        if(id>=long.length){
                            audio.pause();
                        }
                        else{
                            
                        $('#player').attr('src','{{asset('')}}'+data[id].song_file);
                        //agregar clase que indica cual se reproduce
                              var d = document.getElementById('song_'+id);
                              d.className += " play";
                              //d.style.display='inline';
                        audio.play();
                        scheduleSong(id);
                        }
                    }
                 

                    function scheduleSong(id){
                        audio.onended= function(){
                            playSong(parseInt(id)+1);
                        }

                    }   
                             
                },
                error: function(data){
                console.log('aqui hay un error');
            }
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
                    
            url:'../BuySong/'+id,
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
                
                      url     : '../MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                      
                    swal('Cancion comprada con exito','','success');
                   window.setTimeout(function(){window.location.reload()}, 1000);

                    }  
                },
              error: function (result) 
                {
                      console.log(result);
                }

            });
    } else {
        return false;
    }
}
</script>

@endsection
