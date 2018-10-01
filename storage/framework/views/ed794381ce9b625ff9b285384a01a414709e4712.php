<?php $__env->startSection('main'); ?>
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
                  <th class="non-numeric">Fecha de registro</th>
              </tr>
              </thead>
          </table>

        </div>
      </div>
      <button class="btn-info" id="AllClients">Ver Aprobados</button>
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

<?php echo $__env->make('promoter.modals.ClientViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script id="jsbin-javascript">
  function getDatilAgain(idTicketSales,medio,idUser,callback) {
    var msn = "";
    getDatil(idTicketSales,medio,idUser).then(function(response) {
        var res = JSON.parse(response);
        msn = res;
    }, function(error) {
        msn = error;
    });
    setTimeout(function() {
        callback(msn);
    },2000);
  }
  function getDatil(idTicketSales,medio,idUser) {
    return new Promise(function(resolve,reject) {
      var parametros = "/"+idTicketSales+"/"+medio+"/"+idUser;
      var url = "<?php echo e(url('/facturaDeposito/')); ?>"+parametros;

      var req = new XMLHttpRequest();
      req.open("GET",url);
      req.onload = function() {
          if (req.status == 200) {
              resolve(req.response);
          }
          else {
              resolve(req.response);
          }
      };
      req.onerror = function() {
          reject(Error("Network Error"));
      };
      req.send();
    });
  }
  function setFactura(idTicketSales,idFactura,callback){
    var parametros = "/"+idTicketSales+"/"+idFactura;
    var ruta = "<?php echo e(url('/setFactura/')); ?>"+parametros;
    var factura = "";

    $.ajax({
        url     : ruta,
        type    : "GET",
        dataType: "json",
        success: function (data) {
            var factura = data;
            callback(factura);
        }
    });
    return factura;
  }

	$(document).ready(function(){

		var ClientsDataTable = $('#Clients').DataTable({
	        processing: true,
	        serverSide: true,
            responsive: true,

	        ajax: '<?php echo url('ClientsDataTable'); ?>',
	        columns: [
	            {data: 'name', name: 'name'},
	            {data: 'num_doc', name: 'num_doc'},
	            {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
	            {data: 'fech_nac', name: 'fech_nac'},
	            {data: 'type', name: 'type'},
              {data: 'webs', name: 'webs'},
	            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false},
              {data: 'created_at', name: 'created_at'}
	        ]
	    });

    $(document).on('click', '#AllClients', function() {

      ClientsDataTable.ajax.url('<?php echo url('AllClientsDataTable'); ?>').load();
    
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
                                  async: false,
                                  data: {
                                          _token: $('input[name=_token]').val(),
                                          status: s,
                                          reason: message,
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

          ajax: '<?php echo url('DepsitDataTable'); ?>',
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

          var gif = "<?php echo e(asset('/sistem_images/Loading.gif')); ?>";
          swal({
              title: "Procesando la información",
              text: "Espere mientras se procesa la información.",
              icon: gif,
              buttons: false,
              closeOnEsc: false,
              closeOnClickOutside: false
          });

          var url = "<?php echo e(url('/DepositStatus/')); ?>"+"/"+x;
          
          var s=$("input[type='radio'][name=status_p]:checked").val();
          
          var message=$('#razon_p').val();
          console.log(x,url,s);
          e.preventDefault();
          $.ajax({
                    url: url,
                    type: 'post',
                    //async: false,
                    data: {
                            _token: $('input[name=_token]').val(),
                            status_p: s,
                            message: message,
                          }, 
                    success: function (result) {

                                                $('#PayModal').toggle();
                                                $('.modal-backdrop').remove();
                                                var idTicketSales = x;
                                                var idUser = result.id;
                                                var medio = "deposito_cuenta_bancaria";
                                                console.log(result,idTicketSales,idUser,medio,s);
                                                if (s=="Aprobado") {
                                                  getDatilAgain(idTicketSales,medio,idUser,function callback(infoFactura) {
                                                    console.log(infoFactura);
                                                    var idFactura = infoFactura.id;
                                                    console.log(idFactura);
                                                    if (idFactura!=undefined) {
                                                      setFactura(idTicketSales,idFactura,function(ticketSales) {
                                                        console.log(ticketSales);
                                                        swal({
                                                          title: "Se ha "+s+" con exito",
                                                          icon: "success",
                                                          closeOnEsc: false,
                                                          closeOnClickOutside: false
                                                        })
                                                        .then((recarga) => {
                                                            location.reload();
                                                        });
                                                      });
                                                    } else {
                                                      getDatilAgain(idTicketSales,medio,idUser,callback);
                                                    }
                                                  });
                                                } else {
                                                  swal({
                                                    title: "Se ha "+s+" con exito",
                                                    icon: "success",
                                                    closeOnEsc: false,
                                                    closeOnClickOutside: false
                                                  })
                                                  .then((recarga) => {
                                                      location.reload();
                                                  });
                                                }
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>