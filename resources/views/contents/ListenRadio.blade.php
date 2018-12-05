@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('main')
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content white-text">
                        @foreach($Rad as $radios)
                                            <h2><span class="card-title"><center><h3 style="color: #428bca"> {{$radios->name_r}}</h3></center></span></h2>
                                            <div class="col s12 m12">

                                               <center><img src="{{asset($radios->logo)}}" class="img-responsive" width="17%" style="margin-top: 2%;"></center>

                                            </div>

                                            <div class="col m3">

                                            </div>
                                            <div class="col s12 m6" align="center">
                                                <audio  id="player" controls  data-plyr-config='{"autoplay": true}'>
                                                    <source src="{{asset($radios->streaming)}}" type="audio/mp3" >
                                                </audio>
                                            </div>
                                            <div class="col m3">

                                            </div>
                                        @endforeach


                        <div class="row">
                            <div class="input-field col s12 m6 offset-m3">
                                <form method="POST"  id="SaveSong" action="{{url('SearchListenRadio')}}">
                                    {{ csrf_field() }}
                                    <i class="material-icons prefix blue-text">search</i>
                                    <input type="text" id="seach" name="seach" class="validate">
                                    <label for="seach">Buscar otra radio</label><br>
                                    {{--<button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>--}}
                                </form>
                            </div>
                        </div>



                        <div class="row">
                                @foreach($Radio as $radios)
                                <div class="col s12 m3">
                                    <div class="card">
                                        <div class="card-image" style="height: 200px;">
                                            <a href="{{url('ListenRadio/'.$radios->id)}}"><img src="{{asset($radios->logo)}}" height="200px"></a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{url('ListenRadio/'.$radios->id)}}"><i class="material-icons">radio</i></a>

                                        </div>
                                        <div class="card-action ">
                                            <b class="grey-text">{{$radios->name_r}}</b>
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
        <li><a href="{{$radios->instagram}}" class="btn-floating deep-purple darken-2"><i class="mdi mdi-instagram"></i></a></li>
    </ul>
</div>

@endsection

@section('js')

    <script type="text/javascript">

        const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));

    </script>

    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


    <script type="text/javascript">

        $(document).ready(function(){
            $('#seach').keyup(function(evento){
                $('#buscar').attr('disabled',true);
            });
            $('#buscar').attr('disabled',true);
            $('#seach').autocomplete({
                source: "SearchRadio",
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