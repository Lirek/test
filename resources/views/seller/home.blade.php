@extends('seller.layouts')
@section('content')
  <!--main content start-->
  @include('flash::message')

  
<style type="text/css">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.content-all{
    width: 210px;
    margin: auto;
    perspective: 800px;
    position: relative;
    margin-top: 50px;
}

.content-carrousel{
    width: 100%;
    position: absolute;
    animation: rotar 10s infinite linear;
    transform-style: preserve-3d;
}

.content-carrousel:hover{
    animation-play-state: paused;
    cursor: pointer;
}


.content-carrousel figure{
    width: 100%;
    height: 150px;
    overflow: hidden;
    position: absolute;
    box-shadow: 0px 0px 20px 0px black;
    transition: all 300ms;
    
}

.content-carrousel figure:hover{
    box-shadow: 0px 0px 0px 0px black;
    transition: all 300ms;
}

.content-carrousel figure:nth-child(1){transform: rotateY(0deg) translateZ(300px);}
.content-carrousel figure:nth-child(2){transform: rotateY(40deg) translateZ(300px);}
.content-carrousel figure:nth-child(3){transform: rotateY(80deg) translateZ(300px);}
.content-carrousel figure:nth-child(4){transform: rotateY(120deg) translateZ(300px);}
.content-carrousel figure:nth-child(5){transform: rotateY(160deg) translateZ(300px);}
.content-carrousel figure:nth-child(6){transform: rotateY(200deg) translateZ(300px);}
.content-carrousel figure:nth-child(7){transform: rotateY(240deg) translateZ(300px);}
.content-carrousel figure:nth-child(8){transform: rotateY(280deg) translateZ(300px);}
.content-carrousel figure:nth-child(9){transform: rotateY(320deg) translateZ(300px);}
.content-carrousel figure:nth-child(10){transform: rotateY(360deg) translateZ(300px);}

.content-carrousel img{
    width: 100%;
    height: 100%;
    transition: all 300ms;
}

.content-carrousel img:hover{
    transform: scale(1.2);
    transition: all 300ms;
}


@keyframes rotar{
    from{
        transform: rotateY(0deg);
    }to{
        transform: rotateY(360deg);
    }
}

</style>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
  <div class="row">
    <div class="col s12">
      <div class="center">
      <ul class="tabs">
        <li class="tab col s3"><a href="#peliculas">peliculas</a></li>
        <li class="tab col s2"><a href="#musica">musica</a></li>
        <li class="tab col s3"><a href="#lectura">lectura</a></li>
        <li class="tab col s2"><a href="#radio">radio</a></li>
        <li class="tab col s2"><a href="#tv">tv</a></li>
      </ul>
      </div>
    </div>

    <div id="peliculas" class="carousel">
      @if($Movies)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Movies as $m)
            <figure><img src="{{asset('movie/poster')}}/{{$m->img_poster}}"></figure>
            @endforeach
        </div>
      </div>
    @endif
    </div>

    <div id="musica" class="carousel">
      @if($Albums)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Albums as $a)
            <figure><img src="{{ asset($a->cover) }}"></figure>
            @endforeach
        </div>
      </div>
    @endif
    </div>

    <div id="lectura" class="carousel">
      <!-- @if($Megazines)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Megazines as $m)
            <figure><img src="{{ asset($m->cover)}}"></figure>
            @endforeach
        </div>
      </div>
      @endif -->
      @if($Book)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Book as $b)
            <figure><img src="{{ asset('images/bookcover/') }}/{{$b->cover }}"></figure>
            @endforeach
        </div>
      </div>
      @endif
    </div>

    <div id="radio" class="carousel">
      @if($Radio)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Radio as $r)
            <figure><img src="{{asset($r->logo)}}"></figure>
            @endforeach
        </div>
      </div>
    @endif
    </div>

    <div id="tv" class="carousel">
      @if($Tv)
      <div class="content-all">
        <div class="content-carrousel">
          @foreach($Tv as $tv)
            <figure><img src="{{ asset('/images/tv/') }}/{{ $tv->logo }}"></figure>
            @endforeach
        </div>
      </div>
    @endif
    </div>
</div>

@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection
