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

    <style>
        /*prueba*/

        .glyphicon {
            margin-right: 5px;
        }

        .thumbnail {
            margin-bottom: 20px;
            padding: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            border-radius: 0px;
        }

        .item.list-group-item {
            float: none;
            width: 100%;
            background-color: #fff;
            margin-bottom: 10px;
        }

        .item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {
            background: #428bca;
        }

        .item.list-group-item .list-group-image {
            margin-right: 10px;
        }

        .item.list-group-item .thumbnail {
            margin-bottom: 0px;
        }

        .item.list-group-item .caption {
            padding: 9px 9px 0px 9px;
        }

        .item.list-group-item:nth-of-type(odd) {
            background: #eeeeee;
        }

        .item.list-group-item:before, .item.list-group-item:after {
            display: table;
            content: " ";
        }

        .item.list-group-item img {
            float: left;
        }

        .item.list-group-item:after {
            clear: both;
        }

        .list-group-item-text {
            margin: 0 0 11px;
        }

        /*prueba*/
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
                        <h3 class="box-title">Libros</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'tbook.store', 'method'=>'POST','files' => 'true' ]) !!}
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
                            {!! Form::select('author_id',$author,null,['class'=>'form-control select-author','placeholder'=>'selecione autor del libro'],['id'=>'exampleInputFile']) !!}
                            <a class="btn btn-app btn-sm">
                                <i class="fa ion-person-add"></i> Autor
                            </a>
                            <br/>
                            <br/>


                            {{--titulo del libro--}}
                            <label for="exampleInputFile" class="control-label">Titulo</label>
                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del libro']) !!}

                            {{--titulo original del libro--}}
                            <label for="exampleInputFile" class="control-label">Titulo Original </label>
                            {!! Form::text('original_title',null,['class'=>'form-control','placeholder'=>'Titulo del libro']) !!}
                            <br/>

                            {{--ac}rchivo del libro--}}
                            <label for="exampleInputFile" class="control-label">cargar el libro</label>
                            {!! Form::file('books_file',['class'=>'form-control-file','control-label']) !!}
                            <br/>

                            {{--sinopsis del libro--}}
                            <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                            {!! Form::textarea('sinopsis',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Sinopsis del libro...'],['id'=>'exampleInputFile']) !!}
                        </div>

                        <div class="form-group col-md-4">
                            {{--saga del libro--}}
                            {{--<label for="exampleInputFile" class="control-label">Saga del libro</label>--}}
                            {{--<br/>--}}
{{--                            {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'selecione saga de libro','id'=>'sagas'],['id'=>'exampleInputFile']) !!}--}}
                            {{--<a class="btn btn-app">--}}
                                {{--<i class="fa ion-ios-bookmarks"></i> Agregar Saga--}}
                            {{--</a>--}}
                            {{--<br/>--}}
                            {{--<br/>--}}

                            {{--otra prueba--}}

                            <label class="control-label"> El libro pertenece a una saga </label>
                            <br/>
                            <div class="radio-inline">
                                <label class="control-label" for="option-1">
                                    <input type="radio" id="option-1" class="flat-red"
                                           onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                            </div>

                            <div class="radio-inline">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button"
                                           onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                    <span class="mdl-radio__label">No</span>
                                </label>

                            </div>
                            <br/>

                            <div class="radio-inline" style="display:none" id="if_no">
                                <div class="mdl-textfield mdl-js-textfield">
                                    <label class="mdl-textfield__label" for="razon">Explique La Razon</label>
                                    <textarea name="message" class="mdl-textfield__input" type="text" rows="6" id="razon">
                                    </textarea>
                                </div>
                            </div>

                            <div class="" style="display:none" id="if_si">
                                <label for="exampleInputFile" class="control-label">Saga del libro</label>
                                <br/>
                                {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'selecione saga de libro','id'=>'sagas'],['id'=>'sagas']) !!}
                                <a class="btn btn-app">
                                    <i class="fa ion-ios-bookmarks"></i> Agregar Saga
                                </a>
                                <br/>
                                <br/>
                            </div>

                            {{--otra prueba--}}
                            <br/>

                            {{--no se de que va --}}
                            <label for="exampleInputPassword1" class="control-label">Despues</label>
                            {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}

                            {{--no se de que va tampoco--}}
                            <label for="exampleInputPassword1" class="control-label">Antes</label>
                            {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}

                            {{--año de salida del libro --}}
                            <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                            {{--                            {!! Form::text('release_year',null,['class'=>'form-control','placeholder'=>'debe ser tipo text o date'],['id'=>'datepicker']) !!}--}}
                            <input type="numbre" id="datepicker" name="release_year" class="form-control">

                            {{--precio--}}
                            <label for="exampleInputPassword1" class="control-label">Precio</label>
                            {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'50'],['id'=>'exampleInputFile']) !!}
                        </div>

                    </div>
                    <!-- /.box-body -->


                    {{--esta de prueba --}}



                    {{--</div>--}}


                    {{--fin de prueba --}}


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

    <script>
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label"
            });
        });
    </script>

    <script>

        // prueba de algo importante
        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').val('');
            }
            // else if(document.getElementById('option-2').checked) {
            //     $('#if_no').hide();
            //     $('#sagas').val('3');
            // }
            else{
                $('#if_si').hide();
                $('#sagas').val('');
            }

        }

    </script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            language: 'es'
        })
    </script>
@endsection