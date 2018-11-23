@extends('seller.layouts')
@section('css')
    <!--DataTables
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js">-->
@endsection
@section('content')


    <div class="row">
        <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
            <ul class="tabs">
                <li class="tab col s4"><a class="active" href="#test1"><i class="material-icons prefix">timeline</i><b>Mi Balance</b></a></li>
                <li class="tab col s4"><a  href="#test2"><i class="material-icons prefix">add_circle_outline</i><b>Detalles</b></a></li>

            </ul>
        </div>

        <div id="test1" class="col s12 m12 l12">
            <br>

            <div class="row">

                <div class="col s12 m6 l6">
                    <br><br>
                    <canvas id="myChart" height="300" width="400"></canvas>
                </div>
                <div class="col col s12 m6 l6">

                    <br>

                    <ul class="collapsible popout">
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd;"><h6 >Tickets Pendientes</h6></div>
                            <div class="collapsible-body"> <a class="btn-floating btn-large deep-orange lighten-2 "> <b>{{Auth::guard('web_seller')->user()->credito_pendiente}}</b></a><br><br></div>
                        </li>


                        <li class="active">
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6>Tickets Disponible</h6></div>
                            <div class="collapsible-body"><a class="btn-floating btn-large  blue lighten-2"><b>{{Auth::guard('web_seller')->user()->credito}}</b></a><br><br></div>
                        </li>


                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6>Tickets Diferidos</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  amber lighten-2"> <b>{{ $diferido}}</b></a><br><br></div>
                        </li>
                    </ul>

                </div>

            </div>

        </div>

        <div id="test2" class="col s12">
            <br>
            <table class="responsive-table">
                <thead>
                <tr>
                    <th><i class="material-icons ">date_range</i> Fecha</th>
                    <th> Concepto</th>
                    <th> Tipo</th>
                    <th> Estatus</th>
                    <th> <i class="material-icons ">add_circle</i></th>
                    <th><i class="material-icons ">do_not_disturb_on</i></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($Balance as $balance)
                    @if($balance != 0)
                        <tr>
                            <td>{{$balance['Date']}}</td>
                            @if($balance['Type']==1)
                                <td>Compra de {{$balance['Transaction']}} por {{$balance['User']}}</td>
                                <td>{{$balance['Content']}}</td>
                                <td>No aplica</td>
                            @else
                                <td>Solicitud de retiro de fondos</td>
                                <td>{{$balance['Transaction']}}</td>
                                <td>{{$balance['Content']}}</td>
                            @endif
                            @if($balance['Type']==1)
                                <td>{{$balance['Cant']}}</td>
                                <td></td>
                            @else
                                <td></td>
                                <td>{{$balance['Cant']}}</td>
                            @endif
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            <br>
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active blue"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>

        </div>

    </div>




@endsection
@section('js')

<script>

    $(document).ready(function(){
    // grafica de torta para las etiquetas por aprobar y las aprobadas


        var ctx = $("#myChart");


        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'doughnut',
            position: 'left',

            // The data for our dataset
            data: {
                labels: ["Disponibles", "Pendientes", "Diferidos"],
                datasets: [{

                    data: [90, 10, 5],
                    backgroundColor: [
                        '#64B5F6',
                        '#ff8a65',
                        '#ffd54f',
                    ],
                    borderColor: [
                        '#fff'
                    ],
                    borderWidth: 1

                }]


            },

            // Configuration options go here
            options: {

                legend: {
                    position: 'bottom'
                },



            }
        });
    // grafica de torta para las etiquetas por aprobar y las aprobadas

    });
</script>





@endsection