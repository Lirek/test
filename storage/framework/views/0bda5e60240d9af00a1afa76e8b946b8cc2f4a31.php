<?php $__env->startSection('css'); ?>

<style>
	
</style>

<!-- El cdn de datatable bloquea el sroll de la pagina -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/r-2.2.2/datatables.css"/> -->

<?php $__env->startSection('main'); ?>

 <div  class="col m5 s12 ">
      <div class="card">
          <div class="card-image"> 
              <img  src="<?php echo e(asset('promociones/PromocionGalapagosImg.jpg')); ?>"  >
          </div>
          <div class="card-action">
              <a  href="<?php echo e(asset('promociones/PromocionGalapagosInfo.pdf')); ?>" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Ver detalles</a>
              <a  href="<?php echo e(asset('#')); ?>" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
              <br>
          </div>
      </div>
  </div>

  <div  class="col m5 s12 ">
      <div class="card">
          <div class="card-image"> 
              <img  src="<?php echo e(asset('promociones/TarjetaMAXIBONO.jpg')); ?>" >
          </div>
          <div class="card-action">
              <a  href="<?php echo e(asset('promociones/PremiosLeipelTarjetaMaxibono.pdf')); ?>" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Ver detalles</a>
              <a  href="<?php echo e(asset('#')); ?>" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
              <br>
          </div>
      </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>