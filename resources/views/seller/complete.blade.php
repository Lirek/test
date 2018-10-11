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
                            <label for="name" class="col-md-4 control-label">Nombre</label>
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
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                            <label for="tlf" class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}" required autofocus>

                                @if ($errors->has('tlf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tlf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="desc" class="col-md-4 control-label">Descripción</label>
                            <div class="col-md-6">
                                <textarea name="dsc" id="dcs" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ruc" class="col-md-4 control-label">Registro Único de Contribuyente</label>
                            <div class="col-md-6">
                                <input id="ruc" type="text" class="form-control" name="ruc" required>
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
                                <input type="file" name="adj_ruc" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
                    $('#tlf').attr('readonly','readonly');
                    $('#tlf').val(result.phone_s);
                    $('textarea#dcs').attr('readonly','readonly');
                    $('textarea#dcs').text(result.dsc);
                    $('#modulo').val(result.desired_m);
                    $('#submodulo').val(result.sub_desired_m);
                }
                else if (result==0){
                    console.log('no existe ese id de la persona');
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
                    console.log('es otro token');
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
</script>
</html>

