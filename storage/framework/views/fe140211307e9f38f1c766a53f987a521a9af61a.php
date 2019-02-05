<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if(count($errors)>0): ?>
    <div class="col s6 ">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li> <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="card-panel curva">
            <h3 class="center">
                Editar álbum
            </h3>
            <br>
            <div class="row">
                <form method="POST" action="<?php echo e(url('/modify_album')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="seller_id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>">
                <input type="hidden" name="id" value="<?php echo e($id); ?>">
                <div class="col m6 s12">
                      <label id="portadaActual" style="color: green;"> Si no selecciona una portada, se mantendrá la actual </label>
                      <div id="mensajePortadaAlbum"></div>
                      <div id="image-preview" style="border:#bdc3c7 1px solid;" class="col-md-1">
                        <label for="image-upload" id="image-label">Portada</label>
                        <input type="file" name="image" id="image-upload" accept="image/*" oninvalid="this.setCustomValidity('Seleccione una imagen de portada')" oninput="setCustomValidity('')"/>
                        <div id="list">
                            <img style= "width:100%; height:100%; border-top:50%;" src="<?php echo e(asset($album->cover)); ?>"/>
                        </div>
                      </div>
                </div>
                 <div class="input-field col s12 m6">
                          <?php $__currentLoopData = App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($mod->name == 'Productora'): ?>
                                <?php if(count($autors)!=0 ): ?>
                                <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                    <option value="<?php echo e($album->Autors->id); ?>"><?php echo e($album->Autors->name); ?></option>
                                  <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="artist"> Artista o Grupo musical </label>
                                <br>
                                <a href="<?php echo e(url('/artist_form')); ?>" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              <?php else: ?>
                                <label id="faltaRegistro" style="color: red;"> 
                                  Usted aun no tiene registros de datos de artistas o de grupos musicales, por favor agregue dichos datos primero
                                </label>
                                <br><br><br><br>
                                <a href="<?php echo e(url('/artist_form')); ?>" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              <?php endif; ?>
                            <?php elseif($mod->name == 'Artista'): ?>
                              <?php if(count($autors)!=0 ): ?>
                                <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                    <option value="<?php echo e($album->Autors->id); ?>"><?php echo e($album->Autors->name); ?></option>
                                  <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="artist"> Artista o Grupo musical </label>
                              <?php else: ?>
                                <br>
                                <label id="faltaRegistro" style="color: red;"> 
                                  Usted aun no tiene registros de sus datos como artista o los datos de su grupo musical, por favor agregue dichos datos primero
                                </label>
                                <br><br><br><br>
                                <a href="<?php echo e(url('/artist_form')); ?>" class="btn curvaBoton waves-effect waves-light green">
                                  Agregar artista o grupo musical
                                </a>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">create</i>
                    
                    <div id="mensajeNombreAlbum"></div>
                    <?php if($album->status != 'Aprobado'): ?>
                        <input type="text" name="album" value="<?php echo e($album->name_alb); ?>"  class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte un nombre de álbum valido')" oninput="setCustomValidity('')">
                    <?php else: ?>
                        <input type="text" name="album" value="<?php echo e($album->name_alb); ?>"  class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte un nombre de álbum valido')" oninput="setCustomValidity('')" readonly="true">
                    <?php endif; ?>
                    <label for="album"> Nombre del álbum </label>
                      <br>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">local_play</i>        
                    <div id="mensajeTickets"></div>
                    <?php if($album->status != 'Aprobado'): ?>
                    <input type="number" name="cost" id="cost" value="<?php echo e($album->cost); ?>"  class="form-control"min="0" pattern="{3}" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')">
                     <?php else: ?>
                     <input type="number" name="cost" id="cost" value="<?php echo e($album->cost); ?>"  class="form-control"min="0" pattern="{3}" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')" readonly="true">
                     <?php endif; ?>
                     <label for="cost"> Costo en tickets </label>
                    <br>
                </div>
                <div class="input-field col s12 m6">
                <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                <?php if($album->status != 'Aprobado'): ?>       
                  <select name="tags[]" multiple="true" class="form-control" required>
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($genders->id); ?>"
                        <?php $__currentLoopData = $s_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <?php if($s->id == $genders->id): ?> 
                            selected 
                          <?php endif; ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        >
                        <?php echo e($genders->tags_name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php else: ?>
                    <select name="tags[]" multiple="true" class="form-control" required disabled="true">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($genders->id); ?>"
                        <?php $__currentLoopData = $s_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                          <?php if($s->id == $genders->id): ?> 
                            selected 
                          <?php endif; ?> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                        >
                        <?php echo e($genders->tags_name); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php endif; ?>
                  <label for="tags"> Generos </label>
                  <br>
                </div>
                <div class="col s12">
                    <h3 class="center">
                        Canciones
                    </h3>
                    <br>
                        <div class="col s12">
                        <a href="javascript:void(0);" class="btn curvaBoton waves-effect waves-light green add_button" title="Add field">Añadir más canciones</a>
                        </div> 
                         <div class="col s12">
                        <?php $__currentLoopData = $songs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="input-field col m4 s12">
                            <i class="material-icons prefix blue-text valign-wrapper">create</i>
                            <label for="song_n">Nombre de la canción</label>
                            <?php if($song->status != 'Aprobado'): ?> 
                                <input type="text" name="song_o[<?php echo e($i); ?>]" id="song_name<?php echo e($i); ?>" class="form-control" placeholder="Nombre de la canción" value="<?php echo e($song->song_name); ?>">
                            <?php else: ?>
                                <input type="text" name="song_o[<?php echo e($i); ?>]" id="song_name<?php echo e($i); ?>" class="form-control" placeholder="Nombre de la canción" value="<?php echo e($song->song_name); ?>" readonly="true">
                            <?php endif; ?>
                            <input type="hidden" name="song_id[<?php echo e($i); ?>]" value="<?php echo e($song->id); ?>">
                            
                          </div>
                          <div class="input-field col s12 m4">
                            
                              <div class="col m12">
                                <audio id="player" class="player<?php echo e($i); ?>">
                                    <source src="" type="audio/mp3" id="play"> 
                                </audio>
                              </div>
                              <!-- <div class="col m1" >
                                <a href="<?php echo e(url('/delete_song/'.$song->id)); ?>" onclick="return confirm('¿Desea eliminar la canción <?php echo e($song->song_name); ?>?')" class="btn btn-danger btn-xs">
                                  <span class="glyphicon glyphicon-remove"></span>
                                </a>
                              </div> -->
                            
                          </div>
                           <div class="input-field col s12 m4">
                                <i class="material-icons prefix blue-text valign-wrapper">local_play</i>        
                                <div id="mensajeTickets"></div>
                                <?php if($song->status != 'Aprobado'): ?>
                                <input type="number" name="costpisodio[<?php echo e($i); ?>]" id="costpisodio[<?php echo e($i); ?>]" value="<?php echo e($song->cost); ?>"  class="form-control"min="0" pattern="{3}" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')">
                                 <?php else: ?> 
                                 <input type="number" name="costpisodio[<?php echo e($i); ?>]" id="costpisodio[<?php echo e($i); ?>]" value="<?php echo e($song->cost); ?>"  class="form-control"min="0" pattern="{3}" oninput="maxLengthCheck(this)" oninvalid="this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')" oninput="setCustomValidity('')" readonly="true">
                                 <?php endif; ?>
                                 <label for="cost"> Costo en tickets </label>
                                <br>
                            </div>
                          <?php 
                            $i++
                           ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> 
                    </div>
                    <div id="mensajeNombreCancion"></div>
                    <div id="mensajeCancion"></div>
                    <div class="col-sm-9">
                        <div class="field_wrapper">
                        </div>
                    </div>
                <div class="col s12">
                <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="modificarAlbum">
                    Editar álbum
                  </button>
                  <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

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
    <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
<script>
    // Llamado de la funcion 'musicFromAlbum' en AlbumsController y carga de las canciones al reproductor
  $(document).ready(function(){
    $.ajax({
      url     : "<?php echo e(url('/musicFromAlbum/'.$id)); ?>",
      type    : "GET",
      dataType: "json",
      success: function (data) {

        var audio=document.getElementById('player');

        $.each(data, function(i,song) {
          var rutaPlyr = "<?php echo e(asset('/')); ?>"+data[i].song_file;
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
          $('#mensajeNombreAlbum').text('La longtud del nombre del álbum no debe exceder los 255 caracteres');
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
          $('#mensajeNombreCancion').text('El nombre de una canción no debe exceder los 255 caracteres');
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
          $('#mensajeTickets').text('El costo de tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#modificarAlbum').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de Tickets debe ser mayor a 0');
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
</script>
<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>