@extends('seller.layouts')
@section('content')
    <!--main content start-->
    @include('flash::message')
    <style type="text/css">
        .owl-theme .owl-nav [class*='owl-'] {
            transition: all .3s ease;
        }
        .owl-theme .owl-nav [class*='owl-'].disabled:hover {
            background-color: #D6D6D6;
        }

        owl-theme {
            position: relative;
        }

        .owl-theme .owl-next, .owl-theme .owl-prev {
            width: 22px;
            height: 22px;
            position: absolute;
            top: 50%;
            transform: translateY(-125%)
        }
        .owl-theme .owl-prev {
            left: 10px;
        }
        .owl-theme .owl-next {
            right: 10px;
        }

    </style>


    <!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
    <div class="row">
        <div class="col s12 m12">
            <div class="card-content">
                <h4 class="titelgeneral"><i class="material-icons small">view_carousel</i> MIS CONTENIDOS</h4>
                <br>

                {{--Cine--}}
                @if(count($cine)> 0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="small material-icons">movie</i> Cine</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($cine as $m)
                                        <div>
                                            <img src="{{ asset($m['img_poster']) }}" height="250px" width="100px" onclick="masInfo('{!!$m['type']!!}',{!!$m['id']!!})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{--Musica--}}
                @if(count($musica)>0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                {{--
                                <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}"  >
                                    <h5 class="grey-text left"><i class="material-icons">music_note</i> Música</h5></a>
                                --}}
                                <h5 class="grey-text left"><i class="material-icons">music_note</i> Música</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($musica as $a)
                                        <div>
                                            <img src="{{ asset($a['cover']) }}" height="250px" width="100px" onclick="masInfo('{!!$a['type']!!}',{!!$a['id']!!})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{--lectura--}}
                @if(count($lectura)> 0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Lectura</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($lectura as $b)
                                        <div>
                                            <img src="{{ asset($b['cover']) }}" height="250px" width="100px" onclick="masInfo('{!!$b['type']!!}',{!!$b['id']!!})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!--CONTENIDO RECIENTE Radio-->
                @if(count($radios)>0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($radios as $r)
                                        <div>
                                            <img src="{{asset($r['logo'])}}" height="250px" width="100px" onclick="masInfo('{!!$r['type']!!}',{!!$r['id']!!})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--End  RECIENTE radio-->

                <!--CONTENIDO RECIENTE Tv-->
                @if(count($tvs)>0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($tvs as $tv)
                                        <div>
                                            <img src="{{ asset($tv['logo']) }}" height="250px" width="100px" onclick="masInfo('{!!$tv['type']!!}',{!!$tv['id']!!})">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--End  RECIENTE tv-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

        function masInfo(tipo,id) {
            console.log(tipo,id);
            if (tipo=="radio") {
                var ruta = "{{ url('/radios/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="tv") {
                var ruta = "{{ url('/tvs/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="serie") {
                var ruta = "{{ url('/series/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="pelicula") {
                var ruta = "{{ url('/movies/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="revista") {
                var ruta = "{{ url('/show_megazine/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="libro") {
                var ruta = "{{ url('/tbook/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="album") {
                var ruta = "{{ url('/show_album/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="cancion") {
                var ruta = "{{ url('/my_music_panel/') }}/"+id;
                location.href = ruta;
            }
        }

        $(document).ready(function(){

            var owl = $('.owl-carousel');
            owl.owlCarousel({
                //mergeFit:false,
                //merge:false,
                //pullDrag:false,
                //touchDrag:false,
                nav: false,
                loop:true,
                margin:10,
                responsiveClass:true,
                dots: true,
                //autoplay:true,
                //autoplayTimeout:3000,
                //autoplayHoverPause:true,
                //stagePadding: 50, centra los contenidos
                //lazyLoad:true, varia los tamaños de las imagenes
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    500:{
                        items:3,
                        nav:false
                    },
                    600:{
                        items:4,
                        nav:true
                    },

                    1000:{
                        items:5,
                        nav:true,
                        loop:false
                    },
                },
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            });
        });

    </script>
@endsection
