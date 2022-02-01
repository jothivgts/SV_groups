<?php
  require '../vendor/autoload.php';
  include_once("./SMTPconfig.php");
  include("./usernotificationmail.php");

  use \Mailjet\Resources;

  try{

    //HTTP Request parse start
    $name = $_REQUEST['yourname'];
    $mobile = $_REQUEST['mobilenumber'];
    $email = $_REQUEST['emailaddress'];
    $content = $_REQUEST['description'];
    //HTTP Request parse end

    $smtpconfig = new SMTPCONFIGURATION();
    $mj = new \Mailjet\Client($smtpconfig->Username,$smtpconfig->Password,true,['version' => 'v3.1']);
    $body = [
        'Messages' => [
        [
            'From' => [
            'Email' => "fromgmail@gmail.com",
            'Name' => "SV Groups"
            ],
            'To' => [
            [
                'Email' => "k3sha7@gmail.com",
                'Name' => "keshav"
            ],
            [
                'Email' => "nesamani@friendswebsolutions.com",
                'Name' => "Nesamani R"
            ]
            ],
            'Subject' => "Enquiry for site",
            'TextPart' => "My first Mailjet email",
            'HTMLPart' => "<!DOCTYPE html>
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
            </html>
            ",
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
        Thanks for your request.
        </body>
        </html>
        ";

        userNotification($name,$email,$tobody);
        echo json_encode((object) ["sent" => true, "message" => 'Message has been sent' , "note" => var_dump($response->getData()) ]);
    }else{
        echo json_encode((object) ["sent" => false, "message" => 'Message has not been sent' , "note" => var_dump($response->getData()) ]);
    }

 } catch (Exception $e) {
    echo json_encode((object) ["sent" => false, "message" => 'Message has not been sent' , "note" => var_dump($response->getData()) ]);
 }
?>
