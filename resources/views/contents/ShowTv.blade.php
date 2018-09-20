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
            				<h3><span class="card-title"><i class="fa fa-angle-right"> Television</i></span></h3>
            				<div class="col-md-12  control-label">
         						<form method="POST"  id="SaveSong" action="{{url('SearchPlayTv')}}">{{ csrf_field() }}
                    				<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    				<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Tv...</button>	
       							</form>
       						</div>
       						@foreach($Tv as $tv)
       						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb" style="margin-top: 2%">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
                      <p><a href="{{url('PlayTv/'.$tv->id)}}">
                          <img src="{{asset($tv->logo)}}" width="150%" >
                      </p></a>
                    </div>
                  </div>
                    			<!-- <div class="content-panel pn-music">
                        			<div id="profile-01" style="">
                        				<img src="{{asset($tv->logo)}}" width="100%" >
                        			</div>
                        			<div class="profile-01 centered">
                            			<p><a href="{{url('PlayTv/'.$tv->id)}}" style="color: #ffff"><i class="fa fa-play-circle"> Ver</i></p></a>
                        			</div>
                        		</div>
                        	</div> -->
                    @endforeach
                        	<div  class="col-sm-12 col-xs-12 col-md-12">
       						{{  $Tv->links() }}
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