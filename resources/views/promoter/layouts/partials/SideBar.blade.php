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
    @if(Auth::guard('Promoter')->user()->priority == 2 || Auth::guard('Promoter')->user()->priority == 3)
      @if($permiso!=false)
        @foreach($permiso->license as $pro)
          @if($pro->name == 'contenido')
          <li><div class="divider"></div></li>
          <li>
            <a href="{{url('AdminContent')}}" class="waves-effect waves-blue">
              <i class="small material-icons">view_carousel</i>
              Contenido
              <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
            </a>
          </li>
          @endif
          @if($pro->name == 'cliente')
          <li>
            <ul class= "collapsible collapsible-accordion">
              <li>
                <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
                  <i class="small material-icons">group</i>
                  Cliente
                  <span class="new badge orange darken-1" data-badge-caption="" id="cliente" style="display: none; background-color: #d9534f;"></span>
                  <i class="material-icons right">expand_more</i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a href="{{url('admin_clients_payments')}}" class="waves-effect waves-blue">
                        <i class="small material-icons">payment</i>
                        Pagos
                        <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosU" style="display: none; background-color: #d9534f;"></span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('admin_clients')}}" class="waves-effect waves-blue">
                        <i class="small material-icons">group_add</i>
                        Solicitudes
                        <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          @endif
          @if($pro->name == 'proveedores')
          <li>
            <ul class= "collapsible collapsible-accordion">
              <li>
                <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
                  <i class="small material-icons">assignment_ind</i>
                  Proveedor
                  <span class="new badge orange darken-1" data-badge-caption="" id="proveedor" style="display: none; background-color: #d9534f;"></span>
                  <i class="material-icons right">expand_more</i>
                </a>
                <div class="collapsible-body">
                  <ul>
                    <li>
                      <a href="{{url('admin_sellers_payments')}}" class="waves-effect waves-blue">
                        <i class="small material-icons">payment</i>
                        Pagos
                        <span class="new badge orange darken-1" data-badge-caption="" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('admin_applys')}}" class="waves-effect waves-blue">
                        <i class="small material-icons">group_add</i>
                        Solicitudes
                        <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudProveedor" style="display: none; background-color: #d9534f;"></span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('admin_sellers')}}" class="waves-effect waves-blue">
                        <i class="small material-icons">group</i>
                        Proveedores
                        <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          @endif
          @if($pro->name == 'reportes')
          <li>
            <a href="{{url('AdminReport')}}" class="waves-effect waves-blue">
              <i class="small material-icons">equalizer</i>
              Reportes
              <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
            </a>
          </li>
          @endif
          @if($pro->name == 'usuariosBackend')
          @if(Auth::guard('Promoter')->user()->priority == 2)
            <li>
              <a href="{{url('BackendUsers')}}" class="waves-effect waves-blue">
                <i class="small material-icons">account_circle</i>
                Usuarios BackEnd
              </a>
            </li>
          @endif
        @endif
      @endforeach
    @else
      <li>
        <ul class= "collapsible collapsible-accordion" >

            <li>
                <a href="javascript:;" class="collapsible-header waves-effect waves-green"><i class="small material-icons left" >apps</i>Mi contenido<i class="material-icons right" >expand_more</i></a>

                <div class="collapsible-body">
                        <blockquote>Aún no posee módulos asignados.</blockquote>
                </div>
            </li>
        </ul>
      </li>
    @endif
  @endif
    @if(Auth::guard('Promoter')->user()->priority == 1)
    <li><div class="divider"></div></li>
    <li>
      
      <!--<ul class= "collapsible collapsible-accordion">
        <li>
          <a href="javascript:;" class="waves-effect waves-blue">
            <i class="small material-icons">view_carousel</i>
            Contenido
            <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
              <i class="material-icons right">expand_more</i>
          </a>
          
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{url('admin_clients')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group_add</i>
                  Solicitudes
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              
            </ul>
          </div>
        </li>

    </ul> -->
    
    <ul class= "collapsible collapsible-accordion">
      <li>
        <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
          <i class="small material-icons">view_carousel</i>
          Contenidos
          <span class="new badge orange darken-1" data-badge-caption="" id="badgeContenido" style="display: none; background-color: #d9534f;"></span>
          <i class="material-icons right">expand_more</i>
        </a>
        <div class="collapsible-body">
          <ul>
            <li>
              <a  href="{{url('/admin_albums')}}" class="waves-effect waves-blue">
                <i class="material-icons small">music_note</i> 
                Álbumes
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeAlbums" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
            <li>
              <a href="{{url('/admin_movies')}}" class="waves-effect waves-blue">
                <i class="material-icons" >live_tv</i>
                Películas
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeMovies" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
            <li>
              <a href="{{url('/admin_series')}}" class="waves-effect waves-blue">
                <i class=" material-icons" >local_movies</i>
                Series 
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeSeries" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
            <li>
              <a href="{{url('/admin_books')}}" class="waves-effect waves-blue">
                <i class="small material-icons" >book</i>
                Libros
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeBooks" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
        
            <li>
              <a href="{{url('/admin_tv')}}" class="waves-effect waves-blue">
                <i class="small material-icons" >live_tv</i>
                Tv 
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeTv" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
            <li>
              <a href="{{url('AdminContent')}}" class="waves-effect waves-blue">
                <i class="small material-icons">view_carousel</i>
                Ver todos  
                <span class="new badge orange darken-1" data-badge-caption="" id="badgeRadio" style="display: none; background-color: #d9534f;"></span>

              </a>
            </li>
          
          
          
          </ul>
        </div>
      </li>
    </ul>
    </li>
    <li>
      <ul class= "collapsible collapsible-accordion">
        <li>
          <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
            <i class="small material-icons">group</i>
            Usuarios
            <span class="new badge orange darken-1" data-badge-caption="" id="cliente" style="display: none; background-color: #d9534f;"></span>
            <i class="material-icons right">expand_more</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{url('admin_clients_payments')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">payment</i>
                  Pagos
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosU" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="{{url('admin_clients')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group_add</i>
                  Verificación C.I
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudUsuario" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li>
      <ul class= "collapsible collapsible-accordion">
        <li>
          <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
            <i class="small material-icons">assignment_ind</i>
            Proveedor
            <span class="new badge orange darken-1" data-badge-caption="" id="proveedor" style="display: none; background-color: #d9534f;"></span>
            <i class="material-icons right">expand_more</i>
          </a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a href="{{url('admin_sellers_payments')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">payment</i>
                  Pagos
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="{{url('admin_applys')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group_add</i>
                  Nuevas Cuentas
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudProveedor" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="{{url('admin_sellers')}}" class="waves-effect waves-blue">
                  <i class="small material-icons">group</i>
                  Nuevos Contenidos
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
    <li>
      <a href="{{url('AdminReport')}}" class="waves-effect waves-blue">
        <i class="small material-icons">equalizer</i>
        Reportes
        <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
      </a>
    </li>
      <li>
        <a href="{{url('ModulesLicense')}}" class="waves-effect waves-blue">
          <i class="small material-icons">announcement</i>
          Modulos y permisos
        </a>
      </li>
      <li>
        <ul class= "collapsible collapsible-accordion">
          <li>
            <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
              <i class="small material-icons">store</i>
                Beneficios
                <span class="new badge orange darken-1" data-badge-caption="" id="beneficio" style="display: none; background-color: #d9534f;"></span>
              <i class="material-icons right">expand_more</i>
            </a>
            <div class="collapsible-body">
              <ul>
                <li>
                  <a href="{{url('admin_bidder_payments')}}" class="waves-effect waves-blue">
                    <i class="small material-icons">payment</i>
                    Pagos
                    <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosB" style="display: none; background-color: #d9534f;"></span>
                  </a>
                </li>
                <li>
                  <a href="{{url('Products')}}">
                    <i class="small material-icons">shopping_basket</i>
                    Productos
                    <span class="new badge orange darken-1" data-badge-caption="" id="badgeProductos" style="display: none; background-color: #d9534f;"></span>
                  </a>
                </li>
                <li>
                  <a href="{{url('Bidder')}}">
                    <i class="small material-icons">group</i>
                    Aliados
                    <span class="new badge orange darken-1" data-badge-caption="" id="badgeOfertantes" style="display: none; background-color: #d9534f;"></span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
      <li>
        <a href="{{url('BackendUsers')}}" class="waves-effect waves-blue">
          <i class="small material-icons">account_circle</i>
          Usuarios BackEnd
        </a>
      </li>
      <li>
        <ul class= "collapsible collapsible-accordion">
          <li>
            <a href="javascript:;" class="collapsible-header waves-effect waves-blue">
              <i class="small material-icons">location_on</i>
                Localidad
                <span class="new badge orange darken-1" data-badge-caption="" id="provincias" style="display: none; background-color: #d9534f;"></span>
              <i class="material-icons right">expand_more</i>
            </a>
            <div class="collapsible-body">
              <ul>
                <li>
                  <a href="{{url('Pais')}}" class="waves-effect waves-blue"><i class="small material-icons">public</i>País
                  </a>
                </li>
                <li>
                  <a href="{{url('Regiones')}}" class="waves-effect waves-blue"><i class="small material-icons">pin_drop</i>Región
                  </a>
                </li>
                <li>
                  <a href="{{url('Provincias')}}" class="waves-effect waves-blue"><i class="small material-icons">assistant_photo</i>Provincias
                  </a>
                </li>
                <li>
                  <a href="{{url('Ciudades')}}" class="waves-effect waves-blue"><i class="small material-icons">location_city</i>Ciudad
                  </a>
                </li>
                <!-- MODULO DE PARROQUIAS COMENTADO MOMENTANEAMENTE -->
                <!--<li>
                  <a href="{{url('Parroquias')}}" class="waves-effect waves-blue"><i class="small material-icons">directions</i>Parroquia
                  </a>
                </li>-->
              </ul>
            </div>
          </li>
        </ul>
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
            <span>Contenidos</span>
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