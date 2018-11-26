@extends('seller.layouts')
@section('content')
  <!--main content start-->
  @include('flash::message')

  
<style type="text/css">

</style>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-content white-text">
          <span class="card-title grey-text"><h3><i class="material-icons">apps</i> Cartelera</h3></span>

          <br>

          {{--Peliculas--}}
          @if($Movies!=null)
            <span class="card-title grey-text"><h4><i class="material-icons">local_movies</i> Peliculas</h4></span>
            <div class="row">
              @foreach($Movies as $m)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{asset('movie/poster')}}/{{$m->img_poster}}" height="300px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          {{--Musica--}}
          @if(!$Albums)
            <span class="card-title grey-text"><h4><i class="material-icons">music_note</i> Música</h4></span>
            <div class="row">
              @foreach($Albums as $a)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset($a->cover) }}" height="300px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          {{--libros--}}
          @if($Book!=null)
            <span class="card-title grey-text"><h4><i class="material-icons">book</i> Lectura</h4></span>
            <span class="card-title grey-text"><h5><i class="material-icons">bookmark</i> Libro</h5></span>
            <div class="row">
              @foreach($Book as $b)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('images/bookcover/') }}/{{$b->cover }}" height="300px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          {{--Revista--}}
          @if($Megazines!=null)
            <span class="card-title grey-text"><h5><i class="material-icons">bookmark_border</i> Revista</h5></span>
            <div class="row">
              @foreach($Megazines as $m)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset($m->cover)}}" height="300px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          {{--Radio--}}
          @if(!$Radio!=null)
            <span class="card-title grey-text"><h4><i class="material-icons">radio</i> Radio</h4></span>
            <div class="row">
              @foreach($Radio as $r)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{asset($r->logo)}}" height="100px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif

          {{--tv--}}
          @if(!$Tv!=null)
            <span class="card-title grey-text"><h4><i class="material-icons">tv</i> Tv</h4></span>
            <div class="row">
              @foreach($Tv as $tv)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('/images/tv/') }}/{{ $tv->logo }}"  height="100px">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>




@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection
