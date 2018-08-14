@extends('promoter.layouts.app')

@section('main')     
       
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Contenido Por Aprobar</h2>
          </div>

          <div class="row mt">
              <!-- TWITTER PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-suitcase fa-4x"></i>
                  <p>{{$content_total}}</p>
                  <p class="user">Contenido Por Aprobar</p>
                </div>
              </div><!-- /col-md-4 -->
              
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="twitter-panel pn">
                  <i class="fa fa-user-tie fa-4x"></i>
                  <p>{{$sellers}}</p>
                  <p class="user">Proveedores por Validar</p>
                </div>
              </div><!-- /col-md-4 -->
            
              <div class="col-lg-4 col-md-4 col-sm-4 mb">                
                <div class="twitter-panel pn">
                  <i class="fas fa-archive fa-4x"></i>
                  <p>{{$aplyss}}</p>
                  <p class="user">Cuentas Proveedor Por Revisar</p>
                </div>
              </div><!-- /col-md-4 -->
          </div
          
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Paquetes de Tiquets</h2>
          </div>

          <div class="row mt">
             <div class="col-md-6">
              <div class="content-panel">
              
                  <table class="table table-bordered table-striped table-condensed">            
                    <thead>
                        <tr>
                          <th class="non-numeric">Nombre Del Paquete</th>
                          <th>Costo</th>
                          <th>Cantidad de Tiquets</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($TicketsPackage as $Package)
                        <tr>
                          <td>{{$Package->name}}</td>
                          <td>{{$Package->cost}}$</td>
                          <td>{{$Package->amount}}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
             
               
                 <button type="button" class="btn btn-theme">+</button>
               
              </div>
         
          </div>
            </div>
@endsection
@section('js')
@endsection
