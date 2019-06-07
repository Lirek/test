@extends('promoter.layouts.app')
@section('css')
<style>

</style>
@endsection

@section('main')
@include('flash::message')

<span class="card-title grey-text"><h3>Parroquias</h3></span>
<div class="row">
    <div class="col s12">
      <div class="card">
        <span class="card-title grey-text"><h4>Administrar Parroquias</h4></span>
        <table class="responsive-table" id="">

          <thead>
            <tr>
              <th><i class="material-icons"></i>ID</th>
              <th><i class="material-icons"></i>Parroquia</th>
              <th><i class="material-icons"></i>Ciudad</th>
              <th><i class="material-icons"></i>Opciones</th>
            </tr>
          </thead>

          <tbody> 
          	@foreach($Parish as $parish)
              <tr>
              	<td>{{$parish->id}}</td>
              	<td>{{$parish->parish_name}}</td>
              	<td>{{$parish->city->city_name}}</td> 
                <td>
                  <a class="btn-small waves-effect waves-light btn tooltipped orange darken-3 modal-trigger" data-position="button" data-tooltip="Modificar Parroquia" value="{{$parish->id}}" id="editParish" href="#UpdateParish">
                    <i class="material-icons">edit</i>
                  </a>
                  <a class="btn-small waves-effect waves-light btn tooltipped red" id="DeleteParish" data-position="button" data-tooltip="Eliminar Parroquia" value="{{$parish->id}}" action="{{url('DeleteParish')}}">
                    <i class="material-icons">delete</i>
                  </a>
                </td>
              </tr>
    		@endforeach
          </tbody>
        </table>
      </div>
      <a id="tt3" class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar nueva Parroquia" href="#NewParish"><i class="material-icons">add</i>
      </a>
    </div>
  </div>


  <!-- MODALES PARA PARROQUIAS -->

	<div class="modal" id="NewParish">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Agregar Ciudad</h4>
      </div>
      <div class="text-center row">
        <form method="POST" action="{{url('AddParish')}}">
          {{ csrf_field() }}
          <div class="input-field col s6 l6 m6">
    		<select name="city_id" required="required">
      			<option value="" disabled selected>Selecciona una Ciudad</option>
      			@foreach($City as $city)        
                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione Ciudad</label>
  			</div>
  			<div class="input-field col s6 l6 m6">
              <input class="validate" type="text" name="parish_name" id="parish_name" required="required" pattern="[A-Za-z ]+">
              <label for="parish_name">Nombre de la Parroquia</label>
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

  <!-- Modificar Parroquia  -->

  <div class="modal" id="UpdateParish">
    <div class="modal-content">
      <div class="col s12 pink darken-4 lighten-1 text-center">
        <h4 class="white-text" style="padding: 25px 0px">Modificar Parroquia</h4>
      </div>
      <div class="text-center row">
        <form method="POST" id="UpdateParishForm">
          {{ csrf_field() }}
          <input type="hidden" id="idUpdate">
          <div class="col l12 m12">
            <div class="input-field col s6">
              <input class="validate" type="text" name="parish_name" id="nameUpdate" placeholder="" required="required" pattern="[A-Za-z ]+">
              <label for="name">Nombre de la Parroquia</label>
            </div>
            <div class="input-field col s6">
    		<select name="cityUpdate" id="cityUpdate" required="required">
      			<option value="" disabled selected>Selecciona una Ciudad</option>
      			@foreach($City as $city)        
                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
    		</select>
    		<label>Seleccione Ciudad</label>
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
	// editar parroquia
  $(document).on('click', '#editParish', function(e) {
    var parish = $(this).attr("value");
    var url = "{{url('FindParish/')}}/"+parish;
    e.preventDefault();
    console.log(parish,url);
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
        $("#nameUpdate").val(data.parish_name);
      },
      error: function(data) {
        console.log(data);
      },
    });
  });
  
  $("#UpdateParishForm").on('submit', function(e){
    var parish = $("#idUpdate").val();
    var parish_name = $('#nameUpdate').val();
    var city_id = $('#cityUpdate').val();
    console.log(parish_name);
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
      url : "{{url('UpdateParish/')}}/"+parish,
      type: "post",
      data: {
        _token: $('input[name=_token]').val(),
        parish_name: parish_name,
        city_id: city_id,
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

  // eliminar parroquia
  $(document).on('click', '#DeleteParish', function() {
    var parish = $(this).attr("value");
    swal({
      title: "¿Desea eliminar la Parroquia?",
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
        var url = "{{url('DeleteParish/')}}/"+parish;
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