<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 2;                    
    $mail->isSMTP();                                           
    $mail->Host       = 'mail.bsbimport.com';                   
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'info@bsbimport.com';                     
    $mail->Password   = 'InfoBSB2019.';                             
    $mail->SMTPSecure = 'ssl';           
    $mail->Port       = 465;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('info@bsbimport.com');     // Add a recipient          // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensaje desde la Pagina';
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'Enviado';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
