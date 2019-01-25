@extends('seller.layouts')
@section('css')

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>

<style type="text/css">

        @media only screen and (min-width: 993px) {
            .container {
                width: 98%;
            }
        }

        h5.breadcrumbs-header {
            font-size: 1.64rem;
            line-height: 1.804rem;
            margin: 1.5rem 0 0 0;
        }

        #work-collections .collection-header {
            font-size: 2.0rem;
            font-weight: 500;
        }

        #profile-card .card-image {
            height: 210px;
        }

        #profile-card .card-content p {
            font-size: 1.2rem;
            margin: 0px 0 0px 0;
        }

        #profile-card .btn-move-up {
            position: relative;
            top: -60px;
            right: -18px;
            margin-right: 10px !important;
        }

        #image-preview {
            width: 70px;
            height: 70px;
            padding-top: 0px;
            padding-left: 0px;
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 70%;
            height: 30px;
            font-size: 15px;
            line-height: 50px;
            text-transform: uppercase;
            margin: auto;
            text-align: center;
        }

        .intl-tel-input{
            width: 100%;
        }
    </style>
@endsection
@section('content')
            <!-- START CONTENT -->
    <div class="row">

      <div class="col s4">
        <!-- Promo Content 1 goes here -->
      </div>
      <div class="col s4">
        <!-- Promo Content 2 goes here -->
      </div>
      <div class="col s4">
        <!-- Promo Content 3 goes here -->
      </div>

    </div>
    <!--inicio contenido-->
    {!! Form::open(['route'=>['sellers.update',$seller],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
    {{ Form::token() }}
    <div class="container">
        <div id="work-collections">
            <div class="row">
                <div class="col s12">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://demo.geekslabs.com/materialize/v2.1/layout03/images/user-bg.jpg" alt="user background">
                        </div>
                        <div class="card-content">
                            <div id="image-preview" class="img circle left activator btn-move-up waves-effect waves-light darken-2">
                                {!! Form::file('logo',['class'=>'form-control-file', 'control-label', 'id'=>'avatarInput', 'accept'=>'image/*']) !!}
                                {!! Form::hidden('img_posterOld',$seller->logo)!!}
                                <div id="list">
                                    @if ($seller->logo != NULL)
                                        <img width="70" height="70" name='perf' src="{{asset($seller->logo)}}" id="avatarImage">
                                    @else
                                        <img width="70" height="70" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}" id="avatarImage">
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s3">
                                        <h5><i class="material-icons prefix blue-text">face</i>
                                        {{Auth::guard('web_seller')->user()->name}}</h5>
                                    </div>
                                     <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{$content_for_aprove}}</h5>
                                        <label>contenido en revisión</label>
                                    </div>
                                    <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{$total_content}}</h5>
                                        <label>contenido total</label>
                                    </div>
                                    <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i><h5>{{$total_aproved}}</h5>
                                        <label>contenido aprovado</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
    <div id="work-collections">
        <div class="row">   
          <div class="col s12 m12 l8">
              <ul id="projects-collection" class="collection">
                    <div class="card-image waves-block" style="height: 65px; padding-top: 9px">
                        <span class="collection-header center"></span>
                        <h4 class="titelgeneral"> Datos a editar</h4>
                    </div>
                            <!--nombre-->
                            <div class="input-field col s12 ">
                                <i class="material-icons prefix blue-text">face</i>
                                {!! Form::text('name',$seller->name,['class'=>'form-control', 'required'=>'required', 'id'=>'nombre', 'required'=>'required']) !!}
                                <div id="mensajeNombre"></div>
                                <label for="name">Nombre</label>
                            </div>
                            <!--email-->
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text">email</i>
                                {!! Form::text('email',$seller->email,['class'=>'form-control','readonly']) !!}
                                <label  for="email">Correo</label>
                            </div>
                            <!--RUC-->
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text">assignment_ind</i>
                                @if($seller->estatus == 'Aprobado')
                                    {!! Form::text('ruc_s',$seller->ruc_s,['class'=>'form-control','readonly']) !!}
                                @else
                                    {!! Form::text('ruc_s',$seller->ruc_s,['class'=>'form-control', 'required'=>'required', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                    <div id="mensajeRuc"></div>
                                @endif
                                <label  for="ruc">(RUC) Registro único de contribuyente</label>
                            </div>
                            
                            <!-- imagen de RUC-->
                            <div class="form-group ">
                            @if($seller->estatus == 'Pre-Aprobado' || $seller->estatus == 'Rechazado')
                            <div class="file-field input-field col s12">
                                <label for="exampleInputFile" class="control-label">Cargar imagen de RUC</label>
                                <br><br>
                                <div id="mensajeDocumento"></div>
                                <div class="btn blue">
                                     <span>seleccione<i class="material-icons right">assignment_ind</i></span>
                                    {!! Form::file('adj_ruc',['class'=>'form-control','accept'=>'.img*, .pdf','id'=>'img_doc','control-label','placeholder'=>'cargar libro','oninvalid'=>"this.setCustomValidity('Seleccione imagen del RUC')"]) !!}
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                                 <div id="mensajeImgDoc" style="display: none;"></div>
                            </div>    
                            @endif
                                <div  class="col m12">
                                    @if ($seller->adj_ruc && pathinfo($seller->adj_ruc, PATHINFO_EXTENSION) != 'pdf')
                                        <img id="preview_img_doc" src="{{asset($seller->adj_ruc)}}" name='ci' alt="your image" width="180" height="180" />
                                        <object id="pdfruc"  class="text-center"  type="application/pdf" align="center" width="380" height="180"></object>
                                    @elseif (pathinfo($seller->adj_ruc, PATHINFO_EXTENSION) == 'pdf')
                                        <object id="pdfruc" data="{{asset($seller->adj_ruc)}}" class="text-center"  type="application/pdf" align="center" width="380" height="180"></object>
                                        <br>
                                        <img id="preview_img_doc"  name='ci'  />
                                    @else
                                        <img id="preview_img_doc"  name='ci'  />
                                        <object id="pdfruc"  class="text-center"  type="application/pdf" align="center" width="380" height="180"></object>
                                    @endif
                                </div>
                            </div>


                            <!--direccion-->
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text">navigation</i>
                                {!! Form::text('direccion',$seller->address,['class'=>'form-control','id'=>'direccion', 'required'=>'required']) !!}
                                <div id="mensajeMaximoDireccion"></div>
                                <label  for="ruc">Dirección</label>
                            </div>
                            <!--telefono-->
                            <div class="input-field col s12">
                                <i class="material-icons left prefix blue-text">local_phone</i>
                                <input class="form-control" type="tel" name="phone" id="phone_s" required="required" onkeypress="return controltagNum(event)" maxlength="15" value="{{$seller->tlf}}">
                                {{--<input type="hidden" id="phone2" name="phone" value="{{$seller->tlf}}" required="required">--}}
                                <div id="mensajePhone"></div>
                                <label  for="ruc">Telefono</label>
                            </div>
                            <!--Estado de la cuenta-->
                            <div class="input-field col s12" style="display: none;">
                                <i class="material-icons prefix blue-text">security</i>
                                  {!! Form::text('account_status','open',['class'=>'form-control', 'required'=>'required','onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'account_status','required'=>'required']) !!}
                                  <div id="mensajeRuc"></div>
                                 <label  for="ruc">Estado de cuenta</label>
                            </div>

                                  <div class="input-field col s12">
                                      {!! Form::submit('Actualizar', ['class' => 'btn btn-primary active curvaBoton green','id'=>'Editar']) !!}
                                  </div>
                                </ul>
                            </div>
                            <div class="col s12 m6 l4">
                                <div id="profile-card" class="card">
                                    <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px">
                                        <span class="collection-header center" style="color: white ">Sobre mi</span>
                                      </li>
                                    </div>
                                    <div class="card-content">
                                        <p><i class="mdi-communication-email cyan-text text-darken-2"></i>{{$seller->descs_s}}</p>
                                    </div>
                                </div>
                                <!-- CLOSE ACCOUNT -->
                                 <div id="profile-card" class="card">
                                    <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px">
                                        <span class="collection-header center" style="color: white ">Opciones de cuenta</span>
                                    </div>
                                     <div class="card-content">
                                        <p><i class="mdi-communication-email cyan-text text-darken-2"></i></p>
                                        <div style="text-align: left;"> 
                                        <ul><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Cambiar Contraseña</a></ul>
                                        <ul><a class="waves-effect waves-light btn modal-trigger" href="#modal2">Cerrar cuenta</a>
                                        <div id="modal2" class="modal">
                                                <div class="modal-content">
                                                  <div class="card-content"> Desea cerrar su cuenta permanentemente? <br>Esta acción inhabilitará su cuenta y no podra ingresar de nuevo con ella.<br><br>
                                                    <a href="{{ url('DeleteAccountSeller', Auth::guard('web_seller')->user()->id) }}" class="btn btn-primary green curva Boton active modal-close">Si, Estoy Seguro</a>
                                                    <a href="#" class="btn btn-primary green curva Boton active modal-close">Volver</a>
                                                  </div>      
                                                </div>
                                        </div>
                                        </ul>
                                        </div>    
                                    </div>
                                </div>
                            <!-- CLOSE ACCOUNT -->
                            </div>
                        </div>
                    </div>

        </div>
    </div>
    {!! Form::close() !!}
@endsection
@section('js')
{{--
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="js/materialize.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    

    <!-- chartist -->
    <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="js/plugins/chartjs/chart-script.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="js/plugins/sparkline/sparkline-script.js"></script>
    
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>
--}}


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
        /*
        $(document).ready(function (e){

            if ($("#phone2").val() !=''){
                var phone = $("#phone2").val();
                console.log(phone);
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
        */
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
                    if(input.files[0].type != 'application/pdf'){
                    $('#pdfruc').hide();
                    $(imgId).attr('src', e.target.result);
                    $(imgId).width('350');
                    $(imgId).height('300');
                    }
                    else
                    {
                    $(imgId).width('0');
                    $(imgId).height('0');
                    $('#pdfruc').show();
                    $('#pdfruc').attr('data', e.target.result);
                    }
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
                if (extension==".png" || extension==".jpg" || extension==".jpeg" || extension=='.pdf') {
                    $('#Editar').attr('disabled',false);
                    $('#mensajeImgDoc').hide();
                    $('#preview_img_doc').show();
                } else {
                    $('#Editar').attr('disabled',true);
                    $('#mensajeImgDoc').show();
                    $('#mensajeImgDoc').text('La imagen debe estar en formato jpeg, jpg, png o pdf');
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