@extends('promoter.layouts.app')
@section('css')
<style>

</style>
@endsection

@section('main')
@include('flash::message')

<span class="card-title grey-text"><h3>Regiones</h3></span>
<div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administrar Regiones</h4></span>
        <table class="responsive-table" id="">

          <thead>
            <tr>
              <th><i class="material-icons"></i>ID</th>
              <th><i class="material-icons"></i>Región</th>
              <th><i class="material-icons"></i>País</th>
              <th><i class="material-icons"></i>Opciones</th>
            </tr>
          </thead>

          <tbody> 
          	@foreach($Region as $region)
              <tr>
              	<td>{{$region->id}}</td>
              	<td>{{$region->region_name}}</td>
              	<td>{{$region->country->country_name}}</td> 
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar Región" value="{{$region->id}}" id="editRegion" href="#UpdateRegion">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="DeleteRegion" data-position="button" data-tooltip="Eliminar Región" value="{{$region->id}}" action="{{url('DeleteRegion')}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
    		@endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar nueva región" href="#NewRegion"><i class="material-icons">add</i>
      </a>
    </div>
  </div>

  <!-- MODALES PARA REGIÓN -->

	<div class="modal" id="NewRegion">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar Región</h4>
      </div>
      <div class="text-center row">
        <form method="POST" action="{{url('AddRegion')}}">
          {{ csrf_field() }}
          <div class="input-field col s6 l6 m6">
              <input class="validate" type="text" name="region_name" id="region_name" required="required" pattern="[A-Za-z ]+">
              <label for="region_name">Nombre de la Región</label>
            </div>
          <div class="input-field col s6 l6 m6">
    		<select name="country_id" required="required">
      			<option value="" disabled selected>Seleccione el País</option>
      			@foreach($Country as $country)        
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione el País</label>
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

   <!-- Modificar Región -->
  <div class="modal" id="UpdateRegion">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar Región</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdateRegionForm">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m12">
            <div class="input-field col s6">     	
              <input class="validate" type="text" name="region_name" id="nameUpdate" placeholder="Ingrese Nombre de la Región" required="required" pattern="[A-Za-z ]+">
              <label for="name">Nombre de la Región</label>              
            </div>
            <div class="input-field col s6">
    		<select name="countryUpdate" id="countryUpdate" required="required">
    			<option value="" disabled selected>Seleccione País</option>
      			@foreach($Country as $country)        
                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione País</label>
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
	//Select Para País
         $(document).ready(function(){
            $('select').formSelect();
        });
</script>

<script>
	// editar región
  $(document).on('click', '#editRegion', function(e) {
    var region = $(this).attr("value");
    var url = "{{url('FindRegion/')}}/"+region;
    e.preventDefault();
    console.log(region,url);
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
        $("#nameUpdate").val(data.region_name);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  
  $("#UpdateRegionForm").on('submit', function(e){
    var region = $("#idUpdate").val();
    var region_name = $('#nameUpdate').val();
    var country_id = $('#countryUpdate').val();
    console.log(region_name);
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
      url : "{{url('UpdateRegion/')}}/"+region,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        region_name: region_name,
        country_id: country_id,
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
 
  // editar región

   // eliminar región
  $(document).on('click', '#DeleteRegion', function() {
    var region = $(this).attr("value");
    swal({
      title: "¿Desea eliminar la Región?",
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
        var url = "{{url('DeleteRegion/')}}/"+region;
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
  // eliminar región
</script>
@endsection