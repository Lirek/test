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
            <!--SERIE-->
            @if($Type=='Serie')
            <div class="card-panel curva" style="padding-bottom: 110px;">
                <div class="row">
                    <div class="col s12 m12 ">
                    <h5  class="center">
                        " {{ $Series->title }}" ({{ $Series->release_year }})
                    </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 ">
                    <img src="{{ asset($Series->img_poster) }}" style="border-radius: 10px" id="lecturaspanel">
                    </div>
                    <div class="col s12 m8  ">
                        <ul class="collection z-depth-1" >

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                <i class="material-icons circle left blue-text">switch_video</i>
                                    <b class="left">Transmisión: </b>
                                </p>
                                <p ALIGN="justify">&nbsp; {{ $Series->status_series }}</p>
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p><i class="material-icons circle left blue-text">turned_in</i>
                                <b class="left">Géneros:</b> </p>
                             @foreach($Series->tags_serie as $t)
                                <div class="chip  aqua-gradient  white-text">
                                    {{ $t->tags_name}}
                                </div>
                            @endforeach
                            </li>

                        @if($Series->sagas!=null)
                            <li class="collection-item"  style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">
                                {{ $Series->sagas->sag_name }}</p>
                             </li>
                            @else
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">No pertenece a una saga</p>
                            </li>
                            @endif

                            <li class="collection-item" style=" padding: 0px;" >
                                <br>
                                <div class="row">
                                    
                                    <div class="col s6 m4 l4">
                                        <a class="waves-effect waves-light  center btn modal-trigger blue curvaBoton " href="#modal1">Sinopsis</a>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        <a href="{{ url('MySeries') }}" class="btn center curvaBoton red ">Atrás</a>
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
                            $url = $Series->trailer;
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
                    <div class="col s12 m8 offset-m2" style="color: black">
                        <ul class="collapsible">
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons blue-text">movie</i>
                              Episodios( {{$episode->episode_id }}):
                            </div>
                            @if($Series->Episode())
                                @foreach($Series->Episode as $episode)
                                  @if($episode->status =='Aprobado')
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="col s4">
                                                <p>{{ $episode->episode_name }}</p>
                                                <!--<p><a href="{{ $episode->trailer_url }}" class="" target="_blank">{{ $episode->episode_name }}</a></p>-->
                                                </div>
                                                <div class="col s3">
                                                    <p>{{ $episode->sinopsis }}</p>
                                                </div>
                                                <div class="col s3" style="margin-left: 20px; margin-top: 20px;">
                                                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton modal-trigger" href="#modal-default-{{$episode->id}}" ><i class="material-icons">play_circle_outline</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endif
                                   <!--Modal-->
                                <!-- /.modal  de sagas  -->
                                <div id="modal-default-{{$episode->id}}" class="modal">
                                    <div class="modal-content modal-lg">
                                        <div class=" blue"><br>
                                            <h4 class="center white-text" ><i class="small material-icons">movie</i>"{{ $Series->title }}"</h4>
                                            <br>
                                        </div>
                                        <br>
                                        <div class=" col s12 m12">
                                             <video style="width: 100%; " poster="" id="player" controls >
                                                <source src="{{ asset($episode->episode_file) }}" type="video/mp4">
                                                <source src="{{ asset($episode->episode_file) }}" type="video/webm">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                          </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!--EPISODIO-->
            @else
            <div class="card-panel curva" style="padding-bottom: 110px;">
                <div class="row">
                    <div class="col s12 m12 ">
                    <h5  class="center">
                        " {{ $Series->Serie->title }}" ({{ $Series->Serie->release_year }})
                    </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 ">
                    <img src="{{ asset($Series->Serie->img_poster) }}" style="border-radius: 10px" id="lecturaspanel">
                    </div>
                    <div class="col s12 m8  ">
                        <ul class="collection z-depth-1" >

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                <i class="material-icons circle left blue-text">switch_video</i>
                                    <b class="left">Transmisión: </b>
                                </p>
                                <p ALIGN="justify">&nbsp; {{ $Series->Serie->status_series }}</p>
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p><i class="material-icons circle left blue-text">turned_in</i>
                                <b class="left">Géneros:</b> </p>
                             @foreach($Series->Serie->tags_serie as $t)
                                <div class="chip  aqua-gradient  white-text">
                                    {{ $t->tags_name}}
                                </div>
                            @endforeach
                            </li>


                        @if($Series->sagas!=null)
                            <li class="collection-item"  style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">
                                {{ $Series->sagas->sag_name }}</p>
                             </li>
                            @else
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">No pertenece a una saga</p>
                            </li>
                            @endif

                            <li class="collection-item" style=" padding: 0px;" >
                                <br>
                                <div class="row">
                                    
                                    <div class="col s6 m4 l4">
                                        <a class="waves-effect waves-light  center btn modal-trigger blue curvaBoton " href="#modal1">Sinopsis</a>
                                    </div>
                                    <div class="col s6 m4 l4">
                                        <a href="{{ url('MySeries') }}" class="btn center curvaBoton red ">Atrás</a>
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
                            $url = $Series->Serie->trailer;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                           
                        ?>
                        <br><br>
                        <div class="embed-container">
                          <iframe  type="text/html" width="680" height="415"
                              src="https://www.youtube.com/embed/{{ $id }}"
                              frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe> 
                        </div>
                    </div>

                    <div class="col s12 m8 offset-m2" style="color: black">
                        <ul class="collapsible">
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons blue-text">movie</i>
                              Episodios:
                            </div>
                            @if($Series)
                                
                                  @if($Series->status =='Aprobado')
                                    <div class="collapsible-body">
                                        <div class="row">
                                            <div class="col s12">
                                                <div class="col s4">
                                                <p><a href="{{ $Series->trailer_url }}" class="" target="_blank">{{ $Series->episode_name }}</a></p>
                                                </div>
                                                <div class="col s3">
                                                    <p>{{ $Series->sinopsis }}</p>
                                                </div>
                                                <div class="col s3" style="margin-left: 20px">
                                                    <a class="btn halfway-fab waves-effect waves-light blue curvaBoton modal-trigger" href="#modal-default-{{$Series->id}}" ><i class="material-icons">play_circle_outline</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endif
                                   <!--Modal-->
                                <!-- /.modal  de sagas  -->
                                <div id="modal-default-{{$Series->id}}" class="modal">
                                    <div class="modal-content modal-lg">
                                        <div class=" blue"><br>
                                            <h4 class="center white-text" ><i class="small material-icons">movie</i>"{{ $Series->Serie->title }}"</h4>
                                            <br>
                                        </div>
                                        <br>
                                        <div class=" col s12 m12">
                                             <video style="width: 100%; " poster="" id="player" controls >
                                                <source src="{{ asset($Series->episode_file) }}" type="video/mp4">
                                                <source src="{{ asset($Series->episode_file) }}" type="video/webm">
                                            </video>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
                                    </div>
                                </div>
                               
                            @endif
                          </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

   

    <!--Sinopsis-->
    @if($Type=='Serie')
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Sinopsis:</b></h5>
            <p ALIGN="justify">{{ $Series->story }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
    @else
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Sinopsis:</b></h5>
            <p ALIGN="justify">{{ $Series->Serie->story }}</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
    @endif
@endsection
@section('js')
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
$(document).ready(function(){
    $('.materialboxed').materialbox();
     $('.modal').modal();
  });
</script>

@endsection