@extends('layouts.app')

@section('main')
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("{{asset('plugins/img/estatica.jpg')}}");
            background-position: center center;
            width: 100%;
            min-height: 350px;
            min-width: 1000px;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        #image-preview {
            width: 300px;
            height: 350px;
            position: relative;
            overflow: hidden;
            padding-top: 10px;
            padding-left: 55px;
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
            width: 70%;
            height: 30px;
            font-size: 15px;
            line-height: 50px;
            text-transform: uppercase;
            top: 70;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

    </style>

    <div class="row">
        <div class="form-group">
            <div class="row-edit">
                <h4><i class="fa fa-angle-right"></i> Modificar Perfil</h4>
                <div class="col-md-12 col-sm-12 mb">
                    <div class="form-group">
                        {!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
                        {{ Form::token() }}




                        {{--Imagen de perfil--}}
                        <div class="row">
                            <div class="group-input">
                                <div class="box box-widget widget-user-1">
                                    <div class="col-md-6">
                                        <div id="image-preview" class="form-group btn pull-left col-md-1">
                                            {!! Form::file('img_perf',['class'=>'form-control-file', 'control-label', 'id'=>'image-upload', 'accept'=>'image/*']) !!}
                                            {!! Form::hidden('img_posterOld',$user->img_perf)!!}
                                            <div id="list">
                                                @if ($user->img_perf)
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='perf' src="{{asset($user->img_perf)}}" id="img_perf">
                                                @else
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}" id="img_perf">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="panel" class="img-rounded img-responsive av"></div>
                                    <br>
                                    <label for="image-upload" style="padding-left: 70%; color: black;" id="image-label">
                                        <div id="mensajeImgPerf"></div>
                                        Haga click sobre la imagen de perfil para cambiarla
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{--Nombre--}}
                        <div class="form-group ">
                            <div class="col-md-4  control-label">
                                {!! Form::label('name','Nombres',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6  control-label">
                                <div id="mensajeMaximoNombre"></div>
                                {!! Form::text('name',$user->name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombre','required'=>'required']) !!}
                            </div>
                        </div>

                        {{--Apellido--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('last_name','Apellidos',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                <div id="mensajeMaximoApellido"></div>
                                {!! Form::text('last_name',$user->last_name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'apellido']) !!}
                            </div>
                        </div>

                        {{--Correo--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('email','Correo',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::text('email',$user->email,['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>

                        {{--Cedula Nota no es un select--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('ci','Cédula',['class'=>'control-label']) !!}
                            </div>

                            <div class="col-md-6 control-label">
                                @if($user->num_doc)
                                    {!! Form::text('ci',$user->num_doc,['class'=>'form-control','readonly']) !!}
                                @else
                                    {!! Form::text('ci',$user->num_doc,['class'=>'form-control', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                @endif
                            </div>
                        </div>

                        {{--Imagen Documento--}}

                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('documento','Documento de identificación (cédula)',['class'=>'control-label']) !!}
                            </div>
                            <div  class="col-md-4">
                                @if ($user->img_doc)
                                    <img id="preview_img_doc" src="{{asset($user->img_doc)}}" name='ci' alt="your image" width="180" height="180" />
                                @endif
                                <div class="col-md-10 control-label">
                                @if($user->verify == 0 || $user->verify == 2)
                                    <img id="preview_img_doc" src="" name='ci'/>  
                                    <input type='file' name="img_doc" id="img_doc" accept=".jpeg" value="$user->img_doc"/>
                                @endif
                                    <div id="mensajeImgDoc"></div>
                                </div>
                            </div>
                        </div>

                        {{--Genero--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('num_doc','Sexo',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::select('type',['M'=>'Hombre', 'F'=>'Mujer'],$user->type,['class'=>'form-control','placeholder'=>'seleccione una opcion','control-label']) !!}
                            </div>
                        </div>

                        {{--Alias--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('alias','Alias',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                <div id="mensajeMaximoAlias"></div>
                                {!! Form::text('alias',$user->alias,['class'=>'form-control','id'=>'alias']) !!}
                            </div>
                        </div>

                        {{--Fecha Nacimiento--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('fech_nac','Fecha de nacimiento',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::date('fech_nac',$user->fech_nac,['class'=>'form-control', 'max' =>date('Y-m-d')]) !!}
                            </div>
                        </div>

                        {{--Direccion--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('direccion','Dirección',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                <div id="mensajeMaximoDireccion"></div>
                                {!! Form::text('direccion',$user->direccion,['class'=>'form-control','id'=>'direccion']) !!}
                            </div>
                        </div>

                        {{--Boton--}}
                        <div class="form-group text-center">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary active','id'=>'Editar']) !!}
                        </div>


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js')
    <script type="text/javascript">

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
        // Maximo tamaño permitido para la imagen
        $(document).ready(function(){
            $('#img_doc').change(function(){
                $('#preview_img_doc').attr('width','180');
                $('#preview_img_doc').attr('height','180');
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>1024000) {
                    $('#mensajeImgDoc').show();
                    $('#mensajeImgDoc').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajeImgDoc').css('color','red');
                    $('#Editar').attr('disabled',true);
                } else {
                    $('#mensajeImgDoc').hide();
                    $('#Editar').attr('disabled',false);
                }
            });
        });
        // Maximo tamaño permitido para la imagen
        //---------------------------------------------------------------------------------------------------
        // Maximo tamaño permitido para la imagen
        $(document).ready(function(){
            $('#img_perf').change(function(){
                $('#preview_img').attr('width','180');
                $('#preview_img').attr('height','180');
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>1024000) {
                    $('#mensajeImgPerf').show();
                    $('#mensajeImgPerf').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajeImgPerf').css('color','red');
                    $('#Editar').attr('disabled',true);
                } else {
                    $('#mensajeImgPerf').hide();
                    $('#Editar').attr('disabled',false);
                }
            });
        });
        // Maximo tamaño permitido para la imagen
        //---------------------------------------------------------------------------------------------------
        // Para que se vea la imagen que se esta cargando
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imgId= '#preview_'+$(input).attr('id');
                    $(imgId).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("form#edit input[type='file' ]").change(function () {
            readURL(this);
        });
        // Para que se vea la imagen que se esta cargando
        //---------------------------------------------------------------------------------------------------
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
        // Validacion de solo numeros
        //---------------------------------------------------------------------------------------------------
        // Validacion de maximo de caracteres para el nombre
            $(document).ready(function(){
                var cantidadMaxima = 191;
                $('#nombre').keyup(function(evento){
                    var nombre = $('#nombre').val();
                    numeroPalabras = nombre.length;
                    if (numeroPalabras>cantidadMaxima) {
                        $('#mensajeMaximoNombre').show();
                        $('#mensajeMaximoNombre').text('Ha excedido la cantidad máxima de caracteres');
                        $('#mensajeMaximoNombre').css('color','red');
                        $('#Editar').attr('disabled',true);
                    } else {
                        $('#mensajeMaximoNombre').hide();
                        $('#Editar').attr('disabled',false);
                    }
                });
            });
        // Validacion de maximo de caracteres para el nombre
        //---------------------------------------------------------------------------------------------------
        // Validacion de maximo de caracteres para el apellido
            $(document).ready(function(){
                var cantidadMaxima = 191;
                $('#apellido').keyup(function(evento){
                    var apellido = $('#apellido').val();
                    numeroPalabras = apellido.length;
                    if (numeroPalabras>cantidadMaxima) {
                        $('#mensajeMaximoApellido').show();
                        $('#mensajeMaximoApellido').text('Ha excedido la cantidad máxima de caracteres');
                        $('#mensajeMaximoApellido').css('color','red');
                        $('#Editar').attr('disabled',true);
                    } else {
                        $('#mensajeMaximoApellido').hide();
                        $('#Editar').attr('disabled',false);
                    }
                });
            });
        // Validacion de maximo de caracteres para la apellido
        //---------------------------------------------------------------------------------------------------
        // Validacion de maximo de caracteres para el alias
            $(document).ready(function(){
                var cantidadMaxima = 191;
                $('#alias').keyup(function(evento){
                    var alias = $('#alias').val();
                    numeroPalabras = alias.length;
                    if (numeroPalabras>cantidadMaxima) {
                        $('#mensajeMaximoAlias').show();
                        $('#mensajeMaximoAlias').text('Ha excedido la cantidad máxima de caracteres');
                        $('#mensajeMaximoAlias').css('color','red');
                        $('#Editar').attr('disabled',true);
                    } else {
                        $('#mensajeMaximoAlias').hide();
                        $('#Editar').attr('disabled',false);
                    }
                });
            });
        // Validacion de maximo de caracteres para la alias
        //---------------------------------------------------------------------------------------------------
        // Validacion de maximo de caracteres para la direccion
            $(document).ready(function(){
                var cantidadMaxima = 191;
                $('#direccion').keyup(function(evento){
                    var direccion = $('#direccion').val();
                    numeroPalabras = direccion.length;
                    if (numeroPalabras>cantidadMaxima) {
                        $('#mensajeMaximoDireccion').show();
                        $('#mensajeMaximoDireccion').text('Ha excedido la cantidad máxima de caracteres');
                        $('#mensajeMaximoDireccion').css('color','red');
                        $('#Editar').attr('disabled',true);
                    } else {
                        $('#mensajeMaximoDireccion').hide();
                        $('#Editar').attr('disabled',false);
                    }
                });
            });
        // Validacion de maximo de caracteres para la direccion
        //---------------------------------------------------------------------------------------------------
        // Validacion al enviar formulario
        $(document).ready(function(){
            $('#Editar').click(function(){
                var cantidadMaxima = 191;
                var nombre = $('#nombre').val();
                var apellido = $('#apellido').val();
                var alias = $('#alias').val();
                var direccion = $('#direccion').val();
                if (direccion.length > cantidadMaxima) {
                    $('#direccion').focus();
                    $('#mensajeMaximoDireccion').show();
                    $('#mensajeMaximoDireccion').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoDireccion').css('color','red');
                    return false;
                }
                else if (alias.length > cantidadMaxima) {
                    $('#alias').focus();
                    $('#mensajeMaximoAlias').show();
                    $('#mensajeMaximoAlias').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoAlias').css('color','red');
                    return false;
                }
                else if (apellido.length > cantidadMaxima) {
                    $('#apellido').focus();
                    $('#mensajeMaximoApellido').show();
                    $('#mensajeMaximoApellido').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoApellido').css('color','red');
                    return false;
                }
                else if (nombre.length > cantidadMaxima) {
                    $('#nombre').focus();
                    $('#mensajeMaximoNombre').show();
                    $('#mensajeMaximoNombre').text('Ha excedido la cantidad máxima de caracteres');
                    $('#mensajeMaximoNombre').css('color','red');
                    return false;
                } else {
                    return true;
                }
            });
        });
        // Validacion al enviar formulario
        //---------------------------------------------------------------------------------------------------
        // Validar formato de imagen de perfil y del documento
        $(document).ready(function(){
            $('#img_doc').change(function(){
                var img_doc = $('#img_doc').val();
                var extension = img_doc.substring(img_doc.lastIndexOf("."));
                if (extension==".png" || extension==".jpg" || extension==".jpeg") {
                    $('#Editar').attr('disabled',false);
                    $('#mensajeImgDoc').hide();
                    $('#preview_img_doc').show();
                } else {
                    $('#Editar').attr('disabled',true);
                    $('#mensajeImgDoc').show();
                    $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg o png');
                    $('#mensajeImgDoc').css('color','red');
                    $('#preview_img_doc').hide();
                }
            });
            $('#image-upload').change(function(){
                var img_perf = $('#image-upload').val();
                var extension = img_perf.substring(img_perf.lastIndexOf("."));
                if (extension==".png" || extension==".jpg" || extension==".jpeg") {
                    $('#Editar').attr('disabled',false);
                    $('#mensajeImgPerf').hide();
                } else {
                    $('#Editar').attr('disabled',true);
                    $('#mensajeImgPerf').show();
                    $('#mensajeImgPerf').text('La imagen debe estar en formato jpeg, jpg o png');
                    $('#mensajeImgPerf').css('color','red');
                }
            });
        });
        // Validar formato de imagen de perfil y del documento
        //---------------------------------------------------------------------------------------------------
    </script>


@endsection