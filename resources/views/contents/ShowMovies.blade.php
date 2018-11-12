@extends('layouts.app')

@section('css')
<style type="text/css">
	
</style>
@endsection

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12" id="principal">
            				<h3><span class="card-title"><i class="fa fa-angle-right"> Peliculas</i></span></h3>
            				<div class="col-md-12  control-label">
         						<form method="POST"  id="SaveSong" action="{{url('SearchMovieList')}}">{{ csrf_field() }}
                    				<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    				<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Pelicula...</button>		
       							</form>
       						</div>
       						@if($Movie != NULL)
       							@foreach($Movie as $Movies)
       								<div class="col-lg-3 col-md-3 col-sm-3 mb" style="margin-top: 2%">
                    					<div class="content-panel pn-music">
                        					<div id="profile-01" style="">
                            				@if($Movies->img_poster)
                                				<img src="{{asset('movie/poster')}}/{{$Movies->img_poster}}" width="100%" height="220" style="">
                            				@else
                                				<img src="#" width="100%" height="220" style="">
                            				@endif
                        					</div>
                        					<div class="profile-01 centered">
                            					<p><a href="#" data-toggle="modal" data-target="#myModal-{{$Movies->id}}" style="color: #ffff">Ver mas</p></a>
                        					</div>
                    					</div><!--/content-panel -->
                					</div><!--/col-md-4 -->
                						<!--MODAL-->
								 <div id="myModal-{{$Movies->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$Movies->title}}</h4>
                                        </div>
                                        <div class="modal-body">
                                        	<div id="panel" class="img-rounded img-responsive av text-center col-lg-12 col-md-12 col-sm-12 mb" style="-webkit-box-shadow: 8px 8px 15px #999;
            									-moz-box-shadow: 8px 8px 15px #999;
            									filter: shadow(color=#999999, direction=135, strength=8);
            									/*Para la Sombra*/
            									background-image: url('{{asset('movie/poster')}}/{{$Movies->img_poster}}');
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
            									<button type="button" class="btn btn-primary" data-dismiss="modal"   id="modal-confir" style="margin-left: 87%" onclick="fnOpenNormalDialog('{!!$Movies->cost!!}','{!!$Movies->title!!}','{!!$Movies->id!!}')">Adquirir</button>
                    						</div>
                    						<div class="col-lg-12 col-md-12 col-sm-12 mb">
                    							<p><h5><b>Titulo:</b></h5>
                    							{{ $Movies->title }}</p>
                    							<p class="sinopsis"><h5><b>Basado en:</b></h5>
                    							{{ $Movies->based_on }}</p>
                                
                    							
                    						</div>

                    						<div class="box-footer no-padding">
                    							<div class="col-md-8 col-sm-8 col-lg-12">
                    							<h5><b>Costo:</b> {{$Movies->cost}}</h5>
                        						<h5><b>Titulo original:</b> {{ $Movies->original_title }} </h5>
                        						<h5><b> Categoría:</b> {{ $Movies->rating->r_name }} </h5>
                        						@if($Movies->sagas!=null)
                                        			<h5><b>Saga:</b> {{ $Book->sagas->sag_name }}</h5>
                                   			 	@else
                                        			<h5><b>Saga:</b> No tiene Saga</span></h5>
                                    			@endif
                                    				
                            					<!-- /.widget-user-image -->
                            					<h5><b>Trailer:</b></h5>
                            					<div class="plyr__video-embed" id="player">
    												<iframe src="{{$Movies->trailer_url}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
												</div>
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

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<script>
function fnOpenNormalDialog(cost,name,id) {


    swal({
            title: "Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback(true,id);
           
          } else {
            callback(false,id);
          }
        });
    };


function callback(value,id) {
    if (value) {
      swal({
                title: 'Procesando..!',
                text: 'Por favor espere..',
                buttons: false,
                closeOnEsc: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
         $.ajax({
            
            url:"{{ URL('BuyMovie') }}"+'/'+id,        
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
                      swal('La canción ya forma parte de su colección','','error');
                 
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
                      
                    swal('Cancion comprada con exito','','success');

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

<script type="text/javascript">

$(document).ready(function(){
	$('#seach').keyup(function(evento){
		$('#buscar').attr('disabled',true);
	});
	$('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
      	source: "SearchMovie",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
      		if (valor=='No se encuentra...'){
      			$('#buscar').attr('disabled',true);
      			swal('Pelicula no se encuentra regitrada','','error');
      		}else{
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
@endsection