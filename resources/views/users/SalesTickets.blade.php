@extends('layouts.app')

@section('main') 

<div class="row">
    <div class="form-group"> 
        <div class="row-edit">
            <div class="col-md-12 col-sm-12 mb">
                <div class="control-label">
                    <div class="white-header">
                        <h3><span class="card-title"><i class="fa fa-angle-right"> Paquetes de tickets</i></span></h3>           
                    </div>
                    @foreach($package as $ticket)
                    <div class="col-md-6 col-sm-6 mb" id="referir" style="margin-left: 2%:">
                      <div class="white-panel panRf  donut-chart">
                        <div class="white-header" style="padding: 45px">
                            <span><i class="fa fa-ticket" style="font-size: 50px"></i><h1>{{$ticket->name}}</h1></span>
                        </div>
                          <div class="row">
                            <div class="col-sm-10 col-xs-10 col-md-10">
                              <h3 style="margin-left: 20%">Obtenga {{$ticket->amount}} Tickets</h3>
                              <h3 style="margin-left: 20%"><b>Costo:</b> ${{$ticket->cost}} (Incluido IVA)</h3>
                              <div class="paragraph">
                                <p class="center " id="mensaje"></p>
                               
                                        <p style="margin-left: 10%; margin-bottom: 2%;"><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModal-{{$ticket->id}}"><h4>Adquirir</h4></a></p>
                                   
                                
                              </div> 
                           </div>
                          </div>
                        </div>
                    </div>

                                                    <!--MODAL-->
                     <div id="myModal-{{$ticket->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" align="center"><i class="fa fa-ticket"></i> {{$ticket->name}}</h4>   
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" method="POST" action="{{url('BuyPlan')}}" enctype="multipart/form-data">{{ csrf_field() }}
                                    <input type="hidden" name="ticket_id" value="{{$ticket->id }}">
                                     <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="{{asset('assets/img/tickets.png')}}" class="img-responsive center-block">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 align="center"><b>Cantidad de tickets:</b> {{$ticket->amount}}</h5>
                                        <input type="hidden" name="cost" id="cost" value="{{$ticket->cost}}">
                                        <h5 align="center"><b>Costo: </b>{{$ticket->cost}}$</h5> 
                                    </div>
                                    <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                        <label for="codigo" class="col-md-2 col-sm-2 col-xs-12 control-label" style="margin-left:35% "><b>Cantidad:</b></label>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input type="number" min="1" max="20" value="1" class="form-control input-sm" name="Cantidad" id="Cantidad" value="{{ old('Cantidad') }}" onkeypress="return controltagNum(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="total">
                                                  
                                    </div>
                                    <h5 align="center"><b>Método de pago</b></h5>
                                    <div class="radio" align="center">
                                        <label>
                                            <input type="radio" name="pago" id="pago" value="Deposito" required><i class="fa fa-money"> Deposito</i>
                                        </label>
                                    </div>
                                    <div class="col-md-12" style="display:none;" id="deposito" align="center">
                                        <input id="voucher" type="file" accept=".jpg" class="form-control" name="voucher" value="{{ old('voucher') }}" required="required">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12" align="center" style="margin-top: 2%">
                                            <button type="submit" class="btn btn-primary" id='ingresar'>Comprar</button>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--FIN DEL MODAL--> 
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){
            var costo=parseFloat($('#cost').val());
            var documento = $('#Cantidad').val();
            var total=parseFloat(costo*documento);
            $("#Cantidad").change(function(){
                documento=parseFloat($('#Cantidad').val());
                total=parseFloat(costo*documento);

            });
            $("#Cantidad").keyup(function(){
                documento=parseFloat($('#Cantidad').val());
                total=parseFloat(costo*documento);
                if (isNaN(total)) {
                    total = 0;
                }
                $('#total').html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');

            });
            $(':input[type="number"]').click(function (){
                documento=parseFloat($('#Cantidad').val());
                total=parseFloat(costo*documento);
                if (isNaN(total)) {
                    total = 0;
                }
                $('#total').html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
                });

            $('#total').html('<h5 align="center"><b>Total a pagar:</b> ' +total+ ' $</h5><hr>');
        
    });
function controltagNum(e) {
        tecla = (document.all) ? e.keyCode : e.which; 
        if (tecla==8) return true; // para la tecla de retroseso
        else if (tecla==0||tecla==9)  return true; //<-- PARA EL TABULADOR-> su keyCode es 9 pero en tecla se esta transformando a 0 asi que porsiacaso los dos
        else if (tecla==13) return true;
        patron =/[0-9]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te); 
    }
$(document).ready(function(){
        $("#pago").click(function(evento){
          
            var valor = $(this).val();
          
            if(valor == 'Deposito'){
                $("#deposito").css("display", "block");
            }else{
                $("#deposito").css("display", "none");
            }
    });
});
</script>
@endsection