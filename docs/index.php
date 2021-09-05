<?php

$errores = '';
$enviado = '';


if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];

  if (!empty($nombre)) {
    $nombre = trim($nombre);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  } else {
    $errores .= 'Por favor introduce un nombre <br/>';
  }

  if (!empty($email)) {
    $email = trim($email);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!$email = filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores .= 'El correo introducido no es válido <br/>';
    }

  } else {
    $errores .= 'Por favor introduce un correo <br/>';
  }

  if(!empty($mensaje)){
      $mensaje = htmlspecialchars($mensaje);
      $mensaje= trim($mensaje);
      $mensaje= stripslashes($mensaje);
      
  }else{
    $errores .= 'Por favor introduce un mensaje <br/>';
  }

  if(!$errores){
    $enviar_a = 'kevingonzalezcuenca@gmail.com';
    $asunto = 'Correo enviado desde el formulario';
    $mensajePreparado = "De: $nombre \n";
    $mensajePreparado .= "Correo: $email\n";
    $mensajePreparado.= "Mensaje: $mensaje";

    mail($enviar_a,$asunto,$mensajePreparado);
    $enviado=true;
  }


}



require 'index.view.php';
