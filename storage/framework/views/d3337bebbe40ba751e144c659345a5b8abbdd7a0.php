<?php $__env->startSection('main'); ?>     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      

              
                  
                  
                    <div class="row mtbox">

                      <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                        <div class="box1">
                          <span class="li_music"></span>
                          <h3>933</h3>
                        </div>
                        <p>933 People liked your page the last 24hs. Whoohoo!</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_tv"></span>
                          <h3>+48</h3>
                        </div>
                        <p>48 New files were added in your cloud storage.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_sound"></span>
                          <h3>23</h3>
                        </div>
                        <p>You have 23 unread messages in your inbox.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_video"></span>
                          <h3>+10</h3>
                        </div>
                        <p>More than 10 news were added in your reader.</p>
                      </div>
                      <div class="col-md-2 col-sm-2 box0">
                        <div class="box1">
                          <span class="li_vallet"></span>
                          <h3>OK!</h3>
                        </div>
                        <p>Your server is working perfectly. Relax & enjoy.</p>
                      </div>

                    </div><!-- /row mt -->  
                    
                    <div class="row mt">

                    <?php if(Auth::user()->verify==FALSE): ?>
                        
                    
                      <!-- SERVER STATUS PANELS -->
                        <div class="col-md-12 col-sm-12 mb">
                          <div class="white-panel panRf pe donut-chart">
                            <div class="white-header">
                               <h5>Finalice Su Registro</h5>
                            </div>
                            <div class="row">
                               <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                                  <p><i class="fa fa-user"></i></p>
                                  <div class="paragraph">
                                    <p class="center ">Le recordamos que aun faltan documentos que adjuntar para disfrutar de todo lo que puede ofrecer nuestra plataforma, le invitamos completar su perfil</p>
                                      <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModal">Finalizar Registro</a></p>

                                      <!--MODAL-->
                                      <div id="myModal" class="modal fade" role="dialog">
                                          <div class="modal-dialog">
                                         <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Modal Header</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>Some text in the modal.</p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!--FIN DEL MODAL-->

                                  </div>
                               </div>

                            </div>
                          </div><! --/grey-panel -->
                        </div><!-- /col-md-12-->

                      
                    <?php endif; ?>  

                        <div class="col-md-5 col-sm-5 mb">
                          <div class="white-panel re">
                            <div class="white-header">
                               <h5>Tickets Disponible:</h5>
                            </div>
                            <div class="row white-size">
                               <div class="col-sm-6 col-xs-6 goleft">
                                  <p><i class="fa fa-ticket"></i><?php echo e(Auth::user()->credito); ?></p>
                               </div>
                               <div class="col-sm-6 col-xs-6"></div>
                               <p><a href="#" class="">Recargar</a></p>
                            </div>
                            <div class="centered">
                                
                            </div>
                          </div>
                        </div><!-- /col-md-5 -->
                        <div class="col-md-4 mb">
                           <!-- INSTAGRAM PANEL -->
                           <div class="instagram-panel pn">
                              <i class="fa fa-instagram fa-4x"></i>
                                  <p>@THISISYOU<br/>
                                    5 min. ago
                                  </p>
                              <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                          </div>
                       </div><!-- /col-md-4 -->
                  </div><!-- /row -->
                              
          <div class="row mt">
                      <!--CUSTOM CHART START -->
                      <div class="border-head">
                          <h3>Número de contenido</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>10.000</span></li>
                              <li><span>8.000</span></li>
                              <li><span>6.000</span></li>
                              <li><span>4.000</span></li>
                              <li><span>2.000</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">Musica</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Libros</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Revistas</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Peliculas</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">Radios</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">Tvs</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">Series</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->

          </div><!-- /row --> 
           

          <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>