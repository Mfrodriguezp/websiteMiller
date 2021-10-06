<?php

use PHPMailer\PHPMailer\PHPMailer;

/*Correo a enviar*/
$contact_email_to = 'miller.rodriguez@millerrodriguezweb.com.co';

$subject_title = "Contacto Página Web:";
$name_title = "Name:";
$email_title = "Email:";
$message_title = "Message:";

/*Datos del formulario*/
if (!$contact_email_to || $contact_email_to == 'contact@example.com') {
    die('The contact form receiving email address is not configured!');
}
if (isset($_POST)) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    if (strlen($name) < 3) {
        die("El campo <strong> Nombre</strong> tiene menos de 3 caracteres o se encuentra vacío");
    }
    if (!($email)) {
        die("Introduzca un correo válido");
    }
    if (strlen($subject) < 3) {
        die("El campo <strong>Asunto</strong> tiene menos de 3 caracteres o se encuentra vacío");
    }
    if (strlen($message) < 3) {
        die("El campo <strong>Mensaje</strong> tiene menos de 3 caracteres se encuentra vacío");
    }
    
require '../vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->isHTML(true);
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'contacto@millerrodriguezweb.com.co';
$mail->Password = 'Contacto2021*';
$mail->setFrom('contacto@millerrodriguezweb.com.co', 'Contacto Formulario');
$mail->addReplyTo('contacto@millerrodriguezweb.com.co', 'Contacto Formulario');
$mail->addAddress($contact_email_to, 'Miller Rodriguez');
$mail->Subject = $subject;
$message_content = '<strong>' . $name_title . '</strong> ' . $name . '<br>';
$message_content .= '<strong>' . $email_title . '</strong> ' . $email . '<br>';
$message_content .= '<strong>' . $message_title . '</strong> ' . nl2br($message);
$mail->Body=$message_content;

    if ($mail->send()) {
        echo 'OK';
    } else {
        echo 'Could not send mail! Please check your PHP mail configuration.'.$mail->ErrorInfo;
    }
}
?>