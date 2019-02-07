@extends('layouts.app')

@section('main')

 <div  class="col m6 s12 ">
      <div class="card">
          <div class="card-image"> 
              <img  src="{{asset('promociones/PromocionGalapagosImg.jpg')}}"  >
          </div>
          <div class="card-action">
              <a  href="{{asset('promociones/PromocionGalapagosInfo.pdf')}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Ver detalles</a>
              <a  href="{{asset('#')}}" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
              <br>
          </div>
      </div>
  </div>

  <div  class="col m6 s12 ">
      <div class="card">
          <div class="card-image"> 
              <img  src="{{asset('promociones/TarjetaMAXIBONO.jpg')}}" >
          </div>
          <div class="card-action">
              <a  href="{{asset('promociones/PremiosLeipelTarjetaMaxibono.pdf')}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Ver detalles</a>
              <a  href="{{asset('#')}}" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
              <br>
          </div>
      </div>
  </div>

@endsection