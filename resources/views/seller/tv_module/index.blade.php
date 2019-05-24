@extends('seller.layouts')

@section('content')

    <section class="content-header">
        <h1>
            Registro
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="text-center">
            <h2>
                <b>
                    <i>
                        <u> Canales de tv </u>
                    </i>
                </b>
            </h2>
        </div>
        <br/>
        <br/>

        <div class="-align-center">

            <table class="table table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <th class="active text-center "> <strong> ID </strong> </th>
                    <th class="active text-center "> <strong> Nombre </strong> </th>
                    <th class="active text-center "> <strong> Accion </strong> </th>
                    </thead>
                    <tbody>
                    @foreach( $tvs as $tv )
                        <tr>
                            <td class="text-center">{{ $tv->id }}</td>
                            <td class="text-center">{{ $tv->name_r }}</td>
                            <td class="text-center ">
                                {{--<form action="{{ route('radios.destroy', $tv->id) }}" method="POST">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                    {{--<button class="btn btn-danger"> Borrar</button>--}}
                                {{--</form>--}}
                                <a href="{{ route('tvs.destroy',$tv->id) }}"
                                   onclick="return confirm('¿ Desea eliminar la emisora  {{ $tv->name_r }}?')"
                                   class="btn btn-danger active ">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                </a>
                                &nbsp;
                                <a href="{{ route('tvs.edit', $tv->id) }}" class="btn btn-warning active">
                                    <span class="glyphicon glyphicon-wrench"></span>
                                </a>
                                &nbsp;
                                <a href="{{ route('tvs.show', $tv->id) }}" class="btn btn-info active">
                                    <span class="fa fa-play-circle" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </table>
        </div>
        <br />

        <div class="col-md-offset-11">
            <a href="{{ route('tvs.create') }}" class="btn btn-info">
                <span class="glyphicon glyphicon-plus-sign">
                    <b>
                        <i> tv </i>
                    </b>
                </span>
            </a>
        </div>

        <div class="text-center">
            {!! $tvs->render() !!}
        </div>

    </section>

@endsection

@section('js')

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>

@endsection