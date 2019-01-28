@extends('seller.layouts')
@section('css')
    <style>
        .default_color{background-color: #FFFFFF !important;}
        .img{margin-top: 7px;}
        .curva{border-radius: 10px;}
        .curvaBoton{border-radius: 20px;}
        /*Color letras tabs*/
        .tabs .tab a{
            color:#00ACC1;
        }
        /*Indicador del tabs*/
        .tabs .indicator {
            display: none;
        }
        .tabs .tab a.active {
            border-bottom: 2px solid #29B6F6;
        }
        /* label focus color */
        .input-field input:focus + label {
            color: #29B6F6 !important;
        }
        /* label underline focus color */
        .row .input-field input:focus {
            border-bottom: 1px solid #29B6F6 !important;
            box-shadow: 0 1px 0 0 #29B6F6 !important
        }
        .card{
            height:480px;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            @include('flash::message')
            <div class="card-panel curva">
                <h4 class="titelgeneral"><i class="material-icons small">radio</i> Radios registradas</h4>
                <div class="row">
                    @if($radio->count() != 0 )
                        @foreach($radio as $r)
                            @if(Auth::guard('web_seller')->user()->id === $r->seller_id)
                                <div class="col s12 m4 l3">
                                    <div class="card">
                                        <div class="card-image">
                                            <a href="{{ route('radios.show', $r->id) }}">
                                                <img src="{{ asset($r->logo) }}" width="100%" height="300px">
                                            </a>
                                            <a class="btn-floating halfway-fab waves-effect waves-light blue" href="{{ route('radios.edit', $r->id) }}">
                                                <i class="material-icons">create</i>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="col m12">
                                                <h6>{{ $r->name_r }}</h6>
                                            </div>

                                            @if($r->web!=null)
                                                <a href="{{$r->web}}" target="_blank" class="btn-floating grey"><i class="mdi mdi-earth"></i></a>
                                            @endif
                                            @if($r->facebook!=null)
                                            <a href="{{$r->facebook}}" target="_blank" class="btn-floating blue darken-4"><i class="mdi mdi-facebook"></i></a>
                                            @endif
                                                @if($r->google!=null)
                                                <a  href="{{$r->google}}" target="_blank" class="btn-floating red accent-4"><i class="mdi mdi-youtube"></i></a>
                                            @endif
                                                @if($r->twitter!=null)
                                                    <a href="{{$r->twitter}}" target="_blank" class="btn-floating blue lighten-2"><i class="mdi mdi-twitter"></i></a>
                                            @endif
                                            @if($r->instagram!=null)
                                            <a href="{{$r->instagram}}" target="_blank" class="btn-floating purple-gradient darken-2"><i class="mdi mdi-instagram"></i></a>
                                            @endif

                                            <div class="col m12">
                                                <small><b>Estatus:</b> {{ $r->status }}</small>
                                            </div>
                                            {{--
                                            <small><b>N° de compras</b> {{$r->transaction->count()}}</small>
                                            --}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col s12">
                            {{$radio->links()}}
                        </div>
                    @else
                        <div class="col m12">
                            <blockquote>
                                <i class="material-icons fixed-width large grey-text">radio</i><br><h5>No posee radios registradas</h5>
                            </blockquote>
                            <br>
                        </div>
                    @endif
                </div>
                <a href="{{ route('radios.create') }}" class="btn curvaBoton waves-effect waves-light green">   
                    <span>Agregar más radios</span>
                </a>       
            </div>
        </div>
    </div>
    {{--
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
    --}}


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