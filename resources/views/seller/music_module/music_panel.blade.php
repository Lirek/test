@extends('seller.layouts')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>
                            Panel de Contenido Musical
                        </h3>
                    </div>
                    @include('flash::message')
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis Albunes</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Álbum</th>
                                            <th>Artista</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Duración</th>
                                            <th>Costo</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach($albums as $album)
                                        <tbody>
                                            <tr>
                                                <th>{{$album->name_alb}}</th>
                                                <th>{{$album->autors->name}}</th>
                                                <th>{{$album->created_at}}</th>
                                                <th>{{$album->duration}}</th>
                                                <th>{{$album->cost}}</th>
                                                <th>{{$album->status}}</th>
                                                <th>
                                                    <a href="{{ url('/show_album/'.$album->id) }}" class="btn btn-info btn-xs">
                                                        <span class="fa fa-play-circle" aria-hidden="true"></span>
                                                    </a>
                                                    <a href="{{ url('/modify_album/'.$album->id) }}" class="btn btn-warning btn-xs">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    <a href="{{ url('/delete_album/'.$album->id) }}" onclick="return confirm('¿Desea eliminar el Álbum {{ $album->name_alb }}?')" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            {!! $albums->render() !!}
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Mis Canciones</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la Canción</th>
                                            <th>Artista</th>
                                            <th>Duración</th>
                                            <th>Costo</th>
                                            <th>Fecha de Publicación</th>
                                            <th>Estatus</th>
                                            <th>Audio</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    @foreach($singles as $song)
                                        <tbody>
                                            <tr>
                                                <th>{{$song->song_name}}</th>
                                                <th>{{$song->autors->name}}</th>
                                                <th>{{$song->duration}}</th>
                                                <th>{{$song->cost}}</th>
                                                <th>{{$song->created_at}}</th>
                                                <th>{{$song->status}}</th>
                                                <th>
                                                    <audio controls="">
                                                        <source src="{{ asset($song->song_file) }}" type="audio/mp3">
                                                    </audio>
                                                </th>
                                                <th>
                                                    <a href="{{ url('/modify_single/'.$song->id) }}" class="btn btn-warning btn-xs">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>
                                                    <a href="{{ url('/delete_song/'.$song->id) }}" onclick="return confirm('¿Desea eliminar la canción {{ $song->song_name }}?')" class="btn btn-danger btn-xs">
                                                        <span class="glyphicon glyphicon-remove"></span>
                                                    </a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                            {!! $singles->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
