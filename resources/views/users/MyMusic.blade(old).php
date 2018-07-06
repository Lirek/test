@extends('layouts.app')

@section('content')

<div class="container">
	   <div class="row">
       <input id="myInput" type="text" placeholder="Buscar" class="form-horizontal">
     </div>
  
<div class="row">
	<div id="myDIV" class="col-md-8">
			 
			 @if($Singles != 0)

        @foreach($Singles as $Single)
			 	
              		<div class="col-md-3 {{$Single->song_name}}" style="border-color: black;border: 12px;" id="{{$Single->id}}">
              			<img src="{{asset($Single->autors->photo)}}" style="width: 20%; height: 20%;">
              			<div class="container">
              				<h4><b>{{$Single->song_name}}</b></h4>
              				<p>{{$Single->autors->name}}</p>
              				<p>{{$Single->duration}}</p>
              				<p><button style="background-color: #13ec58"><i class="fa fa-plus" value="{{$Single->song_file}}"></i>Añadir al Playlist</button></p>

              			</div>
              		</div>
             	
        @endforeach

        @else
          <h1>No Posee Singles</h1>
       @endif
        
       @if($Albums != 0)
          
          @foreach($Albums as $Album)
             	
        
             	
          @endforeach
          
          @else
          <h1>No Posee Albumes Comprados</h1>

       @endif

  </div>

</div>



</div>






@endsection