<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">

    <title>Leipel</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('assets/css/bootstrap.css')); ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo e(asset('assets/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/css/zabuto_calendar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/js/gritter/css/jquery.gritter.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/lineicons/style.css')); ?>">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset ('assets/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset ('assets/css/style-responsive.css')); ?>" rel="stylesheet">

     <?php echo $__env->yieldContent('css'); ?>
    <script src="<?php echo e(asset ('assets/js/chart-master/Chart.js')); ?>"></script>

    <!--estilo plyr-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">

    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <!--Modal-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

    <!--Buscador-->
    <link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
   <body>
    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"> <?php echo e(csrf_field()); ?> </form>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
     <!--  <header class="header black-bg"> Barra azul -->
        <header class="header">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
           <!--  <a href="<?php echo e(url('/home')); ?>" class="logo"><b><img src="<?php echo e(asset('sistem_images/Leipel Logo1-01.png')); ?>" width="110px"> LOGO BLANCO -->
            <a href="<?php echo e(url('/home')); ?>" class="logo"><b><img src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>" width="150px">
            </b></a>
          <!--   <div class="nav pull-right top-menu" id="boton" >
            <div class="navbar-right" style="margin-top: 12px">
              <img height="39px" src="<?php echo e(asset('plugins/img/logo-icon-2.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/logo-icon-4.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/logo-icon.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/logo-icon-5.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/logo-icon-3.png')); ?>">
            </div>
            </div> -->
            
            <div class="nav pull-right top-menu" id="boton" >
            <div class="navbar-right" style="margin-top: 12px">
              <img height="39px" src="<?php echo e(asset('plugins/img/cine.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/musica.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/lectura.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/radio.png')); ?>">
              <img height="39px" src="<?php echo e(asset('plugins/img/tv.png')); ?>">
            </div>
            </div>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
 
            </div>
        </header>
      <!--header end-->
       <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU 
      *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion" style="margin-top: 40px">
                  <?php if(Auth::user()->img_perf): ?>
                    <p class="centered"><a href="<?php echo e(url('/home')); ?>"><img src="<?php echo e(asset(Auth::user()->img_perf)); ?>" class="img-circle" width="80"></a></p>
                  <?php else: ?>
                   <p class="centered"><a href="<?php echo e(url('/home')); ?>"><img src="<?php echo e(asset('sistem_images/DefaultUser.png')); ?>" class="img-circle" width="80"></a></p>
                  <?php endif; ?>
                  <?php if(Auth::user()->alias == null): ?>
                    <h5 class="centered" style="color: "><?php echo e(Auth::user()->name); ?></h5>
                  <?php else: ?>
                    <h5 class="centered" style="color: "><?php echo e(Auth::user()->alias); ?></h5>
                  <?php endif; ?>
                  <div class="card-content white-text">
                      <span class="card-title centered">
                        <h6> 
                          <a href=""  data-toggle="modal" data-target="#myModalTotal" title="Mi balance">
                            <!-- <u style="color: #ffffff">Tickets Disponibles: </u> -->
                            <!-- <p id="Tickets" style="color: #aeb2b7"> -->
                            <p id="Tickets" style="color: #ffffff">
                          </p>
                          </a>
                        </h6>
                      </span>
                      
                  </div>  
                    
                  <li class="sub-menu">
                      <a class="sub" href="#">
                          <i class="fa fa-user"></i>
                          <span>Mi Perfil</span>
                      </a>
                      <ul class="sub">
                        <li><a href="<?php echo e(url('EditProfile')); ?>">Editar mi perfil</a></li>
                      </ul>
                  </li>

                  <!-- <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-money"></i>
                      <span>Adquirir Contenido</span>
                    </a>
                    <ul class="sub">
                      <li><a href="<?php echo e(url('MusicContent')); ?>">Música</a></li>
                      <li><a href="<?php echo e(url('ReadingsBooks')); ?>">Libros</a></li>
                      <li><a href="<?php echo e(url('ShowMovies')); ?>">Peliculas</a></li>
                    </ul>
                  </li> -->

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Entretenimiento</span>
                      </a>
                      <ul class="sub">
                         <!--  <li><a  href="<?php echo e(url('MyMovies')); ?>">Cine</a></li> -->
                          <!-- <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Cine</a></li> -->
                          <!-- <li class="sub-menu">
                              <a href="javascript:;" >
                                <span>Música</span>
                              </a>
                            <ul class="sub">
                              <li><a  href="<?php echo e(url('MyMusic')); ?>">Sencillos</a></li>
                              <li><a  href="<?php echo e(url('MyAlbums')); ?>">Albums</a></li>
                              <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Sencillos</a></li>
                              <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Albums</a></li> 
                            </ul>
                          </li> -->

                          <!-- <li class="sub-menu">
                            <a href="javascript: ;">
                              <span>Lecturas</span>
                            </a>
                            <ul class="sub">
                              <li><a  href="<?php echo e(url('MyReads')); ?>">Mis libros</a></li>
                              <li><a  href="<?php echo e(url('MyMegazine')); ?>">Mis megazines</a></li>
                              <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Mis libros</a></li>
                              <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Mis megazines</a></li>
                            </ul>
                          </li> -->
                           <li><a  href="<?php echo e(url('ShowRadio')); ?>">Radio</a></li>
                           <li><a  href="<?php echo e(url('ShowTv')); ?>">Tv</a></li>
                         <!--  <li class="sub">
                            <a href="javascript: ;">
                              <span>Streams</span>
                            </a>
                            <ul class="sub">
                              <li><a  href="<?php echo e(url('ShowTv')); ?>">Tv</a></li>
                              <li><a href="<?php echo e(url('ShowRadio')); ?>">Radio</a></li>
                            </ul>
                          </li> -->
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Referidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo e(url('WebsUser')); ?>">Mis redes</a></li>
                          <li><a  href="<?php echo e(url('Referals')); ?>"">Referir</a></li>
                      </ul>
                  </li>
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-heart"></i>
                          <span>Seguidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Mis seguidos</a></li>
                          <li><a  href="#" data-toggle="modal" data-target="#myModalContenido">Proveedores</a></li>
                      </ul>
                  </li> -->
                  <li class="sub-menu">
                      <a href="<?php echo e(url('SaleTickets')); ?>" >
                          <i class="fa fa-ticket"></i>
                          <span>Recargar</span>
                      </a>  
                  </li>
                  <li class="sub-menu  hidden-xs hidden-sm"  style="position: relative;  top: 115px">
                      <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                        <span>Salir</span>
                      </a>
                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"> <?php echo e(csrf_field()); ?></form>
                     
                  </li>
                  <li class="sub-menu sidebar-menu  hidden-md hidden-lg hidden-xg"" id="nav-accordion">
                      <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                      <span>
                        <i class="fa fa-power-off"></i>
                            Salir
                        </span>
                        </a>
                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;"> <?php echo e(csrf_field()); ?></form>
                  </li>
              </ul>
              <!-- sidebar menu
               end-->
          </div>
      </aside>
      <!--sidebar end-->
      <section id="main-content">
          <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12 main-chart">
                        <?php echo $__env->yieldContent('main'); ?>
                    </div>
                    <!--BARRA OCULTA-->
                     <div class="col-lg-3" style="margin-bottom: 280px"> 
                       <!--COMENTADO-->
                     </div><!-- /col-lg-3 -->

                </div>
          </section>
      </section> 
      <div class="desc"></div>

<!--MODAL-->
<div id="myModalContenido" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" align="center">PRÓXIMAMENTE!</h4>
        </div>
        <div style="background-image: url('<?php echo e(asset('sistem_images/dsBuffer.png')); ?>'); 
      background-size: 100% 100%;;" class="img-rounded img-responsive av text-center">
          <!-- <img src="<?php echo e(asset('assets/img/Logo-Leipel.png')); ?>" style="width: 45%;  margin-left: 10%; margin-top: 20%"> -->
          <div>
          <img src="<?php echo e(asset('assets/img/wrench.png')); ?>" style=" z-index:1; width:10%;  margin-top: 40%">
          </div>
          <div align="center" style="margin-left: 20%; margin-right: 20%; margin-top: 2% ">
            <p><h3>Estamos trabajando para su entretenimiento</h3></p>
            <h4> visitenos pronto!!</h4>
          </div>
        </div>
        
      </div>
  </div>
<!--FIN DEL MODAL-->
<!--MODAL-->
<!--MODAL-->
<div id="myModalTotal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-ticket"></i> Mi Balance</h4>
      </div>
      <div class="modal-body">
        <label class="control-label col-sm-12 col-xs-12 col-md-12">
          <?php if(Auth::user()->credito != null): ?>
           <center><h4><b>Total de tickets:</b> <?php echo e(Auth::user()->credito); ?></h4></center>
          <?php else: ?>
            <center><h4><b>Total de tickets:</b> 0</h4></center>
          <?php endif; ?>
          <?php if(Auth::user()->points): ?>
            <center><h4><b>Total de puntos:</b> <?php echo e(Auth::user()->points); ?></h4></center>
          <?php else: ?>
            <center><h4><b>Total de puntos:</b> 0</h4></center>
          <?php endif; ?>
        </label>
        <center><a href="<?php echo e(url('MyBalance')); ?>">Ver detalle</a></center>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
</div>
<!--FIN DEL MODAL-->

</body>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery-1.8.3.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo e(asset('assets/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollTo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.sparkline.js')); ?>"></script>

   
    <!--common script for all pages-->
    <script src="<?php echo e(asset('assets/js/common-scripts.js')); ?>"></script>
    
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter/js/jquery.gritter.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter-conf.js')); ?>"></script>

    <!--script for this page-->
    <script src="<?php echo e(asset('assets/js/sparkline-chart.js')); ?>"></script>    
  <script src="<?php echo e(asset('assets/js/zabuto_calendar.js')); ?>"></script> 

  <!--Script Plyr-->
  <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>

  <!--PDF.JS-->
  <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

  <!--Datatables-->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  

<!--SCRIPS JS-->
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    <script>
       $(document).ready(function(){
        var id=<?php echo Auth::user()->id; ?>;
        $.ajax({ 
                
                url:"<?php echo e(URL('MyTickets')); ?>"+'/'+id, 
                type    : 'GET',
                dataType: "json",
                success: function (respuesta){
                  console.log(respuesta);
                  $('#Tickets').html(respuesta);
                  
                },
              });
      });
    </script>
    
    <?php echo $__env->yieldContent('js'); ?>


</html>

  
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>