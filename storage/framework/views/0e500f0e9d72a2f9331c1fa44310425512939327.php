<?php $__env->startSection('content'); ?>
<main  class="mdl-layout__content">
 
 <div class="mdl-grid">
    
    <div class="mdl-cell--4-col">
        <div class="mdl-card">
      <div class="mdl-card__title">
       <h2 class="mdl-card__title-text">Contenido de Lectura</h2>
     </div>
    <div class="mdl-card__media">
      <img src="<?php echo e(asset('sistem_images/university.png')); ?>" width="300" height="200" border="0" alt="" style="padding:20px;">
    </div>
  
  <div class="mdl-card__supporting-text">
    <p>
    <?php if(count($megazines) != 0 or count($books) != 0): ?> 
    Existen <?php echo e(count($megazines)); ?> Revistas Pendientes de aprobacion 
    y Existen <?php echo e(count($books)); ?> Libros Pendientes de aprobacion
    <?php else: ?>
    No existen Revistas o Libros Pendientes de Aprobacion
    <?php endif; ?>    
    </p>
  </div>

  <div class="mdl-card__actions">

     <button id="megazine_d" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">library_books</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="megazine_d">
            <a href="<?php echo e(url('/admin_chain')); ?>"><li class="mdl-menu__item">Cadenas de Publicacion Revisar</li></a>
            <a href="<?php echo e(url('/admin_megazine')); ?>"><li class="mdl-menu__item">Revistas por Revisar </li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Cadenas de Publicaciones</li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Revistas</li></a>
        </ul>

        <button id="book" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">book</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="book">
            <a href="<?php echo e(url('/admin_chain')); ?>"><li class="mdl-menu__item">Cadenas de Publicacion Revisar</li></a>
            <a href="<?php echo e(url('/admin_megazine')); ?>"><li class="mdl-menu__item">Revistas por Revisar </li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Cadenas de Publicaciones</li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Revistas</li></a>
        </ul>



            <div class="mdl-tooltip" data-mdl-for="book">
                    <strong>Libros</strong>
            </div>

            <div class="mdl-tooltip" data-mdl-for="tv_d">
                    <strong>Televisoras</strong>
            </div>

            <div class="mdl-tooltip" data-mdl-for="megazine_d">
                    <strong>Revistas</strong>
            </div>
     </div>  
        </div>
 </div>
    
    <div class="mdl-cell--4-col">
        <div class="mdl-card">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text">Contenido AudioVisual</h2>
            </div>
                <div class="mdl-card__media">
                    <img src="<?php echo e(asset('sistem_images/filmografa.png')); ?>" width="300" height="200" border="0" alt="" style="padding:20px;">
                </div>
                    <div class="mdl-card__supporting-text">
                        Administre Las solicitudes de las Proveedoras de contenido digital de tipo visual

                    </div>
            <div class="mdl-card__actions">
             <button id="movies" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                <i class="material-icons">movie</i>
             </button>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="movies">
                 <a href="<?php echo e(url('/admin_chain')); ?>"><li class="mdl-menu__item">Cadenas de Publicacion Revisar</li></a>
                 <a href="<?php echo e(url('/admin_megazine')); ?>"><li class="mdl-menu__item">Revistas por Revisar </li></a>
                 <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Cadenas de Publicaciones</li></a>
                 <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Revistas</li></a>
                </ul>

        <button id="series" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">video_library</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="series">
            <a href="<?php echo e(url('/admin_chain')); ?>"><li class="mdl-menu__item">Cadenas de Publicacion Revisar</li></a>
            <a href="<?php echo e(url('/admin_megazine')); ?>"><li class="mdl-menu__item">Revistas por Revisar </li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Cadenas de Publicaciones</li></a>
            <a href="<?php echo e(url('/admin')); ?>"><li class="mdl-menu__item">Revistas</li></a>
        </ul>

        <button id="tv_d" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
        <i class="material-icons">tv</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="tv_d">
            <a href="<?php echo e(url('/admin_tv')); ?>"><li class="mdl-menu__item">TVs por Revisar</li></a>
            <a href="<?php echo e(url('/admin_single')); ?>"><li class="mdl-menu__item">TVs</li></a>
        </ul>
            <div class="mdl-tooltip" data-mdl-for="series">
                    <strong>Series</strong>
            </div>
            
            <div class="mdl-tooltip" data-mdl-for="movies">
                    <strong>Peliculas</strong>
            </div>

            </div>  
        </div>
    </div>

    <div class="mdl-cell--4-col">
        <div class="mdl-card">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Contenido Musical</h2>
            </div>
                <div class="mdl-card__media">
                    <img src="<?php echo e(asset('sistem_images/music.png')); ?>" width="300" height="200" border="0" alt="" style="padding:20px;">
                </div>
            <div class="mdl-card__supporting-text">
                Administre Las solicitudes de las Proveedoras de contenido digital de tipo musical 
            </div>
                <div class="mdl-card__actions">
            <button id="music_d" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                <i class="material-icons">music_note</i>
            </button>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="music_d">
                 <a href="<?php echo e(url('/admin_albums')); ?>"><li class="mdl-menu__item">Albums por Revisar</li></a>
                 <a href="<?php echo e(url('/admin_single')); ?>"><li class="mdl-menu__item">Single por Revisar</li></a>
                 <a href="<?php echo e(url('/admin_musician')); ?>"><li class="mdl-menu__item">Musicos por Revisar</li></a>
                 <li class="mdl-menu__item">Musicos</li>
                 <li class="mdl-menu__item">Albums</li>
                 <li class="mdl-menu__item">Singles</li>
                </ul>
    
            <button id="radio_d" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                <i class="material-icons">radio</i>
            </button>
                <ul class="mdl-menu mdl-js-menu mdl-menu--top-left" for="radio_d">
                    <a href="<?php echo e(url('/admin_radio')); ?>"><li class="mdl-menu__item">Radios por Revisar</li></a>
                    <a href="<?php echo e(url('/admin_single')); ?>"><li class="mdl-menu__item">Radios</li></a>
                </ul>
                    <div class="mdl-tooltip" data-mdl-for="music_d">
                     <strong>Musica</strong>
                    </div>
            
                    <div class="mdl-tooltip" data-mdl-for="radio_d">
                     <strong>Radios</strong>
                    </div>

                </div>  
        </div>
    </div>

    

 </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>