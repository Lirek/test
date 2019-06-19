  <div id="asignar" class="modal modal-s">
    <div class="modal-content">
      <div class=" pink darken-3">
        <br>
        <h4 class="center white-text" >Ingrese el código</h4>
        <br>
      </div>
      <br>
      <div class="row">
        <form class="col m6 offset-m3" id="patrocinador" method="post" action="{{url('assingRefered')}}">
          {{ csrf_field() }}
          <input type="hidden" id="idUser" value="" name="idUser">
          <div class="input-field col m12 ">
            <i class="material-icons prefix">vpn_key</i>
            <input id="codigo" type="text" class="validate" name="codigo" required="required">
            <label for="first_name">Código</label>
          </div>
          <button class="btn waves-effect waves-light curvaBoton" type="submit">
            Enviar
            <i class="material-icons right">send</i>
          </button>
        </form>
      </div>
    </div>
  </div>