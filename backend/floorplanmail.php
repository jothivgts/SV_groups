<?php
header('Content-Type: application/json; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
include_once("./SMTPconfig.php");
include("./usernotificationmail.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$smtpconfig = new SMTPCONFIGURATION();

try {
//HTTP Request parse start
$name = $_REQUEST['floorplan_yourname'];
$mobile = $_REQUEST['floorplan_mobilenumber'];
$email = $_REQUEST['floorplan_emailaddress'];
$content = $_REQUEST['floorplan_description'];
$type = $_REQUEST['type'];
//HTTP Request parse end

$mail->isSMTP(); 
$mail->SMTPAuth   = true;                                 
$mail->Host       = $smtpconfig->Host;                     
$mail->Username   = $smtpconfig->Username;                 
$mail->Password   = $smtpconfig->Password;                   
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
$mail->Port       = $smtpconfig->Port;

$mail->SetFrom('svgrandur@svgroups.in', 'SV Groups');
$mail->Subject = 'Floorplan Mail';
$mail->Body=
        "<!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
            </head>
            <body>
                Name    : ".$name."     <br/>
                Email   : ".$email."    <br/>
                Mobile  : ".$mobile."   <br/>
                Type    : ".$type."     <br/>
            </body>
        </html>
        ";
$mail->isHTML(true);
$mail->send();

userNotification($name,$email);

echo json_encode((object) ["sent" => true, "message" => 'Message has been sent']);
} catch (Exception $e) {
echo json_encode((object) ["sent" => false, "message" => $mail->ErrorInfo]);
}
