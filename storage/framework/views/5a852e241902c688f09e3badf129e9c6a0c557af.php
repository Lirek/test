<?php $__env->startSection('css'); ?>
    <style>
        #image-preview {
            width: 100%;
            height: 480px;
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

        #imageSM-preview {
            width: 100%;
            height: 380px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #imageSM-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #imageSM-preview label {
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <section class="content">

        <?php if(count($errors)>0): ?>
            <div class="col-md-6 col-md-offset-3">
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
            <div class="col-md-10 col-md-offset-1">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="box box-primary ">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Editar serie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo Form::open(['route'=>['series.update',$serie], 'method'=>'PUT','files' => 'true' ]); ?>

                    <?php echo e(Form::token()); ?>

                    <?php echo Form::hidden('seller_id',Auth::guard('web_seller')->user()->id); ?>

                    <?php echo Form::hidden('serieId',$serie->id); ?>

                    <div class="box-body ">

                        <div class="col-md-6">
                            
                            <div id="mensajePortadaSerie"></div>
                            <?php if($serie->status != 'Aprobado'): ?>
                            <label for="cargaPortada" id="cargaPortada" class="control-label" style="color: green;">
                                Si no selecciona una portada, se mantendrá la actual
                            </label>
                            <?php endif; ?>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                
                                    <?php echo Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*']); ?>

                                <div id="list">
                                    <img style="width:100%; height:100%; border-top:50%;" src="<?php echo e(asset($serie->img_poster)); ?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            
                            <label for="exampleInputFile" class="control-label">Título</label>
                            <div id="mensajeTitulo"></div>
                            <?php if($serie->status != 'Aprobado'): ?>
                            <?php echo Form::text('title',$serie->title,['class'=>'form-control','placeholder'=>'Título de la Serie','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]); ?>

                            <?php else: ?>
                            <?php echo Form::text('title',$serie->title,['class'=>'form-control','placeholder'=>'Título de la Serie','required'=>'required','id'=>'titulo', 'readonly']); ?>

                            <?php endif; ?>
                            <br>

                            
                            <label for="exampleInputFile" class="control-label">Estado de la serie</label>
                            <?php echo Form::select('status_series',['1'=>'En Emisión', '2'=>'Finalizado'],$s,['class'=>'form-control','placeholder'=>'Selecione una opción', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una ppción')",'oninput'=>"setCustomValidity('')", 'id'=>'exampleInputFile']); ?>

                            <br>

                            
                            <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                            <div id="mensajePrecio"></div>
                            <?php if($serie->status != 'Aprobado'): ?>
                            <?php echo Form::number('cost',$serie->cost,['class'=>'form-control','placeholder'=>'Ingrese el costo en tickets', 'required'=>'required', 'id'=>'precio', 'oninvalid'=>"this.setCustomValidity('Escriba el costo en tickets')", 'oninput'=>"setCustomValidity('')", 'min'=>'0']); ?>

                            <?php else: ?>
                            <?php echo Form::number('cost',$serie->cost,['class'=>'form-control','placeholder'=>'Ingrese el costo en tickets', 'required'=>'required', 'id'=>'precio', 'readonly', 'min'=>'0']); ?>

                            <?php endif; ?>
                            <br>

                            
                            <label for="tags"> Generos </label>
                            <?php if($serie->status != 'Aprobado'): ?>
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
                            <br>

                            
                            <label for="exampleInputPassword1" class="control-label">Historia</label>
                            <div id="cantidadHistoria"></div>
                            <div id="mensajeHistoria"></div>
                            <?php echo Form::textarea('story',$serie->story,['class'=>'form-control','rows'=>'5','cols'=>'2','placeholder'=>'Historia de la serie','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una historia de la serie')", 'oninput'=>"setCustomValidity('')",'id'=>'historia']); ?>

                            <br><br>
                        </div>

                        <div class="col-md-6">
                            
                            <label for="exampleInputPassword1" class="control-label">Año de Llanzamiento</label>
                            <div id="mensajeFechaLanzamiento"></div>
                            <?php if($serie->status != 'Aprobado'): ?>
                            <?php echo Form::number('release_year',$serie->release_year,['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')", 'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')"]); ?>

                            <?php else: ?>
                            <?php echo Form::number('release_year',$serie->release_year,['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')", 'readonly']); ?>

                            <?php endif; ?>
                            <br>
                        </div>

                        <div class="col-md-6">
                            
                            <label for="exampleInputPassword1" class="control-label">Link del trailer</label>
                            <?php if($serie->status != 'Aprobado'): ?>
                            <?php echo Form::url('trailer',$serie->trailer,['class'=>'form-control','placeholder'=>'Link del trailer', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el link del trailer de la serie')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']); ?>

                            <?php else: ?>
                            <?php echo Form::url('trailer',$serie->trailer,['class'=>'form-control','placeholder'=>'Link del trailer', 'readonly', 'id'=>'link']); ?>

                            <?php endif; ?>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <?php if($serie->status != 'Aprobado'): ?>
                            <label class="control-label"> ¿Pertenece a una saga? </label>
                            <br>
                            <div class="radio-inline">
                                <label for="option-1">
                                    <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label for="option-2">
                                    <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                    <span class="mdl-radio__label">No</span>
                                </label>
                            </div>
                            <br>
                            
                            <div class="" style="display:none" id="if_si">

                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Nombre de la saga</label>
                                    <?php if($serie->saga_id==null): ?>
                                        <?php echo Form::select('saga_id',$sagas,null,['class'=>'form-control select-saga','placeholder'=>'Selecione Saga','id'=>'sagas','oninvalid'=>"this.setCustomValidity('Ingrese el nombre de la saga')", 'oninput'=>"setCustomValidity('')"]); ?>

                                    <?php else: ?>
                                        <?php echo Form::select('saga_id',$sagas,$serie->saga_id,['class'=>'form-control','id'=>'sagas', 'oninvalid'=>"this.setCustomValidity('Ingrese el nombre de la saga')", 'oninput'=>"setCustomValidity('')"]); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Antes</label>
                                    <?php echo Form::number('before',$serie->before,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0']); ?>

                                    <div id="mensajeAntes"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Después</label>
                                    <?php echo Form::number('after',$serie->after,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0']); ?>

                                    <div id="mensajeDespues"></div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-12" id="example-2">

                            <a href="javascript:void(0);" class="btn btn-success add_button" id="btnAdd" style="margin-top: 2%; margin-bottom: 2%;">
                                <i class="material-icons"></i>Agregar episodio
                            </a>
                            <div class="field_wrapper">
                                <div class="row group">
                                    <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo Form::hidden('episodeId[]',$e->id); ?>

                                        <div class="col-md-6">
                                            <label for="nombre del episodio" class="control-label">Nombre del episodio</label>
                                            <?php if($e->status != 'Aprobado'): ?>
                                            <input type="text" value="<?php echo e($e->episode_name); ?>" name="episodio_name[]" id="episodio_name" placeholder="Nombre del episodio" class="form-control" required="required" oninvalid="this.setCustomValidity('Nombre del episodio')" oninput="setCustomValidity('')">
                                            <?php else: ?>
                                            <input type="text" value="<?php echo e($e->episode_name); ?>" name="episodio_name[]" id="episodio_name" placeholder="Nombre del episodio" class="form-control" readonly="true">
                                            <?php endif; ?>
                                            <br>

                                            
                                            <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                                            <input type="number" value="<?php echo e($e->cost); ?>" name="episodio_cost[]" id="precioEpisodio" class="form-control" placeholder="Ingrese el costo en tickets" min="0" required="required" oninvalid="this.setCustomValidity('Escriba el costo en tickets')" oninput="setCustomValidity('')">
                                            <br>

                                            
                                            <label for="exampleInputPassword1" class="control-label">Trailer del episodio</label>
                                            <input type="url" value="<?php echo e($e->trailer_url); ?>" name="trailerEpisodio[]" id="trailerEpisodio" class="form-control" placeholder="Trailer del episodio" required="required" oninvalid="this.setCustomValidity('Link del trailer')" oninput="setCustomValidity('')">
                                            <br>

                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                            <textarea name="sinopsis[]" id="sinopsis" cols="3" rows="5" class="form-control" placeholder="Sinopsis del episodio" required="required" oninvalid="this.setCustomValidity('Escriba una sinopsis')" oninput="setCustomValidity('')"><?php echo e($e->sinopsis); ?></textarea>
                                            <br>
                                        </div>
                                        <!-- <div class="col-sm-1" style="margin-bottom: 4%; margin-top: 3%;">
                                            <a href="<?php echo e(route('destroyEpisode',[$e->id,$serie->id])); ?>" class="btn btn-danger btn-sm btnRemove" onclick="return confirm('¿Desea eliminar el episodio <?php echo e($e->episode_name); ?>?')">
                                                <i class="material-icons"></i> Eliminar episodio 
                                            </a>
                                        </div> -->
                                        <br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class='col-md-12'>
                                        <div id='mensajenombreEpisodio'></div>
                                        <div id='mensajeEpisodio'></div>
                                        <div id='mensajePrecioEpisodio'></div>
                                        <div id='mensajeSinopsis'></div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                    <div align="right">
                        <a href="<?php echo e(url('/series')); ?>" class="btn btn-danger">Atrás</a>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div align="left">
                        <?php echo Form::submit('Editar serie', ['class' => 'btn btn-primary','id'=>'modificarSerie']); ?>

                    </div>
                </div>
            </div>
            <div class="text-center">
            </div>
            <?php echo Form::close(); ?>

        </div>
        
    </section>

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
    // Para que se vea la imagen en el modal
    /*
        function modal(evt) {
            var files = evt.target.files;
            for (var i = 0, m; m = files[i]; i++) {
                if (!m.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                    document.getElementById("listModal").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(m);
                reader.readAsDataURL(m);
            }
        }
        document.getElementById('imageSM-upload').addEventListener('change', modal, false);
    */
    // Para que se vea la imagen en el modal
//---------------------------------------------------------------------------------------------------
    // Para validar el tamaño maximo de las imagenes de la Serie y el archivo de la serie
        // Portada de la serie
        $(document).ready(function(){
            $('#image-upload').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#cargaPortada').hide();
                    $('#mensajePortadaSerie').show();
                    $('#mensajePortadaSerie').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajePortadaSerie').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#cargaPortada').show();
                    $('#mensajePortadaSerie').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        // Portada de la serie
        // Archivo de la Saga
        $(document).ready(function(){
            $('#episodio_file').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajeEpisodio').show();
                    $('#mensajeEpisodio').text('El archivo es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajeEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#registrarSaga').attr('disabled',true);
                } else {
                    $('#mensajeEpisodio').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSaga').attr('disabled',false);
                }
            });
        });
        // Archivo de la Saga
    // Para validar el tamaño maximo de las imagenes de la Serie y el archivo de la serie
//---------------------------------------------------------------------------------------------------
    // Función que nos va a contar el número de caracteres
        // Para el titulo
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#titulo').keyup(function(evento){
                var titulo = $('#titulo').val();
                numeroPalabras = titulo.length;
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeTitulo').show();
                    $('#mensajeTitulo').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeTitulo').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeTitulo').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        // Para el titulo
        // Para la historia
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#historia').keyup(function(evento){
                var historia = $('#historia').val();
                numeroPalabras = historia.length;
                $('#cantidadHistoria').text(numeroPalabras+'/'+cantidadMaxima);
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeHistoria').show();
                    $('#mensajeHistoria').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeHistoria').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeHistoria').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        // Para la historia
        // Para el nombre del episodio
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#episodio_name').keyup(function(evento){
                var episodio_name = $('#episodio_name').val();
                numeroPalabras = episodio_name.length;
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajenombreEpisodio').show();
                    $('#mensajenombreEpisodio').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajenombreEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajenombreEpisodio').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        // Para el nombre del episodio
        // Para la sinopsis
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#sinopsis').keyup(function(evento){
                var sinopsis = $('#sinopsis').val();
                numeroPalabras = sinopsis.length;
                $('#cantidadSinopsis').text(numeroPalabras+'/'+cantidadMaxima);
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeSinopsis').show();
                    $('#mensajeSinopsis').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeSinopsis').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeSinopsis').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        // Para la sinopsis
    // Función que nos va a contar el número de caracteres
//---------------------------------------------------------------------------------------------------
    // Para validar la Fecha de Lanzamiento
        $(document).ready(function(){
            $('#fechaLanzamiento').keyup(function(evento){
                var fechaActual = new Date();
                var año = $('#fechaLanzamiento').val();
                if (año > fechaActual.getFullYear()) {
                    $('#mensajeFechaLanzamiento').show();
                    $('#mensajeFechaLanzamiento').text('La fecha de lanzamiento no debe exceder el año actual');
                    $('#mensajeFechaLanzamiento').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeFechaLanzamiento').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
    // Para validar la Fecha de Lanzamiento
//---------------------------------------------------------------------------------------------------
    // Para validar el precio
        $(document).ready(function(){
            $('#precioEpisodio').keyup(function(evento) {
                var precio = $('#precioEpisodio').val();
                if (precio>999) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El costo de tickets no deben exceder los 999 Tickets');
                    $('#mensajePrecioEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else if (precio<0) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El costo de tickets debe ser mayor a 0');
                    $('#mensajePrecioEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajePrecioEpisodio').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
    // Para validar el precio
//---------------------------------------------------------------------------------------------------
    // Para validar los radio boton
        $(document).ready(function(){
            $('#option-1').prop('checked','checked');
            $('#if_si').show();
            $('#sagas').attr('required','required');
            $('#despues').attr('required','required');
            $('#antes').attr('required','required');
        });

        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').attr('required','required');
                $('#despues').attr('required','required');
                $('#antes').attr('required','required');
            } else {
                $('#if_si').hide();
                $('#sagas').removeAttr('required');
                $('#despues').removeAttr('required');
                $('#antes').removeAttr('required');
            }
        }
    // Para validar los radio boton
//---------------------------------------------------------------------------------------------------
    // Para validar los capitulos de las sagas
        $(document).ready(function(){
            $('#despues').keyup(function(evento) {
                var despues = $('#despues').val();
                if (despues<0) {
                    $('#mensajeDespues').show();
                    $('#mensajeDespues').text('El número de la saga debe ser mayor a cero');
                    $('#mensajeDespues').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeDespues').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
        $(document).ready(function(){
            $('#antes').keyup(function(evento) {
                var antes = $('#antes').val();
                if (antes<0) {
                    $('#mensajeAntes').show();
                    $('#mensajeAntes').text('El número de la saga debe ser mayor a cero');
                    $('#mensajeAntes').css('color','red');
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $('#mensajeAntes').hide();
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        });
    // Para validar los capitulos de las sagas
//---------------------------------------------------------------------------------------------------
// Para agregar y eliminar los episodios
    $(document).ready(function(){
        function newHTML(x) {
            var newHTML = 
            "<div class='row'>"+
                "<hr>"+
                "<div class='col-md-6'>"+
                    "<input type='hidden' name='episodeId[]' value="+0+">"+
                    "<label for='nombre del episodio' class='control-label'>Nombre del episodio</label>"+
                    "<input type='text' name='episodio_name[]' id='episodio_name' placeholder='Nombre del episodio' class='episodio_name"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Nombre del episodio')' oninput='setCustomValidity('')'>"+
                    "<br>"+

                    "<label for='nombre del episodio' class='control-label'>Cargar episodio</label>"+
                    "<input type='file' name='episodio_file[]' accept='.mp4' id='episodio_file' class='episodio_file"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese el episodio')' oninput='setCustomValidity('')'>"+
                    "<br>"+

                    "<label for='exampleInputPassword1' class='control-label'>Costo en tickets</label>"+
                    "<input type='number' name='episodio_cost[]' id='precioEpisodio' class='precioEpisodio"+x+" form-control' placeholder='Ingrese el costo en tickets' min='0' required='required' oninvalid='this.setCustomValidity('Escriba el costo en tickets')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<div class='col-md-6'>"+
                    "<label for='exampleInputPassword1' class='control-label'>Sinopsis</label>"+
                    "<textarea name='sinopsis[]' id='sinopsis' cols='3' rows='2' class='sinopsis"+x+" form-control' placeholder='Sinopsis del episodio' required='required' oninvalid='this.setCustomValidity('Escriba una sinopsis')' oninput='setCustomValidity('')'></textarea>"+
                    "<br>"+

                    "<label for='exampleInputPassword1' class='control-label'>Trailer del episodio</label>"+
                    "<input type='url' name='trailerEpisodio[]' id='trailerEpisodio' class='trailerEpisodio"+x+" form-control' placeholder='Trailer del episodio' required='required' oninvalid='this.setCustomValidity('Escriba una sinopsis')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<br>"+

                "<div class='col-sm-1 eliminar' style='margin-top: 1%;'>"+
                    "<a class='btn btn-danger btn-sm btnRemove'>"+
                        "<i class='material-icons'></i> Eliminar episodio "+
                    "</a>"+
                "</div>"+
                "<br>"+
            "</div>";
            return newHTML;
        }
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var x = 0;
        addButton.click(function(){ 
            wrapper.append(newHTML(x));
            // Para validar la longtud del campo 'nombre del episodio'
            var campoTexto = ".episodio_name"+x;
            $(campoTexto).keyup(function(evento){
                var nombre = $(campoTexto).val().length;
                var cantidadMaxima = 191;
                var mensajenombreEpisodio = '#mensajenombreEpisodio';
                if (nombre>cantidadMaxima) {
                    $(mensajenombreEpisodio).show();
                    $(mensajenombreEpisodio).text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $(mensajenombreEpisodio).css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $(mensajenombreEpisodio).hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#modificarSerie').attr('disabled',false);
                }
            });
            // Para validar la longtud del campo 'nombre del episodio'
            // Para validar el tamaño del episodio
            var campo = ".episodio_file"+x;
            $(campo).change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                var mensajeEpisodio = "#mensajeEpisodio";
                if (tamañoKb>2048) {
                    $(mensajeEpisodio).show();
                    $(mensajeEpisodio).text('Uno de los episodio es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $(mensajeEpisodio).css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#modificarSerie').attr('disabled',true);
                } else {
                    $(mensajeEpisodio).hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#modificarSerie').attr('disabled',false);
                }
            });
        // Para validar el tamaño del episodio
        // Para validar el precio
        var campoPrecio = ".precioEpisodio"+x;
        $(campoPrecio).keyup(function(evento) {
            var precio = $(campoPrecio).val();
            var mensajePrecioEpisodio = "#mensajePrecioEpisodio";
            if (precio>999) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El costo de tickets no deben exceder los 999 Tickets');
                $(mensajePrecioEpisodio).css('color','red');
                $('#btnAdd').attr('disabled',true);
                $('#modificarSerie').attr('disabled',true);
            } else if (precio<0) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El costo de tickets debe ser mayor a 0');
                $(mensajePrecioEpisodio).css('color','red');
                $('#btnAdd').attr('disabled',true);
                $('#modificarSerie').attr('disabled',true);
            } else {
                $(mensajePrecioEpisodio).hide();
                $('#btnAdd').attr('disabled',false);
                $('#modificarSerie').attr('disabled',false);
            }
        });
        // Para validar el precio
        // Para la sinopsis
        var cantidadMaxima = 191;
        var campoSinopsis = ".sinopsis"+x;
        $(campoSinopsis).keyup(function(evento){
            var sinopsis = $(campoSinopsis).val();
            var numeroPalabras = sinopsis.length;
            var mensajeSinopsis = "#mensajeSinopsis";
            if (numeroPalabras>cantidadMaxima) {
                $(mensajeSinopsis).show();
                $(mensajeSinopsis).text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $(mensajeSinopsis).css('color','red');
                $('#btnAdd').attr('disabled',true);
                $('#modificarSerie').attr('disabled',true);
            } else {
                $(mensajeSinopsis).hide();
                $('#btnAdd').attr('disabled',false);
                $('#modificarSerie').attr('disabled',false);
            }
        });
        // Para la sinopsis
        x++;
        });
        $(wrapper).on('click','.eliminar', function(e){
            e.preventDefault();
            var eliminar = confirm("¿Desea eliminar este episodio?");
            if (eliminar) {
                var uno = $(this).parent('div');
                uno.remove();
                $('#btnAdd').attr('disabled',false);
                $(mensajenombreEpisodio).hide();
                $(mensajeEpisodio).hide();
                $(mensajePrecioEpisodio).hide();
                $(mensajeSinopsis).hide();
            }
        });
    });
//---------------------------------------------------------------------------------------------------
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>