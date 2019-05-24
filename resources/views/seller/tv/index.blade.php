@extends('seller.layouts')
@section('css')
    <style>
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
            height:480px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            @include('flash::message')
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> TV's registradas</h4>
                <div class="row">
                    @if($tvs->count() != 0 )
                        @foreach($tvs as $tv)
                            @if(Auth::guard('web_seller')->user()->id === $tv->seller_id)
                                <div class="col s12 m4 l3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="{{ route('tvs.show', $tv->id) }}">
                                                <img src="{{ asset($tv->logo) }}" width="100%" height="300px">
                                            </a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('tvs.edit', $tv->id) }}">
                                                <i class="material-icons">create</i>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="col m12">
                                                <h6>{{ $tv->name_r }}</h6>
                                            </div>
                                            @if($tv->web!=null)
                                                <a href="{{$tv->web}}" target="_blank" class="btn-floating grey"><i class="mdi mdi-earth"></i></a>
                                            @endif
                                            @if($tv->facebook!=null)
                                            <a href="{{$tv->facebook}}" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                                            @endif
                                            @if($tv->google!=null)
                                            <a  href="{{$tv->google}}" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                                            @endif
                                            @if($tv->twitter!=null)
                                                <a href="{{$tv->twitter}}" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                                            @endif
                                            @if($tv->instagram!=null)
                                                <a href="{{$tv->instagram}}" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
                                            @endif
                                            <div class="col m12">
                                                <small><b>Estatus:</b> {{ $tv->status }}</small>
                                            </div>
                                            {{--
                                            <small><b>N° de compras</b> {{$tv->transaction->count()}}</small>
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col s12">
                            {{$tvs->links()}}
                        </div>
                    @else
                        <div class="col m12">
                            <blockquote>
                                <i class="material-icons fixed-width large grey-text">radio</i><br><h5>No posee TV's registradas</h5>
                            </blockquote>
                            <br>
                        </div>
                    @endif
                </div>
                <a href="{{ route('tvs.create') }}" class="btn curvaBoton waves-effect waves-light green">   
                    <span>Agregar más TV's</span>
                </a>       
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection