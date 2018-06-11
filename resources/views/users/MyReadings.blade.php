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
                  	<a href="{{url('Read/'.$Book->id)}}"><button class="btn btn-primary btn-xs" id="book" style="background-color: #13ec58"><i class="fa fa-book"></i>   Leer
                  	</button></a>
            	</div>
       		 </div>

     	    </div>
		@endforeach
		</div>	
	@if($Megazines != 0)		
		<div class="row">
			@foreach($Megazines as $Megazine)

			<div class="col-md-4">
			
			  <div class="card" style="margin-left: 12px; margin-top: 12px">
    		 	<img src="{{asset($Megazine->cover)}}" alt="portada" style="width:100%">
        		<div class="container-card" style="background-color: gray">
          			<h4><b>{{$Megazine->title}}</b></h4> 
            			<p>·Costo{{$Megazine->cost}}</p>
             			<p>·Proveedor {{$Megazine->Seller->name}}</p>
             			<p>·Sinopsis: 
             				{{$Megazine->descripcion}}
             			</p>
                  	<button value1="{{$Megazine->id}}" value2="{{$Megazine->title}}" value3="{{$Megazine->cost}}" data-toggle="modal" data-target="#BuyBook" class="btn btn-primary btn-xs" id="book" style="background-color: #13ec58"><i class="fa fa-ticket"></i> {{$Megazine->cost}}  Comprar
                  	</button>
            	</div>
       		  </div>
     	    </div>
			@endforeach
		</div>

	</div>
  @endif
	@endsection
@section('js')
<script>


		
</script>		

@endsection