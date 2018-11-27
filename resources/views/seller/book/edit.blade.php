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
    <!-- Main content -->
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
            <div class="col s12 m12">

                @if(\Auth::guard('web_seller')->user()->id === $book->seller_id)

                    <div class="card-panel curva ">
                            <h3 class="center">
                                Editar libro
                            </h3>
                        <br>
                        <div class="row">
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(['route'=>['tbook.update',$book], 'method'=>'PUT','files' => 'true' ]) !!}
                        {{ Form::token() }}
                            <div class="col s12 m6">
                                {{--Imagen--}}
                                <div id="mensajeFotoLibro"></div>
                                <label for="cargaPelicula" id="cargaPelicula" class="control-label" style="color: green;">
                                    Si no selecciona una portada, se mantendrá la actual
                                </label>
                                <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="">
                                    <label for="image-upload" id="image-label"> Portada del Libro </label>
                                        {!! Form::file('cover',['class'=>'form-control-file','control-label','id'=>'image-upload','accept'=>'image/*','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]) !!}
                                    <div id="list">
                                        <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset('images/bookcover/') }}/{{$book->cover }}"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col s12 m6">
                                {{--Selecion el autor--}}
                                @foreach(App\Seller::find(\Auth::guard('web_seller')->user()->id)->roles as $mod)
                                    @if($mod->name == 'Editorial')
                                        @if(count($author)!=0)
                                        <div class=" input-field col s12">
                                            <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                            {!! Form::select('author_id',$author,$book->author_id,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione un autor')",'oninput'=>"setCustomValidity('')"]) !!}
                                            <label for="exampleInputFile" class="control-label">Nombre de autor</label>
                                            <a href="{{ route('authors_books.create') }}" class="btn btn-success">
                                                Agregar autor
                                            </a>
                                        
                                            <br><br>    
                                        </div>
                                        @else
                                            <label id="faltaRegistro" style="color: red;"> 
                                                Usted aun no tiene registros de datos de autores de libros, por favor agregue dichos datos primero
                                            </label>
                                            <div class=" input-field col s12">
                                            <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                                <a href="{{ route('authors_books.create') }}" class="btn btn-success">
                                                    Agregar autor
                                                </a>
                                                <br>
                                            </div>
                                            
                                        @endif
                                    @elseif($mod->name == 'Escritor')
                                        @if(count($author)!=0)
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix blue-text valign-wrapper" >face</i>
                                            {!! Form::select('author_id',$author,$book->author_id,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione un autor')",'oninput'=>"setCustomValidity('')"]) !!}
                                            <br>
                                        </div>
                                        
                                        @else
                                            <label id="faltaRegistro" style="color: red;"> 
                                                Usted aun no tiene registros de sus datos como autor de libros, por favor agregue dichos datos primero
                                            </label>
                                            <div class=" input-field col s12">
                                                <i class="material-icons prefix blue-text valign-wrapper">face</i>
                                                <a href="{{ route('authors_books.create') }}" class="btn btn-success">
                                                    Agregar autor
                                                </a>
                                                <br>
                                            </div>
                                            
                                        @endif
                                    @endif
                                @endforeach

                                {{--titulo del libro--}}
                                <div class="input-field col s12">
                                    <i class="material-icons prefix blue-text">create</i>
                                    <label for="exampleInputFile" class="control-label">Título</label>
                                    @if($book->status != 'Aprobado')
                                        {!! Form::text('title',$book->title,['class'=>'form-control','placeholder'=>'Titulo del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]) !!}
                                        <div id="mensajeTitulo"></div>
                                        <br>
                                    @else
                                        {!! Form::text('title',$book->title,['class'=>'form-control','placeholder'=>'Titulo del libro',' readonly']) !!}
                                        <div id="mensajeTitulo"></div>
                                        <br>
                                    @endif
                                </div>
                                <br>

                                {{--titulo original del libro--}}
                                <div class="input-field col s12">
                                <i class="material-icons prefix blue-text">create</i>
                                    <label for="exampleInputFile" class="control-label">Titulo original</label>
                                    @if($book->status != 'Aprobado')
                                        {!! Form::text('original_title',$book->original_title,['class'=>'form-control','placeholder'=>'Título original','placeholder'=>'Titulo del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione el título original')",'oninput'=>"setCustomValidity('')"]) !!}
                                        <div id="mensajeTitulo"></div>
                                        <br>
                                    @else
                                        {!! Form::text('original_title',$book->original_title,['class'=>'form-control','placeholder'=>'Título original','placeholder'=>'Titulo del libro','readonly']) !!}
                                        <div id="mensajeTitulo"></div>
                                        <br>
                                    @endif
                                </div>
                                <br>

                                {{--precio--}}
                                <div class="input-field col s12">
                                <i class="material-icons prefix blue-text valign-wrapper">local_play</i>
                                    <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                                    
                                    @if($book->status != 'Aprobado')
                                        {!! Form::number('cost',$book->cost,['class'=>'form-control', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Escriba un costo en tickets')", 'oninput'=>"setCustomValidity('')", 'id'=>'precio', 'min'=>'0']) !!}
                                        <div id="mensajePrecio"></div>
                                    @else
                                        {!! Form::number('cost',$book->cost,['class'=>'form-control','placeholder'=>'Costo en tickets', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Escriba un costo en tickets')", 'oninput'=>"setCustomValidity('')", 'id'=>'precio', 'min'=>'0','readonly']) !!}
                                        <div id="mensajePrecio"></div>
                                    @endif
                                </div>
                                
                            </div> 
                              
                            <br>
                            <div class="col s12 m12">
                                <br>
                                <div class="col s12 m6">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix blue-text valign-wrapper">star</i>
                                        {{--seleccion de rating--}}
                                        
                                        @if($book->status != 'Aprobado')
                                            {!! Form::select('rating_id',$rating,$book->rating_id,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]) !!}
                                        @else
                                            {!! Form::select('rating_id',$rating,$book->rating_id,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')",'disabled'=>true ]) !!}
                                        @endif
                                        <label for="exampleInputFile" class="control-label">Categoría</label>
                                    </div>
                                </div>
                                
                                <div class="col s12 m6">
                                    <div class="input-field col s12">
                                    {{--Categoria--}}
                                   
                                        @if($book->status != 'Aprobado')
                                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                                        <select name="tags[]" multiple="true" class="form-control" required>
                                            @foreach($tags as $genders)
                                                <option value="{{$genders->id}}"
                                                    @foreach($s_tags as $s) 
                                                        @if($s->id == $genders->id) 
                                                            selected 
                                                        @endif 
                                                    @endforeach
                                                    >
                                                    {{$genders->tags_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @else
                                        <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                                        <select name="tags[]" multiple="true" class="form-control" disabled="true">
                                        @foreach($tags as $genders)
                                            <option value="{{$genders->id}}"
                                                @foreach($s_tags as $s) 
                                                    @if($s->id == $genders->id) 
                                                        selected 
                                                    @endif 
                                                @endforeach
                                                >
                                                {{$genders->tags_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @endif
                                     <label for="tags">Generos</label>
                                    </div>
                                </div>

                           
                                
                                    {{--archivo del libro--}}
                                    @if($book->status != 'Aprobado')
                                    <div class="col m6 s12">
                                        <label for="cargaPelicula" id="cargaPelicula" class="control-label" style="color: green;">
                                            Si no selecciona un libro, se mantendrá el actual
                                        </label>
                                        <div class="file-field input-field">
                                            <label for="exampleInputFile" class="control-label">Cargar el libro</label>
                                            <br><br>
                                            <div id="mensajeDocumento"></div>
                                            <div class="btn blue">
                                                 <span><i class="material-icons">picture_as_pdf</i></span>
                                                {!! Form::file('books_file',['class'=>'form-control','accept'=>'.pdf','control-label','placeholder'=>'cargar libro','oninvalid'=>"this.setCustomValidity('Seleccione documento del libro')",'oninput'=>"setCustomValidity('')",'id'=>'libro']) !!}
                                            </div>
                                            <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    
                                
                                <br>
                             
                           
                                <br><br>   
                                {{--selecione el pais--}}
                                @if($book->status != 'Aprobado')
                                <div class="col m6 s12">
                                    <label for="pais" id="pais" class="control-label" style="color: green;">
                                        Si no selecciona un país, se mantendrá el actual
                                    </label>
                                    <br><br><br>
                                    <div class="input-field col s12">
                                    
                                    <i class="material-icons prefix blue-text valign-wrapper">room</i>
                                    <select  name="country" id="paises" class="form-control js-example-basic-single" oninvalid="this.setCustomValidity('Seleccione un país')" oninput="setCustomValidity('')">
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
                                    <label class="control-label">País</label><br>
                                    </div>
                                <br>
                                </div>
                                @endif
                            
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix blue-text valign-wrapper">book</i> 
                                    {{--sinopsis del libro--}}
                                    <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                    <div id="cantidadPalabra"></div>
                                    <div id="mensajeNumeroPalabras"></div>
                                    {!! Form::textarea('sinopsis',$book->sinopsis,['class'=>'form-control materialize-textarea','rows'=>'3','cols'=>'2','placeholder'=>'Sinopsis del libro','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una sinopsis del libro')",'oninput'=>"setCustomValidity('')",'id'=>'sinopsis']) !!}
                                    <br>
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="input-field col s12">
                                    {{--año de salida del libro --}}
                                    <i class="material-icons prefix blue-text valign-wrapper">access_time</i>
                                    <label for="exampleInputPassword1" class="control-label">Año de lanzamiento</label>
                                    <div id="mensajeFechaLanzamiento"></div>
                                    @if($book->status != 'Aprobado')
                                        {!! Form::number('release_year',$book->release_year,['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')",'oninvalid'=>"this.setCustomValidity('Seleccione el año de lanzamiento')",'oninput'=>"setCustomValidity('')"]) !!}
                                    @else
                                        {!! Form::number('release_year',$book->release_year,['class'=>'form-control','placeholder'=>'Año de lanzamiento', 'id'=>'fechaLanzamiento', 'min'=>'0', 'max'=>"@date('Y')",'readonly']) !!}
                                    @endif
                                    <br>
                                </div>
                            </div>
                            
                            <input type="hidden" id="saga" value="{{$book->saga_id}}">
                            <div class="">
                                {{--tiene saga--}}
                                <label> ¿Pertenece a una saga? </label>
                                <br>
                                <div class="radio-inline">
                                    <label class="" for="option-1">
                                        <input type="radio" id="option-1" class="flat-red with-gap" onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                        <span class="mdl-radio__label">Si</span>
                                    </label>
                                
                                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                                        <input type="radio" id="option-2" class="mdl-radio__button with-gap" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                        <span class="mdl-radio__label">No</span>
                                    </label>

                                </div>
                                <br>
                            </div>
                                <div class="" style="display:none" id="if_si">
                                    <div class="col m12 s12">
                                        <div class="input-field col s12">
                                        {{--saga del libro--}}
                                         <i class="material-icons prefix blue-text valign-wrapper">book</i>
                                        {!! Form::select('saga_id',$saga,$book->saga_id,['class'=>'form-control select-saga','placeholder'=>'Selecione saga del libro','id'=>'exampleInputFile']) !!}
                                        <label for="exampleInputFile" class="control-label">Saga del libro</label>
                                        <br>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        {{--capitulo que se le antepone--}}
                                        <i class="material-icons prefix blue-text valign-wrapper">remove</i>
                                        <label for="exampleInputPassword1" class="control-label">Antes</label>
                                        {!! Form::number('before',$book->before,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0','required'=>'required']) !!}
                                        <br>
                                    </div>
                                    <div class="input-field col s6">
                                    {{--capitulo que le sigue--}}
                                        <i class="material-icons prefix blue-text valign-wrapper">add</i>
                                        <label for="exampleInputPassword1" class="control-label">Después</label>
                                        {!! Form::number('after',$book->after,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0','required'=>'required']) !!}
                                    </div>
                                </div>
                           
                        </div>
                        
                            <div class="col m12 s12">
                                <div>
                                    <a href="{{ url('/tbook') }}" class="btn curvaBoton waves-effect waves-light red">Atrás</a>
                                    
                                    <button class="btn curvaBoton waves-effect waves-light green" type="submit" id="guardarCambios">Editar libro</button>

                                    <!-- {!! Form::submit('Editar libro', ['class' => 'btn curvaBoton waves-effect waves-light green','id'=>'guardarCambios']) !!} -->
                                </div>
                            </div>    
                    {!! Form::close() !!}
                </div>
            </div>
        @endif
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
    <script>
//---------------------------------------------------------------------------------------------------
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
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeFotoLibro').hide();
                $('#guardarCambios').attr('disabled',false);
            }
        });
    });
    // Foto del Libro
    // Documento
    $(document).ready(function(){
        $('#libro').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#cargaPelicula').hide();
                $('#mensajeDocumento').show();
                $('#mensajeDocumento').text('El libro es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeDocumento').css('color','red');
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeDocumento').hide();
                $('#guardarCambios').attr('disabled',false);
                $('#cargaPelicula').show();
            }
        });
    });
    // Documento
//---------------------------------------------------------------------------------------------------
// Función que nos va a contar el número de caracteres
    $(document).ready(function(){
        $('#sinopsis').keyup(function(evento){
            var sinopsis = $('#sinopsis').val();
            numeroPalabras = sinopsis.length;
            $('#cantidadPalabra').text(numeroPalabras+'/'+1500);
            if (numeroPalabras>1500) {
                $('#mensajeNumeroPalabras').show();
                $('#mensajeNumeroPalabras').text('La cantidad máxima de caracteres es de 1500');
                $('#mensajeNumeroPalabras').css('color','red');
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeNumeroPalabras').hide();
                $('#guardarCambios').attr('disabled',false);
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
                $('#mensajeFechaLanzamiento').text('La fecha de lanzamiento no debe exceder el año actual');
                $('#mensajeFechaLanzamiento').css('color','red');
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeFechaLanzamiento').hide();
                $('#guardarCambios').attr('disabled',false);
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
                $('#guardarCambios').attr('disabled',true);
            } else if (precio<0) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                $('#mensajePrecio').css('color','red');
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajePrecio').hide();
                $('#guardarCambios').attr('disabled',false);
            }
        });
    });
// Para validar el precio
//---------------------------------------------------------------------------------------------------
// Para validar los radio boton
    $(document).ready(function(){
        console.log($('#saga').val() );
        if($('#saga').val() != ''){
        $('#option-1').prop('checked','checked');
        $('#if_si').show();
        $('#sagas').attr('required','required');
        $('#despues').attr('required','required');
        $('#antes').attr('required','required');
        $('#sagas').val('');
        }else{
          $('#option-2').prop('checked','checked'); 
          $('#if_si').hide();
          $('#sagas').removeAttr('required');
          $('#despues').removeAttr('required');
          $('#antes').removeAttr('required');
          $('#sagas').val(''); 
        }
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
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeDespues').hide();
                $('#guardarCambios').attr('disabled',false);
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
                $('#guardarCambios').attr('disabled',true);
            } else {
                $('#mensajeAntes').hide();
                $('#guardarCambios').attr('disabled',false);
            }
        });
    });
// Para validar los capitulos de las sagas
//---------------------------------------------------------------------------------------------------
    </script>
@endsection