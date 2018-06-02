@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Tv live
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
{{--                        {{ dd($movie->duration) }}--}}

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-widget widget-user ">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                        <div class="widget-user-image">
                            {{--<img class="img-circle img-responsive" src="http://lorempixel.com/128/128/sports" alt="User Avatar">--}}
                            <img class="img-circle img-responsive av" src="/movie/poster/{{ $movie->img_poster }}"
                                 style="width:90px;height:90px;  " alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username"></h3>
                        <h5 class="widget-user-desc"></h5>
                    </div>
                    <div class="box-footer padding bg-gray">
                        <br/>
                        <ul class="nav ">
                            <li class="text-center">
                                {{--<a href="#">--}}

                                {{--</a>--}}
                            </li>
                            <br/>
                            <li class="text-center">
                                {{--<a href="#">--}}

                                {{--</a>--}}
                            </li>
                            <br/>
                            <br/>
                            <li class="text-center">
                                {{--<div class="embed-responsive-item html5-video-container">--}}
                                {{--<iframe class="embed-responsive-item" style="height:380px; width:660px"--}}
                                {{--src="/movie/movies/{{ $movie->duration }}"></iframe>--}}
                                {{--</div>--}}
                                {{--{{ dd($a ="/movie/movies/$movie->duration ") }}--}}
                                <video controls  width="600"
                                       height="400">
                                    <source src="/movie/film/{{ $movie->duration }}" type="video/mp4">
                                    <source src="/movie/film/{{ $movie->duration }}" type="video/webm">
                                    <source src="/movie/film/{{ $movie->duration }}" type="video/ogg">
                                    Su navegador no soporta el contenido multimedia
                                </video>

                                {{--<video width="854" height="480" src="movie/movies/{{ $movie->duration }}" frameborder="0"--}}
                                {{--allow="autoplay; encrypted-media" allowfullscreen></video>--}}

                            </li>
                            <br/>
                            <br/>
                            <li class=" btn-group-justified btn-group-xs">
                                {{--                                @if($movie->facebook <> null )--}}
                                {{--<a href="{{ $movie->facebook }}" class="btn btn-app btn-facebook active">--}}
                                {{--&nbsp;<span class="fa fa-facebook" aria-hidden="true"></span>&nbsp;--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--                                @if($movie->instagram <> null )--}}
                                {{--<a href="{{ $movie->instagram }}" class="btn btn-app btn-instagram active">--}}
                                {{--&nbsp;<span class="fa fa-instagram" aria-hidden="true"></span>&nbsp;--}}
                                {{--<span class="glyphicon glyphicon-wrench"></span>--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--                                @if($movie->google <> null )--}}
                                {{--<a href="{{ $movie->google }}" class="btn btn-app btn-google">--}}
                                {{--&nbsp;<span class="fa fa-google-plus"></span>&nbsp;--}}
                                {{--</a>--}}
                                {{--@endif--}}
                                {{--                                @if($movie->twitter <> null )--}}
                                {{--<a href="{{ $movie->twitter }}" class="btn btn-app btn-twitter">--}}
                                {{--&nbsp;<span class="fa fa-twitter"></span>&nbsp;--}}
                                {{--</a>--}}
                                {{--@endif--}}
                            </li>
                            <br/>
                            <br/>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection