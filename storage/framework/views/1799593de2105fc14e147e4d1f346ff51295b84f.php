<?php $__env->startSection('css'); ?>
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

    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col s12">
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">book</i> Registrar Tv</h4>
                <br>
                <?php echo Form::open(['route'=>['tvs.update',$tv], 'method'=>'PUT','files' => 'true' ]); ?>

                <div class="row">
                    <div class="col s12 m6">
                        <div id="mensajeFotoTv" style="display: none;"></div>
                        <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="col m1">
                            <label for="image-upload" id="image-label"> Logo o foto de la TV </label>
                            <?php echo Form::file('logo',['class'=>'form-control','id'=>'image-upload','accept'=>'image/*']); ?>

                            <div id="list">
                                <img style= "width:100%; height:100%; border-top:50%;" src="<?php echo e(asset($tv->logo)); ?>"/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col s12 m6" style="padding-top: 5%">
                        <div class="input-field">
                            <i class="material-icons prefix blue-text">create</i>
                            <label for="autocomplete-input">Nombre de la TV</label>
                            <?php echo Form::text('name_r',$tv->name_r,['class'=>'form-control count','required'=>'required','id'=>'nombre','data-length'=>'191','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]); ?>

                            <div id="mensajeMaximoNombre"></div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix blue-text">volume_up</i>
                            <label for="autocomplete-input">URL de la TV</label>
                            <?php echo Form::text('streaming',$tv->streaming,['class'=>'form-control count','required'=>'required','id'=>'url','data-length'=>'191','oninvalid'=>"this.setCustomValidity('Seleccione un Url')",'oninput'=>"setCustomValidity('')"]); ?>

                            <div id="mensajeMaximoUrl"></div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix blue-text">mail</i>
                            <label for="autocomplete-input">Correo electrónico</label>
                            <?php echo Form::email('email_c',$tv->email_c,['class'=>'form-control count','required'=>'required','id'=>'email','data-length'=>'191','oninvalid'=>"this.setCustomValidity('Seleccione un correo')",'oninput'=>"setCustomValidity('')"]); ?>

                            <div id="mensajeMaximoEmail"></div>
                        </div>
                    </div>
                    <div class="col s8 offset-s2">
                        <h6 class="titelgeneral"><i class="material-icons small">share</i> Redes sociales</h6>
                        <div class="input-field">
                            <i class="material-icons prefix red-text mdi mdi-youtube"></i>
                            <label for="autocomplete-input">YouTube</label>
                            <?php echo Form::text('google',$tv->google,['class'=>'form-control','id'=>'youtube']); ?>

                            <div id="mensajeMaximoYoutube"></div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix black-text mdi mdi-instagram"></i>
                            <label for="autocomplete-input">Instagram</label>
                            <?php echo Form::text('instagram',$tv->instagram,['class'=>'form-control','id'=>'instagram']); ?>

                            <div id="mensajeMaximoInstagram"></div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix blue-text text-darken-4 mdi mdi-facebook"></i>
                            <label for="autocomplete-input">Facebook</label>
                            <?php echo Form::text('facebook',$tv->facebook,['class'=>'form-control','id'=>'facebook']); ?>

                            <div id="mensajeMaximoFacebook"></div>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix blue-text text-darken-1 mdi mdi-twitter"></i>
                            <label for="autocomplete-input">Twitter</label>
                            <?php echo Form::text('twitter',$tv->twitter,['class'=>'form-control','id'=>'twitter']); ?>

                            <div id="mensajeMaximoTwitter"></div>
                        </div>
                    </div>
                    <div class="col s12">
                        <a href="<?php echo e(url('/tvs')); ?>" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                        <button class="btn curvaBoton waves-effect waves-light green white-text" type="submit" id="guardarTv">
                            Registrar TV
                        </button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
         $(document).ready(function() {
            $('input.count').characterCounter();
        });
        // Para la Portada de la radio
        function portada(evt) {
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
        document.getElementById('image-upload').addEventListener('change', portada, false);
        // Para la Portada de la radio
        //---------------------------------------------------------------------------------------------------
        // Validar formato de imagen de perfil y del documento
        $('#image-upload').change(function(){
                var img_doc = $('#image-upload').val();
                var extension = img_doc.substring(img_doc.lastIndexOf("."));
                if (extension==".png" || extension==".jpg" || extension==".jpeg") {
                    $('#guardarTv').attr('disabled',false);
                    $('#mensajeFotoTv').hide();
                    $('#image-preview').show();
                } else {
                    $('#guardarTv').attr('disabled',true);
                    $('#mensajeFotoTv').show();
                    $('#mensajeFotoTv').text('La imagen debe estar en formato jpeg, jpg o png');
                    $('#mensajeFotoTv').css('color','red');
                }
                if ($('#mensajeFotoTv').is(':visible') || $('#mensajeMaximoNombre').is(':visible') || $('#mensajeMaximoUrl').is(':visible') || $('#mensajeMaximoEmail').is(':visible') || $('#mensajeMaximoYoutube').is(':visible') || $('#mensajeMaximoInstagram').is(':visible') || $('#mensajeMaximoFacebook').is(':visible') || $('#mensajeMaximoTwitter').is(':visible') ) {
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#guardarTv').attr('disabled',false);
                }
            });
        // Validar formato de imagen de perfil y del documento
        //---------------------------------------------------------------------------------------------------
        // Validacion de maximo de caracteres para los campos
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#nombre,#url,#email,#youtube,#instagram,#facebook,#twitter').keyup(function(evento){
                var nombre = $('#nombre').val();
                var url = $('#url').val();
                var email = $('#email').val();
                var youtube = $('#youtube').val();
                var instagram = $('#instagram').val();
                var facebook = $('#facebook').val();
                var twitter = $('#twitter').val();
                //numeroPalabras = nombre.length;
                if (nombre.length>cantidadMaxima) {
                    $('#mensajeMaximoNombre').show();
                    $('#mensajeMaximoNombre').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoNombre').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoNombre').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (url.length>cantidadMaxima) {
                    $('#mensajeMaximoUrl').show();
                    $('#mensajeMaximoUrl').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoUrl').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoUrl').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (email.length>cantidadMaxima) {
                    $('#mensajeMaximoEmail').show();
                    $('#mensajeMaximoEmail').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoEmail').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoEmail').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (youtube.length>cantidadMaxima) {
                    $('#mensajeMaximoYoutube').show();
                    $('#mensajeMaximoYoutube').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoYoutube').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoYoutube').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (instagram.length>cantidadMaxima) {
                    $('#mensajeMaximoInstagram').show();
                    $('#mensajeMaximoInstagram').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoInstagram').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoInstagram').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (facebook.length>cantidadMaxima) {
                    $('#mensajeMaximoFacebook').show();
                    $('#mensajeMaximoFacebook').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoFacebook').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoFacebook').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                if (twitter.length>cantidadMaxima) {
                    $('#mensajeMaximoTwitter').show();
                    $('#mensajeMaximoTwitter').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoTwitter').css('color','red');
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#mensajeMaximoTwitter').hide();
                    $('#guardarTv').attr('disabled',false);
                }
                console.log($('#mensajeFotoTv').is(':visible'), $('#mensajeMaximoNombre').is(':visible'), $('#mensajeMaximoUrl').is(':visible'), $('#mensajeMaximoEmail').is(':visible'), $('#mensajeMaximoYoutube').is(':visible'), $('#mensajeMaximoInstagram').is(':visible'), $('#mensajeMaximoFacebook').is(':visible'), $('#mensajeMaximoTwitter').is(':visible'))
                if ($('#mensajeFotoTv').is(':visible') || $('#mensajeMaximoNombre').is(':visible') || $('#mensajeMaximoUrl').is(':visible') || $('#mensajeMaximoEmail').is(':visible') || $('#mensajeMaximoYoutube').is(':visible') || $('#mensajeMaximoInstagram').is(':visible') || $('#mensajeMaximoFacebook').is(':visible') || $('#mensajeMaximoTwitter').is(':visible') ) {
                    $('#guardarTv').attr('disabled',true);
                } else {
                    $('#guardarTv').attr('disabled',false);
                }
            });
        });
        // Validacion de maximo de caracteres para los campos
        //---------------------------------------------------------------------------------------------------
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>