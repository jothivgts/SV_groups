<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // reference : https://support.google.com/mail/answer/7126229?hl=en#zippy=%2Cstep-change-smtp-other-settings-in-your-email-client

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
    $mail->isSMTP(); 
    $mail->SMTPAuth   = true;                                 //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'vgts.dev@gmail.com';                 //SMTP username
    $mail->Password   = 'vredpzyrhotllflu';                   //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
    $mail->Port       = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->addAddress('k3sha7@gmail.com', 'keshav');
    $message = file_get_contents('email_tempalte/enquire.html');
    $message = str_replace('%name%', $explore_yourname, $message);
    $message = str_replace('%number%', $explore_mobilenumber, $message);
    $message = str_replace('%email%', $explore_emailaddress, $message);
    $message = str_replace('%description%', $explore_description, $message);
    
    //Content
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    // $email_template = '../email_tempalte/enquire.html';
    $mail->SetFrom('fromgmail@gmail.com', 'Pricol Technologies'); 
    $mail->AddAddress('addaddress@gmail.com'); 
    $mail->MsgHTML($message);
    $mail->CharSet="utf-8";
    // $mail->Body =  "adjfdhbj";
    $mail->Body = "
        <div style='margin-left:150px;background-image:url(http://archive.customize.org/files/old/wallpaper/files/Surreal_Red_big.jpg); padding:50px;width:600px;'>
        <h1 style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif;text-align:center;line-height:2.5em;'>Diwali Wishes!</h1>
        <hr>
        <table>
        <tr><td style='text-align:center'>
        <div>
        <a href=''><img src='http://webneel.com/daily/sites/default/files/images/daily/09-2013/14-diwali-greeting-card.jpg' align='left' style='width:250px;height:250px;' alt=''/></a>
        <p style='color:#FFFFDD; font-family: Allura,cursive,Arial, Helvetica, sans-serif; font-size:20px'>'Have a prosperous Diwali.Hope this festival of lights,brings you every joy and happiness.May the lamps of joy,illuminate your life and fill your days with the bright sparkles of peace,mirth and good will.'</p>
        </div>
        </td>
        </tr>
        <tr>
        <td><div style='float:left;'><p style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif; font-size:20px'>'May the joy, cheer, Mirth and merriment Of this divine festival Surround you forever......'</p></div></td>
        </tr>
        </table>
        </div>"
      ;}
    
    $mail->Subject = 'Enquire form';
    $mail->isHTML(true);                                        //Set email format to HTML
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



