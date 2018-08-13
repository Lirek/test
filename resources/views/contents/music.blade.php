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
            			<div class="col-sm-12 col-xs-12 col-md-12" id="principal">
                     		<h3><span class="card-title"><i class="fa fa-angle-right"> Música</i></span></h3> 
         						<div class="col-md-12  control-label">
         						<form method="POST"  id="SaveSong" action="{{url('SearchProfileArtist')}}">{{ csrf_field() }}
                    		<input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                    		<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Artista...</button>
                					
       							</form>
       							</div>
       							<h4><span class="card-title"><i class="fa fa-angle-right" style="margin-top: 2%"> Nuevos álbums</i></span></h4> 

       							@foreach($Albums as $Album)
       							<!-- Spotify Panel -->
								<div class="col-lg-4 col-md-4 col-sm-4 mb">
									<div class="content-panel pnspoty">
										<div id="spotify" style="
											background: url('{{ asset($Album->cover)}}') no-repeat center top;
											margin-top: -15px;
											background-attachment: relative;
											background-position: center center;
											min-height: 220px;
											width: 100%;
    										-webkit-background-size: 100%;
    										-moz-background-size: 100%;
    										-o-background-size: 100%;
    										background-size: 100%;
    										-webkit-background-size: cover;
    										-moz-background-size: cover;
    										-o-background-size: cover;
    										background-size: cover;">
											<div class="col-xs-4 col-xs-offset-7">
												<button class="btn btn-primary btn-xm" data-toggle="modal" data-target="#myModal">Ver mas</button>
											</div>
											<div class="sp-title">
												<h3>{{$Album->autors->name}}</h3>
												<h4>{{$Album->name_alb}}</h4>
											</div>
											<!-- <div class="play">
												<i class="fa fa-play-circle"></i>
											</div> -->
										</div>
										<p class="followers"><i class="fa fa-user"><a href="ProfileMusicArtist/{{$Album->id}}"> {{$Album->autors->name}}</a> - {{$Album->name_alb}}</i>
                      <a href="#" class=""  onclick="fnOpenNormalDialog2('{!!$Album->cost!!}','{!!$Album->name_alb!!}','{!!$Album->id!!}')" style="margin-left: 25%">Adquirir</a></p>
									</div>
								</div><!--/col-md-4-->
								 

								 <!--MODAL-->
								 <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{$Album->name_alb}}</h4>
                                        </div>
                                        <div class="modal-body">
                                        	<div id="panel" class="img-rounded img-responsive av text-center col-lg-6 col-md-6 col-sm-6 mb" style="-webkit-box-shadow: 8px 8px 15px #999;
            									-moz-box-shadow: 8px 8px 15px #999;
            									filter: shadow(color=#999999, direction=135, strength=8);
            									/*Para la Sombra*/
            									background-image: url('{{ asset($Album->cover)}}');
            									margin-top: 5%;
            									background-position: center center;
            									width: 50%;
            									min-height: 150px;
            									-webkit-background-size: 100%;
            									-moz-background-size: 100%;
            									-o-background-size: 100%;
            									background-size: 100%;
            									-webkit-background-size: cover;
            									-moz-background-size: cover;
            									-o-background-size: cover;
            									background-size: cover;">
            									<button type="button" class="btn btn-primary" data-dismiss="modal"  onclick="fnOpenNormalDialog2('{!!$Album->cost!!}','{!!$Album->name_alb!!}','{!!$Album->id!!}')" id="modal-confirAlbumModal" style="margin-left: 70%">Adquirir</button>
                    						</div>
                    						<div class="col-lg-6 col-md-6 col-sm-6 mb">
                    							<h5><b>Canciones:</b></h5>
                                  @foreach($Album->Songs as $Song)
                    							<ul>
                    								<li class="fa fa-angle-right">{{$Song->song_name}}</li> 
                    							</ul>
                                  @endforeach
                    							<h5><b>Costo:</b> {{$Album->cost}}</h5>
                    						</div>
                    						<div class="col-lg-12 col-md-12 col-sm-12 mb">
                        						<h5><b>Artista:</b>{{$Album->autors->name}}</h5>
                        						<h5><b>Album:</b> {{$Album->name_alb}}</h5>

                        						<hr>
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
								<div class="col-md-12 col-sm-12 col-xs-12 mb">
									<hr>
								</div>
                     		<div class="col-md-12 col-sm-12 col-xs-12 mb">
                     			<div class="white-panel panRf pe donut-chart">
                     					<div class="white-header">
                            				<h3><span class="card-title">Singles</span></h3>                          
                          		</div>
                          			<div class="col-sm-12 col-xs-12 col-md-12 goleft">
                          				<table class="table table-striped table-advance table-hover" id="myTable">
                          					<thead>
                          						<tr>
                          							<th><i class="fa fa-music" style="color: #23B5E6"></i>Nombre:</th>
                          							<th><i class="fa fa-microphone" style="color: #23B5E6"></i>Artista</th>
                          							<th><i class="fa fa-money" style="color: #23B5E6"></i>Costo</th>
                          							<th><i class="fa fa-credit-card" style="color: #23B5E6"></i></th>
                          						</tr>
                          					</thead>
                          					<tbody>
                          						@foreach ($Singles as $Single)
                          						<tr class="letters">
	                          							<td>{{$Single->song_name}}</td>
                          							<td><a href="ProfileMusicArtist/{{$Single->autors->id}}">{{$Single->autors->name}}</a></td>
                          							<td>{{$Single->cost}}</td>
                          							<td>
                          								<a href="#" class="btn btn-primary a-btn-slide-text btn-xs"  onclick="fnOpenNormalDialog('{!!$Single->cost!!}','{!!$Single->title!!}','{!!$Single->id!!}')" id="modal-confir">
                          								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>	
                          								</a>
                          							</td>
                          						</tr>
                          						@endforeach
                          					</tbody>
                          				</table>
                          			</div>
                     			</div>
                     		</div>      
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
	            $('#myTable').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ Singles",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "No Existen Singles Registrados",
                    "sInfo":           "Mostrando Singles del _START_ al _END_ de un total de _TOTAL_ Singles",
                    "sInfoEmpty":      "Mostrando Singles del 0 al 0 de un total de 0 Singles",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ Singles)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "processing": true,
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
                    
            url:'BuySong/'+id,
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
      	source: "SearchArtist",
      	minLength: 2,
      	select: function(event, ui){		
      		$('#seach').val(ui.item.value);
      		var valor = ui.item.value;
          console.log(valor);
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
function fnOpenNormalDialog2(cost,name,id) {

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
                callback2(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback2(false,id);
            }
        }
    });
}


function callback2(value,id) {
    if (value) {
         $.ajax({
                    
            url:'BuyAlbum/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                    }
                    else if (result==1) 
                    {
                      swal('El album ya forma parte de su colección','','error');
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
                      swal('Album comprado con exito','','success');
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