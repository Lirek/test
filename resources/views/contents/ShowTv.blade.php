@extends('layouts.app')

@section('css')
@endsection

@section('main')



    <div class="row">
    <div class="card col s12 m12" style="padding: 10px 10px 10px 10px;">

		<h4 class="titelgeneral"><i class="material-icons small">tv</i> Televisión</h4>
		<div class="row">
			<div class="input-field col s12 m6 offset-m3">
				<form method="POST"  id="SaveSong" action="{{url('SearchPlayTv')}}">
					{{ csrf_field() }}
					<i class="material-icons prefix blue-text">search</i>
					<input type="text" id="seach" name="seach" class="validate">
					<input type="hidden" name="type" id="type">

					<br>
					<button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
				</form>
			</div>
		</div>

            <div class="row">
            @foreach($Tv as $tv)
                    <div class="col s6 m2">
                        <div class="card">
                            <div class="card-image">
                                <a href="{{url('PlayTv/'.$tv->id)}}"><img src="{{asset($tv->logo)}}" width="100%" height="140px"></a>
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
	<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

	<script type="text/javascript">

			$(document).ready(function(){
				$('#seach').keyup(function(evento){
					$('#buscar').attr('disabled',true);
				});
				$('#buscar').attr('disabled',true);
				  $('#seach').autocomplete({
					source: "SearchTv",
					messages: {
                          noResults: '',
                          results: function() {}
                          },
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