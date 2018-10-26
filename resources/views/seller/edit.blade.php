@extends('seller.layouts')
@section('content')
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
            min-width: 100%;
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
        .intl-tel-input{
            width: 100%;
        }

    </style>

    <div class="row">
        <div class="form-group">
            <div class="row-edit">
                <h4><i class="fa fa-angle-right"></i> Modificar Perfil</h4>
                <div class="col-md-12 col-sm-12 mb">
                    <div class="form-group">
                        {!! Form::open(['route'=>['sellers.update',$seller],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
                        {{ Form::token() }}




                        {{--LOGO--}}
                        <div class="row">
                            <div class="group-input">
                                <div class="box box-widget widget-user-1">
                                    <div class="col-md-6">
                                        <div id="image-preview" class="form-group btn pull-left col-md-1">
                                            {!! Form::file('logo',['class'=>'form-control-file', 'control-label', 'id'=>'image-upload', 'accept'=>'image/*']) !!}
                                            {!! Form::hidden('img_posterOld',$seller->logo)!!}
                                            <div id="list">
                                                @if ($seller->logo)
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='perf' src="{{asset($seller->logo)}}" id="img_perf">
                                                @else
                                                    <img style="width:180px; height:180px; border-top:50%;" class="img-rounded" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}" id="img_perf">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div id="panel" class="img-rounded img-responsive"></div>
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
                                {!! Form::label('name','Nombre',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6  control-label">
                                <div id="mensajeMaximoNombre"></div>
                                {!! Form::text('name',$seller->name,['class'=>'form-control', 'required'=>'required','onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombre','required'=>'required']) !!}
                                <div id="mensajeNombre"></div>
                            </div>
                        </div>

                        {{--Correo--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('email','Correo',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::text('email',$seller->email,['class'=>'form-control','readonly']) !!}
                            </div>
                        </div>

                        {{--RUC--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('ruc_s','Registro único de contribuyente',['class'=>'control-label']) !!}
                            </div>

                            <div class="col-md-6 control-label">
                                @if($seller->estatus == 'Aprobado')
                                    {!! Form::text('ruc_s',$seller->ruc_s,['class'=>'form-control','readonly']) !!}
                                @else
                                    {!! Form::text('ruc_s',$seller->ruc_s,['class'=>'form-control', 'required'=>'required', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                    <div id="mensajeRuc"></div>
                                @endif
                            </div>
                        </div>

                        {{--Imagen ruc--}}

                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('documento','Foto del Registro único de contribuyente',['class'=>'control-label']) !!}
                            </div>
                            <div  class="col-md-4">
                                @if ($seller->adj_ruc)
                                    <img id="preview_img_doc" src="{{asset($seller->adj_ruc)}}" name='ci' alt="your image" width="180" height="180" />
                                @endif
                                <div class="col-md-10 control-label">
                                    @if($seller->estatus == 'Pre-Aprobado' || $seller->estatus == 'Rechazado')
                                        <img id="preview_img_doc" src="" name='ci'/>
                                        <input type='file' name="adj_ruc" id="img_doc" accept=".jpeg" value="$user->img_doc" />
                                    @endif
                                    <div id="mensajeImgDoc"></div>
                                </div>
                            </div>
                        </div>

                        {{--Direccion--}}
                        <div class="form-group ">
                            <div class="col-md-4 control-label">
                                {!! Form::label('direccion','Dirección',['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-6 control-label">
                                {!! Form::text('direccion',$seller->address,['class'=>'form-control','id'=>'direccion', 'required'=>'required']) !!}
                                <div id="mensajeMaximoDireccion"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 control-label">
                                <label  for="phone">Telefono de Contacto</label>
                            </div>
                            <div class="col-md-6 control-label">
                                <input class="form-control" type="tel" name="phone_s" id="phone_s" required onkeypress="return controltagNum(event)"  maxlength="15" >
                                <input type="hidden" id="phone2" name="phone" value="{{$seller->tlf}}" required="required">
                                <div id="mensajePhone"></div>
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
    $("#nombre").change(function(){
        var nombre = $("#nombre").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeNombre').show();
            $('#mensajeNombre').text('El Nombre no debe estar vacio');
            $('#mensajeNombre').css('color','red');
            $('#Editar').attr('disabled',true);
        }
        else {
            $('#mensajeNombre').hide();
            $('#Editar').attr('disabled',false);
        
        }
    })
</script>
<script type="text/javascript">
    $("#ruc_s").change(function(){
        var nombre = $("#ruc_s").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeRuc').show();
            $('#mensajeRuc').text('El numero de ruc no debe estar vacio');
            $('#mensajeRuc').css('color','red');
            $('#Editar').attr('disabled',true);
        }
        else {
            $('#mensajeRuc').hide();
             $('#Editar').attr('disabled',false);
        }
    })
</script>
<script type="text/javascript">
    $("#direccion").change(function(){
        var nombre = $("#direccion").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeMaximoDireccion').show();
            $('#mensajeMaximoDireccion').text('La direccion no debe estar vacio');
            $('#mensajeMaximoDireccion').css('color','red');
            $('#Editar').attr('disabled',true);
        }
        else {
            $('#mensajeMaximoDireccion').hide();
             $('#Editar').attr('disabled',false);
        }
    })
</script>
<script type="text/javascript">
    $("#phone_s").change(function(){
        var nombre = $("#phone_s").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePhone').show();
            $('#mensajePhone').text('El telefono no debe estar vacio');
            $('#mensajePhone').css('color','red');
            $('#Editar').attr('disabled',true);
        }
        else {
            $('#mensajePhone').hide();
             $('#Editar').attr('disabled',false);
        }
    })
</script>
    <script type="text/javascript">
        $(document).ready(function (e){

            if ($("#phone2").val() !=''){
                var phone = $("#phone2").val();
                $("#phone_s").intlTelInput();
                $("#phone_s").intlTelInput("setNumber",phone );
                $("#phone_s").val(phone);

            }else{
                $("#phone_s").intlTelInput({
                    defaultCountry: "auto",
                    preferredCountries: ["ec"]
                });
            }
            $("Form").submit(function() {
                $("#phone2").val($("#phone_s").intlTelInput("getNumber"));
            });

        })
    </script>
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