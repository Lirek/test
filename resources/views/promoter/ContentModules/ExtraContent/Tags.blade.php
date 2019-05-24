@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Etiquetas</h3></span>
	<a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar etiqueta" href="#NewTag">
        <i class="material-icons">add</i>
    </a>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnProceso"><a class="active" href="#test1">En proceso</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="rechazados"><a href="#test2">Rechazados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th class="non-numeric">Nombre</th>
                    <th class="non-numeric">Tipo</th>
                    <th class="non-numeric">Registrada por</th>
                    <th class="non-numeric">Fecha de registro</th>
					<th class="non-numeric">Opciones</th>
                </tr>
            </thead>
            <tbody id="etiquetas">
            </tbody>
        </table>
    </div>
	@include('promoter.modals.TagsViewModal')
{{--
  <div class="row mt">
	<h2><i class="fa fa-angle-right"></i>Etiquetas</h2>
  </div>
  
  <div class="row mt">
    <div class="col-lg-12">
		<div class="content-panel">
			<table class="table table-bordered table-striped table-condensed" id="tags">            
				<thead>
		        <tr>
		          <th class="non-numeric">Nombre</th>
		          <th class="non-numeric">Tipo</th>
		          <th class="non-numeric">Registrada Por</th>
		          <th class="non-numeric">Fecha de Registro</th>
		          <th class="non-numeric">Estatus</th>
		        </tr>
		    	</thead>
			
			</table>
		</div>
	</div>

  </div>
--}}

@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>
		function etiquetas(status) {
			$("#etiquetas").empty();
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
                url: "{!! url('TagsData') !!}/"+status,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                    	if (info.seller_id!=null) {
                    		var proveedor = info.seller.name;
                    	} else {
                    		var proveedor = "Administrador";
                    	}
                    	if (info.created_at!=null) {
                    		var fecha = moment(info.created_at).format('DD/MM/YYYY h:mm:ss a');
                    	} else {
                    		var fecha = "Desde el origen de los tiempos."
                    	}
                    	var status = 
                       "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#StatusTags' id='status'>Cambiar</a><br>";
                        var edit = 
                        "<a class='btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton' value='"+info.id+"' id='editTags' href='#updateTags'>"+
                            "<i class='material-icons'>edit</i>"+
                        "</a>";
                        var eliminar = 
                        "<a class='btn-small waves-effect waves-light btn red curvaBoton' id='deleteTags' value='"+info.id+"'>"+
                            "<i class='material-icons'>delete</i>"+
                        "</a>";
                        var opciones = status+edit+eliminar;
                        if (info.status=="Denegado") {
                            opciones = opciones+"<br>"+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectTags'>Ver negaciones</a><br>";
                        }
                    	var filas = "<tr><td>"+
                        info.tags_name+"</td><td>"+
                        info.type_tags+"</td><td>"+
                        proveedor+"</td><td>"+
                        fecha+"</td><td>"+
                        opciones+"</td></tr>";
                        $("#etiquetas").append(filas);
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
    		etiquetas("En Proceso");
    		$('select').formSelect();
    	});
    	$(document).on('click', '#EnProceso', function() {
    		etiquetas("En Proceso");
    	});
    	$(document).on('click', '#aprobados', function() {
    		etiquetas("Aprobado");
    	});
    	$(document).on('click', '#rechazados', function() {
    		etiquetas("Denegado");
    	});

    	// funcion para cambiar el estatus de una etiqueta
    	$(document).on('click', '#status', function() {
    		var tag = $(this).attr("value");
    		console.log(tag);
    		$("#formStatus").on('submit', function(e){
    			var s = $("input[type='radio'][name=status]:checked").val();
    			var message = $('#razon').val();
    			var url = "{{url('AprobalDenialTag/')}}/"+tag;
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
                console.log(s,message,url);
    			$.ajax({
    				url:url,
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
    				error:function (result) {
    					console.log(result);
	    	 			swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
    				}
    			});
    		});
    	});
    	// funcion para cambiar el estatus de una etiqueta

    	// funcion para ver todas las negaciones de una etiqueta
        $(document).on('click', '#rejectTags', function(e) {
            var idTags = $(this).attr("value");
            console.log(idTags);
            var modulo = "Tags";
            var url = "{!! url('viewRejection/"+idTags+"/"+modulo+"') !!}";
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
        // funcion para ver todas las negaciones de una etiqueta

        // funcion para agregar una nueva etiqueta
        $("#newTag").on('submit', function(e){
        	var tipo = $("#tipo").val();
        	var nombre = $('#nombre').val();
        	var url = "{{url('newTag/')}}";
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
            console.log(tipo,nombre,url);
			$.ajax({
				url:url,
				type: 'post',
				data: {
					_token: $('input[name=_token]').val(),
					tags_name: nombre,
					type_tags: tipo
				},
				success: function (result) {
					console.log(result);
                    swal('Se ha agregado '+nombre+' con exito','','success')
                    .then((recarga) => {
                        location.reload();
                    });
				},
				error:function (result) {
					console.log(result);
    	 			swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
				}
			});
		});
		// funcion para agregar una nueva etiqueta

		// funcion para editar las etiquetas
        $(document).on('click', '#editTags', function() {
            var idTag = $(this).attr("value");
            console.log(idTag);
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
                url : "{{url('editTag/')}}/"+idTag,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    swal.close();
                    console.log(data);
                    $("#idTag").val(data.id);
                    $("#nombre_u").val(data.tags_name);
                    $("#modulo_a").val(data.type_tags);
                    $("#modulo_a").text(data.type_tags);
                    $('select').formSelect();
                },
                error: function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });
        // funcion para editar las etiquetas

        // funcion para editar una etiqueta
        $("#updateTag").on('submit', function(e){
        	var tipo = $("#tipo_u").val();
        	var nombre = $('#nombre_u').val();
        	var idTag = $('#idTag').val();
        	var url = "{{url('updateTag/')}}";
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
            console.log(tipo,nombre,url,idTag);
			$.ajax({
				url:url,
				type: 'post',
				data: {
					_token: $('input[name=_token]').val(),
					idTag: idTag,
					tags_name: nombre,
					type_tags: tipo
				},
				success: function (result) {
					console.log(result);
                    swal('Se ha editado '+nombre+' con exito','','success')
                    .then((recarga) => {
                        location.reload();
                    });
				},
				error:function (result) {
					console.log(result);
    	 			swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
				}
			});
		});
		// funcion para editar una etiqueta

		// funcion para eliminar las etiquetas
        $(document).on('click', '#deleteTags', function() {
            var etiqueta = $(this).attr("value");
            console.log(etiqueta);
            swal({
                title: "¿Desea realmente eliminar la etiqueta?",
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
                    var url = "{{url('deleteTags')}}/"+etiqueta;
                    $.ajax({
                        url: url,
                        type:'get',
                        dataType:"json",
                        success: function(data) {
                            console.log(data);
                            swal('Eliminada exitosamente','','success')
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
        // funcion para eliminar las etiquetas
</script>
@endsection