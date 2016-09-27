var btn_inicio_editar_bienvenida 	= $("#btn_inicio_editar_bienvenida");
var file_foto 						= $(".file_foto");

var editar_texto_input 				= $(".editar_texto_input");
var editar_texto_area 				= $(".editar_texto_area");

$(function(){
	'use strict';

	// inputs
	editar_texto_input.dblclick(function(){

		// variables
		var content = $(this);
		var item 	= content.data('item');
		var texto 	= content.find(item).text();
		var id 		= content.data('id');
		var campo 	= content.data('campo');

		// crear input o textarea
		var input = focusInTexto( content, texto, 'input');
		
		// destruir textarea y enviar para guardar
		content.focusout(function(){

			var texto_final = focusOutTexto(content, input, item)
			guardarTexto(texto_final, id, campo);

		});

	});

	// textarea
	editar_texto_area.dblclick(function(){

		// variables
		var content = $(this);
		var item 	= content.data('item');
		var texto 	= content.find(item).text();
		var id 		= content.data('id');
		var campo 	= content.data('campo');

		// crear input o textarea
		var input = focusInTexto( content, texto, 'textarea');
		
		// destruir textarea y enviar para guardar
		content.focusout(function(){

			var texto_final = focusOutTexto(content, input, item)
			guardarTexto(texto_final, id, campo);

		});

	});

	file_foto.on('change', function(){
		var btn 					= $(this);
		var content_image 			= btn.data('img');
		var form 					= btn.data('form');
		var id 						= btn.data('id');

		// $("."+content_image).html('<img src="#">');
		guardarImagen( $("#"+form), 1);
	});

});

// funciones globales
function focusInTexto(content, texto, area)
{
	// input o textarea
	var campo_texto = '';
	if(area == 'input')
		campo_texto = '<input type="text" id="texto_generico" value="'+texto+'">';
	else if(area == 'textarea')
		campo_texto = '<textarea id="texto_generico" rows="5">'+texto+'</textarea>';

	// insertar en el contenido y agregar focus
	content.html(campo_texto);
	$("#texto_generico").focus();

	return $("#texto_generico");
}

function focusOutTexto(content, texto, item)
{
	var texto_real = texto.val();
	content.html('<'+item+'>'+texto_real+'</'+item+'>');
	return texto_real;
}

function guardarTexto(texto, id, campo)
{
	var arr = {
		'texto': texto,
		'id': id,
		'campo': campo
	}

	$.ajax({
		url: Routing.generate('ajax_guardar_texto'),
		data: arr,
		dataType: 'json',
		method: 'post',
	}).success(function(json){
		if(json.result)
		{
			console.log(json);
		}
	
	});
	
}

function guardarImagen(form, id)
{
	var datos = new FormData(form[0]);
	datos.append('id', id);

	$.ajax({
		url: Routing.generate('ajax_guardar_imagen'),
		data: datos,
		dataType: 'json',
		method: 'post',
		contentType:false,
	  	processData:false,
	  	cache:false
	}).success(function(json){
		if(json.result)
		{
	
		}
		console.log(json);
	
	});
	
}