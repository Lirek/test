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
                                <input id="art_name" type="text" class="form-control" name="title" required autofocus>
                            </div>
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
                        
                            
                           <div id="image-preview">
                          <label for="image-upload" id="image-label">Caratula</label>
                          <input type="file" name="image" id="image-upload" class="form-control" />
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-md-4 control-label">Descripcion</label>

                            <div class="col-md-6">
                                <textarea name="dsc" required>

                                </textarea>
                            </div>
                        </div>


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
@endsection
