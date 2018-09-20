<!DOCTYPE html>
<html>

<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
 <tr>
 	<td align="center">
 		<img src="{{$message->embed(public_path().'/sistem_images/aproval.png')}}" width="100%" height="100%">
 	</td>
 </tr>

 <tr>
 	<td align="center">
		<h1>Su SOLICITUD de cuenta ha sido APROBADA.</h1>
	</td>
 </tr>

 <tr>
	<td>
	<p style="font-size: 14px;" align="justify">Hola, le damos la más cordial bienvenida  LEIPEL, para avanzar al siguiente paso de su registro</p>
 	</td>
 </tr>

 	<tr>
 	<td align="center">
		<a href="{{$url}}"><button>Registrarse</button></a>
	</td>
 </tr>
 <tr>
	<td>
	<p style="font-size: 14px">Muchas Gracias Por Ser Parte de Nuestra plataforma</p>
	</td>
 </tr>
		

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