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
					<h1>Su SOLICITUD DE PAGO ha sido APROBADA.</h1>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 14px;" align="justify">
						Hola, nos complecemos en informarle que su SOLICITUD DE PAGO ha sido APROBADA, se requiere que visite nuestras oficinas para que formalice la entrega de los documentos y nosotros hacerle la entrega del cheque.
					</p>
				</td>
			</tr>

			<tr>
				<td style="font-size: 14px;" align="justify">
					Recuerde que el día pautado para asistir a nuestras oficinas es el <b>{{$cita}}</b>, sin embargo tiene hasta el último día de este mes para retirar el pago.
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 14px">
						Muchas gracias por ser parte de nuestra plataforma.
					</p>
				</td>
			</tr>

			<tr align="left">
				<img src="{{$message->embed(public_path().'/sistem_images/signature.png')}}">
			</tr>

			<tr>
				<td>
					<p style="font-size: 10px">
						Este correo ha sido enviado acorde a los normas de mailing y porque muy seguramente usted se suscribió o alguien lo está invitando.
					</p>
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