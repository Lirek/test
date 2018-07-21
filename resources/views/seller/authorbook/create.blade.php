@extends('seller.layouts')
@section('css')
    <style>
        #image-preview {
            width: 300px;
            height: 400px;
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
    </style>
@endsection
@section('content')
    <!-- Main content -->
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

                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Registro de Autor</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    {!! Form::open(['route'=>'authors_books.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{ Form::token() }}

                    <div class="box-body ">

                        <div class="col-md-6">
                            {{--Imagen--}}
                            <div id="mensajeFotoAutor"></div>
                            <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Foto del Autor </label>
                                {!! Form::file('photo',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'.jpg','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una Foto del Autor')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                                <div id="list"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            
                            {{--nombre del autor--}}
                            <label for="exampleInputFile" class="control-label">Nombres y Apellidos</label>
                            {!! Form::text('full_name',null,['class'=>'form-control','placeholder'=>'Nombre Completo del Autor','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Nombre y Apellido')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--correo o email del autor--}}
                            <label for="exampleInputEmail1">Correo Electrónico</label>
                            {!! Form::email('email_c',null,['class'=>'form-control','placeholder'=>'example@correo.com','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Nombre y Apellido')",'oninput'=>"setCustomValidity('')"])!!}
                            <br>

                            {{--inicio de la agrupacion--}}
                            <label for="Redes Sociales" class="control-label">Redes Sociales</label>
                            {{--link de google+--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                {!! Form::text('google',null,['class'=>'form-control','placeholder'=>'Google+','id'=>'exampleInputFile', 'pattern'=>'http(s)?:\/\/(www\.)?plus.google\.com\/([0-9_]','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Google+ valida')",'oninput'=>"setCustomValidity('')"]) !!}
                            </div>
                            {{--link de instagram--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                {!! Form::text('instagram',null,['class'=>'form-control','placeholder'=>'Instagram','id'=>'exampleInputFile', 'pattern'=>'https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Instagram valida')",'oninput'=>"setCustomValidity('')"]) !!}
                            </div>
                            {{--link de facebook--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook', 'pattern'=>'http(s)?:\/\/(www\.)?(facebook|fb)\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Facebook valida')",'oninput'=>"setCustomValidity('')"]) !!}
                            </div>

                            {{--link de twitter--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Twitter','id'=>'twitter', 'pattern'=>'http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Twitter valida')",'oninput'=>"setCustomValidity('')"]) !!}
                            </div>
                            {{--final de la agrupacion--}}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div align="center">
                {!! Form::submit('Guardar Autor', ['class' => 'btn btn-primary','id'=>'guardarAutor']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
//---------------------------------------------------------------------------------------------------
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
                document.getElementById("list").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('image-upload').addEventListener('change', autor, false);
    // Para la foto del Autor
//---------------------------------------------------------------------------------------------------
    // Foto del Autor
    $(document).ready(function(){
        $('#image-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            // maximo 2048Kb
            if (tamañoKb>2048) {
                $('#mensajeFotoAutor').show();
                $('#mensajeFotoAutor').text('La imagen es demasiado grande, el tamaño maximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoAutor').css('color','red');
                $('#guardarAutor').attr('disabled',true);
            } else {
                $('#mensajeFotoAutor').hide();
                $('#guardarAutor').attr('disabled',false);
            }
        });
    });
    // Foto del Autor
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