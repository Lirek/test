@extends('promoter.layouts.app')

@section('main')     
       
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Contenido Por Aprobar</h2>
          </div>

          <div class="row mt">
              <!-- TWITTER PANEL -->
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-suitcase fa-4x"></i>
                  <p>{{$content_total}}</p>
                  <p class="user">Contenido Por Aprobar</p>
                </div>
              </div><!-- /col-md-4 -->
              
              <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="twitter-panel pn">
                  <i class="fa fa-user-tie fa-4x"></i>
                  <p>{{$sellers}}</p>
                  <p class="user">Proveedores por Validar</p>
                </div>
              </div><!-- /col-md-4 -->
            
              <div class="col-lg-4 col-md-4 col-sm-4 mb">                
                <div class="twitter-panel pn">
                  <i class="fas fa-archive fa-4x"></i>
                  <p>{{$aplyss}}</p>
                  <p class="user">Cuentas Proveedor Por Revisar</p>
                </div>
              </div><!-- /col-md-4 -->
          </div
          
          <div class="row mt">
            <h2><i class="fa fa-angle-right"></i>Paquetes de Tiquets</h2>
          </div>

          <div class="row mt">
             <div class="col-md-10">
              <div class="content-panel">
                  <table class="table table-bordered table-striped table-condensed">            
                    <thead>
                        <tr>
                          <th class="non-numeric">Nombre Del Paquete</th>
                          <th>Costo</th>
                          <th>Cantidad de Tiquets</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($TicketsPackage as $Package)
                        <tr>
                          <td>{{$Package->name}}</td>
                          <td>{{$Package->cost}}$</td>
                          <td>{{$Package->amount}}</td>
                          <td>
                            <button type="button" class="btn btn-theme" id="edit" value="{{$Package->id}}">Editar
                            </button>
                            <button type="button" id="delete" class="btn-danger" value="{{$Package->id}}">Borrar
                            </button>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
             
               
                 <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#NewPack">+</button>
               
              </div>
         
          </div>

@include('promoter.modals.HomeViewModal')           
@endsection
@section('js')
<script>
   $(document).on('click', '#edit', function() {
      
      var x = $(this).val();

      var url = 'GetPackage/'+x;

      $.ajax({
                 url: url,
                 type:'get',
                 data:"json",

                success: function(data)
                {
                  console.log(data);

                  $('#updatePack').modal('show');
                  $('[name=name_u]').val(data.name);
                  $('[name=cost_u]').val(data.cost);
                  $('[name=ammount_u]').val(data.amount);
                  $('[name=p_id]').val(x);                              

                },

                error: function(data)
                {
                 alert("Ha Ocurrido un Error","","error");
                },

              });

   });

    $(document).on('click', '#delete', function() {
      var x = $(this).val();

   });

    $( "#UPackForm" ).on( 'submit', function(e){

        var name = $('input[name=name_u]').val();
        var cost = $('input[name=cost_u]').val();
        var ammount = $('input[name=ammount_u]').val();
        var id = $('[name=p_id]').val()
        
        e.preventDefault();
         
         $.ajax({

                  url: 'UpdatePackage/'+id,
                  type:'POST',
                  data:{
                        _token: $('input[name=_token]').val(),
                        name: name,
                        cost: cost,
                        ammount: ammount,
                        }, 

                        success: function (result) 
                        {
                          alert('Paquete Mddificado con exito');              
                          
                          $('#updatePack').modal('hide');
                          $('body').removeClass('modal-open');
                          $('.modal-backdrop').remove();

                          location.reload();
                        },

                        error: function (result) 
                        {
                          alert('Error en Su solicitud');
                          console.log(result);
                        }
         });

    });
</script>
@endsection
