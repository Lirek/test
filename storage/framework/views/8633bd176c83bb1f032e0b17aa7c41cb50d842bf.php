<!DOCTYPE html>
<html>

<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
 <tr>
 	<td align="center">
 		<img src="<?php echo e($message->embed(public_path().'/sistem_images/invite.png')); ?>" width="100%" height="100%">
 	</td>
 </tr>

 <tr>
 	<td align="center">
		<h1>Saludos</h1>
	</td>
 </tr>

 <tr>
	<td>
	<p style="font-size: 14px;" align="justify"><?php echo e($name); ?> quiere invitarte GRATIUTAMENTE a unirte a LEIPEL, una red social de entretenimiento (CINE, MUSICA, LECTURA, RADIO y TV).</p>
 	</td>
 </tr>
 
 	<td align="center">
		<a href="<?php echo e($url); ?>"><button class="btn">Registrarse</button></a>
	</td>

  <tr align="left">
 	<img src="<?php echo e($message->embed(public_path().'/sistem_images/signature.png')); ?>">
  </tr>
  
  <tr>
	<td>
	<p style="font-size: 10px">Este correo ha sido enviado acorde a los normas de mailing y porque muy seguramente usted se suscribió o alguien lo está invitando. En caso de no desear recibir más estos correos hacer click en DAR DE BAJA</p>
	</td>
  </tr>

  <tr>
	<td align="center">
		<img src="<?php echo e($message->embed(public_path().'/sistem_images/Logo-Leipel.png')); ?>" style="height: 80px; width: 100px">
	</td>
  </tr>	

 <tr>
	<td align="center">
		<img src="<?php echo e($message->embed(public_path().'/sistem_images/Leipel.png')); ?>" style="height: 80px; width: 80px">
	</td>
 </tr>	
	
</table>
</body>
</html>



