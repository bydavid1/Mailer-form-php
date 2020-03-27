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

//Obtain data
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dui = $_POST['dui'];
$nit = $_POST['nit'];
$n_cuenta = $_POST['n-cuenta'];
$t_credito = $_POST['t-credito'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$l_trabajo = $_POST['l-trabajo'];
$t_negocio = $_POST['t-negocio'];
$solicitud = $_POST['solicitud'];
$agencia = $_POST['agencia'];


$mail = new PHPMailer;

$mail->Host = 'smtp.gmail.com';  //SMTP Server
$mail->SMTPAuth = true;                               
$mail->Username = 'desarrolloweb@grupofenix.com.sv';      //email     
$mail->Password = '@18gfSVcmkt2';                 //contraseña
$mail->SMTPSecure = 'ssl';                 
$mail->Port = 587;                                   

$mail->setFrom('noreply@lasihua.com', 'La Sihua');
$mail->addAddress('victorh0323@outlook.com');   //Direcciones
$mail->addAddress($email);         
$mail->addReplyTo('noreply@lasihua.com', 'Information');
$mail->isHTML(true); 

$mail->Subject = 'Solicitud afectado por COVID-19'; //Asunto
$mail->Body    = "
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
<style>

h2 {
    text-align: center;
}

h3{
color: #656E74;
text-align: center;
text-decoration:none;
}

.container{
    font-family: Helvetica;
    padding-top: 15px;
    padding-bottom: 15px;
    width: 75%;
    margin: auto;
}

label{
    font-weight: bold;
}

.info{
    font-size: 16px;
}

</style>
</head>
<div style='background-color: #F8F9FA;'>
<div class='container'>
<h2>Información</h2>
<h3>".$nombre." ".$apellido."</h3>
<div class='info'><label>Nombre:</label> ".$nombre."<br>
<label>Apellido:</label> ".$apellido."<br>
<label>DUI:</label> ".$dui."<br>
<label>NIT:</label> ".$nit."<br>
<label>Numero de cuenta:</label> ".$n_cuenta."<br>
<label>Tipo de crédito:</label> ".$t_credito."<br>
<label>Correo Electrónico:</label> ".$email."<br>
<label>Teléfono o celular:</label> ".$celular."<br>
<label>Dirección:</label> ".$direccion."<br>
<label>Lugar de trabajo:</label> ".$l_trabajo."<br>
<label>Tipo de negocio:</label> ".$t_negocio."<br>
<label>Solicitud:</label> ".$solicitud."<br>
<label>Agencia:</label> ".$agencia."<br><br><br>
<p>BAJO JURAMENTO DECLARO: Que la información proporcionada para acogerme a los beneficios del decreto legislativo número 593 
de la fecha 14 de marzo de 2020, que contiene el Decreto de Emergencia Nacional de la Pandemia por COVID – 19, es verdadera y fidedigna, 
cuya veracidad podrá ser investigada libremente, además autorizo a SIHUACOOP DE R.L, para que esta información sea almacenada, 
custodiada y compartida con las autoridades y funcionarios competentes para todos los efectos legales que puedan corresponder</p>
<p>*Acepto que toda la información es fidedigna.</p>";

if(!$mail->send()) {
    $valid['success']  = false;
    $valid['messages'] = "Ocurrió un error al enviar, intentelo mas tarde";
} else {
    $valid['success']  = true;
    $valid['messages'] = "Enviado";
}

echo json_encode($valid);
?>