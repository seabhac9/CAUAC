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
	$("#content").load("crearforo.php");
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