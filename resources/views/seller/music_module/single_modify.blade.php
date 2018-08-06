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

{!! Form::open(['url'=>'modify_single','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']) !!}
  {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
  {!! Form::hidden('id',$id) !!}
  {{ csrf_field() }}

  <div class="row" style="margin-left: 30px;">

    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-header with-border">
             <h3 class="box-title">Editar canción</h3>
        </div>

        <div class="box-body">

          <label for="Nombre de la Cancion">Nombre de la canción</label>
          <div id="mensajeNombreCancion"></div>
          {!! Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')"]) !!}
          <br>
          
          <label for="Costo en Tickets">Costo en tickets</label>
          <div id="mensajeTickets"></div>
          {!! Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets No Mayor a 999')", 'oninput'=>"setCustomValidity('')"]) !!}
          <br>

          <label for="Seleccione Música">Seleccione música </label>
          <label style="color: green;">
            Si no selecciona una canción, se mantendrá la actual.
          </label>
          <div id="mensajeCancion"></div>
          {!! Form::file('audio',['class'=>'form-control-file','accept'=>'.mp3','id'=>'cancion', 'oninvalid'=>"this.setCustomValidity('Seleccione una canción')",'oninput'=>"setCustomValidity('')"]) !!}
          <br>

          <label for="tags">Géneros</label>
          {{--
          <select name="tags[]" multiple="true" class="form-control">
            @foreach($tags as $genders)
              @if($genders->type_tags=='Musica')
                <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
              @endif
            @endforeach
          </select>
          --}}
          <select name="tags[]" multiple="true" class="form-control" required>
            @foreach($tags as $genders)
              <option value="{{$genders->id}}"
                @foreach($s_tags as $s) 
                  @if($s->id == $genders->id) 
                    selected 
                  @endif 
                @endforeach 
                >
                {{$genders->tags_name}}
              </option>
            @endforeach
          </select>
          <br>

          <label for="artist">Artista</label>
          <label style="color: green;">
            Si no selecciona un artista, se mantendrá el actual.
          </label>
          <select name="artist" class="form-control">
            <option value="">Seleccione un artista</option>
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
    {!! Form::submit('Editar canción',['class'=>'btn btn-primary','id'=>'editarCancion']) !!}
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
          $('#mensajeTickets').text('El costo de Tickets no deben exceder los 999 Tickets');
          $('#mensajeTickets').css('color','red');
          $('#editarCancion').attr('disabled',true);
        } else if (tickets<0) {
          $('#mensajeTickets').show();
          $('#mensajeTickets').text('El costo de Tickets debe ser mayor a 0');
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
  </script>
@endsection