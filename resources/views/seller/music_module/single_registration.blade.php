@extends('seller.layouts')
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
  @include('flash::message')
  {!! Form::open(['url'=>'single_registration','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']) !!}
    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
    {{ csrf_field() }}
    <div class="row" style="margin-left: 30px;">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Registrar Canción</h3>
          </div>
          <div class="box-body">
            <label for="Nombre de la Cancion">Nombre de la Canción</label>
            <div id="mensajeNombreCancion"></div>
            {!! Form::text('song_n',null,['class'=>'form-control','placeholder'=>'Nombre de la Canción','required'=>'required','id'=>'song_n' ,'oninvalid'=>"this.setCustomValidity('Ingrese un Nombre Valido')",'oninput'=>"setCustomValidity('')"]) !!}
            <br>

            <label for="Costo en Tickets">Costo en Tickets</label>
            <div id="mensajeTickets"></div>
            {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'Costo en Tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 999')", 'oninput'=>"setCustomValidity('')"]) !!}
            <br>

            <label for="Seleccione Música">Seleccione Música</label>
            <div id="mensajeCancion"></div>
            {!! Form::file('audio',['class'=>'form-control','accept'=>'.mp3','id'=>'cancion','required'=>'required', 'oninvalid'=>"this.setCustomValidity('Seleccione una Canción')",'oninput'=>"setCustomValidity('')"]) !!}
            <br>

            <label for="tags">Géneros</label>
            <select name="tags[]" multiple="true" class="form-control" required>
              @foreach($tags as $genders)
                @if($genders->type_tags=='Musica')
                  <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                @endif
              @endforeach
            </select>
            <br>

            <label for="artist">Artista</label>
            <select name="artist" class="form-control" required="required">
              <option value="">Seleccione...</option>
              @foreach($autors as $artist)
                <option value="{{$artist->id}}">{{$artist->name}}</option>
              @endforeach
            </select>
            <br>

          </div>
        </div>
      </div>
    </div>
        <div align="center">
          {!! Form::submit('Registar Canción',['class'=>'btn btn-primary','id'=>'registarCancion']) !!}
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
                $('#registrarAlbum').attr('disabled',true);
            } else {
                $('#mensajeNombreCancion').hide();
                $('#registrarAlbum').attr('disabled',false);
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
              $('#registrarAlbum').attr('disabled',true);
          } else {
              $('#mensajeCancion').hide();
              $('#registrarAlbum').attr('disabled',false);
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
          $('#registrarAlbum').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('La cantidad de Tickets debe ser mayor a 0');
          $('#mensajeTickets').css('color','red');
          $('#registrarAlbum').attr('disabled',true);
        } else {
          $('#mensajeTickets').hide();
          $('#registrarAlbum').attr('disabled',false);
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