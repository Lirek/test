
<!DOCTYPE html>
<html lang="es">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="{{ asset('plugins/materialize_adm/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_adm/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!--https://materialdesignicons.com/-->
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">
    <!--https://plyr.io/#audio-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.4.7/plyr.css">



@yield('css')
    <!--Let browser know website is optimized for mobile-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>{{ config('app.name', 'Leipel') }}</title>

    <!--external css
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset ('assets/lineicons/style.css') }}">-->
    <!-- Custom styles for this template -->
    <!--  <link href="<link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet"> -->
    <!--  <  <link href="{{ asset ('assets/css/style-responsive.css') }}" rel="stylesheet">-->
    <!--  <script src="{{ asset ('assets/js/chart-master/Chart.js')}}"></script>-->

    <!--estilo plyr
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">-->

    <!--DataTables
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">-->

    <!--Modal
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />-->

    <!--Buscador-->
    <link  rel="stylesheet" href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">

    <!--NUMERO
    <link rel="stylesheet" href="{{asset('plugins/telefono/intlTelInput.css')}}">
    <style type="text/css">
        .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

        @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}

        }
    </style>-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    <!-- <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>-->
    <![endif]-->


</head>

<body>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>

            <!--header -->
        <header>

                <!--Menu superior navbar-->
                <div class="navbar-fixed" >
                    <nav class="blue">
                        <div class="nav-wrapper">
                            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons ">menu</i></a>
                            <!-- Logo principal -->
                            <a href="{{ url('/home')}}" class="brand-logo left logo-adjust">
                                <img class="responsive-img img-logo" src="{{asset('sistem_images/Leipel Logo1-01.png')}}">
                            </a>
                            <!-- End logo principal -->
                            <!-- Img Contenido superior -->
                                <ul class="right" >
                                        <li>
                                            <a href="{{ url('ShowMovies') }}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/cine.svg')}}"> </b></a>
                                        </li>

                                <!--    <li>
                                            <a href="{{-- url('')--}}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/musica.svg')}}"> </b></a>
                                        </li> -->

                                        <li>
                                            <a href="{{ url('/ReadingsBooks')}}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/lectura.svg')}}"> </b></a>
                                        </li>

                                        <li>
                                            <a href="{{ url('ShowRadio')}}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/radio.svg')}}"> </b></a>
                                        </li>
                                        <li>
                                            <a href="{{ url('ShowTv')}}" class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/tv.svg')}}"> </b></a>
                                        </li>

                                </ul>
                        <!-- End Img Contenido superior -->
                        </div><!-- End nav-wrapper -->
                    </nav><!-- End navbar-->
                </div><!-- End navbar-fixed -->

                <!--Menu lateral sidenav-->
                <ul id="slide-out" class="sidenav sidenav-fixed">

                   <li><!--Seccion de usuario -->
                        <div class="user-view blue">
                            <div class="container">
                                @if(Auth::user()->img_perf)
                                    <a href="{{url('EditProfile')}}"><img src="{{asset(Auth::user()->img_perf)}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a><!-- logo user -->
                                @else
                                    <a href="{{url('EditProfile')}}"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a><!-- logo user -->
                                @endif
                            </div>

                            <div class="info-container">
                                <div class="name ">
                                    <a class="white-text" href="#">
                                        @if(Auth::user()->alias == null)
                                           {{Auth::user()->name}}
                                        @else
                                            {{Auth::user()->alias}}
                                        @endif
                                    </a>
                                </div>
                                <div class="name" data-toggle="dropdown" >
                                    <a class="modal-trigger white-text valign-wrapper" href="#myModalTotal">
                                        <i class="material-icons ">local_activity</i>&nbsp;Mi balance
                                    </a>
                                    <p id="Tickets" style="color: #ffffff; text-shadow: 0.1em 0.1em #333; padding: 0px;" ></p>
                                </div>
                            </div>
                        </div>
                   </li><!--End seccion de usuario -->

                   <li><a href="{{url('EditProfile')}}" class="waves-effect waves-blue"><i class="small material-icons">person</i>Mi Perfil</a></li>
                   <li><div class="divider"></div></li>

                    <li>
                    <a href="{{ url('/home')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >view_carousel</i>Cartelera</a>
                    </li>

                    <li> <!--Adquirir-->
                        <ul class= "collapsible collapsible-accordion" >
                            <li>
                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >storeui</i>Adquirir Contenido<i class="material-icons right">expand_more</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                    <!-- <li><a href="{{url('MusicContent')}}">Música</a></li> -->
                                        <li><a href="{{url('ReadingsBooks')}}" class="collapsible-header waves-effect waves-blue"><i class="mdi mdi-book-multiple-plus"></i>Libros</a></li>
                                        <li><a href="{{url('ReadingsMegazines')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >import_contacts</i>Revistas</a></li>
                                        <li><a href="{{url('ShowMovies')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >movie</i>Peliculas</a></li>
                                        <li><a href="{{url('ShowSeries')}}" class="collapsible-header waves-effect waves-blue"><i class="mdi mdi-movie-roll"></i>Series</a></li>
                                        <li><div class="divider"></div></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li> <!--End Adquirir-->


                    <li><!--Entretenimiento-->
                        <ul class= "collapsible collapsible-accordion" >
                            <li>
                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >subscriptions</i>Entretenimiento<i class="material-icons right">expand_more</i></a>
                                <div class="collapsible-body">
                                <ul>

                                <li> <!--Cine-->
                                    <ul class= "collapsible collapsible-accordion" >
                                    <li>
                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >movie</i>Cine<i class="material-icons right">expand_more</i></a>
                                         <div class="collapsible-body">
                                            <ul>
                                                <li><a href="{{url('MyMovies')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >theaters</i>Mis Peliculas</a></li>
                                                <li><a href="{{url('MySeries')}}" class="collapsible-header waves-effect waves-blue"><i class="mdi mdi-movie-roll"></i>Mis Series</a></li>
                                                <li><div class="divider"></div></li>
                                            </ul>
                                        </div>
                                     </li>
                                    </ul>
                                </li> <!--End cine-->

                                 <!--  <li><a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >music_note</i>Cine<i class="material-icons right">expand_more</i></a></li> -->
                                 <!--  <li><a href="#" data-target="#myModalContenido" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >music_note</i>Cine<i class="material-icons right">expand_more</i></a></li> -->

                                 <!-- <li>-->  <!--End Musica--><!--
                                    <ul class= "collapsible collapsible-accordion" >
                                    <li>
                                    <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >music_note</i>Música<i class="material-icons right">expand_more</i></a>
                                            <div class="collapsible-body">
                                                <ul>
                                                <li><a href="href="{{url('MyMusic')}}" class="collapsible-header waves-effect waves-blue">Sencillos</a></li>
                                                <li><a href="href="{{url('MyAlbums')}}" class="collapsible-header waves-effect waves-blue">Albums</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#myModalContenido" class="collapsible-header waves-effect waves-blue">Sencillos</a></li>
                                                <li><a href="#" data-toggle="modal" data-target="#myModalContenido" class="collapsible-header waves-effect waves-blue">Albums</a></li>
                                                 </ul>
                                            </div> <!--collapsible-body--><!--
                                        </li>
                                    </ul><!--End collapsible Musica-->
                                <!-- </li>--> <!--End Musica-->

                                <li> <!--Lecturas-->
                                    <ul class= "collapsible collapsible-accordion" >
                                    <li>
                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >chrome_reader_mode</i>Lecturas<i class="material-icons right">expand_more</i></a>
                                         <div class="collapsible-body">
                                            <ul>
                                                <li><a href="{{url('MyReads')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >collections_bookmark</i>Mis libros</a></li>
                                                <li><a href="{{url('MyMegazine')}}" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >local_library</i>Mis Revistas</a></li>
                                                <li><div class="divider"></div></li>
                                            </ul>
                                        </div>
                                     </li>
                                    </ul>
                                </li> <!--End Lecturas-->

                                <li><a  href="{{url('ShowRadio')}}" class="waves-effect waves-blue"><i class="small material-icons">radio</i>Radio</a></li>
                                <li><a  href="{{url('ShowTv')}}" class="waves-effect waves-blue"><i class="small material-icons">live_tv</i>Tv</a></li>
                                <li><div class="divider"></div></li>

                                    <li> <!--Streams-->
                                    <!--<ul class= "collapsible collapsible-accordion" >
                                            <li>
                                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >music_note</i>Lecturas<i class="material-icons right">expand_more</i></a>
                                                <div class="collapsible-body">
                                                    <ul>
                                                        <li><a href="{{--url('ShowTv')--}}" class="collapsible-header waves-effect waves-blue">Tv</a></li>
                                                        <li><a href="{{--url('ShowRadio')--}}" class="collapsible-header waves-effect waves-blue">Radio</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> End Streams-->
                                    </ul>
                                </div><!--End div Entretenimiento-->
                            </li>
                        </ul><!--End ul Entretenimiento-->
                    </li> <!--End Entretenimiento-->


                    <li><!-- Invitar-->
                        <ul class= "collapsible collapsible-accordion" >
                            <li><!-- li interno-->
                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class=" material-icons left" >group_add</i>Invitar amigos<i class="material-icons right">expand_more</i></a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a  href="{{url('WebsUser')}}" class="waves-effect waves-blue"><i class="small material-icons">people</i>Mis referidos</a></li>
                                        <li><a  href="{{url('Referals')}}" class="waves-effect waves-blue"><i class="small material-icons">person_add</i>Invitar</a></li>
                                        <li><div class="divider"></div></li>
                                    </ul>
                                </div><!--End div Invitar-->
                            </li><!--End li interno-->
                        </ul><!--End ul Invitar-->
                    </li> <!--End Invitar-->

                    <li><a href="{{url('SaleTickets')}}" class="waves-effect waves-blue"><i class="small material-icons">monetization_on</i>Recargar</a></li>

                                        <!--<li>
                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span>
                                                        <i class="glyphicon glyphicon-off"></i>
                                                        Salir
                                                    </span>
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </li> -->
                        <li>
                            <a href="{{ url('/logout') }}" class="waves-effect waves-blue " onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="small material-icons">power_settings_new</i>Salir</a></a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                 </ul><!--End sidenav-->

        </header>
            <!--header end-->

        <main>
            <section id="main-content" class="section section-daily-stats center">

                @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                <div class="row">
                    @yield('main')
                </div>
            </section>
        </main> <!-- End main -->

        <footer class="page-footer blue ">
            <div class="footer-copyright">
                <div class="container center">
                    Leipel &copy 2018. Todos los Derechos Reservados.
                </div>
            </div>
        </footer>

        <!--MODALs
            <div id="myModalContenido" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                Modal content-->
                     <!--   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title" align="center">PRÓXIMAMENTE!</h4>
                    </div>
                    <div style="background-image: url('{{asset('sistem_images/dsBuffer.png')}}');
                  background-size: 100% 100%;;" class="img-rounded img-responsive av text-center">
                      <!-- <img src="{{asset('assets/img/Logo-Leipel.png')}}" style="width: 45%;  margin-left: 10%; margin-top: 20%"> -->
                         <!--   <div>
                      <img src="{{asset('assets/img/wrench.png')}}" style=" z-index:1; width:10%;  margin-top: 40%">
                      </div>
                      <div align="center" style="margin-left: 20%; margin-right: 20%; margin-top: 2% ">
                        <p><h3>Estamos trabajando para su entretenimiento</h3></p>
                        <h4> visitenos pronto!!</h4>
                      </div>
                    </div>
                  </div>
              </div>
        <!--FIN DEL MODAL-->



        <!--MODAL Total-->
        <div id="myModalTotal" class="modal modal-s" >
            <div class="modal-content">
                <div class=" blue"><br>
                    <h4 class="center white-text" ><i class="small material-icons">timeline</i> Mi Balance</h4>
                    <br>
                </div>
                <br>
                <blockquote class="center">
                    @if(Auth::user()->credito != null)
                        <h5 class="grey-text"><b>Total de tickets:</b> {{Auth::user()->credito}}</h5>
                    @else
                        <h5 class="grey-text"><b>Total de tickets:</b> 0</h5>
                    @endif
                    @if(Auth::user()->points)
                        <h5 class="grey-text"><b>Total de puntos:</b> {{Auth::user()->points}}</h5>
                    @else
                       <h5 class="grey-text"><b>Total de puntos:</b> 0</h5>
                    @endif
                    @if(Auth::user()->pending_points)
                       <h5 class="grey-text"><b>Total de puntos pendientes:</b> {{Auth::user()->pending_points}}</h5>
                    @else
                       <h5 class="grey-text"><b>Total de puntos pendientes:</b> 0 </h5>
                    @endif
                    <h5><a href="{{url('MyBalance')}}" ><i class="small material-icons ">add_circle_outline</i> <br>Detalles</a></h5>

                </blockquote>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
            </div>
        </div>
        <!--FIN DEL MODAL-->

</body>
<!-- js placed at the end of the document so the pages load faster -->

<!-- <script src="{{--asset('assets/js/jquery-1.8.3.min.js')--}}"></script>-->

<!--common script for all pages-->
<!--<script src="{{--asset('assets/js/common-scripts.js')---}}"></script>-->

<!--<script type="text/javascript" src="{{--asset('assets/js/gritter/js/jquery.gritter.js')--}}"></script>-->
<!--<script type="text/javascript" src="{{--asset('assets/js/gritter-conf.js')--}}"></script>-->

<!--script for this page-->
<!--<script src="{{--asset('assets/js/sparkline-chart.js')--}}"></script>-->
<!--<script src="{{--asset('assets/js/zabuto_calendar.js')--}}"></script>-->

<!--Script Plyr-->
<!--<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>-->
<script src="https://cdn.plyr.io/3.4.7/plyr.js"></script>

<!--Datatables-->
<!--
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
-->

<!--telefono-->
<!--<script src="{{-- asset('plugins/telefono/intlTelInput.js') --}}"></script>-->
<!--<script src="{{-- asset('plugins/telefono/utils.js') --}}"></script>-->
<!--SCRIPS JS-->


<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
<script src="{{asset('assets/js/jquery.js') }}"></script>

<!--Import jQuery before materialize.js-->
<script src="{{asset('plugins/materialize_adm/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_adm/js/init.js') }}"></script>

<!--Import Chart js https://www.chartjs.org/docs/latest/charts/doughnut.html-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script class="include" type="text/javascript" src="{{asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/jquery.sparkline.js')}}"></script>


<!--common script for all pages-->
<script src="{{asset('assets/js/common-scripts.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/gritter-conf.js')}}"></script>

<!--PDF.JS-->
<!--<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>-->


<!--Libreria sweetalert-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> en conflicto con materilize tab-->

@yield('js')

<!--<script type="application/javascript">
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
</script>-->

<script>
    $(document).ready(function(){
        var id={!!Auth::user()->id!!};
        $.ajax({

            url:"{{ URL('MyTickets') }}"+'/'+id,
            type    : 'GET',
            dataType: "json",
            success: function (respuesta){
                console.log(respuesta);
                $('#Tickets').html(respuesta);

            },
        });
    });
</script>
<!--<script type="text/javascript">
    $(document).ready(function() {
        if ((screen.width <= 768)) {
            //alert('Resolucion: 1024x768 o mayor');
            $('#container').addClass('sidebar-closed');
            $('#nav-accordion').css('display','none');
        }else{
            $('#container').removeClass('sidebar-closed');
            $('#nav-accordion').css('display','block');
        }

    });
</script>-->
<!--<script type="text/javascript">
    $(window).resize(function() {
        console.log($(window).width());
        if ($(window).width() <= 768)
        {
            $('#container').addClass('sidebar-closed');
            $('#nav-accordion').css('display','none');
        }
        else
        {
            $('#container').removeClass('sidebar-closed');
            $('#nav-accordion').css('display','block');
        }
    });
</script>-->



</html>

