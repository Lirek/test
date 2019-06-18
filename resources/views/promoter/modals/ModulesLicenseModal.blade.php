  <div class="modal" id="NewModulo">
    <div class="modal-content">
      <div class="col s12 purple lighten-2 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregue un modulo</h4>
      </div>
      <div style="margin-top: -15px">
        <form method="POST" id="" action="{{url('newModule')}}">
          {{ csrf_field() }}
            <br>
            <br>
            <div class="input-field col s12">
              <label for="name">Nombre del modulo</label>
              <input type="text" class="validate" id="name" name="name" required="required" autofocus="autofocus">
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

    <div class="modal" id="NewPermiso">
    <div class="modal-content">
      <div class="col s12 purple lighten-2 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar permiso a usuario</h4>
      </div>
      <div style="margin-top: -15px">
        <form method="POST" id="inforpermiso">
          {{ csrf_field() }}
            <div class="col s12">
            <div class="input-field col s6">
              <h6 class="correoUsuario"></h6>
            </div>
            <div class="input-field col s6">
              <select name="module" id="module" required>
              <option value="" disabled selected>Seleccione el modulo</option>
                  @foreach($modulo as $modul)
                    <option value="{{$modul->id}}" id="modul" name="modul">{{$modul->name}}</option>
                  @endforeach
              </select>
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

  <div class="modal" id="estado">
    <div class="modal-content">
      <div class="col s12 purple lighten-2 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modifique el estatus del modulo</h4>
      </div>
      <br>
      <div style="margin-top: 15%; margin-bottom: 15%">
        <form method="POST" id="formStatus">
          {{ csrf_field() }}
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-1" name="status" value="Activo" required="required">
                <span>Activar</span>
              </label>
            </p>
          </div>
          <div class="col s6">
            <p>
              <label>
                <input type="radio" id="option-2" name="status" value="Inactivo" required="required">
                <span>Desactivar</span>
              </label>
            </p>
          </div>
          <br>
          <div class="col s12">
            <button class="btn curvaBoton" type="submit">
              Enviar
            </button>
            <br><br><br>
          </div>
        </form>
      </div>
    </div>
  </div>