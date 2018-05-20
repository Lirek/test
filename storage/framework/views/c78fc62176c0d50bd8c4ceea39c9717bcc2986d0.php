<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">


            <!-- //market-->

            <div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-eye"> </i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Proveedores Seguidos</h4>
                            <h3>0</h3>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-users" ></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Contenido Adquirido</h4>
                            <h3>0</h3>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <div class="col-md-4 market-update-right">
                            <i class="fa fa-usd"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Balance de Tickets</h4>
                            <h3><?php echo e(Auth::user()->credito); ?></h3>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                
                <div class="clearfix"> </div>
            </div>
            <!-- //market-->
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="notifications">
                <!--notification start-->
                
                    <header class="panel-heading">
                        Notificaciones 
                    </header>
                    <div class="notify-w3ls">
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span>Usted No Ha Confirmado su Cuenta</span> Recuerde que debe Confirmar su Cuenta </li>
                                    
                                </ul>
                                <p>
                                    Confirmela ahora <a href="">Aqui</a>
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-danger">
                            <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span>Invite a mas personas a ser parte de leipel</span></li>                                    
                                </ul>
                                <p>
                                    Consulte los terminos de leipel acerca de los referidos <a href="">Aqui</a>
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-success ">
                            <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">Si Desea Saber Todo lo necesario para ser parte de nuestros Proveedores puede Informarse <a href="">Aqui</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <center>
             <div class="col-md-4 zoom"> 
                <a class="button" href="<?php echo e(url('MusicContent')); ?>"><img src="<?php echo e(asset('sistem_images/logo-icon-2.png')); ?>" width="200" height="150" alt=""></a></div>
             <div class="col-md-4 zoom"> 
                <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-4.png')); ?>" width="200" height="150" alt=""></a></div> 
             <div class="col-md-4 zoom" style="margin-bottom: 15px">   
                <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon.png')); ?>" width="200" height="150" alt=""></a></div>
              <div class="col-md-4 zoom">
                <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-5.png')); ?>" width="200" height="150" alt=""></a>
              </div>
              <div class="col-md-4 zoom">
                <a class="button" href="#"><img src="<?php echo e(asset('sistem_images/logo-icon-3.png')); ?>" width="200" height="150" alt=""></a>
              </div> 
             </center>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>