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

                <div class="col-md-5 col-xs-12">
                    <div id="panel" class="img-rounded img-responsive av text-center">
                        <div class="widget-user-header bg-black">
                            <div class="widget-user-image">
                                <img class="img-responsive av" src="{{ asset($serie->img_poster) }}" style="width:100%; height:500px; border-radius:2%;" alt="">
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-stacked">
                        <li>
                            <h6> <b>Categorias:</b> 
                                @foreach($tags as $t)
                                    <span>| {{ $t->tags_name }} |</span>
                                @endforeach
                            </h6>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7" style="margin-top: 1%">
                    <h4 class="widget-user-desc"><b>Serie:</b> "{{ $serie->title }}" ({{ $serie->release_year }})</h4>
                    <ul class="nav nav-stacked">
                        <li>
                            <h4> 
                                <b>{{ $serie->cost }} tickets</b>
                            </h4>
                        </li>
                        <li>
                            <h4> <b>Estatus de transmisión:</b> 
                                <span class="pull-right ">{{ $serie->status_series }}</span>
                            </h4>
                        </li>
                        <li>
                            <h4> <b>Historia:</b>
                                <br>
                                <h4><p class="text-justify"> {{ $serie->story }} </p></h4>
                            </h4>
                        </li>
                        <li>
                            @if($serie->saga_id!=null)
                                <h4> <b>Saga:</b> <span class="pull-right "> {{ $serie->saga->sag_name }} </span></h4>
                                <div class="col-xs-5">
                                    <h4> <b>Antes:</b> <span class=""> {{ $serie->before }} </span> </h4>
                                </div>
                                <div class="col-xs-7">
                                    <h4> <b>Después:</b> <span class=""> {{ $serie->after }} </span> </h4>
                                    <br>
                                </div>
                            @else
                                <h4> <b>Saga:</b> <span class="pull-right ">No tiene saga</span></h4>
                            @endif
                        </li>
                        <li>
                            <h4> <b>Estatus de aprobación:</b> 
                                <span class="pull-right ">{{ $serie->status }}</span>
                            </h4>
                        </li>
                        <li>
                            <h4>
                                <a href="{{ $serie->trailer }}" target="_blank"><span class="glyphicon glyphicon-link"></span><b> Ver trailer</b></a>
                            </h4>
                        </li>
                    </ul>
                    <div class="col-md-12 col-xs-12 table-responsive">
                        <div class="box-footer no-padding">
                            <h3><b>Episodios:</b></h3>
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
                </div>



                
                <div class="col-md-12">
                    
                    <div class="col-xs-6">
                        <div align="right">
                            <a href="{{ url('/series') }}" class="btn btn-danger">Atrás</a>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div align="left">
                            <a href="{{ route('series.edit',$serie->id) }}" class="btn btn-primary">Modificar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection