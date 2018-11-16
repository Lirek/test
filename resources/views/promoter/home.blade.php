@extends('promoter.layouts.app')
  @section('main')     

    <div class="row mt">
      <h2><i class="fa fa-angle-right"></i>Contenido Por Aprobar</h2>
    </div>

    <div class="row mt">
      <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="twitter-panel pn">
          <i class="fa fa-suitcase fa-6x"></i>
          <h3>
            <p class="user">Contenido por aprobar</p>
            <p>{{$content_total}}</p>
            <a href="{{url('AdminContent')}}" class="btn btn-primary">Revisar</a>
          </h3>
        </div>
      </div><!-- /col-md-3 -->
      
      <div class="col-lg-3 col-md-3 col-sm-3 mb">
        <div class="twitter-panel pn">
          <i class="fa fa-user fa-6x"></i>
          <h3>
            <p class="user">Proveedores por validar</p>
            <p>{{$sellers}}</p>
            <a href="{{url('admin_sellers')}}" class="btn btn-primary">Revisar</a>
          </h3>
        </div>
      </div><!-- /col-md-3 -->

        <div class="col-lg-3 col-md-3 col-sm-3 mb">
          <div class="twitter-panel pn">
            <i class="fas fa-archive fa-6x"></i>
            <h3>
              <p class="user">Solicitudes de proveedores por revisar</p>
              <p>{{$aplyss}}</p>
              <a href="{{url('admin_applys')}}" class="btn btn-primary">Revisar</a>
            </h3>
          </div>
        </div><!-- /col-md-3 -->

      @if(Auth::guard('Promoter')->user()->priority == 1)
        <div class="col-lg-3 col-md-3 col-sm-3 mb">
          <div class="twitter-panel pn">
            <i class="fa fa-suitcase fa-6x"></i>
            <h3>
              <p>Errores</p>
              <a href="{{ route('log-viewer::dashboard') }}" target="_blank" class="btn btn-primary">Ver errores</a>
            </h3>
          </div>
        </div><!-- /col-md-3 -->
      </div>

      <div class="row mt">
        <h2><i class="fa fa-angle-right"></i>Paquetes de Tiquets</h2>
      </div>
      
      @foreach($TicketsPackage as $Package)
        <div class="col-md-3 col-sm-3">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="white-panel">
                <div class="white-header" style="padding: 10px">
                  <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1>{{$Package->name}}</h1></span>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-xs-12 col-md-12">
                    <h4 style="color: #000;">
                      <b>Costo:</b> ${{$Package->cost}} <br>
                      <b>Cantidad de tickets:</b> {{$Package->amount}} <br>
                      <b>Costo en puntos: </b> {{$Package->points_cost}} <br>
                      <b>Puntos por paquete:</b> {{$Package->points}}
                    </h4>
                    <br>
                    <div class="center">
                      <button type="button" class="btn btn-warning" id="edit" value="{{$Package->id}}">Editar</button>
                      <button type="button" class="btn btn-danger" id="delete" value="{{$Package->id}}">Borrar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewPack">
        <div style="padding: 0px 20px">
          <h1>+</h1>
        </div>
      </button>

      {{--
      <div class="row mt">
        <div class="col-md-10">
          <div class="content-panel">
            <table class="table table-bordered table-striped table-condensed">
              <thead>
                <tr>
                  <th class="non-numeric">Nombre Del Paquete</th>
                  <th>Costo</th>
                  <th>Cantidad de Tiquets</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($TicketsPackage as $Package)
                  <tr>
                    <td>{{$Package->name}}</td>
                    <td>{{$Package->cost}}$</td>
                    <td>{{$Package->amount}}</td>
                    <td>
                      <button type="button" class="btn btn-theme" id="edit" value="{{$Package->id}}">Editar</button>
                      <button type="button" id="delete" class="btn-danger" value="{{$Package->id}}">Borrar</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#NewPack">+</button>
            </div>
          </div>
        </div>
      --}}
      @else
        </div>
      @endif
@include('promoter.modals.HomeViewModal')           
@endsection
@section('js')
  <script>

    $(document).on('click', '#edit', function() {
      var x = $(this).val();
      var url = "{{url('GetPackage/')}}/"+x;
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
          swal.close();
          console.log(data);
          $('#updatePack').modal('show');
          $("#nameM").val(data.name);
          $("#costM").val(data.cost);
          $("#ammountM").val(data.amount);
          $("#pointsM").val(data.points);
          $("#points_costM").val(data.points_cost);
          $("#p_id").val(data.id);
        },
        error: function(data) {
          swal('Existe un error en su solicitud','','error')
          .then((recarga) => {
            location.reload();
          });
        }
      });
    });

    $(document).on('click', '#delete', function() {
      var x = $(this).val();
      swal({
        title: "Eliminar paquete de tiquets",
        text: "¿Está seguro de que quiere eliminar este paquete de tickets?",
        icon: 'warning',
        buttons: {
          cancel: "No",
          accept: {
            text: "Si",
            value: true
          }
        },
        closeOnEsc: false,
        closeOnClickOutside: false
      })
      .then((confirmacion) => {
        if(confirmacion) {
          $.ajax({
            url: "{{url('DeletePackage/')}}/"+x,
            type:'get',
            dataType:'json',
            success: function (result) {
              swal('Paquete eliminado con éxito','','success')
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
        }
      });
    });

    $("#UPackForm").on('submit', function(e){
      var name = $('#nameM').val();
      var cost = $('#costM').val();
      var ammount = $('#ammountM').val();
      var id = $('#p_id').val();
      var pointsCost = $('#points_costM').val();
      var points = $('#pointsM').val();
      e.preventDefault();
      console.log(name,cost,ammount,id,pointsCost,points);
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
        url: "{{url('UpdatePackage/')}}/"+id,
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name: name,
          cost: cost,
          ammount: ammount,
          pointsCost:pointsCost,
          points:points
        },
        success: function (result) {
          //alert('Paquete Mddificado con exito');
          console.log(result);
          $('#updatePack').modal('hide');
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          swal('Paquete modificado con éxito','','success')
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

    $("#NewPackForm").on('submit', function(e){
      console.log('paso');
      var name = $('#name_c').val();
      var cost =  $('#cost').val();
      var ammount = $('#ammount').val();
      var pointsCost = $('#points_cost').val();
      var points = $('#points').val();
      console.log(name,cost,ammount,pointsCost,points);
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
        url: "{{('Save_Package')}}",
        type:'POST',
        data:{
          _token: $('input[name=_token]').val(),
          name: name,
          cost: cost,
          ammount: ammount,
          pointsCost: pointsCost,
          points:points
        }, 
        success: function (result) {
          console.log(result);
          /*
          alert('Paquete Registrado con exito');
          location.reload();
          $('#NewPack').modal('hide');
          */
          $('body').removeClass('modal-open');
          $('.modal-backdrop').remove();
          swal('Paquete registrado con éxito','','success')
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

</script>
@endsection
