@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Radio live
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="box box-widget widget-user ">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                        <div class="widget-user-image">
                            {{--<img class="img-circle img-responsive" src="http://lorempixel.com/128/128/sports" alt="User Avatar">--}}
                            <img class="img-circle img-responsive av" src="/images/radio/{{ $radio->logo }}"
                                 style="width:90px;height:90px;  " alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username">{{ $radio->name_r }}</h3>
                        <h5 class="widget-user-desc">{{ $radio->email_c }}</h5>
                    </div>

                    <div class="box-footer padding bg-gray">
                        <br/>
                        <ul class="nav ">
                            <li class="text-center">
                                {{--<a href="#">--}}
                                {{ $radio->name_r }}
                                {{--</a>--}}
                            </li>
                            <br/>
                            <li class="text-center">
                                {{--<a href="#">--}}
                                {{ $radio->email_c }}
                                {{--</a>--}}
                            </li>
                            <br/>
                            <br/>
                            <li class="text-center">
                                <audio controls="" src="{{ $radio->streaming }}">
                                    {{--<source src="{{ $radio->streaming }}" type="video/quicktime"> <!-- Picked by Safari -->--}}
                                    I'm sorry; your browser doesn't support HTML 5 video.
                                </audio>
                            </li>
                            <br/>
                            <br/>
                            <li class=" btn-group-justified btn-group-xs">
                                @if($radio->facebook <> null )
                                    <a href="{{ $radio->facebook }}" class="btn btn-app btn-facebook active">
                                        &nbsp;<span class="fa fa-facebook" aria-hidden="true"></span>&nbsp;
                                    </a>
                                @endif
                                @if($radio->instagram <> null )
                                    <a href="{{ $radio->instagram }}" class="btn btn-app btn-instagram active">
                                        &nbsp;<span class="fa fa-instagram" aria-hidden="true"></span>&nbsp;
                                        {{--<span class="glyphicon glyphicon-wrench"></span>--}}
                                    </a>
                                @endif
                                @if($radio->google <> null )
                                    <a href="{{ $radio->google }}" class="btn btn-app btn-google">
                                        &nbsp;<span class="fa fa-google-plus"></span>&nbsp;
                                    </a>
                                @endif
                                @if($radio->twitter <> null )
                                    <a href="{{ $radio->twitter }}" class="btn btn-app btn-twitter">
                                        &nbsp;<span class="fa fa-twitter"></span>&nbsp;
                                    </a>
                                @endif
                            </li>
                            <br/>
                            <br/>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </section>

@endsection