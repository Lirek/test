@extends('promoter.layouts.app')
@section('main')
@include('flash::message')

<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
    {!! Form::open(['route'=>['promoters.update',$promoter],'method'=>'POST', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
    {{ Form::token() }}
    <div class="container">
        <div id="work-collections">
            <div class="row">
                <div class="col s12">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                           <img class="activator" src="{{asset('assets/img/foto_perfil_backend.png')}}" style="height: 100%; height: 100%;" alt="user background">
                        </div>
                        <div class="card-content">
                            <div id="image-preview" alt="avatar" class="img circle left activator btn-move-up waves-effect waves-light darken-2">

                    
                                {!! Form::file('img_perf',['class'=>'form-control-file', 'control-label', 'id'=>'avatarInput', 'accept'=>'image/*']) !!}
                                
                                 {!! Form::hidden('img_posterOld',$promoter->img_perf)!!}
                                
                                  <div id="list">
                                    @if ($promoter->img_perf != NULL)
                                        <img width="70" height="70" name='perf' src="{{asset($promoter->img_perf)}}" id="avatarImage">
                                    @else
                                        <img width="70" height="70" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}" id="avatarImage">
                                    @endif
                                
                            </div>
                        </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="col s4">
                              <h5 style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis;">
                                <i class="material-icons prefix blue-text">face</i>
                                        {{$promoter->name_c}}</h5>
                                    </div>
                                   <div class="col s4">
                              <h5 style="overflow:hidden;white-space:nowrap;text-overflow: ellipsis;">
                                <i class="material-icons prefix blue-text">person</i>
                                @if($promoter->priority==1)
                                        SuperAdmin
                                @elseif($promoter->priority==2)
                                        Admin
                                @else
                                Operator
                                @endif
                              </h5>
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
                                        {!! Form::text('name_c',$promoter->name_c,['class'=>'form-control', 'onkeypress' => 'return controltagLet(event)', 'pattern' => '[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+','id'=>'nombre']) !!}
                                        <div id="mensajeNombre"></div>
                                        <label for="nombre">Nombre</label>
                                    </div>
                     <!--email-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text">contact_mail</i>
                                        {!! Form::text('email',$promoter->email,['class'=>'form-control','readonly','id'=>'email']) !!}
                                        <label  for="email">Correo</label>
                                    </div>

                     <!--numero de telefono-->
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text">contact_phone</i>
                                            {!! Form::text('phone_s',$promoter->phone_s,['class'=>'form-control', 'required'=>'required','id'=>'telefono', 'onkeypress' => 'return controltagNum(event)', 'pattern' => '[0-9]+']) !!}
                                            <div id="mensajeRuc"></div>
                                        <label  for="telefono">Numero de teléfono</label>
                                    </div>

                                    <div class="input-field col s12">
                                              {!! Form::submit('Actualizar', ['class' => 'btn btn-primary green curvaBoton active','id'=>'Editar']) !!}
                                          </div>
                                        </ul>
                                    </div>

                                {!! Form::close() !!}   
                                <div class="col s12 m6 l4">
     <div id="profile-card" class="card">

        <div class="card-image waves-block pink darken-3" style="height: 65px; padding-top: 9px;">
          <span class="collection-header center" style="color: white; font-size:30px;">Opciones de cuenta</span>
         </div>

          <div class="card-content">
            <a class="modal-trigger btn btn-primary indigo" href="#changepass">CAMBIAR CONTRASEÑA</a>
            <div id="changepass" class="modal">
            <div class="card-image waves-block pink darken-3" style="height: 65px; padding-top: 9px"><span class="collection-header center" style="color:white;"><h4>Cambiar Contraseña</h4></span></div>
              <div class="card-content">
                <div class="input-field col s12 l12 m12">
                {!! Form::open(['url'=>['ChangePasswordPromoter',$promoter],'method'=>'POST','files'=>true,'class'=>'form-horizontal','id'=>'changepassword']) !!}

                {{ Form::token() }}

                {!! Form::hidden('password',$promoter->password,['class'=>'form-control','method'=>'POST']) !!} 

                  <div class="input-field col s11 l11">
                      <i class="material-icons prefix blue-text">edit</i>
                        <label for="oldpass">Introduzca su contraseña actual</label>
                        {!! Form::password('oldpass',['class'=>'form-control','required'=>'required','name'=>'oldpass','id'=>'oldpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena()" style="margin-left: 5px;">remove_red_eye</i>
                        <div id="oldpasscp" style="margin-top: 1%"></div>
                          @if ($errors->has('oldpass'))
                        <span class="help-block">
                        <strong>{{ $errors->first('oldpass') }}</strong>
                        </span>
                            @endif
                  </div>
  
                  <div class="input-field col s11 l11">
                            <i class="material-icons prefix blue-text">edit</i>
                            <label for="newpass">Introduzca su nueva contraseña</label>
                            {!! Form::password('newpass',['class'=>'form-control','required'=>'required','name'=>'newpass','id'=>'newpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena2()" style="margin-left: 5px;">remove_red_eye</i>
                            <div id="newpasscp" style="margin-top: 1%"></div>
                             @if ($errors->has('newpass'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('newpass') }}</strong>
                                    </span>
                            @endif
                  </div>

                  <div class="input-field col s11 l11">
                            <i class="material-icons prefix blue-text">edit</i>
                            <label for="confnewpass">Confirme su nueva contraseña</label>
                            {!! Form::password('confnewpass',['class'=>'form-control','required'=>'required','name'=>'confnewpass','id'=>'confnewpass','method'=>'POST', 'type'=>'password']) !!}<i class="material-icons prefix blue-text" onclick="mostrarContrasena3()" style="margin-left: 5px;">remove_red_eye</i>
                            <div id="confnewpasscp" style="margin-top: 1%"></div>
                             @if ($errors->has('confnewpass'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('confnewpass') }}</strong>
                                    </span>
                            @endif
                            <div style="text-align: center">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary green curvaBoton active','id'=>'ChangePasswordPromoter','type'=>'button']) !!}
                            {!! Form::button('Regresar', ['class' => 'btn btn-primary green curvaBoton active modal-close','id'=>'Regresar']) !!} 
                            </div>
                        </div>
                    </div>
                </div>
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
<!-- Confirmación cambio de contraseñas-->
<script type="text/javascript">
    $(document).ready(function(){

        $('#oldpass').keyup(function(evento){
            var password = $('#oldpass').val().trim();

            if (password.length==0) {
                $('#oldpasscp').show();
                $('#oldpasscp').text('El campo no debe estar vacio');
                $('#oldpasscp').css('color','red');
                $('#oldpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#oldpasscp').show();
                $('#oldpasscp').text('Su contaseña antigua debe tener al menos 5 caracteres');
                $('#oldpasscp').css('color','red');
                $('#oldpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            else {
                $('#oldpasscp').hide();
                var password1 = $('#oldpass').val().trim();
                console.log(password1.length !=0);
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePassword').attr('disabled',false);
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#newpass').keyup(function(evento){
            var password = $('#newpass').val().trim();

            if (password.length==0) {
                $('#newpasscp').show();
                $('#newpasscp').text('El campo no debe estar vacio');
                $('#newpasscp').css('color','red');
                $('#newpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#newpasscp').show();
                $('#newpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                $('#newpasscp').css('color','red');
                $('#newpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            else {
                $('#newpasscp').hide();
                var password1 = $('#confnewpass').val().trim();
                console.log(password1.length !=0 );
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePassword').attr('disabled',false);
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){

        $('#confnewpass').keyup(function(evento){
            var password = $('#confnewpass').val().trim();

            if (password.length==0) {
                $('#confnewpasscp').show();
                $('#confnewpasscp').text('El campo no debe estar vacio');
                $('#confnewpasscp').css('color','red');
                $('#confnewpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#confnewpasscp').show();
                $('#confnewpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                $('#confnewpasscp').css('color','red');
                $('#confnewpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePassword').attr('disabled',true);
            }
            else {
                $('#confnewpasscp').hide();
                var password1 = $('#confnewpass').val().trim();
                console.log(password1.length != 0);
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePassword').attr('disabled',false);
                }
            }
        });
    });

    $(document).ready(function(){

        $('#confnewpass').keyup(function(evento){
            var password1 = $('#newpass').val();
            var password = $('#confnewpass').val();

            if (password != password1) {
                $('#confnewpasscp').show();
                $('#confnewpasscp').text('Ambas contraseña deben coincidir');
                $('#confnewpasscp').css('color','red');
                $('#confnewpasscp').css('font-size','60%');
                $('#ChangePassword').attr('disabled',true);
            } else {
                $('#confnewpasscp').hide();
                if (password1.length !=0){
                    $('#ChangePassword').attr('disabled',false);
                }
            }
        });
    });
</script>
<!-- Mostrar Contraseñas -->
<script>
  function mostrarContrasena(){
      var tipo = document.getElementById("oldpass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

<script>
  function mostrarContrasena2(){
      var tipo = document.getElementById("newpass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

<script>
  function mostrarContrasena3(){
      var tipo = document.getElementById("confnewpass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }
</script>

  <script>
    $(function() {
    $('#fecha').datepicker({
        format: 'dd-mm-yyyy',
        yearRange: 50,
        changeMonth: true,
        changeYear: true,
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

<script type="text/javascript"> //ERROR AQUI
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
       
        //Esta función
      /*  $(document).ready(function (e){

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

        })*/

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