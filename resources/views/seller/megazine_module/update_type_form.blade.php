@extends('seller.layouts')
@section('css')
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
<div class="col m6">
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
            <h4 class="titelgeneral"><i class="mdi mdi-book-open-page-variant"></i>  Modificar Cadena de Publicaciones} </h4>
            <div class="row">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/type_update',$pub_type->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id }}">
                <div class="input-fiel col m6 s12">
                    {{--Imagen--}}
                    <div id="mensajeFotoLibro"></div>
                    <label for="cargaPelicula" id="cargaPelicula" class="control-label" style="color: green;">
                        Si no selecciona una portada, se mantendrá la actual
                    </label>
                    <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                        <label for="image-upload" id="image-label"> Portada del Libro </label>
                            {!! Form::file('image',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                            <div id="list">
                                <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset($pub_type->img_saga)}}"/>
                            </div>
                    </div>
                </div>
                <div class="input-field col m6 s12">
                    <i class="material-icons prefix blue-text">create</i>
                    <label for="art_name" class="">Titulo de la cadena de publicación</label>
                    @if($pub_type->status != 'Aprobado')
                        <input id="art_name" type="text" class="form-control" name="title" value="{{$pub_type->sag_name}}" required autofocus>
                    @else
                        <input id="art_name" type="text" class="form-control" name="title" value="{{$pub_type->sag_name}}" readonly>
                    @endif       
                </div>
                {{--<div class="input-field  col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                    <select name="tags[]" multiple="true"  class="">
                        @foreach($tags as $genders) 
                            <option value="{{$genders->id}}">{{$genders->tags_name}}</option> 
                        @endforeach
                    </select>
                    <label for="tags"> 
                        Generos
                    </label>
                </div>--}}

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">book</i>
                    <label for="desc" class="">Descripción</label>
                    <textarea name="dsc" required class="materialize-textarea" rows="3" cols="2">{{$pub_type->sag_description}}</textarea>
                </div>
                <div class="input-field col s12 m6">
                      <div class="input-field col s12">
                      {{--Categoria--}}
                          <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                          @if($pub_type->status != 'Aprobado')
                          {!! Form::select('rating_id',$rating,null,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                          @else
                          {!! Form::select('rating_id',$rating,null,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')",'disable'=>'true']) !!}
                      </select>
                      @endif
                       <label for="tags">Generos</label>
                      </div>
                  </div>
                <button type="submit" class="btn curvaBoton waves-effect waves-light green">
                        Modificar
                </button>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
@section('js')
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