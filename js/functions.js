$(document).on('ready', inicio);

function inicio () 
{
	//Aqui va todo el codigo relacionado con DOM
	$('#foros').on('click', redirectForos);
	$('#message').on('click', redirectMensajes);
	$('#redact').on('click', redirectRedact);
	$('#exit').on('click', redirectExit);

	// $('#mensajes').on('click', redirectMensajes);
}

function redirectForos () 
{
	 $('#content').load('foros.php')    
	 $('#foros').addClass('active');
	 $('#redact').removeClass('active');
	 $('#message').removeClass('active');

}
function redirectMensajes () 
{
	$('#content').load('mensajes.php')
	$('#message').addClass('active');
	$('#foros').removeClass('active');
	$('#redact').removeClass('active');
}
function redirectRedact () 
{

	$('#redact').addClass('active');
	$('#foros').removeClass('active');
	$('#message').removeClass('active');

	$('#content').load('redactar.php', function() {
  		var fileSelect = document.getElementById('fileSelect'),
		  fileElem = document.getElementById('fileElem');

		fileSelect.addEventListener('click', function (e) {
		    if (fileElem) {
		        fileElem.click();
		    }
		    e.preventDefault(); // evitar la navegación a '#'
		}, false);

	});
}

function redirectExit()
{
	window.location.href='index.php?cerrar=1';
}

function redirectMensaje(codigo)
{
	$('#content').load('visorMensaje.php?codigo=' + codigo);
}

function redirectResponder(codigo)
{
	$('#content').load('respuesta.php?respuesta=' + codigo, function() {
  		var fileSelect = document.getElementById('fileSelect'),
		  fileElem = document.getElementById('fileElem');

		fileSelect.addEventListener('click', function (e) {
		    if (fileElem) {
		        fileElem.click();
		    }
		    e.preventDefault(); // evitar la navegación a '#'
		}, false);

	});
}
function redirectCreaforo()
{
	$('#content').load('crearforo.php', function() {
  		var fileSelect = document.getElementById('fileSelect'),
		  fileElem = document.getElementById('fileElem');

		fileSelect.addEventListener('click', function (e) {
		    if (fileElem) {
		        fileElem.click();
		    }
		    e.preventDefault(); // evitar la navegación a '#'
		}, false);

	});
}

function handleFile(file){
	var fileList = document.getElementById('fileList');

	if (!file.length) {
    	fileList.innerHTML = '¡No se han seleccionado archivos!';
    }
    else{
    	fileList.innerHTML = file[0].name;
    }
}
function redirectEditarforo(codigo){
	//$('#content').load('editarForo.php?codigo=' + codigo);

	$('#content').load('editarForo.php?codigo=' + codigo, function() {
  		var fileSelect = document.getElementById('fileSelect'),
		  fileElem = document.getElementById('fileElem');

		fileSelect.addEventListener('click', function (e) {
		    if (fileElem) {
		        fileElem.click();
		    }
		    e.preventDefault(); // evitar la navegación a '#'
		}, false);

	});
}

function redirectForoVer(codigo)
{
	$('#content').load('visorForo.php?codigo=' + codigo);
}

function cambiarColor (datos) 
{
	var colorito = datos.currentTarget.id;
	var nuevoCoche = 'c' + colorito + '.jpg';
	$('#cochecito img').attr('src', nuevoCoche);
}

function limpiarMensajeRedaccion()
{
	$('#titleRedact').val('');
	$('#messageRedact').val('');
}

function enviarMensaje()
{
	$( '#redactForm' ).submit( function( e ) {
		$.ajax( {
		  url: 'classes/uploads.php',
		  type: 'POST',
		  data: new FormData( this ),
		  processData: false,
		  contentType: false,
		  success: finEnvioMensaje
		} );
		e.preventDefault();
	} );
}

function finEnvioMensaje(datos)
{
	datos = eval(datos);
	var consulta = {'funcion': 'EnviarMensajeDB'}; 
	consulta.archivo = datos[0].resp;
	consulta.emisor = $('#emisor').val();
	consulta.receptor = $('#selectUser').val();
	consulta.titulo =  $('#titleRedact').val();
	consulta.contenido = $('#messageRedact').val();


	if (consulta.titulo=='')
	{
		$('#titleRedact').focus();
		$('#redactForm').append('<p class="bg-danger">Por favor llena el campo Titulo.</p>');		
	}
	else if (consulta.contenido =='')
	{
		$('#messageRedact').focus();
		$('#redactForm').append('<p class="bg-danger">Por favor llena el campo Mensaje.</p>');
	}
	else{
	    $.ajax({
	        url: 'classes/WebService.php',
	        type: 'GET',
	        data: consulta,
	        success: subirArchivoMensaje
	    })
	    .fail(function(err) { console.log( err ); });
	}
}



function subirArchivoMensaje(){
	alert('Mensaje enviado correctamente.');
	redirectMensajes();
}

function enviarRespuesta(){
	$( '#mensajeForm' ).submit( function( e ) {
		$.ajax( {
		  url: 'classes/uploads.php',
		  type: 'POST',
		  data: new FormData( this ),
		  processData: false,
		  contentType: false,
		  success: finEnvioRespuesta
		} );
		e.preventDefault();
	} );
}

function finEnvioRespuesta(datos)
{
	datos = eval(datos);

	var consulta = {'funcion': 'EnviarRespuestaDB'}; 
	consulta.archivo = datos[0].resp;
	consulta.emisor = $('#emisor').val();;
	consulta.receptor = $('#receptor').val();;
	consulta.titulo = 'RE:' + $('#titulo').val();;
	consulta.respuesta = $('#txtRespuesta').val() + "\n\n" + $('#txtAnterior').val();
	if (consulta.respuesta==''){
		$('#txtRespuesta').focus();
		$('#content').append('<p class="bg-danger">Por favor llena el campo de respuesta para ser enviada.</p>')
	}
	else{

    $.ajax({
        url: 'classes/WebService.php',
        type: 'GET',
        data: consulta,
        success: finEnvioRespuestaMensaje
    })
    .fail(function(err) { console.log( err ); });
}
}

function finEnvioRespuestaMensaje(datos)
{
	alert('Mensaje enviado correctamente!');
	redirectMensajes();
}

function eliminarMensaje(codigoMensaje)
{
	var consulta = {'funcion': 'EliminarMensajeDB'}; 
	consulta.codigoMensaje = codigoMensaje;

	$.ajax({
        url: 'classes/WebService.php',
        type: 'GET',
        data: consulta,
        success: fineliminarMensaje
    })
    .fail(function(err) { console.log( err ); });
}

function fineliminarMensaje(datos)
{
	alert('Mensaje eliminado!');
	redirectMensajes();
}

function cambiarFiltros1 (consulta) {
    consulta.cons ='getFiltrosTodos1';
    $.ajax({
        url: 'WebService.php',
        type: 'GET',
        data: consulta,
        success: llenarFiltros1
    })
    .fail(function(err) { console.log( err ); });
}

function publicarForo()
{
	//Enviar archivos usando ajax.
	$( '#foroForm' ).submit( function( e ) {
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
	var consulta = {'funcion': 'PublicarForoDB'}; 
	consulta.titulo =  $('#titleForo').val();
	consulta.contenido = $('#textForo').val();
	consulta.archivo = datos[0].resp;
	consulta.videoURL = $('#videoURL').val();;
	consulta.usuariosPermitidos = '';

	$('#users input:checked').each(function() {
	    consulta.usuariosPermitidos += $(this).val() + ',';
	});

	consulta.usuariosPermitidos = consulta.usuariosPermitidos.substr(0, consulta.usuariosPermitidos.length-1);

	$.ajax({
        url: 'classes/WebService.php',
        type: 'GET',
        data: consulta,
        success: finPublicarForo
    })
    .fail(function(err) { console.log( err ); });
}

function finPublicarForo(datos)
{
	alert('Se ha publicado correctamente el foro!');
	redirectForos();
}

function comentarForo(cedula, foro)
{
	var consulta = {'funcion': 'ComentarForoDB'}; 
	consulta.cedula =  cedula;
	consulta.foro = foro;
	consulta.comentario =  $('#txtComment').val();

	$.ajax({
        url: 'classes/WebService.php',
        type: 'GET',
        data: consulta,
        success: finComentarForo
    })
    .fail(function(err) { console.log( err ); });
}

function finComentarForo(datos)
{
	datos = eval(datos);
	alert('Se ha publicado correctamente el comentario!');
	redirectForoVer(datos[0].resp);
}

function clearCrearForo(){
	$('#titleForo').val('');
	$('#textForo').val('');
	$('#fileSelect').val('');
	$('#videoURL').val('');
	$('#fileList').empty();
	$('#fileList').append('¡No se han seleccionado archivos!');
	$('input:checkbox').removeAttr('checked');
}


function adjuntarVideo()
{
	$('#videoURL').show();
}

function eliminarForo(codigoForo)
{
	var consulta = {'funcion': 'EliminarForoDB'}; 
	consulta.codigoForo = codigoForo;

    $.ajax({
        url: 'classes/WebService.php',
        type: 'GET',
        data: consulta,
        success: finEliminarForo
    })
    .fail(function(err) { console.log( err ); });
}

function finEliminarForo(datos)
{
	alert('Foro eliminado correctamente!');
	redirectForos();
}


$(function()
{
 
    //jQuery Captcha Validation
    WEBAPP = {
 
        settings: {},
        cache: {},
 
        init: function() {
 
            //DOM cache
            this.cache.$form = $('#captcha-form');
            this.cache.$refreshCaptcha = $('#refresh-captcha');
            this.cache.$captchaImg = $('img#captcha');
            this.cache.$captchaInput = $(':input[name="captcha"]');
 
            this.eventHandlers();
            this.setupValidation();
 
        },
 
        eventHandlers: function() {
 
            //generate new captcha
            WEBAPP.cache.$refreshCaptcha.on('click', function(e)
            {
                WEBAPP.cache.$captchaImg.attr("src","/php/newCaptcha.php?rnd=" + Math.random());
            });
        },
 
        setupValidation: function()
        {
 
            WEBAPP.cache.$form.validate({
               onkeyup: false,
               rules: {
                    "firstname": {
                        "required": true
                    },
                    "lastname": {
                        "required": true
                    },
                    "email": {
                        "required": true
                    },
                    "captcha": {
                        "required": true,
                        "remote" :
                        {
                          url: '/php/checkCaptcha.php',
                          type: "post",
                          data:
                          {
                              code: function()
                              {
                                  return WEBAPP.cache.$captchaInput.val();
                              }
                          }
                        }
                    }
                },
                messages: {
                    "firstname": "Please enter your first name.",
                    "lastname": "Please enter your last name.",
                    "email": {
                        "required": "Please enter your email address.",
                        "email": "Please enter a valid email address."
                    },
                    "captcha": {
                        "required": "Please enter the verifcation code.",
                        "remote": "Verication code incorrect, please try again."
                    }
                },
                submitHandler: function(form)
                {
                    /* -------- AJAX SUBMIT ----------------------------------------------------- */
 
                    var submitRequest = $.ajax({
                         type: "POST",
                         url: "/php/dummyScript.php",
                         data: {
                            "data": WEBAPP.cache.$form.serialize()
                        }
                    });
 
                    submitRequest.done(function(msg)
                    {
                        //success
                        console.log('success');
                        $('body').html('<h1>captcha correct, submit form success!</h1>');
                    });
 
                    submitRequest.fail(function(jqXHR, textStatus)
                    {
                        //fail
                        console.log( "fail - an error occurred: (" + textStatus + ")." );
                    });
 
                }
 
            });
 
        }
 
    }
 
    WEBAPP.init();
 
});

function vacio (){
	// //JSON
	// var cambiosCSS =
	// {
	// 	margin: 0,
	// 	overflow: 'hidden',
	// 	padding: 0,
	// 	width: 0
	// };
	// var cambiosPersonalizacion =
	// {
	// 	height: 'auto',
	// 	opacity: 1,
	// 	width: '40%'
	// };
	// $('#historia').css(cambiosCSS);
	// $('#personalizacion').css(cambiosPersonalizacion);
	// $('#color div').on('click', cambiarColor);
}