@extends('promoter.layouts.app')
@section('css')
  <style>
    .curvaBoton{border-radius: 20px;}
  </style>
@endsection
@section('main')
  <span class="card-title grey-text"><h3>Clientes</h3></span>
  <div id="test1" class="col s12">
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
      <li class="tab" id="pendientes"><a class="active" href="#clientesPendientes">Clientes pendientes</a></li>
      <li class="tab" id="negados"><a href="#clientesNegados">Clientes negados</a></li>
      <li class="tab" id="aprobados"><a href="#clientesAprobados">Clientes aprobados</a></li>
    </ul>
    <div id="test1" class="col s12">
      <table class="responsive-table">
        <thead>
          <tr>
            <th><i class="material-icons"></i>Nombre</th>
            <th><i class="material-icons"></i>RUC</th>
            <th><i class="material-icons"></i>Imagen del Documento</th>
            {{--<th><i class="material-icons"></i>Fecha de nacimiento</th>--}}
            <th><i class="material-icons"></i>Género</th>
            <th><i class="material-icons"></i>Fecha de registro</th>
            <th><i class="material-icons"></i>Redes</th>
            <th><i class="material-icons"></i>Opciones</th>
          </tr>
        </thead>
        <tbody id="clientes">
        </tbody>
      </table>
    </div>
  </div>

  @include('promoter.modals.ClientViewModal')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/1.2.2/bluebird.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="{{ asset('js/jquery.mlens-1.7.min.js') }}"></script>
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
    },6000); // 6000
  }
  function getDatil(idTicketSales,medio,idUser) {
    return new Promise(function(resolve,reject) {
      var parametros = "/"+idTicketSales+"/"+medio+"/"+idUser;
      var url = "{{ url('/facturaDeposito/') }}"+parametros;

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
    var ruta = "{{ url('/setFactura/') }}"+parametros;
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
  function setClient(status) {
    $("#clientes").empty();
    var ruta = "";
    if (status==0) {
      ruta = "{{url('ClientsDataTable')}}";
    } else if (status==1) {
      ruta = "{{url('AllClientsDataTable')}}";
    } else if (status==2) {
      ruta = "{{url('RejectedClientsDataTable')}}";
    }
    var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
          var nombreCompleto = info.name+" "+info.last_name;
          if (info.type=="M") {
            var genero = "Masculino";
          } else {
            var genero = "Femenino";
          }
          if (info.img_doc!=null) {
            var doc = "<img class='materialboxed' width='100' height='90' src='{!!asset('"+info.img_doc+"')!!}'";
          } else {
            var doc = "No tiene documento registrado";
          }
          var fecha = moment(info.created_at).format('DD/MM/YYYY');
          var redes = "<a class='btn green curvaBoton modal-trigger' value="+info.id+" href='#webModal' id='webs'>Ver redes</a>";
          var estatus = "<a class='btn light-blue lighten-1 curvaBoton modal-trigger' value="+info.id+" href='#myModal' id='Status'>Cambiar estatus</a>";
          var masInfo = "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#ModalUser' id='user'>Más información</a>"
          var opciones = estatus+"<br>"+masInfo;
          if (info.verify==2) {
            opciones = opciones + "<br>"+
            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectPayments'>Ver negaciones</a>";
          }
          var filas = "<tr><td>"+
          nombreCompleto+"</td><td>"+
          info.num_doc+"</td><td>"+
          doc+"</td><td>"+
          genero+"</td><td>"+
          fecha+"</td><td>"+
          redes+"</td><td>"+
          opciones+"</td></tr>";
          $("#clientes").append(filas);
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

    setClient(0);

    $(document).on('click', '#pendientes', function() {
      setClient(0);
    });
    $(document).on('click', '#negados', function() {
      setClient(2);
    });
    $(document).on('click', '#aprobados', function() {
      setClient(1);
    });

    $(document).on('click', '#depositos', function() {
      $("#pagos").empty();
      var ruta ="{{url('DepsitDataTable')}}";
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
            var nombreCompleto = info.tickets_user.name+" "+info.tickets_user.last_name;
            var total = info.value*info.tickets.cost+"$";
            if (info.voucher!=0) {
              var voucher = "<img class='materialboxed' width='100' height='90' src='{!!asset('"+info.voucher+"')!!}'";
            } else {
              var voucher = "No tiene voucher registrado";
            }
            var fecha = moment(info.created_at).format('DD/MM/YYYY');
            var opciones = "<a class='btn light-blue lighten-1 curvaBoton modal-trigger' value="+info.id+" href='#PayModal' id='payval'>Cambiar estatus</a>";
            var filas = "<tr><td>"+
            nombreCompleto+"</td><td>"+
            info.value+"</td><td>"+
            info.tickets.name+"</td><td>"+
            total+"</td><td>"+
            info.reference+"</td><td>"+
            voucher+"</td><td>"+
            fecha+"</td><td>"+
            opciones+"</td></tr>";
            $("#pagos").append(filas);
          });
          $('.materialboxed').materialbox();
        },
        error:function(data) {
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload()
          });
          console.log(data);
        }
      });
    });

    $(document).on('click', '#user', function() {
      var id = $(this).attr("value");
      console.log(id);
      var url = "{{ url('/infoUser/') }}/"+id;
      $.ajax({
        url: url,
        type: 'get',
        dataType: 'json', 
        success: function (info) {
          console.log(info);
          if (info.img_perf!=null) {  
            var perfilUsuario = "{{ asset('/') }}/"+info.img_perf;
            $("#perfilUsuario").attr('src',perfilUsuario);
          } else {
            $("#perfilUsuario").attr('src',"{{asset('plugins/img/sinPerfil.png')}}");
          }
          $("#nombreUsuario").text(info.name+" "+info.last_name);
          $("#correoUsuario").text(info.email);
          if (info.phone!=null) {
            $("#telefonoUsuario").text(info.phone);
          } else {
            $("#telefonoUsuario").text("No tiene teléfono registrado");
          }
          $("#rucUsuario").text(info.num_doc);
          if (info.img_doc!=null) { 
            var imgRucUsuario = "{{ asset('"+info.img_doc+"') }}";
            $("#imgRucUsuario").show();
            $("#mensajeimgRucUsuario").hide();
            $("#imgRucUsuario").attr('src',imgRucUsuario);
          } else {
            $("#imgRucUsuario").hide();
            $("#mensajeimgRucUsuario").show();
            $("#mensajeimgRucUsuario").text("No tiene su imagen de documento registrada");
          }
          $("#codigoUsuario").text(info.codigo_ref);
          if (info.points!=null) {
            $("#ticketsUsuario").text(info.points);
          } else {
            $("#ticketsUsuario").text("No tiene tickets disponibles");
          }
        },
        error: function (info) {
          console.log(info);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $(document).on('click', '#Status', function() {
      var x = $(this).attr('value');
      $( "#formStatus" ).on( 'submit', function(e) {
        var s=$("input[type='radio'][name=status]:checked").val();
        var message=$('#razon').val();
        var url = "{{url('ValidateUser/')}}/"+x;
        console.log(message);
        console.log(s);
        e.preventDefault();
        var gif = "{{ asset('/sistem_images/loading.gif') }}";
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
            message: message,
          }, 
          success: function (result) {
            $('#myModal').toggle();
            $('.modal-backdrop').remove();
            swal("Se ha "+s+" con éxito","","success")
            .then((recarga) => {
              location.reload();
            });
          },
          error: function (result) {
            swal('Existe un Error en su Solicitud','','error')
            .then((recarga) => {
              location.reload();
            });
            console.log(result);
          }
        }); 
      });
    });

    $(document).on('click', '#webs', function() {
      $("#redes").empty();
      var x = $(this).attr("value");
      var url = "{{ url('/ReferalsDataTable/') }}/"+x;
      $.ajax({
        url: url,
        type: 'get',
        dataType: 'json', 
        success: function (data) {
          console.log(data);
          if (data.length!=0) {
            $.each(data,function(i,info) {
              var filas = "<tr><td>"+
              info.name+" "+info.last_name+"</td><td>"+
              info.email+"</td><td>"+
              info.level+"</td></tr>";
              $("#redes").append(filas);
            });
          } else {
            $("#redes").append("<h3>No tiene redes</h3>");
          }
        },
        error: function (data) {
          console.log(data);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $(document).on('click', '#payval', function() { 
      var x = $(this).attr("value");
      $( "#formPayment" ).on( 'submit', function(e){
        var gif = "{{ asset('/sistem_images/loading.gif') }}";
        swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
        });
        var url = "{{ url('/DepositStatus/') }}"+"/"+x;
        var s = $("input[type='radio'][name=status_p]:checked").val();
        var message=$('#razon_p').val();
        console.log(message);
        console.log(x,url,s);
        e.preventDefault();
        $.ajax({
          url: url,
          type: 'post',
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
              swal({
                title: "Generando factura",
                text: "Espere mientras se genera la factura.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
              });
              var intento = 0;
              var maxIntento = 10; // 1min de espera // 10
              getDatilAgain(idTicketSales,medio,idUser,function callback(infoFactura) {
                console.log(infoFactura);
                var idFactura = infoFactura.id;
                console.log(idFactura);
                if (intento <= maxIntento) {
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
                    intento++;
                  } else {
                    console.log('intento: '+intento);
                    getDatilAgain(idTicketSales,medio,idUser,callback);
                    intento++;
                  }
                } else {
                  swal({
                    title: "No se pudo conectar con Datil",
                    text: "El pago ya fue procesado exitosamente, sin embargo la factura la podrá solicitar el cliente, por expirarse el tiempo de espera.",
                    icon: "info",
                    closeOnEsc: false,
                    closeOnClickOutside: false
                  })
                  .then((recarga) => {
                    location.reload();
                  });
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
    $(document).on('click', '#rejectPayments', function(e) {
      var idUser = $(this).attr("value");
      console.log(idUser);
      var modulo = "User";
      var url = "{!! url('viewRejection/"+idUser+"/"+modulo+"') !!}";
      console.log(url);
      $("#negaciones").empty();
      e.preventDefault();
      $.ajax({
        url: url, 
        type:'get', 
        dataType:'json',
        success: function(datos){
          console.log(datos);
          $('#totalNegaciones').show();
          $('#totalNegaciones').text('Tiene un total de rechazos de: '+datos.length);
          $.each(datos, function(i,info){
            var fila = '<tr><td>'+
            info.reason+'</td><td>'+
            moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+'</td></tr>';
            $('#negaciones').append(fila);
          });
        },
        error: function (datos) {
          console.log(datos);
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $(document).on('click', '#opt-2', function() {
      $('#if_no2').show();
      $('#razon2').attr('required','required');
    });
    $(document).on('click', '#opt-1', function() {
      $('#if_no2').hide();
      $('#razon2').val('');
      $('#razon2').removeAttr('required');
    });

    /*
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
              {data: 'created_at', name: 'created_at'},
              {data: 'webs', name: 'webs'},
              {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false},
          ]
    });
    */

    // Modal de la imagen del documento
    $(document).on('click', '#file_b', function() {
      var x = $(this).val();
      var file = $("#photo"+x).attr("src");
      console.log(file);
      $("#ci_photo").attr("src", file);
      $("#ci_photo").attr("data-big", file);
      $("#ci_photo").mlens({
        imgSrc: $("#ci_photo").attr("data-big"),    // path of the hi-res version of the image
        imgSrc2x: $("#ci_photo").attr("data-big2x"),  // path of the hi-res @2x version of the image
                                                  //for retina displays (optional)
        lensShape: "square",                // shape of the lens (circle/square)
        lensSize: ["50%","50%"],            // lens dimensions (in px or in % with respect to image dimensions)
                                        // can be different for X and Y dimension
        borderSize: 5,                  // size of the lens border (in px)
        borderColor: "#666",            // color of the lens border (#hex)
        borderRadius: 10,                // border radius (optional, only if the shape is square)
        imgOverlay: $("#ci_photo").attr("data-overlay"), // path of the overlay image (optional)
        overlayAdapt: true,    // true if the overlay image has to adapt to the lens size (boolean)
        zoomLevel: 5,          // zoom level multiplicator (number)
        responsive: true       // true if mlens has to be responsive (boolean)
      });
    });
    // Modal de la imagen del documento

    $('#webModal').on('hidden.bs.modal', function () {
      WebsDataTable.destroy();
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
    });

    $(document).on('click', '#users', function() {
      PaymentsDataTable.destroy();
    });

    $(document).on('click', '#users_a', function() {
      var AllClientsDataTable = $('#ClientsAproved').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! url('AllClientsDataTable') !!}',
          columns: [
              {data: 'name', name: 'name'},
              {data: 'num_doc', name: 'num_doc'},
              {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
              {data: 'fech_nac', name: 'fech_nac'},
              {data: 'type', name: 'type'},
              {data: 'created_at', name: 'created_at'},
              {data: 'webs', name: 'webs'},
              {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
      });

      $(document).on('click', '#users', function() {
        AllClientsDataTable.destroy();
      });

      $(document).on('click', '#users_d', function() {
        AllClientsDataTable.destroy();
      });

      $(document).on('click', '#users_payments', function() {
        AllClientsDataTable.destroy();
      });
    });

    $(document).on('click', '#users_d', function() {
      var DenialClientsDataTable = $('#ClientsDenials').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{!! url('RejectedClientsDataTable') !!}',
          columns: [
            {data: 'name', name: 'name'},
            {data: 'num_doc', name: 'num_doc'},
            {data: 'img_doc', name: 'img_doc',orderable: false, searchable: false},
            {data: 'fech_nac', name: 'fech_nac'},
            {data: 'type', name: 'type'},
            {data: 'created_at', name: 'created_at'},
            {data: 'webs', name: 'webs'},
            {data: 'Estatus', name: 'Estatus', orderable: false, searchable: false}
          ]
        });

      $(document).on('click', '#users', function() {
        DenialClientsDataTable.destroy();
      });

      $(document).on('click', '#users_a', function() {
        DenialClientsDataTable.destroy();
      });

      $(document).on('click', '#users_payments', function() {
        DenialClientsDataTable.destroy();
      });
    });

  });
</script>
@endsection