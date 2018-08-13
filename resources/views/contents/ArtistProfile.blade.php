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
            				 	<h3><span class="card-title"><i class="fa fa-angle-right">  {{$Artist->name}}</i></span></h3>
            				<div class="col-sm-6 col-xs-12 col-md-6" >
            					<div class="center-align">
									<img src="{{asset($Artist->photo)}}" class="img-circle responsive-img" width="55%" height="150">
									<div class="col-sm-7 col-xs-7 col-md-7">
										<a class="waves-effect waves-light btn blue darken-3" href="{{$Artist->facebook}}" target="blank">
										<i class="fa fa-facebook"></i>
										</a>
										<a class="waves-effect waves-light btn red" href="{{$Artist->google}}" target="blank"> 
										<i class="fa fa-youtube"></i>
										</a>	
										<a class="waves-effect waves-light btn pink" href="{{$Artist->instagram}}" target="blank">
										<i class="fa fa-instagram"></i>
										</a>
										<a class="waves-effect waves-light btn blue" href="{{$Artist->twitter}}" target="blank">
										<i class="fa fa-twitter"></i>
										</a>
				  					</div>
								</div>
							</div>
								<div class="col-sm-4 col-xs-4 col-md-4">
				  					<h3>Tipo: {{$Artist->type_authors}}</h3>
				  					<h4>Pais: {{$Artist->country}}</h4>
				  				</div>
				  				<div class="col-sm-12 col-xs-12 col-md-12">
				  				<hr>
				  				<h4><span class="card-title"><i class="fa fa-angle-right" style="margin-top: 2%"> Álbums</i></span></h4>
				  					<div class="form-panel">
                   						 <div class="col-lg-4 col-md-4 col-sm-4 mb">
                        					<div class="content-panel pn-music">
                            					<div id="profile-01" style="">
                            					 @foreach($Albums as $Album)
                             						<input type="hidden" name="id" id="id" value="{{$Album->id}}">
                                				@if($Album->cover)
                                    				<img src="{{asset($Album->cover)}}?.{{rand(1,1000)}}" width="100%" height="160" style="">
                                 				@else
                                    				<img src="#" width="100%" height="220" style="">
                               					@endif
                                				</div>
                        					</div><!--/content-panel -->
                    					</div><!--/col-md-4 -->
                    					<div>
                        					<h5><b>Artista:</b> {{$Album->autors->name}}</h5>
                        					<h5><b>Album:</b> {{$Album->name_alb}}</h5>
                                  <h5><b>Costo:</b> {{$Album->cost}}</h5>
                        					<h5><a href="#" class="" onclick="fnOpenNormalDialog2('{!!$Album->cost!!}','{!!$Album->name_alb!!}','{!!$Album->id!!}')" id="modal-confirAlbum" style="margin-left: 30%">Adquirir</a></h5>
                        					<hr>
                        						@endforeach

                        					<h5><b>Canciones:</b></h5>
                                  @foreach($Album->Songs as $Song)
                    							<ul>
                    								<li class="fa fa-angle-right">{{$Song->song_name}}</li> 
                    							</ul>
                                  @endforeach	
                    					</div>
									</div>
				  				</div>

				  				<div class="col-md-12 col-sm-12 col-xs-12 mb">
				  					<hr>
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
                          							<td>{{$Single->autors->name}}</td>
                          							<td>{{$Single->cost}}</td>
                          							<td>
                          								<a href="#" class="btn btn-primary a-btn-slide-text btn-xs"  onclick="fnOpenNormalDialog('{!!$Single->cost!!}','{!!$Single->title!!}','{!!$Single->id!!}')" id="modal-confir" style="margin-left: 30%;">
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


    $("#modal-confirmation	").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

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
          
            url:"{{ URL('BuySong') }}"+'/'+id, 
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
                
                      url:"{{ URL('MyTickets') }}"+'/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                    	swal('Cancion comprada con exito','','success');
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
                    
            
            url:"{{ URL('BuyAlbum') }}"+'/'+id,
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
                      
                      url:"{{ URL('MyTickets') }}"+'/'+idUser,
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
