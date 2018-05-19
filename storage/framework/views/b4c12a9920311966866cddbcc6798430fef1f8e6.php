<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Leipel')); ?></title>

    <!-- Styles -->
    
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrapV3.3/css/bootstrap.min.css')); ?>">

    <!-- Styles del AdminLTE-->

    <!--                                 Bootstrap-->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/bootstrap')); ?>">
    
    <style type="text/css">
        .limit{
                width:50px;
                word-wrap: break-word;
        }
    </style>
    <!--                                 Font Awesome                                                -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css')); ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/Ionicons/css/ionicons.min.css')); ?>">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/AdminLTE.min.css')); ?>">

    <!-- chosen -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/chosen/chosen.css')); ?>">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/dist/css/skins/_all-skins.min.css')); ?>">

    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/morris.js/morris.css')); ?>">

    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/LTE/thema/jvectormap/jquery-jvectormap.css')); ?>">

    <!-- Date Picker -->
    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/LTE/thema/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')); ?>">

    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/LTE/thema/bootstrap-daterangepicker/daterangepicker.css')); ?>">

    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.css')); ?>">

    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>">

    <!-- iconos de material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

<?php echo $__env->yieldContent('css'); ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Styles del AdminLTE-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
</head>

<body class="hold-transition skin-black-light sidebar-collapse sidebar-mini">

<div class="wrapper">
    

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo e(url('/seller_home')); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="<?php echo e(asset('sistem_images/Leipel.png')); ?>"
                                         class="img-responsive"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="<?php echo e(asset('sistem_images/Logo-Leipel.png')); ?>"
                                       class="img-responsive"></span>
            
            
            
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <?php echo $__env->make('seller.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <?php echo $__env->make('seller.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <br/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 ">

                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <br/>

            </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Leipel &copy; .</strong>
    </footer>

    <div class="control-sidebar-bg"></div>
    

</div>

<!-- Scripts -->
<!-- Scripts -->

<script src="<?php echo e(asset('plugins/jquery/js/jquery-3.2.1.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bootstrapV3.3/js/bootstrap.js')); ?>"></script>

<!-- ./wrapper LTE-->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('plugins/LTE/thema/jquery-ui/jquery-ui.min.js')); ?>"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>




<!-- Morris.js charts -->
<script src="<?php echo e(asset('plugins/LTE/thema/raphael/raphael.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/LTE/thema/morris.js/morris.min.js')); ?>"></script>

<!-- Sparkline -->
<script src="<?php echo e(asset('plugins/LTE/thema/jquery-sparkline/dist/jquery-sparkline.min.js')); ?>"></script>

<!-- chosen -->
<script src="<?php echo e(asset('plugins/chosen/chosen.jquery.js')); ?>"></script>

<!-- DataTables -->
<script src="<?php echo e(asset('plugins/LTE/thema/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/LTE/thema/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>

<!-- jvectormap -->
<script src="<?php echo e(asset('plugins/LTE/thema/plugins/jvectormap/jquery-jvectormap1.2.2.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/LTE/thema/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>

<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('plugins/LTE/thema/jquery-knob/dist/jquery.knob.min.js')); ?>"></script>

<!-- daterangepicker -->
<script src="<?php echo e(asset('plugins/LTE/thema/moment/min/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/LTE/thema/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

<!-- datepicker -->
<script src="<?php echo e(asset('plugins/LTE/thema/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('plugins/LTE/thema/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>

<!-- Slimscroll -->
<script src="<?php echo e(asset('plugins/LTE/thema/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>

<!-- FastClick -->
<script src="<?php echo e(asset('plugins/LTE/thema/fastclick/lib/fastclick.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('plugins/LTE/thema/dist/js/adminlte.min.js')); ?>"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('plugins/LTE/thema/dist/js/pages/dashboard.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('plugins/LTE/thema/dist/js/demo.js')); ?>"></script>

<!-- ./wrapper -->
<script src="<?php echo e(asset('plugins/duplicate/jquery.multifield.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/upload/jquery.uploadPreview.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/input_file/selectFile.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/validator/parsley.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/validator/parsley.min.js')); ?>"></script>

<?php echo $__env->yieldContent('js'); ?>


</body>
</html>