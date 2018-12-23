@extends('seller.layouts')
@section('css')
    <style>
        #image-preview {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
            width: 80%;
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
        #imageAM-preview {
            width: 100%;
            height: 305px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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

        /*es es del modal de autor*/
        #imageSM-preview {
            width: 100%;
            height: 380px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
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
        .progress { position:relative; width:100%; border: 1px solid #2bbbad; padding: 10px; border-radius: 6px; background-color: white }
        .bar { background-color: #2bbbad; width:0%; height:10px; border-radius: 6px; }
        .percent { position:absolute; display:inline-block; top:1px; left:48%; color: #7F98B2;}

    .default_color{background-color: #FFFFFF !important;}

    .img{margin-top: 7px;}

    .curva{border-radius: 10px;}

    .curvaBoton{border-radius: 20px;}

    /*Color letras tabs*/
    .tabs .tab a{
        color:#00ACC1;
    }
    /*Indicador del tabs*/
    .tabs .indicator {
        display: none;
    }
    .tabs .tab a.active {
        border-bottom: 2px solid #29B6F6;
    }
    /* label focus color */
    .input-field input:focus + label {
        color: #29B6F6 !important;
    }
    /* label underline focus color */
    .row .input-field input:focus {
        border-bottom: 1px solid #29B6F6 !important;
        box-shadow: 0 1px 0 0 #29B6F6 !important
    }
    
    </style>
@endsection
@section('content')
@if (count($errors)>0)
    <div class="col s6 offset m3">
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
    <div class="col s12 m12">
        @include('flash::message')
        <div class="card-panel curva">
            <h4 class="titelgeneral"><i class="mdi mdi-filmstrip"></i> Registrar película</h4>
            <br>
            <div class="row">
                 {!! Form::open(['route'=>'movies.store', 'method'=>'POST','files' => 'true', 'id'=>'registroPelicula' ]) !!}
                    {{ Form::token() }}
                    {!! Form::hidden('seller_id',Auth::guard('web_seller')->user()->id) !!}
                <div class="col s12">
                    {{--Poster de la pelicula--}}
                    <div class="col s12 m6">
                        <div id="mensajePortadaPelicula"></div>
                        <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Portada </label>
                            {!! Form::file('img_poster',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                            <div id="list"></div>
                        </div>
                    </div>
                    {{--titulo de la pelicula--}}
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">create</i>
                        <label for="exampleInputFile" class="">Título</label>
                        {!! Form::text('title',null,['class'=>'form-control','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]) !!}
                        <div id="mensajeTitulo"></div>
                        
                    </div>
                    <div class="input-field col s12 m6">
                        {{--titulo original de la pelicula--}}
                        <i class="material-icons prefix blue-text valign-wrapper">create</i>
                        <label for="exampleInputFile" class="control-label">Título original</label>
                        {!! Form::text('original_title',null,['class'=>'form-control','required'=>'required','id'=>'titulOriginal','oninvalid'=>"this.setCustomValidity('Seleccione el título original')",'oninput'=>"setCustomValidity('')"]) !!}
                        <div id="mensajeTitulOriginal"></div>
                    </div>
                    <div class="input-field col s12 m3">
                        {{--precio--}}
                        <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                        <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                        {!! Form::number('cost',null,['class'=>'form-control','required'=>'required', 'oninput'=>"maxLengthCheck(this)",'oninvalid'=>"this.setCustomValidity('Costo en tickets')",  'id'=>'precio', 'min'=>'0', 'onkeypress' => 'return controltagNum(event)' ]) !!}
                        <div id="mensajePrecio"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m3">
                        <i class="material-icons prefix blue-text valign-wrapper">attach_money</i>
                        <label  class="control-label">Costo en Dolares</label>
                        {!! Form::text('cost',null,['class'=>'form-control','placeholder'=>'0.00', 'id'=>'conversion']) !!}
                    </div>
                    <div class="input-field col s12 m6">
                        {{--Categoria--}}
                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                        <select name="tags[]" multiple="true" class="form-control" id="genders" required="required">
                             @foreach($tags as $genders)
                                @if($genders->type_tags=='Peliculas')
                                    <option value="{{$genders->id}}">{{$genders->tags_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="tags"> Géneros </label>
                        <button type="button" class="btn curvaBoton waves-effect waves-light green modal-trigger" href="#modalgenero" >
                            Agregar género
                        </button>
                        <br>
                    </div>
                </div>
                <div class="col s12">
                    <div class=" file-field input-field col s12 m6">
                        <label for="duration" class="control-label">Cargar película</label>
                        <br><br>
                        <div id="mensajePelicula"></div>
                        <div class="btn blue">
                            <span><i class="material-icons">movie</i></span>
                            {!! Form::file('duration',['class'=>'form-control','accept'=>'.mp4','control-label','placeholder'=>'Cargar película','id'=>'pelicula','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione la película')",'oninput'=>"setCustomValidity('')"]) !!}
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                        <br>
                    </div>
                    <br><br>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">star</i>
                        {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                        <label for="exampleInputFile" class="control-label">Categoría</label>
                        <br>
                    </div>
                    
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">access_time</i>
                        <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                        {!! Form::number('release_year',@date('Y'),['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')",'onkeypress' => 'return controltagNum(event)' ,'oninput'=>"setCustomValidity('')", 'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')"]) !!}
                        <div id="mensajeFechaLanzamiento"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                        {{--selecione el pais--}}
                                        <i class="material-icons prefix blue-text valign-wrapper">room</i>
                                        <select  name="country" id="paises" class="form-control" required="required" oninvalid="this.setCustomValidity('Seleccione un país')" oninput="setCustomValidity('')">
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
                                        <label class="paises"> País</label>
                                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix blue-text valign-wrapper">subscriptions</i>
                        <label for="trailer_url" class="control-label">Link del trailer</label>
                        {!! Form::url('trailer_url',null,['class'=>'form-control','required'=>'required', 'oninvalid'=>"this.setCustomValidity('Ingrese el link del trailer de la película')", 'oninput'=>"setCustomValidity('')", 'id'=>'link']) !!}
                        <div id="mensajeLink"></div>
                        <br>
                    </div>
                    <div class="input-field col s12 m6">
                        {{--Basado en un libro o no --}}
                        <i class="material-icons prefix blue-text valign-wrapper">movie</i>
                        <label for="based_on" class="control-label">Sinopsis</label>
                        <div id="cantidadSinopsis"></div>
                        {!! Form::textarea('based_on',null,['class'=>'materialize-textarea','rows'=>'3','cols'=>'2','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una sinopsis de la película')",'oninput'=>"setCustomValidity('')",'id'=>'sinopsis']) !!}
                        <div id="mensajeSinopsis"></div>
                    </div>
                </div>
                <div class="col s12 m12">
                    <label class="control-label"> ¿Pertenece a una saga? </label>
                            <br>
                            <div class="">
                                <label for="option-1">
                                    <input type="radio" id="option-1" onclick="javascript:yesnoCheck();" name="status" value="Aprobado" class="flat-red with-gap">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                                <label for="option-2">
                                    <input type="radio" id="option-2" onclick="javascript:yesnoCheck();" name="status" value="Denegado" class="flat-red with-gap">
                                    <span class="mdl-radio__label">No</span>
                                </label>
                            </div>
                            <br>
                    <div class="" style="display:none" id="if_si">
                        <div class="input-field col s12">
                        <i class="material-icons prefix blue-text valign-wrapper">book</i>
                        {!! Form::select('saga_id',$saga,null,['class'=>'form-control select-saga','placeholder'=>'Selecione una saga','id'=>'sagas', 'oninvalid'=>"this.setCustomValidity('Ingrese el nombre de la saga')", 'oninput'=>"setCustomValidity('')"]) !!}
                        <a class="btn curvaBoton waves-effect waves-light green  modal-trigger"  href="#modal-defaultMS">
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
                    <div class="">
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
            <div class="text-center">
                
                <button class="btn curvaBoton waves-effect waves-light green" type="submit" id="registrarPelicula" >Registrar película</button>
            </div>
        </div>
       
                </div>
            </div>
             {!! Form::close() !!}
        </div>
    </div>
</div>
        <!-- /.modal  de sagas  -->
<div id="modal-defaultMS" class="modal">
    <div class="modal-content center blue-text">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i> Agregar saga</h4>
            <br>
        </div>
        <br>
        <div class="col s12">
            <div id="" class="col s12 center">
                {!! Form::open(['route'=>'sagas.register', 'method'=>'POST','files' => 'true' ]) !!}
                {{ Form::token() }}
                <div class="row">
                    <div class="input-field col s12 m6">
                        {{--Imagen--}}
                        <div id="mensajeFotoSaga"></div>
                        <div id="imageSM-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                            <label for="image-upload" id="image-label"> Imagen de la saga</label>
                            {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                            <div id="fotoSaga"></div>
                        </div>
                    </div>

                        <div class="input-field col s12 m6">
                            {{--seleccion de rating--}}
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            
                        </div>

                        {{--Nombre de la saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text">create</i>
                            <label for="exampleInputFile" class="control-label">Nombre</label>
                            {!! Form::text('sag_name',null,['class'=>'form-control','required'=>'required']) !!}
                            <br>
                        </div>

                        {{--tipo de saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text  valign-wrapper">star</i>
                            
                            {!! Form::select('type_saga',['2'=>'Peliculas'],null,
                            ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                            <label for="exampleInputFile" class="control-label">Tipo de saga</label>
                            <br>
                        </div>
                        {{--Descripcion de  la saga--}}
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix blue-text  valign-wrapper">create</i>
                            <label for="exampleInputPassword1" class="control-label">Descripción</label>
                            {!! Form::textarea('sag_description',null,['class'=>'form-control materialize-textarea','rows'=>'3','cols'=>'2','placeholder'=>'Descripción de la Saga','id'=>'exampleInputFile','required'=>'required']) !!}
                        </div>
                    <br>
                    <div align="center">
                            <button class="btn curvaBoton waves-effect waves-light green" id="guardarSaga">Agregar saga
                            </button>
                            {!! Form::close() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>
        <!-- /.modal  de generos  -->
<div id="modalgenero" class="modal">
    <div class="modal-content">
        <div class=" blue"><br>
            <h4 class="center white-text" ><i class="small material-icons">book</i> Agregar nuevo género</h4>
            <br>
        </div>
        <br>
       
                {!! Form::open(['route'=>'tags.store', 'method'=>'POST','files' => 'true' ]) !!}
                {{ Form::token() }}
                <div class="row">
                    <div class="col s12">
                        <input type="hidden" name="seller_id" value="{{Auth::guard('web_seller')->user()->id}}" id="seller_id">
                        <input type="hidden" name="type_tags" value="Peliculas" id="type_tags">
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            <label for="new_tag" class="control-label">Nuevo género</label>
                            
                            <input type="text" name="tags_name" class="form-control"  id="new_tag" required="required" >
                            <div id="mensajegeneronuevo"></div>
                        </div>
                        <br>
                    </div>
                </div>
                <div align="center">
                    <button class="btn curvaBoton waves-effect waves-light green"  id="save-resource" onclick="callback()">Guardar género</button>
                </div>
            
        
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
    </div>
</div>

@endsection
@section('js')

<script type="text/javascript">
           // Tabs
    var elem = $('.tabs')
    var options = {}
    var instance = M.Tabs.init(elem, options);

    //or Without Jquery


    //var elem = document.querySelector('.tabs');
    var options = {}
    var instance = M.Tabs.init(elem, options);

    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.parallax');
        var instances = M.Parallax.init(elems, options);
    })
    //Modal
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
    });

    // Or with jQuery
    // Slider
    $(document).ready(function(){
        $('.tooltipped').tooltip();
        $('.modal').modal();
        $('select').formSelect();
        $('.parallax').parallax();
        $('.materialboxed').materialbox();
        $('.slider').slider({
            indicators: false
        });
    });


       
    </script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
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
        $('#precio').keyup(function(evento) {
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
        });
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



    //costo en dolares
    document.getElementById("conversion").disabled = true;
    //function keyup para actualizar el campo costo en dolares
    $( "#precio" ).on( 'keyup click', function() {
        var conversion=ticket_dolar(document.getElementById("precio").value);
        document.getElementById("conversion").value=conversion.toFixed(2);
    });
</script>
@endsection