<!DOCTYPE html>
<html>

<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
 <tr>
 	<td align="center">
 		<img src="{{$message->embed(public_path().'/sistem_images/welcome.png')}}" width="100%" height="100%">
 	</td>
 </tr>

 <tr>
 	<td align="center">
		<h1>Bienvenido</h1>
	</td>
 </tr>

 <tr>
	<td>
	<p style="font-size: 14px;" align="justify">Hola, le damos la más cordial bienvenida  LEIPEL, la 1ra red social de entretenimiento global (cine, música, lectura, radio y tv), seguramente disfrutarás mucho esta nueva experiencia.</p>
 	</td>
 </tr>

 <tr>
	<td>
	<p style="font-size: 14px">Muchas Gracias Por Ser Parte de Nuestra plataforma</p>
	</td>
 </tr>

@if($url!="")
 <tr>
  <td>
  <p style="font-size: 14px">Por Favor Verifique su Direccion de Correo en el siguiente enlace:
                              {{$url}}</p>
  </td>
 </tr>
@endif
  <tr align="left">
 	<img src="{{$message->embed(public_path().'/sistem_images/signature.png')}}">
  </tr>

  <tr>
	<td>
	<p style="font-size: 10px">Este correo ha sido enviado acorde a los normas de mailing y porque muy seguramente usted se suscribió o alguien lo está invitando.</p>
	</td>
  </tr>

 <tr>
	<td align="center">
		<img src="{{$message->embed(public_path().'/sistem_images/Leipel.png')}}" style="height: 80px; width: 80px">
	</td>
 </tr>

</table>
</body>
</html>
