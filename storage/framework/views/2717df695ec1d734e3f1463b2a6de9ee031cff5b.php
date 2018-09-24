<?php $__env->startSection('content'); ?>
  <!-- 
  MAIN CONTENT
  -->
  <!--main content start-->
  <div class="row" style="margin-top: 2%;">
    <div class="col-md-12 col-md-offset-1">
      <h1>Mi contenido</h1>
    </div>
    <?php if(Auth::guard('web_seller')->user()->estatus ==='Aprobado'): ?>
      <?php if($modulos!=false): ?>
        <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($mod->name == 'Musica'): ?>
            <div class="col-sm-3 box0">
              <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>">
                <div class="box1" style="padding: 10%;">
                  <span class="li_music"></span>
                  <h3 style="margin-top: 2%;"><?php echo e($musical_content); ?></h3>
                </div>
                <p>
                  <?php if($musical_content>0): ?>
                    Usted ha registrado <?php echo e($musical_content); ?> contenidos musicales con nosotros, 
                    <?php if($musical_aproved>0): ?>
                      <?php echo e($musical_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido musical con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name =='Peliculas'): ?>
            <div class="col-sm-3 box0">
              <a href="<?php echo e(url('/movies')); ?>">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-film"></span>
                  <h3><?php echo e($movie_content); ?></h3>
                </div>
                <p>
                  <?php if($movie_content>0): ?>
                    Usted ha registrado <?php echo e($movie_content); ?> contenidos de películas con nosotros, 
                    <?php if($movie_aproved>0): ?>
                      <?php echo e($movie_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado películas con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Libros'): ?>
            <div class="col-sm-3 box0">
              <a href="<?php echo e(url('/tbook')); ?>">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-book"></span>
                  <h3><?php echo e($book_content); ?></h3>
                </div>
                <p>
                  <?php if($book_content>0): ?>
                    Usted ha registrado <?php echo e($book_content); ?> contenidos de libros con nosotros, 
                    <?php if($book_aproved>0): ?>
                      <?php echo e($book_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido de libros con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Series'): ?>
            <div class="col-sm-3 box0">
              <a href="<?php echo e(url('/series')); ?>">
                <div class="box1" style="padding: 10%;">
                  <span class="li_video"></span>
                  <h3 style="margin-top: 2%;"><?php echo e($serie_content); ?></h3>
                </div>
                <p>
                  <?php if($serie_content>0): ?>
                    Usted ha registrado <?php echo e($serie_content); ?> contenidos de series con nosotros, 
                    <?php if($serie_aproved>0): ?>
                      <?php echo e($serie_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido de serie con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Revistas'): ?>
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 11%;">
                  <span class="fa fa-archive"></span>
                  <h3><?php echo e($megazine_content); ?></h3>
                </div>
                <p>
                  <?php if($megazine_content>0): ?>
                    Usted ha registrado <?php echo e($megazine_content); ?> contenidos revistas con nosotros, 
                    <?php if($megazine_aproved>0): ?>
                      <?php echo e($megazine_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido revista con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'Radios'): ?>
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 10.3%;">
                  <span class="glyphicon glyphicon-stats"></span>
                  <h3><?php echo e($radio_content); ?></h3>
                </div>
                <p>
                  <?php if($radio_content>0): ?>
                    Usted ha registrado <?php echo e($radio_content); ?> contenidos de radio con nosotros, 
                    <?php if($radio_aproved>0): ?>
                      <?php echo e($radio_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido de radio con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
              </a>
            </div>
          <?php endif; ?>
          <?php if($mod->name == 'TV'): ?>
            <div class="col-sm-3 box0">
              <a href="#">
                <div class="box1" style="padding: 10%;">
                  <span class="li_tv"></span>
                  <h3 style="margin-top: 2%;"><?php echo e($tv_content); ?></h3>
                </div>
                <p>
                  <?php if($tv_content>0): ?>
                    Usted ha registrado <?php echo e($tv_content); ?> contenidos de TV's con nosotros, 
                    <?php if($tv_aproved>0): ?>
                      <?php echo e($tv_aproved); ?> de los cuales están aprovados.
                    <?php else: ?>
                      pero no han sido aprovado.
                    <?php endif; ?>
                  <?php else: ?>
                    Usted aun no ha registrado contenido de TV's con nosotros, le invitamos a que lo haga.
                  <?php endif; ?>
                </p>
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
  

  <div class="row mt">
    <div class="col-sm-4 mb">
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
    </div>
    <div class="col-md-4 col-sm-4 mb">
      <div class="darkblue-panel pn" style="background-color: #8A084B;">
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
      <div class="darkblue-panel pn" style="background-color: #088A68;">
        <div class="darkblue-header">
          <h3 style="color: #fff;">Total de contenido publicado</h3>
        </div>
        <h2 class="mt" style="color: #fff;">
          <i class="fa fa-star-o fa-3x"></i>
        </h2>
        <footer>
          <div class="centered">
            <h1><i class="info-box-number"> <?php echo e($aproved_content); ?> </i></h1>
          </div>
        </footer>
      </div>
    </div>
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #04B486;">
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

    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #2ECCFA;">
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
  </div>

  <div class="row mt">
    <div class="col-md-5 col-sm-5 mb">
      <div class="darkblue-panel pn" style="background-color: #FE2E2E;">
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
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <!--
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
  -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>