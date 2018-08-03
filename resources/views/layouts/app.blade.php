
<!DOCTYPE html>
<html lang="en">
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
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/lineicons/style.css') }}">    
    
    <!-- Custom styles for this template -->
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/css/style-responsive.css') }}" rel="stylesheet">

     @yield('css')
    <script src="{{ asset ('assets/js/chart-master/Chart.js')}}"></script>

    <!--estilo plyr-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">

    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

    <!--Modal-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

    <!--Buscador-->
    <link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
   <body>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>

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
            <a href="{{ url('/home')}}" class="logo"><b><img src="{{asset('sistem_images/Leipel Logo1-01.png')}}" width="110px"></b></a>
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
                            <i class="fa fa-envelope-o"></i>
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
                    <li><a class="logout" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">Salir</a></li>
                </ul>
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
              <ul class="sidebar-menu" id="nav-accordion">
                  @if(Auth::user()->img_perf)
                    <p class="centered"><a href="{{ url('/home')}}"><img src="{{asset(Auth::user()->img_perf)}}" class="img-circle" width="80"></a></p>
                  @else
                   <p class="centered"><a href="{{ url('/home')}}"><img src="{{asset('sistem_images/DefaultUser.png')}}" class="img-circle" width="80"></a></p>
                  @endif
                  <h5 class="centered">{{Auth::user()->name}}</h5>
                  <div class="card-content white-text">
                      <span class="card-title centered"><h6>Tickets Disponibles: <p>{{Auth::user()->credito}}</p></h6></span>
                      
                  </div>  
                    
                  <li class="sub-menu">
                      <a class="sub" href="#">
                          <i class="fa fa-user"></i>
                          <span>Mi Perfil</span>
                      </a>
                      <ul class="sub">
                        <li><a href="{{url('EditProfile')}}">Editar mi perfil</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                    <a href="javascript:;">
                      <i class="fa fa-money"></i>
                      <span>Adquirir Contenido</span>
                    </a>
                    <ul class="sub">
                      <li><a href="{{url('MusicContent')}}">Música</a></li>
                    </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Entretenimiento</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('MyMovies')}}">Mis peliculas</a></li>
                          <li><a href="#">Mis Series</a></li>
                          <li class="sub-menu">
                              <a href="javascript:;" >
                                <span>Mi música</span>
                              </a>
                            <ul class="sub">
                              <li><a  href="{{url('MyMusic')}}">Sencillos</a></li>
                              <li><a  href="{{url('MyAlbums')}}">Albums</a></li>
                            </ul>
                          </li>

                          <li class="sub-menu">
                            <a href="javascript: ;">
                              <span>Mis lecturas</span>
                            </a>
                            <ul class="sub">
                              <li><a  href="{{url('MyReads')}}">Mis libros</a></li>
                              <li><a  href="{{url('MyMegazine')}}">Mis megazines</a></li>
                            </ul>
                          </li>

                          <li class="sub-menu">
                            <a href="javascript: ;">
                              <span>Mis streams</span>
                            </a>
                            <ul class="sub">
                              <li><a  href="#">Tv</a></li>
                              <li><a href="#">Radio</a></li>
                            </ul>
                          </li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Referidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{url('WebsUser')}}">Mis redes</a></li>
                          <li><a  href="{{url('Referals')}}"">Referir</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-heart"></i>
                          <span>Seguidos</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="blank.html">Mis seguidos</a></li>
                          <li><a  href="login.html">Proveedores</a></li>
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <section id="main-content">
          <section class="wrapper">
                <div class="row">
                    <div class="col-lg-9 main-chart">
                        @yield('main')
                    </div>
                    <div class="col-lg-3 ds">
                        @include('layouts.partials.siderRigth') 
                    </div><!-- /col-lg-3 -->
                </div>
          </section>
      </section> 
@extends('layouts.partials.footer')

</body>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/js/jquery.js') }}"></script>
    <script src="{{asset('assets/js/jquery-1.8.3.min.js') }}"></script>
    
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

  <!--Script Plyr-->
  <script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>

  <!--PDF.JS-->
  <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>

  <!--Datatables-->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
    
    @yield('js')


</html>

  