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
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='perf' src="{{asset($user->img_perf)}}">
                                                @else
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}">
                                                @endif
                                                <div id="mensajeImgPerf"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="panel" class="img-rounded img-responsive av "></div>
                                    <br>
                                    <label for="image-upload" style="padding-left: 70%; color: black;" id="image-label"> Haga click sobre la imagen de perfil para cambiarla </label>
                                </div>
                            </div>
                        </div>

                        {{--Nombre--}}
                        <div class="form-group ">
                            <div class="col-md-4  control-label">
                                {!! Form::label('name','Nombres',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6  control-label">
                                {!! Form::text('name',$user->name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+' ]) !!}
                            </div>
                        </div>


                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('last_name','Apellidos',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::text('last_name',$user->last_name,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+']) !!}
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
                                @if($user->verify == 0)
                                    <img id="preview_img_doc" src="" name='ci'/>  
                                    <input type='file' name="img_doc" id="img_doc" accept=".jpg" value="$user->img_doc"/>
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
                                {!! Form::text('alias',$user->alias,['class'=>'form-control']) !!}
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

                        {{--Boton--}}
                        <div class="form-group text-center">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary active']) !!}
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

        $(document).ready(function(){
            $('#img_doc').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajeImgDoc').show();
                    $('#mensajeImgDoc').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajeImgDoc').css('color','red');
                    $('#Editar').attr('disabled',true);
                } else {
                    $('#mensajeImgDoc').hide();
                    $('#preview_img_doc').attr('width','180');
                    $('#preview_img_doc').attr('height','180');
                    $('#Editar').attr('disabled',false);
                }
            });
        });


        $(document).ready(function(){
            $('#img_perf').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
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

        function controltagLet(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }

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