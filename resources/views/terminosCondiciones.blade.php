<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/LTE/thema/dist/css/AdminLTE.min.css') }}">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Leipel') }}</title>

    <!-- Styles -->
    {{--<link href="/css/app.css" rel="stylesheet">--}}
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

    {{--    <link rel="stylesheet" href="{{ asset('plugins/bootstrapV3.3/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('plugins/index/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/index/css/content1.css') }}">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('plugins/LTE/thema/font-awesome/css/font-awesome.min.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>


</head>
<body>

<!-- NAVBAR STAR-->

{{--<div class="main-navigation navbar">--}}
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{Request::url()}}">
                <img id="logo" src="{{asset('plugins/img/Logo-Leipel.png')}}">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                {{--<li class="active"><a href="{{Request::url()}}">Inicio</a></li>--}}
                <li><a href="#leipel">¿QUE ES LEIPEL?</a></li>
                @if (Auth::guest())
                    <li><a href="#modal-login" data-toggle="modal" data-target="#modal-login">INICIAR SESION</a></li>
                    <li><a href="#modal-register" data-toggle="modal" data-target="#modal-register">REGRISTRATE</a></li>
                @endif              
            </ul>
        </div>
    </div>
</nav>


<div class="col-md-12 col-sm-12 ">
              <div  style="margin-left: 5%; margin-right: 5%" class="text-center ">
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

<!--FOOTER STAR -->

<footer class="footer">
    <div class="row col-md-12" id="leipel">
        <div class="col-md-3">
            <h1>
                <img src="{{asset('plugins/img/Logo-Leipel.png')}}" id="logo">
            </h1>
            <p class="text-left">
                Red social de entretenimiento: Cine, m&uacute;sica, lectura, radio y tv
            </p>
            <br/>
            <ul id="list">
                <li class="lista">
                    <i class="fa fa-map-marker text-info "></i>
                    &nbsp;&nbsp;&nbsp;Guayaquil, Ecuador
                </li>
                <li class="lista">
                    <i class="fa fa-phone text-info "></i>
                    &nbsp;&nbsp;+123 4567 987
                </li>
                <li class="lista">
                    <i class="fa fa-envelope-o text-info"></i>
                    info@leipel.com
                </li>
            </ul>
        </div>
        <div class="col-md-3" id="sobre">
            <h1>Sobre</h1>
            <ul class="pages">
                <li><a href="#">¿Que es Leipel?</a></li>
                <br>
                <li><a href="#">Terminos y condiciones</a></li>
                <br>
                <li><a href="#">Reg&iacute;strate</a></li>
                <br>
                <li><a href="#">Beneficios adicionales</a></li>
                <br>
                <li><a href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="col-md-3" id="descubrir">
            <h1> Descubrir</h1>
            <ul class="list">
                <li><a href="#">Cine</a></li>
                <br>
                <li><a href="#">M&uacute;sica</a></li>
                <br>
                <li><a href="#">Lectura</a></li>
                <br>
                <li><a href="#">Radio</a></li>
                <br>                
                <li><a href="#">Tv</a></li>
            </ul>
        </div>
        <div class="col-md-3" id="social">
            <h1>Social</h1>
            <ul id=>
                <li><a href="#">Youtube</a></li>
                <br>
                <li><a href="#">Facebook</a></li>
                <br>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
        
    <div class="col-md-12 hidden-sm hidden-xs" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 40px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 105%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-4" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>
    <div class="col-sm-12 hidden-lg hidden-md hidden-xs" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 50px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 102%;
                                        margin-top: 1%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-6" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>
    <div class="col-xs-12 hidden-lg hidden-md hidden-sm" style=" font-family: Roboto;
                                        background: #21a4de;
                                        height: 60px;
                                        padding-top: 8px;
                                        text-align: center;
                                        color: white;
                                        width: 102%;
                                        margin-top: 5%">
        <div class="col-md-4" id="footer1">
            <p>
                Copyright © 2018 Todos lo derechos reservados
            </p>
        </div>
        <div class="col-md-6" id="footer2">
            <a href="">Inicio</a>
            <a href="">Sobre nosotros</a>
            <a href="">Servicios</a>
            <a href="">Contacto</a>
        </div>
    </div>

    </div>
</footer>


<!--FOOTER END -->

<!-- Scripts -->

<!-- /.LOGIN STAR -->
<div class="modal fade login-register-form row" id="modal-login">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        {{--<div class="col-md-8 align-center">--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">&nbsp;</h4>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#usuario">
                            Usuario
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#proveedor">
                            Proveedor
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">

                <div class="tab-content">

                    <div id="usuario" class="tab-pane fade in active">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Correo </label>--}}

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="modal-footer" id="modal_footer">
                            <div class="text-center">

                                <a href="login/facebook" class="btn btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="login/twitter" class="btn btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="login/google" class="btn btn-google" style="font-size: 10px">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div id="proveedor" class="tab-pane fade">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/seller_login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Correo </label>--}}

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           placeholder="correo" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary form-control">
                                        Inicia sesi&oacute;n
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 ">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            Recuerdame
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

s            </div>

        </div>
    {{--</div>--}}

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /.LOGIN END -->

<!-- /. REGISTRARSE STAR -->
<div class="modal fade login-register-form row" id="modal-register">
    <!-- modal-dialog -->
    <div class="modal-dialog modal-sm">
        {{--<div class="col-md-8 align-center">--}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">&nbsp;</h4>
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#new_usuario">
                            Usuario
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#new_proveedor">
                            Proveedor
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="modal-body">

                <div class="tab-content">
                    {{--usuario--}}
                    <div id="new_usuario" class="tab-pane fade in active">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="formR">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{--<label for="name" class="col-md-4 control-label">Nombre</label>--}}
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" placeholder="Nombre">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">Direccion de Correo</label>--}}

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="Correo">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="Contraseña">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="password_confirm" class="col-md-4 control-label">Confirmar--}}
                                {{--Contraseña</label>--}}

                                <div class="col-md-12">
                                    <input id="password_confirm" type="password" class="form-control"
                                           name="password_confirm" placeholder="Confirmar Contraseña">

                                    @if ($errors->has('password_confirm'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" id="submit" class="btn btn-primary">
                                        Registrarse
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Usuario--}}

                    {{--Solicitud de proveedor--}}
                    <div id="new_proveedor" class="tab-pane fade">
                        <form class="form-horizontal" method="POST" action="{{ url('ApplysSubmit') }}" id="formRP">
                            {{ csrf_field() }}
                            {{--@include('flash::message')--}}
                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-6 control-label">Nombre comercial:</label>--}}
                                <div class="col-md-12">
                                    <div id="mensajeNombreComercial"></div>
                                    <input id="com_name" type="text" class="form-control" name="com_name"
                                           required="required"
                                           placeholder="Nombre comercial" autofocus>
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('com_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-6 control-label">Nombre del contacto</label>--}}
                                <div class="col-md-12">
                                    <div id="mensajeNombreContacto"></div>
                                    <input id="contact_name" type="text" class="form-control" name="contact_name"
                                           required="required"
                                           placeholder="Nombre del contacto">
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tlf') ? ' has-error' : '' }}">
                                {{--<label for="tlf" class="col-md-12 control-label">Teléfono</label>--}}
                                <div class="col-md-12">
                                    <div id="mensajeTelefono"></div>
                                    <input id="tlf" type="text" class="form-control" name="tlf" value="{{ old('tlf') }}"
                                           required="required"
                                           placeholder="Teléfono">
                                    @if ($errors->has('tlf'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tlf') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{--<label for="description" class="col-md-6 control-label">Descripción</label>--}}
                                <div class="col-md-12">
                                    <textarea class="form-control" name="description" id="description"
                                              required="required"
                                              placeholder="Descripción">
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="content_type" class="col-md-6 control-label">Tipo de contenido</label>--}}
                                <div class="col-md-12">
                                    <select class="form-control" name="content_type" id="content_type">
                                        <option value="">Seleccione el tipo contenido</option>
                                        <option value="Musica">Musica</option>
                                        <option value="Revistas">Revistas</option>
                                        <option value="Libros">Libros</option>
                                        <option value="Radios">Radios</option>
                                        <option value="TV">Televisoras</option>
                                        <option value="Peliculas">Peliculas</option>
                                        <option value="Series">Series</option>
                                    </select>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content_type') }}</strong>
                                        </span>
                                    @endif
                                    <div id="subMenuMusica">
                                        <br>
                                        <select name="sub_desired" id="sub_desired" class="form-control">
                                            <option value="Artista">Artista</option>
                                            <option value="Productora">Productora</option>
                                        </select>
                                    </div>
                                    <div id="subMenuLibro">
                                        <br>
                                        <select name="sub_desired" id="sub_desired" class="form-control">
                                            <option value="Escritor">Escritor</option>
                                            <option value="Editorial">Editorial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {{--<label for="email" class="col-md-6 control-label">Correo</label>--}}
                                <div class="col-md-12">
                                    <div id="mensajeCorreo"></div>
                                    <input id="email" type="email" class="form-control" name="email" required="required"
                                           placeholder="Correo">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Solicitar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--Solicitud de proveedor--}}

                </div>

            </div>
            <div class="modal-footer" id="modal_footer">
                <div class="text-center">

                </div>

            </div>

        </div>
    {{--</div>--}}

    <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- /. REGISTRARSE END -->


{{--<script src="/js/app.js"></script>--}}
<script src="{{ asset('plugins/jquery/js/jquery-3.2.1.js') }}"></script>
<script src="{{ asset('plugins/bootstrapV3.3/js/bootstrap.min.js') }}"></script>
{{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery-3.1.1.js') }}"></script>

{{--CONFIG DEL SLIDER STAR--}}

{{--validaciones --}}
{{--registrar usuario star--}}
<script src="{{ asset('plugins/jquery/jquery-validation/lib/jquery.mockjax.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery-validation/dist/jquery.validate.js') }}"></script>
<script>
    $(document).ready(function () {

        $.mockjax({
            url: "emails.action",
            response: function (settings) {
                var email = settings.data.email, //original del archivo no cambiar
                    emails = ["glen@marketo.com", "george@bush.gov", "me@god.com", "aboutface@cooper.com", "steam@valve.com", "bill@gates.com"];
                // emails = mys;
                this.responseText = "true";
                if ($.inArray(email, emails) !== -1) {
                    this.responseText = "false";
                }
            },
            responseTime: 500
        });


        $("#formR").validate({

            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                email: {
                    required: true,
                    email: true,
                    remote: "emails.action"
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
            },

            messages: {
                name: {
                    required: " Ingresar su nombre",
                    minlength: "Su nombre debe tener minimo 2 caracteres"
                },
                password: {
                    required: "Ingresar clave",
                    minlength: "Debe tener minim 5 caracteres"
                },
                password_confirm: {
                    required: "Ingresar contraseña",
                    minlength: "Debe tener minimo 5 caracteres",
                    equalTo: "Ingrese la misma contraseña"
                },
                email: {
                    required: "Ingresar un correo valido",
                    minlength: "debe tener mas caracteres",
                    remote: ("Ya se ha registrado")
                }
            },

            errorElement: "em",
            errorPlacement: function (error, element) {
                error.addClass("help-block");

                element.parents(".col-md-6").addClass("has-feedback");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }

                if (!element.next("span")[0]) {
                    $("<span class='glyphicon glyphicon-remove form-control-feedback'></span> ").insertAfter(element);
                }
            },

            success: function (label, element) {
                if (!$(element).next("span")[0]) {
                    $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                }
            },

            highlight: function (element, errorClass, validClass) {
                $(element).parents(".col-md-6").addClass("has-error").removeClass("has-success");
                $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
            },

            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".col-md-6").addClass("has-success").removeClass("has-error");
                $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
            }

        })


    })
</script>
{{--registrar usuario end--}}

{{--registrar proveedor star--}}
{{--<script src="{{asset('assets/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/bubbles/movingbubbles.js') }}" type="text/javascript"></script>--}}
<script>
    //---------------------------------------------------------------------------------------------------

    // funcion para mostrar el submenu de los modulos de libro y de musica
    $(document).ready(function () {
        $('#subMenuMusica').hide();
        $('#subMenuLibro').hide();
        $('#content_type').on('change', function () {
            if (this.value == 'Musica') {
                $('#subMenuLibro').hide();
                $('#subMenuMusica').show();
            } else if (this.value == 'Libros') {
                $('#subMenuMusica').hide();
                $('#subMenuLibro').show();
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeNombreComercial').hide();
                $('#solicitar').attr('disabled', false);
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeNombreContacto').hide();
                $('#solicitar').attr('disabled', false);
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
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeTelefono').hide();
                $('#solicitar').attr('disabled', false);
            }
        });
    });
    // Función que nos va a contar el número de caracteres
    //---------------------------------------------------------------------------------------------------
    // Funcion de solo numero
    $(document).ready(function () {
        $("#tlf").keypress(function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
                $('#mensajeTelefono').show();
                $('#mensajeTelefono').text('Solo números');
                $('#mensajeTelefono').css('color', 'red');
                $('#solicitar').attr('disabled', true);
            } else {
                $('#mensajeTelefono').hide();
                $('#solicitar').attr('disabled', false);
            }
        });
    });
    // Funcion de solo numero
    //---------------------------------------------------------------------------------------------------
    // Funcion para validar el correo
    $(document).ready(function () {
        $('#solicitar').click(function () {
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
            if (regex.test($('#email').val().trim())) {
                $("#form").submit();
            } else {
                $('#mensajeCorreo').show();
                $('#mensajeCorreo').text('El correo introducido no es valido');
                $('#mensajeCorreo').css('color', 'red');
                event.preventDefault();
            }
        });
    });
    // Funcion para validar el correo
    //---------------------------------------------------------------------------------------------------

</script>
{{--registrar proveedor end--}}
{{--validaciones --}}

{{--CONFIG DEL SLIDER STAR--}}
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script>"use strict";

    var $slides = undefined,
        interval = undefined,
        $selectors = undefined,
        $btns = undefined,
        currentIndex = undefined,
        nextIndex = undefined;

    var cycle = function cycle(index) {
        var $currentSlide = undefined,
            $nextSlide = undefined,
            $currentSelector = undefined,
            $nextSelector = undefined;

        nextIndex = index !== undefined ? index : nextIndex;

        $currentSlide = $($slides.get(currentIndex));
        $currentSelector = $($selectors.get(currentIndex));

        $nextSlide = $($slides.get(nextIndex));
        $nextSelector = $($selectors.get(nextIndex));

        $currentSlide.removeClass("active").css("z-index", "0");

        $nextSlide.addClass("active").css("z-index", "1");

        $currentSelector.removeClass("current");
        $nextSelector.addClass("current");

        currentIndex = index !== undefined ? nextIndex : currentIndex < $slides.length - 1 ? currentIndex + 1 : 0;

        nextIndex = currentIndex + 1 < $slides.length ? currentIndex + 1 : 0;
    };

    $(function () {
        currentIndex = 0;
        nextIndex = 1;

        $slides = $(".slide");
        $selectors = $(".selector");
        $btns = $(".btn");

        $slides.first().addClass("active");
        $selectors.first().addClass("current");

        interval = window.setInterval(cycle, 6000);

        $selectors.on("click", function (e) {
            var target = $selectors.index(e.target);
            if (target !== currentIndex) {
                window.clearInterval(interval);
                cycle(target);
                interval = window.setInterval(cycle, 6000);
            }
        });

        $btns.on("click", function (e) {
            window.clearInterval(interval);
            if ($(e.target).hasClass("prev")) {
                var target = currentIndex > 0 ? currentIndex - 1 : $slides.length - 1;
                cycle(target);
            } else if ($(e.target).hasClass("next")) {
                cycle();
            }
            interval = window.setInterval(cycle, 6000);
        });
    });
    //# sourceURL=pen.js
</script>
{{--CONFIG DEL SLIDER END--}}


<script>

    /* Demo purposes only */

    $(".hover").mouseleave(
        function () {
            $(this).removeClass("hover");
        }
    );

</script>

</body>
</html>