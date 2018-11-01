<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Modificar Estatus</h4>
        </div>
        <div class="modal-body text-center">
          <h5>Modifique el estatus de la solicitud</h5>
          <form method="POST" id="formStatus">
            <?php echo e(csrf_field()); ?>

            <div class="radio-inline">
              <label for="option-1">
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span>Pre-aprobar</span>
              </label>
            </div>

            <div class="radio-inline">
              <label for="option-2">
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                <span>Negar</span>
              </label>
            </div>

            <div style="display:none" id="if_no">
              <label for="razon">Explique la razón</label>
              <textarea name="message" class="form-control" type="text" id="razon"></textarea>
            </div>
            <br>

            <button class="btn btn-primary" type="submit">Enviar
            </button>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="AssingPromoter" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Asignar vendedor</h4>
        </div>
        <div class="modal-body">
          <h5 class="text-center">Asigne un vendedor a la solicitud</h5>
          <form method="POST" id="AssingPromoterForm" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label for="sel1" class="col-md-3 control-label">Vendedores:</label>
              <div class="col-md-9">
                <select class="form-control" id="sel1" name="promoter_n">
                  <?php $__currentLoopData = $salesmans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                    <option value="<?php echo e($salesman->id); ?>"><?php echo e($salesman->name); ?></option>  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-5">
                <button class="btn btn-primary" type="submit">
                  Enviar
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="negado" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Historial de negaciones</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <h5 class="text-center" id="totalNegaciones"></h5>
          </div>
          <div class="tab-content text-center">
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="historialRechazo">
                  <thead>
                    <tr>
                      <th class="non-numeric">Razón del rechazo</th>
                      <th class="non-numeric">Fecha del rechazo</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
