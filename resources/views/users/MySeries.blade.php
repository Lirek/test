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
    <span class="grey-text"><h4><b><i class="material-icons small">movie</i> Mis Series</b></h4></span>
    <!-- <h5>Mis Peliculas</h5> -->
    <br>

        <div class="row">
                @if($Series != 0)
                    @foreach($Series as $Series)
                        <!-- PROFILE 01 PANEL -->
                        <div class="col s6 m3 ">
                            <div class="card">

                                        @if($Series->img_poster)
                                         <a href="{{url('PlaySerie/'.$Series->id)}}">
                                            <div class="card-image">
                                            <img src="{{ asset($Series->img_poster) }}" width="100%" height="300"style="">
                                              <!--  <a href="{{url('ShowMySerie/'.$Series->id.'/'.'Serie')}}" class="btn-floating halfway-fab waves-effect waves-light blue btn tooltipped " data-position="bottom" data-tooltip="Detalles"><i class="material-icons">movie</i></a> -->
                                                  <a href="{{url('PlaySerie/'.$Series->id)}}">
                                            </div>
                                        @else
                                           <!-- <a href="{{url('ShowMySerie/'.$Series->id.'/'.'Cap')}}"> -->
                                            <a href="{{url('PlaySerie/'.$Series->id)}}">
                                            <div class="card-image grey lighten-2">
                                                <img  src="{{ asset($Series->Serie->img_poster) }}" width="100%" height="300" style="">
                                                <a href="{{url('ShowMySerie/'.$Series->id.'/'.'Cap')}}" class="btn-floating halfway-fab waves-effect waves-light blue lighten-2 btn tooltipped" data-position="top" data-tooltip="Detalles"><i class="material-icons">movie</i></a>
                                            </div>

                                        @endif
                                    </a>

                                <div class="card-content">
                                  @if($Series->title)
                                    <span class="card-title title"><b>{{$Series->title}}</b></span>
                                  @else
                                    <span class="card-title title"><b>{{$Series->Serie->title}}</b></span>
                                  @endif
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
                    <i class="material-icons fixed-width large grey-text">movie</i><br><h5 blue-text text-darken-2>No Posee series adquiridas</h5>
                    </blockquote>
                </div>
                </div><!--End div row -->
                @endif
</div>



@endsection


@section('js')

@endsection
