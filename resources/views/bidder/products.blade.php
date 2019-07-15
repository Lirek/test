@extends('bidder.layouts')
<style>
	#image-preview {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #2b81af;
        border-radius: 10px;
    }

    #image-preview input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 80%;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
    
    #image-preview_u {
        width: 100%;
        height: 400px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #2b81af;
        border-radius: 10px;
    }

    #image-preview_u input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    #image-preview_u label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 80%;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }

    #img_formato {
        height: 60%;
        width: 100%;
        position: absolute;
        z-index:-1;
    }

</style>
@section('content')
	<h4 class="titelgeneral"><i class="material-icons small">shopping_basket</i> Mis productos</h4>
	<a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar producto" href="#NewProduct">
        <i class="material-icons">add</i>
    </a>
    <br>
    @if($products->count()!=0)
    	@foreach($products as $product)
    		<div  class="col m3 s12 ">
              <div class="card medium">
                <div class="card-image">
                  <div class="slider">
                    <ul class="slides">    
                      @for ($i=0; $i < count($product->saveImg); $i++) 
                        <li>
                          <img id="img_formato" src="{{ asset($product->saveImg[$i]->imagen_prod) }}">
                        </li>
                      @endfor
                    </ul>
                  </div>
                  </div>
    				<a class="btn-floating halfway-fab activator btn-small waves-effect waves-light green"><i class="material-icons">arrow_upward</i></a>
    				<b>Nombre: </b>{{ $product->name }}
					<br>
					<b>Costo: </b> {{ceil($product->cost*$costo->costo)}} <small> Puntos.</small>
    				<div class="card-content">
    					<div class="card-action">
    						<a class="btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton" value="{{ $product->id }}" id="editProduct" href="#updateProduct">
	                            <i class="material-icons left">edit</i> Editar
	                        </a>
	                        <a class="btn-small waves-effect waves-light btn red curvaBoton" value="{{ $product->id }}" id="deleteProduct">
	                            <i class="material-icons left">delete</i> Eliminar
	                        </a>
	    				</div>
    				</div>
    				<div class="card-reveal">
    					<span class="card-title">
    						<i class="material-icons green-text right">arrow_downward</i>
    					</span>
    					<div style="text-align: left">
    						<br>
	    					<b>Nombre: </b>{{ $product->name }}
							<br>
							<b>Descripción: </b>{{ $product->description }}
							<br>
							<b>Costo: </b>{{ceil($product->cost*$costo->costo)}}
							<br>
							<b>Cantidad: </b>{{ $product->amount }}
							<br>
							<b>Estatus: </b> {{ $product->status }}
    					</div>
						<br><br>
    					<a href="{{asset($product->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton">
    						<i class="material-icons left">picture_as_pdf</i>
    						pdf
    					</a>
    				</div>
    			</div>
    		</div>
    	@endforeach
    @else
    	<div class="col s12">
    		<br><br>
    		<blockquote>
    			<i class="material-icons fixed-width large grey-text">sentiment_very_dissatisfied</i>
    			<br>
    			<h5 class="blue-text text-darken-2">No posee productos</h5>
    		</blockquote>
    	</div>
    @endif
    <!-- Nuevo producto -->
    <div class="modal fade" id="NewProduct">
		<div class="modal-content">
			<div class="col s12 amber lighten-1 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Agregue un producto</h4>
			</div>
			<div style="margin-top: -15px">
				<div class="text-center row">
					<form method="POST" id="NewRadioForm" action="{{url('productStore')}}" enctype="multipart/form-data" class="form-horizontal style-form" role="form">
						{{ csrf_field() }}
						<input type="hidden" name="idBidder" value="{{ Auth::guard('bidder')->user()->id }}">
						<div class="col s12">
							<div class="col s6">
                                <div id="otro">
                                    <div class="agregar">
                                        <div class="file-field input-field">
                                            <div class="btn amber">
                                                <span>seleccione<i class="material-icons right">insert_photo</i></span>
                                                <input type="file" accept="image/*" class="validate" id="otraImagen" name="otraImagen[]">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <br>
                                    <br>
                                    </div>
                                    <a class="btn curvaBoton waves-effect waves-light green add_button" id="btnAdd" style="margin-top: 25%;">
                                        <i class="material-icons"></i>Agregar otra imagen
                                    </a>
                                </div>
                            </div>
                                <div class="col s6">
								<div class="input-field">
									<input type="text" class="validate count" id="name" name="name" required="required" autofocus="autofocus" data-length="191">
									<label for="name">Nombre del producto</label>
								</div>
								<div class="input-field">
									<input type="text" class="validate count" id="description" name="description" required="required"  data-length="191">
									<label for="description">Descripción</label>
								</div>
								<div class="input-field">
									<input type="number" class="validate" id="cost" name="cost" required="required" min="0" onkeypress="return controltagNum(event)">
									<label for="cost">Costo</label>
								</div>
								<div class="input-field">
									<input type="number" class="validate" id="amount" name="amount" required="required" min="1" onkeypress="return controltagNum(event)">
									<label for="amount">Cantidad</label>
								</div>
								<div class="file-field input-field">
									<div class="btn amber">
										<span>seleccione<i class="material-icons right">picture_as_pdf</i></span>
										<input type="file" accept=".pdf" name="pdf_prod" id="pdf_prod" required="required" class="validate">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
								<br>
								
									<div class="col 12">
										
									</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12">
							<button class="btn curvaBoton" type="submit" id="enviar">
								Enviar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Nuevo producto -->
	<!-- Actualizar producto -->
	<div class="modal fade" id="updateProduct">
		<div class="modal-content">
			<div class="col s12 amber lighten-1 text-center">
				<h4 class="white-text" style="padding: 25px 0px">Modifique el producto</h4>
			</div>
			<div style="margin-top: -15px">
				<div class="text-center row">
					<form method="POST" id="NewRadioForm" action="{{url('productUpdate')}}" enctype="multipart/form-data" class="form-horizontal style-form" role="form">
						{{ csrf_field() }}
						<input type="hidden" id="idUpdate" value="" name="idUpdate">
						<div class="col s6">
                            <table class="responsive-table" id="todasLasfotos">
                                <thead>
                                  <tr>
                                    <th><i class="material-icons"></i>Foto</th>
                                  </tr>
                                </thead>
                                <tbody id="fotostabla">
                                </tbody>
                            </table>
                                <div id="otro">
                                    <div class="agregar">
                                        <div class="file-field input-field">
                                            <div class="btn amber">
                                                <span>seleccione<i class="material-icons right">insert_photo</i></span>
                                                <input type="file" accept="image/*" class="validate" id="otraImagen" name="otraImagen[]">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    <br>
                                    <br>
                                    </div>
                                    <a class="btn curvaBoton waves-effect waves-light green add_button" id="btnAdd" style="margin-top: 25%;">
                                        <i class="material-icons"></i>Agregar otra imagen
                                    </a>
                                </div>
                            </div>
							<div class="col s6">
								<div class="input-field">
									<input type="text" class="count" id="name_u" name="name" value="" required="required" autofocus="autofocus" data-length="191" placeholder="">
									<label for="name">Nombre del producto</label>
								</div>
								<div class="input-field">
									<input type="text" class="count" id="description_u" name="description" value="" required="required" data-length="191" placeholder="">
									<label for="description">Descripción</label>
								</div>
								<div class="input-field">
									<input type="number" id="cost_u" name="cost" value="" required="required" min="0" placeholder="" onkeypress="return controltagNum(event)">
									<label for="cost">Costo</label>
								</div>
								<div class="input-field">
									<input type="number" id="amount_u" name="amount" value="" required="required" min="1" placeholder="" onkeypress="return controltagNum(event)">
									<label for="amount">Cantidad</label>
								</div>
								<a class='btn-large amber' id='pdf_prod_u' href='' target='_blank'>
									<i class='material-icons left'>picture_as_pdf</i>
									Ver PDF
								</a>
								<br>
								<small>Si no cambia el PDF se mantendrá el anterior</small>
								<div class="file-field input-field">
									<div class="btn amber">
										<span>Cambiar PDF<i class="material-icons right">picture_as_pdf</i></span>
										<input type="file" accept=".pdf" name="pdf_prod" id="pdf_prod" class="validate">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
								<div class="agregar_u">
								</div>
							</div>
						</div>
						<div class="col s12">
							<button class="btn curvaBoton" type="submit" id="enviar">
								Enviar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Actualizar producto -->
@endsection
@section('js')
	<script src="{{ asset('plugins/upload/jquery.uploadPreview.js') }}"></script>
	<script>

        $(document).ready(function(){
    $('.slider').slider();
  });

		function agregarHTML() {
            var nuevoHTML = 
            "<div class='col s12'>"+
                "<div class='col s6'>"+
                    "<div class='file-field input-field'>"+
                        "<div class='btn amber'>"+
                            "<span>seleccione<i class='material-icons right'>insert_photo</i></span>"+
                            "<input type='file' accept='image/*' class='validate otraImagen' id='otraImagen' name='otraImagen[]' required='required' min='0'>"+
                        "</div>"+
                        "<div class='file-path-wrapper'>"+
                            "<input class='file-path validate' type='text'>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
                "<div class='col s6'>"+
                    "<a class='btn waves-effect waves-light red curvaBoton eliminar' style='margin-top: 25%;'>"+
                        "<i class='material-icons'></i> Quitar"+
                    "</a>"+
                "</div>"+
            "</div>";
            return nuevoHTML;
        }

        function otrosHTML(id,cost) {
            var nuevoHTML = 
            "<div class='col s12'>"+
                "<div class='file-field input-field'>"+
                        "<div class='btn amber'>"+
                            "<span>seleccione<i class='material-icons right'>insert_photo</i></span>"+
                            "<input type='file' accept='image/*' class='validate otraImagen' id='otraImagen' name='otraImagen[]' required='required' min='0'>"+
                        "</div>"+
                        "<div class='file-path-wrapper'>"+
                            "<input class='file-path validate' type='text'>"+
                        "</div>"+
                    "</div>"+
                "</div>"+
                "<div class='col s6'>"+
                    "<a class='btn waves-effect waves-light red curvaBoton eliminar' value='"+id+"' style='margin-top: 25%;'>"+
                        "<i class='material-icons'></i> Quitar"+
                    "</a>"+
                "</div>"+
            "</div>";
            return nuevoHTML;
        }

        function controltagNum(e) {
	        tecla = (document.all) ? e.keyCode : e.which;
	        if (tecla==8) return true; // para la tecla de retroseso
	        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
	        else if (tecla==13) return true;
	        patron =/[0-9]/;// -> solo numeros
	        te = String.fromCharCode(tecla);
	        return patron.test(te);
	    }

		$(document).ready(function(){
			$('.tooltipped').tooltip();
			$('.materialboxed').materialbox();
			$('input.count').characterCounter();

			var agregar = $('.add_button');
            var wrapper = $('.agregar');
            agregar.click(function(){ 
                wrapper.append(agregarHTML());
            });

            var agregar_u = $('.add_button_u');
            var wrapper_u = $('.agregar_u');
            agregar_u.click(function(){ 
                wrapper_u.append(agregarHTML());
            });

            $(document).on('click','.eliminar', function(){
                var uno = $(this).parent('div');
                var dos = $(uno).parent('div');
                dos.remove();
            });
		});

        $(document).on('click', '#deleteProduct', function() {
            var id = $(this).attr("value");
            var url = "{{url('productDelete/')}}/"+id;
            swal({
                title: "¿Desea realmente eliminar este producto?",
                icon: "warning",
                dangerMode: true,
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
                    var gif = "{{ asset('/sistem_images/loading.gif') }}";
                    swal({
                        title: "Procesando la información",
                        text: "Espere mientras se procesa la información.",
                        icon: gif,
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                    $.ajax({
                        url : url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            swal('Eliminado exitosamente','','success')
                            .then((recarga) => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            console.log(data);
                            swal('Existe un error en su solicitud','','error')
                            .then((recarga) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });

		$(document).on('click', '#editProduct', function() {
			var producto = $(this).attr("value");
			var gif = "{{ asset('/sistem_images/loading.gif') }}";

            swal({
                title: "Procesando la información",
                text: "Espere mientras se procesa la información.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
            $.ajax({
                url : "{{url('productInfo/')}}/"+producto,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $("#fotostabla").empty();
                    swal.close();
                    $.each(data,function(i,info) {
                        console.log(data);
                        $("#idUpdate").val(producto);
                        $("#name_u").val(info.name);
                        $("#description_u").val(info.description);
                        $("#cost_u").val(info.cost);
                        $("#amount_u").val(info.amount);
                        $("#img_u").attr('src',info.imagen_prod);
                        $("#pdf_prod_u").attr('href',info.pdf_prod);
                        var wrapper = $('.agregar_u');
                        wrapper.empty();
                        if (info.sub_producto.length!=0) {
                            $.each(info.sub_producto,function(i,info) {
                                wrapper.append(otrosHTML(info.id,info.cost));
                            });
                        }
                            $.each(info.save_img, function(i,info){
                                console.log(info);
                                var boton = "<a class='btn light-blue lighten-1 curvaBoton' value="+info.id+" href='#reject' id='rejectPhoto'>Eliminar</a>";

                                if (info.imagen_prod ) {
                                    var portada = 
                                    "<img class='materialboxed' width='300' height='400' src='{!!asset('"+info.imagen_prod+"')!!}'<br>"+boton;
                                } 

                                var filas = "<tr><td>"+
                                portada+"</td></tr>";
                                $("#fotostabla").append(filas);
                            });
                    });
                },
                error: function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
		});

		$(document).on('click', '#rejectPhoto', function() {
			var id = $(this).attr("value");
			swal({
                title: "¿Desea realmente eliminar esta imagen?",
                icon: "warning",
                dangerMode: true,
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
					var gif = "{{ asset('/sistem_images/loading.gif') }}";
		            swal({
		                title: "Procesando la información",
		                text: "Espere mientras se procesa la información.",
		                icon: gif,
		                buttons: false,
		                closeOnEsc: false,
		                closeOnClickOutside: false
		            });
		            $.ajax({
		                url : "{{url('deletePicture/')}}/"+id,
		                type: "GET",
		                dataType: "json",
		                success: function(data) {
                            console.log(data);
		                	swal('Eliminado exitosamente','','success')
		                    .then((recarga) => {
		                        location.reload();
		                    });
		                },
		                error: function(data) {
		                    swal('Existe un error en su solicitud','','error')
		                    .then((recarga) => {
		                        location.reload();
		                    });
		                }
		            });
		        }
		    });
		});

		$('#name').keyup(function(evento){
			var cantidadMaxima = 191;
			var nombre = $("#name").val();
			if (nombre.length>cantidadMaxima) {
				$("#enviar").attr("disabled",true);
			} else {
				$("#enviar").attr("disabled",false);
			}
		});

		$('#description').keyup(function(evento){
			var cantidadMaxima = 191;
			var description = $("#description").val();
			if (description.length>cantidadMaxima) {
				$("#enviar").attr("disabled",true);
			} else {
				$("#enviar").attr("disabled",false);
			}
		});

        function check() {
            if ($("#opt-1").is(':checked')) {
                console.log("si");
                $("#otro").show();
                $(".otraImagen").attr("required","required");
            } else {
                console.log("no");
                $("#otro").hide();
                $(".otraImagen").removeAttr("required");
            }
        }

		// para que se vean las imagenes en los formularios
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });
         $.uploadPreview({
            input_field: "#image-upload_u",
            preview_box: "#image-preview_u",
            label_field: "#image-label_u"
        });
        // para que se vean las imagenes en los formularios
	</script>
@endsection