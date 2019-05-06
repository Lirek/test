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

	{!!Form::open(array('action' => array('PromoterController@update', $promoter->id,'method'=>'POST')))!!}
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
                                    @if($promoter->img_perf)
                                    <a href="#"><img src="{{asset(Auth::user()->img_perf)}}" id="avatarImage" alt="Avatar" height="70" width="70"></a><!-- logo user -->
                                @else
                                    <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" height="70" width="70"></a><!-- logo user -->
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
    		</div>
    	</div>

    	<div id="work-collections">
    		<div class="col s12 m12 l8 row">
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
                                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary green curvaBoton active','id'=>'UpdateProfilePromoter']) !!}
                                   </div>              
                    </ul>
                    {!! Form::close() !!}
    		</div>
    	</div>
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
                        <label for="oldpass">Introduzca su antigua contraseña</label>
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
	{!! Form::close() !!}

                      

 @include('promoter.modals.HomeViewModal')           
@endsection
 @section('js')
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
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#oldpasscp').show();
                $('#oldpasscp').text('Su contaseña antigua debe tener al menos 5 caracteres');
                $('#oldpasscp').css('color','red');
                $('#oldpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            else {
                $('#oldpasscp').hide();
                var password1 = $('#oldpass').val().trim();
                console.log(password1.length !=0);
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePasswordPromoter').attr('disabled',false);
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
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#newpasscp').show();
                $('#newpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                $('#newpasscp').css('color','red');
                $('#newpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            else {
                $('#newpasscp').hide();
                var password1 = $('#confnewpass').val().trim();
                console.log(password1.length !=0 );
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePasswordPromoter').attr('disabled',false);
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
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#confnewpasscp').show();
                $('#confnewpasscp').text('Su nueva contaseña debe tener 5 caracteres');
                $('#confnewpasscp').css('color','red');
                $('#confnewpasscp').css('font-size','60%');
                $('#modal1').attr('disabled',true);
                $('#ChangePasswordPromoter').attr('disabled',true);
            }
            else {
                $('#confnewpasscp').hide();
                var password1 = $('#confnewpass').val().trim();
                console.log(password1.length != 0);
                if (password1.length !=0){
                    $('#modal1').attr('disabled',false);
                    $('#ChangePasswordPromoter').attr('disabled',false);
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
                $('#confnewpasscp').text('Ambas contraseñas deben coincidir');
                $('#confnewpasscp').css('color','red');
                $('#confnewpasscp').css('font-size','60%');
                $('#ChangePasswordPromoter').attr('disabled',true);
            } else {
                $('#confnewpasscp').hide();
                if (password1.length !=0){
                    $('#ChangePasswordPromoter').attr('disabled',false);
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
@endsection