 
//------------EJECUTA AUTOMATICAMENTE EL BOTON DE EDITAR O ACTUALIZAR AL SUBIR FOTO-------//

 var $avatarInput, $avatarImage, $Editar;

	$(function () {
	$avatarInput = $('#avatarInput');   
	$avatarImage = $('#avatarImage');	
	$Editar = $('#Editar');				

	$avatarImage.on('click', function () {
		$avatarInput.click();
	});

	$avatarInput.on('change', function () {
	
		$Editar.click();
	});

	
	  });
	
