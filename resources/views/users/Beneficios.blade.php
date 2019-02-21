@extends('layouts.app')
@section('css')

<style>
	
</style>

@section('main')

<div class="row">
  <div class="col s12 m12">
    <div class="col s12 m8">
    <h5 ALIGN="justify" >Leipel agradece con su árbol de beneficios a cualquier usuario que nos traiga más amigos que también compren tickets.
    Gana y acumula puntos para cambiarlos por los siguientes beneficios:</h5>
    <span style="padding-left: 40%">(Aplica al momento sólo en territorio ecuatoriano)</span>
    </div>
    <div class="col s12 m4">
      <iframe width="250" height="170" src="https://www.youtube.com/embed/NgnsW2M3X1A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
  </div>
</div>
@if($beneficio != "")
  @foreach($beneficio as $bene)
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
  @endforeach
@else
  <div class="col s6 offset-s3">
      <br><br>
      <blockquote >
          <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>En este momento no tenemos promociones disponibles.</h5>
      </blockquote>
  </div>
</div><!--End div row -->
@endif
@endsection