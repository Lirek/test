@extends('layouts.app')

@section('title','Editar Usuario')

@section('content')

    <div class="row">

        <div class="text-center">
            <h2>
                <b>
                    <i>
                        <u> Editar {{ $user->name }}</u>
                    </i>
                </b>
            </h2>
        </div>
        <br/>
        <br/>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editando
                </div>

                <div class="panel-body">

                    {!! Form::open(['route'=>['users.update',$user],'method'=>'PUT', 'file'=>true,'class'=>'form-horizontal']) !!}
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

                    {{--Codigo Referido--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('codigo_ref','Codigo Referido',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::text('codigo_ref',$user->codigo_ref,['class'=>'form-control']) !!}
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

                    {{--Numero de documento Nota no se documento--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('num_doc','Numero Documento',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::text('num_doc',$user->num_doc,['class'=>'form-control']) !!}
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
                            {!! Form::label('num_doc','Numero Documento',['class'=>'control-label']) !!}
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
                            {!! Form::text('alias',$user->alias,['class'=>'form-control','control-label']) !!}
                        </div>
                    </div>

                    {{--Imagen Perfil--}}{{-- da error corregir--}}
                    <div class="form-group ">
                    <div class="col-md-4 control-label">
                    {!! Form::label('img_perf','Imagen del Perfil',['class'=>'control-label']) !!}
                    </div>
                    <div class="col-md-6 control-label">
                    {!! Form::file('img_perf',$user->img_perf,['class'=>'form-control-file','control-label']) !!}
                    </div>
                    </div>

                    {{--Credito--}}
                    <div class="form-group ">
                        <div class="col-md-4 control-label">
                            {!! Form::label('credito','Credito',['class'=>'control-label']) !!}
                        </div>
                        <div class="col-md-6 control-label">
                            {!! Form::number('credito',$user->credito,['class'=>'form-control','readonly']) !!}
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