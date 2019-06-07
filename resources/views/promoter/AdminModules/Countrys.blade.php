@extends('promoter.layouts.app')
@section('css')
<style>

</style>
@endsection

@section('main')
@include('flash::message')

<span class="card-title grey-text"><h3>Países</h3></span>
<div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administrar País</h4></span>
        <table class="responsive-table" id="">

          <thead>
            <tr>
              <th><i class="material-icons"></i>ID</th>
              <th><i class="material-icons"></i>Pais</th>
              <th><i class="material-icons"></i>Opciones</th>
            </tr>
          </thead>

          <tbody> 
          	@foreach($Pais as $pais)
              <tr>
              	<td>{{$pais->id}}</td>
                <td>{{$pais->country_name}}</td>
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar País" value="{{$pais->id}}" id="editCountry" href="#UpdateCountry">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="DeleteCountry" data-position="button" data-tooltip="Eliminar País" value="{{$pais->id}}" action="{{url('DeleteCountry')}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
    		@endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar País" href="#NewCountry"><i class="material-icons">add</i>
      </a>
    </div>
  </div>

  <!-- MODALES PARA PAIS -->
  <div class="modal" id="NewCountry">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar País</h4>
      </div>
      <div class="text-center row">
        <form method="POST" action="{{url('AddCountry')}}">
          {{ csrf_field() }}
          <div class="col l12 m12">
            <div class="input-field col s12 l12 m12">
              <input class="validate" type="text" name="country_name" id="country_name" required="required" pattern="[A-Za-z ]+">
              <label for="country_name">Nombre del País</label>
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

  <!-- Modificar Pais -->
  <div class="modal" id="UpdateCountry">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar Pais</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdateCountryForm">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m12">
            <div class="input-field col s12">
              <input class="validate" type="text" name="country_name" id="nameUpdate" placeholder="" pattern="[A-Za-z]+">
              <label for="name">Editar País</label>
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
  <!-- FIN MODALES PAÍS -->

@endsection

@section('js')
<script>
	// editar país
  $(document).on('click', '#editCountry', function(e) {
    var pais = $(this).attr("value");
    var url = "{{url('FindCountry/')}}/"+pais;
    e.preventDefault();
    console.log(pais,url);
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
        $("#nameUpdate").val(data.country_name);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  
  $("#UpdateCountryForm").on('submit', function(e){
    var pais = $("#idUpdate").val();
    var country_name = $('#nameUpdate').val();
    console.log(country_name);
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
      url : "{{url('UpdateCountry/')}}/"+pais,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        country_name: country_name
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
 
  // editar país

  // eliminar pais
  $(document).on('click', '#DeleteCountry', function() {
    var pais = $(this).attr("value");
    swal({
      title: "¿Desea eliminar el País?",
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
        var url = "{{url('DeleteCountry/')}}/"+pais;
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
  // eliminar pais
</script>
@endsection