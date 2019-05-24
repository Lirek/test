@extends('seller.layouts')
@section('css')
<link rel="stylesheet" href="https://cdn.plyr.io/3.3.21/plyr.css">
    <style>
        #image-preview {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 80%;
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

        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }


    </style>
    <style>
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    
    </style>
@endsection
@section('content')
@if (count($errors)>0)
    <div class="col s6 ">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<div class="row">
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h3 class="center">
                Modificar canción
            </h3>
            <br>
            <div class="row">
                {!! Form::open(['url'=>'modify_single','method'=>'POST','files' => 'true','class'=>'form-horizontal','role'=>'form']) !!}
                  {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                  {!! Form::hidden('id',$id) !!}
                  {{ csrf_field() }}
                <div class="col s12">
                    <input type="hidden" name="portada" id="portada" value="{{$song->cover}}">
                     <label class="control-label" for="option-1"> ¿La canción posee portada? </label>
                    <br>
                    <div class="">
                        <label for="option-1">
                            <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado" class="flat-red with-gap">
                            <span class="mdl-radio__label">Si</span>
                        </label>
                        <label for="option-2">
                            <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado" class="flat-red with-gap">
                            <span class="mdl-radio__label">No</span>
                        </label>
                    </div>
                    <br>
                    {{--Poster del single--}}
                    <div class="col s12 m6" style="display:none" id="poster"> 
                        <div id="mensajePortadaPelicula"></div>
                        <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Portada </label>
                            {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                            @if($song->cover)
                            <div id="list">
                                <img style="width:100%; height:100%; border-top:50%;" src="{{asset($song->cover)}}">
                            </div>
                            @else
                            <div id="list">
                            </div>
                            @endif
                        </div>
                    </div>
                     <div class="input-field col s12 m6">
                              @foreach(App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles as $mod)
                                @if($mod->name == 'Productora')
                                    @if(count($autors)!=0 )
                                    <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                    <select name="artist" id="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                      @foreach($autors as $artist)
                                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                                      @endforeach
                                    </select>
                                    <label for="artist"> Artista o Grupo musical </label>
                                    <br>
                                    <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                      Agregar artista o grupo musical
                                    </a>
                                  @else
                                    <label id="faltaRegistro" style="color: red;"> 
                                      Usted aun no tiene registros de datos de artistas o de grupos musicales, por favor agregue dichos datos primero
                                    </label>
                                    <br><br><br><br>
                                    <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                      Agregar artista o grupo musical
                                    </a>
                                  @endif
                                @elseif($mod->name == 'Artista')
                                  @if(count($autors)!=0 )
                                    <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                    <select name="artist" id="artist" class="form-control" required oninvalid="this.setCustomValidity('Seleccione un artista')" oninput="setCustomValidity('')">
                                      @foreach($autors as $artist)
                                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                                      @endforeach
                                    </select>
                                    <label for="artist"> Artista o Grupo musical </label>
                                  @else
                                    <br>
                                    <label id="faltaRegistro" style="color: red;"> 
                                      Usted aun no tiene registros de sus datos como artista o los datos de su grupo musical, por favor agregue dichos datos primero
                                    </label>
                                    <br><br><br><br>
                                    <a href="{{ url('/artist_form') }}" class="btn curvaBoton waves-effect waves-light green">
                                      Agregar artista o grupo musical
                                    </a>
                                  @endif
                                @endif
                              @endforeach
                        </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">create</i>
                        <label for="song_n">Nombre de la canción</label>
                        @if($song->status!='Aprobado')
                       {!! Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')"]) !!}
                       @else
                       {!! Form::text('song_n',$song->song_name,['class'=>'form-control','placeholder'=>'Nombre de la canción','required'=>'required','id'=>'song_n','oninvalid'=>"this.setCustomValidity('Ingrese un nombre valido')",'oninput'=>"setCustomValidity('')",'readonly'] ) !!}
                       @endif
                        <div id="mensajeNombreCancion"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                        <label for="Cost">Costo en tickets</label>
                        @if($song->status!='Aprobado')
                            {!! Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets No Mayor a 999')", 'oninput'=>"maxLengthCheck(this)"]) !!}
                        @else
                             {!! Form::number('cost',$song->cost,['class'=>'form-control','placeholder'=>'Costo en tickets','min'=>'0','pattern'=>'{3}','id'=>'cost', 'required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un costo en tickets No Mayor a 999')", 'oninput'=>"maxLengthCheck(this)",'readonly']) !!}
                        @endif
                        <div id="mensajeTickets"></div> 
                        <br>
                    </div>  
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                        @if($song->status!='Aprobado')
                        <select name="tags[]" multiple="true" class="form-control" id="tags" required>
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
                        @else
                        <select name="tags[]" multiple="true" class="form-control" id="tags" disabled="true">
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
                        @endif
                        <label for="tags"> Géneros </label>
                              
                        <br>
                    </div> 
                </div>
                @if($song->status!='Aprobado')
                <label style="color: green;">
            Si no selecciona una canción, se mantendrá la actual.
          </label>
                <div class="col s12">
                    <div class="file-field input-field col s12 m6">
                        <label for="cancion">Seleccione canción</label>
                        <br><br>
                        <div class="btn blue">
                            <span><i class="material-icons">music_note</i></span>
                           {!! Form::file('audio',['class'=>'form-control-file','accept'=>'.mp3','id'=>'cancion', 'oninvalid'=>"this.setCustomValidity('Seleccione una canción')",'oninput'=>"setCustomValidity('')"]) !!}
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" name="audio">
                        </div>
                        <br>
                        <div id="mensajeCancion"></div>
                        <br>
                    </div> 
               </div>
               <div class="col m12">
                    <audio id="player" class="player">
                        <source src="{{asset($song->song_file)}}" type="audio/mp3" id="play"> 
                    </audio>
                </div>
               @else
                
               @endif
               <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
               <div class="col s12">
                   <button class="btn curvaBoton waves-effect waves-light green" id="editarCancion">Editar canción</button>
                   <a href="{{ url('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
               </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
        <!-- /.modal  de generos  -->
<div id="modalgenero" class="modal">
    <div class="modal-content">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i> Agregar nuevo género</h4>
            <br>
        </div>
        <br>
       
                {!! Form::open(['route'=>'tags.store', 'method'=>'POST','files' => 'true' ]) !!}
                {{ Form::token() }}
                <div class="row">
                    <div class="col s12">
                        {!! Form::hidden('ruta','Musica') !!}
                        <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id}}" id="seller_id">
                        <input type="hidden" name="type_tags" value="Musica" id="type_tags">
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            <label for="new_tag" class="control-label">Nuevo género</label>
                            
                            <input type="text" name="tags_name" class="form-control"  id="new_tag" required="required" >
                            <div id="mensajegeneronuevo"></div>
                        </div>
                        <br>
                    </div>
                </div>
                <div align="center">
                    <button class="btn curvaBoton waves-effect waves-light green"  id="save-resource" onclick="callback()">Guardar género</button>
                </div>
            
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.plyr.io/3.3.21/plyr.js"></script>
<script type="text/javascript">
  const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
</script>
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
    // $(document).ready(function(){
    //   $('#cancion').change(function(){
    //       var tamaño = this.files[0].size;
    //       var tamañoKb = parseInt(tamaño/1024);
    //       if (tamañoKb>2048) {
    //           $('#mensajeCancion').show();
    //           $('#mensajeCancion').text('La canción es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
    //           $('#mensajeCancion').css('color','red');
    //           $('#editarCancion').attr('disabled',true);
    //       } else {
    //           $('#mensajeCancion').hide();
    //           $('#editarCancion').attr('disabled',false);
    //       }
    //   });
    // });
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
<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>
<script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
<script type="text/javascript">
 
    
 
    (function() {
 
    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
 
    $('#registroPelicula').ajaxForm({
        
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            var posterValue = $('input[name=audio').fieldValue();
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            $('#registrarAlbum').attr('disabled',true);
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        success: function() {
            var percentVal = 'Completado..';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            status.html(xhr.responseText);
            // alert('Uploaded Successfully');
            window.location.href = "{{URL::to('/my_music_panel/'.Auth::guard('web_seller')->user()->id) }}"

        }
    });
     
    })();
</script>
<script type="text/javascript">
    function archivo(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                document.getElementById("list").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('image-upload').addEventListener('change', archivo, false);
    // Para validar los radio boton
    $(document).ready(function(){
        if($('#portada').val() != ''){
            $('#option-1').prop('checked','checked');
             $('#poster').show();
             $('#image-upload').removeAttr('required');
        }else{
            $('#option-2').prop('checked','checked');
            $('#image-upload').removeAttr('required');
        }
      
    });

    function yesnoCheck() {
        if (document.getElementById('option-1').checked) {
            $('#poster').show();
            $('#image-upload').attr('required','required');
        } else {
            $('#poster').hide();
            $('#image-upload').removeAttr('required');
        }
    }
</script>
@endsection