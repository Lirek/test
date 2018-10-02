@extends('layouts.app')

@section('css')

@endsection

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
            				<h3><span class="card-title"><i class="fa fa-angle-right"> Radios</i></span></h3>
            				<div class="col-md-12  control-label">
         						<form method="POST"  id="SaveSong" action="{{url('SearchListenRadio')}}">{{ csrf_field() }}
                    				<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    				<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>	
       							</form>
       						</div>
       						@foreach($Radio as $radios)
       						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 mb" style="margin-top: 2%">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p><a href="{{url('ListenRadio/'.$radios->id)}}"><img src="{{asset($radios->logo)}}" width="100%" height="90">
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-left: -8%; margin-top: 8%">
                        <h5>{{$radios->name_r}}</h5>
                        </p></a>
                    </div>
                  </div>
                      @endforeach
                        	<div  class="col-sm-12 col-xs-12 col-md-12">
       						{{  $Radio->links() }}
       						</div>
            			</div>
            		</div>
            	</div>
            </div>
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
      	source: "SearchRadio",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Radio no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
@endsection