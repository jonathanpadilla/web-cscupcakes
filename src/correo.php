<?php

$nombre = $_POST['nombre'];
$fono = $_POST['fono'];
$mail = $_POST['correo'];
$msj= $_POST['msj'];

$header = 'From: ' . $mail . " \r\n";
// $header .= "X-Mailer: PHP/" . phpversion() . " \r\n"; 
// $header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain; charset=UTF-8";

$mensaje = "Este mensaje fue enviado por " . $nombre . " \r\n";
$mensaje .= "Su e-mail es: " . $mail . " \r\n";
$mensaje .= "Su numero telefonico es: " .$fono. " \r\n";
$mensaje .= "Mensaje: \r\n" . $_POST['msj'] . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time()). " \r\n";

$para = 'ale_sa34@hotmail.com';
$asunto = 'Contacto desde la web';

$x = mail($para, $asunto, $mensaje, $header);

echo json_encode(array('result'=>true));