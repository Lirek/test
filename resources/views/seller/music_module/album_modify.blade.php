@extends('seller.layouts')
<style type="text/css">
  #image-preview {
    width: 100%;
    height: 400px;
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
    color: #ecf0f1;
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
            <h3 class="box-title">Editar Album</h3>
          </div>

          <div class="box-body">
            <div class="col-md-6">
              <label id="portadaActual" style="color: green;"> Si no selecciona una Portada, se mantendrá la actual </label>
              <div id="mensajePortadaAlbum"></div>
              <div id="image-preview" style="border:#000000 1px solid;" class="col-md-1">
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
                <input type="text" name="song_o[{{$i}}]" class="form-control" value="{{$song->song_name}}">
                <input type="hidden" name="song_id[{{$i}}]" value="{{$song->id}}">
                  <?php $i++; ?>
              </div>
              <div class="col-md-6">
                <audio controls>
                  <source src="{{ asset($song->song_file) }}" type="audio/mpeg">
                </audio>
                {{--pendiente con el $song->id creo que hay que colocarlo [$i]--}}
                <a href="{{ url('/delete_song/'.$song->id) }}" onclick="return confirm('¿Desea eliminar la canción {{ $song->song_name }}?')" class="btn btn-danger btn-xs">
                  <span class="glyphicon glyphicon-remove"></span>
                </a>
              </div>
              {{--
              <div class="col-md-6">
                <button type="button" id="btnAdd-2" class="btn btn-success">Añadir Canciones</button>
              </div>
              --}}
            @endforeach
            <div class="col-md-12">
              <div class="row">
                
                <div id="campoMusica">
                  {{--
                  <div class="col-md-9">
                    <div class="row group">
                      <div class="col-md-8">
                        <div id="mensajeNombreCancion"></div>
                        <input type="text" name="song_n[]" id="song_n" class="form-control" placeholder="Nombre de la Canción" oninvalid="this.setCustomValidity('Ingrese Un Nombre a La Canción')" oninput="setCustomValidity('')" required="required">
                        <input type="file" name="audio[]" id="audio" class="form-control" accept=".mp3" required="required" oninvalid="this.setCustomValidity('Ingrese la Canción')" oninput="setCustomValidity('')">
                      </div>
                      <div class="col-md-1">
                        <a class="btn btn-danger eliminarCampo" id="">
                          <span class="glyphicon glyphicon-remove"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                  --}}
                </div>
                
                {{--
                <div class="col-md-3">
                  <a class="btn btn-success add_button" id="agregar">Añadir más Canciones</a>
                </div>
                --}}

                {{--
                <div class="col-md-8">
                  <input type="text" name="song_n[]" id="song_n" placeholder="Nombre de la Cancion" class="form-control" oninvalid="this.setCustomValidity('Ingrese Un Nombre a La Cancion')" oninput="setCustomValidity('')">
                  <input type="file" name="audio[]" accept=".mp3" id="audio" class="form-control">
                </div>
                <div class="col-sm-4">
                  <button type="button" class="btn btn-danger btnRemove">Eliminar Canción</button>
                </div>
                --}}

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
  // Para mostrar los campos para agragar una cancion
      /*
      */
    $(document).ready(function(){

      function divOtro(x) {
        var divOtro = 
        "<div class='col-md-9'>"+
        "<div class='row group'>"+
          "<div class='col-sm-8'>"+
            "<input type='text' name='song_n[]' id='song_n' class='form-control' placeholder='Nombre de la Canción' oninvalid='this.setCustomValidity('Ingrese Un Nombre a La Canción')' oninput='setCustomValidity('')' required='required'>"+
            "<input type='file' name='audio[]' id='audio' class='form-control' accept='.mp3' required='required' oninvalid='this.setCustomValidity('Ingrese la Canción')' oninput='setCustomValidity('')'>"+
          "</div>"+
          "<div class='col-md-1'>"+
            "<a class='btn btn-danger' id='eliminarCampo"+x+"'>"+
              "<span class='glyphicon glyphicon-remove'></span>"+
            "</a>"+
          "</div>"+
        "</div>"+
      "</div>";
      return divOtro;
      }

      var maxField = 1;
      var div = $('#campoMusica');
      var agregar = $('#agregar');
      var x = 0;

      div.append(divOtro(x));

      $(agregar).click(function(){
        x++;
        div.append(divOtro(x));
      });

      var eliminarCampo = $("#eliminarCampo"+x);
      $(eliminarCampo).click(function(){
        var confirma = confirm('¿Desea eliminar esta la canción?');
        if (confirma) {
          var uno = $(this).parent('div');
          var dos = uno.parent('div');
          var tres = dos.parent('div');
          tres.remove();
          x--;
        }
      });
      var eliminarCampo = $('#eliminarCampo');
      $(eliminarCampo).click(function(){
        var confirma = confirm('¿Desea eliminar esta la canción?');
        if (confirma) {
          var uno = $(this).parent('div');
          var dos = uno.parent('div');
          var tres = dos.parent('div');
          console.log(tres);
          tres.remove();
          x--;
        }
      });
    });
  // Para mostrar los campos para agragar una cancion
//---------------------------------------------------------------------------------------------------
/*
  $(document).ready(function(){

    $('#campoMusica').multifield({
      section: '.group',
      btnAdd:'.add_button',
      btnRemove:'.eliminarCampo'
    });

    var i=0;
    function sum() {
        i++;
    };
  });



$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(".chosen1").chosen({
    disable_search_threshold: 10,
    no_results_text: "No se encuentra el Artista",
    width: "45%",
    placeholder_text_single:"Seleccione un Artista"
  }); 
    
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

$(document).ready(function (e){

$('#title').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

$('#genders').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

$('#cost').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name <=100){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});






$( "#Form1" ).on( 'submit', function(e)
{
    e.preventDefault();
    $.ajax({
            url: 'tagMusic',
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                name: $('input[name=tag]').val(),
            }, 
            success: function (result) {
                alert("Guardado Con Exito");
            },
            error: function (result) {
            alert('Existe un Error en su Solicitud Por Favor Revise Los Datos Ingresados');
                                console.log(result);
            }
        });  
    });
});


function checkIt(evt) {

    evt = (evt) ? evt : window.event

    var charCode = (evt.which) ? evt.which : evt.keyCode

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {

        status = "This field accepts numbers only."

        return false

    }

    status = ""

    return true

};

function validarFormulario(){
    jQuery.validator.messages.required = 'Esta campo es obligatorio.';
    jQuery.validator.messages.number = 'Esta campo debe ser num&eacute;rico.';
    jQuery.validator.messages.email = 'La direcci&oacute;n de correo es incorrecta.';
    $("#enviar").click(function(){
       var validado = $("#formulario").valid();
       if(validado){
          alert('El formulario es correcto.');
       }
    });
}
*/
</script>
@endsection