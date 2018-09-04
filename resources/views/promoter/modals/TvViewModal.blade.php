 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Estatus</h4>
        </div>
        <div class="modal-body">
         <p>Modifique el estatus de la Televisora</p>
        

             <form method="POST" id="formStatus">
                              {{ csrf_field() }}

                           <div class="radio-inline">
                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button"  onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                <span class="mdl-radio__label">Aprobar</span>
                </label>
             </div>

             <div class="radio-inline">
             <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" onclick="javascript:yesnoCheck();" name="status" value="Rechazado">
                <span class="mdl-radio__label">Negar</span>
             </label>

             </div>

             <div class="radio-inline" style="display:none" id="if_no">
              <div class="mdl-textfield mdl-js-textfield">
               <textarea name="message" class="mdl-textfield__input" type="text" rows= "6" id="razon" ></textarea>
               <label class="mdl-textfield__label" for="razon">Explique La Razon</label>
              </div>
             </div>

             <div class="radio-inline">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Enviar
                </button>
            </div>
        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

 <div class="modal fade" id="NewRadio" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nueva Televisora</h4>
        </div>
        <div class="modal-body">
     
        

             <form method="POST" id="NewRadioForm" action="{{url('NewBackendTv')}}" enctype="multipart/form-data" class="form-horizontal style-form" role="form">
                              {{ csrf_field() }}

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre de La Televisora</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="name_r" placeholder="Nombre de La Radio" name="name_r" required>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Direccion del Streaming</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="streaming" placeholder="Direccion del Streaming" name="streaming" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Correo de Contacto</label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email_c" name="email_c" placeholder="Email" required>
                              </div>
                          </div>

                        <div class="form-group">

                            {{--link d google+--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-google active"><i class="fa fa-youtube"></i></span>
                                <input type="text" class="form-control" id="google" autofocus="autofocus" name="youtube"
                                       placeholder="Youtube"
                                       pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)"
                                       required oninvalid="this.setCustomValidity('Ingrese Un Canal Valido')"
                                       oninput="setCustomValidity('')">

                            </div>
                            {{--lin de instagram--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-instagram active"><i class="fa fa-instagram"></i></span>
                                <input id="instagram"
                                       pattern="https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)"
                                       type="text" name="instagram" class="form-control" placeholder="Instagram"
                                       required
                                       oninvalid="this.setCustomValidity('Ingrese Un Instagram Valido')"
                                       oninput="setCustomValidity('')">
                            </div>
                            {{--link de facebook--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-facebook active"><i class="fa fa-facebook"></i></span>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                       placeholder="Facebook"
                                       pattern="http://www\.facebook\.com\/(.+)|https://www\.facebook\.com\/(.+)" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Facebook Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                            {{--lind de twitter--}}
                            <div class="input-group">
                                <span class="input-group-addon btn-twitter active"><i class="fa fa-twitter"></i></span>
                                <input id="twitter" pattern="http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?"
                                       type="text"
                                       name="twitter"
                                       class="form-control" placeholder="Twitter" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Twitter Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                        </div>

                          <div class="form-group">
                            <div id="image-preview" style="border:#000000 1px solid; margin-left: 20px" class="col-md-1">
                                   <label for="image-upload" id="image-label">Logo</label>
                                    <input type="file" name="logo" accept=".jpg" id="image-upload" oninvalid="this.setCustomValidity('Ingrese Un Logo')"
                                     oninput="setCustomValidity('')" required/>
                            </div>
                          </div>

                
                <button class="btn-success" type="submit">                    
                  Enviar
                </button>
            </div>
        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

 <div class="modal fade" id="UpadeRadio" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Televisora</h4>
        </div>
        <div class="modal-body">
     
        

             <form method="POST" id="UpdateRadioForm"  enctype="multipart/form-data" class="form-horizontal style-form" role="form">
                              {{ csrf_field() }}

                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre de La Televisora</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="name_r_u" placeholder="Nombre de La Radio" name="name_r_u" required>
                              </div>
                          </div>
                          
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Direccion del Streaming</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="streaming_u" placeholder="Direccion del Streaming" name="streaming_u" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Correo de Contacto</label>
                              <div class="col-sm-10">
                                  <input type="email" class="form-control" id="email_c_u" name="email_c_u" placeholder="Email" required>
                              </div>
                          </div>

                        <div class="form-group">

                            {{--link d google+--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-google active"><i class="fa fa-youtube"></i></span>
                                <input type="text" class="form-control" id="youtube_u" autofocus="autofocus" name="youtube_u"
                                       placeholder="Youtube"
                                       pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)"
                                       required oninvalid="this.setCustomValidity('Ingrese Un Canal Valido')"
                                       oninput="setCustomValidity('')">

                            </div>
                            {{--lin de instagram--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-instagram active"><i class="fa fa-instagram"></i></span>
                                <input id="instagram_u"
                                       pattern="https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)"
                                       type="text" name="instagram_u" class="form-control" placeholder="Instagram"
                                       required
                                       oninvalid="this.setCustomValidity('Ingrese Un Instagram Valido')"
                                       oninput="setCustomValidity('')">
                            </div>
                            {{--link de facebook--}}
                            <div class="input-group ">
                                <span class="input-group-addon btn-facebook active"><i class="fa fa-facebook"></i></span>
                                <input type="text" class="form-control" id="facebook_u" name="facebook_u"
                                       placeholder="Facebook"
                                       pattern="http://www\.facebook\.com\/(.+)|https://www\.facebook\.com\/(.+)" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Facebook Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                            {{--lind de twitter--}}
                            <div class="input-group">
                                <span class="input-group-addon btn-twitter active"><i class="fa fa-twitter"></i></span>
                                <input id="twitter_u" pattern="http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?"
                                       type="text"
                                       name="twitter_u"
                                       class="form-control" placeholder="Twitter" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Twitter Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                        

                          <div class="form-group">
                            <div id="image-preview_u" style="border:#000000 1px solid; margin-left: 20px" class="col-md-1">
                                   <label for="image-upload" id="image-label_u">Logo</label>
                                    <input type="file" name="logo_u" accept=".jpg" id="image-upload_u" oninvalid="this.setCustomValidity('Ingrese Un Logo')"
                                     oninput="setCustomValidity('')" required/>
                            </div>
                          </div>

                
                <button class="btn-success" type="submit">                    
                  Enviar
                </button>
            </div>
        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="DeleteRadio" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Borrar Televisora</h4>
        </div>
        <div class="modal-body">
         <p>¿Esta Seguro de que desea borrar la Tv?</p>
        

             <form method="POST" id="formDelete">
                              {{ csrf_field() }}

             <div class="radio-inline">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit">                    Borrar
                </button>
            </div>
        </form>

        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="ShowStreaming" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tv</h4>
        </div>
        <div class="modal-body">
         
        
          <iframe id="video" width="560" height="315" src="" frameborder="0" allowfullscreen>
            
          </iframe>


             
        
        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
