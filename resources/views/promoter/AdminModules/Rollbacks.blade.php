@extends('promoter.layouts.app')

@section('main')
 <div class="row mt">
    <h3>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" id="users">Puntos Desasignados</a></li>
        <li><a data-toggle="tab" href="#menu1" id="users_payments">Ticktes Desasignados</a></li>
        <li><a data-toggle="tab" href="#menu2" id="users_d">Contenido Desasignados</a></li>
      </ul>
  </h3>
</div>

<div class="row mt">
  <div class="tab-content">
   
    <div id="home" class="tab-pane fade in active">
      <div class="col-lg-12">
        <div class="content-panel">

          <table class="table table-bordered table-striped table-condensed" id="Clients">            
            <thead>
                <tr>
                  <th class="non-numeric">Nombre</th>
                  <th class="non-numeric">Numero Doc</th>
                  <th class="non-numeric">Imagen del Documento</th>
                  <th class="non-numeric">Fecha de Nacimiento</th>
                  <th class="non-numeric">Genero</th>
                  <th class="non-numeric">Fecha de registro</th>
                  <th class="non-numeric">Redes</th>
                  <th class="non-numeric">Estatus</th>
              </tr>
              </thead>
          </table>

        </div>
      </div>
    </div>

   <div id="menu1" class="tab-pane fade">
      <div class="col-lg-12">
         <div class="content-panel">

            <table class="table table-bordered table-striped table-condensed" id="Payments">            
            <thead>
                <tr>
                  <th class="non-numeric">Usuario</th>
                  <th class="non-numeric">Cantidad</th>
                  <th class="non-numeric">Paquete</th>
                  <th class="non-numeric">Total de la Recarga</th>
                  <th class="non-numeric">Comprobante</th>
                  <th class="non-numeric">Fecha de la Solicitud</th>
                  <th class="non-numeric">Estado</th>

              </tr>
              </thead>
             </table>


        </div>
     </div>
   </div>

    <div id="menu2" class="tab-pane fade">
      <div class="col-lg-12">
        <div class="content-panel">

          <table class="table table-bordered table-striped table-condensed" id="ClientsDenials">            
            <thead>
                <tr>
                  <th class="non-numeric">Nombre</th>
                  <th class="non-numeric">Numero Doc</th>
                  <th class="non-numeric">Imagen del Documento</th>
                  <th class="non-numeric">Fecha de Nacimiento</th>
                  <th class="non-numeric">Genero</th>
                  <th class="non-numeric">Fecha de registro</th>
                  <th class="non-numeric">Redes</th>
                  <th class="non-numeric">Estatus</th>
              </tr>
              </thead>
          </table>

        </div>
      </div>      
    </div>

   

  </div>
</div>

@include('promoter.modals.RollbacksViewModal')
@endsection
@endsection