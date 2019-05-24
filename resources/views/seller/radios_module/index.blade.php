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
                                <th class="active text-center "><strong> ID </strong></th>
                                <th class="active text-center "><strong> Nombre </strong></th>
                                <th class="active text-center "><strong> Accion </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $radio as $r )
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
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="active text-center "><strong> ID </strong></th>
                                <th class="active text-center "><strong> Nombre </strong></th>
                                <th class="active text-center "><strong> Accion </strong></th>
                            </tr>
                            </tfoot>
                        </table>
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

    </section>

@endsection

@section('js')

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <script>
        $(function () {
            $('#example1').DataTable()
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