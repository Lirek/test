@extends('layouts.app')
@section('css')

<style>
	
</style>

@section('main')


@foreach($beneficio as $bene)
<center>
 <div  class="col m4 s6 ">
      <div class="card">
          <div class="card-image"> 
              <img  src="{{asset($bene->imagen_prod)}}"  >
          </div>
          <div class="card-action">
              <a  href="{{asset($bene->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Ver detalles</a>
              <a  href="{{asset('#')}}" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
              <br>
          </div>
      </div>
  </div>
  </center>

  @endforeach
@endsection