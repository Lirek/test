@extends('promoter.layouts.app')

@section('content')
<main  class="mdl-layout__content">
 
 <div class="mdl-grid">
    
    <div class="mdl-cell--4-col">
        <div class="mdl-card">
          <div class="mdl-card__title">
             <h2 class="mdl-card__title-text">Solicitudes Pendientes</h2>
          </div>
                <div class="mdl-card__media">
                    <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="{{$aplies}}" style="font-size: 80px; margin-left: 90px ">account_box</div>
                </div>
                @if($aplies==0)
                    <div class="mdl-card__supporting-text">
                        <p>No Posee Solicitudes Pendientes</p>
                    </div>
                <div class="mdl-card__actions">
                </div>    
                    @else
                    <div class="mdl-card__supporting-text">
                        <p>Posee {{$aplies}} por revisar</p>
                    </div>
                    <div class="mdl-card__actions">
                    
                    <a href="{{url('/promoter_applys')}}"><i class="material-icons">launch</i></a>
                    
                       
                    </div>
                    @endif
        </div>    
    </div>
    
    <div class="mdl-cell--4-col">
        <div class="mdl-card">
          <div class="mdl-card__title">
             <h2 class="mdl-card__title-text">Proveedores Asignados</h2>
          </div>
                <div class="mdl-card__media">
                    <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="{{$sellers}}" style="font-size: 80px; margin-left: 90px ">account_box</div>
                </div>
                @if($sellers==0)
                    <div class="mdl-card__supporting-text">
                        <p>No Posee Solicitudes Pendientes</p>
                    </div>
                <div class="mdl-card__actions">
                </div>    
                    @else
                    <div class="mdl-card__supporting-text">
                        <p>Posee {{$sellers}} Proveedores por revisar</p>
                    </div>
                    <div class="mdl-card__actions">
                    
                    <a href="{{url('/promoter_seller')}}"><i class="material-icons">launch</i></a>
                    
                       
                    </div>
                    @endif
        </div>    
    </div>

        <div class="mdl-cell--4-col">
        <div class="mdl-card">
          <div class="mdl-card__title">
             <h2 class="mdl-card__title-text">Contenido</h2>
          </div>
                <div class="mdl-card__media">
                    <div class="material-icons mdl-badge mdl-badge--overlap" data-badge="{{$content_total}}" style="font-size: 80px; margin-left: 90px ">assignment</div>
                </div>
                @if($content_total==0)
                    <div class="mdl-card__supporting-text">
                        <p>No Hay Contenido pendiente de Aprobacion</p>
                    </div>
                <div class="mdl-card__actions">
                </div>    
                    @else
                    <div class="mdl-card__supporting-text">
                        <p>Posee {{$content_total}} Proveedores por revisar</p>
                    </div>
                    <div class="mdl-card__actions">
                    
                    <a href="{{url('/promoter_content')}}"><i class="material-icons">launch</i></a>
                    
                       
                    </div>
                    @endif
        </div>    
    </div>

 </div>

</main>
@endsection
