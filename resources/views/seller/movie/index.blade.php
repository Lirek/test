@extends('seller.layouts')
@section('css')
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

@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h4 class="titelgeneral"><i class="mdi mdi-filmstrip"></i> Películas registradas </h4>
            @if($movie->count() != 0 )
            <div class="row">
                @foreach($movie as $m)
                @if(Auth::guard('web_seller')->user()->id === $m->seller_id)
                <div class="col s12 m3">
                  <div class="card">
                    <div class="card-image">
                        <a href="{{ route('movies.show', $m->id) }}">
                      <img src="{{ asset('movie/poster') }}/{{$m->img_poster}}" width="100%" height="300px">
                      </a>
                      <!-- <span class="card-title">Card Title</span> -->
                      <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('movies.edit',$m->id) }}"><i class="material-icons">create</i></a>
                    </div>
                    <div class="card-content">
                        <div class="col m12">
                            <p class=""> {{ $m->title }}</p>
                        </div>
                        <div class="col m12 ">
                            <small><b>Estatus:</b> {{ $m->status }}</small>
                        </div>
                        
                            <small><b>N° de compras</b> {{$m->Transactions->count()}}</small> 
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
            </div>
            {{$movie->links()}}
            @else
            <div class="col m12">
            <blockquote >
                <i class="material-icons fixed-width large grey-text">movie</i><br><h5>No Posee películas registradas</h5>
            </blockquote>
            <br>
            </div>
            @endif

            <a href="{{ route('movies.create') }}" class="btn curvaBoton waves-effect waves-light green">   
                <span>Agregar más películas</span>
            </a>       
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection