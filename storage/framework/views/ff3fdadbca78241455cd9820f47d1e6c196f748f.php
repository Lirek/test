<?php $__env->startSection('content'); ?>
  <?php if($errors->any()): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
  <?php endif; ?>
  <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo Form::open(['url'=>'single_registration','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']); ?>

    <?php echo Form::hidden('seller_id',Auth::guard('web_seller')->user()->id); ?>

    <?php echo e(csrf_field()); ?>

    <div class="row" style="margin-left: 30px;">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Registrar canción</h3>
          </div>
          <div class="box-body">
            <label for="Nombre de la Cancion">Nombre de la canción</label>
            <div id="mensajeNombreCancion"></div>
            <?php echo Form::text('song_n',null,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n' ,'oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')"]); ?>

            <br>

            <label for="Costo en Tickets">Costo en tickets</label>
            <div id="mensajeTickets"></div>
            <?php echo Form::number('cost',null,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets no mayor a 999')", 'oninput'=>"setCustomValidity('')"]); ?>

            <br>

            <label for="Seleccione Música">Seleccione música</label>
            <div id="mensajeCancion"></div>
            <?php echo Form::file('audio',['class'=>'form-control','accept'=>'.mp3','id'=>'cancion','required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una canción')",'oninput'=>"setCustomValidity('')"]); ?>

            <br>

            <label for="tags">Géneros</label>
            <select name="tags[]" multiple="true" class="form-control" required>
              <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($genders->type_tags=='Musica'): ?>
                  <option value="<?php echo e($genders->id); ?>"><?php echo e($genders->tags_name); ?></option>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br>

            <label for="artist">Artista o Grupo musical</label>
            <?php $__currentLoopData = App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($mod->name == 'Productora'): ?>
                <?php if(count($autors)!=0): ?>
                  <select name="artist" class="form-control" required="required">
                    <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <br>
                  <a href="<?php echo e(url('/artist_form')); ?>" class="btn btn-success">
                    Agregar artista o grupo musical
                  </a>
                <?php else: ?>
                  <br>
                  <label id="faltaRegistro" style="color: red;"> 
                    Usted aun no tiene registros de datos de artistas o de grupos musicales, por favor agregue dichos datos primero
                  </label>
                  <a href="<?php echo e(url('/artist_form')); ?>" class="btn btn-success">
                    Agregar artista o grupo musical
                  </a>
                <?php endif; ?>
              <?php elseif($mod->name == 'Artista'): ?>
                <?php if(count($autors)!=0 ): ?>
                  <select name="artist" class="form-control" required="required">
                    <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                <?php else: ?>
                  <br>
                  <label id="faltaRegistro" style="color: red;"> 
                    Usted aun no tiene registros de sus datos como artista o los datos de su grupo musical, por favor agregue dichos datos primero
                  </label>
                  <a href="<?php echo e(url('/artist_form')); ?>" class="btn btn-success">
                    Agregar artista o grupo musical
                  </a>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br>

          </div>
        </div>
      </div>
    </div>
        <div align="center">
          <?php echo Form::submit('Registar canción',['class'=>'btn btn-primary','id'=>'registarCancion']); ?>

        </div>
  <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script>
//---------------------------------------------------------------------------------------------------
// Para evitar el envio de datos si faltan los datos del grupo musical o artista
    $(document).ready(function(){
      if ($('#faltaRegistro').length) {
        $('#registarCancion').attr('disabled',true);
        //$('#registarCancion').hide();
      } else {
        $('#registarCancion').attr('disabled',false);
        //$('#registarCancion').hide();
      }
    });
// Para evitar el envio de datos si faltan los datos del grupo musical o artista
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
                $('#registarCancion').attr('disabled',true);
            } else {
                $('#mensajeNombreCancion').hide();
                $('#registarCancion').attr('disabled',false);
            }
        });
    });
// Para validar la longtud del nombre de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño de la cancion
    // $(document).ready(function(){
    //   $('#cancion').change(function(){
    //       var tamaño = this.files[0].size;
    //       var tamañoKb = parseInt(tamaño/1024);
    //       if (tamañoKb>2048) {
    //           $('#mensajeCancion').show();
    //           $('#mensajeCancion').text('La canción es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
    //           $('#mensajeCancion').css('color','red');
    //           $('#registarCancion').attr('disabled',true);
    //       } else {
    //           $('#mensajeCancion').hide();
    //           $('#registarCancion').attr('disabled',false);
    //       }
    //   });
    // });
// Para validar el tamaño de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>999) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#registarCancion').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#registarCancion').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#registarCancion').attr('disabled',false);
        }
      });
    });
// Para validar la cantidad de Tickets
//---------------------------------------------------------------------------------------------------
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>