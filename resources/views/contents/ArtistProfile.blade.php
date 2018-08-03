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
            				<div class="center-align">
								<img src="{{asset($Artist->photo)}}" class="img-circle" width="30%" height="150">
							</div>
            			 </div>
                	</div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection