@extends('seller.layouts')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <div class="box box-widget widget-user ">
                    <div class="col-md-12"> 
                        <h4><b>Película:</b> "{{$movie->title}}" ({{$movie->release_year}}) </h4>
                    </div>
                    <div class="col-md-6">
                        <div class="widget-user-header bg-black">
                            <div class="widget-user-image">
                                <img class="img-responsive av" src="{{ asset('movie/poster')}}/{{ $movie->img_poster}}" style="width:450px;height:550px; border-radius:2%;" alt="User Avatar">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer no-padding">
                        <div class="col-md-6">
                            <h4><b>Costo: </b> {{ $movie->cost }} tickets</h4>
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4>
                                        <b>Titulo original:</b>
                                        <span class="">
                                            "{{ $movie->original_title }}"
                                        </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4><b>Sinopsis: </b>
                                        <span class="pull-right "></span>
                                    </h4>
                                    <h3 class="text-justify">    
                                        {{ $movie->based_on }}
                                    </h3>
                                </li>
                                <li>
                                    <h5> <b>Genero:</b> 
                                        @foreach($movie->tags_movie as $t)
                                            <span>| {{ $t->tags_name }} |</span>
                                        @endforeach
                                    </h5>
                                </li>
                                {{--
                                <li>
                                    <h2>Historia: <span class="pull-right"></span></h2>{{ $movie->story }}
                                </li>
                                --}}
                                <li>
                                    @if($movie->trailer_url!=null)
                                        <li>
                                            <h4>
                                                <a href="{{ $movie->trailer_url }}" target="_blank">
                                                    <span class="glyphicon glyphicon-link"></span>
                                                    <b> Ver trailer </b>
                                                </a>
                                            </h4>
                                        </li>
                                    @else
                                        <h2>No tiene trailer</h2>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-12" style="margin-top: 2%">
                        <div class="box-footer padding bg-gray">
                            <div class="text-center">
                                <video style="" poster="{{ asset('movie/poster')}}/{{ $movie->img_poster}}" id="player" controls>
                                    <source src="{{ asset('/movie/film')}}/{{ $movie->duration }}" type="video/mp4">
                                    <source src="{{ asset('/movie/film')}}/{{ $movie->duration }}" type="video/webm">
                                </video>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="form-group col-md-12" align="center">
                        <a href="{{ url('/movies') }}" class="btn btn-danger">Atrás</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
@section('js')
    <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
    <script type="text/javascript">
        const player = new Plyr('#player');
    </script>
@endsection