@extends('promoter.layouts.app')

@section('main')
 <div class="row mt">
    <h2>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" id="users">Usuarios Pendientes</a></li>
        <li><a data-toggle="tab" href="#menu1" id="users_payments">Pagos de Usuarios</a></li>    
      </ul>
  </h2>
</div>

<div class="row mt">
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="col-lg-12">
        <div class="content-panel">

          <table class="table table-bordered table-striped table-condensed" id="Clients">            
            <thead>
                <tr>
                  <th class="non-numeric">Nombre</th>
                  <th class="non-numeric">Numero Doc</th>
                  <th class="non-numeric">Imagen del Documento</th>
                  <th class="non-numeric">Fecha de Nacimiento</th>
                  <th class="non-numeric">Genero</th>
                  <th class="non-numeric">Redes</th>
                  <th class="non-numeric">Estatus</th>
              </tr>
              </thead>
          </table>

        </div>
      </div>
    </div>

   <div id="menu1" class="tab-pane fade">
      <div class="col-lg-12">
         <div class="content-panel">

            <table class="table table-bordered table-striped table-condensed" id="Payments">            
            <thead>
                <tr>
                  <th class="non-numeric">Usuario</th>
                  <th class="non-numeric">Cantidad</th>
                  <th class="non-numeric">Paquete</th>
                  <th class="non-numeric">Total de la Recarga</th>
                  <th class="non-numeric">Comprobante</th>
                  <th class="non-numeric">Fecha de la Solicitud</th>
                  <th class="non-numeric">Estado</th>

              </tr>
              </thead>
             </table>


        </div>
     </div>
    </div>
  </div>
</div>

@include('promoter.modals.ClientViewModal')
@endsection

@section('js')
<script>
	$(document).ready(function(){

		var ClientsDataTable = $('#Clients').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '{!! url('ClientsDataTable') !!}',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'num_doc', name: 'num_doc'},
	            {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
	            {data: 'fech_nac', name: 'fech_nac'},
	            {data: 'type', name: 'type'},
              {data: 'webs', name: 'webs'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
	        ]
	    });


		$(document).on('click', '#Status', function() {    
              var x = $(this).val();
              
              $( "#formStatus" ).on( 'submit', function(e)
                      {
                          var s=$("input[type='radio'][name=status]:checked").val();
                          var message=$('#razon').val();
                          var url = 'ValidateUser/'+x;
                          console.log(s);
                          e.preventDefault();
                          $.ajax({
                                  url: url,
                                  type: 'post',
                                  data: {
                                          _token: $('input[name=_token]').val(),
                                          status: s,
                                          message: message,
                                        }, 
                                  success: function (result) {

                                                              $('#myModal').toggle();
                                                              $('.modal-backdrop').remove();
                                                              swal("Se ha "+s+" con exito","","success");
                                                              ClientsDataTable.ajax.reload();
                                                              },

                                  error: function (result) {
                                  swal('Existe un Error en su Solicitud','','error');
                                  console.log(result);
                                  }
                                  });  
                                                  });
         });

    $(document).on('click', '#file_b', function() {
    
     var x = $(this).val();
     
     var file =$("#photo"+x).attr("src");
     $("#ci_photo").attr("src", file);
    
     });
	
    $(document).on('click', '#webs', function() {
        
        var x = $(this).val();
       
        
        var WebsDataTable = $('#WebsTable').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,

          ajax:'ReferalsDataTable/'+x,
          columns: [
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'level', name: 'level'}
          ]
      });

    $('#webModal').on('hidden.bs.modal', function () {
          WebsDataTable.destroy();
         });

    });
    
    $(document).on('click', '#users_payments', function() {
        
        var PaymentsDataTable = $('#Payments').DataTable({
          processing: true,
          serverSide: true,
          responsive: true,

          ajax: '{!! url('DepsitDataTable') !!}',
          columns: [
              {data: 'user_id', name: 'user_id'},
              {data: 'value', name: 'value'},
              {data: 'tickets.name', name: 'tickets.name'},
              {data: 'total', name: 'total'},
              {data: 'voucher', name: 'voucher', orderable: false, searchable: false},
              {data: 'created_at', name: 'created_at'},
              {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
        });

        
      $(document).on('click', '#users', function() {
           
           PaymentsDataTable.destroy();
      });


      $(document).on('click', '#payval', function() { 
        var x = $(this).val();
        
        $( "#formPayment" ).on( 'submit', function(e){

          var url = 'DepositStatus/'+x;
          
          var s=$("input[type='radio'][name=status_p]:checked").val();
          
          var message=$('#razon_p').val();
          e.preventDefault();
            $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                            _token: $('input[name=_token]').val(),
                            status: s,
                            message: message,
                          }, 
                    success: function (result) {

                                                $('#PayModal').toggle();
                                                $('.modal-backdrop').remove();
                                                swal("Se ha "+s+" con exito","","success");
                                                console.log(result);
                                                
                                                },

                    error: function (result) {
                    swal('Existe un Error en su Solicitud','','error');
                    console.log(result);
                    }
                    });  

        });
      
      });

    
    });


  });
</script>
@endsection