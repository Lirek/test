@extends('promoter.layouts.app')
@section('css')
<style>

</style>
@endsection

@section('main')
@include('flash::message')

<span class="card-title grey-text"><h3>Ciudades</h3></span>
<div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administrar Ciudades</h4></span>
        <table class="responsive-table" id="">

          <thead>
            <tr>
              <th><i class="material-icons"></i>ID</th>
              <th><i class="material-icons"></i>Ciudad</th>
              <th><i class="material-icons"></i>Provincia</th>
              <th><i class="material-icons"></i>Opciones</th>
            </tr>
          </thead>

          <tbody> 
          	@foreach($City as $city)
              <tr>
              	<td>{{$city->id}}</td>
              	<td>{{$city->city_name}}</td>
              	<td>{{$city->province->province_name}}</td> 
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar Ciudad" value="{{$city->id}}" id="editCity" href="#UpdateCity">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="DeleteCity" data-position="button" data-tooltip="Eliminar Ciudad" value="{{$city->id}}" action="{{url('DeleteCity')}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
    		@endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar nueva Ciudad" href="#NewCity"><i class="material-icons">add</i>
      </a>
    </div>
  </div>

  <!-- MODALES PARA CIUDADES -->

	<div class="modal" id="NewCity">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar Ciudad</h4>
      </div>
      <div class="text-center row">
        <form method="POST" action="{{url('AddCity')}}">
          {{ csrf_field() }}
          <div class="input-field col s6 l6 m6">
    		<select name="province_id" required="required">
      			<option value="" disabled selected>Selecciona una Provincia</option>
      			@foreach($Province as $province)        
                        <option value="{{$province->id}}">{{$province->province_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione Provincia</label>
  			</div>
  			<div class="input-field col s6 l6 m6">
              <input class="validate" type="text" name="city_name" id="city_name" required="required" pattern="[A-Za-z ]+">
              <label for="city_name">Nombre de la Ciudad</label>
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

  <!-- Modificar Ciudad -->
  <div class="modal" id="UpdateCity">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar Ciudad</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdateCityForm">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m12">
            <div class="input-field col s6">
              <input class="validate" type="text" name="city_name" id="nameUpdate" placeholder="" required="required" pattern="[A-Za-z ]+">
              <label for="name">Nombre de la Ciudad</label>
            </div>
            <div class="input-field col s6">
    		<select name="provinceUpdate" id="provinceUpdate" required="required">
      			<option value="" disabled selected>Selecciona una Provincia</option>
      			@foreach($Province as $province)        
                        <option value="{{$province->id}}">{{$province->province_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione Provincia</label>
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


@endsection

@section('js')
<script>
	//Select
         $(document).ready(function(){
            $('select').formSelect();
        });
</script>

<script>
	// editar ciudad
  $(document).on('click', '#editCity', function(e) {
    var city = $(this).attr("value");
    var url = "{{url('FindCity/')}}/"+city;
    e.preventDefault();
    console.log(city,url);
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
        $("#nameUpdate").val(data.city_name);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  
  $("#UpdateCityForm").on('submit', function(e){
    var city = $("#idUpdate").val();
    var city_name = $('#nameUpdate').val();
    var province_id = $('#provinceUpdate').val();
    console.log(city_name);
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
      url : "{{url('UpdateCity/')}}/"+city,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        city_name: city_name,
        province_id: province_id,
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

   // eliminar ciudad
  $(document).on('click', '#DeleteCity', function() {
    var city = $(this).attr("value");
    swal({
      title: "¿Desea eliminar la Ciudad?",
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
        var url = "{{url('DeleteCity/')}}/"+city;
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
</script>
@endsection