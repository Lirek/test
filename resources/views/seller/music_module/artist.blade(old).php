@extends('seller.layouts')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('flash::message')
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header with-border bg bg-black-gradient">
                        <h3 class="box-title">Artistas o grupos registrados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center" width="80">Descripción</th>
                                <th class="text-center">Tipo de artista</th>
                                <th class="text-center">Redes sociales</th>
                                <th class="text-center">Estatus</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($artists as $a)
                                @if(Auth::guard('web_seller')->user()->id === $a->seller_id)
                                    <tr>
                                        <td class="text-center"> {{ $a->name }} </td>
                                        <td class="text-center">
                                            <a href="#">
                                                <img class="img-rounded img-responsive text-center" src="{{ asset($a->photo) }}" style="width:70px;height:70px;margin-left:5%;" alt="Foto">
                                            </a>
                                        </td>
                                        <td class="text-center"> {{ $a->descripcion }} </td>
                                        <td class="text-center"> {{ $a->type_authors }} </td>
                                        <td class="text-center">
                                            @if($a->instagram!=null)
                                                <a href="{{ $a->instagram }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-instagram"></i></span>
                                                        Instagram
                                                    </h5>
                                                </a>
                                            @endif
                                            @if($a->facebook!=null)
                                                <a href="{{ $a->facebook }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-facebook-square"></i></span>
                                                        Facebook
                                                    </h5>
                                                </a>
                                            @endif
                                            @if($a->google!=null)
                                                <a href="{{ $a->google }}" target="_blank">
                                                    <h5>
                                                        <span><i class="fa fa-youtube-square"></i></span>
                                                        Youtube
                                                    </h5>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="text-center"> {{ $a->status }} </td>
                                        <td class="text-center ">
                                            <a href="{{ url('/editArtist', $a->id) }}"
                                               class="btn btn-warning btn-xs">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="{{ url('deleteArtist',$a->id) }}"
                                               onclick="return confirm('¿Desea eliminar el artista {{ $a->name }}?')" class="btn btn-danger btn-xs ">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center" width="80">Descripción</th>
                                <th class="text-center">Tipo de artista</th>
                                <th class="text-center">Redes sociales</th>
                                <th class="text-center">Estatus</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div class="col-md-offset-9">
            <a href="{{ url('/artist_form') }}" class="btn btn-info">
                <b class="box-header with-border bg bg-black-gradient">
                    <div class="box-title">
                        <i class="fa fa-user"></i>
                        <span>
                            Agregar más artistas
                        </span>
                    </div>
                </b>
            </a>
        </div>
    </section>
@endsection
@section('js')
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable({
                "language": {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection