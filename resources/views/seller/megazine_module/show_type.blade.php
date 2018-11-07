@extends('seller.layouts')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <div class="form-group col-md-6">
                          
                        <img src="{{asset($type->img_saga)}}" class=".img-thumbnail" style="width:200px;height:200px;  " >

                        </div>
                        
                                                <table class="table table-hover">

                    <thead>

                            <tr>
                            <th>Revista</th>
                            <th>Costo</th>
                        </tr>

                    </thead>

                     @foreach($type->megazines()->get() as $megazines)
                         <tr>
                            <th>
                                {{$megazines->title}}
                            </th>

                            <th>
                                {{$megazines->cost}}
                            </th>

                            <th>
                            <!-- <a href="{{ url('/delete_megazine/'.$megazines->id) }}"
                            onclick="return confirm('多 Desea eliminar la revista  {{ $megazines->title }} ?')"
                            class="btn btn-danger active ">
                             <span class="glyphicon glyphicon-remove-circle"></span>
                         </a>
                         &nbsp; -->
                         <a href="{{ url('/megazine_i_update/'.$megazines->id) }}" class="btn btn-warning active">
                             <span class="glyphicon glyphicon-wrench"></span>
                         </a>
                         &nbsp;
                         <a href="{{ url('/show_megazine/'.$megazines->id) }}" class="btn btn-info active">
                             <span class="fa fa-play-circle" aria-hidden="true"></span>
                         </a>                            </th>
                        @endforeach
                        </table>
@endsection