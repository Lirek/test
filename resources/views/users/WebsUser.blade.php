@extends('layouts.app')

@section('main')     
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
         <input type="hidden" name="id" id="id" value="{{Auth::user()->created_at}}">
        <div class="row mtbox" style="margin-top: 2%">

        <div class="col-md-12 col-sm-12 mb" style="margin-left: ">
          <div class="white-panel refe">
            <div class="white-header">
                <h5><i class="fa fa-user"></i>Total de referidos:</h5>
            </div>
            <div class="row white-size">
                <div class="col-sm-6 col-xs-6 gocenterRed ">
                  <p>
                    <h2><a href="#">
                      {{$referals1+$referals2+$referals3}}
                    </a></h2>
                    <h6>Este es el total de referidos de tres generaciones de personas que llegaron a Leipel gracias a ti. Te lo agredecemos!</h6>
                  </p>
                </div>
            </div>
          </div>
        </div><!-- /col-md-5 -->
        <!--REFERIR-->
                    @if(Auth::user()->UserRefered()->count()==0) 
                    <div class="col-md-12 col-sm-12 mb" id="referir">
                      <div class="white-panel panRf refe donut-chart">
                        <div class="white-header">
                            <h5>Agregar codigo de patrocinador</h5>
                        </div>
                          <div class="row">
                            <div class="col-sm-10 col-xs-10 col-md-10 goleft">
                              <p><i class="fa fa-user" style="color: #23b5e6;"></i></p>
                              <div class="paragraph">
                                <p class="center " id="mensaje"></p>
                                 <p><a href="#" class="buttonCenter" data-toggle="modal" data-target="#myModalRefe">Agregar</a></p>

                                <!--MODAL-->
                                  <div id="myModalRefe" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Ingrese el codigo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form class="form-horizontal" method="POST" action="{{url('Referals')}}" enctype="multipart/form-data" id="patrocinador">{{ csrf_field() }}

                                              <div class="form-group{{ $errors->has('codigo') ? ' has-error' : '' }}">
                                                      <label for="codigo" class="col-md-4 control-label">Codigo</label>
                                                      <div class="col-md-6">
                                                          <input id="codigo" type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" required="required">
                                                          <div id="codigoMen"></div>
                                                      </div>

                                              </div>
                                               <div class="form-group">
                                                  <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary" id='ingresar'>Ingresar</button>
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

                              </div> 
                           </div>
                          </div>
                        </div>
                      </div>
                      @endif
        @if ($refered != null)
        <h5 style="margin-left: 3%">Mis referidos directos:</h5>
        <div class="col-md-12 col-sm-12" style="margin-left: 1%; margin-top: 1%">
          
          @foreach($refered as $refereds)
              <div class="col-sm-2 col-xs-3 col-md-1">
                @if($refereds->img_perf)
                  <img src="{{asset($refereds->img_perf)}}" class="img-circle" width="60"></a>
                @else
                   <img src="{{asset('sistem_images/DefaultUser.png')}}" class="img-circle" width="60">
                @endif
              </div>
              <div class="col-sm-3 col-xs-3 col-md-3" style="margin-top: 1%">
                {{$refereds->name}}
              </div>
          @endforeach
        </div>
        @endif
       
                      
        </div><!-- /row --> 
           

          @endsection

@section('js')
<script type="text/javascript">
  document.querySelector('#patrocinador').addEventListener('submit', function(e) {
  var form = this;

  e.preventDefault(); // <--- prevent form from submitting
  var cod=$('#codigo').val();
  $.ajax({
                    
      url:'sponsor/'+cod,
      type: 'get',
      dataType: "json",           
      success: function (result) 
                {
                if(result.img_perf==null){
                  perfil = "{!! asset('/sistem_images/DefaultUser.png') !!}"
                }else{
                  perfil=result.img_perf;
                }
                if (result != 0)
                {

                  swal({
                      // title: "Are you sure?",
                      text: "¿Esta ingresando como patrocinador a: "+result.name+"?",
                      // icon: "warning",
                      icon: 'info',

                      buttons: {
                        
                        accept:  'Aceptar',
                                  
                                
                        cancel: 'Cancelar',
                                
                        
                      },
                      dangerMode: true,
                    }).then(function(isConfirm) {
                      if (isConfirm) {
                          
                            form.submit(); // <--- submit form programmatically
                          
                        } else {
                          $('#patrocinador')[0].reset();
                        }
                      })
                    }else{
                      $('#codigoMen').show();
                      $('#codigoMen').text('El codigo es incorrecto');
                      $('#codigoMen').css('color','red');
                  }
                
                }
                })
  });

</script>
<script type="text/javascript">
  $(document).ready(function(){
  var f1 = document.getElementById('id').value;
  var f = new Date();
  var f2=f.getDate() + "/" +(f.getMonth()+1 )+ "/" + f.getFullYear();

  var tiempo=restaFechas(f1,f2);
  if (tiempo > 15){
    document.getElementById('referir').style.display='none';  
  }else{
    var total=14-tiempo;
    console.log(tiempo);
    document.getElementById('mensaje').innerHTML='Usted cuenta con '+total +' dias para agregar un patrocinador';
  }

});
restaFechas = function(f1,f2)
 {
 var aFecha1 = f1.split('-');
 var dFecha= aFecha1[2].split(' ');
 var aFecha2 = f2.split('/');
 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,dFecha[0]);
 var fFecha2 = Date.UTC(aFecha2[2],aFecha2[1]-1,aFecha2[0]);
 var dif = fFecha2 - fFecha1;
 var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
 return dias;
 }
</script>
@endsection