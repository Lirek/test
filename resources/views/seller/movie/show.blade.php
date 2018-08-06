@extends('seller.layouts')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-widget widget-user ">
                    <div class="widget-user-header bg-black">
                        <div class="widget-user-image">
                            <img class="img-circle img-responsive av" src="{{ asset('movie/poster')}}/{{ $movie->img_poster}}" style="width:90px;height:90px;" alt="User Avatar">
                        </div>
                    </div>
                    <div class="box-footer padding bg-gray">
                        <br>
                        <ul class="nav">
                            <li class="text-center">
                                <h1><b>Titulo:</b> {{$movie->title}}</h1>
                                <video poster="{{ asset('movie/poster')}}/{{ $movie->img_poster}}" id="player" controls>
                                    <source src="{{ asset('/movie/film')}}/{{ $movie->duration }}" type="video/mp4">
                                    <source src="{{ asset('/movie/film')}}/{{ $movie->duration }}" type="video/webm">
                                </video>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="box-footer no-padding">
                        <div class="col-md-12">
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4>
                                        Titulo original:
                                        <span class="pull-right ">
                                            "{{ $movie->original_title }}"
                                        </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4>Sinopsis: <span class="pull-right "></span></h4>{{ $movie->story }}
                                </li>
                                <li>
                                    <h4> Historia: <span class="pull-right"></span></h4>{{ $movie->based_on }}
                                </li>
                                <li>
                                    @if($movie->trailer_url!=null)
                                        <h4>Link del Trailer: <span class="pull-right"><a href="{{ $movie->trailer_url }}">{{ $movie->trailer_url }}</a></span></h4>
                                    @else
                                        <h4>Link del Trailer: <span class="pull-right">No tiene Link</span></h4>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-1">
                            <div align="right">
                                <a href="{{ url('/movies') }}" class="btn btn-danger">Atrás</a>
                            </div>
                        </div>
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