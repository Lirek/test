    <style>
        #image-preview {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 80%;
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
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 80%;
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

        .curvaBoton{border-radius: 20px;}
    </style>
<?php $__env->startSection('main'); ?>
    <span class="card-title grey-text"><h3>Radios</h3></span>
    <a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar radio" href="#NewRadio">
        <i class="material-icons">add</i>
    </a>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnProceso"><a class="active" href="#test1">En proceso</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="rechazados"><a href="#test2">Rechazados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Streaming</th>
                    <th>Proveedor</th>
                    <th>Redes sociales</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id="radios">
            </tbody>
        </table>
    </div>
    
<?php echo $__env->make('promoter.modals.RadioViewModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>

    function radios(status) {
        $("#radios").empty();
        var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
        swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
        });
        $.ajax({
            url: "<?php echo url('RadioData'); ?>/"+status,
            type:'GET',
            dataType: "json",
            success: function (data) {
                swal.close();
                console.log(data);
                $.each(data,function(i,info) {
                    if (info.logo!=null) {
                        var logo = 
                        "<img class='materialboxed' src='<?php echo asset('"+info.logo+"'); ?>' style='width:70px;height:70px;' alt=Logo>";
                    } else {
                        var logo = "No tiene logo registrado";
                    }
                    if (info.streaming!=null) {
                        var streaming = 
                        "<audio controls='' src='"+info.streaming+"'>"+
                            "<source src='"+info.streaming+"' type='audio/mpeg'>"+
                        "</audio>";
                    } else {
                        var streaming = "No tiene streaming";
                    }
                    if (info.seller!=null) {
                        var proveedor = info.seller.name;
                    } else {
                        var proveedor = "No tiene proveedor";
                    }
                    var redes = "";
                    if (info.facebook!=null) {
                        var facebook = 
                        "<a href="+info.facebook+" class='btn-floating blue darken-4' target='_blank'>"+
                            "<i class='mdi mdi-facebook'></i>"+
                        "</a>";
                        redes = redes+facebook;
                    }
                    if (info.google!=null) {
                        var youtube =
                        "<a href="+info.google+" class='btn-floating red accent-4' target='_blank'>"+
                            "<i class='mdi mdi-youtube'></i>"+
                        "</a>";
                        redes = redes+youtube;
                    }
                    if (info.twitter!=null) {
                        var twitter = 
                        "<a href="+info.twitter+" class='btn-floating blue lighten-2' target='_blank'>"+
                            "<i class='mdi mdi-twitter'></i>"+
                        "</a>";
                        redes = redes+twitter;
                    }
                    if (info.instagram!=null) {
                        var instagram = 
                        "<a href="+info.instagram+" class='btn-floating purple-gradient' target='_blank'>"+
                            "<i class='mdi mdi-instagram'></i>"+
                        "</a>";
                        redes = redes+instagram;
                    }
                    if (redes=="") {
                        redes = "No tiene enlaces registrados";
                    }
                    var status = 
                   "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#myModal' id='status'>Cambiar</a><br>";
                    var edit = 
                    "<a class='btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton' value='"+info.id+"' id='editRadio' href='#updateRadio'>"+
                        "<i class='material-icons'>edit</i>"+
                    "</a>";
                    var eliminar = 
                    "<a class='btn-small waves-effect waves-light btn red curvaBoton' id='deleteRadio' value='"+info.id+"'>"+
                        "<i class='material-icons'>delete</i>"+
                    "</a>";
                    var filas = "<tr><td>"+
                    info.name_r+"</td><td>"+
                    logo+"</td><td>"+
                    streaming+"</td><td>"+
                    proveedor+"</td><td>"+
                    redes+"</td><td>"+
                    status+edit+eliminar+"</td></tr>";
                    $("#radios").append(filas);
                });
                $('.materialboxed').materialbox();
            },
            error:function(data) {
                swal('Existe un error en su solicitud','','error')
                .then((recarga) => {
                    location.reload();
                });
                console.log(data);
            }
        });
    }

    $(document).ready(function(){
        radios("En Proceso");
    });

    $(document).on('click', '#EnProceso', function() {
        radios("En Proceso");
    });

    $(document).on('click', '#aprobados', function() {
        radios("Aprobado");
    });

    $(document).on('click', '#rechazados', function() {
        radios("Denegado");
    });


    $(document).on('click', '#status', function() {
        var x = $(this).attr("value");
        $("#formStatus").on('submit', function(e) {
            var s = $("input[type='radio'][name=status]:checked").val();
            var message = $('#razon').val();
            var url = "<?php echo e(url('statusRadio/')); ?>/"+x;
            console.log(url,s,message,$('input[name=_token]').val());
            e.preventDefault();
            var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
            swal({
              title: "Procesando la información",
              text: "Espere mientras se procesa la información.",
              icon: gif,
              buttons: false,
              closeOnEsc: false,
              closeOnClickOutside: false
            });
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    _token: $('input[name=_token]').val(),
                    status: s,
                    reason: message
                },
                success: function (result) {
                    console.log(result);
                    swal('Radio '+s+' con exito','','success')
                    .then((recarga) => {
                        location.reload();
                    });
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
    });

    $(document).on('click', '#deleteRadio', function() {
        var radio = $(this).attr("value");
        swal({
            title: "¿Desea realmente eliminar la radio?",
            icon: "warning",
            dangerMode: true,
            buttons: ["Cancelar", "Si"]
        }).then((confir) => {
            if (confir) {
                var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
                swal({
                    title: "Procesando la información",
                    text: "Espere mientras se procesa la información.",
                    icon: gif,
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false
                });
                var url = "<?php echo e(url('DeleteBackendRadio')); ?>/"+radio;
                $.ajax({
                    url: url,
                    type:'get',
                    dataType:"json",
                    success: function(data) {
                        console.log(data);
                        swal('Eliminado exitosamente','','success')
                        .then((recarga) => {
                            location.reload();
                        });
                    },
                    error: function(data) {
                        console.log(data);
                        swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
            }
        });
    });

    $(document).on('click', '#editRadio', function() {
        var radio = $(this).attr("value");
        console.log(radio);
        var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
        swal({
            title: "Procesando la información",
            text: "Espere mientras se procesa la información.",
            icon: gif,
            buttons: false,
            closeOnEsc: false,
            closeOnClickOutside: false
        });
        $.ajax({
            url : "<?php echo e(url('BackendRadio/')); ?>/"+radio,
            type: "GET",
            dataType: "json",
            success: function(data) {
                swal.close();
                console.log(data,data.logo);
                $("#idUpdate").val(radio);
                $("#name_r_u").val(data.name_r);
                $("#email_c_u").val(data.email_c);
                $("#streaming_u").val(data.streaming);
                $("#youtube_u").val(data.google);
                $("#instagram_u").val(data.instagram);
                $("#facebook_u").val(data.facebook);
                $("#twitter_u").val(data.twitter);
                $("#img_u").attr('src',data.logo);
            },
            error: function(data) {
                swal('Existe un error en su solicitud','','error')
                .then((recarga) => {
                    location.reload();
                });
            }
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


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>