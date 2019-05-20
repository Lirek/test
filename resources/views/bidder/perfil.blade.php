@extends('bidder.layouts')
	<style type="text/css">

                /*
        @media only screen and (min-width: 993px) {
            .container {
                width: 100%;
            }
        }
                */

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
@section('content')
	<div class="">
        <div id="work-collections">
            <div class="row">
                <div class="col s12">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://demo.geekslabs.com/materialize/v2.1/layout03/images/user-bg.jpg" alt="user background">
                        </div>
                        <div class="card-content">
                            <div id="image-preview" class="img circle left activator btn-move-up waves-effect waves-light darken-2">
								<form action="{{url('imagenPerfilBidder')}}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="file" name="adj_logo" class="form-control-file control-label" id="avatarInput" accept="image/*">
									<input type="submit" id="actualizarImagenPerfil" style="display: none;">
	                                <div id="list">
	                                    @if ($bidder->logo != NULL)
	                                        <img width="70" height="70" name='perf' src="{{asset($bidder->logo)}}" id="avatarImage">
	                                    @else
	                                        <img width="70" height="70" name='sinPerf' src="{{asset('plugins/img/sinPerfil.png')}}" id="avatarImage">
	                                    @endif
	                                </div>
								</form>
                            </div>
                            <div class="row">
                                <div class="col s12">
									<div id="mensajeImgPerfil"></div>
                                    <div class="col s3">
                                        <h5><i class="material-icons prefix green-text">face</i>
                                        {{Auth::guard('bidder')->user()->name}}</h5>
                                    </div>
                                    <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{$total_products}}</h5>
                                        <label>Total de productos</label>
                                    </div>
                                    <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{$total_aproved}}</h5>
                                        <label>Productos aprovados</label>
                                    </div>
                                     <div class="col s3">
                                        <i class=" mdi-action-perm-identity cyan-text text-darken-2"></i>
                                        <h5>{{$total_revision}}</h5>
                                        <label>Productos en revisión</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col s12 l8">
            		<ul id="projects-collection" class="collection">
            			<div class="card-image waves-block" style="height: 65px; padding-top: 9px">
            				<span class="collection-header center"></span>
            				<h4 class="titelgeneral">Datos a editar</h4>
            			</div>
						<div class="row" style="padding: 0% 5%">
							<form id="edit" action="{{url('perfilBidder')}}" method="post" class="col s12" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row">
									<div class="input-field col s12">
										<i class="material-icons prefix green-text">face</i>
										<input type="text" name="nombre" id="nombre" placeholder="Nombre" class="validate" value="{{$bidder->name}}">
										<label for="nombre">Nombre</label>
									</div>
									<div class="input-field col s12">
										<i class="material-icons prefix green-text">email</i>
										<input type="email" name="correo" id="correo" placeholder="Correo" class="validate" value="{{$bidder->email}}">
										<label for="nombre">Correo</label>
									</div>
									<div class="input-field col s12">
										<i class="material-icons prefix green-text">assignment_ind</i>
										@if($bidder->status == 'Aprobado')
											<input type="text" name="ruc" id="ruc" placeholder="Ruc" class="validate" readonly="readonly" value="{{$bidder->ruc}}">
										@else
											<input type="text" name="ruc" id="ruc" placeholder="Ruc" class="validate" value="{{$bidder->ruc}}" onkeypress="return controltagNum(event)">
										@endif
										<label for="ruc">(RUC) Registro Único de Contribuyente</label>
									</div>
									@if($bidder->status == 'Pre-Aprobado' || $bidder->status == 'Denegado')
										<div class="file-field input-field col s12">
											<label for="img_doc" class="control-label">Cargar imagen de RUC</label>
											<br><br>
											<div id="mensajeDocumento"></div>
											<div class="btn amber">
												<span>seleccione<i class="material-icons right">assignment_ind</i></span>
												<input type="file" name="adj_ruc" id="adj_ruc" accept="image/*,.pdf" placeholder="Cargar RUC">
											</div>
											<div class="file-path-wrapper">
												<input class="file-path validate" type="text">
											</div>
											<div id="mensajeImgDoc" style="display: none;"></div>
										</div>
									@endif
									<div  class="col m12">
	                                    @if ($bidder->imagen_ruc && pathinfo($bidder->imagen_ruc, PATHINFO_EXTENSION) != 'pdf')
	                                        <img id="preview_img_doc" src="{{asset($bidder->imagen_ruc)}}" name='ci' alt="your image" width="180" height="180" class="materialboxed"/>
	                                    @elseif (pathinfo($bidder->imagen_ruc, PATHINFO_EXTENSION) == 'pdf')
	                                        <object id="pdfruc" data="{{asset($bidder->imagen_ruc)}}" class="text-center" type="application/pdf" align="center" width="380" height="180"></object>
	                                        <br>
	                                    @else
	                                        <img id="preview_img_doc" name='ci'/>
	                                        <object id="pdfruc" class="text-center" type="application/pdf" align="center" width="380" height="180"></object>
	                                    @endif
	                                </div>
	                                <div class="input-field col s12">
										<i class="material-icons prefix green-text">navigation</i>
										<input type="text" name="direccion" id="direccion" placeholder="Dirección" class="validate" value="{{$bidder->address}}">
										<label for="direccion">Dirección</label>
									</div>
									<div class="input-field col s12">
										<i class="material-icons prefix green-text">local_phone</i>
										<input type="tel" name="telefono" id="telefono" placeholder="Teléfono" class="validate" value="{{$bidder->phone}}" onkeypress="return controltagNum(event)" maxlength="15">
										<label for="telefono">Teléfono</label>
									</div>
									<div class="input-field col s12">
										<input type="submit" id="actualizar" value="Actualizar" class="btn curvaBoton green">
									</div>
								</div>
							</form>
						</div>
            		</ul>
            	</div>
            	<div class="col s12 l4">
            		<div id="profile-card" class="card">
            			<div class="card-image waves-block green" style="height: 65px; padding-top: 9px">
                            <span class="collection-header center" style="color:white;">Opciones de cuenta</span>
                        </div>
                        <div class="card-content">
                        	<p><i class="mdi-communication-email cyan-text text-darken-2"></i></p>
                        	<div style="text-align: left;"> 
                        		<ul>
                        			<blockquote>
                        				<i class="material-icons prefix green-text">edit</i>
                        				<a class="modal-trigger green-text" href="#modal1">CAMBIAR CONTRASEÑA</a>
                        			</blockquote>
                        		</ul>
                        		<ul>
                        			<blockquote>
                        				<i class="material-icons prefix green-text">delete_forever</i>
                        				<a class="modal-trigger green-text" href="#modal2">ELIMINAR CUENTA</a>
                        			</blockquote>
                        		</ul>
                        	</div>
                        </div>
                    </div>
            	</div>
            </div>
        </div>
    </div>
    <div id="modal1" class="modal">
    	<div class="modal-content">
    		<div style="text-align: center;">
    			<div class="card-image waves-block green" style="padding-top: 2%">
    				<span class="center" style="color:white; font-size: 2.0rem; font-weight: 500;">Cambiar contraseña</span>
    			</div>
    		</div>
    		<div class="card-content" style="padding: 0% 5%">
    			<form action="{{url('cambiarClaveBidder')}}" method="post">
    				{{ csrf_field() }}
    				<input type="hidden" name="claveReal" value="{{$bidder->password}}">
    				<div class="row">
    					<div class="input-field col s11">
    						<i class="material-icons prefix green-text">edit</i>
    						<label for="nombre">Clave actual</label>
    						<input type="password" name="claveActual" id="claveActual" placeholder="Clave actual" class="validate">
    						<div id="msnClaveActual" style="margin-top: 1%"></div>
	    				</div>
	    				<div class="input-field col-s1">
	    					<i class="material-icons prefix green-text" id="1" onclick="mostrarContrasena('claveActual',1)">visibility_off</i>
	    				</div>
	    			</div>
	    			<div class="row">
	    				<div class="input-field col s11">
    						<i class="material-icons prefix green-text">edit</i>
    						<input type="password" name="claveNueva" id="claveNueva" placeholder="Clave nueva" class="validate">
    						<label for="nombre">Clave nueva</label>
    						<div id="msnclaveNueva" style="margin-top: 1%"></div>
	    				</div>
	    				<div class="input-field col-s1">
	    					<i class="material-icons prefix green-text" id="2" onclick="mostrarContrasena('claveNueva',2)">visibility_off</i>
	    				</div>
	    			</div>
	    			<div class="row">
	    				<div class="input-field col s11">
    						<i class="material-icons prefix green-text">edit</i>
    						<input type="password" name="claveNuevaConfir" id="claveNuevaConfir" placeholder="Confirmar clave nueva" class="validate">
    						<label for="nombre">Confirmar clave nueva</label>
    						<div id="msnclaveNuevaConfir" style="margin-top: 1%"></div>
	    				</div>
	    				<div class="input-field col-s1">
	    					<i class="material-icons prefix green-text" id="3" onclick="mostrarContrasena('claveNuevaConfir',3)">visibility_off</i>
	    				</div>
    				</div>
    				<div class="col-s12">
    					<input type="submit" value="Cambiar" class="btn curvaBoton green" id="cambiarClave">
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    <div id="modal2" class="modal">
    	<div class="modal-content">
    		<div style="text-align: center;">
    			<div class="card-image waves-block green" style="padding-top: 2%">
    				<span class="center" style="color:white; font-size: 2.0rem; font-weight: 500;">Eliminar cuenta</span>
    			</div>
    		</div>
    		<div class="card-content" style="text-align: center; padding: 2% 5%">
    			<label>
    				<h6>
    					<span class="card-title"></span>

    					<h5 class="card-title">¿Desea eliminar su cuenta en Leipel? 
    						<br><br>
    						Esta acción inhabilitará su cuenta permanentemente y no podrá ingresar de nuevo con ella.
    					</h5>
    				</h6>
    			</label>
    			<br>
    			<div style="text-align: center">
    				<a class="btn green curvaBoton" id="deleteAccount">Si, Estoy Seguro</a>
    				<a href="#" class="btn green curvaBoton modal-close">Regresar</a>
    			</div>
    		</div>
    	</div>
    </div>
@endsection
@section('js')
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">

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

        function controltagNum(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[0-9]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }

        function mostrarContrasena(id,elemt) {
        	var campo = $("#"+id);
        	if(campo.attr('type') == "password"){
        		campo.attr('type','text');
        		$("#"+elemt).text('visibility');
        	} else {
        		campo.attr('type','password');
        		$("#"+elemt).text('visibility_off');
        	}
        	campo.focus();
        }

		$(document).ready(function(){

			$('.materialboxed').materialbox();

            $('#adj_ruc').change(function(){
                var img_doc = $('#adj_ruc').val();
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

        	$('#avatarImage').on('click', function () {
        		$('#avatarInput').click();
        	});

        	$('#avatarInput').on('change', function () {
        		var img_perfil = $('#avatarInput').val();
        		var extension = img_perfil.substring(img_perfil.lastIndexOf("."));
        		if (extension==".png" || extension==".jpg" || extension==".jpeg") {
        			$('#actualizarImagenPerfil').click();
        		} else {
        			$('#mensajeImgPerfil').show();
                    $('#mensajeImgPerfil').text('La imagen debe estar en formato jpeg, jpg o png');
                    $('#mensajeImgPerfil').css('color','red');
        		}
        	});

        	$('#claveActual').keyup(function(evento){
	            var password = $('#claveActual').val().trim();

	            if (password.length==0) {
	                $('#msnClaveActual').show();
	                $('#msnClaveActual').text('El campo no debe estar vacio');
	                $('#msnClaveActual').css('color','red');
	                $('#msnClaveActual').css('font-size','100%');
	                $('#cambiarClave').attr('disabled',true);
	            }
	            if (password.length < 5) {
	                $('#msnClaveActual').show();
	                $('#msnClaveActual').text('Su contaseña actual debe tener al menos 5 caracteres');
	                $('#msnClaveActual').css('color','red');
	                $('#msnClaveActual').css('font-size','100%');
	                $('#cambiarClave').attr('disabled',true);
	            } else {
	                $('#msnClaveActual').hide();
	            }
	            var valClaveActual = $('#msnClaveActual').is(':hidden');
	            var valClaveNueva = $('#msnclaveNueva').is(':hidden');
	            var valClaveNuevaConfir = $('#msnclaveNuevaConfir').is(':hidden');
                if (valClaveActual && valClaveNueva && valClaveNuevaConfir){
                    $('#cambiarClave').attr('disabled',false);
                }
	        });

	        $('#claveNueva').keyup(function(evento){
	            var password = $('#claveNueva').val().trim();

	            if (password.length==0) {
	                $('#msnclaveNueva').show();
	                $('#msnclaveNueva').text('El campo no debe estar vacio');
	                $('#msnclaveNueva').css('color','red');
	                $('#msnclaveNueva').css('font-size','100%');
	                $('#cambiarClave').attr('disabled',true);
	            }
	            if (password.length < 5) {
	                $('#msnclaveNueva').show();
	                $('#msnclaveNueva').text('Su contaseña actual debe tener al menos 5 caracteres');
	                $('#msnclaveNueva').css('color','red');
	                $('#msnclaveNueva').css('font-size','100%');
	                $('#cambiarClave').attr('disabled',true);
	            } else {
	                $('#msnclaveNueva').hide();
	            }
	            var valClaveActual = $('#msnClaveActual').is(':hidden');
	            var valClaveNueva = $('#msnclaveNueva').is(':hidden');
	            var valClaveNuevaConfir = $('#msnclaveNuevaConfir').is(':hidden');
                if (valClaveActual && valClaveNueva && valClaveNuevaConfir){
                    $('#cambiarClave').attr('disabled',false);
                }
	        });

	        $('#claveNuevaConfir').keyup(function(evento){
	            var password1 = $('#claveNueva').val();
	            var password = $('#claveNuevaConfir').val();

	            if (password != password1) {
	                $('#msnclaveNuevaConfir').show();
	                $('#msnclaveNuevaConfir').text('Ambas contraseña deben coincidir');
	                $('#msnclaveNuevaConfir').css('color','red');
	                $('#msnclaveNuevaConfir').css('font-size','100%');
	                $('#cambiarClave').attr('disabled',true);
	            } else {
	                $('#msnclaveNuevaConfir').hide();
	            }
	            var valClaveActual = $('#msnClaveActual').is(':hidden');
	            var valClaveNueva = $('#msnclaveNueva').is(':hidden');
	            var valClaveNuevaConfir = $('#msnclaveNuevaConfir').is(':hidden');
                if (valClaveActual && valClaveNueva && valClaveNuevaConfir){
                    $('#cambiarClave').attr('disabled',false);
                }
	        });

	        $(document).on('click', '#deleteAccount', function(e) {
	        	var gif = "{{ asset('/sistem_images/loading.gif') }}";
				swal({
					title: "Procesando la información",
					text: "Espere mientras se procesa la información.",
					icon: gif,
					buttons: false,
					closeOnEsc: false,
					closeOnClickOutside: false
				});
				e.preventDefault();
				setTimeout(function() {
					location.href = "{!!url('DeleteAccountBidder')!!}";
				},3000);
	        });
        });
	</script>
@endsection