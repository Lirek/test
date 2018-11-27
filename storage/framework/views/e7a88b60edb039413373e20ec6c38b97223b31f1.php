<?php $__env->startSection('css'); ?>
    <style class="cp-pen-styles">
    @import  url("https://fonts.googleapis.com/css?family=Arimo:400,700");
    * {
        -webkit-transition: 300ms;
        transition: 300ms;
    }

    /*.btn-circle {*/
    /*width: 30px;*/
    /*height: 30px;*/
    /*text-align: center;*/
    /*padding: 6px 0;*/
    /*font-size: 12px;*/
    /*line-height: 1.428571429;*/
    /*border-radius: 15px;*/
    /*}*/
    /*.btn-circle.btn-lg {*/
    /*width: 50px;*/
    /*height: 50px;*/
    /*padding: 10px 16px;*/
    /*font-size: 18px;*/
    /*line-height: 1.33;*/
    /*border-radius: 25px;*/
    /*}*/
    /*.btn-circle.btn-xl {*/
    /*width: 70px;*/
    /*height: 70px;*/
    /*padding: 10px 16px;*/
    /*font-size: 24px;*/
    /*line-height: 1.33;*/
    /*border-radius: 35px;*/
    /*}*/


    ul {
        list-style-type: none;
    }

    h1, h2, h3, h4, h5, p {
        font-weight: 400;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    a:hover {
        color: #6ABCEA;
    }

    .movie-card {
        background: #ffffff;
        box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 315px;
        margin: 2em;
        border-radius: 10px;
        display: inline-block;
    }

    .movie-header {
        padding: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        display: block;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .header-icon-container {
        position: relative;
    }

    .movie-card:hover {
        -webkit-transform: scale(1.03);
        transform: scale(1.03);
        box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
    }

    .movie-content {
        padding: 18px 18px 24px 18px;
        margin: 0;
    }

    .movie-content-header, .movie-info {
        display: table;
        width: 100%;
    }

    .movie-title {
        font-size: 15px;
        margin: 0;
        display: table-cell;
        word-break: break-all;
    }

    .info-section label {
        display: block;
        color: rgba(0, 0, 0, 0.5);
        margin-bottom: .5em;
        font-size: 9px;
    }

    .info-section span {
        font-weight: 700;
        font-size: 11px;
    }

    @media  screen and (max-width: 500px) {
        .movie-card {
            width: 100%;
            max-width: 100%;
            margin: 1em;
            display: block;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row" style="">
        <div class="form-group">
            <div class="row-edit">
                <div class="col-md-12 col-sm-12 mb">
                    <div class="">
                        <div class="">
                            <div class="control-label">
                                <div class="white-header">
                                    <div class="col-sm-12 col-xs-12 col-md-12">
                                        <?php $__currentLoopData = $Rad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h3><span class="card-title"><center><b style="color: #428bca"><i class=""></i> <?php echo e($radios->name_r); ?></b></center></span></h3>
                                            <div class="col-sm-12 col-xs-12 col-md-12">

                                               <center><img src="<?php echo e(asset($radios->logo)); ?>" class="img-responsive" width="17%" style="margin-top: 2%;"></center>

                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 1%;">
                                            <center>
                                                <a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($radios->facebook); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-facebook" ></i>
                                                </a>
                                                <a class="waves-effect waves-light btn blue" href="<?php echo e($radios->twitter); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a class="waves-effect waves-light btn red" href="<?php echo e($radios->google); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                                <a class="waves-effect waves-light btn pink" href="<?php echo e($radios->instagram); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-instagram"></i>
                                                </a>

                                            </center>
                                            </div>
                                            <div class="col-md-3">

                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6" align="center">
                                                <audio  id="player" controls  data-plyr-config='{"autoplay": true}'>
                                                    <source src="<?php echo e(asset($radios->streaming)); ?>" type="audio/mp3" >
                                                </audio>
                                            </div>
                                            <div class="col-md-3">

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-12 col-xs-12 col-md-12">
                                            <hr>
                                            <h3><span class="card-title"><i class="fa fa-angle-right"> Radios</i></span></h3>
                                            <div class="col-md-12  control-label">
                                                <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchListenRadio')); ?>"><?php echo e(csrf_field()); ?>

                                                    <input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                                                    <button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>
                                                </form>
                                            </div>

                                            <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radioss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                                    <div class="movie-card">
                                                        <a href="#">
                                                            <div class="movie-header">
                                                                <p><a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>"><img src="<?php echo e(asset($radios->logo)); ?>" width="100%" height="170px">

                                                                        <div class="header-icon-container">
                                                                            <a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>">
                                                                                
                                                                            </a>
                                                                        </div>
                                                            </div><!--movie-header-->
                                                        </a>
                                                        <div class="movie-content">
                                                            <div class="movie-content-header">
                                                                <a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>">
                                                                    <h4 class="movie-title"><?php echo e($radios->name_r); ?></h4>
                                                                </a>
                                                            </div>
                                                        </div><!--movie-content-->
                                                    </div><!--movie-card-->
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div  class="col-sm-12 col-xs-12 col-md-12">
                                                <?php echo e($Radio->links()); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

    <script type="text/javascript">

        const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));

    </script>


    <script type="text/javascript">

        $(document).ready(function(){
            $('#seach').keyup(function(evento){
                $('#buscar').attr('disabled',true);
            });
            $('#buscar').attr('disabled',true);
            $('#seach').autocomplete({
                source: "<?php echo e(url('SearchRadio')); ?>",
                minLength: 2,
                select: function(event, ui){
                    $('#seach').val(ui.item.value);
                    var valor = ui.item.value;
                    console.log(valor);
                    if (valor=='No se encuentra...'){
                        $('#buscar').attr('disabled',true);
                        swal('Radio no se encuentra regitrada','','error');
                    }else{
                        $('#buscar').attr('disabled',false);
                    }
                }

            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>