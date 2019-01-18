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

                
                <?php if(count($Movies)> 0 || count($Series) > 0): ?>
                    <div class="card">
                        <?php if(count($Movies)>0): ?>
                            <div class="row">
                                <div class="col s12 ">
                                    <a href="<?php echo e(url('movies')); ?>" >
                                        <h5 class="grey-text left"><i class="small material-icons" >movie</i> Pelicula</h5></a>
                                </div>
                                <div class="col s12 ">
                                    <div  class="owl-carousel owl-theme">
                                        <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div>
                                                <img src="<?php echo e(asset('movie/poster')); ?>/<?php echo e($m->img_poster); ?>" height="250px" width="100px" onclick="masInfo('pelicula',<?php echo $m->id; ?>)">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <div class="col s12 ">
                                    <a href="<?php echo e(url('movies')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(count($Series)>0): ?>
                            <div class="row">
                                <div class="col s12 ">
                                    <a href="<?php echo e(url('series')); ?>" >
                                        <h5 class="grey-text left"><i class="mdi mdi-movie-roll"></i>Serie</h5></a>
                                </div>
                                <div class="col s12 ">
                                    <div  class="owl-carousel owl-theme">
                                        <?php $__currentLoopData = $Series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div>
                                                <img src="<?php echo e(asset($s->img_poster)); ?>" height="250px" width="100px" onclick="masInfo('serie',<?php echo $s->id; ?>)">
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                </div>
                                <div class="col s12 ">
                                    <a href="<?php echo e(url('series')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                
                <?php if(count($Albums)>0): ?>
                    <div class="card">
                        <div class="row">
                            <div class="col s12 ">
                                <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>"  >
                                    <h5 class="grey-text left"><i class="material-icons">music_note</i> Música</h5></a>
                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($a->cover)); ?>" height="250px" width="100px">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>

                            </div>
                            <div class="col s12 ">
                                <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                            </div>
                        </div>
            <?php endif; ?>

            
            <?php if(count($Book)> 0 || count($Megazines)> 0): ?>
                <div class="card">
                    <?php if(count($Book)> 0): ?>
                        <div class="row">
                            <div class="col s12 ">
                                <a href="<?php echo e(url('tbook')); ?>"> <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Libros</h5></a>
                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($b->cover); ?>" height="250px" width="100px" onclick="masInfo('libro',<?php echo $b->id; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col s12 ">
                                <a href="<?php echo e(url('tbook')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(count($Megazines)> 0): ?>


                        <div class="row">
                            <div class="col s12 ">
                                <a href="<?php echo e(url('/my_megazine',Auth::guard('web_seller')->user()->id)); ?>">
                                    <h5 class="grey-text left"><i class="material-icons">bookmark_border</i> Revista</h5></a>
                            </div>
                            <div class="col s12 ">
                                <div  class="owl-carousel owl-theme">
                                    <?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <img src="<?php echo e(asset($m->cover)); ?>" height="250px" width="100px" onclick="masInfo('revista',<?php echo $m->id; ?>)">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col s12 ">
                                <a href="<?php echo e(url('/my_megazine',Auth::guard('web_seller')->user()->id)); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


                    <!--CONTENIDO RECIENTE Radio-->
                        <?php if(count($Radio)>0): ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('radios')); ?>" >
                                            <h5 class="grey-text left"><i class="material-icons">radio</i> Radio</h5></a>

                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <a href="<?php echo e(url('ListenRadio/'.$r->id)); ?>" class="waves-effect waves-light">
                                                        <img src="<?php echo e(asset($r->logo)); ?>" height="150px" width="150px"  onclick="masInfo('radio')">
                                                    </a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('radios')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                    </div>

                                </div>

                            </div>
                        <?php endif; ?>
                    <!--End  RECIENTE radio-->


                        <!--CONTENIDO RECIENTE Tv-->
                        <?php if(count($Tv)>0): ?>
                            <div class="card">
                                <div class="row">
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('tvs')); ?>" >
                                            <h5 class="grey-text left"><i class="material-icons">tv</i> Tv</h5></a>

                                    </div>
                                    <div class="col s12 ">
                                        <div  class="owl-carousel owl-theme">
                                            <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div>
                                                    <a  href="<?php echo e(url('PlayTv/'.$tv->id)); ?>" class="waves-effect waves-light">
                                                        <img src="<?php echo e(asset('/images/Tv/')); ?>/<?php echo e($tv->logo); ?>"  height="150px" width="150px" onclick="masInfo('tv',<?php echo $tv->id; ?>)" ></a>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                    <div class="col s12 ">
                                        <a href="<?php echo e(url('tvs')); ?>" class="btn btn-small waves-effect waves-light right teal" style="margin: 10px;">Más</a>
                                    </div>
                                </div>
                            </div>
                    <?php endif; ?>
                    <!--End  RECIENTE tv-->



        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">

        function masInfo(tipo,id) {
            console.log(tipo,id);

            if (tipo=="radio") {
                var ruta = "<?php echo e(url('/ListenRadio/')); ?>/"+id;
                location.href = ruta;
            } else if (tipo=="tv") {
                var ruta = "<?php echo e(url('/PlayTv/')); ?>/"+id;
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
            }
        }
    </script>


    <script >

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