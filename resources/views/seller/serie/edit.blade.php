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
                        <h3 class="box-title">Editar Serie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>['series.update',$serie], 'method'=>'PUT','files' => 'true' ]) !!}
                    {{ Form::token() }}
                    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                    {!! Form::hidden('serieId',$serie->id) !!}
                    <div class="box-body ">

                        <div class="col-md-6">
                            {{--Portada de la Serie--}}
                            <div id="mensajePortadaSerie"></div>
                            <label for="cargaPortada" id="cargaPortada" class="control-label" style="color: green;">
                                Si no selecciona una Portada, se mantendrá la actual
                            </label>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*']) !!}
                                <div id="list">
                                    <img style="width:100%; height:100%; border-top:50%;" src="{{asset($serie->img_poster)}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            {{--titulo de la serie--}}
                            <label for="exampleInputFile" class="control-label">Título</label>
                            <div id="mensajeTitulo"></div>
                            {!! Form::text('title',$serie->title,['class'=>'form-control','placeholder'=>'Titulo de la Serie','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un Título')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--Selecion tipo de publico de la serie--}}
                            <label for="exampleInputFile" class="control-label">Estado de la serie</label>
                            {!! Form::select('status_series',['1'=>'En Emisión', '2'=>'Finalizado'],$s,['class'=>'form-control select-author','placeholder'=>'Selecione...', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una Opción')",'oninput'=>"setCustomValidity('')", 'id'=>'exampleInputFile']) !!}
                            <br>

                            {{--precio--}}
                            <label for="exampleInputPassword1" class="control-label">Precio</label>
                            <div id="mensajePrecio"></div>
                            {!! Form::number('cost',$serie->cost,['class'=>'form-control','placeholder'=>'Ingrese el Precio', 'required'=>'required', 'id'=>'precio', 'oninvalid'=>"this.setCustomValidity('Escriba un Precio')", 'oninput'=>"setCustomValidity('')", 'min'=>'0']) !!}
                            <br>

                            {{--historia de la serie --}}
                            <label for="exampleInputPassword1" class="control-label">Historia</label>
                            <div id="cantidadHistoria"></div>
                            <div id="mensajeHistoria"></div>
                            {!! Form::textarea('story',$serie->story,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Historia de la Serie...','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una Historia de la Serie')", 'oninput'=>"setCustomValidity('')",'id'=>'historia']) !!}
                            <br>

                            {{--año de salida de la serie --}}
                            <label for="exampleInputPassword1" class="control-label">Año de Lanzamiento</label>
                            <div id="mensajeFechaLanzamiento"></div>
                            {!! Form::number('release_year',$serie->release_year,['class'=>'form-control','placeholder'=>'Año de Lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')", 'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el Año de Lanzamiento')"]) !!}
                            <br>

                            {{--link--}}
                            <label for="exampleInputPassword1" class="control-label">Link del Trailer</label>
                            {!! Form::url('trailer',$serie->trailer,['class'=>'form-control','placeholder'=>'Link del Trailer', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el Link del Trailer de la Serie')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']) !!}
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
                                    @if($serie->saga_id==null)
                                        {!! Form::select('saga_id',$sagas,null,['class'=>'form-control select-saga','placeholder'=>'Selecione Saga','id'=>'sagas','oninvalid'=>"this.setCustomValidity('Ingrese el Nombre de la Saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                                    @else
                                        {!! Form::select('saga_id',$sagas,$serie->saga_id,['class'=>'form-control select-saga','id'=>'sagas', 'oninvalid'=>"this.setCustomValidity('Ingrese el Nombre de la Saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Antes</label>
                                    {!! Form::number('before',$serie->before,['class'=>'form-control','placeholder'=>'Número del Capitulo que va antes','id'=>'antes','min'=>'0']) !!}
                                    <div id="mensajeAntes"></div>
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputPassword1" class="control-label">Después</label>
                                    {!! Form::number('after',$serie->after,['class'=>'form-control','placeholder'=>'Número del Capitulo que va después','id'=>'despues','min'=>'0']) !!}
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
                                    @foreach($episodes as $e)
                                    {!! Form::hidden('episodeId[]',$e->id) !!}
                                        <div class="col-md-6">
                                            <label for="nombre del episodio" class="control-label">Nombre del Episodio</label>
                                            <input type="text" value="{{ $e->episode_name }}" name="episodio_name[]" id="episodio_name" placeholder="Nombre del episodio" class="form-control" required="required" oninvalid="this.setCustomValidity('Nombre del Episodio')" oninput="setCustomValidity('')">
                                            <br>

                                            {{--precio--}}
                                            <label for="exampleInputPassword1" class="control-label">Precio</label>
                                            <input type="number" value="{{ $e->cost }}" name="episodio_cost[]" id="precioEpisodio" class="form-control" placeholder="Ingrese el Precio del Episodio" min="0" required="required" oninvalid="this.setCustomValidity('Escriba un Precio')" oninput="setCustomValidity('')">
                                            <br>

                                            {{--link--}}
                                            <label for="exampleInputPassword1" class="control-label">Trailer del Episodio</label>
                                            <input type="url" value="{{ $e->trailer_url }}" name="trailerEpisodio[]" id="trailerEpisodio" class="form-control" placeholder="Trailer del Episodio" required="required" oninvalid="this.setCustomValidity('Link del Trailer')" oninput="setCustomValidity('')">
                                            <br>

                                            {{--
                                            <label for="nombre del episodio" class="control-label">Cargar Epísodio</label>
                                            <label for="cargaPelicula" id="cargaPelicula" class="control-label" style="color: green;">
                                                Si no selecciona un Episodio, se mantendrá la actual
                                            </label>
                                            <input type="file" name="episodio_file[]" accept=".mp4" id="episodio_file" class="form-control">
                                            <br>
                                            --}}
                                        </div>
                                        <div class="col-md-6">
                                            {{--sinopsis del episodio --}}
                                            <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                            <textarea name="sinopsis[]" id="sinopsis" cols="3" rows="5" class="form-control" placeholder="Sinopsis del Episodio" required="required" oninvalid="this.setCustomValidity('Escriba una Sinopsis')" oninput="setCustomValidity('')">{{ $e->sinopsis }}</textarea>
                                            <br>
                                        </div>
                                        <div class="col-sm-1" style="margin-bottom: 4%; margin-top: 3%;">
                                            <a href="{{ route('destroyEpisode',[$e->id,$serie->id]) }}" class="btn btn-danger btn-sm btnRemove" onclick="return confirm('¿Desea eliminar el episodio {{ $e->episode_name }}?')">
                                                <i class="material-icons"></i> Eliminar Episodio 
                                            </a>
                                        </div>
                                        <br>
                                    @endforeach
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
                        <a href="{{ url('/series') }}" class="btn btn-danger">Atrás</a>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div align="left">
                        {!! Form::submit('Modificar Serie', ['class' => 'btn btn-primary','id'=>'modificarSerie']) !!}
                    </div>
                </div>
            </div>
            <div class="text-center">
            </div>
            {!! Form::close() !!}
        </div>
        
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
                    $('#mensajeFechaLanzamiento').text('La Fecha de Lanzamiento no debe exceder el año actual');
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
                if (precio<0) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El Precio debe ser mayor a cero');
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
                    $('#mensajeDespues').text('El Número de la Saga debe ser mayor a cero');
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
                    $('#mensajeAntes').text('El Número de la Saga debe ser mayor a cero');
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
            if (precio<0) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El Precio debe ser mayor a cero');
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