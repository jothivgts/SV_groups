<?php
//get data from form  
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$description = $_POST['description'];
$to = "k3sha7@gmail.com";
$subject = "Mail From website";
$txt = " Name = ". $name . "\r\n  Email = " . $email . "\r\n Description = " . $description;
$headers = "From: noreply@yoursite.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:about.html");
?>