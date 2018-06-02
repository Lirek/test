@extends('layouts.app')

	@section('content')
	<div class="container">
		
		<div class="row">
			
		@foreach($Books as $Book)
			<div class="col-md-4">
			
			  <div class="card">
    		 	<img src="/images/bookcover/{{$Book->cover}}" alt="portada" style="width:100%">
        		<div class="container-card" style="background-color: gray">
          			<h4><b>{{$Book->title}}</b></h4> 
            			<p>·Costo{{$Book->cost}}</p>
             			<p>·Autor {{$Book->author->full_name}}</p>
             			<p>·Sinopsis: 
             				{{$Book->sinopsis}}
             			</p>
                  	<button value1="{{$Book->id}}" value2="{{$Book->title}}" value3="{{$Book->cost}}" data-toggle="modal" data-target="#BuyBook" class="btn btn-primary btn-xs" id="book" style="background-color: #13ec58"><i class="fa fa-ticket"></i> {{$Book->cost}}  Comprar
                  	</button>
            	</div>
       		 </div>

     	    </div>
		@endforeach
		</div>	

		</div>

	<div class="modal modal-primary fade" id="BuyBook" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="background-color: rgb(35,181,230,0.5);">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

         <p id="SingleName"></p>
        

             <form method="POST"  id="SaveBook">
                              {{ csrf_field() }}


			<button type="submit" class="btn btn-primary" style="background-color: rgb(19,236,88, 0.5)">
                   Comprar
            </button>

             
         

        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
	@endsection
@section('js')
<script>

	
	$( document ).ready(function() {
    

		$(document).on('click', '#book',function() {
		  
  		  var BookId = $(this).attr('value1');
		  var BookName = $(this).attr('value2');
		  var BookCost = $(this).attr('value3');
		  var modal = $('#BuyBook').modal();

		  modal.find('.modal-title').text( 'Desea Comprar '+BookName+'¿Con Un Valor de '+BookCost+' tickets?');
		
		  		$( "#SaveBook" ).on( 'submit', function(e){
		  			e.preventDefault();

		  			$.ajax({

		  				url: 'BuyBook/'+BookId,
		  				type: 'POST',
		  				data: {
			       	  				_token: $('input[name=_token]').val()
			       	  		   },
		  				success: function (result) 
			       	  		{
			       	  			swal('Libro Comprado Con Exito','','success');

			       	  			if (result==0) 
			       	  				{	
			       	  					swal('No Posee Suficientes Creditos Por Favor Recargue','','error');	
			       	  				}
			       	  			if (result==1) 
			       	  			{
			       	  				swal('El Libro Ya Forma Parte de Su Coleccion','','error');
			       	  			}
			       	  		},
			       	  		error: function (result) 
			       	  		{
			       	  			
			       	  		}

		  			});
		  		
		  		});


		});
	});
		
</script>		

@endsection