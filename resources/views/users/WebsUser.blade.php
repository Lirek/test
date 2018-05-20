@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    
    <div class="col-md-6">
      <div class="panel panel-succes">
        
        <div class="panel-heading">
                    Primer Nivel de Referidos
                </div>
                
           <div class="panel-body">

                <table class="table">
                  <thead>
                    <tr>
                     <th>Alias</th>
                     <th>Nombre</th>
                     <th>Apellido</th>
                     <th>Estatus</th>
                     <th>Fecha de Registro</th>
                    </tr>
                  </thead>
               <tbody>
               
               </tbody>
             </table>

        </div>
      </div>  
    </div> 
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        
        <div class="panel-heading">
                    Segundo Nivel de Referidos
                </div>
                
                <div class="panel-body">

                 <table class="table">
              <thead>
                  <tr>
                  <th>Referido Por</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Estatus</th>
                  <th>Fecha de Registro</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
            </table>

                </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-alert">
        
        <div class="panel-heading">
                    Tercer Nivel de Referidos
                </div>

                <div class="panel-body">

                 <table class="table">
              <thead>
                  <tr>
                  <th>Referido Por</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Estatus</th>
                  <th>Fecha de Registro</th>
                  </tr>
              </thead>
             <tbody>
             </tbody>
            </table>  

                </div>
      </div>
    </div>
  </div>
</div>
@endsection
