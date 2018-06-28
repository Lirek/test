  <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU 
      *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="<?php echo e(url('/home')); ?>"><img src="<?php echo e(asset(Auth::user()->img_perf)); ?>" class="img-circle" width="80"></a></p>
                  <h5 class="centered"><?php echo e(Auth::user()->name); ?></h5>
                  <div class="card-content white-text">
                      <span class="card-title centered"><h6>Tickets Disponibles: <p><?php echo e(Auth::user()->credito); ?></p></h6></span>
                      
                  </div>  
                    
                  <li class="mt">
                      <a class="active" href="#">
                          <i class="fa fa-user"></i>
                          <span>Mi Perfil</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Mi Contenido</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Mis Peliculas</a></li>
                          <li><a  href="#">Mi Musica</a></li>
                          <li><a  href="#">Mis lecturas</a></li>
                          <li><a  href="#">Mis Streams</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Referidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Mis Redes</a></li>
                          <li><a  href="#">Referir</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-heart"></i>
                          <span>Seguidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Mis Seguidos</a></li>
                          <li><a  href="login.html">Proveedores</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
