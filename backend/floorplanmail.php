<?php
header('Content-Type: application/json; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
include("./usernotificationmail.php");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
$secret = "6LeCkMUdAAAAAA3vk-nC3pgckTpLKRSJU1CE8rxa";
$remoteip = $_SERVER['REMOTE_ADDR'];
$response = $_POST['g-recaptcha-response'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
$data = file_get_contents($url);
$row = json_decode($data, true);
//HTTP Request parse start
$name = $_REQUEST['floorplan_yourname'];
$mobile = $_REQUEST['floorplan_mobilenumber'];
$email = $_REQUEST['floorplan_emailaddress'];
$content = $_REQUEST['floorplan_description'];
$type = $_REQUEST['type'];
//HTTP Request parse end

$mail->isSMTP(); 
$mail->SMTPAuth   = true;                                 
$mail->Host       = 'smtp.gmail.com';                     
$mail->Username   = 'vgts.dev@gmail.com';                 
$mail->Password   = 'vredpzyrhotllflu';                   
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
$mail->Port       = 465;

//Recipients
// $mail->addAddress('nesanoctact@gmail.com', 'nesamani');
$mail->addAddress('k3sha7@gmail.com', 'keshav');
$mail->SetFrom('fromgmail@gmail.com', 'SV Groups');                                
$mail->Subject = 'Here is the subject';
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
                Content : ".$content."  <br/>
                Type    : ".$type."     <br/>
            </body>
        </html>
        ";
$mail->isHTML(true);
$mail->send();

$tobody = "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>
<body>
Thanks for your request.
</body>
</html>
";

userNotification($name,$email,$tobody);

echo json_encode((object) ["sent" => true, "message" => 'Message has been sent']);
} catch (Exception $e) {
echo json_encode((object) ["sent" => false, "message" => $mail->ErrorInfo]);
}
