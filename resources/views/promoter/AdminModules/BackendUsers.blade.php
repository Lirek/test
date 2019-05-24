@extends('promoter.layouts.app')
@section('main')
  <span class="card-title grey-text"><h3>Usuarios Administrativos</h3></span>
  <div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administradores registrados</h4></span>
        <table class="responsive-table" id="promoters_table">
          <thead>
            <tr>
              <th><i class="material-icons"></i>Nombre</th>
              <th><i class="material-icons"></i>Correo</th>
              <th><i class="material-icons"></i>Nivel</th>
              @if(Auth::guard('Promoter')->user()->priority == 1)
                <th><i class="material-icons"></i>Último inicio</th>
              @endif
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($promoters as $promoter)
              <tr id="promoter{{$promoter->id}}">
                <td>{{$promoter->name_c}}</td>
                <td>{{$promoter->email}}</td>
                <td>{{$promoter->Roles->first()->name}}</td>
                @if(Auth::guard('Promoter')->user()->priority == 1)
                  @if($promoter->Logins->count()==0)
                    <td>No ha iniciado sesión</td>
                  @else
                    <td>{{date('d-m-Y h:m:s',strtotime($promoter->Logins->first()->created_at))}}</td>
                  @endif
                @endif
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar usuario administrador" value="{{$promoter->id}}" id="editPromoter" href="#updateUser">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="delete_promoter" data-position="button" data-tooltip="Eliminar usuario administrador" value="{{$promoter->id}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Nuevo usuario administrador" href="#NewUser">
        <i class="material-icons">add</i>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Vendedores registrados</h4></span>
        <table class="responsive-table" id="SalesmanTable">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Teléfono</th>
              <th>Registrado por</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            @if($salesmans->count()>0)  
              @foreach($salesmans as $salesman)
                <tr id="salesman{{$salesman->id}}">
                  <td>{{$salesman->name}}</td>
                  <td>{{$salesman->email}}</td>
                  <td>{{$salesman->phone}}</td>
                  <td>{{$salesman->CreatedBy->name_c}}</td>
                  <td>
                    <a class="btn-small waves-effect waves-light btn tooltipped modal-trigger orange darken-3" href="#USalesman" data-position="button" data-tooltip="Modificar usuario administrador" value="{{$salesman->id}}" id="UpdateSalesman">
                      <i class="material-icons">edit</i>
                    </a>
                    <a class="btn-small waves-effect waves-light btn tooltipped red" id="delete_salesman" data-position="button" data-tooltip="Eliminar usuario administrador" value="{{$salesman->id}}">
                      <i class="material-icons">delete</i>
                    </a>
                  </td>
                </tr>
              @endforeach
            @else
              <h5>No existen vendedores registrados</h5>
            @endif
          </tbody>
        </table>
      </div>
      <a id="SalesmanAdd" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Nuevo usuario vendedor" href="#NewSalesman">
        <i class="material-icons">add</i>
      </a>
    </div>
  </div>
  @include('promoter.modals.BackendUsersViewsModals')
@endsection

@section('js')
<script>
  $(document).ready(function (e){
    $('.tooltipped').tooltip();
    $('select').formSelect();
    $('.modal').modal();
  });

  // agregar un nuevo usuario administrador
  $(document).on('click', '#tt3', function() {
    $("#PromotersForm").on('submit', function(e){
      var name_c = $('input[name=name_c]').val();
      var phone_s = $("#phone_s").val();
      var email_c = $('input[name=email_c]').val();
      var priority = $('#priority').val();
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
        url : "{{url('promoter_c/')}}",
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name_c: name_c,
          phone_s: phone_s,
          email_c: email_c,
          priority: priority,
        },
        success: function (result) {
          console.log(result);
          swal('Agregado exitosamente','','success')
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
  // agregar un nuevo usuario administrador

  // eliminar un usuario administrador
  $(document).on('click', '#delete_promoter', function() {
    var promoter = $(this).attr("value");
    swal({
      title: "¿Desea realmente eliminar al administrador?",
      icon: "warning",
      dangerMode: true,
      buttons: ["Cancelar", "Si"]
    }).then((confir) => {
      if (confir) {
        var gif = "{{ asset('/sistem_images/loading.gif') }}";
        swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
        });
        var url = "{{url('promoter_delete')}}/"+promoter;
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
          },
        });
      }
    });
  });
  // eliminar un usuario administrador

  // editar un usuario administrador
  $(document).on('click', '#editPromoter', function() {
    var promoter = $(this).attr("value");
    console.log(promoter);
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
      url : "{{url('promoterUpdate/')}}/"+promoter,
      type: "GET",
      dataType: "json",
      success: function(data) {
        swal.close();
        console.log(data);
        $("#idUpdate").val(promoter);
        $("#nameUpdate").val(data.name_c);
        $("#phoneUpdate").val(data.phone_s);
        $("#emailUpdate").val(data.email);
      },
      error: function(data) {
        swal('Existe un error en su solicitud','','error')
        .then((recarga) => {
          location.reload();
        });
      }
    });
  });
  $("#UpdatePromoter").on('submit', function(e){
    var promoter = $("#idUpdate").val();
    var name_c = $('#nameUpdate').val();
    var phone_s = $("#phoneUpdate").val();
    var email_c = $('#emailUpdate').val();
    var priority = $('#priorityUpdate').val();
    console.log(name_c,phone_s,email_c,priority);
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
      url : "{{url('UpdatePromoter/')}}/"+promoter,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        name_c: name_c,
        phone_s: phone_s,
        email_c: email_c,
        priority: priority
      },
      success: function(data) {
        console.log(data);
        swal('Modificado exitosamente','','success')
        .then((recarga) => {
          location.reload();
        });
      },
      error: function(data) {
        swal('Existe un error en su solicitud','','error')
        .then((recarga) => {
          location.reload();
        });
      }
    });
  });
  // editar un usuario administrador

  // agregar un nuevo vendedore
  $(document).on('click', '#SalesmanAdd', function() {
    $("#SalesmanForm").on('submit', function(e){
      var name = $('input[name=name]').val();
      var phone =  $("#phone").val();
      var email = $('input[name=email]').val();
      var adress = $('#adress').val();
      var gif = "{{ asset('/sistem_images/loading.gif') }}";
      swal({
        title: "Procesando la información",
        text: "Espere mientras se procesa la información.",
        icon: gif,
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false
      });
      e.preventDefault();
      console.log(name,phone,email,adress);
      $.ajax({
        url : "{{url('AddSalesman/')}}",
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name: name,
          phone: phone,
          email: email,
          adress: adress,
        },
        success: function (result) {
          console.log(result);
          swal('Agregado exitosamente','','success')
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
  // agregar un nuevo vendedore

  // editar un vendedor
  $(document).on('click', '#UpdateSalesman', function(e) {
    var salesman = $(this).attr("value");
    var url = "{{url('FindSalesman/')}}/"+salesman;
    e.preventDefault();
    console.log(salesman,url);
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
      type:'get',
      dataType:"json",
      success: function(data) {
        console.log(data);
        swal.close();
        $('#salesman_id').val(data.id);
        $('#name_u').val(data.name);
        $('#phone_u').val(data.phone);
        $('#email_u').val(data.email);
        $('#adress_u').val(data.adress);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  $("#SalesmanUForm").on('submit', function(e){
    var name = $('#name_u').val();
    var phone =  $("#phone_u").val();
    var email = $('#email_u').val();
    var adress = $('#adress_u').val();
    var id = $('#salesman_id').val();
    var url = "{{url('UpadateSalesman')}}/"+id;
    console.log(name,phone,email,adress,url);
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
      type:'POST',
      data:{
        _token: $('input[name=_token]').val(),
        name: name,
        phone: phone,
        email: email,
        adress: adress,
      },
      success: function (result) {
        console.log(result);
        swal('Modificado exitosamente','','success')
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
  // editar un vendedor

  // eliminar un vendedor
  $(document).on('click', '#delete_salesman', function() {
    var salesman = $(this).attr("value");
    swal({
      title: "¿Desea realmente eliminar al vendedor?",
      icon: "warning",
      dangerMode: true,
      buttons: ["Cancelar", "Si"]
    }).then((confir) => {
      if (confir) {
        var gif = "{{ asset('/sistem_images/loading.gif') }}";
        swal({
          title: "Procesando la información",
          text: "Espere mientras se procesa la información.",
          icon: gif,
          buttons: false,
          closeOnEsc: false,
          closeOnClickOutside: false
        });
        var url = "{{url('salesman_delete/')}}/"+salesman;
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
          },
        });
      }
    });
  });
  // eliminar un vendedor
</script>
@endsection