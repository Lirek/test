@extends('seller.layouts')
@section('css')
  <style type="text/css">
    #image-preview {
      width: 100%;
      height: 450px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #2b81af;
    }
    #image-preview input {
      line-height: 280px;
      font-size: 400px;
      position: absolute;
      opacity: 0;
      z-index: 10;
    }
    #image-preview label {
      cursor: pointer;
      position: absolute;
      z-index: 5;
      opacity: 0.8;
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

  <form method="POST" action="{{ url('/albums') }}" enctype="multipart/form-data" id="formulario">
    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-sm-12" style="margin-left: 30px;">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Registrar álbum</h3>
          </div>
          <div class="box-body">
            <div class="col-md-6">
              <div id="mensajePortadaAlbum"></div>
              <div id="image-preview" style="border:#bdc3c7 1px solid;" class="col-md-1">
                <label for="image-upload" id="image-label">Portada</label>
                <input type="file" name="image" id="image-upload" accept="image/*" class="form-control required" required oninvalid="this.setCustomValidity('Seleccione un Archivo de Portada')" oninput="setCustomValidity('')" />
                <div id="list"></div>
              </div>
            </div>
            <div class="col-md-5">
              <label for="album"> Nombre del álbum </label>
              <div id="mensajeNombreAlbum"></div>
              <input type="text" name="album" placeholder="Nombre del álbum" class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte un nombre de álbum valido')" oninput="setCustomValidity('')" required>
              <br>

              <label for="cost"> Costo en tickets </label>
              <div id="mensajeTickets"></div>
              <input type="number" id="cost" min="0" pattern="{1-3}" name="cost" class="form-control" placeholder="Costo en tickets" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')">
              <br>

              <label for="tags"> Géneros </label>
              <select name="tags[]" multiple="true"  class="form-control" id="genders" required>
                @foreach($tags as $genders)
                  @if($genders->type_tags=='Musica')
                    <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                  @endif
                @endforeach
              </select>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalgenero">
                Agregar género
              </button>
              <br>
              <br>

              <label for="artist"> Artista o Grupo musical </label>
              @foreach(App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles as $mod)
                @if($mod->name == 'Productora')
                    @if(count($autors)!=0 )
                    <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                      @foreach($autors as $artist)
                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                      @endforeach
                    </select>
                    <br>
                    <a href="{{ url('/artist_form') }}" class="btn btn-success">
                      Agregar artista o grupo musical
                    </a>
                  @else
                    <label id="faltaRegistro" style="color: red;"> 
                      Usted aun no tiene registros de datos de artistas o de grupos musicales, por favor agregue dichos datos primero
                    </label>
                    <a href="{{ url('/artist_form') }}" class="btn btn-success">
                      Agregar artista o grupo musical
                    </a>
                  @endif
                @elseif($mod->name == 'Artista')
                  @if(count($autors)!=0 )
                    <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                      @foreach($autors as $artist)
                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                      @endforeach
                    </select>
                  @else
                    <br>
                    <label id="faltaRegistro" style="color: red;"> 
                      Usted aun no tiene registros de sus datos como artista o los datos de su grupo musical, por favor agregue dichos datos primero
                    </label>
                    <a href="{{ url('/artist_form') }}" class="btn btn-success">
                      Agregar artista o grupo musical
                    </a>
                  @endif
                @endif
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12" style="margin-left: 30px;">
        <div class="box box-primary" style="margin-rigth: 30px;">
          <div class="box-header with-border">
            <h3 class="box-title">Canciones</h3>
          </div>
          <div class="box-body">
            <div class="col-sm-2">
              <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Añadir canciones</a>
            </div>
            <div class="col-sm-10">
              <div id="mensajeCancion"></div>
              <div class="field_wrapper">
                <div class="row group">
                  <div class="col-sm-9">
                    <div id="mensajeNombreCancion"></div>
                    <input type="text" name="song_n[]" id="titleSong" class="titleSong form-control" placeholder="Nombre de la canción" oninvalid="this.setCustomValidity('Ingrese un nombre a la canción')" oninput="setCustomValidity('')" required="required">
                    <input type="file" name="audio[]" id="audio" class="form-control" accept=".mp3" required="required" oninvalid="this.setCustomValidity('Ingrese la canción')" oninput="setCustomValidity('')">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div align="center">
      <button type="submit" id="registrarAlbum" class="btn btn-primary">
        Registrar álbum
      </button>
    </div>
  </form>
  <div class="modal modal-primary fade" role="dialog" id="modalgenero">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 style="text-align: center; color: #fff;">Agregar género</h1>
        </div>
        <div class="modal-body">
          {!! Form::open(['route'=>'tags.store', 'method'=>'POST', 'id'=>'Form1']) !!}
            {{ Form::token() }}
            {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
            {!! Form::hidden('type_tags','Musica') !!}
            {!! Form::hidden('ruta','Musica') !!}
            <label for="exampleInputFile" class="control-label">Nuevo género</label>
            {!! Form::text('tags_name',null,['class'=>'form-control','placeholder'=>'Ingrese el nuevo género', 'id'=>'new_tag','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese el nuevo género')",'oninput'=>"setCustomValidity('')"]) !!}
            <br>
            <div align="center">
              {!! Form::submit('Guardar género', ['class' => 'btn btn-primary','id'=>'save-resource']) !!}
            </div>
          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>  
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
//---------------------------------------------------------------------------------------------------
// Para evitar el envio de datos si faltan los datos del grupo musical o artista
    $(document).ready(function(){
      if ($('#faltaRegistro').length) {
        $('#registrarAlbum').attr('disabled',true);
        //$('#registrarAlbum').hide();
      } else {
        $('#registrarAlbum').attr('disabled',false);
        //$('#registrarAlbum').hide();
      }
    });
// Para evitar el envio de datos si faltan los datos del grupo musical o artista
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
              $('#mensajePortadaAlbum').show();
              $('#mensajePortadaAlbum').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
              $('#mensajePortadaAlbum').css('color','red');
              $('#registrarAlbum').attr('disabled',true);
          } else {
              $('#mensajePortadaAlbum').hide();
              $('#registrarAlbum').attr('disabled',false);
          }
      });
  });
// Para validar el tamaño de la Foto o Logo
//---------------------------------------------------------------------------------------------------
// Para agregar y eliminar las canciones
    $(document).ready(function(){
      function newHTML(x) {
        var newHTML = 
        "<div class='row group'>"+
          "<br>"+
          "<div class='remove_button'>"+
            "<div class='col-sm-9'>"+
              "<input type='text' name='song_n[]' id='titleSong' class='titleSong"+x+" form-control' placeholder='Nombre de la canción' oninvalid='this.setCustomValidity('Ingrese un nombre a la canción')' oninput='setCustomValidity('')' required='required'>"+
              "<input type='file' name='audio[]' accept='.mp3' id='audio' class='audio"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese la canción')' oninput='setCustomValidity('')'>"+
            "</div>"+
            "<div class='col-sm-2 eliminar'>"+
              "<button type='button' class='btn btn-danger btnRemove'>Eliminar canción</button>"+
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
            $('#mensajeNombreCancion').text('El nombre de una canción no debe exceder los 255 caracteres');
            $('#mensajeNombreCancion').css('color','red');
            $('#registrarAlbum').attr('disabled',true);
          } else {
            $('#mensajeNombreCancion').hide();
            $('#registrarAlbum').attr('disabled',false);
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
            $('#registrarAlbum').attr('disabled',true);
          } else {
            $('#mensajeCancion').hide();
            $('#registrarAlbum').attr('disabled',false);
          }
        });
        // Para validar el tamaño de la cancion
        x++;
      });
      $(wrapper).on('click','.eliminar', function(e){
        e.preventDefault();
        var eliminar = confirm("¿Está seguro de eliminar la canción?");
        if (eliminar) {
          var uno = $(this).parent('div');
          var dos = $(uno).parent('div');
          dos.remove();
        }
      });
    });
// Para agregar y eliminar las canciones
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>999) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#registrarAlbum').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#registrarAlbum').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#registrarAlbum').attr('disabled',false);
        }
      });
    });
// Para validar la cantidad de Tickets
//---------------------------------------------------------------------------------------------------
// Para validar la longtud de los campos 'nombre del album' y 'nombre de la cancion'
    $(document).ready(function(){
      $('#title').keyup(function(evento){
        var nombre = $('#title').val().length;
        if (nombre>=256) {
          $('#mensajeNombreAlbum').show();
          $('#mensajeNombreAlbum').text('La longtud del nombre del álbum no debe exceder los 255 caracteres');
          $('#mensajeNombreAlbum').css('color','red');
          $('#registrarAlbum').attr('disabled',true);
        } else {
          $('#mensajeNombreAlbum').hide();
          $('#registrarAlbum').attr('disabled',false);
        }
      });
    });
    $(document).ready(function(){
      $('#titleSong').keyup(function(evento){
        var nombre = $('#titleSong').val().length;
        if (nombre>=256) {
          $('#mensajeNombreCancion').show();
          $('#mensajeNombreCancion').text('El nombre de una canción no debe exceder los 255 caracteres');
          $('#mensajeNombreCancion').css('color','red');
          $('#registrarAlbum').attr('disabled',true);
        } else {
          $('#mensajeNombreCancion').hide();
          $('#registrarAlbum').attr('disabled',false);
        }
      });
    });
// Para validar la longtud de los campos 'nombre del album' y 'nombre de la cancion'
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño de la cancion
    $(document).ready(function(){
      var campo = document.getElementsByName("audio[]")[0];
      $(campo).change(function(){
          var tamaño = this.files[0].size;
          var tamañoKb = parseInt(tamaño/1024);
          if (tamañoKb>2048) {
              $('#mensajeCancion').show();
              $('#mensajeCancion').text('Una de las canciones es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
              $('#mensajeCancion').css('color','red');
              $('#registrarAlbum').attr('disabled',true);
          } else {
              $('#mensajeCancion').hide();
              $('#registrarAlbum').attr('disabled',false);
          }
      });
    });
// Para validar el tamaño de la cancion
//---------------------------------------------------------------------------------------------------
  </script>
@endsection