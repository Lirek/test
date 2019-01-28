<?php $__env->startSection('main'); ?>
	<span class="card-title grey-text"><h3>Series</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="Proceso"><a class="active" href="#test1">Series pendientes</a></li>
		<li class="tab" id="Aprobado"><a href="#test2">Series aprobadas</a></li>
		<li class="tab" id="Negado"><a href="#test3">Series rechazadas</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Autor</th>
				<th><i class="material-icons"></i>Portada</th>
				<th><i class="material-icons"></i>Nombre</th>
				<th><i class="material-icons"></i>Historia</th>
				<th><i class="material-icons"></i>Año de <br> publicación</th>
				<th><i class="material-icons"></i>Trailer</th>
				<th><i class="material-icons"></i>Costo en Tickets</th>
				<th><i class="material-icons"></i>Saga</th>
				<th><i class="material-icons"></i>Estado de <br> la serie</th>
				<th><i class="material-icons"></i>Estatus</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
<?php echo $__env->make('promoter.modals.SeriesViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('promoter.modals.SagasViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

	function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "<?php echo e(url('SeriesDataTable')); ?>"+"/"+parametros;
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
						
						if (info.cover!=0 ) {
							var portada = 
							"<img class='materialboxed' width='150' height='120' src='<?php echo asset('"+info.img_poster+"'); ?>'";
						} else {
							var portada = "No aplica ";
						}
						if (info.status=="En Proceso") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Proceso' href='#myModal' id='status'>"+info.status+"</button>"
				        }
						if (info.status=="Aprobado") {
				        	var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="Status">'+info.status+'</button>'
				        }
				        if (info.status=="Denegado") {
				        	var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button>'
				        }
				        if (info.trailer != null) {
				        	var trailer = "<a href='"+info.trailer+"'' class='btn curvaBoton' target='_blank'>Ver el trailer</a>"
				        } else {
							var trailer = "No aplica ";
						}
						if (info.saga_id != null) {
				            var saga = "<button href='#ModalSaga' class=' btn modal-trigger curvaBoton' value='"+info.saga_id+"' id='seller'>"+info.saga.sag_name+
							"</button>";
				            //$saga = $serie->saga->sag_name;

				            //<button value='"+info.saga_id+"' class='btn modal-trigger curvaBoton' href='#ModalSaga' id='saga'>"+info.saga.sag_name+"</button>"

				          } else {
				            var saga = "No tiene saga";
				          }

						var filas = "<tr><td>"+
						info.seller.name+"</td><td>"+
						portada+"</td><td>"+
						info.title+"</td><td>"+
						info.story+"</td><td>"+
						info.release_year+"</td><td>"+
						trailer+"</td><td>"+
						info.cost+"</td><td>"+
						saga+"</td><td>"+
						info.status_series+"</td><td>"+
						opcion+"</td></tr>";
						$("#table").append(filas);
					})
					$('.materialboxed').materialbox();
					$('.tooltipped').tooltip();
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
			listado("En Proceso");
		});
		$(document).on('click','#Proceso', function() {
			listado("En Proceso");
		});
		$(document).on('click','#Aprobado', function() {
			listado("Aprobado");
		});
		$(document).on('click','#Negado', function() {
			listado("Denegado");
		});


  // Modificar el estatus de la saga
  $(document).on('click','#status', function() {
    var x = $(this).attr("value");
    $("#FormStatus").on('submit', function(e){
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
      });
      var s = $("input[type='radio'][name=status]:checked").val();
      var message = $('#razon').val();
      var url = "<?php echo e(url('/admin_serie')); ?>/"+x;
      console.log(url);
      e.preventDefault(); 
      console.log(s);
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          _token: $('input[name=_token]').val(),
          status: s,
          message: message
        }, 
        success: function (result) {
          console.log(result);
          $('#myModal').toggle();
          $('.modal-backdrop').remove();
          swal("Se ha "+s+" con éxito","","success")
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
        },
      });
    });
  });
  // Modificar el estatus de la saga

  // mostrar informacion del proveedor
		$(document).on('click', '#seller', function() {
			var idSeller = $(this).val();
			var url = "<?php echo e(url('/sagaSerie/')); ?>/"+idSeller;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					if (result.logoSaga!=null) {	
						var logoSaga = "<?php echo e(asset('/')); ?>/"+result.logo;
						$("#logoSaga").attr('src',logoProveedor);
					} 
					if (result.rating_id == 1) {	
						$("#categoriaSaga").text('TP');
					}
					if (result.rating_id == 2) {	
						$("#categoriaSaga").text('12 años');
					}
					if (result.rating_id == 3) {	
						$("#categoriaSaga").text('15 años');
					}
					if (result.rating_id == 4) {	
						$("#categoriaSaga").text('18 años');
					} 

					$("#nombreSaga").text(result.sag_name);
					$("#statusSaga").text(result.status);
					$("#tipoSaga").text(result.type_saga);
					$("#descripcionSaga").text(result.sag_description);
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
		// mostrar informacion del proveedor

	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>