@extends('promoter.layouts.app')
@section('main')
	<span class="card-title grey-text"><h3>Precio de los cambios</h3></span>
	<div class="row">
		<div class="col s6">
			<div class="card pink darken-3 darken-3 hoverable">
				<div class="card-content white-text">
					<span class="card-title">Puntos</span>
					<i class="large material-icons">bubble_chart</i>
					<h4>
						<p>1 punto x {{ $valorPunto }}$</p>
					</h4>
				</div>
				<div class="card-action">
					<a href="{{url('historialCosto')}}/punto" class="btn btn-primary indigo">Historial</a>
					<a href="#ajustarCosto" value="punto" value2="{{ $valorPunto }}" class="btn btn-primary indigo modal-trigger ajustar">Ajustar</a>
				</div>
			</div>
		</div>
		<div class="col s6">
			<div class="card pink darken-3 darken-3 hoverable">
				<div class="card-content white-text">
					<span class="card-title">Tickets</span>
					<i class="large material-icons">local_offer</i>
					<h4>
						<p>1 ticket x {{ $valorTicket }}$</p>
					</h4>
				</div>
				<div class="card-action">
					<a href="{{url('historialCosto')}}/ticket" class="btn btn-primary indigo">Historial</a>
					<a href="#ajustarCosto" value="ticket" value2="{{ $valorTicket }}" class="btn btn-primary indigo modal-trigger ajustar">Ajustar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- modal para ajustar los valores -->
	<div id="ajustarCosto" class="modal">
		<div class="modal-content">
			<div class="pink darken-4"><br>
				<h4 class="center white-text" id="titulo"></h4>
				<br>
			</div>
			<br>
			<div class="row">
				<div class="col s12">
					<form class="form-horizontal" id="formStatus">
						{{ csrf_field() }}
						Valor a ajustar:
						<div class="input-field inline">
							<input id="valor" type="number" step="0.0001" min="0" name="costo" class="validate" value="" placeholder="" required="required" onkeypress="return filterFloat(event,this);">
							<label for="valor">Costo</label>
						</div>
						<input type="hidden" id="tipo" name="tipo">
						<div class="col m12">
							<button type="submit" class="btn curvaBoton waves-effect waves-light green" id="ajustar">
								Ajustar
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="modal-footer">
        	<a href="#!" class="modal-close waves-effect waves-pink btn-flat">Salir</a>
        </div>
	</div>
@endsection
@section('js')
	<script>
		function filterFloat(evt,input){
		    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
		    var key = window.Event ? evt.which : evt.keyCode;    
		    var chark = String.fromCharCode(key);
		    var tempValue = input.value+chark;
		    if(key >= 48 && key <= 57) {
		        if(filter(tempValue)=== false){
		            return false;
		        }else{       
		            return true;
		        }
		    } else {
		    	if(key == 8 || key == 13 || key == 0) {     
		    		return true;              
		    	} else if(key == 46) {
		    		if(filter(tempValue)=== false) {
		    			return false;
		    		} else {       
		    			return true;
		    		}
		    	} else {
		    		return false;
		    	}
		    }
		}

		function filter(__val__){
		    var preg = /^([0-9]+\.?[0-9]{0,4})$/; 
		    if(preg.test(__val__) === true) {
		        return true;
		    } else {
		    	return false;
		    }
		}

		$(".ajustar").click(function(e){
			var tipo = $(this).attr("value");
			var valor = $(this).attr("value2");
			console.log(tipo,valor);
			$('#titulo').show();
			$('#titulo').text('Ajuste del precio de los '+tipo+'s');
			$('#valor').val(valor);
			$('#tipo').val(tipo);
		});

		$("#formStatus").on('submit',function(e){
			var url = "{!! url('conversion') !!}";
			var tipo = $("#tipo").val();
			var valor = $("#valor").val();
			e.preventDefault();
			var gif = "{{ asset('/sistem_images/loading.gif') }}";
	        console.log(url,tipo,valor);
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
        		type:'post', 
        		data: {
        			_token: $('input[name=_token]').val(),
        			tipo: tipo,
        			costo: valor
        		},
        		success: function(datos){
        			console.log(datos);
        			swal('Ajuste realizado exitosamente','','success')
					.then((recarga) => {
						location.reload();
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
	</script>
@endsection