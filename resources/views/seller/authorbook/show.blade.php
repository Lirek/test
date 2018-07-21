@extends('seller.layouts')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h2 class="box-title"><b>Autor:</b> {{ $author->full_name }}</h2>
                        <div class="widget-user-image pull-right">
                            <img class="img-rounded img-responsive av" src="{{ asset('images/authorbook')}}/{{ $author->photo}}" style="width:80px;height:80px;" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Portada del Libro</th>
                                {{--<th class="text-center">Acciones</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($book as $b)
                                @if($author->id === $b->author->id)
                                    <tr>
                                        <td class="text-center"> {{ $b->id }} </td>
                                        <td class="text-center"> {{ $b->seller->name }} </td>
                                        <td class="text-center"> {{ $b->author->full_name }} </td>
                                        <td class="text-center"> {{ $b->title }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('tbook.show', $b->id) }}">
                                                <img class=" img-rounded" src="{{ asset('images/bookcover')}}/{{ $b->cover }}" style="width:50px;height:50px;" alt="Portada">
                                            </a>
                                        </td>
                                        {{--<td class="text-center ">--}}
                                        {{--<a href="{{ route('authors_books.destroy',$a->id) }}"--}}
                                        {{--onclick="return confirm('¿ Desea eliminar la autor  {{ $a->full_name }}?')"--}}
                                        {{--class="btn btn-danger active ">--}}
                                        {{--<span class="glyphicon glyphicon-remove-circle"></span>--}}
                                        {{--</a>--}}
                                        {{--&nbsp;--}}
                                        {{--<a href="{{ route('authors_books.edit', $a->id) }}"--}}
                                        {{--class="btn btn-warning active">--}}
                                        {{--<span class="glyphicon glyphicon-wrench"></span>--}}
                                        {{--</a>--}}
                                        {{--&nbsp;--}}
                                        {{--<a href="{{ route('authors_books.show', $a->id) }}"--}}
                                        {{--class="btn btn-info active">--}}
                                        {{--<span class="fa fa-play-circle" aria-hidden="true"></span>--}}
                                        {{--</a>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Productora</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Portada del Libro</th>
                                {{--<th class="text-center">Acciones</th>--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="form-group">
                    <a href="{{ url('/authors_books') }}" class="btn btn-danger">Atrás</a>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection