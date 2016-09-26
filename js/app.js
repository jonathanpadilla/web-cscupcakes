$(document).foundation();

/*var $btnmenu = $('#btn-menu');
var $offcanvas = new Foundation.OffCanvas($btnmenu);

$(function(){
	$('body').on('swiperight', function(){
		$offcanvas.open();
	});
	$('body').on('swipeleft', function(){
		$offcanvas.close();
	});
});
*/
$(function(){
	'use strict';
	$('body').addClass('loaded');

    $('#btn-enviar').click(function(e) {
            var form = $('#contacto');
            form.validate({
                rules: {
                    nombre: {
						required: true,
						minlength: 3
					},
                    correo: {
                        required: true
                        
                    },                    
                    msj: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    nombre: {
                        required: 'Ingrese su nombre',
                        minlength: 'Debe ingresar almenos 3 caracteres'
                    },                    
                    correo: {
                        required: 'Debe ingresar un correo electronico valido'
                    },                    
                    msj: {
                        required: 'Campo requerido',
                        minlength: 'Debe ingresar almenos 10 caracteres'
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.is(":radio") || element.is(":checkbox")) {
                        element.closest('.option-group').after(error);
                    }
                    else {
                        error.insertAfter(element);
                    }
                }
            });

            e.preventDefault();

            if (form.valid(true)) {
                                
                var data = form.serialize();
                var method = form.attr('method');
                var action = form.attr('action');
                
		            $.ajax({
		              url:'src/correo.php',
		              data:$("#form1").serialize(),
		              method:'post',
		              dataType:'json'
		            }).success(function(data){
		              console.log(data);
		            });
                // setTimeout(function() {
                //     // window.location.href = "dashboard.html";
                // }, 2000);
            }
            
    });

});


$(document).ready(function () {
  
    $("#owl-demo").owlCarousel({
   
            items: 1,
            autoplay: true,
            navigation: false,
            pagination: false,
            slideSpeed : 1000,
            autoplaySpeed: 2000,
            margin: 0,
            loop: true,
    });



});