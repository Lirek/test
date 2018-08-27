@extends('layouts.app')

@section('css')

@endsection

@section('main')  

<div class="row" style="">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="panel panel-default">
                    <div class="panel-body">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
                            @foreach($Radio as $radios)
                            <h3><span class="card-title"><center><b><i class="fa fa-volume-up"></i> {{$radios->name_r}}</b></center></span></h3>
                            <div class="col-sm-12 col-xs-12 col-md-12">
                                <div class="col-sm-4 col-xs-12 col-md-4">
                                    <a class="waves-effect waves-light btn blue darken-3" href="{{$radios->facebook}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-facebook" ></i>
                                    </a>
                                    <a class="waves-effect waves-light btn blue" href="{{$radios->twitter}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-xs-12 col-md-4"  >
                                    <img src="{{asset($radios->logo)}}" class="img-responsive" width="70%" style="margin-top: 15%;">
                                </div>
                                <div class="col-sm-4 col-xs-12 col-md-4">
                                    <a class="waves-effect waves-light btn red" href="{{$radios->google}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%"> 
                                        <i class="fa fa-youtube"></i>
                                    </a>    
                                    <a class="waves-effect waves-light btn pink" href="{{$radios->instagram}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 2%">
                                <audio  id="player" controls  autoplay >
                                    <source src="{{asset($radios->streaming)}}" type="audio/mp3" allow="autoplay">
                                </audio>
                            </div>
            				@endforeach
                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top: 2%">
                                <div class="form-group">
                                    <a href="{{ url('ShowRadio') }}">Atrás</a>
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
</div>
@endsection
@section('js')

<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>


@endsection