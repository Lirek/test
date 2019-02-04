@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Albums</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="Revision"><a class="active" href="#test1">En revision</a></li>
		<li class="tab" id="Aprobado"><a href="#test2">Aprobados</a></li>
		<li class="tab" id="Negado"><a href="#test3">Negados</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Nombre Del Album</th>
				<th><i class="material-icons"></i>Autor</th>
				<th><i class="material-icons"></i>Duracion</th>
				<th><i class="material-icons"></i>Proveedor</th>
				<th><i class="material-icons"></i>Portada</th>
				<th><i class="material-icons"></i>Costo en Tickets</th>
				<th><i class="material-icons"></i>Numero de Canciones</th>
				<th><i class="material-icons"></i>Estatus</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
@include('promoter.modals.AlbumsViewModal')
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

	function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "{{url('AlbumDataTable')}}"+"/"+parametros;
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
				url: ruta,
				type:'GET',
				dataType: "json",
				success: function (data) {
					swal.close();
					console.log(data);
					$.each(data,function(i,info) {
						
						if (info.cover!=0 ) {
							var portada = 
							"<img class='materialboxed' width='150' height='120' src='{!!asset('"+info.cover+"')!!}'";
						} else {
							var portada = "No aplica ";
						}
						if (info.status=="En Revision") {
				        	var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='En Revision' href='#negado' id='denegado'>ver negaciones</button>"
				        }
						if (info.status=="Aprobado") {
				        	var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="Status">'+info.status+'</button>'
				        }
				        if (info.status=="Denegado") {
				        	var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button><button class="btn modal-trigger curvaBoton" value='+info.id+' value2="En Revision" href="#negado" id="denegado">ver negaciones</button>'
				        }
				        if (info.songs) {
				        	var Canciones = '<button class="btn modal-trigger curvaBoton" value='+info.id+' href="#misCanciones" id="Canciones">'+info.songs.length+'</button>'
				        }

						var filas = "<tr><td>"+
						info.name_alb+"</td><td>"+
						info.autors.name+"</td><td>"+
						info.duration+"</td><td>"+
						info.seller.name+"</td><td>"+
						portada+"</td><td>"+
						info.cost+"</td><td>"+
						Canciones+"</td><td>"+
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

// Modificar el estatus
  $(document).on('click','#status', function() {
    var x = $(this).attr("value");
    $("#FormStatus").on('submit', function(e){
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
      var url = "{{url('/admin_album')}}/"+x;
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
  // Modificar el estatus 
  
  // Listar las canciones
		$(document).on('click', '#Canciones', function(e) {
			var id = $(this).attr("value");
			var url = "{{url('/admin_songs')}}/"+id;
			console.log(url);
			$("#cancion").empty();
				e.preventDefault();
				$.ajax({
					url: url, 
					type:'get', 
					dataType:'json',
					success: function(datos){
						console.log(datos);
						$('#totalCanciones').show();
						$('#totalCanciones').text('este album tiene: '+datos.length+' canciones.');

						if (datos.song_file != 0) {
							var archivo = "<audio controls='' src='"+datos.song_file+"'>"+
							"<source src='"+datos.song_file+"' type='audio/mpeg'>"+
                        "</audio>";
						}
						
						$.each(datos, function(i,info){
							var fila = "<tr><td>"+
							info.song_name+"</td><td>"+
							info.duration+"</td><td>"+
							archivo+
							"</td></tr>";
							$('#cancion').append(fila);
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
		// Listar las canciones

		// Listar las negaciones
		$(document).on('click', '#denegado', function(e) {
			var id = $(this).attr("value");
			var modulo = "Album";
			var url = "{!! url('viewRejection/"+id+"/"+modulo+"') !!}";
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
						$('#totalNegaciones').text('tiene un total de rechazos de: '+datos.length);
						$.each(datos, function(i,info){
							var fila = '<tr><td>'+
							info.reason+'</td><td>'+
							moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+
							'</td></tr>';
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
		// Listar las negaciones


	</script>
@endsection