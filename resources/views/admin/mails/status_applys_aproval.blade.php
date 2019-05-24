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
			<h1>Su SOLICITUD de cuenta ha sido PRE-APROBADA</h1>
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-size: 14px;" align="justify">
				Hola, le damos la más cordial bienvenida a LEIPEL, para avanzar al siguiente paso de su registro seleccione el botón "CONTINUAR REGISTRO" o haga <a href="{{$url}}">(Click aquí)</a>.
			</p>
		</td>
	</tr>
	<tr>
		<td align="center">
			<a href="{{$url}}"><button>CONTINUAR REGISTRO</button></a>
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-size: 14px;" align="justify">
				Muchas gracias por su desear ingresar al Equipo Proveedores Leipel, estamos aquí para apoyarlos.
			</p>
		</td>
	</tr>
	<tr align="center">
		<td>
			<img src="{{$message->embed(public_path().'/sistem_images/signature.png')}}">
		</td>
	</tr>
	<tr>
		<td align="center">
			<img src="{{$message->embed(public_path().'/sistem_images/Logo-Leipel.png')}}" style="height: 80px; width: 150px">
		</td>
	</tr>
	<tr>
		<td>
			<p style="font-size: 10px">
				Este correo ha sido enviado acorde a los normas de mailing y porque muy seguramente usted llenó un formulario, se registró o alguien lo está invitando.
			</p>
		</td>
	</tr>	
</table>
</body>
</html>