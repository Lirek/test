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
		<h1>Saludos</h1>
	</td>
 </tr>

 <tr>
	<td>
	<p style="font-size: 14px;" align="justify">Le informamos que su compra de {{$content}} con un valor de {{$cost}} tickets fue procesada con exito. Gracias por elegirnos.</p>
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
	<p style="font-size: 10px">Este correo ha sido enviado acorde a los normas de mailing y porque muy seguramente usted se suscribió o alguien lo está invitando. En caso de no desear recibir más estos correos hacer click en DAR DE BAJA</p>
	</td>
  </tr>

  <tr>
	<td align="center">
		<img src="{{$message->embed(public_path().'/sistem_images/Logo-Leipel.png')}}" style="height: 80px; width: 100px">
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