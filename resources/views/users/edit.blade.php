@extends('layouts.app')

@section('title','Editar Usuario')

@section('content')

    <div class="row">


        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editando
                </div>

                <div class="panel-body">

                    {!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'files'=>true,'class'=>'form-horizontal']) !!}
                    {{ Form::token() }}

                    {{--Nombre--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('name','Nombres',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    {{--Apellido--}}
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
                            {!! Form::text('ci',$user->ci,['class'=>'form-control']) !!}
                        </div>
                    </div>


                    {{--Imagen Documento--}}{{-- esto me da error corregir--}}
                    <div class="form-group ">
                    <div class="col-md-4 control-label">
                    {!! Form::label('img_doc','Imagen del Documento',['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-6 control-label">
                    {!! Form::file('img_doc',$user->img_doc,['class'=>'form-control-file','control-label']) !!}
                    </div>
                    </div>

                    {{--Genero --}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('num_doc','Genero',['class'=>'control-label']) !!}
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
                         <div id="image-preview" style="border:#000000 1px solid; background-image={{asset($user->img_perf})}; background-size:240px 240px;" class="col-md-6">
                             <label for="image-upload" id="image-label">Imagen de Perfil</label>
                             <input type="file" name="img_perf" id="image-upload" accept=".jpg" required>
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

                    {{--Clave o Password--}}
                    {{--<div class="form-group ">--}}
                    {{--<div class="col-md-4 control-label">--}}
                    {{--{!! Form::label('password','Password ',['class'=>'control-label']) !!}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 control-label">--}}
                    {{--{!! Form::password('password',['class'=>'form-control','awesome']) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--Boton--}}
                    <div class="form-group text-center">
                        {!! Form::submit('Editar', ['class' => 'btn btn-primary active']) !!}
                    </div>


                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')

<script type="text/javascript">

$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

</script>

@endsection