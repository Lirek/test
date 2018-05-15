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

        input:invalid {
            border: 1px solid red;
        }

        input:valid {
            border: 1px solid green;
        }
    </style>

@endsection

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

        @if (count($errors)>0)
            <div class="col-md-6 col-md-offset-3">
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
            <div class="col-md-10 col-md-offset-1">

                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Radio</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'radios.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{--{!! Form::open(['route'=>'radios.store', 'method'=>'POST', 'files' => 'true']) !!}--}}
                    {{ Form::token() }}
                    <div class="box-body ">

                        {{--Imagen--}}
                        <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label">Radio Logo o Foto </label>
                            {!! Form::file('logo',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}

                        </div>

                        <div class="form-group col-md-4">
                            {{--nombre de la radio--}}
                            <label for="exampleInputFile" class="control-label">Nombre de la radio</label>
                            {{--                            {!! Form::text('name_r',null,['class'=>'form-control ','placeholder'=>'nombre de la radio'],['id'=>'exampleInputFile']) !!}--}}
                            <input type="text" value="{{ old('name_r') }}" name="name_r" class="form-control"
                                   autofocus="autofocus"
                                   placeholder="nombre de la radio" required pattern="[Aa-Zz]">

                            {{--link de la radio--}}
                            <label for="exampleInputPassword1" class="control-label">Url de la radio</label>
                            {{--                            {!! Form::text('streaming',null,['class'=>'form-control','placeholder'=>'http://listen.shoutcast.com/rcr750canal2'],['id'=>'exampleInputFile']) !!}--}}
                            <input type="url" value="{{ old('streaming') }}" name="streaming" class="form-control"
                                   placeholder="http://listen.shoutcast.com/rcr750canal2" autofocus="autofocus"
                                   required>

                            {{--correo o email de la radio--}}
                            <label for="exampleInputEmail1">Correo electronio</label>
                            <input type="email" value="{{ old('email') }}" name="email_c" class="form-control" required
                                   placeholder="example@gmail.com" autofocus="autofocus">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{--https://www.youtube.com/channel/UCNCjXUrgMHpHCoQmCcEzlzg?view_as=subscriber--}}
                        {{--https://www.instagram.com/eric_drz--}}
                        {{--https://twitter.com/EricD_R--}}

                        {{--inicio de la agrupacion--}}
                        <div class="form-group col-sm-3">

                            {{--link d google+--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon btn-google active"><i class="fa fa-google-plus"></i></span>
                                <input type="text" class="form-control" id="google" autofocus="autofocus" name="google"
                                       placeholder="Google+"
                                       pattern="https?:\/\/(www\.)?youtube\.com/channel/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)"
                                       required oninvalid="this.setCustomValidity('Ingrese Un Canal Valido')"
                                       oninput="setCustomValidity('')">

                            </div>
                            {{--lin de instagram--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon btn-instagram active"><i class="fa fa-instagram"></i></span>
                                <input id="instagram"
                                       pattern="https?:\/\/(www\.)?instagram\.com\/([A-Za-z0-9_](?:(?:[A-Za-z0-9_]|(?:\.(?!\.))){0,28}(?:[A-Za-z0-9_]))?)"
                                       type="text" name="instagram" class="form-control" placeholder="Instagram"
                                       required
                                       oninvalid="this.setCustomValidity('Ingrese Un Instagram Valido')"
                                       oninput="setCustomValidity('')">
                            </div>
                            {{--link de facebook--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon btn-facebook active"><i class="fa fa-facebook-official"></i></span>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                       placeholder="Facebook"
                                       pattern="http(s)?:\/\/(www\.)?(facebook|fb)\.com\/(A-z 0-9 _ - \.)\/?" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Facebook Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                            {{--lind de twitter--}}
                            <div class="input-group col-xs-12">
                                <span class="input-group-addon btn-twitter active"><i class="fa fa-twitter"></i></span>
                                <input id="twitter" pattern="http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?"
                                       type="text"
                                       name="twitter"
                                       class="form-control" placeholder="Twitter" required
                                       oninvalid="this.setCustomValidity('Ingrese Un Twitter Valido')"
                                       oninput="setCustomValidity('')">
                            </div>

                        </div>
                        {{--final de la agrupacion--}}
                    </div>
                    <!-- /.box-body -->
                </div>

                <div class=" text-center">
                    {{--<button type="guardar" class="btn btn-primary">Submit</button>--}}
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary active']) !!}
                </div>
                {!! Form::close() !!}

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