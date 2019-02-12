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
                Registrar canción
            </h3>
            <br>
            <div class="row">
                <?php echo Form::open(['url'=>'modify_single','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']); ?>

                  <?php echo Form::hidden('seller_id',Auth::guard('web_seller')->user()->id); ?>

                  <?php echo Form::hidden('id',$id); ?>

                  <?php echo e(csrf_field()); ?>

                <div class="col s12">
                     <div class="input-field col s12 m6">
                              <?php $__currentLoopData = App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($mod->name == 'Productora'): ?>
                                    <?php if(count($autors)!=0 ): ?>
                                    <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                    <select name="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
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
                        <label for="Nombre de la Cancion">Nombre de la canción</label>
                        <?php if($song->status!='Aprobado'): ?>
                       <?php echo Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')"]); ?>

                       <?php else: ?>
                       <?php echo Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')",'readonly'] ); ?>

                       <?php endif; ?>
                        <div id="mensajeNombreCancion"></div>
                        <br>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                        <label for="Costo en Tickets">Costo en tickets</label>
                        <?php if($song->status!='Aprobado'): ?>
                            <?php echo Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets No Mayor a 999')", 'oninput'=>"maxLengthCheck(this)"]); ?>

                        <?php else: ?>
                             <?php echo Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets No Mayor a 999')", 'oninput'=>"maxLengthCheck(this)",'readonly']); ?>

                        <?php endif; ?>
                        <div id="mensajeTickets"></div> 
                        <br>
                    </div>  
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                        <?php if($song->status!='Aprobado'): ?>
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
                        <select name="tags[]" multiple="true" class="form-control" disabled="true">
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
                        <label for="tags"> Géneros </label>
                              
                        <br>
                    </div> 
                </div>
                <?php if($song->status!='Aprobado'): ?>
                <label style="color: green;">
            Si no selecciona una canción, se mantendrá la actual.
          </label>
                <div class="col s12">
                    <div class="file-field input-field col s12 m6">
                        <label for="Seleccione Música">Seleccione canción</label>
                        <br><br>
                        <div class="btn blue">
                            <span><i class="material-icons">music_note</i></span>
                           <?php echo Form::file('audio',['class'=>'form-control-file','accept'=>'.mp3','id'=>'cancion', 'oninvalid'=>"this.setCustomValidity('Seleccione una canción')",'oninput'=>"setCustomValidity('')"]); ?>

                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="audio">
                        </div>
                        <br>
                        <div id="mensajeCancion"></div>
                        <br>
                    </div> 
               </div>
               <div class="col m12">
                    <audio id="player" class="player">
                        <source src="<?php echo e(asset($song->song_file)); ?>" type="audio/mp3" id="play"> 
                    </audio>
                </div>
               <?php else: ?>
                
               <?php endif; ?>
               <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
               <div class="col s12">
                   <button class="btn curvaBoton waves-effect waves-light green" id="editarCancion">Editar canción</button>
                   <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
               </div>
                <?php echo Form::close(); ?>

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
       
                <?php echo Form::open(['route'=>'tags.store', 'method'=>'POST','files' => 'true' ]); ?>

                <?php echo e(Form::token()); ?>

                <div class="row">
                    <div class="col s12">
                        <?php echo Form::hidden('ruta','Musica'); ?>

                        <input type="hidden" name="seller_id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>" id="seller_id">
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
<script>
//---------------------------------------------------------------------------------------------------
// Para validar la longtud del nombre de la cancion
    $(document).ready(function(){
        var cantidadMaxima = 191;
        $('#song_n').keyup(function(evento){
            var cancion = $('#song_n').val();
            numeroPalabras = cancion.length;
            $('#cantidadPalabra').text(numeroPalabras+'/'+cantidadMaxima);
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeNombreCancion').show();
                $('#mensajeNombreCancion').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeNombreCancion').css('color','red');
                $('#editarCancion').attr('disabled',true);
            } else {
                $('#mensajeNombreCancion').hide();
                $('#editarCancion').attr('disabled',false);
            }
        });
    });
// Para validar la longtud del nombre de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño de la cancion
    $(document).ready(function(){
      $('#cancion').change(function(){
          var tamaño = this.files[0].size;
          var tamañoKb = parseInt(tamaño/1024);
          if (tamañoKb>2048) {
              $('#mensajeCancion').show();
              $('#mensajeCancion').text('La canción es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
              $('#mensajeCancion').css('color','red');
              $('#editarCancion').attr('disabled',true);
          } else {
              $('#mensajeCancion').hide();
              $('#editarCancion').attr('disabled',false);
          }
      });
    });
// Para validar el tamaño de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>999) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de Tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#editarCancion').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de Tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#editarCancion').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#editarCancion').attr('disabled',false);
        }
      });
    });
// Para validar la cantidad de Tickets
//---------------------------------------------------------------------------------------------------
  </script>
<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>
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
            window.location.href = "<?php echo e(URL::to('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>"

        }
    });
     
    })();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>