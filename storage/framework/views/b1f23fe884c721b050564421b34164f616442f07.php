<?php $__env->startSection('css'); ?>
    <style>
      .curvaBoton{border-radius: 20px;}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
	<span class="card-title grey-text"><h3>Usuarios libres</h3></span>
	<table class="responsive-table">
		<thead>
			<tr>
				<th class="non-numeric">Nombre</th>
				<th class="non-numeric">Correo</th>
				<th class="non-numeric">Puntos</th>
				<th class="non-numeric">Fecha de registro</th>
				<th class="non-numeric">Estatus</th>
				<th class="non-numeric">Asignar patrocinador</th>
			</tr>
		</thead>
		<tbody id="usuarios">
		</tbody>
	</table>
	<?php echo $__env->make('promoter.modals.AssingRefered', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
	function usuariosLibres() {
		$("#usuarios").empty();
		var ruta = "<?php echo e(url('UnReferedUserDataTable')); ?>";
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
			url: ruta,
			type:'GET',
			dataType: "json",
			success: function (data) {
				swal.close();
				console.log(data);
				$.each(data,function(i,info) {
					var puntos = 0;
					if (info.points!=null) {
						puntos = info.points;
					}
					var fecha = moment(info.created_at).format('DD/MM/YYYY hh:mm:ss a');
					var estatus = "";
					if (info.verify==0) {
						estatus = "No verificado";
					} else if (info.verify==1){
						estatus = "Verificado";
					} else {
						estatus = "Negado";
					}
					var asignar = "";
					if (info.user_refered.length!=0) {
						asignar = "Ya tiene patrocinador";
					} else {
						if (info.verify!=1) {
							asignar = "Debe apobar al usuario antes";
						} else {
						asignar =
						"<a class='btn green curvaBoton modal-trigger' value="+info.id+" href='#asignar' id='asignarPatrocinador'>Asignar</a>";
						}
					}
					var filas = "<tr><td>"+
					info.name+" "+info.last_name+"</td><td>"+
					info.email+"</td><td>"+
					puntos+"</td><td>"+
					fecha+"</td><td>"+
					estatus+"</td><td>"+
					asignar+"</td></tr>";
					$("#usuarios").append(filas);
				});
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
		$('.modal').modal();
		usuariosLibres();
		/*
		var UnRefered = $('#PubChain').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '<?php echo url('UnReferedUserDataTable'); ?>',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'email', name: 'email'},
	            {data: 'points', name: 'points'},
	            {data: 'created_at', name: 'created_at'},
	            {data: 'verify', name: 'verify'},
	            {data: 'assing', name: 'assing', orderable: false, searchable: false}
	        ]
	    });
	    */
	})
	$(document).on('click', '#asignarPatrocinador', function() {
		var idUser = $(this).attr('value');
		$("#idUser").val(idUser);
		$("#patrocinador").on('submit', function(e){
			var form = this;
			var cod = $('#codigo').val();
			e.preventDefault();
			$.ajax({
                url:"<?php echo e(url('valPatrocinador/')); ?>/"+cod+"/"+idUser,
                type: 'get',
                dataType: "json",
                beforeSend: function() {
                    var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
                    swal({
                        title: "¡Listo! Estamos validando su información...",
                        text: "Espere un momento por favor, mientras validamos el código de patrocinador.",
                        icon: gif,
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                },
                success: function (result) {
                    console.log(result);
                    if(result == 2) {
                        swal({
                            title: "Ingrese otro código por favor",
                            text: "El código que introdujo le pertecene a algún miembro de su propia red, por favor ingrese otro.",
                            icon: 'error',
                            buttons: {
                                accept: 'Aceptar'
                            },
                            closeOnEsc: false,
                            closeOnClickOutside: false
                        });
                        $('#patrocinador')[0].reset();
                    } else {
                        if(result == 1) {
                            swal({
                                title: "Ingrese otro código por favor",
                                text: "Disculpe, no puede ingresar su propio código",
                                icon: 'error',
                                buttons: {
                                    accept: 'Aceptar'
                                },
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            });
                            $('#patrocinador')[0].reset();
                        } else if (result.id != undefined) {
                            if (result.last_name != undefined) {
                                var nombre = result.name+" "+result.last_name;
                            } else {
                                var nombre = result.name;
                            }
                            swal({
                                text: "¿Esta ingresando como patrocinador a "+nombre+"?",
                                icon: 'info',
                                buttons: {
                                    accept: 'Aceptar',
                                    cancel: 'Cancelar'
                                },
                                dangerMode: true,
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    form.submit();
                                } else {
                                    $('#patrocinador')[0].reset();
                                }
                            });
                        }
                        else if(result == 0) {
                            swal({
                                title: "Ingrese otro código por favor",
                                text: "Disculpe, el código es incorrecto",
                                icon: 'error',
                                buttons: {
                                    accept: 'Aceptar'
                                },
                                closeOnEsc: false,
                                closeOnClickOutside: false
                            });
                            $('#patrocinador')[0].reset();
                        }
                    }
                }
            });
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>