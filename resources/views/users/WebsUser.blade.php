@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-4">
      <div class="panel panel-succes">
        
        <div class="panel-heading">
                    Primer Nivel de Referidos
                </div>
                
           <div class="panel-body">

                <h2>Posee:</h2> <h3>{{$referals1}}</h3>  

        </div>
      </div>  
    </div> 

      <div class="col-md-4">
       <div class="panel panel-default">
        
        <div class="panel-heading">
                    Segundo Nivel de Referidos
                </div>
                
                <div class="panel-body">

                 <h2>Posee:</h2> <h3>{{$referals2}}</h3>  

                </div>
       </div>
    </div>

        <div class="col-md-4">
          <div class="panel panel-alert">
        
          <div class="panel-heading">
                    Tercer Nivel de Referidos
                </div>

                <div class="panel-body">

                 <h2>Posee:</h2> <h3>{{$referals3}}</h3>  
            

                </div>
           </div>
        </div>

  </div>

  <div class="row">
  
  </div>

  <div class="row">

  </div>
</div>
@endsection
