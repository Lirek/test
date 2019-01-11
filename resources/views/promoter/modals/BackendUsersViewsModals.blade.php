  <div class="modal" id="NewUser">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Crear nuevo usuario de Backend</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="PromotersForm">
          {{ csrf_field() }}
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="text" name="name_c" id="name_c" required="required">
              <label for="name_c">Nombre Completo</label>
            </div>
            <div class="input-field col s6">
              <input class="validate" type="tel" name="phone_s" id="phone_s" required="required">
              <label for="phone_s">Teléfono de contacto</label>
            </div>
          </div>
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="email" name="email_c" id="email_c" required="required">
              <label for="email_c">Correo electrónico</label>
            </div>
            <div class="input-field col s6">
              <select name="priority" id="priority" required="required">
                @foreach($priority as $p)
                  @if($p->priority > Auth::guard('Promoter')->user()->priority)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                  @endif
                @endforeach
              </select>
              <label class="mdl-textfield__label" for="priority">Tipo de Usuario</label>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="updateUser">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Actualizar usuario de Backend</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdatePromoter">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input placeholder="" class="validate" type="text" name="name_c" id="nameUpdate" required="required">
              <label for="name_c">Nombre Completo</label>
            </div>
            <div class="input-field col s6">
              <input placeholder="" class="validate" type="tel" name="phone_s" id="phoneUpdate" required="required">
              <label for="phone_s">Teléfono de contacto</label>
            </div>
          </div>
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input placeholder="" class="validate" type="email" name="email_c" id="emailUpdate" required="required">
              <label for="email_c">Correo electrónico</label>
            </div>
            <div class="input-field col s6">
              <select name="priority" id="priorityUpdate">
                <option value="" selected>Seleccione una opción</option>
                @foreach($priority as $p)
                  @if($p->priority > Auth::guard('Promoter')->user()->priority)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                  @endif
                @endforeach
              </select>
              <label class="mdl-textfield__label" for="priority">Tipo de Usuario</label>
              <span class="helper-text" data-error="wrong" data-success="right">Este campo no es obligatorio</span>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="NewSalesman">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Registrar vendedor</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="SalesmanForm">
          {{ csrf_field() }}
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="text" name="name" id="name" required="required">
              <label for="name">Nombre completo</label>
            </div>
            <div class="input-field col s6">
              <input class="validate" type="text" name="phone" id="phone" required="required">
              <label  for="phone_s">Teléfono de contacto</label>
            </div>
          </div>
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="email" name="email" id="email" required="required">
              <label for="email">Correo electrónico</label>
            </div>
            <div class="input-field col s6">
              <textarea class="materialize-textarea" name="adress" id="adress" required="required"></textarea>
                <label for="adress">Dirección</label>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal" id="USalesman">
    <div class="modal-content">
      <div class="col s12 light-blue lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar vendedor</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="SalesmanUForm">
          {{ csrf_field() }}
          <input type="hidden" name="salesman_id" id="salesman_id">
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="text" name="name_u" id="name_u" placeholder="">
              <label for="name">Nombre completo</label>
            </div>
            <div class="input-field col s6">
              <input class="validate" type="text" name="phone_u" id="phone_u" placeholder="">
              <label  for="phone_s">Teléfono de contacto</label>
            </div>
          </div>
          <div class="col l12 m6">
            <div class="input-field col s6">
              <input class="validate" type="email" name="email_u" id="email_u" placeholder="">
              <label for="email">Correo electrónico</label>
            </div>
            <div class="input-field col s6">
              <textarea class="materialize-textarea" name="adress_u" id="adress_u" placeholder=""></textarea>
              <label for="adress">Dirección</label>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>