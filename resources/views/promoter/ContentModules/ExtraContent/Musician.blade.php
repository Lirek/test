@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Músicos y Agrupaciones musicales</h3></span>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnProceso"><a class="active" href="#test1">En revisión</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="rechazados"><a href="#test2">Rechazados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th class="non-numeric">Nombre</th>
					<th class="non-numeric">Foto</th>
					<th class="non-numeric">Tipo</th>
					<th class="non-numeric">País</th>
					<th class="non-numeric">Descripción</th>
					<th class="non-numeric">Proveedor</th>
					<th class="non-numeric">Redes Sociales</th>
					<th class="non-numeric">Opciones</th>
                </tr>
            </thead>
            <tbody id="musicos">
            </tbody>
        </table>
    </div>
	@include('promoter.modals.MusicianViewModal')
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>
		function musicos(status) {
			$("#musicos").empty();
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
                url: "{!! url('MusicianData') !!}/"+status,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                    	if (info.photo!=null) {
                    		var foto = 
                    		"<img class='materialboxed' src='{!!asset('"+info.photo+"')!!}' style='width:70px;height:70px;' alt=Foto>";
                    	} else {
                    		var foto = "No tiene foto registrada";
                    	}
                    	if (info.seller_id!=null) {
                    		var proveedor = info.seller.name;
                    	} else {
                    		var proveedor = "No tiene proveedor";
                    	}
                    	var redes = "";
                    	if (info.facebook!=null) {
                            var facebook = 
                            "<a href="+info.facebook+" class='btn-floating blue darken-4' target='_blank'>"+
                                "<i class='mdi mdi-facebook'></i>"+
                            "</a>";
                            redes = redes+facebook;
                        }
                        if (info.google!=null) {
                            var youtube =
                            "<a href="+info.google+" class='btn-floating red accent-4' target='_blank'>"+
                                "<i class='mdi mdi-youtube'></i>"+
                            "</a>";
                            redes = redes+youtube;
                        }
                        if (info.twitter!=null) {
                            var twitter = 
                            "<a href="+info.twitter+" class='btn-floating blue lighten-2' target='_blank'>"+
                                "<i class='mdi mdi-twitter'></i>"+
                            "</a>";
                            redes = redes+twitter;
                        }
                        if (info.instagram!=null) {
                            var instagram = 
                            "<a href="+info.instagram+" class='btn-floating purple-gradient' target='_blank'>"+
                                "<i class='mdi mdi-instagram'></i>"+
                            "</a>";
                            redes = redes+instagram;
                        }
                        if (redes=="") {
                            redes = "No tiene enlaces registrados";
                        }
                        var opciones = 
                       "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#MusicianModal' id='Status'>Cambiar</a><br>";
                        if (info.status=="Denegado") {
                            opciones = opciones+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectAuthorMusic'>Ver negaciones</a><br>";
                        }
                    	var filas = "<tr><td>"+
                        info.name+"</td><td>"+
                        foto+"</td><td>"+
                        info.type_authors+"</td><td>"+
                        info.country+"</td><td>"+
                        info.descripcion+"</td><td>"+
                        proveedor+"</td><td>"+
                        redes+"</td><td>"+
                        opciones+"</td></tr>";
                        $("#musicos").append(filas);
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
			musicos("En Proceso");
		});
		$(document).on('click', '#EnProceso', function() {
			musicos("En Proceso");
		});
		$(document).on('click', '#aprobados', function() {
			musicos("Aprobado");
		});
		$(document).on('click', '#rechazados', function() {
			musicos("Denegado");
		});

	    $(document).on('click', '#Status', function() {
	    	var x = $(this).attr("value");
	    	$("#formStatus").on('submit', function(e) {
	    	 	var s = $("input[type='radio'][name=status]:checked").val();
	    	 	var message = $('#razon').val();
	    	 	var url = "{{url('admin_musician/')}}/"+x;
	    	 	console.log(s,url,message);
	    	 	e.preventDefault();
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
	    	 		url: url,
	    	 		type: 'post',
	    	 		data: {
	    	 			_token: $('input[name=_token]').val(),
	    	 			status: s,
	    	 			reason: message
	    	 		}, 
	    	 		success: function (result) {
	    	 			console.log(result);
                        swal('Se ha '+s+' con exito','','success')
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

	    // funcion para ver todas las negaciones de un artista
        $(document).on('click', '#rejectAuthorMusic', function(e) {
            var idMusico = $(this).attr("value");
            console.log(idMusico);
            var modulo = "Author Music";
            var url = "{!! url('viewRejection/"+idMusico+"/"+modulo+"') !!}";
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
        // funcion para ver todas las negaciones de un artista
</script>
@endsection