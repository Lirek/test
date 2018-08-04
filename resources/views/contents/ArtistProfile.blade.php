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
            				<div class="col-sm-5 col-xs-5 col-md-5" >
            					<div class="center-align">
									<img src="{{asset($Artist->photo)}}" class="img-circle" width="55%" height="150">
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
				  					<h4>Tipo: {{$Artist->type_authors}}</h4>
				  				</div>
								
            			 </div>
                	</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection