@extends('layouts.app')

@section('css')
    <style type="text/css">
        .wrapper {
            margin: 100px auto;
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
@endsection

@section('main')

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content white-text">

                    <div class="row">
                        <div class="input-field col s12 m3 offset-m4">
                            <h4 class="titelgeneral"><i class="material-icons small">radio</i> Radios</h4>
                        </div>

                        <div class="input-field col s12 m4 ">
                            <form method="POST"  id="SaveSong" action="{{url('SearchListenRadio')}}">
                                {{ csrf_field() }}
                                <i class="material-icons prefix blue-text">search</i>
                                <input type="text" id="seach" name="seach" class="validate">

                                <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($Rad as $radios)
                            <div class="col s12 m4">
                                <div class="card">
                                    <div class="card-image" style="height: 300px; margin: 0px; padding: 0px;">
                                            <img src="{{asset($radios->logo)}}" height="300px">
                                            <span class="card-title truncate"><b>{{$radios->name_r}}</b></span>
                                    </div>
                                    <div class="card-content" style="padding: 20px;">
                                        <div class="progress">
                                            <div id="playRad" class="indeterminate blue"></div>
                                        </div>
                                            <div>
                                                <br>
                                                <div class="row">
                                            <div class="col s12 m8  offset-m1">
                                            <audio  id="player" controls></audio>
                                            </div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                          @foreach($Radio as $radios)
                                <div class="col s6 m2 ">
                                    <div class="card">
                                        <div class="card-image" style="height: 146px;">
                                            <a href="{{url('ListenRadio/'.$radios->id)}}"><img src="{{asset($radios->logo)}}" height="145px"></a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{url('ListenRadio/'.$radios->id)}}"><i class="material-icons">radio</i></a>
                                        </div>
                                        <div class="card-action ">
                                            <br>
                                            <b class="grey-text truncate">{{$radios->name_r}}</b>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>


                      </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-action-btn click-to-toggle direction-top">
    <a class="btn-floating btn-large waves-effect waves-light green">
        <i class="large material-icons">share</i>
    </a>
    <ul>
        <li><a href="{{$radios->facebook}}" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a></li>
        <li><a  href="{{$radios->google}}"  class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a></li>
        <li><a href="{{$radios->twitter}}"class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a></li>
        <li><a href="{{$radios->instagram}}" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a></li>
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
                    src: '{{asset($radios->streaming)}}',
                    type: 'audio/mp3',
                },

            ],
        };
        players.play(); //inicia radio al abrir pagina
        players.volume = 0.5; // Sets volume at 50%
    </script>

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