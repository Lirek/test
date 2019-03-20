@extends('layouts.app')

@section('css')
<link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
<style>

    .swal-button--confirm {
      background-color: #4caf50;
    }
      .swal-button--confirm {
      color: : white;
    }
    /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
  </style>
@endsection

@section('main')
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
				<h4 class="titelgeneral"><i class="material-icons small">movie</i> Peliculas</h4>

				<div class="row">
                	<div class="input-field col s12 m6 offset-m3">
                		<form method="POST"  id="SaveSong" action="{{url('SearchMovieList')}}">
                			{{ csrf_field() }}
                			<i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar Pelicula</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                		</form>
                	</div>
                </div>
                <div class="row">
                	@if($Movie->count() != 0 )
                		@foreach($Movie as $Movies)
                		<div class="col s12 m3">
		                  <div class="card" style="height: 430px">
		                    <div class="card-image">
                          <!--  <a href="{{url('PlayMovie/'.$Movies->id)}}" >
		                      <img src="movie/poster/{{$Movies->img_poster}}" width="100%" height="300px">
                        </a> -->
		                      <!-- <span class="card-title">Card Title</span> -->
		                    <!--  <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$Movies->id}}" onclick="fnOpenNormalDialog('{!!$Movies->cost!!}','{!!$Movies->title!!}','{!!$Movies->id!!}')"><i class="material-icons">add_shopping_cart</i></a>-->
                          @if($Movies['adquirido'])
                          <a class="waves-effect waves-light " href="{{ url('PlayMovie/'.$Movies['id']) }}">
                            <img src="movie/poster/{{$Movies->img_poster}}" width="100%" height="300px">
                          </a>

                           <a class="btn-floating btn-small halfway-fab waves-effect waves-light green" href="{{ url('PlayMovie/'.$Movies['id']) }}">
                               <i class="small material-icons">movie</i>
                           </a>
                           @else
                           
                           <a class="waves-effect waves-light " href="{{ url('PlayMovie/'.$Movies['id']) }}">
                                  <img  src="movie/poster/{{$Movies->img_poster}}" width="100%" height="300px"> </a>
                           
                           
                          <a class="btn-floating btn-small halfway-fab waves-effect waves-light blue" href="#"  onclick="fnOpenNormalDialog5('{!!$Movies['cost']!!}','{!!$Movies['title']!!}','{!!$Movies['id']!!}')">
                               <i class="small material-icons">movie</i>
                           </a>
                           @endif
		                    </div>
		                    <div class="card-content">
		                        <div class="col m12 s12">
		                            <p class="grey-text">{{ $Movies->title }}</p>
		                        </div>
		                        <div class="col m12 s12">
		                            <p class="grey-text"><b>Costo: </b> {{$Movies->cost}} tickets</p> 
		                        </div>
		                    </div>
		                  </div>
		                </div>

		
                		@endforeach
                		<div class="col m12">
                		</div>
                	@else
                	<div class="col m12">
		            <blockquote >
		                <i class="material-icons fixed-width large grey-text">movie</i><br><h5 class="grey-text">No hay peliculas disponibles</h5>
		            </blockquote>
		            <br>
		            </div>
                	@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">


/*function fnOpenNormalDialog5(cost,name,id) {

   swal({
            title: "¿Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback5(true,id);

          } else {
            callback5(false,id);
          }
        });
    };/
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<!-- <script>
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
                    
            url:'BuyMovie/'+id,
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
</script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function fnOpenNormalDialog5(cost,name,id) {
  
   swal({
            title: "¿Estas seguro?",
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
                    
            url:'BuyMovie/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes tickets, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('La pelicula ya forma parte de su colección','','error');
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
                    	swal('Pelicula comprada con exito','','success');
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
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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