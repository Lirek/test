@extends('layouts.app')
@section('css')
    <style>

        .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle {
            position: absolute;
            width: 42px;
            height: 42px;
            overflow: hidden;
            left: 35px;
            display: inline-block;
            vertical-align: middle;
        }

        .aqua-gradient {
            background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
            background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
            background: linear-gradient(40deg,#2096ff, #9dffac)!important;
        }
        /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('main')
    <!-- Main content -->
    <div class="row">

        <div class="col s12 m12" >
            @include('flash::message')
            <div class="card-panel curva" style="padding-bottom: 110px;">
                <div class="row">
                    <div class="col s12 m12 ">
                    <h5  class="center">
                        " {{ $Movies->title }}" ({{ $Movies->release_year }})
                    </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 ">
                    <img src="{{asset('movie/poster')}}/{{$Movies->img_poster}}" style="border-radius: 10px" id="lecturaspanel">
                    </div>
                    <div class="col s12 m8  ">
                        <ul class="collection z-depth-1" >

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                <i class="material-icons circle left blue-text">create</i>
                                    <b class="left">Titulo original: </b>
                                </p>
                                <p ALIGN="justify">&nbsp; {{ $Movies->original_title }}</p>
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p><i class="material-icons circle left blue-text">turned_in</i>
                                <b class="left">Géneros:</b> </p>
                             @foreach($Movies->tags_movie as $t)
                                <div class="chip  aqua-gradient  white-text">
                                    {{ $t->tags_name}}
                                </div>
                            @endforeach
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                    <p><i class="material-icons circle left blue-text">star</i>
                                    <b class="left">Categoria:&nbsp;&nbsp;</b></p>
                                <p ALIGN="justify"> {{ $Movies->rating->r_name }}</p>

                            </li>

                            <!-- <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                        <p><i class="material-icons circle left blue-text">local_play</i>
                                            <b class="left">Costo:&nbsp;&nbsp;</b></p>
                                <p ALIGN="justify">   Tickets</p>
                            </li> -->


                        @if($Movies->sagas!=null)
                            <li class="collection-item"  style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">
                                {{ $Movies->sagas->sag_name }}</p>
                             </li>
                            @else
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">No pertenece a una saga</p>
                            </li>
                            @endif

                        <!--<li class="collection-item avatar">
                                <img  src="{{-- asset('images/authorbook')-- }}/{{--$book->author->photo --}}"  alt="User Avatar"class="circle img-responsive">
                                <span class="title"><b>Autor:</b></span>
                                <p><a href="--{{--url('ProfileBookAuthor')}}/{{$book->id}}">{{ $book->author->full_name --}}</a></p>
                        </li>-->

                            <li class="collection-item" style=" padding: 0px;" >
                                <br>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <a  href="#modal-default" class="btn curvaBoton waves-effect waves-light teal center modal-trigger green">Ver película</a>
                                    </div>
                                    <div class="col s12 m4 l4">
                                        <a class="waves-effect waves-light  center btn modal-trigger blue curvaBoton " href="#modal1">Sinopsis</a>
                                    </div>
                                    <div class="col s12 m4 l4">
                                        <a href="{{ url('MyMovies') }}" class="btn center curvaBoton red ">Atrás</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col m8 s12 offset-m2">
                        <br>
                        <div class="col m6 s6 offset-m3 offset-s3">
                            <li class="valid-wrapper" style="list-style: none;">
                                <i class="material-icons blue-text">share</i>
                                <b class="">Trailer:</b>
                            </li>
                        </div>
                        <?php
                            $url = $Movies->trailer_url;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '800px';
                            $height = '450px';
                        ?>
                        <br><br>
                        <div class="embed-container">
                            <iframe  type="text/html" width="680" height="415"
                          src="https://www.youtube.com/embed/{{ $id }}"
                          frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <!-- /.modal  de sagas  -->
    <div id="modal-default" class="modal">
        <div class="modal-content modal-lg">
            <div class=" blue"><br>
                <h4 class="center white-text" ><i class="small material-icons">movie</i>"{{ $Movies->title }}"</h4>
                <br>
            </div>
            <br>
            <div class=" col s12 m12">
                 <video style="width: 100%" poster="{{ asset('movie/poster')}}/{{ $Movies->img_poster}}" id="player" controls >
                    <source src="{{ asset('/movie/film')}}/{{ $Movies->duration }}" type="video/mp4">
                    <source src="{{ asset('/movie/film')}}/{{ $Movies->duration }}" type="video/webm">
                </video>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
    </div>

    <!--Sinopsis-->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Sinopsis:</b></h5>
            <p ALIGN="justify">{{ $Movies->based_on }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

@endsection