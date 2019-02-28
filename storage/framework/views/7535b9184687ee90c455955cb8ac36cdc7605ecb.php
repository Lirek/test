<?php $__env->startSection('css'); ?>
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
  <span class="card-title grey-text"><h3>Proveedores Registrados</h3></span>

  <table class="responsive-table">
    <thead>
      <tr>
        <th><i class="material-icons"></i>Nombre del contacto</th>
        <th><i class="material-icons"></i>Logo de la empresa</th>
        <th><i class="material-icons"></i>Correo</th>
        <th><i class="material-icons"></i>Módulos</th>
        <th><i class="material-icons"></i>Estatus</th>
        <th><i class="material-icons"></i>Fecha de registro</th>
        <th><i class="material-icons"></i>Opciones</th>
      </tr>
    </thead>
    <tbody id="proveedores">
    </tbody>
  </table>

  <span class="card-title grey-text"><h3>Módulos de Contenido</h3></span>

  <div class="row">
    <?php $__currentLoopData = $acces_modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modules): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col s4">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">ID: <?php echo e($modules->id); ?> || Nombre: <?php echo e($modules->name); ?></span>
            </div>
          </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <?php echo $__env->make('promoter.modals.SellersViewsModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>


$(document).ready(function (e){
  $('.modal').modal();

  var ruta = "<?php echo e(url('SellerDataTable')); ?>";
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
    url: ruta,
    type:'GET',
    dataType: "json",
    success: function (data) {
      swal.close();
      console.log(data);
      $.each(data,function(i,info) {
        // para colocar el logo 
        if (info.logo!=null) {
          var logo = "<img class='materialboxed' width='100' height='90' src='<?php echo asset('"+info.logo+"'); ?>'";
        } else {
          var logo = "No tiene logo registrado";
        }
        // para colocar el logo 
        // para colocar los modulos
        var agregar = "";
        if (info.roles.length!=0) {
          var modulos = "";
          $.each(info.roles,function(i,infoRoles) {
            modulos = modulos+
            "<span class='new badge grey darken-1' data-badge-caption='"+infoRoles.name+"' style='padding:0px 0px'>"+
              "<i class='material-icons right' value1='"+infoRoles.id+"' value2='"+info.id+"' name='module' id='x' style='cursor:pointer'>cancel"+
              "</i>"+
            "</span> ";
          });
        } else {
          var modulos = "El usuario no tiene módulos asignados ";
        }
        // para colocar los modulos
        if (info.estatus!='Aprobado') {
          var opciones = 
            "<a class='btn green curvaBoton modal-trigger' value="+info.id+" href='#myModal' id='ModifySellers'>Aceptarlo</a>";
        } else {
          var opciones = 
            "<a class='btn red curvaBoton modal-trigger' value="+info.id+" href='#myModal' id='ModifySellers'>Rechazarlo</a>";
          agregar = 
            "<a class='btn-floating green modal-trigger' href='#ModalModules' value='"+info.id+"' id='add_module'>"+
              "<i class='material-icons right' style='cursor:pointer'>add</i>"+
            "</a>";
        }
        opciones = opciones + "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#ModalSeller' id='seller'>Más información</a>";
        modulos = modulos + agregar;
        var fecha = moment(info.created_at).format('DD/MM/YYYY');
        // llenar la tabla
        var filas = "<tr><td>"+
        info.name+"</td><td>"+
        logo+"</td><td>"+
        info.email+"</td><td>"+
        //info.ruc_s+"</td><td>"+
        modulos+"</td><td>"+
        info.estatus+"</td><td>"+
        fecha+"</td><td>"+
        opciones+"</td></tr>";
        $("#proveedores").append(filas);
        // llenar la tabla
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

  // asignar modulo
  $(document).on('click', '#add_module', function() {
    $('select').formSelect();
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
      $('#ModalModules').modal('close');
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
      console.log(x,url,modules,submodulo);
      //var name = $( "#sel1 option:selected" ).text();
      //var row = $("#modules_td"+x);
      //var add = '<span class="mdl-chip mdl-chip--deletable" id="m_'+modules+'_'+x+'">  <span class="mdl-chip__text" //id="modules">'+name+'</span> <button type="button" class="mdl-chip__action" value1="'+modules+'" value2="'+x+'" //name="module" id="x"> <i class="material-icons">cancel</i> </button></span>';
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
            location.reload();
            //listarProveedores();
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
      /*
      */
    });
  });
  // asignar modulo

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
          location.reload();
          //listarProveedores();
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

  // Modificar el estatus de un proveedor
  $(document).on('click','#ModifySellers', function() {
    var x = $(this).attr("value");
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
      console.log(s,message,url);
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
    var idSeller = $(this).attr('value');
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
          var ext = result.adj_ruc.split('.').pop();
          var imgRucProveedor = "<?php echo e(asset('/')); ?>"+result.adj_ruc;
          if (ext.toLowerCase()=='pdf') {
            $("#imgRucProveedor").hide();
            $("#mensajeImgRucProveedor").hide();
            $("#labelImg").hide();
            $("#pdfruc").show();
            $("#pdfruc").attr('href',imgRucProveedor);
          } else {
            $("#labelImg").show();
            $("#imgRucProveedor").show();
            $("#pdfruc").hide();
            $("#mensajeImgRucProveedor").hide();
            $("#imgRucProveedor").attr('src',imgRucProveedor);
          }
        } else {
          $("#imgRucProveedor").hide();
          $("#mensajeImgRucProveedor").show();
          $("#mensajeImgRucProveedor").text("No tiene su imagen de RUC registrada");
        }
        $("#descripcionProveedor").text(result.descs_s);
        if (result.credito!=null) {
          $("#ticketsProveedor").text(result.credito);
        } else {
          $("#ticketsProveedor").text("No tiene tickets disponibles");
        }
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