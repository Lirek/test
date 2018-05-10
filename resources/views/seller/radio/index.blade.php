@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Radio
        </h1>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h3 class="box-title">Emisoras</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="active text-center "><strong> Codigo </strong></th>
                                <th class="active text-center "><strong> Nombre </strong></th>
                                <th class="active text-center "><strong> Accion </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $radio as $r )
                                @if(Auth::guard('web_seller')->user()->id === $r->seller_id)
                                    <tr>
                                        <td class="text-center">{{ $r->id }}</td>
                                        <td class="text-center">{{ $r->name_r }}</td>
                                        <td class="text-center ">
                                            <a href="{{ route('radios.destroy',$r->id) }}"
                                               onclick="return confirm('¿ Desea eliminar la emisora  {{ $r->name_r }}?')"
                                               class="btn btn-danger active ">
                                                <span class="glyphicon glyphicon-remove-circle"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('radios.edit', $r->id) }}" class="btn btn-warning active">
                                                <span class="glyphicon glyphicon-wrench"></span>
                                            </a>
                                            &nbsp;
                                            <a href="{{ route('radios.show', $r->id) }}" class="btn btn-info active">
                                                <span class="fa fa-play-circle" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="active text-center "><strong> Codigo </strong></th>
                                <th class="active text-center "><strong> Nombre </strong></th>
                                <th class="active text-center "><strong> Accion </strong></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <br/>

            <div class="col-md-offset-10">
                <a href="{{ route('radios.create') }}" class="btn btn-info">
                <span class="glyphicon glyphicon-plus-sign">
                    <b>
                        <i> Radio </i>
                    </b>
                </span>
                </a>
            </div>

            <div class="text-center">
                {!! $radio->render() !!}
            </div>

        </div>

    </section>


@endsection

@section('js')

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

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
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>

@endsection