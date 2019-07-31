@extends('seller.layouts')
@section('css')
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
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
    .card{
        height:430px;
    }
    
</style>

@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <h4 class="titelgeneral"><i class="material-icons small">music_note</i> Contenido musical</h4>
            @if($albums->count() != 0 )
            <div class="card-panel curva">
                <div class="row ">
                    <h4 class="titelgeneral"><i class="mdi mdi-minidisc"></i> Mis álbumes</h4>
                    @foreach($albums as $b)
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <a href="{{ url('/show_album/'.$b->id) }}">
                              <img src="{{asset($b->cover)}}" width="100%" height="300px">
                              </a>
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ url('/modify_album/'.$b->id) }}"><i class="material-icons">create</i></a>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class="" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: auto;">{{ $b->name_alb }}</p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Estatus:</b> {{ $b->status }}</small>
                                </div>  
                                    <small><b>Artista:</b> {{ $b->autors->name }}</small>                          
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col s12">
                    {!! $albums->render() !!}
                    </div>
                </div>
            </div>
            @endif
            @if($singles->count() != 0 )
            <div class="row">
            <div class=" col s12 card-panel curva">
                    <h4 class="titelgeneral"><i class="mdi mdi-library-music"></i> Mis canciones</h4>
                    @foreach($singles as $song)
                    <div class="col s12 m3">
                        <div class="card" style="height: 460px">
                            <div class="card-image">
                                <a href="{{ url('/show_song/'.$song->id) }}">
                                    @if($song->cover == NULL)  
                                        <img src="{{asset($song->autors->photo)}}" width="100%" height="300px">
                                    @else
                                        <img src="{{asset($song->cover)}}" width="100%" height="300px">
                                    @endif 
                                </a>
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" style="margin-right: 45px" href="{{ url('/modify_single/'.$song->id) }}"><i class="material-icons">create</i></a>
                                <a class="btn-floating halfway-fab waves-effect waves-light red" id="deleteMusic" value="{!!$song['id']!!}"><i class="material-icons">delete</i></a>

                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class="" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: auto;">{{$song->song_name}}</p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Estatus:</b> {{ $song->status }}</small>
                                </div>
                                    <small><b>Artista:</b> {{$song->autors->name}}</small>
                              <!--  <div class="col m12">
                                    <audio id="player" class="">
                                        <source src="{{asset($song->song_file)}}" type="audio/mp3" id="play"> 
                                    </audio>
                                </div>   -->
                                <div class="col-sm-4 col-sm-offset-4 embed-responsive ">
                                    <audio controls class="embed-responsive-item" style="max-width: 250px ;max-height: 40px; width:100%">
                                        <source src="{{asset($song->song_file)}}" type="audio/mp3" id="play">
                                    </audio>
                              </div>
                            </div>                       
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
             @if(($albums->count() == 0) && ($singles->count() == 0))
            <div class="col m12">
                <blockquote >
                    <i class="material-icons fixed-width large grey-text">music_note</i><br><h5>No Posee Contenido musical</h5>
                </blockquote>
                <br>
            </div>
        @endif
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
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

  $(document).on('click', '#deleteMusic', function() {
            var id = $(this).attr("value");
            swal({
                title: "¿Desea realmente eliminar esta canción?",
                icon: "warning",
                dangerMode: true,
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
                    var gif = "{{ asset('/sistem_images/loading.gif') }}";
                    swal({
                        title: "Procesando la información",
                        text: "Espere mientras se procesa la información.",
                        icon: gif,
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                    $.ajax({
                        url : "{{url('deleteMusic/')}}/"+id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            swal('Eliminado exitosamente','','success')
                            .then((recarga) => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            swal('Existe un error en su solicitud','','error')
                            .then((recarga) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
</script>
@endsection