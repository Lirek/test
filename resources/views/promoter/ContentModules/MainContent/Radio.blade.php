@extends('promoter.layouts.app')

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
    @endsection
@section('main')
    <span class="card-title grey-text"><h3>Radios</h3></span>
    <a class="btn-floating btn-large waves-effect waves-light btn tooltipped modal-trigger green" data-position="right" data-tooltip="Agregar radio" href="#NewRadio">
        <i class="material-icons">add</i>
    </a>
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="EnProceso"><a class="active" href="#test1">En proceso</a></li>
        <li class="tab" id="aprobados"><a href="#test2">Aprobados</a></li>
        <li class="tab" id="rechazados"><a href="#test2">Rechazados</a></li>
    </ul>
    <div class="col s12">
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th>Streaming</th>
                    <th>Proveedor</th>
                    <th>Fecha de registro</th>
                    <th>Redes sociales</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id="radios">
            </tbody>
        </table>
    </div>

@include('promoter.modals.RadioViewModal')
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>

        //Select Para Provincias
         $(document).ready(function(){
            $('select').formSelect();
        });

        // funcion para listar todas las radios
        function radios(status) {
            $("#radios").empty();
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
                url: "{!! url('RadioData') !!}/"+status,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                        if (info.logo!=null) {
                            var logo = 
                            "<img class='materialboxed' src='{!!asset('"+info.logo+"')!!}' style='width:70px;height:70px;' alt=Logo>";
                        } else {
                            var logo = "No tiene logo registrado";
                        }
                        if (info.streaming!=null) {
                            var streaming = 
                            "<audio controls='' src='"+info.streaming+"'>"+
                                "<source src='"+info.streaming+"' type='audio/mpeg'>"+
                            "</audio>";
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
                       "<a class='waves-effect waves-light btn modal-trigger curvaBoton' value='"+info.id+"' href='#myModal' id='status'>Cambiar</a><br>";
                        var edit = 
                        "<a class='btn-small waves-effect waves-light btn orange darken-3 modal-trigger curvaBoton' value='"+info.id+"' id='editRadio' href='#updateRadio'>"+
                            "<i class='material-icons'>edit</i>"+
                        "</a>";
                        var eliminar = 
                        "<a class='btn-small waves-effect waves-light btn red curvaBoton' id='deleteRadio' value='"+info.id+"'>"+
                            "<i class='material-icons'>delete</i>"+
                        "</a>";
                        if (info.status=="Denegado") {
                            status = status+
                            "<a class='btn light-blue lighten-1 modal-trigger curvaBoton' value="+info.id+" href='#reject' id='rejectRadio'>Ver negaciones</a><br>";
                        }
                        var filas = "<tr><td>"+
                        info.name_r+"</td><td>"+
                        logo+"</td><td>"+
                        streaming+"</td><td>"+
                        proveedor+"</td><td>"+
            						moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+"</td><td>"+
                        redes+"</td><td>"+
                        status+edit+eliminar+"</td></tr>";
                        $("#radios").append(filas);
                    });
                    $('.materialboxed').materialbox();
                },
                error:function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                    console.log(data);
                }
            });
        }
        // funcion para listar todas las radios

        $(document).ready(function(){
            radios("En Proceso");
        });

        $(document).on('click', '#EnProceso', function() {
            radios("En Proceso");
        });

        $(document).on('click', '#aprobados', function() {
            radios("Aprobado");
        });

        $(document).on('click', '#rechazados', function() {
            radios("Denegado");
        });

        // funcion para cambiar el estatus de las radios
        $(document).on('click', '#status', function() {
            var x = $(this).attr("value");
            $("#formStatus").on('submit', function(e) {
                var s = $("input[type='radio'][name=status]:checked").val();
                var message = $('#razon').val();
                var url = "{{url('statusRadio/')}}/"+x;
                console.log(url,s,message,$('input[name=_token]').val());
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
                        console.log(result);
                        swal('Radio '+s+' con exito','','success')
                        .then((recarga) => {
                            location.reload();
                        });
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
        // funcion para cambiar el estatus de las radios

        // funcion para eliminar las radios
        $(document).on('click', '#deleteRadio', function() {
            var radio = $(this).attr("value");
            swal({
                title: "¿Desea realmente eliminar la radio?",
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
                    var url = "{{url('DeleteBackendRadio')}}/"+radio;
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
        // funcion para eliminar las radios

        // funcion para editar las radios
        $(document).on('click', '#editRadio', function() {
            var radio = $(this).attr("value");
            console.log(radio);
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
                url : "{{url('BackendRadio/')}}/"+radio,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    swal.close();
                    console.log(data,data.logo);
                    $("#idUpdate").val(radio);
                    $("#name_r_u").val(data.name_r);
                    $("#email_c_u").val(data.email_c);
                    $("#streaming_u").val(data.streaming);
                    $("#youtube_u").val(data.google);
                    $("#instagram_u").val(data.instagram);
                    $("#facebook_u").val(data.facebook);
                    $("#twitter_u").val(data.twitter);
                    $("#img_u").attr('src',data.logo);
                },
                error: function(data) {
                    swal('Existe un error en su solicitud','','error')
                    .then((recarga) => {
                        location.reload();
                    });
                }
            });
        });
        // funcion para editar las radios

        // funcion para ver todas las negaciones de una radio
        $(document).on('click', '#rejectRadio', function(e) {
            var idRadio = $(this).attr("value");
            console.log(idRadio);
            var modulo = "Radio";
            var url = "{!! url('viewRejection/"+idRadio+"/"+modulo+"') !!}";
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
        // funcion para ver todas las negaciones de una radio

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