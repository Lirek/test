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

                @if(\Auth::guard('web_seller')->user()->id === $author->seller_id)

                    <div class="box box-primary ">
                        <div class="box-header with-border bg bg-black-gradient">
                            <h3 class="box-title">Autor</h3>
                        </div>
                        <!-- /.box-header -->

                        <!-- form start -->
                        {!! Form::open(['route'=>['authors_books.update',$author], 'method'=>'PUT','files' => 'true' ]) !!}
                        {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
                        {{ Form::token() }}

                        <div class="box-body ">

                            {{--Imagen--}}
                            <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Foto del autor </label>
                                {!! Form::file('photo',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}

                            </div>

                            <div class="form-group col-md-4">
                                {{--nombre de la autor--}}
                                <label for="exampleInputFile" class="control-label">Nombres y Apellidos</label>
                                {!! Form::text('full_name',$author->full_name,['class'=>'form-control autofocus','placeholder'=>'nombre completo del autor'],['id'=>'exampleInputFile']) !!}

                                {{--correo o email de la radio--}}
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" name="email_c" class="form-control" id="exampleInputEmail1"
                                       placeholder="example@gmail.com" value="{{ $author->email }}">

                            </div>
                            <br/>

                            {{--link d google+--}}
                            <div class="input-group col-md-3">
                                <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                {!! Form::text('google',$author->google,['class'=>'form-control','placeholder'=>'Google+'],['id'=>'exampleInputFile']) !!}
                            </div>
                            {{--lin de instagram--}}
                            <div class="input-group col-md-3">
                                <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                {!! Form::text('instagram',$author->instagram,['class'=>'form-control','placeholder'=>'Instagram'],['id'=>'exampleInputFile']) !!}
                            </div>
                            {{--link de facebook--}}
                            <div class="input-group col-md-3">
                                <span class="input-group-addon"><i class="fa fa-facebook-official"></i></span>
                                {!! Form::text('facebook',$author->facebook,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook']) !!}
                            </div>

                            {{--lind de twitter--}}
                            <div class="input-group col-md-3">
                                <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                {!! Form::text('twitter',$author->twitter,['class'=>'form-control','placeholder'=>'Twitter'],['id'=>'twitter']) !!}
                            </div>

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <div class="text-center">
                        {{--<button type="guardar" class="btn btn-primary">Submit</button>--}}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary active']) !!}
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
