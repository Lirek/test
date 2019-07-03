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
            var url = location.origin+"ApplysSubmit";
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
                    $('#mensajeCorreo').text('Este email ya se encuentra registrado');
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
                    $('#emailMenRU').text('Este email ya se encuentra registrado');
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
    
    
    
    //----------------------------------Para el usuario ofertante----------------------------------

    $(document).ready(function(){
        $('input#nombreOfertante, input#emailRO, input#tlfRO, textarea#otraCategoria').characterCounter();
        $('#otraCat').hide();
        var email = $('#emailO').val().trim();
        var password = $('#passwordO').val().trim();
        if (email.length==0 || password.length ==0){
            $('#iniciarO').attr('disabled',true);
        }
    });

    $("#formRO").on('submit',function(e){
        e.preventDefault();
        var url = "BidderSubmit";
        var gif = "sistem_images/loading.gif";
        swal({
            title: "Procesando la información",
            text: "Espere mientras se procesa la información.",
            icon: gif,
            buttons: false,
            closeOnEsc: false,
            closeOnClickOutside: false
        });
        console.log('Ruta : '+url);
        $.ajax({
            url: url,
            type: 'POST',
            data: $("#formRO").serialize(),
            success: function (result) {
                console.log(result);
                swal("Su solicitud está siendo procesada","Por favor espere su correo de confirmación","success")
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

    $("#emailRO").on('keyup change',function(){
        var email_data = $("#emailRO").val();
        $.ajax({
            url: "RegisterEmailBidder/"+email_data,
            type: 'get',
            dataType: "json",
            success: function(result){
                console.log(result);
                if (result == 1) {
                    var correoOfertante = $('#emailRO').val().trim();
                    var limite = $('#emailRO').attr('data-length');

                    if (correoOfertante.length>=limite) {
                        $('#mensajeCorreoOfertante').show();
                        $('#mensajeCorreoOfertante').text('No debe exceder el limite de caracteres permitidos');
                        $('#mensajeCorreoOfertante').css('color','red');
                        $('#mensajeCorreoOfertante').css('font-size','100%');
                        $('#registroRO').attr('disabled',true);
                    } else if(correoOfertante.length==0) {
                        $('#mensajeCorreoOfertante').show();
                        $('#mensajeCorreoOfertante').text('El campo no debe estar vacio');
                        $('#mensajeCorreoOfertante').css('color','red');
                        $('#mensajeCorreoOfertante').css('font-size','100%');
                        $('#registroRO').attr('disabled',true);
                    } else {
                        $('#mensajeCorreoOfertante').hide();
                    }
                    return true;
                } else {
                    $('#mensajeCorreoOfertante').show();
                    $('#mensajeCorreoOfertante').text('Este email ya se encuentra registrado');
                    $('#mensajeCorreoOfertante').css('font-size','100%');
                    $('#mensajeCorreoOfertante').css('color','red');
                    $('#registroRO').attr('disabled',true);
                }
                var valNombreOfertante = $('#mensajeNombreOfertante').is(':hidden');
                var valCorreoOfertante = $('#mensajeCorreoOfertante').is(':hidden');
                var valTelefonoOfertante = $('#mensajeTelefonoOfertante').is(':hidden');
                var valCategoriaOfertante = $('#mensajeOtraCatOfertante').is(':hidden');
                if (valNombreOfertante && valCorreoOfertante && valTelefonoOfertante && valCategoriaOfertante) {
                    $('#registroRO').attr('disabled',false);
                }
            }
        });
    });

    $('#nombreOfertante').keyup(function(e){
        var nombreOfertante = $('#nombreOfertante').val().trim();
        var limite = $('#nombreOfertante').attr('data-length');

        if (nombreOfertante.length>=limite) {
            $('#mensajeNombreOfertante').show();
            $('#mensajeNombreOfertante').text('No debe exceder del limite de caracteres permitidos');
            $('#mensajeNombreOfertante').css('color','red');
            $('#mensajeNombreOfertante').css('font-size','100%');
            $('#registroRO').attr('disabled',true);
        } else if(nombreOfertante.length==0){
            $('#mensajeNombreOfertante').show();
            $('#mensajeNombreOfertante').text('El campo no debe estar vacio');
            $('#mensajeNombreOfertante').css('color','red');
            $('#mensajeNombreOfertante').css('font-size','100%');
            $('#registroRO').attr('disabled',true);
        } else {
            $('#mensajeNombreOfertante').hide();
        }

        var valNombreOfertante = $('#mensajeNombreOfertante').is(':hidden');
        var valCorreoOfertante = $('#mensajeCorreoOfertante').is(':hidden');
        var valTelefonoOfertante = $('#mensajeTelefonoOfertante').is(':hidden');
        var valCategoriaOfertante = $('#mensajeOtraCatOfertante').is(':hidden');
        if (valNombreOfertante && valCorreoOfertante && valTelefonoOfertante && valCategoriaOfertante) {
            $('#registroRO').attr('disabled',false);
        }
    });

    $('#tlfRO').keyup(function(e){
        var correoOfertante = $('#tlfRO').val().trim();
        var limite = $('#tlfRO').attr('data-length');

        if (correoOfertante.length>=limite) {
            $('#mensajeTelefonoOfertante').show();
            $('#mensajeTelefonoOfertante').text('No debe exceder el limite de caracteres permitidos');
            $('#mensajeTelefonoOfertante').css('color','red');
            $('#mensajeTelefonoOfertante').css('font-size','100%');
            $('#registroRO').attr('disabled',true);
        } else if(correoOfertante.length==0) {
            $('#mensajeTelefonoOfertante').show();
            $('#mensajeTelefonoOfertante').text('El campo no debe estar vacio');
            $('#mensajeTelefonoOfertante').css('color','red');
            $('#mensajeTelefonoOfertante').css('font-size','100%');
            $('#registroRO').attr('disabled',true);
        } else {
            $('#mensajeTelefonoOfertante').hide();
        }

        var valNombreOfertante = $('#mensajeNombreOfertante').is(':hidden');
        var valCorreoOfertante = $('#mensajeCorreoOfertante').is(':hidden');
        var valTelefonoOfertante = $('#mensajeTelefonoOfertante').is(':hidden');
        var valCategoriaOfertante = $('#mensajeOtraCatOfertante').is(':hidden');
        if (valNombreOfertante && valCorreoOfertante && valTelefonoOfertante && valCategoriaOfertante) {
            $('#registroRO').attr('disabled',false);
        }
    });

    $('#categoria').on('change', function () {
        if (this.value == 'otra') {
            $('#otraCat').show();
            $('#otraCategoria').attr('required','required');
            $('#otraCategoria').keyup(function(e){
                var categoriaOfertante = $('#otraCategoria').val();
                var limite = $('#otraCategoria').attr('data-length');

                if (categoriaOfertante.length>=limite) {
                    $('#mensajeOtraCatOfertante').show();
                    $('#mensajeOtraCatOfertante').text('No debe exceder el limite de caracteres permitidos');
                    $('#mensajeOtraCatOfertante').css('color','red');
                    $('#mensajeOtraCatOfertante').css('font-size','100%');
                    $('#registroRO').attr('disabled',true);
                } else if(categoriaOfertante.length==0) {
                    $('#mensajeOtraCatOfertante').show();
                    $('#mensajeOtraCatOfertante').text('El campo no debe estar vacio');
                    $('#mensajeOtraCatOfertante').css('color','red');
                    $('#mensajeOtraCatOfertante').css('font-size','100%');
                    $('#registroRO').attr('disabled',true);
                } else {
                    $('#mensajeOtraCatOfertante').hide();
                }

                var valNombreOfertante = $('#mensajeNombreOfertante').is(':hidden');
                var valCorreoOfertante = $('#mensajeCorreoOfertante').is(':hidden');
                var valTelefonoOfertante = $('#mensajeTelefonoOfertante').is(':hidden');
                var valCategoriaOfertante = $('#mensajeOtraCatOfertante').is(':hidden');
                console.log(valNombreOfertante, valCorreoOfertante, valTelefonoOfertante, valCategoriaOfertante);
                if (valNombreOfertante && valCorreoOfertante && valTelefonoOfertante && valCategoriaOfertante) {
                    $('#registroRO').attr('disabled',false);
                }
            });
        } else {
            $('#mensajeOtraCatOfertante').hide();
            $('#otraCat').hide();
            $('#otraCategoria').removeAttr('required');
            $('#registroRO').attr('disabled',false);
        }
    });

    //---------VALIDACION PARA QUE EL CAMPO EMAIL NO ESTE VACIO---------------
    $('#emailO').keyup(function(evento){
        var email = $('#emailO').val().trim();
        if (email.length==0) {
            $('#emailMenO').show();
            $('#emailMenO').text('El campo no debe estar vacio');
            $('#emailMenO').css('color','red');
            $('#emailMenO').css('font-size','60%');
            $('#iniciarO').attr('disabled',true);
            $('#iniciarO').css('background-color','')
        } else {
            $('#emailMenO').hide();
        }
        var password = $('#passwordO').val().trim();
        if (email.length !=0 && password.length !=0){
            $('#iniciarO').attr('disabled',false);
        }
    });

    //---------VALIDACION DE FORMATO DE CORREO-----------------------------------
    $('#emailO').keyup(function(evento){
        var email = $('#emailO').val();
        var caract = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
        if (caract.test(email) == false){
            $('#emailMenO').show();
            $('#emailMenO').text('Formato email incorrecto');
            $('#emailMenO').css('color','red');
            $('#emailMenO').css('font-size','60%');
            $('#iniciarO').attr('disabled',true);
            $('#iniciarO').css('background-color','')
        } else {
            return true;
        }
    });

    //---------VALIDACION PARA QUE EL CAMPO PASSWORD NO ESTE VACIO---------------
    $('#passwordO').keyup(function(evento){
        var password = $('#passwordO').val().trim();
        if (password.length==0) {
            $('#passwordMenO').show();
            $('#passwordMenO').text('El campo no debe estar vacio');
            $('#passwordMenO').css('color','red');
            $('#passwordMenO').css('font-size','60%');
            $('#iniciarO').attr('disabled',true);
        } else {
            $('#passwordMenO').hide();
            $('#iniciarO').attr('disabled',false);
        }
        var email = $('#emailO').val().trim();
        if (email.length !=0 && password.length !=0){
            $('#iniciarO').attr('disabled',false);
        }
    });

    //----------------------------------Para el usuario ofertante----------------------------------

    