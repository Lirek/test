@extends('promoter.layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('main')
	<span class="card-title grey-text"><h3>Películas</h3></span>
	<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		<li class="tab" id="Revision"><a class="active" href="#test1">Películas pendientes</a></li>
		<li class="tab" id="Aprobado"><a href="#test2">Películas aprobadas</a></li>
		<li class="tab" id="Negado"><a href="#test3">Películas rechazadas</a></li>
	</ul>
	<table class="responsive-table">
		<thead>
			<tr>
				<th><i class="material-icons"></i>Autor</th>
				<th><i class="material-icons"></i>Portada</th>
				<th><i class="material-icons"></i>Nombre</th>
				<th><i class="material-icons"></i>Sinopsis</th>
				<th><i class="material-icons"></i>Categoría</th>
				<th><i class="material-icons"></i>Géneros</th>
				<th><i class="material-icons"></i>Fecha de registro</th>
				<th><i class="material-icons"></i>Costo en Tickets</th>
				<th><i class="material-icons"></i>Estatus</th>
			</tr>
		</thead>
		<tbody id="table">
		</tbody>
	</table>
@include('promoter.modals.MoviesViewModal')
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>

	<script>

	  $(document).ready(function(){
	    $('.modal').modal();
	  });

	function listado(status) {
			$("#table").empty();
			var parametros = status;
			var ruta = "{{url('MoviesDataTable')}}"+"/"+parametros;
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
						var etiqueta = "";
						$.each(info.tags_movie,function(i,infoTags){
							etiqueta = etiqueta+"<span class='new badge grey darken-1' data-badge-caption='"+infoTags.tags_name+"' style='padding:0px 0px'></span>"; 
						});
						if (info.img_poster!=0 ) {
							var portada = 
							"<img class='materialboxed' width='150' height='120' src='{!! asset('movie/poster/"+info.img_poster+"') !!}'"
							var infor = "<button href='#movieView' class='modal-trigger' value='"+info.id+"' id='viewMovie' style='display:inline; text-decoration:underline; background:none; background:none;border:0; padding:0; margin:0;'> Ver más información </button>";
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
				        	var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button><button class="btn modal-trigger curvaBoton" value='+info.id+' value2="En Revision" href="#negado" id="denegado">ver negaciones</button>'
				        }
				        
						var filas = "<tr><td>"+
						info.seller.name+"</td><td>"+
						portada+"<br>"+infor+"</td><td>"+
						info.title+"</td><td>"+
						info.based_on+"</td><td>"+
						info.rating.r_name+"</td><td>"+
						etiqueta+"</td><td>"+
						moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+"</td><td>"+
						info.cost+"</td><td>"+
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
		$(document).on('click','#Revision', function() {
			listado("En Proceso");
		});
		$(document).on('click','#Aprobado', function() {
			listado("Aprobado");
		});
		$(document).on('click','#Negado', function() {
			listado("Denegado");
		});

// Modificar el estatus de la pelicula
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
      var url = "{{url('/admin_movie')}}/"+x;
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
  // Modificar el estatus de la pelicula

  // ver mas detalles de la pelicula
		$(document).on('click','#viewMovie', function() {
			const player = new Plyr('#player');
			var idMovie = $(this).val();
			console.log(idMovie);
			var url = "{{ url('/viewMovie/') }}/"+idMovie;
			$.ajax({
				url: url,
				type: 'get',
				dataType: 'json', 
				success: function (result) {
					console.log(result);
					var rutaPelicula = "{{ asset('/') }}movie/film/"+result.duration;
					var rutaPoster = "{{ asset('/') }}movie/poster/"+result.img_poster;
					$("video").attr('poster',rutaPoster);
					$("video").attr('src',rutaPelicula);
					$("#nombrePelicula").text(result.title);
					$("#nombreOriginalPelicula").text(result.original_title);
					$("#añoPublicacion").text(result.release_year);
					$("#trailer").attr('href',result.trailer_url);
					$("#trailer").text(result.trailer_url);
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
		// ver mas detalles de la pelicula

		// Listar las negaciones
		$(document).on('click', '#denegado', function(e) {
			var id = $(this).attr("value");
			var modulo = "Movies";
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