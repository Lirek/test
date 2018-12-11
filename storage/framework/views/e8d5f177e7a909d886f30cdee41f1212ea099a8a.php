<?php $__env->startSection('main'); ?>
 <div class="row mt">
    <h3>Clientes Externos</h3>
</div>

<div class="row mt">
        
        <table class="table table-bordered table-striped table-condensed" id="Clients">            
            <thead>
                <tr>
                  <th class="non-numeric">ID</th>
                  <th class="non-numeric">Nombre</th>
                  <th class="non-numeric">Url del Sitio</th>
                  <th class="non-numeric">Url de la Peticion</th>
                  <th class="non-numeric">Email de Contatcto</th>
                  <th class="non-numeric">Callback</th>
                  <th class="non-numeric">Token del Cliente</th>
                  <th class="non-numeric">ID Secreto Del Cliente</th>
                  <th class="non-numeric">Acciones</th>
              </tr>
              </thead>
          </table>

</div>
<div class="row mt">

<button  id="SalesmanAdd" class="" data-toggle="modal" data-target="#NewClient">+</button>

</div>
<?php echo $__env->make('promoter.modals.ExternalClientsViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/jquery.mlens-1.7.min.js')); ?>"></script>
<script>
  $(document).ready(function(){

    var Clients = $('#Clients').DataTable({
          processing: true,
          serverSide: true,
            responsive: true,

          ajax: '<?php echo url('ExternalClientsDataTable'); ?>',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'client_name', name: 'client_name'},
              {data: 'url_host', name: 'url_host'},
              {data: 'petition_url', name: 'petition_url'},
              {data: 'admin_email', name: 'admin_email'},
              {data: 'callback_url', name: 'callback_url'},
              {data: 'client_token', name: 'client_token'},
              {data: 'client_secret_id', name: 'client_secret_id'},
              {data: 'Actions', name: 'Actions'},
          ]
      });

    $( "#NewExternalClient" ).on( 'submit', function(e)
      {
        
      var client_name = $('#client_name').val();
      var admin_email = $('#admin_email').val();
      var url_host = $('#url_host').val();
      var petition_url = $('#petition_url').val();
      var callback_url = $('#callback_url').val();

      e.preventDefault();

            $.ajax({
        url: '<?php echo url('SaveExternalClients'); ?>',
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          client_name: client_name,
          admin_email: admin_email,
          url_host: url_host,
          petition_url: petition_url,
          callback_url: callback_url
        },
        success: function (result) {
            location.reload();
        },
        error: function (result) {
          console.log(result);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
      });
  
    $(document).on('click', '#edit', function() 
    {
      var id = $(this).val();
      var url = 'GetExternalClient/'+id;

              $.ajax({
                  url: url,
                  type: 'GET',
                  success: function (data) {

                                    var client_name = $('input[name=client_name_u]').val(data.client_name);
                                    var admin_email = $('input[name=admin_email_u]').val(data.admin_email);
                                    var url_host = $('input[name=url_host_u]').val(data.url_host);
                                    var petition_url = $('input[name=petition_url_u]').val(data.petition_url);
                                    var callback_url = $('input[name=callback_url_u]').val(data.callback_url);
                                      $("#UpdateExternalClient").attr('action', 'UpdateExternalClient/'+id);

                                            },

                  error: function (data) {
                                            swal('Existe un Error en su Solicitud','','error');
                                            console.log(data);
                                           }   

              });
    });

    $(document).on('click', '#delete', function() 
    {
      var id = $(this).val();
      console.log(id);
      $("#DeleteExternalClient").attr('action', 'DeleteExternalClient/'+id);

    });
  

  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>