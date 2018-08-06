@extends('seller.layouts')
@section('content')
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  <div class="row" style="margin-top: 2%;">
    <div class="col-md-12 col-md-offset-1">
      <h1>Mi contenido</h1>
    </div>
    @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')
      @if($modulos!=false)
        @foreach($modulos as $mod)
          @if($mod->name == 'Musica')
            <div class="col-sm-3 box0">
              <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}">
                <div class="box1" style="padding: 10%;">
                  <span class="li_music"></span>
                  <h3 style="margin-top: 2%;">{{ $musical_content }}</h3>
                </div>
                <p>
                  @if($musical_content>0)
                    Usted ha registrado {{ $musical_content }} contenidos musicales con nosotros, de los cuales 
                    @if($musical_aproved>0)
                      {{ $musical_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido musical con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name =='Peliculas')
            <div class="col-sm-3 box0">
              <a href="{{ url('/movies') }}">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-film"></span>
                  <h3>{{ $movie_content }}</h3>
                </div>
                <p>
                  @if($movie_content>0)
                    Usted ha registrado {{ $movie_content }} contenidos de películas con nosotros, de los cuales 
                    @if($movie_aproved>0)
                      {{ $movie_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido de películas con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name == 'Libros')
            <div class="col-sm-3 box0">
              <a href="{{ url('/tbook') }}">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-book"></span>
                  <h3>{{ $book_content }}</h3>
                </div>
                <p>
                  @if($book_content>0)
                    Usted ha registrado {{ $book_content }} contenidos de libros con nosotros, de los cuales 
                    @if($book_aproved>0)
                      {{ $book_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido de libros con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name == 'Series')
            <div class="col-sm-3 box0">
              <a href="{{ url('/series') }}">
                <div class="box1" style="padding: 10%;">
                  <span class="li_video"></span>
                  <h3 style="margin-top: 2%;">{{ $serie_content }}</h3>
                </div>
                <p>
                  @if($serie_content>0)
                    Usted ha registrado {{ $serie_content }} contenidos de series con nosotros, de los cuales 
                    @if($serie_aproved>0)
                      {{ $serie_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido de serie con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name == 'Revistas')
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-archive"></span>
                  <h3>{{ $megazine_content }}</h3>
                </div>
                <p>
                  @if($megazine_content>0)
                    Usted ha registrado {{ $megazine_content }} contenidos revistas con nosotros, de los cuales 
                    @if($megazine_aproved>0)
                      {{ $megazine_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido revista con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name == 'Radios')
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 10.3%;">
                  <span class="glyphicon glyphicon-stats"></span>
                  <h3>{{ $radio_content }}</h3>
                </div>
                <p>
                  @if($radio_content>0)
                    Usted ha registrado {{ $radio_content }} contenidos de radio con nosotros, de los cuales 
                    @if($radio_aproved>0)
                      {{ $radio_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido de radio con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
          @if($mod->name == 'TV')
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 10%;">
                  <span class="li_tv"></span>
                  <h3 style="margin-top: 2%;">{{ $tv_content }}</h3>
                </div>
                <p>
                  @if($tv_content>0)
                    Usted ha registrado {{ $tv_content }} contenidos de TV's con nosotros, de los cuales 
                    @if($tv_aproved>0)
                      {{ $tv_aproved }} están aprovados.
                    @else
                      aun no hay ninguno aprovado.
                    @endif
                  @else
                    Usted aun no ha registrado contenido de TV's con nosotros, le invitamos a que lo haga.
                  @endif
                </p>
              </a>
            </div>
          @endif
        @endforeach
      @else
        <div class="col-md-12 col-md-offset-1">
          <h1>Aún no posee módulos asignados.</h1>
        </div>
      @endif
    @endif
  </div>
  <!-- /row mt -->

  <div class="row mt">
    <div class="col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #04B486;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Seguidores</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-users fa-3x"></i>
          {{--
          <img src="{{asset('sistem_images/seguidores.png')}}" alt="seguidores" width="50%">
          --}}
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> {{ $followers }} </i></h1>
          </div>
        </footer>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #8A084B;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido creado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-files-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> {{ $total_content }} </i></h1>
          </div>
        </footer>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #088A68;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido publicado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-star-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> {{ $aproved_content }} </i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #04B486;">
        <div class="darkblue-header">
          <h1>Ventas</h1>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="">0</i></h1>
          </div>
        </footer>
      </div>
    </div>

    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #2ECCFA;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Balance de tickets</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-tags fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="">0</i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #FE2E2E;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Solicitudes administrador</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-comments fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class=""> 0</i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>
    
@endsection
@section('js')
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
@endsection
