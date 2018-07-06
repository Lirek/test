@extends('layouts.app')

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mis Libros</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 @if($Books != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Books as $Book)
                <div class="col-lg-5 col-md-5 col-sm-5 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            @if($Book->cover)
                                <img src="images/bookcover/{{$Book->cover}}" width="100%" height="220" style="">
                            @else
                                <img src="#" width="100%" height="220" style="">
                            @endif
                        </div>
                        <div class="profile-01 centered">
                            <p><a href="{{url('Read/'.$Book->id)}}">Leer</p>
                        </div>
                        <div class="centered">
                            <h3>{{$Book->title}}</h3>
                            <h6>{{$Book->author->full_name}}</h6>
                            <p>·Sinopsis: 
                                {{$Book->sinopsis}}
                            </p>

                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                @endforeach
                @else
                    <h1>No Posee Libros</h1>
                @endif
            </div>
        </div> 
    </div> 
</div> 

@endsection


@section('js')


@endsection
