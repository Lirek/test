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
    </style>     {{--boorar xq estoy seguro q es de autores--}}

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
                        <h3 class="box-title">Serie</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'series.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{ Form::token() }}
                    <div class="box-body ">

                        {{--Poster de la pelicula--}}
                        <div id="image-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Portadas </label>
                            {!! Form::file('trailer',['class'=>'form-control-file','control-label','id'=>'image-upload'],['style'=>'border:#000000','1px solid ;']) !!}
                        </div>

                        {{--Selecion tipo de publico de la pelicula--}}
                        <div class="form-group col-md-4">
                            <label for="exampleInputFile" class="control-label">Estado de la serie</label>
                            <br/>
                            {!! Form::select('status_series',['1'=>'En Emision', '2'=>'Finalizado'],null,['class'=>'form-control select-author','placeholder'=>'selecione...',],['id'=>'exampleInputFile']) !!}
                            {{--<a class="btn btn-app btn-sm" data-toggle="modal" data-target="#modal-defaultMA">--}}
                            {{--<i class="material-icons"> add_circle</i>--}}
                            {{--</a>--}}
                            <br/>
                            <br/>

                            {{--otra prueba--}}
                            <label class="control-label"> Pertenece a una saga </label>
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

                            <div class="" style="display:none" id="if_si">
                                {{--<label for="exampleInputFile" class="control-label">Saga del libro</label>--}}
                                {{--<br/>--}}
                                {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'selecione saga de libro','id'=>'sagas'],['id'=>'sagas']) !!}
                                {{--<a class="btn btn-app">--}}
                                <a class="btn btn-app btn-sm text-primary" data-toggle="modal"
                                   data-target="#modal-defaultMS">
                                    <i class="fa ion-ios-bookmarks"></i> Agregar Saga
                                </a>
                                <br/>

                                {{--no se de que va --}}
                                <label for="exampleInputPassword1" class="control-label">Despues</label>
                                {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}

                                {{--no se de que va tampoco--}}
                                <label for="exampleInputPassword1" class="control-label">Antes</label>
                                {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'discusion sobre este campo y si queda debe ser tipo text...'],['id'=>'exampleInputFile']) !!}
                            </div>
                            {{--otra prueba--}}

                            {{--precio--}}
                            <label for="exampleInputPassword1" class="control-label">Precio</label>
                            {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'50'],['id'=>'exampleInputFile']) !!}
                            <br/>
                        </div>

                        <div class="form-group col-md-4" id="example-2">

                            {{--<button type="button" id="btnAdd-2" class="btn btn-success">Añadir Episodios--}}
                            {{--</button>--}}

                            <a class="btn btn-app btn-sm bg-green-active" id="btnAdd-2">
                                <i class="material-icons"> add_to_queue </i>
                            </a>
                            <label>Añadir episodio </label>
                            <br/>
                            <br/>

                            <div class="row group">
                                <div class="col-sm-8 ">
                                    <input required type="text" name="episode[]" id="title"
                                           placeholder="Nombre del episodio" class="form-control"
                                           oninvalid="this.setCustomValidity('Ingrese el nombre del episodio')"
                                           oninput="setCustomValidity('')">

                                    <input type="file" name="episodio[]" class="form-control">
                                <br/>
                                </div>

                                <div class="col-sm-1">
                                    <a class="btn btn-danger btn-sm btnRemove"><i class="material-icons"> remove_from_queue </i> </a>
                                </div>

                            </div>

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

        <!-- /.modal  de sagas  -->
        <div class="modal fade in modal-primary" id="modal-defaultMS">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Agregar saga</h4>
                    </div>
                    <div class="modal-body ">
                        {!! Form::open(['route'=>'sagas.registerS', 'method'=>'POST','files' => 'true' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body ">

                            {{--Imagen--}}
                            <div id="imageSM-preview" style="border:#646464 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Imagen de la saga</label>
                                {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload'],['style'=>'border:#000000','1px solid ;']) !!}

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
                                <br/>

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
                            <br/>

                        </div>
                        <!-- /.box-body -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary active']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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

        $('#paises').chosen({
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

    {{--la funcion de la saga--}}
    <script>

        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').val('');
            }
            // else if(document.getElementById('option-2').checked) {
            //     $('#if_no').hide();
            //     $('#sagas').val('3');
            // }
            else {
                $('#if_si').hide();
                $('#sagas').val('');
            }

        }

    </script>

    {{--imagen del model de sagas --}}
    <script>
        $(document).ready(function () {
            $.uploadPreview({
                input_field: "#imageSM-upload",
                preview_box: "#imageSM-preview",
                label_field: "#imageSM-label"
            });
        });
    </script>

    {{--los episodio--}}
    <script>
        $('#example-2').multifield({
            section: '.group',
            btnAdd: '#btnAdd-2',
            btnRemove: '.btnRemove'
        });
    </script>

    <script>
        $(document).ready(function (e) {
            $('#title').on('input', function () {
                var input = $(this);
                var is_name = input.val();
                if (is_name) {
                    input.removeClass("invalid").addClass("valid");
                }
                else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
        })
    </script>

@endsection