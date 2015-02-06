$(document).on("ready", inicio);
function inicio () 
{
	//Aqui va todo el codigo relacionado con DOM
	$("#foros").on("click", redirectForos);
	$("#message").on("click", redirectMensajes);
	$("#redact").on("click", redirectRedact);
	$("#mensaje1").on("click", redirectMensaje1);
}



function redirectForos () 
{
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
     $("#content").load("foros.php")
     //$("#headerPrint").removeClass('invisible');
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
function redirectMensaje1()
{
	$("#content").load("visor-mensaje.php");
}



function cambiarColor (datos) 
{
	var colorito = datos.currentTarget.id;
	var nuevoCoche = "c" + colorito + ".jpg";
	$("#cochecito img").attr("src", nuevoCoche);
}