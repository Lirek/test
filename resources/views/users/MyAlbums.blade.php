@extends('layouts.app')

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                    <div class="white-header">
                        <h3><span class="card-title"><i class="fa fa-angle-right"> Mi Musica</i></span></h3>           
                    </div>
                </div>
                <p></p>


                 
                <!-- PROFILE 01 PANEL -->
               @if($Albums != 0)
                <div class="form-panel">
                    <div class="col-lg-4 col-md-4 col-sm-4 mb">
                        <div class="content-panel pn-music">
                            <div id="profile-01" style="">
                             @foreach($Albums as $Album)
                             <input type="hidden" name="id" id="id" value="{{$Album->id}}">
                                @if($Album->cover)
                                    <img src="{{asset($Album->cover)}}?.{{rand(1,1000)}}" width="100%" height="160" style="">
                                 @else
                                    <img src="#" width="100%" height="220" style="">
                                @endif
                                </div>
                        </div><!--/content-panel -->
                    </div><!--/col-md-4 -->

                    <div>
                        <h5><b>Artista:</b> {{$Album->autors->name}}</h5>
                        <h5><b>Album:</b> {{$Album->name_alb}}</h5>
                        <hr>
                        @endforeach

                            <ul id="Playlist">
                                <li><b>Canciones:</b></li>
                              
                            </ul>
                            <audio  id="player">
                                <source src="" type="audio/mp3" id="play"> 
                            </audio>
                    </div>
    
                </div>
                @else
                    <h1>No Posee Albums</h1>
                @endif
            </div>
        </div> 
    </div> 
</div> 

@endsection


@section('js')

<!-- REPRODUCTOS PLYR -->
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<a href="">

<!-- LECTURA DE JSON Y REPRODUCTOR DE LISTAS PARA EL PLAYER -->
<script>
    $(document).ready(function(){
        var id = $('#id').val();
        console.log(id);
        $.ajax({ 
                
                url     : 'SongsAlbums/'+id,
                type    : 'GET',
                dataType: "json",
                
                success: function (data) 
                {

                    var audio=document.getElementById('player'); 
                    var pista=0;
                    
                     $.each(data, function(i,song) {
                        $('#Playlist').append('<li class="" id="'+i+'"><a href="#">'+song.song_name+'</a></li>');
                        playSong(0);
                        audio.pause();
                        console.log(song.song_name);
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
                            console.log('Se acabo');
                            audio.pause();
                        }
                        else{
                        $('#player').attr('src',data[id].song_file);
                        audio.play();
                        console.log('Hay mas Canciones');
                        scheduleSong(id);
                        }
                    }
                 

                    function scheduleSong(id){
                        audio.onended= function(){
                            console.log('Termino la cancion');
                            playSong(parseInt(id)+1);
                        }

                    }   
                             
                }
    

                });

  });
</script>


@endsection