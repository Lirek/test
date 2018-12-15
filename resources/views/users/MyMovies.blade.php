@extends('layouts.app')
@section('css')
    <style type="text/css">


        .card .card-content {
         padding: 24px 8px 12px 8px;
        }
       .card .card-content .card-title {
           color: #000000;
           display: block;
           line-height: 14px;
           max-height: 14px;
           min-height: 12px;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
       }
       .card .card-title {
        line-height: 1.2;
           font-size: 16px;
       }

      #autor{
           color: #1e88e5 ;
           display: block;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
           font-size: 14px
       }

    </style>

@endsection

@section('main')  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                    <h4 class="titelgeneral"><i class="material-icons small">movie</i> Mis Peliculas</h4>
                </div>
                <div class="col-md-12  control-label">
                    <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                </div>
                </div>
                 @if($Movies != 0)
                <!-- PROFILE 01 PANEL -->
                @foreach($Movies as $Movie)
                <div class="col-lg-5 col-md-5 col-sm-5 mb">
                    <div class="content-panel pn-music">
                        <div id="profile-01" style="">
                            @if($Movie->img_poster)
                                <img src="{{asset($Movie->img_poster)}}" width="100%" height="220" style="">

                                            </div>
                                        @else
                                            <div class="card-image grey lighten-2">
                                                <img  width="100%" height="300" style="">
                                                <a href="{{url('ShowMyMovie/'.$Movie->id)}}" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 btn tooltipped" data-position="top" data-tooltip="Detalles"><i class="material-icons">book</i></a>
                                            </div>

                                        @endif
                                    </a>

                                <div class="card-content">
                                    <span class="card-title title"><b>{{$Movie->title}}</b></span>
                                    <!--
                                    <span> <a id='autor' href="ProfileBookAuthor/{{--$Book->id--}}">{{--$Book->author->full_name--}}</a></span>-->
                                    <!--   -->
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                 <div class="col s6 offset-s3">
                     <br><br>
                    <blockquote >
                    <i class="material-icons fixed-width large grey-text">movie</i><br><h5 blue-text text-darken-2>No Posee Peliculas adquiridas</h5>
                    </blockquote>
                </div>
                </div><!--End div row -->
                @endif
</div>



@endsection


@section('js')

@endsection
