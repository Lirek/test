@extends('seller.layouts')
@section('css')
    <style>
        #image-preview {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 80%;
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

        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }


    </style>
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
@endsection
@section('content')
@if (count($errors)>0)
    <div class="col s6 ">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h3 class="center">
                Registrar álbum
            </h3>
            <br>
            <div class="row">
                <form method="POST" action="{{ url('/albums') }}" enctype="multipart/form-data" id="formulario">
                <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
                {{ csrf_field() }}
                <div class="col s12">
                    <div class="col s12 m6">
                        <div id="mensajePortadaAlbum"></div>
                          <div id="image-preview" style="border:#bdc3c7 1px solid;" class="col-md-1">
                            <label for="image-upload" id="image-label">Portada</label>
                            <input type="file" name="image" id="image-upload" accept="image/*" class="form-control required" required oninvalid="this.setCustomValidity('Seleccione un Archivo de Portada')" oninput="setCustomValidity('')" />
                            <div id="list"></div>
                          </div>
                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                          @foreach(App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles as $mod)
                            @if($mod->name == 'Productora')
                                @if(count($autors)!=0 )
                                <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                  @foreach($autors as $artist)
                                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                                  @endforeach
                                </select>
                                <label for="artist"> Artista o Grupo musical </label>
                                <br>
                                <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              @else
                                <label id="faltaRegistro" style="color: red;"> 
                                  Usted aun no tiene registros de datos de artistas o de grupos musicales, por favor agregue dichos datos primero
                                </label>
                                <br><br><br><br>
                                <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              @endif
                            @elseif($mod->name == 'Artista')
                              @if(count($autors)!=0 )
                                <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                  @foreach($autors as $artist)
                                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                                  @endforeach
                                </select>
                                <label for="artist"> Artista o Grupo musical </label>
                              @else
                                <br>
                                <label id="faltaRegistro" style="color: red;"> 
                                  Usted aun no tiene registros de sus datos como artista o los datos de su grupo musical, por favor agregue dichos datos primero
                                </label>
                                <br><br><br><br>
                                <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              @endif
                            @endif
                          @endforeach
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">create</i>
                        <label for="album"> Nombre del álbum </label>
                        <input type="text" name="album"  class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte un nombre de álbum valido')" oninput="setCustomValidity('')" required>
                        <div id="mensajeNombreAlbum"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                        <label for="cost"> Costo en tickets </label>
                        <input type="number" id="cost" min="0" pattern="{1-3}" name="cost" class="form-control" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')" >
                        <div id="mensajeTickets"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m12">
                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                        
                          <select name="tags[]" multiple="true"  class="form-control" id="genders" required>
                            @foreach($tags as $genders)
                              @if($genders->type_tags=='Musica')
                                <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                              @endif
                            @endforeach
                          </select>
                          <label for="tags"> Géneros </label>
                          <button type="button" class="btn curvaBoton waves-effect waves-light green modal-trigger" href="#modalgenero" >
                            Agregar género
                          </button>
                    </div>
                    </div>
                <div class="col s12">
                    <h3 class="center">
                        Canciones
                    </h3>
                    <br>
                        <a href="javascript:void(0);" class="btn curvaBoton waves-effect waves-light green add_button" title="Add field">Añadir más canciones</a>         
                    <div class="field_wrapper">
                        <div class="row group">
                            <div class="file-field input-field col s12 m6">
                                <label for="duration" class="control-label">Cargar Canción</label>
                                <br><br>
                                <div class="btn blue">
                                    <span><i class="material-icons">music_note</i></span>
                                    <input type="file" name="audio[]" id="audio" class="form-control" accept=".mp3" required="required" oninvalid="this.setCustomValidity('Ingrese la canción')" oninput="setCustomValidity('')">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <br>
                            </div>
                            <br><br>
                            <div id="mensajeNombreCancion"></div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix blue-text valign-wrapper">create</i>
                                <label for="song_n">Nombre de la canción</label>
                                <input type="text" name="song_n[]" id="titleSong" class="titleSong form-control"  oninvalid="this.setCustomValidity('Ingrese un nombre a la canción')" oninput="setCustomValidity('')" required="required">
                                <br><br>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                                <label for="cost"> Costo en tickets </label>
                                <input type="number" id="costpisodio" min="0" pattern="{1-3}" name="costpisodio[]" class="form-control" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')" >
                                <div id="mensajeTickets"></div>
                                <br>
                            </div>
                        </div>
                    </div>           
                </div>
                <div class="col s12">
                    <button type="submit" id="registrarAlbum" class="btn curvaBoton waves-effect waves-light green">
                        Registrar álbum
                    </button>
                </div>
                </form>
            </div>
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
        </div>
    </div>
</div>
        <!-- /.modal  de generos  -->
<div id="modalgenero" class="modal">
    <div class="modal-content">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i> Agregar nuevo género</h4>
            <br>
        </div>
        <br>
       
                {!! Form::open(['route'=>'tags.store', 'method'=>'POST','files' => 'true' ]) !!}
                {{ Form::token() }}
                <div class="row">
                    <div class="col s12">
                        {!! Form::hidden('ruta','Musica') !!}
                        <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id}}" id="seller_id">
                        <input type="hidden" name="type_tags" value="Musica" id="type_tags">
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            <label for="new_tag" class="control-label">Nuevo género</label>
                            
                            <input type="text" name="tags_name" class="form-control"  id="new_tag" required="required" >
                            <div id="mensajegeneronuevo"></div>
                        </div>
                        <br>
                    </div>
                </div>
                <div align="center">
                    <button class="btn curvaBoton waves-effect waves-light green"  id="save-resource" onclick="callback()">Guardar género</button>
                </div>
            
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>
@endsection
@section('js')

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
          "<div class='col s12'>"+
            "<div class='file-field input-field col s12 m6'>"+
              "<label for='audio' class='control-label'>Cargar canción</label>"+
              "<br><br>"+
              "<div class='btn blue'>"+
              "<span><i class='material-icons'>music_note</i></span>"+
              "<input type='file' name='audio[]' accept='.mp3' id='audio' class='audio"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese la canción')' oninput='setCustomValidity('')'>"+
              "</div>"+
              "<div class='file-path-wrapper'>"+
              "<input class='file-path validate' type='text'>"+
              "</div>"+
            "</div>"+
            "<br><br>"+
            "<div class='input-field col s12 m6'>"+
              "<i class='material-icons prefix blue-text valign-wrapper'>create</i>"+
              "<label>Nombre de la Canción</label>"+
              "<input type='text' name='song_n[]' id='titleSong' class='titleSong"+x+" form-control'  oninvalid='this.setCustomValidity('Ingrese un nombre a la canción')' oninput='setCustomValidity('')' required='required'>"+
              "</div>"+
              "<div class='input-field col s12 m6'>"+
                "<i class='material-icons prefix blue-text valign-wrapper'>local_play</i>"+
                "<label for='cost'> Costo en tickets </label>"+
                "<input type='number' id='costpisodio' min='0' pattern='{1-3}' name='costpisodio[]' class='form-control' oninput='maxLengthCheck(this)' oninvalid='this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')' oninput='setCustomValidity('')' >"+
                "<div id='mensajeTickets'></div>"+
                " <br>"+
            "</div>"+
            "<div class='col-sm-2 eliminar'>"+
              "<button type='button' class='btn curvaBoton waves-effect waves-light red btnRemove'>Eliminar canción</button>"+
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
        // var campo = ".audio"+x;
        // $(campo).change(function(){
        //   var tamaño = this.files[0].size;
        //   var tamañoKb = parseInt(tamaño/1024);
        //   if (tamañoKb>2048) {
        //     $('#mensajeCancion').show();
        //     $('#mensajeCancion').text('Una de las canciones es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
        //     $('#mensajeCancion').css('color','red');
        //     $('#registrarAlbum').attr('disabled',true);
        //   } else {
        //     $('#mensajeCancion').hide();
        //     $('#registrarAlbum').attr('disabled',false);
        //   }
        // });
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
<script type="text/javascript">
    
       function callback() {
            $('#save-resource').attr('disabled',true);
            var tags_name= $("#new_tag").val();
            var type_tags= $('#type_tags').val();
            var seller_id = $('#seller_id').val();
  
                                $.ajax({
                                url: "{{ url('/AddTags') }}",
                                type: 'POST',
                                data: {
                                        _token: $('input[name=_token]').val(),
                                        tags_name: tags_name,
                                        type_tags: type_tags,
                                        seller_id: seller_id,
                                      
                                      }, 

                                success: function (result) {
                                    
                                    if(result==0){
                                    swal("Genero "+tags_name +" agregado con exito y en espera de verificación","","success");
                                    $('#modalgenero').toggle();
                                    $('.modal-backdrop').remove();
                                    }
                                },

                                error: function (result) {
                                    swal('Existe un Error en su Solicitud','','error');
                                
                                },
                                });  
 }


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
<script type="text/javascript">
 
    
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('#registroPelicula').ajaxForm({
        
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=audio').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#registrarAlbum').attr('disabled',true);
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Completado..';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
            // alert('Uploaded Successfully');
            window.location.href = "{{URL::to('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}"

        }
    });
     
    })();
</script>
<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>
@endsection