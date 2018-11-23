@extends('seller.layouts')
@section('css')
    <style>

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

    <!-- Main content -->
        @if (count($errors)>0)
            <div class="col s6 col-md-offset-3">
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
                        Registrar cadena de revista
                    </h3>
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/type_megazine') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">

                    <!-- form start -->

<div id="modal-defaultMS" >
    <div class=" center blue-text">
        <br>
        <div class="col s12">
            <div id="" class="col s12 center">
                <div class="row">
                    <div class="col s6">
                        {{--Imagen--}}
                        <div id="mensajeFotoSaga"></div>
                        <div id="imageSM-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Imagen de la cadena</label>
                            {!! Form::file('image',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                            <div id="fotoSaga"></div>
                        </div>
                    </div>

                    <div class="col s6">
                        <div class="input-field col s12">
                            {{--seleccion de rating--}}
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            <br>
                        </div>

                        {{--Nombre de la cadena--}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text">create</i>
                            <label for="exampleInputFile" class="control-label">Nombre</label>
                            {!! Form::text('title',null,['class'=>'form-control','required'=>'required']) !!}
                            <br>
                        </div>

                        {{--tipo de saga--}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text  valign-wrapper">star</i>
                            
                            {!! Form::select('type_saga',['4'=>'Revistas'],null,
                            ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Tipo de cadena</label>
                            <br>
                        </div>
                                <div class="input-field col s12">
                                    {{--genero--}}
                                    <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                                    
                                        <select name="tags[]" multiple="true" class="form-control" id="genders" required="required">
                                            @foreach($tags as $genders)
                                                @if($genders->type_tags=='Revistas')
                                                    <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="tags">Géneros</label>
                                </div>

                        {{--Descripcion de  la saga--}}
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text  valign-wrapper">create</i>
                            <label for="exampleInputPassword1" class="control-label">Descripción</label>
                            {!! Form::textarea('dsc',null,['class'=>'form-control materialize-textarea','rows'=>'3','cols'=>'2','placeholder'=>'Descripción de la cadena','id'=>'exampleInputFile','required'=>'required']) !!}
                        </div>
                    </div>
                    <br>
                     <div align="center">
                            {!! Form::submit('Agregar cadena', ['class' => 'btn btn-primary curvaBoton green','id'=>'guardarSaga']) !!}
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat"></a>
    </div>
</div>
</form>
</div>
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
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajeTitulo').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#titulOriginal").change(function(){
        var nombre = $("#titulOriginal").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulOriginal').show();
            $('#mensajeTitulOriginal').text('El titulo no debe estar vacio');
            $('#mensajeTitulOriginal').css('color','red');
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajeTitulOriginal').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#precio").change(function(){
        var nombre = $("#precio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePrecio').show();
            $('#mensajePrecio').text('El precio no debe estar vacio');
            $('#mensajePrecio').css('color','red');
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajePrecio').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#sinopsis").change(function(){
        var nombre = $("#sinopsis").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeSinopsis').show();
            $('#mensajeSinopsis').text('La sinopsis no debe estar vacia');
            $('#mensajeSinopsis').css('color','red');
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajeSinopsis').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#fechaLanzamiento").change(function(){
        var nombre = $("#fechaLanzamiento").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeFechaLanzamiento').show();
            $('#mensajeFechaLanzamiento').text('La fecha no debe estar vacia');
            $('#mensajeFechaLanzamiento').css('color','red');
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajeFechaLanzamiento').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#link").change(function(){
        var nombre = $("#link").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeLink').show();
            $('#mensajeLink').text('El trailer no debe estar vacio');
            $('#mensajeLink').css('color','red');
            $('#guardarLibro').attr('disabled',true);
        }
        else {
            $('#mensajeLink').hide();
            $('#guardarLibro').attr('disabled',false);
        
        }
    })
    $("#new_tag").change(function(){
        var nombre = $("#new_tag").val().trim();
        if (nombre.length < 1 ){
            $('#mensajegeneronuevo').show();
            $('#mensajegeneronuevo').text('El nombre de la saga no debe estar vacio');
            $('#mensajegeneronuevo').css('color','red');
            $('#save-resource').attr('disabled',true);
        }
        else {
            $('#mensajegeneronuevo').hide();
            $('#save-resource').attr('disabled',false);
        
        }
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
<script type="text/javascript">
 
    
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('#libro').ajaxForm({
        
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=books_file]').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#guardarLibro').attr('disabled',true);
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
            window.location.href = "{{URL::to('tbook')}}"

        }
    });
     
    })();
</script>
    <script>
//---------------------------------------------------------------------------------------------------
// Para que se vea la portada del libro, los modales de Autor y de Saga
    // Para la Portada del Libro
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
    // Para la Portada del Libro

    // Para la foto del Autor
    function autor(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                document.getElementById("fotoAutor").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('imageAM-upload').addEventListener('change', autor, false);
    // Para la foto del Autor

    // Para la foto de la Saga
    function saga(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                document.getElementById("fotoSaga").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('imageSM-upload').addEventListener('change', saga, false);
    // Para la foto de la Saga
// Para que se vea la portada del libro, los modales de Autor y de Saga
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño maximo de las imagenes y del documento
    // Foto del Libro
    $(document).ready(function(){
        $('#image-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoLibro').show();
                $('#mensajeFotoLibro').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoLibro').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeFotoLibro').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
    // Foto del Libro
    // Foto del Autor
    $(document).ready(function(){
        $('#imageAM-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoAutor').show();
                $('#mensajeFotoAutor').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoAutor').css('color','red');
                $('#guardarAutor').attr('disabled',true);
            } else {
                $('#mensajeFotoAutor').hide();
                $('#guardarAutor').attr('disabled',false);
            }
        });
    });
    // Foto del Autor
    // Foto de la Saga
    $(document).ready(function(){
        $('#imageSM-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoSaga').show();
                $('#mensajeFotoSaga').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoSaga').css('color','red');
                $('#guardarSaga').attr('disabled',true);
            } else {
                $('#mensajeFotoSaga').hide();
                $('#guardarSaga').attr('disabled',false);
            }
        });
    });
    // Foto de la Saga
    // Documento
    $(document).ready(function(){
        $('#libro').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeDocumento').show();
                $('#mensajeDocumento').text('El Libro es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeDocumento').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeDocumento').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
    // Documento
// Para validar el tamaño maximo de las imagenes y del documento
//---------------------------------------------------------------------------------------------------
// Función que nos va a contar el número de caracteres
    $(document).ready(function(){
        var cantidadMaxima = 1500;
        $('#sinopsis').keyup(function(evento){
            var sinopsis = $('#sinopsis').val();
            numeroPalabras = sinopsis.length;
            $('#cantidadPalabra').text(numeroPalabras+'/'+cantidadMaxima);
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeNumeroPalabras').show();
                $('#mensajeNumeroPalabras').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeNumeroPalabras').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeNumeroPalabras').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
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
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeFechaLanzamiento').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
// Para validar la Fecha de Lanzamiento
//---------------------------------------------------------------------------------------------------
// Para validar el precio
    $(document).ready(function(){
        $('#precio').keyup(function(evento) {
            var precio = $('#precio').val();
            if (precio>999) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets no deben exceder los 999 Tickets');
                $('#mensajePrecio').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else if (precio<0) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                $('#mensajePrecio').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajePrecio').hide();
                $('#guardarLibro').attr('disabled',false);
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
                $('#mensajeDespues').text('El número de la saga debe ser mayor a cero');
                $('#mensajeDespues').css('color','red');
                $('#registrarPelicula').attr('disabled',true);
            } else {
                $('#mensajeDespues').hide();
                $('#registrarPelicula').attr('disabled',false);
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
                $('#registrarPelicula').attr('disabled',true);
            } else {
                $('#mensajeAntes').hide();
                $('#registrarPelicula').attr('disabled',false);
            }
        });
    });
// Para validar los capitulos de las sagas
//---------------------------------------------------------------------------------------------------
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
@endsection