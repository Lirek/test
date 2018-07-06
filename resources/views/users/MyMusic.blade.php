@extends('layouts.app')

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mi Musica</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 @if($Singles != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Singles as $Single)
                <div class="col-lg-5 col-md-5 col-sm-5 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            @if($Single->autors->photo)
                                <img src="{{asset($Single->autors->photo)}}?.{{rand(1,1000)}}" width="100%" height="220" style="">
                            @else
                                <img src="#" width="100%" height="220" style="">
                            @endif
                        </div>
                        <div class="profile-01 centered">
                            <p><a href=""> Añadir al Playlist</p>
                        </div>
                        <div class="centered">
                            <h3>{{$Single->autors->name}}</h3>
                            <h6>{{$Single->song_name}}</h6>
                            <audio id="player" style="width:100%;" controls controlsList="nodownload">
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


@endsection