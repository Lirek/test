<script>
	$("#formRO").on('submit',function(e){
		e.preventDefault();
		var url = "{{ url('BidderSubmit') }}";
        var gif = "{{ asset('/sistem_images/loading.gif') }}";
        swal({
            title: "Procesando la información",
            text: "Espere mientras se procesa la información.",
            icon: gif,
            buttons: false,
            closeOnEsc: false,
            closeOnClickOutside: false
        });
        console.log($("#formRO").serialize(),url,gif);
        $.ajax({
            url: url,
            type: 'POST',
            data: $("#formRO").serialize(),
            success: function (result) {
                console.log(result);
                swal("Su solicitud está siendo procesada","Por favor espere su correo de confirmación","success")
                .then((recarga) => {
                    location.reload();
                });
            },
            error: function (result) {
                console.log(result);
                swal('Existe un Error en su Solicitud','','error')
                .then((recarga) => {
                    location.reload();
                });
            }
        });
    });

    $("#emailRO").on('keyup change',function(){
        var email_data = $("#emailRO").val();
        $.ajax({
            url: "{{url('RegisterEmailBidder')}}/"+email_data,
            type: 'get',
            dataType: "json",
            success: function(result){
            	console.log(result);
                if (result == 1) {
                    $('#mensajeCorreoOfertante').hide();
                    $('#registroRO').attr('disabled',false);
                    return true;
                } else {
                    $('#mensajeCorreoOfertante').show();
                    $('#mensajeCorreoOfertante').text('Este email ya se encuentra registrado');
                    $('#mensajeCorreoOfertante').css('font-size','120%');
                    $('#mensajeCorreoOfertante').css('color','red');
                    $('#registroRO').attr('disabled',true);
                }
            }
        });
    });
</script>