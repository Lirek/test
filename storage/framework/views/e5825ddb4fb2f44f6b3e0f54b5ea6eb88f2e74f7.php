
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://lorempixel.com/400/400/sports" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo e(Auth::guard('web_seller')->user()->name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i>En Linea</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header text-center">Modulos</li>

            
            <li class="active menu-open">
                <a href="<?php echo e(url('seller_home')); ?>">
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Escritorio</span>
                </a>
            </li>

            <?php if(Auth::guard('web_seller')->user()->estatus ==='Aprobado'): ?>

                
               
                
                <?php if($modulos==FALSE): ?>
                    <li class="treeview">
                    <a href="#">
                        <i class="fa fa-warning"></i>
                        <span>
                            Aun No Posee Modulos 
                                <br>
                            Asignados
                            
                        </span>
                    </a>
                </li>
                <?php else: ?>
                
                <?php $__currentLoopData = $modulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($mod->name === 'Musica'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-music"></i>
                                <span>Musica</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/albums')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Album
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/artist_form')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Grupo
                                            Musical o Solista
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/single_registration')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Singles
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Mi Musica
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>


                    
                    <?php if($mod->name =='Peliculas'): ?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-film"></i>
                                <span>Peliculas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/albums')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar peliculas
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/artist_form')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Actores
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/single_registration')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Mis Peliculas
                                        
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>

                    
                    <?php if($mod->name == 'Revistas'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-archive"></i>
                                <span>Revistas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/megazine_i')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Revista independiente
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/megazine_form')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Agregar Revistas a
                                            Cadenas de Publicacion
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/type')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar cadena de
                                            publicaciones
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/my_megazine',Auth::guard('web_seller')->user()->id)); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Mis Revistas
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>

                    
                    <?php if($mod->name == 'Series'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-video-camera"></i>
                                <span>Series</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/megazine_i')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar Revista
                                            independiente
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/megazine_form')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Agregar Revistas a
                                            Cadenas de Publicacion
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/type')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        
                                            Registrar cadena de
                                            publicaciones
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('/my_megazine',Auth::guard('web_seller')->user()->id)); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Mis Revistas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>


                    
                    <?php if($mod->name == 'Libros'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Libros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('tbook')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Registro de libros
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('tbook/create')); ?>">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar libro
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('authors_books')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Registro de autores
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('authors_books/create')); ?>">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar un autor
                                    </a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>

                    
                    <?php if($mod->name == 'Radios'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="material-icons " style="font-size: 18px">radio</i>
                                <span>Radio</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/radios')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Index
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('radios/create')); ?>">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar radio
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    
                    <?php if($mod->name == 'TV'): ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tv"></i>
                                <span>TV</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo e(url('/tvs')); ?>">
                                        <i class="fa fa-circle-o"></i>
                                        Index
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('tvs/create')); ?>">
                                        <i class="fa fa-circle-o text-aqua"></i>
                                        Registrar canal
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                 <?php endif; ?>




                

                


                
                




            
            <?php elseif(Auth::guard('web_seller')->user()->estatus ==='Pre-Aprobado'): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-warning"></i>
                        <span>
                            Su solicitud de cuenta como <br/>
                            productora se en proceso de <br/>
                            analisis por Parte de <br/>
                            nuestros analistas pronto nos<br/>
                            comunicaremos con utedesds
                        </span>
                    </a>
                </li>

            
            <?php else: ?>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-warning"></i>
                        <span>
                            Su solicitud de cuenta como<br/>
                            productora esta en proceso <br/>
                            por favor finalice el <br/>
                            registro para continuar
                        </span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </section>
    <!-- /.sidebar -->

