@extends('seller.layouts')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>
                            Contenido musical
                        </h3>
                    </div>
                    @include('flash::message')
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis álbumes</h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre del álbum</th>
                                            {{--
                                            <th>Artista</th>
                                            --}}
                                            <th>Fecha de publicación</th>
                                            <th>Duración</th>
                                            <th>Costo</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach($albums as $album)
                                        <tbody>
                                            <tr>
                                                <th>{{$album->name_alb}}</th>
                                                {{--
                                                <th>{{$album->autors->name}}</th>
                                                --}}
                                                <th>{{$album->created_at}}</th>
                                                <th>{{$album->duration}}</th>
                                                <th>{{$album->cost}}</th>
                                                <th>{{$album->status}}</th>
                                                <th>
                                                    <a href="{{ url('/show_album/'.$album->id) }}" class="btn btn-info btn-xs">
                                                        <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ url('/modify_album/'.$album->id) }}" class="btn btn-warning btn-xs">
                                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ url('/delete_album/'.$album->id) }}" onclick="return confirm('¿Desea eliminar el álbum {{ $album->name_alb }}?')" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            {!! $albums->render() !!}
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis canciones</h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la canción</th>
                                            {{--
                                            <th>Artista</th>
                                            <th>Duración</th>
                                            --}}
                                            <th>Costo</th>
                                            <th>Fecha de publicación</th>
                                            <th>Estatus</th>
                                            <th>Audio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach($singles as $song)
                                        <tbody>
                                            <tr>
                                                <th>{{$song->song_name}}</th>
                                                {{--
                                                <th>{{$song->autors->name}}</th>
                                                <th>{{$song->duration}}</th>
                                                --}}
                                                <th>{{$song->cost}}</th>
                                                <th>{{$song->created_at}}</th>
                                                <th>{{$song->status}}</th>
                                                <th>
                                                    <audio id="player" class="player{{$x}}">
                                                        <source src="" type="audio/mp3" id="play"> 
                                                    </audio>
                                                </th>
                                                <th>
                                                    <a href="{{ url('/modify_single/'.$song->id) }}" class="btn btn-warning btn-xs">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    <a href="{{ url('/delete_song/'.$song->id) }}" onclick="return confirm('¿Desea eliminar la canción {{ $song->song_name }}?')" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                        @php
                                            $x++
                                        @endphp
                                    @endforeach
                                </table>
                            </div>
                            {!! $singles->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
<!----------------------------------- REPRODUCTOR PLYR -------------------------------------------->
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
<script>
//---------------------------------------------------------------------------------------------------
// Llamado de la funcion 'ShowMusicOfMyPanel' en MusicController y carga de las canciones al reproductor
  $(document).ready(function(){
    $.ajax({
      url     : "{{ url('/music_of_my_music_panel/'.Auth::guard('web_seller')->user()->id) }}",
      type    : "GET",
      dataType: "json",
      success: function (data) {

        var audio=document.getElementById('player');

        $.each(data, function(i,song) {
          var ruta = "{{asset('/')}}"+data[i].song_file;
          var campo = ".player"+[i];
          $(campo).attr('src',ruta);
        });

        $('#Playlist li').click(function(){
          var selectedsong = $(this).attr('id');
          playSong(selectedsong);
        }); 

        function playSong(id){
          var long=data;
          if(id>=long.length){
            audio.pause();
          } else {
            $('#player').attr('src',data[id].song_file);
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