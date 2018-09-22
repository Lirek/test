<?php $__env->startSection('css'); ?>
<style type="text/css">
    .iframe-16-9 {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 35px;
    height: 0;
    overflow: hidden;
}
.iframe-16-9  iframe {
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row" style="">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
                            <?php $__currentLoopData = $Tv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <h2><span class="card-title"><center><i class="fa fa-tv"></i> <?php echo e($tv->name_r); ?></center></span></h2><br>
                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 1%">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <div class="col-sm-10 col-xs-12 col-md-10">
                                        <div class="plyr__video iframe-16-9" id="player">
                                            <iframe align="middle" src="<?php echo e(asset($tv->streaming)); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay" height="405" width="90%" scrolling="no"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 col-md-2">
                                        <center><img src="<?php echo e(asset($tv->logo)); ?>" class="img-responsive" width="90%" style="margin-top: 5%; margin-left: 15%"></center>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 col-md-2" style="margin-top: 6%">
                                        
                                    </div>
                                    <div class="col-sm-1 col-xs-12 col-md-1">
                                        <a class="waves-effect waves-light btn red" href="<?php echo e($tv->google); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%"> 
                                        <i class="fa fa-youtube"></i>
                                        </a>    
                                        <a class="waves-effect waves-light btn pink" href="<?php echo e($tv->instagram); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-1 col-xs-12 col-md-1">
                                        <a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($tv->facebook); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-facebook" ></i>
                                        </a>
                                        <a class="waves-effect waves-light btn blue" href="<?php echo e($tv->twitter); ?>" target="blank" style="margin-top: 40%; margin-left: 15%; font-size: 250%">
                                        <i class="fa fa-twitter"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
            				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%"> 
                                <h3><span class="card-title"><i class="fa fa-angle-right"> Televivision</i></span></h3>
                                <div class="col-md-12  control-label">
                                    <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchPlayTv')); ?>"><?php echo e(csrf_field()); ?>

                                        <input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                                        <button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Tv...</button>    
                                    </form>
                                </div>
                                        <?php $__currentLoopData = $Tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3 col-md-3 col-sm-3 mb" style="margin-top: 2%">
                                        <div class="content-panel pn-music">
                                            <div id="profile-01" style="">
                                                <img src="<?php echo e(asset($tv->logo)); ?>" width="100%" >
                                            </div>
                                            <div class="profile-01 centered">
                                                <p><a href="<?php echo e(url('PlayTv/'.$tv->id)); ?>" style="color: #ffff"><i class="fa fa-play-circle"> Ver</i></p></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div  class="col-sm-12 col-xs-12 col-md-12">
                                    <?php echo e($Tvs->links()); ?>

                                    </div>
                            </div>
            			</div>
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>

<script type="text/javascript">

$(document).ready(function(){
    $('#seach').keyup(function(evento){
        $('#buscar').attr('disabled',true);
    });
    $('#buscar').attr('disabled',true);
      $('#seach').autocomplete({
        source: "<?php echo e(url('SearchTv')); ?>",
        minLength: 2,
        select: function(event, ui){        
            $('#seach').val(ui.item.value);
            var valor = ui.item.value;
          console.log(valor);
            if (valor=='No se encuentra...'){
                $('#buscar').attr('disabled',true);
                swal('Radio no se encuentra regitrada','','error');
            }else{
                $('#buscar').attr('disabled',false);
            }
        }

   });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>