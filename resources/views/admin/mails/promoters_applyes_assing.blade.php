<!DOCTYPE html>
<html>

<body>
<h1>Buenas <i>{{ $applys->contac_s }}</i></h1>,<h2> Hoy {{$applys->assing_at}}</h2>
	

<p>Queremos Informarle que su Solicitud de Cuenta "Proveedor de Contenido Digital" 
Esta Siendo Procesada por Nuestro Equipo Comercial, Pronto se Pondra en contacto con usted
El Promotor</p>
 
<table>
		<td>{{$applys->Promoter->name_c}}</td>
		<td>{{$applys->Promoter->phone_s}}</td>
		<td>{{$applys->Promoter->email_c}}</td>
</table>


 
<p>Muchas Gracias Por Su Paciencia Esperamos Que Pueda ser Parte de Nuestro Equipo,</p>
<br/>
<i>Leipel</i>
</body>
</html>