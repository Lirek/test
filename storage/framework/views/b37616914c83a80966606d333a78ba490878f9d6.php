<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

  <div class="row mt">
    <h2><i class="fa fa-angle-right"></i> Solicitudes de proveedores</h2>
  </div>
  <div class="container">

    <ul class="nav nav-tabs nav-justified">
      <li class="active"><a data-toggle="tab" href="#pendientes" id="opcion1"><h4>Solicitudes pendientes</h4></a></li>
      <li><a data-toggle="tab" href="#rechazados" id="opcion2"><h4>Solicitudes rechazados</h4></a></li>
    </ul>

    <div class="tab-content text-center">
      <div id="pendientes" class="tab-pane fade in active">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="proveedoresPendientes">
              <thead>
                <tr>
                  <th class="non-numeric">Nombre Comercial</th>
                  <th class="non-numeric">Nombre Del Contacto</th>
                  <th class="non-numeric">Telefono Del Contacto</th>
                  <th class="non-numeric">Correo Del Contacto</th>
                  <th class="non-numeric">Tipo Contenido</th>
                  <th class="non-numeric">Sub-contenido</th>
                  <th class="non-numeric">Vendedor</th>
                  <th class="non-numeric">Fecha de registro</th>
                  <th class="non-numeric" id="solicitud">Solicitud</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('promoter.modals.ApplysViewsModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>

$( document ).ready(function() {

  var proveedoresPendientes = $('#proveedoresPendientes').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    bDestroy: true,

    ajax: '<?php echo url('SellerDataTable/En Proceso'); ?>',
    columns: [
      {data: 'nombreComercial', name: 'nombreComercial'},
      {data: 'nombreContacto', name: 'nombreContacto'},
      {data: 'telefono', name: 'telefono'},
      {data: 'email', name: 'email'},
      {data: 'tipo', name: 'tipo'},
      {data: 'subTipo', name: 'subTipo'},
      {data: 'vendedor', name: 'vendedor'},
      {data: 'created_at', name: 'created_at'},
      {data: 'solicitud', name: 'solicitud', orderable: false, searchable: false}
    ],
    language: {
      "processing": "Procesando...",
      "lengthMenu" : "Mostrar _MENU_ registros",
      "zeroRecords" : "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }
  });

  // Listar los aspirante a proveedor en espera de aprobacion
  $(document).on('click','#opcion1', function() {
    $("#solicitud").text("Solicitud");
    var proveedoresPendientes = $('#proveedoresPendientes').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      bDestroy: true,

      ajax: '<?php echo url('SellerDataTable/En Proceso'); ?>',
      columns: [
        {data: 'nombreComercial', name: 'nombreComercial'},
        {data: 'nombreContacto', name: 'nombreContacto'},
        {data: 'telefono', name: 'telefono'},
        {data: 'email', name: 'email'},
        {data: 'tipo', name: 'tipo'},
        {data: 'subTipo', name: 'subTipo'},
        {data: 'vendedor', name: 'vendedor'},
        {data: 'created_at', name: 'created_at'},
        {data: 'solicitud', name: 'solicitud', orderable: false, searchable: false}
      ],
      language: {
        "processing": "Procesando...",
        "lengthMenu" : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
  });
  // Listar los aspirante a proveedor en espera de aprobacion

  // Listar los aspirante a proveedor rechazados
  $(document).on('click','#opcion2', function() {
    $("#solicitud").text("Negaciones");
    var proveedoresPendientes = $('#proveedoresPendientes').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      destroy: true,

      ajax: '<?php echo url('SellerDataTable/Denegado'); ?>',
      columns: [
        {data: 'nombreComercial', name: 'nombreComercial'},
        {data: 'nombreContacto', name: 'nombreContacto'},
        {data: 'telefono', name: 'telefono'},
        {data: 'email', name: 'email'},
        {data: 'tipo', name: 'tipo'},
        {data: 'subTipo', name: 'subTipo'},
        {data: 'vendedor', name: 'vendedor'},
        {data: 'created_at', name: 'created_at'},
        {data: 'solicitud', name: 'solicitud', orderable: false, searchable: false}
      ],
      language: {
        "processing": "Procesando...",
        "lengthMenu" : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
  });
  // Listar los aspirante a proveedor rechazados

  // Cambiar estatus del aspirante a proveedor
  $(document).on('click', '#statusApplys', function() {
    var x = $(this).val();
    $( "#formStatus" ).on( 'submit', function(e) {
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
      });
      var s = $("input[type='radio'][name=status]:checked").val();
      var message = $('#razon').val();
      var url = 'AdminAproveOrDenialApplys/'+x;
      console.log(s,message,url,x);
      e.preventDefault();
      $.ajax({
        url: url,
        type: 'post',
        data: {
          _token: $('input[name=_token]').val(),
          status: s,
          message: message
        }, 
        success: function (result) {
          if (s=="Aprobado") {
            s = "Pre-aprobado";
          }
          $('#myModal').toggle();
          $('.modal-backdrop').remove();
          swal("Se ha "+s+" con éxito","","success")
          .then((recarga) => {
            location.reload();
          });
          $('#album'+x).fadeOut();
        },
        error: function (result) {
          swal('Existe un Error en su Solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
          console.log(result);
        }
      });
      /*
      */
    });
  });
  // Cambiar estatus del aspirante a proveedor

  // Eliminar vendedor del aspitante a proveedor
  $(document).on('click', '#x', function() {
    var apply = $(this).attr('value1');
    var promoter = $(this).attr('value2');
    var url = 'delete_promoter_from/'+apply+'/'+promoter;
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
      type:'get',
      dataType:"json",
      success: function(data) {
        swal("Se ha retirado el promotor de la solicitud con éxito","","success")
        .then((recarga) => {
          location.reload();
        });
        /*
        var button = '<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored" id="add_promoter_to" value="'+apply+'" data-toggle="modal" data-target="#AssingPromoter"><i class="material-icons">add</i> </button><div class="mdl-tooltip" data-mdl-for="add_promoter_to">Asignar Promotor para la <strong>Gestion</strong></div>';
        $("#apply_td"+apply).prepend(button).hide().fadeIn();
        $("#a_"+promoter+"_"+apply).fadeOut();
        $("#a_"+promoter+"_"+apply).remove();
        */
      },
      error: function(data) {
        swal("NO permitido por favor recargue la pagina","","error")
        .then((recarga) => {
          location.reload();
        });
      },
    });
  });
  // Eliminar vendedor del aspitante a proveedor

  // Asignar vendedor del aspitante a proveedor
  $(document).on('click', '#add_promoter_to', function() {
    var apply = $(this).val(); // id del aspirante
    console.log(apply);
    $( "#AssingPromoterForm" ).on( 'submit', function(e){
      var gif = "<?php echo e(asset('/sistem_images/loading.gif')); ?>";
      swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
      });
      var promoter = $("#sel1").val(); // id del vendedor
      var name = $( "#sel1 option:selected" ).text(); // nombre del vendedor
      var parametros = apply+"/"+promoter;
      var url_2 = 'AddSalesMan/'+parametros;
      console.log(promoter,name,url_2);
      e.preventDefault();
      $.ajax({
        url: url_2,
        type:'get',
        dataType: 'json' ,
        success: function(result){
          console.log(result);
          swal('Promotor asignado con exito','','success')
          .then((recarga) => {
            location.reload();
          });
          /*
          var add = '<span class="mdl-chip mdl-chip--deletable" id="a_'+promoter+'_'+apply+'">  <span class="mdl-chip__text" id="promoter_assing">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+apply+'" value2="'+promoter+'" name="apply" id="x"> <i class="material-icons">cancel</i> </button></span>';
          var row =  $("#apply_td"+apply);
          $("#add_promoter_to").fadeOut();
          row.prepend(add);
          */
        },
        error: function(result){
          console.log(result);
          swal("NO permitido por favor recargue la pagina","","error")
          .then((recarga) => {
            location.reload();
          });
        },
      });
      /*
      */
    });
  });
  // Asignar vendedor del aspitante a proveedor

  // Listar las negaciones
  $(document).on('click', '#denegado', function() {
    var idApply = $(this).val(); // id del aspirante
    var modulo = "Applys Seller";
    var url = "<?php echo url('viewRejection/"+idApply+"/"+modulo+"'); ?>";
    var historialRechazo = $('#historialRechazo').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      destroy: true,

      ajax: url,
      columns: [
        {data: 'razon', name: 'razon'},
        {data: 'created_at', name: 'created_at'}
      ],
      language: {
        "processing": "Procesando...",
        "lengthMenu" : "Mostrar _MENU_ registros",
        "zeroRecords" : "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst":    "Primero",
          "sLast":     "Último",
          "sNext":     "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      order: [ 1, "desc" ],
      footerCallback: function(row, data, start, end, display){
        $("#totalNegaciones").text("Total de negaciones: "+end);
      }
    });
  });
  // Listar las negaciones



  /*
  $("#phone_s").intlTelInput();
  function yesnoCheck() {
    if (document.getElementById('option-2').checked) {
      $('#if_no').show();
    } else {
      $('#if_no').hide();
      $('#razon').val('');
    }
  };

      $(document).on('click', '#delete_applys', function() {
        var promoter = $(this).attr('value1'); 
        var apply = $(this).attr('value2');

       $.ajax({

                    url: 'delete_applys_from/'+promoter+'/'+apply,
                    type:'GET',
                    data: 'json',

                    success : function(data)
                    {
                      swal("Se Ha Retirado Con Exito La Solicitud","","success");
                      $("#p_"+promoter+"_"+apply).fadeOut();
                    },

                    error: function(data) 
                    {
                      swal('Error en Solicitud Por Favor Recargue la Pagina','','error');
                    }



                });

      });

  */

});
</script>

<?php $__env->stopSection(); ?>
                            


<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>