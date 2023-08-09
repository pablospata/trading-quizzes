<?php


// Verifica si los datos del formulario han sido enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // Recopila los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Configura los datos del correo
    $destinatario = "pablospata@hotmail.com"; // Reemplaza esto con tu dirección de email
    $asuntoCorreo = "Nuevo mensaje de: $nombre";

    // Formatea el mensaje
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Teléfono: $telefono\n";
    $contenido .= "Asunto: $asunto\n\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Establece los encabezados del correo
    $encabezados = "From: $nombre <$email>";

    // Envía el correo
    if (mail($destinatario, $asuntoCorreo, $contenido, $encabezados)) {
        echo "Mensaje enviado con éxito!";
    } else {
        echo "Hubo un error al enviar el mensaje. Inténtalo nuevamente.";
    }
}
