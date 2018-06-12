{{--<aside class="main-sidebar">--}}
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="http://lorempixel.com/400/400/sports" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::guard('web_seller')->user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i>En Linea</a>
        </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-center">Modulos</li>

        {{--escritorio--}}
        <li class="active menu-open">
            <a href="{{ url('seller_home') }}">
                <i class="glyphicon glyphicon-home"></i>
                <span>Escritorio</span>
            </a>
        </li>

        @if(Auth::guard('web_seller')->user()->estatus ==='Aprobado')

            {{--Accesos a los modulos --}}


            @if($modulos==FALSE)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-warning"></i>
                        <span>
                            Aun No Posee Modulos 
                                <br>
                            Asignados
                            
                        </span>
                    </a>
                </li>
            @else

                @foreach($modulos as $mod)

                    {{--musica--}}
                    @if($mod->name === 'Musica')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-music"></i>
                                <span>Musica</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/albums') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Album
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/artist_form') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Grupo
                                        Musical o Solista
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/single_registration') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Singles
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Mi Musica
                                        {{--</p>--}}
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif


                    {{--peliculas--}}
                    @if($mod->name =='Peliculas')

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-film"></i>
                                <span>Peliculas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/movies') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registro peliculas
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/movies/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Pelicula
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/single_registration') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Mis Peliculas
                                        {{--</p>--}}
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif

                    {{--revistas--}}
                    @if($mod->name == 'Revistas')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-archive"></i>
                                <span>Revistas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/megazine_i') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Revista independiente
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/megazine_form') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Agregar Revistas a
                                        Cadenas de Publicacion
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/type') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p>--}}
                                        Registrar cadena de
                                        publicaciones
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/my_megazine',Auth::guard('web_seller')->user()->id) }}">
                                        <i class="fa fa-circle-o"></i>
                                        Mis Revistas
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif

                    {{--series--}}
                    @if($mod->name == 'Series')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-video-camera"></i>
                                <span>Series</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/series') }}">
                                        <i class="fa fa-circle-o"></i>
                                        {{--<p class="text-justify">--}}
                                        Registro de series
                                        {{--</p>--}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/series/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        {{--<p class="text-justify">--}}
                                        Registrar Serie
                                        {{--</p>--}}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    {{--libros--}}
                    @if($mod->name == 'Libros')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Libros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('tbook') }}">
                                        <i class="fa fa-circle-o"></i>
                                        Registro de libros
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('tbook/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar libro
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('authors_books') }}">
                                        <i class="fa fa-circle-o"></i>
                                        Registro de autores
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('authors_books/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar un autor
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif

                    {{--radios--}}
                    @if($mod->name == 'Radios')
                        <li class="treeview">
                            <a href="#">
                                <i class="material-icons " style="font-size: 18px">radio</i>
                                <span>Radio</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/radios') }}">
                                        <i class="fa fa-circle-o"></i>
                                        Index
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('radios/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar radio
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    {{--Tvs--}}
                    @if($mod->name == 'TV')
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tv"></i>
                                <span>TV</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="{{ url('/tvs') }}">
                                        <i class="fa fa-circle-o"></i>
                                        Index
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('tvs/create') }}">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar canal
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endforeach


            @endif















            {{--cuente en proceso de revision--}}
        @elseif(Auth::guard('web_seller')->user()->estatus ==='Pre-Aprobado')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-warning"></i>
                    <span>
                            Su solicitud de cuenta como <br/>
                            productora se en proceso de <br/>
                            analisis por Parte de <br/>
                            nuestros analistas pronto nos<br/>
                            comunicaremos con utedesds
                        </span>
                </a>
            </li>

            {{--en proceso de pre-aprobado--}}
        @else(Auth::guard('web_seller')->user()->estatus === 'En Proceso')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-warning"></i>
                    <span>
                            Su solicitud de cuenta como<br/>
                            productora esta en proceso <br/>
                            por favor finalice el <br/>
                            registro para continuar
                        </span>
                </a>
            </li>
        @endif

    </ul>
</section>
<!-- /.sidebar -->
{{--</aside>--}}
