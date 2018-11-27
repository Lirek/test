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
    
    </style>
    <style>
        .modal {
        max-height: 100%;
        }
        object {
     width:100%;
     max-height:100%;
}
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
           
        }
        .pdf{
            position:relative;
        }
        .transparencia {
            opacity: 0.1;
            display: inline-block;
            position:absolute;
            background-color: black;
            width:79%;
            height:99%;
        }
        .bloqueo{
            display: inline-block;
            position:absolute;
            background-color: black;
            width:97%;
            height:43px;
        }
        .colorbadge{
            background-color:#428bca;
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h4 class="center">
                "{{ $megazine->title }}"
            </h4>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <img src="{{asset($megazine->cover)}}" width="100%" height="300" style="bor<der-radius: 10px" id="panel">
                    <br><br>
                    <a href="#modal-default" class="btn curvaBoton waves-effect waves-light green  modal-trigger" >Leer libro</a>
                        <a href="{{ url('/my_megazine',Auth::guard('web_seller')->user()->id) }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                </div>
                <div class="col m6 s12">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">turned_in</i>
                                    <b class="left">Géneros: </b>
                                </div>
                                <div class="col s12 m7">
                                     @foreach($megazine->tags_megazines as $t)
                                    <span class=""> {{ $t->tags_name }} </span>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">star</i>
                                    <b class="left">Categoria: </b>
                                </div>
                                <div class="col s12 m7">
                                    {{ $megazine->rating->r_name }}
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">local_play</i>
                                    <b class="left">Costo: </b>
                                </div>
                                <div class="col s12 m7">
                                    {{ $megazine->cost }} Tickets
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">book</i>
                                    <b class="left">Sinopsis: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="#modal1">Ver</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col m2 s12">
                    <div class="card blue accent-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title">
                                <i class="material-icons">group add</i>
                                {{$megazine->transaction->count()}}
                            </p>
                            <p>
                                N° de compras
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal-->
<!-- /.modal  de sagas  -->
<div id="modal-default" class="modal" style="width:100%;height:100%;">
    <div class="modal-content modal-lg">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i>"{{ $megazine->title }}"</h4>
            <br>
        </div>
        <br>
        <div class="pdf">
            <div class="transparencia"></div>
            <div class="bloqueo"></div>
            <object data="{{ asset($megazine->megazine_file) }}" class="text-center" style="width:100%;height:800px;" type="application/pdf"></object>
        </div>  
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>

<!--Sinopsis-->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h6><b>Sinopsis:</b></h6>
      <p>{{ $megazine->descripcion }}</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>

@endsection
@section('js')
@endsection