<style type="text/css">
  #image-preview {
    width: 100%;
    height: 50%;
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
    color: #ecf0f1;
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

  input.invalid, select.invalid, textarea.invalid{
    border: 2px solid red;
  }

  input.valid, select.valid textarea.valid{
    border: 2px solid green;
  }
  #list div {
    width:20%;
  }
</style>

<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php if($errors->any()): ?>
    <div class="alert alert-danger">
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(url('/albums')); ?>" enctype="multipart/form-data" id="formulario">
    <input type="hidden" name="seller_id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="row">
      <div class="col-sm-12" style="margin-left: 30px;">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Registrar Álbum</h3>
          </div>
          <div class="box-body">
            <div class="col-md-6">
              <div id="image-preview" style="border:#000000 1px solid;" class="col-md-1">
                <label for="image-upload" id="image-label">Portada</label>
                <input type="file" name="image" id="image-upload" accept=".jpg" class="form-control required" required oninvalid="this.setCustomValidity('Seleccione un Archivo de Portada')" oninput="setCustomValidity('')" />
                <div id="list"></div>
              </div>
            </div>
            <div class="col-md-5">
              <label for="album"> 
                Nombre del Álbum
              </label>
              <input type="text" name="album" placeholder="Nombre del Álbum" class="form-control" id="title" oninvalid="this.setCustomValidity('Inserte un Nombre de Álbum Valido')" oninput="setCustomValidity('')" required>
              <br>
              <label for="cost"> 
                Costo en Tickets
              </label>
              <div id="mensajeTickets"></div>
              <input type="number" id="cost" min="0" pattern="{1-3}" name="cost" class="form-control" placeholder="Costo en Tickets" onKeyPress="return checkIt(event)" oninvalid="this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 100')" oninput="setCustomValidity('')">
              <br>
              <label for="tags" required> 
                Géneros
              </label>
              <select name="tags[]" multiple="true"  class="form-control js-example-basic-multiple" id="genders" required>
                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($genders->type_tags=='Musica'): ?>
                    <option value="<?php echo e($genders->id); ?>"><?php echo e($genders->tags_name); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalgenero">
                Agregar Género
              </button>
              <br><p></p>
              <label for="artist"> 
                Ártista
              </label>
              <select name="artist" class="form-control js-example-basic-single" required oninvalid="this.setCustomValidity('Seleccione Un Artista')" oninput="setCustomValidity('')">
                <option value="">Seleccione...</option>
                <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($artist->id); ?>"><?php echo e($artist->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
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
            <div class="row">
              <div class="col-sm-3">
                <a href="javascript:void(0);" class="btn btn-success add_button" title="Add field">Añadir Canciones</a>
              </div>
              <div class="col-sm-9">
                <div class="field_wrapper">
                  <div class="row group">
                    <div class="col-sm-9">
                      <input type="text" name="song_n[]" id="title" placeholder="Nombre de la Canción" class="form-control" oninvalid="this.setCustomValidity('Ingrese Un Nombre a La Canción')" oninput="setCustomValidity('')" required>
                      <input type="file" name="audio[]" accept=".mp3" id="audio" class="form-control">
                    </div>
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
        Registrar Álbum
      </button>
    </div>
  </form>
  <div class="modal modal-primary fade" role="dialog" id="modalgenero">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 style="text-align: center; color: #fff;">Agregar Género</h1>
        </div>
        <div class="modal-body">
          <form id="Form1" method="POST">
            <input type="text" name="tag" id="new_tag" placeholder="Ingrese el Nuevo Género" class="form-control" required="required">
              <?php echo e(csrf_field()); ?>

            <button id="save-resource" type="submit" class="ui mini grey button button-rounded save-btn btn btn-success"><i class="save icon"></i>
              Guardar
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>  
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
// Para agregar y eliminar las canciones
    $(document).ready(function(){
      var maxField = 1;
      var addButton = $('.add_button');
      var wrapper = $('.field_wrapper');
      var newHTML = 
      "<div class='row group'>"+
        "<br>"+
        "<div class='remove_button'>"+
          "<div class='col-sm-9'>"+
            "<input type='text' name='song_n[]' id='title' placeholder='Nombre de la Canción' class='form-control' oninvalid='this.setCustomValidity('Ingrese Un Nombre a La Canción')' oninput='setCustomValidity('')' required>"+
            "<input type='file' name='audio[]' accept='.mp3' id='audio' class='form-control'>"+
          "</div>"+
          "<div class='col-sm-2 eliminar'>"+
            "<button type='button' class='btn btn-danger btnRemove'>Eliminar Canción</button>"+
          "</div>"+
        "</div>"+
      "</div>";
      var x = 1;
      $(addButton).click(function(){
        maxField++;
          if(x < maxField){
              x++;
              $(wrapper).append(newHTML);
          }
      });
      $(wrapper).on('click', '.eliminar', function(e){
        e.preventDefault();
        var eliminar = confirm("¿Está seguro de Eliminar la Canción?");
        if (eliminar) {
          $(this).parent('div').remove();
          x--;
        }
      });
    });
// Para agregar y eliminar las canciones
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>100) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets no deben exceder los 100 Tickets');
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
    $('#example-2').multifield({
      section: '.group',
      btnAdd:'#btnAdd-2',
      btnRemove:'.btnRemove'
    });

    var i=0;
    function sum() {
      i++;
    };

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

    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
//---------------------------------------------------------------------------------------------------
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
        if(is_name) {
          input.removeClass("invalid").addClass("valid");
        } else {
          input.removeClass("valid").addClass("invalid");
        }
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

      $( "#Form1" ).on( 'submit', function(e) {
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
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>