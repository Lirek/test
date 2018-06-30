  <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU LEFT
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
 <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
            <h3>NOTIFICATIONS</h3>
                                        
                      <!-- First Action -->
                      <div class="desc">
                        <div class="thumb">
                          <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                        </div>
                        <div class="details">
                          <p><muted>2 Minutes Ago</muted><br/>
                             <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                          </p>
                        </div>
                      </div>
                       <!-- USERS ONLINE SECTION -->
            <h3>TEAM MEMBERS</h3>
                      <!-- First Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DIVYA MANIAN</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Second Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DJ SHERMAN</a><br/>
                             <muted>I am Busy</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Third Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">DAN ROGERS</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fourth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Zac Sniders</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>
                      <!-- Fifth Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="assets/img/ui-sam.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Marcel Newman</a><br/>
                             <muted>Available</muted>
                          </p>
                        </div>
                      </div>

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>