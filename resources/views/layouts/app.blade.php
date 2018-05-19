<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--del tema visitor--}}
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    {{--del tema visitor--}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LEIPEL') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset("css/app.css") }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">

    <!-- Styles del AdminLTE-->

    <!--                                 del template de vistor Bootstrap               -->
    <link rel="stylesheet" href="{{ asset('plugins/visitor/css/bootstrap.min.css') }}" >

    <!-- del template visitor  Custom CSS -->
    <link href="{{ asset('plugins/visitor/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('plugins/visitor/css/style-responsive.css') }}" rel="stylesheet"/>
    <!-- font CSS -->

    <!--                             Iconos                                                -->
    {{--        Del template del admin de seller Font Awesome       --}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">--}}
    <!--        del template visitor font-awesome icons         -->
    <link rel="stylesheet" href="{{ asset('plugins/visitor/css/font.css') }}" type="text/css"/>
    <link href="{{ asset('plugins/visitor/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/visitor/css/morris.css') }}" type="text/css"/>

                        <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/Ionicons/css/ionicons.min.css') }}">
    <!--                             Iconos                                                -->

    <!--    del template visitor calendar   -->
    <link rel="stylesheet" href="{{ asset('plugins/visitor/css/monthly.css') }}">
    <!--        //calendar          -->

    <!--       del template visitor     //font-awesome icons -->
{{--    <script src="{{ asset('plugins/visitor/js/jquery2.0.3.min.js') }}"></script>--}}
    <script src="{{ asset('plugins/visitor/js/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/visitor/js/morris.js') }}"></script>
    <!-- del template admin del seller Morris chart -->
{{--    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/morris.js/morris.css') }}">--}}

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/jvectormap/jquery-jvectormap.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    {{--del template visitor--}}
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    {{--del template visitor--}}
    <!-- Styles del AdminLTE-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="{{ url('/') }}" class="logo">
                VISITORS
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        @include('layouts.partials.navbar')
    </header>
    <!--header end-->

    <!--sidebar start-->
    @include('layouts.partials.sidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">


            <br/>
            @include('flash::message')

            @yield('content')



        </section>
        <!-- footer -->
        <div class="footer ">
            <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
        </div>
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>

<!-- Scripts -->
{{--<script src="/js/app.js"></script>--}}
<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
{{--<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.js') }}"></script>--}}
<script src="{{ asset('plugins/visitor/js/bootstrap.js') }}"></script>

<script src="{{ asset('plugins/visitor/js/jquery.dcjqaccordion.2.7.js') }}"></script>

<script src="{{ asset('plugins/visitor/js/script.js') }}"></script>

<script src="{{ asset('plugins/visitor/js/jquery.slimscroll.js') }}"></script>

<script src="{{ asset('plugins/visitor/js/jquery.nicescroll.js') }}"></script>

<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="{{ asset('plugins/visitor/js/flot-chart/excanvas.min.js')}}"></script>
<![endif]-->

<script src="{{ asset('plugins/visitor/js/jquery.scrollTo.js') }}"></script>

<!-- del template admin de seller Morris.js charts -->
{{--<script src="{{ asset('plugins/LzTE/thema/raphael/raphael.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/LTE/thema/morris.js/morris.min.js') }}"></script>--}}

<!-- morris JavaScript -->
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>

<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
    $(window).load( function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch(window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
@yield('js')

</body>
</html>
