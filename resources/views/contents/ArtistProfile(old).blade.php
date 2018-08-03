@extends('layouts.app')

@section('main')

<div class="container">
	<div class="row">
		<div class="col s5">
			<div class="card-panel">
				<div class="center-align">
					<img src="{{asset($Artist->photo)}}" class="responsive-img circle center-align">
				</div>
				<div class="divider"></div>
				<h5 class="center">{{$Artist->name}}</h5>
				<div class="center">
				<span class="flag-icon flag-icon-{{strtolower($Artist->country)}}"></span>
				</div>
				<p>{{$Artist->descripcion}}</p>
				<div class="divider"></div>
				<br>
				  <div class="center">

					<a class="waves-effect waves-light btn blue darken-3" href="{{$Artist->facebook}}" target="blank">
					<i class="fab fa-facebook"></i>
					</a>

					<a class="waves-effect waves-light btn red" href="{{$Artist->google}}" target="blank"> 
					<i class="fab fa-youtube"></i>
					</a>

					<a class="waves-effect waves-light btn pink" href="{{$Artist->instagram}}" target="blank">
					<i class="fab fa-instagram"></i>
					</a>

					<a class="waves-effect waves-light btn blue" href="{{$Artist->twitter}}" target="blank">
					<i class="fab fa-twitter"></i>
					</a>

				  </div>
			</div>
		</div>

		<div class="col s7">
			<div class="card-panel">
				<div class="center"><h3>Discografia</h3></div>
				
				<div class="divider"></div>
				
					@if($Singles!=NULL)
					 
					 <ul class="collection with-header">
        				
        				<li class="collection-header"><h5>Singles</h5></li>
        					@foreach($Singles as $Single) 
 							<li class="collection-item">
 								<div>
 									{{$Single->song_name}}
 									<a href="#!" class="secondary-content tooltipped" data-position="right" data-tooltip="Costo {{$Single->cost}}">
 								<i class="fas fa-shopping-cart"></i>
 							</a></div>
 							@endforeach
        		        </li>
        
      				 </ul>
	
						
							
					@endif
					<div class="divider"></div>
					<h5>Albumes</h5>
				@if($Albums != NULL)
				  <ul class="collapsible">

					@foreach($Albums as $Album)
					<li>
						<div class="collapsible-header">{{$Album->name_alb}}</div>
						<div class="collapsible-body">
							<div class="center">
							<img src="{{asset($Album->cover)}}" width="300" height="300" class="responsive-img circle">
							</div>
							<table>
								<thead>
									<td>Nombre</td>
									<td>Duracion</td>
								</thead>
								<tbody>
									@foreach($Album->songs as $songs)
									<tr>
									 <td>{{$songs->song_name}}</td>
									 <td>{{$songs->duration}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</li>
					@endforeach
				  </ul>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection

@section('js')

@endsection