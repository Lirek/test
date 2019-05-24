@extends('seller.layouts')
@section('css')
 <style>
    .default_color{background-color: #FFFFFF !important;}
    .img{margin-top: 7px;}
    .curva{border-radius: 10px;}
    .curvaBoton{border-radius: 20px;}
    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    .wrapper {
        margin: 100px auto;
        width: 30px;
    }
    .player {
        position: relative;
        /*
        padding-bottom: 56.25%;
        padding-top: 35px;
        height: 250px;
        width: 190%;
        margin-left: -79px;
        */
        overflow: hidden;
    }
    .player  iframe {
        position: absolute;
        margin: 0;
        top:0;
        left: 0;
        /*
        width: 100%;
        height: 100%;*/
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            @include('flash::message')
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> {{ $tv->name_r }} </h4>
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{ asset($tv->logo) }}" width="100%" height="300" style="bor<der-radius: 10px" id="panel" class='materialboxed'>
                        <br>
                        <a href="{{ url('/tvs') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                        <a href="{{ route('tvs.edit', $tv->id) }}" class="btn curvaBoton waves-effect waves-light green">Modificar</a>
                    </div>
                    <div class="col s12 m8">
                        <div class="collection-item">
                            <div class="card-content">
                                <div class="plyr__video" id="player">
                                    <iframe align="middle" src="{{asset($tv->streaming)}}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency
                                    allow="autoplay" height="500" width="100%" scrolling="no" style="border:10px;">
                                    </iframe>
                                </div>
                            </div>
                            @if($tv->web!=null)
                                <a href="{{$tv->web}}" target="_blank" class="btn-floating grey"><i class="mdi mdi-earth"></i></a>
                            @endif
                            @if($tv->facebook!=null)
                                <a href="{{$tv->facebook}}" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                            @endif
                            @if($tv->google!=null)
                                <a href="{{$tv->google}}" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                            @endif
                            @if($tv->twitter!=null)
                                <a href="{{$tv->twitter}}" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                            @endif
                            @if($tv->instagram!=null)
                                <a href="{{$tv->instagram}}" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
                            @endif
                        </div>
                        <div class="col s12">
                            <div class="card blue accent-2">
                                <div class="card-content white-text center-align">
                                    <p class="card-title">
                                        <i class="material-icons">volume_up</i>
                                        Se ha reproducido {{$reproducciones->count()}}
                                        @if($reproducciones->count()==1)
                                            vez
                                        @else
                                            veces
                                        @endif
                                    </p>
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
        $(document).ready(function(evento){
            $('#player').addClass('player');
            var wSize = $(window).width();
            if (wSize <= 768) {
            }
        })
    </script>
@endsection