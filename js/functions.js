$(document).on("ready", inicio);

function inicio () 
{
	//Aqui va todo el codigo relacionado con DOM
	$("#foros").on("click", redirectForos);
	$("#message").on("click", redirectMensajes);
	$("#redact").on("click", redirectRedact);
	$("#exit").on("click", redirectExit);

	// $("#mensajes").on("click", redirectMensajes);
}

function redirectForos () 
{
	 $("#content").load("foros.php")    
	 $("#foros").addClass('active');
	 $("#redact").removeClass('active');
	 $("#message").removeClass('active');

}
function redirectMensajes () 
{
	$("#content").load("mensajes.php")
	$("#message").addClass('active');
	$("#foros").removeClass('active');
	$("#redact").removeClass('active');
}
function redirectRedact () 
{
	$("#content").load("redactar.php");
	$("#redact").addClass('active');
	$("#foros").removeClass('active');
	$("#message").removeClass('active');
}

function redirectExit()
{
	window.location.href="index.php?cerrar=1";
}

function redirectMensaje(codigo)
{
	$("#content").load("visorMensaje.php?codigo=" + codigo);
}

function redirectResponder(codigo)
{
	$("#content").load("respuesta.php?respuesta=" + codigo);
}
function redirectCreaforo()
{
	$("#content").load("crearforo.php", function() {
  		var fileSelect = document.getElementById("fileSelect"),
		  fileElem = document.getElementById("fileElem");

		fileSelect.addEventListener("click", function (e) {
		    if (fileElem) {
		        fileElem.click();
		    }
		    e.preventDefault(); // evitar la navegación a "#"
		}, false);

	});
}

function handleFile(file){
	var fileList = document.getElementById("fileList");

	if (!file.length) {
    	fileList.innerHTML = "¡No se han seleccionado archivos!";
    }
    else{
    	fileList.innerHTML = file[0].name;
    }
}

function redirectForoVer(codigo)
{
	$("#content").load("visorForo.php?codigo=" + codigo);
}

function cambiarColor (datos) 
{
	var colorito = datos.currentTarget.id;
	var nuevoCoche = "c" + colorito + ".jpg";
	$("#cochecito img").attr("src", nuevoCoche);
}

function limpiarMensajeRedaccion()
{
	$("#titleRedact").val("");
	$("#messageRedact").val("");
}

function enviarMensaje(emisor)
{
	var consulta = {"funcion": "EnviarMensajeDB"}; 
	consulta.emisor = emisor;
	consulta.receptor = $("#selectUser").val();
	consulta.titulo =  $("#titleRedact").val();
	consulta.contenido = $("#messageRedact").val();

    $.ajax({
        url: 'classes/WebService.php',
        type: "GET",
        data: consulta,
        success: finEnvioMensaje
    })
    .fail(function(err) { console.log( err ); });
}

function finEnvioMensaje(datos)
{
	alert("Mensaje enviado correctamente.");
	redirectMensajes();
}

function enviarRespuesta(emisor, receptor, titulo)
{
	var consulta = {"funcion": "EnviarRespuestaDB"}; 
	consulta.emisor = emisor;
	consulta.receptor = receptor;
	consulta.titulo = "RE:" + titulo;
	consulta.respuesta = $("#txtRespuesta").val();

    $.ajax({
        url: 'classes/WebService.php',
        type: "GET",
        data: consulta,
        success: finEnvioRespuesta
    })
    .fail(function(err) { console.log( err ); });
}

function finEnvioRespuesta(datos)
{
	alert("Mensaje enviado correctamente!");
	redirectMensajes();
}

function eliminarMensaje(codigoMensaje)
{
	var consulta = {"funcion": "EliminarMensajeDB"}; 
	consulta.codigoMensaje = codigoMensaje;

	$.ajax({
        url: 'classes/WebService.php',
        type: "GET",
        data: consulta,
        success: fineliminarMensaje
    })
    .fail(function(err) { console.log( err ); });
}

function fineliminarMensaje(datos)
{
	alert("Mensaje eliminado!");
	redirectMensajes();
}

function cambiarFiltros1 (consulta) {
    consulta.cons ="getFiltrosTodos1";
    $.ajax({
        url: 'WebService.php',
        type: "GET",
        data: consulta,
        success: llenarFiltros1
    })
    .fail(function(err) { console.log( err ); });
}

function publicarForo()
{
	//Enviar archivos usando ajax.
	$( '#foroForm' )
	.submit( function( e ) {
		$.ajax( {
		  url: 'classes/uploads.php',
		  type: 'POST',
		  data: new FormData( this ),
		  processData: false,
		  contentType: false,
		  success: subirArchivo
		} );
		e.preventDefault();
	} );

    
}

function subirArchivo(datos){
	datos = eval(datos);
	var consulta = {"funcion": "PublicarForoDB"}; 
	consulta.titulo =  $("#titleForo").val();
	consulta.contenido = $("#textForo").val();
	consulta.archivo = datos[0].resp;
	consulta.usuariosPermitidos = "";

	$('#users input:checked').each(function() {
	    consulta.usuariosPermitidos += $(this).val() + ",";
	});

	consulta.usuariosPermitidos = consulta.usuariosPermitidos.substr(0, consulta.usuariosPermitidos.length-1);

	$.ajax({
        url: 'classes/WebService.php',
        type: "GET",
        data: consulta,
        success: finPublicarForo
    })
    .fail(function(err) { console.log( err ); });
}

function finPublicarForo(datos)
{
	alert("Se ha publicado correctamente el foro!");
	redirectForos();
}

function vacio (){
	// //JSON
	// var cambiosCSS =
	// {
	// 	margin: 0,
	// 	overflow: "hidden",
	// 	padding: 0,
	// 	width: 0
	// };
	// var cambiosPersonalizacion =
	// {
	// 	height: "auto",
	// 	opacity: 1,
	// 	width: "40%"
	// };
	// $("#historia").css(cambiosCSS);
	// $("#personalizacion").css(cambiosPersonalizacion);
	// $("#color div").on("click", cambiarColor);
}