<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');


function userNotification($toname,$tomail,$tobody){

    $mail = new PHPMailer(true);

    try {

    //HTTP Request parse start
    $name = $_REQUEST['career_yourname'];
    $mobile = $_REQUEST['career_mobilenumber'];
    $email = $_REQUEST['career_emailaddress'];
    $position = $_REQUEST['career_position'];
    $file_tmp  = $_FILES['resume']['tmp_name'];
    $file_name = $_FILES['resume']['name'];
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
    $mail->addAddress($tomail,$toname);
    $mail->SetFrom('fromgmail@gmail.com', 'Pricol Technologies');                          
    $mail->Subject = 'Career position';
    $mail->Body = $tobody;
    $mail->isHTML(true);
    $mail->send();
    } catch (Exception $e) {

    }
}