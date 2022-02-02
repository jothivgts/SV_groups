<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

function userNotification($toname,$tomail,$attachment = true){

$mail = new PHPMailer(true);
$smtpconfig = new SMTPCONFIGURATION();
if($attachment){
$tobody = "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>
<body>

<pre>
Dear Mr. / Mrs. ".$toname.",
We would like to express our thanks for your interest in our apartment.
Regarding your inquiry, Please note that the mail is enclosed with Brochure, Floor Plans and Walk-through Videos at the end of this email.
Our Sales Team will contact you within 24hrs. Should there be any questions, please feel free to contact us on +91 - 9845001343 / 9845001560 / 9845001792 (or) write to us svgrandur@svgroups.in. We look forward to hear from you.

Yours sincerely,
Marketing Teams,
SV Groups
</pre>

</body>
</html>";
}else{
$tobody = "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Document</title>
</head>
<body>

<pre>
Dear Mr. / Mrs. ".$toname.",
We would like to express our thanks for your interest in our apartment.

Yours sincerely,
SV Groups
</pre>

</body>
</html>";
}


    try {
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                 
    $mail->Host       = $smtpconfig->Host;                     
    $mail->Username   = $smtpconfig->Username;                 
    $mail->Password   = $smtpconfig->Password;                   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
    $mail->Port       = $smtpconfig->Port;
    $mail->SetFrom('nesamani@friendswebsolution.com', 'Nesamani R');
    $mail->addAddress('nesamani@friendswebsolution.com', 'Nesamani R');
    $mail->addAddress('nesamani@vishgyana.com', 'Nesamani R');
    $mail->addAddress($tomail,$toname);
    $mail->Subject = 'SV groups - Thanks for interest';

    if($attachment){
        $mail->addAttachment('../asset/brochure.pdf', 'Brochure.pdf');
        // $mail->addAttachment('../asset/2BHK.zip', '2BHK.zip');
        // $mail->addAttachment('../asset/3BHK.zip', '3BHK.zip');
        // $mail->addAttachment('../asset/brochure.pdf', 'Brochure.pdf');
    }

    $mail->Body = $tobody;
    $mail->isHTML(true);
    $mail->send();
    } catch (Exception $e) {

    }
}