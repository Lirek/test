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

  </style>
@endsection

@section('main')
<div class="row">
	<div class="col s12 m12">
		<div class="card">
			<div class="card-content white-text">
				<span class="grey-text"><h4><b><i class="material-icons small">book</i> Libros</b></h4></span>
                <div class="row">
                	<div class="input-field col s12 m6 offset-m3">
                		<form method="POST"  id="SaveSong" action="{{url('SearchProfileAuthor')}}">
                			{{ csrf_field() }}
                			<i class="material-icons prefix blue-text">search</i>
                            <input type="text" id="seach" name="seach" class="validate">
                            <input type="hidden" name="type" id="type">
                            <label for="seach">Buscar libro</label><br>
                            <br>
                            <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                		</form>
                	</div>
                </div>
                <div class="row">
                	@if($Books->count() != 0 )
                		@foreach($Books as $Book)
                		<div class="col s12 m3">
		                  <div class="card" style="height: 430px">
		                    <div class="card-image">
		                        <a href="#myModal-{{$Book->id}}" class="modal-trigger">
		                      <img src="{{ asset('/images/bookcover') }}/{{ $Book->cover }}" width="100%" height="300px">
		                      </a>
		                      <!-- <span class="card-title">Card Title</span> -->
		                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="#" id="modal-confir.{{$Book->id}}" onclick="fnOpenNormalDialog('{!!$Book->cost!!}','{!!$Book->title!!}','{!!$Book->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
		                    </div>
		                    <div class="card-content">
		                        <div class="col m12">
		                            <p class="grey-text">{{ $Book->title }}</p>
		                        </div>
		                        <div class="">
		                            <small class="grey-text"><b>Autor: </b>{{$Book->author->full_name}}</small>
		                        </div>
		                            <small class="grey-text"><b>Costo: </b> {{$Book->cost}} tickets</small> 
		                    </div>
		                  </div>
		                </div>

		                <!--MODAL DETALLE DE LIBRO-->
		                <div id="myModal-{{$Book->id}}" class="modal">
						    <div class="modal-content">
						     	<div class="blue"><br>
						            <h4 class="center white-text" ><i class="small material-icons">book</i> {{$Book->title}}</h4>
						            <br>
						     	</div>
						      	<div class="col s12 m4">
						      		<br>
			                    	<img src="{{ asset('images/bookcover/') }}/{{$Book->cover}}" width="100%" height="300"  id="panel">
			                    	<a class="btn halfway-fab waves-effect waves-light blue curvaBoton" href="#" id="modal-confir.{{$Book->id}}" onclick="fnOpenNormalDialog('{!!$Book->cost!!}','{!!$Book->title!!}','{!!$Book->id!!}')"><i class="material-icons">add_shopping_cart</i></a>
			                    	<br><br>
			                 	</div>
						    </div>
						    <div class="col m7 s12">
						    	<br>
		                    <ul class="collection z-depth-1" style="color: black">
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">create</i>
		                                    <b class="left">Titulo original: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    {{$Book->original_title}}
		                                </div>
		                            </div>
		                        </li>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">turned_in</i>
		                                    <b class="left">Géneros: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                     @foreach($Book->tags_book as $t)
		                                    <span class=""> {{ $t->tags_name }} </span>
		                                    @endforeach
		                                </div>
		                            </div>
		                        </li>
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">star</i>
		                                    <b class="left">Categoria: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    {{ $Book->rating->r_name }}
		                                </div>
		                            </div>
		                        </li>
		                        @if($Book->saga!=null)
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">folder</i>
		                                    <b class="left">Saga: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    {{ $book->saga->sag_name }}
		                                </div>
		                            </div>
		                        </li>
		                        @else
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">folder</i>
		                                    <b class="left">Saga: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    No pertenece a una saga
		                                </div>
		                            </div>
		                        </li>
		                        @endif
		                        <li class="collection-item" style="padding: 10px ">
		                            <div class="row">
		                                <div class="col s12 m5">
		                                    <i class="material-icons circle left">local_play</i>
		                                    <b class="left">Costo: </b>
		                                </div>
		                                <div class="col s12 m7">
		                                    {{ $Book->cost }} Tickets
		                                </div>
		                            </div>
		                        </li>
		                    </ul>
		                	</div>
		                	<div class="col s12 m12" style="color: black">
		                		<b class="left">Sinopsis:</b>
		                		<p>{{ $Book->sinopsis }}</p>
		                	</div>
		                	<div class="col s12 m12">
							    <div class="modal-footer">
							      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
							    </div>
							</div>
						</div>

                		@endforeach
                		<div class="col m12">
                		{{  $Books->links() }}
                		</div>
                	@else
                	<div class="col m12">
		            <blockquote >
		                <i class="material-icons fixed-width large grey-text">book</i><br><h5 class="grey-text">No hay libros disponibles</h5>
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
<script src="{{asset('assets/js/jquery.js') }}"></script>
<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
      			swal('No se encuentra regitrado','','error');
      		}else{
            $('#type').val(ui.item.type);
      			$('#buscar').attr('disabled',false);
      		}
      	}

   });
  });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function fnOpenNormalDialog(cost,name,id) {
  
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
                    
            url:'BuyBook/'+id,
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