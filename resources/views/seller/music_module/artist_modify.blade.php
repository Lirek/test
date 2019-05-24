@extends('seller.layouts')
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div class="col s6 ">
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
        @foreach($author as $a)
        <div class="card-panel curva">
            <h3 class="center">
                Modificar {{ $a->type_authors }}
            </h3>
            <br>
            <div class="row">
                <form  method="POST" action="{{ url('/save_modify_artist') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{Auth::guard('web_seller')->user()->id }}">
                <input type="hidden" name="id_author" value="{{ $a->id }}">
                <div class="input-field col s12 m6">
                    <label id="portadaActual" style="color: green;"> 
                        Si no selecciona una foto o logo, se mantendrá el actual 
                    </label>
                    <div id="mensajeFotoAlbun"></div>
                    <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="col-md-1">
                        <label for="image-upload" id="image-label">Foto o Logo</label>
                        <input type="file" name="photo" accept="image/*" id="image-upload"/>
                        <div id="list">
                            <img style= "width:100%; height:100%; border-top:50%;" src="{{ asset($a->photo) }}"/>
                        </div>
                    </div>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">face</i>
                    <label for="art_name" class="control-label">Nombre del artista o agrupación</label>
                    <div id="mensajeAA"></div>
                    <input id="art_name" type="text" value="{{ $a->name }}" class="form-control" name="art_name" required="required" rows="3" cols="2" oninvalid="this.setCustomValidity('Inserte un nombre de artista o agrupacion valido')" oninput="setCustomValidity('')">   
                    <br>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">create</i>
                    <label for="desc" class="control-label">Descripción</label>
                    <div id="mensajeDescripcion"></div>
                    <textarea class="materialize-textarea" name="dsc" placeholder="Descripción" id="descripcion" oninvalid="this.setCustomValidity('Inserte una descripción valida')" oninput="setCustomValidity('')"required="required">{{ $a->descripcion }}</textarea>
                    <br>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                    <select class="form-control" name="type_authors" required="required">
                        <option value="{{ $a->type_authors }}">{{ $a->type_authors }}</option>
                        @if($a->type_authors=='Solista')
                            <option value="Agrupacion musical">Agrupación musical</option>
                        @else
                            <option value="Solista">Solista</option>
                        @endif
                    </select>
                    <label for="type_authors" class="control-label">Tipo</label>
                    <br>
                </div>
                <div class="input-field col s12 m6">
                                     <i class="material-icons prefix blue-text valign-wrapper">room</i>
                                    <label id="portadaActual" style="color: green;"> 
                                        Si no selecciona un pais, se mantendrá el actual 
                                    </label>
                                    <select  name="x12" class="form-control">
                                        <option value="" selected></option>
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
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaiyán</option>
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
                                    <label for="country" class="control-label">País De origen</label>
                                    <br>
                                </div>
                        <div class="col s12 m12">
                            <div class="input-field col s12 m6">  
                                 <i class="prefix blue-text valign-wrapper fa fa-youtube"></i>
                                 <label>Canal de youtube</label>
                                <input value="{{ $a->google }}" type="text" class="form-control" id="google" name="google" placeholder="YouTube" pattern="http(s)?://(.*\.)?youtube\.com\/[A-z 0-9 /_]+\/?" oninvalid="this.setCustomValidity('Ingrese un canal valido')" oninput="setCustomValidity('')">
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="prefix blue-text valign-wrapper fa fa-instagram"></i>
                                <label>Instagram</label>
                                <input id="instagram" pattern="https?:\/\/(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?" value="{{ $a->instagram }}" type="text" name="instagram" class="form-control" placeholder="Instagram" oninvalid="this.setCustomValidity('Ingrese una cuenta de Instagram valido')" oninput="setCustomValidity('')">
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="prefix blue-text valign-wrapper fa fa-facebook-square"></i>
                                <label>Facebook</label>
                                <input value="{{ $a->facebook }}" type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" pattern="http(s)?:\/\/(www\.)?(facebook|fb)\.com\" oninvalid="this.setCustomValidity('Ingrese una cuenta de Facebook valida')" oninput="setCustomValidity('')" >
                            </div>

                        </div>
                        <div class="col s12">
                            <button type="submit" class="btn curvaBoton waves-effect waves-light green" id="registroAA">
                                Editar artista o agrupación
                            </button> 
                        </div>
                </form>
            </div>
        </div>
        @endforeach
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
    // Foto o Logo
    $(document).ready(function(){
        $('#image-upload').change(function(){
            var tamaño = this.files[0].size;
            var tamañoKb = parseInt(tamaño/1024);
            if (tamañoKb>2048) {
                $('#mensajeFotoAlbun').show();
                $('#mensajeFotoAlbun').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoAlbun').css('color','red');
                $('#registroAA').attr('disabled',true);
            } else {
                $('#mensajeFotoAlbun').hide();
                $('#registroAA').attr('disabled',false);
            }
        });
    });
    // Foto o Logo
//---------------------------------------------------------------------------------------------------
// Para validar la longtud de los campos
    // Nombre del artista o agrupacion
    $(document).ready(function(){
        var cantidadMaxima = 191;
        $('#art_name').keyup(function(evento){
            var nombre = $('#art_name').val();
            numeroPalabras = nombre.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeAA').show();
                $('#mensajeAA').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeAA').css('color','red');
                $('#registroAA').attr('disabled',true);
            } else {
                $('#mensajeAA').hide();
                $('#registroAA').attr('disabled',false);
            }
        });
    });
    // Nombre del artista o agrupacion
    // Descripcion
    $(document).ready(function(){
        var cantidadMaxima = 1500;
        $('#descripcion').keyup(function(evento){
            var nombre = $('#descripcion').val();
            numeroPalabras = nombre.length;
            if (numeroPalabras>cantidadMaxima) {
                $('#mensajeDescripcion').show();
                $('#mensajeDescripcion').text('La cantidad máxima de caracteres es de '+cantidadMaxima);
                $('#mensajeDescripcion').css('color','red');
                $('#registroAA').attr('disabled',true);
            } else {
                $('#mensajeDescripcion').hide();
                $('#registroAA').attr('disabled',false);
            }
        });
    });
    // Descripcion
// Para validar la longtud del nombre del artista o agrupacion
//---------------------------------------------------------------------------------------------------
    </script>
@endsection