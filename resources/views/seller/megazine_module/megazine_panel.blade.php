@extends('seller.layouts')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">Panel de Contenido </div>
                @include('flash::message')
                <div class="panel-body">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Mis Revistas</h3>
                </div>
            <div class="panel-body">
                  <table class="table table-hover">
                
                    <thead>   
                            <tr>
                            <th>Cadena de Publicacion</th>
                            <th>Numero Revistas</th>
                            <th>Fecha de Publicacion</th>
                            <th>Estatus</th>
                        </tr>
                
                    </thead>
                
                    <tbody>
                            @foreach($collection as $pub_c)
                         <tr>
                            <th>{{$pub_c->sag_name}}</th>
                            <th>0</th>
                            <th>{{$pub_c->created_at}}</th>
                            <th>{{$pub_c->status}}</th>
                             <th>
                                
                                <!-- <a href="{{ url('/type_delete/'.$pub_c->id) }}"
                                   onclick="return confirm('¿ Desea eliminar la cadena de publicacion  {{ $pub_c->sag_name }} ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="{{ url('/type_update/'.$pub_c->id) }}" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                                &nbsp; -->
                                <a href="{{ url('/show_pub/'.$pub_c->id) }}" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                            </th>
                        </tr>
                            @endforeach

                    </tbody>

                  </table> 
                </div>
            {!! $collection->render() !!}
            </div>


            <div class="panel panel-default">

            <div class="panel-heading">
                    <h3>Mis Revistas Independientes</h3>
            </div>

              <div class="col-md-8">

                  <table class="table table-hover">
                
                    <thead>   
                
                            <tr>
                            <th>Revista</th>
                            <th>Costo</th>
                            <th>Fecha de Publicacion</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                
                    </thead>
                
                     @foreach($single as $megazine)
                         <tr>
                            <th>{{$megazine->title}}</th>
                            <th>{{$megazine->cost}}</th>
                            <th>{{$megazine->created_at}}</th>
                            <th>{{$megazine->status}}</th>

                            <th>
                                <a href="{{ url('/show_megazine/'.$megazine->id) }}" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                                </th>
                            <th>
                                <!-- <a href="{{ url('/delete_megazine/'.$megazine->id) }}"
                                   onclick="return confirm('¿ Desea eliminar la revista   {{ $megazine->title }} ?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp; -->
                                <a href="{{ url('/megazine_i_update/'.$megazine->id) }}" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                            </th>
                        </tr>
                            @endforeach

                    </tbody>

                  </table> 
                </div>
            {!! $single->render() !!}                  
                </div>
            </div>                
                
                
              </div>
            </div>
        </div>
    </div>

</div>

@endsection
