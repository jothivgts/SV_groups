<?php

  require('../vendor/autoload.php');
  include_once("./SMTPconfig.php");
  
  use \Mailjet\Resources;

  function userNotification($toname,$tomail,$tobody){

  $smtpconfig = new SMTPCONFIGURATION();
  $mj = new \Mailjet\Client($smtpconfig->Username,$smtpconfig->Password,true,['version' => 'v3.1']);

  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "nesamani@friendswebsolution.com",
          'Name' => "NESAMANI"
        ],
        'To' => [
          [
            'Email' => $tomail,
            'Name' => $toname
          ]
        ],
        'Subject' => "Acknowledegement Replay",
        'TextPart' => "GREEDINGS FROM SV GROUPS",
        'HTMLPart' => $tobody,
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  
  $response = $mj->post(Resources::$Email, ['body' => $body]);
}

?>
