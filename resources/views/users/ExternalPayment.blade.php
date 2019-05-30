@extends('layouts.app')

@section('main')

@if($errors->any())

<h4>{{$errors->first()}}</h4>

@endif

<div class="row">
  <div class="col s12 m6">
    <div class="card blue-grey darken-1">
      <div class="card-content white-text">
        <span class="card-title">Pago en Puntos</span>
        <form action="" method="POST">
          <legend>Orden de Pago</legend>
          <div class="input-field">

              <div class="form-group">
                <span class="help-block">Pago: {{$payment}}</span>
              </div>

              <div class="form-group">
                <label for="token">Codigo de Confirmacion </label>
                    <input id="token" type="text" class="form-control" name="token"
                            required autofocus>
              </div>

              <div class="form-group">
                <span class="help-block">Valor en Puntos: {{$points}}</span>
              </div>
                <input type="text" name="id" hidden value="{{$transaction}}">
           </div>

          <button type="submit" class="btn">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection
