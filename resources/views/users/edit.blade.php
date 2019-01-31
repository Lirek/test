@extends('layouts.app')

@section('main')

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>


    <style>
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
  height: 230px;
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
            line-height: 100px;
            font-size: 100px;
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
            height: 70px;
            font-size: 70px;
            line-height: 60px;
            text-transform: uppercase;
            margin: auto;
            text-align: center;
        }

        #image-preview_ci input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        .intl-tel-input{
            width: 100%;
        }

    </style>
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
    {!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
    {{ Form::token() }}
    <div class="container">
        <div id="work-collections">
            <div class="row">
                <div class="col s12">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{asset('plugins/img/estatica.jpg')}}" style="height: 100%" alt="user background">
                        </div>
                        <div class="card-content">
                            <div id="image-preview" alt="avatar" class="img circle left activator btn-move-up waves-effect waves-light darken-2">

                    
                                {!! Form::file('img_perf',['class'=>'form-control-file', 'control-label', 'id'=>'avatarInput', 'accept'=>'image/*']) !!}
                                
                                 {!! Form::hidden('img_posterOld',$user->img_perf)!!}
                                
                                  <div id="list">
                                    @if(Auth::user()->img_perf)
                                    <a href="#"><img src="{{asset(Auth::user()->img_perf)}}" id="avatarImage" alt="Avatar" height="70" width="70"></a><!-- logo user -->
                                @else
                                    <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" height="70" width="70"></a><!-- logo user -->
                                @endif
                                
                            </div>
                        </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s4">
                                        <h5><i class="material-icons prefix blue-text">face</i>
                                        {{Auth::user()->name}}</h5>
                                    </div>
                                    <div class="col s4">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{Auth::user()->credito}}</h5>
                                        <label>todos mis tickets</label>
                                    </div>
                                    <div class="col s4">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{Auth::user()->points}}</h5>
                                        <label>todos mis puntos</label>
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
                                        <h4 class="titelgeneral">Datos a editar</h4>
                                    </div>
                                    <!--nombre-->
                                    <div class="input-field col s12 ">
                                        <i class="material-icons prefix blue-text">face</i>
                                        {!! Form::text('name',$user->name,['class'=>'form-control', 'required'=>'required','onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombre','required'=>'required']) !!}
                                        <div id="mensajeNombre"></div>
                                        <label for="name">Nombre</label>
                                    </div>

                                    <!--apellido-->
                                    <div class="input-field col s12 ">
                                        <i class="material-icons prefix blue-text">face</i>
                                        {!! Form::text('last_name',$user->last_name,['class'=>'form-control', 'required'=>'required','onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'apellido','required'=>'required']) !!}
                                        <div id="mensajeNombre"></div>
                                        <label for="name">apellidos</label>
                                    </div>

                                    <!--email-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text">contact_mail</i>
                                        {!! Form::text('email',$user->email,['class'=>'form-control','readonly']) !!}
                                        <label  for="email">Correo</label>
                                    </div>

                                    <!--cedula-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text">assignment_ind</i>
                                        @if($user->num_doc)
                                            {!! Form::text('ci',$user->num_doc,['class'=>'form-control','readonly']) !!}
                                        @else
                                            {!! Form::text('ci',$user->num_doc,['class'=>'form-control', 'required'=>'required', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                            <div id="mensajeRuc"></div>
                                        @endif
                                        <label  for="ruc">Cedula</label>
                                    </div>

                                    <!-- imagen de RUC-->
                            <div class="form-group ">
                                @if($user->verify == 0 || $user->verify == 2)
                                <div class="file-field input-field col s12">
                                    <label for="exampleInputFile" class="control-label">Cargar imagen de cedula</label>
                                    <br><br>
                                    <div id="mensajeDocumento"></div>
                                    <div class="btn blue">
                                         <span>seleccione<i class="material-icons right">assignment_ind</i></span>
                                        {!! Form::file('img_doc',['class'=>'form-control','accept'=>'.img*','id'=>'img_doc','control-label','placeholder'=>'cargar libro','oninvalid'=>"this.setCustomValidity('Seleccione imagen del RUC')"]) !!}
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>    
                                @endif
                                <div  class="col m4">
                                    @if ($user->img_doc)
                                        <img id="preview_img_doc" src="{{asset($user->img_doc)}}" name='ci' alt="your image" width="180" height="180" />
                                    @else
                                    <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" id="preview_img_doc" alt="Avatar" height="180" width="180"></a>
                                @endif
                                </div>
                            </div>


                                    <!--sexo-->
                                    <div class="col m12 s12">
                                        <div class="input-field col s12">
                                         <i class="material-icons prefix blue-text valign-wrapper">wc</i>
                                        {!! Form::select('type',['M'=>'Hombre', 'F'=>'Mujer'],$user->type,['class'=>'form-control select-saga','placeholder'=>'Selecione su sexo','id'=>'exampleInputFile']) !!}
                                        <label for="exampleInputFile" class="control-label">sexo</label>
                                        <br>
                                        </div>
                                    </div>

                                    <!--alias-->
                                    <div class="input-field col s12 ">
                                        <i class="material-icons prefix blue-text">face</i>
                                        {!! Form::text('alias',$user->alias,['class'=>'form-control', 'required'=>'required', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'alias','required'=>'required']) !!}
                                        <div id="mensajeNombre"></div>
                                        <label for="name">Alias</label>
                                    </div>

                                    <!--fecha de nacimiento-->
                                    
                                    <div class="input-field col s12 ">
                                        <i class="material-icons prefix blue-text">today</i>
                                        <input type="text" name="fech_nac" value="{!! date('d-m-Y', strtotime($user->fech_nac)) !!}" class="datepicker" id="fecha">
                                        <label for="pickdate">Fecha de nacimiento</label>
                                        <div id="mensajeNombre"></div>
                                    </div>

                                    <!--direccion-->
                                    <div class="input-field col s12 ">
                                        <i class="material-icons prefix blue-text">description</i>
                                        {!! Form::text('direccion',$user->direccion,['class'=>'form-control']) !!}
                                        <div id="mensajeNombre"></div>
                                        <label for="name">dirección</label>
                                    </div>

                        
                                    <!--numero de telefono-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text">contact_phone</i>
                                            {!! Form::text('phone',$user->phone,['class'=>'form-control', 'required'=>'required', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                            <div id="mensajeRuc"></div>
                                        <label  for="ruc">numero de telefono</label>
                                    </div>

                                    <!--Estado de la cuenta-->
                                    <div class="input-field col s12" style="display: none;">
                                        <i class="material-icons prefix blue-text">contact_phone</i>
                                           {!! Form::text('account_status','open',['class'=>'form-control', 'required'=>'required','onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'account_status','required'=>'required']) !!}
                                            <div id="mensajeRuc"></div>
                                        <label  for="ruc">Estado de cuenta</label>
                                    </div>

                                    <div class="input-field col s12">
                                              {!! Form::submit('Actualizar', ['class' => 'btn btn-primary green curvaBoton active','id'=>'Editar']) !!}
                                          </div>
                                        </ul>
                                    </div>

                            <div class="col s12 m6 l4">
                                <div id="profile-card" class="card">
                                    <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px">
                                        <span class="collection-header center" style="color: white ">Contactame</span>
                                      </li>
                                    </div>
                                    <div class="card-content">
                                        <p><i class="mdi-communication-email cyan-text text-darken-2"></i></p>
                                        {{$user->email}}
                                        <br>
                                        <br>
                                        {{$user->phone}}
                                    </div>
            {!! Form::close() !!} 
                                </div>
            <!-- CLOSE ACCOUNT -->
            <div id="profile-card" class="card">
                    <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px">
                            <span class="collection-header center" style="color:white;">Opciones de cuenta</span>
                    </div>
                <div class="card-content">
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i></p>
                    <div style="text-align: left;"> 
                    <ul><a class="btn btn-primary green curvaBoton btn modal-trigger" href="#modal1">Cambiar Contraseña</a>
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                            <div style="text-align: center;">
                            <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px"><span class="collection-header center" style="color:white;">Cambiar Contraseña</span></div>
                            </div>
                            <div class="card-content">

                            <div class="input-field col s12">

                            {!! Form::open(['url'=>['ChangePassword',$user],'method'=>'POST','files'=>true,'class'=>'form-horizontal','id'=>'changepassword']) !!}
                            {{ Form::token() }}

                       <!-- {!! Form::text('password',$user->password,['class'=>'form-control','method'=>'POST']) !!}-->
                            <div class="input-field col s12 ">
                            <i class="material-icons prefix blue-text">edit</i>
                            <label>Introduzca su nueva contraseña</label>
                               {!! Form::password('newpass',$user->newpasswd,['class'=>'form-control','required'=>'required','name'=>'newpass','id'=>'newpass','method'=>'POST']) !!}
                            </div>
                            <div class="input-field col s12 ">
                            <i class="material-icons prefix blue-text">edit</i>
                            <label>Confirme su nueva contraseña</label>
                              {!! Form::password('confnewpass',$user->confnewpass,['class'=>'form-control','required'=>'required','name'=>'confnewpass','method'=>'POST']) !!}  
                            </div>
                            <div style="text-align: center">
                              {!! Form::submit('Actualizar', ['class' => 'btn btn-primary green curvaBoton active','id'=>'Cambiar']) !!}
                              {!! Form::button('Regresar', ['class' => 'btn btn-primary green curvaBoton active modal-close','id'=>'Regresar']) !!} 
                            </div>
                            <!--<a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->
                            </div>
                            <!-- <a href="{{ url('ChangePassword', $user->id) }}" class="btn btn-primary green curvaBoton active modal-close" id="changepassword">Actualizar</a>
                            <a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->           </div>      
                            </div>
                        </div>
                    </ul>
                    <ul><a class="btn btn-primary red curvaBoton btn modal-trigger" href="#modal2">Cerrar cuenta</a>
                            <div id="modal2" class="modal">
                            <div class="modal-content">
                            <div style="text-align: center;">
                            <div class="card-image waves-block cyan" style="height: 65px; padding-top: 9px"><span class="collection-header center" style="color:white;">Cerrar cuenta</span>
                            </div>
                            </div>
                            <div class="card-content" style="text-align: center;"> <label><h6>AVISO <br> Desea cerrar su cuenta permanentemente? <br>Esta acción inhabilitará su cuenta y no podra ingresar de nuevo con ella.</h6></label><br><br>
                            <div style="text-align: center">
                            <a href="{{ url('DeleteAccount', $user->id) }}" class="btn btn-primary green curvaBoton active modal-close">Si, Estoy Seguro</a>
                            {!! Form::button('Regresar', ['class' => 'btn btn-primary green curvaBoton active modal-close','id'=>'Regresar']) !!}
                            <!--<a href="#" class="btn btn-primary green curvaBoton active modal-close">Volver</a>-->
                            </div>
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
                    </div> 
               </div>
         </div>
    </div>
     

@endsection


@section('js')
<script>
    $(function() {
    $('#fecha').datepicker({
        format: 'dd-mm-yyyy',
        firstDay: 1,
        i18n: {
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
            weekdaysAbbrev: ['D','L','M','M','J','V','S'],
        }
    });
});
</script>
<script type="text/javascript">
    
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
    <script type="text/javascript">

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });
       
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