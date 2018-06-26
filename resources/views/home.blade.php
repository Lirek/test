@extends('layouts.app')

@section('main')     
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
                      <!-- SERVER STATUS PANELS -->
                        <div class="col-md-4 col-sm-4 mb">
                          <div class="white-panel pn donut-chart">
                            <div class="white-header">
                               <h5>SERVER LOAD</h5>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-xs-6 goleft">
                                  <p><i class="fa fa-database"></i> 70%</p>
                               </div>
                            </div>
                              <canvas id="serverstatus01" height="120" width="120"></canvas>
                          </div><! --/grey-panel -->
                        </div><!-- /col-md-4-->
                        

                        <div class="col-md-4 col-sm-4 mb">
                          <div class="white-panel pn">
                            <div class="white-header">
                               <h5>TOP PRODUCT</h5>
                            </div>
                            <div class="row">
                               <div class="col-sm-6 col-xs-6 goleft">
                                  <p><i class="fa fa-heart"></i> 122</p>
                               </div>
                               <div class="col-sm-6 col-xs-6"></div>
                            </div>
                            <div class="centered">
                                <img src="assets/img/product.png" width="120">
                            </div>
                          </div>
                        </div><!-- /col-md-4 -->
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
                          <h3>VISITS</h3>
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
                              <div class="title">JAN</div>
                              <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">FEB</div>
                              <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">MAR</div>
                              <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">APR</div>
                              <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                          </div>
                          <div class="bar">
                              <div class="title">MAY</div>
                              <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">JUN</div>
                              <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                          </div>
                          <div class="bar">
                              <div class="title">JUL</div>
                              <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
          </div><!-- /row --> 
           
          @endsection
