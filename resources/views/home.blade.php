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

                    @if(Auth::user()->verify==FALSE)
                        
                    
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
                                                <h4 class="modal-title">Complete sus datos</h4>
                                              </div>
                                              <div class="modal-body">
                                                <form class="form-horizontal" method="POST" action="#">{{ csrf_field() }}
                                                   <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                      <label for="lastname" class="col-md-4 control-label">Apellido</label>
                                                      <div class="col-md-6">
                                                          <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group{{ $errors->has('nDocument') ? ' has-error' : '' }}">
                                                      <label for="nDocument" class="col-md-4 control-label">N° Documento</label>
                                                      <div class="col-md-6">
                                                          <input id="nDocument" type="text" class="form-control" name="nDocument" value="{{ old('nDocument') }}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group{{ $errors->has('imgdoc') ? ' has-error' : '' }}">
                                                      <label for="imgdoc" class="col-md-4 control-label">Imagen del documento</label>
                                                      <div class="col-md-6">
                                                          <input id="imgdoc" type="file" accept=".jpg"class="form-control" name="imgdoc" value="{{ old('imgdoc') }}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group{{ $errors->has('dateN') ? ' has-error' : '' }}">
                                                      <label for="dateN" class="col-md-4 control-label">Fecha de nacimiento</label>
                                                      <div class="col-md-6">
                                                          <input id="dateN" type="date" max="{{@date('Y-m-d')}}" class="form-control" name="dateN" value="{{ old('dateN') }}">
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary">Registrar datos</button>
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

                    @endif  

                      <div class="col-md-12 col-sm-12 mb">
                        <div class="white-panel panRf pe donut-chart">
                          <div class="white-header">
                            <h3><span class="card-title">Contenido Reciente</span></h3>                          
                          </div>
                          <div class="col-sm-12 col-xs-12 col-md-12 goleft">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                <tr>
                                  <th></th>
                                  <th><i class="fa fa-bullhorn"></i>Nombre</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Tipo</th>
                                  <th><i class="fa fa-money"></i>Costo</th>
                                  <th class="hidden-phone"><i class=" fa fa-edit"></i>Proveedor</th>
                                </tr>
                              </thead>
                              <tbody>



                              @if($Albums)
                                <tr class="letters">
                                  <td><span class="bg-r"><i class="li_vynil"></i></span></td>
                                  <td><a href=""> {{$Albums->name_alb}}</a></td>
                                  <td class="hidden-phone">Album Musical</td>
                                  <td>{{$Albums->cost}}</td>
                                  <td class="hidden-phone">{{$Albums->Seller->name}}</td>
                                </tr>
                              @endif

                              @if($Tv)
                                <tr class="letters">
                                  <td><span class="bg-r"><i class="li_tv"></i></span></td>
                                  <td><a href=""> {{$Tv->name_r}}</a></td>
                                  <td class="hidden-phone">TV Online</td>
                                  <td>Gratis</td>
                                  <td class="hidden-phone">{{$Tv->Seller->name}}</td>
                                </tr>
                             @endif

                            @if($Book)
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-book"></i></span></td>
                                <td><a href=""> {{$Book->title}}</a></td>
                                <td class="hidden-phone">Libro</td>
                                <td>{{$Book->cost}}</td>
                                <td class="hidden-phone">{{$Book->seller->name}}</td>
                              </tr>
                            @endif

                            @if($Megazines)
                              <tr class="letters">
                                <td><span class="bg-r"><i class="li_news"></i></span></td>
                                <td><a href=""> {{$Megazines->title}}</a></td>
                                <td class="hidden-phone">Revista</td>
                                <td>{{$Megazines->cost}}</td>
                                <td class="hidden-phone">{{$Megazines->Seller->name}}</td>
                              </tr>
                            @endif

                            @if($Radio)
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-microphone"></i></span></td>
                                <td><a href=""> {{$Radio->name_r}}</a></td>
                                <td class="hidden-phone">Radio Online</td>
                                <td>Gratis</td>
                                <td class="hidden-phone">{{$Radio->Seller->name}}</td>
                              </tr>
                            @endif

                            @if($Movies)
                              <tr class="letters">
                                <td><span class="bg-r"><i class="fa fa-video-camera"></i></span></td>
                                <td><a href=""> {{$Movies->title}}</a></td>
                                <td class="hidden-phone">Pelicula</td>
                                <td>{{$Movies->cost}}</td>
                                <td class="hidden-phone">{{$Radio->Seller->name}}</td>
                              </tr>
                          @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>            



                        <div class="col-md-5 col-sm-5 mb">
                          <div class="white-panel re">
                            <div class="white-header">
                               <h5>Tickets Disponible:</h5>
                            </div>
                            <div class="row white-size">
                               <div class="col-sm-6 col-xs-6 goleft">
                                  <p><i class="fa fa-ticket"></i>{{Auth::user()->credito}}</p>
                               </div>
                               <div class="col-sm-6 col-xs-6"></div>
                               <p><a href="#" class="">Recargar</a></p>
                            </div>
                            <div class="centered">
                                
                            </div>
                          </div>
                        </div><!-- /col-md-5 -->
                        <div class="col-md-1">
                          
                        </div>
                        <div class="col-md-5 col-sm-5 mb">
                           <!-- Qr PANEL -->
                           <div class="Qr-panel pn">
                              <div class="center">
                                {!! QrCode::size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref); !!}
                              </div>
                          </div>
                       </div><!-- /col-md-4 -->
                  </div><!-- /row -->
                              
          <div class="row mt">
            <div class="col-md-12 col-sm-12 mb">
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
            </div>
          </div><!-- /row --> 
           

          @endsection

@section('js')

@endsection