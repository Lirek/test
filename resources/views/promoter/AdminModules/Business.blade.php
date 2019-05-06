@extends('promoter.layouts.app')
@section('main')

    <span class="card-title grey-text"><h3>Balance de la Plataforma</h3></span>
    <div class="row">
      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Tickets Vendidos</span>
            <i class="large material-icons">confirmation_number</i>
            <h4>
              <p>{{$Balance->tickets_solds}}</p>
            </h4>
          </div>
          <div class="card-action">
            <a href="{{url('TicketsDetail')}}" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Puntos Asignados</span>
            <i class="large material-icons">cached</i>
            <h4>
              <p>{{$Balance->points_solds}}</p>
            </h4>
          </div>
          <div class="card-action">
            <a href="{{url('PointsDetails')}}" class="btn btn-primary">Ver más</a>
          </div>
        </div>
      </div>

      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Puntos de Leipel</span>
            <img src="{{asset('sistem_images/Leipel Logo-02.png')}}" width="128px">
            <h4>
              <p>{{$Balance->my_points}}</p>
            </h4>
          </div>
          <div class="card-action">
            <a href="" class="btn-flat disabled "></a>
          </div>
        </div>
      </div>
    </div>

  <div class="row">
  <span class="card-title grey-text"><h3>Usuarios</h3></span>
  <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
    <li class="tab" id="Destacados"><a class="active" href="#test1">Usuarios Destacados</a></li>
    <li class="tab" id="Libres"><a href="#test2">Usuarios Libres</a></li>
  </ul>
  <div id="test1" class="col s12">
    <table class="responsive-table">
    <thead>
      <tr>
        <th><i class="material-icons"></i>Nombre</th>
        <th><i class="material-icons"></i>Email</th>
        <th><i class="material-icons"></i>Puntos</th>
        <th><i class="material-icons"></i>Puntos Pendientes</th>
        <th><i class="material-icons"></i>Limite de Puntos</th>
        <th><i class="material-icons"></i>Ultima Recarga</th>
      </tr>
    </thead>
    <tbody>
      @foreach($Users as $User)
      <tr>
       <td class="non-numeric">{{$User->name}}</td>
       <td class="non-numeric">{{$User->email}}</td>
       <td class="non-numeric">{{$User->points}}</td>
       <td class="non-numeric">{{$User->pending_points}}</td>
       <td class="non-numeric">{{$User->limit_points}}</td>
       @endforeach
       @foreach($Payments as $pay)
       <td class="non-numeric">{{$pay->first()->created_at->format('d/m/Y')}}</td>
       @endforeach
      </tr>

    </tbody>
  </table>
  </div>
  <div id="test2" class="col s12">
    <table class="responsive-table">
    <thead>
        <tr>
          <th><i class="material-icons"></i>Nombre</th>
          <th><i class="material-icons"></i>Email</th>
          <th><i class="material-icons"></i>Puntos</th>
          <th><i class="material-icons"></i>Fecha de Registro</th>
          <th><i class="material-icons"></i>Estatus</th>
        </tr>
    </thead>
      <tbody>
        @foreach($UnRefereds as $UnRefered)
        <tr>
         <td class="non-numeric">{{$UnRefered->name}}</td>
         <td class="non-numeric">{{$UnRefered->email}}</td>
         <td class="non-numeric">{{$UnRefered->points}}</td>
         <td class="non-numeric">{{$UnRefered->created_at}}</td>
         @if($UnRefered->verify==0)
         <td class="non-numeric">No Verificado</td>
         @else
         <td class="non-numeric">Verificado</td>
         @endif
         </tr>
        @endforeach    
     </tbody>
    </table>
  </div>
  </div>














			<div class="center">
				<a href="{{url('UserDetails')}}"><button type="button" class="btn btn-theme">Ver Mas
  			</button></a>
			</div>
  		</div>
  	</div>
</div>






<div class="row">
      <div class="col s12 m6 l4">
        <div class="card light-blue darken-3 hoverable">
          <div class="card-content white-text">
            <span class="card-title">Rutina De Puntos Pendientes</span>
            <i class="large material-icons">confirmation_number</i>
            <h4>
              <p>La siguiente accion debe ser ejecutada una vez al mes para pasar los puntos pendientes de los usuarios que no recargaron a leipel</p>
            </h4>
          </div>
          <div class="card-action">
            <button id="x" class="btn btn-primary">
              Revisar
            </button>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
   $(document).on('click', '#x', function() {
    console.log('cc');
    var url = 'PendingPointsRoutine';
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
      title: "¿Desea realmente ejecutar la rutina?",
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
            swal("Se han retirado un total de "+data['puntos']+" puntos de "+data['usuarios']+" usuarios")
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
</script>
@endsection