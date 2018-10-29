@extends('seller.layouts')
@section('css')
    <style>
        #image-preview {
            width: 100%;
            height: 450px;
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
            width: 50%;
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

        /*es es del modal de autor*/
        #imageSM-preview {
            width: 100%;
            height: 380px;
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
            width: 90%;
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
        .progress { position:relative; width:100%; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
        .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
        .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
    </style>
@endsection

@section('content')

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
                @include('flash::message')

                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Registrar película</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'movies.store', 'method'=>'POST','files' => 'true', 'id'=>'registroPelicula' ]) !!}
                    {{ Form::token() }}
                    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                    <div class="box-body ">

                        {{--Poster de la pelicula--}}
                        <div class="col-md-6">
                            <div id="mensajePortadaPelicula"></div>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada </label>
                                {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                                <div id="list"></div>
                            </div>
                        </div>

                        {{--Selecion tipo de publico de la pelicula--}}
                        <div class="form-group col-md-6">

                            {{--titulo de la pelicula--}}
                            <label for="exampleInputFile" class="control-label">Título</label>
                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo de la película','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]) !!}
                            <div id="mensajeTitulo"></div>
                            <br>

                            {{--titulo original de la pelicula--}}
                            <label for="exampleInputFile" class="control-label">Título original</label>
                            <div id="mensajeTitulOriginal"></div>
                            {!! Form::text('original_title',null,['class'=>'form-control col-xs-2','placeholder'=>'Titulo original de la película','required'=>'required','id'=>'titulOriginal','oninvalid'=>"this.setCustomValidity('Seleccione el título original')",'oninput'=>"setCustomValidity('')"]) !!}

                            <br><br>

                            {{--precio--}}
                            <div class="form-group row">
                                <div class="col-md-6"><br>
                                    <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                                    {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'Costo en tickets', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Costo en tickets')", 'oninput'=>"setCustomValidity('')", 'id'=>'precio', 'min'=>'0']) !!}
                                </div>
                                <div class="col-md-6"><br>
                                    <label for="exampleInputPassword1" class="control-label">Costo en dolares</label>
                                    {!! Form::text('cost',null,['class'=>'form-control','placeholder'=>'0.00', 'id'=>'conversion']) !!}
                                </div>
                                <div class=" col-md-12" id="mensajePrecio"></div>
                            </div>

                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control select-author','placeholder'=>'Selecione una categoría','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--Categoria--}}
                            <label for="tags"> Géneros </label>
                            <select name="tags[]" multiple="true" class="form-control" id="genders" required="required">
                                @foreach($tags as $genders)
                                    @if($genders->type_tags=='Peliculas')
                                        <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalgenero">
                                Agregar género
                            </button>
                            <br>
                            <br>
                        </div>

                        <div class="form-group col-md-6">

                            {{--archivo de la pelicula--}}
                            <label for="exampleInputFile" class="control-label">Cargar película</label>
                            <div id="mensajePelicula"></div>
                            {!! Form::file('duration',['class'=>'form-control','accept'=>'.mp4','control-label','placeholder'=>'Cargar película','id'=>'pelicula','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione la película')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--historia de la pelicula --}}
                            {{--
                            <label for="exampleInputPassword1" class="control-label">Historia</label>
                            <div id="cantidadHistoria"></div>
                            {!! Form::textarea('story',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Historia de la película','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una historia de la película')", 'oninput'=>"setCustomValidity('')",'id'=>'historia']) !!}
                            <div id="mensajeHistoria"></div>
                            <br>

                            {{--año de salida de la pelicula --}}
                            <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                            {!! Form::number('release_year',@date('Y'),['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')",'onkeypress' => 'return controltagNum(event)' ,'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')"]) !!}
                            <div id="mensajeFechaLanzamiento"></div>
                            <br>

                            {{--Basado en un libro o no --}}
                            <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                            <div id="cantidadSinopsis"></div>
                            {!! Form::textarea('based_on',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Sinopsis de la película','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una sinopsis de la película')",'oninput'=>"setCustomValidity('')",'id'=>'sinopsis']) !!}
                            <div id="mensajeSinopsis"></div>
                        </div>

                        <div class="form-group col-md-6">
                            {{--selecionar pais--}}
                            <label class="control-label">Pais</label>
                            <select  name="country" id="paises" class="form-control" required="required">
                                <option value="AF">Afganistán</option>
                                <option value="AL">Albania</option>
                                <option value="DE">Alemania</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antártida</option>
                                <option value="AG">Antigua y Barbuda</option>
                                <option value="AN">Antillas Holandesas</option>
                                <option value="SA">Arabia Saudí</option>
                                <option value="DZ">Argelia</option>
                                <option value="AR">Argentina</option>
                                <option value="AM">Armenia</option>
                                <option value="AW">Aruba</option>
                                <option value="AT">Austria</option>
                                <option value="AZ">Azerbaiyán</option>
                                <option value="AU">Australia</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrein</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">Bélgica</option>
                                <option value="BZ">Belice</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermudas</option>
                                <option value="BY">Bielorrusia</option>
                                <option value="MM">Birmania</option>
                                <option value="BO">Bolivia</option>
                                <option value="BA">Bosnia y Herzegovina</option>
                                <option value="BW">Botswana</option>
                                <option value="BR">Brasil</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="BT">Bután</option>
                                <option value="CV">Cabo Verde</option>
                                <option value="KH">Camboya</option>
                                <option value="CM">Camerún</option>
                                <option value="CA">Canadá</option>
                                <option value="TD">Chad</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CY">Chipre</option>
                                <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                                <option value="CO">Colombia</option>
                                <option value="KM">Comores</option>
                                <option value="CG">Congo</option>
                                <option value="CD">Congo, República Democrática del</option>
                                <option value="KR">Corea</option>
                                <option value="KP">Corea del Norte</option>
                                <option value="CI">Costa de Marfíl</option>
                                <option value="CR">Costa Rica</option>
                                <option value="HR">Croacia (Hrvatska)</option>
                                <option value="CU">Cuba</option>
                                <option value="DK">Dinamarca</option>
                                <option value="DJ">Djibouti</option>
                                <option value="DM">Dominica</option>
                                <option value="EC" selected>Ecuador</option>
                                <option value="EG">Egipto</option>
                                <option value="SV">El Salvador</option>
                                <option value="AE">Emiratos Árabes Unidos</option>
                                <option value="ER">Eritrea</option>
                                <option value="SI">Eslovenia</option>
                                <option value="ES">España</option>
                                <option value="US">Estados Unidos</option>
                                <option value="EE">Estonia</option>
                                <option value="ET">Etiopía</option>
                                <option value="FJ">Fiji</option>
                                <option value="PH">Filipinas</option>
                                <option value="FI">Finlandia</option>
                                <option value="FR">Francia</option>
                                <option value="GA">Gabón</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgia</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Granada</option>
                                <option value="GR">Grecia</option>
                                <option value="GL">Groenlandia</option>
                                <option value="GP">Guadalupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GY">Guayana</option>
                                <option value="GF">Guayana Francesa</option>
                                <option value="GN">Guinea</option>
                                <option value="GQ">Guinea Ecuatorial</option>
                                <option value="GW">Guinea-Bissau</option>
                                <option value="HT">Haití</option>
                                <option value="HN">Honduras</option>
                                <option value="HU">Hungría</option>
                                <option value="IN">India</option>
                                <option value="ID">Indonesia</option>
                                <option value="IQ">Irak</option>
                                <option value="IR">Irán</option>
                                <option value="IE">Irlanda</option>
                                <option value="BV">Isla Bouvet</option>
                                <option value="CX">Isla de Christmas</option>
                                <option value="IS">Islandia</option>
                                <option value="KY">Islas Caimán</option>
                                <option value="CK">Islas Cook</option>
                                <option value="CC">Islas de Cocos o Keeling</option>
                                <option value="FO">Islas Faroe</option>
                                <option value="HM">Islas Heard y McDonald</option>
                                <option value="FK">Islas Malvinas</option>
                                <option value="MP">Islas Marianas del Norte</option>
                                <option value="MH">Islas Marshall</option>
                                <option value="UM">Islas menores de Estados Unidos</option>
                                <option value="PW">Islas Palau</option>
                                <option value="SB">Islas Salomón</option>
                                <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                <option value="TK">Islas Tokelau</option>
                                <option value="TC">Islas Turks y Caicos</option>
                                <option value="VI">Islas Vírgenes (EEUU)</option>
                                <option value="VG">Islas Vírgenes (Reino Unido)</option>
                                <option value="WF">Islas Wallis y Futuna</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italia</option>
                                <option value="JM">Jamaica</option>
                                <option value="JP">Japón</option>
                                <option value="JO">Jordania</option>
                                <option value="KZ">Kazajistán</option>
                                <option value="KE">Kenia</option>
                                <option value="KG">Kirguizistán</option>
                                <option value="KI">Kiribati</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesotho</option>
                                <option value="LV">Letonia</option>
                                <option value="LB">Líbano</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libia</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Lituania</option>
                                <option value="LU">Luxemburgo</option>
                                <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                                <option value="MG">Madagascar</option>
                                <option value="MY">Malasia</option>
                                <option value="MW">Malawi</option>
                                <option value="MV">Maldivas</option>
                                <option value="ML">Malí</option>
                                <option value="MT">Malta</option>
                                <option value="MA">Marruecos</option>
                                <option value="MQ">Martinica</option>
                                <option value="MU">Mauricio</option>
                                <option value="MR">Mauritania</option>
                                <option value="YT">Mayotte</option>
                                <option value="MX">México</option>
                                <option value="FM">Micronesia</option>
                                <option value="MD">Moldavia</option>
                                <option value="MC">Mónaco</option>
                                <option value="MN">Mongolia</option>
                                <option value="MS">Montserrat</option>
                                <option value="MZ">Mozambique</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NE">Níger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="NF">Norfolk</option>
                                <option value="NO">Noruega</option>
                                <option value="NC">Nueva Caledonia</option>
                                <option value="NZ">Nueva Zelanda</option>
                                <option value="OM">Omán</option>
                                <option value="NL">Países Bajos</option>
                                <option value="PA">Panamá</option>
                                <option value="PG">Papúa Nueva Guinea</option>
                                <option value="PK">Paquistán</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Perú</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PF">Polinesia Francesa</option>
                                <option value="PL">Polonia</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="UK">Reino Unido</option>
                                <option value="CF">República Centroafricana</option>
                                <option value="CZ">República Checa</option>
                                <option value="ZA">República de Sudáfrica</option>
                                <option value="DO">República Dominicana</option>
                                <option value="SK">República Eslovaca</option>
                                <option value="RE">Reunión</option>
                                <option value="RW">Ruanda</option>
                                <option value="RO">Rumania</option>
                                <option value="RU">Rusia</option>
                                <option value="EH">Sahara Occidental</option>
                                <option value="KN">Saint Kitts y Nevis</option>
                                <option value="WS">Samoa</option>
                                <option value="AS">Samoa Americana</option>
                                <option value="SM">San Marino</option>
                                <option value="VC">San Vicente y Granadinas</option>
                                <option value="SH">Santa Helena</option>
                                <option value="LC">Santa Lucía</option>
                                <option value="ST">Santo Tomé y Príncipe</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychelles</option>
                                <option value="SL">Sierra Leona</option>
                                <option value="SG">Singapur</option>
                                <option value="SY">Siria</option>
                                <option value="SO">Somalia</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="PM">St Pierre y Miquelon</option>
                                <option value="SZ">Suazilandia</option>
                                <option value="SD">Sudán</option>
                                <option value="SE">Suecia</option>
                                <option value="CH">Suiza</option>
                                <option value="SR">Surinam</option>
                                <option value="TH">Tailandia</option>
                                <option value="TW">Taiwán</option>
                                <option value="TZ">Tanzania</option>
                                <option value="TJ">Tayikistán</option>
                                <option value="TF">Territorios franceses del Sur</option>
                                <option value="TP">Timor Oriental</option>
                                <option value="TG">Togo</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad y Tobago</option>
                                <option value="TN">Túnez</option>
                                <option value="TM">Turkmenistán</option>
                                <option value="TR">Turquía</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UA">Ucrania</option>
                                <option value="UG">Uganda</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Uzbekistán</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VE">Venezuela</option>
                                <option value="VN">Vietnam</option>
                                <option value="YE">Yemen</option>
                                <option value="YU">Yugoslavia</option>
                                <option value="ZM">Zambia</option>
                                <option value="ZW">Zimbabue</option>
                            </select>
                            <br>

                            {{--link--}}
                            <label for="exampleInputPassword1" class="control-label">Link del trailer</label>
                            {!! Form::url('trailer_url',null,['class'=>'form-control','placeholder'=>'Link del trailer', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el link del trailer de la película')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']) !!}
                            <div id="mensajeLink"></div>
                            <br>

                            <label class="control-label"> ¿Pertenece a una saga? </label>
                            <br>
                            <div class="radio-inline">
                                <label for="option-1">
                                    <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                            </div>
                            <div class="radio-inline">
                                <label for="option-2">
                                    <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                    <span class="mdl-radio__label">No</span>
                                </label>
                            </div>
                            <br>

                            <div class="" style="display:none" id="if_si">
                                {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'Selecione una saga','id'=>'sagas', 'oninvalid'=>"this.setCustomValidity('Ingrese el nombre de la saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-defaultMS">
                                    <i class="fa fa-book"></i>
                                    Agregar saga
                                </a>
                                <br>
                                <br>

                                {{--
                                <div id="mensajeAntes"></div>
                                <label for="exampleInputPassword1" class="control-label">Antes</label>
                                {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0','required'=>'required']) !!}
                                <br>

                                <label for="exampleInputPassword1" class="control-label">Después</label>
                                <div id="mensajeDespues"></div>
                                {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0','required'=>'required']) !!}
                                --}}
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="progress">
                                <div class="bar"></div >
                                <div class="percent">0%</div >
                            </div>
                            <div class="text-center">
                                {!! Form::submit('Registrar película', ['class' => 'btn btn-primary','id'=>'registrarPelicula']) !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h1 class="modal-title text-center">Agregar saga</h1>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route'=>'sagas.register', 'method'=>'POST','files' => 'true', 'id' => 'registro' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body">
                            <div class="col-md-6">

                                {{--Imagen--}}
                                <div id="mensajePortadaSaga"></div>
                                <div id="imageSM-preview" style="border:#646464 1px solid ;" class="form-group">
                                    <label for="imageSM-upload" id="image-label"> Imagen de la Saga</label>
                                    {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','style'=>'border:#000000','1px solid ;']) !!}
                                    <div id="listModal"></div>
                                </div>

                            </div>
                            <div class="form-group col-md-6">
                                {{--seleccion de rating--}}
                                <label for="exampleInputFile" class="control-label">Categoría</label>
                                {!! Form::select('rating_id',$ratin,null,['class'=>'form-control select-author','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Nombre de la saga--}}
                                <label for="exampleInputFile" class="control-label">Nombre</label>
                                {!! Form::text('sag_name',null,['class'=>'form-control','placeholder'=>'Nombre de la saga','required'=>'required']) !!}
                                <br>

                                {{--tipo de saga--}}
                                <label for="exampleInputFile" class="control-label">Tipo de saga</label>
                                {!! Form::select('type_saga',['2'=>'Peliculas'],null,
                                ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Descripcion de  la saga--}}
                                <label for="exampleInputPassword1" class="control-label">Descripción</label>
                                {!! Form::textarea('sag_description',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Descripción de la saga','id'=>'exampleInputFile','required'=>'required']) !!}
                            </div>
                            <br>
                        </div>
                        <div align="center">
                            {!! Form::submit('Guardar saga', ['class' => 'btn btn-primary','id'=>'registrarSaga']) !!}
                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                        <div class="box-body">
                            <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- /.modal  de generos  -->
        <div class="modal modal-primary fade" role="dialog" id="modalgenero">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 style="text-align: center; color: #fff;">Agregar género</h1>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route'=>'tags.store', 'method'=>'POST', 'id'=>'Form1']) !!}
                        {{ Form::token() }}
                        {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id,['id'=>'seller_id']) !!}
                        {!! Form::hidden('type_tags','Peliculas', ['id'=>'type_tags']) !!}
                        {!! Form::hidden('ruta','Peliculas') !!}
                        <label for="exampleInputFile" class="control-label">Nuevo género</label>
                        {!! Form::text('tags_name',null,['class'=>'form-control','placeholder'=>'Ingrese el nuevo género', 'id'=>'new_tag','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese el nuevo género')",'oninput'=>"setCustomValidity('')"]) !!}
                        <br>
                        <div align="center">
                            {!! Form::submit('Guardar género', ['class' => 'btn btn-primary','id'=>'save-resource', 'onclick'=>'callback()']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

    </section>

@endsection

@section('js')
<script type="text/javascript">

       function callback() {
            $('#save-resource').attr('disabled',true);
            var tags_name= $("#new_tag").val();
            var type_tags= $('#type_tags').val();
            var seller_id = $('#seller_id').val();

                                $.ajax({
                                url: "{{ url('/AddTags') }}",
                                type: 'POST',
                                data: {
                                        _token: $('input[name=_token]').val(),
                                        tags_name: tags_name,
                                        type_tags: type_tags,
                                        seller_id: seller_id,

                                      },

                                success: function (result) {

                                    if(result==0){
                                    swal("Genero "+tags_name +" agregado con exito y en espera de verificación","","success");
                                    $('#modalgenero').toggle();
                                    $('.modal-backdrop').remove();
                                    }
                                },

                                error: function (result) {
                                    swal('Existe un Error en su Solicitud','','error');

                                },
                                });
 }


</script>

<script type="text/javascript">
    /*Para maxlength del costo*/
function maxLengthCheck(object) {
    if (object.value.length > 3)
      object.value = object.value.slice(0, 3)
  }
</script>


<script type="text/javascript">
    $("#titulo").change(function(){
        var nombre = $("#titulo").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulo').show();
            $('#mensajeTitulo').text('El titulo no debe estar vacio');
            $('#mensajeTitulo').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajeTitulo').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
    $("#titulOriginal").change(function(){
        var nombre = $("#titulOriginal").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulOriginal').show();
            $('#mensajeTitulOriginal').text('El titulo no debe estar vacio');
            $('#mensajeTitulOriginal').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajeTitulOriginal').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
    $("#precio").change(function(){
        var nombre = $("#precio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePrecio').show();
            $('#mensajePrecio').text('El precio no debe estar vacio');
            $('#mensajePrecio').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajePrecio').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
    $("#sinopsis").change(function(){
        var nombre = $("#sinopsis").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeSinopsis').show();
            $('#mensajeSinopsis').text('La sinopsis no debe estar vacia');
            $('#mensajeSinopsis').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajeSinopsis').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
    $("#fechaLanzamiento").change(function(){
        var nombre = $("#fechaLanzamiento").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeFechaLanzamiento').show();
            $('#mensajeFechaLanzamiento').text('La fecha no debe estar vacia');
            $('#mensajeFechaLanzamiento').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajeFechaLanzamiento').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
    $("#link").change(function(){
        var nombre = $("#link").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeLink').show();
            $('#mensajeLink').text('El trailer no debe estar vacio');
            $('#mensajeLink').css('color','red');
            $('#registrarPelicula').attr('disabled',true);
        }
        else {
            $('#mensajeFechaLanzamiento').hide();
            $('#registrarPelicula').attr('disabled',false);

        }
    })
</script>

    <script src="http://malsup.github.com/jquery.form.js"></script>

    <script type="text/javascript">



        (function() {

            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');

            $('#registroPelicula').ajaxForm({

                beforeSend: function() {
                    status.empty();
                    var percentVal = '0%';
                    var posterValue = $('input[name=duration]').fieldValue();
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    $('#registrarPelicula').attr('disabled',true);
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                success: function() {
                    var percentVal = 'Completado..';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                    // alert('Uploaded Successfully');
                    window.location.href = "{{URL::to('movies')}}"

                }
            });

        })();
    </script>

    <script>
        //---------------------------------------------------------------------------------------------------
        // Para que se vea la imagen en el formulario
        function archivo(evt) {
            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        document.getElementById("list").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
        document.getElementById('image-upload').addEventListener('change', archivo, false);
        // Para que se vea la imagen en el formulario
        //---------------------------------------------------------------------------------------------------
        // Para que se vea la imagen en el modal
        function modal(evt) {
            var files = evt.target.files;
            for (var i = 0, m; m = files[i]; i++) {
                if (!m.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.onload = (function(theFile) {
                    return function(e) {
                        document.getElementById("listModal").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                    };
                })(m);
                reader.readAsDataURL(m);
            }
        }
        document.getElementById('imageSM-upload').addEventListener('change', modal, false);
        // Para que se vea la imagen en el modal
        //---------------------------------------------------------------------------------------------------
        // Para validar el tamaño maximo de las imagenes y de la pelicula
        // Portada de la pelicula
        /*  $(document).ready(function(){
              $('#image-upload').change(function(){
                  var tamaño = this.files[0].size;
                  var tamañoKb = parseInt(tamaño/1024);
                  if (tamañoKb>2048) {
                      $('#mensajePortadaPelicula').show();
                      $('#mensajePortadaPelicula').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                      $('#mensajePortadaPelicula').css('color','red');
                      $('#registrarPelicula').attr('disabled',true);
                  } else {
                      $('#mensajePortadaPelicula').hide();
                      $('#registrarPelicula').attr('disabled',false);
                  }
              });
          });*/
        // Portada de la pelicula
        // Pelicula
        /*
        $(document).ready(function(){
            $('#pelicula').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajePelicula').show();
                    $('#mensajePelicula').text('La pelicula es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajePelicula').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajePelicula').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });*/
        // Pelicula
        // Portada de la Saga
        /*
        $(document).ready(function(){
            $('#imageSM-upload').change(function(){
                var tamaño = this.files[0].size;
                var tamañoKb = parseInt(tamaño/1024);
                if (tamañoKb>2048) {
                    $('#mensajePortadaSaga').show();
                    $('#mensajePortadaSaga').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                    $('#mensajePortadaSaga').css('color','red');
                    $('#registrarSaga').attr('disabled',true);
                } else {
                    $('#mensajePortadaSaga').hide();
                    $('#registrarSaga').attr('disabled',false);
                }
            });
        });*/
        // Portada de la Saga
        // Para validar el tamaño maximo de las imagenes y de la pelicula
        //---------------------------------------------------------------------------------------------------
        // Para evitar los espacios vacios
        /*
        $(document).ready(function(){
            $('#titulo').keyup(function(evento){
                var titulOriginal = $('#titulo').val().trim();
                console.log(titulOriginal.length);
                if (titulOriginal.length==0) {
                    $('#mensajeTitulo').show();
                    $('#mensajeTitulo').text('El campo no debe estar vacio');
                    $('#mensajeTitulo').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeTitulo').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        */
        // Para evitar los espacios vacios
        // PD: cocha con el siguiente script de validacion
        //---------------------------------------------------------------------------------------------------
        // Función que nos va a contar el número de caracteres
        // Para el titulo
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#titulo').keyup(function(evento){
                var titulo = $('#titulo').val();
                numeroPalabras = titulo.length;
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeTitulo').show();
                    $('#mensajeTitulo').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeTitulo').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeTitulo').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para el titulo
        // Para el titulo original
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#titulOriginal').keyup(function(evento){
                var titulOriginal = $('#titulOriginal').val();
                numeroPalabras = titulOriginal.length;
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeTitulOriginal').show();
                    $('#mensajeTitulOriginal').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeTitulOriginal').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeTitulOriginal').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para el titulo original
        // Para la sinopsis
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#sinopsis').keyup(function(evento){
                var sinopsis = $('#sinopsis').val();
                numeroPalabras = sinopsis.length;
                $('#cantidadSinopsis').text(numeroPalabras+'/'+cantidadMaxima);
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeSinopsis').show();
                    $('#mensajeSinopsis').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeSinopsis').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeSinopsis').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para la sinopsis
        // Para la historia
        $(document).ready(function(){
            var cantidadMaxima = 191;
            $('#historia').keyup(function(evento){
                var historia = $('#historia').val();
                numeroPalabras = historia.length;
                $('#cantidadHistoria').text(numeroPalabras+'/'+cantidadMaxima);
                if (numeroPalabras>cantidadMaxima) {
                    $('#mensajeHistoria').show();
                    $('#mensajeHistoria').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                    $('#mensajeHistoria').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeHistoria').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para la historia
        // Función que nos va a contar el número de caracteres
        //---------------------------------------------------------------------------------------------------
        // Para validar la Fecha de Lanzamiento
        $(document).ready(function(){
            $('#fechaLanzamiento').keyup(function(evento){
                var fechaActual = new Date();
                var año = $('#fechaLanzamiento').val();
                if (año > fechaActual.getFullYear()) {
                    $('#mensajeFechaLanzamiento').show();
                    $('#mensajeFechaLanzamiento').text('La fecha de lanzamiento no debe exceder el año actual');
                    $('#mensajeFechaLanzamiento').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeFechaLanzamiento').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para validar la Fecha de Lanzamiento
        //---------------------------------------------------------------------------------------------------
        // Para validar el precio
        $(document).ready(function(){

            $('#precio').on( 'keyup click',(function(evento) {
                var precio = $('#precio').val();
                if (precio>999) {
                    $('#mensajePrecio').show();
                    $('#mensajePrecio').text('El costo de tickets no deben exceder los 999 Tickets');
                    $('#mensajePrecio').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else if (precio<0) {
                    $('#mensajePrecio').show();
                    $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                    $('#mensajePrecio').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajePrecio').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            }));
        });
        // Para validar el precio
        //---------------------------------------------------------------------------------------------------
        // Para validar los radio boton
        $(document).ready(function(){
            $('#option-2').prop('checked','checked');
            $('#sagas').removeAttr('required');
            $('#despues').removeAttr('required');
            $('#antes').removeAttr('required');
        });

        function yesnoCheck() {
            if (document.getElementById('option-1').checked) {
                $('#if_si').show();
                $('#sagas').attr('required','required');
                $('#despues').attr('required','required');
                $('#antes').attr('required','required');
                $('#sagas').val('');
            } else {
                $('#if_si').hide();
                $('#sagas').removeAttr('required');
                $('#sagas').attr('novalidate',true);
                $('#despues').removeAttr('required');
                $('#antes').removeAttr('required');
                $('#sagas').val('');
            }
        }
        // Para validar los radio boton
        //---------------------------------------------------------------------------------------------------
        // Para validar los capitulos de las sagas
        $(document).ready(function(){
            $('#despues').keyup(function(evento) {
                var despues = $('#despues').val();
                if (despues<0) {
                    $('#mensajeDespues').show();
                    $('#mensajeDespues').text('El número de la saga debe ser mayor a cero');
                    $('#mensajeDespues').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeDespues').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        $(document).ready(function(){
            $('#antes').keyup(function(evento) {
                var antes = $('#antes').val();
                if (antes<0) {
                    $('#mensajeAntes').show();
                    $('#mensajeAntes').text('El número de la saga debe ser mayor a cero');
                    $('#mensajeAntes').css('color','red');
                    $('#registrarPelicula').attr('disabled',true);
                } else {
                    $('#mensajeAntes').hide();
                    $('#registrarPelicula').attr('disabled',false);
                }
            });
        });
        // Para validar los capitulos de las sagas
        //---------------------------------------------------------------------------------------------------


        //conversion Ticket
        function ticket_dolar(cantidad, unidad) {
            var conversion=cantidad*unidad;
            return conversion;
        }

        document.getElementById("conversion").disabled = true;
        $( "#precio" ).on( 'keyup click', function() {
            var conversion=ticket_dolar(document.getElementById("precio").value, parseFloat("0.20"));
            document.getElementById("conversion").value=conversion.toFixed(2);
            console.log(conversion.toFixed(2));
        });

        //---------------------------------------------------------------------------------------------------

    </script>
<script type="text/javascript">
    // Validacion de solo letas
        function controltagLet(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
        // Validacion de solo letas
        //---------------------------------------------------------------------------------------------------
        // Validacion de solo numeros
        function controltagNum(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla==8) return true; // para la tecla de retroseso
            else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
            else if (tecla==13) return true;
            patron =/[0-9]/;// -> solo numeros
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
</script>
@endsection