<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('plugins/materialize_index/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('plugins/materialize_index/css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.carousel.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/owl.theme.default.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics Breiddy Monterrey-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126665289-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-126665289-1');

    </script>
</head>

<style type="text/css">

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


<!--Menu-->
<nav class="default_color" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="{{ url('/home')}}" class="brand-logo"><img class= "img"src="https://leipel.com/plugins/img/Logo-Leipel.png" width="120px;" height="50px;" title="Logo de Leipel"></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="blue-text" href="{{route('queEsLeipel')}}" target="_blank"><b>¿Qué es leipel?</b></a></li>
            @if(Auth::guard('web_seller')->user())
                @if (Auth::guard('web_seller')->user()->logo)
                    <li>
                        <a href="{{ url('/seller_home')}}" data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::guard('web_seller')->user()->logo)}}"  class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}"  data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif(Auth::user())

                @if(Auth::user()->img_perf)
                    <li>
                        <a href="{{ url('/home')}}"  data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::user()->img_perf)}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}" data-position="bottom" data-position="bottom" class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif (Auth::guest())
                <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
                <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
            @endif
        </ul>

        <ul id="nav-mobile" class="sidenav">
            <li><a class="blue-text" href="{{route('queEsLeipel')}}"><b>¿Qué es Leipel<leipelsad></leipelsad>?</b></a></li>
            @if(Auth::guard('web_seller')->user())
                @if (Auth::guard('web_seller')->user()->logo)
                    <li>
                        <a href="{{ url('/seller_home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset(Auth::guard('web_seller')->user()->logo)}}" class="img circle" width="40" height="40">
                            <b> Ingresar</b>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif(Auth::user())

                @if(Auth::user()->img_perf)
                    <li>
                        <a href="{{ url('/home')}}" data-position="right"  class="tooltipped" data-tooltip="Ingresar">
                            <img  src="{{asset(Auth::user()->img_perf)}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/home')}}"  data-position="right"  class="tooltipped" data-tooltip="Ingresar" >
                            <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img circle" width="40" height="40">
                        </a>
                    </li>
                @endif

            @elseif (Auth::guest())
                <li><a class="blue-text modal-trigger" href="#modal1"><b>Iniciar Sesión</b></a></li>
                <li><a class="blue-text modal-trigger" href="#modal2"><b>Registrate</b></a></li>
            @endif
        </ul>
        <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="blue-text material-icons">menu</i></a>
    </div>
</nav>
<!--Fin Menu-->
<div class="container">
    <div  style="margin-left: 5%; margin-right: 5%" class="text-center ">
        <br>
        <h3 class="center blue-text">Terminos y condiciones</h3>
        <br>
        <textarea disabled="true" class="text-justify" style="resize: none; height: 500px; width: 100%">
Estos Términos de uso incluyen y pueden incluir otros temas, a los cuales se accede a través de hipervínculos, por lo cual deberá leer el contenido total de los presentes Términos y Condiciones de Uso antes de aceptarlos. SI NO ACEPTA ESTOS TÉRMINOS DE USO, NO UTILICE EL SERVICIO DE LEIPEL.
Los presentes Términos y condiciones de uso rigen estrictamente la utilización que haga de nuestro servicio.  LEIPEL es el nombre comercial bajo la razón social INFORMERET S.A. y según se utilice en estos términos y condiciones de uso, en todo momento que se mencione a LEIPEL en el presente documento, es equivalente a mencionar al servicio que ofrecemos desde www.leipel.com y sus páginas derivadascomo por ejemplo www.leipel.com/perfil , también en todo momento que se mencione a UN USUARIO, AL USUARIO, DEL USUARIO, EL USUARIO, LOS USUARIOS o  USUARIO en el presente documento, se refieren a todos aquellas cuentas dentro de Leipel destinadas a poder adquirir de manera gratuita o bajo costos los diferentes contenidos existentes dentro de LEIPEL, de la misma manera, en todo momento que se mencione a UN PROVEEDOR, EL PROVEEDOR, LOS PROVEEDOR o PROVEEDOR en el presente documento, se refieren a todos aquellas cuentas dentro de Leipel destinadas a proveer de contenidos a LEIPEL de manera gratuita, libre y voluntaria. Todas las cuentas dentro de Leipel pertenecen a personas naturales o jurídicas las cuales afirman haber leído y aceptado en la plenitud de sus facultades físicas y mentales, los presentes términos y condiciones de uso. 

Según se utilice en estos términos y condiciones de uso, “el servicio de LEIPEL”, “nuestro servicio” o “el servicio” se refieren al servicio brindado por LEIPEL para descubrir y ver nuestros contenidos, incluidas todas las características y funcionalidades, sitio web e interfaces de usuario, además de todo el contenido y software asociado a nuestro servicio. 

Tome en consideración que estos Términos y Condiciones de Uso incluyen hipervínculos a los que se puede acceder únicamente a través de nuestro sitio web, de modo que si consulta los TÉRMINOS Y CONDICIONES DE USO a través de algunos dispositivos listos para LEIPEL, es posible que tenga que visitar nuestra página web https://www.leipel.com/ donde expondremos visiblemente el acceso a los mismos. 

Podríamos suspender, bloquear, eliminar, terminar o restringir su cuenta de USUARIO o PROVEEDOR a nuestro servicio sin compensación o aviso previo, si sospechamos que viola cualquiera de los TÉRMINOS Y CONDICIONES DE USO o que usted usa el servicio de forma  ilegal, inadecuada, inapropiada o de cualquier razón no aceptable para LEIPEL.
LEIPEL se reserva el derecho de decidir por criterio propio a quién permitir tener una cuenta, de cualquier tipo, y a quien negársela. De la misma a quién se le permite o no, el privilegio de gozar de cualquier beneficio o grupo de beneficios adicionales por poseer una cuenta en LEIPEL. 

EL USUARIO puede visualizar los contenidos dentro de la plataforma LEIPEL, está prohibida la copia, piratería, robo, descarga, reproducción total o parcial de los contenidos sin previo consentimiento de los propietarios del contenido por escrito. EL USUARIO afirma entender y aceptar que queda bajo su total responsabilidad el infringir lo mencionado, de la misma manera EL USUARIO autoriza a LEIPEL entregar cualquier información que posea LEIPEL sobre EL USUARIO en caso de que UN PROVEEDOR desee comunicarse con EL USUARIO por haber o suponer haber infringido con lo antes mencionado.

El USUARIO entiende que al brindarnos información esta puede estar sujeta a percances, ya que en el mundo real como en digital existen amenazas, por ende el usuario acepta cualquier responsabilidad en caso de sufrir un percance con su información. Aun así, LEIPEL tomará las medidas que vea conveniente o estén a su alcance para intentar proteger al USUARIO dentro de la plataforma de LEIPEL. 

1.  EL SERVICIO
Bienvenido a LEIPEL, somos una empresa dedicada a ofrecer un servicio de suscripción, distribución y venta de contenidos digitales por medio de nuestra plataforma virtual. Dedicamos nuestro esfuerzo a que usted pueda visualizar de la manera más cómoda dichos contenidos, material visual y audiovisual entre otros, que se transmiten o pueden transmitirse por Internet a televisores, computadoras, celulares, tablets y otros dispositivos conectados a Internet y/o dispositivos listos para LEIPEL. Podría considerarse a LEIPEL, en caso de no ser esto perjudicial para LEIPEL, como un intermediario entre el LOS PROVEEDORES y LOS USUARIOS.
LEIPEL con la finalidad de aumentar nuestra clientela y por ende nuestra fuente de ingresos, podría ofrecer promociones, ofertas y diferente premios o beneficios, que podría incluso  incluir, puntos, canjes, comisiones en efectivo, entro otros, sin embargo LEIPEL decidirá la cantidad, tiempo, duración, forma y todo aspecto de estos incentivos, LEIPEL en ningún momento se verá obligado a mantener estas promociones, ofertas y beneficios especiales indefinidamente y podría brindarlas o negarlas a cualquier USUARIO si así LEIPEL lo ve a su parecer necesario, es más, incluso en caso de LEIPEL considerarlo necesario, puede simplemente negarse a entregar un incentivo ya destinado a un USUARIO o PROVEEDOR, y los mismo aceptan esto de manera libre y voluntaria.
El servicio de LEIPEL y los contenidos a los que se accede a través de nuestro servicio son únicamente para uso personal y no comercial por parte del USUARIO espectador, en otras palabras del que disfruta de los contenidos, mas no del PROVEEDOR que dispone de sus contenidos a LEIPEL para su distribución o comercialización. Durante la suscripción a LEIPEL le otorgamos acceso limitado, no exclusivo, e intransferible al servicio de LEIPEL con el propósito de que pueda observar cualquier contenido que provea LEIPEL a través de nuestro servicio. Excepto dicho acceso limitado, no se le transferirá ningún derecho o título. EL USUSARIO acepta que no usará el servicio de LEPEL para presentaciones públicas o privadas.
Entre la variedad de los contenidos tenemos: periódicos, revistas, libros, catálogos, películas, series radio, televisión, material visual y audiovisual, entre otros. Estos contenidos serán gratuitos o con costo, dependiendo de la decisión que tome el dueño del contenido que usted desea visualizar.
Los contenidos dentro de LEIEPL son  ofrecidos por terceros, NO SOMOS RESPONSABLES POR DICHOS CONTENIDOS Y OPINIONES SOBRE LOS MISMOS, así como de los productos, servicios, promociones  provistos por dichos terceros. La responsabilidad total sobre los contenidos radica sobre quienes crearon o publicaron los mismos, así como de  los productos, servicios, promociones emitidos por ellos. La responsabilidad de todo comentario emitido es de quien emite dicho comentario.
La lectura de contenidos fuera Ecuador podría generar costos adicionales a su cuenta, los cuales usted acepta en el momento que realiza alguna compra dentro de LEIPEL y estos valores pueden ser cargados a su cuenta inmediatamente o en un futuro. El contenido que puede estar disponible para ver puede variar según la ubicación geográfica o de la voluntad de quien publica el contenido, puesto que se procurará cumplir con las regulaciones de cada territorio y de la voluntad y disponibilidad de los terceros. LEIPEL podrá utilizar tecnologías para verificar su ubicación geográfica. LA CANTIDAD DE DISPOSITIVOS EN LOS QUE PUEDE USAR SU CUENTA LEIPEL SIMULTÁNEAMENTE ESTÁ LIMITADA. El número de dispositivos disponibles para uso y las transmisiones simultáneas podría variar de vez en cuando y está a nuestra total discreción, sin embargo procuraremos el acceso de una cuenta por dispositivo. 
2.  COMPROMISOS POR PARTE DEL USUARIO o PROVEEDOR

EL USUARIO o PROVEEDOR es una persona natural legalmente mayor de edad o persona jurídica domiciliada legalmente que desea suscribirse a LEIPEL para poder utilizar sus servicios y beneficios.

El USUARIO o PROVEEDOR entienden que para poder contar con los servicios de LEIPEL, debe tener 18 años, o la mayoría de edad en su provincia, territorio o país. Los menores de edad pueden utilizar el servicio únicamente con la supervisión de sus padres o representantes legales. La totalidad de los servicios de LEIPEL y sus beneficios son únicamente para mayores de edad legalmente, así como para personas jurídicas públicas o privadas. 

El USUARIO o PROVEEDOR se compromete a proporcionar información 100% real, caso contrario perdería todos los beneficios que pudiera gozar por poseer una cuenta en LEIPEL.

El USUARIO o PROVEEDOR se compromete a mantener la clave de acceso a su cuenta LEIPEL en absoluta confidencialidad. 

EL USUARIO se compromete con respecto a los contenidos a únicamente visualizarlos, entiende que queda totalmente prohibida la reproducción total o parcial de aquellos contenidos sobre los cuales no tenga derecho legal de propiedad o de comercialización, dejando eximido a LEIPEL de cualquier responsabilidad legal en caso de incumplimiento. El USUARIO deberá atenerse a las leyes de propiedad intelectual y derechos de autor en caso de incumplimiento, so pena de cualquier sanción legal de acuerdo al ordenamiento jurídico vigente y autoriza expresamente a LEIPEL a entregar cualquier información que posea sobre EL USUARIO en caso de incumplimiento.
El USUARIO no podrá y se compromete a no usar el nombre comercial de LEIPEL en ningún medio de publicidad, tarjetas de presentación, carteles, folletos, vehículos, chequeras, papelería, radio, prensa, televisión, entre otros sin el previo consentimiento por escrito de LEIPEL ya que el USUARIO reconoce y entiende que las marcas, lemas, emblemas, denominaciones y patentes asociadas con los productos , accesorios y servicios pertenecientes a LEIPEL, así como toda especificación, dibujo, bosquejo, modelo, muestra, herramienta, dato, documentación, programas de computación e información técnica o comercial suministrados o revelados por LEIPEL al USUARIO, son de única y exclusiva propiedad del LEIPEL, por lo tanto, cualquier uso de los elementos publicitarios por parte del USUARIO será única y exclusivamente con autorización de LEIPEL. En caso de incumplimiento del USUARIO en este punto, acepta toda responsabilidad civil, penal y monetaria por incumplir este compromiso. 

El USUARIO o PROVEEDOR se compromete y se obliga a guardar confidencialidad en relación con cualquier información, datos o documentos, que hayan sido recibidos de LEIPEL o que el USUARIO se haya enterado de LEIPEL. No podrá utilizar dicha información, datos o documentos confidenciales, para fines distintos a los requeridos para la ejecución de nuestros servicios, ni podrá publicar o divulgar a terceros dicha información, datos o documentos salvo en los siguientes casos: a) Cuando así lo exijan las disposiciones legales vigentes. b) Cuando así lo exija una autoridad competente. c) Con autorización previa por escrito de la otra parte. La obligación de confidencialidad estará vigente hasta 50 años después de la finalización de los presentes Términos y Condiciones de Uso. 

El USUARIO acuerda usar el servicio de LEIPEL, incluidas todas las características y funcionalidades asociadas con éste, bajo conformidad con todas las leyes, normas y reglamentaciones vigentes, o cualquier otra restricción al uso del servicio o sus contenidos. Acuerda no archivar, descargar (salvo por la descarga en caché necesario para su uso personal), reproducir, distribuir, modificar, transmitir, mostrar, ejecutar, reproducir, duplicar, publicar, otorgar licencias, crear obras derivadas basadas en el servicio, u ofrecer en venta, o usar (a excepción de que se autorice explícitamente en estos Términos y Condiciones de Uso) contenido e información contenida en u obtenida del servicio de LEIPEL a través de éste sin consentimiento previo por escrito de LEIPEL o de los dueños de los contenidos 
El USUARIO acuerda no: evitar, eliminar, alterar, desactivar, interferir con o burlar las protecciones de los contenidos ni del servicio de LEIPEL; usar ningún, spider, scraper u otra forma automatizada para acceder al servicio de LEIPEL; ni descompilar, realizar ingeniería inversa, desarmar el software u otro producto o proceso a los que se acceda a través del servicio de LEIPEL; introducir de alguna manera un código o producto o manipular el contenido del servicio de LEIPEL; o usar método alguno de análisis, extracción u obtención de datos. Asimismo, se compromete a no subir, publicar, enviar por email o transmitir de cualquier otra forma ningún material diseñado para interrumpir, destruir o limitar la funcionalidad del software de computación, hardware o equipos de telecomunicaciones asociados con el servicio de LEIPEL, incluido material que contenga virus de software o cualquier otro código, archivos o programas.
El USUARIO o PROVEEDOR manifiesta de manera voluntaria que ha leido y comprendido los presentes términos y condiciones de uso de LEIPEL, con lo que con al crearse una cuenta en LEIPEL deja constancia de su aceptación a todo lo manifestado, incluidas las obligaciones, acuerdos,  beneficios y demás que se hacen referencia en el presente documento y en cada uno de los temas, subtemas, numerales, literales, hipervínculos y demás especificaciones o acciones que llegue tomar LEIPEL para la plena prestación de  sus servicios, que se establecen en este documento, ya que caso contrario, simplemente no se crearía una cuenta. Deja constancia que es el único responsable de los comentarios y opiniones que publica al sistema de LEIPEL, eximiéndole a este último por cualquier responsabilidad, legal, civil, penal, etc., por los comentarios y opiniones publicados por el mismo USUARIO dentro de LIEPEL.
El PROVEEDOR acepta y reconoce que tiene que tener legalmente tanto la propiedad del contenido que va a publicar o en su defecto la debida autorización de comercialización del mismo. LEIPEL podría solicitarle evidencias de esto, sin embargo no estamos obligados a hacerlo o verificarlo, ya que cualquier inconveniente suscitado por el incumplimiento de lo mencionado es de su total responsabilidad, tanto civil, penal como monetaria. De la misma manera es totalmente responsable de toda información que contenga el contenido publicado. Así mismo autoriza expresamente a LEIPEL a entregar cualquier información que posea sobre el USUARIO en caso de incumplimiento o sospechas de incumplimiento. Así mismo deja constancia que es el único responsable del contenido que publica al sistema de LEIPEL, eximiéndole a este último por cualquier responsabilidad, legal, civil, penal, etc., por la información, comentarios o contenidos publicados.

2.1.   CON RESPECTO A USUARIOS O PROVEEDORES NO ECUATORIANOS (EXTRANJEROS)

SI SU NACIONALIDAD NO ES ECUATORIANA, ACEPTA Y ENTIENDE QUE ESTOS TÉRMINOS DE USO SE REGIRÁN E INTERPRETARÁN DE CONFORMIDAD CON LAS LEYES ECUATORIANAS, YA QUE ESTÁ USANDO UN SERVICIO DE NACIONALIDAD ECUATORIANA A TRAVEZ DE UNA CONECCIÓN DE INTERNET. CUALQUIER IMPUESTO, TASA, O VALOR ECONOMICO GENERADO POR SER USUARIO EXTRANJERO SERÁ ASUMIDO POR EL USUARIO. SI NO ESTÁ DE ACUERDO CON ESTE PUNTO, EN CASO DE SER EXTRANJERO, NO USE EL SERVICIO DE LEIPEL.

3.  TIPOS DE CUENTAS

LEIPEL entrega únicamente una  cuenta por cliente, la cual es de uso personal e intransferible, a menos que LEIPEL indique lo contrario por escrito. 
Crearse una cuenta en LEIPEL es totalmente GRATIS, sin embargo hay accesos y beneficios diferentes acorde a la cuenta que posea el usuario. Las cuentas en LEIPEL son: CLIENTE Y PROVEEDOR además de cualquier otro tipo de cuenta para uso interno de LEIPEL no necesariamente visible para los demás USUARIOS.  

Cuando una persona paga dentro de LEIPEL no es por una cuenta, es porque desea adquirir tickets, los cuales le sirven para adquirir los contenidos que no son gratuitos dentro de Leipel y en caso de suscribirse mensualmente a un paquete, es únicamente debido a la comodidad de no tener que realizar la operación de compra cada mes.

Todas las sub divisiones de las cuentas gratuitas pueden visualizar los contenidos gratuitos dentro de LEIPEL.com y adquirir créditos para poder visualizar aquellos contenidos que tienen un costo estipulado en créditos dentro de LEIPEL.com. 

Nos reservamos el derecho a modificar, rescindir o modificar cuentas,  paquetes, costos, cantidad de céditos, entre otros, lo cual informaremos a través de nuestro portal web en la secciòn de TERMINOS Y CONDICIONES, sin embargo es responsabilidad del USUARIO revisar periódicamente tanto los TERMINOS Y CONDICIONES como lo efrecido dentro la plataforma de LEIPEL.
El ingreso y control de una cuenta en Leipel se da por medio de un mail de usuario y una contraseña que solo quien creó la cuenta debería de conocer, a quien llamaremos titular de la cuenta por lo tanto, para mantener el control exclusivo, EL TITULAR DE LA CUENTA NO DEBERA REVELAR SU CONTRASEÑA A NADIE BAJO NINGUNA CIRCUNSTANCIA.

3.1.  Beneficios acorde a las cuentas
En cualquier momento y por cualquier motivo, podremos otorgar reembolsos, descuentos, créditos u otra contraprestación a algunos de nuestros miembros o a todos ellos. El monto y la forma de dichos créditos, y la decisión de otorgarlos, quedan sujetos a nuestra única y total discreción. 
La cuenta ESPECTADOR, EDITOR & ESPECTADOR al representar a una persona natural, están autorizados para recibir el beneficio de las comisiones que ofrece LEIPEL por su propia red.

La cuenta EDITOR no tiene el beneficio de recibir comisiones por la red propia, ya que se trata de una persona jurídica. 

La cuenta EDITOR & ESPECTADOR y EDITOR, están autorizados a recibir una retribución económica por cada crédito consumido en sus contenidos publicados.

La cuenta EDITOR & ESPECTADOR están autorizados a recibir comisiones por la red propia y una retribución económica por cada crédito consumido en sus contenidos publicados.

3.1.1.  Detalle de beneficios
El USUARIO entiende y acepta que en el caso de las comisione o retribuciones, usará el beneficio de forma independiente, no subordinada, no exclusiva y sin perjuicio de otras actividades comerciales que realice. Se deja expresa constancia que El USUARIO asume la total responsabilidad y obligaciones civiles, mercantiles, patronales, y de cualquier otra índole  previstas en el Código de Trabajo y en la Ley de Seguridad Social y sus reglamentos, y demás normativa legal vigente respecto del personal que utilice o llegare a utilizar para la utilización de este beneficio, quedando eximido LEIPEL de toda obligación y responsabilidad laboral, civil, mercantil, etc., con las personas que utilice el beneficiario de forma directa o indirecta. El USUARIO acepta que de suscitarse algún problema legal debido a la utilización voluntaria de este beneficio, acepta la total responsabilidad, incluso responsabilidad civil y de cualquier otra índole de la misma, obligándose por lo tanto al pago de todo el valor que sean imputables a estas responsabilidades.


3.1.1.1.   COMISIONES PARA CUENTAS ESPECTADOR, EDITOR & ESPECTADOR
LEIPEL ha tomado la decisión de entregar a cada usuario (únicamente persona natural) $0,10 ctvs. USD. por cada usuario en su red LEIPEL que también haya pagado mínimo un paquete de créditos en el mismo mes, considerando que podrá recibir comisiones mensuales hasta un tope máximo mensual, tope que se indica siempre en la sección de MI PLAN dentro de la plataforma www.Leipel.com acorde al paquete elegido.

Si el USUARIO no ha pagado mínimo un paquete de créditos dentro de un mes en curso, no tiene el beneficio de poder cobrar comisiones en ese mes, y no podrá pagarlo posteriormente. La comisión es por usuario, no por paquete adquirido.

LA RED está conformada por todas aquellas personas que llegaron a LEIPEL gracias a la invitación de otra persona, y se considera para LA RED hasta cinco generaciones de profundidad. Solo cuentan en LA RED aquellas personas que mediante nuestra plataforma podemos verificar que llegó a LEIPEL gracias a determinado usuario. El usuario debe de ser muy cuidadoso en cómo crear su red si pretende comisionar para que las personas que pretende tener en su red, consten dentro de ella, cualquier inconveniente con respecto a lo mencionado es responsabilidad des usuario.
Para poder retirar sus comisiones, el USUARIO deberá presentar una factura virtual, con todos los requisitos de la ley ecuatoriana, entre el primer y el quinto día calendario de cada mes.  LEIPEL realizará las gestiones para cancelar el valor de dicha factura entre los últimos días de ese mes en curso en que entregó la factura. El USUARIO deberá encontrarse inscrito en el SERVICIO DE RENTAS INTERNAS o en su defecto se obliga a inscribirse como comerciante independiente con actividades comerciales a cargo de comisionista en caso de utilizar voluntariamente este beneficio. 

LEIPEL podrá permitir la acumulación de las comisiones generadas del USUARIO hasta el mes de enero de cada año, pasado este tiempo, si el USUARIO no cobra sus comisiones, pierde el beneficio de poderlas cobrar. El suscriptor acepta esta cláusula y no podrá ejercer reclamos futuros debido a que para tal efecto, voluntariamente ha dado su consentimiento y aceptación y reconoce que las comisiones no serán consideradas como derechos adquiridos bajo ningún concepto, siendo únicamente beneficios que LEIPEL otorga o retira a su arbitrio. 

Este beneficio que otorga INFORMERET al USUARIO no tiene el carácter de exclusiva, por lo que INFORMERET se reserva el derecho de realizar encargos similares a otras personas naturales o jurídicas. 

En caso de terminación de este contrato, o cancelación de su cuenta, el USUARIO pierde el beneficio de poder cobrar las comisiones generadas hasta el momento. Se aclara además que la utilización del esta cláusula, se encuentra regida por las normas del Código de Comercio, y en los casos que no estén especialmente resueltos por este Código, se aplicarán las disposiciones del Código Civil.


LEIPEL entregará el beneficio de comisiones al usuario por el tiempo que crea conveniente. Leipel no se encuentra en ningún momento y bajo ninguna circunstancia obligado a desembolsar dinero en efectivo a sus usuarios por referir a otros usuarios, sin embargo ha decidido hacerlo como estrategia comercial por el tiempo que crea conveniente. 

Al valor mencionado como comisión se le descontará impuestos, tasas propias o ajenas a LEIPEL y otros valores relacionados a las entidades financieras o gubernamentales intermediarias. 

El valor de comisión será de máximo de $2000 USD (DOS MIL DOLARES AMERICANOS) de manera mensual y se podrá comisionar única y exclusivamente de los referidos en la red propia que TAMBIEN hayan pagado mínimo un paquete de créditos el mes que el usuario desea comisionar. Leipel podría cancelar una ligera diferencia adicional en comisiones, para intentar procurar que al USUARIO le llegue a su cuenta bancaria un valor igual al máximo de comisión permitida, ya que los impuestos o tasas, podrían disminuirlo. 

LEIPEL podría elevar el máximo de comisión mensual, basado en bonos, premios, metas, incentivos, o simple decisión de LEIPEL. El que a un USUARIO se le modifique el máximo de comisión mensual, no significa que los demás suscriptores tienen el mismo derecho ni que el mismo permanecerá siempre con ese nuevo límite de comisión.
La manera de acceder a estos bonos, premios, metas o incentivos, serán publicados dentro de nuestro portal web www.leipel.com

LEIPEL procurará tener respaldo de la información de todas las redes, sin embargo, no se encuentra obligado a hacerlo.

El que  un SUSCRIPTOR sea de la primera generación de referidos de otro SUSCRIPTOR, no le impediría ser de la otra generación de otras generaciones de otros usuarios. En La red un USUARIO puede pertenecer máximo a cinco redes interconectadas, en otras palabras un USUARIO dentro de una RED puede ser comisionado máximo cinco veces por cinco personas diferentes.

Ejemplo para explicar la RED y las cinco generaciones que conforman la RED:
Poniendo como ejemplo de referencia a un SUSCRIPTOR llamado “JORGE”:
*Se considera primera generación de referidos a todas las personas que mediante los métodos de LEIPEL podemos identificar que se registraron a LEIPEL gracias a la invitación de JORGE o gracias al código de invitación de “JORGE”. 
*Se considera segunda generación de referidos a todas las personas que mediante los métodos de LEIPEL podemos identificar que se registraron a LEIPEL gracias a la invitación de algún USUARIO de la primera generación de referidos de “Jorge” o gracias al código de invitación de algún USUARIO de la primera generación de referidos de “Jorge”.
*Se considera tercera generación de referidos a todas las personas que mediante los métodos de LEIPEL podemos identificar que se registraron a LEIPEL gracias a la invitación de algún USUARIO de la segunda generación de referidos de “Jorge” o gracias al código de invitación de algún USUARIO de la segunda generación de referidos de “Jorge”.
*Se considera cuarta generación de referidos a todas las personas que mediante los métodos de LEIPEL podemos identificar que se registraron a LEIPEL gracias a la invitación de algún USUARIO de la tercera generación de referidos de “Jorge” o gracias al código de invitación de algún USUARIO de la tercera generación de referidos de “Jorge”.
*Se considera quinta generación de referidos a todas las personas que mediante los métodos de LEIPEL podemos identificar que se registraron a LEIPEL gracias a la invitación de algún USUARIO de la cuarta generación de referidos de “Jorge” o gracias al código de invitación de algún USUARIO de la cuarta generación de referidos de “Jorge”.

3.1.1.2.   RETRIBUCION ECONÓMICA PAR CUENTAS EDITOR Y EDITOR & ESPECTADOR
LEIPEL ofrece su plataforma a todas aquellas personas que actuando de manera legal y ética deseen usa LEIPEL para comercializar dichos contenidos.
Estos recibirán $0,25 ctvs. USD. (VEINTE Y CINCO CENTAVOS DE DÓLAR) por cada crédito de cada usuario consumido en sus contenidos. Este servicio de intermediación comercial no tiene costo, sin embargo, LEIPEL pudiera  descontar de los valores mencionados tasas, impuestos, costos operativos del servicio, entre otros valores estrictamente necesarios para que la labor de comercialización se haya realizado correctamente.
En estas retribuciones no existe tope máximo mensual.
A aquellos usuarios que se les facilite la cuenta EDITOR,  deberán poseer todos los permisos, licencias, derechos de autor o comercialización y demás autorizaciones para poder distribuir o comercializar los contenidos que facilitará en el portal de LEIPEL, el mismo que no está obligado a verificar dicha documentación, por lo cual el USUARIO entiende y acepta que tiene el 100% de la responsabilidad legal, civil, penal y económica por inconvenientes suscitados por la comercialización de dichos contenidos. Exime a LEIPEL de toda responsabilidad legal o moral proveniente de estos contenidos, y acepta toda la responsabilidad, incluso monetariamente, que desemboquen dichos contenidos.
Para poder retirar estos valores económicos deberá presentar los documentos legales necesarios acorde a la ley ecuatoriana para cobrar el valor monetario correspondiente. En el caso de la factura correspondiente, la misma se debe emitir de manera virtual acorde a las leyes ecuatorianas a INFORMERET S.A.(LEIPEL), entre el primer y el quinto día de cada mes. Esta factura es emitida por las ganancias obtenidas de las adquisiciones de sus contenidos de meses anteriores al mes presente en curso y emitirla a través de nuestro proveedor oficial de facturación electrónica. 

La cantidad monetaria estipulada en centavos de dólar americano por cada crédito para el editor no incluyen impuestos nacionales o internacionales, tasas, ni otros valores correspondientes a bancos o entidades financieras intermediarias, los cuales pueden llegar a ser necesarios para la cancelación de estos valores. 
El USUARIO EDITOR deberá entregar la documentación necesaria para retirar sus valores entre el día 1 y 5 día de cada mes, LEIPEL procurará gestionar y efectuar los pagos correspondientes entre el día 25 y el 30 del mes en curso, únicamente habiendo recibido la documentación necesaria dentro de las fechas mencionadas previamente. El tiempo en que el EDITOR reciba el efectivo correspondiente al pago puede variar acorde a los procesos de las entidades financieras intermediarias. En caso de atrasos deberán comunicarse con los departamentos correspondientes para dar seguimiento a su caso.

En caso de ser necesario para LEIPEL, los tres primeros paquetes de créditos adquiridos por un usuario no serán válidos como ganancia para el EDITOR.
LEIPEL podrá permitir la acumulación de las retribuciones generadas del USUARIO hasta el mes de enero de cada año, pasado este tiempo, si el USUARIO no cobra sus retribuciones, pasan a ser propiedad de LEIPEL. El suscriptor acepta esta cláusula y no podrá ejercer reclamos futuros debido a que para tal efecto, voluntariamente ha dado su consentimiento y aceptación y reconoce que las retribuciones no serán consideradas como derechos adquiridos bajo ningún concepto, siendo únicamente beneficios que LEIPEL otorga o retira a su arbitrio. 

Este beneficio que otorga LEIPEL al USUARIO no tiene el carácter de exclusiva, por lo que LEIPEL se reserva el derecho de realizar encargos similares a otras personas naturales o jurídicas. 

4.  CRÉDITOS, PAQUETES Y COSTOS.

Los créditos son la manera en que LEIPEL simplifica el comercio de sus contenidos. Un crédito es una moneda virtual que solo sirve dentro de LEIPEL, la misma tiene un valor promedio del costo de un paquete de créditos menos el IVA, dividido para el número de créditos que se entregan en dicho paquete. Un paquete es simplemente la agrupación de créditos.

Los paquetes podrían estar anclados a beneficios adicionales de LEIPEL.

Actualmente tenemos 3 tipos de paquetes de créditos:
Paquete de 15 créditos, valor $6,50 incluido IVA, cuyo beneficio es un tope de comisiones por red de hasta $500 USD
Paquete de 30 créditos, valor $12,50 incluido IVA, cuyo beneficio es un tope de comisiones por red de hasta $1000 USD
Paquete de 60 créditos, valor $25,50 incluido IVA, cuyo beneficio es un tope de comisiones por red de hasta $2000 USD

Recuerden que el beneficio de comisiones por red llega hasta un topo de máximo $2000 USD al mes, esto está anclado directamente al tipo de paquete que posea el usuario.

Los  créditos son la “moneda virtual” que se usa dentro de LEIPEL, estos créditos no son transferibles y no son reembolsables, se reciben por la adquisición de un paquete. Los créditos son válidos únicamente dentro de la plataforma de LEIPEL. 

Existen varios paquetes de créditos, los cuales se podrán observar dentro del portal de LEIPEL en la sección de MI PLAN. Aquellos paquetes que se muestren en la plataforma serán los que estén validos al momento, y el detalle oficial de cuantos créditos obtendrá y por qué valor lo podrá observar dentro del portal de LEIPEL en la sección de MI PLAN.

Estos créditos se le acreditarán a su cuenta de manera inmediata luego de haber pagado por un paquete, normalmente la acreditación de créditos es inmediata, sin embargo podría tomar hasta 48 horas posteriores al pago acorde al método de pago escogido.

Para adquirir los créditos debe tener acceso a Internet y una forma de pago admitida y válida en LEIPEL. 

En el caso de suscribirse a un paquete de créditos, se le realizará el cobro de la suscripción y la acreditación de CREDITOS cada mes, siempre y cuando no se presenten percances o inconvenientes al momento de cobrar su suscripción. El cobro de la misma continuará hasta que cancele su suscripción a un paquete o lo hagamos nosotros. Deberá estar atento a que se haga efectivo el pago de su suscripción para no perder los beneficios adicionales que podría recibir por la adquisición del mismo.
Nos reservamos el derecho a cambiar los precios de nuestro servicio o cualquier componente de la manera y en el momento que determinemos oportuno bajo nuestra única y total discreción. Salvo que se establezca lo contrario en estos Términos de Uso, cualquier cambio en el precio de nuestro servicio será efectivo una vez que se le notifique a través de nuestras páginas web y al usted continuar con la visualización del contenido acepta el cambio. Deberá estar atento a la página web y a las facturas recibidas en caso de que modifiquemos los precios. Los valores de los paquetes o de las suscripciones pueden ajustarse mensual o anualmente y de forma automática, o más frecuentemente según permita la ley.
Los créditos se consumen en orden de adquisición de los mismos y no caducan, sin embargo, en caso de tener créditos acumulados, LEIPEL podría tomar una cierta cantidad de los mismos para que al eliminarlos se nivele el costo de los mismos al precio actual de dichos créditos, acción que el USUARIO acepta y por la cual será notificado dentro de su cuenta de usuario LEIPEL.
5.  FORMAS DE PAGO
Al crearse una cuenta el LEIPEL y proporcionar o designar una forma de pago, nos autoriza a cobrarle una cuota de suscripción mensual a la tarifa vigente en ese momento, y cualquier otro cargo en el que incurra en relación con el uso que haga del servicio de LEIPEL a través de la Forma de pago que eligió. Usted reconoce que el monto facturado por mes puede variar de mes a mes por motivos que pueden incluir distintos montos debido a ofertas promocionales, códigos promocionales, compras adicionales, nuevas tasas o impuestos de ley y/o al cambio o adición de un plan; y nos autoriza a cobrar esos montos fijos o variables a través de su forma de pago, que podrían ser facturados mensualmente en uno o más cargos.
Si estuviera suscripto a un paquete de créditos de manera mensual y  desea cancelar su suscripción, usted debe cancelarla antes de la renovación mensual para evitar que se facture la cuota de membresía del mes siguiente a través de su Forma de pago, lo cual ocurre el 1er día de cada mes. También podremos cobrar automáticamente acorde a su Forma de pago en el mes corriente y nos reservamos el derecho de cambiar los tiempos de facturación. El proceso de cobro según su Forma de pago se puede ejecutar cualquier día del mes corriente. 
LOS PAGOS DEL USUARIO HACIA LEIPEL NO SON REEMBOLSABLES Y NO SE OTORGARÁN REEMBOLSOS NI TRAS UNA CANCELACIÓN a menos de que LEIPEL por voluntad propia decida lo contrario. Solo en caso de una situación muy particular, LEIPEL realizará las debidas devoluciones del efectivo menos los impuestos y tasas correspondientes y siempre y cuando el usuario no haya hecho consumo de algún servicio o beneficio de dicha situación. El usuario mientras tenga su cuenta activa continuará teniendo acceso al servicio y usar sus créditos acumulados.
El USUARIO podrá elegir y modificar la información correspondiente a su Forma de Pago deberá visitar la sección de MI PLAN en nuestro portal web www.leipel.com. 
Si el pago o cobro no se pudiera realizar satisfactoriamente, debido a la fecha de vencimiento, la falta de fondos o si usted no modifica la información de su Forma de pago o cancela su cuenta, simplemente no recibirá los créditos ni los beneficios correspondientes que pudiera tener. No existen sanciones por impuntualidad, ni cobros retrasados del servicio, simplemente si en un mes corriente no recibimos su pago, no obtiene sus créditos ni ningún servicio o beneficio adicional que pudiera haber recibido en caso de haber pagado puntualmente.
En algunas Formas de pago, el emisor de su Forma de pago podrá cobrarle un cargo por transacción transnacional o cargos relacionados. Consulte con el proveedor de servicios de su Forma de pago y con las leyes de su país que  apliquen al caso en su país para obtener más información. 
LEIPEL RECIBE ÚNICAMENTE LOS PAGOS POR SERVICIOS QUE OFRECEMOS A TRAVEZ DE LOS MÉTODOS MENCIONADOS EN NUESTRO PORTAL WEB LEIPEL.COM, ÚNICAMENTE A TRAVES DE ENTIDADES FINANCIERAS PERTINENTES HACIA NUESTRA CUENTA BANCARIA BAJO EL NOMBRE DE INFORMERET S.A. QUE ES LA RAZON SOCIAL DE LEIPEL.
Los métodos de pago oficiales de LEIPEL usted los podrá encontrar dentro de nuestro portal web Leipel.com
Al momento existen dos métodos de pago por los servicios de LEIPEL:

PAGO EN EFECTIVO; puede pagar sus paquetes o suscripciones en Servipagos o Produbanco dentro de territorio Ecuatoriano, siempre y cuando este método de pago se encuentre activo en el portal web.
PAGO POR TARJETA; en nuestro portal web se indicará los métodos con los cuales aceptamos pagos con tarjeta. La responsabilidad de cada transacción es de las empresas que estén brindando el servicio a LEIPEL en ese momento.
Debe ser muy cauteloso con las comunicaciones en las que se le solicite su tarjeta de crédito u otra información de su cuenta. Acceda siempre a su información confidencial de cuenta directamente a través del sitio web de LEIPEL y nunca a través de un hipervínculo en un email ni ningún otro tipo de comunicación, aunque parezca oficial. LEIPEL se reserva el derecho de suspender una cuenta en cualquier momento, con o sin aviso al miembro, con el fin de protegerse y proteger a sus socios ante lo que considera que puede constituir una actividad fraudulenta. LEIPEL no está obligada a otorgar créditos ni descuentos, ni compensaciones por  suspensiones de cuentas o cuentas realizadas por alguna personas que no fuera en efecto a quien pertenecen los datos de la cuenta. 
En caso de haber nuevas maneras de pago lo indicaremos únicamente a través de nuestra página web.

6.  SOFTWARE

La calidad de la imagen del contenido transmitido por Internet puede variar de computadora a computadora, de dispositivo a dispositivo y puede verse afectada por diversos factores, tales como su ubicación, el ancho de banda disponible o la velocidad de su conexión a Internet. La disponibilidad del contenido en alta definición (HD/UHD) depende de su proveedor de servicios de Internet y del dispositivo en uso. Todos los cargos de acceso a Internet correrán por su cuenta. Solicite a su proveedor de Internet información acerca de los posibles cargos de consumo de datos por uso de Internet. LEIPEL no presta ninguna declaración ni garantía con respecto a la calidad de su experiencia de ver en su pantalla. El tiempo que lleva comenzar a ver el contenido variará según diversos factores, incluido el lugar donde se encuentra, el ancho de banda disponible en ese momento, el contenido que seleccione y la configuración de su dispositivo listo para LEIPEL.

Actualizamos el servicio de LEIPEL continuamente, incluido su catálogo de contenido. Además, probamos regularmente varios aspectos de nuestro servicio, incluidos el sitio web, las interfaces de usuario, los niveles de servicio, los planes, las funciones promocionales, la disponibilidad de películas y series, la entrega y los precios. Al usar nuestro servicio usted acepta que nosotros podemos, incluirlo o excluirlo de esas pruebas sin aviso. Nos reservamos el derecho de, a nuestra única y total discreción, modificar la forma en que ofrecemos el servicio y su funcionamiento de vez en cuando y sin aviso.

El software de transmisión de LEIPEL es desarrollado por LEIPEL a pedido de este, y fue diseñado para permitir la transmisión de contenidos desde LEIPEL hacia dispositivos listos para LEIPEL. Este software puede variar según el dispositivo y el medio, y las funcionalidades también pueden diferir según el dispositivo. AL UTILIZAR NUESTRO SERVICIO, RECONOCE, ACUERDA Y ACEPTA NUESTRO TERMINOS Y CONDICIONES DE USO Y A RECIBIR, SIN MÁS AVISO O NOTIFICACIÓN, LAS VERSIONES ACTUALIZADAS DEL SOFTWARE DE INFORMERET Y DE TERCEROS RELACIONADOS. SI NO ACEPTA LOS TÉRMINOS Y CONDICIONES DE USO, NO UTILICE NUESTRO SERVICIO. NO ASUMIMOS NINGUNA RESPONSABILIDAD NI GARANTIZAMOS EL RENDIMIENTO DE ESTOS DISPOSITIVOS, NI LA COMPATIBILIDAD CON NUESTRO SERVICIO. 

Al utilizar nuestro servicio, acuerda recurrir únicamente al fabricante o al vendedor del dispositivo si tiene algún inconveniente con el dispositivo o con su compatibilidad con el servicio de LEIPEL. En el caso de extravío o robo de su dispositivo listo para LEIPEL, desactívelo. Si no cierra sesión o no desactiva el dispositivo, los usuarios posteriores podrán acceder al servicio de LEIPEL a través de su cuenta y pueden llegar a acceder a alguna información de su cuenta. 
Los USUARIOS mayores de edad pueden limitar el nivel de los contenidos que pueden ver sus representados legales menores de edad, únicamente bajo sus advertencias verbales. LEIPEL tratará de diseñar restricciones por medio de la plataforma virtual para salvaguardar usuarios menores de edad no identificados, sin embargo no es nuestra responsabilidad en caso de inconvenientes ya que todo menor de edad debe ingresar únicamente bajo la autorización de su representante legal. 

Aplicaciones. Usted puede encontrar aplicaciones de terceros (incluidas, a modo meramente enunciativo, sitios web, widgets, software u otros productos de software) ("Aplicaciones") que interactúan con el servicio de LEIPEL. Estas Aplicaciones pueden importar datos relacionados con su cuenta de LEIPEL y la actividad, y también obtener datos acerca de usted. Estas Aplicaciones se proveen solo en su beneficio y LEIPEL no es responsable de dichas Aplicaciones. ESTAS APLICACIONES SON DE PROPIEDAD DE O MANEJADAS POR TERCEROS QUE NO ESTÁN RELACIONADOS O PATROCINADOS POR LEIPEL, Y ES POSIBLE QUE SU USO NO ESTÉ AUTORIZADO CON NUESTRO SERVICIO EN TODOS LOS PAÍSES. EL USO DE UNA APLICACIÓN ES POR ELECCIÓN SUYA Y A SU PROPIO RIESGO.


7.  COMUNICACIÓN

Al utilizar el servicio de LEIPEL, acepta recibir algunas comunicaciones electrónicas enviadas por LEIPEL acerca de su cuenta y otros asuntos. Estas comunicaciones pueden incluir el envío de mensajes a la dirección de email que indicó durante el registro, o dentro de cualquier sección dentro de www.leipel.com que incluirán avisos acerca de su cuenta (ejm., autorizaciones de pago, cambio de contraseña o de forma de pago, emails de confirmación y otra información relativa a las transacciones, promociones, publicidad) que forman parte de su relación con LEIPEL. Debe guardar copias de las comunicaciones electrónicas guardando una copia electrónica. También acepta recibir algunas comunicaciones de nuestra parte, como avisos acerca de las nuevas características de LEIPEL, ofertas especiales, anuncios promocionales y encuestas de clientes por email o por otra vía. 
Uso de la información entregada;
LEIPEL tiene derecho a utilizar cualquier comentario, información, ideas, conceptos, reseñas o técnicas o cualquier otro material contenido en cualquier comunicación que nos envíe ("Devolución"), incluidas las respuestas a los cuestionarios o publicaciones a través del servicio de LEIPEL, incluido el servicio de LEIPEL y las interfaces de usuario, sin contraprestación, reconocimiento o pago de ningún tipo, con cualquier fin, tales como el desarrollo, la fabricación y comercialización de productos y la creación, modificación o mejora del servicio de LEIPEL. Además, acepta no aplicar ninguna "norma moral" en y a la Devolución en la medida que lo permita la ley vigente. Tenga en cuenta que LEIPEL no acepta materiales ni ideas no solicitados para sus contenidos, y no es responsable por la similitud entre los contenidos o programación de cualquier medio con los materiales o ideas transmitidos por LEIPEL. Si decide enviar cualquier material o idea no solicitado, lo hace bajo el entendido de que no recibirá ninguna contraprestación de ningún tipo y renuncia a cualquier acción contra LEIPEL o sus empresas vinculadas respecto del uso de esos materiales e ideas, incluso si el material o idea utilizado es significativamente similar al material o a la idea que usted presentó.

8.  CAMBIOS EN LOS TÉRMINOS Y CONDICIONES DE USO DE LEIPEL
Los Términos y condiciones de uso de LEIPEL pueden cambiar de vez en cuando, de la misma manera todo lo que incluye (previa notificación y aceptación expresa o tácita utilizando los servicios de LEIPEL - por parte del usuario). Dichos cambios podrían hacerse efectivos inmediatamente; sin embargo, para los miembros actuales, dichas revisiones serán, salvo que se indique lo contrario, efectivas a partir del primer día del mes del mes posterior de su publicación. Intentaremos guarda las versiones anteriores de los Términos condiciones de uso, sin embargo es su responsabilidad guardar una copia cada vez que notifiquemos una modificación en los mismos.

9.  LEGAL, JURISDICCION Y COMPETENCIA

Este contrato se rige por la legislación ecuatoriana. Para el caso de controversias en relación a su aplicación o interpretación los comparecientes renuncian fuero y/o domicilio y se sujetan a la ley de arbitraje y mediación y en particular al pronunciamiento de los Señores árbitros del centro de arbitraje y mediación de la Cámara de Comercio de Guayaquil. 

El USUARIO por ningún motivo podrá presentarse como empleado, o atribuirse facultades de representación de LEIPEL, por lo que no será posible considerar al suscriptor, como apoderado, comisionista, dependiente o en relación de dependencia de LEIPEL. En consecuencia, ninguna de las partes tendrá obligación alguna por cuenta y nombre de la otra, ni como representante o agente de la otra.
a) El USUARIO no se encuentra sujeto a horario alguno bajo ningún concepto, ni estará subordinado a instrucciones ni órdenes del personal dependiente de LEIPEL, ni deberá rendir cuentas de sus actividades a los mismos, excepto de aquellas que se requieran por la naturaleza del presente contrato.

En lo que no se contempla en este contrato, las partes expresamente se someten a las disposiciones del Código de Comercio, a las del Código Civil y demás leyes de la república.

CON RESPECTO A SUSCRIPTORES EXTRANJEROS: SI ES RESIDENTE EN OTRO PAÍS QUE NO SEA ECUADOR, ESTOS TÉRMINOS DE USO SE REGIRÁN E INTERPRETARÁN DE CONFORMIDAD CON LAS LEYES ECUATORIANAS, YA QUE ESTÁ USANDO UN SERVICIO DE NACIONALIDAD ECUATORIANA A TRAVEZ DE UNA CONECCIÓN DE INTERNET. SI NO ESTÁ DE ACUERDO CON ESTE PUNTO, EN CASO DE SER EXTRANJERO, NO USE EL SERVICIO DE LEIPEL.
Acuerdo de arbitraje: Si es suscriptor de LEIPEL en Ecuador (incluidas sus posesiones y territorios), El usuario y LEIPEL acuerdan que cualquier diferencia, reclamo o controversia que surgiera del servicio de LECSU, los presentes Términos y condiciones de uso de LEIPEL se resolverán determinando por la vía de arbitraje de derecho de la cámara de Comercio de Guayaquil, de conformidad con el Reglamento de dicho centro de Arbitraje. El arbitraje recurre a un árbitro imparcial en lugar de un juez o jurados, permite un período de instrucción más breve que el tribunal y está sujeto a revisión muy limitada por parte del tribunal. Los árbitros pueden ordenar el pago de daños y perjuicios y el mismo resarcimiento que un tribunal. La cláusula de arbitraje permanecerá vigente luego de la extinción de este Contrato y de la finalización de su membresía LEIPEL.
USTED Y LEIPEL ACUERDAN QUE CADA UNO DE ELLOS PRESENTARÁ RECLAMOS CONTRA LA OTRA PARTE SOLO EN NOMBRE PROPIO, Y NO COMO ACTORA O PARTE DE UN GRUPO EN UNA ACCIÓN COLECTIVA O REPRESENTATIVA. 
Asimismo, salvo que usted y LEIPEL acuerden lo contrario, el árbitro no podrá acumular las causas de más de una persona con su causa ni podrá entender en ninguna acción representativa o colectiva. 
9.1.   Propiedad Intelectual: Derechos de autor: Todos los contenidos del servicio de LEIPEL, está  protegido por las leyes de derechos de autor de los respectivos dueños de los contenidos.
Marca: La marca LEIPEL y el servicio de LEIPEL, están registrados como propiedad de INFORMERET S.A.
Reclamos por violación de derechos de autor: Si considera que su obra se ha reproducido o distribuido de forma tal que constituye una falta de observancia de los derechos de autor o sabe que existe material que no respeta los derechos de autor disponible a través del servicio de LEIPEL, vía correo electrónico a info@leipel.com

10. EXCLUSIÓN DE GARANTÍAS Y LIMITACIONES A LA RESPONSABILIDAD
EL SERVICIO DE LEIPEL Y TODOS LOS CONTENIDOS Y EL SOFTWARE ASOCIADO O CUALQUIER OTRA CARACTERÍSTICA O FUNCIONALIDAD DEL SERVICIO DE LEIPEL SE OFRECEN "EN EL ESTADO EN QUE SE ENCUENTRAN", CON TODAS SUS FALLAS Y SIN GARANTÍAS DE NINGÚN TIPO. LEIPEL NO MANIFIESTA, DECLARA NI GARANTIZA QUE PODRÁ UTILIZAR EL SERVICIO DE LEIPEL SIN INTERRUPCIONES O SIN ERRORES. LEIPEL MANIFIESTA EXPRESAMENTE QUE NO ASUME RESPONSABILIDAD ALGUNA POR EL USO DE LAS APLICACIONES, LOS DISPOSITIVOS LISTOS PARA LEIPEL Y EL SOFTWARE DE LEIPEL (ENTRE OTRAS COSAS, RESPECTO DE LA COMPATIBILIDAD CON NUESTRO SERVICIO).
EN LA MEDIDA QUE SEA PERMITIDO POR LAS LEYES APLICABLES, EN NINGÚN CASO LEIPEL, SUS SUBSIDIARIAS Y SUS ACCIONISTAS, DIRECTORES, EJECUTIVOS, EMPLEADOS O LICENCIANTES SERÁN RESPONSABLES (EN FORMA INDIVIDUAL O EN SU CONJUNTO) ANTE EL USUARIO POR LOS DAÑOS PERSONALES O POR CUALQUIER DAÑO ESPECIAL, INCIDENTAL, INDIRECTO O REMOTOS, O CUALQUIER DAÑO QUE SURGIERA.
ALGUNAS JURISDICCIONES NO PERMITEN LA EXCLUSIÓN DE CIERTAS GARANTÍAS O LA LIMITACIÓN O EXCLUSIÓN DE LA RESPONSABILIDAD DE CIERTOS TIPOS DE DAÑOS. POR LO TANTO ALGUNAS DE LAS LIMITACIONES MENCIONADAS EN ESTA SECCIÓN PODRÍAN NO AFECTARLE A USTED.
NADA EN ESTOS TÉRMINOS AFECTARÁ DERECHOS ESTATUTARIOS E IRRENUNCIABLES QUE LE CORRESPONDAN. Si alguna de las disposiciones de estos Términos de uso es declarada nula, ilegal o inaplicable, la validez, legalidad y aplicación de las restantes disposiciones continuarán en plena vigencia.

11. CANCELACIÓN DE LA CUENTA

El cliente podrá suspender su cuenta en cualquier momento, sin embargo al hacerlo perderá automáticamente cualquier beneficio ganado o acumulado o por percibir por parte de LEIPEL. Además, luego de anular su cuenta, el cliente podría suscribirse nuevamente pero únicamente como un usuario totalmente nuevo.
El presente contrato también podrá terminar anticipadamente en los siguientes casos:
a) Por disolución de la empresa LEIPEL. 
b) Por decisión de LEIPEL o del USUARIO. 
c) Si el USUARIO hace uso de sus beneficios de una manera no estipulada en el Manual del Suscriptor o mediante informaciones falsas, incompletas, engañosas o realice prácticas prohibidas en la ley orgánica de Defensa del Consumidor. 
d) Si el USUARIO hubiere cedido total o parcialmente los derechos y obligaciones emanados de este contrato, sin contar con la con la autorización previa y escrita de LEIPEL. 
e) En caso de incumplimiento a estos Términos y Condiciones de Uso.
f) Por muerte del USUARIO LEIPEL puede dar por terminado el contrato de manera inmediata, sin necesidad de declaración judicial.
En caso de anulación del contrato, se suspenderán inmediatamente los servicios y beneficios del SUSCRIPTOR y en caso de que el suscriptor haya realizado pagos de mensualidades por adelantado, estas USUARIO devueltas a los correspondientes Apoderados Legales.
HE LEIDO TODO, HE VISTO LAS FORMAS DE ´PAGOS, ME HAS DICHO QUE LOS RUBROS LLEGAN A TU CUENTA, POR LO TANTO HARIAMOS UN CONVENIO ENTRE TU Y  YO ACA EN QUITO,  POR OTRO LADO YO SOY PARTE DE UNA SOCIEDAD DE GESTIÓN, EGEDA (PUEDES VER EN GOOGLE) A MI SE ME OCURRE CREAR UNA PLATAFORMA  MAS GRANDE DE TODAS LAS PRODUCCIONES NACIONALES, TENGO CONTACTOS QUE SABEN MANEJAR EL ASUNTO EMPRESARIAL (ESTA PERSONA ERA DE EGEDA Y SE SABE EL TEJE Y MANEJE DE ESTA VUELTA, POR OTRO LADO YO TENGO CONTACTO CON TODO EL SECTOR AUDIOVISUAL DEL PAIS Y OTROS PAISES DE LATINOAMERICA, TODO ESTE MATERIAL PODRIA IR A LEIPEL, ELPUNTO ES QUE TODO MUNDO BUSCA DINERO, SI A MI ME DA REDITOS ECONOMICOS AUTOMATICAMENTE MUCHOS SE ACERCARIAN A MI AL MOMENTO QUE YO LES EXPONGO EL PLAN, PARA ESO HARIAMOS CONVOCATORIAS EN QUITO, GUAYAS, MANABI, CUENCA, CENTRO DELA SIERRA Y TENDRIAMOS FULLLLL MATERIAL AUDIVISUAL, CUANDO NOS VEAMOS TE CONTARÉ COMO FUNCIONA EGEDA EN CUANTO A PAGOS ANUALES A LOS PRODUCTORES, HAZME ACUERDO DE ESO. EN ESTE CASO POR SER VIRTUAL SE AHOORARIAN MUCHOS GASTOS Y CON POCOS PODRIAMOS MANEJAR ESTO, EGEDA EN SU CASO SE MANEJA ENTRE VIRTUAL Y FISICO, PERO LO FISICO LE DEMANDA FUL GASTOS, OFICINAS, EMPLEADOS Y BLA BLA, RECOJE 600.000 AL AÑO Y GASTA 400.000, LE SOBRA 200.000 Y ESO LO DISTRIBUYE ENTRE LOS PRODUCTORES NACIONALES E INTERANCIONALES, EN FIN, ACA SE PORIA HACER UNA COSA DEMENCIAL SIN TANTOS GASTOS Y CON POCOS SOLDADOS QUE LA TENGAN CLARA Y APORTEN DE VERDAD. YO CUENTO CON TRES COSAS MUY IMPORTANTES... MANEJO ELSECTOR Y CONTACTOS , EN LA PARTE LEGAL ESTOY METIDO HASTA EL ALMA, Y EN LA PARTE CONTABLE EXISTE ALGUIEN QUE SABE COMO SE MANEJAN LAS SOCIEDADES DE GESTIÓN, CLARO QUE EN ESTE PUNTO SERIA FULLLL VIRTUAL.)




Última actualización al 18 de julio del 2017
        </textarea>
    </div>
</div>


{{--Pie de pagina--}}
<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <div class="col l3 s12">
                <h5 class="white-text">Leipel</h5>
                <p class="grey-text text-lighten-4">Red social de entretenimiento: Cine, música, lectura, radio y tv</p>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">place</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        Guayaquil, Ecuador
                    </div>
                </div>
                <div class="row">
                    <div class="col s2 m2 l2 xl2 ">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="col s10 m10 l10 xl10 ">
                        info@leipel.com
                    </div>
                </div>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Sobre</h5>
                <ul>
                    <li><a class="white-text" href="{{route('queEsLeipel')}}">¿Qué es Leipel?</a></li>
                    <li><a class="white-text" href="{{route('terminosCondiciones')}}">Términos y Condiciones</a></li>
                    <li><a class="white-text modal-trigger" href="#modal2">Regístrate</a></li>
                    <li><a class="white-text" href="#!">Beneficios adicionales</a></li>
                    <li><a class="white-text" href="#!">Contactos</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Descubrir</h5>
                <ul>
                    <li><a class="white-text modal-trigger" href="#modal1">Cine</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Música</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Lectura</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">Radio</a></li>
                    <li><a class="white-text modal-trigger" href="#modal1">TV</a></li>
                </ul>
            </div>
            <div class="col l3 s12">
                <h5 class="white-text">Social</h5>
                <ul>
                    <li><a class="waves-effect waves-light curvaBoton btn red left" target="_blank" href="https://www.youtube.com/channel/UCYrCIhTIGITrGLaKW0f1A2Q">
                            <i class="fa fa-youtube"></i> &nbsp;YouTube&nbsp;&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    <li><a class="waves-effect waves-light btn curvaBoton blue darken-4 left" target="_blank" href="https://www.facebook.com/LEIPELoficial/">
                            <i class="fa fa-facebook"></i> &nbsp;Facebook&nbsp;&nbsp;&nbsp;</a><br>&nbsp;</li>
                    {{--<li><a class="waves-effect waves-light btn purple darken-4 left">--}}
                    {{--<i class="fa fa-instagram"></i> &nbsp;Instagram</a><br>&nbsp;</li>--}}
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container center">
            Copyright © 2018 Todos lo derechos reservados
        </div>
    </div>
</footer>

<!--Modales para index -->
<!--<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>-->

<!-- Modal inicio de sesion -->
<div id="modal1" class="modal">
    <div class="modal-content center blue-text">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s6">
                        <a href="#usuario"><i class="material-icons prefix">face</i><b> Usuario</b></a>
                    </li>
                    <li class="tab col s6">
                        <a href="#proveedor"><i class="material-icons prefix">store</i><b> Proveedor</b></a>
                    </li>

                </ul>
            </div>
        </div>

        {{--Modal innicio de sesion usuario--}}
        <div id="usuario" class="col s12 center">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="text" id="email" name="email" class="autocomplete" value="{{ old('email') }}" required autofocus>
                        <label  for="email">Correo</label>
                        <div id="emailMen" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                            <strong class="red-text">{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input id="password" type="password" name="password" class="autocomplete" value="{{ old('password') }}" required autofocus>
                        <label for="password">Contraseña</label>
                        <div id="passwordMen" ></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="input-field col s12">

                        <button class="btn waves-effect curvaBoton waves-light green" id="iniciar" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="{{ url('/password/reset') }}">
                            Olvide mi contraseña
                        </a>
                    </div>
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light btn curvaBoton social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                        </a>
                    </div>
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light curvaBoton btn blue darken-4 social facebook left" href="login/facebook">
                            <i class="fa fa-facebook"></i> Facebook</a><br>
                    </div>
                    <div class="col s12 center">Inicio de sesión con redes sociales</div>
                </div>
            </form>
        </div>
        {{--Modal inicio de sesion proveedor--}}
        <div id="proveedor" class="col s12 center">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_login') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="text" id="emailP" name="email" class="autocomplete" value="{{ old('email') }}" required autofocus>
                        <label for="emailP">Correo</label>
                        <div id="emailMenP" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block red-text" >
                                            <strong >{{ $errors->first('email') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" id="passwordP" class="autocomplete" name="password" required>
                        <label for="passwordP">Contraseña</label>
                        <div id="passwordMenP" style="margin-top: 1%" ></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                            <strong class="text-red">{{ $errors->first('password') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect curvaBoton waves-light green" id="iniciarP" type="submit" name="action">Iniciar sesión
                            <i class="material-icons right">send</i>
                        </button><br>
                        <a class="blue-text" href="#">Olvide mi contraseña </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!--Fin modal inicio de sesnion-->

<!-- Modal Registro -->
<div id="modal2" class="modal">
    <div class="modal-content center blue-text">
        <div class="row">
            <ul class="tabs">
                <li class="tab col s6"><a href="#usuario1" class="active"><i class="material-icons prefix">face</i><b> Usuario</b></a></li>
                <li class="tab col s6"><a href="#proveedor1"><i class="material-icons prefix">store</i><b> Proveedor</b></a></li>
            </ul>
        </div>
        {{--registro usuario--}}
        <div id="usuario1" class="col s12 center">
            <div class="row">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                    {{ csrf_field() }}
                    <input type="hidden" id="enlace" name="enlace">
                    <div class="input-field col s12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">face</i>
                        <input type="text" class="autocomplete" name="name" id="name" value="{{ old('name') }}" required="required">
                        <label for="name">Nombre</label>
                        <div id="nameMen" style="margin-top: 1%"></div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRU" name="email" class="autocomplete" required="required">
                        <label for="emailRU">Correo</label>
                        <div id="emailMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password" id="passwordRU" class="autocomplete" required="required">
                        <label for="passwordRU">Contraseña</label>
                        <div id="passwordMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">vpn_key</i>
                        <input type="password" name="password_confirm" id="password_confirm" class="autocomplete" required="required">
                        <label for="password_confirm">Repetir Contraseña</label>
                        <div id="passwordCMenRU" style="margin-top: 1%"></div>
                        @if ($errors->has('password_confirm'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div>
                        <label>
                            <input type="checkbox" name="terminosCondiciones" checked="checked" required="required" id="terminosCondiciones">
                            <span>He leído y acepto los </span> <a href="{{route('terminosCondiciones')}}" target="_blank">Términos y Condiciones</a>.
                        </label>
                    </div>

                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light curvaBoton green" id="registroRU" type="submit" name="action">Registrarse
                            <i class="material-icons right">send</i>
                        </button><br>
                    </div>
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light curvaBoton btn social google red right" href="login/google">
                            <i class="fa fa-google"></i> Google</a><br><br>
                    </div>
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light btn curvaBoton blue darken-4 social facebook left" href="login/facebook">
                            <i class="fa fa-facebook"></i> Facebook</a><br>
                    </div>
                    <div class="col s12 center">Inicio de sesión con redes sociales</div>
                </form>
            </div>
        </div>
        {{--registro proveedor--}}
        <div id="proveedor1" class="col s12 center">
            <form class="form-horizontal" id="formRP">
                {{ csrf_field() }}
                @include('flash::message')
                <div class="row">
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">store</i>
                        <input name="com_name" id="com_name"type="text" id="autocomplete-input10" class="autocomplete" required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+">
                        <label for="com_name">Nombre comercial</label>
                        <div id="mensajeNombreComercial" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('com_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">person</i>
                        <input type="text" id="contact_name" class="autocomplete" name="contact_name"
                               required="required" onkeypress="return controltagLet(event)" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+">
                        <label for="contact_name">Nombre de contacto</label>
                        <div id="mensajeNombreContacto" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                <strong>{{ $errors->first('contact_name') }}</strong>
                           </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('tlf') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">phone</i>
                        <input type="text"  id="tlf" name="tlf"  value="{{ old('tlf') }}" required="required" class="autocomplete" onkeypress="return controltagNum(event)" pattern="[0-9]+">
                        <label for="tlf">Teléfono</label>
                        <div id="mensajeTelefono" style="margin-top: 1%"></div>
                        @if ($errors->has('tlf'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('tlf') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12 {{ $errors->has('description') ? ' has-error' : '' }}">
                        <i class="material-icons prefix blue-text">assignment</i>
                        <input type="text" id="description" name="description" required="required" class="autocomplete">
                        <label for="description-input14">Descripción</label>
                        @if ($errors->has('description'))
                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                        @endif
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix blue-text">email</i>
                        <input type="email" id="emailRP" name="email" required="required" class="autocomplete" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                        <label for="autocomplete-input9">Correo</label>
                        <div id="mensajeCorreo" style="margin-top: 1%"></div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col s11 right">
                        <select name="content_type" id="content_type" required="required">
                            <option value="" disabled selected>Tipo de contenido</option>
                            <option value="Cine">Cine</option>
                            <option value="Musica">Música</option>
                            <option value="Libros">Lectura</option>
                            <option value="Radio">Radio</option>
                            <option value="Tv">Tv</option>
                        </select>
                    </div>
                    <div class="col s11 right" id="subMenuMusica">
                        <br>
                        <select name="sub_desired_musica" id="sub_desired1" class="form-control">
                            <option value="Artista">Artista</option>
                            <option value="Productora">Productora</option>
                        </select>
                    </div>
                    <div class="col s11 right" id="subMenuLibro">
                        <br>
                        <select name="sub_desired_libros" id="sub_desired2" class="form-control">
                            <option value="Escritor">Escritor</option>
                            <option value="Editorial">Editorial</option>
                        </select>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light curvaBoton green" id="registroRP" type="submit" >Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<!--Fin modal inicio de registro-->


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
<script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
<script src="{{asset('js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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


        /*==========  Featured Cars  ==========*/
        $('#featured-cars').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
        $('#featured').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        $('#featured-cars-three').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        $('#featured1').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            rtl:false,
            margin:10,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        //Mostarar contenidos seleccionados
        $('#radio').css("background-color","#42a5f5");
        $('#Tvs').hide();
        $('#peliculas').hide();
        $('#libros').hide();

        $('#radio').click(function(){
            $('#radio').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#tv').css("background-color","#2196F3");
            $('#Tvs').hide();
            $('#libros').hide();
            $('#radios').show();
        });

        $('#tv').click(function(){
            $('#tv').css("background-color","#42a5f5");
            $('#cine').css("background-color","#2196F3");
            $('#musica').css("background-color","#2196F3");
            $('#libro').css("background-color","#2196F3");
            $('#radio').css("background-color","#2196F3");
            $('#radios').hide();
            $('#libros').hide();
            $('#Tvs').show();
        });

//        $('#libro').click(function(){
//            $('#libro').css("background-color","#42a5f5");
//            $('#cine').css("background-color","#2196F3");
//            $('#musica').css("background-color","#2196F3");
//            $('#tv').css("background-color","#2196F3");
//            $('#radio').css("background-color","#2196F3");
//            $('#radios').hide();
//            $('#Tvs').hide();
//            $('#libros').show();
//        });


        $("#formRP").on('submit',function(e){
            var url = "{{ url('ApplysSubmit') }}";
            e.preventDefault();
            var gif = "{{ asset('/sistem_images/loading.gif') }}";
            swal({
                title: "Procesando la información",
                text: "Espere mientras se procesa la información.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
            });
            $.ajax({
                url: url,
                type: 'POST',
                data: $("#formRP").serialize(),
                success: function (result) {
                    console.log(result);
                    swal("Su solicitud está siendo procesada","","success")
                        .then((recarga) => {
                            location.reload();
                        });
                },
                error: function (result) {
                    console.log(result);
                    swal('Existe un Error en su Solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                }
            });
        });

    });

    function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }

    //---------------------Validacion registros----------------------------------
    $("#emailRP").on('keyup change',function(){
        var email_data = $("#emailRP").val();
        $.ajax({
            url: 'RegisterEmailSeller',
            type: 'POST',
            data:{
                _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                if (result == 1)
                {
                    $('#mensajeCorreo').hide();
                    $('#registroRP').attr('disabled',false);
                    return true;
                }
                else
                {
                    $('#mensajeCorreo').show();
                    $('#mensajeCorreo').text('Este email ya se encuentra regitrado');
                    $('#mensajeCorreo').css('font-size','60%');
                    $('#mensajeCorreo').css('color','red');
                    $('#registroRP').attr('disabled',true);
                    console.log(result);
                }
            }
        });
    });

    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#tlf').keyup(function (evento) {
            var telefono = $('#tlf').val();
            numeroPalabras = telefono.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeTelefono').css('color', 'red');
                $('#mensajeTelefono').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            if (numeroPalabras < 9) {
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('Minimo 9 numeros');
                $('#mensajeTelefono').css('color', 'red');
                $('#mensajeTelefono').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            else {
                $('#mensajeTelefono').hide();
                var nameC = $('#com_name').val().trim();
                var email = $('#emailRP').val().trim();
                var name = $('#contact_name').val().trim();
                if (email.length!=0 || nameC.length !=0 || name.length!=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });

    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#contact_name').keyup(function (evento) {
            var nombreCotacto = $('#contact_name').val();
            numeroPalabras = nombreCotacto.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeNombreContacto').show();
                $('#mensajeNombreContacto').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeNombreContacto').css('color', 'red');
                $('#mensajeNombreContacto').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            if (numeroPalabras < 3) {
                $('#mensajeNombreContacto').show();
                $('#mensajeNombreContacto').text('Minimo 3 caracteres');
                $('#mensajeNombreContacto').css('color', 'red');
                $('#mensajeNombreContacto').css('font-size','60%');
                $('#registroRP').attr('disabled', true);

            } else {
                $('#mensajeNombreContacto').hide();
                var nameC = $('#com_name').val().trim();
                var email = $('#emailRP').val().trim();
                var tlf = $('#tlf').val();
                if (email.length!=0 && nameC.length !=0 && tlf.length!=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });

    // funcion para mostrar el submenu de los modulos de libro y de musica
    $(document).ready(function () {
        $('#subMenuMusica').hide();
        $('#subMenuLibro').hide();
        $('#content_type').on('change', function () {
            if (this.value == 'Musica') {
                $('#subMenuLibro').hide();
                $('#subMenuMusica').show();
                $('#subMenuMusica').attr('required','required');
            } else if (this.value == 'Libros') {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').show();
                $('#subMenuLibro').attr('required','required');
            } else {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').hide();
            }
        });
    })
    // funcion para mostrar el submenu de los modulos de libro y de musica
    //---------------------------------------------------------------------------------------------------
    // Función que nos va a contar el número de caracteres
    $(document).ready(function () {
        var cantidadMaxima = 191;
        $('#com_name').keyup(function (evento) {
            var nombreComercial = $('#com_name').val();
            numeroPalabras = nombreComercial.length;
            if (numeroPalabras > cantidadMaxima) {
                $('#mensajeNombreComercial').show();
                $('#mensajeNombreComercial').text('La cantidad máxima de caracteres es de ' + cantidadMaxima);
                $('#mensajeNombreComercial').css('color', 'red');
                $('#mensajeNombreComercial').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            } if (numeroPalabras < 3){
                $('#mensajeNombreComercial').show();
                $('#mensajeNombreComercial').text('Minimo 3 caracteres');
                $('#mensajeNombreComercial').css('color', 'red');
                $('#mensajeNombreComercial').css('font-size','60%');
                $('#registroRP').attr('disabled', true);
            }
            else {
                $('#mensajeNombreComercial').hide();
                var email = $('#emailRP').val().trim();
                var name = $('#contact_name').val().trim();
                var tlf = $('#tlf').val();
                if (email.length !=0 || name.length !=0 || tlf.length !=0){
                    $('#registroRP').attr('disabled', false);
                }
            }
        });
    });
    $(document).ready(function(){
        var nameC = $('#com_name').val().trim();
        var email = $('#emailRP').val().trim();
        var name = $('#contact_name').val().trim();
        var tlf = $('#tlf').val();

        if (email.length==0 || name.length ==0 || nameC.length == 0 || tlf.length==0){
            $('#registroRP').attr('disabled',true);
        }
    });
    $(document).ready(function(){
        var nameC = $('#com_name').val().trim();
        var email = $('#emailRP').val().trim();
        var name = $('#contact_name').val().trim();
        var tlf = $('#tlf').val();

        if (email.length !=0 && name.length  != 0 && nameC.length !=0 && tlf.length !=0){
            $('#registroRP').attr('disabled',false);
        }
    });
    $("#emailRU").on('keyup change',function(){
        var email_data = $("#emailRU").val();
        $.ajax({
            url: 'EmailValidate',
            type: 'POST',
            data:{
                _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                if (result == 1)
                {
                    $('#emailMenRU').hide();
                    $('#registroRU').attr('disabled',false);
                    return true;
                }
                else
                {
                    $('#emailMenRU').show();
                    $('#emailMenRU').text('Este email ya se encuentra regitrado');
                    $('#emailMenRU').css('font-size','60%');
                    $('#emailMenRU').css('color','red');
                    $('#registroRU').attr('disabled',true);
                    console.log(result);
                }
            }
        });
    });

    $(document).ready(function(){

        $('#passwordRU').keyup(function(evento){
            var password = $('#passwordRU').val().trim();

            if (password.length==0) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('El campo no debe estar vacio');
                $('#passwordMenRU').css('color','red');
                $('#passwordMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            if (password.length < 5) {
                $('#passwordMenRU').show();
                $('#passwordMenRU').text('La contaseña debe tener 5 caracteres');
                $('#passwordMenRU').css('color','red');
                $('#passwordMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            else {
                $('#passwordMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#email').val().trim();
                var password1 = $('#password_confirm').val().trim();
                var valCorreo = $('#emailMenRU').is(':hidden');
                console.log(email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo);
                if ( email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo ){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    $(document).ready(function(){

        $('#password_confirm').keyup(function(evento){
            var password = $('#password_confirm').val().trim();

            if (password.length==0) {
                $('#passwordCMenRU').show();
                $('#passwordCMenRU').text('El campo no debe estar vacio');
                $('#passwordCMenRU').css('color','red');
                $('#passwordCMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            } else {
                $('#passwordMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#emailRU').val().trim();
                var password1 = $('#passwordRU').val().trim();
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && name.length  != 0 && password1.length !=0 && valCorreo){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    $(document).ready(function(){

        $('#password_confirm').keyup(function(evento){
            var password1 = $('#passwordRU').val();
            var password = $('#password_confirm').val();

            if (password != password1) {
                $('#passwordCMenRU').show();
                $('#passwordCMenRU').text('Ambas contraseña deben coincidir');
                $('#passwordCMenRU').css('color','red');
                $('#passwordCMenRU').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            } else {
                $('#passwordCMenRU').hide();
                var name = $('#name').val().trim();
                var email = $('#emailRU').val().trim();
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0 && valCorreo){
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });
    //---------VALIDACION PARA SOLO INTRODUCIR LETRAS---------------
    function controltagLet(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[AaÁáBbCcDdEeÉéFfGgHhIiÍíJjKkLlMmNnÑñOoÓóPpQqRrSsTtUuÚúVvWwXxYyZz+\s]/;// -> solo letras
        te = String.fromCharCode(tecla);
        return patron.test(te);
    }
    //---------BLOQUEAR BOTON 1----------------------
    $(document).ready(function(){
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var password1 = $('#password_confirm').val().trim();

        if (email.length==0 || name.length ==0 || password.length == 0 || password1.length==0){
            $('#registroRU').attr('disabled',true);
        }
    });
    $(document).ready(function(){
        var name = $('#name').val().trim();
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        var password1 = $('#password_confirm').val().trim();

        if (email.length !=0 && name.length  != 0 && password1.length !=0 && password.length !=0){
            $('#registroRU').attr('disabled',false);
        }
    });
    $(document).ready(function(){
        $('#name').keyup(function(evento){
            var name = $('#name').val().trim();
            console.log(name.length);
            if (name.length==0) {
                $('#nameMen').show();
                $('#nameMen').text('Campo obligatorio');
                $('#nameMen').css('color','red');
                $('#nameMen').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }
            if (name.length < 3) {
                $('#nameMen').show();
                $('#nameMen').text('Minimo 3 caracteres');
                $('#nameMen').css('color','red');
                $('#nameMen').css('font-size','60%');
                $('#registroRU').attr('disabled',true);
            }else {
                $('#nameMen').hide();
                var email = $('#email').val().trim();
                var password = $('#password').val().trim();
                var password1 = $('#password_confirm').val().trim();
                var valCorreo = $('#emailMenRU').is(':hidden');
                if (email.length !=0 && password.length  != 0 && password1.length !=0 && valCorreo) {
                    $('#registroRU').attr('disabled',false);
                }
            }
        });
    });


    //---------------------------------------------------------------------------------------------------


    //---------VALIDACION DE FORMATO DE CORREO-----------------------------------
    $(document).ready(function(){
        $('#email').keyup(function(evento){
            var email = $('#email').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#emailMen').show();
                $('#emailMen').text('Formato email incorrecto');
                $('#emailMen').css('color','red');
                $('#emailMen').css('font-size','60%');
                $('#iniciar').attr('disabled',true);
                $('#iniciar').css('background-color','')

            }else{

                return true;
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#password').keyup(function(evento){
            var password = $('#password').val().trim();

            if (password.length==0) {
                $('#passwordMen').show();
                $('#passwordMen').text('El campo no debe estar vacio');
                $('#passwordMen').css('color','red');
                $('#passwordMen').css('font-size','60%');
                $('#iniciar').attr('disabled',true);
            } else {
                $('#passwordMen').hide();
                $('#iniciar').attr('disabled',false);
            }
            var email = $('#email').val().trim();
            if (email.length !=0 && password.length !=0){
                $('#iniciar').attr('disabled',false);
            }
        });
    });
    //------------------------------------------------------------------------------------------------------
    //-------------------------------------VALICACIONES LOGIN PROMOTOR--------------------------------------
    //---------BLOQUEAR BOTON 2----------------------
    $(document).ready(function(){
        var email = $('#emailP').val().trim();
        var password = $('#passwordP').val().trim();

        if (email.length==0 || password.length ==0){
            $('#iniciarP').attr('disabled',true);
        }
    });

    //---------VALIDACION PARA QUE EL CAMPO EMAIL NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#emailP').keyup(function(evento){
            var email = $('#emailP').val().trim();

            if (email.length==0) {
                $('#emailMenP').show();
                $('#emailMenP').text('El campo no debe estar vacio');
                $('#emailMenP').css('color','red');
                $('#emailMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
                $('#iniciarP').css('background-color','')
            }else {
                $('#emailMenP').hide();
            }
            var password = $('#passwordP').val().trim();

            if (email.length !=0 && password.length !=0){
                $('#iniciarP').attr('disabled',false);
            }
        });
    });
    //---------VALIDACION DE FORMATO DE CORREO-----------------------------------
    $(document).ready(function(){
        $('#emailP').keyup(function(evento){
            var email = $('#emailP').val();
            var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

            if (caract.test(email) == false){

                $('#emailMenP').show();
                $('#emailMenP').text('Formato email incorrecto');
                $('#emailMenP').css('color','red');
                $('#emailMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
                $('#iniciarP').css('background-color','')

            }else{

                return true;
            }
        });
    });
    //---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
    $(document).ready(function(){

        $('#passwordP').keyup(function(evento){
            var password = $('#passwordP').val().trim();

            if (password.length==0) {
                $('#passwordMenP').show();
                $('#passwordMenP').text('El campo no debe estar vacio');
                $('#passwordMenP').css('color','red');
                $('#passwordMenP').css('font-size','60%');
                $('#iniciarP').attr('disabled',true);
            } else {
                $('#emailMenP').hide();
                $('#iniciarP').attr('disabled',false);
            }
            var email = $('#emailP').val().trim();
            if (email.length !=0 && password.length !=0){
                $('#iniciarP').attr('disabled',false);
            }
        });
    });
</script>

@if (count($errors) > 0)
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="{{asset('plugins/materialize_index/js/materialize.js') }}"></script>
    <script src="{{asset('plugins/materialize_index/js/init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#modal1').modal('open');
        });
    </script>
    @endif

    </body>
</html>
