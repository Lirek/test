@extends('seller.layouts')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Registro
            </h1>
            {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
            {{--<li class="active">Dashboard</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary ">
                <div class="box-header with-border">
                    <h3 class="box-title">Radio</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['route'=>'radios.store', 'method'=>'POST','files' => 'true' ]) !!}
                {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
                {{ Form::token() }}
                <div class="box-body ">
                    <div class="form-group">
                        <label for="exampleInputFile" class="control-label">Nombre de la radio</label>
                        {!! Form::text('name_r',null,['class'=>'form-control','placeholder'=>'nombre de la radio'],['id'=>'exampleInputFile']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Url de la radio</label>
                        {!! Form::text('streaming',null,['class'=>'form-control','placeholder'=>'url de la radio'],['id'=>'exampleInputFile']) !!}
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email_c" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Logo de la radio</label>
                        {!! Form::file('logo',['class'=>'form-control-file','control-label']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Goolgle+</label>
                        {!! Form::text('google+',null,['class'=>'form-control','placeholder'=>'url de la google+'],['id'=>'exampleInputFile']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Instagram</label>
                        {!! Form::text('instagram',null,['class'=>'form-control','placeholder'=>'url de la instagram'],['id'=>'exampleInputFile']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Facebook</label>
                        {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'url de la Facebook'],['id'=>'exampleInputFile']) !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="control-label">Twitter</label>
                        {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'url de la Twitter'],['id'=>'exampleInputFile']) !!}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer text-center">
                    {{--<button type="guardar" class="btn btn-primary">Submit</button>--}}
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary active']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </section>

@endsection

