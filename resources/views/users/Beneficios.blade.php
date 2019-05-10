@extends('layouts.app')
@section('css')
@endsection
@section('main')

<div class="row">
  <div class="col s12 m12">
    <div class="col s12 m8">
    <h5 ALIGN="justify" >Leipel agradece con su árbol de beneficios a cualquier usuario que nos traiga más amigos que también compren tickets.
    Gana y acumula puntos para cambiarlos por los siguientes beneficios:</h5>
    <span style="padding-left: 40%">(Aplica al momento sólo en territorio ecuatoriano)</span>
    </div>
    <div class="col s12 m4">
      <iframe width="250" height="170" src="https://www.youtube.com/embed/NgnsW2M3X1A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
  @if($usuario->verify == 0 || $usuario->verify == 2)
    <div class="col s6 offset-s3">
        <br><br>
        <blockquote >
            <i class="material-icons fixed-width grey-text">mood_bad</i><br><h6 blue-text text-darken-2>Complete su registro para poder comprar los beneficios.</h6>
            <a href="{{url('EditProfile')}}">haga click aqui para completar su registro</a>
        </blockquote>
    </div>
    <div id="listaBeneficios" class="col s12 center">
      <ul class="tabs">
          <li class="tab col s6"><a class="active" href="#test01">Productos disponibles</a></li>
          <li class="tab col s6"><a href="#test02">Productos adquiridos</a></li>
      </ul>
      <div id="test01" class="col s12 center">
        @if($beneficio != "")
          @foreach($beneficio as $bene)
          <div  class="col m4 s6 ">
            <div class="card">
              <div class="slider">
                <ul class="slides">    
                  @for ($i=0; $i < count($bene->saveImg); $i++) 
                    <li>
                      <img src="{{ asset($bene->saveImg[$i]->imagen_prod) }}" height="100%" width="100%">
                    </li>
                  @endfor
                </ul>
              </div>
              <div class="card-action">
                  <span>Costo del producto: {{$bene->cost}} </span><br>
                  <small>Productos disponible: {{$bene->amount}} </small><br><br>
                  <a  href="{{asset($bene->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Detalles</a>
                  <a class="waves-effect waves-light btn curvaBoton modal-trigger disabled"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
                  <br>
              </div>
            </div>
          </div>
          <div class="modal" id="miModal-{!!$bene['id']!!}">
            <div class="modal-content">
              <div class="col s12 light-blue lighten-1 text-center">
                <h4 class="white-text" style="padding: 25px 0px">Cantidad de productos a canjear</h4>
              </div>
              <br>
              <div style="margin-top: 15%; margin-bottom: 15%">
                <form id="formProduct-{!!$bene['id']!!}">
                  {{ csrf_field() }}
                  <div class="input-field col s6 offset-s3">
                    {{ $errors->has('codigo') ? ' has-error' : '' }}
                    <input type="number" class="validate" min="1" max="{!!$bene['amount']!!}" name="Cantidad" id="Cantidad-{!!$bene['id']!!}" required="required" onkeypress="return controltagNum(event)">
                    <label for="">Cantidad de productos:</label>
                  </div>
                  <br>
                  <input type="hidden" name="" id="nameProduct-{!!$bene['id']!!}" value="{!!$bene['name']!!}">
                  <input type="hidden" name="" id="costProduct-{!!$bene['id']!!}" value="{!!$bene['cost']!!}">
                  <input type="hidden" name="" id="idProduct-{!!$bene['id']!!}" value="{!!$bene['id']!!}">
                  <div class="col s12">
                    <button class="btn btn-primary curvaBoton" type="submit">
                      Enviar
                    </button>
                    <br><br><br>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col s12">
              <br><br>
              <blockquote >
                <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>En este momento no tenemos promociones disponibles.</h5>
              </blockquote>
          </div>
        @endif
      </div>
        <div id="test02" class="col s12 center">
          <div class="col s12">
              <br><br>
              <blockquote >
                  <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>Usted todavia no ha adquirido ningun producto.</h5>
              </blockquote>
          </div>
        </div>
    </div>
    @else
   <div id="listaBeneficios" class="col s12 center">
      <ul class="tabs">
          <li class="tab col s4"><a class="active" href="#test01">Productos disponibles</a></li>
          <li class="tab col s4"><a href="#test02">Productos adquiridos</a></li>
          <li class="tab col s4"><a href="#test03">Productos entregados</a></li>
      </ul>

      <div id="test01" class="col s12 center">
        @if($beneficio != "")
          @foreach($beneficio as $bene)
           <div  class="col m4 s6 ">
              <div class="card">
                <div class="card-image">
                  <div class="slider">
                    <ul class="slides">    
                      @for ($i=0; $i < count($bene->saveImg); $i++) 
                        <li>
                          <img src="{{ asset($bene->saveImg[$i]->imagen_prod) }}" height="100%" width="100%">
                        </li>
                      @endfor
                    </ul>
                  </div>
                </div>
                  <div class="card-action">
                      <span>Costo del producto: {{$bene->cost}} </span><br>
                      <small>Productos disponible: {{$bene->amount}} </small><br><br>
                      <a  href="{{asset($bene->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Detalles</a>
                      @if($bene->amount > 0)
                      <a  href="#miModal-{!!$bene['id']!!}" id="botonModal" value="{!!$bene['id']!!}" class="waves-effect waves-light btn curvaBoton modal-trigger"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
                      @else
                      <a class="waves-effect waves-light btn curvaBoton modal-trigger disabled"><i class="material-icons left">assignment_turned_in</i>Canjear</a>
                      @endif
                      <br>
                  </div>
              </div>
            </div>

            <div class="modal" id="miModal-{!!$bene['id']!!}">
            <div class="modal-content">
              <div class="col s12 light-blue lighten-1 text-center">
                <h4 class="white-text" style="padding: 25px 0px">Cantidad de productos a canjear</h4>
              </div>
              <br>
              <div style="margin-top: 15%; margin-bottom: 15%">
                <form id="formProduct-{!!$bene['id']!!}">
                  {{ csrf_field() }}
                  
                  <div class="input-field col s6 offset-s3">
                    {{ $errors->has('codigo') ? ' has-error' : '' }}
                    <input type="number" class="validate" min="1" max="{!!$bene['amount']!!}" name="Cantidad" id="Cantidad-{!!$bene['id']!!}" required="required" onkeypress="return controltagNum(event)">
                    <label for="">Cantidad de productos:</label>
                  </div>
                  <br>
                  <input type="hidden" name="" id="nameProduct-{!!$bene['id']!!}" value="{!!$bene['name']!!}">
                  <input type="hidden" name="" id="costProduct-{!!$bene['id']!!}" value="{!!$bene['cost']!!}">
                  <input type="hidden" name="" id="idProduct-{!!$bene['id']!!}" value="{!!$bene['id']!!}">
                  <div class="col s12">
                    <button class="btn btn-primary curvaBoton" type="submit">
                      Enviar
                    </button>
                    <br><br><br>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col s12">
              <br><br>
              <blockquote >
                  <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>En este momento no tenemos promociones disponibles.</h5>
              </blockquote>
          </div>
        </div><!--End div row -->
        @endif
    </div>
      <div id="test02" class="col s12 center">
        @if($mios->count()!=0)
          @foreach($mios as $produc)
           <div  class="col m4 s6 ">
                <div class="card">
                  <div class="card-image">
                    <div class="slider">
                      <ul class="slides">    
                       @for ($i=0; $i < count($produc->Producto->saveImg); $i++) 
                          <li>
                            <img src="{{ asset($produc->Producto->saveImg[$i]->imagen_prod) }}" height="100%" width="100%">
                          </li>
                        @endfor 
                      </ul>
                    </div>
                  </div>
                    <div class="card-action">
                        <span>Total de compra: {{$produc->amount}} puntos.</span><br><br>
                        <a  href="{{asset($produc->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Detalles</a>
                        <a id="entrega" value="{!!$produc['id']!!}" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">assignment_turned_in</i>Liberar</a>
                        <br>
                    </div>
                </div>
            </div>
          @endforeach
        @else
          <div class="col s12">
              <br><br>
              <blockquote >
                  <i class="material-icons fixed-width large grey-text">flight_land</i><br><h5 blue-text text-darken-2>Usted todavia no ha adquirido ningun producto.</h5>
              </blockquote>
          </div>
        </div><!--End div row -->
        @endif
      </div>
      <div id="test03" class="col s12 center">
        @if($entregado->count()!=0)
          @foreach($entregado as $entrega)
           <div  class="col m4 s6 ">
                <div class="card">
                    <div class="card-image">
                    <div class="slider">
                      <ul class="slides">    
                        @for ($i=0; $i < count($entrega->Producto->saveImg); $i++) 
                          <li>
                            <img src="{{ asset($entrega->Producto->saveImg[$i]->imagen_prod) }}" height="100%" width="100%">
                          </li>
                        @endfor
                      </ul>
                    </div>
                  </div>
                    <div class="card-action">
                        <span>Total de compra: {{$entrega->amount}} puntos.</span><br><br>
                        <a  href="{{asset($entrega->pdf_prod)}}" target="_blank" class="waves-effect waves-light btn curvaBoton"><i class="material-icons left">picture_as_pdf</i>Detalles</a>
                        <br>
                    </div>
                </div>
            </div>
          @endforeach
        @else
          <div class="col s12">
              <br><br>
              <blockquote >
                  <i class="material-icons fixed-width large grey-text">sentiment_dissatisfied</i><br><h5 blue-text text-darken-2>Usted todavia no ha retirado ningun producto.</h5>
              </blockquote>
          </div>
        @endif
      </div>
  @endif
@endsection
@section('js')

<script type="text/javascript">

    $(document).ready(function(){
    $('.slider').slider();
  });

    $(document).on('click','#entrega', function() {
      var id=$(this).attr("value");
      var url="{{url('delivered')}}/"+id;
      swal({
            title: "¿Está seguro?",
            text: '¿Desea liberar el producto ?',
            icon: "warning",
            buttons:  ["Cancelar", "liberar"],
            dangerMode: true,
        })
      $.ajax({
                  url,
                  type: 'GET',
                  dataType: "json",
                  success: function (result) {
                    console.log(result);
                          swal('usted ha liberado el producto','','success')
                          .then((recarga) => {
                          location.reload();
                        });
                  },
                  error: function (result) {
                      swal('Existe un error en su solicitud','','error');
                      console.log(result);
                  }
              });
    });

    $(document).on('click','#botonModal', function() {
      var identi=$(this).attr("value");
      var idFormulario="#formProduct-"+identi;
      var url="{{url('verifyBenefi')}}/"+identi;      
              $.ajax({
                  url,
                  type: 'GET',
                  dataType: "json",
                  success: function (result) {
                    console.log(result);
                      if (result>0) {
                          swal('usted ha comprado este producto ' +result+ ' veces ¿Desea comprarlo nuevamente?', '', "warning");
                      }
                  },
                  error: function (result) {
                      swal('Existe un error en su solicitud','','error');
                      console.log(result);
                  }
              });
      $(idFormulario).on('submit', function(e){
        e.preventDefault();
        var name=$('#nameProduct-'+identi).val();
        var cost=$('#costProduct-'+identi).val();
        var Cantidad=$('#Cantidad-'+identi).val();
        var total= (Cantidad*cost);
        swal({
            title: "¿Está seguro?",
            text: '¿Desea canjear '+name+' por un total de '+total+' puntos ?',
            icon: "warning",
            buttons:  ["Cancelar", "Adquirir"],
            dangerMode: true,
        })
        .then((Adquirir) => {
            if (Adquirir) {
              id=$('#idProduct-'+identi).val();
              var url="{{url('/BuyBenefi')}}";      
              $.ajax({
                  url,
                  type: 'POST',
                  data: {
                      _token: $('input[name=_token]').val(),
                      Cantidad: Cantidad,
                      nombre: name,
                      costo: cost,
                      id: id
                  },
                  success: function (result) {
                    console.log(result);
                      if (result==0) {
                          swal('No posee suficientes creditos, por favor recargue','','error')
                          .then((recarga) => {
                          location.reload();
                        });
                      } else {
                          swal('Usted a comprado el producto '+name+' con exito proximamente lo contactaremos','','success')
                          .then((recarga) => {
                          location.reload();
                        });
                      }
                  },
                  error: function (result) {
                      swal('Existe un error en su solicitud','','error');
                      console.log(result);
                  }
              });
            }
        });
      });
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
</script>
@endsection