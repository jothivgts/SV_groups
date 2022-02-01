<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
include_once("./SMTPconfig.php");

function userNotification($toname,$tomail,$tobody){

    $mail = new PHPMailer(true);
    $smtpconfig = new SMTPCONFIGURATION();

    try {
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                 
    $mail->Host       = $smtpconfig->Host;                     
    $mail->Username   = $smtpconfig->Username;                 
    $mail->Password   = $smtpconfig->Password;                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
    $mail->Port       = $smtpconfig->Port;

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