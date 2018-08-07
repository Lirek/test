@extends('seller.layouts')
<style type="text/css">
/*
  #image-preview {
    width: 400px;
    height: 400px;
    position: relative;
    overflow: hidden;
    background-color: #ffffff;
    color: #ecf0f1;
  }
  #image-preview input {
    line-height: 200px;
    font-size: 200px;
    position: absolute;
    opacity: 0;
    z-index: 10;
  }
  #image-preview label {
    position: absolute;
    z-index: 5;
    opacity: 0.8;
    cursor: pointer;
    background-color: #bdc3c7;
    width: 200px;
    height: 50px;
    font-size: 20px;
    line-height: 50px;
    text-transform: uppercase;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    text-align: center;
  }
*/
</style>

@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

{!! Form::open(['url'=>'modify_single','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']) !!}
  {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
  {!! Form::hidden('id',$id) !!}
  {{ csrf_field() }}

  <div class="row" style="margin-left: 30px;">

    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-header with-border">
             <h3 class="box-title">Editar Canción</h3>
        </div>

        <div class="box-body">

          <label for="Nombre de la Cancion">Nombre de la Canción</label>
          <div id="mensajeNombreCancion"></div>
          {!! Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la Canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un Nombre Valido')",'oninput'=>"setCustomValidity('')"]) !!}
          <br>
          
          <label for="Costo en Tickets">Costo en Tickets</label>
          <div id="mensajeTickets"></div>
          {!! Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en Tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 999')", 'oninput'=>"setCustomValidity('')"]) !!}
          <br>

          <label for="Seleccione Música">Seleccione Música </label>
          <label style="color: green;">
            Si no selecciona una Canción, se mantendrá la actual
          </label>
          <div id="mensajeCancion"></div>
          {!! Form::file('audio',['class'=>'form-control-file','accept'=>'.mp3','id'=>'cancion', 'oninvalid'=>"this.setCustomValidity('Seleccione una Canción')",'oninput'=>"setCustomValidity('')"]) !!}
          <br>

          <label for="tags">Géneros</label>
          <label style="color: green;">
            Si no selecciona un Género, se mantendrá el actual
          </label>
          <select name="tags[]" multiple="true" class="form-control">
            @foreach($tags as $genders)
              @if($genders->type_tags=='Musica')
                <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
              @endif
            @endforeach
          </select>
          <br>

          <label for="artist">Artista</label>
          <label style="color: green;">
            Si no selecciona un Artista, se mantendrá el actual
          </label>
          <select name="artist" class="form-control">
            <option value="">Seleccione...</option>
            @foreach($artist as $author)
              <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
          </select>
          <br>

        </div>
      </div>
    </div>
  </div>
  <div align="center">
    <a href="{{ url('/my_music_panel',Auth::guard('web_seller')->user()->id) }}" class="btn btn-danger">Atrás</a>
    {!! Form::submit('Editar Canción',['class'=>'btn btn-primary','id'=>'editarCancion']) !!}
  </div>
{!! Form::close() !!}


@endsection
@section('js')
  <script>
//---------------------------------------------------------------------------------------------------
// Para validar la longtud del nombre de la cancion
    $(document).ready(function(){
        var cantidadMaxima = 191;
        $('#song_n').keyup(function(evento){
            var cancion = $('#song_n').val();
            numeroPalabras = cancion.length;
            $('#cantidadPalabra').text(numeroPalabras+'/'+cantidadMaxima);
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeNombreCancion').show();
                $('#mensajeNombreCancion').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeNombreCancion').css('color','red');
                $('#editarCancion').attr('disabled',true);
            } else {
                $('#mensajeNombreCancion').hide();
                $('#editarCancion').attr('disabled',false);
            }
        });
    });
// Para validar la longtud del nombre de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño de la cancion
    $(document).ready(function(){
      $('#cancion').change(function(){
          var tamaño = this.files[0].size;
          var tamañoKb = parseInt(tamaño/1024);
          if (tamañoKb>2048) {
              $('#mensajeCancion').show();
              $('#mensajeCancion').text('La canción es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
              $('#mensajeCancion').css('color','red');
              $('#editarCancion').attr('disabled',true);
          } else {
              $('#mensajeCancion').hide();
              $('#editarCancion').attr('disabled',false);
          }
      });
    });
// Para validar el tamaño de la cancion
//---------------------------------------------------------------------------------------------------
// Para validar la cantidad de Tickets
    $(document).ready(function(){
      $('#cost').keyup(function(evento){
        var tickets = $('#cost').val();
        if (tickets>999) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#editarCancion').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#editarCancion').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#editarCancion').attr('disabled',false);
        }
      });
    });
// Para validar la cantidad de Tickets
//---------------------------------------------------------------------------------------------------
    /*
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
        
    var getFile = new selectFile;
    getFile.targets('choose','selected');

    $(document).ready(function() {
      $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label"
      });
    });
  */
  </script>
@endsection