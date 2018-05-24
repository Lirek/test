@extends('layouts.app')

@section('content')

<div class="container">
	
	<div class="row">
		<div class="row">
	<input id="myInput" type="text" placeholder="Search..">

	<div id="myDIV" class="col-md-8">
			 
			 @foreach($Singles as $Single)
			 	
              		<div class="col-md-3 {{$Single->song_name}}" style="border-color: black;border: 12px;">
              			<img src="{{asset($Single->autors->photo)}}" style="width: 20%; height: 20%;">
              			<div class="container">
              				<h4><b>{{$Single->song_name}}</b></h4>
              				<p>{{$Single->autors->name}}</p>
              				<p>{{$Single->duration}}</p>
              				<p><button style="background-color: #13ec58"><i class="fa fa-ticket"></i> {{$Single->cost}}  Comprar</button></p>

              			</div>
              		</div>
             	
             @endforeach

             @foreach($Albums as $Album)
             	
              
             	
             @endforeach
	</div>

</div>
	</div>

</div>

@endsection