@extends('seller.layouts')
@section('css')
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("{{ asset($serie->img_poster) }}");
            margin-top: 5%;
            background-position: center center;
            width: 100%;
            min-height: 500px;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h2 class="widget-user-desc"><b>Serie:</b> "{{ $serie->title }}"</h2>

                <div class="box box-widget widget-user-2">
                    <div id="panel" class="img-rounded img-responsive av text-center">
                    </div>
                    <br>
                    <div class="box-footer no-padding">
                        <div class="col-md-8 col-md-offset-2">
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4> Historia: 
                                        <p class="pull-right "> {{ $serie->story }} </p>
                                    </h4>
                                </li>
                                <li>
                                    <h4> Año de lanzamiento: 
                                        <span class="pull-right"> {{ $serie->release_year }} </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4> Costo en tickets:
                                        <span class="pull-right"> {{ $serie->cost }} </span>
                                    </h4>
                                </li>
                                <li>
                                    @if($serie->saga_id!=null)
                                        <h4> Saga: <span class="pull-right "> {{ $serie->saga->sag_name }} </span></h4>
                                        <h4> Antes: <span class="pull-right"> {{ $serie->before }} </span> </h4>
                                        <h4> Después: <span class="pull-right"> {{ $serie->after }} </span> </h4>
                                    @else
                                        <h4> Saga: <span class="pull-right ">No tiene saga</span></h4>
                                    @endif
                                </li>
                                <li>
                                    <h4>Episodios:</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            @if($episodes!=null)
                                <h4>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nombre del episodio</th>
                                                <th>Sinopsis</th>
                                                <th>Trailer</th>
                                                <th>Ver episodio</th>
                                                <th>Costo</th>
                                            </tr>
                                        </thead>
                                        @foreach($episodes as $episode)
                                            <tbody class="text-center">
                                                <tr>
                                                    <td> {{ $episode->episode_name }} </td>
                                                    <td class="text-justify"> {{ $episode->sinopsis }} </td>
                                                    <td>
                                                        <a href="{{ $episode->trailer_url }}" target="_blank">
                                                        <span class="glyphicon glyphicon-link"></span>
                                                        </a>
                                                    </td>
                                                    <td> 
                                                        <a href="{{ route('series.showEpisode',[$episode->id,$serie->id]) }}" class="btn btn-info btn-xs">
                                                            <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                        </a>
                                                    </td>
                                                    <td> {{ $episode->cost }} </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </h4>
                            @else
                                <span class="pull-right"> No tiene episodios </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div align="right">
                            <a href="{{ url('/series') }}" class="btn btn-danger">Atrás</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div align="left">
                            <a href="{{ route('series.edit',$serie->id) }}" class="btn btn-primary">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection