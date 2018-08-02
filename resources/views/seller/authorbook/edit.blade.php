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

                @if(\Auth::guard('web_seller')->user()->id === $author->seller_id)

                    <div class="box box-primary ">
                        <div class="box-header with-border bg bg-black-gradient">
                            <h3 class="box-title">Editar Autor</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        {!! Form::open(['route'=>['authors_books.update',$author], 'method'=>'PUT','files' => 'true' ]) !!}
                        {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
                        {{ Form::token() }}

                        <div class="box-body ">
                            
                            <div class="col-md-6">
                                {{--Imagen--}}
                                <div id="mensajeFotoLibro"></div>
                                <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                    <label for="image-upload" id="image-label"> Foto del autor </label>
                                    {!! Form::file('photo',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','oninvalid'=>"this.setCustomValidity('Seleccione una Foto del Autor')",'oninput'=>"setCustomValidity('')"]) !!}
                                    <div id="list">
                                        <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset('images/authorbook') }}/{{$author->photo }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{--nombre de la autor--}}
                                <label for="exampleInputFile" class="control-label">Nombres y Apellidos</label>
                                {!! Form::text('full_name',$author->full_name,['class'=>'form-control autofocus','placeholder'=>'Nombre Completo del Autor','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Nombre y Apellido')",'oninput'=>"setCustomValidity('')"]) !!}
                                <br>

                                {{--correo o email del autor--}}
                                <label for="exampleInputEmail1">Correo Electrónico</label>
                                {!! Form::email('email_c',$author->email_c,['class'=>'form-control','placeholder'=>'example@correo.com','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Nombre y Apellido')",'oninput'=>"setCustomValidity('')"])!!}
                                <br>

                                {{--inicio de la agrupacion--}}
                                <label for="Redes Sociales" class="control-label">Redes Sociales</label>
                                {{--link de google+--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                    {!! Form::text('google',$author->google,['class'=>'form-control','placeholder'=>'Google+','id'=>'exampleInputFile','pattern'=>'http(s)?:\/\/(www\.)?plus.google\.com\/u\/o\/([0-9_]','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Google+ valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                {{--link de instagram--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    {!! Form::text('instagram',$author->instagram,['class'=>'form-control','placeholder'=>'Instagram','id'=>'exampleInputFile','pattern'=>'https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Instagram valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                {{--link de facebook--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    {!! Form::text('facebook',$author->facebook,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook', 'pattern'=>'http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z . 0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Facebook valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>

                                {{--link de twitter--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                    {!! Form::text('twitter',$author->twitter,['class'=>'form-control','placeholder'=>'Twitter','id'=>'twitter', 'pattern'=>'http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Twitter valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                {{--final de la agrupacion--}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group col-md-6">
                                <div align="right">
                                    <a href="{{ url('/authors_books') }}" class="btn btn-danger">Atrás</a>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div align="left">
                                    {!! Form::submit('Guargar Cambios', ['class' => 'btn btn-primary','id'=>'guardarCambios']) !!}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                {!! Form::close() !!}
            @else
                <div class="text-center">
                    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    <h1 class="text-danger">
                        <strong>
                            No tiene permitido el acceso...
                        </strong>
                    </h1>
                </div>
            @endif
        </div>
    </section>
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
