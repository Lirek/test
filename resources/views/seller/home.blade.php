@extends('seller.layouts')
@section('content')
  <!--main content start-->
  @include('flash::message')

  
<style type="text/css">

</style>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
  <div class="row">
    <div class="col s12 m12">
        <div class="card-content white-text">
          <span class="card-title grey-text"><h3><i class="material-icons">apps</i> Cartelera</h3></span>
          <br>
          {{--Peliculas--}}
          @if(count($Movies)>0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text"><h4><i class="mdi mdi-movie-roll"></i> Cine</h4></span>
            <span class="card-title grey-text left" style="padding-left: 5%"><h5><i class="material-icons">movie</i> Pelicula</h5></span>
            <br><br><br><br>
            <div class="row">
              @foreach($Movies as $m)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{asset('movie/poster')}}/{{$m->img_poster}}" height="300px" onclick="masInfo('pelicula',{!!$m->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Movies->links()}}
            <br>
            </div>
          @endif

          @if(count($Series)>0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text left" style="padding-left: 5%"><h5><i class="material-icons">movie</i> Serie</h5></span>
            <br><br><br><br>
            <div class="row">
              @foreach($Series as $s)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset($s->img_poster) }}" height="300px" onclick="masInfo('serie',{!!$s->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Series->links()}}
            <br>
            </div>
          @endif

          {{--Musica--}}
          @if(count($Albums)>0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text left" style="padding-left: 5%"><h5><i class="material-icons">music_note</i> Música</h5></span>
            <br><br><br><br>
            <div class="row">
              @foreach($Albums as $a)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset($a->cover) }}" height="300px" >
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Albums->links()}}
            <br>
            </div>
          @endif

          {{--libros--}}
          @if(count($Book)> 0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text"><h4><i class="material-icons">book</i> Lectura</h4></span>
            <span class="card-title grey-text left" style="padding-left: 5%"><h5><i class="material-icons">bookmark</i> Libro</h5></span>
            <br><br><br><br>
            <div class="row">
              @foreach($Book as $b)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('images/bookcover/') }}/{{$b->cover }}" height="300px" onclick="masInfo('libro',{!!$b->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Book->links()}}
            <br>
            </div>
          @endif

          {{--Revista--}}
          @if(count($Megazines)> 0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text left" style="padding-left: 5%"><h5><i class="material-icons">bookmark_border</i> Revista</h5></span>
            <br><br><br><br>
            <div class="row">
              @foreach($Megazines as $m)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset($m->cover)}}" height="300px" onclick="masInfo('revista',{!!$m->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Megazines->links()}}
            <br>
            </div>
          @endif

          {{--Radio--}}
          @if(count($Radio)>0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text"><h4><i class="material-icons">radio</i> Radio</h4></span>
            <div class="row">
              @foreach($Radio as $r)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{asset($r->logo)}}" height="100px" onclick="masInfo('radio',{!!$r->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Radio->links()}}
            <br>
            </div>
          @endif

          {{--tv--}}
          @if(count($Tv)>0)
            <div class="card" style="padding: 0px 20px">
            <span class="card-title grey-text"><h4><i class="material-icons">tv</i> Tv</h4></span>
            <div class="row">
              @foreach($Tv as $tv)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('/images/tv/') }}/{{ $tv->logo }}"  height="100px" onclick="masInfo('tv',{!!$tv->id!!})">
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
            {{$Tv->links()}}
            <br>
            </div>
          @endif
      </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
  
      function masInfo(tipo,id) {
        console.log(tipo,id);

        if (tipo=="radio") {
            var ruta = "{{ url('/ListenRadio/') }}/"+id;
            location.href = ruta;
          } else if (tipo=="tv") {
            var ruta = "{{ url('/PlayTv/') }}/"+id;
            location.href = ruta;
          } else if (tipo=="serie") {
            var ruta = "{{ url('/series/') }}/"+id;
            location.href = ruta;
          } else if (tipo=="pelicula") {
            var ruta = "{{ url('/movies/') }}/"+id;
            location.href = ruta;
          } else if (tipo=="revista") {
            var ruta = "{{ url('/show_megazine/') }}/"+id;
            location.href = ruta;
          } else if (tipo=="libro") {
            var ruta = "{{ url('/tbook/') }}/"+id;
            location.href = ruta;
            }
        }
</script>
@endsection
