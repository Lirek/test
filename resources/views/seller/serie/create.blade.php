@extends('seller.layouts')
@section('css')
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
    </style>

    <style>
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

@endsection
@section('content')
    
    <section class="content">

        @if (count($errors)>0)
            <div class="col-md-6 col-md-offset-3">
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
            <div class="col-md-10 col-md-offset-1">
                @include('flash::message')

                <div class="box box-primary ">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Registro de Serie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'series.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{ Form::token() }}
                    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
                    <div class="box-body ">

                        <div class="col-md-6">
                            {{--Portada de la Serie--}}
                            <div id="mensajePortadaPelicula"></div>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una Imagen de Portada')",'oninput'=>"setCustomValidity('')"]) !!}
                                <div id="list"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            {{--titulo de la serie--}}
                            <label for="exampleInputFile" class="control-label">Título</label>
                            <div id="mensajeTitulo"></div>
                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo de la Serie','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un Título')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--Selecion tipo de publico de la serie--}}
                            <label for="exampleInputFile" class="control-label">Estado de la serie</label>
                            {!! Form::select('status_series',['1'=>'En Emisión', '2'=>'Finalizado'],null,['class'=>'form-control select-author','placeholder'=>'Selecione...', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una Opción')",'oninput'=>"setCustomValidity('')", 'id'=>'exampleInputFile']) !!}
                            <br>

                            {{--precio--}}
                            <label for="exampleInputPassword1" class="control-label">Precio</label>
                            <div id="mensajePrecio"></div>
                            {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'Ingrese el Precio', 'required'=>'required', 'id'=>'precio', 'oninvalid'=>"this.setCustomValidity('Escriba un Precio')", 'oninput'=>"setCustomValidity('')", 'min'=>'0']) !!}
                            <br>

                            {{--historia de la serie --}}
                            <label for="exampleInputPassword1" class="control-label">Historia</label>
                            <div id="cantidadHistoria"></div>
                            <div id="mensajeHistoria"></div>
                            {!! Form::textarea('story',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Historia de la Serie...','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una Historia de la Serie')", 'oninput'=>"setCustomValidity('')",'id'=>'historia']) !!}
                            <br>

                            {{--año de salida de la serie --}}
                            <label for="exampleInputPassword1" class="control-label">Año de Lanzamiento</label>
                            <div id="mensajeFechaLanzamiento"></div>
                            {!! Form::number('release_year',@date('Y'),['class'=>'form-control','placeholder'=>'Año de Lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')", 'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el Año de Lanzamiento')"]) !!}
                            <br>

                            {{--link--}}
                            <label for="exampleInputPassword1" class="control-label">Link del Trailer</label>
                            {!! Form::url('trailer',null,['class'=>'form-control','placeholder'=>'Link del Trailer', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el Link del Trailer de la Serie')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']) !!}
                            <br>
                        </div>

                        <div class="col-md-12">

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
                                    <label for="exampleInputPassword1" class="control-label">Nombre de la Saga</label>
                                    {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'Selecione Saga','id'=>'sagas', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el Nombre de la Saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-defaultMS">
                                        <i class="fa fa-book"></i> 
                                        Agregar Saga
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Antes</label>
                                    {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'Número del Capitulo que va antes','id'=>'antes','min'=>'0','required'=>'required']) !!}
                                    <div id="mensajeAntes"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Después</label>
                                    {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'Número del Capitulo que va después','id'=>'despues','min'=>'0','required'=>'required']) !!}
                                    <div id="mensajeDespues"></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12" id="example-2">

                            <a href="javascript:void(0);" class="btn btn-success add_button" id="btnAdd" style="margin-top: 2%; margin-bottom: 2%;">
                                <i class="material-icons"></i>Agregar Episodio
                            </a>
                            <div class="field_wrapper">
                                <div class="row group">
                                    <div class="col-md-6">
                                        <label for="nombre del episodio" class="control-label">Nombre del Episodio</label>
                                        <input type="text" name="episodio_name[]" id="episodio_name" placeholder="Nombre del episodio" class="form-control" required="required" oninvalid="this.setCustomValidity('Nombre del Episodio')" oninput="setCustomValidity('')">
                                        <br>

                                        <label for="nombre del episodio" class="control-label">Cargar Epísodio</label>
                                        <input type="file" name="episodio_file[]" accept=".mp4" id="episodio_file" class="form-control"required="required" oninvalid="this.setCustomValidity('Ingrese el Episodio')" oninput="setCustomValidity('')">
                                        <br>

                                        {{--precio--}}
                                        <label for="exampleInputPassword1" class="control-label">Precio</label>
                                        <input type="number" name="episodio_cost[]" id="precioEpisodio" class="form-control" placeholder="Ingrese el Precio del Episodio" min="0" required="required" oninvalid="this.setCustomValidity('Escriba un Precio')" oninput="setCustomValidity('')">
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        {{--sinopsis del episodio --}}
                                        <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                        <textarea name="sinopsis[]" id="sinopsis" cols="3" rows="2" class="form-control" placeholder="Sinopsis del Episodio" required="required" oninvalid="this.setCustomValidity('Escriba una Sinopsis')" oninput="setCustomValidity('')"></textarea>
                                        <br>

                                        {{--link--}}
                                        <label for="exampleInputPassword1" class="control-label">Trailer del Episodio</label>
                                        <input type="url" name="trailerEpisodio[]" id="trailerEpisodio" class="form-control" placeholder="Trailer del Episodio" required="required" oninvalid="this.setCustomValidity('Link del Trailer')" oninput="setCustomValidity('')">
                                        <br>
                                    </div>
                                    <br>
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
            <div class="text-center">
                {!! Form::submit('Registrar Serie', ['class' => 'btn btn-primary','id'=>'registrarSerie']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        <!-- /.modal  de sagas  -->
        <div class="modal fade in modal-primary" id="modal-defaultMS">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h1 class="modal-title text-center">Agregar Saga</h1>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route'=>'sagas.register', 'method'=>'POST','files' => 'true' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body ">

                            <div class="col-md-6">
                                {{--Imagen--}}
                                <div id="mensajePortadaSaga"></div>
                                <div id="imageSM-preview" style="border:#646464 1px solid ;" class="form-group">
                                    <label for="image-upload" id="image-label"> Imagen de la saga</label>
                                    {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','style'=>'border:#000000','1px solid ;']) !!}
                                    <div id="listModal"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{--seleccion de rating--}}
                                <label for="exampleInputFile" class="control-label">Tipo de Rating</label>
                                {!! Form::select('rating_id',$ratin,null,['class'=>'form-control select-author','placeholder'=>'Selecione....','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Nombre de la saga--}}
                                <label for="exampleInputFile" class="control-label">Nombre</label>
                                {!! Form::text('sag_name',null,['class'=>'form-control','placeholder'=>'Nombre de la saga']) !!}
                                <br>

                                {{--tipo de saga--}}
                                <label for="exampleInputFile" class="control-label">Tipo de Saga</label>
                                {!! Form::select('type_saga',['3'=>'Series'],null,
                                ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Descripcion de  la saga--}}
                                <label for="exampleInputPassword1" class="control-label">Descripción</label>
                                {!! Form::textarea('sag_description',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Descripcion de la saga...','id'=>'exampleInputFile','required'=>'required']) !!}
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
                        <div align="center">
                            {!! Form::submit('Guardar Saga', ['class' => 'btn btn-primary','id'=>'registrarSaga']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="box-body">
                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


    </section>

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
    // Para que se vea la imagen en el modal
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
    // Para que se vea la imagen en el modal
//---------------------------------------------------------------------------------------------------
    // Para validar el tamaño maximo de las imagenes de la Saga y de la Serie y el archivo de la serie
        // Portada de la serie
        $(document).ready(function(){
            $('#image-upload').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajePortadaPelicula').show();
                    $('#mensajePortadaPelicula').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajePortadaPelicula').css('color','red');
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajePortadaPelicula').hide();
                    $('#registrarSerie').attr('disabled',false);
                }
            });
        });
        // Portada de la serie
        // Portada de la Saga
        $(document).ready(function(){
            $('#imageSM-upload').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajePortadaSaga').show();
                    $('#mensajePortadaSaga').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajePortadaSaga').css('color','red');
                    $('#registrarSaga').attr('disabled',true);
                } else {
                    $('#mensajePortadaSaga').hide();
                    $('#registrarSaga').attr('disabled',false);
                }
            });
        });
        // Portada de la Saga
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
    // Para validar el tamaño maximo de las imagenes de la Saga y de la Serie y el archivo de la serie
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeTitulo').hide();
                    $('#registrarSerie').attr('disabled',false);
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeHistoria').hide();
                    $('#registrarSerie').attr('disabled',false);
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajenombreEpisodio').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSerie').attr('disabled',false);
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeSinopsis').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSerie').attr('disabled',false);
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
                    $('#mensajeFechaLanzamiento').text('La Fecha de Lanzamiento no debe exceder el año actual');
                    $('#mensajeFechaLanzamiento').css('color','red');
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeFechaLanzamiento').hide();
                    $('#registrarSerie').attr('disabled',false);
                }
            });
        });
    // Para validar la Fecha de Lanzamiento
//---------------------------------------------------------------------------------------------------
    // Para validar el precio
        $(document).ready(function(){
            $('#precioEpisodio').keyup(function(evento) {
                var precio = $('#precioEpisodio').val();
                if (precio<0) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El Precio debe ser mayor a cero');
                    $('#mensajePrecioEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajePrecioEpisodio').hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSerie').attr('disabled',false);
                }
            });
        });
    // Para validar el precio
//---------------------------------------------------------------------------------------------------
    // Para validar los radio boton
        $(document).ready(function(){
            $('#option-2').prop('checked','checked');
            $('#sagas').removeAttr('required');
            $('#despues').removeAttr('required');
            $('#antes').removeAttr('required');
        });

        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').attr('required','required');
                $('#despues').attr('required','required');
                $('#antes').attr('required','required');
                $('#sagas').val('');
            } else {
                $('#if_si').hide();
                $('#sagas').removeAttr('required');
                $('#despues').removeAttr('required');
                $('#antes').removeAttr('required');
                $('#sagas').val('');
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
                    $('#mensajeDespues').text('El Número de la Saga debe ser mayor a cero');
                    $('#mensajeDespues').css('color','red');
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeDespues').hide();
                    $('#registrarSerie').attr('disabled',false);
                }
            });
        });
        $(document).ready(function(){
            $('#antes').keyup(function(evento) {
                var antes = $('#antes').val();
                if (antes<0) {
                    $('#mensajeAntes').show();
                    $('#mensajeAntes').text('El Número de la Saga debe ser mayor a cero');
                    $('#mensajeAntes').css('color','red');
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $('#mensajeAntes').hide();
                    $('#registrarSerie').attr('disabled',false);
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
                    "<label for='nombre del episodio' class='control-label'>Nombre del Episodio</label>"+
                    "<input type='text' name='episodio_name[]' id='episodio_name' placeholder='Nombre del episodio' class='episodio_name"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Nombre del Episodio')' oninput='setCustomValidity('')'>"+
                    "<br>"+

                    "<label for='nombre del episodio' class='control-label'>Cargar Epísodio</label>"+
                    "<input type='file' name='episodio_file[]' accept='.mp4' id='episodio_file' class='episodio_file"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese el Episodio')' oninput='setCustomValidity('')'>"+
                    "<br>"+

                    "<label for='exampleInputPassword1' class='control-label'>Precio</label>"+
                    "<input type='number' name='episodio_cost[]' id='precioEpisodio' class='precioEpisodio"+x+" form-control' placeholder='Ingrese el Precio del Episodio' min='0' required='required' oninvalid='this.setCustomValidity('Escriba un Precio')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<div class='col-md-6'>"+
                    "<label for='exampleInputPassword1' class='control-label'>Sinopsis</label>"+
                    "<textarea name='sinopsis[]' id='sinopsis' cols='3' rows='2' class='sinopsis"+x+" form-control' placeholder='Sinopsis del Episodio' required='required' oninvalid='this.setCustomValidity('Escriba una Sinopsis')' oninput='setCustomValidity('')'></textarea>"+
                    "<br>"+

                    "<label for='exampleInputPassword1' class='control-label'>Trailer del Episodio</label>"+
                    "<input type='url' name='trailerEpisodio[]' id='trailerEpisodio' class='trailerEpisodio"+x+" form-control' placeholder='Trailer del Episodio' required='required' oninvalid='this.setCustomValidity('Escriba una Sinopsis')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<br>"+

                "<div class='col-sm-1 eliminar' style='margin-top: 1%;'>"+
                    "<a class='btn btn-danger btn-sm btnRemove'>"+
                        "<i class='material-icons'></i> Eliminar Episodio "+
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $(mensajenombreEpisodio).hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSerie').attr('disabled',false);
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
                    $('#registrarSerie').attr('disabled',true);
                } else {
                    $(mensajeEpisodio).hide();
                    $('#btnAdd').attr('disabled',false);
                    $('#registrarSerie').attr('disabled',false);
                }
            });
        // Para validar el tamaño del episodio
        // Para validar el precio
        var campoPrecio = ".precioEpisodio"+x;
        $(campoPrecio).keyup(function(evento) {
            var precio = $(campoPrecio).val();
            var mensajePrecioEpisodio = "#mensajePrecioEpisodio";
            if (precio<0) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El Precio debe ser mayor a cero');
                $(mensajePrecioEpisodio).css('color','red');
                $('#btnAdd').attr('disabled',true);
                $('#registrarSerie').attr('disabled',true);
            } else {
                $(mensajePrecioEpisodio).hide();
                $('#btnAdd').attr('disabled',false);
                $('#registrarSerie').attr('disabled',false);
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
                $('#registrarSerie').attr('disabled',true);
            } else {
                $(mensajeSinopsis).hide();
                $('#btnAdd').attr('disabled',false);
                $('#registrarSerie').attr('disabled',false);
            }
        });
        // Para la sinopsis
        x++;
        });
        $(wrapper).on('click','.eliminar', function(e){
            e.preventDefault();
            var eliminar = confirm("¿Está seguro de Eliminar este Episodio?");
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

    <script>
        /*
        $('.select-author').chosen({
            allow_single_deselect: false,
            no_results_text: "Registra el autor ya que no se encuentra en la base de datos y registrar el libro se necesita el autor",
            width: "60%"
        });

        $('.select-saga').chosen({
            allow_single_deselect: true,
            no_results_text: "No se encuentra la saga",
            width: "60%"
        });

        $('#paises').chosen({
            allow_single_deselect: true,
            no_results_text: "No se encuentra la saga",
            width: "60%"
        });
        */
    </script>

    {{--manejo de la imager precargada--}}
    <script>
        /*
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
            });
        });
        */
    </script>

    {{--la funcion de la saga--}}
    <script>
        /*
        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').val('');
            }
            // else if(document.getElementById('option-2').checked) {
            //     $('#if_no').hide();
            //     $('#sagas').val('3');
            // }
            else {
                $('#if_si').hide();
                $('#sagas').val('');
            }

        }
        */

    </script>

    {{--imagen del model de sagas --}}
    <script>
        /*
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#imageSM-upload",
                preview_box: "#imageSM-preview",
                label_field: "#imageSM-label"
            });
        });
        */
    </script>

    {{--los episodio--}}
    <script>
        /*
        $('#example-2').multifield({
            section: '.group',
            btnAdd: '#btnAdd-2',
            btnRemove: '.btnRemove'
        });
        */
    </script>

    <script>
        /*
        $(document).ready(function (e) {
            $('#title').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.removeClass("invalid").addClass("valid");
                }
                else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
        })
        */
    </script>

@endsection