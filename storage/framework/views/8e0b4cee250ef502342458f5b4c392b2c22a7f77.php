<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content white-text">
                        <?php $__currentLoopData = $Rad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h2><span class="card-title"><center><h3 style="color: #428bca"> <?php echo e($radios->name_r); ?></h3></center></span></h2>
                                            <div class="col s12 m12">

                                               <center><img src="<?php echo e(asset($radios->logo)); ?>" class="img-responsive" width="17%" style="margin-top: 2%;"></center>

                                            </div>
                                            <div class="col s12 m12" style="margin-top: 1%;">
                                            <center>
                                                <a class=" waves-effect waves-light btn-floating blue" href="<?php echo e($radios->facebook); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-facebook" ></i>
                                                </a>
                                                <a class="waves-effect waves-light btn-floating social twitter blue" href="<?php echo e($radios->twitter); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-twitter"></i>
                                                </a>

                                                <a class="waves-effect waves-light btn-floating social youtube red" href="<?php echo e($radios->google); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                                <a class="waves-effect waves-light btn-floating social instagram pink" href="<?php echo e($radios->instagram); ?>" target="blank" style="margin-top: 2%;  font-size: 250%; margin-left: 5%">
                                                    <i class="fa fa-instagram" style="padding: 0px, 15px"></i>
                                                </a>

                                            </center>
                                            <br>
                                            </div>
                                            <div class="col m3">

                                            </div>
                                            <div class="col s12 m6" align="center">
                                                <audio  id="player" controls  data-plyr-config='{"autoplay": true}'>
                                                    <source src="<?php echo e(asset($radios->streaming)); ?>" type="audio/mp3" >
                                                </audio>
                                            </div>
                                            <div class="col m3">

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="row">
                            <div class="input-field col s12 m6 offset-m3">
                                <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchListenRadio')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <i class="material-icons prefix blue-text">search</i>
                                    <input type="text" id="seach" name="seach" class="validate">
                                    <label for="seach">Buscar otra radio</label><br>
                                    
                                </form>
                            </div>
                        </div>



                        <div class="row">
                                <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col s12 m3">
                                    <div class="card">
                                        <div class="card-image" style="height: 200px;">
                                            <a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>"><img src="<?php echo e(asset($radios->logo)); ?>" height="200px"></a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>"><i class="material-icons">radio</i></a>

                                        </div>
                                        <div class="card-action ">
                                            <b class="grey-text"><?php echo e($radios->name_r); ?></b>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


    <script type="text/javascript">

        $(document).ready(function(){
            $('#seach').keyup(function(evento){
                $('#buscar').attr('disabled',true);
            });
            $('#buscar').attr('disabled',true);
            $('#seach').autocomplete({
                source: "SearchRadio",
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