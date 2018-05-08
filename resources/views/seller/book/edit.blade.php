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

    </style>

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar
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

                @if(\Auth::guard('web_seller')->user()->id === $book->seller_id)

                    <div class="box box-primary ">
                        <div class="box-header with-border bg bg-black-gradient">
                            <h3 class="box-title">Libro {{ $book->title }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['route'=>['tbook.update',$book], 'method'=>'PUT','files' => 'true' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body ">

                            {{--Imagen--}}
                            <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                {!! Form::file('cover',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {{--Selecion el autor--}}
                                <label for="exampleInputFile" class="control-label">Nombre de autor</label>
                                <br/>
                                {!! Form::select('author_id',$author,$book->author_id,['class'=>'form-control select-author','placeholder'=>'selecione autor del libro'],['id'=>'exampleInputFile']) !!}
                                <br/>
                                <br/>

                                {{--titulo del libro--}}
                                <label for="exampleInputFile" class="control-label">Titulo</label>
                                {!! Form::text('title',$book->title,['class'=>'form-control','placeholder'=>'Titulo del libro']) !!}

                                {{--titulo original del libro--}}
                                <label for="exampleInputFile" class="control-label">Titulo Original </label>
                                {!! Form::text('original_title',$book->original_title,['class'=>'form-control','placeholder'=>'Titulo del libro']) !!}
                                <br/>

                                {{--ac}rchivo del libro--}}
                                <label for="exampleInputFile" class="control-label">cargar el libro</label>
                                {!! Form::file('books_file',['class'=>'form-control-file','control-label']) !!}
                                <br/>

                                {{--sinopsis del libro--}}
                                <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                {!! Form::textarea('sinopsis',$book->sinopsis,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Sinopsis del libro...'],['id'=>'exampleInputFile']) !!}
                            </div>

                            <div class="form-group col-md-4">
                                {{--saga del libro--}}
                                <label for="exampleInputFile" class="control-label">Saga del libro</label>
                                <br/>
                                {!! Form::select('saga_id',$saga,$book->saga_id,['class'=>'form-control select-saga','placeholder'=>'selecione saga de libro'],['id'=>'exampleInputFile']) !!}
                                <br/>
                                <br/>

                                {{--no se de que va --}}
                                <label for="exampleInputPassword1" class="control-label">Despues</label>
                                {!! Form::number('after',$book->after,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}

                                {{--no se de que va tampoco--}}
                                <label for="exampleInputPassword1" class="control-label">Antes</label>
                                {!! Form::number('before',$book->before,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}

                                {{--año de salida del libro --}}
                                <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                                {!! Form::number('release_year',$book->release_year,['class'=>'form-control','placeholder'=>'debe ser tipo text o date'],['id'=>'exampleInputFile']) !!}

                                {{--precio--}}
                                <label for="exampleInputPassword1" class="control-label">Precio</label>
                                {!! Form::number('cost',$book->cost,['class'=>'form-control','placeholder'=>'50'],['id'=>'exampleInputFile']) !!}
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