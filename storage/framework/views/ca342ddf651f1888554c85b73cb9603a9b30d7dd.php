<!DOCTYPE html>
<html>

<body>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
 <tr>
 	<td align="center">
 		<img src="<?php echo e($message->embed(public_path().'/sistem_images/aproval.png')); ?>" width="100%" height="100%">
 	</td>
 </tr>

 <tr>
 	<td align="center">
		<h1>Su pago ha sido aprobado exitosamente.</h1>
	</td>
 </tr>

 <tr>
	<td>
		<p style="font-size: 14px;" align="justify"><?php echo e($user->name); ?> <?php echo e($user->last_name); ?>, ahora que cuentas con más tickets disponibles le invitamos a consumir cualquiera de nuestros productos en LEIPEL.</p>
 	</td>
 </tr>
 <tr>
	<td>
		<p style="font-size: 14px">Muchas gracias por ser parte de nuestra plataforma.</p>
	</td>
 </tr>
		

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