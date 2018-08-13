@extends('seller.layouts')
@section('css')
    <style>
        #image-preview {
            width: 100%;
            height: 430px;
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

                <div class="box box-primary ">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Registrar libro</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(['route'=>'tbook.store', 'method'=>'POST','files' => 'true' ]) !!}
                    {{ Form::token() }}
                    <div class="box-body ">

                        <div class="col-md-6">
                            {{--Imagen--}}
                            <div id="mensajeFotoLibro"></div>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                <label for="image-upload" id="image-label"> Portada del Libro </label>
                                {!! Form::file('cover',['class'=>'form-control control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                                <div id="list"></div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            {{--Selecion el autor--}}
                            @if(count($author)!=0)
                                <label for="exampleInputFile" class="control-label">Nombre de autor</label>
                                {!! Form::select('author_id',$author,null,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione un Autor')",'oninput'=>"setCustomValidity('')"]) !!}
                                <br>
                            @else
                                <label id="faltaRegistro" style="color: red;"> 
                                    Usted aun no tiene registros de sus datos como autor de libros, por favor agregue dichos datos primero 
                                </label>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#modal-defaultMA">
                                    <i class="fa fa-user"></i>
                                    Agregar autor
                                </a>
                                <br><br>
                            @endif

                            {{--titulo del libro--}}
                            <label for="exampleInputFile" class="control-label">Título</label>
                            {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--titulo original del libro--}}
                            <label for="exampleInputFile" class="control-label">Título original</label>
                            {!! Form::text('original_title',null,['class'=>'form-control','placeholder'=>'Título original del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione el título original')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--seleccion de rating--}}
                            <label for="exampleInputFile" class="control-label">Categoría</label>
                            {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--archivo del libro--}}
                            <label for="exampleInputFile" class="control-label">Cargar el Libro</label>
                            <div id="mensajeDocumento"></div>
                            {!! Form::file('books_file',['class'=>'form-control','accept'=>'.pdf','control-label','placeholder'=>'Cargar libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione el documento del libro')",'oninput'=>"setCustomValidity('')",'id'=>'libro']) !!}
                            <br>

                            {{--selecione el pais--}}
                            <label class="control-label"> País</label>
                            <select  name="x12" id="paises" class="form-control" required="required" oninvalid="this.setCustomValidity('Seleccione un país')" oninput="setCustomValidity('')">
                                <option value="">Seleccione una opción</option>
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
                                <option value="EC">Ecuador</option>
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
                        </div>

                        <div class="form-group col-md-6">
                            {{--sinopsis del libro--}}
                            <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                            <div id="cantidadPalabra"></div>
                            <div id="mensajeNumeroPalabras"></div>
                            {!! Form::textarea('sinopsis',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Sinopsis del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una sinopsis del libro')",'oninput'=>"setCustomValidity('')",'id'=>'sinopsis']) !!}
                            <br>

                            {{--año de lanzamiento--}}
                            <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                            <div id="mensajeFechaLanzamiento"></div>
                            {!! Form::number('release_year',@date('Y'),['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')",'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')",'oninput'=>"setCustomValidity('')"]) !!}
                            <br>

                            {{--precio--}}
                            <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                            <div id="mensajePrecio"></div>
                            {!! Form::number('cost',null,['class'=>'form-control','placeholder'=>'Costo en tickets', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Escriba el costo en tickets')", 'oninput'=>"setCustomValidity('')", 'id'=>'precio', 'min'=>'0']) !!}
                        </div>

                        <div class="form-group col-md-6">
                            {{--tiene saga--}}
                            <label class="control-label"> ¿Pertenece a una saga? </label>
                            <br>
                            <div class="radio-inline">
                                <label class="control-label" for="option-1">
                                    <input type="radio" id="option-1" class="flat-red" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                    <span class="mdl-radio__label">Si</span>
                                </label>
                            </div>

                            <div class="radio-inline">
                                <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                    <input type="radio" id="option-2" class="mdl-radio__button" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                    <span class="mdl-radio__label">No</span>
                                </label>

                            </div>
                            <br/>

                            <div style="display:none" id="if_si">
                                {{--saga del libro--}}
                                <label for="exampleInputFile" class="control-label">Saga del libro</label>
                                {!! Form::select('saga_id',$saga,null,['class'=>'form-control','placeholder'=>'Selecione saga del libro','id'=>'sagas']) !!}
                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-defaultMS">
                                    <i class="fa fa-book"></i>
                                    Agregar saga
                                </a>
                                <br><br>

                                {{--capitulo que se le antepone--}}
                                <label for="exampleInputPassword1" class="control-label">Antes</label>
                                {!! Form::number('before',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0','required'=>'required']) !!}
                                <br>

                                {{--capitulo que le sigue--}}
                                <label for="exampleInputPassword1" class="control-label">Despúes</label>
                                {!! Form::number('after',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0','required'=>'required']) !!}

                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <div class="text-center">
            {!! Form::submit('Registrar libro', ['class' => 'btn btn-primary','id'=>'guardarLibro']) !!}
        </div>
        {!! Form::close() !!}


        <!-- /.modal  de autor  -->
        <div class="modal fade in modal-primary" id="modal-defaultMA">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h1 class="modal-title text-center">Agregar autor</h1>
                    </div>
                    <div class="modal-body ">
                        {!! Form::open(['route'=>'authors_books.register', 'method'=>'POST','files' => 'true' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body">
                            <div class="col-md-6">

                                {{--Imagen--}}
                                <div id="mensajeFotoAutor"></div>
                                <div id="imageAM-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                    <label for="image-upload" id="image-autor"> Foto del autor </label>
                                    {!! Form::file('photo',['class'=>'form-control-file','control-label','accept'=>'image/*','id'=>'imageAM-upload','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una foto del autor')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                                    <div id="fotoAutor"></div>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                {{--nombre del autor--}}
                                <label for="exampleInputFile" class="control-label">Nombres y apellidos</label>
                                {!! Form::text('full_name',null,['class'=>'form-control','placeholder'=>'Nombre completo del autor','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un nombre y apellido')",'oninput'=>"setCustomValidity('')"]) !!}
                                <br>

                                {{--correo o email del autor--}}
                                <label for="exampleInputEmail1">Correo electrónico</label>
                                {!! Form::email('email_c',null,['class'=>'form-control','placeholder'=>'example@correo.com','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Ingrese un correo electrónico')",'oninput'=>"setCustomValidity('')"])!!}
                                <br>

                                {{--inicio de la agrupacion--}}
                                {{--link de google+--}}
                                <label for="Redes Sociales" class="control-label">Redes sociales</label>
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-google-plus-square"></i></span>
                                    {!! Form::text('google',null,['class'=>'form-control','placeholder'=>'Google+','id'=>'exampleInputFile', 'pattern'=>'http(s)?:\/\/(www\.)?plus.google\.com\/u\/o\/([0-9_]','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Google+ valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                {{--link de instagram--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    {!! Form::text('instagram',null,['class'=>'form-control','placeholder'=>'Instagram','id'=>'exampleInputFile', 'pattern'=>'https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Instagram valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                {{--link de facebook--}}
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-facebook-square"></i></span>
                                    {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook','id'=>'facebook', 'pattern'=>'http(s)?:\/\/(www\.)?(facebook|fb)\.com\/[A-z . 0-9_]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Facebook valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>

                                {{--link de twitter--}}
                                {{--
                                <div class="input-group col-xs-12">
                                    <span class="input-group-addon"><i class="fa fa-twitter-square"></i></span>
                                    {!! Form::text('twitter',null,['class'=>'form-control','placeholder'=>'Twitter','id'=>'twitter', 'pattern'=>'http(s)?://(.*\.)?twitter\.com\/[A-z 0-9 _]+\/?','oninvalid'=>"this.setCustomValidity('Ingrese una cuenta de Twitter valida')",'oninput'=>"setCustomValidity('')"]) !!}
                                </div>
                                --}}
                            </div>
                            {{--final de la agrupacion--}}

                        </div>
                        <div align="center">
                            {!! Form::submit('Agregar autor', ['class' => 'btn btn-primary','id'=>'guardarAutor']) !!}
                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="modal-footer">
                        <div class="box-body">
                            <button type="button" class="btn btn-danger pull-rigth" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
                        {!! Form::open(['route'=>'sagas.register', 'method'=>'POST','files' => 'true' ]) !!}
                        {{ Form::token() }}
                        <div class="box-body ">

                            <div class="col-md-6">
                                {{--Imagen--}}
                                <div id="mensajeFotoSaga"></div>
                                <div id="imageSM-preview" style="border:#bdc3c7 1px solid ;" class="form-group col-md-1">
                                    <label for="image-upload" id="image-label"> Imagen de la saga</label>
                                    {!! Form::file('img_saga',['class'=>'form-control-file','control-label','id'=>'imageSM-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')",'style'=>'border:#000000','1px solid ;']) !!}
                                    <div id="fotoSaga"></div>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                {{--seleccion de rating--}}
                                <label for="exampleInputFile" class="control-label">Categoría</label>
                                {!! Form::select('rating_id',$ratin,null,['class'=>'form-control','placeholder'=>'Selecione una categoría','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Nombre de la saga--}}
                                <label for="exampleInputFile" class="control-label">Nombre</label>
                                {!! Form::text('sag_name',null,['class'=>'form-control','placeholder'=>'Nombre de la saga','required'=>'required']) !!}
                                <br>

                                {{--tipo de saga--}}
                                <label for="exampleInputFile" class="control-label">Tipo de saga</label>
                                {!! Form::select('type_saga',['1'=>'Libros'],null,
                                ['class'=>'form-control select-author','id'=>'exampleInputFile','required'=>'required']) !!}
                                <br>

                                {{--Descripcion de  la saga--}}
                                <label for="exampleInputPassword1" class="control-label">Descripción</label>
                                {!! Form::textarea('sag_description',null,['class'=>'form-control','rows'=>'3','cols'=>'2','placeholder'=>'Descripción de la Saga','id'=>'exampleInputFile','required'=>'required']) !!}
                            </div>
                            <br>
                        </div>
                        <!-- /.box-body -->
                        <div align="center">
                            {!! Form::submit('Agregar saga', ['class' => 'btn btn-primary','id'=>'guardarSaga']) !!}
                            {!! Form::close() !!}
                        </div>
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
    </section>
@endsection
@section('js')
    <script>
//---------------------------------------------------------------------------------------------------
// Para que se vea la portada del libro, los modales de Autor y de Saga
    // Para la Portada del Libro
    function portada(evt) {
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
    document.getElementById('image-upload').addEventListener('change', portada, false);
    // Para la Portada del Libro

    // Para la foto del Autor
    function autor(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                document.getElementById("fotoAutor").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('imageAM-upload').addEventListener('change', autor, false);
    // Para la foto del Autor

    // Para la foto de la Saga
    function saga(evt) {
        var files = evt.target.files;
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                document.getElementById("fotoSaga").innerHTML = ['<img style= width:100%; height:100%; border-top:50%; src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('imageSM-upload').addEventListener('change', saga, false);
    // Para la foto de la Saga
// Para que se vea la portada del libro, los modales de Autor y de Saga
//---------------------------------------------------------------------------------------------------
// Para validar el tamaño maximo de las imagenes y del documento
    // Foto del Libro
    $(document).ready(function(){
        $('#image-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoLibro').show();
                $('#mensajeFotoLibro').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoLibro').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeFotoLibro').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
    // Foto del Libro
    // Foto del Autor
    $(document).ready(function(){
        $('#imageAM-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoAutor').show();
                $('#mensajeFotoAutor').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoAutor').css('color','red');
                $('#guardarAutor').attr('disabled',true);
            } else {
                $('#mensajeFotoAutor').hide();
                $('#guardarAutor').attr('disabled',false);
            }
        });
    });
    // Foto del Autor
    // Foto de la Saga
    $(document).ready(function(){
        $('#imageSM-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoSaga').show();
                $('#mensajeFotoSaga').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoSaga').css('color','red');
                $('#guardarSaga').attr('disabled',true);
            } else {
                $('#mensajeFotoSaga').hide();
                $('#guardarSaga').attr('disabled',false);
            }
        });
    });
    // Foto de la Saga
    // Documento
    $(document).ready(function(){
        $('#libro').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeDocumento').show();
                $('#mensajeDocumento').text('El Libro es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeDocumento').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeDocumento').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
    // Documento
// Para validar el tamaño maximo de las imagenes y del documento
//---------------------------------------------------------------------------------------------------
// Función que nos va a contar el número de caracteres
    $(document).ready(function(){
        var cantidadMaxima = 1500;
        $('#sinopsis').keyup(function(evento){
            var sinopsis = $('#sinopsis').val();
            numeroPalabras = sinopsis.length;
            $('#cantidadPalabra').text(numeroPalabras+'/'+cantidadMaxima);
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeNumeroPalabras').show();
                $('#mensajeNumeroPalabras').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeNumeroPalabras').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeNumeroPalabras').hide();
                $('#guardarLibro').attr('disabled',false);
            }
        });
    });
// Función que nos va a contar el número de caracteres
//---------------------------------------------------------------------------------------------------
// Para validar la Fecha de Lanzamiento
    $(document).ready(function(){
        $('#fechaLanzamiento').keyup(function(evento){
            var fechaActual = new Date();
            var año = $('#fechaLanzamiento').val();
            if (año > fechaActual.getFullYear()) {
                $('#mensajeFechaLanzamiento').show();
                $('#mensajeFechaLanzamiento').text('La Fecha de Lanzamiento no debe exceder el año actual');
                $('#mensajeFechaLanzamiento').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajeFechaLanzamiento').hide();
                $('#guardarLibro').attr('disabled',false);
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
                $('#guardarLibro').attr('disabled',true);
            } else if (precio<0) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                $('#mensajePrecio').css('color','red');
                $('#guardarLibro').attr('disabled',true);
            } else {
                $('#mensajePrecio').hide();
                $('#guardarLibro').attr('disabled',false);
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
@endsection