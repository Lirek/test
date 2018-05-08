@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Tv live
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-widget widget-user ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black">
                <div class="widget-user-image">
                    {{--<img class="img-circle img-responsive" src="http://lorempixel.com/128/128/sports" alt="User Avatar">--}}
                    <img class="img-circle img-responsive av" src="/images/tv/{{ $tv->logo }}"
                         style="width:90px;height:90px;  " alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{ $tv->name_r }}</h3>
                <h5 class="widget-user-desc">{{ $tv->email_c }}</h5>
            </div>
            <div class="box-footer padding bg-gray">
                <br/>
                <ul class="nav ">
                    <li class="text-center">
                        {{--<a href="#">--}}
                        {{ $tv->name_r }}
                        {{--</a>--}}
                    </li>
                    <br/>
                    <li class="text-center">
                        {{--<a href="#">--}}
                        {{ $tv->email_c }}
                        {{--</a>--}}
                    </li>
                    <br/>
                    <br/>
                    <li class="text-center">
                        {{--<video controls="" src="{{ $tv->streaming }}">--}}
                            {{--<source src="{{ $tv->streaming }}" type="video/quicktime"> <!-- Picked by Safari -->--}}
                            {{--I'm sorry; your browser doesn't support HTML 5 video.--}}
                        {{--</video>--}}
                        <div class="embed-responsive-item" >
                            <iframe class="embed-responsive-item" style="height:490px; width:860px" src="{{ $tv->streaming }}"></iframe>
                        </div>
                    </li>
                    <br/>
                    <br/>
                    <li class=" btn-group-justified btn-group-xs">
                        @if($tv->facebook <> null )
                            <a href="{{ $tv->facebook }}" class="btn btn-app btn-facebook active">
                                &nbsp;<span class="fa fa-facebook" aria-hidden="true"></span>&nbsp;
                            </a>
                        @endif
                        @if($tv->instagram <> null )
                            <a href="{{ $tv->instagram }}" class="btn btn-app btn-instagram active">
                                &nbsp;<span class="fa fa-instagram" aria-hidden="true"></span>&nbsp;
                                {{--<span class="glyphicon glyphicon-wrench"></span>--}}
                            </a>
                        @endif
                        @if($tv->google <> null )
                            <a href="{{ $tv->google }}" class="btn btn-app btn-google">
                                &nbsp;<span class="fa fa-google-plus"></span>&nbsp;
                            </a>
                        @endif
                        @if($tv->twitter <> null )
                            <a href="{{ $tv->twitter }}" class="btn btn-app btn-twitter">
                                &nbsp;<span class="fa fa-twitter"></span>&nbsp;
                            </a>
                        @endif
                    </li>
                    <br/>
                    <br/>
                </ul>
            </div>
        </div>


    </section>

@endsection