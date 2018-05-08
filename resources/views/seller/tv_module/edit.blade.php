@extends('seller.layouts')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editando
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
            {!! Form::open(['route'=>['tvs.update',$tv], 'method'=>'PUT','files' => 'true' ]) !!}
            {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
            {{ Form::token() }}
            <div class="box-body ">
                <div class="form-group">
                    <label for="exampleInputFile" class="control-label">Nombre de la tv</label>
                    {!! Form::text('name_r',$tv->name_r,['class'=>'form-control','placeholder'=>'nombre de la tv'],['id'=>'exampleInputFile']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="control-label">Url de la radio</label>
                    {!! Form::text('streaming',$tv->streaming,['class'=>'form-control','placeholder'=>'url de la tv'],['id'=>'exampleInputFile']) !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email_c" class="form-control" value="{{ $tv->email_c }}" id="exampleInputEmail1" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Logo de la radio</label>
                    {!! Form::file('logo',['class'=>'form-control-file','control-label']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="control-label">Goolgle+</label>
                    {!! Form::text('google+',$tv->google,['class'=>'form-control','placeholder'=>'url de la google+'],['id'=>'exampleInputFile']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="control-label">Instagram</label>
                    {!! Form::text('instagram',$tv->instagram,['class'=>'form-control','placeholder'=>'url de la instagram'],['id'=>'exampleInputFile']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="control-label">Facebook</label>
                    {!! Form::text('facebook',$tv->facebook,['class'=>'form-control','placeholder'=>'url de la Facebook'],['id'=>'exampleInputFile']) !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="control-label">Twitter</label>
                    {!! Form::text('twitter',$tv->twitter,['class'=>'form-control','placeholder'=>'url de la Twitter'],['id'=>'exampleInputFile']) !!}
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer text-center">
                {{--<button type="guardar" class="btn btn-primary">Submit</button>--}}
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary active']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection



@section('js')

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

@endsection