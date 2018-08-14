<?php $__env->startSection('main'); ?>     
       
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Contenido Por Aprobar</h2>
          </div>

          <div class="row mt">
              <!-- TWITTER PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-suitcase fa-4x"></i>
                  <p><?php echo e($content_total); ?></p>
                  <p class="user">Contenido Por Aprobar</p>
                </div>
              </div><!-- /col-md-4 -->
              
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="twitter-panel pn">
                  <i class="fa fa-user-tie fa-4x"></i>
                  <p><?php echo e($sellers); ?></p>
                  <p class="user">Proveedores por Validar</p>
                </div>
              </div><!-- /col-md-4 -->
            
              <div class="col-lg-4 col-md-4 col-sm-4 mb">                
                <div class="twitter-panel pn">
                  <i class="fas fa-archive fa-4x"></i>
                  <p><?php echo e($aplyss); ?></p>
                  <p class="user">Cuentas Proveedor Por Revisar</p>
                </div>
              </div><!-- /col-md-4 -->
          </div
          
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Paquetes de Tiquets</h2>
          </div>

          <div class="row mt">
             <div class="col-md-6">
              <div class="content-panel">
              
                  <table class="table table-bordered table-striped table-condensed">            
                    <thead>
                        <tr>
                          <th class="non-numeric">Nombre Del Paquete</th>
                          <th>Costo</th>
                          <th>Cantidad de Tiquets</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $TicketsPackage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($Package->name); ?></td>
                          <td><?php echo e($Package->cost); ?>$</td>
                          <td><?php echo e($Package->amount); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
             
               
                 <button type="button" class="btn btn-theme">+</button>
               
              </div>
         
          </div>
            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>