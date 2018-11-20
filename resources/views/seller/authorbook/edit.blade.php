@extends('seller.layouts')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h3 class="center">
                Editar datos de autor 
            </h3>
            {!! Form::open(['route'=>['authors_books.update',$author], 'method'=>'PUT','files' => 'true' ]) !!}
            {{ Form::token() }}
            <div class="row">
                <div class="input-field col s12 m6">
                        {{--Imagen--}}
                        <div id="mensajeFotoLibro"></div>
                        <label for="cargaPelicula" id="cargaPelicula" class="control-label" style="color: green;">
                            Si no selecciona una foto, se mantendrá la actual
                        </label>
                    <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="">
                            <label for="image-upload" id="image-label"> Foto del autor </label>
                            {!! Form::file('photo',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','oninvalid'=>"this.setCustomValidity('Seleccione una Foto del Autor')",'oninput'=>"setCustomValidity('')"]) !!}
                        <div id="list">
                            <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset('images/authorbook') }}/{{$author->photo }}"/>
                        </div>
                    </div>
                </div>
                <div class="input-field col s12 m6">
                    {{--nombre de la autor--}}
                    <i class="material-icons prefix blue-text">face</i>
                    <label for="exampleInputFile" class="control-label">Nombres y apellidos</label>
                    {!! Form::text('full_name',$author->full_name,['class'=>'form-control autofocus','placeholder'=>'Nombre completo del autor','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un nombre y apellido')",'oninput'=>"setCustomValidity('')"]) !!}
                    <br>
                </div>
                <div class="input-field col s12 m6">
                    {{--correo o email del autor--}}
                    <i class="material-icons prefix blue-text">email</i>
                    <label for="exampleInputEmail1">Correo electrónico</label>
                    {!! Form::email('email_c',$author->email_c,['class'=>'form-control','placeholder'=>'example@correo.com','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un correo electrónico')",'oninput'=>"setCustomValidity('')"])!!}
                    <br>
                </div>
                <div class="input-field col s12 m6">
                    <i class="prefix fa fa-google-plus blue-text"></i>
                    <label for="google">Google +</label>
                    {!! Form::text('google',$author->google,['class'=>'form-control','placeholder'=>'Google+','id'=>'exampleInputFile','pattern'=>'http(s)?:\/\/(www\.)?plus.google\.com\/u\/o\/([0-9_]','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Google+ valida')",'oninput'=>"setCustomValidity('')"]) !!}
                </div>
                <div class="input-field col s12 m6">
                    <i class="prefix fa fa-instagram blue-text"></i>
                    <label for="instagram">Instagram</label>
                    {!! Form::text('instagram',$author->instagram,['class'=>'form-control','placeholder'=>'Instagram','id'=>'exampleInputFile','pattern'=>'https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Instagram valida')",'oninput'=>"setCustomValidity('')"]) !!}
                </div>
                <div class="input-field col s12 m6">
                    <i class="prefix fa fa-facebook blue-text"></i>
                    <label for="facebook">Facebook</label>
                    {!! Form::text('facebook',$author->facebook,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook', 'pattern'=>'http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z . 0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Facebook valida')",'oninput'=>"setCustomValidity('')"]) !!}
                </div>
            </div>
            <!-- {!! Form::submit('Editar autor', ['class' => 'btn curvaBoton waves-effect waves-light green','id'=>'guardarCambios' ]) !!} -->
            <button class="btn curvaBoton waves-effect waves-light green" type="submit" id="guardarCambios" >Editar autor</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
//---------------------------------------------------------------------------------------------------
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
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeFotoLibro').hide();
                $('#guardarCambios').attr('disabled',false);
            }
        });
    });
    // Foto del Libro
//---------------------------------------------------------------------------------------------------
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
@endsection