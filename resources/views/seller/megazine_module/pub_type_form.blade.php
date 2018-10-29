@extends('seller.layouts')
<style type="text/css">
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
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Cadena de Publicaciones</div>
                <div class="panel-body">
                    @include('flash::message')

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/type') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                    <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">


                        <div class="form-group">
                            <label for="art_name" class="col-md-4 control-label">Titulo De La Cadena de Publicacion</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="title" required autofocus>
                            </div>
                            <div id="mensajeTitulo"></div>
                        </div>



                        <div class="form-group col-md-6">
                         
                         <label for="tags"> 
                         Generos
                         </label>
                         
                         <select name="tags[]" multiple="true"  class="form-control js-example-basic-multiple">
                             @foreach($tags as $genders)
                             
                             <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                             
                             @endforeach
                         </select>
                        
                        <!--     
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">Caratula</label>
                            <input type="file" name="image" id="image-upload" class="form-control" />

                        </div> -->
                        <br>
                        <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Portada  </label>
                              {!! Form::file('image',['class'=>'form-control control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                           <div id="list"></div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="dsc" required id="sinopsis" class="form-control" rows="3" cols="2"  placeholder="Descripción de la revista"></textarea>
                                <div id="mensajeSinopsis"></div>
                            </div>
                            
                        </div>

                        {{--seleccion de rating--}}
                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
   $("#titulo").change(function(){
        var nombre = $("#titulo").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulo').show();
            $('#mensajeTitulo').text('El titulo no debe estar vacio');
            $('#mensajeTitulo').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeTitulo').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
   $("#sinopsis").change(function(){
        var nombre = $("#sinopsis").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeSinopsis').show();
            $('#mensajeSinopsis').text('La descripción no debe estar vacia');
            $('#mensajeSinopsis').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeSinopsis').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
</script>
<script>

 $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});



$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});
</script>
<script>

function portada(evt) {
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
    document.getElementById('image-upload').addEventListener('change', portada, false);
</script>
@endsection
