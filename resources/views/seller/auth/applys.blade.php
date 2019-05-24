<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Leipel</title>
        <link rel="stylesheet" href="{{ asset('plugins/bubbles/movingbubbles.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    </head>

    <body>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="thumbnail">
                    <img src="{{ asset('sistem_images/Logo-Leipel.png') }}" alt="242x200">
                    <div class="caption">
                        <h2  align="center">Solicitud</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('ApplysSubmit') }}" id="form">
                            {{ csrf_field() }}
                            @include('flash::message')
                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                <label for="tlf" class="col-md-6 control-label">Nombre comercial:</label>
                                <div class="col-md-6">
                                    <div id="mensajeNombreComercial"></div>
                                    <input id="com_name" type="text" class="form-control" name="com_name" required="required" autofocus>
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('com_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                <label for="tlf" class="col-md-6 control-label">Nombre del contacto</label>
                                <div class="col-md-6">
                                    <div id="mensajeNombreContacto"></div>
                                    <input id="contact_name" type="text" class="form-control" name="contact_name" required="required">
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                <label for="tlf" class="col-md-6 control-label">Teléfono</label>
                                <div class="col-md-6">
                                    <div id="mensajeTelefono"></div>
                                    <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}" required="required" onpaste="return false">
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tlf') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-6 control-label">Descripción</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description" required="required"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="content_type" class="col-md-6 control-label">Tipo de contenido</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="content_type" id="content_type" required="required">
                                        <option value="">Seleccione...</option>
                                        <option value="Musica">Música</option>
                                        <option value="Revistas">Revistas</option>
                                        <option value="Libros">Libros</option>
                                        <option value="Radios">Radios</option>
                                        <option value="TV">Televisoras</option>
                                        <option value="Peliculas">Películas</option>
                                        <option value="Series">Series</option>
                                    </select>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_type') }}</strong>
                                        </span>
                                    @endif
                                    <div id="subMenuMusica">
                                        <br>
                                        <select name="sub_desired_musica" id="sub_desired" class="form-control">
                                            <option value="Artista">Artista</option>
                                            <option value="Productora">Productora</option>
                                        </select>
                                    </div>
                                    <div id="subMenuLibro">
                                        <br>
                                        <select name="sub_desired_libros" id="sub_desired" class="form-control">
                                            <option value="Escritor">Escritor</option>
                                            <option value="Editorial">Editorial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-6 control-label">Correo</label>
                                <div class="col-md-6">
                                    <div id="mensajeCorreo"></div>
                                    <input id="email" type="email" class="form-control" name="email" required="required">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div align="center">
                                    <button type="submit" id="solicitar" class="btn btn-primary">
                                        Solicitar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- De aqui en adelante son las validaciones para los campos--}}
        <script src="{{asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('plugins/bubbles/movingbubbles.js') }}" type="text/javascript"></script>
        <script>
            //---------------------------------------------------------------------------------------------------
            // funcion para mostrar el submenu de los modulos de libro y de musica
            $(document).ready(function(){
                $('#subMenuMusica').hide();
                $('#subMenuLibro').hide();
                $('#content_type').on('change',function(){
                    if (this.value=='Musica') {
                        $('#subMenuLibro').hide();
                        $('#subMenuMusica').show();
                    } else if (this.value=='Libros') {
                        $('#subMenuMusica').hide();
                        $('#subMenuLibro').show();
                    } else {
                        $('#subMenuMusica').hide();
                        $('#subMenuLibro').hide();
                    }
                });
            });
            // funcion para mostrar el submenu de los modulos de libro y de musica
            //---------------------------------------------------------------------------------------------------
            // Función que nos va a contar el número de caracteres
                $(document).ready(function(){
                    var cantidadMaxima = 191;
                    $('#com_name').keyup(function(evento){
                        var nombreComercial = $('#com_name').val();
                        numeroPalabras = nombreComercial.length;
                        if (numeroPalabras>cantidadMaxima) {
                            $('#mensajeNombreComercial').show();
                            $('#mensajeNombreComercial').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                            $('#mensajeNombreComercial').css('color','red');
                            $('#solicitar').attr('disabled',true);
                        } else {
                            $('#mensajeNombreComercial').hide();
                            $('#solicitar').attr('disabled',false);
                        }
                    });
                });

                $(document).ready(function(){
                    var cantidadMaxima = 191;
                    $('#contact_name').keyup(function(evento){
                        var nombreCotacto = $('#contact_name').val();
                        numeroPalabras = nombreCotacto.length;
                        if (numeroPalabras>cantidadMaxima) {
                            $('#mensajeNombreContacto').show();
                            $('#mensajeNombreContacto').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                            $('#mensajeNombreContacto').css('color','red');
                            $('#solicitar').attr('disabled',true);
                        } else {
                            $('#mensajeNombreContacto').hide();
                            $('#solicitar').attr('disabled',false);
                        }
                    });
                });

                $(document).ready(function(){
                    var cantidadMaxima = 191;
                    $('#tlf').keyup(function(evento){
                        var telefono = $('#tlf').val();
                        numeroPalabras = telefono.length;
                        if (numeroPalabras>cantidadMaxima) {
                            $('#mensajeTelefono').show();
                            $('#mensajeTelefono').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                            $('#mensajeTelefono').css('color','red');
                            $('#solicitar').attr('disabled',true);
                        } else {
                            $('#mensajeTelefono').hide();
                            $('#solicitar').attr('disabled',false);
                        }
                    });
                });
            // Función que nos va a contar el número de caracteres
            //---------------------------------------------------------------------------------------------------
            // Funcion de solo numero
                $(document).ready(function(){
                    $("#tlf").keypress(function (event) {
                        $(this).val($(this).val().replace(/[^\d].+/, ""));
                        if ((event.which < 48 || event.which > 57)) {
                            event.preventDefault();
                            $('#mensajeTelefono').show();
                            $('#mensajeTelefono').text('Solo números');
                            $('#mensajeTelefono').css('color','red');
                            $('#solicitar').attr('disabled',true);
                        } else {
                            $('#mensajeTelefono').hide();
                            $('#solicitar').attr('disabled',false);
                        }
                    });
                });
            // Funcion de solo numero
            //---------------------------------------------------------------------------------------------------
            // Funcion para validar el correo
            $(document).ready(function(){
                $('#solicitar').click(function() {
                    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                    if (regex.test($('#email').val().trim())) {
                        //$("#form").submit();
                    } else {
                        $('#mensajeCorreo').show();
                        $('#mensajeCorreo').text('El correo introducido no es valido');
                        $('#mensajeCorreo').css('color','red');
                        event.preventDefault();
                    }
                });
            });
            // Funcion para validar el correo
            //---------------------------------------------------------------------------------------------------
        </script>
    </body>
</html>