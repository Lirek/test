@extends('seller.layouts')
@section('content')
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  @include('flash::message')
<div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
  <div class=""> 
      <div class="white">
        <h2><span class="card-title">
          <u>
            <em>Mi cartelera</em>
          </u>
        </span></h2>      
      </div>
  </div>
</div>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
<div class="col-md-12" >
    @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')
      @if($modulos!=false)
        @foreach($modulos as $mod)
          @if($mod->name == 'Musica')
            <div class="col-sm-2 box0">
              <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}">
                <div class="box1" style="padding: 10%;">
                  <span class="li_music"></span>
                  <h3 style="margin-top: 2%;">{{ $musical_content }}</h3>
                </div>
              </a>
            </div>
          @endif
          @if($mod->name =='Peliculas')
            <div class="col-sm-2 box0">
              <a href="{{ url('/movies') }}">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-film"></span>
                  <h3>{{ $movie_content + $serie_content }}</h3>
                </div>
              </a>
            </div>
          @endif
          @if($mod->name == 'Libros')
            <div class="col-sm-2 box0">
              <a href="{{ url('/tbook') }}">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-book"></span>
                  <h3>{{ $book_content +  $megazine_content }}</h3>
                </div>
              </a>
            </div>
          @endif
          @if($mod->name == 'Radios')
            <div class="col-sm-2 box0">
              <a href="#">
                <div class="box1" style="padding: 10.3%;">
                  <span class="glyphicon glyphicon-stats"></span>
                  <h3>{{ $radio_content }}</h3>
                </div>
              </a>
            </div>
          @endif
          @if($mod->name == 'TV')
            <div class="col-sm-2 box0">
              <a href="#">
                <div class="box1" style="padding: 10%;">
                  <span class="li_tv"></span>
                  <h3 style="margin-top: 2%;">{{ $tv_content }}</h3>
                </div>
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
  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
<div class="col-md-12" style="margin-top: 12px;">

  <div class="row mt">
    <div class="text-center">
      <div class="col-sm-6">
          <h4><b>Total de contenido:</b> {{ $total_content }}</h4>
      </div>
      <div class="col-sm-6">
          <h4><b>Contenido aprobado:</b> {{ $total_aproved }}</h4>
      </div>
    </div>
    <!--CONTENIDO RECIENTE-->
      <div class="col-md-11 col-sm-11 mb" style="margin-left: 2%; margin-top: 2%">
        <div class="white-panel panRf pe donut-chart">
          <div class="col-sm-12 col-xs-12 col-md-12 goleft">
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th><i class="fa fa-bullhorn" style="color: #23B5E6"></i>Nombre</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"  style="color: #23B5E6"></i>Tipo</th>
                  <th class="hidden-phone"  ><i class="fa fa-money" style="color: #23B5E6"></i>Costo</th>
                  <th><i class=" fa fa-edit"  style="color: #23B5E6"></i>Estatus</th>
                </tr>
              </thead>
              <tbody>  
                @if($Albums)
                  @foreach($Albums as $albums)
                    <tr class="letters">
                      <td><span class="bg-r"><i class="li_vynil" style="color: #23B5E6"></i></span></td>
                      <td><a href="#"> {{$albums->name_alb}}</a></td>
                      <td class="hidden-phone">Album Musical</td>
                      <td class="hidden-phone">{{$albums->cost}}</td>
                      <td>{{$albums->status}}</td>
                    </tr>
                  @endforeach
                @endif

                @if($Tv)
                  @foreach($Tv as $tv)
                  <tr class="letters">
                    <td><span class="bg-r"><i class="li_tv" style="color: #23B5E6"></i></span></td>
                    <td><a href="#"> {{$tv->name_r}}</a></td>
                    <td class="hidden-phone">TV Online</td>
                    <td class="hidden-phone">Gratis</td>
                    <td>{{$tv->status}}</td>
                  </tr>
                  @endforeach
                @endif

                @if($Book)
                  @foreach($Book as $book)
                  <tr class="letters">
                    <td><span class="bg-r"><i class="fa fa-book" style="color: #23B5E6"></i></span></td>
                    <td><a href="#"> {{$book->title}}</a></td>
                    <td class="hidden-phone">Libro</td>
                    <td class="hidden-phone">{{$book->cost}}</td>
                    <td>{{$book->status}}</td>
                  </tr>
                  @endforeach
                @endif

                @if($Megazines)
                  @foreach($Megazines as $megazines)
                    <tr class="letters">
                      <td><span class="bg-r"><i class="li_news" style="color: #23B5E6"></i></span></td>
                      <td><a href="#"> {{$megazines->title}}</a></td>
                      <td class="hidden-phone">Revista</td>
                      <td class="hidden-phone">{{$megazines->cost}}</td>
                      <td>{{$megazines->status}}</td>
                    </tr>
                    @endforeach
                  @endif

                  @if($Radio)
                    @foreach($Radio as $radio)
                      <tr class="letters">
                        <td><span class="bg-r"><i class="fa fa-microphone" style="color: #23B5E6"></i></span></td>
                        <td><a href="#"> {{$radio->name_r}}</a></td>
                        <td class="hidden-phone">Radio Online</td>
                        <td class="hidden-phone">Gratis</td>
                        <td>{{$radio->status}}</td>
                      </tr>
                    @endforeach
                  @endif

                  @if($Movies)
                    @foreach($Movies as $movies)
                      <tr class="letters">
                        <td><span class="bg-r"><i class="fa fa-video-camera" style="color: #23B5E6"></i></span></td>
                        <td><a href="#"> {{$movies->title}}</a></td>
                        <td class="hidden-phone">Pelicula</td>
                        <td class="hidden-phone">{{$movies->cost}}</td>
                        <td>{{$movies->status}}</td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
    <!-- <div class="col-sm-4 mb">
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
    </div> -->
<!--     <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
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
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido publicado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-star-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> 0  </i></h1>
          </div>
        </footer>
      </div>
    </div>

  
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
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
  </div>
  </div> -->

<!-- <div class="col-md-12" style="">
<div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
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

    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
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
</div>    -->
@endsection
@section('js')
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
@endsection
