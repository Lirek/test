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
            				<h3><span class="card-title"><i class="fa fa-angle-right"> Libros</i></span></h3> 
            				<form method="POST"  id="SaveSong" action="{{url('SearchProfileAuthor')}}">{{ csrf_field() }}
                    			<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    			<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar...</button>
       						</form>
       						<div  class="col-sm-12 col-xs-12 col-md-12" id="principal">
       						{{  $Books->links() }}
       						</div>
       						@if($Books != null)
                			<!-- PROFILE 01 PANEL -->
                			
                			@foreach($Books as $Book)

                			<div class="col-lg-4 col-md-4 col-sm-4 mb" style="margin-top: 2%">
                    			<div class="content-panel pn-music">
                        			<div id="profile-01" style="">
                            		@if($Book->cover)
                                		<img src="images/bookcover/{{$Book->cover}}" width="100%" height="220" style="">
                            		@else
                                		<img src="#" width="100%" height="220" style="">
                            		@endif
                        			</div>
                        			<div class="profile-01 centered">
                            			<p><a href="#" data-toggle="modal" data-target="#myModal-{{$Book->id}}" style="color: #ffff">Ver mas</p></a>
                        			</div>
                        			<div class="centered">
                            			<h3>{{$Book->title}}</h3>
                            			<h6>Autor: <a href="ProfileBookAuthor/{{$Book->id}}">{{$Book->author->full_name}}</a></h6>
                            			<h6>Lanzamiento: {{$Book->release_year}}</h6>
                            			<a href="#" class=""  id="modal-confir.{{$Book->id}}" onclick="fnOpenNormalDialog('{!!$Book->cost!!}','{!!$Book->title!!}','{!!$Book->id!!}')">Adquirir</a></p>
                            		<!-- <p class="sinopsis"><b>Sinopsis:</b>{{$Book->sinopsis}}</p> -->
                        			</div>
                    			</div><!--/content-panel -->
                			</div><!--/col-md-4 -->
                			<!--MODAL-->
								 <div id="myModal-{{$Book->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$Book->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                        	<div id="panel" class="img-rounded img-responsive av text-center col-lg-12 col-md-12 col-sm-12 mb" style="-webkit-box-shadow: 8px 8px 15px #999;
            									-moz-box-shadow: 8px 8px 15px #999;
            									filter: shadow(color=#999999, direction=135, strength=8);
            									/*Para la Sombra*/
            									background-image: url('images/bookcover/{{$Book->cover}}');
            									margin-top: 5%;
            									background-position: center center;
            									width: 100%;
            									min-height: 150px;
            									-webkit-background-size: 100%;
            									-moz-background-size: 100%;
            									-o-background-size: 100%;
            									background-size: 100%;
            									-webkit-background-size: cover;
            									-moz-background-size: cover;
            									-o-background-size: cover;
            									background-size: cover;">
            									<button type="button" class="btn btn-primary" data-dismiss="modal"   id="modal-confir" style="margin-left: 87%" onclick="fnOpenNormalDialog('{!!$Book->cost!!}','{!!$Book->title!!}','{!!$Book->id!!}')">Adquirir</button>
                    						</div>
                    						<div class="col-lg-12 col-md-12 col-sm-12 mb">
                    							<p class="sinopsis"><h5><b>Sinopsis:</b></h5>
                    							{{ $Book->sinopsis }}</p>
                                
                    							
                    						</div>

                    						<div class="box-footer no-padding">
                    							<div class="col-md-8 col-sm-8 col-lg-12">
                    							<h5><b>Costo:</b> {{$Book->cost}}</h5>
                        						<h5><b>Titulo original:</b> {{ $Book->original_title }} </h5>
                        						<h5><b> Categoría:</b> {{ $Book->rating->r_name }} </h5>
                        						@if($Book->sagas!=null)
                                        			<h5><b>Saga:</b> {{ $Book->sagas->sag_name }}</h5>
                                   			 	@else
                                        			<h5><b>Saga:</b> No tiene Saga</span></h5>
                                    			@endif
                                    				<div class="widget-user-image">
                                						<img class="img-rounded img-responsive av"src="{{ asset('images/authorbook') }}/{{$Book->author->photo }}" style="width:70px;height:70px;" alt="User Avatar">
                            					</div>
                            					<!-- /.widget-user-image -->
                            					<h5 class="widget-user-username"><b>Autor:</b> {{ $Book->author->full_name }}</h5>
                        						<hr>
                    						</div>
                    							</div>
                    						<div class="">
                                            	<div class="modal-footer">
                                            	
                                              		<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            	</div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!--Fin modal-->
                			
                			@endforeach
                			 <div  class="col-sm-12 col-xs-12 col-md-12">
       						{{  $Books->links() }}
       						</div>
                			@else
                    			<h1>No Posee Libros</h1>
               				@endif
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<div id="modal-confirmation"></div>
@endsection

@section('js')
<script type="text/javascript">

$(document).ready(function(){
	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchAuthor",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(ui.item.type);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Artista no se encuentra regitrado','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>

<script>
function fnOpenNormalDialog(cost,name,id) {


    $("#modal-confirmation").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

    // Define the Dialog and its properties.
    $("#modal-confirmation").dialog({
        resizable: false,
        modal: true,
        title: "Confirmar",
        height: 250,
        width: 400,
        position: {
        	my: "center top",
			at: "center top",
			of: $("#principal"),
			within: $("#principal")
        },
        buttons: {
            	"Si": function () {
                $(this).dialog('close');
                callback(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback(false,id);
            }
        }
    });
}

function callback(value,id) {
    if (value) {
         $.ajax({
                    
            url:'BuyBook/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('El libro ya forma parte de su colección','','error');
                    }
                    else
                    {	
                    var idUser={!!Auth::user()->id!!};
                    $.ajax({ 
                
                      url     : 'MyTickets/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                    	swal('Libro comprado con exito','','success');
                  		 console.log(result);
                  	}	 
                },
              error: function (result) 
                {
                      
                }

            });
    } else {
        return false;
    }
}
</script>
@endsection