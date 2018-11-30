@extends('layouts.app')

@section('css')

@endsection

@section('main')

	<div class="row">
			<h4>Televisión</h4>
    </div>

    <div class="row">
    <div class="card col s12 m12" style="padding: 10px 10px 10px 10px;">

            <div class="row">
				<form class="col s12 m4 offset-m8"  method="POST" action="{{url('SearchPlayTv')}}"  id="SaveSong" >{{ csrf_field() }}
					<div class="input-field col s4 offset-s3 m9 valign-wrapper ">
						<input method="POST"  id="SaveSong" class="validate"   type="text">
						<label for="first_name">Buscar</label>
						<div> {{ $errors->has('codigo') ? ' has-error' : '' }} </div>
						<div id="codigoMen"></div>
					</div>
					<div class=" col s3 m3 valign-wrapper">
						<button  id='ingresar' class="btn-floating btn-large pulse circle waves-effect waves-light left valign-wrapper" type="submit" name="action">
							<i class="material-icons ">search</i>
						</button>
					</div>
				</form>
			</div>


            <div class="row">
            @foreach($Tv as $tv)
                    <div class="col s6 m3">
                        <div class="card">
                            <div class="card-image">
                                <a href="{{url('PlayTv/'.$tv->id)}}"><img src="{{asset($tv->logo)}}" width="100%" height="170px"></a>
                                <a  href="{{url('PlayTv/'.$tv->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">live_tv</i></a>
                            </div>
                            <div class="card-content">
                                <h6 class="truncate grey-text">{{$tv->name_r}}</h6>
                            </div>
                        </div>
                    </div>
            @endforeach
            </div>
		</div>
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