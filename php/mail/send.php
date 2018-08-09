<?php
include "class.phpmailer.php";
include "class.smtp.php";

$email_user = "	comoderjr@gmail.com";
$email_password = "	comoderjr419196545";

$the_subject = $_POST['subject'];
$address_to = $_POST['email'];
$from_name = $_POST['name'];

$message = $_POST['message'];

$phpmailer = new PHPMailer();

// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "smtp.gmail.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;

$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->addCC('rene.huertas@romiesfour.com.pe');

$phpmailer->Subject = $the_subject;	
$phpmailer->Body .="<h1 style='color:#3498db;'>GRACIAS POR CONTACTARNOS!</h1>";
$phpmailer->Body .= "<p>$message</p>";
$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);

$phpmailer->Send();


?>