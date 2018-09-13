<!DOCTYPE html>
<!-- aqui -->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Leipel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/login3.css')}}">--}}
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('plugins/css/slick-team-slider.css')}}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{{asset('plugins/css/style.css')}}">--}}
    <link href="{{ asset('views/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<!--HEADER START-->
<div class="main-navigation ">

    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('plugins/img/Logo-Leipel.png')}}"
                                                                   width="150" height="50" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/login') }}">Iniciar Sesi&oacute;n</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--HEADER END-->

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-heading">Registro</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Direccion de Correo</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password_confirm" class="col-md-4 control-label">Confirmar
                                    Contraseña</label>

                                <div class="col-md-6">
                                    <input id="password_confirm" type="password" class="form-control"
                                           name="password_confirm">

                                    @if ($errors->has('password_confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="submitF" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!--Seccion de Scripts-->
    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.min.js') }}"></script>
    {{--    <script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery-3.1.1.js') }}"></script>--}}
    <script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
    <script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>
    <script>

        $(document).ready(function () {

            $.mockjax({
                url: "emails.action",
                response: function (settings) {
                    var email = settings.data.email, //original del archivo no cambiar
                        emails = ["glen@marketo.com", "george@bush.gov", "me@god.com", "aboutface@cooper.com", "steam@valve.com", "bill@gates.com"];
                        // emails = mys;
                    this.responseText = "true";
                    if ($.inArray(email, emails) !== -1) {
                        this.responseText = "false";
                    }
                },
                responseTime: 500
            });


            $("#formR").validate({

                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: "emails.action"
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    password_confirm: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                },

                messages: {
                    name: {
                        required: " Ingresar su nombre",
                        minlength: "Su nombre debe tener minimo 2 caracteres"
                    },
                    password: {
                        required: "Ingresar clave",
                        minlength: "Debe tener minim 5 caracteres"
                    },
                    password_confirm: {
                        required: "Ingresar contraseña",
                        minlength: "Debe tener minimo 5 caracteres",
                        equalTo: "Ingrese la misma contraseña"
                    },
                    email: {
                        required: "Ingresar un correo valido",
                        email: "Formato de correo invalido",
                        remote: ("Ya se ha registrado")
                    }
                },

                errorElement: "em",
                errorPlacement: function (error, element) {
                    error.addClass("help-block");

                    element.parents(".col-md-6").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span> ").insertAfter(element);
                    }
                },

                success: function (label, element) {
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },

                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-md-6").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },

                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-md-6").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }

            })


        })

    </script>
</div>
</body>
</html>




