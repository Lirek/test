@extends('layouts.app')

@section('css')

@endsection

@section('main')

	<div class="row">
	<h4 class="modal-title">Televisión</h4>



			<form class="col m6 offset-m3"  method="POST" action="{{url('SearchPlayTv')}}"  id="SaveSong" >{{ csrf_field() }}
				<div class="input-field col m3 ">

					<input method="POST"  id="SaveSong" class="validate"   type="text">
					<label for="first_name">Buscar</label>
					<div> {{ $errors->has('codigo') ? ' has-error' : '' }} </div>
					<div id="codigoMen"></div>
				</div>
				<div class=" col m3 ">
					<button  id='ingresar' class=" btn-floating btn-small  circle waves-effect waves-light " type="submit" name="action">
						<i class="material-icons ">search</i>
					</button>
				</div>

			</form>






	</div>



@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function(){

	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchTv",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Tv no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
@endsection