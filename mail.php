<?php

require 'PHPMailerAutoload.php';

$email_to = $_POST['mailto'];
$name = $_POST['name']; 
$email = $_POST['email']; 
$message = $_POST['message']; 

$mail = new PHPMailer(true);

$mail->CharSet = 'UTF-8';

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Username = "michal.apibara@gmail.com";
$mail->Password = "virtualo123";
$mail->Port = "465";

$mail->setFrom($email, $name);
$mail->addAddress($email_to);     							

$mail->Subject = 'Wiadomość z formularza strony apibara.pl';
$mail->Body    = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}