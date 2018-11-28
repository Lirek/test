<?php $__env->startSection('content'); ?>
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
  <div class=""> 
      <div class="white">
        <h2><span class="card-title">
          <u>
            <em>Mi cartelera</em>
          </u>
        </span></h2>      
      </div>
  </div>
</div>
<!-- Si se quiere central lo iconos agregar al DIV style="justify-content: center; display: flex;"-->
<div class="col-md-12" >
    <?php if(Auth::guard('web_seller')->user()->estatus ==='Aprobado'): ?>
      <?php if($modulos!=false): ?>
        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($mod->name == 'Musica'): ?>
            <div class="col-sm-2 box0">
              <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>">
                <div class="box1" style="padding: 10%;">
                  <span class="li_music"></span>
                  <h3 style="margin-top: 2%;"><?php echo e($musical_content); ?></h3>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name =='Peliculas'): ?>
            <div class="col-sm-2 box0">
              <a href="<?php echo e(url('/movies')); ?>">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-film"></span>
                  <h3><?php echo e($movie_content + $serie_content); ?></h3>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Libros'): ?>
            <div class="col-sm-2 box0">
              <a href="<?php echo e(url('/tbook')); ?>">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-book"></span>
                  <h3><?php echo e($book_content +  $megazine_content); ?></h3>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Radios'): ?>
            <div class="col-sm-2 box0">
              <a href="#">
                <div class="box1" style="padding: 10.3%;">
                  <span class="glyphicon glyphicon-stats"></span>
                  <h3><?php echo e($radio_content); ?></h3>
                </div>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'TV'): ?>
            <div class="col-sm-2 box0">
              <a href="#">
                <div class="box1" style="padding: 10%;">
                  <span class="li_tv"></span>
                  <h3 style="margin-top: 2%;"><?php echo e($tv_content); ?></h3>
                </div>
              </a>
            </div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
        <div class="col-md-12 col-md-offset-1">
          <h1>Aún no posee módulos asignados.</h1>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <!-- /row mt -->
  <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
<div class="col-md-12" style="margin-top: 12px;">

  <div class="row mt">
    <div class="text-center">
      <div class="col-sm-6">
          <h4><b>Total de contenido:</b> <?php echo e($total_content); ?></h4>
      </div>
      <div class="col-sm-6">
          <h4><b>Contenido aprobado:</b> <?php echo e($total_aproved); ?></h4>
      </div>
    </div>
    <!--CONTENIDO RECIENTE-->
      <div class="col-md-11 col-sm-11 mb" style="margin-left: 2%; margin-top: 2%">
        <div class="white-panel panRf pe donut-chart">
          <div class="col-sm-12 col-xs-12 col-md-12 goleft">
            <table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                  <th></th>
                  <th><i class="fa fa-bullhorn" style="color: #23B5E6"></i>Nombre</th>
                  <th class="hidden-phone"><i class="fa fa-question-circle"  style="color: #23B5E6"></i>Tipo</th>
                  <th class="hidden-phone"  ><i class="fa fa-money" style="color: #23B5E6"></i>Costo</th>
                  <th><i class=" fa fa-edit"  style="color: #23B5E6"></i>Estatus</th>
                </tr>
              </thead>
              <tbody>  
                <?php if($Albums): ?>
                  <?php $__currentLoopData = $Albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $albums): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="letters">
                      <td><span class="bg-r"><i class="li_vynil" style="color: #23B5E6"></i></span></td>
                      <td><a href="#"> <?php echo e($albums->name_alb); ?></a></td>
                      <td class="hidden-phone">Album Musical</td>
                      <td class="hidden-phone"><?php echo e($albums->cost); ?></td>
                      <td><?php echo e($albums->status); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($Tv): ?>
                  <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="letters">
                    <td><span class="bg-r"><i class="li_tv" style="color: #23B5E6"></i></span></td>
                    <td><a href="#"> <?php echo e($tv->name_r); ?></a></td>
                    <td class="hidden-phone">TV Online</td>
                    <td class="hidden-phone">Gratis</td>
                    <td><?php echo e($tv->status); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($Book): ?>
                  <?php $__currentLoopData = $Book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr class="letters">
                    <td><span class="bg-r"><i class="fa fa-book" style="color: #23B5E6"></i></span></td>
                    <td><a href="#"> <?php echo e($book->title); ?></a></td>
                    <td class="hidden-phone">Libro</td>
                    <td class="hidden-phone"><?php echo e($book->cost); ?></td>
                    <td><?php echo e($book->status); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <?php if($Megazines): ?>
                  <?php $__currentLoopData = $Megazines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $megazines): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="letters">
                      <td><span class="bg-r"><i class="li_news" style="color: #23B5E6"></i></span></td>
                      <td><a href="#"> <?php echo e($megazines->title); ?></a></td>
                      <td class="hidden-phone">Revista</td>
                      <td class="hidden-phone"><?php echo e($megazines->cost); ?></td>
                      <td><?php echo e($megazines->status); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                  <?php if($Radio): ?>
                    <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="letters">
                        <td><span class="bg-r"><i class="fa fa-microphone" style="color: #23B5E6"></i></span></td>
                        <td><a href="#"> <?php echo e($radio->name_r); ?></a></td>
                        <td class="hidden-phone">Radio Online</td>
                        <td class="hidden-phone">Gratis</td>
                        <td><?php echo e($radio->status); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                  <?php if($Movies): ?>
                    <?php $__currentLoopData = $Movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="letters">
                        <td><span class="bg-r"><i class="fa fa-video-camera" style="color: #23B5E6"></i></span></td>
                        <td><a href="<?php echo e(route('movies.show', $movies->id)); ?>"> <?php echo e($movies->title); ?></a></td>
                        <td class="hidden-phone">Pelicula</td>
                        <td class="hidden-phone"><?php echo e($movies->cost); ?></td>
                        <td><?php echo e($movies->status); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>

                   <?php if($Series): ?>
                    <?php $__currentLoopData = $Series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr class="letters">
                        <td><span class="bg-r"><i class="fa fa-video-camera" style="color: #23B5E6"></i></span></td>
                        <td><a href="<?php echo e(route('series.show',$series->id)); ?>"> <?php echo e($series->title); ?></a></td>
                        <td class="hidden-phone">Serie</td>
                        <td class="hidden-phone"><?php echo e($series->cost); ?></td>
                        <td><?php echo e($series->status); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>
</div>
    <!-- <div class="col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #04B486;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Seguidores</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-users fa-3x"></i>
          
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> <?php echo e($followers); ?> </i></h1>
          </div>
        </footer>
      </div>
    </div> -->
<!--     <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido creado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-files-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> <?php echo e($total_content); ?> </i></h1>
          </div>
        </footer>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido publicado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-star-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> 0  </i></h1>
          </div>
        </footer>
      </div>
    </div>

  
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h1>Ventas</h1>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-shopping-cart fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="">0</i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>
  </div> -->

<!-- <div class="col-md-12" style="">
<div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Balance de tickets</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-tags fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="">0</i></h1>
          </div>
        </footer>
      </div>
    </div>

    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #21a4de;">
        <div class="darkblue-header">
          <h2 style="color: #fff;">Solicitudes administrador</h2>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-comments fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class=""> 0</i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>
</div>    -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>