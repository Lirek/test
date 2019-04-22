<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <title>{{ config('app.name', 'Leipel') }}</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link href="{{ asset('plugins/materialize_adm/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset('plugins/materialize_adm/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!--https://materialdesignicons.com/-->
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">
        <style>
            .default_color{background-color: #FFFFFF !important;}
            .img{margin-top: 7px;}
            .curva{border-radius: 10px;}
            .curvaBoton{border-radius: 20px;}
            /*Color letras tabs*/
            .tabs .tab a{
                color:#00ACC1;
            }
            /*Indicador del tabs*/
            .tabs .indicator {
                display: none;
            }
            .tabs .tab a.active {
                border-bottom: 2px solid #29B6F6;
            }
            /* label focus color */
            .input-field input:focus + label {
                color: #29B6F6 !important;
            }
            /* label underline focus color */
            .row .input-field input:focus {
                border-bottom: 1px solid #29B6F6 !important;
                box-shadow: 0 1px 0 0 #29B6F6 !important
            }
            .sidenav .user-view  {
                background-image: url({{asset("/plugins/materialize_adm/img/user-yellow-background.jpg")}});
            }
        </style>
        @yield('css')
    </head>
    <body>
        <header>
            <!--Menu superior navbar-->
            <div class="navbar-fixed" >
                <nav class="amber">
                    <div class="nav-wrapper">
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons ">menu</i></a>
                        <!-- Logo principal -->
                        <a href="{{ url('/bidder_home')}}" class="brand-logo left logo-adjust">
                            <img class="responsive-img img-logo" src="{{asset('sistem_images/Leipel Logo1-01.png')}}">
                        </a>
                        <!-- End logo principal -->
                    </div><!-- End nav-wrapper -->
                </nav><!-- End navbar-->
            </div><!-- End navbar-fixed -->

            <!--Menu lateral sidenav-->
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li><!--Seccion de usuario -->
                    <div class="user-view">
                        <div class="container">
                            <a href="#">
                                @if(Auth::guard('bidder')->user()->logo!=null)
                                    <img src="{{asset(Auth::guard('bidder')->user()->logo)}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil">
                                @else
                                    <img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil">
                                @endif
                            </a><!-- logo user default -->
                        </div>
                        <div class="info-container">
                            <div class="name">
                                <a class="white-text" href="#">{{Auth::guard('bidder')->user()->name}}</a>
                            </div>
                            <div class="name">
                                <a class="modal-trigger white-text valign-wrapper" href="#myModalTotal">
                                    <i class="material-icons ">bubble_chart</i> Puntos ganados: {{Auth::guard('bidder')->user()->points}}
                                </a>
                            </div>
                        </div>
                    </div>
                </li><!--End seccion de usuario -->
                <li>
                    <a href="{{url('bidderPerfil')}}" class="waves-effect waves-yellow">
                        <i class="small material-icons">person</i>Mi Perfil
                    </a>
                </li>
                <li><div class="divider"></div></li>
                <li>
                    <a href="{{url('retiro')}}" class="waves-effect waves-yellow">
                        <i class="small material-icons">attach_money</i>
                        Retiro de fondo
                    </a>
                </li>
                <li>
                    <a href="{{ url('allProducts') }}" class="waves-effect waves-yellow">
                        <i class="small material-icons">shopping_basket</i>Mis productos
                    </a>
                </li>
                <li>
                    <a href="{{ url('bidderLogout') }}" class="waves-effect waves-yellow">
                        <i class="small material-icons">power_settings_new</i>Salir
                    </a>
                </li>
            </ul><!-- End Menu lateral sidenav-->
            <a href="#" data-activates="slide-out" class="button-collapse">
                <i class="mdi-navigation-menu"></i>
            </a><!-- boton Hamburguesa menu -->
        </header>
        <main>
            <section id="main-content" class="section section-daily-stats center">
                <div class="row">
                    @yield('content')
                </div>
            </section>
        </main> <!-- End main -->
        <footer class="page-footer amber">
            <div class="footer-copyright">
                <div class="container center">
                    Leipel &copy 2019. Todos los Derechos Reservados.
                </div>
            </div>
        </footer>

        <div id="myModalTotal" class="modal modal-s">
            <div class="modal-content">
                <div class="amber">
                    <br>
                    <h4 class="center white-text"><i class="small material-icons">timeline</i> Mi Balance</h4>
                    <br>
                </div>
                <br>
                <blockquote class="center">
                    <h5 class="grey-text"><b>Total de puntos ganados:</b> {{Auth::guard('bidder')->user()->points}}</h5>
                    <h5 class="grey-text"><b>Total de puntos pendientes:</b> {{Auth::guard('bidder')->user()->pendding_points}}</h5>
                    <h5>
                        <a href="{{url('')}}">
                            <i class="small material-icons">add_circle_outline</i>
                            <br>
                            Detalles
                        </a>
                    </h5>
                </blockquote>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-amber btn-flat">Salir</a>
            </div>
        </div>

        <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
        <script src="{{asset('assets/js/jquery.js') }}"></script>
        <!--Import jQuery before materialize.js-->
        <script src="{{asset('plugins/materialize_adm/js/materialize.js') }}"></script>
        <script src="{{asset('plugins/materialize_adm/js/init.js') }}"></script>

        <script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
        <script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
        {{--
        <script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
        --}}
        <script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>

        <!--common script for all pages-->
        {{--
        <script src="{{asset('assets/js/common-scripts.js')}}"></script>
        --}}

        <script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

        <!--script for this page-->
        <script src="{{asset('assets/js/sparkline-chart.js')}}"></script>

        <!--Carousel Owl Galeria-->
        <script src="{{ asset('plugins/owlcarousel/dist/owl.carousel.min.js')}}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                if ((screen.width <= 768)) {
                    //alert('Resolucion: 1024x768 o mayor');
                    $('#container').addClass('sidebar-closed');
                    $('#nav-accordion').css('display','none');
                } else {
                    $('#container').removeClass('sidebar-closed');
                    $('#nav-accordion').css('display','block');
                }
            });

            $(window).resize(function() {
                console.log($(window).width());
                if ($(window).width() <= 768) {
                    $('#container').addClass('sidebar-closed');
                    $('#nav-accordion').css('display','none');
                } else {
                    $('#container').removeClass('sidebar-closed');
                    $('#nav-accordion').css('display','block');
                }
            });
        </script>
        <!--Import Chart js https://www.chartjs.org/docs/latest/charts/doughnut.html-->
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>--}}
        @yield('js')
    </body>
</html>