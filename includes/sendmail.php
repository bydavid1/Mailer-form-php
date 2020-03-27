<?php

require 'includes/phpmailer/PHPMailer.php';
require 'includes/phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//Response message
$valid['success'] = array(
    'success' => false,
    'messages' => array()
);


    $valid['success']  = true;
    $valid['messages'] = "Enviado";

echo json_encode($valid);
?>