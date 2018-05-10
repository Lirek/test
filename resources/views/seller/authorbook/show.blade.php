@extends('seller.layouts')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Autor
        </h1>
        {{--<ol class="breadcrumb">--}}
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li class="active">Dashboard</li>--}}
        {{--</ol>--}}
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- box -->
                <div class="box box-primary">
                    <div class="box-header bg bg-black-gradient">
                        <h2 class="box-title"> {{ $author->full_name }}</h2>
                        <div class="widget-user-image pull-right">
                            <img class="img-rounded img-responsive av" src="/images/authorbook/{{ $author->photo}}"
                                 style="width:80px;height:80px;" alt="User Avatar">
                        </div>
                        <!-- /.widget-user-image -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Productora</th>
                                <th class="text-center">autor</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Portada del libro</th>
                                {{--<th class="text-center">Acciones</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            {{--{{ dd($author, $book,$autor) }}--}}
                            @foreach($book as $b)
                                @if($author->id === $b->author->id)
                                    <tr>
                                        <td class="text-center"> {{ $b->id }} </td>
                                        <td class="text-center"> {{ $b->seller->name }} </td>
                                        <td class="text-center"> {{ $b->author->full_name }} </td>
                                        <td class="text-center"> {{ $b->title }} </td>
                                        <td class="text-center">
                                            <a href="{{ route('tbook.show', $b->id) }}">
                                                <img class=" img-circle " src="/images/bookcover/{{ $b->cover }}"
                                                     style="width:50px;height:50px;" alt="Portada">
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
                                <th class="text-center">Codigo</th>
                                <th class="text-center">Productora</th>
                                <th class="text-center">autor</th>
                                <th class="text-center">Titulo</th>
                                <th class="text-center">Portada del libro</th>
                                {{--<th class="text-center">Acciones</th>--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
    </section>

@endsection