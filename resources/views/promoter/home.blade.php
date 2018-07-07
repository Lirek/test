@extends('promoter.layouts.app')

@section('main')     
          <div class="row">
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
@endsection
@section('js')
@endsection
