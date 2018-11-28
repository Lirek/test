<?php $__env->startSection('css'); ?>
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
  <div class="row mt">
    <h2><i class="fa fa-angle-right"></i>Proveedores Registrados</h2>
  </div>
  <div class="container">

    <div class="tab-content text-center">
      <div id="pendientes" class="tab-pane fade in active">
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="display responsive no-wrap table table-bordered table-striped" width="100%" id="proveedores">
              <thead>
                <tr>
                  <th class="non-numeric">Nombre del contacto</th>
                  <th class="non-numeric">Logo de la empresa</th>
                  <th class="non-numeric">Correo</th>
                  <th class="non-numeric">RUC</th>
                  <th class="non-numeric">Módulos</th>
                  <th class="non-numeric">Opciones</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt">
    <h2><i class="fa fa-angle-right"></i>Módulos de Contenido</h2>
  </div>
  <div class="row mt">
    <?php $__currentLoopData = $acces_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
      <span class='badge'>
        <h4>
          ID: <?php echo e($modules->id); ?> || Nombre: <?php echo e($modules->name); ?>

        </h4>
      </span>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div><!-- /row -->

  <?php echo $__env->make('promoter.modals.SellersViewsModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>

  // listar los proveedores
  function listarProveedores() {
    var proveedores = $('#proveedores').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      destroy: true,

      ajax: '<?php echo url('SellerDataTable'); ?>',
      columns: [
        {data: 'nombre', name: 'nombre'},
        {data: 'logo', name: 'logo'},
        {data: 'correo', name: 'correo'},
        {data: 'ruc', name: 'ruc'},
        {data: 'modulos', name: 'modulos'},
        {data: 'opciones', name: 'opciones', orderable: false, searchable: false}
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
  }
  // listar los proveedores


$(document).ready(function (e){

  listarProveedores();

  // quitar modulo
  $(document).on('click', '#x', function() {
    
    var modules = $(this).attr('value1');
    var seller = $(this).attr('value2');
    var parametros = seller+"/"+modules;
    var url = "<?php echo e(url('delete_mod/')); ?>"+"/"+parametros;
    console.log(modules,seller,url);
    $.ajax({
      url: url,
      type:'get',
      dataType:"json",
      success: function(data) {
        swal("Se ha retirado el permiso del módulo con éxito","","success")
        .then((recarga) => {
          //location.reload();
          listarProveedores();
        });
        //alert("Se ha retirado el permiso del módulo con éxito");
        //$("#m_"+modules+"_"+seller).hide();
      },
      error: function(data) {
        swal("Ha ocurrido un error por favor recargue la pagina","","error")
        .then((recarga) => {
          location.reload();
        });
        //alert("NO Permitido Por Favor Recargue la Pagina");
      }
    });
  });
  // quitar modulo

  // asignar modulo
  $(document).on('click', '#add_module', function() {
    var x = $(this).attr('value');
    $('#subMenuMusica').hide();
    $('#subMenuLibro').hide();
    $('#sel1').on('change', function () {
      if (this.value == 'Musica') {
        $('#subMenuLibro').hide();
        $('#subMenuMusica').show();
        $('#subMenuMusica').attr('required','required');
      } else if (this.value == 'Libros') {
        $('#subMenuMusica').hide();
        $('#subMenuLibro').show();
        $('#subMenuLibro').attr('required','required');
      } else {
        $('#subMenuMusica').hide();
        $('#subMenuLibro').hide();
      }
    });
    $( "#AddModules" ).on( 'submit', function(e){
      $('#ModalModules').modal('hide');
      var modules = $("#sel1").val();
      var submodulo = null;
      if (modules=="Musica") {
        submodulo = $('#sub_desired1').val();
      }
      if (modules=="Libros") {
        submodulo = $('#sub_desired2').val();
      }
      console.log(modules,submodulo);
      var url = "<?php echo e(url('admin_add_module/')); ?>/"+x;
      console.log(x,url);
      /*
      var name = $( "#sel1 option:selected" ).text();
      var row = $("#modules_td"+x);
      var add = '<span class="mdl-chip mdl-chip--deletable" id="m_'+modules+'_'+x+'">  <span class="mdl-chip__text" id="modules">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+modules+'" value2="'+x+'" name="module" id="x"> <i class="material-icons">cancel</i> </button></span>';
      */
      e.preventDefault();
      $.ajax({
        url: url,
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          acces: modules,
          submodulo: submodulo
        },
        success: function (result) {
          console.log(result);
          swal("Acceso concedido con éxito","","success")
          .then((recarga) => {
            //location.reload();
            listarProveedores();
          });
          //alert('Acceso Concedido Con Exito');
          //row.prepend(add);
        },
        error: function (result) {
          //alert('Error en Su solicitud Por Favor Recargue la Pagina');
          console.log(result);
          swal("Error en su solicitud, por favor recargue la pagina","","error")
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });
  });
  // asignar modulo

  // Modificar el estatus de un proveedor
  $(document).on('click','#ModifySellers', function() {
    var x = $(this).val();
    console.log(x);
    $("#FormStatusSeller").on('submit', function(e){
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
      var url = "<?php echo e(url('AproveOrDenialSeller/')); ?>/"+x;
      e.preventDefault(); 
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          _token: $('input[name=_token]').val(),
          status: s,
          message: message
        }, 
        success: function (result) {
          console.log(result);
          $('#myModal').toggle();
          $('.modal-backdrop').remove();
          swal("Se ha "+s+" con éxito","","success")
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
        },
      });  
    });  
  });
  // Modificar el estatus de un proveedor

  // mostrar informacion del proveedor
  $(document).on('click', '#seller', function() {
    var idSeller = $(this).val();
    console.log(idSeller);
    var url = "<?php echo e(url('/infoSeller/')); ?>/"+idSeller;
    $.ajax({
      url: url,
      type: 'get',
      dataType: 'json', 
      success: function (result) {
        console.log(result);
        if (result.logo!=null) {  
          var logoProveedor = "<?php echo e(asset('/')); ?>/"+result.logo;
          $("#logoProveedor").attr('src',logoProveedor);
        } else {
          $("#logoProveedor").attr('src',"<?php echo e(asset('plugins/img/sinPerfil.png')); ?>");
        }
        $("#nombreProveedor").text(result.name);
        $("#correoProveedor").text(result.email);
        $("#telefonoProveedor").text(result.tlf);
        $("#rucProveedor").text(result.ruc_s);
        if (result.adj_ruc!=null) { 
          var imgRucProveedor = "<?php echo e(asset('/')); ?>"+result.adj_ruc;
          $("#imgRucProveedor").show();
          $("#mensajeImgRucProveedor").hide();
          $("#imgRucProveedor").attr('src',imgRucProveedor);
        } else {
          $("#imgRucProveedor").hide();
          $("#mensajeImgRucProveedor").show();
          $("#mensajeImgRucProveedor").text("No tiene su imagen de RUC registrada");
        }
        $("#descripcionProveedor").text(result.descs_s);
        $("#ticketsProveedor").text(result.credito);
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
  // mostrar informacion del proveedor

  /*
  $(document).on('click','#viewLogo', function() {
    $("video").attr('src',rutaPelicula);
  });
  */


  /*
  function yesnoCheck() {
      if (document.getElementById('option-2').checked) 
      {
          $('#if_no').show();
      } 
      else 
      {
          $('#if_no').hide();
          $('#razon').val('');
      }
    };
  */
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('promoter.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>