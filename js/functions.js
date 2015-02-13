$(document).on("ready", inicio);

function inicio () 
{
	//Aqui va todo el codigo relacionado con DOM
	$("#foros").on("click", redirectForos);
	$("#message").on("click", redirectMensajes);
	$("#redact").on("click", redirectRedact);

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
function redirectMensaje(codigo)
{
	$("#content").load("visorMensaje.php?codigo=" + codigo);
}

function redirectResponder(codigo)
{
	$("#content").load("respuesta.php?respuesta=" + codigo);
}

function cambiarColor (datos) 
{
	var colorito = datos.currentTarget.id;
	var nuevoCoche = "c" + colorito + ".jpg";
	$("#cochecito img").attr("src", nuevoCoche);
}

function enviarRespuesta(emisor, receptor)
{
	var consulta.cons ="enviarRespuestaDB";
	consulta.envia = emisor;
	consulta.recibe = receptor;
	consulta.respuesta = $("#txtRespuesta").val();

	alert(consulta.envia + consulta.receptor + consulta.respuesta);
    // $.ajax({
    //     url: 'WebService.php',
    //     type: "GET",
    //     data: consulta,
    //     success: llenarFiltros1
    // })
    // .fail(function(err) { console.log( err ); });
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