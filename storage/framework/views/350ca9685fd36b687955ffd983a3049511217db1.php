<?php $__env->startSection('css'); ?>
<style type="text/css">
.player {
    position: relative;
    padding-bottom: 56.25%;
    padding-top: 35px;
    height: 250px;
    width: 190%;
    margin-left: -79px; 
    overflow: hidden;
}
.player  iframe {
    position: absolute;
    margin: 0;
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
                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 1%">
                                <div class="col-sm-12 col-xs-12 col-md-12">
                                    <div class="col-sm-10 col-xs-12 col-md-8">
                                        <h2><span class="card-title" style="color: #428bca"><center><i class="fa fa-tv"></i> <?php echo e($tv->name_r); ?></center></span></h2><br>
                                        <div class="plyr__video" id="player">
                                            <iframe align="middle" src="<?php echo e(asset($tv->streaming)); ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay" height="405" width="100%" scrolling="no" border="0" style="border:0px;"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 col-xs-12 col-md-4">
                                        <center><img src="<?php echo e(asset($tv->logo)); ?>" class="img-responsive" width="50%" style="margin-top: 25%; margin-left: 15%"></center>
                                    </div>
                                    
                                    <div class="col-sm-1 col-xs-12 col-md-4">
                                        
                                        <div class="col-md-4 col-xs-4" style="margin-left: 25%; margin-top: 10%" id="rrss"> 
                                        
                                            <a class="waves-effect waves-light btn red" href="<?php echo e($tv->google); ?>" target="blank" style="margin-top: 10%; margin-left: 5%; font-size: 250%"> 
                                            <i class="fa fa-youtube"></i>
                                            </a> 
                                            <a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($tv->facebook); ?>" target="blank" style="margin-top: 20%; margin-left: 5%; font-size: 250%">
                                            <i class="fa fa-facebook" ></i>
                                            </a>   
                                            

                                        </div>
                                        <div class="col-md-4 col-xs-4" style="margin-top: 10%">

                                            <a class="waves-effect waves-light btn pink" href="<?php echo e($tv->instagram); ?>" target="blank" style="margin-top: 10%; margin-left: 7%; font-size: 250%">
                                            <i class="fa fa-instagram"></i>
                                            </a> 
                                            <a class="waves-effect waves-light btn blue" href="<?php echo e($tv->twitter); ?>" target="blank" style="margin-top: 20%; margin-left: 7%; font-size: 250%">
                                            <i class="fa fa-twitter"></i></a>
                                           
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
            				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 2%"> 
                                <h3><span class="card-title"><i class="fa fa-angle-right"> Television</i></span></h3>
                                <div class="col-md-12  control-label">
                                    <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchPlayTv')); ?>"><?php echo e(csrf_field()); ?>

                                        <input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                                        <button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Tv...</button>    
                                    </form>
                                </div>
                                        <?php $__currentLoopData = $Tvs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb" style="margin-top: 2%">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                          <p><a href="<?php echo e(url('PlayTv/'.$tv->id)); ?>">
                                              <img src="<?php echo e(asset($tv->logo)); ?>" width="150%" height="90">
                                          </p></a>
                                        </div>
                                      </div>
                                    <!-- div class="col-lg-3 col-md-3 col-sm-3 mb" style="margin-top: 2%">
                                        <div class="content-panel pn-music">
                                            <div id="profile-01" style="">
                                                <img src="<?php echo e(asset($tv->logo)); ?>" width="100%" >
                                            </div>
                                            <div class="profile-01 centered">
                                                <p><a href="<?php echo e(url('PlayTv/'.$tv->id)); ?>" style="color: #ffff"><i class="fa fa-play-circle"> Ver</i></p></a>
                                            </div>
                                        </div>
                                    </div> -->
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
                swal('Tv no se encuentra regitrada','','error');
            }else{
                $('#buscar').attr('disabled',false);
            }
        }

   });
  });
</script>
<script type="text/javascript">
    $(document).ready(function(evento){ 
        var wSize = $(window).width();
            if (wSize <= 768) {
                $('#player').addClass('player');
                $('#rrss').css('margin-left','10%%')
            }
    })
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>