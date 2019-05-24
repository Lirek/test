@extends('promoter.layouts.app')
@section('css')
    <style>
      .curvaBoton{border-radius: 20px;}
    </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Solicitudes de proveedores</h3></span>
  <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
    <li class="tab" id="pendientes"><a class="active" href="#test1">Solicitudes pendientes</a></li>
    <li class="tab" id="rechazados"><a href="#test2">Solicitudes rechazadas</a></li>
  </ul>
  <div id="test1" class="col s12">
    <table class="responsive-table">
      <thead>
        <tr>
          <th><i class="material-icons"></i>Nombre comercial</th>
          <th><i class="material-icons"></i>Nombre del contacto</th>
          {{--<th><i class="material-icons"></i>Teléfono del contacto</th>--}}
          <th><i class="material-icons"></i>Correo del contacto</th>
          <th><i class="material-icons"></i>Tipo contenido</th>
          <th><i class="material-icons"></i>Sub-contenido</th>
          <th><i class="material-icons"></i>Vendedor</th>
          <th><i class="material-icons"></i>Fecha de registro</th>
          <th id="solicitud"><i class="material-icons"></i>Opciones</th>
        </tr>
      </thead>
      <tbody id="proveedores">
      </tbody>
    </table>
  </div>
  @include('promoter.modals.ApplysViewsModals')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
  function solicitud(status) {
    $("#proveedores").empty();
    var gif = "{{ asset('/sistem_images/loading.gif') }}";
    swal({
      title: "Procesando la información",
      text: "Espere mientras se procesa la información.",
      icon: gif,
      buttons: false,
      closeOnEsc: false,
      closeOnClickOutside: false
    });
    if (status=="En Proceso") {
      var ruta = "{{url('SellerApplyDataTable/En Proceso')}}";
    } else if (status=="Denegado") {
      var ruta = "{{url('SellerApplyDataTable/Denegado')}}";
    }
    $.ajax({
      url: ruta,
      type:'GET',
      dataType: "json",
      success: function (data) {
        swal.close();
        console.log(data);
        $.each(data,function(i,info) {
          if (info.sub_desired_m!=null) {
            var subTipo = info.sub_desired_m;
          } else {
            var subTipo = "No aplica";
          }
          if (info.salesman_id != null) {
            var vendedor = 
            info.salesman.name+
            "<span"+
              "<i class='material-icons right' value1='"+info.id+"' value2='"+info.salesman_id+"' id='x' style='cursor:pointer'>"+
                "cancel"+
              "</i>"+
            "</span>";
          } else {
            var vendedor = 
            "<a class='btn-floating green modal-trigger' href='#AssingPromoter' value='"+info.id+"' id='add_promoter_to'>"+
              "<i class='material-icons right' style='cursor:pointer'>add</i>"+
            "</a>";
          }
          var fecha = moment(info.created_at).format('DD/MM/YYYY');
          if (info.status=="Aprobado") { 
            var colorBoton = "btn-primary"; 
            var id = "statusApplys"; 
            var modal = "#myModal";
            var texto = info.status;
          }
          else if (info.status=="En Proceso") { 
            var colorBoton = "btn-warning"; 
            var id = "statusApplys"; 
            var modal = "#myModal";
            var texto = info.status;
          }
          else if (info.status=="Denegado") { 
            var colorBoton = "btn-danger"; 
            var id = "denegado"; 
            var modal = "#negado";
            var texto = "Ver degaciones";
          }
          var solicitud = "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href="+modal+" id="+id+">"+texto+"</a>";
          var filas = "<tr><td>"+
          info.name_c+"</td><td>"+
          info.contact_s+"</td><td>"+
          //info.phone_s+"</td><td>"+
          info.email+"</td><td>"+
          info.desired_m+"</td><td>"+
          subTipo+"</td><td>"+
          vendedor+"</td><td>"+
          fecha+"</td><td>"+
          solicitud+"</td></tr>";
          $("#proveedores").append(filas);
        });
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
  $(document).ready(function() {
    $('select').formSelect();
    solicitud("En Proceso");
  });
  // Listar los aspirante a proveedor en espera de aprobacion
  $(document).on('click','#pendientes', function() {
    solicitud("En Proceso");
  });
  // Listar los aspirante a proveedor en espera de aprobacion

  // Listar los aspirante a proveedor rechazados
  $(document).on('click','#rechazados', function() {
    solicitud("Denegado");
  });
  // Listar los aspirante a proveedor rechazados

  // Cambiar estatus del aspirante a proveedor
  $(document).on('click', '#statusApplys', function() {
    var x = $(this).attr("value");
    console.log(x);
    $("#formStatus").on('submit', function(e) {
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
      var url = "{{url('AdminAproveOrDenialApplys/')}}/"+x;
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
          swal("Se ha "+s+" con éxito","","success")
          .then((recarga) => {
            location.reload();
          });
        },
        error: function (result) {
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
          console.log(result);
        }
      });
    });
  });
  // Cambiar estatus del aspirante a proveedor

  // Eliminar vendedor del aspitante a proveedor
  $(document).on('click', '#x', function() {
    var apply = $(this).attr('value1');
    var promoter = $(this).attr('value2');
    var url = 'delete_promoter_from/'+apply+'/'+promoter;
    var gif = "{{ asset('/sistem_images/loading.gif') }}";
    swal({
      title: "Procesando la información",
      text: "Espere mientras se procesa la información.",
      icon: gif,
      buttons: false,
      closeOnEsc: false,
      closeOnClickOutside: false
    });
    swal({
      title: "¿Desea realmente eliminar al vendedor?",
      icon: "warning",
      dangerMode: true,
      buttons: ["Cancelar", "Si"]
    }).then((confir) => {
      if (confir) {
        $.ajax({
          url: url,
          type:'get',
          dataType:"json",
          success: function(data) {
            swal("Se ha retirado el promotor de la solicitud con éxito","","success")
            .then((recarga) => {
              location.reload();
            });
          },
          error: function(data) {
            swal("NO permitido por favor recargue la pagina","","error")
            .then((recarga) => {
              location.reload();
            });
          },
        });
      }
    });
  });
  // Eliminar vendedor del aspitante a proveedor

  // Asignar vendedor del aspitante a proveedor
  $(document).on('click', '#add_promoter_to', function() {
    var apply = $(this).attr("value"); // id del aspirante
    console.log(apply);
    $("#AssingPromoterForm").on('submit', function(e){
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
        },
        error: function(result){
          console.log(result);
          swal("NO permitido por favor recargue la pagina","","error")
          .then((recarga) => {
            location.reload();
          });
        },
      });
    });
  });
  // Asignar vendedor del aspitante a proveedor

  // Listar las negaciones
  $(document).on('click', '#denegado', function(e) {
    var idApply = $(this).attr("value"); // id del aspirante
    var modulo = "Applys Seller";
    var url = "{!! url('viewRejection/"+idApply+"/"+modulo+"') !!}";
    console.log(idApply, modulo, url);
    $("#historial").empty();
    e.preventDefault();
    $.ajax({
      url: url,
      type: 'GET',
      dataType: "json",
      success: function (result) {
        console.log(result);
        $("#total").show();
        $("#total").text("Tiene un total de rechazos de: "+result.length);
        $.each(result,function(i,info) {
          var filas = "<tr><td>"+
          info.reason+"</td><td>"+
          moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+"</td></tr>";
          $("#historial").append(filas);
        });
      },
      error: function (result) {
        swal('Existe un error en su solicitud','','error')
        .then((recarga) => {
          location.reload();
        });
        console.log(result);
      }
    });
    /*
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
    */
  });
  // Listar las negaciones

</script>

@endsection
                            

