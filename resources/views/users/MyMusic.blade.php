@extends('layouts.app')
@section('css')
    <style type="text/css">

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

    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection

@section('main')  

<div class="row">
    <h4 class="titelgeneral"><i class="material-icons small">audiotrack</i> Mi Música</h4>

    <!-- <h5>Mis Peliculas</h5> -->
    <br>

        <div class="row">
          
              <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
                        <ul class="tabs">
                            <li class="tab col s4"><a  href="#test1" class="active"><i class="material-icons" style="vertical-align: middle;">queue_music</i>&nbsp;<b>Sencillos</b></a></li>
                            <li class="tab col s4"><a  href="#test2" id="Album"><i class="material-icons" style="vertical-align: middle;">library_music</i>&nbsp;<b>Albúms</b></a></li>
                        </ul>
                    </div>
              <div id="test1">
                 @if($Singles != 0)
                    <div class="col s12 m4 offset-m1">
                      <br>
                      <img src="{{asset('plugins/img/DefaultMusic.png')}}" width="100%" height="300"style="">
                      <audio id="player" class="player">
                        <source src="" type="audio/mp3" id="play"> 
                    </audio>
                    </div>
                    <div class="col m6 s12">
                    <small>Canciones:</small>
                    <ul class="collection z-depth-1" id="Playlist">
                       
                    </ul>
                </div>
                @else
              
                 <div class="col s6 offset-s3">
                     <br><br>
                    <blockquote >
                    <i class="material-icons fixed-width large grey-text">audiotrack</i><br><h5 blue-text text-darken-2>No posee sencillos adquiridos</h5>
                    </blockquote>
                </div> 
                @endif
              </div>
                <div id="test2">
                  @if($Albums != 0)
                  <!-- <div class="col s12">
                    <div class="col s12 m4 offset-m1">
                      <br>
                      <img src="{{asset('plugins/img/DefaultMusic.png')}}" width="100%" height="300"style="">
                      <audio id="playerAlbum" class="player" name='playAlbum'>
                        <source src="" type="audio/mp3" id="play"> 
                    </audio>
                    </div>
                    <div class="col m6 s12">
                      <small>Canciones:</small>
                      <ul class="collection z-depth-1" id="PlaylistAlbum">
                          <li class="collection-item" style="padding: 10px ">
                              <div class="row">
                                 Seleccione el album que desea escuchar
                              </div>
                          </li>
                      </ul>
                    </div>
                  </div> -->
                  <div class="col s12">
                    <div class="">
                      <div class="row">
                        <br>
                         @foreach($Albums as $Album)
                      <!-- PROFILE 01 PANEL -->
                          <div class="col s12 m3 ">
                              <div class="card">
                            
                                  <div class="card-image">
                                      <img src="{{asset($Album->cover)}}" width="100%" height="300" style="">
                                      <a href="{{url('MyAlbums/'.$Album->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue btn tooltipped " data-position="bottom" data-tooltip="Reproducir" ><i class="material-icons">play_arrow</i></a>

                                  </div>
                                  <div class="card-content">
                                    <div class="col s12">
                                      <!-- <span class="card-title title"> <b>{{$Album->name_alb}}</b> </span> -->
                                      <p class="">{{ $Album->name_alb }}</p>
                                    </div>
                                    <div class="col s12">
                                       <small><b>Artista:</b> {{ $Album->autors->name }}</small> 
                                    </div>
                                      <!--
                                     <span class="card-title blue-text title" style=" font-size: 16px;"> <b>{{--$Megazine->Seller->name--}}</b> </span>-->
                                     <span class="card-title blue-text title" style=" font-size: 16px;"> <b>Autor</b> </span>
                                  </div>


                              </div>
                          </div>

                      @endforeach
                      </div>
                      @else
                      <div class="col s6 offset-s3">
                         <br><br>
                        <blockquote >
                        <i class="material-icons fixed-width large grey-text">audiotrack</i><br><h5 blue-text text-darken-2>No posee música adquirida</h5>
                        </blockquote>
                    </div>
                      @endif
                    </div>
                  </div>
                </div>
     </div><!--End div row -->
</div>



@endsection


@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('.tabs').tabs();
  });
</script>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
$(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>


<!-- LECTURA DE JSON Y REPRODUCTOR DE LISTAS PARA EL PLAYER -->
<script>
    $(document).ready(function(){
        // var id = $('#id').val();
        $.ajax({ 
                
                url     : 'SongsSingles',
                type    : 'GET',
                dataType: "json",
                
                success: function (data) 
                {

                    var audio=document.getElementById('player'); 
                    var pista=0;
                    
                     $.each(data, function(i,song) {
                        $('#Playlist').append('<li class="collection-item" id="'+i+'" style="padding: 10px "><a href="#">'+song.song_name+'</a></li>');
                        console.log(song);
                        playSong(0);
                        audio.pause();
                        
                    });

                    $('#Playlist li').click(function(){
                        var selectedsong = $(this).attr('id');
                        if(selectedsong){
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
                        audio.play();
                        scheduleSong(id);
                        }
                    }
                 

                    function scheduleSong(id){
                        audio.onended= function(){
                            playSong(parseInt(id)+1);
                        }

                    }   
                             
                }
    

                });

  });
</script>
@endsection
