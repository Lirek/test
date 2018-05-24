@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Registro
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h3 class="box-title"><b> <i> Peliculas </i> </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Portada</th>
                                {{--<th class="text-center">Productora</th>--}}
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movie as $m)
                                {{--{{ dd($m) }}--}}
                                @if(Auth::guard('web_seller')->user()->id === $m->seller_id)

                                    <tr>
                                        <td class="text-center"> {{ $m->id }} </td>
                                        <td class="text-center"> {{ $m->title }} </td>
                                        <td class="text-center"> {{ $m->rating->r_name }} </td>
                                        <td class="text-center"> {{ $m->saga->sag_name }} </td>
                                        {{--<td class="text-center"> {{ $s->seller->name }} </td>--}}
                                        <td class="text-center ">
                                            <a href="#">
                                                <img class=" img-circle " src="/movie/poster/{{ $m->img_poster }}"
                                                     style="width:50px;height:50px;" alt="Portada">
                                            </a>
                                        </td>
                                        <td class="text-center ">
                                            <a href="{{ route('movies.destroy',$m->id) }}"
                                               onclick="return confirm('¿ Desea eliminar el libro  {{ $m->title }}?')"
                                               class="btn btn-danger active ">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('movies.edit', $m->id) }}"
                                               class="btn btn-warning active">
                                                <span class="glyphicon glyphicon-wrench"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('movies.show', $m->id) }}"
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
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Rating</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Portada</th>
                                {{--<th class="text-center">Productora</th>--}}
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
            <a href="{{ route('movies.create') }}" class="btn btn-info">
                <span class="fa fa-address-book-o">&nbsp;
                    <b>
                        <i> Agregar </i>
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