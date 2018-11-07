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
                          <span class="badge" id="badgeContenido" style="display: none;"></span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{url('admin_sellers')}}">
                          <i class="fas fa-user-tie"></i>
                          <span>Proveedores</span>
                          <span class="badge" id="badgeProveedores" style="display: none;"></span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{url('admin_sellers_payments')}}">
                          <i class="fas fa-credit-card"></i>
                          <span>Pagos de Proveedores</span>
                          <span class="badge" id="badgePagos" style="display: none;"></span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{url('admin_applys')}}">
                          <i class="fas fa-archive"></i>
                          <span>Solicitudes</span>
                          <span class="badge" id="badgeSolicitudProveedor" style="display: none;"></span>
                      </a>
                  </li>

                  <li class="mt">
                      <a href="{{url('admin_clients')}}">
                          <i class="fa fa-users"></i>
                          <span>Clientes</span>
                          <span class="badge" id="badgeSolicitudUsuario" style="display: none;"></span>
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