@extends('seller.layouts')

@section('css')

    <style>
        #image-preview {
            width: 300px;
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

    {{--es es del modal de autor--}}
    <style>
        #imageAM-preview {
            width: 300px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #imageAM-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #imageAM-preview label {
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

    {{--es es del modal de autor--}}
    <style>
        #imageSM-preview {
            width: 300px;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
        }

        #imageSM-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #imageSM-preview label {
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

                <div class="box box-primary ">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Saga</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'sagas.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{ Form::token() }}

                    <div class="box-body ">

                        {{--Imagen--}}
                        <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Imagen de la saga </label>
                            {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}
                        </div>

                        <div class="form-group col-md-4">
                            {{--seleccion de rating--}}
                            <label for="exampleInputFile" class="control-label">Tipo de rating</label>
                            <br/>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control select-author','placeholder'=>'selecione....'],['id'=>'exampleInputFile']) !!}
                            <br/>
                            <br/>


                            {{--Nombre de la saga--}}
                            <label for="exampleInputFile" class="control-label">Nombre</label>
                            {!! Form::text('sag_name',null,['class'=>'form-control','placeholder'=>'Nombre de la saga']) !!}
                            <br />

                            {{--tipo de saga--}}
                            <label for="exampleInputFile" class="control-label">tipo de saga</label>
                            <br/>
                            {!! Form::select('type_saga',['1'=>'Libros','2'=>'Peliculas','3'=>'Series','4'=>'Revista'],null,
                            ['class'=>'form-control select-author','placeholder'=>'selecione....'],['id'=>'exampleInputFile']) !!}
                            <br/>
                            <br/>

                            {{--Aprovar contenido o no --}}
                            {{--<label for="exampleInputFile" class="control-label">estados</label>--}}
                            {{--<br/>--}}
                            {{--{!! Form::select('status',['1'=>'Aprovado','2'=>'En Proceso','3'=>'Denegado'],null,--}}
                            {{--['class'=>'form-control select-author','placeholder'=>'selecione....'],['id'=>'exampleInputFile']) !!}--}}
                            {{--<br/>--}}
                            {{--<br/>--}}

                            {{--Descripcion de  la saga--}}
                            <label for="exampleInputPassword1" class="control-label">Descripcion</label>
                            {!! Form::textarea('sag_description',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Descripcion de la saga...'],['id'=>'exampleInputFile']) !!}
                        </div>

                    </div>
                    <!-- /.box-body -->
                    {{--</div>--}}

                </div>
                <div class="text-center">
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
        $('.select-author').chosen({
            allow_single_deselect: false,
            no_results_text: "Registra el autor ya que no se encuentra en la base de datos y registrar el libro se necesita el autor",
            width: "60%"
        });

        $('.select-saga').chosen({
            allow_single_deselect: true,
            no_results_text: "No se encuentra la saga",
            width: "60%"
        });
    </script>

    {{--manejo de la imager precargada--}}
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