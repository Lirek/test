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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
  
    <body>

        <section id="container" >
            <!--
            TOP BAR CONTENT & NOTIFICATIONS
            -->
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
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>
                                <span class="badge bg-theme">4</span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green">You have 4 pending tasks</p>
                                </li>
                                <li>
                                    <a href="#">
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
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-theme">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green">You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo">
                                            <img alt="avatar" src="assets/img/ui-zac.jpg">
                                        </span>
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
                <!--
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                        <li>
                            <a class="logout" href="{{ url('/logout') }}">Salir</a>
                        </li>
                    </ul>
                </div>
                -->
            </header>
            <!--header end-->
            <!-- 
            MAIN SIDEBAR MENU
            -->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered">
                            <!--Revisar este enlace -->
                            <a href="{{ url('/home')}}">
                                <img src="{{asset(Auth::user()->img_perf)}}" class="img-circle" width="80">
                            </a>
                        </p>
                        <h5 class="centered">{{Auth::user()->name}}</h5>
                        <div class="card-content white-text">
                            <span class="card-title centered"><h6>Tickets Disponibles: <p>{{Auth::user()->credito}}</p></h6></span>
                        </div>
                        <li class="mt">
                            <a class="active" href="{{ url('seller_home') }}">
                                <i class="glyphicon glyphicon-home"></i>
                                <span>Escritorio</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-user"></i>
                                <span>Mi Perfil</span>
                            </a>
                        </li>

                        @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')
                            {{--Accesos a los modulos --}}
                            @if($modulos==false)
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-warning"></i>
                                        <span>
                                            Aún no posee Módulos 
                                            <br>
                                            asignados.
                                        </span>
                                    </a>
                                </li>
                            @else
                                @foreach($modulos as $mod)
                                    {{--musica--}}
                                    @if($mod->name === 'Musica')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="li_music"></i>
                                                <span>Música</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/albums') }}">Registrar Álbum</a></li>
                                                <!-- Validar que la frase quepa en el espacio -->
                                                <li class="treeview">
                                                    <a href="{{ url('/artist_form') }}">
                                                        <span>
                                                            Registrar Grupo Musical o Solista
                                                        </span>
                                                    </a>
                                                </li>
                                                <!-- Validar que la frase quepa en el espacio -->
                                                <li><a href="{{ url('/single_registration') }}">Registrar Singles</a></li>
                                                <li><a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}">Mi Música</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{--peliculas--}}
                                    @if($mod->name =='Peliculas')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="fa fa-film"></i>
                                                <span>Películas</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/movies/create') }}">Registrar Película</a></li>
                                                <li><a href="{{ url('/movies') }}">Mis Películas</a></li>
                                                <!--Revisar este enlace porque es igual al registro de musica-->
                                                <!--
                                                <li><a href="{{ url('/single_registration') }}">Mis Películas</a></li>
                                                -->
                                            </ul>
                                        </li>
                                    @endif
                                    {{--revistas--}}
                                    @if($mod->name == 'Revistas')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="fa fa-archive"></i>
                                                <span>Revistas</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/megazine_form') }}">Registrar Revista Independiente</a></li>
                                                <li><a href="{{ url('/megazine_form') }}">Agregar Revistas a Cadenas de Publicacion</a></li>
                                                <li><a href="{{ url('/type') }}">Registrar cadena de publicaciones</a></li>
                                                <li><a href="{{ url('/my_megazine',Auth::guard('web_seller')->user()->id) }}">Mis Revistas</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{--series--}}
                                    @if($mod->name == 'Series')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="li_video"></i>
                                                <span>Series</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/series') }}">Registro de Serie</a></li>
                                                <li><a href="{{ url('/series/create') }}">Registrar Serie</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{--libros--}}
                                    @if($mod->name == 'Libros')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="fa fa-book"></i>
                                                <span>Libros</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/tbook') }}">Registro de Libros</a></li>
                                                <li><a href="{{ url('/tbook/create') }}">Registrar Libro</a></li>
                                                <li><a href="{{ url('/authors_books') }}">Registro de Autores</a></li>
                                                <li><a href="{{ url('/authors_books/create') }}">Registrar un Autor</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{--radios--}}
                                    @if($mod->name == 'Radios')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="glyphicon glyphicon-stats"></i>
                                                <span>Radio</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/radios') }}">Registro de Radios</a></li>
                                                <li><a href="{{ url('/radios/create') }}">Registrar Radio</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                    {{--Tvs--}}
                                    @if($mod->name == 'TV')
                                        <li class="sub-menu">
                                            <a href="javascript:;">
                                                <i class="fa fa-desktop"></i>
                                                <span>TV</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a href="{{ url('/tvs') }}">Registro de TV's</a></li>
                                                <li><a href="{{ url('/tvs/create') }}">Registrar TV's</a></li>
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                            {{--Cuenta en proceso de Revision--}}
                            @elseif(Auth::guard('web_seller')->user()->estatus ==='Pre-Aprobado')
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-warning"></i>
                                        <span>
                                            Su solicitud de cuenta como <br>
                                            productora está en proceso de <br>
                                            analisis por parte de <br>
                                            nuestros analistas, pronto nos <br>
                                            comunicaremos con ustedes.
                                        </span>
                                    </a>
                                </li>
                            {{--Cuenta en proceso de Pre-Aprobación--}}
                            @else(Auth::guard('web_seller')->user()->estatus === 'En Proceso')
                                <li class="treeview active">
                                    <a href="#">
                                        <span>
                                        <i class="fa fa-warning"></i>
                                        <br>
                                            Su solicitud de cuenta como <br>
                                            productora está en proceso <br>
                                            por favor finalice el <br>
                                            registro para continuar
                                        </span>
                                    </a>
                                </li>
                        @endif
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-users"></i>
                                <span>Referidos</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Mis Redes</a></li>
                                <li><a href="#">Mis Amigos</a></li>
                                <li><a href="#">Referir</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-heart"></i>
                                <span>Seguidos</span>
                            </a>
                            <ul class="sub">
                                <li><a href="#">Mis Seguidos</a></li>
                                <li><a href="#">Mis Seguidores</a></li>
                                <li><a href="#">Proveedores</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="{{ url('/seller_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span>
                                    <i class="glyphicon glyphicon-off"></i>
                                    Salir
                                </span>
                            </a>
                            <form id="logout-form" action="{{ url('/seller_logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
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
                        @yield('content')
                    </div>
                    <div class="col-lg-3 ds">
                        @include('seller.partials.siderRigth') 
                    </div><!-- /col-lg-3 -->
                </div>
            </section>
        </section> 
    @extends('seller.partials.footer')

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
