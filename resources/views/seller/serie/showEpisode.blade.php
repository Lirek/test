@extends('seller.layouts')
@section('css')
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-widget widget-user">
                    <div class="box-footer padding bg-gray">
                        <br>
                        <ul class="nav">
                            <li class="text-center">
                                <h1><b>Episodio:</b> {{$episode->episode_name}}</h1>
                                <video id="player" controls>
                                    <source src="{{ asset($episode->episode_file) }}" type="video/mp4">
                                    <source src="{{ asset($episode->episode_file) }}" type="video/webm">
                                </video>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="box-footer no-padding">
                        <div class="col-md-12">
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4> Sinopsis:
                                        <span class="pull-right text-justify"> {{ $episode->sinopsis }} </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4> Trailer: 
                                        <span class="pull-right"> <a href="{{ $episode->trailer_url }}" target="_blank">{{ $episode->trailer_url }}</a> </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4> Costo en tickets: 
                                        <span class="pull-right"> {{ $episode->cost }} </span>
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-1">
                            <div align="right">
                                <a href="{{ route('series.show', $idSerie) }}" class="btn btn-danger">Atrás</a>
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