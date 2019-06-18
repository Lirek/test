@extends('bidder.layouts')

@section('content')

@if(Auth::guard('bidder')->user()->PayementsCredentials()->first()!=NULL)
  <div class="row">

    <h3>Informacion Del Boton de Pagos</h3>

    <div class="col s6 m12 l5">
      <div class="card yellow yellow-3 darken-3 hoverable">
        <div class="card-content white-text">
          <span class="card-title">Credenciales</span>
          <i class="large material-icons">view_carousel</i>

            <p>
              Secret_id: {{$client_secret_id}}
              Token: {{$client_token}}
              Callback Url: {{$callback_url}}
              URL de su Plataforma:  {{$url_host}}
              URL de la Peticion: {{$petition_url}}
            </p>

        </div>
        <div class="card-action">
          <a href="{{url('AdminContent')}}" class="btn btn-primary indigo">Revisar</a>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
  <table id="example" class="mdl-data-table" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@else
    <h3>No posee Credenciales del Boton de pago</h3>
    <button class="btn curvaBoton waves-effect waves-light green modal-trigger" href="#modal2">Crear Credenciales</button>



    <div id="modal2" class="modal">
        <div class="modal-content center blue-text">
            {{--registro credenciales--}}
             <h4>Credenciales del Boton de pago</h4>
            <div id="usuario1" class="col s12 center">
                <div class="row">
                    <form class="form-horizontal" method="POST" id="formR">
                        {{ csrf_field() }}
                        <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <i class="material-icons prefix blue-text">email</i>
                            <input type="text" class="autocomplete" name="url_host" id="url_host" value="{{ old('name') }}" required="required">
                            <label for="url_host">Url de la Pagina</label>
                            <div id="nameMen" style="margin-top: 1%"></div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <i class="material-icons prefix blue-text">email</i>
                            <input type="text" id="petition_url" name="petition_url" class="autocomplete" required="required">
                            <label for="petition_url">Url de la Peticion</label>
                            <div id="petition_url" style="margin-top: 1%"></div>
                            @if ($errors->has('petition_url'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('petition_url') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <i class="material-icons prefix blue-text">vpn_key</i>
                            <input type="text" name="callback_url" id="callback_url" class="autocomplete" required="required">
                            <label for="callback_url">Url del Callback</label>
                            <div id="callback_url" style="margin-top: 1%"></div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                            </div>
                            <div class="input-field col s12">
                                <button class="btn curvaBoton waves-effect waves-light green" id="registroRU" type="submit" name="action">Optener Credenciales
                                    <i class="material-icons right">send</i>
                                </button>
                        </div>
                    </form>
                </div>
            </div>

@endif

@endsection

@section('js')

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: '{!! url('PaymentsDataTable') !!}',
        columns: [
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'email', name: 'email'},
            {data: 'ammount', name: 'ammount'},
            {data: 'created_at', name: 'created_at'},
            {data: 'status', name: 'status'}
        ]
      "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
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

    $( "#formR" ).on( 'submit', function(e)
      {

      var petition_url = $('#petition_url').val();
      var url_host = $('#url_host').val();
      var callback_url = $('#callback_url').val();

      e.preventDefault();

            $.ajax({
                      url: '{!! url('PaymentButtonRequest') !!}',
                      type:'POST',
                      data:{
                              _token: $('input[name=_token]').val(),
                              url_host: url_host,
                              petition_url: petition_url,
                              callback_url: callback_url
                      },
        success: function (result) {
            location.reload();
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


</script>

@endsection
