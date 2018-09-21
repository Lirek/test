<?php $__env->startSection('css'); ?>
<style>
    .gly-spin {
        -webkit-animation: spin 0.8s infinite linear;
        -moz-animation: spin 0.8s infinite linear;
        -o-animation: spin 0.8s infinite linear;
        animation: spin 0.8s infinite linear;
    }
    .btn-swal-center {
        /*
        width: 5em;
        background-color: red;
        display: flex;
        justify-content: center;
        position:absolute;
        width:100%; left:0;
        text-align:center;
        margin-left: auto;
        margin-right: auto;
        display: block;
        */
        margin-right: 13em;
        /*margin-left: 30em;*/
    }
    @media  only screen and (max-width: 425px) {
        .btn-swal-center {
            margin-right: 10.5em;
        }
    }
    @media  only screen and (max-width: 375px) {
        .btn-swal-center {
            margin-right: 9em;
        }
    }
    @media  only screen and (max-width: 320px) {
        .btn-swal-center {
            margin-right: 7em;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <input type="hidden" name="id" id="id" value="<?php echo e(Auth::user()->created_at); ?>">
              
                
                  
                    <div class="row mtbox" id="principal" style="margin-top: -8px">
                      
                    <!-- <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1" style="margin-left: 5%">
                          <span class="li_video"></span>
                          <h3><?php echo e($TransactionsMovies); ?></h3>
                        </div>
                        
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_music"></span>
                          <h3><?php echo e($TransactionsMusic); ?></h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_vallet"></span>
                          <h3><?php echo e($TransacctionsLecture); ?></h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_sound"></span>
                          <h3><?php echo e($TransactionsRadio); ?></h3>
                        </div>
                       
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_tv"></span>
                          <h3><?php echo e($TransactionsTv); ?></h3>
                        </div>
                        
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <h3>Total</h3>
                          <br>
                          <h3><?php echo e($TransactionsMovies + $TransactionsMusic + $TransacctionsLecture + $TransactionsRadio + $TransactionsTv); ?></h3>
                        </div>
                      
                      </div>
                    </div> -->
                    </div>  
                    
                    <div class="row mt">
                    <?php if(Auth::user()->alias==FALSE): ?>
                        
                    
                      <!-- COMPLETAR PERFIL PANELS -->
                        <div class="col-md-11 col-sm-11 mb" style="margin-left: 2%">
                          <div class="white-panel panRf pe donut-chart">
                            <div class="white-header">
                               <h5>Complete Su Registro</h5>
                            </div>
                            <div class="row">
                               <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                                  <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                                  <div class="paragraph">
                                    <p class="center ">Le recordamos que aun faltan documentos que adjuntar para disfrutar de todo lo que puede ofrecer nuestra plataforma, le invitamos completar su perfil</p>
                                      <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModal">Completar Registro</a></p>

                                      <!--MODAL-->
                                      <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                         <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Complete sus datos</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form class="form-horizontal" method="POST" action="<?php echo e(url('CompleteProfile')); ?>" enctype="multipart/form-data"><?php echo e(csrf_field()); ?>


                                                  <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                                                      <label for="lastname" class="col-md-4 control-label">Apellido</label>
                                                      <div id="apellidoMen"></div>
                                                      <div class="col-md-6">
                                                          <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required="required" onkeypress="return controltagLet(event)">
                                                      </div>
                                                  </div>

                                                  <div class="form-group<?php echo e($errors->has('nDocument') ? ' has-error' : ''); ?>">
                                                      <label for="nDocument" class="col-md-4 control-label">N° Documento</label>
                                                      <div id="documentoMen"></div>
                                                      <div class="col-md-6">
                                                          <input id="nDocument" type="text" class="form-control" name="nDocument" value="<?php echo e(old('nDocument')); ?>" required="required" onkeypress="return controltagNum(event)">
                                                      </div>
                                                  </div>

                                                  <div class="form-group<?php echo e($errors->has('img_doc') ? ' has-error' : ''); ?>">
                                                      <label class="col-md-4 control-label">Imagen del documento</label>
                                                      <div class="col-md-6">
                                                          <input id="img_doc" type="file" accept=".jpg"class="form-control" name="img_doc" value="" required="required"/>
                                                      </div>
                                                  </div>


                                                  <div class="form-group<?php echo e($errors->has('dateN') ? ' has-error' : ''); ?>">
                                                      <label for="dateN" class="col-md-4 control-label">Fecha de nacimiento</label>
                                                      <div id="dateMen"></div>
                                                      <div class="col-md-6">
                                                          <input id="dateN" type="date" max="<?php echo e(@date('Y-m-d')); ?>" class="form-control" name="dateN" value="<?php echo e(old('dateN')); ?>" required="required">
                                                      </div>
                                                  </div>

                                                  <div class="form-group<?php echo e($errors->has('img_perf') ? ' has-error' : ''); ?>">
                                                      <label for="img_perf" class="col-md-4 control-label">Imagen de Perfil</label>
                                                      <div class="col-md-6">
                                                          <input id="img_perf" type="file" accept=".jpg"class="form-control" name="img_perf" value="<?php echo e(old('img_perf')); ?>">
                                                      </div>
                                                  </div>

                                                  <div class="form-group<?php echo e($errors->has('alias') ? ' has-error' : ''); ?>">
                                                      <label for="alias" class="col-md-4 control-label">Alias</label>
                                                      <div id="aliasMen"></div>
                                                      <div class="col-md-6">
                                                          <input id="alias" type="text" class="form-control" name="alias" value="<?php echo e(old('alias')); ?>"required="required">
                                                      </div>
                                                  </div>

                                                  <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary" id="registro">Registrar datos</button>
                                                    </div>
                                                  </div>
                                                  </form>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      </div>
                                      <!--FIN DEL MODAL-->

                                  </div><!--paragraph-->
                               </div><!--golleft-->

                            </div><!--row-->
                          </div><!--/grey-panel -->
                        </div><!-- /col-md-12-->

                    <?php endif; ?>

                                        <!--REFERIR-->
                    <?php if(Auth::user()->UserRefered()->count()==0): ?> 
                    <div class="col-md-11 col-sm-11 mb" id="referir" style="margin-left: 2%">
                      <div class="white-panel panRf refe donut-chart">
                        <div class="white-header">
                            <h5>Agregar codigo de patrocinador</h5>
                        </div>
                          <div class="row">
                            <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                              <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                              <div class="paragraph">
                                <p class="center " id="mensaje"></p>
                                 <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModalRefe">Agregar</a></p>

                                <!--MODAL-->
                                  <div id="myModalRefe" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ingrese el codigo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="<?php echo e(url('Referals')); ?>" enctype="multipart/form-data" id="patrocinador"><?php echo e(csrf_field()); ?>


                                              <div class="form-group<?php echo e($errors->has('codigo') ? ' has-error' : ''); ?>">
                                                      <label for="codigo" class="col-md-4 control-label">Codigo</label>
                                                      <div class="col-md-6">
                                                          <input id="codigo" type="text" class="form-control" name="codigo" value="<?php echo e(old('codigo')); ?>" required="required">
                                                          <div id="codigoMen"></div>
                                                      </div>

                                              </div>
                                               <div class="form-group">
                                                  <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary" id='ingresar'>Ingresar</button>
                                                  </div>
                                                </div>
                                            </form>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                   <!--FIN DEL MODAL-->

                              </div> 
                           </div>
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>


                      <div class="col-md-11 col-sm-11 mb" style="margin-left: 2% ">
                        <!-- <div class="white-panel pe donut-chart" style=" background: #23b5e6 ">  BARRA AZUL-->
                          <div class=""> 
                          <div class="white">
                              <h3><span class="card-title">
                                    <u>
                                      <em>Contenido Reciente</em>
                                    </u>
                                  </span>
                              </h3>      
                          </div>
                        </div>
                      </div>
                  <!--CONTENIDO RECIENTE-->
                      <div class="col-md-11 col-sm-11 mb" style="margin-left: 2%">
                        <div class="white-panel panRf pe donut-chart">
                          <!-- <div class="white-header">
                            <h3><span class="card-title"></span></h3>                          
                          </div> -->
                          <div class="col-sm-12 col-xs-12 col-md-12 goleft">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                  <th></th>
                                  <th><i class="fa fa-bullhorn" style="color: #23B5E6"></i>Nombre</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"  style="color: #23B5E6"></i>Tipo</th>
                                  <th><i class="fa fa-money" style="color: #23B5E6"></i>Costo</th>
                                  <th class="hidden-phone"><i class=" fa fa-edit"  style="color: #23B5E6"></i>Proveedor</th>
                                </tr>
                              </thead>
                              <tbody>

                              <?php if($Songs): ?>
                                <tr class="letters">
                                  <td><span class="bg-r"><i class="li_music" style="color: #23B5E6"></i></span></td>
                                  <td><a href="#" onclick="fnOpenNormalDialog('<?php echo $Songs->cost; ?>','<?php echo $Songs->title; ?>','<?php echo $Songs->id; ?>')" id="modal-confir"> <?php echo e($Songs->song_name); ?></a></td>
                                  <td class="hidden-phone">Single</td>
                                  <td><?php echo e($Songs->cost); ?></td>
                                  <td class="hidden-phone"><?php echo e($Songs->Seller->name); ?></td>
                                </tr>
                              <?php endif; ?>

                              <?php if($Albums): ?>
                                <tr class="letters">
                                  <td><span class="bg-r"><i class="li_vynil" style="color: #23B5E6"></i></span></td>
                                  <td><a href="#" onclick="fnOpenNormalDialog2('<?php echo $Albums->cost; ?>','<?php echo $Albums->name_alb; ?>','<?php echo $Albums->id; ?>')" id="modal-confirAlbum"> <?php echo e($Albums->name_alb); ?></a></td>
                                  <td class="hidden-phone">Album Musical</td>
                                  <td><?php echo e($Albums->cost); ?></td>
                                  <td class="hidden-phone"><?php echo e($Albums->Seller->name); ?></td>
                                </tr>
                              <?php endif; ?>

                              <?php if($Tv): ?>
                                <tr class="letters">
                                  <td><span class="bg-r"><i class="li_tv" style="color: #23B5E6"></i></span></td>
                                  <td><a href="<?php echo e(url('PlayTv/'.$Tv->id)); ?>"> <?php echo e($Tv->name_r); ?></a></td>
                                  <td class="hidden-phone">TV Online</td>
                                  <td>Gratis</td>
                                </tr>
                             <?php endif; ?>

                            <?php if($Book): ?>
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-book" style="color: #23B5E6"></i></span></td>
                                <td><a href="#"  onclick="fnOpenNormalDialog3('<?php echo $Book->cost; ?>','<?php echo $Book->title; ?>','<?php echo $Book->id; ?>')"> <?php echo e($Book->title); ?></a></td>
                                <td class="hidden-phone">Libro</td>
                                <td><?php echo e($Book->cost); ?></td>
                                <td class="hidden-phone"><?php echo e($Book->seller->name); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if($Megazines): ?>
                              <tr class="letters">
                                <td><span class="bg-r"><i class="li_news" style="color: #23B5E6"></i></span></td>
                                <td><a href=""> <?php echo e($Megazines->title); ?></a></td>
                                <td class="hidden-phone">Revista</td>
                                <td><?php echo e($Megazines->cost); ?></td>
                                <td class="hidden-phone"><?php echo e($Megazines->Seller->name); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if($Radio): ?>
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-microphone" style="color: #23B5E6"></i></span></td>
                                <td><a href="<?php echo e(url('ListenRadio/'.$Radio->id)); ?>"> <?php echo e($Radio->name_r); ?></a></td>
                                <td class="hidden-phone">Radio Online</td>
                                <td>Gratis</td>
                                <td class="hidden-phone"><?php echo e($Radio->name); ?></td>
                              </tr>
                            <?php endif; ?>

                            <?php if($Movies): ?>
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-video-camera" style="color: #23B5E6"></i></span></td>
                                <td><a href="<?php echo e(url('ShowMovies/'.$Movies->id)); ?>"> <?php echo e($Movies->title); ?></a></td>
                                <td class="hidden-phone">Pelicula</td>
                                <td><?php echo e($Movies->cost); ?></td>
                                <td class="hidden-phone"><?php echo e($Movies->Seller->name); ?></td>
                              </tr>
                          <?php endif; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                
                      <!--COMPRAR TICKETS-->
                        <!-- <div class="col-md-5 col-sm-5 mb" style="margin-left: 2%">
                          <div class="white-panel re">
                            <div class="white-header">
                               <h5>Tickets Disponible:</h5>
                            </div>
                            <div class="row white-size">
                               <div class="col-sm-6 col-xs-6 goleft">
                                <?php if(Auth::user()->credito != null): ?>
                                  <p><i class="fa fa-ticket"></i><?php echo e(Auth::user()->credito); ?></p>
                                <?php else: ?>
                                  <p><i class="fa fa-ticket"></i>0</p>
                                <?php endif; ?>
                               </div>
                               <div class="col-sm-6 col-xs-6"></div>
                               <p><a href="<?php echo e(url('SaleTickets')); ?>" class="">Recargar</a></p>
                            </div>
                            <div class="centered">
                                
                            </div>
                          </div>
                        </div> -->
                        <div class="col-md-1">
                          
                        </div>
                  </div>
                              
   
          <div id="modal-confirmation"></div> 

          <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
  document.querySelector('#patrocinador').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting
  var cod=$('#codigo').val();
  $.ajax({
                    
      url:'sponsor/'+cod,
      type: 'get',
      dataType: "json",           
      success: function (result) 
                {
                if(result.img_perf==null){
                  perfil = "<?php echo asset('/sistem_images/DefaultUser.png'); ?>"
                }else{
                  perfil=result.img_perf;
                }
                if (result != 0)
                {

                  swal({
                      // title: "Are you sure?",
                      text: "¿Esta ingresando como patrocinador a: "+result.name+"?",
                      // icon: "warning",
                      icon: 'info',

                      buttons: {
                        
                        accept:  'Aceptar',
                                  
                                
                        cancel: 'Cancelar',
                                
                        
                      },
                      dangerMode: true,
                    }).then(function(isConfirm) {
                      if (isConfirm) {
                          
                            form.submit(); // <--- submit form programmatically
                          
                        } else {
                          $('#patrocinador')[0].reset();
                        }
                      })
                    }else{
                      $('#codigoMen').show();
                      $('#codigoMen').text('El codigo es incorrecto');
                      $('#codigoMen').css('color','red');
                  }
                
                }
                })
  });

</script>
<script type="text/javascript">
  $(document).ready(function(){
  var f1 = document.getElementById('id').value;
  var f = new Date();
  var f2=f.getDate() + "/" +(f.getMonth()+1 )+ "/" + f.getFullYear();

  var tiempo=restaFechas(f1,f2);
  if (tiempo > 15){
    document.getElementById('referir').style.display='none';  
  }else{
    var total=14-tiempo;
    console.log(tiempo);
    document.getElementById('mensaje').innerHTML='Usted cuenta con '+total +' dias para agregar un patrocinador';
  }

});
restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('-');
 var dFecha= aFecha1[2].split(' ');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,dFecha[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }
</script>
<script type="text/javascript">
  //---------VALIDACION PARA QUE EL CAMPO CODIGO NO ESTE VACIO---------------
      $(document).ready(function(){
        $('#codigo').keyup(function(evento){
            var codigo = $('#codigo').val().trim();
            console.log(codigo.length);
            if (codigo.length==0) {
                $('#codigoMen').show();
                $('#codigoMen').text('El campo no debe estar vacio');
                $('#codigoMen').css('color','red');
                $('#ingresar').attr('disabled',true);
            } else {
                $('#codigoMen').hide();
                $('#ingresar').attr('disabled',false);
            }
        });
    });
  //---------VALIDACION PARA QUE EL CAMPO APELLIDO NO ESTE VACIO---------------
    $(document).ready(function(){
        $('#lastname').keyup(function(evento){
            var apellido = $('#lastname').val().trim();
            console.log(apellido.length);
            if (apellido.length==0) {
                $('#apellidoMen').show();
                $('#apellidoMen').text('El campo no debe estar vacio');
                $('#apellidoMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#apellidoMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
    });
  //---------VALIDACION PARA QUE EL CAMPO CI NO ESTE VACIO---------------
    $(document).ready(function(){
        $('#nDocument').keyup(function(evento){
            var documento = $('#nDocument').val().trim();
            console.log(documento.length);
            if (documento.length==0) {
                $('#documentoMen').show();
                $('#documentoMen').text('El campo no debe estar vacio');
                $('#documentoMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#documentoMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO FECHA DE NACIMIENTO NO ESTE VACIO---------------
       $(document).ready(function(){
        $('#dateN').keyup(function(evento){
            var nacimiento = $('#dateN').val().trim();
            console.log(nacimiento.length);
            if (nacimiento.length==0) {
                $('#dateMen').show();
                $('#dateMen').text('El campo no debe estar vacio');
                $('#dateMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#dateMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
      });
//---------VALIDACION PARA QUE EL CAMPO FECHA NACIMINTO SEA MAYOR DE EDAD---------------
        $(document).ready(function(){
          $('#dateN').keyup(function(evento){
            var fecha = $('#dateN').val().trim();
        var values=fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        
        var f = new Date();
        var diaAc=f.getDate();
        var mesAc=(f.getMonth()+1 );
        var anoAc=f.getFullYear();        
 
        // realizamos el calculo
        var edad = (anoAc + 1900) - ano;
        if ( mesAc < mes )
        {
            edad--;
        }
        if ((mes == mesAc) && (diaAc < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
          
        if (edad < 18){
        $('#dateMen').show();
                $('#dateMen').text('Debe ser mayor de edad');
                $('#dateMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#dateMen').hide();
                $('#registro').attr('disabled',false);
            }
    })
  })
//---------VALIDACION PARA QUE EL CAMPO ALIAS NO ESTE VACIO---------------
       $(document).ready(function(){
        $('#alias').keyup(function(evento){
            var nacimiento = $('#alias').val().trim();
            console.log(nacimiento.length);
            if (nacimiento.length==0) {
                $('#aliasMen').show();
                $('#aliasMen').text('El campo no debe estar vacio');
                $('#aliasMen').css('color','red');
                $('#registro').attr('disabled',true);
            } else {
                $('#aliasMen').hide();
                $('#registro').attr('disabled',false);
            }
        });
      });
  //---------VALIDACION PARA SOLO INTRODUCIR LETRAS---------------
    function controltagLet(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
  //---------VALIDACION PARA SOLO INTRODUCIR NUMEROS---------------
    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
</script>
  
<script>
  //-------------COMPRA DE SINGLES---------
function fnOpenNormalDialog(cost,name,id) {


    $("#modal-confirmation").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

    // Define the Dialog and its properties.
    $("#modal-confirmation").dialog({
        resizable: false,
        modal: true,
        title: "Confirmar",
        height: 250,
        width: 400,
        position: {
          my: "center top",
      at: "center top",
      of: $("#principal"),
      within: $("#principal")
        },
        buttons: {
              "Si": function () {
                $(this).dialog('close');
                callback(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback(false,id);
            }
        }
    });
}



function callback(value,id) {
    if (value) {
         $.ajax({
                    
            url:'BuySong/'+id,
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
                      swal('La canción ya forma parte de su colección','','error');
                    }
                    else
                    { 
                      swal('Cancion comprada con exito','','success');
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
<script>
  //-----COMPRA DE ALBUMS-----------------
function fnOpenNormalDialog2(cost,name,id) {

    $("#modal-confirmation").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

    // Define the Dialog and its properties.
    $("#modal-confirmation").dialog({
        resizable: false,
        modal: true,
        title: "Confirmar",
        height: 250,
        width: 400,
        position: {
          my: "center top",
      at: "center top",
      of: $("#principal"),
      within: $("#principal")
        },
        buttons: {
              "Si": function () {
                $(this).dialog('close');
                callback2(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback2(false,id);
            }
        }
    });
}


function callback2(value,id) {
    if (value) {
         $.ajax({
                    
            url:'BuyAlbum/'+id,
            type: 'POST',
            data: {
            _token: $('input[name=_token]').val()
             },
                    
             success: function (result) 
                {


                   if (result==0) 
                    { 
                       swal('No posee suficientes creditos, por favor recargue','','error');  
                    }
                    else if (result==1) 
                    {
                      swal('El album ya forma parte de su colección','','error');
                    }
                    else
                    { 
                      swal('Album comprado con exito','','success');
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
<script>
function fnOpenNormalDialog3(cost,name,id) {


    $("#modal-confirmation").html('Desea comprar '+name+' ¿Con un valor de '+cost+' tickets?');

    // Define the Dialog and its properties.
    $("#modal-confirmation").dialog({
        resizable: false,
        modal: true,
        title: "Confirmar",
        height: 250,
        width: 400,
        position: {
          my: "center top",
      at: "center top",
      of: $("#principal"),
      within: $("#principal")
        },
        buttons: {
              "Si": function () {
                $(this).dialog('close');
                callback(true,id);
            },
                "No": function () {
                $(this).dialog('close');
                callback(false,id);
            }
        }
    });
}

function callback3(value,id) {
    if (value) {
         $.ajax({
                    
            url:'BuyBook/'+id,
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
                      swal('Libro comprada con exito','','success');
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