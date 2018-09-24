<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row" style="">
        <div class="form-group">
            <div class="row-edit">
                <div class="col-md-12 col-sm-12 mb">
                    <div class="">
                        <div class="">
                            <div class="control-label">
                                <div class="white-header">
                                    <div class="col-sm-12 col-xs-12 col-md-12">
                                        <?php $__currentLoopData = $Rad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h3><span class="card-title"><center><b><i class=""></i> <?php echo e($radios->name_r); ?></b></center></span></h3>
                                            <div class="col-sm-12 col-xs-12 col-md-12">

                                               <center><img src="<?php echo e(asset($radios->logo)); ?>" class="img-responsive" width="17%" style="margin-top: 2%;"></center>

                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-12" style="margin-top: 1%;">
                                            <center>
                                                <a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($radios->facebook); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-facebook" ></i>
                                                </a>
                                                <a class="waves-effect waves-light btn blue" href="<?php echo e($radios->twitter); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a class="waves-effect waves-light btn red" href="<?php echo e($radios->google); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                                <a class="waves-effect waves-light btn pink" href="<?php echo e($radios->instagram); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-instagram"></i>
                                                </a>

                                            </center>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                            <div class="col-sm-12 col-xs-12 col-md-6" align="center">
                                                <audio  id="player" controls  autoplay >
                                                    <source src="<?php echo e(asset($radios->streaming)); ?>" type="audio/mp3" allow="autoplay">
                                                </audio>
                                            </div>
                                            <div class="col-md-3">
                                                
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-12 col-xs-12 col-md-12">
                                            <hr>
                                            <h3><span class="card-title"><i class="fa fa-angle-right"> Radios</i></span></h3>
                                            <div class="col-md-12  control-label">
                                                <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchListenRadio')); ?>"><?php echo e(csrf_field()); ?>

                                                    <input id="seach" name="seach" type="text" placeholder="Buscar" class="form-control" style="margin-bottom: 2%;">
                                                    <button class="btn btn-primary active" type="submit" name="buscar" id="buscar">Buscar Radio...</button>
                                                </form>
                                            </div>

                                            <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radioss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-3 col-md-3 col-sm-3 mb" style="margin-top: 3%">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                      <p><a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>">
                                                        <img src="<?php echo e(asset($radios->logo)); ?>" width="100%" >
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-left: -8%; margin-top: 8%">
                                                        <h5><?php echo e($radios->name_r); ?></h5>
                                                      </p></a>
                                                    </div>
                                                   <!--  <div class="content-panel pn-music">
                                                        <div id="profile-01" style="">
                                                            <img src="<?php echo e(asset($radioss->logo)); ?>" width="100%" >
                                                        </div>
                                                        <div class="profile-01 centered">
                                                            <p><a href="<?php echo e(url('ListenRadio/'.$radioss->id)); ?>" style="color: #ffff"><i class="fa fa-play-circle"> Escuchar</i></p></a>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div  class="col-sm-12 col-xs-12 col-md-12">
                                                <?php echo e($Radio->links()); ?>

                                            </div>
                                        </div>
                                    </div>
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
                source: "<?php echo e(url('SearchRadio')); ?>",
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