@extends('layouts.app')
@section('css')
    <style>
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("{{ asset($Movies->img_poster) }}");
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
@section('main')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h2 class="widget-user-desc"><b>Pelicula:</b> "{{ $Movies->title }}"</h2>

                <div class="box box-widget widget-user-2">
                    <div class="col-md-12">
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default">Ver Pelicula</a>
                       
                    </div>
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div id="panel" style="" class="img-rounded img-responsive av text-center">
                    </div>
                    <br>
                    <div class="box-footer no-padding">
                        <div class="col-md-8 col-md-offset-2">
                            <ul class="nav nav-stacked">
                                <li>
                                    <h4>
                                        Titulo Original:
                                        <span class="pull-right ">
                                            "{{ $Movies->original_title }}"
                                        </span>
                                    </h4>
                                </li>
                                <li>
                                    <h4>Sinopsis: <span class="pull-right "></span></h4>{{ $Movies->story }}
                                </li>
                                <li>
                                    <h4> Categoría: <span class="pull-right"> {{ $Movies->rating->r_name }} </span>
                                    </h4>
                                </li>
                                <li>
                                    @if($Movies->sagas!=null)
                                        <h4>Saga: <span class="pull-right ">{{ $Movies->sagas->sag_name }}</span></h4>
                                    @else
                                        <h4>Saga: <span class="pull-right ">No tiene Saga</span></h4>
                                    @endif
                                </li>
                                <li>
                                    <h4>País:<span class="pull-right">{{$Movies->country}}</span></h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="widget-user-header bg-navy">
                            
                        </div>
                        <div class="form-group">
                            <a href="{{ url('MyMovies') }}" class="btn btn-danger">Atrás</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- /.modal -->
        <div class="modal fade in modal-warning" id="modal-default">
            <div class="modal-body">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center">{{ $Movies->title }}</h4>
                    </div>
                    <div class="modal-body text-center">
                        <video  id="player">
                             <source src="{{ asset('/movie/film')}}/{{ $Movies->duration }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
@endsection
@section('js')

<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
  

@endsection