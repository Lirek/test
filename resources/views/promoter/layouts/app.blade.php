
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <title>LEIPEL</title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">   <link rel="stylesheet" href="{{asset('plugins/telefono/intlTelInput.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>

    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/style-responsive.css') }}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css"> 
                .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}
        
        }
</style> 
  </head>
  
   <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{ url('/promoter_home')}}" class="logo"><b><img src="{{asset('sistem_images/Leipel Logo1-01.png')}}" width="110px"></b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
               

                <!--  notification start -->
                <ul class="nav top-menu">

                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">4</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 4 pending tasks</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <div class="task-info">
                                        <div class="desc">DashGum Admin Panel</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{ url('/promoter_logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->
       <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU 
      *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
@include('promoter.layouts.partials.SideBar')
      <!--sidebar end-->
      <section id="main-content">
          <section class="wrapper">
                
                                        
            <form id="logout-form" action="{{ url('/promoter_logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        @yield('main')
                    
                    
                        
    
          </section>
      </section> 
            <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Leipel &copy 2018. Todos los Derechos Reservados.
          </div>
      </footer>
      <!--footer end-->
  </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/js/jquery.js') }}"></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script><script src="{{ asset('plugins/telefono/intlTelInput.js') }}"></script>
    <script src="{{ asset('plugins/telefono/utils.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>


    <!--common script for all pages-->
    <script src="{{asset('assets/js/common-scripts.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

    <!--script for this page-->
    <script src="{{asset('assets/js/sparkline-chart.js')}}"></script>    
  <script src="{{asset('assets/js/zabuto_calendar.js')}}"></script> 
  <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

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
        if (document.getElementById('option-2').checked) 
        {
            $('#if_no').show();
        } 
        else 
        {
            $('#if_no').hide();
            $('#razon').val('');
        }
    </script>
  
@yield('js')
</body>
</html>

