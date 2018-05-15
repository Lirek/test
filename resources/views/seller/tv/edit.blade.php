@extends('seller.layouts')

@section('css')

    <style>
        #image-preview {
            width: 400px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
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

@endsection

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

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @if(\Auth::guard('web_seller')->user()->id === $tv->seller_id)

                    <div class="box box-primary ">
                        <div class="box-header with-border bg-navy color-palette">
                            <h3 class="box-title">Canal {{ $tv->name_r }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        {!! Form::open(['route'=>['tvs.update',$tv], 'method'=>'PUT','files' => 'true' ]) !!}
                        {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
                        {{ Form::token() }}

                        <div class="box-body ">

                            {{--Imagen--}}
                            <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label">Logo o Foto Radio</label>
                                {!! Form::file('logo',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}

                            </div>

                            <div class="form-group col-md-4">
                                {{--nombre de la radio--}}
                                <label for="exampleInputFile" class="control-label">Nombre del canal</label>
                                {!! Form::text('name_r',$tv->name_r,['class'=>'form-control autofocus','placeholder'=>'nombre del canal'],['id'=>'exampleInputFile']) !!}

                                {{--link de la radio--}}
                                <label for="exampleInputPassword1" class="control-label">Url del canal</label>
                                {!! Form::text('streaming',$tv->streaming,['class'=>'form-control','placeholder'=>'https://www.dailymotion.com/embed/video/xio7e2'],['id'=>'exampleInputFile']) !!}

                                {{--correo o email del canal--}}
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" name="email_c" class="form-control" value="{{ $tv->email_c }}"
                                       placeholder="example@gmail.com">
                            </div>

                            {{--inicio de la agrupacion--}}
                            <div class="form-group col-sm-3">

                                {{--link d google+--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                    {!! Form::text('google',$tv->google,['class'=>'form-control','placeholder'=>'Google+'],['id'=>'exampleInputFile']) !!}
                                </div>
                                {{--lin de instagram--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    {!! Form::text('instagram',$tv->instagram,['class'=>'form-control','placeholder'=>'Instagram'],['id'=>'exampleInputFile']) !!}
                                </div>
                                {{--link de facebook--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                                    {!! Form::text('facebook',$tv->facebook,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook']) !!}
                                </div>

                                {{--lind de twitter--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                    {!! Form::text('twitter',$tv->twitter,['class'=>'form-control','placeholder'=>'Twitter'],['id'=>'twitter']) !!}
                                </div>

                            </div>
                            {{--final de la agrupacion--}}

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <div class="text-center">
                        {{--<button type="guardar" class="btn btn-primary">Submit</button>--}}
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary active']) !!}
                    </div>
                    {!! Form::close() !!}

                @else

                    <div class="text-center">
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/>

                        <h1 class="text-danger">
                            <strong>
                                No tiene permitido el acceso...
                            </strong>
                        </h1>

                    </div>

                @endif

            </div>
        </div>

    </section>

@endsection



@section('js')

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script>
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
            });
        });
    </script>

@endsection