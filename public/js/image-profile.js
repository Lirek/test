 
//------------EJECUTA AUTOMATICAMENTE EL BOTON DE EDITAR O ACTUALIZAR AL SUBIR FOTO-------//

 var $avatarInput, $avatarImage, $Editar;
 var gif = "sistem_images/loading.gif";

	$(function () {
	$avatarInput = $('#avatarInput');   
	$avatarImage = $('#avatarImage');	
	$Editar = $('#Editar');				

	$avatarImage.on('click', function () {
		$avatarInput.click();
	});

	$avatarInput.on('change', function () {
    $Editar.click();
    swal({
      title: "Cargando la imagen",
      text: "Espere mientras se carga la imagen.",
      timer: 6000,
      icon: gif,
      buttons: false,
      closeOnEsc: false,
      closeOnClickOutside: false
    }).then((recarga) => {
      
    });
    
    
	});

	
	  });

