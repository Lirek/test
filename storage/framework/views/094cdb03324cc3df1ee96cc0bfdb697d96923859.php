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

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                <div class="white-header">
                     <h3><span class="card-title"><i class="fa fa-angle-right"> Mis Revistas</i></span></h3>           
                </div>
                <div class="col-md-12  control-label">
                    <!-- <input id="myInput" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;"> -->
                    <hr>
                </div>
                </div>
                <?php if($Megazines != 0): ?>   
                <!-- PROFILE 01 PANEL -->
                <?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Megazine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-3 col-sm-3 mb">
                    <div class="movie-card">
                        <div id="movie-header" style="">
                          <a href="<?php echo e(url('ShowMyReadMegazine/'.$Megazine->id)); ?> style="color: #ffff"">
                            <?php if($Megazine->cover): ?>
                                <img src="<?php echo e(asset($Megazine->cover)); ?>" width="100%" height="220" style="">
                            <?php else: ?>
                                <img src="#" width="100%" height="220" style="">
                            <?php endif; ?>
                          </a>
                        </div>
                        <!-- <div class="profile-01 centered">
                            <p><a href="<?php echo e(url('ShowMyReadMegazine/'.$Megazine->id)); ?> style="color: #ffff"">Ver mas</p></a>
                        </div> -->
                        <div class="movie-content">
                            <center><h4><?php echo e($Megazine->title); ?></h4></center>
                            <h6><b>Proveedor:</b> <?php echo e($Megazine->Seller->name); ?></h6>
                            <h6 class="sinopsis"><b>Sinopsis:</b><?php echo e($Megazine->descripcion); ?>

                            </h6>

                        </div>
                    </div><!--/content-panel -->
                </div><!--/col-md-4 -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h1>No Posee Revistas adquiridas</h1>
                <?php endif; ?>
            </div>
        </div> 
    </div> 
</div> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
<script src="jquery-1.10.2.js"></script>
<script>
   $(document).ready(function() {
      var showChar = 300;
      var ellipsestext = "...";
      var moretext = "Seguir leyendo >";
      var lesstext = "Mostrar menos";       
      var content = $('.sinopsis').html();
      
      if(content.length > showChar) {
         var c = content.substr(0, showChar);
         var html = '<div class="abstract">' + c + ellipsestext + '</div>' + '<div class="morecontent">' + content + '</div>' + '<p><span class="morelink">' + moretext + '</span></p>';
          $('.sinopsis').html(html);
       }
         
       $('.morelink').click(function() {
          if($(this).hasClass('less')) {
             $(this).removeClass('less');
             $(this).html(moretext);
             $('.abstract').removeClass('hidden');
           } else {
             $(this).addClass('less');
                 $(this).html(lesstext);
                 $('.abstract').addClass('hidden');
           }
           $(this).parent().prev().slideToggle('fast');
           $(this).prev().slideToggle('fast');
                return false;
        });
    });
</script>
<style>
   .morecontent { display: none; }
   .morelink { display: block; cursor: pointer; color:#2196f3; }
   .morelink:hover { text-decoration:underline; }
   .hidden { display:none; }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>