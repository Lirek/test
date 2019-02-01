@extends('promoter.layouts.app')
@section('main')
    <span class="card-title grey-text"><h3>Revistas y publicaciones periódicas</h3></span>
    
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="televisoras"><a class="active" href="#test1">Revistas</a></li>
        <li class="tab" id="televisorasSistema"><a href="#test2">Publicaciones periódicas</a></li>
    </ul>
    <div id="test1" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="Revision"><a class="active" id="tvsp">Revistas pendientes</a></li>
            <li class="tab" id="Aprobado"><a id="tvsa">Revistas aprobadas</a></li>
            <li class="tab" id="Negado"><a id="tvsn">Revistas rechazadas</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Portada</th>
                    <th>Restricción</th>
                    <th>Proveedor</th>
                    <th>Descripción</th>
                    <th>Publicación periódica</th>
                    <th>Costo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="Revistas">
            </tbody>
        </table>
    </div>
    <div id="test2" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="RevisionPu"><a class="active">Publicaciones pendientes</a></li>
            <li class="tab" id="AprobadoPu"><a>Publicaciones aprobadas</a></li>
            <li class="tab" id="NegadoPu"><a>Publicaciones rechazadas</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Restricción</th>
                    <th>Proveedor</th>
                    <th>Descripción</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody id="publicaciones">
            </tbody>
        </table>
    </div>

@include('promoter.modals.MegazineViewModals')
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>

// funcion para listas las publicaciones
        function listadoPu(status) {
            $("#publicaciones").empty();
            var parametros = status;
            var ruta = "{{url('PubChainDataTable')}}"+"/"+parametros;
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
                url: ruta,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                        
                        if (info.img_saga!=0 ) {
                            var portada = 
                            "<img class='materialboxed' width='150' height='120' src='{!!asset('"+info.img_saga+"')!!}'";
                        } else {
                            var portada = "No aplica ";
                        }
                        if (info.status=="En Proceso") {
                            var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='statusPU'>"+info.status+"</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='En Revision' href='#negado' id='denegado'>ver negaciones</button>"
                        }
                        if (info.status=="Aprobado") {
                            var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="StatusPU">'+info.status+'</button>'
                        }
                        if (info.status=="Denegado") {
                            var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="StatusPU">'+info.status+'</button><button class="btn modal-trigger curvaBoton" value='+info.id+' value2="En Revision" href="#negado" id="denegado">ver negaciones</button>'
                        }

                        var filas = "<tr><td>"+
                        info.sag_name+"</td><td>"+
                        portada+"</td><td>"+
                        info.rating.r_name+"</td><td>"+
                        info.seller.name+"</td><td>"+
                        info.sag_description+"</td><td>"+
                        opcion+"</td></tr>";
                        $("#publicaciones").append(filas);
                    })
                    $('.materialboxed').materialbox();
                    $('.tooltipped').tooltip();
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
        $(document).ready(function(){
            listadoPu("En Proceso");
        });
        $(document).on('click','#RevisionPu', function() {
            listadoPu("En Proceso");
        });
        $(document).on('click','#AprobadoPu', function() {
            listadoPu("Aprobado");
        });
        $(document).on('click','#NegadoPu', function() {
            listadoPu("Denegado");
        });
        // funcion para listas las publicaciones

        // Listar las negaciones
        $(document).on('click', '#denegado', function(e) {
            var id = $(this).attr("value");
            var modulo = "Publication Chain";
            var url = "{!! url('viewRejection/"+id+"/"+modulo+"') !!}";
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
                        $('#totalNegaciones').text('tiene un total de rechazos de: '+datos.length);
                        $.each(datos, function(i,info){
                            var fila = '<tr><td>'+
                            info.reason+'</td><td>'+
                            moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+
                            '</td></tr>';
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
        // Listar las negaciones


        // Modificar el estatus de las publicaciones
          $(document).on('click','#statusPU', function() {
            var x = $(this).attr("value");
            $("#FormStatus").on('submit', function(e){
              var gif = "{{ asset('/sistem_images/loading.gif') }}";
              swal({
                title: "Procesando la información",
                text: "Espere mientras se procesa la información.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
              });
              var s = $("input[type='radio'][name=status]:checked").val();
              var message = $('#razon').val();
              var url = "{{url('/admin_chain/')}}/"+x;
              console.log(url);
              e.preventDefault(); 
              console.log(s);
              $.ajax({
                url: url,
                type: 'POST',
                data: {
                  _token: $('input[name=_token]').val(),
                  status: s,
                  message: message
                }, 
                success: function (result) {
                  console.log(result);
                  $('#PubModal').toggle();
                  $('.modal-backdrop').remove();
                  swal("Se ha "+s+" con éxito","","success")
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
                },
              });
            });
          });
          // Modificar el estatus de las publicaciones

        // funcion para listas las revistas
        function listado(status) {
            $("#Revistas").empty();
            var parametros = status;
            var ruta = "{{url('MegazineDataTable')}}"+"/"+parametros;
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
                url: ruta,
                type:'GET',
                dataType: "json",
                success: function (data) {
                    swal.close();
                    console.log(data);
                    $.each(data,function(i,info) {
                        
                        
                        if(info.saga_id == 0 || info.saga_id == null) {
                          var saga = 'No tiene';
                        } else {
                          var saga = info.sagas.sag_name;
                        }

                        if (info.cover!=0 ) {
                            var portada = 
                            "<img class='materialboxed' width='150' height='120' src='{!!asset('"+info.cover+"')!!}'";
                        } else {
                            var portada = "No aplica ";
                        }
                        if (info.status=="En Revision") {
                            var opcion = "<a class='btn curvaBoton' target='_blank' href='{!! asset('"+info.megazine_file+"')!!}' href='#file' id='file_b'>Ver Revista</a> <button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button><button class='btn modal-trigger curvaBoton red' value='"+info.id+"' value2='En Revision' href='#negado' id='denegadoRE'>ver negaciones</button>"

                            // <a class='btn curvaBoton' id='#megazine_filess' href='' value='"+info.megazine_file+"' target='_blank'>ver revista</a> <button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button>
                        }
                        if (info.status=="Aprobado") {
                            var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="Status">'+info.status+'</button>'
                        }
                        if (info.status=="Denegado") {
                            var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button><button class="btn modal-trigger curvaBoton" value='+info.id+' value2="En Revision" href="#negado" id="denegadoRE">ver negaciones</button>'
                        }

                        var filas = "<tr><td>"+
                        info.title+"</td><td>"+
                        portada+"</td><td>"+
                        info.rating.r_name+"</td><td>"+
                        info.seller.name+"</td><td>"+
                        info.descripcion+"</td><td>"+
                        saga+"</td><td>"+
                        info.cost+"</td><td>"+
                        opcion+"</td></tr>";
                        $("#Revistas").append(filas);
                    })
                    $('.materialboxed').materialbox();
                    $('.tooltipped').tooltip();
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
        $(document).ready(function(){
            listado("En Revision");
        });
        $(document).on('click','#Revision', function() {
            listado("En Revision");
        });
        $(document).on('click','#Aprobado', function() {
            listado("Aprobado");
        });
        $(document).on('click','#Negado', function() {
            listado("Denegado");
        });
        // funcion para listas las revistas

    // Listar las negaciones
        $(document).on('click', '#denegadoRE', function(e) {
            var id = $(this).attr("value");
            var modulo = "Megazines";
            var url = "{!! url('viewRejection/"+id+"/"+modulo+"') !!}";
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
                        $('#totalNegaciones').text('tiene un total de rechazos de: '+datos.length);
                        $.each(datos, function(i,info){
                            var fila = '<tr><td>'+
                            info.reason+'</td><td>'+
                            moment(info.created_at).format('DD/MM/YYYY h:mm:ss a')+
                            '</td></tr>';
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
        // Listar las negaciones
        // Modificar el estatus de la revista
          $(document).on('click','#status', function() {
            var x = $(this).attr("value");
            $("#FormStatus").on('submit', function(e){
              var gif = "{{ asset('/sistem_images/loading.gif') }}";
              swal({
                title: "Procesando la información",
                text: "Espere mientras se procesa la información.",
                icon: gif,
                buttons: false,
                closeOnEsc: false,
                closeOnClickOutside: false
              });
              var s = $("input[type='radio'][name=status]:checked").val();
              var message = $('#razon').val();
              var url = "{{url('/admin_megazine/')}}/"+x;
              console.log(url);
              e.preventDefault(); 
              console.log(s);
              $.ajax({
                url: url,
                type: 'POST',
                data: {
                  _token: $('input[name=_token]').val(),
                  status: s,
                  message: message
                }, 
                success: function (result) {
                  console.log(result);
                  $('#myModal').toggle();
                  $('.modal-backdrop').remove();
                  swal("Se ha "+s+" con éxito","","success")
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
                },
              });
            });
          });
          // Modificar el estatus de la revista

    </script>
@endsection