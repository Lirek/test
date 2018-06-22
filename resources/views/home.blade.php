@extends('layouts.app')

@section('main')
<div class="container">
   <div class="row">
    

    @if(Auth::user()->verify==FALSE)
    <div class="col s4">
      <div class="card teal">
        <div class="card-content white-text">
          <span class="card-title">Finalize Su Registro</span>
          <p>Le Recordamos que Aun Faltan Documentos que Adjuntar para Disfrutar de Todo Lo Que Puede Ofrecer Nuestra Plataforma, Le Invitamos a Completarlo</p> 
        </div>
        <div class="card-action">
          <a href="#">Finalizar Registro</a>
        </div>
      </div>
    </div>
    @endif
    
    <div class="col s6">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Contenido Reciente</span>
           <table>
        <thead>
          <tr>
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Costo</th>
              <th>Proveedor</th>
          </tr>
        </thead>

        <tbody>

          @if($Albums)
            <tr>
                <td>{{$Albums->name_alb}}</td>
                <td>Album Musical</td>
                <td>{{$Albums->cost}}</td>
                <td>{{$Albums->Seller->name}}</td>
                <td><i class="material-icons circle">forward</i></td>
            </tr>
          @endif

         @if($Tv)
            <tr>
                <td>{{$Tv->name_r}}</td>
                <td>TV Online</td>
                <td>Gratis</td>
                <td>{{$Tv->Seller->name}}</td>
                <td><i class="material-icons circle">forward</i></td>
            </tr>
          @endif

          @if($Book)
          <tr>
            <td>{{$Book->title}}</td>
            <td>Libro</td>
            <td>{{$Book->cost}}</td>
            <td>{{$Book->seller->name}}</td>
            <td><i class="material-icons circle">forward</i></td>
          </tr>
          @endif
          
          @if($Megazines)
          <tr>
            <td>{{$Megazines->title}}</td>
            <td>Revista</td>
            <td>{{$Megazines->cost}}</td>
            <td>{{$Megazines->Seller->name}}</td>
            <td><i class="material-icons circle">forward</i></td>
          </tr>
          @endif
          
          @if($Radio)
          <tr>
            <td>{{$Radio->name_r}}</td>
            <td>Radio Online</td>
            <td>Gratis</td>
            <td>{{$Radio->Seller->name}}</td>
            <td><i class="material-icons circle">forward</i></td>
          </tr>
          @endif
         
         @if($Movies)
          <tr>
            <td>{{$Movies->title}}</td>
            <td>Pelicula</td>
            <td>{{$Movies->cost}}</td>
            <td>{{$Radio->Seller->name}}</td>
            <td><i class="material-icons circle">forward</i></td>
          </tr>
         @endif

        </tbody>
      </table>
        </div>
        
      </div>
    </div>

    <div class="col s4">
      <div class="card teal">
        <div class="card-content white-text">
          <span class="card-title">Tickets Disponibles</span>
          <p>{{Auth::user()->credito}}</p> 
        </div>
        <div class="card-action">
          <a href="#">Recargar</a>
        </div>
      </div>
    </div>

        <div class="col s4">
          <div class="card white">
            <div class="card-content black-text">
              <span class="card-title">Proveedores Populares</span>
                <ul class="collection">
                  <li class="collection-item avatar">
                    <i class="material-icons circle green">folder</i>
                        <span class="title">Tu Mejor Mp3</span>
                        <p>Proveedor de Contenido Musical <br>
                            Lo que deseas escuchar al mejor precio
                        </p>
                         <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                    </li>
                     <li class="collection-item avatar">
      <i class="material-icons circle green">folder</i>
      <span class="title">LectuLandia</span>
      <p>Los Mejores Libros En El Mejor Lugar<br>
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                     </li>



                </ul>
            </div>
         </div>
        </div>
        <div class="col s4 white">
            <canvas id="myChart" width="150" height="150"></canvas>
        </div>
         </div>
  </div>

  <div class="row">
    
  </div>
@endsection



@section('js')
<script>
$(document).ready(function(){

   $.ajax({ 
            url: 'ContentGraph',
            type:'GET',
            success: function(respuesta) {
                    var data=respuesta;
                       var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Musica", "Libros", "Revistas", "Peliculas", "Radios", "Tvs","Series"],
        datasets: [{
            label: '# De Contenido',
            data: data,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 102, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
    });
                                        },
                error: function() {
                    console.log("No se ha podido obtener la información");
                                  }
           });


 
});

</script>
@endsection