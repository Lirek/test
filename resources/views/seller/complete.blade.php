<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Leipel</title>
    <link rel="stylesheet" href="{{ asset('plugins/bubbles/movingbubbles.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">    
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.css') }}"><link href="/css/app.css" rel="stylesheet">
    --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <script src="{{ asset('plugins/bubbles/movingbubbles.js') }}" type="text/javascript"></script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center"><h2>Completar registro</h2></div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('SellerRegister') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="modulo" name="modulo">
                        <input type="hidden" id="submodulo" name="submodulo">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre del contacto de la empresa</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico del contacto</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required="required">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                            <label for="tlf" class="col-md-4 control-label">Teléfono del contacto</label>
                            <div class="col-md-6">
                                <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}" required="required">

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="desc" class="col-md-4 control-label">Breve descripción de la empresa</label>
                            <div class="col-md-6">
                                <textarea name="dsc" id="dcs" class="form-control" required="required"></textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Dirección de la empresa</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required="required">
                                <div id="mensajeDireccion"></div>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ruc" class="col-md-4 control-label">Registro Único de Contribuyente</label>
                            <div class="col-md-6">
                                <input id="ruc" type="number" class="form-control" name="ruc" required="required" onkeypress="return controltagNum(event)" min="1" pattern="[0-9]+">
                                <div id="mensajeDoc" style="display: none;"></div>
                                @if ($errors->has('ruc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ruc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adj_ruc" class="col-md-4 control-label">Imagen del RUC</label>
                            <div class="col-md-6">
                                <img id="preview_adj_ruc" src="" name='ci'/>
                                <input type="file" class="form-control" name="adj_ruc" id="adj_ruc" accept="image/*" required="required">
                                <div id="mensajeImgDoc" style="display: none;"></div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required="required">
                                <div id="passwordMenRU" style="margin-top: 1%; display: none;"></div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="required">
                                <div id="passwordConfirmMenRU" style="margin-top: 1%; display: none;"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" id="completar">
                                    Completar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    //---------------------------------------------------------------------------------------------------
    // Validacion de registro previo
    $(document).ready(function () {
        var valSeller = "{{$valSeller}}";
        if (valSeller==1) {
            $('#completar').attr('disabled',true);
            swal({
                title: "¡Ha ocurrido un error!",
                text: "Ya usted completó el registro, debe iniciar sesión.",
                icon: "warning",
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
        }
    });
    // Validacion de registro previo
    //---------------------------------------------------------------------------------------------------
    // Validacion para el url y llenado de datos automaticamente
    $(document).ready(function () {
        var url = window.location.pathname;
        var cadena = url.split('/');
        var token = cadena[cadena.length-1];
        var id = cadena[cadena.length-2];
        //console.log(cadena,cadena.length,token,id);
        var parametros = '/'+id+'/'+token;
        var url = "{{ url('/getDataSeller/') }}"+parametros;
        $.ajax({
            url: url,
            type: 'get',
            dataType: "json",
            success: function (result) {
                console.log(result);
                if (result.id!=undefined) {
                    $('#name').attr('readonly','readonly');
                    $('#name').val(result.contact_s);
                    $('#email').attr('readonly','readonly');
                    $('#email').val(result.email);
                    //$('#tlf').attr('readonly','readonly');
                    $('#tlf').val(result.phone_s);
                    //$('textarea#dcs').attr('readonly','readonly');
                    $('textarea#dcs').text(result.dsc);
                    $('#modulo').val(result.desired_m);
                    $('#submodulo').val(result.sub_desired_m);
                    $('#address').focus();
                }
                else if (result==0){
                    //console.log('no existe ese id de la persona');
                    $('#completar').attr('disabled',true);
                    swal({
                        title: "¡Ha ocurrido un error!",
                        text: "El enlace procesado no corresponde a nuestros registros.",
                        icon: "error",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                }
                else if (result==1) {
                    //console.log('es otro token');
                    $('#completar').attr('disabled',true);
                    swal({
                        title: "¡Ha ocurrido un error!",
                        text: "El enlace procesado no corresponde a nuestros registros.",
                        icon: "error",
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                }
            },
            error: function (result) {
                console.log(result);
                swal({
                    title: "¡Ha ocurrido un error!",
                    icon: "error",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                })
                .then((recarga) => {
                    location.reload();
                });
            }
        });
    });
    // Validacion para el url y llenado de datos automaticamente
    //---------------------------------------------------------------------------------------------------
    // Validacion de solo numeros
    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        if (te=='0' || te=='1' || te=='2' || te=='3' || te=='4' || te=='5' || te=='6' || te=='7' || te=='8' || te=='9') {
            $('#mensajeDoc').hide();
        } else {
            $('#mensajeDoc').show();
            $('#mensajeDoc').text('Solo números');
            $('#mensajeDoc').css('color','red');
        }
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
            $('#completar').attr('disabled',true);
        } else {
            $('#completar').attr('disabled',false);
        }
        return patron.test(te);
    }
    // Validacion de solo numeros
    //---------------------------------------------------------------------------------------------------
    // Para que se vea la imagen que se esta cargando
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgId= '#preview_'+$(input).attr('id');
                $(imgId).attr('src', e.target.result);
                $(imgId).width('350');
                $(imgId).height('300');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#adj_ruc").change(function () {
        readURL(this);
        var adj_ruc = $('#adj_ruc').val();
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        var extension = adj_ruc.substring(adj_ruc.lastIndexOf("."));
        if (extension==".png" || extension==".jpg" || extension==".jpeg") {
            $('#completar').attr('disabled',false);
            $('#mensajeImgDoc').hide();
            $('#preview_adj_ruc').show();
        } else {
            $('#completar').attr('disabled',true);
            $('#mensajeImgDoc').show();
            $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg o png');
            $('#mensajeImgDoc').css('color','red');
            $('#preview_adj_ruc').hide();
        }
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
            $('#completar').attr('disabled',true);
        } else {
            $('#completar').attr('disabled',false);
        }
    });
    // Para que se vea la imagen que se esta cargando
    //---------------------------------------------------------------------------------------------------
    // Validacion de contraseñas
    $(document).ready(function(){
        $('#password').keyup(function(evento){
            var password = ($('#password').val()).trim();
            if (password.length==0) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('El campo no debe estar vacio');
                $('#passwordMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            else {
                $('#passwordMenRU').hide();
                var password1 = ($('#password-confirm').val()).trim();
                if (password1.length!=0){
                    $('#completar').attr('disabled',false);
                }
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
        $('#password-confirm').keyup(function(evento){
            var passwordConfirm = ($('#password-confirm').val()).trim();
            if (passwordConfirm.length==0) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('El campo no debe estar vacio');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            if (passwordConfirm.length < 5) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            }
            else {
                $('#passwordConfirmMenRU').hide();
                var password1 = ($('#password-confirm').val()).trim();
                console.log(password1.length !=0);
                if (password1.length !=0){
                    $('#completar').attr('disabled',false);
                }
            }

            var password1 = $('#password').val();
            var password = $('#password-confirm').val();

            if (password != password1) {
                $('#passwordConfirmMenRU').show();
                $('#passwordConfirmMenRU').text('Ambas contraseña deben coincidir');
                $('#passwordConfirmMenRU').css('color','red');
                $('#completar').attr('disabled',true);
            } else {
                $('#passwordConfirmMenRU').hide();
                if (password1.length !=0 && password.length !=0){
                    $('#completar').attr('disabled',false);
                }
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
    });
    // Validacion de contraseñas
    //---------------------------------------------------------------------------------------------------
    // Función que nos va a contar el número de caracteres
    // Para la direccion
    $(document).ready(function(){
        var cantidadMaxima = 191;
        $('#address').keyup(function(evento){
            var address = $('#address').val();
            numeroPalabras = address.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeDireccion').show();
                $('#mensajeDireccion').text('Ha excedido la cantidad máxima de caracteres permitidos');
                $('#mensajeDireccion').css('color','red');
                $('#completar').attr('disabled',true);
            } else {
                $('#mensajeDireccion').hide();
                $('#completar').attr('disabled',false);
            }
            var valRuc = '#mensajeDoc';
            var valImgRuc = '#mensajeImgDoc';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            var valDireccion = '#mensajeDireccion';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') || $(valDireccion).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
    });
    // Para la direccion
    // Función que nos va a contar el número de caracteres
    //---------------------------------------------------------------------------------------------------
    $(document).ready(function (e){
        if ($("#phone2").val() !=''){
            var phone = $("#phone2").val();
            $("#phone_s").intlTelInput();
            $("#phone_s").intlTelInput("setNumber",phone );
            $("#phone_s").val(phone);
        } else {
            $("#phone_s").intlTelInput({
                defaultCountry: "auto",
                preferredCountries: ["ec"]
            });
        }
        $("Form").submit(function() {
            $("#phone2").val($("#phone_s").intlTelInput("getNumber"));
        });
    });
</script>
</html>

