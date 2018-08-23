    <style>
        #image-preview {
            width: 400px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

         #image-preview_u {
            width: 400px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #image-preview_u input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview_u label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }

        input:invalid {
            border: 1px solid red;
        }

        input:valid {
            border: 1px solid green;
        }
    </style>
<?php $__env->startSection('main'); ?>

<div class="row mt">
    <h2>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home" id="all_radios">Proveedores Radiales</a></li>
        <li><a data-toggle="tab" href="#menu1" id="backend_radios">Radios del Sistema</a></li>    
      </ul>
  </h2>
</div>
    <div class="row mt">
      <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
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

          <div id="menu1" class="tab-pane fade">
            <div class="col-lg-12">
              <div class="content-panel">
                  <table class="table table-bordered table-striped table-condensed" id="BackendRadio">            
                    <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Logo</th>
                              <th>Streaming</th>
                              <th>Redes Sociales</th>
                              <th>Acciones</th>                              
                            </tr>
                    </thead>
                  </table>
                  <br>

                  <button class="btn-info" data-toggle="modal" data-target="#NewRadio">Añadir</button>
              
              </div>
            </div>
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

    $(document).on('click', '#backend_radios', function() {
      
        var BackendRadio = $('#BackendRadio').DataTable({
                processing: true,
                serverSide: true,
                ajax: '<?php echo url('BackendRadios'); ?>',
                columns: [
                    {data: 'name_r', name: 'name_r'},
                    {data: 'logo', name: 'logo',  orderable: false, searchable: false},
                    {data: 'streaming', name: 'streaming'},
                    {data: 'SocialMedia', name: 'SocialMedia',orderable: false, searchable: false},
                    {data: 'Actions', name: 'Actions', orderable: false, searchable: false}
                ]
            });

        $(document).on('click', '#all_radios', function() {
            
             BackendRadio.destroy();
        });
      
        $(document).on('click', '#delete', function() {
            var x = $(this).val();
          
            $( "#formDelete" ).on( 'submit', function(e){
                var url = 'DeleteBackendRadio/'+x;
              
                e.preventDefault();
                
                $.ajax({
                                        url: url,
                                        type: 'POST',
                                        data: {
                                                _token: $('input[name=_token]').val()
                                              },
                                        success: function (result) {

                                                                    $('#DeleteRadio').toggle();
                                                                    $('.modal-backdrop').remove();
                                                                    BackendRadio.ajax.reload();


                                                                    },

                                        error: function (result) {
                                        swal('Existe un Error en su Solicitud','','error');
                                        console.log(result);
                                        }

                      });
            });
        });
    });

    $(document).on('click', '#edit', function() {

      var id = $(this).val();
      var url = 'BackendRadio/'+id;

        $.ajax({
                  url: url,
                  type: 'GET',
                  success: function (data) {

                                    var name_r = $('input[name=name_r_u]').val(data.name_r);
                                    var streaming = $('input[name=streaming_u]').val(data.streaming);
                                    var email_c = $('input[name=email_c_u]').val(data.email_c);
                                    var youtube = $('input[name=youtube_u]').val(data.google);
                                    var instagram = $('input[name=instagram_u]').val(data.instagram);
                                    var facebook = $('input[name=facebook_u]').val(data.facebook);
                                    var twitter = $('input[name=twitter_u]').val(data.twitter);
                                    var logo = $('#image-preview_u').css('background-image', 'url(' + data.logo + ')');
                                      $("#UpdateRadioForm").attr('action', 'UpdateBackendRadio/'+id);

                                            },

                  error: function (data) {
                                            swal('Existe un Error en su Solicitud','','error');
                                            console.log(data);
                                           }   

              });
    });
    

   

    $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
            });
     $.uploadPreview({
                input_field: "#image-upload_u",
                preview_box: "#image-preview_u",
                label_field: "#image-label_u"
            });

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>