<?php $__env->startSection('css'); ?>
    <style>

        .collection .collection-item.avatar:not(.circle-clipper) > .circle, .collection .collection-item.avatar :not(.circle-clipper) > .circle {
            position: absolute;
            width: 42px;
            height: 42px;
            overflow: hidden;
            left: 35px;
            display: inline-block;
            vertical-align: middle;
        }

        .aqua-gradient {
            background: -webkit-linear-gradient(50deg,#2096ff, #11ff71)!important;
            background: -o-linear-gradient(50deg,#2096ff, #a1ffae)!important;
            background: linear-gradient(40deg,#2096ff, #9dffac)!important;
        }
        /*videos de youtube*/
    .embed-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }
    .embed-container iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <!-- Main content -->
    <div class="row">

        <div class="col s12 m12" >
            <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="card-panel curva" style="padding-bottom: 110px;">
                <div class="row">
                    <div class="col s12 m12 ">
                    <h5  class="center">
                        " <?php echo e($Movies->title); ?>" (<?php echo e($Movies->release_year); ?>)
                    </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 ">
                    <img src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($Movies->img_poster); ?>" style="border-radius: 10px" id="lecturaspanel">
                    </div>
                    <div class="col s12 m8  ">
                        <ul class="collection z-depth-1" >

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p>
                                <i class="material-icons circle left blue-text">create</i>
                                    <b class="left">Titulo original: </b>
                                </p>
                                <p ALIGN="justify">&nbsp; <?php echo e($Movies->original_title); ?></p>
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;" >
                                <p><i class="material-icons circle left blue-text">turned_in</i>
                                <b class="left">Géneros:</b> </p>
                             <?php $__currentLoopData = $Movies->tags_movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="chip  aqua-gradient  white-text">
                                    <?php echo e($t->tags_name); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </li>

                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                    <p><i class="material-icons circle left blue-text">star</i>
                                    <b class="left">Categoria:&nbsp;&nbsp;</b></p>
                                <p ALIGN="justify"> <?php echo e($Movies->rating->r_name); ?></p>

                            </li>

                            <!-- <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                        <p><i class="material-icons circle left blue-text">local_play</i>
                                            <b class="left">Costo:&nbsp;&nbsp;</b></p>
                                <p ALIGN="justify">   Tickets</p>
                            </li> -->


                        <?php if($Movies->sagas!=null): ?>
                            <li class="collection-item"  style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">
                                <?php echo e($Movies->sagas->sag_name); ?></p>
                             </li>
                            <?php else: ?>
                            <li class="collection-item" style="padding: 5px 35px 5px 35px;">
                                <p><i class="material-icons circle left blue-text">folder</i>
                                <b class="left">Saga:&nbsp;</b></p>
                                <p ALIGN="justify">No pertenece a una saga</p>
                            </li>
                            <?php endif; ?>

                        <!--<li class="collection-item avatar">
                                <img  src=""  alt="User Avatar"class="circle img-responsive">
                                <span class="title"><b>Autor:</b></span>
                                <p><a href="--</a></p>
                        </li>-->

                            <li class="collection-item" style=" padding: 0px;" >
                                <br>
                                <div class="row">
                                    <div class="col s12 m4 l4">
                                        <a  href="#modal-default" class="btn curvaBoton waves-effect waves-light teal center modal-trigger green">Ver película</a>
                                    </div>
                                    <div class="col s12 m4 l4">
                                        <a class="waves-effect waves-light  center btn modal-trigger blue curvaBoton " href="#modal1">Sinopsis</a>
                                    </div>
                                    <div class="col s12 m4 l4">
                                        <a href="<?php echo e(url('MyMovies')); ?>" class="btn center curvaBoton red ">Atrás</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <div class="col m8 s12 offset-m2">
                        <br>
                        <div class="col m6 s6 offset-m3 offset-s3">
                            <li class="valid-wrapper" style="list-style: none;">
                                <i class="material-icons blue-text">share</i>
                                <b class="">Trailer:</b>
                            </li>
                        </div>
                        <?php
                            $url = $Movies->trailer_url;
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $id = $matches[1];
                            $width = '800px';
                            $height = '450px';
                        ?>
                        <br><br>
                        <div class="embed-container">
                            <iframe  type="text/html" width="680" height="415"
                          src="https://www.youtube.com/embed/<?php echo e($id); ?>"
                          frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <!-- /.modal  de sagas  -->
    <div id="modal-default" class="modal">
        <div class="modal-content modal-lg">
            <div class=" blue"><br>
                <h4 class="center white-text" ><i class="small material-icons">movie</i>"<?php echo e($Movies->title); ?>"</h4>
                <br>
            </div>
            <br>
            <div class=" col s12 m12">
                 <video style="width: 100%" poster="<?php echo e(asset('movie/poster')); ?>/<?php echo e($Movies->img_poster); ?>" id="player" controls >
                    <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($Movies->duration); ?>" type="video/mp4">
                    <source src="<?php echo e(asset('/movie/film')); ?>/<?php echo e($Movies->duration); ?>" type="video/webm">
                </video>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
        </div>
    </div>

    <!--Sinopsis-->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content" style="padding: 15px;">
            <h5><b>Sinopsis:</b></h5>
            <p ALIGN="justify"><?php echo e($Movies->based_on); ?></p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>