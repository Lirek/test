@extends('layouts.app')

@section('main')  

<div class="row">
<div class="form-group"> 
    <div class="row-edit">
	<h4><i class="fa fa-angle-right"></i> Modificar Perfil</h4>
	<div class="col-md-12 col-sm-12 mb">
		<div class="form-group">
			{!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal','id'=>'edit']) !!}
             {{ Form::token() }}

                 {{--Nombre--}}
                 <div class="form-group ">
                    <div class="col-md-4  control-label">
                      {!! Form::label('name','Nombres',['class'=>'control-label']) !!}
                    </div>
                     <div class="col-md-6  control-label">
                       {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                     </div>
                  </div>


                   <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('last_name','Apellidos',['class'=>'control-label']) !!}
                         </div>
                        <div class="col-md-6 control-label"> 
                            {!! Form::text('last_name',$user->last_name,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--Correo--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('email','Correo',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::text('email',$user->email,['class'=>'form-control','readonly']) !!}
                        </div>
                    </div>
                     {{--Cedula Nota no es un select--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('ci','Cedula',['class'=>'control-label']) !!}
                        </div>

                        <div class="col-md-6 control-label">
                            @if($user->ci)
                            {!! Form::text('ci',$user->num_doc,['class'=>'form-control','readonly']) !!}
                            @else
                            {!! Form::text('ci',$user->num_doc,['class'=>'form-control']) !!}
                            @endif
                        </div>
                    </div>

                    {{--Imagen Documento--}}

                     <div class="form-group ">
                         <div id="image-preview" class="col-md-4 control-label">
                             <label for="image-upload" id="image-label">Imagen de Documento</label>
                        </div>
                        <div  class="col-md-4">
    							<img id="preview_img_doc" src="{{asset($user->img_doc)}}" name='ci' alt="your image" width="180" height="180" />
    							<div class="col-md-10 control-label">
    							     <input type='file' name="img_doc" id="img_doc" accept=".jpg" value="$user->img_doc"/>
    							</div>
                         </div>
                    </div>

                    {{--Genero --}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('num_doc','Sexo',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::select('type',['M'=>'Masculino', 'F'=>'Femenino'],$user->type,['class'=>'form-control','placeholder'=>'seleccione una opcion','control-label']) !!}
                        </div>
                    </div>

                    {{--Alias--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('alias','Alias',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::text('alias',$user->alias,['class'=>'form-control']) !!}
                        </div>
                    </div>


                    {{--Imagen Perfil--}}
                    <div class="form-group ">
                         <div id="image-preview" class="col-md-4 control-label">
                             <label for="image-upload" id="image-label">Imagen de Perfil</label>
                            <!--  <input type="file" name="img_perf" id="image-upload" accept=".jpg" required> -->
                        </div>
                        <div  class="col-md-4">
    							<img id="preview_img_perf" src="{{asset($user->img_perf)}}" name='perf' alt="your image" width="180" height="180" >
    							<div class="col-md-10 control-label">
    							<input type='file' name="img_perf" id="img_perf" accept=".jpg" value="$user->img_perf" />
    							</div>
                         </div>
                    </div>


                    {{--Fecha Nacimiento--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('fech_nac','Fecha de nacimiento',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::date('fech_nac',$user->fech_nac,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--Boton--}}
                    <div class="form-group text-center">
                        {!! Form::submit('Editar', ['class' => 'btn btn-primary active']) !!}
                    </div>


                    {!! Form::close() !!}
		</div>
	</div>
</div>
</div> 
</div>  

@endsection


@section('js')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imgId= '#preview_'+$(input).attr('id');
                $(imgId).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

   
    $("form#edit input[type='file' ]").change(function () {
        readURL(this);
    });
</script>

@endsection