@extends('layouts.app')

@section('main')

<div class="container">
  <div class="row">
    
    <div class="col s4">
      <div class="card-panel teal">
           
           <div class="center">
             <h3><spam class="white-text">Primer Nivel de Referidos</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
            <h3><spam class="white-text">{{$referals1}}</spam></h3>  
           </div>

        </div>
    </div>  

    <div class="col s4">
      <div class="card-panel teal">
           
        <div class="center">
          <h4><spam class="white-text">Segundo Nivel de Referidos</spam></h4>
        </div>
                
           <div class="divider"></div>
           
        <div class="center">
          <h3><spam class="white-text">{{$referals2}}</spam></h3>  
        </div>
           
        </div>
    </div>

      <div class="col s4">
        <div class="card-panel teal">
           
        <div class="center">
          <h3><spam class="white-text">Tercer Nivel de Referidos</spam></h3>
        </div>
                
           <div class="divider"></div>
           
        <div class="center">
          <h3><spam class="white-text">{{$referals3}}</spam></h3>  
        </div>
           
        </div>
      </div>

    </div> 

  </div>

  


@endsection

@section('js')

@endsection