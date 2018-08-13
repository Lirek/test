@extends('layouts.app')

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mi Música</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 @if($Singles != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Singles as $Single)
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            @if($Single->autors->photo)
                                <img src="{{asset($Single->autors->photo)}}?.{{rand(1,1000)}}" width="100%" height="220" style="">
                            @else
                                <img src="#" width="100%" height="220" style="">
                            @endif
                        </div>
                        <div class="profile-01 centered">
                            <p><a href="{{url('PlayList/' .$Single->id)}}" style="color: #ffff"> Añadir al Playlist</a></p>
                        </div>
                        <div class="centered">
                            <h3>{{$Single->autors->name}}</h3>
                            <h6>{{$Single->song_name}}</h6>
                            <audio  id="player">
                                <source src="{{asset($Single->song_file)}}" type="audio/mp3">
                            </audio>
                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                @endforeach
                @else
                    <h1>No Posee Singles</h1>
                @endif
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