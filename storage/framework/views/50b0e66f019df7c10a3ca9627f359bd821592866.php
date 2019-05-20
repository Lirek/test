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

    	.curvaBoton{border-radius: 20px;}
    </style>
<?php $__env->startSection('main'); ?>
	<span class="card-title grey-text"><h3>Productos</h3></span>
	<a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar producto" href="#NewProduct">
        <i class="material-icons">add</i>
    </a>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnRevision"><a class="active" href="#test1">En revisión</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="denegados"><a href="#test2">Denegados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>PDF</th>
                    <th>Ofertante</th>
                    <th>Costo</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="productos">
            </tbody>
        </table>
    </div>
    <?php echo $__env->make('promoter.modals.ProductsViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>
		function productos(estatus) {
			$("#productos").empty();
            var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
            swal({
            	title: "Procesando la información",
            	text: "Espere mientras se procesa la información.",
            	icon: gif,
            	buttons: false,
            	closeOnEsc: false,
            	closeOnClickOutside: false
            });
            $.ajax({
                url: "<?php echo url('dataProducts'); ?>/"+estatus,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                    	if (info.imagen_prod!=null) {
                    		var imagen_prod = 
                    		"<img class='materialboxed' src='<?php echo asset('"+info.imagen_prod+"'); ?>' style='width:70px;height:70px;' alt=imagen_prod>";
                    	} else {
                    		var imagen_prod = "No tiene imagen";
                    	}
                    	if (info.pdf_prod!=null) {
                    		var pdf_prod = 
                    		"<a class='btn-large blue' id='pdf_prod' href='<?php echo asset('"+info.pdf_prod+"'); ?>' target='_blank'>"+
                    			"<i class='material-icons left'>picture_as_pdf</i>"+
                    			"Ver PDF"+
                			"</a>"
                    	} else {
                    		var pdf_prod = "No tiene PDF";
                    	}
                		var status = 
                		"<a class='waves-effect waves-light btn modal-trigger curvaBoton blue' value='"+info.id+"' href='#cambiarEstatus' id='status'>Cambiar estatus</a><br>";
                    	if (info.bidder_id==0) {
                    		var bidder_id = "Administrador";
                    		var edit = 
                    		"<a class='btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton' value='"+info.id+"' id='editProduct' href='#updateProduct'>"+
	                            "<i class='material-icons'>edit</i>"+
	                        "</a>";
	                        var eliminar = 
	                        "<a class='btn-small waves-effect waves-light btn red curvaBoton' id='deleteProduct' value='"+info.id+"'>"+
                            	"<i class='material-icons'>delete</i>"+
                        	"</a><br>";
                        	status = status+edit+eliminar;
                    	}
                    	if (estatus=="Denegado") {
                    		status = status+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectProduct'>Ver negaciones</a><br>";
                    	}
	                    var filas = "<tr><td>"+
	                    info.name+"</td><td>"+
	                    imagen_prod+"</td><td>"+
	                    pdf_prod+"</td><td>"+
	                    bidder_id+"</td><td>"+
	                    info.cost+"</td><td>"+
	                    info.description+"</td><td>"+
	                    status+"</td></tr>";
	                    $("#productos").append(filas);
                    });
                    $('.materialboxed').materialbox();
                },
                error:function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                    console.log(data);
                }
            });
		}

		$(document).ready(function(){
			$('input.count').characterCounter();
			productos("En Revision");

            var agregar = $('.add_button');
            var wrapper = $('.agregar');
            agregar.click(function(){ 
                console.log('agregar');
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
		
		$(document).on('click', '#EnRevision', function() {
			productos("En Revision");
		});

		$(document).on('click', '#aprobados', function() {
			productos("Aprobado");
		});

		$(document).on('click', '#denegados', function() {
			productos("Denegado");
		});
		
		$(document).on('click', '#editProduct', function() {
			var producto = $(this).attr("value");
			var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
            swal({
                title: "Procesando la información",
                text: "Espere mientras se procesa la información.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
            $.ajax({
                url : "<?php echo e(url('infoProduct/')); ?>/"+producto,
                type: "GET",
                dataType: "json",
                success: function(data) {
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

		$(document).on('click', '#deleteProduct', function() {
			var producto = $(this).attr("value");
			swal({
                title: "¿Desea realmente eliminar el producto?",
                icon: "warning",
                dangerMode: true,
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
					var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
		            swal({
		                title: "Procesando la información",
		                text: "Espere mientras se procesa la información.",
		                icon: gif,
		                buttons: false,
		                closeOnEsc: false,
		                closeOnClickOutside: false
		            });
		            $.ajax({
		                url : "<?php echo e(url('deleteProduct/')); ?>/"+producto,
		                type: "GET",
		                dataType: "json",
		                success: function(data) {
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
		
		$(document).on('click', '#status', function() {
			var producto = $(this).attr("value");
			$("#formStatus").on('submit', function(e) {
				var s = $("input[type='radio'][name=status]:checked").val();
                var message = $('#razon').val();
                var url = "<?php echo e(url('statusProduct/')); ?>/"+producto;
                console.log(url,s,message);
                e.preventDefault();
                var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
                swal({
					title: "Procesando la información",
					text: "Espere mientras se procesa la información.",
					icon: gif,
					buttons: false,
					closeOnEsc: false,
					closeOnClickOutside: false
                });
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        _token: $('input[name=_token]').val(),
                        status: s,
                        reason: message
                    },
                    success: function (result) {
                        console.log(result);
                        swal('Producto '+s+' con exito','','success')
                        .then((recarga) => {
                            location.reload();
                        });
                    },
                    error: function (result) {
                        console.log(result);
                        swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
			});
		});

		$(document).on('click', '#rejectProduct', function(e) {
            var producto = $(this).attr("value");
            console.log(producto);
            var modulo = "Products";
            var url = "<?php echo url('viewRejection/"+producto+"/"+modulo+"'); ?>";
            console.log(url);
            $("#negaciones").empty();
            e.preventDefault();
            $.ajax({
                url: url, 
                type:'get', 
                dataType:'json',
                success: function(datos){
                    console.log(datos);
                    $('#totalNegaciones').show();
                    $('#totalNegaciones').text('Tiene un total de rechazos de: '+datos.length);
                    $.each(datos, function(i,info){
                        var fila = '<tr><td>'+
                        info.reason+'</td><td>'+
                        moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+'</td></tr>';
                        $('#negaciones').append(fila);
                    });
                },
                error: function (datos) {
                    console.log(datos);
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
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
                $(".otroCost").attr("required","required");
            } else {
                console.log("no");
                $("#otro").hide();
                $(".otroCost").removeAttr("required");
            }
        }
        function agregarHTML() {
            var nuevoHTML = 
            "<div class='col s12'>"+
                "<div class='col s6'>"+
                    "<div class='file-field input-field'>"+
                        "<div class='btn blue'>"+
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
                "<div class='col s6'>"+
                    "<div class='input-field'>"+
                        "<div class='btn blue'>"+
                            "<span>seleccione<i class='material-icons right'>insert_photo</i></span>"+
                            "<input type='file' accept='image/*' class='validate otraImagen' id='otraImagen' name='otraImagen[]' required='required' min='0' placeholder=' ' value='"+cost+"'>"+
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>