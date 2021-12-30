<?php
header('Content-Type: application/json; charset=utf-8');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('../vendor/autoload.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // $name="Nesamani";$mobile ="8973409433" ; $email = "Nesamani@gmail.com" ; $content  = "Nesamani@gmail.com";
    $name = $_POST['explore_yourname'];
    $number = $_POST['explore_emailaddress'];
    $email = $_POST['explore_mobilenumber'];
    $description = $_POST['explore_description'];
    
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                 //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'vgts.dev@gmail.com';                 //SMTP username
    $mail->Password   = 'vredpzyrhotllflu';                   //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
    $mail->Port       = 465;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->addAddress('nesanoctact@gmail.com', 'nesamani');
    $mail->addAddress('k3sha7@gmail.com', 'keshav');
    $mail->SetFrom('fromgmail@gmail.com', 'Pricol Technologies');                                
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 
        "<!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
            </head>
            <body>
                Name : ".$name." <br/>
                Email : ".$email." <br/>
                Mobile : ".$mobile." <br/>
                Content : ".$content." <br/>
            </body>
        </html>
        ";

    $mail->isHTML(true);

    $mail->send();
    

    echo json_encode((object) ["sent" => true, "message" => 'Message has been sent']);
    

} catch (Exception $e) {

    echo json_encode((object) ["sent" => false, "message" => $mail->ErrorInfo]);
}

