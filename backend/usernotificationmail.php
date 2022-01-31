<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');


function userNotification($toname,$tomail,$tobody){

    $mail = new PHPMailer(true);

    try {
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                 
    $mail->Host       = 'smtp.gmail.com';                     
    $mail->Username   = 'vgts.dev@gmail.com';                 
    $mail->Password   = 'vredpzyrhotllflu';                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
    $mail->Port       = 465;

    //Recipients
    // $mail->addAddress('nesanoctact@gmail.com', 'nesamani');
    $mail->addAddress($tomail,$toname);
    $mail->SetFrom('fromgmail@gmail.com', 'Pricol Technologies');                          
    $mail->Subject = 'Career position';
    $mail->Body = $tobody;
    $mail->isHTML(true);
    $mail->send();
    } catch (Exception $e) {

    }
}