@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Autores
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h3 class="box-title">Autores</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Nombre completo</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                @if(Auth::guard('web_seller')->user()->id === $author->seller_id)
                                    <tr>
                                        <td class="text-center"> {{ $author->seller->name }} </td>
                                        <td class="text-center"> {{ $author->full_name }} </td>
                                        <td class="text-center"> {{ $author->email_c }} </td>
                                        <td class="text-center ">
                                            <a href="{{ route('authors_books.destroy',$author->id) }}"
                                               onclick="return confirm('¿ Desea eliminar la autor  {{ $author->full_name }}?')"
                                               class="btn btn-danger active ">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('authors_books.edit', $author->id) }}"
                                               class="btn btn-warning active">
                                                <span class="glyphicon glyphicon-wrench"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('authors_books.show', $author->id) }}"
                                               class="btn btn-info active">
                                                <span class="fa fa-play-circle" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Nombre completo</th>
                                <th class="text-center">Email</th>
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

        <div class="col-md-offset-10">
            <a href="{{ route('authors_books.create') }}" class="btn btn-info">
                <span class="fa fa-address-book-o">&nbsp;
                    <b>
                        <i> Autor </i>
                    </b>
                </span>
            </a>
        </div>
    </section>

@endsection

@section('js')

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