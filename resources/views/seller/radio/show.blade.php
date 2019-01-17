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
        margin: 0px 25%;
        width: 30px;
    }
    .plyr--audio .plyr__controls{
        background-color: #dddcdc;
        padding: 20px;
        border-radius: 50px;
        height: 60px;
    }

    .plyr--audio .plyr__progress{
        margin: 24px;
        left: 0;
    }

    .plyr--full-ui input[type=range]::-webkit-slider-thumb{
        opacity: 0;
        transform: scale(0);
        transition: all 0.2s ease;
        height: 16px;
        width: 16px;
    }

    .plyr--full-ui input[type=range]::-webkit-slider-runnable-track {
        height: 5px;
    }

    .plyr--audio .plyr__progress__buffer {
        color: rgba(94, 186, 246, 0.4);
    }
</style>
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            @include('flash::message')
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> {{ $radio->name_r }} </h4>
                <div class="row">
                    <div class="col s12 m4">
                        <img src="{{ asset($radio->logo) }}" width="100%" height="300" style="bor<der-radius: 10px" id="panel" class='materialboxed'>
                        <br>
                        <a href="{{ url('/radios') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                        <a href="{{ route('radios.edit', $radio->id) }}" class="btn curvaBoton waves-effect waves-light green">Modificar</a>
                    </div>
                    <div class="col s12 m8">
                        <div class="collection-item" style="padding: 15%">
                            <div class="card-content" style="padding: 5%;">
                                <br>
                                <div class="row">
                                    <div class="col s12">
                                        <div  id="play_ico">
                                            <img class="img-play" src="{{asset('plugins/materialize_adm/img/radio/ecualizador1.gif')}}" alt="Reproducto de radio leipel" >
                                        </div>
                                        <div id="off_ico" style="display: none;" >
                                            <img class=" img-play" src="{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}" alt="Reproducto de radio leipel">
                                        </div>
                                        <div  class="wrapper">
                                            <audio id="player"></audio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($radio->web!=null)
                                <a href="{{$radio->web}}" target="_blank" class="btn-floating grey"><i class="mdi mdi-earth"></i></a>
                            @endif
                            @if($radio->facebook!=null)
                                <a href="{{$radio->facebook}}" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                            @endif
                            @if($radio->google!=null)
                                <a href="{{$radio->google}}" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                            @endif
                            @if($radio->twitter!=null)
                                <a href="{{$radio->twitter}}" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                            @endif
                            @if($radio->instagram!=null)
                                <a href="{{$radio->instagram}}" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
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
    <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
    <script type="text/javascript">
        //const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
        const players = new Plyr('#player', {
            controls: [
                'mute',
                'current-time',
                'play',
                'volume',
            ]
        });

        players.source = {
            type: 'audio',
            sources: [
                {
                    src: '{{asset($radio->streaming)}}',
                    type: 'audio/mp3',
                },

            ],
        };
        $('#off_ico').hide();
        players.play(); //inicia radio al abrir pagina
        players.volume = 0.5; // Sets volume at 50%
        players.on('playing', event => {
            $('#off_ico').hide();
            $('#play_ico').show();
        });
        players.on('pause', event => {
           $('#play_ico').hide();
           $('#off_ico').show();
        });
    </script>
@endsection