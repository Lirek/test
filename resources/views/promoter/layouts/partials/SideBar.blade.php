  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view blue">
        <div class="container">
          <a href="{{url('EditProfile')}}"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a>
        </div>
        <div class="info-container">
          <div class="name">
            <a class="white-text" href="#">
              {{Auth::guard('Promoter')->user()->name_c}}
            </a>
            <br>
            <a class="white-text" href="#">
              {{Auth::guard('Promoter')->user()->Roles()->first()->name}}
            </a>
          </div>
        </div>
      </div>
    </li>
    <li>
      <a href="#" class="waves-effect waves-blue">
        <i class="small material-icons">person</i>
        Mi Perfil
      </a>
    </li>
    <li><div class="divider"></div></li>
    <li>
      <a href="{{url('AdminContent')}}" class="waves-effect waves-blue">
        <i class="small material-icons">view_carousel</i>
        Contenido
        <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
      </a>
    </li>
    <li>
      <a href="{{url('admin_sellers')}}" class="waves-effect waves-blue">
        <i class="small material-icons">group</i>
        Proveedores
        <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
      </a>
    </li>
    <li>
      <ul class= "collapsible collapsible-accordion">
        <li>
          <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
            <i class="small material-icons">payment</i>
            Pagos
            <i class="material-icons right">expand_more</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{url('admin_sellers_payments')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group</i>
                  De proveedores
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="{{url('admin_clients_payments')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group</i>
                  De clientes
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li>
      <a href="{{url('admin_applys')}}" class="waves-effect waves-blue">
        <i class="small material-icons">group_add</i>
        Solicitudes
        <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudProveedor" style="display: none; background-color: #d9534f;"></span>
      </a>
    </li>
    <li>
      <a href="{{url('admin_clients')}}" class="waves-effect waves-blue">
        <i class="small material-icons">group</i>
        Clientes
        <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
      </a>
    </li>
    @if(Auth::guard('Promoter')->user()->priority == 1 OR Auth::guard('Promoter')->user()->priority == 2)
      <li>
        <a href="{{url('BackendUsers')}}" class="waves-effect waves-blue">
          <i class="small material-icons">supervisor_account</i>
          Usuarios BackEnd
        </a>
      </li>
    @endif
    @if(Auth::guard('Promoter')->user()->priority == 1)
      <li>
        <a href="{{url('Business')}}" class="waves-effect waves-blue">
          <i class="small material-icons">account_balance</i>
          Negocios y otros
        </a>
      </li>
      <li>
        <a href="{{route('log-viewer::dashboard')}}" class="waves-effect waves-blue" target="_blank">
          <i class="small material-icons">error</i>
          Errores
        </a>
      </li>
    @endif
  </ul>
  {{--
  <aside>
    <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
        <h5 class="centered">{{Auth::guard('Promoter')->user()->name_c}}</h5>
        <div class="card-content white-text">
          <span class="card-title centered"><h4><p>{{Auth::guard('Promoter')->user()->Roles()->first()->name}}</p></h4></span>
        </div>
        <li class="mt">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Mi Perfil</span>
          </a>
        </li>
        <li class="mt">
          <a href="{{url('AdminContent')}}">
            <i class="fas fa-suitcase"></i>
            <span>Contenido</span>
            <span class="badge" id="badgeContenido" style="display: none; background-color: #d9534f;"></span>
          </a>
        </li>
        <li class="mt">
          <a href="{{url('admin_sellers')}}">
            <i class="fas fa-user-tie"></i>
            <span>Proveedores</span>
            <span class="badge" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
          </a>
        </li>
        <li class="mt">
          <a href="{{url('admin_sellers_payments')}}">
            <i class="fas fa-credit-card"></i>
            <span>Pagos de Proveedores</span>
            <span class="badge" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
          </a>
        </li>
        <li class="mt">
          <a href="{{url('admin_applys')}}">
            <i class="fas fa-archive"></i>
            <span>Solicitudes</span>
            <span class="badge" id="badgeSolicitudProveedor" style="display: none; background-color: #d9534f;"></span>
          </a>
        </li>
        <li class="mt">
          <a href="{{url('admin_clients')}}">
            <i class="fa fa-users"></i>
            <span>Clientes</span>
            <span class="badge" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
          </a>
        </li>
        @if(Auth::guard('Promoter')->user()->priority == 1 OR Auth::guard('Promoter')->user()->priority == 2)
          <li class="mt">
            <a href="{{url('BackendUsers')}}">
              <i class="fa fa-wrench"></i>
              <span>Usuarios Backend</span>
            </a>
          </li>
        @endif
        @if(Auth::guard('Promoter')->user()->priority == 1)
          <li class="mt">
            <a href="{{url('Business')}}">
              <i class="fa fa-university"></i>
              <span>Negocios y Otros</span>
            </a>
          </li>
          <li class="mt">
            <a href="{{ route('log-viewer::dashboard') }}">
              <i class="fa fa-warning" style="color:red"></i>
              <span>Errores</span>
            </a>
          </li>
        @endif
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>
  --}}