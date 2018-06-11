
    <ul class="dropdown-content" id="user_tickets">
      <li>
          <a class="indigo-text tooltipped" data-position="left" data-tooltip="Comprar Tickets" href="#!">
           <i class="material-icons">add_shopping_cart</i>
          </a>
      </li>
      
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Ver Transacciones" href="#!">
          <i class="material-icons">
          account_balance
          </i>
        </a>
      </li>   
    </ul>

    <ul class="dropdown-content" id="user_dropdown">
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Editar Datos de Perfil" href="#!">
          <i class="material-icons">
                settings
          </i>
      </a>
    </li>
      
      <li>
        <a class="indigo-text tooltipped" data-position="left" data-tooltip="Salir" href="#!">
          <i class="material-icons">
          power_settings_new
          </i>
        </a>
      </li>
    
    </ul>

    <nav class="white" role="navigation">
      <div class="nav-wrapper">
        <a data-activates="slide-out" class="button-collapse show-on-large" href="#!"><img style="margin-top: 5px; width:30%; margin-left: 5px;" src="{{ asset('sistem_images/Logo-Leipel.png') }}"/></a>

        <ul class="right hide-on-med-and-down">
          
          <li>
            <a class='right dropdown-button' href='' data-activates='user_dropdown'><i class="fas fa-user" style="color: #3871b9"></i></a>
          </li>



          <li>
            <a class='right dropdown-button' href='' data-activates='user_tickets' style="color: #3871b9"><i class="fas fa-ticket-alt"></i></a>
          </li>
        </ul>

        <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      </div>
    </nav>
