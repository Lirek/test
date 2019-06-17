@extends('promoter.layouts.app')
@section('main')
<span class="card-title grey-text"><h3>Módulos y permisos</h3></span>
    <a class="btn modal-trigger green" data-tooltip="Agregar permiso" href="#NewPermiso">
        <i class="material-icons">enhanced_encryption</i>Activar módulo para usuario
    </a>
    <a class="btn modal-trigger green" data-tooltip="Agregar modulo" href="#NewModulo">
        <i class="material-icons">find_in_page</i>Agregar Módulo
    </a>
    <br>
    <br>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="televisoras"><a class="active" href="#test1">Permisos</a></li>
        <li class="tab" id="televisorasSistema"><a href="#test2">Módulos</a></li>
    </ul>
    <div id="test1" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="admin"><a class="active">Usuario administrador</a></li>
            <li class="tab" id="operador"><a>Usuario operador</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>correo</th>
                    <th>Módulos visibles</th>
                </tr>
            </thead>
            <tbody id="Usuario">
            </tbody>
        </table>
    </div>
    <div id="test2" class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                	<th>id</th>
                    <th>Nombre del módulo</th>
                </tr>
            </thead>
            <tbody>
	    		@foreach($modulo as $modul)
		    		<tr>
		        		<td><h6 id="modul" name="modul">{{$modul->id}}</h6></td>
		                <td><h6 id="modul" name="modul">{{$modul->name}}</h6></td>
		            </tr>
	          	@endforeach
            </tbody>
        </table>
    </div>
@include('promoter.modals.ModulesLicenseModal')
@endsection
@section('js')
<script type="text/javascript">

         $(document).ready(function(){
            $('select').formSelect();
        });
	
	function listadoUsuarios(tipo) {
			$("#Usuario").empty();
			var parametros = tipo;
			var ruta = "{{url('dataUsuario')}}"+"/"+parametros;
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
					$.each(data,function(i,info) {
						if(info.license.length!=0) {
						var modulos = "";
						$.each(info.license,function(i,infoModul){
								modulos = modulos+
								"<span class='new badge grey darken-1' data-badge-caption='"+infoModul.name+"' style='padding:0px 3px; font-size: 16px;'>"+
					            "<i class='material-icons right' value1='"+infoModul.id+"' name='module' id='x' style='cursor:pointer'>cancel"+
					            "</i>"+
					            "</span> ";
							}); 
							} else {
					          	modulos = "El usuario no tiene módulos inhabilitado ";
					        }

						var filas = "<tr><td>"+
						info.name_c+"</td><td>"+
						info.email+"</td><td>"+
						modulos+"</td></tr>";
						$("#Usuario").append(filas);
					})
				},
				error:function(data) {
					swal('Existe un error en su solicitud','','error')
					.then((recarga) => {
						location.reload();
					});
				}
			});
		}
		$(document).ready(function(){
			listadoUsuarios("2");
		});
		$(document).on('click','#admin', function() {
			listadoUsuarios("2");
		});
		$(document).on('click','#operador', function() {
			listadoUsuarios("3");
		});

		// quitar modulo
		  $(document).on('click', '#x', function() {
		    
		    var modules = $(this).attr('value1');
		    var url = "{{url('DeleteModule/')}}"+"/"+modules;
		    $.ajax({
		      url: url,
		      type:'get',
		      dataType:"json",
		      success: function(data) {
		        swal("Se ha retirado el permiso del módulo con éxito","","success")
		        .then((recarga) => {
		          location.reload();
		          //listarProveedores();
		        });
		        //alert("Se ha retirado el permiso del módulo con éxito");
		        //$("#m_"+modules+"_"+seller).hide();
		      },
		      error: function(data) {
		        swal("Ha ocurrido un error por favor recargue la pagina","","error")
		        .then((recarga) => {
		          location.reload();
		        });
		        //alert("NO Permitido Por Favor Recargue la Pagina");
		      }
		    });
		  });
		  // quitar modulo

		$(document).on('click', '#status', function() {
			var producto = $(this).attr("value");
			$("#formStatus").on('submit', function(e) {
				var s = $("input[type='radio'][name=status]:checked").val();
                var url = "{{url('statusModule/')}}/"+producto;
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
                    },
                    success: function (result) {
                        swal('Producto '+s+' con exito','','success')
                        .then((recarga) => {
                            location.reload();
                        });
                    },
                    error: function (result) {
                        swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
			});
		});

</script>
@endsection