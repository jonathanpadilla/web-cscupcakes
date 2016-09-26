$(function(){

	function setOp(step, key){
        $.each(step, function(index){
          step[index] = 0;
        });
        step[key] = 1;
      }

      function setAc(opts){
        $.each(opts, function(index){
          opts.removeClass('active');
        });
      }

      var osett = {
	      'step1': {
	        'minicupcake': 0,
	        'cupcake': 0
	      },

	      'step2': {
	        'vainilla': 0,
	        'chocolate': 0,
	        'limon': 0,
	        'naranja': 0,
	        'mentachoc': 0,
	        'belgachoc': 0
	      },

	      'step3': {
	        'chocolate': 0,
	        'manjar': 0,
	        'nutella': 0,
	        'frambuesa': 0,
	        'arandanos': 0,
	        'cremapastelera': 0
	      },

	      'step4': {
	        'rojo': 0,
	        'verde': 0,
	        'amarillo': 0,
	        'celeste': 0,
	        'azul': 0,
	        'marron': 0,
	        'morado': 0,
	        'naranja': 0,
	        'rosado': 0
	      },

	      'step5': {
	        'letras': 0,
	        'flores': 0,
	        'pearldrops': 0,
	        'chocorain': 0,
	        'cocoflakes': 0,
	        'ornamental': 0
	      },

	      'step6': {
	        'nombre': '',
	        'apellidos': '',
	        'telefono': '',
	        'correo': ''
	      }
	  }

      var sett = {
	      'step1': {
	        'minicupcake': 0,
	        'cupcake': 0
	      },

	      'step2': {
	        'vainilla': 0,
	        'chocolate': 0,
	        'limon': 0,
	        'naranja': 0,
	        'mentachoc': 0,
	        'belgachoc': 0
	      },

	      'step3': {
	        'chocolate': 0,
	        'manjar': 0,
	        'nutella': 0,
	        'frambuesa': 0,
	        'arandanos': 0,
	        'cremapastelera': 0
	      },

	      'step4': {
	        'rojo': 0,
	        'verde': 0,
	        'amarillo': 0,
	        'celeste': 0,
	        'azul': 0,
	        'marron': 0,
	        'morado': 0,
	        'naranja': 0,
	        'rosado': 0
	      },

	      'step5': {
	        'letras': 0,
	        'flores': 0,
	        'pearldrops': 0,
	        'chocorain': 0,
	        'cocoflakes': 0,
	        'ornamental': 0
	      },

	      'step6': {
	        'nombre': '',
	        'apellidos': '',
	        'telefono': '',
	        'correo': ''
	      }
	  }

	  var $email = {
	  	'pasos': {},
	  	'datos': {}
	  };

	  function resetStep(step){
		$.each(sett[step], function(index, value){
				sett[step][index] = 0;
		});
	  }

	  function reset(){
	  	sett = osett;
	  	$top = $('#arma .top li');
	  	$.each($top, function(){
	  		$(this).find('a').removeClass('actived');
	  		$(this).find('a').addClass('disabled');
	  	});
	  	$('#arma .top li').eq(0).find('a').removeClass('disabled');
	  	$('#arma .top li').eq(0).find('a').addClass('actived');
	  	$('.cupcakes-slides').slick('slickGoTo',0);
	  	$('#datos input').val('');
	  	$('#arma .step').removeClass('active');
	  	$(".range-slider__range").val("6");
	  	rangeSlider();
	  }

	  var parsedSett = '';
	  function parseSett(){
	  	parsedSett = '';
	  	var i = 1;
	  	$.each(sett, function(valuee, indexx){
	  		$.each(this, function(value, index){
	  			if(index != 0){
	  				switch(i){
	  					case 1:
	  						//parsedSett += 'TIPO: '+value.toUpperCase()+'<br>';	
	  						parsedSett += 'TIPO: <select name="" class="selectresume" id="tipo">';
	  						if(value == 'cupcake') {
	  							parsedSett += '<option selected>CUPCAKE</option>';
	  						} else {
	  							parsedSett += '<option>CUPCAKE</option>';
	  						}
	  						if(value == 'minicupcake') {
	  							parsedSett += '<option selected>MINICUPCAKE</option>';	
	  						} else {
	  							parsedSett += '<option>MINICUPCAKE</option>';	
	  						}
	  						parsedSett += '</select><br>'

	  						$email.pasos.tipo = value;
	  						break;
	  					case 2:
	  						//parsedSett += 'SABOR: '+value.toUpperCase()+'<br>';	

	  						var opts = ['vainilla','chocolate','limon','naranja','mentachoc','belgachoc'];

	  						parsedSett += 'SABOR: <select name="" class="selectresume" id="sabor">';
	  						$.each(opts, function(index2, value2){
		  						if(value == value2) {
		  							parsedSett += '<option selected>'+value2.toUpperCase()+'</option>';
		  						} else {
		  							parsedSett += '<option>'+value2.toUpperCase()+'</option>';
		  						}
	  						});	  						
	  						parsedSett += '</select><br>'

	  						$email.pasos.sabor = value;
	  						break;
	  					case 3:
	  						//parsedSett += 'COBERTURA: '+value.toUpperCase()+'<br>';		

	  						var opts = ['chocolate','manjar','nutella','frambuesa','arándanos','cremapastelera'];

	  						parsedSett += 'COBERTURA: <select name="" class="selectresume" id="cobertura">';
	  						$.each(opts, function(index2, value2){
		  						if(value == value2) {
		  							parsedSett += '<option selected>'+value2.toUpperCase()+'</option>';
		  						} else {
		  							parsedSett += '<option>'+value2.toUpperCase()+'</option>';
		  						}
	  						});	  						
	  						parsedSett += '</select><br>'

	  						$email.pasos.cobertura = value;
	  						break;
	  					case 4:
	  						//parsedSett += 'COLOR COBERTURA: '+value.toUpperCase()+'<br>';

	  						var opts = ['rojo','verde','amarillo','azul','marron','morado', 'naranja', 'rosado'];

	  						parsedSett += 'COLOR COBERTURA: <select name="" class="selectresume" id="color_cobertura">';
	  						$.each(opts, function(index2, value2){
		  						if(value == value2) {
		  							parsedSett += '<option selected>'+value2.toUpperCase()+'</option>';
		  						} else {
		  							parsedSett += '<option>'+value2.toUpperCase()+'</option>';
		  						}
	  						});	  						
	  						parsedSett += '</select><br>'

	  						$email.pasos.color_cobertura = value;
	  						break;
	  					case 5:
	  						//parsedSett += 'DECORACION: '+value.toUpperCase()+'<br>';

	  						var opts = ['letras','flores','pearldrops','chocorain','chocoflakes','ornamental'];

	  						parsedSett += 'DECORACION: <select name="" class="selectresume" id="decoracion">';
	  						$.each(opts, function(index2, value2){
		  						if(value == value2) {
		  							parsedSett += '<option selected>'+value2.toUpperCase()+'</option>';
		  						} else {
		  							parsedSett += '<option>'+value2.toUpperCase()+'</option>';
		  						}
	  						});	  						
	  						parsedSett += '</select><br>'

	  						$email.pasos.decoracion = value;
	  						break;
	  					
	  				}
	  				//parsedSett += 'Paso '+i+': '+value+'\n\n';
	  			}

	  		})
	  		i++;
	  	});
	  	//parsedSett += 'CANTIDAD: '+$cantidad+'<br>';
	  	//parsedSett += 'CANTIDAD: <input type="number" name="" id="cantidadresume" class="show" value="'+$cantidad+'"><a href="" id="showme">showme</a>';
	  	parsedSett += 'CANTIDAD: <input type="number" name="" id="cantidadresume" class="show" value="'+$cantidad+'">';
	  	$email.datos.cantidad = $cantidad;
	  }

	  $(document).on('change', '#cantidadresume', function() {
	  	$email.datos.cantidad = this.value;
	  });

	  $(document).on('change', '.selectresume', function() {
	  		var step = $(this).attr('id');
  			$email.pasos[step] = this.value.toLowerCase();
		});		

	  /*$(document).on('click', '#showme', function(event){
	  	event.preventDefault();
	  	//console.log(sett);
	  	console.log($email);
	  });*/

	  $('.terminar').on('click', function(event){
	  	event.preventDefault();
	  	
	  	var allow = false;

	  	$('#datos input').each(function(index){
	  		//console.log($(this).val());
      		if($(this).val()) {
      			allow = true;
      		} else {
      			allow = false;
      		}
      	});

		/*$.each(sett['step5'], function(index){
      		if(this != 0) allow = true;
      	});*/

      	if (allow) {
        	parseSett();

        	sett['step6']['nombre'] = $email.datos.nombre = $('#nombre').val();
        	sett['step6']['apellidos'] = $email.datos.apellidos = $('#apellidos').val();
        	sett['step6']['telefono'] = $email.datos.telefono = $('#telefono').val();
        	sett['step6']['correo'] = $email.datos.correo = $('#correo').val();

        	swal(
	        	{   
	        		title: sett['step6']['nombre'] + ", ¿Estás seguro de que tu pedido es correcto?",   
	        		text: parsedSett,   
	        		type: "warning",  
	        		html: true, 
	        		showCancelButton: true,   
	        		confirmButtonColor: "#4a3c72",     
	        		confirmButtonText: "Si, enviar pedido!",   
	        		closeOnConfirm: false,
	        		showLoaderOnConfirm: true
	        	}, 

	        	function(){

	        		var $data = JSON.stringify($email);

	        		$.ajax({
					    type: "POST",
					    url: "include/arma.php",
					    data: { data: $data},
					    success: function(datos){
					    	if (datos == '1') {
						   		swal(
			        				"Enviado!", 
			        				"Tu pedido a sido procesado.", 
			        				"success"
			        			);
			        			reset();
		        			} else {
		        				swal(
			        				"Error! C001", 
			        				"Ha ocurrido un error. Intentalo de nuevo.", 
			        				"error"
		        				);
		        				console.log(datos);
		        			}
						},
						error: function(){
							swal(
		        				"Error! C002", 
		        				"Ha ocurrido un error. Intentalo de nuevo.", 
		        				"error"
		        			);
						}
					});

	        		/*setTimeout(function(){
		        		swal(
		        			"Enviado!", 
		        			"Tu pedido a sido procesado.", 
		        			"success"
		        		); 
	        		}, 2000);*/
	        	}
	        );

	  		/*swal(
	          	"Estas seguro de que tu pedido es correcto?", 
	          	parsedSett,
	        	"warning"
	    	);*/
	   	} else {
	       	swal(
	          	"Debes seleccionar una opcion!", 
	          	"Para poder cotizar apropiadamente tu pedido siempre tienes que elegir una opcion.", 
	        	"error"
	    	);
	    }

	  });

      $.each($('.slide-step'),function(index){

      	var step = $(this).attr('class').split(' ')[0];

      	$(this).find('.step').on('click', function(event){
	        event.preventDefault();
	        
	        var opts = $('.'+step).not('.slick-cloned').find('.step')
	        setAc(opts);
	        $(this).addClass('active');

	        var key = $(this).attr('href');
	        setOp(sett[step], key);

	        console.log(sett[step]);
      	});

      	$(this).find('.anext').on('click', function(event){
      		event.preventDefault();

      		var allow = false;

      		var topstep = $(this).parent().parent().parent();
      		var topindex = ($('.slick-slide').index(topstep))-1;

      		$.each(sett[step], function(index){
      			if(this != 0) allow = true;
      		});

        	if (allow) {
          		$('.cupcakes-slides').slick('slickNext');
          		$('#arma .top li').eq(topindex).find('a').removeClass('disabled');
          		$('#arma .top li').eq(topindex).find('a').addClass('actived');

          		$.each(sett['step'+(topindex+1)], function(index){
					$('#arma .top li').eq(topindex).find('span').html(index);          			
          		});

          		$('#arma .top li').eq(topindex+1).find('a').removeClass('disabled');
          		$('#arma .top li').eq(topindex+1).find('a').addClass('actived');
	        } else {
	          	swal({
	          		title: "Debes seleccionar una opcion!", 
	          		text: "Para poder cotizar apropiadamente tu pedido siempre tienes que elegir una opcion.", 
	          		type: "error",
	          		confirmButtonColor: "#4a3c72"
	          	});
	        }
      	});

      	$(this).find('.aprev').on('click', function(event){
        	event.preventDefault();
        	$('.cupcakes-slides').slick('slickPrev');
      	});

      	$('#arma .top li').unbind().on('click', function(event){
      		event.preventDefault();
      		var index = $('#arma .top li').index(this);
      		if(!$(this).find('a').hasClass('disabled')) $('.cupcakes-slides').slick('slickGoTo',index);
      	});

      });



$cantidad = 6;

var rangeSlider = function(){
  var slider = $('.range-slider'),
      range = $('.range-slider__range'),
      value = $('.range-slider__value');
    
  slider.each(function(){

    value.each(function(){
      var value = $(this).prev().attr('value');
      $(this).html(value);
    });

    range.on('input', function(){
      $(this).next(value).html(this.value);
      $cantidad = this.value;
    });
  });
};

rangeSlider();

});