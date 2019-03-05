<?php $__env->startSection('content'); ?>
    <!--main content start-->
    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <style type="text/css">
        .owl-theme .owl-nav [class*='owl-'] {
            transition: all .3s ease;
        }
        .owl-theme .owl-nav [class*='owl-'].disabled:hover {
            background-color: #D6D6D6;
        }

        owl-theme {
            position: relative;
        }

        .owl-theme .owl-next, .owl-theme .owl-prev {
            width: 22px;
            height: 22px;
            position: absolute;
            top: 50%;
            transform: translateY(-125%)
        }
        .owl-theme .owl-prev {
            left: 10px;
        }
        .owl-theme .owl-next {
            right: 10px;
        }

    </style>


    <!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
    <div class="row">
        <div class="col s12 m12">
            <div class="card-content">
                <h4 class="titelgeneral"><i class="material-icons small">view_carousel</i> MIS CONTENIDOS</h4>
                <br>

                
                <?php if(count($cine)> 0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="small material-icons">movie</i> Cine</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $cine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($m['img_poster'])); ?>" height="250px" width="100px" onclick="masInfo('<?php echo $m['type']; ?>',<?php echo $m['id']; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if(count($musica)>0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                
                                <h5 class="grey-text left"><i class="material-icons">music_note</i> Música</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $musica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($a['cover'])); ?>" height="250px" width="100px" onclick="masInfo('<?php echo $a['type']; ?>',<?php echo $a['id']; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if(count($lectura)> 0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Lectura</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $lectura; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($b['cover'])); ?>" height="250px" width="100px" onclick="masInfo('<?php echo $b['type']; ?>',<?php echo $b['id']; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!--CONTENIDO RECIENTE Radio-->
                <?php if(count($radios)>0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $radios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($r['logo'])); ?>" height="250px" width="100px" onclick="masInfo('<?php echo $r['type']; ?>',<?php echo $r['id']; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!--End  RECIENTE radio-->

                <!--CONTENIDO RECIENTE Tv-->
                <?php if(count($tvs)>0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5>
                            </div>
                            <div class="col s12" style="margin: 10px;">
                                <div class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($tv['logo'])); ?>" height="250px" width="100px" onclick="masInfo('<?php echo $tv['type']; ?>',<?php echo $tv['id']; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <!--End  RECIENTE tv-->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">

        function masInfo(tipo,id) {
            console.log(tipo,id);
            if (tipo=="radio") {
                var ruta = "<?php echo e(url('/radios/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="tv") {
                var ruta = "<?php echo e(url('/tvs/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="serie") {
                var ruta = "<?php echo e(url('/series/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="pelicula") {
                var ruta = "<?php echo e(url('/movies/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="revista") {
                var ruta = "<?php echo e(url('/show_megazine/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="libro") {
                var ruta = "<?php echo e(url('/tbook/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="album") {
                var ruta = "<?php echo e(url('/show_album/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="cancion") {
                var ruta = "<?php echo e(url('/my_music_panel/')); ?>/"+id;
                location.href = ruta;
            }
        }

        $(document).ready(function(){

            var owl = $('.owl-carousel');
            owl.owlCarousel({
                //mergeFit:false,
                //merge:false,
                //pullDrag:false,
                //touchDrag:false,
                nav: false,
                loop:true,
                margin:10,
                responsiveClass:true,
                dots: true,
                //autoplay:true,
                //autoplayTimeout:3000,
                //autoplayHoverPause:true,
                //stagePadding: 50, centra los contenidos
                //lazyLoad:true, varia los tamaños de las imagenes
                responsive:{
                    0:{
                        items:2,
                        nav:false
                    },
                    500:{
                        items:3,
                        nav:false
                    },
                    600:{
                        items:4,
                        nav:true
                    },

                    1000:{
                        items:5,
                        nav:true,
                        loop:false
                    },
                },
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 3px;stroke: #fff;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>