<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link href="{{ asset('plugins/materialize_adm/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="{{ asset('plugins/materialize_adm/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!--https://materialdesignicons.com/-->
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.2.89/css/materialdesignicons.min.css">

        <style type="text/css">
             div.error {
      color: red;
      padding: 0;
      font-size: 0.9em;
    }

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
        </style>
        @yield('css')
        <!--Let browser know website is optimized for mobile-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <title>{{ config('app.name', 'Leipel') }}</title>

        <!--external css-->
        <!--<link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />-->
        <!--<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/zabuto_calendar.css') }}">-->
        <!--<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/gritter/css/jquery.gritter.css')}}" />-->

        <!-- Custom styles for this template -->
        <!--<link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">-->
        <!-- <link href="{{ asset ('assets/css/style-responsive.css') }}" rel="stylesheet">-->

        <!--<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->

        <!--NUMERO-->
         <!--<link rel="stylesheet" href="{{asset('plugins/telefono/intlTelInput.css')}}">-->

            <!--<style type="text/css">
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
                .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}

            }
        </style>-->

        @yield('css')

        <!--<script src="{{ asset ('assets/js/chart-master/Chart.js')}}"></script>-->
    </head>

    <body>

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
                            @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')
                                <ul class="right" >
                                    @if($modulos!=false)
                                        @foreach($modulos as $mod)
                                            @if($mod->name == 'Peliculas')
                                                <li>
                                                    <a href="{{ url('/movies') }}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/cine.svg')}}"> </b></a>
                                                </li>
                                            @endif
                                            @if($mod->name == 'Musica')
                                                <li>
                                                    <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/musica.svg')}}"> </b></a>
                                                </li>
                                            @endif
                                            @if($mod->name == 'Libros')
                                                <li>
                                                    <a href="{{ url('/tbook')  }}"  class="contentype-adjust"><b><img class="responsive-img   img-contentype" src="{{asset('sistem_images/type_contents/lectura.svg')}}"> </b></a>
                                                </li>
                                            @endif
                                            @if($mod->name == 'Radios')
                                                <li>
                                                    <img class="responsive-img   img-contenidos" src="{{asset('sistem_images/logo-icon-5.png')  }}">
                                                </li>
                                            @endif
                                            @if($mod->name == 'TV')
                                                <li>
                                                    <img class="responsive-img   img-contenidos" src="{{asset('sistem_images/logo-icon-3.png') }}">
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            @endif
                            <!-- End Img Contenido superior -->

                        </div><!-- End nav-wrapper -->
                    </nav><!-- End navbar-->
            </div><!-- End navbar-fixed -->

            <!--Menu lateral sidenav-->
            <ul id="slide-out" class="sidenav sidenav-fixed">

                <li><!--Seccion de usuario -->
                  <div class="user-view">
                    <div class="container">
                                @if(Auth::guard('web_seller')->user()->logo != 'NULL')
                                    <a href="#"><img src="{{asset(Auth::guard('web_seller')->user()->logo)}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil" height="500" width="500"></a><!-- logo user -->
                                @else
                                    <a href="#"><img src="{{asset('sistem_images/DefaultUser.png')}}" alt="Avatar" class=" z-depth-3 responsive-img circle logo-container img-perfil"></a><!-- logo user -->
                                @endif
                    </div>

                    <div class="info-container">
                        <div class="name ">
                            <a class="white-text" href="#">
                              {{Auth::guard('web_seller')->user()->name}}
                            </a>
                        </div>
                        <div class="name" data-toggle="dropdown" >
                            <a class="modal-trigger white-text valign-wrapper" href="#myModalTotal">
                             <i class="material-icons ">local_activity</i>&nbsp;Tickets Disponibles: {{Auth::guard('web_seller')->user()->credito}}
                            </a>
                        </div>
                    </div>

            </div>
                </li><!--End eccion de usuario -->

                <li><a href="{{url('seller_edit')}}" class="waves-effect waves-blue"><i class="small material-icons">person</i>Mi Perfil</a></li>
                    <li><div class="divider"></div></li>
                <li><a href="{{url('SellerRequest')}}" class="waves-effect waves-blue "><i class="small material-icons">attach_money</i>Retiro de fondo</a></li>

<!-- ////////////////////////////////////////////////////////////          Contenidos          ////////////////////////////////////////-->


            @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')

                                        {{--Accesos a los modulos --}}


                    @if($modulos==false)
                        <li>
                            <ul class= "collapsible collapsible-accordion" >

                                <li>
                                    <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >apps</i>Mi contenido<i class="material-icons right" >expand_more</i></a>

                                    <div class="collapsible-body">
                                            <blockquote>Aún no posee módulos asignados.</blockquote>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    @else

                        <li><!-- LI CONTENIDOS GENERAL -->
                            <ul class= "collapsible collapsible-accordion" >
                                <li> <!-- LI CONTENIDOS interno-->
                                    <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >apps</i>Mi contenido<i class="material-icons right" >expand_more</i></a>
                                    <div class="collapsible-body">
                                        <ul>
                                                    @foreach($modulos as $mod)
                                                        {{--musica--}}
                                                        @if($mod->name == 'Musica')
                                                            <li><!-- musica -->
                                                            <ul class= "collapsible collapsible-accordion" >
                                                            <li>

                                                            <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >music_note</i>Musica<i class="material-icons right">expand_more</i></a>

                                                                <div class="collapsible-body">
                                                                <ul>
                                                                    <li><a href="{{ url('/albums') }}">Registrar álbum</a></li>
                                                                    <li><a href="{{ url('/single_registration') }}">Registrar canciones</a></li>
                                                                    @foreach($modulos as $mod)
                                                                        @if($mod->name == 'Productora')
                                                                            <li>
                                                                                <a href="{{ url('/showArtist') }}">
                                                                                        Listar artistas
                                                                                </a>
                                                                            </li>
                                                                        @elseif($mod->name == 'Artista')
                                                                            @if(count(App\music_authors::where('seller_id',Auth::guard('web_seller')->user()->id)->get())==0)
                                                                                <!-- Validar que las frases quepan en el espacio mostrado -->
                                                                                <li>
                                                                                    <a href="{{ url('/artist_form') }}">
                                                                                            Registrar grupo o solista
                                                                                    </a>
                                                                                </li>
                                                                                <!-- Validar que las frases quepan en el espacio mostrado -->
                                                                            @else
                                                                                <li>
                                                                                    <a href="{{ url('/modify_artist') }}">
                                                                                        Artista
                                                                                    </a>
                                                                                </li>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    <li><a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}">Mi música</a></li>
                                                                    <li><div class="divider"></div></li>
                                                                </ul>
                                                                </div>
                                                                </li>
                                                            </ul>
                                                            </li><!--End musica -->
                                                        @endif
                                                        {{--peliculas--}}
                                                        @if($mod->name =='Peliculas')
                                                            <li><!--Peliculas -->
                                                                 <ul class= "collapsible collapsible-accordion" >
                                                                    <li>

                                                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >movie</i>Películas<i class="material-icons right">expand_more</i></a>

                                                                        <div class="collapsible-body">
                                                                            <ul>
                                                                                <li><a href="{{ url('/movies/create') }}">Registrar película</a></li>
                                                                                <li><a href="{{ url('/movies') }}">Películas registradas</a></li>
                                                                                <li><div class="divider"></div></li>
                                                                            </ul>
                                                                        </div>
                                                                 </li>
                                                                </ul>
                                                            </li><!-- End Peliculas -->
                                                        @endif
                                                        {{--revistas--}}
                                                        @if($mod->name == 'Revistas')
                                                            <li> <!-- REvistas -->
                                                                <ul class= "collapsible collapsible-accordion" >
                                                                <li>

                                                                 <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >import_contacts</i>Revistas<i class="material-icons right">expand_more</i></a>

                                                                 <div class="collapsible-body">
                                                                        <ul>
                                                                            <li><a href="{{ url('/megazine_form') }}">Registrar revista</a></li>
                                                                            <li><a href="{{ url('/type') }}">Cadena de publicaciones</a></li>
                                                                            <li><a href="{{ url('/my_megazine',Auth::guard('web_seller')->user()->id) }}">Mis revistas</a></li>
                                                                            <li><div class="divider"></div></li>
                                                                        </ul>
                                                                </div>
                                                                </li>
                                                                </ul>
                                                            </li><!-- End Revistas -->
                                                        @endif
                                                        {{--series--}}
                                                        @if($mod->name == 'Series')
                                                            <li><!-- Series-->
                                                                <ul class= "collapsible collapsible-accordion" >
                                                                <li>

                                                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >local_movies</i>Series<i class="material-icons right">expand_more</i></a>

                                                                <div class="collapsible-body">
                                                                 <ul>
                                                                    <li><a href="{{ url('/series/create') }}">Registrar serie</a></li>
                                                                    <li><a href="{{ url('/series') }}">Series registradas</a></li>
                                                                    <li><div class="divider"></div></li>

                                                                </ul>
                                                                </div>
                                                                </li>
                                                                </ul>
                                                            </li><!-- End Series -->
                                                        @endif
                                                        {{--libros--}}
                                                        @if($mod->name == 'Libros')
                                                            <li><!-- Libros-->
                                                                <ul class= "collapsible collapsible-accordion" >
                                                                <li>

                                                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >book</i>Libros<i class="material-icons right">expand_more</i></a>

                                                                <div class="collapsible-body">
                                                                <ul>
                                                                    <li><a href="{{ url('/tbook/create') }}">Registrar libro</a></li>
                                                                    <li><a href="{{ url('/tbook') }}">Libros registrados</a></li>
                                                                    @foreach($modulos as $mod)
                                                                        @if($mod->name == 'Editorial')
                                                                            <li>
                                                                                <a href="{{ url('/authors_books') }}">Listar autores</a>
                                                                            </li>
                                                                        @elseif($mod->name == 'Escritor')
                                                                            @if(count(App\BookAuthor::where('seller_id',Auth::guard('web_seller')->user()->id)->get())==0)
                                                                                <li>
                                                                                    <a href="{{ url('/authors_books/create') }}">Registrar autor</a>
                                                                                </li>
                                                                            @else
                                                                                <li>
                                                                                    @php
                                                                                        $id = App\BookAuthor::where('seller_id',\Auth::guard('web_seller')->user()->id)->get()
                                                                                    @endphp
                                                                                    <a href="{{ route('authors_books.edit',$id[0]) }}">Modificar autor</a>
                                                                                </li>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    <li><div class="divider"></div></li>
                                                                </ul>
                                                                </div>
                                                                </li>
                                                                </ul>
                                                            </li><!-- End Libros -->
                                                        @endif

                                                        {{--radios--}}
                                                        @if($mod->name == 'Radios')
                                                            <li><!-- Radios -->
                                                                <ul class= "collapsible collapsible-accordion" >
                                                                <li>

                                                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >radio</i>Radio<i class="material-icons right">expand_more</i></a>

                                                                        <div class="collapsible-body">
                                                                            <ul class="sub">
                                                                                <li><a href="{{ url('/radios') }}">Registro de radios</a></li>
                                                                                <li><a href="{{ url('/radios/create') }}">Registrar radio</a></li>
                                                                                <li><div class="divider"></div></li>

                                                                            </ul>
                                                                        </div>
                                                                  </li>
                                                                  </ul>
                                                            </li><!-- End Radios -->
                                                        @endif
                                                        {{--Tvs--}}

                                                        @if($mod->name == 'TV')
                                                            <li ><!--Tv  -->
                                                                <ul class= "collapsible collapsible-accordion" >
                                                                <li>

                                                                <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >live_tv</i>TV<i class="material-icons right">expand_more</i></a>

                                                                 <div class="collapsible-body">
                                                                <ul>
                                                                    <li><a href="{{ url('/tvs') }}">Registro de TV's</a></li>
                                                                    <li><a href="{{ url('/tvs/create') }}">Registrar TV's</a></li>
                                                                    <li><div class="divider"></div></li>
                                                                </ul>
                                                                  </div>
                                                                  </li>
                                                                  </ul>
                                                            </li><!--End Tv  -->
                                                        @endif
                                                    @endforeach
                                        </ul><!--END ul todos los contenidos -->
                                    </div><!-- Body ul contenidos -->
                                </li><!--li interno contenidos -->
                            </ul><!--End  externo collapsible -->
                        </li> <!--End li contenido GENERAL-->
                    @endif



<!-- //////////////////////////////////////////////////////////// END  contenidos ////////////////////////////////////////-->

                                {{--Cuenta en proceso de Pre-Aprobación--}}
            @elseif(Auth::guard('web_seller')->user()->estatus ==='Pre-Aprobado')

                            <li>
                                <ul class= "collapsible collapsible-accordion" >

                                    <li>
                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >apps</i>Cuenta en revisión<i class="material-icons right" >expand_more</i></a>
                                        <div class="collapsible-body">
                                            <blockquote> Su solicitud de cuenta como
                                                productora está en proceso de
                                                analisis por parte de
                                                nuestros analistas, pronto nos
                                                comunicaremos con ustedes..</blockquote>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                                {{--Cuenta en proceso de revision--}}
            @elseif(Auth::guard('web_seller')->user()->estatus === 'En Proceso')

                            <li>
                                <ul class= "collapsible collapsible-accordion" >

                                    <li>
                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >apps</i>En Proceso<i class="material-icons right" >expand_more</i></a>
                                        <div class="collapsible-body">
                                            <blockquote>  Su solicitud de cuenta como
                                                productora está en proceso
                                                por favor finalice el
                                                registro para continuar.</blockquote>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                                {{--Cuenta con estatus de Rechazado--}}
            @else(Auth::guard('web_seller')->user()->estatus === 'Rechazado')

                            <li>
                                <ul class= "collapsible collapsible-accordion" >

                                    <li>
                                        <a href="javascript:;" class="collapsible-header waves-effect waves-blue"><i class="small material-icons left" >apps</i>Cuenta Rechazada<i class="material-icons right" >expand_more</i></a>
                                        <div class="collapsible-body">
                                            <blockquote>   Su solicitud de cuenta como
                                                productora fue rechazada
                                                por favor pongase en contacto
                                                con el administrados de sistema.</blockquote>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            @endif
                         <!--    <li>
                                <a href="{{ url('/seller_logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span>
                                                <i class="glyphicon glyphicon-off"></i>
                                                Salir
                                            </span>
                                </a>
                                <form id="logout-form" action="{{ url('/seller_logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li> -->
                            <li>
                                <a href="{{ url('/seller_logout') }}" class="waves-effect waves-blue " onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="small material-icons">power_settings_new</i>Salir</a></a>
                                <form id="logout-form" action="{{ url('/seller_logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

            </ul><!-- End  sidenav-->
            <!-- End Menu lateral sidenav-->

                    </li>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a><!-- boton Hamburguesa menu -->

            </header>


            <main>
                <section id="main-content" class="section section-daily-stats center">

                    <div class="row">
                       @yield('content')
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



            <div id="myModalTotal" class="modal modal-s" >
                <div class="modal-content">
                <div class=" blue"><br>
                   <h4 class="center white-text" ><i class="small material-icons">timeline</i> Mi Balance</h4>
                    <br>
                </div>
                    <br>
                    <blockquote class="center">
                    <h5 class="grey-text"><b>Total de tickets disponibles:</b> {{Auth::guard('web_seller')->user()->credito}}</h5>
                    <h5 class="grey-text"><b>Total de tickets Pendientes:</b> {{Auth::guard('web_seller')->user()->credito_pendiente}}</h5>
                    <h5><a href="{{url('SellerBalance')}}" ><i class="small material-icons ">add_circle_outline</i> <br>Detalles</a></h5>

                    </blockquote>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
                </div>
            </div>





            <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
            <script src="{{asset('assets/js/jquery.js') }}"></script>
            <!--Import jQuery before materialize.js-->
            <script src="{{asset('plugins/materialize_adm/js/materialize.js') }}"></script>
            <script src="{{asset('plugins/materialize_adm/js/init.js') }}"></script>



            {{--<script src="{{asset('assets/js/jquery.js') }}"></script>--}}
            {{--<script src="{{asset('assets/js/jquery-1.8.3.min.js') }}"></script>--}}
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
            {{--<script src="{{asset('assets/js/zabuto_calendar.js')}}"></script> --}}
            <!--telefono-->
            <script src="{{ asset('plugins/telefono/intlTelInput.js') }}"></script>
            <script src="{{ asset('plugins/telefono/utils.js') }}"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


            <script type="text/javascript">
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
            </script>
            <script type="text/javascript">
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
            </script>
            <!--Import Chart js https://www.chartjs.org/docs/latest/charts/doughnut.html-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            @yield('js')



       </body><!-- End body -->
</html>
