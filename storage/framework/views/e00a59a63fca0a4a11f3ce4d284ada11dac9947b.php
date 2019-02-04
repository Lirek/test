<?php $__env->startSection('css'); ?>
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
    
    </style>
    <style>
        /*.modal {
        max-height: 100%;
        }
        object {
     width:100%;
     max-height:100%;
}*/
        #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
           
        }
        
        .colorbadge{
            background-color:#428bca;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col s12 m12">
        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="card-panel curva">
            <h4 class="center">
                "<?php echo e($serie->title); ?>" (<?php echo e($serie->release_year); ?>)
            </h4>
            <br>
            <div class="row">
                <div class="col s12 m4">
                    <img src="<?php echo e(asset($serie->img_poster)); ?>" width="100%" height="300" style="border-radius: 10px" id="panel" class="materialboxed">
                    <br><br>
                    <!-- <a href="#modal-default" class="btn curvaBoton waves-effect waves-light green  modal-trigger" >Ver película</a> -->
                        <a href="<?php echo e(url('/series')); ?>" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                </div>
                <div class="col m6 s12">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">turned_in</i>
                                    <b class="left">Géneros: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span> <?php echo e($t->tags_name); ?> </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">switch_video</i>
                                    <b class="left">Transmisión: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e($serie->status_series); ?>

                                </div>
                            </div>
                        </li>
                       <?php if($serie->saga_id!=null): ?>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">folder</i>
                                    <b class="left">Saga: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e($serie->saga->sag_name); ?>

                                </div>
                            </div>
                        </li>
                        <?php else: ?>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">folder</i>
                                    <b class="left">Saga: </b>
                                </div>
                                <div class="col s12 m7">
                                    No pertenece a una saga
                                </div>
                            </div>
                        </li>
                        <?php endif; ?>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">local_play</i>
                                    <b class="left">Costo: </b>
                                </div>
                                <div class="col s12 m7">
                                    <?php echo e($serie->cost); ?> Tickets
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">movie</i>
                                    <b class="left">Historia: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="#modal1">Ver</a>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item" style="padding: 10px ">
                            <div class="row">
                                <div class="col s12 m5">
                                    <i class="material-icons circle left">subscriptions</i>
                                    <b class="left">Trailer: </b>
                                </div>
                                <div class="col s12 m7">
                                    <a class="waves-effect waves-light btn modal-trigger blue curvaBoton" href="<?php echo e($serie->trailer); ?>" target="_blank">Reproducir</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col m2 s12">
                    <div class="card blue accent-2">
                        <div class="card-content white-text center-align">
                            <p class="card-title">
                                <i class="material-icons">group add</i>
                                <?php echo e($serie->Transactions->count()); ?>

                            </p>
                            <p>
                                N° de compras
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col s12 m8 offset-m2">
                    <ul class="collection z-depth-1" >
                        <li class="collection-item avatar" style="height: auto; padding-top: 22px">
                            <i class="material-icons cyan circle">movie</i>
                            <h6 class="collection-header " style="font-size: 1.14rem; font-weight: 500; margin-left:0; line-height: 110%">Episodios</h6>
                        </li>
                        <?php if($episodes!=null): ?>
                             <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="collection-item">
                                    <div class="row">
                                        <div class="col s6">
                                           <a href="<?php echo e(route('series.showEpisode',[$episode->id,$serie->id])); ?>" class=""><?php echo e($episode->episode_name); ?></a>
                                        </div>
                                        <div class="col s6">
                                            <?php echo e($episode->sinopsis); ?>

                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div> -->
                <div class="col s12 m8 offset-m2">
                    <ul class="collapsible">
                      <li>
                        <div class="collapsible-header">
                          <i class="material-icons">movie</i>
                          Episodios:
                        </div>
                        <?php if($episodes!=null): ?>
                            <?php $__currentLoopData = $episodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col s6">
                                        <p><a href="<?php echo e(route('series.showEpisode',[$episode->id,$serie->id])); ?>" class=""><?php echo e($episode->episode_name); ?></a></p>
                                        </div>
                                        <div class="col s6">
                                            <?php echo e($episode->sinopsis); ?>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Sinopsis-->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h6><b>Historia:</b></h6>
      <p><?php echo e($serie->story); ?></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
  </div>
<!-- /.modal  de sagas  -->
<div id="modal-default" class="modal" >
    <div class="modal-content modal-lg">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">movie</i>"<?php echo e($serie->title); ?>"</h4>
            <br>
        </div>
        <br>
        <div class="">
            <div class="col m12 s12">
                    <br>
                    
                </div>
        </div>  
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>