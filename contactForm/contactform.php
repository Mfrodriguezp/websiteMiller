<?php

/*Correo a enviar*/
$contact_email_to = 'miller.rodriguez@millerrodriguezweb.com.co';

$subject_title = "Contacto Página Web:";
$name_title = "Name:";
$email_title = "Email:";
$message_title = "Message:";

/*Datos del formulario*/
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_var($_POST['message'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!$contact_email_to || $contact_email_to == 'contact@example.com') {
    die('The contact form receiving email address is not configured!');
}
if (!isset($contact_email_from)) {
    $contact_email_from = "contactform@" . @preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']);
}

if (strlen($name) < 3 || is_null($name) || $name = '') {
    echo "El campo <strong>Nombre</strong> tiene menos de 3 caracteres o se encuentra vacío";
} elseif (!($email)) {
    echo "Introduzca un correo válido";
} elseif (strlen($subject) < 3 || is_null($subject) || $subject = '') {
    echo "El campo <strong>Asunto</strong> tiene menos de 3 caracteres o se encuentra vacío";
} elseif (strlen($message) < 3 || is_null($message) || $message = '') {
    echo "El campo <strong>Mensaje</strong> se encuentra vacío";
} else {
    $headers = 'From: ' . $name . ' <' . $contact_email_from . '>' . PHP_EOL;
    $headers .= 'Reply-To: ' . $email . PHP_EOL;
    $headers .= 'MIME-Version: 1.0' . PHP_EOL;
    $headers .= 'Content-Type: text/html; charset=UTF-8' . PHP_EOL;
    $headers .= 'X-Mailer: PHP/' . phpversion();

    $message_content = '<strong>' . $name_title . '</strong> ' . $name . '<br>';
    $message_content .= '<strong>' . $email_title . '</strong> ' . $email . '<br>';
    $message_content .= '<strong>' . $message_title . '</strong> ' . nl2br($message);

    $sendemail = mail($contact_email_to, $subject_title . ' ' . $subject, $message_content, $headers);
    if ($sendemail) {
        echo 'OK';
    } else {
        echo 'Could not send mail! Please check your PHP mail configuration.';
    }
}
