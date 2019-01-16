<?php $__env->startSection('css'); ?>
    <style type="text/css">

        .plyr {
            margin: 0 auto;
            border-radius: 6px;
        }
        .plyr--audio .plyr__controls {
            background: #ffffff;
            border-radius: inherit;
            color: #4f5b5f;
            padding: 10px;
        }
        .plyr--audio {
            max-width: 120px;
            min-width: 180px;
        }
        .plyr button {
            background: #9e9e9e ;
            font: inherit;
            line-height: inherit;
            width: auto;
            color: #fff;
        }
        button:focus {
            color: #fff;
            background: #2196f3;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
    <div class="row">
        <div class="input-field col s12 m3 offset-m4">
            <h4 class="titelgeneral"><i class="material-icons small">radio</i> Radios</h4>
        </div>


        <div class="row">
            <?php $__currentLoopData = $Rad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col s12 m3 l3  offset-m3 offset-l3 ">
                    <div class="card">
                        <div class="card-image" style="height: 235px; margin: 0px; padding: 0px;">
                            <img src="<?php echo e(asset($radios->logo)); ?>" height="235px">
                            <span class="card-title truncate"><b><?php echo e($radios->name_r); ?></b></span>
                        </div>
                    </div>
                </div>
                <div class="col s12 m3 l3">
                    <div class="card">

                        <div class="card-content" style="padding: 13px;" height="310px">
                            <div class="row">
                                <div class="col s12 ">
                                    <div  id="play_ico">
                                        <img class="img-play" src="<?php echo e(asset('plugins/materialize_adm/img/radio/ecualizador1.gif')); ?>" alt="Reproducto de radio leipel" >
                                    </div>
                                    <div id="off_ico" style="display: none;" >
                                        <img class=" img-play" src="<?php echo e(asset('plugins/materialize_adm/img/radio/ecualizadorfijo.png')); ?>" alt="Reproducto de radio leipel">
                                    </div>
                                    <?php $r=$radios->streaming ?>
                                    <div  class="wrapper">
                                        <audio id="player"></audio>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="input-field col s12 m4 offset-m4 ">
            <form method="POST"  id="SaveSong" action="<?php echo e(url('SearchListenRadio')); ?>">
                <?php echo e(csrf_field()); ?>

                <i class="material-icons prefix blue-text">search</i>
                <input type="text" id="seach" name="seach" class="validate">

                <button class="btn curvaBoton green" type="submit" name="buscar" id="buscar">Buscar...</button>
            </form>
        </div>
    </div>
    <div class="row">
        <?php $__currentLoopData = $Radio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $radios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col s4 m2 ">
                <div class="card">
                    <div class="card-image" style="height: 140px;">
                        <a href="<?php echo e(url('ListenRadio/'.$radios->id)); ?>" class="waves-effect"><img src="<?php echo e(asset($radios->logo)); ?>" height="145px"></a>

                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </div>
    <div class="fixed-action-btn click-to-toggle direction-top">
        <a class="btn-floating btn-large waves-effect waves-light green">
            <i class="large material-icons">share</i>
        </a>
        <ul>
            <li><a href="<?php echo e($radios->facebook); ?>" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a></li>
            <li><a  href="<?php echo e($radios->google); ?>"  class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a></li>
            <li><a href="<?php echo e($radios->twitter); ?>"class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a></li>
            <li><a href="<?php echo e($radios->instagram); ?>" class="btn-floating purple-gradient"><i class="mdi mdi-instagram"></i></a></li>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        const players = new Plyr('#player', {
            controls: [
                'mute',
                'current-time',
                'play',
                'volume',
            ]
        });

        players.source = {
            type: 'audio',
            sources: [
                {
                    src: '<?php echo e(asset($r)); ?>',
                    type: 'audio/mp3',
                },

            ],
        };

        $('#off_ico').hide();
        players.play(); //inicia radio al abrir pagina
        players.volume = 0.5; // Sets volume at 50%
        players.on('playing', event => {
            $('#off_ico').hide();
            $('#play_ico').show();
        });
        players.on('pause', event => {
            $('#play_ico').hide();
            $('#off_ico').show();
        });
    </script>

    <script src="https://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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