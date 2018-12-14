@extends('seller.layouts')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    
    </style>
    <style>
        /*.modal {
        max-height: 100%;
        }
        object {
     width:100%;
     max-height:100%;
}*/
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
           
        }
        
        .colorbadge{
            background-color:#428bca;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h4 class="center">
                {{ $author->full_name }}
            </h4>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <img src="{{ asset('images/authorbook')}}/{{ $author->photo}}" width="100%" height="300" style="border-radius: 10px" id="panel" class="materialboxed">
                    <br><br>
                    <a href="{{ route('authors_books.index') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                </div>
                <div class="col m6 s12">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">create</i>
                                    <b class="left">Proveedor: </b>
                                </div>
                                <div class="col s12 m7">
                                    {{ $author->seller->name }}
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="fa fa-instagram"></i>
                                    <b class="left">Instagram: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a href="{{ $author->instagram }}" target="_blank"> {{ $author->instagram }}</a>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <span><i class="fa fa-facebook-square"></i></span>
                                    <b class="left">Facebook: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a href="{{ $author->facebook }}" target="_blank">
                                    {{ $author->facebook }}
                                </a>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                     <span><i class="fa fa-youtube-square"></i></span>
                                    <b class="left">Youtube: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a href="{{ $author->google }}" target="_blank">
                                    {{ $author->google }}
                                </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col s12 m12">
                    <br><br>
                    @foreach($book as $b)
                    <div class="col s12 m3">
                      <div class="card">
                        <div class="card-image">
                            <a href="{{ route('tbook.show', $b->id) }}">
                          <img src="{{ asset('/images/bookcover') }}/{{ $b->cover }}" width="100%" height="300px">
                          </a>
                          <!-- <span class="card-title">Card Title</span> -->
                          <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('tbook.edit', $b->id) }}"><i class="material-icons">create</i></a>
                        </div>
                        <div class="card-content">
                            <div class="col m12">
                                <p class="">{{ $b->title }}</p>
                            </div>
                            <div class="col m12 ">
                                <small><b>Estatus:</b> {{ $b->status }}</small>
                            </div>
                            
                                <small><b>N° de compras</b> {{$b->transaction->count()}}</small> 
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
$(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>
@endsection