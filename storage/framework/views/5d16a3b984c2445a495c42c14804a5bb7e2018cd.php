<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row">
	
		<div class="market-updates">
                <div class="col-lg-4">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <i class="far fa-eye fa-3x"> </i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Mi Codigo de Referido</h4>
                            <h3><?php echo e(Auth::user()->codigo_ref); ?></h3>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
	       </div>

		<div class="market-updates">
                <div class="col-lg-4">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <i class="far fa-envelope fa-3x"> </i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Invitar Por Correo</h4>
                            <h3>
                            	<a href="#myModal-1" data-toggle="modal" class="btn btn-success">
                              		<i class="fa fa-envelope"> </i>      
                                </a>
							</h3>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
				</div>				
			</div>

         <div class="market-updates">
                <div class="col-lg-4">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <i class="far fa-eye fa-3x"> </i>
                        </div>
                        <div class="col-lg-8 market-update-left">
                            <h4>Mi Enlace </h4>
                            <p><?php echo e(url('/').'/register/'.Auth::user()->codigo_ref); ?></p>
                            
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
    </div>
    


    
  
	
    <br>
    <br>
	<div class="row">
    
    <div class="col-md-4">
	   <?php echo QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref);; ?>

    </div>

    </div>


</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title">Invitar</h4>
                                    </div>
                                    <div class="modal-body">

                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Mensaje</label>
                                                <div class="col-lg-10">
                                                    
                                                	<textarea class="form-control" id="inputPassword4"> 
                                                		
                                                	</textarea>
                                                    
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-default"><i class="fa fa-mail-forward"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>