<?php $__env->startSection('css'); ?>
    <style type="text/css">

    .card{
        height:380px;
    }
        .card .card-content {
         padding: 24px 8px 12px 8px;
        }
       .card .card-content .card-title {
           color: #000000;
           display: block;
           line-height: 14px;
           max-height: 14px;
           min-height: 12px;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
       }
       .card .card-title {
        line-height: 1.2;
           font-size: 16px;
       }

      #autor{
           color: #1e88e5 ;
           display: block;
           overflow: hidden;
           text-decoration: none;
           position: relative;
           white-space: nowrap;
           text-overflow: ellipsis;
           text-align: left;
           font-size: 14px
       }

    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row">
    <span class="grey-text"><h4 class="titelgeneral"><b><i class="material-icons small">audiotrack</i> Mi Música</b></h4></span>
    <br>

        <div class="row">
          
              
            <div id="">
                     <input type="hidden" name="id" id="id" value="<?php echo e($Albums->id); ?>">
                    <div class="col s12 m4 offset-m1">
                      <br>
                      <img src="<?php echo e(asset($Albums->cover)); ?>" width="100%" height="300"style="">
                      <audio id="player" class="player">
                        <source src="" type="audio/mp3" id="play"> 
                      </audio>
                      <a href="<?php echo e(url('MyMusic')); ?>" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                    </div>
                    <div class="col m6 s12">
                    <small>Canciones:</small>
                    <ul class="collection z-depth-1" id="Playlist">
                       
                    </ul>
                </div>
                
            </div>
     </div><!--End div row -->
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">

const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
$(document).ready(function(){
    $('.materialboxed').materialbox();
  });
</script>


<!--Album-->
<!-- LECTURA DE JSON Y REPRODUCTOR DE LISTAS PARA EL PLAYER -->
<script>
    $(document).ready(function(){
        var id = $('#id').val();
        console.log(id);
        $.ajax({ 
                
                url     : '../MySongsAlbums/'+id,
                type    : 'GET',
                dataType: 'json',
                
                success: function (data) 
                {

                    var audio=document.getElementById('player'); 
                    var pista=0;
                    
                     $.each(data, function(i,song) {
                        $('#Playlist').append('<li class="collection-item" id="'+i+'" style="padding: 10px "><a href="#">'+song.song_name+'</a></li>');
                        playSong(0);
                        audio.pause();
                        
                    });

                    $('#Playlist li').click(function(){
                        var selectedsong = $(this).attr('id');
                        if(selectedsong){
                        playSong(selectedsong);
                        }
                    }); 

                    function playSong(id){
                        var long=data;
                        if(id>=long.length){
                            audio.pause();
                        }
                        else{
                            
                        $('#player').attr('src','<?php echo e(asset('')); ?>'+data[id].song_file);
                        audio.play();
                        scheduleSong(id);
                        }
                    }
                 

                    function scheduleSong(id){
                        audio.onended= function(){
                            playSong(parseInt(id)+1);
                        }

                    }   
                             
                },
                error: function(data){
                console.log('aqui hay un error');
            }
                });

  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>