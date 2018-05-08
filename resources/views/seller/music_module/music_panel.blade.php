@extends('seller.layouts')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Panel de Contenido Musical</div>
                @include('flash::message')
                <div class="panel-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Mis Albums</h3>
                </div>
            <div class="panel-body">
                  <table class="table table-hover">

                    <thead>

                            <tr>
                            <th>Nombre del Album</th>
                            <th>Artista</th>
                            <th>Fecha de Publicacion</th>
                            <th>Duracion</th>
                            <th>Costo</th>
                            <th>Estatus</th>
                        </tr>

                    </thead>

                    <tbody>
                            @foreach($albums as $album)
                         <tr>
                            <th>{{$album->name_alb}}</th>
                            <th>{{$album->autors->name}}</th>
                            <th>{{$album->created_at}}</th>
                            <th>{{$album->duration}}</th>
                            <th>{{$album->cost}}</th>
                            <th>{{$album->status}}</th>
                             <th>

                                <a href="{{ url('/delete_album/'.$album->id) }}"
                                   onclick="return confirm('¿ Desea eliminar la emisora  {{ $album->name_alb }} ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="{{ url('/modify_album/'.$album->id) }}" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                                &nbsp;
                                <a href="{{ url('/show_album/'.$album->id) }}" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                            </th>
                        </tr>
                            @endforeach

                    </tbody>

                  </table>
                </div>
            {!! $albums->render() !!}
            </div>


            <div class="panel panel-default">

            <div class="panel-heading">
                    <h3>Mis Singles</h3>
            </div>

              <div class="col-md-8">

                  <table class="table table-hover">

                    <thead>

                            <tr>
                            <th>Nombre del Single</th>
                            <th>Artista</th>
                            <th>Duracion</th>
                            <th>Costo</th>
                            <th>Fecha de Publicacion</th>
                            <th>Estatus</th>
                            <th>Audio</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                     @foreach($singles as $song)
                         <tr>
                            <th>{{$song->song_name}}</th>
                            <th>{{$song->autors->name}}</th>
                            <th>{{$song->duration}}</th>
                            <th>{{$song->cost}}</th>
                            <th>{{$song->created_at}}</th>
                            <th>{{$song->status}}</th>

                            <th>
                            <audio controls="" src="{{$song->song_file}}">
                                <source src="{{$song->song_file}}" type="audio/mpeg">
                                </audio>
                            </th>
                            <th>
                                <a href="{{ url('/delete_song/'.$song->id) }}"
                                   onclick="return confirm('¿ Desea eliminar el single  {{ $song->song_name }} ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="{{ url('/modify_single/'.$song->id) }}" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                            </th>
                        </tr>
                            @endforeach

                    </tbody>

                  </table>
                </div>
            {!! $singles->render() !!}
                </div>
            </div>


              </div>
            </div>
        </div>
    </div>

</div>

@endsection
