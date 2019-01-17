
$(document).ready(function(){

$(".id_selecion").click(function(){
	var id = this.id;
	var categoria = document.getElementById("categoria").value;
	console.log(id);
	console.log(categoria);
	
	$.ajax({
		url: "../modells/megustas.php",
		method: "POST",
		data:{id:id,categoria:categoria},
		dataType: 'json',
		/*beforeSend:function(){
				$("#"+id).val("....");
		},*/
        success:  function (data) {
        		var like = data['likes'];
        		var text = data['text'];

                $("#likes_"+id).val(like);
                $("#"+id).val(text);
                toastr.success('Cool','Ya votaste',{timeOut:5000});
        }	
	});
});



$("#registro_usuario").submit(function(event){
	event.preventDefault();

	// var datos = new FormData(this);

	$.ajax({
			url: './modells/registro.php',
			type: 'POST',
			data: $("#registro_usuario").serialize(),
			// data: datos,
			contentType: false,
			processData: false,
			success:function(data){

				if (data) {
					toastr.success('Status','Registro completado!',{timeOut:5000});
					console.log('Guardado');
					// setTimeout(function(){location.href = 'index.php';},6000);
				}else{
					toastr.error('Status','No se puedo registrar, intente nuevamente.',{timeOut:5000});
					console.log('Error');
				}

			}
		});
});


$("#agregar_categoria_form").submit(function(event){
	event.preventDefault();

	// var datos = new FormData(this);

	$.ajax({
			url: '../modells/categorias.php',
			type: 'POST',
			data: $("#agregar_categoria_form").serialize(),
			// data: datos,
			contentType: false,
			processData: false,
			success:function(data){

				if (data) {
					toastr.success('Status','Guardado correctamente!',{timeOut:5000});
					console.log('Guardado')
				}else{
					toastr.error('Status','No se puede guardar, intente nuevamente.',{timeOut:5000});
					console.log('Error')
				}

			}
		});
});



$("#participanteForm").submit(function(event){
	event.preventDefault();

	// var imagen = document.getElementById("imagen").files[0];
	var imagen = document.getElementById("imagen").files[0];
	var name_imagen = imagen.name;
	var extension_imagen = name_imagen.split('.').pop().toLowerCase();
    var formData = new FormData(this);
    
    formData.append("imagen",imagen);


    if (jQuery.inArray(extension_imagen, ['jpg','jpeg','png','git']) == -1) {
			
			toastr.warning('Imagen','Formato invalido!',{timeOut:5000});

    }else if (imagen.size < 2000000) {    

	$.ajax({
			url: '../modells/inscripcion.php',
			type: 'POST',
			// method: 'POST',
			// data: $("#participanteForm").serialize(),
			data: formData,
			contentType: false,
			processData: false,
			success:function(data){

				if (data) {
					toastr.success('Bien','Enviado correctamente!',{timeOut:5000});
					console.log('Guardado')
				}else{
					toastr.error('Error','No se puede enviar, intente nuevamente.',{timeOut:5000});
					console.log('Error')
				}
			}
	});
	
	}else{
		toastr.info('Imagen','Este archivo es muy grande',{timeOut:5000});
	}
})


});



function onpopup(){
	setTimeout("location.href ='https://www.facebook.com/VocesTVe/'",3000);
	document.getElementById('popup').style.top = "0%";
}

function cambiar_status(id){
	console.log(id);
	$.ajax({
			url: "../modells/cambio_status.php",
			method: "POST",
			data:{id:id},
			/*beforeSend:function(){
					$("#"+id).val("....");
			},*/
            success:  function (data) {
            	if (data) {
            		toastr.success('Bloqueo','cambiado',{timeOut:5000});
            		console.log("good");
            	}else{
            		toastr.error('Error','inteta nuevamente',{timeOut:5000});
            		console.log("bad")
            	}
            	
            }	
		});
}

	