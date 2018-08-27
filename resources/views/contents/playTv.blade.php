@extends('layouts.app')

@section('css')

@endsection

@section('main')  

<div class="row" style="">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
                            @foreach($Tv as $tv)
                             <h2><span class="card-title"><center><i class="fa fa-tv"></i> {{$tv->name_r}}</center></span></h2><br>
                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 1%">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <div class="col-sm-10 col-xs-12 col-md-10">
                                        <div class="plyr__video" id="player">
                                            <iframe align="middle" src="{{asset($tv->streaming)}}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay" height="405" width="90%" scrolling="no"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 col-md-2">
                                        <center><img src="{{asset($tv->logo)}}" class="img-responsive" width="90%" style="margin-top: 5%; margin-left: 15%"></center>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 col-md-2" style="margin-top: 6%">
                                        
                                    </div>
                                    <div class="col-sm-1 col-xs-12 col-md-1">
                                        <a class="waves-effect waves-light btn red" href="{{$tv->google}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%"> 
                                        <i class="fa fa-youtube"></i>
                                        </a>    
                                        <a class="waves-effect waves-light btn pink" href="{{$tv->instagram}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-xs-12 col-md-1">
                                        <a class="waves-effect waves-light btn blue darken-3" href="{{$tv->facebook}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-facebook" ></i>
                                        </a>
                                        <a class="waves-effect waves-light btn blue" href="{{$tv->twitter}}" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
            				@endforeach
                            <div class="col-md-8 col-sm-8 col-xs-8" style="margin-top: 2%">
                                <div class="form-group">
                                    <a href="{{ url('ShowTv') }}">Atrás</a>
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