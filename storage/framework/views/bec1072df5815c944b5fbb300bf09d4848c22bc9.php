<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
 <style>
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    .card{
        height:430px;
    }
    
</style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <h4 class="titelgeneral"><i class="material-icons small">music_note</i> Contenido musical</h4>
            <?php if($albums->count() != 0 ): ?>
            <div class="card-panel curva">
                <div class="row ">
                    <h4 class="titelgeneral"><i class="mdi mdi-minidisc"></i> Mis álbumes</h4>
                    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m3">
                        <div class="card">
                            <div class="card-image">
                                <a href="<?php echo e(url('/show_album/'.$b->id)); ?>">
                              <img src="<?php echo e(asset($b->cover)); ?>" width="100%" height="300px">
                              </a>
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(url('/modify_album/'.$b->id)); ?>"><i class="material-icons">create</i></a>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class=""><?php echo e($b->name_alb); ?></p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Estatus:</b> <?php echo e($b->status); ?></small>
                                </div>  
                                    <small><b>Artista:</b> <?php echo e($b->autors->name); ?></small>                          
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12">
                    <?php echo $albums->render(); ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($singles->count() != 0 ): ?>
            <div class="card-panel curva">
                <div class="row ">
                    <h4 class="titelgeneral"><i class="mdi mdi-library-music"></i> Mis canciones</h4>
                    <?php $__currentLoopData = $singles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $song): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col s12 m3">
                        <div class="card" style="height: 450px">
                            <div class="card-image">
                                
                              <img src="<?php echo e(asset('plugins/img/DefaultMusic.png')); ?>" width="100%" height="300px">
                            
                              <!-- <span class="card-title">Card Title</span> -->
                                <a class="btn-floating halfway-fab waves-effect waves-light blue" href="<?php echo e(url('/modify_single/'.$song->id)); ?>"><i class="material-icons">create</i></a>
                            </div>
                            <div class="card-content">
                                <div class="col m12">
                                    <p class=""><?php echo e($song->song_name); ?></p>
                                </div>
                                <div class="col m12 ">
                                    <small><b>Estatus:</b> <?php echo e($song->status); ?></small>
                                </div>  
                                    <small><b>Artista:</b> <?php echo e($song->autors->name); ?></small>
                                <div class="">
                                    <audio id="player" class="player<?php echo e($x); ?>">
                                        <source src="<?php echo e(asset($song->song_file)); ?>" type="audio/mp3" id="play"> 
                                    </audio>
                                </div>                          
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
             <?php if(($albums->count() == 0) && ($singles->count() == 0)): ?>
            <div class="col m12">
                <blockquote >
                    <i class="material-icons fixed-width large grey-text">music_note</i><br><h5>No Posee Contenido musical</h5>
                </blockquote>
                <br>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
<script>
//---------------------------------------------------------------------------------------------------
// Llamado de la funcion 'ShowMusicOfMyPanel' en MusicController y carga de las canciones al reproductor
  $(document).ready(function(){
    $.ajax({
      url     : "<?php echo e(url('/music_of_my_music_panel/'.Auth::guard('web_seller')->user()->id)); ?>",
      type    : "GET",
      dataType: "json",
      success: function (data) {

        var audio=document.getElementById('player');

        $.each(data, function(i,song) {
          var ruta = "<?php echo e(asset('/')); ?>"+data[i].song_file;
          var campo = ".player"+[i];
          $(campo).attr('src',ruta);
        });

        $('#Playlist li').click(function(){
          var selectedsong = $(this).attr('id');
          playSong(selectedsong);
        }); 

        function playSong(id){
          var long=data;
          if(id>=long.length){
            audio.pause();
          } else {
            $('#player').attr('src',data[id].song_file);
            audio.play();
            scheduleSong(id);
          }
        }

        function scheduleSong(id){
          audio.onended= function(){
            playSong(parseInt(id)+1);
          }
        }

      }

    });

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>