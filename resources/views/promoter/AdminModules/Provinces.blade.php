@extends('promoter.layouts.app')
@section('css')
<style>

</style>
@endsection

@section('main')
@include('flash::message')

<span class="card-title grey-text"><h3>Provincias</h3></span>
<div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administrar Provincias</h4></span>
        <table class="responsive-table" id="promoters_table">

          <thead>
            <tr>
              <th><i class="material-icons"></i>ID</th>
              <th><i class="material-icons"></i>Provincias</th>
              <th><i class="material-icons"></i>Opciones</th>
            </tr>
          </thead>

          <tbody> 
          	@foreach($Provinces as $provinces)
              <tr>
              	<td>{{$provinces->id}}</td>
                <td>{{$provinces->province_name}}</td>
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar Provincia" value="{{$provinces->id}}" id="editProvince" href="#UpdateProvince">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="DeleteProvince" data-position="button" data-tooltip="Eliminar Provincia" value="{{$provinces->id}}" action="{{url('DeleteProvince')}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
    		@endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar nueva provincia" href="#NewProvince"><i class="material-icons">add</i>
      </a>
    </div>
  </div>


  <!-- MODALES PARA PROVINCIAS -->

	<div class="modal" id="NewProvince">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar Provincia</h4>
      </div>
      <div class="text-center row">
        <form method="POST" action="{{url('AddProvince')}}">
          {{ csrf_field() }}
          <div class="col l12 m12">
            <div class="input-field col s12 l12 m12">
              <input class="validate" type="text" name="province_name" id="province_name" required="required" pattern="[A-Za-z]+">
              <label for="province_name">Nombre de la Provincia</label>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modificar Provincia -->
  <div class="modal" id="UpdateProvince">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar provincia</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdateProvinceForm">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m12">
            <div class="input-field col s12">
              <input class="validate" type="text" name="province_name" id="nameUpdate" placeholder="" pattern="[A-Za-z]+">
              <label for="name">Editar Provincia</label>
            </div>
          </div>
          <div class="col s12">
            <button class="btn" type="submit">
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- FIN MODALES PROVINCIAS -->

@endsection

@section('js')
<script>
	// editar provincia
  $(document).on('click', '#editProvince', function(e) {
    var provinces = $(this).attr("value");
    var url = "{{url('FindProvince/')}}/"+provinces;
    e.preventDefault();
    console.log(provinces,url);
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
        $('#idUpdate').val(data.id);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  
  $("#UpdateProvinceForm").on('submit', function(e){
    var province = $("#idUpdate").val();
    var province_name = $('#nameUpdate').val();
    console.log(province_name);
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
      url : "{{url('UpdateProvince/')}}/"+province,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        province_name: province_name
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
 
  // editar provincia

	 // eliminar provincia
  $(document).on('click', '#DeleteProvince', function() {
    var provinces = $(this).attr("value");
    swal({
      title: "¿Desea eliminar la provincia?",
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
        var url = "{{url('DeleteProvince/')}}/"+provinces;
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
  // eliminar provincia
</script>
@endsection