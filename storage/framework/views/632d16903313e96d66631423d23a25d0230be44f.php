  <ul id="slide-out" class="side-nav fixed z-depth-2 light-blue darken-4">
    <li class="center no-padding">
      <div class="blue-grey white-text" style="height: 180px;">
        <div class="row">
          <img style="margin-top: 5%;" width="150" height="150" src="<?php echo e(asset(Auth::user()->img_perf)); ?>  " class="circle responsive-img" />

          <p style="margin-top: -13%;">
            <?php echo e(Auth::user()->name); ?>

          </p>
        </div>
      </div>
    </li>

    <li id="dash_dashboard"><b style="margin-left: 100px"><i class="fas fa-ticket-alt"></i> <?php echo e(Auth::user()->credito); ?></b></li>

    <ul class="collapsible" data-collapsible="accordion">
      <li id="dash_users">
        <div id="dash_users_header" class="collapsible-header waves-effect"><b>Mi Contenido</b></div>
        <div id="dash_users_body" class="collapsible-body">
          <ul>
            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Mis Peliculas</a>
            </li>

            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="<?php echo e(url('MyMusic')); ?>">Mi Musica</a>
            </li>

            <li id="users_seller">
              <a class="waves-effect" style="text-decoration: none;" href="<?php echo e(url('MyReads')); ?>">Mis Lecturas</a>
            </li>
            
            <li id="users_customer">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Mis Streams</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_products">
        <div id="dash_products_header" class="collapsible-header waves-effect"><b>Referidos</b></div>
        <div id="dash_products_body" class="collapsible-body">
          <ul>
            <li id="products_product">
              <a class="waves-effect" style="text-decoration: none;" href="<?php echo e(url('WebsUser')); ?>">Mis Redes</a>
              <a class="waves-effect" style="text-decoration: none;" href="<?php echo e(url('Referals')); ?>">Referir</a>
            </li>
          </ul>
        </div>
      </li>

      <li id="dash_categories">
        <div id="dash_categories_header" class="collapsible-header waves-effect"><b>Seguidos</b></div>
        <div id="dash_categories_body" class="collapsible-body">
          <ul>
            <li id="categories_category">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Mis Seguidos</a>
            </li>

            <li id="categories_sub_category">
              <a class="waves-effect" style="text-decoration: none;" href="#!">Proveedores</a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </ul>