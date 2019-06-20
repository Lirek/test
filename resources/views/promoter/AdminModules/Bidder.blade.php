@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Aliados</h3></span>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnRevision"><a class="active" href="#test1">En revisión</a></li>
        <li class="tab" id="preAprobado"><a class="active" href="#test1">Pre-Aprobados</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="denegados"><a href="#test2">Denegados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th id="ruc" style="display: none;">RUC</th>
                    <th id="logo" style="display: none;">Logo</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Categoría</th>
                    <th>Puntos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="ofertante">
            </tbody>
        </table>
    </div>
    @include('promoter.modals.BidderViewModal')
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
	<script>
		function ofertante(estatus) {
			$("#ofertante").empty();
            if (estatus=="En Revision") {
                $('#ruc').hide();
                $('#logo').hide();
            } else {
                $('#ruc').show();
                $('#logo').show();
            }
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
                url: "{!! url('bidderByStatus') !!}/"+estatus,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                        var agregar = "";
                        if (info.roles.length!=0) {
                            var modulos = "";
                            $.each(info.roles,function(i,infoRoles) {
                                modulos = modulos+
                                "<span class='new badge grey darken-1' data-badge-caption='"+infoRoles.name+"' style='padding:0px 0px'>"+
                                    "<i class='material-icons right' value1='"+infoRoles.id+"' value2='"+info.id+"' name='module' id='x' style='cursor:pointer'>cancel"+
                                    "</i>"+
                                "</span> ";
                            });
                        } else {
                            var modulos = info.description+" ";
                        }
                    	if (info.logo!=null) {
                    		var logo = 
                    		"<img class='materialboxed' src='{!!asset('"+info.logo+"')!!}' style='width:70px;height:70px;' alt=imagen_ruc>";
                    	} else {
                    		var logo = 
                    		"No tiene logo";
                    	}
                    	if (info.imagen_ruc!=null) {
                    		var ext = info.imagen_ruc.split('.').pop();
							if (ext.toLowerCase()=='pdf') {
								var ruc = 
								"<a class='waves-effect waves-light btn curvaBoton blue' href='{!!asset('"+info.imagen_ruc+"')!!}' target='_blank'>Ver RUC</a><br>"+info.ruc;
							} else {
                    			var ruc = 
                    			"<img class='materialboxed' src='{!!asset('"+info.imagen_ruc+"')!!}' style='width:70px;height:70px;' alt=imagen_ruc><br>"+info.ruc;
							}
                    	} else {
                            var ruc = "No tiene información de RUC<br>";
                        }
                    	var status = 
                		"<a class='waves-effect waves-light btn modal-trigger curvaBoton blue' value='"+info.id+"' href='#cambiarEstatus' id='status'>Cambiar estatus</a><br>";

                        if (estatus=="Pre-Aprobado") {
                           var status = 
                            "<a class='waves-effect waves-light btn modal-trigger curvaBoton blue' value2='"+info.id+"' href='#cambiarEstatus2' id='status2'>Cambiar estatus</a><br>";
                        }
                		if (estatus=="Denegado") {
                    		status = status+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectProduct'>Ver negaciones</a><br>";
                    	}
                        agregar = 
                        "<a class='btn-floating green modal-trigger' href='#ModalModules' value='"+info.id+"' id='add_module'>"+
                            "<i class='material-icons right' style='cursor:pointer'>add</i>"+
                        "</a>";
                        if (estatus!="Denegado") {
                            modulos = modulos + agregar;
                        }
                        var filas = "<tr><td>";
                        if (estatus!="En Revision") {
                            filas = filas+
                            ruc+"</td><td>"+
                            logo+"</td><td>";
                        }
                        filas = filas+
	                    info.name+"</td><td>"+
	                    info.email+"</td><td>"+
                        info.phone+"</td><td>"+
                        modulos+"</td><td>"+
	                    info.points+"</td><td>"+
	                    status+"</td></tr>";
	                    $("#ofertante").append(filas);
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
			ofertante("En Revision");
            $('select').formSelect();
		});

		$(document).on('click', '#EnRevision', function() {
			ofertante("En Revision");
		});

		$(document).on('click', '#aprobados', function() {
			ofertante("Aprobado");
		});

		$(document).on('click', '#preAprobado', function() {
			ofertante("Pre-Aprobado");
		});

		$(document).on('click', '#denegados', function() {
			ofertante("Denegado");
		});

		$(document).on('click', '#status', function() {
			var ofertante = $(this).attr("value");
			$("#formStatus").on('submit', function(e) {
				var s = $("input[type='radio'][name=status]:checked").val();
                var message = $('#razon').val();
                var url = "{{url('statusBidder/')}}/"+ofertante;
                console.log(url,s,message);
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
                        swal('Ofertante '+s+' con exito','','success')
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

        $(document).on('click', '#status2', function() {
            var ofertante = $(this).attr("value2");
            $("#formStatus2").on('submit', function(e) {
                var s = $("input[type='radio'][name=status2]:checked").val();
                var message = $('#razon').val();
                var url = "{{url('statusBidder/')}}/"+ofertante;
                console.log(url,s);
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
                        swal('Ofertante '+s+' con exito','','success')
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
            var ofertante = $(this).attr("value");
            console.log(ofertante);
            var modulo = "Bidder";
            var url = "{!! url('viewRejection/"+ofertante+"/"+modulo+"') !!}";
            console.log(url);
            $("#negaciones").empty();
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
                type:'get', 
                dataType:'json',
                success: function(datos){
                    console.log(datos);
                    swal.close();
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

        $(document).on('click', '#add_module', function() {
            var idBidder = $(this).attr('value');
            $("#AddModules").on('submit', function(e){
                $('#ModalModules').modal('close');
                var modules = $("#sel1").val();
                console.log(modules);
                var url = "{{url('addModuleBidder/')}}";
                console.log(url);
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
                    type:'POST',
                    data:{
                        _token: $('input[name=_token]').val(),
                        idBidder: idBidder,
                        access: modules
                    },
                    success: function (result) {
                        console.log(result);
                        swal("Acceso concedido con éxito","","success")
                        .then((recarga) => {
                            location.reload();
                        });
                    },
                    error: function (result) {
                        console.log(result);
                        swal("Error en su solicitud, por favor recargue la pagina","","error")
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
            });
        });

        $(document).on('click', '#x', function() {
            var modules = $(this).attr('value1');
            var bidder = $(this).attr('value2');
            var parametros = bidder+"/"+modules;
            var url = "{{url('deleteModuleBidder/')}}/"+parametros;
            console.log(url);
            swal({
                title: "¿Desea realmente retirar este módulo?",
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
                        url: url,
                        type:'get',
                        dataType:"json",
                        success: function(data) {
                            swal("Se ha retirado el permiso del módulo con éxito","","success")
                            .then((recarga) => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            swal("Ha ocurrido un error por favor recargue la pagina","","error")
                            .then((recarga) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
	</script>
@endsection