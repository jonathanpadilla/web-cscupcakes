<?php 
require '../vendor/autoload.php';
use Mailgun\Mailgun;

$data = $_POST['data'];
$data = json_decode($data);

$nombre = $data->datos->nombre;
$apellidos = $data->datos->apellidos;
$telefono = $data->datos->telefono;
$correo = $data->datos->correo;

$cantidad = $data->datos->cantidad;

$tipo = $data->pasos->tipo;
$sabor = $data->pasos->sabor;
$cobertura = $data->pasos->cobertura;
$color_cobertura = $data->pasos->color_cobertura;
$decoracion = $data->pasos->decoracion;

$mg = new Mailgun("key-f0c611bba5c74663aa73d39c7ad51626");
$domain = "cscupcakes.cl";

$message = '<html><body>';

$message .= '<p><h3 style="display: inline;">Nombre: </h3>'.$nombre.'</p>';
$message .= '<p><h3 style="display: inline;">Apellidos: </h3>'.$apellidos.'</p>';
$message .= '<p><h3 style="display: inline;">Telefono: </h3>'.$telefono.'</p>';
$message .= '<p><h3 style="display: inline;">Correo: </h3>'.$correo.'</p>';

$message .= '<p><h3 style="display: inline;">Cantidad: </h3>'.$cantidad.'</p>';

$message .= '<p><h3 style="display: inline;">Tipo: </h3>'.$tipo.'</p>';
$message .= '<p><h3 style="display: inline;">Sabor: </h3>'.$sabor.'</p>';
$message .= '<p><h3 style="display: inline;">Cobertura: </h3>'.$cobertura.'</p>';
$message .= '<p><h3 style="display: inline;">Color Cobertura: </h3>'.$color_cobertura.'</p>';
$message .= '<p><h3 style="display: inline;">Decoracion: </h3>'.$decoracion.'</p>';

$message .= "</body></html>";

$return = $mg->sendMessage($domain, 
	array(
		'from'    => 'contacto@cscupcakes.cl', 
		'to'      => 'bastienff@gmail.com', 
		'subject' => 'Arma tu Cupcake', 
		'html'    => $message
	)
);

if($return) {
	echo '1';
} else {
	echo '0';
}
