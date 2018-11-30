<?php $__env->startSection('css'); ?>
<style type="text/css">
   #panel {
            /*Para la Sombra*/
            -webkit-box-shadow: 8px 8px 15px #999;
            -moz-box-shadow: 8px 8px 15px #999;
            filter: shadow(color=#999999, direction=135, strength=8);
            /*Para la Sombra*/
            background-image: url("<?php echo e(asset('plugins/img/estatica.jpg')); ?>");
            background-position: center center;
            width: 100%;
            min-height: 350px;
            min-width: 100%;
            -webkit-background-size: 100%;
            -moz-background-size: 100%;
            -o-background-size: 100%;
            background-size: 100%;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
</style>
<style class="cp-pen-styles">
    @import  url("https://fonts.googleapis.com/css?family=Arimo:400,700");
    * {
      -webkit-transition: 300ms;
      transition: 300ms;
    }

    /*.btn-circle {*/
      /*width: 30px;*/
      /*height: 30px;*/
      /*text-align: center;*/
      /*padding: 6px 0;*/
      /*font-size: 12px;*/
      /*line-height: 1.428571429;*/
      /*border-radius: 15px;*/
    /*}*/
    /*.btn-circle.btn-lg {*/
      /*width: 50px;*/
      /*height: 50px;*/
      /*padding: 10px 16px;*/
      /*font-size: 18px;*/
      /*line-height: 1.33;*/
      /*border-radius: 25px;*/
    /*}*/
    /*.btn-circle.btn-xl {*/
      /*width: 70px;*/
      /*height: 70px;*/
      /*padding: 10px 16px;*/
      /*font-size: 24px;*/
      /*line-height: 1.33;*/
      /*border-radius: 35px;*/
    /*}*/


    ul {
      list-style-type: none;
    }

    h1, h2, h3, h4, h5, p {
      font-weight: 400;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    a:hover {
      color: #6ABCEA;
    }

    .movie-card {
      background: #ffffff;
      box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 315px;
      margin: 2em;
      border-radius: 10px;
      display: inline-block;
    }

    .movie-header {
      padding: 0;
      margin: 0;
      height: 100%;
      width: 100%;
      display: block;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .header-icon-container {
      position: relative;
    }

    .movie-card:hover {
      -webkit-transform: scale(1.03);
      transform: scale(1.03);
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.08);
    }

    .movie-content {
      padding: 18px 18px 24px 18px;
      margin: 0;
    }

    .movie-content-header, .movie-info {
      display: table;
      width: 100%;
    }

    .movie-title {
      font-size: 15px;
      margin: 0;
      display: table-cell;
      word-break: break-all;
    }

    .info-section label {
      display: block;
      color: rgba(0, 0, 0, 0.5);
      margin-bottom: .5em;
      font-size: 9px;
    }

    .info-section span {
      font-weight: 700;
      font-size: 11px;
    }

    @media  screen and (max-width: 500px) {
      .movie-card {
        width: 100%;
        max-width: 100%;
        margin: 1em;
        display: block;
      }
    }
    .colorbadge{
            background-color:#428bca;
        }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>  

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
            	<div class="control-label">
            		<div class="white-header">
            			<div class="col-sm-12 col-xs-12 col-md-12">
            				 	<h3><span class="card-title"><i class="fa fa-angle-right"><b>Autor: </b> <?php echo e($Author->full_name); ?></i></span></h3>
            				<div class="col-sm-6 col-xs-12 col-md-6" >
            					<div class="center-align">
									       <img src="<?php echo e(asset('images/authorbook')); ?>/<?php echo e($Author->photo); ?>" class="img-circle responsive-img" style="width:180px; height:180px; border-top:50%;">
                      </div>
                    </div>
                    <div id="panel" class="img-rounded img-responsive"></div>
                    <br>
									<div class="col-sm-12 col-xs-12 col-md-12" style="">
                    <center>
  										<a class="waves-effect waves-light btn blue darken-3" href="<?php echo e($Author->facebook); ?>" target="blank">
  										<i class="fa fa-facebook" style="font-size: 30px; color: #428bca"></i>
  										</a>
  										<a class="waves-effect waves-light btn red" href="<?php echo e($Author->google); ?>" target="blank"> 
  										<i class="fa fa-youtube" style="font-size: 30px; color: #428bca"></i>
  										</a>	
  										<a class="waves-effect waves-light btn pink" href="<?php echo e($Author->instagram); ?>" target="blank">
  										<i class="fa fa-instagram" style="font-size: 30px; color: #428bca"></i>
  										</a>
  										<!-- <a class="waves-effect waves-light btn blue" href="<?php echo e($Author->twitter); ?>" target="blank">
  										<i class="fa fa-twitter"></i> -->
  										</a>
                    </center>
							     </div>
				  				<div class="col-sm-12 col-xs-12 col-md-12" id="principal">
				  				  <hr>
				  				  <h3><span class="card-title"><i class="fa fa-angle-right" style="margin-top: 2%"> Libros publicados</i></span></h3>
				  					 
                   		<?php if($Books != NULL): ?>
                      <!-- PROFILE 01 PANEL -->
                      
                      <?php $__currentLoopData = $Books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <div class="col-lg-3   col-md-3  col-sm-3   mb" style="margin-top: 2%">
                          <div class="movie-card">
                              <div id="movie-header" style="">
                                <a href="#" data-toggle="modal" data-target="#myModal-<?php echo e($Book->id); ?>" style="color: #ffff">
                                <?php if($Book->cover): ?>
                                    <img src="<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($Book->cover); ?>" width="100%" height="220" style="">
                                <?php else: ?>
                                    <img src="#" width="100%" height="220" style="">
                                <?php endif; ?>
                                </a>
                              </div>
                              <!-- <div class="profile-01 centered">
                                  <p><a href="#" data-toggle="modal" data-target="#myModal-<?php echo e($Book->id); ?>" style="color: #ffff">Ver mas</p></a>
                              </div> -->
                              <div class="movie-content">
                                  <center><h3><?php echo e($Book->title); ?></h3></center>
                                  <h6> <b>Géneros:</b>
                                        <?php $__currentLoopData = $Book->tags_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-light colorbadge"> <?php echo e($t->tags_name); ?> </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </h6>
                                  <h6><b>Autor:</b> <?php echo e($Book->author->full_name); ?></h6>
                                  <h6><b>Lanzamiento:</b> <?php echo e($Book->release_year); ?></h6>
                                  <h6><b>Costo:</b> <?php echo e($Book->cost); ?> tickets</h6>
                                 <center> <a href="#" class=""  id="modal-confir.<?php echo e($Book->id); ?>" onclick="fnOpenNormalDialog('<?php echo $Book->cost; ?>','<?php echo $Book->title; ?>','<?php echo $Book->id; ?>')">Adquirir</a></p></center>
                                <!-- <p class="sinopsis"><b>Sinopsis:</b><?php echo e($Book->sinopsis); ?></p> -->
                              </div>
                          </div><!--/content-panel -->
                      </div><!--/col-md-4 -->
                      <!--MODAL-->
                 <div id="myModal-<?php echo e($Book->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo e($Book->title); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                          <div id="panel" class="img-rounded img-responsive av text-center col-lg-12 col-md-12 col-sm-12 mb" style="-webkit-box-shadow: 8px 8px 15px #999;
                              -moz-box-shadow: 8px 8px 15px #999;
                              filter: shadow(color=#999999, direction=135, strength=8);
                              /*Para la Sombra*/
                              background-image: url(<?php echo e(asset('images/bookcover/')); ?>/<?php echo e($Book->cover); ?>);
                              margin-top: 5%;
                              background-position: center center;
                              width: 100%;
                              min-height: 150px;
                              -webkit-background-size: 100%;
                              -moz-background-size: 100%;
                              -o-background-size: 100%;
                              background-size: 100%;
                              -webkit-background-size: cover;
                              -moz-background-size: cover;
                              -o-background-size: cover;
                              background-size: cover;">
                              <button type="button" class="btn btn-primary" data-dismiss="modal"   id="modal-confir" style="margin-left: 87%" onclick="fnOpenNormalDialog('<?php echo $Book->cost; ?>','<?php echo $Book->title; ?>','<?php echo $Book->id; ?>')">Adquirir</button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mb">
                                  <p class="sinopsis"><h5><b>Sinopsis:</b></h5>
                                  <?php echo e($Book->sinopsis); ?></p>
                                
                                  
                                </div>

                                <div class="box-footer no-padding">
                                  <div class="col-md-8 col-sm-8 col-lg-12">
                                  <h5><b>Costo:</b> <?php echo e($Book->cost); ?></h5>
                                    <h5><b>Titulo original:</b> <?php echo e($Book->original_title); ?> </h5>
                                     <h6> <b>Géneros:</b>
                                        <?php $__currentLoopData = $Book->tags_book; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-light colorbadge"> <?php echo e($t->tags_name); ?> </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </h6>
                                    <h5><b> Categoría:</b> <?php echo e($Book->rating->r_name); ?> </h5>
                                    <?php if($Book->sagas!=null): ?>
                                              <h5><b>Saga:</b> <?php echo e($Book->sagas->sag_name); ?></h5>
                                          <?php else: ?>
                                              <h5><b>Saga:</b> No tiene Saga</span></h5>
                                          <?php endif; ?>
                                            <div class="widget-user-image">
                                            <img class="img-rounded img-responsive av"src="<?php echo e(asset('images/authorbook')); ?>/<?php echo e($Book->author->photo); ?>" style="width:70px;height:70px;" alt="User Avatar">
                                      </div>
                                      <!-- /.widget-user-image -->
                                      <h5 class="widget-user-username"><b>Autor:</b> <?php echo e($Book->author->full_name); ?></h5>
                                    <hr>
                                </div>
                                  </div>
                                <div class="">
                                              <div class="modal-footer">
                                              
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!--Fin modal-->
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <div  class="col-sm-12 col-xs-12 col-md-12">
                        <!--En caso de paginate aqui-->
                      </div>
                      <?php else: ?>
                          <h1>No Posee Libros</h1>
                      <?php endif; ?>		
									   </div>
				  				</div>  	
            		</div>
            	 </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-confirmation"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
function fnOpenNormalDialog(cost,name,id) {
  
   swal({
            title: "Estas seguro?",
            text: '¿Desea comprar '+name+' con un valor de '+cost+' tickets?', 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            callback(true,id);
           
          } else {
            callback(false,id);
          }
        });
    };

function callback(value,id) {
    if (value) {
      swal({
                title: 'Procesando..!',
                text: 'Por favor espere..',
                buttons: false,
                closeOnEsc: false,
                onOpen: () => {
                    swal.showLoading()
                }
            })
         $.ajax({
            
            url:"<?php echo e(URL('BuyBook')); ?>"+'/'+id,        
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                       console.log(result);
                    }
                    else if (result==1) 
                    {
                      swal('El libro ya forma parte de su colección','','error');
                    }
                    else
                    { 
                    var idUser=<?php echo Auth::user()->id; ?>;
                    $.ajax({ 
                      
                      url:"<?php echo e(URL('MyTickets')); ?>"+'/'+idUser,
                      type    : 'GET',
                      dataType: "json",
                      success: function (respuesta){
                      console.log(respuesta);
                        $('#Tickets').html(respuesta);
                  
                      },
                    });
                      swal('Libro comprado con exito','','success');
                       console.log(result);
                    }  
                },
              error: function (result) 
                {
                      
                }

            });
    } else {
        return false;
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>