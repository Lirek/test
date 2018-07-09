@extends('promoter.layouts.app')

@section('main')

<h3><i class="fa fa-angle-right"></i>Usuarios Administrativos</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i> Usuarios Administratios Registrados</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed" id="promoters_table">
                              <thead>
                              <tr>
                                  <th>Nombre</th>
                                  
                                  <th>Correo</th>
                                  
                                  <th>Nivel</th>
                                  
                                  @if(Auth::guard('Promoter')->user()->priority == 1)
                                  <th>Ultimo Inicio</th>
                                  @endif

                                  <th>Acciones</th>

                              </tr>
                              </thead>
                              <tbody>
                              @foreach($promoters as $promoter)
                                  
                                  <tr id="promoter{{$promoter->id}}">
                                    <td>{{$promoter->name_c}}</td>
                                    <td>{{$promoter->email}}</td>
                                    <td>{{$promoter->Roles->first()->name}}</td>
                                    
                                    @if(Auth::guard('Promoter')->user()->priority == 1)
                  
                                            @if($promoter->Logins->count()==0)

                                                     <td>No Ha Iniciado Sesion</td>
                                                 
                                                     @else
                                                 
                                                     <td>{{$promoter->Logins->first()->created_at}}</td>
                                                 
                                            @endif
                                    @endif
                                  
                                      <td>
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="{{$promoter->id}}">
                                            <i class="material-icons">cancel</i>
                                        </button>
                                        <button value="{{$promoter->id}}">
                                          <i class="material-icons">settings</i>
                                        </button>
                                      </td>
                                  </tr>
                                  
                              @endforeach
                              </tbody>
                          </table>
                                  <button  id="tt3" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-toggle="modal" data-target="#NewUser">
        <i class="material-icons">add</i>
        </button>
                          </section>


                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->

            <h3><i class="fa fa-angle-right"></i> Vendedores Registrados</h3>
          <div class="row mt">
            <div class="col-lg-12">
                      <div class="content-panel">
                      <h4><i class="fa fa-angle-right"></i>Vendedores</h4>
                          <section id="unseen">
                            <table class="table table-bordered table-striped table-condensed" id="SalesmanTable">
                              <thead>
                              <tr>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Telefono</th>
                                 <th>Registrado Por</th>
                                 <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                              @if($salesmans->count()>0)  
                                @foreach($salesmans as $salesman)
                                    <tr id="salesman{{$salesman->id}}">
                                        <td>{{$salesman->name}}</td>
                                        <td>{{$salesman->email}}</td>
                                        <td>{{$salesman->phone}}</td>
                                        <td>{{$salesman->CreatedBy->name}}</td>
                                        <td>
                                         <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="{{$salesman->id}}">
                                            <i class="material-icons">cancel</i>
                                         </button>
                                        
                                         <button value="{{$salesman->id}}">
                                          <i class="material-icons">settings</i>
                                         </button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <h5>No existen Vendedores Registrados</h5>
                              @endif
                              </tbody>
                          </table>
                            <button  id="SalesmanAdd" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-toggle="modal" data-target="#NewSalesman">
                        <i class="material-icons">add</i>         
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
        @include('promoter.modals.BackendUsersViewsModals')
@endsection

@section('js')
<script>
  $("#phone").intlTelInput();
  $("#phone_s").intlTelInput();

  $(document).on('click', '#tt3', function() {    

    $(document).ready(function (e){

        $( "#PromotersForm" ).on( 'submit', function(e){
          
          var name_c = $('input[name=name_c]').val();
          var phone_s =  $("#phone_s").intlTelInput("getNumber");
          var email_c = $('input[name=email_c]').val();
          var priority =$('#priority').val();

          e.preventDefault();
            
            $.ajax({

              url: 'promoter_c',
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    name_c: name_c,
                    phone_s: phone_s,
                    email_c: email_c,
                    priority: priority,
                    }, 

                    success: function (result) 
                    {
                      alert('Usuario Registrado con exito');
                    
                      var table = document.getElementById("promoters_table");
                      var row = table.insertRow();
                      var name = row.insertCell();
                      var email = row.insertCell();
                      var priority =row.insertCell();
                      var logins = row.insertCell();
                      var buttonDelete = row.insertCell();
                      var buttonUpdate = row.insertCell();

                      row.id='promoter'+result['id'];

                      
                                            
                                           
                      name.innerHTML = result['name_c'];
                      email.innerHTML = result['email'];
                        
                        if (result['priority'] == 1) 
                          {
                          priority.innerHTML = 'SuperAdmin';
                          } 
                        if (result['priority'] == 2) 
                          {
                            priority.innerHTML = 'Admin';
                          }
                        
                        if (result['priority'] == 3)
                          {
                            priority.innerHTML = 'Operador';
                          }

                        logins.innerHTML = 'No ha Iniciado Sesion';

                        buttonDelete.innerHTML = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="'+result['id']+'"> <i class="material-icons">cancel</i> </button>';

                        buttonUpdate.innerHTML = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="'+result['id']+'"> <i class="material-icons">settings</i> </button>';
                      },

                    error: function (result) 
                    {
                      alert('Error en Su solicitud');
                      console.log(result);
                    }

            });
          
        });
    });
  
  });

  $(document).on('click', '#SalesmanAdd', function() {    

    $(document).ready(function (e){

        $( "#SalesmanForm" ).on( 'submit', function(e){
          
          var name = $('input[name=name]').val();
          var phone =  $("#phone").intlTelInput("getNumber");
          var email = $('input[name=email]').val();
          var adress = $('input[name=adress]').val();

          e.preventDefault();
            
            $.ajax({

              url: 'AddSalesman',
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    name: name,
                    phone: phone,
                    email: email,
                    adress: adress,
                    }, 

                    success: function (result) 
                    {
                      alert('Usuario Registrado con exito');
                    
                      var table = document.getElementById("SalesmanTable");
                      var row = table.insertRow();
                      var name = row.insertCell();
                      var email = row.insertCell();
                      var adress = row.insertCell();
                      var RegisterBy = row.insertCell();
                      var buttonDelete = row.insertCell();
                      var buttonUpdate = row.insertCell();

                      row.id='salesman'+result['id'];

                      

                      },

                    error: function (result) 
                    {
                      alert('Error en Su solicitud');
                      console.log(result);
                    }

            });
          
        });
    });
  
  });
</script>
@endsection