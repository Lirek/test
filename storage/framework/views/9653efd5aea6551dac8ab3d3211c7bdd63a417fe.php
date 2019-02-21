<?php $__env->startSection('css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Main content -->
        <?php if(count($errors)>0): ?>
            <div class="col s6 col-md-offset-3">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li> <?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

<div class="row">
<div class="col s12 m12">
                <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="card-panel curva">
        <h4 class="titelgeneral"><i class="mdi mdi-book-open-page-variant"></i>  Registrar revista  </h4>
        <br>
                    <!-- form start -->
        <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('megazine_save')); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo e(Auth::guard('web_seller')->user()->id); ?>">
                    <?php echo e(csrf_field()); ?>


                        <div class="col s12 m6">
                            
                            <div id="mensajeFotoRevista"></div>
                            <div id="image-preview" style="border:#bdc3c7 1px solid ;" class="col m1">
                                <label for="image-upload" id="image-label"> Portada de la revista </label>
                                <?php echo Form::file('photo',['class'=>'form-control control-label','id'=>'image-upload','accept'=>'image/*','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una imagen de portada')",'oninput'=>"setCustomValidity('')"]); ?>

                                <div id="list"></div>
                            </div>
                        </div>
                        <br>
                        <div class="col s12 m6">
                            
                            
                            
                            <div class="input-field col s12">
                                <i class="material-icons prefix blue-text">create</i>    
                                <label for="autocomplete-input" class="">Título</label>
                                <?php echo Form::text('title',null,['class'=>'form-control','required'=>'required','id'=>'titulo','oninvalid'=>"this.setCustomValidity('Seleccione un título')",'oninput'=>"setCustomValidity('')"]); ?>

                                <div id="mensajeTitulo"></div>
                                <br>
                            </div>

                            
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix blue-text">local_play</i>
                                <label for="exampleInputPassword1" class="control-label">Costo en tickets</label>
                                <?php echo Form::number('cost',null,['class'=>'form-control', 'required'=>'required', 'oninvalid'=>"this.setCustomValidity('Escriba el costo en tickets')", 'onkeypress' => 'return controltagNum(event)','oninput'=>"setCustomValidity('')", 'id'=>'precio', 'min'=>'0', 'max'=>'999','oninput'=>"maxLengthCheck(this)"]); ?>

                                <div id="mensajePrecio"></div>
                                <br>
                            </div>

                            
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix blue-text valign-wrapper">attach_money</i>
                                <label  class="control-label">Ganancia en Dolares</label>
                                <?php echo Form::text('cost',null,['class'=>'form-control','placeholder'=>'0.00', 'id'=>'conversion']); ?>

                            </div>
                        <br>
                        <div class="input-field col s12">
                            <i class="material-icons prefix blue-text valign-wrapper">star</i>
                            
                            
                            <?php echo Form::select('rating_id',$ratin,null,['class'=>'form-control','id'=>'exampleInputFile','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione una categoría')",'oninput'=>"setCustomValidity('')"]); ?>

                            <label for="exampleInputFile" class="control-label">Categoría</label>
                        </div>
                        <div class="input-field col s12">
                            
                            <i class="material-icons prefix blue-text valign-wrapper">turned_in</i>
                            
                                <select name="tags[]" multiple="true" class="form-control" id="genders" required="required">
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($genders->type_tags=='Revistas'): ?>
                                            <option value="<?php echo e($genders->id); ?>"><?php echo e($genders->tags_name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="tags">Géneros</label>
                        </div>

                        <br>
                        </div>
                    <br>
                        <div class="col s12 m12">
                            <div class="col s12 m6">
                                <div class="file-field input-field">
                                    
                                    <label for="exampleInputFile" class="control-label">Cargar la revista</label>
                                    <br><br>
                                        <div id="mensajeDocumento"></div>
                                        <div class="btn blue">
                                            <span><i class="material-icons">picture_as_pdf</i></span>
                                            <?php echo Form::file('pdf_file',['class'=>'form-control','accept'=>'.pdf','control-label','placeholder'=>'Cargar la revista','required'=>'required','oninvalid'=>"this.setCustomValidity('Seleccione el documento del revista')",'oninput'=>"setCustomValidity('')",'id'=>'revista']); ?>

                                            <div id="mensajeRevista"></div>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        <br>
                                </div>
                                <br>
                            </div>
                            <div class="col s12 m6">
                                <br><br>
                                <div class="input-field col s12">
                                    
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
                            </div>
                        </div>
                        <div class="col s12 m12">
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix blue-text valign-wrapper">book</i>
                                    
                                    <label for="exampleInputPassword1" class="control-label">Sinopsis</label>
                                    <div id="cantidadPalabra"></div>
                                    <div id="mensajeNumeroPalabras"></div>
                                    <?php echo Form::textarea('descripcion',null,['class'=>'form-control materialize-textarea ','rows'=>'3','cols'=>'2','required'=>'required','oninvalid'=>"this.setCustomValidity('Escriba una sinopsis de la revista')",'oninput'=>"setCustomValidity('')",'id'=>'sinopsis']); ?>

                                    <div id="mensajeSinopsis"></div>
                                    <br>
                                </div>
                            </div>
                            <br>
                            <br>


                            <div class="col s12 m12">

                                
                                <label> ¿Pertenece a una cadena de publicación? </label>
                                <br>
                                <div class="">
                                    <label class="" for="option-1">
                                        <input type="radio" id="option-1" class="flat-red with-gap  " onclick="javascript:yesnoCheck();" name="status" value="Aprobado">
                                        <span class="mdl-radio__label">Si</span>
                                    </label>
                                
                                    <label class="" for="option-2">
                                        <input type="radio" id="option-2" class="flat-red with-gap" onclick="javascript:yesnoCheck();" name="status" value="Denegado">
                                        <span class="mdl-radio__label">No</span>
                                    </label>

                                </div>
                                <br/>

                                <div style="display:none" id="if_si" class="">
                                    <div class="input-field col s12">
                                    
                                    <i class="material-icons prefix blue-text valign-wrapper">book</i>
                                    <?php echo Form::select('saga_id',$sagas,null,['class'=>'form-control','placeholder'=>'Selecione cadena de publicación','id'=>'sagas']); ?>

                                    <label for="sagas" class="control-label">cadena de publicación de revista</label>
                                    <a class="btn curvaBoton waves-effect waves-light green  modal-trigger"  href="<?php echo e(url('/type')); ?>">
                                        <i class="fa fa-book"></i>
                                        Agregar cadena de publicacion
                                    </a>
                                    <br><br>
                                    </div>
                                    <div class="input-field col s6">
                                        
                                        <i class="material-icons prefix blue-text valign-wrapper">remove</i>
                                        <label for="antes" class="control-label">Antes</label>
                                        <?php echo Form::number('before',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va antes','id'=>'antes','min'=>'0','required'=>'required']); ?>

                                        <br>
                                    </div>
                                    <div class="input-field col s6">
                                        
                                        
                                        <i class="material-icons prefix blue-text valign-wrapper">add</i>
                                        <label for="despues" class="control-label">Despúes</label>
                                        <?php echo Form::number('after',null,['class'=>'form-control','placeholder'=>'Número del capítulo que va después','id'=>'despues','min'=>'0','required'=>'required']); ?>

                                        <br>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>


                         
        <div class="">
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
            <div class="text-center">
                <?php echo Form::submit('Registrar revista', ['class' => 'btn btn-primary curvaBoton green','id'=>'guardarRevista']); ?>

            </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

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
                                url: "<?php echo e(url('/AddTags')); ?>",
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
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeTitulo').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#titulOriginal").change(function(){
        var nombre = $("#titulOriginal").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeTitulOriginal').show();
            $('#mensajeTitulOriginal').text('El titulo no debe estar vacio');
            $('#mensajeTitulOriginal').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeTitulOriginal').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#precio").change(function(){
        var nombre = $("#precio").val().trim();
        if (nombre.length < 1 ){
            $('#mensajePrecio').show();
            $('#mensajePrecio').text('El precio no debe estar vacio');
            $('#mensajePrecio').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajePrecio').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#sinopsis").change(function(){
        var nombre = $("#sinopsis").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeSinopsis').show();
            $('#mensajeSinopsis').text('La sinopsis no debe estar vacia');
            $('#mensajeSinopsis').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeSinopsis').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#fechaLanzamiento").change(function(){
        var nombre = $("#fechaLanzamiento").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeFechaLanzamiento').show();
            $('#mensajeFechaLanzamiento').text('La fecha no debe estar vacia');
            $('#mensajeFechaLanzamiento').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeFechaLanzamiento').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#link").change(function(){
        var nombre = $("#link").val().trim();
        if (nombre.length < 1 ){
            $('#mensajeLink').show();
            $('#mensajeLink').text('El trailer no debe estar vacio');
            $('#mensajeLink').css('color','red');
            $('#guardarRevista').attr('disabled',true);
        }
        else {
            $('#mensajeLink').hide();
            $('#guardarRevista').attr('disabled',false);
        
        }
    })
    $("#new_tag").change(function(){
        var nombre = $("#new_tag").val().trim();
        if (nombre.length < 1 ){
            $('#mensajegeneronuevo').show();
            $('#mensajegeneronuevo').text('El nombre de la saga no debe estar vacio');
            $('#mensajegeneronuevo').css('color','red');
            $('#save-resource').attr('disabled',true);
        }
        else {
            $('#mensajegeneronuevo').hide();
            $('#save-resource').attr('disabled',false);
        
        }
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

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
                $('#mensajeFotoRevista').show();
                $('#mensajeFotoRevista').text('La imagen es demasiado grande, el tamaño máximo permitido es de 2.048 KiloBytes');
                $('#mensajeFotoRevista').css('color','red');
                $('#guardarRevista').attr('disabled',true);
            } else {
                $('#mensajeFotoRevista').hide();
                $('#guardarRevista').attr('disabled',false);
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
                $('#guardarRevista').attr('disabled',true);
            } else {
                $('#mensajeNumeroPalabras').hide();
                $('#guardarRevista').attr('disabled',false);
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
                $('#guardarRevista').attr('disabled',true);
            } else {
                $('#mensajeFechaLanzamiento').hide();
                $('#guardarRevista').attr('disabled',false);
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
                $('#guardarRevista').attr('disabled',true);
            } else if (precio<0) {
                $('#mensajePrecio').show();
                $('#mensajePrecio').text('El costo de tickets debe ser mayor a 0');
                $('#mensajePrecio').css('color','red');
                $('#guardarRevista').attr('disabled',true);
            } else {
                $('#mensajePrecio').hide();
                $('#guardarRevista').attr('disabled',false);
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('seller.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>