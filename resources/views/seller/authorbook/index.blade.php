@extends('seller.layouts')
@section('css')
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
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
    .card{
        height:430px;
    }
    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <h4 class="titelgeneral"><i class="material-icons small">book</i> Autores registrados</h4>
        @if($authors->count() != 0 )
            <div class="card-panel curva">
                <div class="row ">
                    @foreach($authors as $author)
                        @if(Auth::guard('web_seller')->user()->id === $author->seller_id)
                            <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                            <a href="{{ route('authors_books.showBooks', $author->id) }}">
                              <img src="{{ asset('images/authorbook')}}/{{ $author->photo }}" width="100%" height="300px">
                              </a>
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('authors_books.edit', $author->id) }}"><i class="material-icons">create</i></a>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class="">{{ $author->full_name }} </p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Email:</b> {{ $author->email_c }}</small>
                                </div>
                                <div class="col m12 ">  
                                    @if($author->instagram!=null)
                                            <div class="col m4 "> 
                                                <a href="{{ $author->instagram }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-instagram"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            @endif
                                            @if($author->facebook!=null)
                                            <div class="col m4 "> 
                                                <a href="{{ $author->facebook }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-facebook-square"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            @endif
                                            @if($author->google!=null)
                                            <div class="col m4 "> 
                                                <a href="{{ $author->google }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-youtube-square"></i></span>
                                                        
                                                    </h5>
                                                </a>
                                            </div>
                                            @endif 
                                </div>                        
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
@section('js')
@endsection