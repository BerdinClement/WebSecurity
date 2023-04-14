<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

function sendMail($to, $name, $otp): bool
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = ''; // Votre identifiant                     //SMTP username
        $mail->Password   = ''; // Votre mot de passe                              //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('noreply@clementberdin.fr', 'Mailer');
        $mail->addAddress($to, $name);     //Add a recipient
        //Content

        $body = "Bonjour $name, <br> Votre code d'authentification est le suivant : <br> <b>$otp</b>";

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Authentication OTP';
        $mail->Body    = $body;

        $mail->send();
        return 1;
    } catch (Exception $e) {
        return 0;
    }
};
