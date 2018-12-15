@extends('seller.layouts')
@section('css')
    <!--DataTables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <div class="widget-user-image pull-right">
                            <img class="img-rounded img-responsive av" src="{{ asset('images/authorbook')}}/{{ $author->photo}}" style="width:80px;height:80px;" alt="User Avatar">
                        </div>
                        <h2 class="box-title"><b>Autor:</b> {{ $author->full_name }}</h2>
                        <!-- /.widget-user-image -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive" style="padding-top: 10%;">
                        @if(count($book)!=0)
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Título original</th>
                                    <th class="text-center">Portada del libro</th>
                                    <th class="text-center">Fecha de publicación</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Productora</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($book as $b)
                                        <tr>
                                            <td class="text-center"> {{ $b->title }} </td>
                                            <td class="text-center"> {{ $b->original_title }} </td>
                                            <td class="text-center">
                                                <a href="{{ route('tbook.show', $b->id) }}">
                                                    <img class=" img-rounded" src="{{ asset('images/bookcover')}}/{{ $b->cover }}" style="width:50px;height:50px;" alt="Portada">
                                                </a>
                                            </td>
                                            <td class="text-center"> {{ $b->release_year }} </td>
                                            <td class="text-center"> {{ $b->cost }} </td>
                                            <td class="text-center"> {{ $author->seller->name }} </td>
                                        </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">Título</th>
                                    <th class="text-center">Título original</th>
                                    <th class="text-center">Portada del libro</th>
                                    <th class="text-center">Fecha de publicación</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Productora</th>
                                </tr>
                                </tfoot>
                            </table>
                        @else
                            <div align="center" style="padding: 10%;">
                                <h2>Este autor aún no tiene libros asociados</h2>
                            </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="form-group">
                    <a href="{{ route('authors_books.index') }}" class="btn btn-danger">Atrás</a>
                </div>
                <!-- /.box -->
            </div>
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