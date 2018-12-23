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
                <h4 class="titelgeneral"><i class="material-icons small">view_carousel</i> Cartelera</h4>
                <br>

                {{--Peliculas--}}
                @if(count($Movies)> 0 || count($Series) > 0)
                    <div class="card">
                        @if(count($Movies)>0)
                            <div class="row">
                                <div class="col s12 ">
                                    <a href="#" >
                                        <h5 class="grey-text left"><i class="small material-icons" >movie</i> Pelicula</h5></a>
                                    <a href="#" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>

                                </div>
                                <div class="col s12 ">
                                    <div  class="owl-carousel owl-theme">
                                        @foreach($Movies as $m)
                                            <div>
                                                <img src="{{asset('movie/poster')}}/{{$m->img_poster}}" height="250px" width="100px" onclick="masInfo('pelicula',{!!$m->id!!})">
                                            </div>
                                        @endforeach
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        @endif
                        @if(count($Series)>0)
                            <div class="row">
                                <div class="col s12 ">
                                    <a href="#" >
                                        <h5 class="grey-text left"><i class="mdi mdi-movie-roll"></i>Serie</h5></a>
                                    <a href="#" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                </div>
                                <div class="col s12 ">
                                    <div  class="owl-carousel owl-theme">
                                        @foreach($Series as $s)
                                            <div>
                                                <img src="{{ asset($s->img_poster)}}" height="250px" width="100px" onclick="masInfo('serie',{!!$s->id!!})">
                                            </div>
                                        @endforeach
                                    </div>
                                    <br><br>
                                </div>
                            </div>
                        @endif
                    </div>
                @endif

                {{--Musica--}}
                @if(count($Albums)>0)
                    <div class="card">
                        <div class="row">
                            <div class="col s12 ">
                                <a href="#" >
                                    <h5 class="grey-text left"><i class="material-icons">music_note</i> Música</h5></a>
                                <a href="#" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    @foreach($Albums as $a)
                                        <div>
                                            <img src="{{ asset($a->cover) }}" height="250px" width="100px">
                                        </div>
                                    @endforeach
                                </div>
                                <br><br>
                            </div>
                        </div>
            @endif

            {{--libros--}}
            @if(count($Book)> 0 || count($Megazines)> 0)
                <div class="card">
                    @if(count($Book)> 0)
                        <div class="row">
                            <div class="col s12 ">
                                <a href="#"> <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Libros</h5></a>
                                <a href="#" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    @foreach($Book as $b)
                                        <div>
                                            <img src="{{ asset('images/bookcover/') }}/{{$b->cover }}" height="250px" width="100px" onclick="masInfo('libro',{!!$b->id!!})">
                                        </div>
                                    @endforeach
                                </div>
                                <br><br>
                            </div>
                        </div>
                    @endif

                    {{--Revista--}}
                    @if(count($Megazines)> 0)


                        <div class="row">
                            <div class="col s12 ">
                                <a href="#">
                                    <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Revista</h5></a>
                                <a href="#" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>

                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    @foreach($Megazines as $m)
                                        <div>
                                            <img src="{{ asset($m->cover)}}" height="250px" width="100px" onclick="masInfo('revista',{!!$m->id!!})">
                                        </div>
                                    @endforeach
                                </div>
                                <br><br>
                            </div>
                        </div>
                    @endif
                </div>
            @endif


                    <!--CONTENIDO RECIENTE Radio-->
                        @if(count($Radio)>0)
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="#">
                                            <h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5></a>
                                        <a href="#" class="btn btn-small waves-effect waves-light right teal " style="margin: 10px;">Más</a>

                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            @foreach($Radio as $r)
                                                <div>
                                                    <a href="{{url('ListenRadio/'.$r->id)}}" class="waves-effect waves-light">
                                                        <img src="{{asset($r->logo)}}" height="150px" width="150px"  onclick="masInfo('radio')">
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br><br>
                                    </div>
                                </div>

                            </div>
                        @endif
                    <!--End  RECIENTE radio-->


                        <!--CONTENIDO RECIENTE Tv-->
                        @if(count($Tv)>0)
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="#">
                                            <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5></a>
                                        <a href="#" class="btn btn-small waves-effect waves-light right teal " style="margin: 10px;">Más</a>

                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            @foreach($Tv as $tv)
                                                <div>
                                                    <a  href="{{url('PlayTv/'.$tv->id)}}" class="waves-effect waves-light">
                                                        <img src="{{ asset('/images/Tv/') }}/{{ $tv->logo }}"  height="150px" width="150px" onclick="masInfo('tv',{!!$tv->id!!})" ></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                    @endif
                    <!--End  RECIENTE tv-->



        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">

        function masInfo(tipo,id) {
            console.log(tipo,id);

            if (tipo=="radio") {
                var ruta = "{{ url('/ListenRadio/') }}/"+id;
                location.href = ruta;
            } else if (tipo=="tv") {
                var ruta = "{{ url('/PlayTv/') }}/"+id;
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
            }
        }
    </script>


    <script >

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


        //# sourceURL=pen.js
    </script>
@endsection
