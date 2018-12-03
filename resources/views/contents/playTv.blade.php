@extends('layouts.app')

@section('css')
<style type="text/css">
.player {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 35px;
    height: 250px;
    width: 190%;
    margin-left: -79px;
    overflow: hidden;
}
.player  iframe {
    position: absolute;
    margin: 0;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}

@import url("https://fonts.googleapis.com/css?family=Arimo:400,700");
* {
    -webkit-transition: 300ms;
    transition: 300ms;
}

/*.btn-circle {*/
/*width: 30px;*/
/*height: 30px;*/
/*text-align: center;*/
/*padding: 6px 0;*/
/*font-size: 12px;*/
/*line-height: 1.428571429;*/
/*border-radius: 15px;*/
/*}*/
/*.btn-circle.btn-lg {*/
/*width: 50px;*/
/*height: 50px;*/
/*padding: 10px 16px;*/
/*font-size: 18px;*/
/*line-height: 1.33;*/
/*border-radius: 25px;*/
/*}*/
/*.btn-circle.btn-xl {*/
/*width: 70px;*/
/*height: 70px;*/
/*padding: 10px 16px;*/
/*font-size: 24px;*/
/*line-height: 1.33;*/
/*border-radius: 35px;*/
/*}

/*
ul {
    list-style-type: none;
}

h1, h2, h3, h4, h5, p {
    font-weight: 400;
}

a {
    text-decoration: none;
    color: inherit;
}

a:hover {
    color: #6ABCEA;
}

.movie-card {
    background: #ffffff;
    box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 315px;
    margin: 2em;
    border-radius: 10px;
    display: inline-block;
}

.movie-header {
    padding: 0;
    margin: 0;
    height: 100%;
    width: 100%;
    display: block;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.header-icon-container {
    position: relative;
}

.movie-card:hover {
    -webkit-transform: scale(1.03);
    transform: scale(1.03);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
}

.movie-content {
    padding: 18px 18px 24px 18px;
    margin: 0;
}

.movie-content-header, .movie-info {
    display: table;
    width: 100%;
}

.movie-title {
    font-size: 15px;
    margin: 0;
    display: table-cell;
    word-break: break-all;
}

.info-section label {
    display: block;
    color: rgba(0, 0, 0, 0.5);
    margin-bottom: .5em;
    font-size: 9px;
}

.info-section span {
    font-weight: 700;
    font-size: 11px;
}

@media screen and (max-width: 500px) {
    .movie-card {
        width: 100%;
        max-width: 100%;
        margin: 1em;
        display: block;
    }
}
*/
</style>
@endsection

@section('main')




    <div class="row">

        <div class="row">


            <div class="card col s12 m12" style="padding: 2px 10px 10px 10px;">

                @foreach($Tv as $tv)
                    <div class="col s12 m12">
                        <h5 class="blue-text"> {{$tv->name_r}}</h5>
                        <div class="plyr__video" id="player">
                            <iframe align="middle" src="{{asset($tv->streaming)}}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency
                                    allow="autoplay" height="500" width="80%" scrolling="no" border="0" style="border:0px;">
                            </iframe>
                        </div>
                    </div>
                @endforeach

                    <div class="row">
                        <div class="input-field col s12 m6 offset-m3">
                            <form method="POST"  id="SaveSong" action="{{url('SearchPlayTv')}}">
                                {{ csrf_field() }}
                                <i class="material-icons prefix blue-text">search</i>
                                <input type="text" id="seach" name="seach" class="validate">
                                <input type="hidden" name="type" id="type">

                                <br>
                                <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
                            </form>
                        </div>
                    </div>



            @foreach($Tvs as $tv)

                    <div class="col s6 m3">
                        <div class="card">
                            <div class="card-image">
                             <a href="{{url('PlayTv/'.$tv->id)}}"><img src="{{asset($tv->logo)}}" width="100%" height="170px"></a>
                             <a  href="{{url('PlayTv/'.$tv->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">live_tv</i></a>
                            </div>
                            <div class="card-content">
                                <h6 class="truncate grey-text">{{$tv->name_r}}</h6>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>


        </div>



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
        source: "{{url('SearchTv')}}",
        minLength: 2,
        select: function(event, ui){        
            $('#seach').val(ui.item.value);
            var valor = ui.item.value;
          console.log(valor);
            if (valor=='No se encuentra...'){
                $('#buscar').attr('disabled',true);
                swal('Tv no se encuentra regitrada','','error');
            }else{
                $('#buscar').attr('disabled',false);
            }
        }

   });
  });
</script>
<script type="text/javascript">
    $(document).ready(function(evento){
        var wSize = $(window).width();
            if (wSize <= 768) {
                $('#player').addClass('player');
                $('#rrss').css('margin-left','10%%')
            }
    })
</script>

@endsection