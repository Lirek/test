@extends('seller.layouts')
@section('css')
<style type="text/css">
  #panel {
    /*Para la Sombra*/
    -webkit-box-shadow: 8px 8px 15px #999;
    -moz-box-shadow: 8px 8px 15px #999;
    filter: shadow(color=#999999, direction=135, strength=8);
    /*Para la Sombra*/
    background-image: url("{{ asset($cover) }}");
    margin-top: 5%;
    background-position: center center;
    width: 100%;
    min-height: 500px;
    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }
</style>
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
  <section class="content">
    <div class="row">
      
      <div class="form-group col-md-12">
        <h2 class="widget-user-desc"><b>Álbum:</b> "{{ $album->name_alb }}"</h2>
        <img id="panel" class="img-rounded img-responsive av text-center">
      </div>
      <div class="form-group col-md-12">
        <div class="box-footer no-padding">
          <div class="col-md-6">
            <ul class="nav nav-stacked">
              <li>
                <h4> Duración total: 
                  <span class="pull-right "> {{ $album->duration }} </span>
                </h4>
              </li>
              <li>
                <h4> Costo: 
                  <span class="pull-right"> {{ $album->cost }} </span>
                </h4>
              </li>
            </div>
        </div>
        <br>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre de la canción</th>
              <th>Audio</th>
            </tr>
          </thead>
          @foreach($songs as $song)
            <tbody>
              <tr>
                <th>
                  {{$song->song_name}}
                </th>
                <th>
                  <audio id="player" class="player{{$x}}">
                    <source src="" type="audio/mp3" id="play"> 
                  </audio>
                </th>
              </tr>
            </tbody>
            @php
              $x++
            @endphp
          @endforeach
        </table>

        <div class="col-md-6">
          <div align="right">
            <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}" class="btn btn-danger">Atrás</a>
          </div>
        </div>
        <div class="col-md-6">
          <div align="left">
            <a href="{{ url('/modify_album/'.$album->id) }}" class="btn btn-primary">Modificar</a>
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
// Llamado de la funcion 'SongsAlbums' en AlbumsController y carga de las canciones al reproductor
  $(document).ready(function(){
    $.ajax({
      url     : "{{ url('/SongsAlbums/'.$album->id) }}",
      type    : "GET",
      dataType: "json",
      success: function (data) {

        console.log(data);

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