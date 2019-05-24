<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.theme.default.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics Breiddy Monterrey-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665289-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-126665289-1');

    </script>
</head>

<style type="text/css">
    div.error {
      color: red;
      padding: 0;
      font-size: 0.9em;
    }

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

    /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }


    /*slider tv*/
    .card-image.img
    {
        height:150px; !important
    }

    .material-icons.md1::before{
        content:"search";
    }

    .material-icons.md1:hover::before{
        content:"navigate_next";
    }

    .carousel .carousel-item {
        width:300px !important;
    }
</style>


<!--Menu-->
<nav class="default_color" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="{{ url('/') }}" class="brand-logo">
            <img class= "img"src="https://leipel.com/plugins/img/Logo-Leipel.png" width="120px;" height="50px;" title="Logo de Leipel"></a>
    </div>
</nav>
<!--Fin Menu-->
<!-- Contenido  -->
<br><br>

<div class="row">
    <div class="col s12 m8 offset-m2">
        <div class="card curva">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m12 center">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('BidderCompleteRegister') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="" id="id">
                            <h5 class="center">
                                <b class="blue-text">Completar registro</b>
                            </h5><br>
                            
                            <div class="input-field col m6">
                                <i class="material-icons prefix blue-text">person</i>
                                <label for="name" class="">Nombre del ofertante</label>
                                <input id="name" type="text" class="form-control" name="name" value="" placeholder="">
                            </div>
   
                            <div class="input-field col m6">
                                <i class="material-icons prefix blue-text">email</i>
                                <label for="email" id="labeEmail">Correo electrónico</label>
                                <input id="email" type="email" class="form-control" name="email" value="" placeholder="">
                            </div>

                            <div class="input-field col m6">
                                <i class="material-icons prefix blue-text">phone</i>
                                <label for="tlf" id="labeTlf">Teléfono</label>
                                <input id="tlf" type="text" class="form-control" name="tlf" value="" placeholder="">
                            </div>
                            
                            <div class="input-field col m6">
                                <i class="material-icons prefix blue-text">edit</i>  
                                <label for="ruc" class="">Registro Único de Contribuyente</label>
                                <input id="ruc" type="number" class="form-control" name="ruc" placeholder="" required="required" autofocus>
                                <div id="mensajeDoc" style="display: none;"></div>
                            </div>

                            <div class="file-field input-field col m6">
                                <label for="adj_logo" class="">Logo</label>
                                <br><br>
                                <img id="preview_adj_logo" src="" name='ci'/>

                                <div class="btn blue">
                                    <span><i class="material-icons">photo_camera</i></span>
                                    <input type="file" class="form-control" name="adj_logo" id="adj_logo" accept="image/*" required="required">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <div id="mensajeImgLog" style="display: none;"></div>
                            </div>

                            <div class="file-field input-field col m6">
                                <label for="adj_ruc" class="">Imagen del RUC</label>
                                <br><br>
                                <img id="preview_adj_ruc" src="" name='ci'/>
                                <object id="pdfruc"  class="text-center"  type="application/pdf" align="center" width="380" height="180" style="display: none;"></object>

                                <div class="btn blue">
                                    <span><i class="material-icons">photo_camera</i></span>
                                    <input type="file" class="form-control" name="adj_ruc" id="adj_ruc" accept="image/*,.pdf" required="required">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                <div id="mensajeImgDoc" style="display: none;"></div>
                            </div>

                            <div class="col m12">
                                <div class="input-field col m6  {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="material-icons prefix blue-text">vpn_key</i>
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>
                                    <input id="password" type="password" class="form-control" name="password" required="required">
                                    <div id="passwordMenRU" style="margin-top: 1%; display: none;"></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-field col m6 ">
                                    <i class="material-icons prefix blue-text">vpn_key</i>
                                     <label for="password-confirm" class="col-md-4 control-label">Confirme Contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="required">
                                    <div id="passwordConfirmMenRU" style="margin-top: 1%; display: none;"></div>
                                </div>
                            </div>
                            <div class="col m6 offset-m3">
                                <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="completar">
                                    Completar
                                <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--Pie de pagina--}}
<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l3 s12">
                <h5 class="white-text">Leipel</h5>
                <p class="grey-text text-lighten-4">Red social de entretenimiento: Cine, música, lectura, radio y tv</p>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">place</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        Guayaquil, Ecuador
                    </div>
                </div>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        info@leipel.com
                    </div>
                </div>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Sobre</h5>
                <ul>
                    <li><a class="white-text" href="{{route('queEsLeipel')}}">¿Qué es Leipel?</a></li>
                    <li><a class="white-text" href="{{route('terminosCondiciones')}}">Términos y Condiciones</a></li>
                    <li><a class="white-text modal-trigger" href="#modal2">Regístrate</a></li>
                    <!-- <li><a class="white-text" href="#!">Beneficios adicionales</a></li>
                    <li><a class="white-text" href="#!">Contactos</a></li> -->
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Descubrir</h5>
                <ul>
                    <li><a class="white-text modal-trigger" href="#modal1">Cine</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Música</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Lectura</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Radio</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">TV</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                    <li><a class="curvaBoton waves-effect waves-light btn red left" target="_blank" href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q">
                            <i class="fa fa-youtube"></i> &nbsp;YouTube&nbsp;&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    <li><a class="curvaBoton waves-effect waves-light btn   blue darken-4 left" target="_blank" href="https://www.facebook.com/LEIPELoficial/">
                            <i class="fa fa-facebook"></i> &nbsp;Facebook&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    {{--<li><a class="waves-effect waves-light btn purple darken-4 left">--}}
                    {{--<i class="fa fa-instagram"></i> &nbsp;Instagram</a><br>&nbsp;</li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2018 Todos lo derechos reservados
        </div>
    </div>
</footer>


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>
<script src="{{asset('assets/js/jquery.js') }}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    //---------------------------------------------------------------------------------------------------
    // Validacion de registro previo
    $(document).ready(function () {
        var valBidder = "{{$valBidder}}";
        if (valBidder==0) {
            $('#completar').attr('disabled',true);
            swal({
                title: "¡Ha ocurrido un error!",
                text: "Ya usted completó el registro, debe iniciar sesión.",
                icon: "warning",
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
        } else if (valBidder==1) {
            $('#completar').attr('disabled',true);
            swal({
                title: "¡Ha ocurrido un error!",
                text: "Ya usted completó el registro, debe iniciar sesión.",
                icon: "warning",
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
        } else if (valBidder==2) {
            $('#completar').attr('disabled',true);
            swal({
                title: "¡Ha ocurrido un error!",
                text: "¡Ha ocurrido un error con este enlace!",
                icon: "warning",
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
        } else {
            var valBidder = valBidder.replace(/&quot;/gi,'"');
            bidder = $.parseJSON(valBidder);
            $("#id").val(bidder.id);
            $('#name').attr('readonly','readonly');
            $('#name').val(bidder.name);
            $('#email').attr('readonly','readonly');
            $('#email').val(bidder.email);
            $('#tlf').attr('readonly','readonly');
            $('#tlf').val(bidder.phone);
            $('#adj_logo').focus();
        }
    });
    // Validacion de registro previo
    //---------------------------------------------------------------------------------------------------
    // Para que se vea la imagen que se esta cargando
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgId= '#preview_'+$(input).attr('id');
                
                if(input.files[0].type != 'application/pdf')
                {
                $('#pdfruc').hide();
                $(imgId).attr('src', e.target.result);
                $(imgId).width('250');
                $(imgId).height('200');
                }
                else{
                    $(imgId).width('0');
                    $(imgId).height('0');
                    $('#pdfruc').show();
                    $('#pdfruc').attr('data', e.target.result);
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#adj_ruc").change(function () {
        readURL(this);
        var adj_ruc = $('#adj_ruc').val();
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valImgLogo = '#mensajeImgLog';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        var extension = adj_ruc.substring(adj_ruc.lastIndexOf("."));
        if (extension==".png" || extension==".jpg" || extension==".jpeg" || extension==".pdf") {
            $('#completar').attr('disabled',false);
            $('#mensajeImgDoc').hide();
            $('#preview_adj_ruc').show();
        } else {
            $('#completar').attr('disabled',true);
            $('#mensajeImgDoc').show();
            $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg, png o pdf');
            $('#mensajeImgDoc').css('color','red');
            $('#preview_adj_ruc').hide();
        }
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valImgLogo).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') ) {
            $('#completar').attr('disabled',true);
        } else {
            $('#completar').attr('disabled',false);
        }
    });

    $("#adj_logo").change(function () {
        readURL(this);
        var adj_logo = $('#adj_logo').val();
        var valRuc = '#mensajeDoc';
        var valImgRuc = '#mensajeImgDoc';
        var valImgLogo = '#mensajeImgLog';
        var valContraseña = '#passwordMenRU';
        var valConfirContraseña = '#passwordConfirmMenRU';
        var valDireccion = '#mensajeDireccion';
        var extension = adj_logo.substring(adj_logo.lastIndexOf("."));
        if (extension==".png" || extension==".jpg" || extension==".jpeg") {
            $('#completar').attr('disabled',false);
            $('#mensajeImgLog').hide();
            $('#preview_adj_logo').show();
        } else {
            $('#completar').attr('disabled',true);
            $('#mensajeImgLog').show();
            $('#mensajeImgLog').text('La imagen debe estar en formato jpeg, jpg, png');
            $('#mensajeImgLog').css('color','red');
            $('#preview_adj_logo').hide();
        }
        if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valImgLogo).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') ) {
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
            var valImgLogo = '#mensajeImgLog';
            var valContraseña = '#passwordMenRU';
            var valConfirContraseña = '#passwordConfirmMenRU';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valImgLogo).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') ) {
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
            var valImgLogo = '#mensajeImgLog';
            if ( $(valRuc).is(':visible') || $(valImgRuc).is(':visible') || $(valImgLogo).is(':visible') || $(valContraseña).is(':visible') || $(valConfirContraseña).is(':visible') ) {
                $('#completar').attr('disabled',true);
            } else {
                $('#completar').attr('disabled',false);
            }
        });
    });
    // Validacion de contraseñas
    //---------------------------------------------------------------------------------------------------
</script>