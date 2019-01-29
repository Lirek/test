  <div class="modal" id="myModal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus de la televisora</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado" required="required">
                <span>Aprobar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado" required="required">
                <span>Negar</span>
              </label>
            </p>
          </div>
          <div class="input-field col s8 offset-s2" style="display:none" id="if_no">
            <textarea name="message" class="materialize-textarea" type="text" id="razon"></textarea>
            <label for="razon">Explique la razón</label>
            <div id="mensajeMaximoRazon"></div>
          </div>
          <br>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="NewTv">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregue una televisora</h4>
      </div>
      <div style="margin-top: -15px">
        <form method="POST" id="NewRadioForm" action="{{url('NewBackendTv')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input type="text" class="validate" id="name_r" name="name_r" required="required" autofocus="autofocus">
              <label for="name_r">Nombre de la Tv</label>
            </div>
            <div class="input-field col s6">
              <input type="email" class="validate" id="email_c" name="email_c" required="required">
              <label for="email_c">Correo</label>
            </div>
            <div class="input-field col s12">
              <input type="text" class="validate" id="streaming" name="streaming" required="required">
              <label for="streaming">Streaming de la Tv</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="validate" id="google" name="youtube" pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)" oninvalid="this.setCustomValidity('Ingrese un canal valido')" oninput="setCustomValidity('')">
              <label for="email_c">YouTube</label>
            </div>
            <div class="input-field col s6">
              <input id="instagram" pattern="https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)" type="text" name="instagram" class="validate" oninvalid="this.setCustomValidity('Ingrese un instagram valido')" oninput="setCustomValidity('')">
              <label for="email_c">Instagram</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="validate" id="facebook" name="facebook" pattern="http://www\.facebook\.com\/(.+)|https://www\.facebook\.com\/(.+)" oninvalid="this.setCustomValidity('Ingrese un facebook valido')" oninput="setCustomValidity('')">
              <label for="email_c">Facebook</label>
            </div>
            <div class="input-field col s6">
              <input id="twitter" pattern="http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?" type="text" name="twitter" class="validate" oninvalid="this.setCustomValidity('Ingrese un twitter valido')" oninput="setCustomValidity('')">
              <label for="email_c">Twitter</label>
            </div>
            <div class="input-field col s12">
              <div id="image-preview" style="border:#bdc3c7 1px solid;">
                <label for="image-upload" id="image-label">Logo de la tv</label>
                <input type="file" name="logo" accept="image/*" id="image-upload" oninvalid="this.setCustomValidity('Ingrese un logo')" oninput="setCustomValidity('')" required="required">
              </div>
            </div>
          </div>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="myModalBackend">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus de la televisora</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatusBackend">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option1" onclick="javascript:yesNoCheck();" name="statusB" value="Aprobado" required="required">
                <span>Aprobar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option2" onclick="javascript:yesNoCheck();" name="statusB" value="Denegado" required="required">
                <span>Negar</span>
              </label>
            </p>
          </div>
          <div class="input-field col s8 offset-s2" style="display:none" id="ifNo">
            <textarea name="message" class="materialize-textarea" type="text" id="razonR"></textarea>
            <label for="razon">Explique la razón</label>
            <div id="mensajeMaximoRazon"></div>
          </div>
          <br>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="updateTv">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique una televisora</h4>
      </div>
      <div style="margin-top: -15px">
        <form method="POST" id="UpdateTvForm" action="{{url('UpdateBackendTv')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate" name="idUpdate">
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input type="text" class="validate" id="name_r_u" name="name_r_u" required="required" autofocus="autofocus" placeholder="">
              <label for="name_r">Nombre de la Tv</label>
            </div>
            <div class="input-field col s6">
              <input type="email" class="validate" id="email_c_u" name="email_c_u" required="required" placeholder="">
              <label for="email_c">Correo</label>
            </div>
            <div class="input-field col s12">
              <input type="text" class="validate" id="streaming_u" name="streaming_u" required="required" placeholder="">
              <label for="streaming">Streaming de la Tv</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="validate" id="youtube_u" name="youtube_u" pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)" oninvalid="this.setCustomValidity('Ingrese un canal valido')" oninput="setCustomValidity('')" placeholder="">
              <label for="email_c">YouTube</label>
            </div>
            <div class="input-field col s6">
              <input id="instagram_u" pattern="https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)" type="text" name="instagram_u" class="validate" oninvalid="this.setCustomValidity('Ingrese un instagram valido')" oninput="setCustomValidity('')" placeholder="">
              <label for="email_c">Instagram</label>
            </div>
            <div class="input-field col s6">
              <input type="text" class="validate" id="facebook_u" name="facebook_u" pattern="http://www\.facebook\.com\/(.+)|https://www\.facebook\.com\/(.+)" oninvalid="this.setCustomValidity('Ingrese un facebook valido')" oninput="setCustomValidity('')" placeholder="">
              <label for="email_c">Facebook</label>
            </div>
            <div class="input-field col s6">
              <input id="twitter_u" pattern="http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?" type="text" name="twitter_u" class="validate" oninvalid="this.setCustomValidity('Ingrese un twitter valido')" oninput="setCustomValidity('')" placeholder="">
              <label for="email_c">Twitter</label>
            </div>
            <div class="col s6">
              <label for="">Imagen actual:</label>
              <img src="" id="img_u" class="materialboxed">
            </div>
            <div class="input-field col s6">
              <div id="image-preview_u" style="border:#bdc3c7 1px solid;">
                <label for="image-upload_u" id="image-label_u">Logo de la tv</label>
                <input type="file" name="logo_u" accept="image/*" id="image-upload_u" oninvalid="this.setCustomValidity('Ingrese un logo')" oninput="setCustomValidity('')" required="required">
              </div>
            </div>
          </div>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="verTv">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Ver la televisora</h4>
      </div>
      <div class="plyr__video" id="player">
        <iframe id="video" align="middle" src="" allowfullscreen allowtransparency allow="autoplay" height="500" width="100%" scrolling="no" style="border:10px;">
        </iframe>
      </div>
    </div>
  </div>

  <div id="reject" class="modal">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Historial de negaciones</h4>
      </div>
      <br>
      <div class="col s12 center">
        <h5 class="text-center" id="totalNegaciones"></h5>
        <table class="responsive-table" id="historialRechazo">
          <thead>
            <tr>
              <th><i class="material-icons"></i>Razón del rechazo</th>
              <th><i class="material-icons"></i>Fecha del rechazo</th>
            </tr>
          </thead>
          <tbody id="negaciones">
          </tbody>
        </table>
      </div>
    </div>
  </div>
