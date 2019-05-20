  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view blue">
        <div class="container">
          <a href="<?php echo e(url('EditProfile')); ?>"><img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a>
        </div>
        <div class="info-container">
          <div class="name">
            <a class="white-text" href="#">
              <?php echo e(Auth::guard('Promoter')->user()->name_c); ?>

            </a>
            <br>
            <a class="white-text" href="#">
              <?php echo e(Auth::guard('Promoter')->user()->Roles()->first()->name); ?>

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
      <a href="<?php echo e(url('AdminContent')); ?>" class="waves-effect waves-blue">
        <i class="small material-icons">view_carousel</i>
        Contenido
        <span class="new badge orange darken-1 curvaBoton" data-badge-caption="" id="badgeContenido" style="display: none;"></span>
      </a>
    </li>


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
                <a href="<?php echo e(url('admin_clients_payments')); ?>" class="waves-effect waves-blue">
                  <i class="small material-icons">payment</i>
                  Pagos
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosU" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('admin_clients')); ?>" class="waves-effect waves-blue">
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
                <a href="<?php echo e(url('admin_sellers_payments')); ?>" class="waves-effect waves-blue">
                  <i class="small material-icons">payment</i>
                  Pagos
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgePagos" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('admin_applys')); ?>" class="waves-effect waves-blue">
                  <i class="small material-icons">group_add</i>
                  Solicitudes
                  <span class="new badge orange darken-1" data-badge-caption="" id="badgeSolicitudProveedor" style="display: none; background-color: #d9534f;"></span>
                </a>
              </li>
              <li>
                <a href="<?php echo e(url('admin_sellers')); ?>" class="waves-effect waves-blue">
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
    <li>
      <a href="<?php echo e(url('AdminReport')); ?>" class="waves-effect waves-blue">
        <i class="small material-icons">equalizer</i>
        Reportes
        <span class="new badge orange darken-1" data-badge-caption="" id="badgeProveedores" style="display: none; background-color: #d9534f;"></span>
      </a>
    </li>
    <?php if(Auth::guard('Promoter')->user()->priority == 1 OR Auth::guard('Promoter')->user()->priority == 2): ?>
      <li>
        <a href="<?php echo e(url('BackendUsers')); ?>" class="waves-effect waves-blue">
          <i class="small material-icons">account_circle</i>
          Usuarios BackEnd
        </a>
      </li>
    <?php endif; ?>
    <?php if(Auth::guard('Promoter')->user()->priority == 1): ?>
      <li>
        <a href="<?php echo e(url('Business')); ?>" class="waves-effect waves-blue">
          <i class="small material-icons">account_balance</i>
          Negocios y otros
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
                  <a href="<?php echo e(url('admin_bidder_payments')); ?>" class="waves-effect waves-blue">
                    <i class="small material-icons">payment</i>
                    Pagos
                    <span class="new badge orange darken-1" data-badge-caption="" id="badgePagosB" style="display: none; background-color: #d9534f;"></span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo e(url('Products')); ?>">
                    <i class="small material-icons">shopping_basket</i>
                    Productos
                    <span class="new badge orange darken-1" data-badge-caption="" id="badgeProductos" style="display: none; background-color: #d9534f;"></span>
                  </a>
                </li>
                <li>
                  <a href="<?php echo e(url('Bidder')); ?>">
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
        <a href="<?php echo e(url('conversiones')); ?>" class="waves-effect waves-blue">
          <i class="small material-icons">attach_money</i>
          Conversiones
        </a>
      </li>
      <li>
        <a href="<?php echo e(route('log-viewer::dashboard')); ?>" class="waves-effect waves-blue" target="_blank">
          <i class="small material-icons">error</i>
          Errores
        </a>
      </li>
    <?php endif; ?>
  </ul>
  