@extends('promoter.layouts.app')
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

         #image-preview_u {
            width: 100%;
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #2b81af;
            border-radius: 10px;
        }

        #image-preview_u input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }

        #image-preview_u label {
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

        .curvaBoton{border-radius: 20px;}
    </style>
@section('main')
    <span class="card-title grey-text"><h3>Televisoras</h3></span>
    <a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar televisora" href="#NewTv">
        <i class="material-icons">add</i>
    </a>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="televisoras"><a class="active" href="#test1">Televisoras</a></li>
        <li class="tab" id="televisorasSistema"><a href="#test2">Televisoras del sistema</a></li>
    </ul>
    <div id="test1" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="televisoraPendientes"><a class="active" id="tvsp">Televisoras pendientes</a></li>
            <li class="tab" id="televisoraAprobados"><a id="tvsa">Televisoras aprobados</a></li>
            <li class="tab" id="televisoraNegados"><a id="tvsn">Televisoras negados</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Streaming</th>
                    <th>Proveedor</th>
                    <th>Redes Sociales</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id="tv">
            </tbody>
        </table>
    </div>
    <div id="test2" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="televisoraSistemaPendientes"><a class="active">Televisoras del sistema pendientes</a></li>
            <li class="tab" id="televisoraSistemaAprobados"><a>Televisoras del sistema aprobados</a></li>
            <li class="tab" id="televisoraSistemaNegados"><a>Televisoras del sistema negados</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Streaming</th>
                    <th>Redes Sociales</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tvBackend">
            </tbody>
        </table>
    </div>

    @include('promoter.modals.TvViewModal')
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        // funcion para listas las televisoras registradas por los proveedores
        function tvs(status) {
            $("#tv").empty();
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
                url: "{!! url('DataTableTv') !!}/"+status,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info){
                        if (info.logo!=null) {
                            var logo = 
                            "<img class='materialboxed' src='{!!asset('"+info.logo+"')!!}' style='width:70px;height:70px;' alt=Logo>";
                        } else {
                            var logo = "No tiene logo registrado";
                        }
                        if (info.streaming!=null) {
                            var streaming = 
                            "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.streaming+"' href='#verTv' id='verTelevisora'>Ver Tv</a>";
                        } else {
                            var streaming = "No tiene streaming";
                        }
                        if (info.seller!=null) {
                            var proveedor = info.seller.name;
                        } else {
                            var proveedor = "No tiene proveedor";
                        }
                        var redes = "";
                        if (info.facebook!=null) {
                            var facebook = 
                            "<a href="+info.facebook+" class='btn-floating blue darken-4' target='_blank'>"+
                                "<i class='mdi mdi-facebook'></i>"+
                            "</a>";
                            redes = redes+facebook;
                        }
                        if (info.google!=null) {
                            var youtube =
                            "<a href="+info.google+" class='btn-floating red accent-4' target='_blank'>"+
                                "<i class='mdi mdi-youtube'></i>"+
                            "</a>";
                            redes = redes+youtube;
                        }
                        if (info.twitter!=null) {
                            var twitter = 
                            "<a href="+info.twitter+" class='btn-floating blue lighten-2' target='_blank'>"+
                                "<i class='mdi mdi-twitter'></i>"+
                            "</a>";
                            redes = redes+twitter;
                        }
                        if (info.instagram!=null) {
                            var instagram = 
                            "<a href="+info.instagram+" class='btn-floating purple-gradient' target='_blank'>"+
                                "<i class='mdi mdi-instagram'></i>"+
                            "</a>";
                            redes = redes+instagram;
                        }
                        if (redes=="") {
                            redes = "No tiene enlaces registrados";
                        }
                        var status = 
                        "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#myModal' id='status'>Cambiar</a>";
                        if (info.status=="Denegado") {
                            status = status+"<br>"+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectPayments'>Ver negaciones</a>";
                        }
                        var filas = "<tr><td>"+
                        info.name_r+"</td><td>"+
                        logo+"</td><td>"+
                        streaming+"</td><td>"+
                        proveedor+"</td><td>"+
                        redes+"</td><td>"+
                        status+"</td></tr>";
                        $("#tv").append(filas);
                    });
                    $('.materialboxed').materialbox();
                },
                error: function(data){
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                    console.log(data);
                }
            });
        }
        // funcion para listas las televisoras registradas por los proveedores

        // funcion para listas las televisoras registradas por los administradores
        function tvBackend(status) {
            $("#tvBackend").empty();
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
                url: "{!! url('BackendTV') !!}/"+status,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info){
                        if (info.logo!=null) {
                            var logo = 
                            "<img class='materialboxed' src='{!!asset('"+info.logo+"')!!}' style='width:70px;height:70px;' alt=Logo>";
                        } else {
                            var logo = "No tiene logo registrado";
                        }
                        if (info.streaming!=null) {
                            var streaming = 
                            "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.streaming+"' href='#verTv' id='verTelevisora'>Ver Tv</a>";
                        } else {
                            var streaming = "No tiene streaming";
                        }
                        var redes = "";
                        if (info.facebook!=null) {
                            var facebook = 
                            "<a href="+info.facebook+" class='btn-floating blue darken-4' target='_blank'>"+
                                "<i class='mdi mdi-facebook'></i>"+
                            "</a>";
                            redes = redes+facebook;
                        }
                        if (info.google!=null) {
                            var youtube =
                            "<a href="+info.google+" class='btn-floating red accent-4' target='_blank'>"+
                                "<i class='mdi mdi-youtube'></i>"+
                            "</a>";
                            redes = redes+youtube;
                        }
                        if (info.twitter!=null) {
                            var twitter = 
                            "<a href="+info.twitter+" class='btn-floating blue lighten-2' target='_blank'>"+
                                "<i class='mdi mdi-twitter'></i>"+
                            "</a>";
                            redes = redes+twitter;
                        }
                        if (info.instagram!=null) {
                            var instagram = 
                            "<a href="+info.instagram+" class='btn-floating purple-gradient' target='_blank'>"+
                                "<i class='mdi mdi-instagram'></i>"+
                            "</a>";
                            redes = redes+instagram;
                        }
                        if (redes=="") {
                            redes = "No tiene enlaces registrados";
                        }
                        var status = 
                        "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#myModalBackend' id='statusBackend'>Cambiar</a><br>";
                        var edit = 
                        "<a class='btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton' value='"+info.id+"' id='editTv' href='#updateTv'>"+
                            "<i class='material-icons'>edit</i>"+
                        "</a>";
                        var eliminar = 
                        "<a class='btn-small waves-effect waves-light btn red curvaBoton' id='deleteTv' value='"+info.id+"'>"+
                            "<i class='material-icons'>delete</i>"+
                        "</a>";
                        if (info.status=="Denegado") {
                            status = status+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectPayments'>Ver negaciones</a><br>";
                        }
                        var filas = "<tr><td>"+
                        info.name_r+"</td><td>"+
                        logo+"</td><td>"+
                        streaming+"</td><td>"+
                        redes+"</td><td>"+
                        status+edit+eliminar+"</td></tr>";
                        $("#tvBackend").append(filas);
                    });
                    $('.materialboxed').materialbox();
                },
                error: function(data){
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                    console.log(data);
                }
            });
        }
        // funcion para listas las televisoras registradas por los administradores

        // funcion para validar el formulario de aprobacion o negacion de las televisoras registradas por los administradores
        function yesNoCheck() {
            if (document.getElementById('option2').checked) {
                $('#ifNo').show();
                $('#razonR').attr('required','required');
            } else {
                $('#ifNo').hide();
                $('#razonR').val('');
                $('#razonR').removeAttr('required');
            }
        }
        // funcion para validar el formulario de aprobacion o negacion de las televisoras registradas por los administradores

        $(document).ready(function(){
            tvs("En Proceso");
            tvBackend("En Proceso");
        });

        $(document).on('click', '#televisoras', function() {
            $(".indicator").removeAttr('class');
        });

        $(document).on('click', '#televisorasSistema', function() {
            $(".indicator").removeAttr('class');
        });

        $(document).on('click', '#televisoraPendientes', function() {
            tvs("En Proceso");
        });

        $(document).on('click', '#televisoraAprobados', function() {
            tvs("Aprobado");
        });

        $(document).on('click', '#televisoraNegados', function() {
            tvs("Denegado");
        });

        // funcion para cambiar el estatus de las televisoras registradas por los proveedores
        $(document).on('click', '#status', function() {
            var x = $(this).attr('value');
            console.log(x);
            $("#formStatus").on('submit', function(e) {
                var s = $("input[type='radio'][name=status]:checked").val();
                var url = "{{url('TvStatus/')}}/"+x;
                var message = $('#razon').val();
                console.log(url,s,message);
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
                    type: 'post',
                    data: {
                        _token: $('input[name=_token]').val(),
                        status: s,
                        reason: message
                    },
                    success: function (result) {
                        swal('Tv '+s+' con exito','','success')
                        .then((recarga) => {
                            location.reload();
                        });
                        console.log(result);
                    },
                    error: function (result) {
                        console.log(result);
                        swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
            });
        });
        // funcion para cambiar el estatus de las televisoras registradas por los proveedores

        $(document).on('click', '#televisoraSistemaPendientes', function() {
            tvBackend("En Proceso");
        });

        $(document).on('click', '#televisoraSistemaAprobados', function() {
            tvBackend("Aprobado");
        });

        $(document).on('click', '#televisoraSistemaNegados', function() {
            tvBackend("Denegado");
        });

        // funcion para cambiar el estatus de las televisoras registradas por los administradores
        $(document).on('click', '#statusBackend', function() {
            var x = $(this).attr('value');
            console.log(x);
            $("#formStatusBackend").on('submit', function(e) {
                var s = $("input[type='radio'][name=statusB]:checked").val();
                var url = "{{url('TvStatus/')}}/"+x;
                var message = $('#razonR').val();
                console.log(url,s,message);
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
                    type: 'post',
                    data: {
                        _token: $('input[name=_token]').val(),
                        status: s,
                        reason: message
                    },
                    success: function (result) {
                        swal('Tv '+s+' con exito','','success')
                        .then((recarga) => {
                            location.reload();
                        });
                        console.log(result);
                    },
                    error: function (result) {
                        console.log(result);
                        swal('Existe un error en su solicitud','','error')
                        .then((recarga) => {
                            location.reload();
                        });
                    }
                });
            });
        });
        // funcion para cambiar el estatus de las televisoras registradas por los administradores

        // funcion para editar de las televisoras registradas por los administradores
        $(document).on('click', '#editTv', function() {
            var tv = $(this).attr('value');
            console.log(tv);
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
                url : "{{url('BackendTv/')}}/"+tv,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    swal.close();
                    console.log(data,data.logo);
                    $("#idUpdate").val(tv);
                    $("#name_r_u").val(data.name_r);
                    $("#email_c_u").val(data.email_c);
                    $("#streaming_u").val(data.streaming);
                    $("#youtube_u").val(data.google);
                    $("#instagram_u").val(data.instagram);
                    $("#facebook_u").val(data.facebook);
                    $("#twitter_u").val(data.twitter);
                    $("#img_u").attr('src',data.logo);
                    $("#img_u").css('width','100%');
                },
                error: function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });
        // funcion para editar de las televisoras registradas por los administradores
        
        // funcion para eliminar de las televisoras registradas por los administradores
        $(document).on('click', '#deleteTv', function() {
            var x = $(this).attr('value');
            swal({
                title: "¿Desea realmente eliminar la televisora?",
                icon: "warning",
                dangerMode: true,
                buttons: ["Cancelar", "Si"]
            }).then((confir) => {
                if (confir) {
                    var gif = "{{ asset('/sistem_images/loading.gif') }}";
                    swal({
                        title: "Procesando la información",
                        text: "Espere mientras se procesa la información.",
                        icon: gif,
                        buttons: false,
                        closeOnEsc: false,
                        closeOnClickOutside: false
                    });
                    var url = "{{url('DeleteBackendTv')}}/"+x;
                    $.ajax({
                        url: url,
                        type:'get',
                        dataType:"json",
                        success: function(data) {
                            console.log(data);
                            swal('Eliminado exitosamente','','success')
                            .then((recarga) => {
                                location.reload();
                            });
                        },
                        error: function(data) {
                            console.log(data);
                            swal('Existe un error en su solicitud','','error')
                            .then((recarga) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
        // funcion para eliminar de las televisoras registradas por los administradores

        // funcion para ver todas las televisoras registradas
        $(document).on('click', '#verTelevisora', function() {
            var streaming = $(this).attr('value');
            console.log(streaming);
            $("#video").attr('src',streaming+"?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media");
            $("#control").attr('src',streaming);
        });
        // funcion para ver todas las televisoras registradas

        // funcion para ver todas las negaciones de una televisora
        $(document).on('click', '#rejectPayments', function(e) {
            var idTv = $(this).attr("value");
            console.log(idTv);
            var modulo = "Tvs";
            var url = "{!! url('viewRejection/"+idTv+"/"+modulo+"') !!}";
            console.log(url);
            $("#negaciones").empty();
            e.preventDefault();
            $.ajax({
                url: url, 
                type:'get', 
                dataType:'json',
                success: function(datos){
                    console.log(datos);
                    $('#totalNegaciones').show();
                    $('#totalNegaciones').text('Tiene un total de rechazos de: '+datos.length);
                    $.each(datos, function(i,info){
                        var fila = '<tr><td>'+
                        info.reason+'</td><td>'+
                        moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+'</td></tr>';
                        $('#negaciones').append(fila);
                    });
                },
                error: function (datos) {
                    console.log(datos);
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });
        // funcion para ver todas las negaciones de una televisora

        // para que se vean las imagenes en los formularios
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });
        $.uploadPreview({
            input_field: "#image-upload_u",
            preview_box: "#image-preview_u",
            label_field: "#image-label_u"
        });
        // para que se vean las imagenes en los formularios
    </script>
@endsection