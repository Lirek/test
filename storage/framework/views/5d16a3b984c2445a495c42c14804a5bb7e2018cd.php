<?php $__env->startSection('main'); ?>

<div class="container">
	<div class="row">
	   
       <div class="col s4">
         <div class="card-panel teal">  
           <div class="center">
             <h3><spam class="white-text">Mi Codigo de Referido</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
             <h3><spam class="white-text"><?php echo e(Auth::user()->codigo_ref); ?></spam></h3>  
           </div>

        </div>
    </div>

    <div class="col s4">
         <div class="card-panel">  
           <div class="center">
             <h3><spam class="black-text">Invitar Por Correo</spam></h3>
           </div>
                
           <div class="divider"></div>
           
           <div class="center">
            <br>
                <a class="btn-floating btn-large waves-effect waves-light cyan"><i class="material-icons left">send</i>button</a>
           </div>

        </div>
    </div>

     <div class="col s4">
         <div class="card-panel teal">  
           <div class="center">
             <h3><spam class="white-text">Mi Enlace</spam></h3>
           </div>
                
           <div class="divider"></div>
             

           <div class="center">
                <p><span class="white-text"><?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?></span> </p>
           </div>

        </div>
    </div>                
                            
                            
    </div>                        
         
                            
    <div class="row">

        <div class="col s5">
            <div class="card-panel">  
           <div class="center">
             <h3><spam class="black-text">Mi Codigo QR</spam></h3>
           </div>
                
           <div class="divider"></div>
           <br>
           <div class="center">
                <?php echo QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref);; ?>

           </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>