@extends('seller.layouts')
@section('css')
  <style type="text/css">
    #image-preview {
      width: 100%;
      height: 420px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #2b81af;
    }
    #image-preview input {
      line-height: 200px;
      font-size: 200px;
      position: absolute;
      opacity: 0;
      z-index: 10;
    }
    #image-preview label {
      position: absolute;
      z-index: 5;
      opacity: 0.8;
      cursor: pointer;
      background-color: #bdc3c7;
      width: 200px;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-transform: uppercase;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      text-align: center;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
  @include('flash::message')
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="{{ url('/modify_album') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
    <input type="hidden" name="id" value="{{$id}}">
    <div class="row" style="margin-left: 30px;">
      <div class="col-sm-12">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Editar Álbum</h3>
          </div>

          <div class="box-body">
            <div class="col-md-6">
              <label id="portadaActual" style="color: green;"> Si no selecciona una Portada, se mantendrá la actual </label>
              <div id="mensajePortadaAlbum"></div>
              <div id="image-preview" style="border:#bdc3c7 1px solid;" class="col-md-1">
                <label for="image-upload" id="image-label">Portada</label>
                <input type="file" name="image" id="image-upload" accept="image/*" oninvalid="this.setCustomValidity('Seleccione una Imagen de Portada')" oninput="setCustomValidity('')"/>
                <div id="list">
                    <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset($album->cover) }}"/>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="album"> Nombre del Album </label>
              <div id="mensajeNombreAlbum"></div>
              <input type="text" name="album" value="{{$album->name_alb}}" class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte Un Nombre de Album Valido')" oninput="setCustomValidity('')">
              <br>

              <label for="cost"> Costo en Tickets </label>
              <div id="mensajeTickets"></div>
              <input type="number" name="cost" id="cost" value="{{$album->cost}}" class="form-control"min="0" pattern="{3}" oninvalid="this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 999')" oninput="setCustomValidity('')">
              <br>

              <label for="tags"> Generos </label>
              <select name="tags[]" multiple="true" class="form-control" required>
                @foreach($tags as $genders)
                  <option value="{{$genders->id}}"
                    @foreach($s_tags as $s) 
                      @if($s->id == $genders->id) 
                        selected 
                      @endif 
                    @endforeach 
                    >
                    {{$genders->tags_name}}
                  </option>
                @endforeach
              </select>
              <br>

              <label for="artist"> Artista </label>
              <select name="artist" class="form-control js-example-basic-single" required oninvalid="this.setCustomValidity('Seleccione Un Artista')" oninput="setCustomValidity('')">
                @foreach($autors as $artist)
                  <option value="{{$artist->id}}"
                    @if($artist->id==$album->autors_id)
                      selected
                    @endif
                    >
                    {{$artist->name}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="box box-primary" style="margin-rigth: 30px;">
        
          <div class="box-header with-border">
            <h3 class="box-title">Canciones</h3>
          </div>

          <div class="box-body">
            @foreach($songs as $song)
              <div class="col-md-6">
                <input type="text" name="song_o[{{$i}}]" id="song_name{{$i}}" class="form-control">
                <input type="hidden" name="song_id[{{$i}}]" value="{{$song->id}}">
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-11">
                    <audio id="player" class="player{{$i}}">
                        <source src="" type="audio/mp3" id="play"> 
                    </audio>
                  </div>
                  <div class="col-md-1" style="padding-top: 4%;">
                    <a href="{{ url('/delete_song/'.$song->id) }}" onclick="return confirm('¿Desea eliminar la canción {{ $song->song_name }}?')" class="btn btn-danger btn-xs">
                      <span class="glyphicon glyphicon-remove"></span>
                    </a>
                  </div>
                </div>
              </div>
              @php
                $i++
              @endphp
            @endforeach
            <div class="box box-primary">
              <div class="box-body">
                <div id="mensajeNombreCancion"></div>
                <div id="mensajeCancion"></div>
                <div class="col-sm-9">
                  <div class="field_wrapper">
                  </div>
                </div>
                <div class="col-sm-1">
                  <br>
                  <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Añadir Canciones</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="col-md-6">
      <div align="right">
        <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}" class="btn btn-danger">Atrás</a>
      </div>
    </div>
    <div class="col-md-6">
      <button type="submit" class="btn btn-primary" id="modificarAlbum">
        Modificar Álbum
      </button>
    </div>
  </form>
@endsection

@section('js')
<script>
//---------------------------------------------------------------------------------------------------
// Para que se vea la imagen en el formulario
    function archivo(evt) {
      var files = evt.target.files;
      for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
             document.getElementById("list").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
            };
        })(f);
        reader.readAsDataURL(f);
      }
  }
  document.getElementById('image-upload').addEventListener('change', archivo, false);
// Para que se vea la imagen en el formulario
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño de la Foto o Logo
  $(document).ready(function(){
      $('#image-upload').change(function(){
          var tamaño = this.files[0].size;
          var tamañoKb = parseInt(tamaño/1024);
          if (tamañoKb>2048) {
              $('#portadaActual').hide();
              $('#mensajePortadaAlbum').show();
              $('#mensajePortadaAlbum').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
              $('#mensajePortadaAlbum').css('color','red');
              $('#modificarAlbum').attr('disabled',true);
          } else {
              $('#mensajePortadaAlbum').hide();
              $('#modificarAlbum').attr('disabled',false);
          }
      });
  });
// Para validar el tamaño de la Foto o Logo
//---------------------------------------------------------------------------------------------------
// Para validar la longtud de los campos 'nombre del album' y 'nombre de la cancion'
    $(document).ready(function(){
      $('#title').keyup(function(evento){
        var nombre = $('#title').val().length;
        if (nombre>=256) {
          $('#mensajeNombreAlbum').show();
          $('#mensajeNombreAlbum').text('La longtud del Nombre del Album no debe exceder los 255 caracteres');
          $('#mensajeNombreAlbum').css('color','red');
          $('#modificarAlbum').attr('disabled',true);
        } else {
          $('#mensajeNombreAlbum').hide();
          $('#modificarAlbum').attr('disabled',false);
        }
      });
    });
    $(document).ready(function(){
      $('#titleSong').keyup(function(evento){
        var nombre = $('#titleSong').val().length;
        console.log(nombre);
        if (nombre>=256) {
          $('#mensajeNombreCancion').show();
          $('#mensajeNombreCancion').text('El Nombre de una Canción no debe exceder los 255 caracteres');
          $('#mensajeNombreCancion').css('color','red');
          $('#modificarAlbum').attr('disabled',true);
        } else {
          $('#mensajeNombreCancion').hide();
          $('#modificarAlbum').attr('disabled',false);
        }
      });
    });
// Para validar la longtud de los campos 'nombre del album' y 'nombre de la cancion'
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>999) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#modificarAlbum').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#modificarAlbum').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#modificarAlbum').attr('disabled',false);
        }
      });
    });
// Para validar la cantidad de Tickets
//---------------------------------------------------------------------------------------------------
// Para agregar y eliminar las canciones
    $(document).ready(function(){
      function newHTML(x) {
        var newHTML = 
        "<div class='row group'>"+
          "<br>"+
          "<div class='remove_button'>"+
            "<div class='col-sm-9'>"+
              "<input type='text' name='song_n[]' id='titleSong' class='titleSong"+x+" form-control' placeholder='Nombre de la Canción' oninvalid='this.setCustomValidity('Ingrese un Nombre a La Canción')' oninput='setCustomValidity('')' required='required'>"+
              "<input type='file' name='audio[]' accept='.mp3' id='audio' class='audio"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese la Canción')' oninput='setCustomValidity('')'>"+
            "</div>"+
            "<div class='col-sm-2 eliminar'>"+
              "<button type='button' class='btn btn-danger btnRemove'>Eliminar Canción</button>"+
            "</div>"+
          "</div>"+
        "</div>";
        return newHTML;
      }

      var addButton = $('.add_button');
      var wrapper = $('.field_wrapper');
      var x = 0;
      addButton.click(function(){
        wrapper.append(newHTML(x));
        // Para validar la longtud del campo 'nombre de la cancion'
        var campoTexto = ".titleSong"+x;
        $(campoTexto).keyup(function(evento){
          var nombre = $(campoTexto).val().length;
          if (nombre>=256) {
            $('#mensajeNombreCancion').show();
            $('#mensajeNombreCancion').text('El Nombre de una Canción no debe exceder los 255 caracteres');
            $('#mensajeNombreCancion').css('color','red');
            $('#modificarAlbum').attr('disabled',true);
            $('.add_button').attr('disabled',true);
          } else {
            $('#mensajeNombreCancion').hide();
            $('#modificarAlbum').attr('disabled',false);
            $('.add_button').attr('disabled',false);
          }
        });
        // Para validar la longtud del campo 'nombre de la cancion'
        // Para validar el tamaño de la cancion
        var campo = ".audio"+x;
        $(campo).change(function(){
          var tamaño = this.files[0].size;
          var tamañoKb = parseInt(tamaño/1024);
          if (tamañoKb>2048) {
            $('#mensajeCancion').show();
            $('#mensajeCancion').text('Una de las canciones es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
            $('#mensajeCancion').css('color','red');
            $('#modificarAlbum').attr('disabled',true);
            $('.add_button').attr('disabled',true);
          } else {
            $('#mensajeCancion').hide();
            $('#modificarAlbum').attr('disabled',false);
            $('.add_button').attr('disabled',false);
          }
        });
        // Para validar el tamaño de la cancion
        x++;
      });
      $(wrapper).on('click','.eliminar', function(e){
        e.preventDefault();
        var eliminar = confirm("¿Está seguro de Eliminar la Canción?");
        if (eliminar) {
          var uno = $(this).parent('div');
          var dos = $(uno).parent('div');
          dos.remove();
        }
      });
    });
// Para agregar y eliminar las canciones
//---------------------------------------------------------------------------------------------------
</script>
<!----------------------------------- REPRODUCTOR PLYR --------------------------------------------->
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
<script>
//---------------------------------------------------------------------------------------------------
// Llamado de la funcion 'musicFromAlbum' en AlbumsController y carga de las canciones al reproductor
  $(document).ready(function(){
    $.ajax({
      url     : "{{ url('/musicFromAlbum/'.$id) }}",
      type    : "GET",
      dataType: "json",
      success: function (data) {

        var audio=document.getElementById('player');

        $.each(data, function(i,song) {
          var rutaPlyr = "{{asset('/')}}"+data[i].song_file;
          var campoPlyr = ".player"+[i];
          $(campoPlyr).attr('src',rutaPlyr);
          var rutaNombre = data[i].song_name;
          var campoNombre = "#song_name"+[i];
          $(campoNombre).attr('value',rutaNombre);
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
// Llamado de la funcion 'musicFromAlbum' en AlbumsController y carga de las canciones al reproductor
//---------------------------------------------------------------------------------------------------
</script>
@endsection