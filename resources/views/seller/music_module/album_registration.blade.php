@extends('seller.layouts')
</div>
<style type="text/css">
#image-preview {
  width: 280px;
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

input.invalid, select.invalid, textarea.invalid{
  border: 2px solid red;
}

input.valid, select.valid textarea.valid{
  border: 2px solid green;
}

</style>

@section('content')
@include('flash::message')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ url('/albums') }}" enctype="multipart/form-data" id="formulario">

<input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">

                    {{ csrf_field() }}

<div class="row" style="margin-left: 30px;">
    
        <div class="col-sm-7">
        
            <div class="box box-primary">
            
                 <div class="box-header with-border">
                     <h3 class="box-title">Album</h3>
                 </div>

                     <div class="box-body">
                         <div id="image-preview" style="border:#000000 1px solid ;" class="col-md-1">
                             <label for="image-upload" id="image-label">Portada</label>
                             <input type="file" name="image" id="image-upload" accept=".jpg" required  oninvalid="this.setCustomValidity('Seleccione Un Archivo de Portada')"
                                oninput="setCustomValidity('')" />
                         </div>

                        <div class="col-md-6">
                         
                        
                         <label for="album"> 
                          Nombre del Album
                         </label>
                         <input type="text" name="album" class="form-control required" id="title"  oninvalid="this.setCustomValidity('Inserte Un Nombre de Album Valido')"
                            oninput="setCustomValidity('')">
            
                         <label for="cost"> 
                          Costo en Tickets
                         </label>

                         <input type="number" id="cost" min="0" max="100" pattern="{1-3}" name="cost" class="form-control"  onKeyPress="return checkIt(event)"  oninvalid="this.setCustomValidity('Ingrese un Costo en Tickets No Mayor a 100')"
                          oninput="setCustomValidity('')">
            
                         <label for="tags"> 
                          Generos
                         </label>

                         <select name="tags[]" multiple="true"  class="form-control js-example-basic-multiple" id="genders" required>
                             @foreach($tags as $genders)
                             @if($genders->type_tags=='Musica')
                             <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                             @endif
                             @endforeach
                          </select>
                          <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalgenero">Agregar Genero</button>
                          <br>

                         <label for="artist"> 
                         Artista
                         </label>
                        
                         <select name="artist" class="form-control js-example-basic-single" required oninvalid="this.setCustomValidity('Seleccione Un Artista')"
                          oninput="setCustomValidity('')">
                         @foreach($autors as $artist)
                             <option value="{{$artist->id}}">{{$artist->name}}</option>
                         @endforeach
                         </select>

                        </div>


                     </div>
             </div>

        </div>

      


            <div class="col-sm-5">  
        
            <div class="box box-primary" style="margin-rigth: 30px;">
        
            <div class="box-header with-border">
            <h3 class="box-title">Canciones</h3>
            </div>

            <div class="box-body">
           
            <div id="example-2">
            
                <div class="row">
                <div class="col-sm-5"><button type="button" id="btnAdd-2" class="btn btn-success">Añadir Canciones</button></div>
                </div>

             <br>

                <div class="row group">
                <div class="col-sm-5">
                <input required type="text" name="song_n[]" id="title" placeholder="Nombre de la Cancion" class="form-control"  oninvalid="this.setCustomValidity('Ingrese Un Nombre a La Cancion')"
                oninput="setCustomValidity('')">

                <input type="file" name="audio[]" accept=".mp3" id="audio" class="form-control">
                </div>

                <div class="col-sm-5">
                    <button type="button" class="btn btn-danger btnRemove">Eliminar Cancion</button>
                </div>
            </div>
        </div>
              
                          
            </div>
        </div>
</div>

   
        
</div>
<div align="center">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>   
        </div>
</form>
</div>


<div class="modal modal-primary fade" role="dialog" id="modalgenero">
  <div class="modal-header">
    <h1>Agregar Genero</h1>
  </div>
      <div class="modal-body">
        
        <form id="Form1" method="POST">

              <input type="text" name="tag" id="new_tag" placeholder="Ingrese el Nuevo Genero" class="form-control">
              {{ csrf_field() }}
          
              <button id="save-resource" type="submit" class="ui mini grey button button-rounded save-btn"><i class="save icon"></i>  Guardar</button>
          </form>
      
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>  
      </div>
</div>



@endsection

@section('js')
<script>

$('#example-2').multifield({
	section: '.group',
	btnAdd:'#btnAdd-2',
	btnRemove:'.btnRemove'
});


var i=0;
function sum()
{
    i++;
};



$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

$(".chosen1").chosen({
    disable_search_threshold: 10,
    no_results_text: "No se encuentra el Artista",
    width: "45%",
    placeholder_text_single:"Seleccione un Artista"
  }); 
    
$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

$(document).ready(function (e){

$('#title').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

$('#genders').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});

$('#cost').on('input', function() {
  var input=$(this);
  var is_name=input.val();
  if(is_name <=100){input.removeClass("invalid").addClass("valid");}
  else{input.removeClass("valid").addClass("invalid");}
});






$( "#Form1" ).on( 'submit', function(e)
{
    e.preventDefault();
    $.ajax({
            url: 'tagMusic',
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                name: $('input[name=tag]').val(),
            }, 
            success: function (result) {
                alert("Guardado Con Exito");
            },
            error: function (result) {
            alert('Existe un Error en su Solicitud Por Favor Revise Los Datos Ingresados');
                                console.log(result);
            }
        });  
    });
});


function checkIt(evt) {

    evt = (evt) ? evt : window.event

    var charCode = (evt.which) ? evt.which : evt.keyCode

    if (charCode > 31 && (charCode < 48 || charCode > 57)) {

        status = "This field accepts numbers only."

        return false

    }

    status = ""

    return true

};

function validarFormulario(){
    jQuery.validator.messages.required = 'Esta campo es obligatorio.';
    jQuery.validator.messages.number = 'Esta campo debe ser num&eacute;rico.';
    jQuery.validator.messages.email = 'La direcci&oacute;n de correo es incorrecta.';
    $("#enviar").click(function(){
       var validado = $("#formulario").valid();
       if(validado){
          alert('El formulario es correcto.');
       }
    });
}
</script>
@endsection