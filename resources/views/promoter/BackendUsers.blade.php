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
                                  <th></th>
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Direccion</th>
                                  <th>Nivel</th>
                                  <th>Ultimo Inicio</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($promoters as $promoter)
                                <tr id="promoter{{$promoter->id}}">
                                  <td></td>
                              <td>{{$promoter->name}}</td>
                              <td>{{$promoter->email}}</td>
                              <td>{{$promoter->adress}}</td>
                              <td>{{$promoter->Roles->first()->name}}</td>
                              
                              
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                                  <button  id="tt3" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored" data-toggle="modal" data-target="#NewPromoter">
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
                            <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                 <th>Nombre</th>
                                 <th>Correo</th>
                                 <th>Telefono</th>
                              </tr>
                              </thead>
                              <tbody>
                              @if($salesmans->count()>0)  
                                @foreach($salesmans as $salesman)
                                    <tr>
                                        <td>{{$salesman->name}}</td>
                                        <td>{{$salesman->email}}</td>
                                        <td>{{$salesman->phone}}</td>
                                    </tr>
                                @endforeach
                                @else
                                <h5>No existen Vendedores Registrados</h5>
                              @endif
                              </tbody>
                          </table>
                          </section>
                  </div><!-- /content-panel -->
               </div><!-- /col-lg-4 -->     
        </div><!-- /row -->
        @include('promoter.modals.BackendUsersViewsModals')
@endsection

@section('js')
<script>

  $("#phone_s").intlTelInput();
  $(document).on('click', '#tt3', function() {    

    $(document).ready(function (e){

        $( "#PromotersForm" ).on( 'submit', function(e){
          
          var name_c = $('input[name=name_c]').val();
          var phone_s =  $("#phone_s").intlTelInput("getNumber");
          var email_c = $('input[name=email_c]').val();

          e.preventDefault();
            
            $.ajax({

              url: 'promoter_c',
              type:'POST',
              data:{
                    _token: $('input[name=_token]').val(),
                    name_c: name_c,
                    phone_s: phone_s,
                    email_c: email_c,
                    }, 

                    success: function (result) 
                    {
                      alert('Usuario Registrado con exito');
                    
                      var table = document.getElementById("promoters_table");
                      var row = table.insertRow();
                      var buttonDelete = row.insertCell();
                      var id = row.insertCell();
                      var name = row.insertCell();
                      var phone = row.insertCell();
                      var email = row.insertCell();
                      
                      row.id='promoter'+result['id'];

                      buttonDelete.innerHTML = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" id="delete_promoter" value="'+result['id']+'"> <i class="material-icons">cancel</i> </button>'
                                            
                                           
                      id.innerHTML = result['id'];
                      name.innerHTML = result['name_c'];
                      phone.innerHTML = result['phone_s'];
                      email.innerHTML = result['email_c'];
                    
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