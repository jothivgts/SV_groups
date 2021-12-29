<?php
date_default_timezone_set('Etc/UTC');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$confirmationMail = new PHPMailer;
$confirmationMail->isSMTP();
$confirmationMail->SMTPDebug = 2;
$confirmationMail->Debugoutput = 'html';
$confirmationMail->Host = 'smtp.gmail.com';
$confirmationMail->Port = 587;
$confirmationMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$confirmationMail->SMTPAuth = true;


if(isset($_POST['submit']))
{
    $secret = "6LeCkMUdAAAAAA3vk-nC3pgckTpLKRSJU1CE8rxa";
    $remoteip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";
    $data = file_get_contents($url);
    $row = json_decode($data, true);
    // data
    $to = 'keshav@friendswebsolution.com'; 
    $from = $_POST['explore_emailaddress']; 
    $fromName =$_POST['explore_yourname']; 
    $mobile =$_POST['explore_mobilenumber']; 
    $description =$_POST['explore_description']; 
 
    $subject = "Customer response via website"; 
 
$htmlContent = ' 
    <html>
    <head>
        <title>SV Groups</title>
    <style>
      h1,
      h4 {
        color: #000;
      }
      .mail_tableblock {
        width: 100%;
        float: left;
        border: 1px solid #000;
      }
      .mail_tableblock tr th {
        text-align: center;
        background-color: #f2f2f2;
        padding: 10px;
      }
      .mail_tableblock tr td {
        text-align: center;
        background-color: #fff;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <h1>Enquire Lead</h1>

    <table class="mail_tableblock">
      <tr>
        <th>Name:</th>
        <th>Email:</th>
        <th>Contact No:</th>
        <th>Description:</th>
      </tr>
      <tr>
        <td>'.$fromName.'</td>
        <td>'.$from.'</td>
        <td>'.$mobile.'</td>
        <td>'.$description.'</td>
      </tr>
    </table>
  </body>
</html>
'; 

//Confirmation Mail for user
$responseSubject = "Thanks For your Response. (SV Groups)";
$responseHTMLContent = ' 
    <html> 
    <head> 
      <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
      * {
        font-family: Poppins;
        margin: 0;
        margin-left: 5px;
        padding: 0;
        margin-bottom: 5px;
      }
      a {
        text-decoration: none;
        color: black;
      }
    </style>
    </head> 
    <body> 
           <h3>Hello There,</h3>
    <p>Thanks for reaching us.<br />Will get back to you soon</p>
    <br />
    <br />
    <h5>Thanks & Regards,</h5>
    <h3>Team (SV Groups)</h3>
    <h5>     
      <a href="tel:+91 9845001560">+91 9845001560</a><br />
      <a href="tel:+91 9845001792">+91 9845001792</a>
    </h5>
    <h5>
      <a href="mailto:admin@svgroups.in">admin@svgroups.in</a>
    </h5>
    </body> 
    </html>';


//Response Mail
$mail->Username   = 'vgts.dev@gmail.com';                 //SMTP username
$mail->Password   = 'vredpzyrhotllflu';                   //SMTP password
$mail->setFrom('admin@svgroups.in', 'SV Groups');
$mail->addReplyTo('admin@svgroups.in', 'SV Groups');
$mail->addAddress('admin@svgroups.in', 'SV Groups');
$mail->Subject = $subject;
$mail->Body = $htmlContent;
$mail->AltBody = 'This is a plain-text message body';
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

// $mail->addAttachment('images/phpmailer_mini.png');

//Confirmation Mail
$confirmationMail->Username = "info@venue147.in";
$confirmationMail->Password = "hccxfxmjgekgsqjh";
$confirmationMail->setFrom('admin@svgroups.in', 'SV Groups');
$confirmationMail->addReplyTo('admin@svgroups.in', 'SV Groups');
$confirmationMail->addAddress($from, $fromName);
$confirmationMail->Subject = $responseSubject;
$confirmationMail->Body = $responseHTMLContent;
$confirmationMail->AltBody = 'This is a plain-text message body';
// $confirmationMail->addAttachment('images/phpmailer_mini.png');

// Send email 
  if ($row['success'] == "true") {

    if ($mail->send()) {
      $confirmationMail->send()
      ?>
    <script>
          window.location.href="/"
          alert('Thanks for contacting us. Will get back to you soon');
    </script>
    <?php
    } else {
      ?>
      <script>
            window.location.href="/"
            alert('Email Not Sent. Please enter correct details');
      </script>
      <?php
    }
  }
  else {
      ?>
        <script>
          window.location.href="/"
        alert('Invalid Captcha. Please fill the Form again.');
      </script>
    <?php
  }

 
}
function save_mail($mail) {
    //You can change 'Sent Mail' to any other folder or tag
    $path = "{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail";

    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);

    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);

    return $result;
}
?>

