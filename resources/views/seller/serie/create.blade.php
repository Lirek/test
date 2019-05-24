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

        /*es es del modal de autor*/
        #imageAM-preview {
            width: 100%;
            height: 305px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
        }

        #imageAM-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #imageAM-preview label {
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

        /*es es del modal de autor*/
        #imageSM-preview {
            width: 100%;
            height: 380px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 90%;
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
    <div class="col s6 offset-s3">
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
                        Registrar serie
                    </h3>
                    <br>
                    <div class="row">
                    {!! Form::open(['route'=>'series.store', 'method'=>'POST','files' => 'true', 'id' => 'registroSerie' ]) !!}
                    {{ Form::token() }}
                    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
                    <div class="row">

                        <div class="input-field col s12 m6">
                            {{--Portada de la Serie--}}
                            <div id="mensajePortadaPelicula"></div>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                                <div id="list"></div>
                            </div>
                        </div>
                        
                        
                            <div class="input-field col s12 m6">
                                {{--titulo de la serie--}}
                                <i class="material-icons prefix blue-text valign-wrapper">create</i>
                                <label for="titulo" class="control-label">Título</label>
                                {!! Form::text('title',null,['class'=>'form-control','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]) !!}
                                <div id="mensajeTitulo"></div>
                                <br>
                            </div>
                            
                            <div class="input-field col s12 m6">
                                {{--Selecion tipo de publico de la serie--}}
                                <i class="material-icons prefix blue-text valign-wrapper">label</i>   
                                {!! Form::select('status_series',['1'=>'En Emisión', '2'=>'Finalizado'],null,['class'=>'form-control select-author', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una opción')",'oninput'=>"setCustomValidity('')", 'id'=>'status']) !!}
                                <label for="status" class="control-label">Estado de la serie</label>
                                <br>
                            </div>

                            <div class="input-field col s12 m6">
                                {{--precio--}}
                                <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                                <label for="precio" class="control-label">Costo en tickets</label>
                                {!! Form::number('cost',null,['class'=>'form-control', 'required'=>'required', 'id'=>'precio', 'oninvalid'=>"this.setCustomValidity('Escriba un Precio')", 'oninput'=>"setCustomValidity('')", 'min'=>'0', 'onkeypress' => 'return controltagNum(event)', 'oninput'=>"maxLengthCheck(this)"]) !!}
                                <div id="mensajePrecio"></div>
                                <br>
                            </div>

                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                                 <label for="genders"> Géneros </label>
                                <select name="tags[]" multiple="true"  class="form-control" id="genders" required="required">
                                    @foreach($tags as $genders)
                                        @if($genders->type_tags=='Peliculas')
                                            <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                               <button type="button" class="btn curvaBoton waves-effect waves-light green modal-trigger" href="#modalgenero" >
                                Agregar género
                            </button>
                                <br>
                            </div>
                        <div class="col s12 m12">
                            <div class="input-field col s12 m6">
                                {{--historia de la serie --}}
                                <i class="material-icons prefix blue-text valign-wrapper">movie</i> 
                                <label for="historia" class="control-label">Historia</label>
                                <div id="cantidadHistoria"></div>                               
                                {!! Form::textarea('story',null,['class'=>'materialize-textarea','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una historia de la serie')", 'oninput'=>"setCustomValidity('')",'id'=>'historia']) !!}
                                <div id="mensajeHistoria"></div>
                                <br>
                            </div>


                            <div class="input-field col s12 m6">
                                {{--año de salida de la serie --}}
                                <i class="material-icons prefix blue-text valign-wrapper">access_time</i>
                                <label for="fechaLanzamiento" class="control-label">Año de lanzamiento</label>
                                {!! Form::number('release_year',@date('Y'),['class'=>'form-control', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')", 'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')"]) !!}
                                <div id="mensajeFechaLanzamiento"></div>
                                <br>
                            </div>
                        </div>
                        <div class="col s12 m12">
                        <div class="input-field col s12 m6">
                            {{--link--}}
                            <i class="material-icons prefix blue-text valign-wrapper">subscriptions</i>
                            <label for="link" class="control-label">Link del trailer</label>
                            {!! Form::url('trailer',null,['class'=>'form-control', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el link del trailer de la serie')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']) !!}
                            <div id="mensajeLink"></div>
                            <br>
                        </div>
                    </div>
                        <div class="col s12 m12">
                    <label class="control-label"> ¿Pertenece a una saga? </label>
                            <br>
                            <div class="">
                                <label for="option-1">
                                    <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado" class="flat-red with-gap">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                                <label for="option-2">
                                    <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado" class="flat-red with-gap">
                                    <span class="mdl-radio__label">No</span>
                                </label>
                            </div>
                            <br>
                        <div class="" style="display:none" id="if_si">
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text valign-wrapper">book</i>
                                {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'Selecione una saga','id'=>'sagas', 'oninvalid'=>"this.setCustomValidity('Ingrese el nombre de la saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                                <a class="btn curvaBoton waves-effect waves-light green  modal-trigger"  href="#modal-defaultMS">
                                    <i class="fa fa-book"></i>
                                    Agregar saga
                                </a>
                                <br>
                                <br>
                                <div class="col m6">
                                    <label for="exampleInputPassword1" class="control-label">Antes</label>
                                    {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0','required'=>'required']) !!}
                                    <div id="mensajeAntes"></div>
                                </div>
                                <div class="col m6">
                                    <label for="exampleInputPassword1" class="control-label">Después</label>
                                    {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0','required'=>'required']) !!}
                                    <div id="mensajeDespues"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col m12" id="example-2">

                            <a href="javascript:void(0);" class="btn curvaBoton waves-effect waves-light green  add_button" id="btnAdd" style="margin-top: 2%; margin-bottom: 2%;">
                                <i class="material-icons"></i>Agregar episodio
                            </a>
                            <div class="field_wrapper">
                                <div class="row group">
                                    <div class="col m12 s12">
                                        <div class="input-field col m6 s12">
                                            <i class="material-icons prefix blue-text valign-wrapper">create</i>
                                            <label for="episodio_name" class="control-label">Nombre del episodio</label>
                                            <input type="text" name="episodio_name[]" id="episodio_name"  class="form-control" required="required" oninvalid="this.setCustomValidity('Nombre del episodio')" oninput="setCustomValidity('')">
                                        </div>
                                        <div class="input-field col m6 s12">
                                            {{--link--}}
                                            <i class="material-icons prefix blue-text valign-wrapper">subscriptions</i>
                                            <label for="trailerEpisodio" class="control-label">Trailer del episodio</label>
                                            <input type="url" name="trailerEpisodio[]" id="trailerEpisodio" class="form-control"  required="required" oninvalid="this.setCustomValidity('Link del trailer')" oninput="setCustomValidity('')">
                                            <br>
                                        </div>
                                        
                                    </div>
                                    <div class="col m12 s12">
                                        <div class="input-field col m6 s12">
                                            {{--precio--}}
                                            <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                                            <label for="precioEpisodio" class="control-label">Costo en tickets</label>
                                            <input type="number" name="episodio_cost[]" id="precioEpisodio" class="form-control"  min="0" required="required" oninvalid="this.setCustomValidity('Escriba un Precio')" oninput="setCustomValidity('')" onkeypress="return controltagNum(event)" oninput="maxLengthCheck(this)" >
                                            <br>
                                        </div>
                                    
                                        <div class="input-field col m6 s12">
                                            {{--sinopsis del episodio --}}
                                            <i class="material-icons prefix blue-text valign-wrapper">movie</i> 
                                            <label for="sinopsis" class="control-label">Sinopsis</label>
                                            <textarea name="sinopsis[]" id="sinopsis" cols="3" rows="2" class="materialize-textarea"  required="required" oninvalid="this.setCustomValidity('Escriba una sinopsis')" oninput="setCustomValidity('')"></textarea>
                                            <br>
                                        </div>

                                        
                                        <div class="file-field input-field col m6 s12">
                                            <label for="episodio_file" class="control-label">Cargar episodio</label>
                                            <br><br>
                                            <div class="btn blue">
                                                <span><i class="material-icons">movie</i></span>
                                                <input type="file" name="episodio_file[]" accept=".mp4" id="episodio_file" class="form-control"required="required" oninvalid="this.setCustomValidity('Ingrese el episodio')" oninput="setCustomValidity('')">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                    <br>
                                    <div class='col-md-12'>
                                        <div id='mensajenombreEpisodio'></div>
                                        <div id='mensajeEpisodio'></div>
                                        <div id='mensajePrecioEpisodio'></div>
                                        <div id='mensajeSinopsis'></div>
                                        <div id="mensajeTrailerEpisodio"></div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="form-group col-md-12">
                <div class="progress">
                    <div class="bar"></div >
                    <div class="percent">0%</div >
                </div>
            </div>
            </div>
            <div class="text-center">
                <!-- {!! Form::submit('Registrar serie', ['class' => 'btn btn-primary','id'=>'registrarSerie']) !!} -->
                <button type="submit" class="btn curvaBoton waves-effect waves-light green " id="registrarSerie">
                    Registrar serie
                </button>
            </div>
            {!! Form::close() !!}
        </div>

  <!-- /.modal  de sagas  -->
<div id="modal-defaultMS" class="modal">
    <div class="modal-content center blue-text">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i> Agregar saga</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
            <div id="" class="col s12 center">
                {!! Form::open(['route'=>'sagas.register', 'method'=>'POST','files' => 'true' ]) !!}
                {{ Form::token() }}
                <div class="row">
                    <div class="input-field col s12 m6">
                        {{--Imagen--}}
                        <div id="mensajeFotoSaga"></div>
                        <div id="imageSM-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Imagen de la saga</label>
                            {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                            <div id="fotoSaga"></div>
                        </div>
                    </div>

                        <div class="input-field col s12 m6">
                            {{--seleccion de rating--}}
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            
                        </div>

                        {{--Nombre de la saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text">create</i>
                            <label for="exampleInputFile" class="control-label">Nombre</label>
                            {!! Form::text('sag_name',null,['class'=>'form-control','required'=>'required']) !!}
                            <br>
                        </div>

                        {{--tipo de saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text  valign-wrapper">star</i>
                            
                            {!! Form::select('type_saga',['3'=>'Series'],null,
                            ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Tipo de saga</label>
                            <br>
                        </div>
                        {{--Descripcion de  la saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text  valign-wrapper">create</i>
                            <label for="exampleInputPassword1" class="control-label">Descripción</label>
                            {!! Form::textarea('sag_description',null,['class'=>'form-control materialize-textarea','rows'=>'3','cols'=>'2','placeholder'=>'Descripción de la Saga','id'=>'exampleInputFile','required'=>'required']) !!}
                        </div>
                    <br>
                    <div align="center">
                            <button class="btn curvaBoton waves-effect waves-light green" id="guardarSaga">Agregar saga
                            </button>
                            {!! Form::close() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
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
                    <div class="row">
                        <div class="col s12">
                            {!! Form::open(['route'=>'tags.store', 'method'=>'POST', 'id'=>'Form1']) !!}
                            {{ Form::token() }}
                            {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id,['id'=>'seller_id']) !!}
                            {!! Form::hidden('type_tags','Series', ['id'=>'type_tags']) !!}
                            {!! Form::hidden('ruta','Series') !!}
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                                <label for="exampleInputFile" class="control-label">Nuevo género</label>
                                {!! Form::text('tags_name',null,['class'=>'form-control', 'id'=>'new_tag','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese el nuevo género')",'oninput'=>"setCustomValidity('')"]) !!}
                                <br>
                            </div>
                        </div>
                        <div align="center">
                            <button class="btn curvaBoton waves-effect waves-light green"  id="save-resource" onclick="callback()">Guardar género</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                   
                </div>
                <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
            </div>
        <!-- /.modal -->


   

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
<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>
<script type="text/javascript">
    $("#titulo").change(function(){
        var nombre = $("#titulo").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulo').show();
            $('#mensajeTitulo').text('El titulo no debe estar vacio');
            $('#mensajeTitulo').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeTitulo').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#episodio_name").change(function(){
        var nombre = $("#episodio_name").val().trim();
        if (nombre.length < 1 ){
            $('#mensajenombreEpisodio').show();
            $('#mensajenombreEpisodio').text('El titulo no debe estar vacio');
            $('#mensajenombreEpisodio').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajenombreEpisodio').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#precio").change(function(){
        var nombre = $("#precio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePrecio').show();
            $('#mensajePrecio').text('El precio no debe estar vacio');
            $('#mensajePrecio').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajePrecio').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#precioEpisodio").change(function(){
        var nombre = $("#precioEpisodio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePrecioEpisodio').show();
            $('#mensajePrecioEpisodio').text('El precio no debe estar vacio');
            $('#mensajePrecioEpisodio').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajePrecioEpisodio').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#sinopsis").change(function(){
        var nombre = $("#sinopsis").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeSinopsis').show();
            $('#mensajeSinopsis').text('La sinopsis no debe estar vacia');
            $('#mensajeSinopsis').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeSinopsis').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#historia").change(function(){
        var nombre = $("#historia").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeHistoria').show();
            $('#mensajeHistoria').text('La historia no debe estar vacia');
            $('#mensajeHistoria').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeHistoria').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#fechaLanzamiento").change(function(){
        var nombre = $("#fechaLanzamiento").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeFechaLanzamiento').show();
            $('#mensajeFechaLanzamiento').text('La fecha no debe estar vacia');
            $('#mensajeFechaLanzamiento').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeFechaLanzamiento').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#link").change(function(){
        var nombre = $("#link").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeLink').show();
            $('#mensajeLink').text('El trailer no debe estar vacio');
            $('#mensajeLink').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeLink').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
    $("#trailerEpisodio").change(function(){
        var nombre = $("#trailerEpisodio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTrailerEpisodio').show();
            $('#mensajeTrailerEpisodio').text('El trailer no debe estar vacio');
            $('#mensajeTrailerEpisodio').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        }
        else {
            $('#mensajeTrailerEpisodio').hide();
            $('#registrarSerie').attr('disabled',false);
        
        }
    })
</script>
<script type="text/javascript">
    // Validacion de solo letas
        function controltagLet(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
        // Validacion de solo letas
        //---------------------------------------------------------------------------------------------------
        // Validacion de solo numeros
        function controltagNum(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[0-9]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
<script type="text/javascript">
 
    
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('#registroSerie').ajaxForm({
        
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[id=episodio_file]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#registrarSerie').attr('disabled',true);
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
            window.location.href = "{{URL::to('series')}}"

        }
    });
     
    })();
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
        // $(document).ready(function(){
        //     $('#image-upload').change(function(){
        //         var tamaño = this.files[0].size;
        //         var tamañoKb = parseInt(tamaño/1024);
        //         if (tamañoKb>2048) {
        //             $('#mensajePortadaPelicula').show();
        //             $('#mensajePortadaPelicula').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
        //             $('#mensajePortadaPelicula').css('color','red');
        //             $('#registrarSerie').attr('disabled',true);
        //         } else {
        //             $('#mensajePortadaPelicula').hide();
        //             $('#registrarSerie').attr('disabled',false);
        //         }
        //     });
        // });
        // // Portada de la serie
        // // Portada de la Saga
        // $(document).ready(function(){
        //     $('#imageSM-upload').change(function(){
        //         var tamaño = this.files[0].size;
        //         var tamañoKb = parseInt(tamaño/1024);
        //         if (tamañoKb>2048) {
        //             $('#mensajePortadaSaga').show();
        //             $('#mensajePortadaSaga').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
        //             $('#mensajePortadaSaga').css('color','red');
        //             $('#registrarSaga').attr('disabled',true);
        //         } else {
        //             $('#mensajePortadaSaga').hide();
        //             $('#registrarSaga').attr('disabled',false);
        //         }
        //     });
        // });
        // // Portada de la Saga
        // // Archivo de la Saga
        // $(document).ready(function(){
        //     $('#episodio_file').change(function(){
        //         var tamaño = this.files[0].size;
        //         var tamañoKb = parseInt(tamaño/1024);
        //         if (tamañoKb>2048) {
        //             $('#mensajeEpisodio').show();
        //             $('#mensajeEpisodio').text('El archivo es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
        //             $('#mensajeEpisodio').css('color','red');
        //             $('#btnAdd').attr('disabled',true);
        //             $('#registrarSaga').attr('disabled',true);
        //         } else {
        //             $('#mensajeEpisodio').hide();
        //             $('#btnAdd').attr('disabled',false);
        //             $('#registrarSaga').attr('disabled',false);
        //         }
        //     });
        // });
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
                    $('#mensajeFechaLanzamiento').text('La Fecha de lanzamiento no debe exceder el año actual');
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
                if (precio>999) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El costo de tickets no deben exceder los 999 Tickets');
                    $('#mensajePrecioEpisodio').css('color','red');
                    $('#btnAdd').attr('disabled',true);
                    $('#registrarSerie').attr('disabled',true);
                } else if (precio<0) {
                    $('#mensajePrecioEpisodio').show();
                    $('#mensajePrecioEpisodio').text('El costo de tickets debe ser mayor a 0');
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
         $(document).ready(function(){
        $('#precio').keyup(function(evento) {
            var precio = $('#precio').val();
            if (precio>999) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets no deben exceder los 999 Tickets');
                $('#mensajePrecio').css('color','red');
                $('#registrarSerie').attr('disabled',true);
            } else if (precio<0) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                $('#mensajePrecio').css('color','red');
                $('#registrarSerie').attr('disabled',true);
            } else {
                $('#mensajePrecio').hide();
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
                "<div class='input-field col m6 s12'>"+
                    "<i class='material-icons prefix blue-text valign-wrapper'>create</i>"+
                    "<label for='nombre del episodio' class='control-label'>Nombre del Episodio</label>"+
                    "<input type='text' name='episodio_name[]' id='episodio_name'  class='episodio_name"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Nombre del Episodio')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<div class='input-field col m6 s12'>"+
                    "<i class='material-icons prefix blue-text valign-wrapper'>subscriptions</i>"+
                    "<label for='exampleInputPassword1' class='control-label'>Trailer del Episodio</label>"+
                    "<input type='url' name='trailerEpisodio[]' id='trailerEpisodio' class='trailerEpisodio"+x+" form-control'  required='required' oninvalid='this.setCustomValidity('Escriba una Sinopsis')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                
                "<div class='input-field col m6 s12'>"+
                    "<i class='material-icons prefix blue-text valign-wrapper'>local_play</i>"+
                    "<label for='exampleInputPassword1' class='control-label'>Precio</label>"+
                    "<input type='number' name='episodio_cost[]' id='precioEpisodio' class='precioEpisodio"+x+" form-control'  min='0' required='required' oninvalid='this.setCustomValidity('Escriba un Precio')' oninput='setCustomValidity('')'>"+
                    "<br>"+
                "</div>"+
                "<div class='input-field col m6 s12'>"+
                    "<i class='material-icons prefix blue-text valign-wrapper'>movie</i>"+
                    "<label for='exampleInputPassword1' class='control-label'>Sinopsis</label>"+
                    "<textarea name='sinopsis[]' id='sinopsis' cols='3' rows='2' class='sinopsis"+x+" form-control materialize-textarea' required='required' oninvalid='this.setCustomValidity('Escriba una Sinopsis')' oninput='setCustomValidity('')'></textarea>"+
                    "<br>"+
                "</div>"+
                "<div class='file-field input-field col m6 s12'>"+
                    "<label for='nombre del episodio' class='control-label'>Cargar Epísodio</label>"+
                    "<br><br>"+
                    "<div class='btn blue'>"+
                     "<span><i class='material-icons'>movie</i></span>"+
                        "<input type='file' name='episodio_file[]' accept='.mp4' id='episodio_file' class='episodio_file"+x+" form-control' required='required' oninvalid='this.setCustomValidity('Ingrese el Episodio')' oninput='setCustomValidity('')'>"+
                    "</div>"+
                    "<div class='file-path-wrapper'>"+
                        " <input class='file-path validate' type='text'>"
                    "</div>"+
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
            if (precio>999) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El costo de tickets no deben exceder los 999 Tickets');
                $(mensajePrecioEpisodio).css('color','red');
                $('#btnAdd').attr('disabled',true);
                $('#registrarSerie').attr('disabled',true);
            } else if (precio<0) {
                $(mensajePrecioEpisodio).show();
                $(mensajePrecioEpisodio).text('El costo de tickets debe ser mayor a 0');
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
     function ytVidId(url) {
    var p = /^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/;
    return (url.match(p)) ? RegExp.$1 : false;
}
    $('#link').bind("change keyup input", function() {
    var url = $(this).val();
    if (ytVidId(url) !== false) {
        // console.log('Si es youtube');
          $('#mensajeLink').hide();
            $('#registrarSerie').attr('disabled',false);
        // $('#ytlInfo').addClass('fieldok');
    } else {
        // console.log('No es youtube');
        $('#mensajeLink').show();
            $('#mensajeLink').text('Ups, solo se aceptan enlaces provenientes del YouTube');
            $('#mensajeLink').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        // $('#ytlInfo').removeClass('fieldok');
    }
});

$('#trailerEpisodio').bind("change keyup input", function() {
    var url = $(this).val();
    if (ytVidId(url) !== false) {
        // console.log('Si es youtube');
          $('#mensajeTrailerEpisodio').hide();
            $('#registrarSerie').attr('disabled',false);
        // $('#ytlInfo').addClass('fieldok');
    } else {
        // console.log('No es youtube');
        $('#mensajeTrailerEpisodio').show();
            $('#mensajeTrailerEpisodio').text('Ups, solo se aceptan enlaces provenientes del YouTube');
            $('#mensajeTrailerEpisodio').css('color','red');
            $('#registrarSerie').attr('disabled',true);
        // $('#ytlInfo').removeClass('fieldok');
    }
});
    </script>

@endsection