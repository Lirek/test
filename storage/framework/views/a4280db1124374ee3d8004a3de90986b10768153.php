<!DOCTYPE html>
<html>

<body>
<h1>Buenas <i><?php echo e($applys->contac_s); ?></i></h1>,<h2> Hoy <?php echo e($applys->assing_at); ?></h2>
	

<p>Queremos Informarle que su Solicitud de Cuenta "Proveedor de Contenido Digital" 
Esta Siendo Procesada por Nuestro Equipo Comercial, Pronto se Pondra en contacto con usted
El Promotor</p>
 
<table>
		<td><?php echo e($applys->Promoter->name_c); ?></td>
		<td><?php echo e($applys->Promoter->phone_s); ?></td>
		<td><?php echo e($applys->Promoter->email_c); ?></td>
</table>


 
<p>Muchas Gracias Por Su Paciencia Esperamos Que Pueda ser Parte de Nuestro Equipo,</p>
<br/>
<i>Leipel</i>
</body>
</html>