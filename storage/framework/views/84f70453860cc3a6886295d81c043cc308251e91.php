<!DOCTYPE html>
<html>
<head>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<!--              Awesome                                                -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/Ionicons/css/ionicons.min.css')); ?>">
  <style type="text/css">
    
  
  footer 
  {
    padding-left: 240px;

  }
  main
  {
    flex: 1 0 auto;

  }
  header
        {
        min-height: 100vh;
        }

  body {
    min-height: 100vh;
    flex-direction: column;
    display: flex;
    background: linear-gradient(to bottom right, #22bded, #3871b9);
}
;
  }

  @media  only screen and (max-width: 992px) {
    header,
    main,
    footer {
      padding-left: 0;
    }
  }

  #credits li,
  #credits li a {
    color: white;
  }

  #credits li a {
    font-weight: bold;
  }

  .footer-copyright .container,
  .footer-copyright .container a {
    color: #BCC2E2;
  }

  .fab-tip {
    position: fixed;
    right: 85px;
    padding: 0px 0.5rem;
    text-align: right;
    background-color: #323232;
    border-radius: 2px;
    color: #FFF;
    width: auto;
  }
  </style>
</head>

<body>

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

    <li id="dash_dashboard"><b style="margin-left: 100px"><i class="material-icons">local_offer</i> <?php echo e(Auth::user()->credito); ?></b></li>

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

  <header>

    <ul class="dropdown-content" id="user_tickets">
      <li>
          <a class="indigo-text tooltipped" data-position="left" data-tooltip="Comprar Tickets" href="#!">
           <i class="material-icons">add_shopping_cart</i>
          </a>
      </li>
      
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Ver Transacciones" href="#!">
          <i class="material-icons">
          account_balance
          </i>
        </a>
      </li>   
    </ul>

    <ul class="dropdown-content" id="user_dropdown">
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Editar Datos de Perfil" href="#!">
          <i class="material-icons">
                settings
          </i>
      </a>
    </li>
      
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Salir" href="#!">
          <i class="material-icons">
          power_settings_new
          </i>
        </a>
      </li>
    
    </ul>

    <nav class="white" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-large" href="#!"><img style="margin-top: 5px; width:30%; margin-left: 5px;" src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>"/></a>

        <ul class="right hide-on-med-and-down">
          
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class='material-icons' style="color: #3871b9">account_circle</i></a>
          </li>

          <li>
            <a class='right dropdown-button' href='' data-activates='user_tickets'><i class='material-icons' style="color: #3871b9">local_offer</i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>
  </header>

  <main>


    <div class="fixed-action-btn click-to-toggle" style="bottom: 45px; right: 24px;">
      <a class="btn-floating btn-large blue waves-effect waves-light tooltipped" data-position="left" data-tooltip="Ver Contenido">
        <i class="large material-icons">add</i>
      </a>

      <ul>
        <li>
          <a class="btn-floating blue"><i class="material-icons">video_library</i></a>
          <a href="" class="btn-floating fab-tip">Series</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">book</i></a>
          <a href="" class="btn-floating fab-tip">Libos</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">collections_bookmark</i></a>
          <a href="" class="btn-floating fab-tip">Revistas</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">live_tv</i></a>
          <a href="" class="btn-floating fab-tip">Televisoras</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">radio</i></a>
          <a href="" class="btn-floating fab-tip">Radios</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">theaters</i></a>
          <a href="" class="btn-floating fab-tip">Peliculas</a>
        </li>

        <li>
          <a class="btn-floating blue"><i class="material-icons">music_note</i></a>
          <a href="" class="btn-floating fab-tip">Musica</a>
        </li>
      </ul>
    </div>
  </main>

  <footer class="blue-grey page-footer">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <h5 class="white-text">Leipel</h5>
          <ul id='credits'>
            <li>
              Disfrute del mejor contenido digital al alcanze de sus manos dentro de nuestra plataforma 
            </li>
            <li>
              <a href="https://material.io/icons/">Terminos y Condiciones del Servicio </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <span>Leipel 2018</span>
      </div>
    </div>
  </footer>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.button-collapse').sideNav();
    $('.collapsible').collapsible();
    $('select').material_select();
    });
  </script>

</body>
</html>
