@extends('promoter.layouts.app')
@section('main')

    <span class="card-title grey-text"><h3>Libros y Sagas de libros</h3></span>
    
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab" id="televisoras"><a class="active" href="#test1">Libros</a></li>
        <li class="tab" id="televisorasSistema"><a href="#test2">Sagas de Libros</a></li>
    </ul>
    <div id="test1" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="Revision"><a class="active" id="tvsp">Libros pendientes</a></li>
            <li class="tab" id="Aprobado"><a id="tvsa">Libros aprobados</a></li>
            <li class="tab" id="Negado"><a id="tvsn">Libros rechazados</a></li>
        </ul>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Portada</th>
                    <th>Restricción</th>
                    <th>Proveedor</th>
                    <th>Descripción</th>
                    <th>Saga,Trilogia u otro</th>
                    <th>Costo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody id="libro">
            </tbody>
        </table>
    </div>
    <div id="test2" class="col s12">
        <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="cursor: pointer;">
            <li class="tab" id="RevisionPu"><a class="active">Sagas pendientes</a></li>
            <li class="tab" id="AprobadoPu"><a>Sagas aprobadas</a></li>
            <li class="tab" id="NegadoPu"><a>Sagas rechazadas</a></li>
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

@include('promoter.modals.BookViewModal')
@endsection

@section('js')
    <script>

// funcion para listas las sagas
        function listadoPu(status) {
            $("#publicaciones").empty();
            var parametros = status;
            var ruta = "{{url('BSagasDataTable')}}"+"/"+parametros;
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
                            var opcion = "<button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#Modal' id='statusPU'>"+info.status+"</button>"
                        }
                        if (info.status=="Aprobado") {
                            var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="StatusPU">'+info.status+'</button>'
                        }
                        if (info.status=="Denegado") {
                            var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="StatusPU">'+info.status+'</button>'
                        }

                        var filas = "<tr><td>"+
                        info.sag_name+"</td><td>"+
                        portada+"</td><td>"+
                        info.rating.r_name+"</td><td>"+
                        info.seller.name+"</td><td>"+
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

        // Modificar el estatus de las sagas
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
              var url = "{{url('/statusSaga/')}}/"+x;
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
          // Modificar el estatus de las sagas

        // funcion para listas las libross
        function listado(status) {
            $("#libro").empty();
            var parametros = status;
            var ruta = "{{url('BooksData')}}"+"/"+parametros;
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
                            var opcion = "<a class='btn curvaBoton' target='_blank' href='{!! asset('images/bookcover/') !!}/{!! '"+info.books_file+"' !!}' href='#file' id='file_b'>Ver libro</a> <button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button>"

                            // <a class='btn curvaBoton' id='#megazine_filess' href='' value='"+info.megazine_file+"' target='_blank'>ver revista</a> <button class='btn modal-trigger curvaBoton green' value='"+info.id+"' value2='En Revision' href='#myModal' id='status'>"+info.status+"</button>
                        }
                        if (info.status=="Aprobado") {
                            var opcion = '<button class="btn curvaBoton green" value='+info.id+' id="Status">'+info.status+'</button>'
                        }
                        if (info.status=="Denegado") {
                            var opcion = '<button class="btn curvaBoton red" value='+info.id+' id="Status">'+info.status+'</button>'
                        }

                        var filas = "<tr><td>"+
                        info.title+"</td><td>"+
                        portada+"</td><td>"+
                        info.rating.r_name+"</td><td>"+
                        info.seller.name+"</td><td>"+
                        info.sinopsis+"</td><td>"+
                        saga+"</td><td>"+
                        info.cost+"</td><td>"+
                        opcion+"</td></tr>";
                        $("#libro").append(filas);
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
        // funcion para listas las libros

        // Modificar el estatus de los libros
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
              var url = "{{url('/books_status/')}}/"+x;
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
          // Modificar el estatus de los libros

    </script>
@endsection