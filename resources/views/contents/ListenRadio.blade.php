@extends('layouts.app')

@section('css')

    <link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <style type="text/css">

        .plyr {
            margin: 0 auto;
            border-radius: 6px;
        }
        .plyr--audio .plyr__controls {
            background: #ffffff;
            border-radius: inherit;
            color: #4f5b5f;
            padding: 10px;
        }
        .plyr--audio {
            max-width: 120px;
            min-width: 180px;
        }
        .plyr button {
            background: #9e9e9e ;
            font: inherit;
            line-height: inherit;
            width: auto;
            color: #fff;
        }
        button:focus {
            color: #fff;
            background: #2196f3;
        }

    </style>
@endsection

@section('main')

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content white-text">


        <div class=" col s12 ">
            <h4 class="titelgeneral center"><i class="material-icons small">radio</i> Radios</h4>
        </div>

        <div class="row">
            @foreach($Rad as $radios)
                <div class="col s12 m5 l3  offset-m1 offset-l3 ">
                    <div class="card">
                        <div class="card-image" style="height: 235px; margin: 0px; padding: 0px;">
                            <img src="{{asset($radios->logo)}}" height="235px">
                        </div>
                    </div>
                </div>
                <div class="col s12 m5 l3">
                    <div class="card">

                        <div class="card-content" style="padding: 13px;" height="310px">
                            <div class="row">
                                <div class="col s12 ">
                                    <div  id="play_ico" style="display: none;">
                                        <img class="img-play" src="{{asset('plugins/materialize_adm/img/radio/ecualizador1.gif')}}" alt="Reproducto de radio leipel" >
                                    </div>
                                    <div id="off_ico"  >
                                        <img class=" img-play" src="{{asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')}}" alt="Reproducto de radio leipel">
                                    </div>
                                    <?php $r=$radios->streaming ?>
                                    <div  class="wrapper">
                                        <audio id="player"></audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

       <div class="row">
        <div class="input-field col s12 m4 offset-m4 ">
            <form method="POST"  id="SaveSong" action="{{url('SearchListenRadio')}}">
                {{ csrf_field() }}
                <i class="material-icons prefix blue-text">search</i>
                <input type="text" id="seach" name="seach" class="validate">
                <input type="hidden" name="type" id="type">
                <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
            </form>
        </div>
       </div>


    <div class="row">
        @foreach($Radio as $radios)
            <div class="col s4 m2 ">
                <div class="card">
                    <div class="card-image" style="height: 140px;">
                        <a href="{{url('ListenRadio/'.$radios->id)}}" class="waves-effect"><img src="{{asset($radios->logo)}}" height="145px"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    </div>
    </div>
    </div>



    <div class="fixed-action-btn click-to-toggle direction-top">
        <a class="btn-floating btn-large waves-effect waves-light green">
            <i class="mdi mdi-forum-outline"></i>
        </a>
        <ul>
            <li><a href="{{$radios->facebook}}"  target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a></li>
            <li><a href="{{$radios->google}}"    target="_blank"  class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a></li>
            <li><a href="{{$radios->twitter}}"   target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a></li>
            <li><a href="{{$radios->instagram}}" target="_blank" class="btn-floating purple-gradient"><i class="mdi mdi-instagram"></i></a></li>
        </ul>
    </div>

@endsection

@section('js')

    <script type="text/javascript">
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
                    src: '{{asset($r)}}',
                    type: 'audio/mp3',
                },

            ],
        };

        players.play(
            event => {
                    $('#off_ico').hide();
                    $('#play_ico').show();
                }
        ); //inicia radio al abrir pagina
        players.volume = 0.5; // Sets volume at 50%

        players.on('playing', event => {
            if(players.playing){
                $('#off_ico').hide();
                $('#play_ico').show();
            }
        });
         players.on('pause', event => {
           $('#play_ico').hide();
           $('#off_ico').show();
         });
    </script>

    <script src="{{asset('assets/js/jquery.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#seach').keyup(function(evento){
                $('#buscar').attr('disabled',true);
            });
            $('#buscar').attr('disabled',true);
            $('#seach').autocomplete({
                source: "{{ url('SearchRadio') }}",
                minLength: 2,
                messages: {
                    noResults: '',
                    results: function() {}
                },
                select: function(event, ui){
                    $('#seach').val(ui.item.value);
                    var valor = ui.item.value;
                    console.log(valor);
                    if (valor=='No se encuentra...'){
                        $('#buscar').attr('disabled',true);
                        swal('Radio no se encuentra regitrada','','error');
                    }else{
                        $('#buscar').attr('disabled',false);
                    }
                }

            });
        });
    </script>

@endsection