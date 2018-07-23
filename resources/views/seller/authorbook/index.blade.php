@extends('seller.layouts')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @include('flash::message')
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h3 class="box-title">Autores Registrados</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nombre Completo</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                @if(Auth::guard('web_seller')->user()->id === $author->seller_id)
                                    <tr>
                                        <td class="text-center"> {{ $author->seller->name }} </td>
                                        <td class="text-center">
                                            <img class="img-rounded text-center" src="{{ asset('images/authorbook')}}/{{ $author->photo }}"style="width:50px;height:50px;" alt="Foto de Perfil">
                                        </td>
                                        <td class="text-center"> {{ $author->full_name }} </td>
                                        <td class="text-center"> {{ $author->email_c }} </td>
                                        <td class="text-center ">
                                            <a href="{{ route('authors_books.show', $author->id) }}" class="btn btn-info btn-xs">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <a href="{{ route('authors_books.edit', $author->id) }}" class="btn btn-warning btn-xs">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            <a href="{{ route('authors_books.destroy',$author->id) }}" onclick="return confirm('¿Desea eliminar el Autor: {{ $author->full_name }}?')" class="btn btn-danger btn-xs">
                                               <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nombre Completo</th>
                                <th class="text-center">Correo</th>
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
        <br>
        <div class="col-md-offset-9">
            <a href="{{ route('authors_books.create') }}" class="btn btn-info">
                <b class="box-header with-border bg bg-black-gradient">
                    <div class="box-title">
                        <i class="fa fa-user"></i>
                        <span>
                            Agregar más Autores
                        </span>
                    </div>
                </b>
            </a>
        </div>
    </section>

@endsection

@section('js')
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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