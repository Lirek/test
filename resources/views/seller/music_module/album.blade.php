@extends('seller.layouts')
@section('css')
 <style>
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    
    </style>
    <style>
        /*.modal {
        max-height: 100%;
        }
        object {
     width:100%;
     max-height:100%;
}*/
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
           
        }
        
        .colorbadge{
            background-color:#428bca;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
             <input type="hidden" name="id" id="id" value="{{$album->id}}">
            <h4 class="titelgeneral"><i class="material-icons small">music_note</i> 
                "{{ $album->name_alb}}"
            </h4>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <img src="{{asset($album->cover)}}" width="100%" height="300" style="border-radius: 10px" id="panel" class="materialboxed">
                    <br><br>
                    <audio id="player" class="player">
                        <source src="" type="audio/mp3" id="play"> 
                    </audio>
                    <!-- <a href="#modal-default" class="btn curvaBoton waves-effect waves-light green  modal-trigger" >Ver película</a> -->
                        <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                </div>
                <div class="col m6 s12">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">local_play</i>
                                    <b class="left">Costo: </b>
                                </div>
                                <div class="col s12 m7">
                                    {{ $album->cost }} Tickets
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <br>
                <div class="col m6 s12">
                    <small>Canciones:</small>
                    <ul class="collection z-depth-1" id="Playlist">
                         <!-- @foreach($songs as $song)
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                               {{$song->song_name}} 
                            </div>
                        </li>
                        @endforeach -->
                    </ul>
                </div>
                <div class="col m2 s12">
                    <div class="card blue accent-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title">
                                <i class="material-icons">group add</i>
                                {{$song->transaction->count()}}
                            </p>
                            <p>
                                N° de compras
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

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
        var id = $('#id').val();
        $.ajax({ 
                
                url     : '../SongsAlbums/'+id+'/',
                type    : 'GET',
                dataType: "json",
                
                success: function (data) 
                {

                    var audio=document.getElementById('player'); 
                    var pista=0;
                    
                     $.each(data, function(i,song) {
                        $('#Playlist').append('<li class="collection-item" id="'+i+'" style="padding: 10px "><a href="#">'+song.song_name+'</a></li>');
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
                             
                },
                error: function(data){
                console.log('aqui hay un error');
                }
        });

  });
</script>
@endsection