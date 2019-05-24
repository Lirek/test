<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Leipel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('plugins/tree-fy/bootstrap-treefy.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/telefono/intlTelInput.css')}}">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-light_blue.min.css" />
<style type="text/css"> 
                .iti-flag {background-image: url("{{asset('plugins/telefono/flags.png')}}");}

            @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
            .iti-flag {background-image: url("{{asset('plugins/telefono/flags2x.png')}}");}
        
        }
</style> 
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title"><img src="{{ asset('sistem_images/Logo-Leipel.png') }}"
                                       class="img-responsive" style="width:30%;"></span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="{{url('/admin_sellers')}}">Proveedores</a>
        <a class="mdl-navigation__link" href="{{url('/admin_applys')}}">Solicitudes de Cuenta</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title"><span class="logo-mini"><img src="{{ asset('sistem_images/Leipel.png') }}"
                                         class="img-responsive" style="width:70%; margin-right: :20px;"></span></span>
    <nav class="mdl-navigation">
        
        <button id="music" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">music_note</i>
        </button>
        <ul class="mdl-menu mdl-js-menu" for="music">
            <a href="{{url('/admin_albums')}}"><li class="mdl-menu__item">Albums por Revisar</li></a>
            <a href="{{url('/admin_single')}}"><li class="mdl-menu__item">Single por Revisar</li></a>
            <a href="{{url('/admin_musician')}}"><li class="mdl-menu__item">Musicos por Revisar</li></a>
            <a href="{{url('/AllAdminMusician')}}"><li class="mdl-menu__item">Musicos</li></a>
            <a href="{{url('/AllAdminAlbum')}}"><li class="mdl-menu__item">Albums</li></a>
            <a href="{{url('/AllAdminSingles')}}"><li class="mdl-menu__item">Singles</li></a>
        </ul>
        
        <button id="radio" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">radio</i>
        </button>
        <ul class="mdl-menu mdl-js-menu" for="radio">
            <a href="{{url('/admin_radio')}}"><li class="mdl-menu__item">Radios por Revisar</li></a>
            <a href="{{url('/AllAdminRadio')}}"><li class="mdl-menu__item">Radios</li></a>
        </ul>

        <button id="tv" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">tv</i>
        </button>
        <ul class="mdl-menu mdl-js-menu" for="tv">
            <a href="{{url('/admin_tv')}}"><li class="mdl-menu__item">TVs por Revisar</li></a>
            <a href="{{url('/AllAdminTv')}}"><li class="mdl-menu__item">TVs</li></a>
        </ul>
        
        <button id="megazine" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">library_books</i>
        </button>
        <ul class="mdl-menu mdl-js-menu" for="megazine">
            <a href="{{url('/admin_chain')}}"><li class="mdl-menu__item">Cadenas de Publicacion Revisar</li></a>
            <a href="{{url('/admin_megazine')}}"><li class="mdl-menu__item">Revistas por Revisar </li></a>
            <a href="{{url('/AllAdminMegazinesChain')}}"><li class="mdl-menu__item">Cadenas de Publicaciones</li></a>
            <a href="{{url('/AllAdminMegazines')}}"><li class="mdl-menu__item">Revistas</li></a>
        </ul>


    </nav>

  </div>
<form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>




           @yield('content')
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
    {{--<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.js') }}"></script>--}}
    <script src="{{ asset('plugins/telefono/intlTelInput.js') }}"></script>
    <script src="{{ asset('plugins/telefono/utils.js') }}"></script>
    <script src="{{ asset('plugins/tree-fy/bootstrap-treefy.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('js')

    <footer class="mdl-mini-footer">
        <div class="mdl-mini-footer__rigth-section">
            <button id="menu-speed" class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">account_circle</i>
            </button>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="menu-speed">
                 <li class="mdl-menu__item"><a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Cerrar Sesion</a></li>
                 <li class="mdl-menu__item" disabled>Mi Perfil</li>
                </ul>

        </div>
    </footer>
</body>

</html>
