@extends('seller.layouts')
@section('css')

@endsection
@section('content')

    <!--
    <div class="row">
        <div class="col  s12 offset-s0 m10 offset-m1 l8 offset-l3">
            <ul class="tabs">
                <li class="tab col s4 "><a  href="#test1"><i class="material-icons" style="vertical-align: middle;">timeline</i>&nbsp;<b>Mi Balance</b></a></li>
                <li  class="tab col s4"><a href="#test2"><i class="material-icons" style="vertical-align: middle;">add_circle_outline</i>&nbsp;<b>Detalles</b></a></li>
            </ul>
        </div>
  -->

    <h4 class="titelgeneral"><i class="material-icons small">timeline</i> Mi Balance</h4>

        <div id="test1" class="col s12 m12 l12">
            <br>
            <div class="row">
                @if(Auth::guard('web_seller')->user()->credito || $diferido || Auth::guard('web_seller')->user()->credito_pendiente)
                <div class="col s12 m6 l6">
                    <br><br>
                    <canvas id="myChart" height="300" width="400"></canvas>
                </div>
                @else
                    <div class="col s12 m6 l6">
                        <br><br>
                        <blockquote >
                            <i class="material-icons fixed-width large grey-text">sentiment_very_dissatisfied</i><br><h5 blue-text text-darken-2>No posee Puntos</h5>
                        </blockquote>
                    </div>
                @endif

                <div class="col col s12 m6 l6">
                    <br>
                    <ul class="collapsible popout">
                        <li class="active">
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Disponible</h6></div>
                            <div class="collapsible-body"><a class="btn-floating btn-large  blue lighten-2"><b>{{Auth::guard('web_seller')->user()->credito}}</b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Diferidos</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  amber lighten-2"> <b>{{ $diferido}}</b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd;"><h6 class="grey-text">Tickets Pendientes</h6></div>
                            <div class="collapsible-body"> <a class="btn-floating btn-large deep-orange lighten-2 "> <b>{{Auth::guard('web_seller')->user()->credito_pendiente}}</b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Pagados</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  green  lighten-2"> <b>{{ $pagado}}</b></a><br><br></div>
                        </li>
                        <li>
                            <div class="collapsible-header center" style="display: block; border-bottom: 0px solid #ddd; "><h6 class="grey-text">Tickets Rechazados</h6></div>
                            <div class="collapsible-body">  <a class="btn-floating btn-large  red lighten-2"> <b>{{ $rechazado}}</b></a><br><br></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    <br><br> <br><br>
    <h5 class="left grey-text" ><i class="material-icons small">add_circle_outline</i> Detalles</h5>
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

<div class="row center">
<div class="col s12 m12">
        <!--  Paginacion material -->
        <?php /*Nuevo*/ $Balance->setPath('') ?>
        {!!$Balance->appends(Input::except('page'))->render() !!}
</div>
</div>

        </div>
    </div>




@endsection
@section('js')

<script>

    $(document).ready(function(){
        // grafica de disponibilidad
        $.ajax({
            url:"{{url('BalanceSellerGraph')}}",
            type:'GET',
            success:function(info) {
                console.log(info);
                var ctx = $("#myChart");
                var data = {
                    datasets: [{
                        data: info,
                        backgroundColor: [
                            '#64B5F6',
                            '#ff8a65',
                            '#ffd54f'
                        ],
                        borderColor: [
                            '#fff'
                        ],
                        borderWidth: 5
                    }],
                    labels:
                   ["Disponibles", "Pendientes", "Diferidos"],
                };

                var myPieChart = new Chart(ctx,{
                    type: 'doughnut',
                    data: data,
                    options: {

                        legend: {
                            position: 'bottom'
                        },
                    }
                });
            },
            error:function(info) {
                console.log(info);
            }

        });
        // grafica de doughnut disponibilidad seller
    });



   $(document).ready(function()
   {
       $(document).on('click', '.pagination a',function(event)
       {

           $('ul.tabs').tabs();
           $('ul.tabs').tabs('select_tab', 'test2');


       });
   });


</script>
@endsection