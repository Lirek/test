@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('main')     
     <div class="row">
         <div class="col s12 m12">
             <div class="card ">
                 <div class="card-content curva">
                     <div class="row">
                         <div class="col s12 m8">
                             <ul class="collection">
                                 <li class="collection-item avatar">
                                     <div class="row">
                                         <div class="col s4"><br>
                                             <i class="material-icons blue circle prefix">code</i>
                                             <h6 class="left"><b>Mi Código:</b></h6>
                                         </div>
                                         <div class="col s8 left">
                                            <h4 class="grey-text">{{Auth::user()->codigo_ref}}</h4>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="collection-item avatar">
                                     <div class="row">
                                         <div class="col s3"><br>
                                             <i class="material-icons blue circle prefix">reply</i>
                                             <h6 class="left"><b>Mi Enlace:</b></h6>
                                         </div>
                                         <div class="col s9 right">
                                             <p style="text-align: justify;">Hola,Te invito a disfrutar juntos las maravillas de Leipel: Cine, música, lectura, radio, Tv y VIAJES GRATIS. Regístrate gratuitamente con el siguiente link: </p>
                                             <div class="col s6 right" style="margin-right: 150px;"><p>
                                             <h6><a href="{{url('/').'/register/'.Auth::user()->codigo_ref}}" style="font-size: 86%;">{{url('/').'/register/'.Auth::user()->codigo_ref}}</a></h6>
                                        </p></div>
                                         </div>
                                         
                                     </div>
                                 </li>
                                 <li class="collection-item avatar">
                                     <div class="row">
                                         <div class="col s5"><br>
                                             <!-- <i class="material-icons blue circle prefix">email</i> -->
                                             <i class="prefix fa fa-facebook blue circle prefix"></i>
                                             <h6 class="left"><b>Invitar por facebook:</b></h6>
                                         </div>
                                         <div class="col s7 left"><br>
                                             <!-- <a href="#"  class="waves-effect green curvaBoton waves-light btn-small modal-trigger"><i class="material-icons right">send</i>Compartir</a> -->
                                             <div id="fb-root"></div>
                                             <!-- Your share button code -->
                                          <div class="fb-share-button" 
                                            data-href="{{url('/').'/register/'.Auth::user()->codigo_ref}}" 
                                            data-layout="button" data-size="large" data-mobile-iframe="true">
                                          </div>

                                         </div>
                                     </div>
                                 </li>
                                 <li class="collection-item avatar">
                                     <div class="row">
                                         <div class="col s4"><br>
                                             <i class="material-icons blue circle prefix">email</i>
                                             <h6 class="left"><b>Invitar por correo:</b></h6>
                                         </div>
                                         <div class="col s8 left"><br>
                                             <a href="#myModal"  class="waves-effect green curvaBoton waves-light btn-small modal-trigger"><i class="material-icons right">send</i>Enviar</a>
                                         </div>
                                     </div>
                                 </li>
                                 <li class="collection-item avatar">
                                     <div class="row">
                                         <div class="col s4"><br><br>
                                             <i class="material-icons blue circle prefix">people</i>
                                             <h6 class="left"><b>Total referidos:</b></h6>
                                         </div>
                                         <div class="col s8 left">
                                             <p>
                                             <h4 ><a href="#" class="blue-text">
                                                     <center>{{$referals1+$referals2+$referals3}}</center>
                                                 </a>
                                             </h4>
                                             <h6 style="text-align: justify;">Este es el total de referidos de tres generaciones de personas que llegaron a Leipel gracias a ti. Te lo agredecemos!</h6>
                                             </p>
                                         </div>
                                     </div>
                                 </li>
                             </ul>

                         </div>
                         <div class="col s12 m4">
                             <div class="card ">
                                 <div class="card-content curva">
                                     <div class="row">
                                     <div class="col s12 m12">
                                     <h5>Mi código QR:</h5>
                                         {!! QrCode::size(250)->generate( url('/').'/register/'.Auth::user()->codigo_ref); !!}
                                         <a href="data:image/png;base64,{!!base64_encode (QrCode::format('png')->size(300)->generate( url('/').'/register/'.Auth::user()->codigo_ref)) !!}" download="MiQr" class="waves-effect green curvaBoton waves-light btn-small"><i class="material-icons right">cloud_download</i>Descargar</a>
                                     </div>
                                 </div>
                                 </div>
                             </div>
                             <br>
                            <div class="col s12 m12">
                                 <iframe width="250" height="170" src="https://www.youtube.com/embed/l0kYlGgFu94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                 <h6><b> INVITAR AMIGOS A LEIPEL</b></h6>
                            </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>



     <!--MODAL PARA ENVIAR REFERIDOS-->
     <!--Se edito-->
     <div id="myModal" class="modal fade" role="dialog">
         <div class="modal-content">
             <div class=" blue"><br>
                 <h4 class="center white-text" > Introduzca el Correo que desea invitar</h4>
                 <br>
             </div>
             <form class="form-horizontal" method="POST" action="{{url('Invite')}}">{{ csrf_field() }}

                 <div class="form-group">
                     <div class="col s12">
                             Correo del la persona que desea invitar:
                             <div class="input-field inline">
                                 <input id="email" name="email" type="email" class="validate" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Email invalido">
                                 <label for="email_inline">Correo</label>
                             </div>
                             <div id="emailMen"></div>
                     </div>

                 <div class="form-group">
                     <div class="col-md-6 col-md-offset-5">

                         <button class="btn curvaBoton waves-effect green waves-light" type="submit" id="enviar" name="enviar">Enviar
                             <i class="material-icons right">send</i>
                         </button>
                     </div>
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <a href="#!" class="modal-close waves-effect waves-green btn-flat">Salir</a>
         </div>

     </div>
@endsection

@section('js')
 <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
  $("#email").on('keyup change',function(){
        var email_data = $("#email").val();
        $.ajax({
            url: 'EmailValidate',
            type: 'POST',
            data:{
                 _token: $('input[name=_token]').val(),
                'email':email_data
            },
            success: function(result){
                 if (result == 1) 
                 {
                  $('#emailMen').hide();
                  $('#enviar').attr('disabled',false);
                  return true;
                 }
                 else
                 {
                   $('#emailMen').show();
                   $('#emailMen').text('Este email ya se encuentra regitrado');
                   $('#emailMen').css('color','red');
                   $('#enviar').attr('disabled',true);
                   console.log(result);
                 }
            }
        });
    });
</script>

@endsection