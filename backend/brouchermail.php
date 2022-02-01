<?php
  header('Content-Type: application/json; charset=utf-8');

  require('../vendor/autoload.php');
  include_once("./SMTPconfig.php");
  include("./usernotificationmail.php");

  use \Mailjet\Resources;
  
  $smtpconfig = new SMTPCONFIGURATION();
  $mj = new \Mailjet\Client($smtpconfig->Username,$smtpconfig->Password,true,['version' => 'v3.1']);

  //HTTP Request parse start
  $name = $_REQUEST['yourname'];
  $mobile = $_REQUEST['mobilenumber'];
  $email = $_REQUEST['emailaddress'];
  $content = $_REQUEST['description'];
  //HTTP Request parse end
  
  //HTML START
  $HTMLPart = "<!DOCTYPE html>
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
      </body>
  </html>";
  //HTML END

  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "nesamani@friendswebsolution.com",
          'Name' => "NESAMANI"
        ],
        'To' => [
          [
            'Email' => "nesamani@vishgyana.com",
            'Name' => "NESAMANI"
          ],
          [
            'Email' => "nesamani@friendswebsolution.com",
            'Name' => "NESAMANI"
          ]
        ],
        'Subject' => "Broucher Mail",
        'TextPart' => "GREEDINGS FROM SV GROUPS",
        'HTMLPart' => $HTMLPart,
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  
  if($response->success()){

    $tobody = "<!DOCTYPE html>
    <html lang='en'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    </head>
    <body>
    Thanks for your interest in broucher.
    </body>
    </html>
    ";

    userNotification($name,$email,$tobody);

    echo json_encode($response->getData());
  }else{
    echo json_encode($response->getData());
  }
   

?>
