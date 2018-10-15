<!DOCTYPE html>
<html>
	<body>
		<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="center">
					<img src="{{$message->embed(public_path().'/sistem_images/denial.png')}}" width="100%" height="100%">
				</td>
			</tr>

			<tr>
				<td align="center">
					<h1>Su PELÍCULA ha sido DENEGADA.</h1>
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 14px;" align="justify">
						Hola, de parte de LEIPEL le informamos que su su PELÍCULA: "{{$title}}" fue rechazada por el siguiente motivo:
					</p>
				</td>
			</tr>

			<tr>
				<td align="center">
					{{$m}}
				</td>
			</tr>

			<tr>
				<td>
					<p style="font-size: 14px">Muchas gracias por ser parte de nuestra plataforma.</p>
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