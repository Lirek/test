<?php $__env->startSection('main'); ?>

<div class="row mt">
  <h2><i class="fa fa-angle-right"></i>Radios</h2>
</div>
    <div class="row mt">
      <div class="col-lg-12">
        <div class="content-panel">
          
                <table class="table table-bordered table-striped table-condensed" id="Radio">            
                    <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Logo</th>
                              <th>Streaming</th>
                              <th>Proveedor</th>
                              <th>Redes Sociales</th>
                              <th>Estatus</th>
                            </tr>
                    </thead>

                  </table>
          </div>
        </div>
      </div>
<?php echo $__env->make('promoter.modals.RadioViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

$(document).ready(function(){

  var Radio = $('#Radio').DataTable({
            processing: true,
            serverSide: true,
            ajax: '<?php echo url('RadioData'); ?>',
            columns: [
                {data: 'name_r', name: 'name_r'},
                {data: 'logo', name: 'logo',  orderable: false, searchable: false},
                {data: 'streaming', name: 'streaming'},
                {data: 'Seller.name', name: 'Seller.name'},
                {data: 'SocialMedia', name: 'SocialMedia',orderable: false, searchable: false},
                {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
            ]
        });

    $(document).on('click', '#status', function() {    
        var x = $(this).val();

                    $( "#formStatus" ).on( 'submit', function(e)
                {
                    var s=$("input[type='radio'][name=status]:checked").val();
                    var url = 'admin_radio/'+x;
                    e.preventDefault();
                    $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                                    _token: $('input[name=_token]').val(),
                                    status: s,
                                  }, 
                            success: function (result) {

                                                        $('#myModal').toggle();
                                                        $('.modal-backdrop').remove();
                                                        alert("Se ha "+s+" con exito");
                                                        Radio.ajax.reload();
                                                        },

                            error: function (result) {
                            alert('Existe un Error en su Solicitud');
                            console.log(result);
                            }
                            });  
                                            });

    });

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>