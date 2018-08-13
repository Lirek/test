@extends('seller.layouts')
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
                                    <th class="text-center">Autor</th>
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
                                    <th class="text-center">Autor</th>
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
                    <a href="{{ url('/authors_books/index/') }}" class="btn btn-danger">Atrás</a>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection