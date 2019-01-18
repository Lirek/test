<?php $__env->startSection('main'); ?>
	<span class="card-title grey-text"><h3>Canciones</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="Revision"><a class="active" href="#test1">En revision</a></li>
		<li class="tab" id="Aprobado"><a href="#test2">Aprobados</a></li>
		<li class="tab" id="Negado"><a href="#test3">Negados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Nombre de la canción</th>
				<th><i class="material-icons"></i>Autor</th>
				<th><i class="material-icons"></i>Duracion</th>
				<th><i class="material-icons"></i>Proveedor</th>
				<th><i class="material-icons"></i>Costo en Tickets</th>
				<th><i class="material-icons"></i>Archivo</th>
				<th><i class="material-icons"></i>Estatus</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
<?php echo $__env->make('promoter.modals.SinglesViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
			var ruta = "<?php echo e(url('SingleData')); ?>"+"/"+parametros;
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
						

						if (info.status=="En Revision") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button>"
				        }
						if (info.status=="Aprobado") {
				        	var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="Status">'+info.status+'</button>'
				        }
				        if (info.status=="Denegado") {
				        	var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button>'
				        }
				        if (info.song_file != 0) {
							var archivo = "<audio controls='' src='"+info.song_file+"'>"+
							"<source src='"+info.song_file+"' type='audio/mpeg'>"+
                        	"</audio>";
						}

						var filas = "<tr><td>"+
						info.song_name+"</td><td>"+
						info.autors.name+"</td><td>"+
						info.duration+"</td><td>"+
						info.seller.name+"</td><td>"+
						info.cost+"</td><td>"+
						archivo+"</td><td>"+
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
			listado("En Revision");
		});
		$(document).on('click','#Revision', function() {
			listado("En Revision");
		});
		$(document).on('click','#Aprobado', function() {
			listado("Aprobado");
		});
		$(document).on('click','#Negado', function() {
			listado("Denegado");
		});

  // Modificar el estatus de la cancion
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
      var url = "<?php echo e(url('/admin_singles')); ?>/"+x;
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
  // Modificar el estatus de la cancion
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>