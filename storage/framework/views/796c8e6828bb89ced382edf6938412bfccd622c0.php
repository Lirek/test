<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">

    <title>LEIPEL</title>

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="<?php echo e(asset('plugins/materialize_adm/css/materialize.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php echo e(asset('plugins/materialize_adm/css/style.css')); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!--https://materialdesignicons.com/-->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css"> 
                .iti-flag {background-image: url("<?php echo e(asset('plugins/telefono/flags.png')); ?>");}

            @media  only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("<?php echo e(asset('plugins/telefono/flags2x.png')); ?>");}
        
        }
    </style> 
  </head>
  <body>
    
    <!-- 
    *******************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *******************************************************************************************************************-->
    
    <header>
      <div class="navbar-fixed">
        <nav class="blue">
          <div class="nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <!-- Logo principal -->
            <a href="<?php echo e(url('/promoter_home')); ?>" class="brand-logo left logo-adjust">
              <img class="responsive-img img-logo" src="<?php echo e(asset('sistem_images/Leipel Logo1-01.png')); ?>">
            </a>
            <!-- Logo principal -->
            <!-- Cerrar sesion -->
            <ul class="right">
              <li>
                <a class="logout" href="<?php echo e(url('/promoter_logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <!--Cerrar Sesión-->
                  <i class="left material-icons tooltipped" data-position='left' data-tooltip='Cerrar sesión'>power_settings_new</i>
                </a>
              </li>
            </ul>
            <!-- Cerrar sesion -->
          </div>
        </nav>
      </div>
      <!--
      *******************************************************************************************************************
      MAIN SIDEBAR MENU 
      *******************************************************************************************************************
      -->
      <!--sidebar start-->
      <?php echo $__env->make('promoter.layouts.partials.SideBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <!--sidebar end-->
    </header>
    <!--main content star-->
    <main>
      <section id="main-content" class="section section-daily-stats center">
        <form id="logout-form" action="<?php echo e(url('/promoter_logout')); ?>" method="POST" style="display: none;">
          <?php echo e(csrf_field()); ?>

        </form>
        <div class="row">
          <?php echo $__env->yieldContent('main'); ?>
        </div>
      </section>
    </main>
    <!--main content end-->
    
    <!--footer start-->
    <footer class="page-footer blue">
      <div class="footer-copyright">
        <div class="container center">
          Leipel &copy 2019. Todos los derechos reservados.
        </div>
      </div>
    </footer>
    <!--footer end-->
    
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="<?php echo e(asset('assets/js/jquery.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('plugins/telefono/intlTelInput.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/telefono/utils.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo e(asset('assets/js/jquery.dcjqaccordion.2.7.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.scrollTo.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/jquery.nicescroll.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/js/jquery.sparkline.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/upload/jquery.uploadPreview.js')); ?>"></script>

    <!--common script for all pages-->
    <script src="<?php echo e(asset('assets/js/common-scripts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter/js/jquery.gritter.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/js/gritter-conf.js')); ?>"></script>

    <!--script for this page-->
    <script src="<?php echo e(asset('assets/js/sparkline-chart.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/zabuto_calendar.js')); ?>"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
    <!--Import jQuery before materialize.js-->
    <script src="<?php echo e(asset('plugins/materialize_adm/js/materialize.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/materialize_adm/js/init.js')); ?>"></script>

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

      function yesnoCheck() {
        if (document.getElementById('option-2').checked) {
          $('#if_no').show();
          $('#razon').attr('required','required');
        } else {
          $('#if_no').hide();
          $('#razon').val('');
          $('#razon').removeAttr('required');
        }
      }

      $(document).ready(function () {
        $('.tooltipped').tooltip();
        var url = "<?php echo e(url('/contenidoPendiente/')); ?>";
        $.ajax({
          url: url,
          type: 'get',
          dataType: "json",
          success: function (result) {
            console.log(result);
            if (result.contenido!=0) {
              $('#badgeContenido').show();
              $('#badgeContenido').text(result.contenido);
            }
            if (result.proveedores!=0) {
              $('#badgeProveedores').show();
              $('#badgeProveedores').text(result.proveedores);
            }
            if (result.pagosP!=0) {
              $('#badgePagos').show();
              $('#badgePagos').text(result.pagosP);
            }
            if (result.pagosU!=0) {
              $('#badgePagosU').show();
              $('#badgePagosU').text(result.pagosU);
            }
            if (result.solicitudesP!=0) {
              $('#badgeSolicitudProveedor').show();
              $('#badgeSolicitudProveedor').text(result.solicitudesP);
            }
            if (result.solicitudesU+result.pagosU!=0) {
              $('#badgeSolicitudUsuario').show();
              $('#badgeSolicitudUsuario').text(result.solicitudesU+result.pagosU);
            }
          },
          error: function (result) {
            swal('Existe un error al cargar los contenidos pendientes','','error')
            .then((recarga) => {
              location.reload();
            });
            console.log(result);
          }
        });
      });

    </script>
    <?php echo $__env->yieldContent('js'); ?>
  </body>
</html>

