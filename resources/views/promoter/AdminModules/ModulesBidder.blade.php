@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Categorías de los aliados</h3></span>
	<a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar nueva categoría" href="#NewModule">
        <i class="material-icons">add</i>
    </a>

    <div class="row">
    	@foreach($modules as $module)
    		<div class="col s4">
    			<div class="card blue-grey darken-1">
    				<div class="card-content white-text">
    					<span class="card-title">ID: {{$module->id}} || Nombre: {{$module->name}}</span>
    					<a class="btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton" id="editModule" value="{{$module->id}}" href="#updateModule">
    						<i class="material-icons">edit</i>
    					</a>
    					<a class="btn-small waves-effect waves-light btn red curvaBoton" id="deleteModule" value="{{$module->id}}">
    						<i class="material-icons">delete</i>
    					</a>
    				</div>
    			</div>
    		</div>
		@endforeach
	</div>
	@include('promoter.modals.BidderModuleViewModal')
@endsection
@section('js')
	<script>
		$(document).ready(function(){
            $('select').formSelect();
		});

        $("#AddModule").on('submit', function(e){
            $('#NewModule').modal('close');
            var categoria = $("#categoria").val();
            var url = "{{url('addModule')}}";
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
                    categoria: categoria
                },
                success: function (result) {
                    swal("Categoría creada con éxito","","success")
                    .then((recarga) => {
                        location.reload();
                    });
                },
                error: function (result) {
                    swal("Error en su solicitud, por favor recargue la pagina","","error")
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });

        $(document).on('click', '#editModule', function() {
        	var module = $(this).attr("value");
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
                url : "{{url('infoModule')}}/"+module,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    swal.close();
                    $("#idUpdate").val(module);
                    $("#categoria_u").val(data.name);
                },
                error: function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });

        $("#updateModuleBidder").on('submit', function(e){
        	$('#updateModule').modal('close');
            var categoria = $("#categoria_u").val();
            var module = $('#idUpdate').val();
            var url = "{{url('updateModule')}}";
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
                    categoria: categoria,
                    module: module
                },
                success: function (result) {
                    swal("Categoría actualizada con éxito","","success")
                    .then((recarga) => {
                        location.reload();
                    });
                },
                error: function (result) {
                    swal("Error en su solicitud, por favor recargue la pagina","","error")
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });

        $(document).on('click', '#deleteModule', function() {
        	var module = $(this).attr("value");
        	swal({
                title: "¿Desea realmente eliminar la categoría?",
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
		                url : "{{url('deleteModule')}}/"+module,
		                type: "GET",
		                dataType: "json",
		                success: function(data) {
		                    swal("Categoría eliminada con éxito","","success")
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
	</script>
@endsection